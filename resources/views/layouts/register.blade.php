<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration Page</title>

        <!-- GOOGLE FONT: SOURCE SANS PRO -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- ICHECK BOOTSTRAP -->
        <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- THEME STYLE -->
        <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">

    @yield('css')

    </head>
    <body class="hold-transition register-page">
        
        <div class="register-box">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <strong>. &nbsp;</strong> {{$error}}<br>
                    @endforeach
                </div>
            @endif
            @yield('content')
        </div>

        <!-- JQUERY -->
        <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
        <!-- BOOTSTRAP 4 -->
        <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ADMINLTE APP -->
        <script src="{{ url('dist/js/adminlte.min.js') }}"></script>

        @yield('scripts')

    </body>
</html>
