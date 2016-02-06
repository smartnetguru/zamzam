<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group"> {{-- Employee ID --}}
            {!! Form::label('eid', '* Employee ID:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('eid', null, ['class'=>'form-control', 'placeholder'=>'Employee ID']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Designation --}}
            {!! Form::label('designation', 'Designation:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('designation', $repository->designation(), null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Employee Name --}}
            {!! Form::label('name', '* Name:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Full Name']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- Employee Image --}}
            <img src="{{ asset('root/resources/assets/images/employee') }}/{{ $employee->image }}" alt="Click Browse & Select Employee Picture. For better view use same pixel in both width and height. Ex- 300X300 or 150X150" id="blah" width="160px" height="160px" class="img-center thumbnail"/>
            {!! Form::label('image', 'Upload Image', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::file('image', ['onchange'=>'readURL(this)']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">

    <div class="col-md-6">
        <div class="form-group"> {{-- Date of Birth --}}
            {!! Form::label('dob', 'Date of Birth:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::input('date', 'dob', $employee->dob->format('Y-m-d'), ['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Salary --}}
            {!! Form::label('basic', 'Salary:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('basic', null, ['class'=>'form-control','placeholder'=>'Fixed Salary Per Month']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- License Number --}}
            {!! Form::label('license', 'License:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('license', null, ['class'=>'form-control','placeholder'=>'Driving License Number']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Phone Number --}}
            {!! Form::label('phone', 'Phone:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('phone', null, ['class'=>'form-control','placeholder'=>'Personal Contact Number']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Passport Number --}}
            {!! Form::label('passport', 'Passport:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('passport', null, ['class'=>'form-control','placeholder'=>'Passport Number']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Visa --}}
            {!! Form::label('visa', 'Visa:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('visa', null, ['class'=>'form-control','placeholder'=>'VISA Information']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Reference Name --}}
            {!! Form::label('reference', 'Reference Name:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('reference', null, ['class'=>'form-control','placeholder'=>'Reference Person (if any)']) !!}
            </div>
        </div>
        <p class="text-center"><b>Present Address</b></p>
        <div class="form-group"> {{-- Present Address Line 1 --}}
            {!! Form::label('present', 'Present Address:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('present', null, ['class'=>'form-control','placeholder'=>'Present Living Address']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Present City --}}
            {!! Form::label('pre_city', 'City:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('pre_city', null, ['class'=>'form-control','placeholder'=>'Present Living City']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Present State or Province --}}
            {!! Form::label('pre_state', 'State/Province:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('pre_state', null, ['class'=>'form-control','placeholder'=>'Present Living State/Province']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Present Post Office --}}
            {!! Form::label('pre_post', 'Post:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('pre_post', null, ['class'=>'form-control','placeholder'=>'Present Post Office']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Present Country --}}
            {!! Form::label('pre_country', 'Country:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('pre_country', $repository->country(), null, ['class'=>'form-control','placeholder'=>'Present Country']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- Joining Date --}}
            {!! Form::label('joining', 'Date of Joining:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::input('date', 'joining', $employee->joining->format('Y-m-d'), ['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Over Time Rate --}}
            {!! Form::label('ot', 'OT Rate:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('ot_rate', null, ['class'=>'form-control','placeholder'=>'Over Time Rate per Hour']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Licence Expired Date --}}
            {!! Form::label('license_expire', 'License Expired on:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::input('date', 'license_expire', $employee->license_expire->format('Y-m-d'), ['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Email Address --}}
            {!! Form::label('email', 'Email:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Personal Email Address']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Passport Expiration Date --}}
            {!! Form::label('passport_expire', 'Passport Expired on:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::input('date', 'passport_expire', $employee->passport_expire->format('Y-m-d'), ['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Visa Expiration Date --}}
            {!! Form::label('visa_expire', 'Visa Expired on:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::input('date', 'visa_expire', $employee->visa_expire->format('Y-m-d'), ['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Reference Number --}}
            {!! Form::label('reference_phone', 'Reference Phone:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('reference_phone', null, ['class'=>'form-control','placeholder'=>'Reference Persons Phone Number']) !!}
            </div>
        </div>
        <p class="text-center"><b>Permanent Address</b></p>
        <div class="form-group"> {{-- Permanent Address --}}
            {!! Form::label('permanent', 'Permanent Address:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('permanent', null, ['class'=>'form-control','placeholder'=>'Permanent Living Address']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Permanent Address Line 1 --}}
            {!! Form::label('per_city', 'City:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('per_city', null, ['class'=>'form-control','placeholder'=>'Permanent Living City']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Permanent State or Province --}}
            {!! Form::label('per_state', 'State/Province:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('per_state', null, ['class'=>'form-control','placeholder'=>'Permanent State/Province']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Permanent Post Office --}}
            {!! Form::label('per_post', 'Post:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('per_post', null, ['class'=>'form-control','placeholder'=>'Permanent Post Office']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Permanent Country --}}
            {!! Form::label('per_country', 'Country:', ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('per_country', $repository->country(), null, ['class'=>'form-control','placeholder'=>'Permanent Country']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group text-center"> {{-- Button --}}
        <hr/>
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-success']) !!}
        {!! Form::reset('RESET', ['class'=>'btn btn-warning']) !!}
        <a href="{{ action('EmployeeController@index') }}" class="btn btn-danger" role="button">CANCEL</a>
    </div>
</div>

@section('script')
    <script>
        /**
         * Display Calender on associated input box
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
    </script>
@stop