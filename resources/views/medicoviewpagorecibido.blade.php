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
    <link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../plugins/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../../plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../plugins/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('dashboard') }}" class="site_title"><i class="fa fa-cubes"></i> <span>Varicen</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../images/img2.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Médico</span>
                <h2>Ernesto Cota</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('dashboard')}}"><i class="fa fa-home"></i> Dashboard </a>

                  </li>
                  <li><a href="{{ route('agenda')}}"><i class="fa fa-calendar"></i> Agenda </a>

                  </li>
                  <li><a href="{{ route('pacientes')}}"><i class="fa fa-user"></i> Gestión de Pacientes</a>

                  </li>
                  <li><a href="{{ route('medicos')}}"><i class="fa fa-user-md"></i> Gestión de Médicos </a>

                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>Administración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('usuarios')}}">Gestión de Usuarios</a></li>
                      <li><a href="{{ route('promociones')}}">Campañas</a></li>
                      <li><a href="{{ route('tareas')}}">Tareas</a></li>
                      <li><a href="{{ route('tipodocumento')}}">Tipo de Documento</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Configuración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('empresa')}}">Empresa</a></li>
                      <li><a href="{{ route('tipocambio')}}">Tipo de Cambio</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-pdf-o"></i>Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('centralreportes')}}">Central de Reportes</a></li>

                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('login')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../images/img2.jpg" alt="">Ernesto Cota
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('login')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="../images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../../images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="clearfix"></div>

        <!-- page content -->
        <div class="right_col" role="main" >
          <!-- top tiles -->
          <div class="header-content">
            <h2><i class="fa fa-home"></i> Pagos Recibidos <span>Ernesto Cota Condori</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">Estas en:</span>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a data-ng-href="#">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Médicos</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ol>
            </div><!-- /.breadcrumb-wrapper -->
          </div>
          <br/>
          <!-- /.row -->
          <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="panel rounded shadow">
                      <div class="panel-body">
                          <div class="inner-all">
                              <ul class="list-unstyled">
                                  <li class="text-center">
                                      <img class="img-circle img-bordered-primary" src="../../images/img2.jpg" alt="Tol Lee">
                                  </li>
                                  <li class="text-center">
                                      <h4 class="text-capitalize">Ernesto Cota Condori</h4>
                                      <p class="text-muted text-capitalize">Sede CENTRAL</p>
                                  </li>
                                  <li>
                                      <a href="" class="btn btn-info btn-block">Datos Generales</a>
                                  </li>
                                  <li><br/></li>
                                  <li>
                                      <div class="btn-group-vertical btn-block">
                                        <a href="{{ route('medicoview') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Datos Personales</a>
                                        <a href="{{ route('medicoviewturno') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Turnos</a>
                                        <a href="{{ route('medicoviewcita') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Citas Programadas</a>
                                     </div>
                                  </li>
                                  <li><br/></li>
                                  <li>
                                      <a href="" class="btn btn-info btn-block">Facturación</a>
                                  </li>
                                  <li><br/></li>
                                  <li>
                                      <div class="btn-group-vertical btn-block">
                                          <a href="{{ route('medicoviewproduccion') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Producción</a>
                                          <a href="{{ route('medicoviewpagorecibido') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Pagos Recibidos</a>
                                          <a href="{{ route('medicoviewbalance') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Balance</a>
                                      </div>
                                  </li>

                              </ul>
                          </div>
                      </div>
                  </div><!-- /.panel -->

              </div>
              <div class="col-lg-9 col-md-9 col-sm-8">
                  <!-- Tabla de contenido -->
                  <div class="x_panel">
                      <div class="x_content">
                        <div class="page-title">
                          <div class="title_left">
                            <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar ...">
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th class="column-title" width="30%">Concepto </th>
                                <th class="column-title" width="15%">Fecha </th>
                                <th class="column-title" width="20%">Tipo Doc. </th>
                                <th class="column-title" width="20%">Nro. Doc. </th>
                                <th class="column-title" width="15%">Importe</th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr class="even pointer">
                                <td>PAGO DEL PRODUCCION MES DE AGOSTO</td>
                                <td class=" ">01-09-2017</td>
                                <td class=" ">RECIBO POR HONORARIOS</td>
                                <td class=" ">011-00045</td>
                                <td class=" ">2500.00 </td>

                              </tr>
                              <tr class="odd pointer">
                                <td>PAGO DEL PRODUCCION MES DE JULIO</td>
                                <td class=" ">01-08-2017</td>
                                <td class=" ">RECIBO POR HONORARIOS</td>
                                <td class=" ">011-00045</td>
                                <td class=" ">2500.00 </td>

                              </tr>
                              <tr class="even pointer">
                                <td>PAGO DEL PRODUCCION MES DE JUNIO</td>
                                <td class=" ">01-07-2017</td>
                                <td class=" ">RECIBO POR HONORARIOS</td>
                                <td class=" ">011-00045</td>
                                <td class=" ">2500.00 </td>

                              </tr>
                              <tr class="odd pointer">
                                <td>PAGO DEL PRODUCCION MES DE MAYO</td>
                                <td class=" ">01-06-2017</td>
                                <td class=" ">RECIBO POR HONORARIOS</td>
                                <td class=" ">011-00045</td>
                                <td class=" ">2500.00 </td>

                              </tr>
                              <tr class="even pointer">
                                <td>PAGO DEL PRODUCCION MES DE ABRIL</td>
                                <td class=" ">01-05-2017</td>
                                <td class=" ">RECIBO POR HONORARIOS</td>
                                <td class=" ">011-00045</td>
                                <td class=" ">2500.00 </td>

                              </tr>
                              <tr class="odd pointer">
                                <td>PAGO DEL PRODUCCION MES DE MARZO</td>
                                <td class=" ">01-04-2017</td>
                                <td class=" ">RECIBO POR HONORARIOS</td>
                                <td class=" ">011-00045</td>
                                <td class=" ">2500.00 </td>

                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                  <!-- modal -->
                  <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-light">
                        <div class="modal-header alert-info pb-5">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Registro de Atención</h4>
                        </div>
                        <div class="modal-body">
                          <!-- form de atencion medica -->
                          <div class="container-fluid">
                              <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                                  <div class="form-body">
                                      <div class="form-group mb-0">
                                          <label class="pull-right">Fecha: <strong> 21 de Agosto de 2017</strong></label>
                                      </div>
                                      <div class="form-group">
                                          <p class="mb-0"><strong>CONDICION :</strong></p>
                                          <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1"> DB
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox2" value="option2"> HTA
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox3" value="option3"> Alergia
                                          </label>
                                          <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox4" value="option4"> Problemas de columna
                                          </label>
                                      </div><!-- /.form-group -->
                                      <div class="form-group">
                                          <label for="sys">SYS : <span class="asterisk">*</span></label>
                                          <textarea class="form-control" rows="4" id="sys"></textarea>
                                      </div><!-- /.form-group -->
                                      <div class="form-group">
                                          <label for="examen">EXAMEN : <span class="asterisk">*</span></label>
                                          <textarea class="form-control" rows="4" id="examen"></textarea>
                                      </div><!-- /.form-group -->
                                      <div class="form-group">
                                          <label for="tratamiento">TRATAMIENTO : <span class="asterisk">*</span></label>
                                          <textarea class="form-control" rows="4"></textarea>
                                      </div><!-- /.form-group -->
                                  </div><!-- /.form-body -->
                              </form>
                          </div>
                          <!-- /. form de atencion medica -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary">Grabar</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- /. modal -->
                  <!-- /. Tabla de contenido -->
              </div>
          </div><!-- /.row -->


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../plugins/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../plugins/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../plugins/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../plugins/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../plugins/Flot/jquery.flot.js"></script>
    <script src="../../plugins/Flot/jquery.flot.pie.js"></script>
    <script src="../../plugins/Flot/jquery.flot.time.js"></script>
    <script src="../../plugins/Flot/jquery.flot.stack.js"></script>
    <script src="../../plugins/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../plugins/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../plugins/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../plugins/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../plugins/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../plugins/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../plugins/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../plugins/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../plugins/moment/min/moment.min.js"></script>
    <script src="../../plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../js/custom.min.js"></script>

  </body>
</html>
