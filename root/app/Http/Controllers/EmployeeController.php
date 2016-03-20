<?php
/**
 * Employee Controller
 * Created by smartrahat
 * Date:2015.09.02 Time:12:24AM
 */
namespace App\Http\Controllers;

use App\Client;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Log;
use App\Repositories\EmployeeRepository;

use App\Http\Requests;
use App\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    private $repository;

    /**
     * @param EmployeeRepository $repository
     */
    public function __construct(EmployeeRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display a list of employee
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'EMPLOYEE';
        if(Input::has('eid')){
            $id = Input::get('eid');
            $employees = Employee::where('eid',$id)->paginate(5);
        }elseif(Input::has('name')){
            $name = Input::get('name');
            $employees = Employee::where('name','like','%'.$name.'%')->paginate(5);
        }elseif(Input::has('license')){
            $license = Input::get('license');
            $employees = Employee::where('license','like','%'.$license.'%')->paginate(5);
        }elseif(Input::has('visa')){
            $visa = Input::get('visa');
            $employees = Employee::where('visa','like','%'.$visa.'%')->paginate(5);
        }elseif(Input::has('per_country')){
            $country = Input::get('per_country');
            $employees = Employee::where('per_country',$country)->paginate(5);
        }else{
            $employees = Employee::paginate(10);
        }
        $repository = $this->repository;
        //dd($employees);

        return view('employee.index', compact('title', 'employees','repository'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = 'ADD EMPLOYEE';
        //$img_src = '#';
        $repository = $this->repository;
        return view('employee.create', compact('title','repository'));
    }

    /**
     * Store newly added employee on database
     * @param EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EmployeeRequest $request)
    {
        if($request->hasFile('image')){
            $image_name = $request->eid.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path().'/resources/assets/images/employee', $image_name);
            $data = ($request->except(['image']));
            $data['image'] = $image_name;
            $data['status'] = 'Active';
            Employee::create($data);
        }else{
            $request['status'] = 'Active';
            Employee::create($request->all());
        }

        Session::flash('success_message', 'Employee has been added successfully!');
        return redirect('employee');

    }

    /**
     * Display records of a specified driver.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $employee = Employee::query()->findOrFail($id);
        $title = $employee['name'];
        $client = Client::all()->where('id',$employee['cid'])->sortByDesc('updated_at')->first();
        $vehicle = Vehicles::all()->where('eid',$employee['id'])->sortByDesc('updated_at')->first();
        $police = Log::all()->where('action','Police Case')->where('eid',$employee['id'])->sortByDesc('updated_at')->count();
        $accident = Log::all()->where('action','Accident')->where('eid',$employee['id'])->sortByDesc('updated_at')->count();
        $repository = $this->repository;

        return view('employee.show', compact('title','employee','vehicle','client','status','repository','accident','police'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $title = 'EDIT EMPLOYEE';
        $employee = Employee::query()->findOrFail($id);
        //$img_src = '{{ asset("root/resources/assets/images/employee")."/".$employee->id }}';
        $repository = $this->repository;
        return view('employee.edit', compact('title','repository','employee'));
    }

    /**
     * Update Employee Information in Database
     * @param EmployeeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::query()->findOrFail($id);
        if($request->hasFile('image')){
            $image_name = $request->eid.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path().'/resources/assets/images/employee', $image_name);
            $data = $request->except('image');
            $data['image'] = $image_name;
            $employee->update($data);
        }else{
            $employee->update($request->except('image'));
        }
        Session::flash('success_message','Employee Updated Successfully');
        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $employee = Employee::query()->findOrFail($id);
        $image = $employee->image;
        File::delete('root/resources/assets/images/employee/'.$image);
        $employee->delete();
        Session::flash('success_message','The employee has been successfully deleted!');
        return redirect('employee');
    }

    /**
     * Store driver status in storage
     * @param Request $request
     * Created by smartrahat Date: 04.11.2015 Time: 10:12PM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeStatus(Request $request)
    {
        $employee = Employee::query()->findOrFail($request['eid']);
        $employee->update(['status'=>$request['status']]); // Update status on employee table
        $request['action'] = $request['status'];
        $request['e_description'] = 'Status Changed';
        Log::create($request->all()); // Update log table
        return redirect('employee/'.$request['eid']);
    }

    /**
     * Store Vehicle information associated with drivers
     * @param Request $request
     * Created by smartrahat Date: 04.11.2015 Time: 02:35PM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeVehicle(Request $request)
    {
        $request['action'] = 'Add';
        $request['e_description'] = 'Assign bus';
        $request['b_description'] = 'Assign driver';
        Log::create($request->all());
        $vehicle = Vehicles::query()->findOrFail($request['bid']);
        $vehicle->update($request->only('eid'));
        return redirect('employee/'.$request['eid']);
    }

    /**
     * Store client information associated with driver
     * @param Request $request
     * Created by smartrahat Date: 04.11.2015 Time: 02:39PM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeClient(Request $request)
    {
        $request['action'] = 'Add';
        $request['c_description'] = 'Add driver';
        $request['e_description'] = 'Assign to client';
        $employee = Employee::findOrFail($request['eid']);
        $employee->update($request->only('cid'));
        Log::create($request->all());
        return redirect('employee/'.$request['eid']);
    }

    /**
     * Store police cases information in storage
     * @param Request $request
     * Created by smartrahat Date: 05.11.2015 Time: 10:32AM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function employeeCase(Request $request)
    {
        $request['action'] = 'Police Case';
        $request['b_description'] = $request['e_description'];
        Log::create($request->all());
        return redirect('employee/'.$request['eid']);
    }

    /**
     * Store accidents information in storage
     * @param Request $request
     * Created by smartrahat Date: 05.11.2015 Time: 10:33AM
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function employeeAccident(Request $request)
    {
        $request['action'] = 'Accident';
        $request['b_description'] = $request['e_description'];
        Log::create($request->all());
        return redirect('employee/'.$request['eid']);
    }

    public function employeeLog($id)
    {
        $title = 'Employee Log';
        $employee = Employee::query()->findOrFail($id);
        $logs = Log::where('eid',$id)->orderBy('id','desc')->orderBy('id','desc')->get();
        $repository = $this->repository;
        return view('employee.employeeLog',compact('title','logs','employee','repository'));
    }

    public function destroyLog($id)
    {
        $log = Log::query()->findOrFail($id);
        $log->delete();
        return redirect('employeeLog/'.$log->eid);
    }
}
