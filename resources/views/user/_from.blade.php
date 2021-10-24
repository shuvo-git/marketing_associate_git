
    @if($errors->has('name'))<span class="required text-danger">{{ $errors->first('name') }}</span>@endif
    <div class="input-group mb-3">
        {!! Form::text('name', $value = null, array('id'=>'name', 'class' => 'form-control','placeholder'=>"Full name")) !!}
		<div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        
    </div>
    

    
    @if($errors->has('employee_id'))<span class="required text-danger">{{ $errors->first('employee_id') }}</span>@endif
    <div class="input-group mb-3">
        {!! Form::text('employee_id', $value = null, array('id'=>'employee_id', 'class' => 'form-control','placeholder'=>"Employee ID")) !!}
		<div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-briefcase">
            </div>
        </div>
        
    </div>
    
    @if($errors->has('image'))<span class="required text-danger">{{ $errors->first('image') }}</span>@endif
    <div class="input-group mb-3">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input form-control-file" accept="image/png, image/jpg, image/jpeg" name="image" id="image">
                <label class="custom-file-label" for="image">Choose User Image</label>
            </div>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-image">
                </div>
            </div>
          
        </div>
    </div>

    @if($errors->has('role_id'))<span class="required text-danger">{{ $errors->first('role_id') }}</span>@endif   
    <div class="input-group mb-3">
        {!! Form::select('role_id', $roleList, $value = null, array('id'=>'role_id', 'class' => 'form-control', 'onchange'=>"")) !!}
	</div>
    
    
    @if($errors->has('branch_id'))<span class="required text-danger">{{ $errors->first('branch_id') }}</span>@endif   
    <div class="input-group mb-3">
        {!! Form::select('branch_id', $branchList, $value = null, array('id'=>'branch_id', 'class' => 'form-control', 'onchange'=>"")) !!}
	</div>
    
    @if($errors->has('email'))<span class="required text-danger">{{ $errors->first('email') }}</span>@endif   
    <div class="input-group mb-3">
        {!! Form::email('email', $value = null, array('id'=>'email', 'class' => 'form-control','placeholder'=>"email")) !!}
		<div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    
    @if($errors->has('password'))<span class="required text-danger">{{ $errors->first('password') }}</span>@endif
    <div class="input-group mb-3">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    @if (isset($new_register) && $new_register==1)
    <div class="input-group mb-3">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Retype password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    @endif
    

    <div class="row">
        @if (isset($new_register) && $new_register==1)
        @if($errors->has('agree_terms'))<span class="required text-danger">{{ $errors->first('agree_terms') }}</span>@endif
        <div class="col-8">
            <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="agree_terms" value="agree">
            <label for="agreeTerms">
            I agree to the <a href="#">terms</a>
            </label>
            </div>
        </div>
        @endif
        <!-- /.col -->
        <div class="col-4">
            {!! Form::submit('registration', array('class' => "btn btn-success btn-block")) !!}
        </div>
        <a href="{{  route('login') }}" class="text-center">I already have a membership</a>
        <!-- /.col -->
    </div>