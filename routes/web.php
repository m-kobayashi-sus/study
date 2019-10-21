<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Employee;

Route::get('/', function () {
    return view('welcome');
});

Route::get('attendanceList','AttendanceListController@emplist');

Route::get('staff_reg','Staff_regController@index');
Route::post('staff_reg','Staff_regController@add');