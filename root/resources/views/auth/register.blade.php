@extends('auth.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">REGISTER</div>
                    <div class="panel-body">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['class'=>'form-horizontal', 'role'=>'form', 'method'=>'post']) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label for="name" class="control-label col-md-4">Full Name:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" title="Full Name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password" title="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_confirmation">Confirm Password:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password_confirmation" title="Re-Type Password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="email" name="email" title="Email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" name="submit" value="REGISTER" class="btn btn-primary"/>
                                <a href="{{ URL::to('auth/login') }}" role="button" class="btn btn-primary">GO TO LOGIN</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop