<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceEditorController extends Controller
{
    //勤怠IDを所持していた場合と、そうでない場合の分岐
    public function branch(Request $request)
    {

        if ($request->has('id')){
            $this->edit($request);
            return $this->edit($request);
        }else{
            $this->create($request);
            return $this->create($request);
        }
    }

    public function edit(Request $request)
    {
        $attendance = new Attendance();

        $emp_name = $request->input('emp_name');
        $id = $request->input('id');

        //取得した勤怠IDを使用し、勤怠レコードを抽出
        $record = $attendance->find($id);

        //抽出したレコード、勤怠ID、社員名を返す
        return view('attendanceEditor',compact('record'))
        ->with('emp_name', $emp_name)
        ->with('id', $id);


    }

    public function create(Request $request)
    {
        $attendance = new Attendance();

        $emp_name = $request->input('emp_name');
        //取得した社員名を使用し、社員IDを取得
        $emp_id = $attendance->empidGet($emp_name);

        return view('attendanceEditor',compact('emp_id'))
        ->with('emp_name', $emp_name);
    }

}
