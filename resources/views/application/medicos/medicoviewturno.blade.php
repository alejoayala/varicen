@extends('admin.template.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main" >
      <!-- top tiles -->
      <div class="header-content">
        <h2><i class="fa fa-home"></i> Turnos Programados <span>Ernesto Cota Condori</span></h2>
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
                                    <a href="{{ route('medicoviewturno') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Turnos</a>
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
                                      <a href="{{ route('medicoviewpagorecibido') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Pagos Recibidos</a>
                                      <a href="{{ route('medicoviewbalance') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Balance</a>
                                  </div>
                              </li>

                          </ul>
                      </div>
                  </div>
              </div><!-- /.panel -->

          </div>
          <div class="col-lg-9 col-md-9 col-sm-8">
            <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="dias">Seleccione los Dias</label>
                                <div id="dias">
                                  <select class="select2_multiple form-control" multiple="multiple" style="height: 150px;">
                                    <option>Lunes</option>
                                    <option>Martes</option>
                                    <option>Miercoles</option>
                                    <option>Jueves</option>
                                    <option>Viernes</option>
                                    <option>Sabado</option>
                                    <option>Domingo</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group col-md-6">
                                <label for="horainicio" class="control-label">MAÑANA: Hora Inicio</label>
                                <div id="horainicio">
                                  <select class="form-control">
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="horafin" class="control-label">Hora Final</label>
                                <div id="horafin">
                                  <select class="form-control">
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="horainicio2" class="control-label">TARDE: Hora Inicio</label>
                                <div id="horainicio2">
                                  <select class="form-control">
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="horafin2" class="control-label">Hora Final</label>
                                <div id="horafin2">
                                  <select class="form-control">
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group col-md-12">
                                  <button tooltip="AGREGAR AL HORARIO" type="button" class="btn btn-primary btn-block" ><i class="fa fa-plus"></i> AGREGAR AL HORARIO </button>
                              </div>

                            </div>
                          </div>


                        </div>
                    </div><!-- /.row -->
                  <!-- Start table with actions -->
                  <div class="table-responsive mb-20">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">Dia</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th class="text-center" style="min-width: 5%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Lunes</td>
                                    <td>09:00</td>
                                    <td>13:00</td>
                                    <td>14:00</td>
                                    <td>20:00</td>
                                    <td class="text-center">
                                        <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                  <td class="text-center">Martes</td>
                                  <td>09:00</td>
                                  <td>13:00</td>
                                  <td>14:00</td>
                                  <td>20:00</td>
                                  <td class="text-center">
                                      <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-center">Miercoles</td>
                                  <td>09:00</td>
                                  <td>13:00</td>
                                  <td>14:00</td>
                                  <td>20:00</td>
                                  <td class="text-center">
                                      <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-center">Jueves</td>
                                  <td>09:00</td>
                                  <td>13:00</td>
                                  <td>14:00</td>
                                  <td>20:00</td>
                                  <td class="text-center">
                                      <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-center">Viernes</td>
                                  <td>09:00</td>
                                  <td>13:00</td>
                                  <td>14:00</td>
                                  <td>20:00</td>
                                  <td class="text-center">
                                      <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-center">Sabado</td>
                                  <td>09:00</td>
                                  <td>13:00</td>
                                  <td>14:00</td>
                                  <td>20:00</td>
                                  <td class="text-center">
                                      <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                </tr>
                            </tbody>

                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>


          </div>
      </div><!-- /.row -->


    </div>
    <!-- /page content -->

@endsection
