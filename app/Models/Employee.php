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

    public function getone($id) {
        $employee = DB::table('employee')
        ->where('id' , $id)
        ->first();
        //選択した社員を一件取得
        return ($employee);
    }
    public function addemp($param) {
        DB::table('employee')
        ->select($param);
        //社員テーブルへデータを登録
    }

    public function updateemp($param) {
        DB::table('employee')
        ->where('id' , $param['id'])
        ->update(
            [
                'name' => $param['name'],
                'mail' => $param['mail'],
                'pass' => $param['pass'],
                'update_time' => now(),
            ]
            );
        //idから、社員情報を上書き
    }
}
