<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVendor extends Model
{
    protected $fillable = [
        'vid',
        'name',
        'type',
        'address',
        'city',
        'state',
        'post',
        'country',
        'phone',
        'email',
        'contact_person',
        'designation',
        'contact_phone',
        'contact_email',
        'fax',
        'account',
        'logo'
    ];
}
