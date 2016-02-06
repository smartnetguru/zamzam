<div class="col-md-12 d-section"> {{-- Left hand side --}}
    <div class="col-md-6">
        <div class="form-group"> {{-- Employee ID --}}
            {!! Form::label('eid','ID:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('eid',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Month --}}
            {!! Form::label('month','Month:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-6">
                {!! Form::select('month',$repository->months(),\Carbon\Carbon::now()->subMonth(1)->format('F'),['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::select('year',$repository->years(),\Carbon\Carbon::now()->format('Y'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Start Date --}}
            {!! Form::label('start','Start Date:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('start',\Carbon\Carbon::now()->subMonth(1)->firstOfMonth()->format('Y-m-d'),['class'=>'form-control datetimepicker']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('leaves','Leaves:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('leaves',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- OT Rate --}}
            {!! Form::label('ot_rate','OT Rate:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('ot_rate',null,['class'=>'form-control','id'=>'ot_rate']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- OT Hour --}}
            {!! Form::label('ot_hour','OT Hour:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('ot_hour',null,['class'=>'form-control','id'=>'ot_hour']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- OT Amount --}}
            {!! Form::label('ot_amount','OT Amount:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('ot_amount',null,['class'=>'form-control','id'=>'ot_amount']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Balance --}}
            {!! Form::label('balance','Balance:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('balance',$balance,['class'=>'form-control','id'=>'balance']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Net Payable --}}
            {!! Form::label('payable','Net Payable:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('payable',$payable,['class'=>'form-control','id'=>'payable']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6"> {{-- Right hand side --}}
        <div class="form-group"> {{-- Name --}}
            {!! Form::label('name','Name:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Date --}}
            {!! Form::label('date','Date:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control datetimepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- End Date --}}
            {!! Form::label('end','End Date:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('end',\Carbon\Carbon::now()->subMonth(1)->lastOfMonth()->format('Y-m-d'),['class'=>'form-control datetimepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Absents --}}
            {!! Form::label('absents','Absents:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('absents',null,['class'=>'form-control absents','id'=>'absents']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Basic Salary --}}
            {!! Form::label('basic','Basic:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('basic',null,['class'=>'form-control','id'=>'basic']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Worked --}}
            {!! Form::label('worked','Worked:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('worked',null,['class'=>'form-control worked','id'=>'worked']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Basic Amount --}}
            {!! Form::label('basic_amount','Basic Amount:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('basic_amount',null,['class'=>'form-control','id'=>'basic_amount']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- total --}}
            {!! Form::label('total','Total:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('total',null,['class'=>'form-control','id'=>'total']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Pay --}}
            {!! Form::label('paid','Paying:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('paid',null,['class'=>'form-control','id'=>'pay']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group"> {{-- Comments --}}
            {!! Form::label('comment','Comment',['class'=>'control-label col-sm-1']) !!}
            <div class="col-sm-11">
                {!! Form::text('comment',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-center d-section">
    {!! Form::submit('Pay',['class'=>'btn btn-success','name'=>'due']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('SalaryController@index') }}" class="btn btn-danger" role="button">CANCEL</a>
</div>