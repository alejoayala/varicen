@extends('admin.template.main')

@section('content')
        <!-- page content -->
        <div class="right_col" role="main" >
          <!-- top tiles -->
          <div class="header-content">
            <h2><i class="fa fa-home"></i> Datos Personales <span>Ernesto Cota Condori</span></h2>
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
                                      <img class="img-circle img-bordered-primary" src="../images/img2.jpg" alt="Tol Lee">
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
                                        <a href="{{ route('medicoview') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Datos Personales</a>
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
                  <div class="row">
                      <div class="col-md-12">

                          <!-- Start sample validation 1-->
                          <div class="panel rounded shadow">
                              <div class="panel-heading">
                                  <div class="pull-left">
                                      <h3 class="panel-title">Datos Personales</h3>
                                  </div>
                                  <div class="pull-right">
                                      <button data-tooltip data-collapse-panel class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                                      <button data-tooltip data-remove-panel class="btn btn-sm" data-container="body" data-action="remove" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="panel-body no-padding">
                                  <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" action=" {{ route('pacientes')}}">
                                      <div class="form-body">
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Nombres <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <input type="text" class="form-control input-sm" name="sv1_firstname">
                                              </div>
                                          </div><!-- /.form-group -->
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Apellidos <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <input type="text" class="form-control input-sm" name="sv1_lastname">
                                              </div>
                                          </div><!-- /.form-group -->
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Dirección <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <input type="text" class="form-control input-sm" name="sv1_username">
                                              </div>
                                          </div><!-- /.form-group -->
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Telefono <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <input type="text" class="form-control input-sm" name="sv1_password">
                                              </div>
                                          </div><!-- /.form-group -->
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Celular <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <input type="text" class="form-control input-sm" name="sv1_password_confirm">
                                              </div>
                                          </div><!-- /.form-group -->
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Email  <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <input type="email" class="form-control input-sm" name="sv1_email">
                                                  <span class="help-block">Por favor ingrese un mail valido : jokowi@jk.co.id, george@bush.gov, bill@gates.com</span>
                                              </div>
                                          </div><!-- /.form-group -->
                                          <div class="form-group">
                                              <label class="col-sm-3 control-label">Sexo <span class="asterisk">*</span></label>
                                              <div class="col-sm-7">
                                                  <div class="rdio rdio-theme">
                                                      <input id="sv1_gender1" type="radio" name="sv1_gender">
                                                      <label for="sv1_gender1">Masculino</label>
                                                  </div>
                                                  <div class="rdio rdio-theme">
                                                      <input id="sv1_gender2" type="radio" name="sv1_gender">
                                                      <label for="sv1_gender2">Femenino</label>
                                                  </div>
                                                  <label for="sv1_gender" class="error"></label>
                                                  <input type="text" class="hide" id="sv1_gender"/>
                                              </div>
                                          </div><!-- /.form-group -->
                                      </div><!-- /.form-body -->
                                      <div class="form-footer">
                                          <div class="col-sm-offset-3">
                                              <button type="submit" class="btn btn-theme">Grabar</button>
                                          </div>
                                      </div><!-- /.form-footer -->
                                  </form>

                              </div>
                          </div><!-- /.panel -->
                          <!--/ End sample validation 1 -->

                      </div>
                  </div><!-- /.row -->


              </div>
          </div><!-- /.row -->


        </div>
        <!-- /page content -->
@endsection
