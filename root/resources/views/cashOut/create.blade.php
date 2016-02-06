@extends('master')

@section('content')
    <div class="col-md-12 alert alert-success">
        <h1 class="text-center">Check Out</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($cashOut = new \App\CashOut,['action'=>'CashOutController@store','role'=>'form','class'=>'form-horizontal','method'=>'post']) !!}
        @include('cashOut.form',['submitButtonText'=>'Cash Out'])
        {!! Form::close() !!}
    </div>
@stop
