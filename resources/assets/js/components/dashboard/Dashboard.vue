<template>
  <!-- page content -->
  <div class="right_col" role="main" >
    <!-- top tiles -->
    <div class="header-content">
      <h2><i class="fa fa-home"></i> Dashboard <span>Inicio</span></h2>
      <div class="breadcrumb-wrapper hidden-xs">
          <span class="label">Estas en:</span>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a data-ng-href="#">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="#">Dashboard</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ol>
      </div><!-- /.breadcrumb-wrapper -->
    </div>
    <br/>
    <div class="x_panel">
      <div class="x_content">
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <img src="images/logo-medium.jpg" alt="" class="img-logo img-responsive center-block">
          </div>

        </div>
        <br/>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">21</div>
                                <div>Setiembre 2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left"><i class="fa fa-clock-o"></i> Hora Actual</span>
                        <span id="liveclock" class="pull-right"></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">3.25</div>
                                <div>Soles</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <span class="pull-left">Tipo de Cambio</span>
                        <!--<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-pencil-square-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>Tareas Pendientes</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="alert('VARICEN - LISTADO');">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-medkit fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">3</div>
                                <div>Campañas</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="alert('VARICEN - LISTADO');">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- /top tiles -->

        <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-violeta">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-user-md fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">4</div>
                              <div>Especialistas</div>
                          </div>
                      </div>
                  </div>
                  <a href="#" onclick="alert('VARICEN - LISTADO');">
                      <div class="panel-footer">
                          <span class="pull-left">Ver Detalle</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-violeta">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-street-view fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">120</div>
                              <div>Pacientes</div>
                          </div>
                      </div>
                  </div>
                  <a href="#" onclick="alert('VARICEN - LISTADO');">
                      <div class="panel-footer">
                          <span class="pull-left">Ver Detalle</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-violeta">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-file-text-o fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">12</div>
                              <div>Citas Programadas</div>
                          </div>
                      </div>
                  </div>
                  <a href="#" onclick="alert('VARICEN - LISTADO');">
                      <div class="panel-footer">
                          <span class="pull-left">Ver Detalle</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-violeta">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-birthday-cake fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">3</div>
                              <div>Cumpleaños</div>
                          </div>
                      </div>
                  </div>
                  <a href="#" onclick="alert('VARICEN - LISTADO');">
                      <div class="panel-footer">
                          <span class="pull-left">Ver Detalle</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /page content -->
</template>
<script>
    export default {
        name: 'dashboard',
        data () {
          return {}
        }
    }
</script>
