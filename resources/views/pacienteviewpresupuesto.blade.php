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
            <h2><i class="fa fa-home"></i> Presupuestos <span>Alexander Ayala Suncion</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">Estas en:</span>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a data-ng-href="#">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Presupuestos</a>
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
                                      <img class="img-circle img-bordered-primary" src="../../images/img.jpg" alt="Tol Lee">
                                  </li>
                                  <li class="text-center">
                                      <h4 class="text-capitalize">Alexander Ayala Suncion</h4>
                                      <p class="text-muted text-capitalize">Sede CENTRAL</p>
                                  </li>
                                  <li>
                                      <a href="" class="btn btn-info btn-block">Historial Clinico</a>
                                  </li>
                                  <li><br/></li>
                                  <li>
                                      <div class="btn-group-vertical btn-block">
                                        <a href="{{ route('pacienteview') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Datos Personales</a>
                                        <!--<a href="{{ route('pacienteviewcita') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Citas</a>-->
                                        <a href="{{ route('pacienteviewhistorial') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Historial Clinico</a>
                                        <a href="{{ route('pacienteviewpresupuesto') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Presupuestos</a>
                                        <a href="{{ route('pacienteviewdocumento') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Documentos Clinicos</a>
                                        <a href="{{ route('pacienteviewimagen') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Imagenes y Videos</a>
                                     </div>
                                  </li>
                                  <li><br/></li>
                                  <li>
                                      <a href="" class="btn btn-info btn-block">Facturación</a>
                                  </li>
                                  <li><br/></li>
                                  <li>
                                    <div class="btn-group-vertical btn-block">
                                        <a href="{{ route('pacienteviewpagos') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Recaudación(Pagos)</a>
                                        <a href="{{ route('pacienteviewpagoefectuado') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Pagos Recibidos</a>
                                        <a href="{{ route('pacienteviewpagoanulado') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Pagos Anulados</a>
                                    </div>
                                  </li>

                              </ul>
                          </div>
                      </div>
                  </div><!-- /.panel -->

              </div>
              <!-- Tabla de contenido -->
              <div class="col-lg-9 col-md-9 col-sm-8">
                  <div class="row">
                      <div class="col-md-12">
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
                                      <th class="column-title" width="15%">Fecha </th>
                                      <th class="column-title" width="20%">Nro.Presupuesto </th>
                                      <th class="column-title" width="40%">Médico </th>
                                      <th class="column-title" width="10%">Costo </th>
                                      <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                                      </th>
                                      <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <tr class="even pointer">
                                      <td>13-05-2017</td>
                                      <td class=" ">001-2017</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">2500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="odd pointer">
                                      <td>13-04-2017</td>
                                      <td class=" ">002-2017</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">900</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="even pointer">
                                      <td>13-03-2017</td>
                                      <td class=" ">003-2017</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">1500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="odd pointer">
                                      <td>13-02-2017</td>
                                      <td class=" ">004-2017</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="even pointer">
                                      <td>13-01-2017</td>
                                      <td class=" ">0032-2017</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">2500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="odd pointer">
                                      <td>13-05-2016</td>
                                      <td class=" ">0018-2016</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">200</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="even pointer">
                                      <td>13-04-2016</td>
                                      <td class=" ">0015-2016</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">2500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="odd pointer">
                                      <td>13-07-2015</td>
                                      <td class=" ">001-2015</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">700</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="even pointer">
                                      <td>13-02-2015</td>
                                      <td class=" ">0041-2015</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                    <tr class="odd pointer">
                                      <td>13-01-2014</td>
                                      <td class=" ">0051-2014</td>
                                      <td class=" ">Ernesto Cota Condori </td>
                                      <td class=" ">500</td>
                                      <td class=" last">
                                        <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-eye"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                                        </span>
                                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                                        </span>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                        <!-- modal -->
                        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog"  id="muestra">
                            <div class="modal-content bg-light">
                              <div class="modal-header alert-info pb-5">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Informe del Presupuesto</h4>
                              </div>
                              <div class="modal-body ">
                                <!-- form de atencion medica -->
                                <div class="container-fluid">
                                  <!-- Start sample validation 1-->
                                  <div class="panel rounded shadow bg-light">
                                      <div class="panel-body no-padding bg-light">
                                        <div class="row" style="margin:10px !important">
                                          <h5 class="comment-title mb-5 pull-left">Fecha: <strong>21 Agosto 2017</strong></h5>
                                          <h4 class="comment-title mb-5 pull-right">PRESUPUESTO Nro. <strong>00001-2017</strong></h4><br/>
                                          <hr/>
                                          <h5 class="comment-title mb-5">Especialista: <strong>JUAN PEREZ VASQUEZ</strong> </h5>
                                          <p class="text-muted">El presente presupuesto tiene vigencia de 30 dias calendario.</p>
                                          <div class="mb-20"></div>

                                        </div>
                                        <div class="row" style="padding-left:20px;padding-right:20px;">
                                            <!-- Start table with actions -->
                                            <div class="table-responsive mb-20">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Item</th>
                                                        <th class="text-center" style="max-width:30px;">Cantidad</th>
                                                        <th>Tratamiento</th>
                                                        <th>Precio</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td class="text-center">1</td>
                                                            <td>Tratamiento 1</td>
                                                            <td>200.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td class="text-center">1</td>
                                                            <td>Tratamiento 2</td>
                                                            <td>100.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td class="text-center">1</td>
                                                            <td>Tratamiento 3</td>
                                                            <td>240.00</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="2" rowspan="3">&nbsp;</td>
                                                        <td colspan="1">Importe</td>
                                                        <td colspan="2">442.80</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1">IGV (18%)</td>
                                                        <td colspan="2">97.20</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="bg-teal">Total (Neto)</td>
                                                        <td colspan="2" class="bg-teal">540.00</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div><!-- /.table-responsive -->


                                        </div>

                                      </div>
                                  </div><!-- /.panel -->
                                  <!--/ End sample validation 1 -->
                                </div>
                                <!-- /. form de atencion medica -->
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal"><i class="fa fa-fw fa-arrow-right"></i> Salir</button>
                                <button type="button" class="btn btn-primary rounded" onclick="javascript:imprSelec('muestra');"><i class="fa fa-print"></i> Imprimir</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- /. modal -->


                      </div>
                  </div><!-- /.row -->

              </div>
              <!-- /. Tabla de contenido -->
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
    <script>
      function imprSelec(muestra)
        {var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
    </script>

  </body>
</html>
