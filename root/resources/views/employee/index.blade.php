@extends('master')

@section('content')
    <div class="alert alert-warning text-center">
        <h1>Employee Page</h1>
    </div>
    <div class="col-md-12 d-section">
        <a href="{{ action('EmployeeController@create') }}" role="button" class="btn btn-primary">ADD Employee</a>
        <a href="#search" role="button" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="search">SEARCH</a>
        <span style="color:blue;font-weight: bold">Total Record Found: {{ $employees->count() }}</span>
    </div>
    {{-- Search Form Starts --}}
    <div class="col-md-12 d-section collapse" id="search">
        {!! Form::open(['action'=>'EmployeeController@index','class'=>'form-inline','method'=>'get']) !!}
        {!! Form::text('eid', null, ['class'=>'form-control','placeholder'=>'ID']) !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name']) !!}
        {!! Form::text('license', null, ['class'=>'form-control','placeholder'=>'License']) !!}
        {!! Form::text('visa', null, ['class'=>'form-control','placeholder'=>'VISA']) !!}
        {!! Form::select('per_country', $repository->country(), null, ['class'=>'form-control']) !!}
        {!! Form::submit('SEARCH', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    {{-- Search Form Ends --}}
    {{-- Employee Table Starts --}}
    <table class="table table-condensed table-bordered table-employee">
        <tr>
            <th>ID</th>
            <th>NAME<br/>DESIGNATION<br/>SALARY</th>
            <th>DATE OF BIRTH<br/>DATE OF JOINING</th>
            <th>LICENSE</th>
            <th>VISA</th>
            <th>PRESENT ADDRESS</th>
            <th>BUS<br/>CLIENT</th>
            <th>STATUS</th>
            <th>PHOTO</th>
            <th>ACTION</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->eid }}</td>
                <td><a href="{{ action('EmployeeController@show', [$employee->id]) }}">{{ $employee->name }}</a><br/>{{ $employee->designation }}<br/>Salary: {{ $employee->salary }}<br/>OT Rate: {{ $employee->ot_rate }}</td>
                <td>{{ $employee->dob->format('Y-m-d') }}<br/>{{ $employee->joining->format('Y-m-d') }}</td>
                <td>{{ $employee->license }}<br/>{{ $employee->license_expire->format('Y-m-d') }}</td>
                <td>{{ $employee->visa }}<br/>{{ $employee->visa_expire->format('Y-m-d') }}</td>
                <td>{{ $employee->present }}<br/>{{ $employee->pre_city }},&nbsp;{{ $employee->pre_state }},&nbsp;{{ $employee->pre_post }}<br/>{{ $employee->pre_country }}</td>
                <td>{{ $repository->currentVehicle($employee->id) }}<br/>{{ $repository->logClient($employee->cid) }}</td>
                <td>{{ $employee->status }}</td>
                <td><img src="{{ asset('root/resources/assets/images/employee').'/'.$employee->image }}" alt="" width="100px"/></td>
                <td>
                    <a href="{{ action('EmployeeController@edit', [$employee->id]) }}" role="button" class="btn btn-warning">EDIT</a>
                    {!! Form::open(['action'=>['EmployeeController@destroy',$employee->id],'method'=>'delete', 'onsubmit'=>'return confirmDelete()']) !!}
                    {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {{-- Employee Table Ends --}}
    {{-- Pagination Navigation Bar Starts --}}
    <div class="col-md-12 text-center">
        {!! $employees->render() !!}
    </div>
    {{-- Pagination Navigation Bar Ends --}}
@stop
@section('script')
    <script>
        /**
         * Confirmation message on delete employee
         * Created by smartrahat Date:2015.09.04 Time:05:00PM
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this employee?');
            return !!x;
        }
    </script>
@stop