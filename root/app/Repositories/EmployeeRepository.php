<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 9/4/2015
 * Time: 12:57 AM
 */

namespace App\Repositories;


use App\Client;
use App\Country;
use App\Designation;
use App\Employee;
use App\Vehicles;

class EmployeeRepository {

    public function gender()
    {
        return [
            'MALE' => 'MALE',
            'FEMALE' => 'FEMALE'
        ];
    }

    public function designation()
    {
        return Designation::all()->lists('designation','designation')->sort();
    }

    public function country()
    {
        return Country::all()->lists('country','country')->sort();
    }

    public function status()
    {
        return ['Active'=>'Active','Resign'=>'Resign','Fired'=>'Fired','Vacation'=>'Vacation'];
    }

    /**
     * Display a list of available vehicles
     * Created by smartrahat Date: 04:11:2015 Time: 02:46PM
     * @return static
     */
    public function vehicle()
    {
        return Vehicles::all()->lists('registration','id');
    }

    /**
     * Display a list of available clients
     * Created by smartrahat Date: 04.11.2015 Time: 02:48PM
     * @return static
     */
    public function client()
    {
        return Client::all()->lists('name','id');
    }

    /**
     * Created by smartrahat Date: 29.11.2015 Time: 07:02PM
     * @param $id
     * @return string
     */
    public function logClient($id)
    {
        return $id == 0 ? '' : Client::query()->findOrFail($id)->name;
    }

    /**
     * Created by smartrahat Date: 29.11.2015 Time: 08:03PM
     * @param $id
     * @return string
     */
    public function logVehicle($id)
    {
        return $id == 0 ? '' : Vehicles::query()->findOrFail($id)->registration;
    }

    /**
     * Created by smartrahat Date: 03.12.2015 Time: 05:43AM
     * @param $id
     * @return mixed
     */
    public function currentVehicle($id)
    {
        $vehicle = Vehicles::all()->where('eid',$id)->sortByDesc('updated_at')->first();
        return $vehicle != null ? $vehicle->registration:'';
    }

}