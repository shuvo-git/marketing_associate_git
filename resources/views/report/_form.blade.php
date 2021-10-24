<div class="form-row">
    <div class="form-group col-md-3">
        <label>From Date: <span class="required">*</span></label>
        <div class="input-group date" id="from_date" data-target-input="nearest">
            
            {!! Form::text('from_date', $value = null, array('id'=>'from_date','data-target'=>"#from_date", 'class' => 'form-control datetimepicker-input')) !!}
            <div class="input-group-append" data-target="#from_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            @if($errors->has('from_date'))<span class="required text-danger">{{ $errors->first('from_date') }}</span>@endif
        </div>
        
    </div>
    <div class="form-group col-md-3">
        <label>To Date: <span class="required">*</span></label>
        <div class="input-group date" id="to_date" data-target-input="nearest">
            
            {!! Form::text('to_date', $value = null, array('id'=>'to_date','data-target'=>"#to_date", 'class' => 'form-control datetimepicker-input')) !!}
            <div class="input-group-append" data-target="#to_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            @if($errors->has('to_date'))<span class="required text-danger">{{ $errors->first('to_date') }}</span>@endif
        </div>
        
    </div>
    <div class="form-group  col-md-3">
        <label style="color: transparent">.</label>
        <div class="col-md-offset-4 col-md-8">
            {!! Form::submit('Search', array('class' => "btn btn-default")) !!} 
        </div>
    </div>
</div>