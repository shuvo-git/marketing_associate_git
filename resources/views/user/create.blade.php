@extends('layouts.register')

@section('css')

@stop

@section('content')
    {!! Form::open(array('url' => 'registration', 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 'class' => 'form-horizontal')) !!}
        @include('user._from')
    {!! Form::close() !!}
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


                