<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Varicen | Centro de Flebologia</title>

    <!-- Custom App Vue Style incluye bootstrap y toastr -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('plugins/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('plugins/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('plugins/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- choosen -->
    <link href="{{ asset('plugins/chosen/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/autocomplete/css/autocomplete.css') }}" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="{{ asset('plugins/fullcalendar-3.4.0/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fullcalendar-3.4.0/fullcalendar.print.css') }}" rel="stylesheet" media="print">
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body" id="app">
      <div class="main_container">
        <!-- Parte Izquierda de la Plantilla -->
        <navbar></navbar>
        <!-- fin de la Parte Izquierda de la plantilla -->

        <!-- top navigation -->
        <topbar></topbar>
        <!-- /top navigation -->
        <div class="clearfix"></div>

        <!-- Contenido -->
        <router-view></router-view>

        <!-- footer content -->
        <footervue></footervue>
        <!-- /footer content -->
      </div>
    </div>
    @yield('modal')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('plugins/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('plugins/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('plugins/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('plugins/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('plugins/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('plugins/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('plugins/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('plugins/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('plugins/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('plugins/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('plugins/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('plugins/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- jquery.inputmask -->
    <script src="{{ asset('plugins/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- FullCalendar -->
    <script src="{{ asset('plugins/fullcalendar-3.4.0/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar-3.4.0/locale-all.js') }}"></script>
    <!-- chosen -->
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <!-- toastr -->
    <script src="{{ asset('plugins/toastr/toastr.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('plugins/autocomplete/js/auto-complete.min.js') }}"></script>    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @yield('scripts')

  </body>
</html>
