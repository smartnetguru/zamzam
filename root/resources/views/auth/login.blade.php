@extends('auth.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>LOGIN :: </b><span style="color: peru"><b>WELCOME TO FLEET MANAGEMENT SYSTEMS</b></span></div>
                    <div class="panel-body">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <strong>Wooops!!!</strong> There was some problems with your input
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['class'=>'form-horizontal', 'role'=>'form', 'method'=>'post']) !!}
                        <div class="form-group">
                            <label for="email" class="control-label col-md-4">Username:</label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" title="email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" title="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label for="remember" class="control-form">
                                    <input type="checkbox" name="remember"/> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ action('Auth\PasswordController@getEmail') }}">Forgot Password</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" name="submit" value="LOGIN" class="btn btn-primary"/>
                                {{--<a href="{{ URL::to('auth/register') }}" role="button" class="btn btn-primary">REGISTER</a>--}}
                                {{-- Register user is currently disable for Zamzam Transport. Disable by smartrahat|Date:07.09.2015|Time:3:32AM --}}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop