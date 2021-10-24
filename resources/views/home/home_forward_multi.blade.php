<div class="card-footer" id="multi_remarks">
    <div class="form-group">
        <div class="form-group col-md-12">
            <label class="control-label">Add Remarks</label>
            <div>
                {!! Form::textarea('remarks', $value = null, array('id'=>'remarks', 'class' => 'form-control','rows'=>"4")) !!}
                @if($errors->has('remarks'))<span class="required text-danger">{{ $errors->first('remarks') }}</span>@endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-md-8">
            @if (auth()->user()->getRoleName->role_short_name=='ho')
                {!! Form::submit('Accept', array('class' => "btn btn-success",'id' => 'multi_accept')) !!} &nbsp;
            
            @else
            {!! Form::submit('Forward Multiple', array('class' => "btn btn-info")) !!} &nbsp;
            @endif

            @if (auth()->user()->getRoleName->role_short_name!='rm' && auth()->user()->getRoleName->role_short_name!='assc')
            {!! Form::submit('Decline', array('class' => "btn btn-danger",'id' => 'multi_decline')) !!} &nbsp;
            @endif
            
        </div>

    </div>
</div>