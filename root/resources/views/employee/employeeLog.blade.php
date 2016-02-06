@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="alert alert-info col-md-3">
            <img src="{{ asset('root/resources/assets/images/employee') }}/{{ $employee->image }}" alt="" class="img-responsive"/>
        </div>
        <div class="alert alert-warning col-md-9">
            <h1>{{ $employee->name }}</h1>
            <h3>{{ $employee->designation }}</h3>
            <h3>{{ $employee->phone }}</h3>
            <h3>{{ $employee->email }}</h3>
            {!! Form::open(['action'=>['EmployeeController@destroy',$employee->id],'method'=>'delete', 'onsubmit'=>'return confirmDelete()']) !!}
            <a href="{{ action('EmployeeController@show',[$employee->id]) }}" class="btn btn-default no-print" role="button">DETAILS</a>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Log ID</th>
                <th>Date</th>
                <th>Bus</th>
                <th>Client</th>
                <th>Action</th>
                <th>Description</th>
            </tr>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->date }}</td>
                    <td>{{ $repository->logVehicle($log->bid) }}</td>
                    <td>{{ $repository->logClient($log->cid) }}</td>
                    <td>{{ $log->action }}</td>
                    <td>
                        {{ $log->e_description }}
                        {!! Form::open(['action'=>['EmployeeController@destroyLog',$log->id],'onsubmit'=>'return deleteConfirm()','method'=>'delete','class'=>'element no-print']) !!}
                        {!! Form::submit('X',['class'=>'btnn btn-danger','title'=>'Remove Current Entry']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop

@section('script')
    <script>
        /**
         * Show confirmation message before Delete a log entry
         * Created by smartrahat Date: 06.11.2015 Time: 08:33AM
         * @returns {boolean}
         */
        function deleteConfirm(){
            var x = confirm('Do you really want to delete this entry?');
            return !!x;
        }
    </script>
@stop