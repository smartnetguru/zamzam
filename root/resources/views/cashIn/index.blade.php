@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h1 class="text-center">CASH IN TRANSACTIONS</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('CashInController@create') }}" class="btn btn-success" role="button">COLLECT</a>
        <a href="#search" role="button" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="search">SEARCH</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ledger">LEDGER</button>
    </div>
    @include('cashIn.client_model')
    <div class="col-md-12 d-section collapse" id="search">
        {!! Form::open(['action'=>'CashInController@index','class'=>'form-inline','role'=>'form','method'=>'get']) !!}
        {!! Form::text('voucher',null,['class'=>'form-control','placeholder'=>'Voucher Number']) !!}
        {!! Form::text('client',null,['class'=>'form-control','placeholder'=>'CLIENT NAME']) !!}
        {!! Form::text('date',null,['class'=>'form-control datepicker','placeholder'=>'PAYMENT DATE']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Voucher No.</th>
                <th>Client</th>
                <th>Payment Date</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Bank</th>
                <th>Cheque</th>
                <th>Cheque Date</th>
            </tr>
            @foreach($cashIns as $cashIn)
                <tr>
                    <td><a href="{{ action('CashInController@show',$cashIn->id) }}" title="{{ $cashIn->for }}">{{ $cashIn->voucher }}</a></td>
                    <td>{{ $cashIn->client }}</td>
                    <td>{{ $cashIn->date->format('F d, Y') }}</td>
                    <td>{{ $cashIn->type }}</td>
                    <td align="right">{{ number_format($cashIn->amount) }}/=</td>
                    <td>{{ $cashIn->bank }}</td>
                    <td>{{ $cashIn->cheque }}</td>
                    <td>
                        {{ $cashIn->chequeDate == '-0001-11-30 00:00:00' ? '' : $cashIn->chequeDate->format('F d, Y') }}
                        {!! Form::open(['action'=>['CashInController@destroy',$cashIn->id],'onsubmit'=>'return confirmDelete()','method'=>'delete','class'=>'element no-print']) !!}
                        <a href="{{ action('CashInController@edit',$cashIn->id) }}" role="button" class="btnn btn-warning" title="Edit Current Entry"><span class="glyphicon glyphicon-edit"></span></a>
                        {!! Form::submit('X',['class'=>'btnn btn-danger','title'=>'Remove Current Entry']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="text-center">
            {!! $cashIns->render() !!}
        </div>
    </div>
@stop

@section('script')
    <script>
        /**
         * Display confirmation message before delete
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Do you really want to delete this entry?');
            return !!x;
        }

        /**
         * Display Calender on associated input box
         */
        $(document).ready(
                function () {
                    $( ".datepicker" ).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    });
                }
        );
    </script>
@stop