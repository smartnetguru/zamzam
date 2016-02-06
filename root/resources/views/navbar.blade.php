<div class="navbar navbar-inverse col-md-12">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav">
            <li class="{{ Request::path()=='/'?'active':'' }}"><a href="{{ action('PageController@index') }}"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
            <li class="{{ Request::path()=='employee'?'active':'' }}"><a href="{{ action('EmployeeController@index') }}">EMPLOYEE</a></li>
            <li class="{{ Request::path()=='vehicle'?'active':'' }}"><a href="{{ action('VehicleController@index') }}">BUSES</a></li>
            <li class="{{ Request::path()=='client'?'active':'' }}"><a href="{{ action('ClientController@index') }}">CLIENTS</a></li>
            <li class="{{ Request::path()=='vendor'?'active':'' }}"><a href="{{ action('MyVendorController@index') }}">VENDORS</a></li>
{{--            <li class="{{ Request::path()=='route'?'active':'' }}"><a href="{{ action('RouteController@index') }}">ROUTE</a></li>--}}
            <li class="{{ Request::path()=='invoice'?'active':'' }}"><a href="{{ action('InvoiceController@index') }}">INVOICE</a></li>
            <li class="{{ Request::path()=='cashIn'?'active':'' }}"><a href="{{ action('CashInController@index') }}">CASH-IN</a></li>
            <li class="{{ Request::path()=='salary'?'active':'' }}"><a href="{{ action('SalaryController@index') }}">SALARY</a></li>
            <li class="{{ Request::path()=='cashOut'?'active':'' }}"><a href="{{ action('CashOutController@index') }}">CASH-OUT</a></li>
            <li class="{{ Request::path()=='config'?'active':'' }}"><a href="{{ action('MyConfigController@index') }}">CONFIG</a></li>
            <li><a href="{{ URL::to('auth/logout') }}">LOGOUT</a></li>
        </ul>
    </div>
</div>