@extends('master')

@section('content')
    <div class="alert alert-warning col-md-12">
        <h4>ID: {{ $employee->eid }}</h4>
        <h4>Name: {{ $employee->name }}</h4>
        <a href="javascript:window.print()" class="btn btn-success no-print"><span class="glyphicon glyphicon-print"></span></a>
    </div>
    <div class="d-section col-md-12">
        <table class="table table-bordered table-condensed table-responsive table-striped">
            <thead>
            <tr>
                <th>Tran ID</th>
                <th>Date</th>
                <th>Month</th>
                <th>Type</th>
                <th>Salary</th>
                <th>Paid</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salaries as $salary)
            <tr>
                <td>{{ $salary->id }}</td>
                <td>{{ $salary->date->format('Y-m-d') }}</td>
                <td>{{ $salary->month }}</td>
                <td>
                    @if($salary->type == 0)
                        {{ 'Generate' }}
                    @elseif($salary->type == 1)
                        {{ 'Paid' }}
                    @elseif($salary->type == 2)
                        {{ 'Advance' }}
                    @endif
                </td>
                <td align="right">{{ number_format($salary->total) }}/=</td>
                <td align="right">{{ number_format($salary->paid) }}/=
                    {!! Form::open(['action'=>['SalaryController@destroy',$salary->id],'method'=>'delete','onsubmit'=>'return deleteConfirm()']) !!}
                    <a href="@if($salary->type == 0){{ action('SalaryController@edit',[$salary->id]) }}@elseif($salary->type == 1){{ action('SalaryController@editPayment',[$salary->id]) }}@else {{ action('SalaryController@editAdvance',[$salary->id]) }} @endif" role="button" class="element btnn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                    {!! Form::submit('X',['class'=>'element btnn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right"><b>Balance</b></td>
                <td colspan="2" align="right"><b>{{ number_format($balance) }}/=</b></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop

@section('script')
    <script>
        function deleteConfirm(){
            var x = confirm('Are you sure you want to delete this transaction?');
            return !!x;
        }
    </script>
@stop