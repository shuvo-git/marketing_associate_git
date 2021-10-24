<!-- Basic Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">{{$pageInfo["pageTitle"]}}<small></small></h3>
	</div>


	<div class="card-body" id="row_append">
		<div class="form-row">
			<div class="form-group col-md-2">
				<label class="control-label">Category <span class="required">*</span></label>
				<div>
					{!! Form::select('category[]', $categoryList, $value = null, array('id'=>'category', 'class' => 'form-control', 'onchange'=>"")) !!}
					
				</div>
			</div>
			<div class="form-group col-md-2">
				<label class="control-label">Account No <span class="required">*</span></label>
				<div>
					{!! Form::text('acc[]', $value = null, array('id'=>'acc', 'class' => 'form-control')) !!}
				</div>
			</div>
			<div class="form-group col-md-2">
				<label class="control-label">Amount <span class="required">*</span></label>
				<div>
					{!! Form::text('amount[]', $value = null, array('id'=>'amount', 'class' => 'form-control')) !!}
				</div>
			</div>
			<div class="form-group col-md-2">
				<label class="control-label">Rate <span class="required">*</span></label>
				<div>
					{!! Form::text('rate[]', $value = null, array('id'=>'rate', 'class' => 'form-control')) !!}
				</div>
				
			</div>
			<div class="form-group col-md-2">
				<label class="control-label">Incentive <span class="required">*</span></label>
				<div>
					{!! Form::text('incentive[]', $value = null, array('id'=>'incentive', 'class' => 'form-control')) !!}
				</div>
				
			</div>
		</div>
		
	</div>

    <div class="card-footer">
		<div class="form-group">
			<div class="col-md-offset-4 col-md">
				{!! Form::submit('Submit', array("id"=>"form_submit",'class' => "btn btn-success")) !!} 
				<a class="btn btn-app float-right" id="add_new"><i class="fa fa-plus"></i></a>
			</div>

		</div>
	</div>
</div>