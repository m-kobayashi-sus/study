<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    public function getall() {
        $employees = DB::table('employee')
        ->where('delete_flag' , '0')
        ->get();
        //有効な社員を全件取得
        return ($employees);
    }
}
