@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="alert alert-info col-md-3">
            <img src="{{ asset('root/resources/assets/images/client') }}/{{ $client->logo }}" alt="" class="img-responsive"/>
        </div>
        <div class="alert alert-warning col-md-9">
            <h1>{{ $client->name }}</h1>
            <p>{{ $client->address }}</p>
            <p>{{ $client->city }}, {{ $client->state }}, {{ $client->country }}</p>
            <p>Phone: {{ $client->client_phone }}</p>
            <p>E-mail: {{ $client->client_email }}</p>
            {!! Form::open(['action'=>['ClientController@destroy',$client->id],'method'=>'delete', 'onsubmit'=>'return confirmDelete()']) !!}
            <a href="{{ action('ClientController@show',[$client->id]) }}" class="btn btn-default no-print" role="button">DETAILS</a>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-12 d-section">
        {!! Form::open(['action'=>['ClientController@clientLog',$client->id],'class'=>'form-inline','method'=>'get']) !!}
        {!! Form::text('start',null,['class'=>'form-control datetimepicker','placeholder'=>'Start Date']) !!}
        {!! Form::text('end',null,['class'=>'form-control datetimepicker','placeholder'=>'End Date']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>Log ID</th>
                <th>Date</th>
                <th>Driver</th>
                <th>Vehicle</th>
                <th>Action</th>
                <th>Description</th>
            </tr>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->date }}</td>
                    <td>{{ $repository->logDriver($log->eid) }}</td>
                    <td>{{ $repository->logVehicle($log->bid) }}</td>
                    <td>{{ $log->action }}</td>
                    <td>
                        {{ $log->c_description }}
                        {!! Form::open(['action'=>['ClientController@destroyLog',$log->id],'onsubmit'=>'return deleteConfirm()','method'=>'delete','class'=>'element no-print']) !!}
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

        /**
         * Date Time Picker for journey start time & journey end time
         * Documentation will be found on following link: http://xdsoft.net/jqplugins/datetimepicker/
         * Created by smartrahat | Date: 2015.10.14 | Time: 3:13AM
         */
        jQuery('.datetimepicker').datetimepicker({
            timepicker:false,
            //mask:true,
            format:'Y-m-d'
        });
    </script>
@stop