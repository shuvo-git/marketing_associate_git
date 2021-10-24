<!-- Basic Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">{{$pageInfo["subTitle"]}}<small></small></h3>
	</div>


	<div class="card-body">
		@auth
		@if (auth()->user()->getRoleName->role_short_name!="assc")
		<div class="form-group row">

			<div class="form-group col-md-3">
				<label class="control-label">Select Associate<span class="required">*</span></label>
				<div>
					{!! Form::select('associate_id', $assciateList, $value = null, array('id'=>'associate_id', 'class' => 'form-control', 'onchange'=>"")) !!}
					@if($errors->has('associate_id'))<span class="required text-danger">{{ $errors->first('associate_id') }}</span>@endif
				</div>
			</div>
		</div>
		@endif
		@endauth
		
		

		<!----------- Image -->
		
		<div class="form-group row">
			
			<div>
				<div class="image">
					<img id="attachment_image_show" src="{{url('/')}}/images/claims/claim_placeholder.png" 
							width="300" height="400" alt="Attachment" />
					<iframe id="attachment_image_showpdf" src=""
							width="300" height="400"></iframe>
				</div>
			</div>
		</div>
		
		

		<div class="form-group">
			<label for="attachment_image">Image Upload <span class="required">*</span></label>
			<div class="input-group">
			  <div class="custom-file">
				<input type="file" accept="image/png, image/jpg, image/jpeg, application/pdf"  class="custom-file-input" name="attachment_image" id="attachment_image" onchange="readURL(this)">
				<label class="custom-file-label" for="attachment_image">Choose file</label>
			  </div>
			  <div class="input-group-append">
				<span class="input-group-text">Upload</span>
			  </div>
			  @if($errors->has('attachment_image'))<span class="required text-danger">{{ $errors->first('attachment_image') }}</span>@endif
			</div>
		</div>
		<!----------- End Image -->

		<div class="form-group row">
			<div class="form-group col-md-12">
				<label class="control-label">Remarks</label>
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
				{!! Form::submit('Submit', array('class' => "btn btn-success")) !!} &nbsp;
				<a href="{{  url('claim_incentive') }}" class="btn btn-success">Back</a>
			</div>

		</div>
	</div>
</div>