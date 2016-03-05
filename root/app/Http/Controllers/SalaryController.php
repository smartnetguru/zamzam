<?php

namespace App\Http\Controllers;

use App\Advance;
use App\Employee;
use App\Repositories\SalaryRepository;
use App\Salary;
use App\Vehicles;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SalaryController extends Controller
{
    /**
     * @var SalaryRepository
     */
    private $repository;

    /**
     * @param SalaryRepository $repository
     */
    public function __construct(SalaryRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Created by smartrahat Date: 09.12.2015 Time: 06:51AM
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'Salary';
        //$month = Carbon::now()->subMonth(1)->format('F');
        if(Input::has('month')){
            $month = Input::get('month');
        }else{
            $month = Carbon::now()->subMonth(1)->format('F Y');
        }
        //dd($month);
        $employees = DB::table('employees')
            ->join('salaries','employees.eid','=','salaries.eid')
            ->where('paid',0)
            ->where('month',$month)
            ->where('employees.status','!=','resign')
            //->orWhere('status','!=','Vacation')
            //->orWhere('status','!=','Off Hired')
            ->select(
                'employees.*',
                'employees.id as employee_id',
                'salaries.id',
                'salaries.start',
                'salaries.end',
                'salaries.worked',
                'salaries.ot_hour',
                'salaries.ot_amount',
                'salaries.basic_amount'
            )
            ->get();

        //dd($employees);

        //$deduction = Advance::all()->where('eid',$employees->eid)->where('effect_month',$month)->pluck('deduction_rate');

        $queryOfThisMonth = Salary::all()->where('type','0')->where('month',$month);
        $basicOfThisMonth = $queryOfThisMonth->sum('basic_amount');
        $otOfThisMonth = $queryOfThisMonth->sum('ot_amount');
        $totalDriverOfThisMonth = $queryOfThisMonth->pluck('eid')->count();
        //dd($salaryOfTheMonth);
        $repository = $this->repository;
        return view('salary.index',compact('title','employees','repository','basicOfThisMonth','otOfThisMonth','totalDriverOfThisMonth','deduction'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function lists()
    {
        $title = 'Create Salary';
        $employees = DB::table('employees')
            ->leftjoin('clients','employees.cid','=','clients.id')
            ->leftjoin('salaries','employees.eid','=','salaries.eid')
            ->where('employees.status','!=','resign')
            ->where('month',null)
            ->orWhere('type','!=',0)
            ->distinct()
            ->select('employees.*','clients.name as client','salaries.month')
            ->get();
        //dd($employees);
        $repository = $this->repository;
        return view('salary.lists',compact('title','employees','repository'));
    }

    /**
     * Display a salary create form
     * @param $id
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $title = 'Create Salary';
        $employee = Employee::query()->findOrFail($id);
        $paid = Salary::all()->where('eid',$employee['eid'])->sum('paid');
        $due = Salary::all()->where('eid',$employee['eid'])->sum('total');

        //$advance = $paid > $due ? $paid - $due : 0;
        $advance = Advance::all()->where('eid',$employee['eid'])->where('effect_month',Carbon::now()->subMonths(1)->format('F Y'))->pluck('deduction_rate')->first();
        //dd($advance);
        //dd(Carbon::now()->subMonths(1)->format('F Y'));
        $due = $due > $paid ? $due - $paid :0;

        $repository = $this->repository;
        return view('salary.create',compact('title','repository','employee','advance','due'));
    }

    /**
     * Store the salary information a driver
     * Created by smartrahat Date: 2016.01.03 Time: 09:21PM
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request['month'] = $request['month'].' '.$request['year'];
        Salary::create($request->all());
        Session::flash('success_message','Successfully created salary');
        return redirect('salary');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $title = 'Individual Salary';
        $employee = Salary::query()->findOrFail($id);
        $salaries = Salary::all()->where('eid',$employee['eid'])->sortByDesc('id')->sortByDesc('date');
        $balance = $salaries->pluck('total')->sum() - $salaries->pluck('paid')->sum();
        return view('salary.show',compact('employee','title','salaries','balance'));
    }

    /**
     * View salary edit form for a employee
     * Created by smartrahat Date: 2016.01.14 Time: 02:34 PM
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $title = 'Edit Salary';
        $salary = Salary::query()->findOrFail($id);
        $paid = Salary::all()->where('eid',$salary['eid'])->sum('paid');
        $due = Salary::all()->where('eid',$salary['eid'])->sum('total');

        $advance = $paid > $due ? $paid - $due : 0;
        $due = $due > $paid ? $due - $paid :0;

        $repository = $this->repository;
        return view('salary.edit',compact('title','salary','repository','advance','due'));
    }

    /**
     * Update salary for selected employee
     * Created by smartrahat Date: 2016.01.14 Time: 03:08 AM
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $salary = Salary::query()->findOrFail($id);
        //dd($salary);
        $request['month'] = $request['month'].' '.$request['year'];
        $salary->update($request->all());
        Session::flash('success_message','Salary updated successfully');
        return redirect('salary');
    }

    /**
     * Created by smartrahat Date: 2016.01.15 Time: 3:42 AM
     * @param $id
     * @return \Illuminate\View\View
     */
    public function payment($id)
    {
        $title = 'Pay Salary';
        $salary = Salary::query()->findOrFail($id);
        $paid = Salary::all()->where('eid',$salary['eid'])->sum('paid');
        $due = Salary::all()->where('eid',$salary['eid'])->sum('total');
        $last = $salary['total'];
        $balance = $paid > $due ? ($paid - $due) - $last : ($due - $paid - $last);
        $payable = $paid > $due ? $paid - $due : $due - $paid;
        //dd($last);
        $repository = $this->repository;
        return view('salary.payment',compact('title','salary','repository','balance','payable'));
    }

    /**
     * Pay salary
     * Created by smartrahat Date: 2016.01.15 Time: 05:10 PM
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function pay(Request $request)
    {
        if(Input::get('due')){
            $request['type'] = 1;
            $request['total'] = 0;
        }elseif(Input::get('advance')){
            $request['type'] = 2;
        }
        //dd($request->all());
        $request['month'] = $request['month'].' '.$request['year'];
        Salary::create($request->all());
        Session::flash('success_message','Paid Successfully');
        return redirect('salary');
    }

    /**
     * Display payment edit form
     * Created by smartrahat Date: 2016.01.20 Time: 05:50 AM
     * @param $id
     * @return \Illuminate\View\View
     */
    public function editPayment($id)
    {
        $title = 'Edit Payment';
        $salary = Salary::query()->findOrFail($id);
        $paid = Salary::all()->where('eid',$salary['eid'])->sum('paid');
        $due = Salary::all()->where('eid',$salary['eid'])->sum('total');
        $last = $salary['total'];
        $balance = $paid > $due ? ($paid - $due) - $last : ($due - $paid - $last);
        $payable = $paid > $due ? $paid - $due : $due - $paid;
        $repository = $this->repository;
        return view('salary.edit_payment',compact('title','salary','repository','balance','payable'));
    }

    /**
     * Update payment history
     * Created by smartrahat Date: 2016.01.20 Time: 05:27 AM
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePayment(Request $request, $id)
    {
        $salary = Salary::query()->findOrFail($id);
        $request['month'] = $request['month'].' '.$request['year'];
        $salary->update($request->all());
        Session::flash('success_message','Updated Successfully');
        return redirect('salary');
    }

    /**
     * Created by smartrahat Date: 2016.01.15 Time: 5:12 PM
     * @return \Illuminate\View\View
     */
    public function advance()
    {
        $title = 'Advance Salary';
        $repository = $this->repository;
        return view('salary.advance',compact('title','repository'));
    }

    public function payAdvance(Request $request)
    {
        if($request['rate1'] > 0){
            $request['effect_month'] = $request['effect_from1'].' '.$request['year1'];
            $request['deduction_rate'] = $request['rate1'];
            //dd($request->all());
            Advance::create($request->all());
        }

        if($request['rate2'] > 0){
            $request['effect_month'] = $request['effect_from2'].' '.$request['year2'];
            $request['deduction_rate'] = $request['rate2'];
            //dd($request->all());
            Advance::create($request->all());
        }

        if($request['rate3'] > 0){
            $request['effect_month'] = $request['effect_from3'].' '.$request['year3'];
            $request['deduction_rate'] = $request['rate3'];
            //dd($request->all());
            Advance::create($request->all());
        }

        Session::flash('success_message','Advance Paid Successfully');
        return redirect('salary');
    }

    /**
     * Display advance edit form
     * Created smartrahat Date: 2016.01.20 Time: 05:59 AM
     * @param $id
     * @return \Illuminate\View\View
     */
    public function editAdvance($id)
    {
        $title = 'Edit Advance';
        $salary = Salary::query()->findOrFail($id);
        $repository = $this->repository;
        return view('salary.edit_advance',compact('title','salary','repository'));
    }

    /**
     * Delete a created salary
     * Created by smartrahat Date: 2016.01.14 Time: 03:15 AM
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        Salary::query()->findOrFail($id)->delete();
        Session::flash('success_message','Salary deleted successfully');
        return redirect('salary');
    }

    /**
     * Detect driver name on ajax request
     * @param Request $request
     * @return static
     */
    public function driver(Request $request)
    {
        $eid = $request->get('eid');
        $driver = Employee::all()->where('eid',$eid)->pluck('name');
        return $driver;
    }

    /**
     * Check if already has advance
     * Created by smartrahat Date: 2016.02.19 Time: 09:57 AM
     * @param Request $request
     * @return string
     */
    public function isAdvance(Request $request)
    {
        $eid = $request->get('eid');
        $advance = Advance::all()
            ->where('eid',$eid)
            ->where('effect_month',Carbon::now()->subMonth(1)->format('F Y'))
            ->pluck('total')
            ->first();
        $warning = $advance != null ? 'This employee already has advance' : '';
        return $warning;
    }

}
