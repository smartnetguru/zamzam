@extends('master')

@section('content')
    <div class="col-md-12 text-center alert alert-warning">
        <h2>Advance Salary</h2>
    </div>
    {!! Form::open(['action'=>'SalaryController@payAdvance','method'=>'post','class'=>'form-horizontal']) !!}
    @include('salary.advance_form')
    {!! Form::close() !!}
@stop

@section('script')
    <script>


    </script>
@stop