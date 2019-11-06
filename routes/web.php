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

Route::get('attendanceList','AttendanceListController@branchdelete');
// Route::post('attendanceList','AttendanceListController@delete');

Route::get('staff_reg','Staff_regController@index');

Route::get('staff_reg_error','Staff_reg_errorController@index');

Route::post('staff_check','Staff_checkController@index');

Route::get('staff_reg_complete','Staff_reg_completeController@index');
Route::post('staff_reg_complete','Staff_reg_completeController@create');

#編集・新規登録時の分岐
Route::post('attendanceEditor','AttendanceEditorController@branch');

#勤怠登録完了画面
Route::post('complete','CompleteController@complete');
