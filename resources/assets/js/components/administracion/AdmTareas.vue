<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-edit"></i> Tareas Asignadas <span>Listado General</span></h2>
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
                  <a href="#">Tareas</a>
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
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><i class="fa fa-edit"></i> Nueva Tarea</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Tarea...">
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
                      <th class="column-title">Usuario </th>
                      <th class="column-title">Titulo </th>
                      <th class="column-title">Fecha</th>
                      <th class="column-title">Estado</th>
                      <th class="column-title no-link last"><span class="nobr">Acción</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer">
                      <td class=" ">Ernesto Cota Condori</td>
                      <td class=" ">LLAMADA A PACIENTE</td>
                      <td class=" ">23-09-2017 </td>
                      <td class=" ">EN ESPERA </td>
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
                      <td class=" ">Ernesto Cota Condori</td>
                      <td class=" ">COORDINAR REUNION</td>
                      <td class=" ">23-09-2017 </td>
                      <td class=" ">EN ESPERA </td>
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
                      <td class=" ">Ernesto Cota Condori</td>
                      <td class=" ">LLAMADA A PROVEEDOR</td>
                      <td class=" ">23-09-2017 </td>
                      <td class=" ">VOLVER A LLAMAR</td>
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
                      <td class=" ">Ernesto Cota Condori</td>
                      <td class=" ">LLAMADA A PACIENTE</td>
                      <td class=" ">23-09-2017 </td>
                      <td class=" ">EJECUTADA </td>
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
                      <td class=" ">Ernesto Cota Condori</td>
                      <td class=" ">COMPRA DE INSUMOS</td>
                      <td class=" ">23-09-2017 </td>
                      <td class=" ">EN ESPERA </td>
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
                  <h4 class="modal-title" id="myModalLabel">Registro de Tarea</h4>
                </div>
                <div class="modal-body">
                  <!-- form de atencion medica -->
                  <div class="container-fluid">
                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Titulo <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="sv1_firstname">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Asignado a <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="sv1_lastname">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Descripcion <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Estado</label>
                              <div class="col-sm-7">
                                <select class="form-control">
                                  <option>EN ESPERA</option>
                                  <option>EJECUTADA</option>
                                  <option>VOLVER A LLAMAR</option>
                                  <option>CANCELADA</option>
                                  <option>EN PROCESO</option>
                                </select>
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
    name: 'admtareas',
    data () {
      return {}
    }
}
</script>
