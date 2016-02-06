<?php

namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\Http\Requests\VehicleRequest;
use App\Log;
use App\Repositories\VehicleRepository;
use App\VehicleLog;
use App\Vehicles;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class VehicleController extends Controller
{
    /**
     * @var VehicleRepository
     */
    private $repository;

    public function __construct(VehicleRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        $title = 'VEHICLES';
        if(Input::has('description')){
            $description = Input::get('description');
            $vehicles = Vehicles::where('brand','like','%'.$description.'%')
                ->orWhere('model','like','%'.$description.'%')
                ->orWhere('remarks','like','%'.$description.'%')
                ->paginate(10);
        }elseif(Input::has('bid')){
            $bid = Input::get('bid');
            $vehicles = Vehicles::where('bid',$bid)->paginate(10);
        }elseif(Input::has('vendor')){
            $vendor = Input::get('vendor');
            $vehicles = Vehicles::where('vendor','like','%'.$vendor.'%')->paginate(10);
        }elseif(Input::has('registration')){
            $registration = Input::get('registration');
            $vehicles = Vehicles::where('registration','like','%'.$registration.'%')->paginate(10);
        }elseif(Input::has('seat')){
            $seat = Input::get('seat');
            $vehicles = Vehicles::where('seat',$seat)->paginate(10);
        }else{
            $vehicles = Vehicles::paginate(10);
        }
        $repository = $this->repository;
        return view('vehicle.index',compact('title','vehicles','route','repository'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = 'ADD BUSES';
        $repository = $this->repository;
        return view('vehicle.create',compact('title','repository'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VehicleRequest  $request
     * @return Response
     */
    public function store(VehicleRequest $request)
    {
        if($request->hasFile('image')){
            $image_name = $request->bid.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path().'/resources/assets/images/vehicle',$image_name);
            $data = ($request->except(['image']));
            $data['image'] = $image_name;
            Vehicles::create($data);
        }else{
            Vehicles::create($request->all());
        }
        Session::flash('success_message','Vehicle has been added successfully');
        return redirect('vehicle');
    }

    /**
     * Display the specified resource.
     * Last updated by smartrahat Date: 29.11.2015 Time: 05:51PM
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $title = 'SHOW VEHICLE';
        $vehicle = Vehicles::findOrFail($id);
        $client = Client::all()->where('id',$vehicle->cid)->sortByDesc('updated_at')->first();
        $driver = Employee::all()->where('id',$vehicle->eid)->sortByDesc('updated_at')->first();
        $fitness = Log::all()->where('action','Fitness Check')->where('bid',$vehicle->id)->last();
        $police = Log::all()->where('action','Police Case')->where('bid',$vehicle->id)->sortByDesc('updated_at')->count();
        $accident = Log::all()->where('action','Accident')->where('bid',$vehicle->id)->sortByDesc('updated_at')->count();
        //dd($accident);
        $repository = $this->repository;
        return view('vehicle.show',compact('title','vehicle','driver','client','status','repository','fitness','police','accident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $title = 'EDIT VEHICLE';
        $vehicle = Vehicles::findOrFail($id);
        $repository = $this->repository;
        return view('vehicle.edit',compact('title','vehicle','repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VehicleRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicles::findOrFail($id);
        if($request->hasFile('image')){
            $image_name = $request->bid.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path().'/resources/assets/images/vehicle',$image_name);
            $data = ($request->except('image'));
            $data['image'] = $image_name;
            $vehicle->update($data);
        }else{
            $vehicle->update($request->except(['image']));
        }
        Session::flash('success_message','Vehicle has been updated successfully!');
        return redirect('vehicle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicles::findOrFail($id);
        $image = $vehicle->image;
        FIle::delete('root/resources/assets/images/vehicle/'.$image);
        $vehicle->delete();
        Session::flash('message_success','Vehicle Has Been Deleted Successfully!');
        return redirect('vehicle');
    }

    /**
     * Store drivers associated with vehicle's
     * @param Request $request
     * Created by smartrahat Date: 21.11.2015 Time: 03:45PM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function assignDriver(Request $request)
    {
        $request['b_description'] = 'Assign to driver';
        $request['e_description'] = 'Assign bus';
        $request['action'] = 'Add';
        Log::create($request->all());
        $driver = Vehicles::findOrFail($request['bid']);
        //dd($driver);
        $driver->update($request->only('eid'));
        return redirect('vehicle/'.$request['bid']);
    }

    /**
     * Store clients associated with vehicle's
     * @param Request $request
     * Created by smartrahat Date: 21.11.2015 Time: 02:33AM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function assignClient(Request $request)
    {
        $request['action'] = 'Add';
        $request['c_description'] = 'Add Bus';
        $request['b_description'] = 'Assign to client';
        $vehicle = vehicles::findOrFail($request['bid']);
        $vehicle->update($request->only('cid'));
        Log::create($request->all());
        return redirect('vehicle/'.$request['bid']);
    }

    /**
     * Store vehicle status Change on storage
     * Created by smartrahat Date: 21.11.2015 Time: 10:36PM
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function assignStatus(Request $request)
    {
        $vehicle = Vehicles::findOrFail($request['bid']);
        $vehicle->update(['status'=>$request['status']]); // Update status on vehicle table
        $request['action'] = $request['status'];
        $request['b_description'] = 'Status Changed';
        Log::create($request->all()); // Update log table
        return redirect('vehicle/'.$request['bid']);
    }

    /**
     * Store last fitness test date in storage
     * Created by smartrahat Date: 21.11.2015 Time: 10:38PM
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function fitnessCheck(Request $request)
    {
        $request['action'] = 'Fitness Check';
        Log::create($request->all());
        return redirect('vehicle/'.$request['bid']);
    }
    /**
     * Store police cases information in storage
     * @param Request $request
     * Created by smartrahat Date: 21.11.2015 Time: 10:32AM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function vehicleCase(Request $request)
    {
        $request['action'] = 'Police Case';
        $request['e_description'] = $request['b_description'];
        Log::create($request->all());
        return redirect('vehicle/'.$request['bid']);
    }

    /**
     * Store accidents information in storage
     * @param Request $request
     * Created by smartrahat Date: 21.11.2015 Time: 8:31PM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function vehicleAccident(Request $request)
    {
        $request['action'] = 'Accident';
        $request['e_description'] = $request['b_description'];
        Log::create($request->all());
        return redirect('vehicle/'.$request['bid']);
    }

    /**
     * Show vehicle log from storage
     * Created by smartrahat Date: 21.11.2015 Time: 08:32PM
     * @param $id
     * @return \Illuminate\View\View
     */
    public function vehicleLog($id)
    {
        $vehicle = Vehicles::findOrFail($id);
        $logs = Log::where('bid',$id)->orderBy('date','desc')->orderBy('id','desc')->get();
        $title = 'Vehicle Log';
        $repository = $this->repository;
        return view('vehicle.vehicleLog',compact('title','logs','vehicle','repository'));
    }

    /**
     * Remove information from storage
     * Created by smartrahat Date: 21.11.2015 Time: 10:40PM
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyLog($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();
        return redirect('vehicleLog/'.$log->bid);
    }
}