
<!-- Basic Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Basic Info<small></small></h3>
	</div>


	<div class="card-body">

		<div class="form-row">
			<div class="form-group col-md-3">
				<label class="control-label">Name <span class="required">*</span></label>
				<div>
					{!! Form::text('name', $value = null, array('id'=>'name', 'class' => 'form-control')) !!}
					@if($errors->has('name'))<span class="required text-danger">{{ $errors->first('name') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Date of Birth: <span class="required">*</span></label>
				<div class="input-group date" id="dob" data-target-input="nearest">
					
					{!! Form::text('dob', $value = null, array('id'=>'dob','data-target'=>"#dob", 'class' => 'form-control datetimepicker-input')) !!}
					<div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
					
				</div>
				@if($errors->has('dob'))<span class="required text-danger">{{ $errors->first('dob') }}</span>@endif
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Place of Birth <span class="required">*</span></label>
				<div>
					{!! Form::text('place_of_birth', $value = null, array('id'=>'place_of_birth', 'class' => 'form-control')) !!}
					@if($errors->has('place_of_birth'))<span class="required text-danger">{{ $errors->first('place_of_birth') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Gender <span class="required">*</span></label>
				<div>
					{!! Form::select('gender', $genderList, $value = null, array('id'=>'gender', 'class' => 'form-control', 'onchange'=>"")) !!}
					@if($errors->has('gender'))<span class="required text-danger">{{ $errors->first('gender') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			
			<div class="form-group col-md-3">
				<label class="control-label">Marital Status <span class="required">*</span></label>
				<div>
					{!! Form::select('marital_status', $maritalStatusList, $value = null, array('id'=>'marital_status', 'class' => 'form-control', 'onchange'=>"")) !!}
					@if($errors->has('marital_status'))<span class="required text-danger">{{ $errors->first('marital_status') }}</span>@endif
				</div>
			</div>

			

			<div class="form-group col-md-3">
				<label class="control-label">Preferred Branch <span class="required">*</span></label>
				<div>
					{!! Form::select('preferred_branch', $branchList, $value = null, array('id'=>'preferred_branch', 'class' => 'form-control', 'onchange'=>"")) !!}
					@if($errors->has('preferred_branch'))<span class="required text-danger">{{ $errors->first('preferred_branch') }}</span>@endif
				</div>
			</div>
			<!--div class="alert alert-info alert-dismissible col-md-3">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-info"></i> INFO</h5>
				Either NID No or Passport No is required.
			</div-->
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">NID No <span class="required">*</span></label>
				<div>
					{!! Form::text('nid_no', $value = null, array('id'=>'nid_no', 'class' => 'form-control')) !!}
					@if($errors->has('nid_no'))<span class="required text-danger">{{ $errors->first('nid_no') }}</span>@endif
				</div>
			</div>
			<!----------- Image -->
			<div class="form-group col-md-2" id="nid_image_show_div">
				<div>
					<div class="image" style="padding: 10px;">
						<img id="nid_image_show" src="{{url('/')}}/images/nids/img_placeholder.png" width="100" height="60" alt="NID Image" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-4" id="nid_image_div">
				<label for="nid_image">NID Image Upload <span class="required">*</span></label>
				<div class="input-group">
				<div class="custom-file">
					<input type="file" accept="image/png, image/jpg, image/jpeg"  class="custom-file-input" name="nid_image" id="nid_image" onchange="readURL(this)">
					<label class="custom-file-label" for="nid_image">Choose file</label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text">Upload</span>
				</div>
				@if($errors->has('nid_image'))<span class="required text-danger">{{ $errors->first('nid_image') }}</span>@endif
				</div>
			</div>
			<!----------- End Image -->

			

			
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">Passport No <span class="required">*</span></label>
				<div>
					{!! Form::text('passport_no', $value = null, array('id'=>'passport_no', 'class' => 'form-control')) !!}
					@if($errors->has('passport_no'))<span class="required text-danger">{{ $errors->first('passport_no') }}</span>@endif
				</div>
			</div>

			<!----------- Image -->
			<div class="form-group col-md-2" id="passport_image_show_div">
				<div>
					<div class="image" style="padding: 10px;">
						<img id="passport_image_show" src="{{url('/')}}/images/passports/img_placeholder.png" width="100" height="60" alt="NID Image" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-4" id="passport_image_div">
				<label for="passport_image">Passport Image Upload <span class="required">*</span></label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" accept="image/png, image/jpg, image/jpeg"  class="custom-file-input" name="passport_image" id="passport_image" onchange="readURL(this)">
						<label class="custom-file-label" for="passport_image">Choose file</label>
					</div>
					<div class="input-group-append">
						<span class="input-group-text">Upload</span>
					</div>
					@if($errors->has('passport_image'))<span class="required text-danger">{{ $errors->first('passport_image') }}</span>@endif
				</div>
			</div>
			<!----------- End Image -->
		
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">Birth Certificate No <span class="required">*</span></label>
				<div>
					{!! Form::text('birth_certificate_no', $value = null, array('id'=>'birth_certificate_no', 'class' => 'form-control')) !!}
					@if($errors->has('birth_certificate_no'))<span class="required text-danger">{{ $errors->first('birth_certificate_no') }}</span>@endif
				</div>
			</div>
			<!----------- Image -->
			<div class="form-group col-md-2" id="birth_certificate_image_show_div">
				<div>
					<div class="image" style="padding: 10px;">
						<img id="birth_certificate_image_show" src="{{url('/')}}/images/passports/img_placeholder.png" width="100" height="60" alt="NID Image" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-4" id="birth_certificate_image_div">
				<label for="birth_certificate_image">Birth Certificate Image Upload <span class="required">*</span></label>
				<div class="input-group">
				<div class="custom-file">
					<input type="file" accept="image/png, image/jpg, image/jpeg"  class="custom-file-input" name="birth_certificate_image" id="birth_certificate_image" onchange="readURL(this)">
					<label class="custom-file-label" for="birth_certificate_image">Choose file</label>
				</div>
				<div class="input-group-append">
					<span class="input-group-text">Upload</span>
				</div>
				@if($errors->has('birth_certificate_image'))<span class="required text-danger">{{ $errors->first('birth_certificate_image') }}</span>@endif
				</div>
			</div>
			<!----------- End Image -->
		</div>

		
	</div>
</div>

<!-- Present Address Details -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Present Address Details<small></small></h3>
	</div>
	<div class="card-body">

		<div class="form-row">
			<div class="form-group col-md-3">
				<label class="control-label">Road No / Village <span class="required">*</span></label>
				<div>
					{!! Form::text('pre_road_or_village', $value = null, array('id'=>'pre_road_or_village', 'class' => 'form-control')) !!}
					@if($errors->has('pre_road_or_village'))<span class="required text-danger">{{ $errors->first('pre_road_or_village') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Post Office <span class="required">*</span></label>
				<div>
					{!! Form::text('pre_post_office', $value = null, array('id'=>'pre_post_office', 'class' => 'form-control')) !!}
					@if($errors->has('pre_post_office'))<span class="required text-danger">{{ $errors->first('pre_post_office') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Division <span class="required">*</span></label>
				<div>
					{!! Form::select('pre_division', $divisionList, $value = null, array('id'=>'pre_division', 'class' => 'form-control', 'onchange'=>"")) !!}
				@if($errors->has('pre_division'))<span class="required text-danger">{{ $errors->first('pre_division') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">District <span class="required">*</span></label>
				<div>
					{!! Form::select('pre_district', $districtList, $value = null, array('id'=>'pre_district', 'class' => 'form-control', 'onchange'=>"")) !!}
				@if($errors->has('pre_district'))<span class="required text-danger">{{ $errors->first('pre_district') }}</span>@endif
				</div>
			</div>

		</div>
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">How long been staying here (in years)? <span class="required">*</span></label>
				<div>
					{!! Form::text('pre_years', $value = null, array('id'=>'pre_years', 'class' => 'form-control')) !!}
					@if($errors->has('pre_years'))<span class="required text-danger">{{ $errors->first('pre_years') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-1">
			</div>
			
			
		
		</div>

	</div>
</div>

<!-- Permanent Address Details -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Permanent Address Details<small></small></h3>
		
	</div>
	<div class="card-body">
		<div class="form-row">
			<div class="form-check col-md-5" style="padding-bottom: 15px;padding-left:25px;">
				<input type="checkbox" class="form-check-input" name="checkSameAsPresent" id="checkSameAsPresent" {{ old('checkSameAsPresent')?'checked':''}}>
				<label class="form-check-label" for="checkSameAsPresent"><strong> Permanent address is same as present address</strong></label>
			</div>
		</div>
		<div class="form-row"   id="per_address">
			
			<div class="form-group col-md-3">
				<label class="control-label">Road No / Village <span class="required">*</span></label>
				<div>
					{!! Form::text('per_road_or_village', $value = null, array('id'=>'per_road_or_village', 'class' => 'form-control')) !!}
					@if($errors->has('per_road_or_village'))<span class="required text-danger">{{ $errors->first('per_road_or_village') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Post Office <span class="required">*</span></label>
				<div>
					{!! Form::text('per_post_office', $value = null, array('id'=>'per_post_office', 'class' => 'form-control')) !!}
					@if($errors->has('per_post_office'))<span class="required text-danger">{{ $errors->first('per_post_office') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Division <span class="required">*</span></label>
				<div>
					{!! Form::select('per_division', $divisionList, $value = null, array('id'=>'per_division', 'class' => 'form-control', 'onchange'=>"")) !!}
				@if($errors->has('per_division'))<span class="required text-danger">{{ $errors->first('per_division') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">District <span class="required">*</span></label>
				<div>
					{!! Form::select('per_district', $districtList, $value = null, array('id'=>'per_district', 'class' => 'form-control', 'onchange'=>"")) !!}
				@if($errors->has('per_district'))<span class="required text-danger">{{ $errors->first('per_district') }}</span>@endif
				</div>
			</div>

		</div>

	</div>
</div>

<!-- Contact Details -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Contact Info<small></small></h3>
	</div>
	<div class="card-body">

		<div class="form-row">
			<div class="form-group col-md-2">
				<label class="control-label">Cell No <span class="required">*</span></label>
				<div>
					{!! Form::text('cell', $value = null, array('id'=>'cell', 'class' => 'form-control')) !!}
					@if($errors->has('cell'))<span class="required text-danger">{{ $errors->first('cell') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-4">
				<label class="control-label">How long been using this Cell No (in years)?<span class="required">*</span></label>
				<div>
					{!! Form::text('cell_years', $value = null, array('id'=>'cell_years', 'class' => 'form-control')) !!}
					@if($errors->has('cell_years'))<span class="required text-danger">{{ $errors->first('cell_years') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">Email <span class="required">*</span></label>
				<div>
					{!! Form::text('email', $value = null, array('id'=>'email', 'class' => 'form-control')) !!}
					@if($errors->has('email'))<span class="required text-danger">{{ $errors->first('email') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="control-label">TIN</label>
				<div>
					{!! Form::text('tin', $value = null, array('id'=>'tin', 'class' => 'form-control')) !!}
					@if($errors->has('tin'))<span class="required text-danger">{{ $errors->first('tin') }}</span>@endif
				</div>
			</div>

		</div>

		<div class="form-row">
			<div class="form-group col-md-3">
				<label class="control-label">FB / LinkedIn / Instagram ID  </label>
				<div>
					{!! Form::text('social', $value = null, array('id'=>'social', 'class' => 'form-control')) !!}
					@if($errors->has('social'))<span class="required text-danger">{{ $errors->first('social') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-4">
				<label class="control-label">How long been using this ID? (years) </label>
				<div>
					{!! Form::text('social_years', $value = null, array('id'=>'social_years', 'class' => 'form-control')) !!}
					@if($errors->has('social_years'))<span class="required text-danger">{{ $errors->first('social_years') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-5">
				<label class="control-label">Occupation</label>
				<div>
					{!! Form::text('occupation', $value = null, array('id'=>'occupation', 'class' => 'form-control')) !!}
					@if($errors->has('occupation'))<span class="required text-danger">{{ $errors->first('occupation') }}</span>@endif
				</div>
			</div>

		</div>

		<div class="form-row">
			<div class="form-group col-md-3">
				<label class="control-label"> <span class="required">Bank Acc No</span></label>
				<div>
					{!! Form::text('bank_acc_no', $value = null, array('id'=>'bank_acc_no', 'class' => 'form-control')) !!}
					@if($errors->has('bank_acc_no'))<span class="required text-danger">{{ $errors->first('bank_acc_no') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-4">
				<label class="control-label">Bank Name</label>
				<div>
					{!! Form::select('bank_name', $bankList, $value = null, array('id'=>'bank_name', 'class' => 'form-control', 'onchange'=>"")) !!}
					@if($errors->has('bank_name'))<span class="required text-danger">{{ $errors->first('bank_name') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-5">
				<label class="control-label">Branch</label>
				<div>
					{!! Form::text('branch', $value = null, array('id'=>'branch', 'class' => 'form-control')) !!}
					@if($errors->has('branch'))<span class="required text-danger">{{ $errors->first('branch') }}</span>@endif
				</div>
			</div>

		</div>
	</div>
</div>

<!-- Education Details -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Education Details<small> (Indicate highest level of education achieved) </small></h3>
	</div>
	<div class="card-body">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">Name of Education Institute</label>
				<div>
					{!! Form::text('edu_institute', $value = null, array('id'=>'edu_institute', 'class' => 'form-control')) !!}
					@if($errors->has('edu_institute'))<span class="required text-danger">{{ $errors->first('edu_institute') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-3">
				<label class="control-label">Name of Exam</label>
				<div>
					{!! Form::text('name_of_exam', $value = null, array('id'=>'name_of_exam', 'class' => 'form-control')) !!}
					@if($errors->has('name_of_exam'))<span class="required text-danger">{{ $errors->first('name_of_exam') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-3">
				<label class="control-label">Year of Passing</label>
				<div>
					{!! Form::text('year_of_passing', $value = null, array('id'=>'year_of_passing', 'class' => 'form-control')) !!}
					@if($errors->has('year_of_passing'))<span class="required text-danger">{{ $errors->first('year_of_passing') }}</span>@endif
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-3">
				<label class="control-label">CGPA / division / Class</label>
				<div>
					{!! Form::text('cgpa_division_class', $value = null, array('id'=>'cgpa_division_class', 'class' => 'form-control')) !!}
					@if($errors->has('cgpa_division_class'))<span class="required text-danger">{{ $errors->first('cgpa_division_class') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="control-label">Name of Board/University</label>
				<div>
					{!! Form::text('name_board_university', $value = null, array('id'=>'name_board_university', 'class' => 'form-control')) !!}
					@if($errors->has('name_board_university'))<span class="required text-danger">{{ $errors->first('name_board_university') }}</span>@endif
				</div>
			</div>
			<div class="form-group col-md-3">
				<label class="control-label">Any Professional Degree</label>
				<div>
					{!! Form::text('professional_degree', $value = null, array('id'=>'professional_degree', 'class' => 'form-control')) !!}
					@if($errors->has('professional_degree'))<span class="required text-danger">{{ $errors->first('professional_degree') }}</span>@endif
				</div>
			</div>
			
		</div>
	</div>
</div>

<!-- Family Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Applicant's Family Info<small></small></h3>
	</div>


	<div class="card-body">

		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label"> Spouse's Name </span></label>
				<div>
					{!! Form::text('spouse_name', $value = null, array('id'=>'spouse_name', 'class' => 'form-control')) !!}
					@if($errors->has('spouse_name'))<span class="required text-danger">{{ $errors->first('spouse_name') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Date of Birth:</label>
				<div class="input-group date" id="dob" data-target-input="nearest">
					
					{!! Form::text('spouse_dob', $value = null, array('id'=>'spouse_dob','data-target'=>"#spouse_dob", 'class' => 'form-control datetimepicker-input')) !!}
					
					<div class="input-group-append" data-target="#spouse_dob" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				@if($errors->has('spouse_dob'))<span class="required text-danger">{{ $errors->first('spouse_dob') }}</span>@endif
			</div>

			<div class="form-group col-md-3">
				<label class="control-label"> <span class="required">Contact</span></label>
				<div>
					{!! Form::text('spouse_contact', $value = null, array('id'=>'spouse_contact', 'class' => 'form-control')) !!}
					@if($errors->has('spouse_contact'))<span class="required text-danger">{{ $errors->first('spouse_contact') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">Father's Name  <span class="required">*</span></label>
				<div>
					{!! Form::text('fathers_name', $value = null, array('id'=>'fathers_name', 'class' => 'form-control')) !!}
					@if($errors->has('fathers_name'))<span class="required text-danger">{{ $errors->first('fathers_name') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Date of Birth:</label>
				<div class="input-group date" id="dob" data-target-input="nearest">
					
					{!! Form::text('fathers_dob', $value = null, array('id'=>'fathers_dob','data-target'=>"#fathers_dob", 'class' => 'form-control datetimepicker-input')) !!}
					
					<div class="input-group-append" data-target="#fathers_dob" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				@if($errors->has('fathers_dob'))<span class="required text-danger">{{ $errors->first('fathers_dob') }}</span>@endif
			</div>

			<div class="form-group col-md-3">
				<label class="control-label"> <span class="required">Contact</span></label>
				<div>
					{!! Form::text('fathers_contact', $value = null, array('id'=>'fathers_contact', 'class' => 'form-control')) !!}
					@if($errors->has('fathers_contact'))<span class="required text-danger">{{ $errors->first('fathers_contact') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label class="control-label">Mother's Name  <span class="required">*</span></label>
				<div>
					{!! Form::text('mothers_name', $value = null, array('id'=>'mothers_name', 'class' => 'form-control')) !!}
					@if($errors->has('mothers_name'))<span class="required text-danger">{{ $errors->first('mothers_name') }}</span>@endif
				</div>
			</div>

			<div class="form-group col-md-3">
				<label>Date of Birth:</label>
				<div class="input-group date" id="dob" data-target-input="nearest">
					
					{!! Form::text('mothers_dob', $value = null, array('id'=>'mothers_dob','data-target'=>"#mothers_dob", 'class' => 'form-control datetimepicker-input')) !!}
					
					<div class="input-group-append" data-target="#mothers_dob" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				@if($errors->has('mothers_dob'))<span class="required text-danger">{{ $errors->first('mothers_dob') }}</span>@endif
			</div>

			<div class="form-group col-md-3">
				<label class="control-label"> <span class="required">Contact</span></label>
				<div>
					{!! Form::text('mothers_contact', $value = null, array('id'=>'mothers_contact', 'class' => 'form-control')) !!}
					@if($errors->has('mothers_contact'))<span class="required text-danger">{{ $errors->first('mothers_contact') }}</span>@endif
				</div>
			</div>
		</div>

		

		

		
	</div>
</div>

<!-- Emergency Contact Details -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title"> Emergency Contact Details<small> </small></h3>
	</div>
	<div class="card-body">

		<fieldset class="reset-this redo-fieldset" style="margin-left: 10px;">
			<legend  class="reset-this redo-legend"><small>Primary Contact</small></legend>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label class="control-label">Name  <span class="required">*</span></label>
					<div>
						{!! Form::text('primary_contact_name', $value = null, array('id'=>'primary_contact_name', 'class' => 'form-control')) !!}
						@if($errors->has('primary_contact_name'))<span class="required text-danger">{{ $errors->first('primary_contact_name') }}</span>@endif
					</div>
				</div>

				<div class="form-group col-md-3">
					<label class="control-label">Relationship  <span class="required">*</span></label>
					<div>
						{!! Form::text('primary_contact_relationship', $value = null, array('id'=>'primary_contact_relationship', 'class' => 'form-control')) !!}
						@if($errors->has('primary_contact_relationship'))<span class="required text-danger">{{ $errors->first('primary_contact_relationship') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Phone 1  <span class="required">*</span></label>
					<div>
						{!! Form::text('primary_contact_phn1', $value = null, array('id'=>'primary_contact_phn1', 'class' => 'form-control')) !!}
						@if($errors->has('primary_contact_phn1'))<span class="required text-danger">{{ $errors->first('primary_contact_phn1') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Phone 2</label>
					<div>
						{!! Form::text('primary_contact_phn2', $value = null, array('id'=>'primary_contact_phn2', 'class' => 'form-control')) !!}
						@if($errors->has('primary_contact_phn2'))<span class="required text-danger">{{ $errors->first('primary_contact_phn2') }}</span>@endif
					</div>
				</div>
				
			</div>
		</fieldset>
		<fieldset class="reset-this redo-fieldset" style="margin-left: 10px;">
			<legend  class="reset-this redo-legend"><small>Secondary Contact</small></legend>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label class="control-label">Name</label>
					<div>
						{!! Form::text('secondary_contact_name', $value = null, array('id'=>'secondary_contact_name', 'class' => 'form-control')) !!}
						@if($errors->has('secondary_contact_name'))<span class="required text-danger">{{ $errors->first('secondary_contact_name') }}</span>@endif
					</div>
				</div>

				<div class="form-group col-md-3">
					<label class="control-label">Relationship</label>
					<div>
						{!! Form::text('secondary_contact_relationship', $value = null, array('id'=>'secondary_contact_relationship', 'class' => 'form-control')) !!}
						@if($errors->has('secondary_contact_relationship'))<span class="required text-danger">{{ $errors->first('secondary_contact_relationship') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Phone 1</label>
					<div>
						{!! Form::text('secondary_contact_phn1', $value = null, array('id'=>'secondary_contact_phn1', 'class' => 'form-control')) !!}
						@if($errors->has('secondary_contact_phn1'))<span class="required text-danger">{{ $errors->first('secondary_contact_phn1') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Phone 2</label>
					<div>
						{!! Form::text('secondary_contact_phn2', $value = null, array('id'=>'secondary_contact_phn2', 'class' => 'form-control')) !!}
						@if($errors->has('secondary_contact_phn2'))<span class="required text-danger">{{ $errors->first('secondary_contact_phn2') }}</span>@endif
					</div>
				</div>
				
			</div>
		</fieldset>

		<!-- Employee Reference -->
		<fieldset class="reset-this redo-fieldset" style="margin-left: 10px;">
			<legend  class="reset-this redo-legend"><small>Employee Reference in Padma Bank(if any)</small></legend>

			<div class="form-row">
				<div class="form-group col-md-3">
					<label class="control-label">Name</label>
					<div>
						{!! Form::text('employee_reference_name', $value = null, array('id'=>'employee_reference_name', 'class' => 'form-control')) !!}
						@if($errors->has('employee_reference_name'))<span class="required text-danger">{{ $errors->first('employee_reference_name') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Relationship</label>
					<div>
						{!! Form::text('employee_reference_relationship', $value = null, array('id'=>'employee_reference_relationship', 'class' => 'form-control')) !!}
						@if($errors->has('employee_reference_relationship'))<span class="required text-danger">{{ $errors->first('employee_reference_relationship') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Employee ID</label>
					<div>
						{!! Form::text('employee_reference_employee_id', $value = null, array('id'=>'employee_reference_employee_id', 'class' => 'form-control')) !!}
						@if($errors->has('employee_reference_employee_id'))<span class="required text-danger">{{ $errors->first('employee_reference_employee_id') }}</span>@endif
					</div>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Contact</label>
					<div>
						{!! Form::text('employee_reference_contact', $value = null, array('id'=>'employee_reference_contact', 'class' => 'form-control')) !!}
						@if($errors->has('employee_reference_contact'))<span class="required text-danger">{{ $errors->first('employee_reference_contact') }}</span>@endif
					</div>
				</div>

				
				
			</div>
		</fieldset>
		
	</div>
</div>




<!-- Provide Info -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Please provide info<small></small></h3>
	</div>


	<div class="card-body">

		<div class="form-row">
			
			

			<!-- radio -->
			<div class="form-group  col-md-6">
				<label class="control-label">Whether any bankruptcy of Marketing Associate( Individual/ Partners/ Directors/ Organizations)?</label>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-success custom-control-input-outline" 
						type="radio" id="bankruptcy_no" name="bankruptcy" value="0" {{ old('bankruptcy') ? ((old('bankruptcy')==0)?'checked':'') : 'checked' }}>
					<label for="bankruptcy_no" class="custom-control-label">No</label>
				</div>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-danger custom-control-input-outline" 
						type="radio" id="bankruptcy_yes" name="bankruptcy" value="1" {{ old('bankruptcy') ? 'checked':''}}>
					<label for="bankruptcy_yes" class="custom-control-label">Yes</label>
				  </div>
			</div>

			<div class="form-group col-md-6">
				<label class="control-label">Specify Details</label>
				<div>
					{!! Form::textarea('bankruptcy_details', $value = null, array('id'=>'bankruptcy_details', 'class' => 'form-control','rows'=>"2")) !!}
					@if($errors->has('bankruptcy_details'))<span class="required text-danger">{{ $errors->first('bankruptcy_details') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			<!-- radio -->
			<div class="form-group  col-md-6">
				<label class="control-label">Whether you are engaged with any organization of default borrower?</label>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-success custom-control-input-outline" 
						type="radio" id="borrower_no" name="borrower" value="0" {{ old('borrower') ? ((old('borrower')==0)?'checked':'') : 'checked' }}>
					<label for="borrower_no" class="custom-control-label">No</label>
				</div>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-danger custom-control-input-outline" 
						type="radio" id="borrower_yes" name="borrower" value="1" {{ old('borrower') ? 'checked':''}}>
					<label for="borrower_yes" class="custom-control-label">Yes</label>
				  </div>
			</div>

			<div class="form-group col-md-6">
				<label class="control-label">Specify Details</label>
				<div>
					{!! Form::textarea('borrower_details', $value = null, array('id'=>'borrower_details', 'class' => 'form-control','rows'=>"2")) !!}
					@if($errors->has('borrower_details'))<span class="required text-danger">{{ $errors->first('borrower_details') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			<!-- radio -->
			<div class="form-group  col-md-6">
				<label class="control-label">Whether you have been convicted by court?</label>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-success custom-control-input-outline" 
						type="radio" id="convicted_by_court_no" name="convicted_by_court" value="0" {{ old('convicted_by_court') ? ((old('convicted_by_court')==0)?'checked':'') : 'checked' }}>
					<label for="convicted_by_court_no" class="custom-control-label">No</label>
				</div>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-danger custom-control-input-outline" 
						type="radio" id="convicted_by_court_yes" name="convicted_by_court" value="1" {{ old('convicted_by_court') ? 'checked':''}}>
					<label for="convicted_by_court_yes" class="custom-control-label">Yes</label>
				  </div>
			</div>

			<div class="form-group col-md-6">
				<label class="control-label">Specify Details</label>
				<div>
					{!! Form::textarea('convicted_by_court_details', $value = null, array('id'=>'convicted_by_court_details', 'class' => 'form-control','rows'=>"2")) !!}
					@if($errors->has('convicted_by_court_details'))<span class="required text-danger">{{ $errors->first('convicted_by_court_details') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			<!-- radio -->
			<div class="form-group  col-md-6">
				<label class="control-label">Whether you are involved with any trade union?</label>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-success custom-control-input-outline" 
						type="radio" id="trade_union_no" name="trade_union" value="0" {{ old('trade_union') ? ((old('trade_union')==0)?'checked':'') : 'checked' }}>
					<label for="trade_union_no" class="custom-control-label">No</label>
				</div>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-danger custom-control-input-outline" 
						type="radio" id="trade_union_yes" name="trade_union" value="1" {{ old('trade_union') ? 'checked':''}}>
					<label for="trade_union_yes" class="custom-control-label">Yes</label>
				  </div>
			</div>

			<div class="form-group col-md-6">
				<label class="control-label">Specify Details</label>
				<div>
					{!! Form::textarea('trade_union_details', $value = null, array('id'=>'trade_union_details', 'class' => 'form-control','rows'=>"2")) !!}
					@if($errors->has('trade_union_details'))<span class="required text-danger">{{ $errors->first('trade_union_details') }}</span>@endif
				</div>
			</div>
		</div>

		<div class="form-row">
			<!-- radio -->
			<div class="form-group  col-md-6">
				<label class="control-label">Whether you are the member of Local, International Organization or Club?</label>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-success custom-control-input-outline" 
						type="radio" id="member_no" name="member" value="0" {{ old('member') ? ((old('member')==0)?'checked':'') : 'checked' }}>
					<label for="member_no" class="custom-control-label">No</label>
				</div>
				<div class="custom-control custom-radio">
					<input class="custom-control-input custom-control-input-danger custom-control-input-outline" 
						type="radio" id="member_yes" name="member" value="1" {{ old('member') ? 'checked':''}}>
					<label for="member_yes" class="custom-control-label">Yes</label>
				  </div>
			</div>

			<div class="form-group col-md-6">
				<label class="control-label">Specify Details</label>
				<div>
					{!! Form::textarea('member_details', $value = null, array('id'=>'member_details', 'class' => 'form-control','rows'=>"2")) !!}
					@if($errors->has('member_details'))<span class="required text-danger">{{ $errors->first('member_details') }}</span>@endif
				</div>
			</div>
		</div>

		

		

		

		

		
	</div>
</div>


<!-- APPLICANT IMAGE -->
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Applicant Image<small>  </small></h3>
	</div>

	<div class="card-body">
		
		<!----------- Image -->
		
		<div class="form-group row">
			
			<div>
				<div class="image">
					<img id="applicant_image_show" src="{{url('/')}}/images/applicants/placeholder.png" width="200" height="200" alt="Applicant Image" />
				</div>
			</div>
		</div>
		
		<div class="form-row">

			<div class="form-group col-md-6">
				<label for="applicant_image">Image Upload <span class="required">*</span></label>
				<div class="input-group">
				<div class="custom-file">
					<input type="file" accept="image/png, image/jpg, image/jpeg"  class="custom-file-input" name="applicant_image" id="applicant_image" onchange="readURL(this)">
					<label class="custom-file-label" for="applicant_image">Choose file</label>
				</div>
				</div>
				@if($errors->has('applicant_image'))<span class="required text-danger">{{ $errors->first('applicant_image') }}</span>@endif
			</div>
		<!----------- End Image -->



		
			<!----------- SIGNATURE IMAGE -->
			<div class="form-group col-md-2" id="signature_image_show_div">
				<div>
					<div class="image" style="padding: 10px;">
						<img id="signature_image_show" src="{{url('/')}}/images/signatures/img_placeholder.png" width="100" height="60" alt="NID Image" />
					</div>
				</div>
			</div>
			<div class="form-group col-md-4" id="signature_image_div">
				<label for="signature_image">Applicant Signature Upload <span class="required">*</span></label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" accept="image/png, image/jpg, image/jpeg"  class="custom-file-input" name="signature_image" id="signature_image" onchange="readURL(this)">
						<label class="custom-file-label" for="signature_image">Choose file</label>
					</div>
				</div>
				@if($errors->has('signature_image'))<span class="required text-danger">{{ $errors->first('signature_image') }}</span>@endif
				
			</div>
			<!----------- END SIGNATURE IMAGE -->
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
