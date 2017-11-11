<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-edit"></i> Empresa <span>Datos Generales</span></h2>
      <!-- breadcrumb-wrapper -->
      <div class="breadcrumb-wrapper hidden-xs">
          <span class="label">Estas en:</span>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a data-ng-href="#">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="#">Empresa</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ol>
      </div>
      <!-- /.breadcrumb-wrapper -->
    </div>
    <!-- /.header-content -->
    <br/>
    <div class="">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <!-- form de atencion medica -->
              <div class="container-fluid">
                <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="sv1_firstname">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Razón Social <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="sv1_firstname">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">RUC <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="sv1_firstname">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dirección <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="sv1_firstname">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telefono <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="sv1_firstname">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control input-sm" name="sv1_firstname">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cargar Logo </label>
                            <div class="fileinput fileinput-new input-group col-sm-7" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Seleccione Archivo</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <img src="images/logo-medium.jpg" alt="" class="img-responsive center-block">
                        </div><!-- /.form-group -->
                    </div><!-- /.form-body -->
                </form>
              </div>
              <!-- /. form de atencion medica -->
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
    name: 'conempresa',
    data () {
      return {}
    }
}
</script>
