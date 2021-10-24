@extends('layouts.app')

@section('css')

@stop

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $pageInfo['pageTitle'] }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">{{ $pageInfo['pageTitle'] }}</li>
        </ol>
    </div>
</div>
@stop

@section('content')
    

    <div class="container-fluid">
        {{--@if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <strong></strong> {{$error}}
            @endforeach
        </div>
        @endif--}}
        <div class="col-md-12">
            {!! Form::open(array('url' => 'claim_incentive', 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 'class' => 'form-horizontal')) !!}
                @include('claim_incentive._from')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
<script>
    function readURL(input) 
    {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                var myarr = ["jpg", "jpeg", "png","gif","pdf"];

                if(input.files[0].name.split('.')[1]==="pdf"){
                    

                    let input_id = $(input).attr('id');
                    $('#'+input_id+'_show').hide();

                    $('#'+input_id+'_showpdf').attr('src', e.target.result);
                    $('#'+input_id+'_showpdf').show();
                    
                }
                else{
                    
                    
                    let input_id = $(input).attr('id');
                    $('#'+input_id+'_showpdf').hide();

                    $('#'+input_id+'_show').attr('src', e.target.result);
                    $('#'+input_id+'_show').show();
                    
                }

               
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function showError(msg) 
    { 
        let Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });
        Toast.fire({
            icon: 'error',
            title: "  "+msg
        });
     }

    
    $(function () 
    {
        $('#attachment_image_showpdf').hide();
        $('#dob').datetimepicker({
            format: 'L'
        });


        @if(Session::has('message_type') && Session::has('message'))
            showError("{{Session::get('message')}}");
        @endif

        
        
    });
</script>
@stop


                