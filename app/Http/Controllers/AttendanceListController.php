<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\AttendanceList;

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

//         var_dump($records);
//         $diff = strtotime(array_column($records,'end_time'))-strtotime(array_column($records,'start_time'))-array_column($records,'break_time');
//         $result = gmdate("H:i", $diff);
//         array_push($records,$result);

        $BTfomat = new AttendanceList();

        return view('/attendanceList',compact('param'),[$BTfomat,'emps' => $emps,'atts' => $atts,'records' => $records]);
    }
}
