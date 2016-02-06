<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/jquery.timepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/jquery.datetimepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/custom.css?version:1.0') }}"/>
    <link rel="shortcut icon" href="{{ asset('root/resources/assets/images/favicon.png') }}"/>
    <script src="{{ asset('root/resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('root/resources/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('root/resources/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('root/resources/assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('root/resources/assets/js/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('root/resources/assets/js/respond.js') }}"></script>
</head>
<body>
<div class="container main">
    {{--@include('banner')--}}
    @include('navbar')
    <div class="article col-md-12">
        @include('success_message')
        @include('error_message')
        @yield('content')
    </div>
    @include('footer')
</div>
@yield('script')
</body>
</html>