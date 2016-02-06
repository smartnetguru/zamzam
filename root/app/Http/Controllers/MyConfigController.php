<?php

namespace App\Http\Controllers;

use App\Brands;
use App\BusinessType;
use App\City;
use App\Country;
use App\Designation;
use App\Http\Requests\MyConfigRequest;
use App\Models;
use App\MyConfig;
use App\State;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MyConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = 'CONFIG';
        $country = Country::all()->sortBy('country');
        $designation = Designation::all()->sortBy('designation');
        $city = City::all()->sortBy('city');
        $state = State::all()->sortBy('state');
        $brands = Brands::all()->sortBy('brand');
        $models = Models::all()->sortBy('model');
        $businessType = BusinessType::all()->sortBy('name');
        return view('myConfig.index',compact('title','country','designation','city','state','brands','models','businessType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store newly created Country in storage
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeCountry(MyConfigRequest $request)
    {
        Country::create($request->all());
        Session::flash('success_message','Country Inserted Successfully!');
        return redirect('config');
    }

    /**
     * Store newly created Designation in storage
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeDesignation(MyConfigRequest $request)
    {
        Designation::create($request->all());
        Session::flash('success_message','Designation has been inserted');
        return redirect('config');
    }

    /**
     * Store newly created City in storage
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeCity(MyConfigRequest $request)
    {
        City::create($request->all());
        Session::flash('success_message','City has been inserted');
        return redirect('config');
    }

    /**
     * Store newly created State in storage.
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeState(MyConfigRequest $request)
    {
        State::create($request->all());
        Session::flash('success_message','State has been inserted!');
        return redirect('config');
    }

    /**
     * Store newly created Vehicle Brand in storage
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeBrand(MyConfigRequest $request)
    {
        Brands::create($request->all());
        Session::flash('success_message','Brand has been inserted!');
        return redirect('config');
    }

    /**
     * Store newly created Vehicle Model in storage
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeModel(MyConfigRequest $request)
    {
        Models::create($request->all());
        Session::flash('success_message','Model has been inserted successfully!');
        return redirect('config');
    }

    /**
     * Store newly created Business Type in storage
     * @param MyConfigRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeBusiness(MyConfigRequest $request)
    {
        BusinessType::create($request->all());
        Session::flash('success_message','Business Type has been inserted successfully!');
        return redirect('config');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove a country from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyCountry($id)
    {
        Country::where('id',$id)->delete();
        Session::flash('success_message','Country has been deleted from database');
        return redirect('config');
    }

    /**
     * Remove a designation from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyDesignation($id)
    {
        Designation::where('id',$id)->delete();
        Session::flash('success_message','Designation has been deleted from database');
        return redirect('config');
    }

    /**
     * Remove a City from storage
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyCity($id)
    {
        City::where('id',$id)->delete();
        Session::flash('success_message','City has been deleted from database');
        return redirect('config');
    }

    /**
     * Remove a State from storage
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyState($id)
    {
        State::where('id',$id)->delete();
        Session::flash('success_message','State has been deleted from database');
        return redirect('config');
    }

    /**
     * Remove a Brand from storage
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyBrand($id)
    {
        Brands::where('id',$id)->delete();
        Session::flash('success_message','Brand has been deleted from database');
        return redirect('config');
    }

    /**
     * Remove a Model from storage
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyModel($id)
    {
        Models::where('id',$id)->delete();
        Session::flash('success_message','Model has been deleted from database');
        return redirect('config');
    }

    public function destroyBusiness($id)
    {
        BusinessType::where('id',$id)->delete();
        Session::flash('success_message','Business Type has been deleted successfully!');
        return redirect('config');
    }
}
