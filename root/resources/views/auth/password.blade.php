<!-- resources/views/auth/password.blade.php -->
@extends('auth.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Recover Password :: </b><span style="color: peru"><b>WELCOME TO FLEET MANAGEMENT SYSTEMS</b></span></div>
                    <div class="panel-body">
                        <form method="POST" action="{{ action('Auth\PasswordController@postEmail') }}" class="form-horizontal" role="form">
                            {!! csrf_field() !!}
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group">
                                <label for="email" class="control-label col-sm-2">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="user@domain.com" value="{{ old('emails') }}">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                                <h5>Remembered? <a href="{{ URL::to('auth/login') }}">Sign In</a></h5>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop