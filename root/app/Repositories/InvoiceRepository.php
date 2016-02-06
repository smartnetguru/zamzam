<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/16/2015
 * Time: 1:35 AM
 */

namespace App\Repositories;

use App\Client;
use App\Employee;
use App\Vehicles;

class InvoiceRepository {
    /**
     * Display a list of Client's name
     * @return static
     */
    public function client()
    {
        return Client::all()->lists('name','name')->sort();
    }

    /**
     * Display a list of Vehicle's registration number
     * @return static
     */
    public function vehicle()
    {
        return Vehicles::all()->lists('registration','registration')->sort();
    }

    /**
     * Display a list of Driver's name
     * @return static
     */
    public function driver()
    {
        return Employee::all()->lists('name','name')->sort();
    }

    /**
     * Display list to choose driver status on client's invoice
     * Created by smartrahat Date: 08.12.2015 Time: 07:14PM
     * @return array
     */
    public function is_driver()
    {
        return [
            'With Driver' => 'With Driver',
            'Without Driver' => 'Without Driver'
        ];
    }

    /**
     * Display list of months
     * @return array
     */
    public function month()
    {
        return [
            'January' => 'January',
            'February' => 'February',
            'March' => 'March',
            'April' => 'April',
            'May' => 'May',
            'June' => 'June',
            'July' => 'July',
            'August' => 'August',
            'September' => 'September',
            'October' => 'October',
            'November' => 'November',
            'December' => 'December'
        ];
    }

}