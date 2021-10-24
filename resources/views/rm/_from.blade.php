<!-- Basic Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">{{$pageInfo["pageTitle"]}}<small></small></h3>
	</div>


	<div class="card-body">

		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">RM</label>
				<div>
					{!! Form::select('rm_id', $rmList, $value = null, array('id'=>'rm_id', 'class' => 'form-control', 'onchange'=>"")) !!}
					@if($errors->has('rm_id'))<span class="required text-danger">{{ $errors->first('rm_id') }}</span>@endif
				</div>
			</div>
		</div>
		
	</div>

    <div class="card-footer">
		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				{!! Form::submit('Submit', array('class' => "btn btn-success")) !!} &nbsp;
				<a href="{{  url('/') }}" class="btn btn-success">Back</a>
			</div>

		</div>
	</div>
</div>