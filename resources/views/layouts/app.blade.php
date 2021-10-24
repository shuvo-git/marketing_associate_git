<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />
        <title></title>

        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        

        <!-- PLUGINS -->
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">

        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{ url('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{ url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="{{ url('plugins/bs-stepper/css/bs-stepper.min.css') }}">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="{{ url('plugins/dropzone/min/dropzone.min.css') }}">

        <!-- DATATABLES -->
        <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('plugins/datatables-select/css/select.bootstrap4.min.css') }}">
        

        <!-- SWEETALERT2 -->
        <link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

        <!-- TOASTR -->
        <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">

        <!-- FANCYBOX -->
        <link rel="stylesheet" href="{{ url('plugins/fancybox/jquery.fancybox.min.css') }}">



        <!-- THEME STYLE -->
        <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">

        <!-- CUSTOM CSS STYLE -->
        @yield('css')
        <!-- CUSTOM CSS STYLE END -->

    </head>

    <body class="hold-transition sidebar-mini">

        <!-- MAIN WRAPPER -->
        <div class="wrapper">
            
            <!-- MENU ELEMENTS GOES HERE -->
            @include('menu.navbar-menu')
            @include('menu.sidebar-menu')
            <!-- MENU ELEMENTS ENDS HERE -->
            
            

            <!-- CONTENT WRAPPER. CONTAINS PAGE CONTENT -->
            <div class="content-wrapper">

                <!-- CONTENT HEADER (PAGE HEADER) -->
                <div class="content-header">
                    <div class="container-fluid">
                        @yield('header')
                    </div>
                </div>
                <!-- CONTENT-HEADER -->

                <!-- MAIN CONTENT -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- ALERT-->
                        <div class="row">
                            <div class="col-md-12">
                                @if(Session::has('msg-success'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! Session::get('msg-success') !!}
                                </div>
                                @elseif(Session::has('msg-error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! Session::get('msg-error') !!}
                                </div>
                                @elseif(Session::has('msg-info'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {!! Session::get('msg-info') !!}
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- END ALERT-->
                        
                        <!-- ROW -->
                        <div class="row">
                            @yield('content')
                        </div>
                        <!-- ROW END -->
                    </div>
                </div>
                <!-- CONTENT END -->
            </div>
            <!-- CONTENT-WRAPPER END -->



            <!-- CONTROL SIDEBAR -->
            <aside class="control-sidebar control-sidebar-dark">
                
            </aside>
            <!-- CONTROL-SIDEBAR END -->



            <!-- MAIN FOOTER -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021 <a href="https://www.padmabankbd.com">www.padmabankbd.com</a></strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0 
                </div>
            </footer>
            <!-- MAIN FOOTER END -->

        </div>
        <!-- WRAPPER END -->



        <!-- JQUERY SCRIPTS -->
        <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

        <!-- BOOTSTRAP -->
        <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        



        <!-- SELECT2 -->
        <script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- BOOTSTRAP4 DUALLISTBOX -->
        <script src="{{ url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
        <!-- INPUTMASK -->
        <script src="{{ url('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ url('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <!-- DATE-RANGE-PICKER -->
        <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- BOOTSTRAP COLOR PICKER -->
        <script src="{{ url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <!-- TEMPUSDOMINUS BOOTSTRAP 4 -->
        <script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- BOOTSTRAP SWITCH -->
        <script src="{{ url('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
        <!-- BS-STEPPER -->
        <script src="{{ url('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
        <!-- DROPZONEJS -->
        <script src="{{ url('plugins/dropzone/min/dropzone.min.js') }}"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        
        <script src="{{ url('plugins/fancybox/jquery.fancybox.min.js') }}"></script>

        <!-- SweetAlert2 -->
        <script src="{{ url('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>

        <!-- AdminLTE -->
        <script src="{{ url('dist/js/adminlte.js') }}"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ url('dist/js/demo.js') }}"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ url('dist/js/pages/dashboard3.js') }}"></script>

        <!-- CUSTOM SCRIPTS -->
            @yield('scripts')
        <!-- CUSTOM SCRIPTS ENDS HERE-->

    </body>
</html>
