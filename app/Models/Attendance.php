<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Attendance
{
    public function search($getparam) {
        //勤怠一覧取得（月単位）
        //リクエストで取得した値で検索
        if(!empty($getparam))
        {
            $records = DB::table('attendance')
            ->orderBy('date')
            ->join('employee','attendance.employee_id','=','employee.id')
            ->select('attendance.id',
                DB::raw('DATE_FORMAT(date,"%c/%e")as formatted_date'),
                DB::raw('DATE_FORMAT(start_time,"%k:%i")as start_time'),
                DB::raw('DATE_FORMAT(end_time,"%k:%i")as end_time'),
                'break_time',
                'detail',
                'attendance.delete_flag')
            ->where('employee.name', '=', $getparam['emp_name'])
            ->whereYear('date',$getparam['year'])
            ->whereMonth('date', $getparam['month'])
            ->get();
        }
        return ($records);
    }
    public function find($id) {
        //勤怠取得（1レコード）
        $record = DB::table('attendance')
        ->select('id',
            'employee_id',
            'date',
            DB::raw('SUBSTRING_INDEX(start_time, ":", 1) as start_hour'),
            DB::raw(' SUBSTRING_INDEX(SUBSTRING_INDEX(start_time, ":", 2),":", -1) as start_min'),
            DB::raw('SUBSTRING_INDEX(end_time, ":", 1) as end_hour'),
            DB::raw(' SUBSTRING_INDEX(SUBSTRING_INDEX(end_time, ":", 2),":", -1) as end_min'),
            'break_time',
            'detail')
        ->where('id', '=', $id)
        ->first();

        return ($record);
    }

    public function empidGet($name) {
        //社員ID取得
        $emp_id = DB::table('employee')
        ->select('id')
            ->where('name', '=', $name)
            ->first();
            return ($emp_id);
    }
    public function create($param) {
        //新規勤怠登録
        DB::table('attendance')
        ->insert(
            [
                'employee_id' => $param['employee_id'],
                'date' => $param['date'],
                'start_time' => $param['start_h'].":".$param['start_min'],
                'end_time' => $param['end_h'].":".$param['end_min'],
                'break_time' => $param['break_time'],
                'detail' => $param['detail'],
                'create_time' => now(),
                'update_time' => now(),
            ]
            );
    }
    public function update($param) {
        //勤怠更新
        DB::table('attendance')
        ->where('id',$param['id'])
        ->update(
            [
                'start_time' => $param['start_h'].":".$param['start_min'],
                'end_time' => $param['end_h'].":".$param['end_min'],
                'break_time' => $param['break_time'],
                'detail' => $param['detail'],
                'update_time' => now(),
            ]
            );
    }

    public function delete($id) {
        //勤怠削除（デリーとフラグの更新）
        DB::table('attendance')
        ->where('id',$id)
        ->update(
            [
                'delete_flag' => '1'
            ]
            );
    }
}
