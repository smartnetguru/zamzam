<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 9/7/2015
 * Time: 9:09 PM
 */

namespace App\Repositories;


use App\City;
use App\ClientLog;
use App\Country;
use App\Designation;
use App\Employee;
use App\State;
use App\Vehicles;

class ClientRepository {

    /**
     * Display a list of designation from storage
     * @return static
     */
    public function designation()
    {
        $result = Designation::all()->lists('designation','designation');
        return $result;
    }

    public function country()
    {
        $result = Country::all()->lists('country','country');
        return $result;
    }

    /**
     * Display a list of city form storage
     * @return static
     */
    public function city()
    {
        $result = City::all()->lists('city','city');
        return $result;
    }

    /**
     * Display a list of state from storage
     * @return static
     */
    public function state()
    {
        $result = State::all()->lists('state','state');
        return $result;
    }

    /**
     * Display following status in form
     * Created by smartrahat Date: 11.11.2015 Time: 07:12PM
     * @return array
     */
    public function status()
    {
        return [
            'Active'=>'Active',
            'Inactive'=>'Inactive'
        ];
    }

    /**
     * Display a list of available driver
     * Created by smartrahat Date: 11.11.2015 Time: 07:23PM
     * @return static
     */
    public function availableDrivers()
    {
        return [''=>'Select','999999999'=>'Client Driver'] + Employee::where('cid',0)->lists('name','id')->toArray();
    }

    public function currentDriver($id)
    {
        return Employee::query()->where('cid',$id)->where('status','Active')->lists('name','id');
    }

    /**
     * @param $id
     * @return string
     */
    public function logDriver($id)
    {
        return $id == 999999999 ? 'Client Driver' : ($id == 0 ? '' : Employee::FindOrFail($id)->name);
    }

    /**
     * Display a list of vehicle
     * Created by smartrahat Date: 11.11.2015 Time: 07:46PM
     * @return static
     */
    public function availableVehicle()
    {
        return [''=>'Select'] + Vehicles::where('cid',0)->lists('registration','id')->toArray();
    }

    public function currentVehicle($id)
    {
        return Vehicles::where('cid',$id)->where('status','Active')->lists('registration','id');
    }

    public function logVehicle($id)
    {
        return $id == 0 ? '' : Vehicles::findOrFail($id)->registration;
    }
}