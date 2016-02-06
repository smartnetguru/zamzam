@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h2 class="text-center">Edit Cash Out</h2>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($cashOut,['action'=>['CashOutController@update',$cashOut->id],'role'=>'form','class'=>'form-horizontal','method'=>'patch']) !!}
        @include('cashOut.form',['submitButtonText'=>'UPDATE'])
        {!! Form::close() !!}
    </div>
@stop