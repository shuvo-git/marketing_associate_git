@extends('layouts.register')

@section('css')

@stop

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="#') }}" class="h1"><b>PADMA</b> Bank Ltd.</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Edit User</p>

        {!! Form::model($User, array('url' => 'user/'.$User->id, 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal','enctype'=>"multipart/form-data")) !!}
        @method('PATCH')    
        @include('user._from')
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