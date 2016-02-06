@extends('master')

@section('content')
    <div class="col-md-12 text-center alert alert-warning">
        <h2>Advance Salary</h2>
    </div>
    {!! Form::model($salary,['action'=>['SalaryController@updatePayment',$salary->id],'method'=>'patch','class'=>'form-horizontal']) !!}
    @include('salary.advance_form')
    {!! Form::close() !!}
@stop

@section('script')
    <script>
        /**
         * Date Time Picker for journey start time & journey end time
         * Documentation will be found on following link: http://xdsoft.net/jqplugins/datetimepicker/
         * Created by smartrahat | Date: 2015.10.14 | Time: 3:13AM
         */
        jQuery('.datetimepicker').datetimepicker({
            timepicker:false,
            mask:true,
            format:'Y-m-d'
        });

    </script>
@stop