<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 9/21/2015
 * Time: 1:21 AM
 */

namespace App\Repositories;


use App\Client;
use App\Employee;
use App\Vehicles;

class RouteRepository {
    /**
     * Makes an array with employees name
     * The key is employee's name
     * @return static
     */
    public function employee()
    {
        return Employee::all()->lists('name','name');
    }

    /**
     * Makes an array with clients name
     * The key is client's name
     * @return static
     */
    public function client()
    {
        return Client::all()->lists('name','name');
    }

    /**
     * Makes an array with vehicles name
     * The key is vehicle's name
     * @return static
     */
    public function vehicle()
    {
        return Vehicles::all()->lists('registration','registration');
    }

}