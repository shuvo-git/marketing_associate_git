@extends('application.view')

@section('extra_content')
    <div class="col-md-12">
        
        @if (isset($pageInfo["action"]))
        {!! Form::open(array('url' => '/application/'.$Application->id.'/'.$pageInfo["action"].'/forward', 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 'class' => 'form-horizontal')) !!}
        @else
        {!! Form::open(array('url' => '/application/'.$Application->id.'/forward', 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 'class' => 'form-horizontal')) !!}
        @endif
        
            @include('application.forward_form')
        {!! Form::close() !!}
        
    </div>
@stop