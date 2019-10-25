<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Employee;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use App\AttendanceList;
>>>>>>> 7a9e3c79cfc557102d02831e00a804ffc55eb05a

class AttendanceListController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
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
=======
        $datas = AttendanceList::all();
        return view('/attendanceList',['datas' => $datas]);
    }
>>>>>>> 7a9e3c79cfc557102d02831e00a804ffc55eb05a
}
