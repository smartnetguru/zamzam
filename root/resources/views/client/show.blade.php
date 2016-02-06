@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 alert-info">
            <img src="{{ asset('root/resources/assets/images/client') }}/{{ $client->logo }}" alt="No Image Available" class="img-responsive"/>
        </div>
        <div class="col-md-9 alert-warning">
            <h3>{{ $client->name }}</h3>
            <p>{{ $client->address }}</p>
            <p>{{ $client->city }}, {{ $client->state }}, {{ $client->country }}</p>
            <p>Phone: {{ $client->client_phone }}</p>
            <p>E-mail: {{ $client->client_email }}</p>
            {!! Form::open(['action'=>['ClientController@destroy',$client->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
            <a href="{{ action('ClientController@clientLog',[$client->id]) }}" class="btn btn-default" role="button">LOG</a>
            <a href="{{ action('ClientController@edit',[$client->id]) }}" class="btn btn-warning">EDIT</a>
            {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 d-section">
            <h4 class="text-center">Company Details</h4>
            <table class="table table-condensed table-bordered">
                <tr>
                    <td>Client ID</td>
                    <td>:</td>
                    <td>{{ $client->cid }}</td>
                </tr>
                <tr>
                    <td>Client Name</td>
                    <td>:</td>
                    <td>{{ $client->name }}</td>
                </tr>
                <tr>
                    <td>Business Type</td>
                    <td>:</td>
                    <td>{{ $client->type }}</td>
                </tr>
                <tr>
                    <td>Monthly Bill</td>
                    <td>:</td>
                    <td>{{ $client->bill }}</td>
                </tr>
                <tr>
                    <td>OT Rate</td>
                    <td>:</td>
                    <td>{{ $client->ot }}</td>
                </tr>
                <tr>
                    <td>Agreement</td>
                    <td>:</td>
                    <td>{{ $client->agreement_from->format('F d, Y') }}<br>{{ $client->agreement_to->format('F d, Y') }}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>:</td>
                    <td>{{ $client->contact_person }}</td>
                </tr>
                <tr>
                    <td>Contact's Designation</td>
                    <td>:</td>
                    <td>{{ $client->contact_designation }}</td>
                </tr>
                <tr>
                    <td>Contact's Phone</td>
                    <td>:</td>
                    <td>{{ $client->contact_phone }}</td>
                </tr>
                <tr>
                    <td>Contact's Email</td>
                    <td>:</td>
                    <td>{{ $client->contact_email }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6 d-section">
            <h4>Current Status</h4>
            <table class="table table-bordered table-condensed">
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        {{ $client->status }}
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#addStatus"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        @include('client.addStatus')
                    </td>
                </tr>
                <tr>
                    <td>Drivers</td>
                    <td>:</td>
                    <td>
                        <ol>
                            @foreach($drivers as $driver)
                                <li>{{ $driver->name }}</li>
                            @endforeach
                        </ol>
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#addDriver"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#removeDriver"><span class="glyphicon glyphicon-remove-sign"></span></button>
                        @include('client.addDriver')
                        @include('client.removeDriver')
                    </td>
                </tr>
                <tr>
                    <td>Buses</td>
                    <td>:</td>
                    <td>
                        <ol>
                            @foreach($vehicles as $vehicle)
                                <li>{{ $vehicle->registration }}</li>
                            @endforeach
                        </ol>
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#addVehicle"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#removeVehicle"><span class="glyphicon glyphicon-remove-sign"></span></button>
                        @include('client.addVehicle')
                        @include('client.removeVehicle')
                    </td>
                </tr>
                <tr>
                    <td>Balance</td>
                    <td>:</td>
                    <td>--</td>
                </tr>
                <tr>
                    <td>Last Paid</td>
                    <td>:</td>
                    <td>--</td>
                </tr>
            </table>
        </div>
    </div>
@stop

@section('script')
    <script>
        /**
         * Throw a confirmation message before deleting a client
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are You Sure You Want to Delete this Client?');
            return !!x;
        }
    </script>
@stop