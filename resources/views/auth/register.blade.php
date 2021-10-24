@extends('layouts.register')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="#') }}" class="h1"><b>PADMA</b> Bank Ltd.</a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Registration</p>
            {!! Form::open(array('url' => 'register', 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 'class' => 'form-horizontal')) !!}
                @include('user._from')
            {!! Form::close() !!}
    </div>
</div>
@endsection
