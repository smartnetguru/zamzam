@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h1>EDIT VEHICLE</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($vehicle,['action'=>['VehicleController@update',$vehicle->id],'class'=>'form form-horizontal','role'=>'form','method'=>'patch','files'=>true]) !!}
        @include('vehicle.form',['submitButtonText'=>'UPDATE'])
        {!! Form::close() !!}
    </div>
@stop