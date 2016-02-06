@extends('master')

@section('content')
    <div class="col-md-12"> {{-- Warning & Alert Section Starts From here --}}
        <div class="col-md-6 d-section"> {{-- Employee Section Starts From here --}}
            <div class="panel panel-success">
                <div class="panel-heading">
                    <p><b>Employee Warning</b></p>
                    <p>Total Driver:&nbsp;{{ $repository->totalEmployee() }}&nbsp;|&nbsp;License Warning:&nbsp;{{ $repository->employeeLicenseExpire() }}&nbsp;|&nbsp;Visa Warning:&nbsp;{{ $repository->employeeVisaExpire() }}&nbsp;|&nbsp;Passport Warning:&nbsp;{{ $repository->employeePassportExpire() }}</p>
                </div>
                <div class="panel-body list-warning">
                    @foreach($employees as $employee)
                        <div class="col-sm-12 item-warning">
                            <div class="col-sm-3">
                                <img src="{{ asset('root/resources/assets/images/employee') }}/{{ $employee->image }}" class="img-responsive" alt=""/>
                            </div>
                            <div class="col-sm-9">
                                <p>Name: <b><a href="{{ action('EmployeeController@show', $employee->id) }}">{{ $employee->name }}</a></b></p>
                                <p>Licence Expired: <b>{{ $employee->license_expire < Carbon\Carbon::now()?'License has expired':$employee->license_expire->diffForHumans() }}</b></p>
                                <p>VISA Expired: <b>{{ $employee->visa_expire < Carbon\Carbon::now()?'Visa has expired':$employee->visa_expire->diffForHumans() }}</b></p>
                                <p>Passport Expired: <b>{{ $employee->passport_expire < Carbon\Carbon::now()?'Passport has expired':$employee->passport_expire->diffForHumans() }}</b></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> {{-- Employee Section Ends here --}}
        <div class="col-md-6 d-section"> {{-- Vehicle Section Starts From here --}}
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p><b>Vehicle Warning</b></p>
                    <p>Total Vehicle:&nbsp;{{ $repository->totalVehicle() }}&nbsp;|&nbsp;Registration Warning:&nbsp;{{ $repository->vehicleRegistrationExpire() }}</p>
                </div>
                <div class="panel-body list-warning">
                    @foreach($vehicles as $vehicle)
                        <div class="col-md-12 item-danger">
                            <p>ID: {{ $vehicle->id }}</p>
                            <p><a href="{{ action('VehicleController@show',$vehicle->id) }}">{{ $vehicle->brand }}&nbsp;{{ $vehicle->model }}&nbsp;{{ $vehicle->seat }}&nbsp;{{ $vehicle->remarks }}</a></p>
                            <p>Registration Date: {{ $vehicle->registration_expire < Carbon\Carbon::now() ? 'Registration Has Expired' : $vehicle->registration_expire->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> {{-- Vehicle Section Ends here --}}
    </div> {{-- Warning & Alert Section Ends here --}}
    <div class="col-md-12"> {{-- Route Management Figure in BIRDS EYE Veiw starts --}}
        <div class="panel panel-warning">
            <div class="panel-heading">
                <p><b>ROUTE</b></p>
            </div>
            <div class="panel-body list-warning">
                <table class="table table-bordered table-condensed">
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                    </tr>
                </table>
            </div>
        </div>
    </div> {{-- Route Management Figure in BIRDS EYE View ends --}}
@stop