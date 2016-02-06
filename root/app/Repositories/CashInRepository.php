<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/20/2015
 * Time: 9:57 PM
 */

namespace App\Repositories;


use App\Client;
use App\Invoice;

class CashInRepository {

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

    public function clients()
    {
        return Client::all()->lists('name','name')->sort();
    }

}