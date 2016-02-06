@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h2>Create Salary</h2>
    </div>
    <div class="d-section col-md-12">
        <table class="table table-striped table-bordered table-condensed table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Basic</th>
                <th>OT Rate</th>
                <th>Current Client</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td><a href="{{ action('SalaryController@show',[$employee->id]) }}">{{ $employee->eid }}</a></td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td align="right">{{ number_format($employee->basic) }}/=</td>
                    <td align="right">{{ $employee->ot_rate }}/=</td>
                    <td>
                        {{ $employee->client or 'No Client' }}
                        <a href="{{ action('SalaryController@create',[$employee->id]) }}" class="element btnn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span></a>
                        {{--<button type="button" data-toggle="modal" class="element btnn btn-success" data-target="#{{ $employee->id }}"><span class="glyphicon glyphicon-plus"></span></button>--}}
{{--                        @include('salary.create')--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop