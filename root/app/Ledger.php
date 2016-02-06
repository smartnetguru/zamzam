<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $dates = ['date'];

    protected $fillable = [
        'date',
        'client',
        'description',
        'reference',
        'debit',
        'credit',
    ];
}
