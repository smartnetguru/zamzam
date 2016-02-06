@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h1>ROUTE MANAGEMENT</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="#create" class="btn btn-success" role="button" data-toggle="collapse" aria-controls="create" aria-expanded="false">CREATE ROUTE</a>
        <a href="#search" class="btn btn-primary" role="button" data-toggle="collapse" aria-controls="search" aria-expanded="false">SEARCH</a>
    </div>
    <div class="col-md-12 d-section collapse" id="create"> {{-- Create Route Form Starts From Here --}}
        {!! Form::open(['action'=>'RouteController@store','method'=>'post','class'=>'form-horizontal','role'=>'form']) !!}
        <div class="col-md-6">
            <div class="form-group"> {{-- Client Name --}}
                {!! Form::label('client','Client Name:',['class'=>'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::select('client',$repository->client(),null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group"> {{-- Buses Registration Number --}}
                {!! Form::label('vehicle','Vehicle:',['class'=>'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::select('vehicle',$repository->vehicle(),null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group"> {{-- Total Journey Time --}}
                {!! Form::label('hour','Journey Hour:',['class'=>'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::text('hour',null,['class'=>'form-control','placeholder'=>'Total Hour']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group"> {{-- Journey Date --}}
                {!! Form::label('date','Journey Date:',['class'=>'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::text('date',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control datetimepicker']) !!}
                </div>
            </div>
            <div class="form-group"> {{-- Driver Name --}}
                {!! Form::label('employee','Driver:',['class'=>'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::select('employee',$repository->employee(),null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group"> {{-- Total Journey Over Time --}}
                {!! Form::label('ot','Journey Over Time:',['class'=>'control-label col-sm-4']) !!}
                <div class="col-sm-8">
                    {!! Form::text('ot',null,['class'=>'form-control','placeholder'=>'Over Time']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center"> {{-- Submit Button --}}
            {!! Form::submit('ADD',['class'=>'btn btn-success form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div> {{-- Create Route Form Ends Here --}}
    <div class="col-md-12 d-section collapse" id="search"> {{-- Search Form Starts From Here --}}
        {!! Form::open(['action'=>'RouteController@index','class'=>'form-inline','method'=>'get']) !!}
        {!! Form::text('client',null,['class'=>'form-control','placeholder'=>'CLIENT']) !!}
        {!! Form::text('vehicle',null,['class'=>'form-control','placeholder'=>'VEHICLE ID']) !!}
        {!! Form::text('employee',null,['class'=>'form-control','placeholder'=>'DRIVER']) !!}
        {!! Form::text('start',null,['class'=>'form-control datepicker','placeholder'=>'FROM']) !!}
        {!! Form::text('end',null,['class'=>'form-control datepicker','placeholder'=>'TO']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div> {{-- Search Form Ends Here --}}
    {{-- Display route list start here --}}
    <div class="col-md-12 d-section">
        <table class="table table-condensed table-bordered">
            <tr>
                <th>Event ID</th>
                <th>CLIENT</th>
                <th>VEHICLE</th>
                <th>DRIVER</th>
                <th>DATE</th>
                <th>Journey Time</th>
                <th>OVER TIME</th>
            </tr>
            @foreach($routes as $route)
                <tr>
                    <td>{{ $route->id }}</td>
                    <td>{{ $route->client }}</td>
                    <td>{{ $route->vehicle }}</td>
                    <td>{{ $route->employee }}</td>
                    <td>{{ $route->date }}</td>
                    <td>{{ $route->hour }}</td>
                    <td>{{ $route->ot }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{-- Display route list ends here --}}
    <div class="text-center"> {{-- Pagination --}}
        {!! $routes->render() !!}
    </div>
@stop

@section('script')
    <script>
        /**
         * Date Picker to add custom date
         */
        $(document).ready(
                function () {
                    $( ".datepicker" ).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    });
                }
        );

        /**
         * Date Time Picker for journey start time & journey end time
         * Documentation will be found on following link: http://xdsoft.net/jqplugins/datetimepicker/
         * Created by smartrahat | Date: 2015.10.14 | Time: 3:13AM
         */
        jQuery('.datetimepicker').datetimepicker();
    </script>
@stop