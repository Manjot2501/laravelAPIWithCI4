<?php

namespace App\Controllers;

use Exception;

class Home extends BaseController
{
    protected $developers_url = 'http://127.0.0.1:8000/api/attendance/';

    public function dashboardTable($isNotAjax = 0)
    {
        # request for Logs
        $url = $this->developers_url . 'get';
        $data['list'] = json_decode($this->_get_api($url), false);
        
        $data['emp'] = json_decode($this->_get_api('http://127.0.0.1:8000/api/employee/get'), false);
        if (!empty($isNotAjax)) {
            return view('tableView', $data);
        } else {
            $data['html'] = view('tableView', $data);
            echo json_encode($data);
        }
    }

    public function index()
    {
        $data['html'] = $this->dashboardTable(1);
        return view('welcome_message', $data);
    }

    public function create()
    {
        if (!empty($_REQUEST) && is_array($_REQUEST)) {
            $url = $this->developers_url . 'create';
            return $this->_post_api($url,json_encode($_REQUEST));
        }
    }

    public function delete()
    {
        if (!empty($_REQUEST) && is_array($_REQUEST)) {
            $url = $this->developers_url . 'delete/' . $_REQUEST['id'];
            return $this->_delete_api($url);
        }
    }

    public function get_details()
    {
        if (!empty($_REQUEST) && is_array($_REQUEST)) {
            $url = $this->developers_url . 'getDetails/' . $_REQUEST['id'];
            return $this->_get_api($url);
        }
    }


    public function update_attendance()
    {
        if (!empty($_REQUEST) && is_array($_REQUEST)) {
            $url = $this->developers_url . 'update';
            return $this->_patch_api($url,json_encode($_REQUEST));
        }
    }

    public function _patch_api($url,$data)
    {
        try {
            $headers = array('Content-Type: application/json');
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($curl);
        } catch (Exception $e) {
            return false;
        }
        curl_close($curl);
        if ($result)
            return $result;
        else
            return false;
    }
    public function _delete_api($url)
    {
        try {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
        } catch (Exception $e) {
            return false;
        }
        curl_close($ch);
        if ($result)
            return $result;
        else
            return false;
    }

    public function _post_api($url ,$data)
    {
        try {
            $headers = array('Content-Type: application/json');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
        } catch (Exception $e) {
            return false;
        }
        curl_close($ch);
        if ($result)
            return $result;
        else
            return false;
    }

    public function _get_api($url)
    {
        try {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $result = curl_exec($curl);
        } catch (Exception $e) {
            return false;
        }
        curl_close($curl);
        if ($result)
            return $result;
        else
            return false;
    }
}
