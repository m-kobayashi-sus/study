<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
}
class AddEmployee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'pass',
    ];
}
