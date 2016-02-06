@extends('master')

@section('content')
    <div class="col-md-12 d-heading">
        <h1>Configuration Page</h1>
    </div>
    <div class="col-md-12 d-section panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="col-md-6"> {{-- Left side starts from here --}}
            <div class="col-md-12"> {{-- Configuration for country start here --}}
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingCountry">
                        <p><b><a role="button" data-toggle="collapse" data-parent="#accordion" href="#country" aria-expanded="true" aria-controls="country">COUNTRIES</a></b></p>
                    </div>
                    <div id="country" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingCountry">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeCountry','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('country',null,['class'=>'form-control','placeholder'=>'COUNTRY NAME']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-info']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($country as $con)
                                        {!! Form::open(['action'=>['MyConfigController@destroyCountry',$con->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $con->country }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for country ends here --}}
            <div class="col-md-12"> {{-- Configuration for city starts from here --}}
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingCity">
                        <p><b><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#city" aria-expanded="false" aria-controls="collapseOne">CITIES</a></b></p>
                    </div>
                    <div id="city" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCity">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeCity','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('city',null,['class'=>'form-control','placeholder'=>'CITY']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($city as $cit)
                                        {!! Form::open(['action'=>['MyConfigController@destroyCity',$cit->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $cit->city }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for city ends here --}}
            <div class="col-md-12"> {{-- Configuration for brand starts from here --}}
                <div class="panel panel-info">
                    <div class="panel-heading" role="tab" id="headingBrand">
                        <p><b><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#brand" aria-expanded="false" aria-controls="collapseOne">BRAND</a></b></p>
                    </div>
                    <div id="brand" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBrand">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeBrand','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('brand',null,['class'=>'form-control','placeholder'=>'BRAND']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($brands as $brand)
                                        {!! Form::open(['action'=>['MyConfigController@destroyBrand',$brand->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $brand->brand }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for brand ends here --}}
            <div class="col-md-12"> {{-- Configuration for Businass Type starts from here --}}
                <div class="panel panel-warning">
                    <div class="panel-heading" role="tab" id="headingBusiness">
                        <p><b><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#business" aria-expanded="false" aria-controls="collapseOne">BUSINESS TYPE</a></b></p>
                    </div>
                    <div id="business" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBusiness">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeBusiness','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'BUSINESS TYPE']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-warning']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($businessType as $business)
                                        {!! Form::open(['action'=>['MyConfigController@destroyBusiness',$business->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $business->name }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for Business Type ends here --}}
        </div> {{-- End of left side --}}
        <div class="col-md-6"> {{-- Right side starts from here --}}
            <div class="col-md-12"> {{-- Configuration for designation starts from here --}}
                <div class="panel panel-warning">
                    <div class="panel-heading" role="tab" id="headingDesignation">
                        <p><b><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#designation" aria-expanded="false" aria-controls="collapseOne">DESIGNATION</a></b></p>
                    </div>
                    <div id="designation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDesignation">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeDesignation','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('designation',null,['class'=>'form-control','placeholder'=>'DESIGNATION']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-warning']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($designation as $des)
                                        {!! Form::open(['action'=>['MyConfigController@destroyDesignation',$des->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $des->designation }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for designation ends here --}}
            <div class="col-md-12"> {{-- Configuration for state starts from here --}}
                <div class="panel panel-danger">
                    <div class="panel-heading" role="tab" id="headingState">
                        <p><b><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#state" aria-expanded="false" aria-controls="collapseOne">STATE</a></b></p>
                    </div>
                    <div id="state" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingState">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeState','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('state',null,['class'=>'form-control','placeholder'=>'STATE']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($state as $stt)
                                        {!! Form::open(['action'=>['MyConfigController@destroyState',$stt->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $stt->state }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for state ends here --}}
            <div class="col-md-12"> {{-- Configuration for model starts from here --}}
                <div class="panel panel-warning">
                    <div class="panel-heading" role="tab" id="headingModel">
                        <p><b><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#model" aria-expanded="false" aria-controls="collapseOne">MODEL</a></b></p>
                    </div>
                    <div id="model" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingModel">
                        <div class="panel-body">
                            {!! Form::open(['action'=>'MyConfigController@storeModel','role'=>'form','class'=>'form form-inline','method'=>'post']) !!}
                            {!! Form::text('model',null,['class'=>'form-control','placeholder'=>'MODEL']) !!}
                            {!! Form::submit('ADD',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <div class="d-scroll">
                                <table class="table-bordered table-condensed">
                                    @foreach($models as $model)
                                        {!! Form::open(['action'=>['MyConfigController@destroyModel',$model->id],'method'=>'delete','class'=>'form form-inline','onsubmit'=>'return confirmDelete()']) !!}
                                        <tr><td>{{ $model->model }}</td><td>{!! Form::submit('X',['class'=>'btn btn-default','title'=>'DELETE']) !!}</td></tr>
                                        {!! Form::close() !!}
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- Configuration for model ends here --}}
        </div>{{-- End of right side --}}
    </div>
@stop

@section('script')
    <script>
        /**
         * Confirm before delete any item from storage
         * Created by: smartrahat on 10.09.2015 6:36PM
         * @returns {boolean}
         */
        function confirmDelete(){
            var x = confirm('Are you sure you want delete this item?');
            return !!x;
        }
    </script>
@stop