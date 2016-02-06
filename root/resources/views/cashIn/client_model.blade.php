{{-- Modal --}}
<div class="modal fade" id="ledger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Client</h4>
            </div>
            {!! Form::open(['action'=>'CashInController@ledger','method'=>'get','role'=>'form','class'=>'form-inline']) !!}
            <div class="modal-body text-center">
                <div class="form-group">
                    {!! Form::label('client','Client:') !!}
                    {!! Form::select('client',$repository->clients(),null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('LEDGER',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{-- /Model --}}