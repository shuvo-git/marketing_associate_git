<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- GOOGLE FONT: SOURCE SANS PRO -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- THEME STYLE -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="wrapper">
        
    <!-- MAIN CONTENT -->
    <section class="invoice">
        @yield('content')
    </section>
    
    </div>
    
    <!-- PAGE SPECIFIC SCRIPT -->
    <script>
        window.addEventListener("load", window.print());
    </script>

</body>
</html>
