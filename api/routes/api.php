<?php

use App\Http\Controllers\Attendance_Controller;
use App\Http\Controllers\EMP_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('attendance/get',[Attendance_Controller::class,'index']);
Route::delete('attendance/delete/{DeleteID}',[Attendance_Controller::class,'destroy']);
Route::get('attendance/getDetails/{getDetailsID}',[Attendance_Controller::class,'show']);
Route::patch('attendance/update',[Attendance_Controller::class,'update']);
Route::post('attendance/create',[Attendance_Controller::class,'create']);

Route::get('employee/get',[EMP_Controller::class,'index']);

