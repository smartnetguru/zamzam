<!DOCTYPE html>
<html>
<head>
    <title>404</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('root/resources/assets/css/bootstrap.min.css') }}"/>
    <style>

    </style>

</head>
<body>
<div class="col-md-12">
    <div class="col-md-6">
        <img src="{{ asset('root/resources/assets/images/404.jpg') }}" alt=""/>
    </div>
    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h1>WHOOPS!</h1>
            </div>
            <div class="panel-body">
                <p><b>The page you requested was not found, and we have a fine guess why</b></p>
                <ol>
                    <li>If you type URL directly, please make sure the spelling is correct</li>
                    <li>If you click on link to go here, the link is outdated</li>
                </ol>
                <p><b>What you can do?</b></p>
                <p>Have no fear, help is here! There is many ways you can get back on track.</p>
                <ul>
                    <li><a href="{{ URL::previous() }}">Go back</a> to the previous page</li>
                    <li><a href="{{ action('Auth\AuthController@getLogin') }}">Go to home page</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
