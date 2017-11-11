<template>
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
                      <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" action="">
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
</template>
<script>
export default {
    name: 'meddatos',
    data () {
      return {}
    }
}
</script>
