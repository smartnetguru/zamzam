<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{

    protected $fillable = [
        'client',
        'vehicle',
        'employee',
        'date',
        'hour',
        'ot'
    ];
}