<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Attendance
{
    public function find($getparam) {
        #リクエストで取得した値で検索
        if(!empty($getparam))
        {
            $records = DB::table('attendance')
            ->orderBy('date')
            ->join('employee','attendance.employee_id','=','employee.id')
            ->select(DB::raw('DATE_FORMAT(date,"%c/%e")as formatted_date'),DB::raw('DATE_FORMAT(start_time,"%k:%i")as start_time'),DB::raw('DATE_FORMAT(end_time,"%k:%i")as end_time'),'break_time','detail')
            ->where('employee.name', '=', $getparam['emp_name'])
            ->whereYear('date',$getparam['year'])
            ->whereMonth('date', $getparam['month'])
            ->get();
        }
        return ($records);
    }
    public function deleteatn($emp_id) {
        DB::table('attendance')
        ->where('employee_id' , $emp_id)
        ->update(
            [
                'delete_flag' => '1',
            ]
            );
        //デリートフラグを立てる（削除処理）
    }
}
