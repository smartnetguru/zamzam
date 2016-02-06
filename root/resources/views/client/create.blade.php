@extends('master')

@section('content')
    <div class="col-md-12 d-heading text-center">
        <h1>ADD NEW CLIENT</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($client = new \App\Client, ['action'=>'ClientController@index', 'role'=>'form', 'class'=>'form form-horizontal', 'method'=>'post','files'=>true]) !!}
        @include('client.form',['submitButtonText'=>'SAVE'])
        {!! Form::close() !!}
    </div>
@stop