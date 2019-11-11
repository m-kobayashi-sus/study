<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class Staff_reg_completeController extends Controller
{
    public function create(Request $request)
    {
        $addemp = new Employee();
        $param =[
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'pass' => $request->input('pass'),
            'delete_flag' => '0',
            'create_time' => \Carbon\Carbon::now(),
        ];

        $addemp->addemp($param);

        return view('staff_reg_complete');
    }
}
