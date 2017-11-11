@extends('admin.template.main')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main" >
          <!-- top tiles -->
          <div class="header-content">
            <h2><i class="fa fa-home"></i> Documentos Clinicos <span>Alexander Ayala Suncion</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">Estas en:</span>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a data-ng-href="#">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Documentos</a>
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
                                        <a href="{{ route('pacienteviewdocumento') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Documentos Clinicos</a>
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
                              <!-- Start sample validation 1-->
                              <div class="panel rounded shadow">

                                  <div class="panel-body no-padding">
                                    <div class="form-group">
                                        <label class="control-label">Cargar Archivo</label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Seleccione Archivo</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                        </div>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm pull-right mb-10"><i class="fa fa-cloud-upload"></i> Subir Archivo</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row" style="padding-left:20px;padding-right:20px;">
                                        <!-- Start table with actions -->
                                        <div class="table-responsive mb-20">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Item</th>
                                                    <th>Subido Por</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre Archivo</th>
                                                    <th class="text-center" style="min-width: 15%">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>Alvaro Fernandez</td>
                                                        <td>27-Abr-2016</td>
                                                        <td>documento_clinico_1.pdf</td>
                                                        <td class="text-center">
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">2</td>
                                                      <td>Oscar Vera</td>
                                                      <td>23-May-2016</td>
                                                      <td>documento_clinico_2.pdf</td>
                                                        <td class="text-center">
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                      <td class="text-center">3</td>
                                                      <td>Alfredo Carpio</td>
                                                      <td>7-Jun-2016</td>
                                                      <td>documento_clinico_3.pdf</td>
                                                        <td class="text-center">
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                            <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div><!-- /.table-responsive -->
                                    </div>

                                  </div>
                              </div><!-- /.panel -->
                              <!--/ End sample validation 1 -->
                            </div>
                        </div>

                      </div>
                  </div><!-- /.row -->

              </div>
              <!-- /. Tabla de contenido -->
          </div><!-- /.row -->


        </div>
        <!-- /page content -->

@endsection
