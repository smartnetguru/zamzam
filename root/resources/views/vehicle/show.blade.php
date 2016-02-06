@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 alert alert-info">
            <img src="{{ asset('root/resources/assets/images/vehicle') }}/{{ $vehicle->image }}" alt="NO IMAGE AVAILABLE" class="img-responsive" width="150px" height="150px"/>
        </div>
        <div class="col-md-9 alert alert-warning">
            <h1>{{ $vehicle->brand }}&nbsp;{{ $vehicle->model }}&nbsp;{{ $vehicle->seat }}&nbsp;SEAT&nbsp;{{ $vehicle->remarks }}</h1>
            {!! Form::open(['action'=>['VehicleController@destroy',$vehicle->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
            <a href="{{ action('VehicleController@vehicleLog',[$vehicle->id]) }}" role="button" class="btn btn-default">LOG</a>
            <a href="{{ action('VehicleController@edit',[$vehicle->id]) }}" role="button" class="btn btn-primary">EDIT</a>
            {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 d-section">
            <table class="table table-condensed table-bordered">
                <tr>
                    <td>ID</td>
                    <td>{{ $vehicle->id }}</td>
                </tr>
                <tr>
                    <td>BRAND</td>
                    <td>{{ $vehicle->brand }}</td>
                </tr>
                <tr>
                    <td>MODEL</td>
                    <td>{{ $vehicle->model }}</td>
                </tr>
                <tr>
                    <td>PURCHASE FROM</td>
                    <td>{{ $vehicle->vendor }}</td>
                </tr>
                <tr>
                    <td>PURCHASE DATE</td>
                    <td>{{ $vehicle->purchase_date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td>REGISTRATION NUMBER</td>
                    <td>{{ $vehicle->registration }}</td>
                </tr>
                <tr>
                    <td>REGISTRATION DATE</td>
                    <td>{{ $vehicle->registration_date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td>REGISTRATION EXPIRE</td>
                    <td>{{ $vehicle->registration_expire->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td>ENGINE NUMBER</td>
                    <td>{{ $vehicle->engine }}</td>
                </tr>
                <tr>
                    <td>CHASES NUMBER</td>
                    <td>{{ $vehicle->chases }}</td>
                </tr>
                <tr>
                    <td>BODY NUMBER</td>
                    <td>{{ $vehicle->body }}</td>
                </tr>
                <tr>
                    <td>SEAT CAPACITY</td>
                    <td>{{ $vehicle->seat }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6 d-section">
            <table class="table table-condensed table-bordered">
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        {{ $vehicle->status }}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#assignStatus"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('vehicle.assignStatus')
                    </td>
                </tr>
                <tr>
                    <td>Current Driver</td>
                    <td>:</td>
                    <td>
                        {{ $vehicle->eid == 999999999 ? 'Client Driver' : ($vehicle->eid == 0 ? 'Not assign':$driver->name) }}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('vehicle.assignDriver')
                    </td>
                </tr>
                <tr>
                    <td>Current Client</td>
                    <td>:</td>
                    <td>
                        {{ $client == null ? 'Not Assign' : $client->name }}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#assignClient"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('vehicle.assignClient')
                    </td>
                </tr>
                <tr>
                    <td>Last Fitness Checkup</td>
                    <td>:</td>
                    <td>
                        {{ $fitness == null ? 'Did not checked yet' : $fitness->date }}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#fitnessCheck"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('vehicle.fitnessCheck')
                    </td>
                </tr>
                <tr>
                    <td>Police Case</td>
                    <td>:</td>
                    <td>
                        {{ $police == null ? 'Bravo! No police case yet.' : $police }}<br/>
                        {{--{{ $police == null ? '' : $police->description }}--}}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#policeCase"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('vehicle.policeCase')
                    </td>
                </tr>
                <tr>
                    <td>Accident</td>
                    <td>:</td>
                    <td>
                        {{ $accident == null ? 'Bravo! No accident yet.' : $accident }}<br/>
                        {{--{{ $accident == null ? '' : $accident->description }}--}}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#accident"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('vehicle.accident')
                    </td>
                </tr>
            </table>
        </div>
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