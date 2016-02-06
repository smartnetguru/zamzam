<div class="col-md-12 d-section">
    <div class="col-md-6">
        <div class="form-group"> {{-- Invoice Number --}}
            {!! Form::label('invoiceNumber','Invoice Number:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('invoiceNumber',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- with driver --}}
            {!! Form::label('is_driver','Driver:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('is_driver',$repository->is_driver(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Client Name --}}
            {!! Form::label('client','Client:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('client',$repository->client(),null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- Date --}}
            {!! Form::label('date','Date:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('date',$invoice->date,['class'=>'form-control datetimepicker']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Month --}}
            {!! Form::label('month','Month:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('month',$repository->month(),null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Vehicle --}}
            {!! Form::label('vehicle','Bus:',['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('vehicle',$repository->vehicle(),null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- Duty Duration --}}
            {!! Form::label('duty','Duty Duration:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('duty',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Monthly Amount --}}
            {!! Form::label('amount','Monthly Amount:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('amount',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- Monthly Bill --}}
            {!! Form::label('bill','Monthly Bill:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('bill',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group"> {{-- Total OT Hour --}}
            {!! Form::label('ot','OT Duration:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('ot',null,['class'=>'form-control','onblur'=>'updateValue()']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- OT Rate --}}
            {!! Form::label('ot_rate','OT Rate/Hour:',['class'=>'col-sm-4 control-label','onblur'=>'updateValue()']) !!}
            <div class="col-sm-8">
                {!! Form::text('ot_rate',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group"> {{-- OT Bill --}}
            {!! Form::label('ot_bill','OT Amount:',['class'=>'col-sm-4 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('ot_bill',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group"> {{-- Comment --}}
            {!! Form::label('comment','Comment:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('comment',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-center d-section"> {{-- Buttons --}}
    {!! Form::submit($submitButtonText,['class'=>'btn btn-success']) !!}
    {!! Form::reset('RESET',['class'=>'btn btn-warning']) !!}
    <a href="{{ action('InvoiceController@index') }}" role="button" class="btn btn-danger">CANCEL</a>
</div>

@section('script')
    <script>
        /**
         * Multiply total ot bill
         */
        $(function() {
            $('#ot, #ot_rate').blur(function() {
                var ot = (isNaN($('#ot').val()) == true || $('#ot').val().trim().length == 0) ? -1 :  parseInt($('#ot').val());
                var otrate = (isNaN($('#ot_rate').val()) == true  || $('#ot_rate').val().trim().length == 0) ? -1 :  parseInt($('#ot_rate').val());
                if (ot > 0 && otrate > 0)
                    $('#ot_bill').val(ot * otrate);
            });
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