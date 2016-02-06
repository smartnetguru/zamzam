@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 alert alert-info">
            <img src="{{ asset('root/resources/assets/images/vendor') }}/{{ $vendor->logo }}" alt="" class="img-responsive"/>
        </div>
        <div class="col-md-9 alert alert-warning">
            <h1>{{ $vendor->name }}</h1>
            <p>{{ $vendor->address }}</p>
            <p>{{ $vendor->city }}, {{ $vendor->state }}</p>
            <p>{{ $vendor->country }}</p>
            {!! Form::open(['action'=>['MyVendorController@destroy',$vendor->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
            <a href="{{ action('MyVendorController@edit',[$vendor->id]) }}" class="btn btn-warning">EDIT</a>
            {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6 d-section"> {{-- Left Side Starts from here --}}
            <table class="table table-condensed table-bordered">
                <tr>
                    <td>ID</td>
                    <td>:</td>
                    <td>{{ $vendor->vid }}</td>
                </tr>
                <tr>
                    <td>NAME</td>
                    <td>:</td>
                    <td>{{ $vendor->name }}</td>
                </tr>
                <tr>
                    <td>BUSINESS TYPE</td>
                    <td>:</td>
                    <td>{{ $vendor->type }}</td>
                </tr>
                <tr>
                    <td>ADDRESS</td>
                    <td>:</td>
                    <td>{{ $vendor->address }}</td>
                </tr>
                <tr>
                    <td>PHONE</td>
                    <td>:</td>
                    <td>{{ $vendor->phone }}</td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    <td>{{ $vendor->email }}</td>
                </tr>
                <tr>
                    <td>FAX</td>
                    <td>:</td>
                    <td>{{ $vendor->fax }}</td>
                </tr>
                <tr>
                    <td>ACCOUNT NUMBER</td>
                    <td>:</td>
                    <td>{{ $vendor->account }}</td>
                </tr>
                <tr>
                    <td>CONTACT PERSON</td>
                    <td>:</td>
                    <td>{{ $vendor->contact_person }}</td>
                </tr>
            </table>
        </div> {{-- Left Side ends here --}}
        <div class="col-md-6 d-section"> {{-- Right Starts from here --}}
            
        </div> {{-- Left Side ends here --}}
    </div>
@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this Vendor?');
            return !!x;
        }
    </script>
@stop