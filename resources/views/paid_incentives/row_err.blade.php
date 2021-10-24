<tr>
    <td width="2%"><input type="checkbox" /></td>
    <td>
        {{Form::select('category['.$i.']',$categoryList,null,
        ['class'=>'form-control','required'])}}
        @if($errors->has('category.'.$i))<span class="required text-danger">{{ 'Category '.substr(explode('.',$errors->first('category.'.$i))[1],2) }}</span>@endif
    </td>
    
    <td>
        {{Form::text('deposit_account[]',null,
        ['class'=>'form-control','required','placeholder'=>"Deposit Account",'onkeypress'=>"return isDigit(event)"])}}
        @if($errors->has('deposit_account.'.$i))<span class="required text-danger">{{ 'Deposit Account '.substr(explode('.',$errors->first('deposit_account.'.$i))[1],2) }}</span>@endif
    </td>
    <td>
        {{Form::text('deposited_amt[]',null,
        ['class'=>'form-control','required','placeholder'=>"Deposited Amount",'onkeypress'=>"return isNumber(event)"])}}
        @if($errors->has('deposited_amt.'.$i))<span class="required text-danger">{{ "Deposited Amount ".substr(explode('.',$errors->first('deposited_amt.'.$i))[1],2) }}</span>@endif
    </td>
    <td>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            {{Form::text('date_deposited[]',null,
            ['class'=>'form-control datemask','required',"data-inputmask-alias"=>"datetime", "data-inputmask-inputformat"=>"dd/mm/yyyy", 
            'placeholder'=>"Deposited Date","data-mask"])}}
            @if($errors->has('date_deposited.'.$i))<span class="required text-danger">{{ "Deposit Date ".substr(explode('.',$errors->first('date_deposited.'.$i))[1],2) }}</span>@endif
        </div>
        
    </td>
    <td>
        {{Form::text('incentive_amt[]',null,
        ['class'=>'form-control','required','placeholder'=>"Incentive Amount",'onkeypress'=>"return isNumber(event)"])}}
        @if($errors->has('incentive_amt.'.$i))<span class="required text-danger">{{ "Incentive Amount ".substr(explode('.',$errors->first('incentive_amt.'.$i))[1],2) }}</span>@endif
    </td>
    
    <td>
        {{Form::text('remarks[]',null,
        ['class'=>'form-control','placeholder'=>"Remarks"])}}
        {{--@if($errors->has('remarks.'.$i))<span class="required text-danger">{{ "Remarks ".substr(explode('.',$errors->first('remarks.'.$i))[1],2) }}</span>@endif--}}
    </td>
</tr>