<?php

namespace App\Http\Controllers;

use App\CashIn;
use App\Client;
use App\Http\Requests\CashInRequest;
use App\Ledger;
use App\Repositories\CashInRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PhpSpec\Exception\Exception;

class CashInController extends Controller
{
    /**
     * Cash In Repository
     * @var
     */
    private $repository;

    /**
     * @param CashInRepository $repository
     */
    public function __construct(CashInRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'CASH IN';
        if(Input::has('voucher')){
            $voucher = Input::get('voucher');
            $cashIns = CashIn::where('voucher','like','%'.$voucher.'%')->orderBy('date','desc')->paginate(10);
        }elseif(Input::has('client')){
            $client = Input::get('client');
            $cashIns = CashIn::where('client','like','%'.$client.'%')->orderBy('date','desc')->paginate(10);
        }elseif(Input::has('date')){
            $date = Input::get('date');
            $cashIns = CashIn::where('date',$date)->orderBy('date','desc')->paginate(10);
        }else{
            $cashIns = CashIn::orderBy('date','desc')->paginate(10);
        }
        $repository = $this->repository;
        return view('cashIn.index',compact('title','cashIns','repository'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = 'COLLECT';
        $repository = $this->repository;
        return view('cashIn.create',compact('title','repository'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CashInRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CashInRequest $request)
    {
        CashIn::create($request->all());
        $data = [
            'date' => $request['date'],
            'client' => $request['client'],
            'description' => $request['for'],
            'reference' => $request['voucher'],
            'credit' => $request['amount']
        ];
        Ledger::create($data);
        Session::flash('success_message','Transaction Saved Successfully!');
        return redirect('cashIn');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\view\view
     */
    public function show($id)
    {
        $cashIn = CashIn::query()->findOrFail($id);
        $title = $cashIn['client'].' |  Payment';
        return view('cashIn.show',compact('cashIn','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\view\view
     */
    public function edit($id)
    {
        $title = 'Edit Payment Collection';
        $cashIn = CashIn::query()->findOrFail($id);
        $repository = $this->repository;
        return view('cashIn.edit',compact('title','cashIn','repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CashInRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CashInRequest $request, $id)
    {
        $cashIn = CashIn::query()->findOrFail($id);
        $cashIn->update($request->all());

        $ledger = Ledger::all()->where('reference',$cashIn['voucher'])->first();
        $data = [
            'date' => $request['date'],
            'client' => $request['client'],
            'description' => $request['for'],
            'reference' => $request['voucher'],
            'credit' => $request['amount']
        ];
        $ledger->update($data);

        Session::flash('success_message','Transaction Updated Successfully!');
        return redirect('cashIn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $cashIn = CashIn::query()->findOrFail($id);
        $cashIn->delete();

        Ledger::query()->where('reference',$cashIn->voucher)->delete();

        Session::flash('success_message','Transaction Deleted Successfully!');
        return redirect('cashIn');
    }

    /**
     * Display ledger of individual client
     * Created by smartrahat Date: 08.12.2015 Time: 09:36PM
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function ledger(Request $request)
    {
        $title = 'Ledger';
        $ledgers = Ledger::all()->where('client', $request['client']);
        return view('cashIn.ledger',compact('title','ledgers'));
    }

}
