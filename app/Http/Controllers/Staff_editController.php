<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;

class Staff_editController extends Controller
{
    public function getemp(Request $request)
    {
        $getemp = new Employee();
        $emp = $getemp->getone($request->input('id'));
        //選択した社員のidから、レコードを取得
        return view('/staff_edit',compact('emp'));
    }
}
