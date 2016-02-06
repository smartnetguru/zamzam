@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h1 class="text-center">Add New Employee</h1>
    </div>
    <div class="col-md-12 d-section">
        <hr/>
        {!! Form::model($employee = new \App\Employee, ['action'=>'EmployeeController@index', 'class'=>'form form-horizontal', 'files'=>true, 'role'=>'form', 'method'=>'post']) !!}
        @include('employee.form',['submitButtonText'=>'ADD'])
        {!! Form::close() !!}
    </div>
@stop