<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

class Staff_listController extends Controller
{
    public function staffall() {
        //社員全員のデータを取得
        $getemp  = new Employee();
        $emps = $getemp->getall();

        return view('/staff_list',compact('emps'));
    }
    public function delete(Request $request) {
        //削除ボタン押下時
        $employee = new Employee();
        $attendance = new Attendance();

        $id = $request->input('id');
        //idを変数に

        $employee->deleteemp($id);
        //社員のフラグを立てる
        $attendance->deleteatn($id);
        //該当する社員の勤怠のフラグを立てる

        return $this->staffall();
        //再度全件取得、一覧画面を表示
    }

}
