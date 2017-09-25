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
            <h2><i class="fa fa-home"></i> Historial de Pagos <span>Alexander Ayala Suncion</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">Estas en:</span>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a data-ng-href="#">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Facturacion</a>
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
                                        <a href="{{ route('pacienteviewpresupuesto') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Presupuestos</a>
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
                                        <a href="{{ route('pacienteviewpagos') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Recaudación(Pagos)</a>
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
                                <div class="pull-right">
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mymodal"><i class="fa fa-database"></i> Nuevo Pago</button>
                                </div>
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
                                      <th class="column-title" width="20%">Tipo Documento </th>
                                      <th class="column-title" width="15%">Nro.Documento </th>
                                      <th class="column-title" width="10%">Importe </th>
                                      <th class="column-title" width="25%">Usuario </th>
                                      <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                                      </th>
                                      <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                      </th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <tr class="even pointer">
                                      <td>13-08-2017</td>
                                      <td class=" ">BOLETA</td>
                                      <td class=" ">001-000456 </td>
                                      <td class=" ">350.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>23-07-2017</td>
                                      <td class=" ">FACTURA</td>
                                      <td class=" ">003-0004776 </td>
                                      <td class=" ">1350.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>30-06-2017</td>
                                      <td class=" ">BOLETA</td>
                                      <td class=" ">001-000560 </td>
                                      <td class=" ">450.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td class=" ">FACTURA</td>
                                      <td class=" ">002-0004356 </td>
                                      <td class=" ">1200.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>12-02-2017</td>
                                      <td class=" ">NOTA DE CREDITO</td>
                                      <td class=" ">001-000456 </td>
                                      <td class=" ">550.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>13-11-2016</td>
                                      <td class=" ">FACTURA</td>
                                      <td class=" ">006-000456 </td>
                                      <td class=" ">850.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>13-09-2016</td>
                                      <td class=" ">BOLETA</td>
                                      <td class=" ">001-000456 </td>
                                      <td class=" ">350.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>13-08-2016</td>
                                      <td class=" ">BOLETA</td>
                                      <td class=" ">001-000456 </td>
                                      <td class=" ">350.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>13-05-2016</td>
                                      <td class=" ">NOTA DE CREDITO</td>
                                      <td class=" ">001-000456 </td>
                                      <td class=" ">350.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                                      <td>13-04-2016</td>
                                      <td class=" ">BOLETA</td>
                                      <td class=" ">001-000456 </td>
                                      <td class=" ">350.00 </td>
                                      <td class=" ">Maria Alcantara Fernandez</td>
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
                          <div class="modal-dialog">
                            <div class="modal-content bg-light">
                              <div class="modal-header alert-info pb-5">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Registro de Pago</h4>
                              </div>
                              <div class="modal-body">
                                <!-- form de atencion medica -->
                                <div class="container-fluid">
                                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                                        <div class="form-body">
                                            <div class="form-group mb-0">
                                                <label class="pull-right">Fecha: <strong> 21 de Agosto de 2017</strong></label>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="heard">TIPO DE DOCUMENTO :</label>
                                              <select id="heard" class="form-control" required>
                                                <option value="">Seleccione..</option>
                                                <option value="press">BOLETA DE VENTA</option>
                                                <option value="net">FACTURA</option>
                                                <option value="mouth">TICKET</option>
                                              </select>
                                            </div><!-- /.form-group -->
                                            <div class="form-group col-md-6">
                                                <label for="numdocumento">Nro. DOCUMENTO : <span class="asterisk">*</span></label>
                                                <input type="text" class="form-control" id="numdocumento"></textarea>
                                            </div><!-- /.form-group -->
                                            <div class="form-group col-md-6">
                                                <label for="monto">MONTO : <span class="asterisk">*</span></label>
                                                <input type="text" class="form-control" id="monto"></textarea>
                                            </div><!-- /.form-group -->
                                            <hr/>
                                            <div class="form-group col-md-12">
                                                <label for="examen">DETALLE : <span class="asterisk">*</span></label>
                                                <textarea class="form-control" rows="4" id="examen"></textarea>
                                            </div><!-- /.form-group -->
                                            <div class="form-group col-md-12">
                                                <label for="tratamiento">OBSERVACION : <span class="asterisk">*</span></label>
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

  </body>
</html>
