<!-- resources/views/auth/reset.blade.php -->
@extends('auth.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Reset Password :: </b><span style="color: peru"><b>WELCOME TO FLEET MANAGEMENT SYSTEMS</b></span></div>
                    <div class="panel-body">
                        <form method="POST" action="/password/reset" class="form-horizontal" role="form">
                            {!! csrf_field() !!}
                            <input type="hidden" name="token" value="{{ $token }}">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group">
                                <label for="email" class="control-label col-sm-4">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" placeholder="user@domain.com" value="{{ old('emails') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-4">Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="control-label col-sm-4">Confirm Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop