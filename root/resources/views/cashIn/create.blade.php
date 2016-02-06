@extends('master')

@section('content')
    <div class="col-md-12 alert alert-success">
        <h1 class="text-center">Payment Collection</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($cashIn = new \App\CashIn,['action'=>'CashInController@store','role'=>'form','class'=>'form-horizontal','method'=>'post']) !!}
        @include('cashIn.form',['submitButtonText'=>'Collect'])
        {!! Form::close() !!}
    </div>
@stop
