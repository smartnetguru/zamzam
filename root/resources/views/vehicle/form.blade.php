<div class="col-md-6"> {{-- Left Side Starts from here --}}
    <div class="form-group"> {{-- Bus ID --}}
        {!! Form::label('bid','BUS ID:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('bid',null,['class'=>'form-control','placeholder'=>'BUS ID']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Brand Name --}}
        {!! Form::label('brand','BRAND:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::select('brand',$repository->brand(),null,['class'=>'form-control','placeholder'=>'BRAND']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Model Number --}}
        {!! Form::label('model','MODEL:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::select('model',$repository->model(),null,['class'=>'form-control','placeholder'=>'MODEL']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Registration Number --}}
        {!! Form::label('registration','REGISTRATION:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('registration',null,['class'=>'form-control','placeholder'=>'REGISTRATION NUMBER']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Registration Date --}}
        {!! Form::label('registration_date','REGISTRATION DATE:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('registration_date',$vehicle->registration_date->format('Y-m-d'),['class'=>'form-control datepicker','placeholder'=>'YYYY-MM-DD']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Vendor Name --}}
        {!! Form::label('vendor','VENDOR NAME:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('vendor',null,['class'=>'form-control','placeholder'=>'VENDOR']) !!}
        </div>
    </div>

    <div class="form-group"> {{-- Engine Number --}}
        {!! Form::label('engine','ENGINE NO:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('engine',null,['class'=>'form-control','placeholder'=>'ENGINE NUMBER']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Body Number --}}
        {!! Form::label('body','BODY NO:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('body',null,['class'=>'form-control','placeholder'=>'BODY NUMBER']) !!}
        </div>
    </div>
</div> {{-- Left Side Ends here --}}
<div class="col-md-6"> {{-- Right Side Start From here --}}
    <div class="form-group"> {{-- Vehicle Image --}}
        <img src="{{ asset('root/resources/assets/images/vehicle') }}/{{ $vehicle->image }}" alt="Click Browse & Select Employee Picture. For better view use same pixel in both width and height. Ex- 300X300 or 150X150" class="img-center thumbnail" width="160px" height="160px" id="blah"/>
        {!! Form::label('image','UPLOAD IMAGE',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::file('image',['onchange'=>'readURL(this)']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Registration Expired Date --}}
        {!! Form::label('registration_expire','REGISTRATION EXPIRE:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('registration_expire',$vehicle->registration_expire->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Purchase Date --}}
        {!! Form::label('purchase_date','PURCHASE DATE:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('purchase_date',$vehicle->purchase_date->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
        </div>
    </div>


    <div class="form-group"> {{-- Chasee Number --}}
        {!! Form::label('chases','CHASES NO:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('chases',null,['class'=>'form-control','placeholder'=>'CHASES NUMBER']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Seat Capacity of Bus --}}
        {!! Form::label('seat','SEAT CAPACITY:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('seat',null,['class'=>'form-control','placeholder'=>'SEAT CAPACITY']) !!}
        </div>
    </div>
</div> {{-- Right Side Ends here --}}
<div class="col-md-12">
    <div class="form-group"> {{-- Remarks or if any additional description --}}
        {!! Form::label('remarks','REMARKS:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-10">
            {!! Form::text('remarks',null,['class'=>'form-control','placeholder'=>'IF ANY ADDITIONAL DESCRIPTION YOU WANT TO ADD OR ANY REMARKS']) !!}
        </div>
    </div>
</div>
<div class="col-md-12 text-center">
    <hr/>
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('VehicleController@index') }}" role="button" class="btn btn-danger">CANCEL</a>
    <hr/>
</div>

@section('script')
    <script>
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