<div class="col-md-6"> {{-- Left Side of the form --}}
    <div class="form-group"> {{-- Voucher Number --}}
        {!! Form::label('voucher','Voucher No.:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('voucher',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Client Name --}}
        {!! Form::label('name','Name:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Amount --}}
        {!! Form::label('amount','Amount:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('amount',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Cheque Number --}}
        {!! Form::label('cheque','Cheque No:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('cheque',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="col-md-6"> {{-- Right Side of the form --}}
    <div class="form-group"> {{-- Payment Date --}}
        {!! Form::label('date','Payment Date:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('date',$cashOut->date->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Payment Type --}}
        {!! Form::label('type','Payment Type:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::select('type',$repository->type(),null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Bank --}}
        {!! Form::label('bank','Bank:',['class'=>'col-sm-4 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('bank',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group"> {{-- Cheque Date --}}
        {!! Form::label('cheque_date','Cheque Date:',['class'=>'control-label col-sm-4']) !!}
        <div class="col-sm-8">
            {!! Form::text('cheque_date',$cashOut->chequeDate->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group"> {{-- Remarks if any --}}
        {!! Form::label('paid_for','For:',['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('paid_for',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="col-md-12 text-center">
    <hr/>
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('CashOutController@index') }}" role="button" class="btn btn-danger">CANCEL</a>
</div>


@section('script')
    <script>
        /**
         * Display Calender on associated input box
         */
        $(document).ready(
                function () {
                    $( ".datepicker" ).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    });
                }
        );

        /**
         * Toggle attributes of Bank, Cheque Number and Cheque Date
         * Created by smartrahat Date: 23.11.2015 Time: 10:31PM
         */
        $(document).ready(function(){
            $(".d-section").change(function(){
                $(this).find("option:selected").each(function(){
                    if($(this).attr("value")=="Cheque"){
                        $("#bank").removeAttr("disabled");
                        $("#cheque").removeAttr("disabled");
                        $("#cheque_date").removeAttr("disabled");
                    }
                    else if($(this).attr("value")=="Cash"){
                        $("#bank").attr("disabled",'disabled');
                        $("#cheque").attr("disabled", "disabled");
                        $("#cheque_date").attr("disabled", "disabled");
                    }
                });
            }).change();
        });
    </script>
@stop