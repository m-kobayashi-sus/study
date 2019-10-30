<?php

namespace App\Http\Controllers;
use App\Attendance;

class AttendanceController extends Controller
{
    //Attendance一覧を取得
    public function select(){
        $attendances = Attendance::all();
        return view('attendanceList')->with('attendances',$attendances);
    }
}
