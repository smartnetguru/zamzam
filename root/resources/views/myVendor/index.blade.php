@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h1>VENDOR</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('MyVendorController@create') }}" role="button" class="btn btn-primary">ADD VENDOR</a>
        <a href="#search" data-toggle="collapse" aria-controls="search" aria-expanded="false" role="button" class="btn btn-primary">SEARCH</a>
        <span style="color:blue;font-weight: bold">Total Vendor Found: {{ $vendors->count() }}</span>
    </div>
    <div class="col-md-12 collapse d-section" id="search">
        {!! Form::open(['action'=>'MyVendorController@index','class'=>'form-inline','method'=>'get','role'=>'form']) !!}
        {!! Form::text('vid',null,['class'=>'form-control','placeholder'=>'ID']) !!}
        {!! Form::text('type',null,['class'=>'form-control','placeholder'=>'VENDOR TYPE']) !!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'VENDOR NAME']) !!}
        {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'ADDRESS']) !!}
        {!! Form::text('contact_person',null,['class'=>'form-control','placeholder'=>'CONTACT PERSON']) !!}
        {!! Form::submit('SEARCH',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 d-section">
        <table class="table table-condensed table-bordered">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>CONTACT PERSON</th>
                <th>LOGO</th>
                <th>ACTION</th>
            </tr>
            @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->vid }}</td>
                    <td><a href="{{ action('MyVendorController@show',$vendor->id) }}">{{ $vendor->name }}</a><br/>{{ $vendor->type }}</td>
                    <td>{{ $vendor->address }}<br/>{{ $vendor->city }}<br/>{{ $vendor->state }}<br/>{{ $vendor->country }}</td>
                    <td>{{ $vendor->contact_person }}<br/>{{ $vendor->contact_phone }}<br/>{{ $vendor->email }}</td>
                    <td><img src="{{ asset('root/resources/assets/images/vendor') }}/{{ $vendor->logo }}" alt="" width="100px" height="100px" class="thumbnail"/></td>
                    <td>
                        {!! Form::open(['action'=>['MyVendorController@destroy',$vendor->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
                        <a href="{{ action('MyVendorController@edit',$vendor->id) }}" role="button" class="btn btn-info">EDIT</a><br/>
                        {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
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
         * Confirmation message on delete employee
         * Created by smartrahat Date:2015.09.17 Time:03:37AM
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this employee?');
            return !!x;
        }
    </script>
@stop