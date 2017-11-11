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

    <!-- Bootstrap -->
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('plugins/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->}
    <link href="{{ asset('plugins/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">

  </head>

  <body class="login">
    <div id="app">

      <div class="login_wrapper">

        <div class="animate form login_form">
          <section class="login_content">
            <div class="brand" style="">
                <img src="images/logo.png" class="img-responsive" style=""/>
            </div>
            <form>
              <h1>Acceso al Sistema</h1>
              <div>
                <input type="text" class="form-control" placeholder="DNI" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-danger submit" style="text-decoration:none" href="{{ route('home')}}">INGRESAR</a>
                <a class="reset_pass" href="#">Olvidaste tu password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <p>Av. Canada 3690-2do.Piso - San Luis</p>
                  <p>©2017 Todos los derechos reservados Varicen</p>
                </div>
              </div>

            </form>
          </section>
        </div>

      </div>
    </div>
    <!-- VueJs -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
