<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    /*
    * defind table name attendance
    *if its attendances then
    *we not need this
    */
    protected $table = 'attendance';
    public $timestamps = false;

    protected $fillable = [
        "address",
        "city",
        "emp_code",
        "lastUpdate",
        "punchTime",
    ];
}
