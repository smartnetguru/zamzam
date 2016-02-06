@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning">
        <h1 class="text-center">Edit Employee</h1>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::model($employee, ['action'=>['EmployeeController@update', $employee->id], 'class'=>'form form-horizontal', 'files'=>true, 'role'=>'form', 'method'=>'PATCH']) !!}
        @include('employee.form', ['submitButtonText'=>'UPDATE'])
        {!! Form::close() !!}
    </div>

@stop

@section('script')
    <script>
        $(document).ready(
                function () {
                    $( ".datepicker" ).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    });
                }
        );
    </script>
@stop