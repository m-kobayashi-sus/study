<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceList;

class AttendanceListController extends Controller
{
    public function index()
    {
        $datas = AttendanceList::all();
        return view('/attendanceList',['datas' => $datas]);
    }
}
