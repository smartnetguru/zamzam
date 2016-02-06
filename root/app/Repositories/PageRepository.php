<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 9/12/2015
 * Time: 2:28 AM
 */

namespace App\Repositories;


use App\Employee;
use App\Vehicles;
use Carbon\Carbon;

class PageRepository {

    public function totalEmployee()
    {
        $result = Employee::count();
        return $result;
    }

    public function employeeLicenseExpire()
    {
        $result = Employee::where('license_expire','<',Carbon::now()->addDays(30))->count();
        return $result;
    }

    public function employeeVisaExpire()
    {
        $result = Employee::where('visa_expire','<',Carbon::now()->addDays(30))->count();
        return $result;
    }

    public function employeePassportExpire()
    {
        return Employee::where('passport_expire','<',Carbon::now()->addDays(30))->count();
    }

    public function totalVehicle()
    {
        return Vehicles::count();
    }

    public function vehicleRegistrationExpire()
    {
        return Vehicles::where('registration_expire','<',Carbon::now()->addDays(30))->count();
    }

}