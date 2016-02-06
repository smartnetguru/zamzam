@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h2 class="text-center">Create New Invoice</h2>
    </div>
    <div class="col-md-12 alert alert-info">
        <p><b>In order to add multiple item do the same process again with the same Invoice Number & Date</b></p>
    </div>
    {!! Form::model($invoice = new \App\Invoice,['action'=>'InvoiceController@index','role'=>'form','class'=>'form-horizontal','method'=>'post']) !!}
    @include('invoice.form',['submitButtonText'=>'CREATE'])
    {!! Form::close() !!}
@stop

@section('script')
    <script>
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