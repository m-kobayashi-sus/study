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

Route::get('/', function () {
    return view('welcome');
});

Route::get('attendanceList','AttendanceListController@search');

Route::get('staff_reg','Staff_regController@acces');

Route::post('staff_check','Staff_checkController@check');

Route::post('staff_reg_complete','Staff_reg_completeController@create');
