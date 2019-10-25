<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Staff_reg_completeController extends Controller
{
    public function index(Request $request) {
        return view('staff_reg_complete');
    }
    public function create(Request $request) {
        $param =[
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'pass' => $request->input('pass'),
            'delete_flag' => '0',
            'create_time' => \Carbon\Carbon::now(),
        ];
        DB::table('employee')->insertGetId($param);
        return redirect('staff_reg_complete');
    }
}
