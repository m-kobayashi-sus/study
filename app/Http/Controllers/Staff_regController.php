<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AddEmployee;

class Staff_regController extends Controller
{

    public function index(Request $request)
    {
        return view('staff_reg');
    }

    public function add(Request $request) {
        $param =[
                    'name' => $request->input('name'),
                    'mail' => $request->input('mail'),
                    'pass' => $request->input('pass')
                ];

        return view('staff_check', compact('param'));

//         $name = $request->input('name');
//         return view('staff_check', compact('name'));
    }


//     public function create(Request $request) {
//         $param = [
//             'name' => 'string'|'max:20',
//             'mail' => 'email'|'max:50',
//             'pass' => 'alpha-num'|'min:8,max:64'
//         ]
//         ;
//     }
}
