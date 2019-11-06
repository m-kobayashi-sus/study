<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class AttendanceListController extends Controller
{
    public function branchdelete(Request $request)
    //削除ボタン押下時の分岐
    {

        if ($request->has('attendance_id')){
            $this->delete($request);
            return $this->delete($request);
        }else{
            $this->search($request);
            return $this->search($request);
        }
    }
    public function search(Request $request)
    {

        $attendance = new Attendance();
        //キーワード受け取り
        $param =[
            'emp_name' => $request->input('emp_name'),
            'year' => $request->input('year'),
            'month' => $request->input('month'),
        ];

        $emps = DB::table('employee')->get();
        $atts = DB::table('attendance')->get();


        $records = $attendance->search($param);

        return view('/attendanceList',compact('param'),['emps' => $emps,'atts' => $atts,'records' => $records]);
    }

    public function delete(Request $request) {
        //削除処理後、勤怠一覧再読み込み
        $attendance = new Attendance();

        $id = $request->input('attendance_id');

        $attendance->delete($id);


        return $this->search($request);

    }
}
