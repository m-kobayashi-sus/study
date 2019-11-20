<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;

class Staff_editController extends Controller
{
    public function getemp(Request $request)
    {
        $emp = new Employee();

        //選択した社員のidから、レコードを取得
        $getemp = $emp->getone($request->input('id'));

        return view('/staff_edit',compact('getemp'));
    }
}
