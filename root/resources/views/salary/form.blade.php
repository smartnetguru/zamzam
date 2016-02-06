<div class="col-md-12 d-section">
    <div class="col-md-6"> {{-- Left hand side --}}
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
        <div class="form-group"> {{-- Advance --}}
            {!! Form::label('advance','Advance:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('advance',$advance,['class'=>'form-control','id'=>'advance']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Total --}}
            {!! Form::label('total','Total:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('total',null,['class'=>'form-control','id'=>'total']) !!}
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
        <div class="form-group"> {{-- Due --}}
            {!! Form::label('due','Due:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('due',$due,['class'=>'form-control','id'=>'due']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Net Payable --}}
            {!! Form::label('payable','Net Payable:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('payable',null,['class'=>'form-control','id'=>'payable']) !!}
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
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('SalaryController@index') }}" class="btn btn-danger" role="button">CANCEL</a>
</div>

@section('script')
    <script>
        /**
         * Date Time Picker for journey start time & journey end time
         * Documentation will be found on following link: http://xdsoft.net/jqplugins/datetimepicker/
         * Created by smartrahat | Date: 2015.10.14 | Time: 3:13AM
         */
        jQuery('.datetimepicker').datetimepicker({
            timepicker:false,
            mask:true,
            format:'Y-m-d'
        });

        $(function() {
            $('#ot_hour, #ot_rate').blur(function() {
                var ot = (isNaN($('#ot_hour').val()) == true || $('#ot_hour').val().trim().length == 0) ? -1 : parseInt($('#ot_hour').val());
                var ot_rate = (isNaN($('#ot_rate').val()) == true || $('#ot_rate').val().trim().length == 0) ? -1 : parseInt($('#ot_rate').val());
                if (ot >= 0 && ot_rate >= 0)
                    $('#ot_amount').val(ot * ot_rate);
            });
        });

        $(function(){
            $('#absents,#ot_hour').blur(function(){
                var absent = $('#absents').val();
                var basic = $('#basic').val();
                var basic_amount = $('#basic_amount');
                var total = $('#total');
                var advance = $('#advance').val();
                var due = $('#due').val();

                var absents = (isNaN(absent) == true || absent.trim().length == 0) ? -1 : parseInt(absent);
                var basics = (isNaN(basic) == true || basic.trim().length == 0) ? -1 : parseInt(basic);
                var dues = (isNaN(due) == true || due.trim().length == 0) ? -1 : parseInt(due);
                var worked = 30 - absents;

                if(absents >= 0 && absents < 31){
                    $('#worked').val(worked);
                    basic_amount.val(parseInt((basics/30)*worked));
                    total.val(parseInt(basic_amount.val())+parseInt($('#ot_amount').val()));
                    $('#payable').val(total.val() - advance + dues);
                }
            })
        })

    </script>
@stop