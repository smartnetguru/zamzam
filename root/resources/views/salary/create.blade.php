@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h2>Create Salary</h2>
    </div>

    {!! Form::model($employee,['action'=>'SalaryController@store','method'=>'post','class'=>'form-horizontal']) !!}
        @include('salary.form',['submitButtonText'=>'CREATE'])
    {!! Form::close() !!}
@stop