<!-- Basic Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">{{$pageInfo["pageTitle"]}}<small></small></h3>
	</div>


	<div class="card-body">

		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">Role Name</label>
				<div>
					{!! Form::text('role_name', $value = null, array('id'=>'role_name', 'class' => 'form-control')) !!}
					@if($errors->has('role_name'))<span class="required text-danger">{{ $errors->first('role_name') }}</span>@endif
				</div>
			</div>
			
			<div class="form-group col-md-6">
				<label class="control-label">Short Name</label>
				<div>
					{!! Form::text('role_short_name', $value = null, array('id'=>'role_short_name', 'class' => 'form-control')) !!}
					@if($errors->has('role_short_name'))<span class="required text-danger">{{ $errors->first('role_short_name') }}</span>@endif
				</div>
			</div>
		</div>
		
	</div>

    <div class="card-footer">
		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				{!! Form::submit('Submit', array('class' => "btn btn-success")) !!} &nbsp;
				<a href="{{  url('role') }}" class="btn btn-success">Back</a>
			</div>

		</div>
	</div>
</div>