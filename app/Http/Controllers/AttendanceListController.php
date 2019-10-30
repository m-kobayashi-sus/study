<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class AttendanceListController extends Controller
{
    public function search(Request $request)
    {
        $attendance = new Attendance();
        #キーワード受け取り
        $param =[
            'emp_name' => $request->input('emp_name'),
            'year' => $request->input('year'),
            'month' => $request->input('month'),
        ];
        #DBからデータを取得
        $emps = DB::table('employee')->get();
        $atts = DB::table('attendance')->get();

        $records = $attendance->find($param);

        return view('/attendanceList',compact('param'),['emps' => $emps,'atts' => $atts,'records' => $records]);
    }
}
