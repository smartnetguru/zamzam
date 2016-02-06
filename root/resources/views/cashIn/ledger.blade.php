@extends('master')

@section('content')
    <div class="col-md-12 alert alert-warning text-center">
        <h3>Ledger</h3>
    </div>
    <div class="d-section col-md-12">
        <table class="table table-bordered table-condensed table-stripe">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Client</th>
                <th>Description</th>
                <th>Reference</th>
                <th>Debit</th>
                <th>Credit</th>
            </tr>
            @foreach($ledgers as $ledger)
                <tr>
                    <td>{{ $ledger->id }}</td>
                    <td>{{ $ledger->date->format('Y-m-d') }}</td>
                    <td>{{ $ledger->client }}</td>
                    <td>{{ $ledger->description }}</td>
                    <td>{{ $ledger->reference }}</td>
                    <td align="right">{{ number_format($ledger->debit) }}/=</td>
                    <td align="right">{{ number_format($ledger->credit) }}/=</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" align="right"><b>Balance</b></td>
                <td align="right"><b>{{ number_format($ledgers->sum('debit') - $ledgers->sum('credit')) }}/=</b></td>
            </tr>
        </table>
    </div>
@stop