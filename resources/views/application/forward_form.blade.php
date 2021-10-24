
<!-- Basic Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Remarks<small></small></h3>
	</div>


	<div class="card-body">
		<div class="form-group">
			<div class="form-group col-md-12">
				<label class="control-label">Add Remarks</label>
				<div>
					{!! Form::textarea('remarks', $value = null, array('id'=>'remarks', 'class' => 'form-control','rows'=>"4")) !!}
					@if($errors->has('remarks'))<span class="required text-danger">{{ $errors->first('remarks') }}</span>@endif
				</div>
			</div>
		</div>
		

		
	</div>

	<div class="card-footer">
		<div class="form-group">
			<div class="col-md-offset-4 col-md-8">
				@if (isset($pageInfo["action"]))
					@if ($pageInfo["action"]==='AC')
					{!! Form::submit('Accept', array('class' => "btn btn-success")) !!} &nbsp;
					@elseif ($pageInfo["action"]==='DEC')
					{!! Form::submit('Decline', array('class' => "btn btn-danger")) !!} &nbsp;
					@endif
				@else
				{!! Form::submit('Forward To', array('class' => "btn btn-info")) !!} &nbsp;
				@endif
				
			</div>

		</div>
	</div>
</div>



			

		

		

		




