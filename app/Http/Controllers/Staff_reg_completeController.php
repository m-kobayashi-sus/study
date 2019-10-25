<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Staff_reg_completeController extends Controller
{
    public function index(Request $request) {
        return view('staff_reg_complete');
    }


}
