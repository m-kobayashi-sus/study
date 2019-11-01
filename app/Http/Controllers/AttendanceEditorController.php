<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceEditorController extends Controller
{
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

        $record = $attendance->find($id);

        return view('attendanceEditor',compact('record'))
        ->with('emp_name', $emp_name)
        ->with('id', $id);


    }

    public function create(Request $request)
    {
        $attendance = new Attendance();

        $emp_name = $request->input('emp_name');
        $emp_id = $attendance->empidGet($emp_name);

        return view('attendanceEditor',compact('emp_id'))
        ->with('emp_name', $emp_name);
    }

}
