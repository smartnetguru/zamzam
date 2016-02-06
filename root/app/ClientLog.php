<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientLog extends Model
{
    protected $table = 'client_log';

    protected $fillable = [
        'cid',
        'date',
        'eid',
        'vehicle',
        'status',
        'description'
    ];
}
