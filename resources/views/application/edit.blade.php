@extends('layouts.app')
@push('css')
    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
@endpush
@section('content')

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <div class="block-header">
                    <h2  style="color: #000 !important;">{{ $pageTitle }}</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <strong>Oh !</strong> {{$error}}
                        @endforeach
                    </div>
                @endif




                <div class="row">
					<div class="col-md-10 col-md-offset-1">
						{!! Form::model($DiscountPartner, array('url' => 'DiscountPartner/'.$DiscountPartner->id, 'method' => 'PUT', 'role' => 'form', 'enctype'=>"multipart/form-data" ,'class' => 'form-horizontal')) !!}
				
						@include('discount-partner._from')

						{!! Form::close() !!}
					</div>
				</div>
				







            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent

<!-- Ckeditor -->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script>
//Bootstrap datepicker plugin
$('#bs_datepicker_container input').datepicker({
    autoclose: true,
    container: '#bs_datepicker_container'
});
//
</script>


@endsection