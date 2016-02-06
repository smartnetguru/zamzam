<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $dates = [];
    protected $fillable = [
        'bid',
        'eid',
        'cid',
        'registration',
        'brand',
        'model',
        'vendor',
        'purchase_date',
        'registration_date',
        'registration_expire',
        'chases',
        'body',
        'engine',
        'seat',
        'status',
        'remarks',
        'image'
    ];

    public function setRegistrationDateAttribute($date)
    {
        $this->attributes['registration_date'] = Carbon::parse($date);
    }
    public function setPurchaseDateAttribute($date)
    {
        $this->attributes['purchase_date'] = Carbon::parse($date);
    }
    public function setRegistrationExpireAttribute($date)
    {
        $this->attributes['registration_expire'] = Carbon::parse($date);
    }

    public function getRegistrationDateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getPurchaseDateAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getRegistrationExpireAttribute($date)
    {
        return Carbon::parse($date);
    }

}
