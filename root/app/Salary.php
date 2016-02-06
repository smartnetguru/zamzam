<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $dates = ['date','start','end'];

    protected $table = 'salaries';

    protected $fillable = [
        'eid',
        'type',
        'name',
        'month',
        'date',
        'start',
        'end',
        'leaves',
        'absents',
        'worked',
        'ot_rate',
        'ot_hour',
        'ot_amount',
        'basic',
        'basic_amount',
        'total',
        'paid',
        'comment'
    ];

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date)->format('Y-m-d');
    }

    public function getDateAttribute($date)
    {
        return Carbon::parse($date);
    }

}
