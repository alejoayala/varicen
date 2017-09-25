<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Varicen | Centro de Flebologia</title>

    <!-- Bootstrap -->
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="plugins/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

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
                <a class="btn btn-danger submit" style="text-decoration:none" href="{{ route('dashboard')}}">INGRESAR</a>
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
  </body>
</html>
