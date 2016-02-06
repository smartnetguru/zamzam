<?php
/**
 * Employee Model
 * Created by smartrahat
 * Date:2015.09.04 Time:4:28AM
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $dates = [];

    public function getDobAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getJoiningAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getLicenseExpireAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getVisaExpireAttribute($date)
    {
        return Carbon::parse($date);
    }
    public function getPassportExpireAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function setDobAttribute($date)
    {
        $this->attributes['dob'] = Carbon::parse($date)->format('Y-m-d');
    }
    public function setJoiningAttribute($date)
    {
        $this->attributes['joining'] = Carbon::parse($date)->format('Y-m-d');
    }
    public function setLicenseExpireAttribute($date)
    {
        $this->attributes['license_expire'] = Carbon::parse($date)->format('Y-m-d');
    }

    public function setVisaExpireAttribute($date)
    {
        $this->attributes['visa_expire'] = Carbon::parse($date)->format('Y-m-d');
    }
    public function setPassportExpireAttribute($date)
    {
        $this->attributes['passport_expire'] = Carbon::parse($date)->format('Y-m-d');
    }

    protected $fillable = [
        'eid',
        'cid',
        'name',
        'designation',
        'dob',
        'joining',
        'resigned',
        'basic',
        'ot_rate',
        'license',
        'license_expire',
        'phone',
        'email',
        'present',
        'pre_city',
        'pre_state',
        'pre_post',
        'pre_country',
        'permanent',
        'per_city',
        'per_state',
        'per_post',
        'per_country',
        'passport',
        'passport_expire',
        'visa',
        'visa_expire',
        'reference',
        'reference_phone',
        'status',
        'image'
    ];

}
