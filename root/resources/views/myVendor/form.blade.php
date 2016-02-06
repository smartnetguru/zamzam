<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group"> {{-- Vendor ID --}}
            {!! Form::label('vid','Vendor ID:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('vid',null,['class'=>'form-control','placeholder'=>'Vendor ID']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Name --}}
            {!! Form::label('name','VENDOR NAME:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Vendor Name']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Businass Type --}}
            {!! Form::label('type','Business Type:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::select('type',$repository->businessType(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Address --}}
            {!! Form::label('address','ADDRESS:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('address',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- City --}}
            {!! Form::label('city','CITY:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('city',$repository->city(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- State --}}
            {!! Form::label('state','STATE:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('state',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Post --}}
            {!! Form::label('post','POST:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('post',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Country --}}
            {!! Form::label('country','COUNTRY:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('country',$repository->country(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Phone Number --}}
            {!! Form::label('phone','PHONE:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('phone',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Email Address --}}
            {!! Form::label('email','EMAIL:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div> {{-- Left Side Ends Here --}}
    <div class="col-md-6"> {{-- Right Side Starts from here --}}
        <div class="form-group"> {{-- Vendor LOGO --}}
            {!! Form::label('logo',' ',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                <img src="{{ asset('root/resources/assets/images/vendor') }}/{{ $vendor->logo }}" alt="Click Browse & Select Vendor Logo" class="img-center thumbnail" width="160" height="160" id="blah"/>
                {!! Form::file('logo',['onchange'=>'readURL(this)']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Contact Person's Name --}}
            {!! Form::label('contact_person','CONTACT PERSON:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('contact_person',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Contact Person's Designation --}}
            {!! Form::label('designation','DESIGNATION:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::select('designation',$repository->designation(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Contact Person's Phone Number --}}
            {!! Form::label('contact_phone','CONTACT\'S PHONE:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('contact_phone',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Conract Person's Email Address --}}
            {!! Form::label('contact_email','CONTACT\'S EMAIL:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('contact_email',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Fax Number --}}
            {!! Form::label('fax','FAX:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('fax',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vendor Account Number --}}
            {!! Form::label('account','A/C Number:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('account',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div> {{-- Right Side Ends Here --}}
</div>
<div class="col-md-12 text-center">
    <hr/>
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('MyVendorController@index') }}" role="button" class="btn btn-danger">CANCEL</a>
    <hr/>
</div>