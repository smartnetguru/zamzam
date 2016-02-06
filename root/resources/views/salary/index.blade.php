@extends('master')

@section('content')

    <div class="col-md-12 alert alert-warning text-center">
        <h2>Salary of {{ Carbon\Carbon::now()->subMonth(1)->format('F Y') }}</h2>
    </div>
    <div class="col-md-12 d-section no-print">
        <a href="javascript:window.print()" class="btn btn-success" role="button"><span class="glyphicon glyphicon-print"></span></a>
        <a href="{{ action('SalaryController@lists') }}" class="btn btn-success" role="button">Create Salary</a>
        <a href="{{ action('SalaryController@advance') }}" class="btn btn-success" role="button">Advance Salary</a>
        <a class="btn btn-success" role="button" data-toggle="collapse" href="#search" aria-expanded="false" aria-controls="collapseExample">Old Report</a>
    </div>
    <div class="col-md-12 d-section no-print collapse" id="search">
        {!! Form::open(['action'=>'SalaryController@index','method'=>'get','class'=>'form-inline']) !!}
        {!! Form::select('month',$repository->months(),null,['class'=>'form-control']) !!}
        {!! Form::select('year',$repository->years(),null,['class'=>'form-control']) !!}
        {!! Form::submit('Search',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12 alert alert-success">
        <p>Total Salary of {{ \Carbon\Carbon::now()->subMonth(1)->format('F Y') }}: {{ number_format($basicOfThisMonth + $otOfThisMonth) }}/=</p>
        <p>Basic: {{ number_format($basicOfThisMonth) }}/=</p>
        <p>Over Time: {{ number_format($otOfThisMonth) }}/=</p>
        <p>Drivers: {{ $totalDriverOfThisMonth }}</p>
    </div>
    <div class="d-section col-md-12">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Bus</th>
                <th class="no-print">Start Date</th>
                <th class="no-print">End Date</th>
                <th>W.Day</th>
                <th>Basic</th>
                <th class="no-print">OT Rate</th>
                <th class="no-print">OT Hour</th>
                <th>OT Amount</th>
                <th>Total Basic</th>
                <th>Total</th>
                <th>Balance</th>
                <th>Net Payable</th>
                <th>Signature</th>
                <th>Finger</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>
                        <a href="{{ action('SalaryController@show',[$employee->id]) }}" class="no-print">{{ $employee->eid }}</a>
                        <a href="#" class="only-print">{{ $employee->eid }}</a>
                    </td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $repository->vehicles($employee->employee_id) }}</td>
                    <td class="no-print">{{ $employee->start }}</td>
                    <td class="no-print">{{ $employee->end }}</td>
                    <td>{{ $employee->worked }}</td>
                    <td align="right">{{ number_format($employee->basic) }}/=</td>
                    <td class="no-print">{{ number_format($employee->ot_rate) }}/=</td>
                    <td class="no-print">{{ $employee->ot_hour }}</td>
                    <td align="right">{{ number_format($employee->ot_amount) }}/=</td>
                    <td align="right">{{ number_format($employee->basic_amount) }}/=</td>
                    <td align="right">{{ number_format($employee->ot_amount + $employee->basic_amount) }}/=</td>
                    <td align="right">{{ number_format($repository->balance($employee->eid)) }}/=</td>
                    <td align="right">{{ number_format($repository->payable($employee->eid))}}/=</td>
                    <td></td>
                    <td class="finger">
                        {!! Form::open(['action'=>['SalaryController@destroy',$employee->id],'class'=>'no-print','method'=>'delete','onsubmit'=>'return deleteConfirm()']) !!}
                        {!! Form::submit('X',['class'=>'element btnn btn-danger']) !!}
                        <br/>
                        <a href="{{ action('SalaryController@edit',[$employee->id]) }}" class="element btnn btn-warning" role="button"><span class="glyphicon glyphicon-edit"></span></a>
                        <br/>
                        <a href="{{ action('SalaryController@payment',[$employee->id]) }}" class="element btnn btn-success" role="button"><span class="glyphicon glyphicon-usd"></span></a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('script')
    <script>
        function deleteConfirm(){
            var x = confirm('Are you sure, you want to delete this entry?');
            return !!x;
        }
    </script>
@stop