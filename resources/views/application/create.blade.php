@extends('layouts.app')

@section('css')

@stop

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
            {!! Form::open(array('url' => 'application', 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 'class' => 'form-horizontal')) !!}
                @include('application._from')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
<script>

    function getDistricts(id,division_id)
    {
        //alert($("#"+id+"_division").val());
        $.ajax({
            url : "{{ url('/getDistricts') }}",
            type : "POST",
            //dataType : "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            cache : false,
            data: {
                division_id: division_id
            },
            timeout: 3000,
            success : function(data) {
                //alert("#"+id+"_district");
                $("#"+id+"_district").html(data);
            },
            error: function() 
            {
                //alert("#"+id+"_district. Error");
            }
        });
    }

    function readURL(input) 
    {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                let input_id = $(input).attr('id');
                $('#'+input_id+'_show')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function isSameAsPresent(e) 
    {
        $('#per_address').slideToggle()
        /*
        $("#per_road_or_village").val( $("#pre_road_or_village").val() );
        $("#per_post_office").val( $("#pre_post_office").val() );

        $('#per_division option[value="'+$('#pre_division').val()+'"]').attr("selected", "selected");
        $('#per_division').trigger( "change");

        $.each($(".per_district option:selected"), function () 
        {
            $(this).prop('selected', false); 
        });
        $('#per_district option[value="'+$('#pre_district').val()+'"]').attr("selected", "selected");
        */
    }


    $(function () {
        $('#dob').datetimepicker({
            format: 'L'
        });
        $('#spouse_dob').datetimepicker({
            format: 'L'
        });
        $('#fathers_dob').datetimepicker({
            format: 'L'
        });
        $('#mothers_dob').datetimepicker({
            format: 'L'
        });

        $('#pre_division').on('change',function() 
        {
            getDistricts('pre',$(this).val());
        });
        $('#per_division').on('change',function() 
        {
            getDistricts('per',$(this).val());
        });
        
        if( $('#checkSameAsPresent').is(':checked') ){
                isSameAsPresent(this);
        };
        $('#checkSameAsPresent').change(function () {
                isSameAsPresent(this);
        });

        if(!$("#nid_no").val())
        {
            $('#nid_image_show_div').hide();
            $('#nid_image_div').hide();
        }
        
        if(!$("#birth_certificate_no").val())
        {
            $('#birth_certificate_image_show_div').hide();
            $('#birth_certificate_image_div').hide();
        }

        if(!$("#passport_no").val())
        {
            $('#passport_image_show_div').hide();
            $('#passport_image_div').hide();
        }

        $('#nid_no').change(function () {
            if($("#nid_no").val()){
                $('#nid_image_show_div').show();
                $('#nid_image_div').show();
            }
            else{
                $('#nid_image_show_div').hide();
                $('#nid_image_div').hide();
            }
        });
        $('#passport_no').change(function () {
            if($("#passport_no").val()){
                $('#passport_image_show_div').show();
                $('#passport_image_div').show();
            }
            else{
                $('#passport_image_show_div').hide();
                $('#passport_image_div').hide();
            }
        });
        $('#birth_certificate_no').change(function () {
            if($("#birth_certificate_no").val()){
                $('#birth_certificate_image_show_div').show();
                $('#birth_certificate_image_div').show();
            }
            else{
                $('#birth_certificate_image_show_div').hide();
                $('#birth_certificate_image_div').hide();
            }
        });
    });
</script>
@stop


                