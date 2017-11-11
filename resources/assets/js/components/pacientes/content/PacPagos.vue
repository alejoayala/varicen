<template>
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
</template>
<script>
export default {
    name: 'pacpagos',
    data () {
      return {}
    }
}
</script>
