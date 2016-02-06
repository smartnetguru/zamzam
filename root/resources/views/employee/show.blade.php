@extends('master')

@section('content')
    <div class="col-md-12">
        <div class="alert alert-info col-md-3">
            <img src="{{ asset('root/resources/assets/images/employee') }}/{{ $employee->image }}" alt="" class="img-responsive"/>
        </div>
        <div class="alert alert-warning col-md-9">
            <h1>{{ $employee->name }}</h1>
            <h3>{{ $employee->designation }}</h3>
            <h3>{{ $employee->phone }}</h3>
            <h3>{{ $employee->email }}</h3>
            {!! Form::open(['action'=>['EmployeeController@destroy',$employee->id],'method'=>'delete', 'onsubmit'=>'return confirmDelete()']) !!}
            <a href="{{ action('EmployeeController@employeeLog',[$employee->id]) }}" class="btn btn-default" role="button">View Log</a>
            <a href="{{ action('EmployeeController@edit',[$employee->id]) }}" class="btn btn-warning no-print" role="button">EDIT</a>
            {!! Form::submit('DELETE',['class'=>'btn btn-danger no-print']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-6 d-section">
        <h4 class="text-center">Personal Details</h4>
        <table class="table table-condensed table-bordered">
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{ $employee->eid }}</td>
            </tr>
            <tr>
                <td>NAME</td>
                <td>:</td>
                <td>{{ $employee->name }}</td>
            </tr>
            <tr>
                <td>PHONE</td>
                <td>:</td>
                <td>{{ $employee->phone }}</td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td>:</td>
                <td>{{ $employee->email }}</td>
            </tr>
            <tr>
                <td>SALARY</td>
                <td>:</td>
                <td>{{ $employee->basic }}</td>
            </tr>
            <tr>
                <td>OT RATE</td>
                <td>:</td>
                <td>{{ $employee->rate }}</td>
            </tr>
            <tr>
                <td>DATE OF BIRTH</td>
                <td>:</td>
                <td>{{ $employee->dob->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td>LICENSE NUMBER</td>
                <td>:</td>
                <td>{{ $employee->license }}<br>{{ $employee->license_expire->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td>VISA DETAILS</td>
                <td>:</td>
                <td>{{ $employee->visa }}<br>{{ $employee->visa_expire->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td>PASSPORT DETAILS</td>
                <td>:</td>
                <td>{{ $employee->passport }}<br>{{ $employee->passport_expire->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td>PERMANENT ADDRESS</td>
                <td>:</td>
                <td>{{ $employee->permanent }}<br>{{ $employee->per_city }}<br>{{ $employee->per_state }}<br>{{ $employee->per_post }}<br>{{ $employee->per_country }}</td>
            </tr>
            <tr>
                <td>PRESENT ADDRESS</td>
                <td>:</td>
                <td>{{ $employee->premanent }}<br>{{ $employee->pre_city }}<br>{{ $employee->pre_state }}<br>{{ $employee->pre_post }}<br>{{ $employee->pre_country }}</td>
            </tr>
            <tr>
                <td>REFERENCE</td>
                <td>:</td>
                <td>{{ $employee->reference }}<br>{{ $employee->reference_phone }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6 d-section">
        <h4 class="text-center">Official Records</h4>
        <table class="table table-condensed table-bordered">
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    {{ $employee->status }}
                    <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#changeStatus"><span class="glyphicon glyphicon-plus-sign"></span></button>
                    @include('employee.changeStatus')
                </td>
            </tr>
            <tr>
                <td>Designation</td>
                <td>:</td>
                <td>{{ $employee->designation }}</td>
            </tr>
            <tr>
                <td>Joining Date</td>
                <td>:</td>
                <td>{{ $employee->joining->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td>Assigned Bus</td>
                <td>:</td>
                <td>
                    {{ $vehicle == null ? 'Not Assign' : $vehicle->registration }}
                    <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#changeVehicle"><span class="glyphicon glyphicon-plus-sign"></span></button>
                    @include('employee.changeVehicle')
                </td>
            </tr>
            <tr>
                <td>Assigned Client</td>
                <td>:</td>
                <td>
                    {{ $client == null ? 'Not Assign' : $client->name }}
                    <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#changeClient"><span class="glyphicon glyphicon-plus-sign"></span></button>
                    @include('employee.changeClient')
                </td>
            </tr>
            <tr>
                <td>Salary<br/>OT Rate</td>
                <td>:</td>
                <td>{{ $employee->basic }}<br>{{ $employee->ot_rate }}</td>
            </tr>
            <tr>
                <td>Police Cases</td>
                <td>:</td>
                <td>
                    {{ $police == null ? 'Bravo! No police case yet.' : $police }}
                    <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#policeCase"><span class="glyphicon glyphicon-plus-sign"></span></button>
                    @include('employee.policeCase')
                </td>
            </tr>
            <tr>
                <td>Accidents</td>
                <td>:</td>
                <td>
                    {{ $accident == null ? 'Bravo! No accident yet.' : $accident }}
                    <button type="button" class="element btnn btn-default" data-toggle="modal" data-target="#accident"><span class="glyphicon glyphicon-plus-sign"></span></button>
                    @include('employee.accident')
                </td>
            </tr>
        </table>
    </div>
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