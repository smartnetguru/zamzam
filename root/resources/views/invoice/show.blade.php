@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning no-print">
        <h1 class="text-center">Invoice</h1>
    </div>
    {{--<div class="col-md-12 alert alert-success only-print">--}}
    {{--<div class="col-md-4 text-left">--}}
    {{--<h3>ZAM ZAM</h3>--}}
    {{--<p>Transport & Service</p>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 text-center">--}}
    {{--<img src="{{ asset('root/resources/assets/images/pad_logo.png') }}" alt="" height="50px"/>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 text-right">--}}
    {{--<h3>زم زم</h3>--}}
    {{--<p>النقل والخدمات</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="col-md-12 d-section pad">
        <div class="col-md-4">
            <p>To</p>
            <p><b>{{ $clients->client }}</b></p>
            <p>{{ $clients->address }}<br/>{{ $clients->city }},&nbsp;{{ $clients->country }}</p>
        </div>
        <div class="col-md-4 only-print"><p>INVOICE</p></div>
        <div class="col-md-4">
            <a href="javascript:window.print()" class="no-print"><img src="{{ asset('root/resources/assets/images/print-icon.png') }}" alt="Print"/></a>
            <p>Date: {{ $clients->date }}</p>
            <p>Invoice Number: {{ $clients->invoiceNumber }}</p>
            <p>Month: {{ $clients->month }}</p>
        </div>
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>Description</th>
                <th>Duty</th>
                <th>Rate</th>
                <th>O.T. Hours</th>
                <th>O.T. Rate</th>
                <th>Bill</th>
                <th>O.T. Bill</th>
                <th>Total Bill</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoiceCollection as $invoice)
                <tr>
                    <td>{{ $invoice->is_driver }}&nbsp;|&nbsp;Bus no:&nbsp;{{ $invoice->vehicle }}</td>
                    <td>{{ $invoice->duty }}</td>
                    <td align="right">{{ number_format($invoice->amount) }}/=</td>
                    <td align="right">{{ $invoice->ot }} hrs</td>
                    <td align="right">{{ $invoice->ot_rate }}/=</td>
                    <td align="right">{{ number_format($invoice->bill) }}/=</td>
                    <td align="right">{{ $invoice->ot_bill }}/=</td>
                    <td align="right">{{ number_format($invoice->bill + $invoice->ot_bill) }}/=
                        {!! Form::open(['action'=>['InvoiceController@destroy',$invoice->id],'method'=>'delete','class'=>'element no-print','onsubmit'=>'return confirmDelete()']) !!}
                        <a href="{{ action('InvoiceController@edit',$invoice->id) }}" role="button" class="btnn btn-warning" title="Edit Current Entry"><span class="glyphicon glyphicon-edit"></span></a>
                        {!! Form::submit('X',['class'=>'btnn btn-danger','title'=>'Remove Current Entry']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="7" class="text-right">Previous Due</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">Total Payable</td>
                <td align="right">{{ number_format($sum->sum('bill') + $sum->sum('ot_bill')) }}/=</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 d-section">

        @include('invoice.convert_number_to_words')

        <p>In Word: {{ ucwords(convert_number_to_words($sum->sum('bill') + $sum->sum('ot_bill'))) }} Riyal Only.</p>
    </div>
    <div class="col-md-12 d-section only-print">
        <p>Make all checks payable to: Zam Zam Transport & Services company.<br/>Payment is due within 30 days.<br/>If you have any query concerning this invoice please contact:<br/>Mobile: 33460110 e-mail: coolmitu2001@gmail.com</p>
    </div>
    <div class="col-md-12 d-section only-print text-center">
        <table class="table table-bordered table-condensed">
            <tr>
                <td>Manager</td>
                <td>Accountant</td>
                <td>Receiver</td>
            </tr>
            <tr class="signature">
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="only-print">
        <hr/>
    </div>
@stop

@section('script')
    <script>
        /**
         * Show confirmation message before delete
         * Created at October 18, 2015|Time 10:15 PM by smartrahat
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are you really want to delete this entry?');
            return !!x;
        }
    </script>
@stop