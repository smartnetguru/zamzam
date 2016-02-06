@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h1>Edit Vendor</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($vendor,['action'=>['MyVendorController@update',$vendor->id],'class'=>'form form-horizontal','method'=>'patch','role'=>'form','files'=>true]) !!}
        @include('myVendor.form',['submitButtonText'=>'UPDATE'])
        {!! Form::close() !!}
    </div>
@stop