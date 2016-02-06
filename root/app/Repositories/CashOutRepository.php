<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 24-Oct-2015
 * Time: 3:47 AM
 */

namespace App\Repositories;

use App\Client;

class CashOutRepository {

    /**
     * Display a list of client name from storage
     * @return static
     */
    public function client()
    {
        return Client::all()->lists('name','name');
    }

    /**
     * Display a list of payment type
     * @return static
     */
    public function type()
    {
        return [
            'Cheque'=>'Cheque',
            'Cash'=>'Cash'
        ];
    }
}