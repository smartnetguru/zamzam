<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 9/7/2015
 * Time: 4:59 PM
 */

namespace App\Repositories;


use App\Brands;
use App\Client;
use App\Employee;
use App\Models;
use App\MyVendor;

class VehicleRepository {

    /**
     * Display list of brands from storage
     * @return static
     */
    public function brand()
    {
        return Brands::all()->lists('brand','brand')->sortBy('brand');
    }

    /**
     * Display list of model from storage
     * @return static
     */
    public function model()
    {
        return Models::all()->lists('model','model');
    }

    /**
     * Display list of vendor from storage
     * @return static
     */
    public function vendor()
    {
        return MyVendor::all()->lists('name','name')->sortBy('name');
    }

    /**
     * Display list of drivers from storage
     * Created by smartrahat Date: 30.10.2015 Time: 09:44AM
     * @return static
     */
    public function availableDriver()
    {
        return [''=>'Select','999999999'=>'Client Driver'] + Employee::all()->lists('name','id')->sortBy('name')->toArray();
    }

    /**
     * This is temporary driver list only for police case & accident
     * @return array
     */
    public function driver()
    {
        return [''=>'select','999999999'=>'Client Driver'] + Employee::all()->lists('name','id')->sortBy('name')->toArray();
    }

    /**
     * Display list of client from storage
     * Created by smartrahat Date: 01.11.2015 Time: 03:08AM
     * @return static
     */
    public function client()
    {
        return Client::all()->lists('name','id')->sortBy('name');
    }

    /**
     * Display associated client form storage
     * Created by smartrahat Date: 29.11.2015 Time: 5:41PM
     * @param $id
     * @return string
     */
    public function logClient($id)
    {
        return $id == 0 ? '' : Client::findOrFail($id)->name;

    }

    public function logDriver($id)
    {
        return $id == 999999999?'Client Driver':($id == 0?'':Employee::findOrFail($id)->name);
    }

    /**
     * Display a list of status
     * Created by smartrahat Date: 01.11.2015 Time 03:12AM
     * @return array
     */
    public function status()
    {
        return [
            'Active'=>'Active',
            'Off Hired'=>'Off Hired',
            'Garage'=>'Garage',
            'Sold'=>'Sold',
            'Demolished'=>'Demolished',
            'Stolen'=>'Stolen',
            'In Prison'=>'In Prison'
        ];
    }
}