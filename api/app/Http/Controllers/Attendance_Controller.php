<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class Attendance_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *@method get
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return attendance::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $insert = new attendance;
        $insert->address = $request->input('address');
        $insert->city = $request->input('city');
        $insert->emp_code = $request->input('emp_code');
        $insert->lastUpdate = date('d-m-Y');
        $insert->punchTime = $request->input('punchTime');
        $insert->save();
        return [
            'message' => 'Save Successfully'
        ];
    }



    /**
     * Display the specified resource.
     *@method get
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return attendance::find($id);
    }



    /**
     * Update the specified resource in storage.
     *@method put/patch
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = attendance::find($request->input('id'));
        $update->address = $request->input('address');
        $update->city = $request->input('city');
        $update->emp_code = $request->input('emp_code');
        $update->lastUpdate = date('d-m-Y');
        $update->punchTime = $request->input('punchTime');
        $update->save();
        return [
            'id' => $update->id,
            'message' => 'Update Successfully'
        ];
    }

    /**
     * Remove the specified resource from storage.
     * @method delete
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = attendance::find($id);
        $attendance->delete();
        return [
            'id' => $attendance->id,
            'message' => 'Delete Successfully'
        ];

    }
}
