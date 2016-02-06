@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h2>Edit Salary</h2>
    </div>
    {!! Form::model($salary,['action'=>['SalaryController@update',$salary->id],'method'=>'patch','class'=>'form-horizontal']) !!}
        @include('salary.form',['submitButtonText'=>'UPDATE'])
    {!! Form::close() !!}
@stop