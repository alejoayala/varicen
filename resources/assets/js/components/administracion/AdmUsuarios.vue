<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-user"></i> Usuarios <span>Listado General</span></h2>
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
                  <a href="#">Usuarios</a>
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
              <div class="page-title">
                <div class="pull-right">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><i class="fa fa-user"></i> Nuevo Usuario</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Usuario...">
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
                      <th>
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title">Usuario </th>
                      <th class="column-title">Sede </th>
                      <th class="column-title">Email</th>
                      <th class="column-title">Perfil </th>
                      <th class="column-title">Estado </th>
                      <th class="column-title no-link last"><span class="nobr">Acción</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Ernesto Cota Condori</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">ernesto@varicen.pe </td>
                      <td class=" ">ADMINISTRADOR </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                    <tr class="odd pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Francisco Fernandez Arias</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">ffernndez@varicen.pe </td>
                      <td class=" ">MEDICO </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Alberto Carrasco Carrasco</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">acarrasco@varicen.pe </td>
                      <td class=" ">ADMINISTRATIVO </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                    <tr class="odd pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Fania Flores Perez</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">fflores@varicen.pe </td>
                      <td class=" ">ENFERMERA </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Percy Delgado Delgado</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">pdelgado@varicen.pe </td>
                      <td class=" ">MEDICO </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                    <tr class="odd pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Alexander Ayala Suncion</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">aayala@varicen.pe </td>
                      <td class=" ">ADMINISTRADOR </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                          <span>Victor Alcantara Vela</span>
                      </td>
                      <td class=" ">San Luis</td>
                      <td class=" ">valcantara@varicen.pe </td>
                      <td class=" ">MEDICO </td>
                      <td class=" ">HABILITADO </td>
                      <td class=" last">
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
                  <h4 class="modal-title" id="myModalLabel">Registro de Usuario</h4>
                </div>
                <div class="modal-body">
                  <!-- form de atencion medica -->
                  <div class="container-fluid">
                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
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
                                <label class="col-sm-3 control-label">Email  <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control input-sm" name="sv1_email">
                                    <span class="help-block">Por favor ingrese un mail valido : jokowi@jk.co.id, george@bush.gov, bill@gates.com</span>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control input-sm" name="sv1_password">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirme Password <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control input-sm" name="sv1_password_confirm">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Perfil</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>ADMINISTRADOR</option>
                                  <option>MEDICO</option>
                                  <option>ENFERMERIA</option>
                                  <option>ADMINISTRATIVO</option>
                                  <option>INVITADO</option>
                                </select>
                              </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Acceso <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <div class="rdio rdio-theme">
                                        <input id="sv1_gender1" type="radio" name="sv1_gender">
                                        <label for="sv1_gender1">Habilitado</label>
                                    </div>
                                    <div class="rdio rdio-theme">
                                        <input id="sv1_gender2" type="radio" name="sv1_gender">
                                        <label for="sv1_gender2">Deshabilitado</label>
                                    </div>
                                    <label for="sv1_gender" class="error"></label>
                                    <input type="text" class="hide" id="sv1_gender"/>
                                </div>
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
      </div>
    </div>
  </div>
  <!-- /page content -->
</template>
<script>
export default {
    name: 'admusuarios',
    data () {
      return {}
    }
}
</script>
