<div class="col-md-12 d-section">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
    <div class="col-md-6"> {{-- Left hand side --}}
        <div class="form-group"> {{-- eid --}}
            {!! Form::label('eid','ID:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::select('eid',$repository->employees(),null,['class'=>'form-control','id'=>'eid']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Date --}}
            {!! Form::label('date','Date:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('date',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control datetimepicker']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6"> {{-- Right hand side --}}
        <div class="form-group"> {{-- name --}}
            {!! Form::label('name','Name:',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('name',null,['class'=>'form-control','id'=>'name']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Paying --}}
            {!! Form::label('total','Amount',['class'=>'control-label col-sm-3']) !!}
            <div class="col-sm-9">
                {!! Form::text('total',null,['class'=>'form-control','id'=>'total']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 d-section">
    <label for="">Deduction Method:</label>
    <hr/>
    <div class="form-group"> {{-- Effect Start from --}}
        {!! Form::label('effect_form1','1st Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-3">
            {!! Form::select('effect_from1',$repository->months(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('year1','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-3">
            {!! Form::select('year1',$repository->years(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('rate1','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate1',null,['class'=>'form-control','id'=>'rate1']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Effect Start from --}}
        {!! Form::label('effect_form2','2nd Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-3">
            {!! Form::select('effect_from2',$repository->months(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('year2','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-3">
            {!! Form::select('year2',$repository->years(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('rate2','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate2',null,['class'=>'form-control','id'=>'rate2']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Effect Start from --}}
        {!! Form::label('effect_form3','3rd Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-3">
            {!! Form::select('effect_from3',$repository->months(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('year3','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-3">
            {!! Form::select('year3',$repository->years(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('rate3','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate3',null,['class'=>'form-control','id'=>'rate3']) !!}
        </div>
    </div>
    {{--<div class="form-group"> --}}{{-- Effect Ends at --}}
        {{--{!! Form::label('effect_to','Effect To:',['class'=>'control-label col-sm-3']) !!}--}}
        {{--<div class="col-sm-9">--}}
            {{--{!! Form::select('effect_to',$repository->months(),null,['class'=>'form-control']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group"> --}}{{-- Deduction Rate --}}
        {{--{!! Form::label('deduction_rate','Deduce Rate:',['class'=>'control-label col-sm-3']) !!}--}}
        {{--<div class="col-sm-9">--}}
            {{--{!! Form::text('deduction_rate',null,['class'=>'form-control','placeholder'=>'Amount to be deduce per month']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
<div class="col-md-12 d-section text-center">
    {!! Form::submit('PAY',['class'=>'btn btn-success','name'=>'advance']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('SalaryController@index') }}" role="button" class="btn btn-danger">CANCEL</a>
</div>
<div id="waiting">
    <img src="{{ asset('root/resources/assets/images/waiting.gif') }}" alt=""/>
</div>

@section('script')
    <script>
        /**
         * Autoload employee's name after selecting a employee id
         * Created by smartrahat Date: 2016.01.22 Time: 10:01 PM
        */
        $(document).ready(function(){
            $('#eid').change(function(){
                var eid = $(this).val();
                var csrf = $('#token').val();
                $.ajax({
                    url : 'driver',
                    data : {eid:eid,_token:csrf},
                    type : 'post',
                    beforeSend:function(){
                        $('#waiting').show()
                    },
                    complete:function(){
                        $('#waiting').hide()
                    }
                }).success(function(e){
                    $('#name').val(e)
                })
            })
        });

        $(function(){
            $('#rate1,#rate2,#rate3').blur(function(){
                var r1 = $('#rate1').val();
                var r2 = $('#rate2').val();
                var r3 = $('#rate3').val();

                var rate1 = (isNaN(r1) == true || r1.trim().length == 0) ? 0 : parseInt(r1);
                var rate2 = (isNaN(r2) == true || r2.trim().length == 0) ? 0 : parseInt(r2);
                var rate3 = (isNaN(r3) == true || r3.trim().length == 0) ? 0 : parseInt(r3);

                var total = rate1 + rate2 + rate3;
                $('#total').val(total);
            })
        });

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
    </script>
@stop