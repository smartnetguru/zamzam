@extends('master')

@section('content')
    <div class="alert alert-warning text-center">
        <h1>VEHICLES</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('VehicleController@create') }}" role="button" class="btn btn-primary">ADD VEHICLE</a>
        <a href="#search" role="button" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="search">SEARCH</a>
        <span style="color:blue;font-weight: bold">Total Vehicles: {{ $vehicles->count() }}</span>
    </div>
    <div class="col-md-12 collapse d-section" id="search">
        {!! Form::open(['action'=>'VehicleController@index','class'=>'form-inline','method'=>'get','role'=>'form']) !!}
        {!! Form::text('bid',null,['class'=>'form-control','placeholder'=>'ID']) !!}
        {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'ENTER YOUR KEYWORD']) !!}
        {!! Form::text('registration',null,['class'=>'form-control','placeholder'=>'REGISTRATION']) !!}
        {!! Form::text('vendor',null,['class'=>'form-control','placeholder'=>'VENDOR']) !!}
        {!! Form::text('seat',null,['class'=>'form-control','placeholder'=>'SEAT CAPACITY']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-condensed table-bordered">
            <tr>
                <th>ID</th>
                <th>DESCRIPTION</th>
                <th>VENDOR<br>PURCHASE DATE</th>
                <th>REGISTRATION</th>
                <th>CLIENT</th>
                <th>STATUS<br/>DRIVER</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->bid }}</td>
                    <td><a href="{{ action('VehicleController@show',[$vehicle->id]) }}">{{ $vehicle->brand }}&nbsp;{{ $vehicle->model }}&nbsp;{{ $vehicle->seat }}&nbsp;SEATS&nbsp;{{ $vehicle->remarks }}</a></td>
                    <td>{{ $vehicle->vendor }}<br/>Purchase Date: {{ $vehicle->purchase_date->format('Y-m-d') }}</td>
                    <td>Number: {{ $vehicle->registration }}<br/>Date: {{ $vehicle->registration_date->format('Y-m-d') }}<br/>Expired: {{ $vehicle->registration_expire->format('Y-m-d') }}</td>
                    <td>{{ $repository->logClient($vehicle->cid) }}</td>
                    <td>{{ $vehicle->status }}<br/>{{ $repository->logDriver($vehicle->eid) }}</td>
                    <td><img src="{{ asset('root/resources/assets/images/vehicle') }}/{{ $vehicle->image }}" alt="NO IMAGE AVAILABLE" class="thumbnail" width="100px" height="100px"/></td>
                    <td>
                        <a href="{{ action('VehicleController@edit',[$vehicle->id]) }}" class="btn btn-primary" role="button">EDIT</a>
                        {!! Form::open(['action'=>['VehicleController@destroy',$vehicle->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
                        {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-12 text-center">{!! $vehicles->render() !!}</div>
    </div>
@stop

@section('script')
    <script>
        /**
         * Through a confirmation message before deleting a vehicle
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are You Sure You Want to Delete this Vehicle?');
            return !!x;
        }
    </script>
@stop