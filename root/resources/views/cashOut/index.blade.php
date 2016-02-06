@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h1 class="text-center">CASH OUT</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('CashOutController@create') }}" class="btn btn-success" role="button">Cash Out</a>
        <a href="#search" role="button" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="search">SEARCH</a>
    </div>
    <div class="col-md-12 d-section collapse" id="search">
        {!! Form::open(['action'=>'CashOutController@index','class'=>'form-inline','role'=>'form','method'=>'get']) !!}
        {!! Form::text('voucher',null,['class'=>'form-control','placeholder'=>'Voucher Number']) !!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Collector Name']) !!}
        {!! Form::text('date',null,['class'=>'form-control datepicker','placeholder'=>'PAYMENT DATE']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>Voucher No.</th>
                    <th>Collector</th>
                    <th>Payment Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Bank</th>
                    <th>Cheque</th>
                    <th>Cheque Date</th>
                </tr>
                @foreach($cashOuts as $cashOut)
                    <tr>
                        <td><a href="{{ action('CashOutController@show',$cashOut->id) }}" title="{{ $cashOut->for }}">{{ $cashOut->voucher }}</a></td>
                        <td>{{ $cashOut->name }}</td>
                        <td>{{ $cashOut->date->format('F d, Y') }}</td>
                        <td>{{ $cashOut->type }}</td>
                        <td align="right">{{ number_format($cashOut->amount) }}/=</td>
                        <td>{{ $cashOut->bank }}</td>
                        <td>{{ $cashOut->cheque }}</td>
                        <td>
                            {{ $cashOut->chequeDate == '-0001-11-30 00:00:00' ? '' : $cashOut->chequeDate->format('F d, Y') }}
                            {!! Form::open(['action'=>['CashOutController@destroy',$cashOut->id],'onsubmit'=>'return confirmDelete()','method'=>'delete','class'=>'element no-print']) !!}
                            <a href="{{ action('CashOutController@edit',$cashOut->id) }}" role="button" class="btnn btn-warning" title="Edit Current Entry"><span class="glyphicon glyphicon-edit"></span></a>
                            {!! Form::submit('X',['class'=>'btnn btn-danger','title'=>'Remove Current Entry']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="text-center">
            {!! $cashOuts->render() !!}
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