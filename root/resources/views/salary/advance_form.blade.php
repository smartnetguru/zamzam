<div class="col-md-12 d-section" xmlns="http://www.w3.org/1999/html">
    <div id="warning"></div>
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
    <div class="form-group"> {{-- Effect Start from one --}}
        {!! Form::label('effect_form1','1st Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from1',$repository->months(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('year1','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year1',$repository->years(),null,['class'=>'form-control']) !!}
        </div>
        {!! Form::label('rate1','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate1',null,['class'=>'form-control','id'=>'rate1']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-1"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-2"> {{-- Effect Start from two --}}
        {!! Form::label('effect_form2','2nd Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from2',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year2','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year2',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate2','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate2',null,['class'=>'form-control','id'=>'rate2','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-2"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-2"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-3"> {{-- Effect Start from three --}}
        {!! Form::label('effect_form3','3rd Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from3',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year3','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year3',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate3','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate3',null,['class'=>'form-control','id'=>'rate3','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-3"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-3"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-4"> {{-- Effect Start from four --}}
        {!! Form::label('effect_form4','4th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from4',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year4','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year4',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate4','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate4',null,['class'=>'form-control','id'=>'rate4','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-4"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-4"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-5"> {{-- Effect Start from five --}}
        {!! Form::label('effect_form5','5th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from5',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year5','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year5',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate5','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate5',null,['class'=>'form-control','id'=>'rate5','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-5"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-5"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-6"> {{-- Effect Start from six --}}
        {!! Form::label('effect_form6','6th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from6',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year6','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year6',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate6','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate6',null,['class'=>'form-control','id'=>'rate6','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-6"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-6"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-7"> {{-- Effect Start from seven --}}
        {!! Form::label('effect_form7','7th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from7',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year7','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year7',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate7','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate7',null,['class'=>'form-control','id'=>'rate7','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-7"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-7"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-8"> {{-- Effect Start from eight --}}
        {!! Form::label('effect_form8','8th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from8',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year8','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year8',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate8','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate8',null,['class'=>'form-control','id'=>'rate8','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-8"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-8"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-9"> {{-- Effect Start from nine --}}
        {!! Form::label('effect_form9','9th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from9',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year9','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year9',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate9','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate9',null,['class'=>'form-control','id'=>'rate9','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-9"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-9"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-10"> {{-- Effect Start from ten --}}
        {!! Form::label('effect_form10','10th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from10',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year10','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year10',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate10','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate10',null,['class'=>'form-control','id'=>'rate10','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-10"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-10"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-11"> {{-- Effect Start from eleven --}}
        {!! Form::label('effect_form11','11th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from11',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year11','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year11',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate11','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate11',null,['class'=>'form-control','id'=>'rate11','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="add-11"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button" name="add" class="btn btn-default" id="remove-11"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>
    <div class="form-group hidden" id="row-12"> {{-- Effect Start from twelve --}}
        {!! Form::label('effect_form12','12th Month:',['class'=>'control-label col-sm-2']) !!}
        <div class="col-sm-2">
            {!! Form::select('effect_from12',$repository->months(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('year12','Year:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::select('year12',$repository->years(),null,['class'=>'form-control','disabled']) !!}
        </div>
        {!! Form::label('rate12','Rate:',['class'=>'control-label col-sm-1']) !!}
        <div class="col-sm-2">
            {!! Form::text('rate12',null,['class'=>'form-control','id'=>'rate12','disabled']) !!}
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <button type="button" name="add" class="btn btn-default" id="remove-12"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>
    </div>

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

        /**
         * Check if the employee already has advance
         * Created by smartrahat Date: 2016.02.19 Time: 10:10 AM
         */
        $(document).ready(function(){
            $('#eid').change(function(){
                var eid = $(this).val();
                var csrf = $('#token').val();
                $.ajax({
                    url : 'isAdvance',
                    data : {eid:eid,_token:csrf},
                    type : 'post',
                    beforeSend:function(){
                        $('#waiting').show()
                    },
                    complete:function(){
                        $('#waiting').hide()
                    }
                }).success(function(e){
                    $('#warning').html(e)
                })
            })
        });

        /**
         * Calculate total advance amount
         */
        $(function(){
            $('#rate1,#rate2,#rate3,#rate4,#rate5,#rate6,#rate7,#rate8,#rate9,#rate10,#rate11,#rate12').blur(function(){
                var r1 = $('#rate1').val();
                var r2 = $('#rate2').val();
                var r3 = $('#rate3').val();
                var r4 = $('#rate4').val();
                var r5 = $('#rate5').val();
                var r6 = $('#rate6').val();
                var r7 = $('#rate7').val();
                var r8 = $('#rate8').val();
                var r9 = $('#rate9').val();
                var r10 = $('#rate10').val();
                var r11 = $('#rate11').val();
                var r12 = $('#rate12').val();

                var rate1 = (isNaN(r1) == true || r1.trim().length == 0) ? 0 : parseInt(r1);
                var rate2 = (isNaN(r2) == true || r2.trim().length == 0) ? 0 : parseInt(r2);
                var rate3 = (isNaN(r3) == true || r3.trim().length == 0) ? 0 : parseInt(r3);
                var rate4 = (isNaN(r4) == true || r4.trim().length == 0) ? 0 : parseInt(r4);
                var rate5 = (isNaN(r5) == true || r5.trim().length == 0) ? 0 : parseInt(r5);
                var rate6 = (isNaN(r6) == true || r6.trim().length == 0) ? 0 : parseInt(r6);
                var rate7 = (isNaN(r7) == true || r7.trim().length == 0) ? 0 : parseInt(r7);
                var rate8 = (isNaN(r8) == true || r8.trim().length == 0) ? 0 : parseInt(r8);
                var rate9 = (isNaN(r9) == true || r9.trim().length == 0) ? 0 : parseInt(r9);
                var rate10 = (isNaN(r10) == true || r10.trim().length == 0) ? 0 : parseInt(r10);
                var rate11 = (isNaN(r11) == true || r11.trim().length == 0) ? 0 : parseInt(r11);
                var rate12 = (isNaN(r12) == true || r12.trim().length == 0) ? 0 : parseInt(r12);

                var total = rate1 + rate2 + rate3 + rate4 + rate5 + rate6 + rate7 + rate8 + rate9 + rate10 + rate11 + rate12;
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

        /**
         * Add/Remove additional row for advance deduction rate
         * Created by smartrahat Date: 2016.03.05 Time: 06:54 PM
         */
        $(function(){
            $('#add-1').click(function(){
                $('#row-2').removeClass('hidden');
                $('#row-2 *').removeAttr('disabled');
                $('#add-1').hide();
            });
            $('#add-2').click(function(){
                $('#row-3').removeClass('hidden');
                $('#row-3 *').removeAttr('disabled');
                $('#add-2').hide();
                $('#remove-2').hide();
            });
            $('#add-3').click(function(){
                $('#row-4').removeClass('hidden');
                $('#row-4 *').removeAttr('disabled');
                $('#add-3').hide();
                $('#remove-3').hide();
            });
            $('#add-4').click(function(){
                $('#row-5').removeClass('hidden');
                $('#row-5 *').removeAttr('disabled');
                $('#add-4').hide();
                $('#remove-4').hide();
            });
            $('#add-5').click(function(){
                $('#row-6').removeClass('hidden');
                $('#row-6 *').removeAttr('disabled');
                $('#add-5').hide();
                $('#remove-5').hide();
            });
            $('#add-6').click(function(){
                $('#row-7').removeClass('hidden');
                $('#row-7 *').removeAttr('disabled');
                $('#add-6').hide();
                $('#remove-6').hide();
            });
            $('#add-7').click(function(){
                $('#row-8').removeClass('hidden');
                $('#row-8 *').removeAttr('disabled');
                $('#add-7').hide();
                $('#remove-7').hide();
            });
            $('#add-8').click(function(){
                $('#row-9').removeClass('hidden');
                $('#row-9 *').removeAttr('disabled');
                $('#add-8').hide();
                $('#remove-8').hide();
            });
            $('#add-9').click(function(){
                $('#row-10').removeClass('hidden');
                $('#row-10 *').removeAttr('disabled');
                $('#add-9').hide();
                $('#remove-9').hide();
            });
            $('#add-10').click(function(){
                $('#row-11').removeClass('hidden');
                $('#row-11 *').removeAttr('disabled');
                $('#add-10').hide();
                $('#remove-10').hide();
            });
            $('#add-11').click(function(){
                $('#row-12').removeClass('hidden');
                $('#row-12 *').removeAttr('disabled');
                $('#add-11').hide();
                $('#remove-11').hide();
            });

            $('#remove-2').click(function(){
                $('#row-2').addClass('hidden');
                $('#row-2 *').attr('disabled','disabled');
                $('#add-1').show();
                $('#rate2').val(null);
            });
            $('#remove-3').click(function(){
                $('#row-3').addClass('hidden');
                $('#row-3 *').attr('disabled','disabled');
                $('#add-2').show();
                $('#remove-2').show();
                $('#rate3').val(null);
            });
            $('#remove-4').click(function(){
                $('#row-4').addClass('hidden');
                $('#row-4 *').attr('disabled','disabled');
                $('#add-3').show();
                $('#remove-3').show();
                $('#rate4').val(null);
            });
            $('#remove-5').click(function(){
                $('#row-5').addClass('hidden');
                $('#row-5 *').attr('disabled','disabled');
                $('#add-4').show();
                $('#remove-4').show();
                $('#rate5').val(null);
            });
            $('#remove-6').click(function(){
                $('#row-6').addClass('hidden');
                $('#row-6 *').attr('disabled','disabled');
                $('#add-5').show();
                $('#remove-5').show();
                $('#rate6').val(null);
            });
            $('#remove-7').click(function(){
                $('#row-7').addClass('hidden');
                $('#row-7 *').attr('disabled','disabled');
                $('#add-6').show();
                $('#remove-6').show();
                $('#rate7').val(null);
            });
            $('#remove-8').click(function(){
                $('#row-8').addClass('hidden');
                $('#row-8 *').attr('disabled','disabled');
                $('#add-7').show();
                $('#remove-7').show();
                $('#rate8').val(null);
            });
            $('#remove-9').click(function(){
                $('#row-9').addClass('hidden');
                $('#row-9 *').attr('disabled','disabled');
                $('#add-8').show();
                $('#remove-8').show();
                $('#rate9').val(null);
            });
            $('#remove-10').click(function(){
                $('#row-10').addClass('hidden');
                $('#row-10 *').attr('disabled','disabled');
                $('#add-9').show();
                $('#remove-9').show();
                $('#rate10').val(null);
            });
            $('#remove-11').click(function(){
                $('#row-11').addClass('hidden');
                $('#row-11 *').attr('disabled','disabled');
                $('#add-10').show();
                $('#remove-10').show();
                $('#rate11').val(null);
            });
            $('#remove-12').click(function(){
                $('#row-12').addClass('hidden');
                $('#row-12 *').attr('disabled','disabled');
                $('#add-11').show();
                $('#remove-11').show();
                $('#rate12').val(null);
            });
        });

    </script>
@stop