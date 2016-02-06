<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 9/18/2015
 * Time: 2:34 AM
 */

namespace App\Repositories;


use App\BusinessType;
use App\City;
use App\Country;
use App\Designation;

class VendorRepository {

    /**
     * Display a list of Business Type from Storage
     * @return array
     */
    public function businessType()
    {
        return BusinessType::all()->lists('name','name');
    }

    /**
     * Display list of Country from Storage
     * @return static
     */
    public function country()
    {
        return Country::all()->lists('country','country');
    }

    /**
     * Display a list of City from Storage
     * @return static
     */
    public function city()
    {
        return City::all()->lists('city','city');
    }

    /**
     * Display a list Designation form Storage
     * @return static
     */
    public function designation()
    {
        return Designation::all()->lists('designation','designation');
    }

}