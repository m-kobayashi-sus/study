<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployee;


class Staff_checkController extends Controller
{
    public function check(AddEmployee $request) {
        $param =[
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'pass' => $request->input('pass'),
        ];
        return view('staff_check', compact('param'));
    }
}
