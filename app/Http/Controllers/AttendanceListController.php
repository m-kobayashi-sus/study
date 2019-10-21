<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class AttendanceListController extends Controller
{
    public function index()
    {
            return view('attendanceList');
     }

     public function emplist()
     {
         //↓と同じ。$datas =DB::select('select * from employee');
         $datas = Employee::all(); //全件取得
         return view('/attendanceList',[
             'datas'=>$datas
         ]);
     }
}
