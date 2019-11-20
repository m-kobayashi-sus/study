<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceListController extends Controller
{
    public function search(Request $request)
    {
        $employees = new Employee();

        $attendance = new Attendance();
        //キーワード受け取り
        $param =[
            'emp_name' => $request->input('emp_name'),
            'year' => $request->input('year'),
            'month' => $request->input('month'),
            'attendance_id' => $request->input('attendance_id'),
        ];

        $emps = $employees->getall();
        $atn = $attendance->getallatn();

        //プルダウン用の有効年を取得
        $years = $attendance->getYear();

        //有効な社員を全件取得
        $records = $attendance->search($param);

        return view('/attendanceList',compact('param'),['emps' => $emps,'atn' => $atn,'records' => $records,'years' => $years]);
    }

    public function delete(Request $request) {
        //削除処理後、勤怠一覧再読み込み
        $attendance = new Attendance();

        $attendance->delete($request->input('attendance_id'));


        return $this->search($request);

    }
}
