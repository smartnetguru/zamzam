@extends('master')

@section('content')
    <div class="col-ms-12 alert alert-warning">
        <h1 class="text-center">INVOICE</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('InvoiceController@create') }}" role="button" class="btn btn-primary">Create Invoice</a>
        <a href="#search" role="button" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="search">SEARCH</a>
    </div>
    <div class="col-md-12 d-section collapse" id="search">
        {!! Form::open(['action'=>'InvoiceController@index','class'=>'form-inline','method'=>'get']) !!}
        {!! Form::text('invoiceNumber',null,['class'=>'form-control','placeholder'=>'Invoice Number']) !!}
        {!! Form::text('client',null,['class'=>'form-control','placeholder'=>'Client Name']) !!}
        {!! Form::text('startDate',null,['class'=>'form-control datepicker']) !!}
        {!! Form::text('endDate',null,['class'=>'form-control datepicker']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>Invoice<br>Number</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Client</th>
                    <th>Driver<br/>Bus</th>
                    <th>Duty<br/>OT</th>
                    <th>Bill<br/>OT Bill</th>
                </tr>
                @foreach($invoices as $invoice)
                    <tr>
                        <td><a href="{{ action('InvoiceController@show',$invoice->invoiceNumber) }}">{{ $invoice->invoiceNumber }}</a></td>
                        <td>{{ $invoice->date }}</td>
                        <td>{{ $invoice->brand }}&nbsp;{{ $invoice->model }}&nbsp;{{ $invoice->seat }}&nbsp;{{ $invoice->remarks }}</td>
                        <td>{{ $invoice->client }}</td>
                        <td>{{ $invoice->vehicle }}</td>
                        <td>{{ $invoice->duty }}<br/>{{ $invoice->ot }}&nbsp;Hour</td>
                        <td>
                            {{ number_format($invoice->bill) }}/=<br/>{{ number_format($invoice->ot_rate * $invoice->ot) }}/=
                            {!! Form::open(['action'=>['InvoiceController@destroy',$invoice->id],'onsubmit'=>'return deleteConfirm()','method'=>'delete','class'=>'element no-print']) !!}
                            <a href="{{ action('InvoiceController@show',$invoice->invoiceNumber) }}" role="button" class="btnn btn-warning" title="Edit Current Entry"><span class="glyphicon glyphicon-edit"></span></a>
                            {!! Form::submit('X',['class'=>'btnn btn-danger','title'=>'Remove Current Entry']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-md-12 d-section text-center">{!! $invoices->appends(Input::except('page'))->render() !!}</div>
@stop

@section('script')
    <script>
        /**
         * Display confirmation message before delete
         * @returns {boolean}
         */
        function deleteConfirm(){
            var x = confirm('Are you sure, you want to delete this entry?');
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