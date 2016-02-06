<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeClient extends Model
{
    protected $table = 'employee_client';

    protected $fillable = ['date','cid','eid','action','description'];
}
