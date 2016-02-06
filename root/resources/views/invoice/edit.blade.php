@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h2 class="text-center">Create New Invoice</h2>
    </div>
    {!! Form::model($invoice,['action'=>['InvoiceController@update',$invoice->id],'role'=>'form','class'=>'form-horizontal','method'=>'patch']) !!}
    @include('invoice.form',['submitButtonText'=>'UPDATE'])
    {!! Form::close() !!}
@stop