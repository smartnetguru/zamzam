@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 alert alert-info">
            <img src="{{ asset('root/resources/assets/images/vehicle') }}/{{ $vehicle->image }}" alt="NO IMAGE AVAILABLE" class="img-responsive" width="150px" height="150px"/>
        </div>
        <div class="col-md-9 alert alert-warning">
            <h1>{{ $vehicle->brand }}&nbsp;{{ $vehicle->model }}&nbsp;{{ $vehicle->seat }}&nbsp;SEAT&nbsp;{{ $vehicle->remarks }}</h1>
            <a href="{{ action('VehicleController@show',[$vehicle->id]) }}" role="button" class="btn btn-default">DETAILS</a>
        </div>
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Log ID</th>
                <th>Date</th>
                <th>Driver</th>
                <th>Client</th>
                <th>Action</th>
                <th>Description</th>
            </tr>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->date }}</td>
                    <td>{{ $repository->logDriver($log->eid) }}</td>
                    <td>{{ $repository->logClient($log->cid) }}</td>
                    <td>{{ $log->action }}</td>
                    <td>
                        {{ $log->b_description }}
                        {!! Form::open(['action'=>['VehicleController@destroyLog',$log->id],'onsubmit'=>'return deleteConfirm()','method'=>'delete','class'=>'element no-print']) !!}
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