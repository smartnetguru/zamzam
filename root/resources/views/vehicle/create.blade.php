@extends('master')

@section('content')
    <div class="col-md-12 text-center alert alert-warning">
        <h1>ADD NEW BUSES</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($vehicle = new \App\Vehicles,['action'=>'VehicleController@store','method'=>'post','class'=>'form form-horizontal','roll'=>'form','files'=>true]) !!}
        @include('vehicle.form',['submitButtonText'=>'ADD'])
        {!! Form::close() !!}
    </div>
@stop