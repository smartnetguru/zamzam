<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * Get dates as following format
     * @param $date
     * @return static
     */
    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Convert array items to Carbon instances
     * @var array
     */
    protected $dates = [
        'date'
    ];

    /**
     * Allow mass assignment to following items
     * @var array
     */
    protected $fillable = [
        'month',
        'invoiceNumber',
        'client',
        'date',
        'is_driver',
        'vehicle',
        'duty',
        'bill',
        'amount',
        'ot_rate',
        'ot',
        'ot_bill',
        'comment'
    ];
}
