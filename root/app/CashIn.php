<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CashIn extends Model
{
    /**
     * Convert date fields to Carbon instances
     * @var array
     */
    protected $dates = [
        'date',
        'chequeDate'
    ];

    /**
     * Get the date attribute <p>
     * All dates will shown as declared in mutator
     * after retrieving from storage or whatever in storage </p>
     * parse method will convert the time to midnight. example: 00:00:00 AM
     * @param date
     * @return static
     */
    public function getDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Get the cheque date attribute <p>
     * All cheque dates will shown as declared in mutator
     * after retrieving from storage or whatever in storage </p>
     * parse method will convert the time to midnight. example: 00:00:00 AM
     * @param date
     * @return static
     */
    public function getChequeDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    /**
     * List of fields allowed to filled via mass assignment
     * @var array
     */
    protected $fillable = [
        'voucher',
        'date',
        'client',
        'type',
        'amount',
        'bank',
        'cheque',
        'chequeDate',
        'for'
    ];
}
