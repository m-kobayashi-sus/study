<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Staff_regController extends Controller
{

    public function acces(Request $request)
    {
        return view('staff_reg');
    }
}
