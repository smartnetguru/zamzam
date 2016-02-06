@extends('master')

@section('content')
    <div class="col-md-12 d-heading">
        <h1>ADD Vendors</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($vendor = new \App\MyVendor,['action'=>'MyVendorController@store','class'=>'form form-horizontal','method'=>'post','role'=>'form','files'=>true]) !!}
        @include('myVendor.form',['submitButtonText'=>'ADD'])
        {!! Form::close() !!}
    </div>
@stop