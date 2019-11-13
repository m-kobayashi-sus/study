<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class Staff_listController extends Controller
{
    public function staffall() {
        //社員全員のデータを取得
        $getemp  = new Employee();
        $emps = $getemp->getall();

        $i = 0;

        return view('/staff_list',compact('emps'),['i' => $i]);
    }
    public function staffbranch(Request $request) {
        //削除・編集ボタン押下時の分岐
        if ($request->has('id')){
            //idが送信されている場合、削除処理へ
            $delete = app()->make('App\Http\Controllers\Staff_deleteController');
            $delete->delemp($request);
            return $delete->delemp($request);
        }else{
            $edit = app()->make('App\Http\Controllers\Staff_editController');
            $edit->getemp($request);
            return $edit->getemp($request);
        };
    }

}
