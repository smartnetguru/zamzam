<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
 * Route for AuthController
 * Created by smartrahat
 * Date: 03.09.2015 Time: 3:20AM
 */
Route::Controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

get('/','PageController@index');

/** EMPLOYEE routes start from here */
resource('employee','EmployeeController');
post('changeStatus','EmployeeController@changeStatus');
post('changeVehicle','EmployeeController@changeVehicle');
post('changeClient','EmployeeController@changeClient');
post('employeeCase','EmployeeController@employeeCase');
post('employeeAccident','EmployeeController@employeeAccident');
get('employeeLog/{id}','EmployeeController@employeeLog');
delete('destroyEmployeeLog/{id}','EmployeeController@destroyLog'); // Delete log information
/** EMPLOYEE routes ends here */

/** VEHICLE routes start form here */
resource('vehicle','VehicleController');
post('assignDriver','VehicleController@assignDriver');
post('assignClient','VehicleController@assignClient');
post('assignStatus','VehicleController@assignStatus');
post('fitnessCheck','VehicleController@fitnessCheck');
post('vehicleCase','VehicleController@vehicleCase');
post('vehicleAccident','VehicleController@vehicleAccident');
get('vehicleLog/{id}','VehicleController@vehicleLog');
delete('destroyVehicleLog/{id}','VehicleController@destroyLog'); // Delete log information
/** VEHICLE routes end here */

/** CLIENT routes start from here */
resource('client','ClientController');
patch('addStatus/{id}','ClientController@addStatus');
post('addDriver','ClientController@addDriver');
post('removeDriver','ClientController@removeDriver');
post('addVehicle','ClientController@addVehicle');
post('removeVehicle','ClientController@removeVehicle');
get('clientLog/{id}','ClientController@clientLog');
delete('destroyClientLog/{id}','ClientController@destroyLog'); // Delete log information
/** CLIENT routes ends here */

/** VENDOR routes start from here */
resource('vendor','MyVendorController');
/** VENDOR routes ends here */

//resource('route','RouteController');

/** Invoice routes starts form here */
resource('invoice','InvoiceController');
/** Invoice routes ends form here */

/** Cash In routes starts from here */
resource('cashIn','CashInController');
get('ledger','CashInController@ledger');
/** Cash In routes ends from here */

/** Cash Out routes starts from here */
resource('cashOut','CashOutController');
/** Cash Out routes ends from here */

/** Salary routes starts from here */
resource('salary','SalaryController');
get('lists','SalaryController@lists');
get('create/{id}','SalaryController@create');
get('payment/{id}','SalaryController@payment');
post('pay','SalaryController@pay');
get('payment/{id}','SalaryController@editPayment');
patch('payment/{id}/edit','SalaryController@updatePayment');
get('advance','SalaryController@advance');
post('payAdvance','SalaryController@payAdvance');
get('advance/{id}','SalaryController@editAdvance');
/** Salary routes ends from here */

/**
 * Route for MyConfigController <p>
 * These routes defined explicitly because in
 * MyConfigController I used multiple methods for store and delete records </p>
 * Created by smartrahat on Date: 06.09.2015 05:23AM | Last Modified: 10.09.2015 08:03PM
 */
get('config','MyConfigController@index');
post('storeCountry','MyConfigController@storeCountry');
post('storeDesignation','MyConfigController@storeDesignation');
post('storeCity','MyConfigController@storeCity');
post('storeState','MyConfigController@storeState');
post('storeBrand','MyConfigController@storeBrand');
post('storeModel','MyConfigController@storeModel');
post('storeBusiness','MyConfigController@storeBusiness');
Route::delete('deleteCountry/{id}','MyConfigController@destroyCountry');
Route::delete('deleteDesignation/{id}','MyConfigController@destroyDesignation');
Route::delete('deleteCity/{id}','MyConfigController@destroyCity');
Route::delete('deleteState/{id}','MyConfigController@destroyState');
Route::delete('deleteBrand/{id}','MyConfigController@destroyBrand');
Route::delete('deleteModel/{id}','MyConfigController@destroyModel');
Route::delete('deleteBusiness/{id}','MyConfigController@destroyBusiness');

post('driver','SalaryController@driver');
