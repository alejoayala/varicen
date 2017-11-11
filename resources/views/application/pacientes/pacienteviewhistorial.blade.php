@extends('admin.template.main')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main" >
      <!-- top tiles -->
      <div class="header-content">
        <h2><i class="fa fa-home"></i> Historial de Atenciones <span>Alexander Ayala Suncion</span></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">Estas en:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a data-ng-href="#">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Atenciones</a>
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
                                    <a href="{{ route('pacienteviewhistorial') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Historial Clinico</a>
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
                                  <th class="column-title" width="35%">Médico </th>
                                  <th class="column-title" width="30%">Tratamiento </th>
                                  <th class="column-title" width="20%">Fecha </th>
                                  <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                                  </th>
                                  <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                  </th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr class="even pointer">
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">13-05-2017 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">10-04-2017 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">08-03-2017 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">01-02-2017 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">13-12-2016 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">10-11-2016 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">13-09-2016 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">12-07-2016 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">11-05-2016 </td>
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
                                  <td>Ernesto Cota Condori</td>
                                  <td class=" ">CONSULTA</td>
                                  <td class=" ">14-03-2016 </td>
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
                  </div>
              </div><!-- /.row -->

          </div>
          <!-- /. Tabla de contenido -->
      </div><!-- /.row -->


    </div>
    <!-- /page content -->
@endsection
