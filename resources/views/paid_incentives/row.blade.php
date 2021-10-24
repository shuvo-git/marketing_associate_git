<tr>
    <th width="2%"><input type="checkbox" /></th>
    <td>
        {{Form::select('category[]',$categoryList,null,
        ['class'=>'form-control','required'])}}
        @if($errors->has('category'))<span class="required text-danger">{{ $errors->first('category') }}</span>@endif
    </td>
    
    <td>
        {{Form::text('deposit_account[]',null,
        ['class'=>'form-control','required','placeholder'=>"Deposit  A/C  No.",'onkeypress'=>"return isDigit(event)"])}}
        @if($errors->has('deposit_account'))<span class="required text-danger">{{ $errors->first('deposit_account') }}</span>@endif
    </td>
    <td>
        {{Form::text('deposited_amt[]',null,
        ['class'=>'form-control','required','placeholder'=>"Deposited Amount",'onkeypress'=>"return isNumber(event)"])}}
        @if($errors->has('deposited_amt'))<span class="required text-danger">{{ $errors->first('deposited_amt') }}</span>@endif
    </td>
    <td>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            {{Form::text('date_deposited[]',null,
            ['class'=>'form-control datemask','required',"data-inputmask-alias"=>"datetime", "data-inputmask-inputformat"=>"dd/mm/yyyy", 
            'placeholder'=>"Deposited Date","data-mask"])}}
        </div>
    </td>
    <td>
        {{Form::text('incentive_amt[]',null,
        ['class'=>'form-control','required','placeholder'=>"Incentive Amount",'onkeypress'=>"return isNumber(event)"])}}
        @if($errors->has('incentive_amt'))<span class="required text-danger">{{ $errors->first('incentive_amt') }}</span>@endif
    </td>
    <td>
        {{Form::text('remarks[]',null,
        ['class'=>'form-control','placeholder'=>"Remarks"])}}
        {{--@if($errors->has('remarks'))<span class="required text-danger">{{ $errors->first('remarks') }}</span>@endif--}}
    </td>
</tr>