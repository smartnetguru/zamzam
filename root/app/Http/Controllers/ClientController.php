<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientLog;
use App\Employee;
use App\Http\Requests\ClientRequest;
use App\Log;
use App\Repositories\ClientRepository;
use App\VehicleLog;
use App\Vehicles;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = 'CLIENT';
        if(Input::has('cid')){
            $id = Input::get('cid');
            $clients = Client::where('cid',$id)->paginate(10);
        }elseif(Input::has('name')){
            $name = Input::get('name');
            $clients = Client::where('name','like','%'.$name.'%')->paginate(10);
        }elseif(Input::has('contact_person')){
            $contact_person = Input::get('contact_person');
            $clients = Client::where('contact_person','like','%'.$contact_person.'%')->paginate(10);
        }elseif(Input::has('city')){
            $city = Input::get('city');
            $clients = Client::where('city','like','%'.$city.'%')->paginate(10);
        }elseif(Input::has('state')){
            $state = Input::get('state');
            $clients = Client::where('state','like','%'.$state.'%')->paginate(10);
        }else{
            $clients = Client::paginate(10);
        }
        $repository = $this->repository;
        return view('client/index',compact('title','clients','repository'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = 'CREATE CLIENT';
        $repository = $this->repository;
        return view('client.create', compact('title','repository'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientRequest  $request
     * @return Response
     */
    public function store(ClientRequest $request)
    {
        if($request->hasFile('logo')){
            $image_name = $request->cid.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(base_path().'/resources/assets/images/client',$image_name);
            $data = $request->except('logo');
            $data['logo'] = $image_name;
            $data['status'] = 'Active';
            Client::create($data);
        }else{
            $request['status'] = 'Active';
            Client::create($request->except('logo'));
        }
        Session::flash('success_message','Client has been created successfully!');
        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $title = $client->name;
        $drivers = Employee::where('cid',$id)->where('status','Active')->get(['name']);
        $vehicles = Vehicles::where('cid',$id)->where('status','Active')->get(['registration']);
        $repository = $this->repository;
        return view('client.show',compact('title','client','status','repository','drivers','vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $title = 'EDIT '.$client->name;
        $repository = $this->repository;
        return view('client.edit',compact('title','client','repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClientRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        if($request->hasFile('logo')){
            $image_name = $request->cid.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(base_path().'/resources/assets/images/client',$image_name);
            $data = $request->except('logo');
            $data['logo'] = $image_name;
            $client->update($data);
        }else{
            $client->update($request->except('logo'));
        }
        Session::flash('success_message','Client Updated Successfully');
        return redirect('client/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $logo = $client->logo;
        File::delete('root/resources/assets/images/client/'.$logo);
        $client->delete();
        Session::flash('success_message','Successfully Deleted the Client');
        return redirect('client');
    }

    public function addStatus(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->only('status')); // update client table
        $request['c_description'] = 'Status Changed';
        $request['action'] = $request['status'];
        Log::create($request->all()); // update log table
        return redirect('client/'.$id);
    }

    public function addDriver(Request $request)
    {
        $request['action'] = 'Add driver';
        $request['c_description'] = 'Driver added';
        $request['e_description'] = 'Add to client';
        Log::create($request->all()); // update log

        $employee = Employee::find($request['eid']);
        $employee != null ? $employee->update($request->only('cid')) : redirect('client/'.$request['cid']); //update driver's foreign key
        return redirect('client/'.$request['cid']);
    }

    public function removeDriver(Request $request)
    {
        $redirect = $request['cid'];

        $request['c_description'] = 'Driver removed';
        $request['e_description'] = 'Removed form client';
        $request['action'] = 'Remove';
        Log::create($request->all()); // update log

        $driver = Employee::findOrFail($request['eid']);
        $request['cid']=0;
        $driver->update($request->only(['cid'])); // update driver's foreign key

        return redirect('client/'.$redirect);
    }

    public function addVehicle(Request $request)
    {
        $request['action'] = 'Add bus';
        $request['b_description'] = 'Assign to client';
        $request['c_description'] = 'Bus added';
        Log::create($request->all()); // update log

        $vehicle = Vehicles::findOrFail($request['bid']);
        $vehicle != null ? $vehicle->update($request->only(['cid'])) : redirect('client/'.$request['cid']); // update bus's foreign key
        return redirect('client/'.$request['cid']);
    }

    public function removeVehicle(Request $request)
    {
        $redirect = $request['cid'];

        $request['c_description'] = 'Bus removed';
        $request['b_description'] = 'Removed form client';
        $request['action'] = 'Remove';
        Log::create($request->all()); // update log

        $vehicle = Vehicles::findOrFail($request['bid']);
        $request['cid']=0;
        $vehicle->update($request->only(['cid'])); // update vehicle's foreign key

        return redirect('client/'.$redirect);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function clientLog($id)
    {
        $title = 'Client Log';
        $client = Client::query()->findOrFail($id);
        if(Input::has('start')&&Input::has('end')){
            $start = Input::get('start');
            $end = Input::get('end');
            $logs = Log::where('cid',$id)->whereBetween('date',[$start,$end])->orderBy('date','desc')->orderBy('date','desc')->get();
        }elseif(Input::has('start')){
            $start = Input::get('start');
            $logs = Log::where('cid',$id)->where('date',$start)->orderBy('date','desc')->orderBy('id','desc')->get();
        }elseif(Input::has('end')){
            $end = Input::get('end');
            $logs = Log::where('cid',$id)->where('date',$end)->orderBy('date','desc')->orderBy('id','desc')->get();
        }else{
            $logs = Log::where('cid',$id)->orderBy('date','desc')->orderBy('id','desc')->get();
        }
        //$logs = Log::where('cid',$id)->orderBy('date','desc')->orderBy('id','desc')->get();
        $repository = $this->repository;
        return view('client.clientLog',compact('title','logs','client','repository'));
    }

    /**
     * Remove records from storage
     * Created by smartrahat Date: 23.11.2015 Time: 03:31PM
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyLog($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();
        return redirect('clientLog/'.$log->cid);
    }
}