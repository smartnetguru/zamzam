<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Invoice;
use App\Ledger;
use App\Repositories\InvoiceRepository;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    /**
     * @var InvoiceRepository
     */
    private $repository;

    /**
     * @param InvoiceRepository $repository
     */
    public function __construct(InvoiceRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display list of Invoice from storage
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'INVOICE';
        if (Input::has('invoiceNumber')) {
            $invoiceNumber = Input::get('invoiceNumber');
            $invoices = Invoice::where('invoiceNumber','like', '%'.$invoiceNumber.'%')->orderBy('date','desc')->paginate(10);
        } elseif (Input::has('client')) {
            $client = Input::get('client');
            $invoices = Invoice::where('client','like', '%'.$client.'%')->orderBy('date', 'desc')->paginate(10);
        } elseif (Input::has('startDate') && Input::has('endDate')) {
            $startDate = Input::get('startDate');
            $endDate = Input::get('endDate');
            $invoices = Invoice::whereBetween('date', [$startDate, $endDate])->orderBy('date', 'desc')->paginate(10);
        } elseif (Input::has('startDate')) {
            $startDate = Input::get('startDate');
            $invoices = Invoice::where('date', $startDate)->orderBy('date', 'desc')->paginate(10);
        } elseif (Input::has('endDate')) {
            $endDate = Input::get('endDate');
            $invoices = Invoice::where('date', $endDate)->orderBy('date', 'desc')->paginate(10);
        } else {
            $invoices = DB::table('invoices')
                ->join('vehicles', 'invoices.vehicle', '=', 'vehicles.registration')
                ->select(
                    'invoices.*',
                    'vehicles.brand',
                    'vehicles.model',
                    'vehicles.seat',
                    'vehicles.remarks'
                )
                ->orderBy('date', 'desc')
                ->paginate(10);
        }
        return view('invoice.index',compact('title','invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = 'Create Invoice';
        $repository = $this->repository;
        return view('invoice.create',compact('title','repository'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InvoiceRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(InvoiceRequest $request)
    {
        Invoice::create($request->all());

        $isExist = Ledger::query()->get()->contains('reference',$request['invoiceNumber']);
        $data = [
            'date' => $request['date'],
            'client' => $request['client'],
            'description' => $request['comment'],
            'reference' => $request['invoiceNumber'],
            'debit' => $request['bill'] + $request['ot_bill']
        ];
        if($isExist == true){
            $ledger = Ledger::query()->where('reference',$request['invoiceNumber']);
            $data = [
                'debit' => $ledger->get(['debit'])->sum('debit') + $request['ot_bill'] + $request['bill']
            ];
            $ledger->update($data);
        }else{
            Ledger::create($data);
        }

        Session::flash('success_message','Invoice Updated Successfully! If you have more vehicle to add in this Invoice, go to Create and do the same with same Invoice Number and Date!');
        return redirect('invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $invoiceNumber
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($invoiceNumber)
    {
        $title = 'Invoice';
        $invoiceCollection = DB::table('invoices')
            ->where('invoiceNumber',$invoiceNumber)
            ->join('vehicles','invoices.vehicle','=','vehicles.registration')
            ->select(
                'invoices.*',
                'vehicles.brand',
                'vehicles.model',
                'vehicles.seat',
                'vehicles.remarks'
            )
            ->get();
        $clients = DB::table('invoices')
            ->where('invoiceNumber','=',$invoiceNumber)
            ->join('clients','invoices.client','=','clients.name')
            ->select(
                'invoices.*',
                'clients.address',
                'clients.city',
                'clients.country'
            )
            ->first();
        $sum = Invoice::all()->where('invoiceNumber',$invoiceNumber);
        $repository = $this->repository;
        return view('invoice.show',compact('title','clients','invoiceCollection','sum','repository'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $title = 'EDIT INVOICE';
        $invoice = Invoice::query()->findOrfail($id);
        $repository = $this->repository;
        return view('invoice.edit',compact('title','invoice','repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InvoiceRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(InvoiceRequest $request, $id)
    {
        $invoice = Invoice::query()->findOrFail($id);

        $ledger = Ledger::query()->where('reference',$invoice['invoiceNumber'])->first();
        //dd(($ledger->debit - ($invoice->bill + $invoice->ot_bill)) + ($request['bill'] + $request['ot_bill']));
        $data = [
            'date' => $request['date'],
            'client' => $request['client'],
            'description' => $request['comment'],
            'reference' => $request['invoiceNumber'],
            'debit' => ($ledger['debit'] - ($invoice['bill'] + $invoice['ot_bill'])) + ($request['bill'] + $request['ot_bill'])
        ];
        //dd($ledger->debit - ($invoice->bill + $invoice->ot_bill) + ($request['bill'] + $request['ot_bill']));

        $invoice->update($request->all());
        $ledger->update($data);

        return redirect('invoice/'.$invoice['invoiceNumber']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $invoice = Invoice::query()->findOrFail($id);
        $countInvoice = $invoice->where('invoiceNumber',$invoice['invoiceNumber'])->count();
        $ledger = Ledger::query()->where('reference',$invoice['invoiceNumber'])->first();
        //dd($invoice['invoiceNumber']);
        //dd($ledger);
        if($countInvoice <= 1){
            $ledger->delete();
        }else{
            $data = [
                'debit' => $ledger->debit - ($invoice->bill + $invoice->ot_bill)
            ];
            $ledger->update($data);
        }

        $invoice->delete();
        Session::flash('success_message','Entry has been deleted successfully');
        return redirect('invoice');
    }

}
