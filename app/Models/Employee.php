<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    public function addemp($param) {
        DB::table('employee')
        ->insertGetId($param);
    }
}
