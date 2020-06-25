<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceList extends Model
{
    public function change_time_format($mm) {
        return sprintf("%2d:%2d", floor($mm/60), $mm%60);
    }

}

