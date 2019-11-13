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

Route::get('staff_list','Staff_listController@staffall');
//社員一覧画面へのアクセス

Route::post('staff_list','Staff_listController@delete');
//社員削除



Route::match(['get','post'],'staff_edit','Staff_editController@getemp');
//編集ボタン押下時の処理（1件表示）

#社員編集
Route::post('staff_edit_check','Staff_edit_checkController@editcheck');
//確認ボタン押下時（バリデート）

Route::post('staff_edit_complete','Staff_edit_completeController@update');
//更新ボタン押下の処理（更新処理）



Route::get('staff_reg','Staff_regController@acces');
//社員登録画面へのアクセス

Route::post('staff_check','Staff_checkController@check');
//確認ボタン押下時（バリデート）

Route::post('staff_reg_complete','Staff_reg_completeController@create');
//登録ボタン押下の処理（登録処理）
