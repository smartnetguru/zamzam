<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'date',
        'eid',
        'bid',
        'cid',
        'action',
        'e_description',
        'b_description',
        'c_description'
    ];
}
