<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Staff_listController extends Controller
{
    public function staffall() {
        //社員全員のデータを取得
        $getemp  = new Employee();
        $emps = $getemp->getemp();

        $i = 0;

        return view('/staff_list',compact('emps'),['i' => $i]);
    }
    public function staffbranch(Request $request) {
        //削除・編集ボタン押下時の分岐
        if ($request->has('id')){
            //idが送信されている場合、削除処理
            $this->staffdelete($request);
            return $this->staffdelete($request);
        }else{
            $this->staffedit($request);
            return $this->staffedit($request);
        };
    }

}
