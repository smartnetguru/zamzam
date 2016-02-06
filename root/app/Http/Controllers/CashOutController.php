<?php

namespace App\Http\Controllers;

use App\CashOut;
use App\Http\Requests\CashOutRequest;
use App\Repositories\CashOutRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CashOutController extends Controller
{
    /**
     * @var CashOutRepository
     */
    private $repository;

    /**
     * @param CashOutRepository $repository
     */
    public function __construct(CashOutRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     * Last update by smartrahat Date: 23.11.2015 Time: 10:03PM
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'CASH OUT';
        if(Input::has('voucher')){
            $voucher = Input::get('voucher');
            $cashOuts = CashOut::where('voucher','like','%'.$voucher.'%')->orderBy('date','desc')->paginate(10);
        }elseif(Input::has('client')){
            $client = Input::get('client');
            $cashOuts = CashOut::where('client','like','%'.$client.'%')->orderBy('date','desc')->paginate(10);
        }elseif(Input::has('date')){
            $date = Input::get('date');
            $cashOuts = CashOut::where('date',$date)->orderBy('date','desc')->paginate(10);
        }else{
            $cashOuts = CashOut::orderBy('date','desc')->paginate(10);
        }
        return view('cashOut.index',compact('title','cashOuts'));
    }

    /**
     * Show the form for creating a new resource.
     * Created by smartrahat Date: 23.11.2015 Time: 09:45PM
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = 'Cash Out';
        $repository = $this->repository;
        return view('cashOut.create',compact('title','repository'));
    }

    /**
     * Store data to storage
     * Created by smartrahat Date: 23.11.2015 Time: 11:47PM
     * @param CashOutRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CashOutRequest $request)
    {
        CashOut::create($request->all());
        Session::flash('success_message','Transaction Saved Successfully!');
        return redirect('cashOut');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $cashOut = CashOut::findOrFail($id);
        $title = $cashOut->voucher.' | Zam Zam';
        //dd($cashOut->cheque_date);
        return view('cashOut.show',compact('title','cashOut'));
    }

    /**
     * Show the form for editing the specified resource.
     * Created by smartrahat Date: 24.11.2015 Time: 12:01AM
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $title = 'Edit Transaction | Zam Zam';
        $cashOut = CashOut::findOrFail($id);
        $repository = $this->repository;
        return view('cashOut.edit',compact('title','cashOut','repository'));
    }

    /**
     * Update the specified resource in storage.
     * Created by smartrahat Date: 24.11.2015 Time: 12:16AM
     * @param  CashOutRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CashOutRequest $request, $id)
    {
        $cashOut = CashOut::findOrFail($id);
        $cashOut->update($request->all());
        Session::flash('success_message','Transaction Updated Successfully!');
        return redirect('cashOut');
    }

    /**
     * Remove the specified resource from storage.
     * Created by smartrahat Date: 24.11.2015 Time: 12:21AM
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        CashOut::findOrFail($id)->delete();
        Session::flash('success_message','Transaction Deleted Successfully!');
        return redirect('cashOut');
    }
}
