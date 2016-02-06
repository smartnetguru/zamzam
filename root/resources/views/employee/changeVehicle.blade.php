{{-- Modal --}}
<div class="modal fade" id="changeVehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Status</h4>
            </div>
            {!! Form::open(['action'=>'EmployeeController@changeVehicle','method'=>'post','role'=>'form','class'=>'form-inline']) !!}
            <div class="modal-body text-center">
                {!! Form::hidden('eid',$employee->id) !!}
                <div class="form-group">
                    {!! Form::label('bid','Vehicle:') !!}
                    {!! Form::select('bid',$repository->vehicle(),null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('date','START DATE:') !!}
                    {!! Form::text('date',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control datepicker']) !!}
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