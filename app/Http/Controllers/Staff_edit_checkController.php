<?php

namespace App\Http\Controllers;

use App\Http\Requests\Editemployee;

class Staff_edit_checkController extends Controller
{
    public function editcheck(EditEmployee $request) {
        //EditEmployeeでバリデートを行う（エラーがある場合はstaff_editへリダイレクト）
        //エラーがない場合は確認画面へ
        $param =[
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'bef_pass' => $request->input('bef_pass'),
            'aft_pass' => $request->input('aft_pass'),
        ];
        return view('staff_edit_check', compact('param'));
    }
}