<div class="card card-default">
	<div class="card-body">

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="associate_id" class="control-label mb-10">Associate ID: <span class="required">*</span></label>
                {{Form::text("associate_id",$claimIncentive->associate_id ?? '',['class'=>'form-control','required','placeholder'=>'Associate ID'])}}
                @if($errors->has('associate_id'))<span class="required text-danger">{{ $errors->first('associate_id') }}</span>@endif
            </div> 
            
            <div class="form-group col-md-3">
                <label>Date of Disbursement: <span class="required">*</span></label>
                <div class="input-group date" id="date_disbursement" data-target-input="nearest">
                    
                    {!! Form::text('date_disbursement', $StockIn->stockInDetails->send_date ?? request('send_date'),
                    ['id'=>'date_disbursement','data-target'=>"#date_disbursement", 'class' => 'form-control datetimepicker-input','autocomplete'=>"off"] ) !!}
                    <div class="input-group-append" data-target="#date_disbursement" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    
                </div>
                @if($errors->has('date_disbursement'))<span class="required text-danger">{{ $errors->first('date_disbursement') }}</span>@endif
            </div>
        </div>


        {{---------- TABLE ---------------------------------------------------------------------------}}

        <table class="table" id="paid_acc_info">
            @if($errors->any())
                @php
                    $cnt = count(old('category') );
                    
                @endphp

                @for ($i=0; $i < $cnt; $i++)
                    @include('paid_incentives.row_err',['i'=>$i])
                @endfor
                

            @else
                @include('paid_incentives.row')
            @endif
            
        </table>

        

    </div>
	
	
	<div class="card-footer">

		<div class="form-row">
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                <a href="{{  url('claim_incentive') }}" class="btn btn-default">Back</a>
            </div>

            <div class="form-group col-md-9">
                @if($errors->any())
                @else
                <a onclick="tableAddRow('paid_acc_info')" class="btn pull-right float-right">
                    <button type="button" class="btn btn-success" id="addNew"><i class="fa fa-plus-circle"></i></button>
                </a>
                @endif
                
                <a onclick="tableDeleteRow('paid_acc_info')" class="btn pull-right float-right">
                    <button type="button" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                </a>
            </div>

		</div>

        
	</div>
</div>