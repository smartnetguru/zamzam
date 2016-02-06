<div class="col-md-12">
    <hr/>
    <p>Field with (*) Sign Must be Filled.</p>
    <hr/>
    <div class="col-md-6">
        <div class="form-group"> {{-- ID --}}
            {!! Form::label('cid','*Client ID:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('cid', null,['class'=>'form-control', 'placeholder'=>'CLIENT ID']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Name --}}
            {!! Form::label('name','*Client Name:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'CLIENT NAME (INDIVIDUAL OR COMPANY)']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Client Phone --}}
            {!! Form::label('client_phone','Client Phone:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('client_phone', null,['class'=>'form-control', 'placeholder'=>'+1234567890']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Client Email --}}
            {!! Form::label('client_email','Client Email:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('client_email', null,['class'=>'form-control', 'placeholder'=>'client@domain.com']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- Logo --}}
            {!! Form::label('logo',' ',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                <img src="{{ asset('root/resources/assets/images/client') }}/{{ $client->logo }}" alt="Click Browse & Select Company Logo" class="img-center thumbnail" width="160" height="160" id="blah"/>
                {!! Form::file('logo',['onchange'=>'readURL(this)']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group"> {{-- Bill --}}
            {!! Form::label('bill','Monthly Bill:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('bill', null,['class'=>'form-control', 'placeholder'=>'Qatari Riyal']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Agreement Starts --}}
            {!! Form::label('agreement_from','Agreement From:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('agreement_from', $client->agreement_from->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <hr/>
        <h4 class="text-center">Client Address</h4>
        <div class="form-group"> {{-- Address Line One --}}
            {!! Form::label('address','Address:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('address', null,['class'=>'form-control','placeholder'=>'APARTMENT, BUILDING, STREET']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- City --}}
            {!! Form::label('city','City:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('city', null,['class'=>'form-control','placeholder'=>'CITY']) !!}
            </div>
        </div>
        {{--<div class="form-group"> --}}{{-- State or Province --}}
            {{--{!! Form::label('state','State/Province:',['class'=>'control-label col-sm-4']) !!}--}}
            {{--<div class="col-sm-8">--}}
                {{--{!! Form::select('state',$repository->state(), null,['class'=>'form-control']) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group"> {{-- Post Code --}}
            {!! Form::label('post','Post Code:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('post', null,['class'=>'form-control','placeholder'=>'1234']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Country --}}
            {!! Form::label('country','Country:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('country', $repository->country(), null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- OT Rate Per Hour --}}
            {!! Form::label('ot','OT Rate/Hour:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('ot', null,['class'=>'form-control', 'placeholder'=>'Qatari Riyal']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Agreement Ends --}}
            {!! Form::label('agreement_to','Agreement To:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('agreement_to', $client->agreement_to->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
            </div>
        </div>
        <hr/>
        <h4 class="text-center">Contact Person</h4>
        <div class="form-group"> {{-- Contact Person --}}
            {!! Form::label('contact_person','Contact Person:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('contact_person', null,['class'=>'form-control', 'placeholder'=>'CONTACT PERSON NAME']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Contact Person Designation --}}
            {!! Form::label('contact_designation','Contact Person Designation:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('contact_designation', $repository->designation(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Contact Person Phone --}}
            {!! Form::label('contact_phone','Contact Person Phone:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('contact_phone', null,['class'=>'form-control', 'placeholder'=>'+1234567890']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Contact Person Email --}}
            {!! Form::label('contact_email','Contact Person Email:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('contact_email', null,['class'=>'form-control', 'placeholder'=>'contactperson@domain.com']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-center">
    <hr/>
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('ClientController@index') }}" role="button" class="btn btn-danger">CANCEL</a>
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