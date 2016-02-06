<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $table = 'advances';

    protected $fillable = [
        'eid',
        'date',
        'effect_month',
        'total',
        'deduction_rate',
    ];
}
