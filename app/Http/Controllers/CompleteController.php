<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class CompleteController extends Controller
{
    public function complete(Request $request)
    {

        $attendance = new Attendance();

        if (empty($request->input('id')))
        {
            $attendance->create($request);
        }else{
        $attendance->update($request);
        }
        return view('complete');
    }
}
