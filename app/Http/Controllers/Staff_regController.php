<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Staff_reg;

class Staff_regController extends Controller
{

    public function index(Request $request)
    {
        return view('staff_reg');
    }

}
