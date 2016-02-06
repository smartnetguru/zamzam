@extends('master')

@section('content')
    <div class="col-md-12 alert alert-success no-print">
        <h3 class="text-center">Cash Receipt</h3>
    </div>
    {{--<div class="col-md-12 alert alert-success only-print">--}}
        {{--<div class="col-md-4 text-left">--}}
            {{--<h3 style="color:green;">ZAM ZAM</h3>--}}
            {{--<p style="color:green;">Transport & Service</p>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 text-center">--}}
            {{--<img src="{{ asset('root/resources/assets/images/pad_logo.png') }}" alt="" height="50px"/>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 text-right">--}}
            {{--<h3 style="color:green;">زم زم</h3>--}}
            {{--<p style="color:green;">النقل والخدمات</p>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="col-md-12 d-section no-print">
        {!! Form::open(['action'=>['CashOutController@destroy',$cashOut->id],'method'=>'delete','role'=>'form','onsubmit'=>'return confirmDelete()']) !!}
        <a href="javascript:window.print()" class="btn btn-success" role="button"><span class="glyphicon glyphicon-print"></span></a>
        <a href="{{ action('CashOutController@edit',$cashOut->id) }}" role="button" class="btn btn-warning">EDIT</a>
        {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <div class="col-md-4">
            <p>Date: {{ $cashOut->date->format('F d, Y') }}</p>
            <p>Paid to: {{ $cashOut->name }}</p>
        </div>
        <div class="col-md-4 only-print"><b>Cash Receipt</b></div>
        <div class="col-md-4">
            <p>Voucher no: {{ $cashOut->voucher }}</p>
        </div>
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>
                    {{ 'For: '.$cashOut->paid_for }}<br/>
                    {{ 'Payment Type: '.$cashOut->type }}<br/>
                    {{ $cashOut->bank != null ? 'Bank: '.$cashOut->bank : null }}<br/>
                    {{ $cashOut->cheque != null ? 'Cheque Number: '.$cashOut->cheque : null }}<br/>
                    {{ $cashOut->cheque_date == '-0001-11-30 00:00:00' ? '' : 'Cheque Date: '.$cashOut->cheque_date->format('F d, Y') }}
{{--                    {{ $cashOut->cheque_date }}--}}
                </td>
                <td>{{ number_format($cashOut->amount) }}/=</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12 d-section">
        @include('invoice.convert_number_to_words')
        <p>In Word: {{ ucwords(convert_number_to_words($cashOut->amount)) }} Riyal Only.</p>
    </div>
    <div class="col-md-12 d-section only-print text-center"> {{-- Signature space for authority. Can be seen only in print view --}}
        <table class="table table-bordered table-condensed">
            <tr>
                <td>Manager</td>
                <td>Accountant</td>
                <td>Cashier</td>
                <td>Receiver</td>
            </tr>
            <tr class="signature">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
@stop

@section('script')
    <script>
        /**
         * Display confirmation message before delete a transaction
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Do you really want to delete this entry?');
            return !!x;
        }
    </script>
@stop