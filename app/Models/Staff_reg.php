<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_reg extends Model
{
    protected $fillable = [
        'name',
        'email',
        'pass',
    ];
}
