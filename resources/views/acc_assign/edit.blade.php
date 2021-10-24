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
            {!! Form::model($Role, array('url' => 'role/'.$Role->id, 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal','enctype'=>"multipart/form-data")) !!}
                @include('role._from')
            {!! Form::close() !!}
        </div>
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



