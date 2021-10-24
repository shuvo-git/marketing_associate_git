@extends('layouts.print')

@section('css')

@stop

@if (isset($pageInfo['print']))
	
@else
	@section('header')
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">{{ $pageInfo['title'] }}</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active">{{ $pageInfo['title'] }}</li>
			</ol>
		</div>
	</div>
	@stop
@endif


@section('content')
    

    <div class="container-fluid">
        <div class="col-12">
			@if (isset($pageInfo['print']))
	
			@else
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This page has been enhanced for printing. Click the print button at the bottom of the page.
          </div>
		  	@endif


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-eye"></i> Padma Bank Ltd.
                  <small class="float-right">Date: {{ \Carbon\Carbon::now()->format('d M, Y') }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
			<!-- info row -->
			<div class="row">
				<div class="col-sm-8">
					<dl class="row invoice-info">
						<dt class="col-sm-4">Associate ID</dt>
						<dd class="col-sm-8">:  @if (isset($Application->associate_id) ){{ $Application->associate_id }} @endif</dd>

						<dt class="col-sm-4">Name</dt>
						<dd class="col-sm-8">:  {{ $Application->name }}</dd>
						
						<dt class="col-sm-4">Date of Birth</dt>
						<dd class="col-sm-8">:  {{ $Application->getDob($Application->dob) }}</dd>

						<dt class="col-sm-4">Place of Birth</dt>
						<dd class="col-sm-8">:  {{ $Application->place_of_birth }}</dd>

						<dt class="col-sm-4">Gender</dt>
						<dd class="col-sm-8">:  @if($Application->gender==0)Male @elseif($Application->gender==1) Female @else Others @endif</dd>
						
						<dt class="col-sm-4">Marital Status</dt>
						<dd class="col-sm-8">:  @if($Application->marital_status==0)Single @elseif($Application->marital_status==1) Married @else Others @endif</dd>
						
						<dt class="col-sm-4">NID</dt>
						<dd class="col-sm-8">: @if (isset($Application->nid_no) ){{ $Application->nid_no }} @endif </dd>

						<dt class="col-sm-4">Passport</dt>
						<dd class="col-sm-8">: {{ $Application->passport_no }}</dd>

						<dt class="col-sm-4">Occupation</dt>
						<dd class="col-sm-8">:  {{ $Application->occupation }}</dd>

						<dt class="col-sm-4">Bank ACC No</dt>
						<dd class="col-sm-8">:  {{ $Application->bank_acc_no }}</dd> 

						<dt class="col-sm-4">Bank Name</dt>
						<dd class="col-sm-8">: @if(isset($Application->bank_name) && is_int($Application->bank_name) ) {{ $Application->getBankName->BANK_NAME }}@endif</dd>

						<dt class="col-sm-4">Branch</dt>
						<dd class="col-sm-8">: {{ $Application->branch }} </dd>

            			<dt class="col-sm-4">Preferred Branch</dt>
						<dd class="col-sm-8">:  @if(isset($Application->preferred_branch)){{ $Application->getPreferredBranchName->BR_NAME }}@endif</dd>

					</dl>
				</div>
				<div class="col-sm-4">
					<img src="{{ url('images/applicants/'.$Application->applicant_image) }}" width="200px" height="200px" class="img-fluid img-thumbnail" alt="Responsive image">
				</div>
			</div>
            
            <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong>PRESENT ADDRESS</strong><br>
					<dl class="row invoice-info">
                    <dd class="col-sm-4">Road / Village</dd>
					<dd class="col-sm-8">: {{ $Application->pre_road_or_village }}</dd>
                    <dd class="col-sm-4">Post Office</dd>
					<dd class="col-sm-8">: {{ $Application->pre_post_office }}</dd>
                    <dd class="col-sm-4">District</dd>
					<dd class="col-sm-8">: {{ $Application->getDistrictPre->NAME }}</dd>
                    <dd class="col-sm-4">Division</dd>
					<dd class="col-sm-8">: {{ $Application->getDivisionPre->NAME }}</dd>
					</dl>

                    Staying here for <b> {{ $Application->pre_years }}<br> </b> Years
					
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong>PERMANENT ADDRESS</strong><br>
					<dl class="row invoice-info">
						<dd class="col-sm-4">Road / Village</dd>
						<dd class="col-sm-8">:  {{ $Application->per_road_or_village }}</dd>
						<dd class="col-sm-4">Post Office</dd>
						<dd class="col-sm-8">: {{ $Application->per_post_office }} </dd>
						<dd class="col-sm-4">District</dd>
						<dd class="col-sm-8">: {{ $Application->getDistrictPer->NAME }} </dd>
						<dd class="col-sm-4">Division</dd>
						<dd class="col-sm-8">: {{ $Application->getDivisionPer->NAME }} </dd>
					</dl>
                    <br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                  	<strong>CONTACT INFO</strong><br>
					<dl class="row invoice-info">
						<dd class="col-sm-4">Cell No</dd>
						<dd class="col-sm-8">:  {{ $Application->cell }}</dd>
						<dd class="col-sm-4">Cell No Using</dd>
						<dd class="col-sm-8">:  {{ $Application->cell_years }} Year/s</dd>
						<dd class="col-sm-4">Email</dd>
						<dd class="col-sm-8">:  {{ $Application->email }}</dd>
						<dd class="col-sm-4">TIN</dd>
						<dd class="col-sm-8">:  {{ $Application->tin }}</dd>
						<dd class="col-sm-4">Social ID</dd>
						<dd class="col-sm-8" style="word-wrap: break-word">:  {{ $Application->social }}</dd>
						<dd class="col-sm-4">Social Id Using </dd>
						<dd class="col-sm-8">:  {{ $Application->social_years }} Year/s</dd>

					</dl>
                  </address>
                </div>
                <!-- /.col -->
              </div>
            <!-- /.row -->




            <!-- info row -->
            <div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
					<address>
					
						<strong>FAMILY INFO</strong><br>
						<dl class="row invoice-info">
							<dd class="col-sm-4">Spouse Name</dd>
							<dd class="col-sm-8">:  {{ $Application->spouse_name }}</dd>
							<dd class="col-sm-4">Spouse DOB</dd>
							<dd class="col-sm-8">: @if (isset($Application->spouse_dob)) {{ $Application->getDob($Application->spouse_dob) }} @endif </dd>
							<dd class="col-sm-4">Spouse Contact</dd>
							<dd class="col-sm-8">:  {{ $Application->spouse_contact }}</dd>

							<dd class="col-sm-4">Fathers Name</dd>
							<dd class="col-sm-8">:  {{ $Application->fathers_name }}</dd>
							<dd class="col-sm-4">Fathers DOB</dd>
							<dd class="col-sm-8">: @if (isset($Application->fathers_dob)) {{ $Application->getDob($Application->fathers_dob) }} @endif</dd>
							<dd class="col-sm-4">Fathers Contact</dd>
							<dd class="col-sm-8">:  {{ $Application->fathers_contact }}</dd>

							<dd class="col-sm-4">Mothers Name</dd>
							<dd class="col-sm-8">:  {{ $Application->mothers_name }}</dd>
							<dd class="col-sm-4">Mothers DOB</dd>
							<dd class="col-sm-8">: @if (isset($Application->mothers_dob)) {{ $Application->getDob($Application->mothers_dob) }} @endif</dd>
							<dd class="col-sm-4">Mothers Contact</dd>
							<dd class="col-sm-8">:  {{ $Application->mothers_contact }}</dd>


						</dl>
			
					</address>
					
				</div>
              	<!-- /.col -->

				<div class="col-sm-4 invoice-col">
					<address>
						<strong>EDUCATION</strong><br>
						<dl class="row invoice-info">
							<dd class="col-sm-4">Education Institute</dd>
							<dd class="col-sm-8">:  {{ $Application->edu_institute }}</dd>
							<dd class="col-sm-4">Examination</dd>
							<dd class="col-sm-8">:  {{ $Application->name_of_exam }}</dd>
							<dd class="col-sm-4">Year of Passing</dd>
							<dd class="col-sm-8">:  {{ $Application->year_of_passing }}</dd>
							<dd class="col-sm-4">CGPA / Division /Class</dd>
							<dd class="col-sm-8">:  {{ $Application->cgpa_division_class }}</dd>
							<dd class="col-sm-4">Board / University</dd>
							<dd class="col-sm-8">:  {{ $Application->name_board_university }}</dd>
							<dd class="col-sm-4">Professional Degree</dd>
							<dd class="col-sm-8">:  {{ $Application->professional_degree }}</dd>
						</dl>
					</address>
					
				</div>
              	<!-- /.col -->

				<div class="col-sm-4 invoice-col">
					<address>
						<strong>EMERGENCY CONTACT</strong><br>
						<dl class="row invoice-info">
							<dt class="col-sm-12">Primary Contact</dt>
							<dd class="col-sm-4">Name</dd>
							<dd class="col-sm-8">:  {{ $Application->primary_contact_name }}</dd>
							<dd class="col-sm-4">Relationship</dd>
							<dd class="col-sm-8">:  {{ $Application->primary_contact_relationship }}</dd>
							<dd class="col-sm-4">Phone 1</dd>
							<dd class="col-sm-8">:  {{ $Application->primary_contact_phn1 }}</dd>
							<dd class="col-sm-4">Phone 2</dd>
							<dd class="col-sm-8">:  {{ $Application->primary_contact_phn2 }}</dd>

							<dt class="col-sm-12">Secondary Contact</dt>
							<dd class="col-sm-4">Name</dd>
							<dd class="col-sm-8">:  {{ $Application->secondary_contact_name }}</dd>
							<dd class="col-sm-4">Relationship</dd>
							<dd class="col-sm-8">:  {{ $Application->secondary_contact_relationship }}</dd>
							<dd class="col-sm-4">Phone 1</dd>
							<dd class="col-sm-8">:  {{ $Application->secondary_contact_phn1 }}</dd>
							<dd class="col-sm-4">Phone 2</dd>
							<dd class="col-sm-8">:  {{ $Application->secondary_contact_phn2 }}</dd>

							<dt class="col-sm-12">Employee Reference in Padma Bank (if any)</dt>
							<dd class="col-sm-4">Name</dd>
							<dd class="col-sm-8">:  {{ $Application->employee_reference_name }}</dd>
							<dd class="col-sm-4">Relationship</dd>
							<dd class="col-sm-8">:  {{ $Application->employee_reference_relationship }}</dd>
							<dd class="col-sm-4">Phone 1</dd>
							<dd class="col-sm-8">:  {{ $Application->employee_reference_employee_id }}</dd>
							<dd class="col-sm-4">Phone 2</dd>
							<dd class="col-sm-8">:  {{ $Application->employee_reference_contact }}</dd>
						</dl>
					</address>
				</div>
              <!-- /.col -->
            </div>
          <!-- /.row -->







            
              
              





            <!-- Table row -->
            <div class="row">
				<p class="lead">OTHER INFO</p>
              <div class="col-12 table-responsive">
                <table class="table">
                  <tr>
                    <td>Whether any bankruptcy of Marketing Associate( Individual/ Partners/ Directors/ Organizations)?</td>
                    <td style="width: 50%">
						<dl>
							@if($Application->bankruptcy==0) No @else Yes @endif
							<dt>Details</dt>
							<dd>{{ $Application->bankruptcy_details }}</dd>
						</dl>
					</td>
                  </tr>
                  
                  <tr>
                    <td>Whether you are engaged with any organization of default borrower?</td>
                    <td style="width: 50%">
						<dl>
							@if($Application->borrrower==0) No @else Yes @endif
							<dt>Details</dt>
							<dd>{{ $Application->borrrower_details }}</dd>
						</dl>
					</td>
                  </tr>
                  
                  <tr>
                    <td>Whether you have been convinted by court?</td>
                    <td style="width: 50%">
						<dl>
							@if($Application->convicted_by_court==0) No @else Yes @endif
							<dt>Details</dt>
							<dd>{{ $Application->convicted_by_court_details }}</dd>
						</dl>
					</td>
                  </tr>
                  
                  <tr>
                    <td>Whether you are involved with any trade union?</td>
                    <td style="width: 50%">
						<dl>
							@if($Application->trade_union==0) No @else Yes @endif
							<dt>Details</dt>
							<dd>{{ $Application->trade_union_details }}</dd>
						</dl>
					</td>
                  </tr>
                  
                  <tr>
                    <td>Whether you are the member of Local, International Organization or Club?</td>
                    <td style="width: 50%">
						<dl>
							@if($Application->member==0) No @else Yes @endif
							<dt>Details</dt>
							<dd>{{ $Application->member_details }}</dd>
						</dl>
					</td>
                  </tr>
                  
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->




			<!-- SIGNATURE -->
			<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
					<address>
					
						<strong>Signature</strong><br>
						@if (isset($Application->signature_image))
							<img src="{{ url('images/signatures/'.$Application->signature_image) }}" 
							width="200px" height="80px" class="img-fluid img-thumbnail" alt="Responsive image">	
						@endif
						
			
					</address>
					
				</div>
              	<!-- /.col -->

				<div class="col-sm-4 invoice-col">
					<address>
						<strong>Attachments</strong><br>
						<dl class="row invoice-info">
							@if (isset($Application->nid_no))
								<dt class="col-sm-12">NID:</dt>
								<dd class="col-sm-12">
									<img src="{{ url('images/nids/'.$Application->nid_image) }}" 
									width="100%" class="img-fluid img-thumbnail" alt="Responsive image">	
								</dd>
							@endif
							@if (isset($Application->passport_no) )
								<dt class="col-sm-12">Passport:</dt>
								<dd class="col-sm-12">
									<img src="{{ url('images/passports/'.$Application->passport_image) }}" 
									width="100%" class="img-fluid img-thumbnail" alt="Responsive image">	
								</dd>
							@endif
							@if (isset($Application->birth_certificate_no) )
								<dt class="col-sm-12">Birth Certificate:</dt>
								<dd class="col-sm-12">
									<img src="{{ url('images/birth_certificates/'.$Application->birth_certificate_image) }}" 
									width="100%" class="img-fluid img-thumbnail" alt="Responsive image">	
								</dd>
							@endif
						</dl>
						
					</address>
					
				</div>
              	<!-- /.col -->

				
              <!-- /.col -->
            </div>
			<!-- END SIGNATURE -->



			@if (isset($Remarks))
			<!-- Table row -->
            <div class="row">
				<p class="lead">REMARKS</p><br>
				<div class="col-12 table-responsive">
					<table class="table">
						@foreach ($Remarks as $Remark)
					  	<tr>
							
							<td>
								<dl>
									
									@if ($Remark->forward_from[0]=='B')
										<dl class="row invoice-info">
											<dt class="col-sm-3">From Branch Manager:</dt>
											<dd class="col-sm-9">:  {{ $Remark->getBranchName->BR_NAME }}</dd>
										</dl>
									@elseif ($Remark->forward_from[0]=='H')
										<dl class="row invoice-info">
											<dt class="col-sm-3">From Head Office:</dt>
											<dd class="col-sm-9">:  </dd>
										</dl>
										
									@else
										<dl class="row invoice-info">
											<dt class="col-sm-3">From Cluster Manager</dt>
											<dd class="col-sm-9">:  {{ $Remark->getClusterName->cluster_name  }}</dd>
										</dl>
										
									@endif
									
									
									<dt>Message</dt>
									<dd> {{ $Remark->remarks }}</dd>
									
									
								</dl>
							</td>
						</tr>
						@endforeach
					</table>
				</div>

			</div>
			@endif
		

		

            @yield('extra_content')

			@if (isset($pageInfo['print']))
	
			@else
            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{ url('/application/{id}/print')}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <!--button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                  Payment
                </button-->
                <!--button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button-->
				<a href="{{  url('/') }}" type="button" class="btn btn-default float-right">Back</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
		  @endif

        </div><!-- /.col -->
    </div>


@stop

@section('scripts')
<script>
    $(function () {
        $('#dob').datetimepicker({
            format: 'L'
        });
    });
</script>
@stop
      