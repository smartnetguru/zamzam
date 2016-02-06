<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function getAgreementFromAttribute($date){
        return $this->attributes['agreement_from'] = Carbon::parse($date);
    }
    public function getAgreementToAttribute($date)
    {
        return $this->attributes['agreement_to'] = Carbon::parse($date);
    }
    protected $fillable = [
        'cid',
        'name',
        'client_phone',
        'client_email',
        'address',
        'city',
        'state',
        'post',
        'country',
        'contact_person',
        'contact_phone',
        'contact_email',
        'contact_designation',
        'bill',
        'ot',
        'agreement_from',
        'agreement_to',
        'status',
        'logo'
    ];

}
