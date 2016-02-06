{{-- Modal --}}
<div class="modal fade" id="assignStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Vehicle Status</h4>
            </div>
            {!! Form::open(['action'=>'VehicleController@assignStatus','method'=>'post','role'=>'form','class'=>'form-inline']) !!}
            <div class="modal-body text-center">
                {!! Form::hidden('bid',$vehicle->id) !!}
                <div class="form-group">
                    {!! Form::label('status','Change Status:') !!}
                    {!! Form::select('status',$repository->status(),null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('date','DATE:') !!}
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