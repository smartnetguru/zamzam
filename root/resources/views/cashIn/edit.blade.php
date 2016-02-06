@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h2 class="text-center">Edit Collection</h2>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($cashIn,['action'=>['CashInController@update',$cashIn->id],'role'=>'form','class'=>'form-horizontal','method'=>'patch']) !!}
        @include('cashIn.form',['submitButtonText'=>'UPDATE'])
        {!! Form::close() !!}
    </div>
@stop