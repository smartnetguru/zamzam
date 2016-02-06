{{-- Modal --}}
<div class="modal fade" id="policeCase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Police Case</h4>
            </div>
            {!! Form::open(['action'=>'EmployeeController@employeeCase','method'=>'post','role'=>'form','class'=>'form-horizontal']) !!}
            <div class="modal-body text-center">
                {!! Form::hidden('eid',$employee->id) !!}
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('bid','Vehicle:',['class'=>'control-label col-sm-3']) !!}
                            <div class="col-sm-9">
                                {!! Form::select('bid',$repository->vehicle(),null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('date','DATE:',['class'=>'control-label col-sm-3']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('date',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! Form::text('e_description',null,['class'=>'form-control','placeholder'=>'DESCRIPTION','required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('SAVE',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{-- /Model --}}

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
    </script>
@stop