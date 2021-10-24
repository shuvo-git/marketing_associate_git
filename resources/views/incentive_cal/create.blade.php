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
            
            <form action="#" class="form-horizontal" id="calculate_incentive">
                @include('incentive_cal._from')
            </form>
        </div>
    </div>
@stop

@section('scripts')
<script>

    function addNew(){
        str = ""+
            '<div class="form-row">'
                +'<div class="form-group col-md-2">'
                    +'<label class="control-label">Category <span class="required">*</span></label>'
                    +'<div>'
                        +'{!! Form::select("category[]", $categoryList, $value = null,array("id"=>"category", "class" => "form-control", "onchange"=>"")) !!}'
                        
                    +'</div>'
                +'</div>'
                +'<div class="form-group col-md-2">'
                    +'<label class="control-label">Account No <span class="required">*</span></label>'
                    +'<div>'
                        +'{!! Form::text("acc[]", $value = null, array("id"=>"acc", "class" => "form-control")) !!}'
                    +'</div>'
                +'</div>'
                +'<div class="form-group col-md-2">'
                    +'<label class="control-label">Amount <span class="required">*</span></label>'
                    +'<div>'
                        +'{!! Form::text("amount[]", $value = null, array("id"=>"amount", "class" => "form-control")) !!}'
                    +'</div>'
                +'</div>'
                +'<div class="form-group col-md-2">'
                    +'<label class="control-label">Rate <span class="required">*</span></label>'
                    +'<div>'
                        +'{!! Form::text("rate[]", $value = null, array("id"=>"rate", "class" => "form-control")) !!}'
                    +'</div>'
                +'</div>'
                +'<div class="form-group col-md-2">'
                +'    <label class="control-label">Incentive <span class="required">*</span></label>'
                +'    <div>'
                +'        {!! Form::text('incentive[]', $value = null, array("id"=>"incentive", "class" => "form-control")) !!}'
                +'    </div>'
                    
                +'</div>'
                
            +'</div>';
        $('#row_append').append(str);
    }

    $(function () 
    {
        $('#dob').datetimepicker({
            format: 'L'
        });

        $('#add_new').on('click',function (e) {
            addNew();
        })

        $('#form_submit').on('click',function (e) {
            e.preventDefault();
            $.ajax({
                url: 'incentive_calc',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#calculate_incentive').serialize() + "&_token={{ csrf_token() }}",
                type: 'POST',
                timeout: 3000,
                success: function(data) 
                {
                    $('#row_append div.form-row div.form-group input[name="incentive[]"]').each(function(index, element) 
                    {
                        $(this).val(data[index]);
                    });
                },
                error: function() {
                
                }
            });
        })
    });
</script>
@stop


                