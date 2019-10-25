<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Staff_reg_errorController extends Controller
{
    public function index(Request $request) {
        return view('staff_reg_error');
    }
}
