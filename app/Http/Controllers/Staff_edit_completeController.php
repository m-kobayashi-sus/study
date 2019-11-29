<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class Staff_edit_completeController extends Controller
{
    public function update(Request $request) {
        $update = new Employee();

        $param =[
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'pass' => $request->input('pass'),
        ];
        $update->updateemp($param);
        //idを利用し、名前、メールアドレス、パスワードを更新後、完了画面へ遷移
        return view('staff_edit_complete');
    }
}
