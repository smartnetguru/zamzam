<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLog extends Model
{
    protected $table = 'employee_log';

    protected $fillable = [
        'eid',
        'date',
        'vehicle',
        'client',
        'status',
        'action',
        'description'
    ];
}
