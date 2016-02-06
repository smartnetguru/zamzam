<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title or 'ZAMZAM' }}</title>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/auth.css')}}"/>
    <script src="{{ asset('root/resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('root/resources/assets/js/bootstrap.min.js') }}"></script>
</head>
<body style="background-color: #eeeeee">
<div class="container-fluid">
    <div class="col-md-10">
        <div class="text-center">
            <img src="{{ asset('root/resources/assets/images/favicon.png') }}" alt="" height="100px" style="margin:10px"/>
        </div>
        @yield('content')
    </div>
</div>
</body>
</html>