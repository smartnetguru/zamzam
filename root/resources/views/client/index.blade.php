@extends('master')

@section('content')
    <div class="col-md-12 d-heading text-center">
        <h1>CLIENT LIST</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('ClientController@create') }}" role="button" class="btn btn-primary">ADD CLIENT</a>
        <a href="#search" role="button" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="search">SEARCH</a>
        <span style="color:blue;font-weight: bold">Total Record Found: {{ $clients->count() }}</span>
    </div>
    {{-- Search Form Starts --}}
    <div class="col-md-12 d-section collapse" id="search">
        {!! Form::open(['action'=>'ClientController@index','class'=>'form-inline','method'=>'get']) !!}
        {!! Form::text('cid', null, ['class'=>'form-control','placeholder'=>'ID']) !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Client Name']) !!}
        {!! Form::text('contact_person', null, ['class'=>'form-control','placeholder'=>'Contact Person Name']) !!}
        {!! Form::select('city', $repository->city(), null, ['class'=>'form-control']) !!}
        {!! Form::select('state', $repository->state(), null, ['class'=>'form-control']) !!}
        {!! Form::submit('SEARCH', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    {{-- Search Form Ends --}}
    <div class="col-md-12 d-section">
        <table class="table table-bordered table-condensed">
            <tr>
                <th>ID</th>
                <th>NAME<br/>PHONE<br/>EMAIL</th>
                <th>ADDRESS</th>
                <th>CONTACT PERSON<br/>PHONE<br/>EMAIL</th>
                <th>STATUS</th>
                <th>LOGO</th>
                <th>ACTION</th>
            </tr>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->cid }}</td>
                    <td><a href="{{ action('ClientController@show',$client->id) }}">{{ $client->name }}</a><br/>{{ $client->phone }}<br/>{{ $client->email }}</td>
                    <td>{{ $client->address }}<br/>{{{ $client->city }}}<br/>{{ $client->country }}</td>
                    <td>{{ $client->contact_person }}<br/>{{ $client->contact_phone }}<br/>{{ $client->contact_email }}</td>
                    <td>{{ $client->status }}<br/>{{ $client->updated_at->format('d F, y') }}</td>
                    <td><img src="{{ asset('root/resources/assets/images/client') }}/{{ $client->logo }}" width="100" height="100" class="thumbnail"/></td>
                    <td>
                        <a href="{{ action('ClientController@edit',$client->id) }}" class="btn btn-warning">EDIT</a>
                        {!! Form::open(['action'=>['ClientController@destroy',$client->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
                        {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-12 text-center">
            {!! $clients->render() !!}
        </div>
    </div>
@stop

@section('script')
    <script>
        /**
         * Return a Confirmation Dialog Box before Delete any Client
         * Created by smartrahat|Date: 07.09.2015|Time: 09:55 PM
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this client?');
            return !!x;
        }
    </script>
@stop