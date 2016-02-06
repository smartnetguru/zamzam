@extends('master')

@section('content')
    <div class="col-md-12 d-heading text-center">
        <h1>EDIT: "{{ $client->name }}"</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($client,['action'=>['ClientController@update',$client->id],'method'=>'patch','class'=>'form form-horizontal','role'=>'form','files'=>true]) !!}
        @include('client.form',['submitButtonText'=>'UPDATE'])
        {!! Form::close() !!}
    </div>
@stop