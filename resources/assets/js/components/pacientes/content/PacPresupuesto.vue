<template>
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
                          <th class="column-title" width="15%">Fecha </th>
                          <th class="column-title" width="20%">Nro.Presupuesto </th>
                          <th class="column-title" width="40%">Médico </th>
                          <th class="column-title" width="10%">Costo </th>
                          <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr class="even pointer">
                          <td>13-05-2017</td>
                          <td class=" ">001-2017</td>
                          <td class=" ">Ernesto Cota Condori </td>
                          <td class=" ">2500</td>
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
              <div class="modal-dialog"  id="muestra">
                <div class="modal-content bg-light">
                  <div class="modal-header alert-info pb-5">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Informe del Presupuesto</h4>
                  </div>
                  <div class="modal-body ">
                    <!-- form de atencion medica -->
                    <div class="container-fluid">
                      <!-- Start sample validation 1-->
                      <div class="panel rounded shadow bg-light">
                          <div class="panel-body no-padding bg-light">
                            <div class="row" style="margin:10px !important">
                              <h5 class="comment-title mb-5 pull-left">Fecha: <strong>21 Agosto 2017</strong></h5>
                              <h4 class="comment-title mb-5 pull-right">PRESUPUESTO Nro. <strong>00001-2017</strong></h4><br/>
                              <hr/>
                              <h5 class="comment-title mb-5">Especialista: <strong>JUAN PEREZ VASQUEZ</strong> </h5>
                              <p class="text-muted">El presente presupuesto tiene vigencia de 30 dias calendario.</p>
                              <div class="mb-20"></div>

                            </div>
                            <div class="row" style="padding-left:20px;padding-right:20px;">
                                <!-- Start table with actions -->
                                <div class="table-responsive mb-20">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Item</th>
                                            <th class="text-center" style="max-width:30px;">Cantidad</th>
                                            <th>Tratamiento</th>
                                            <th>Precio</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                                <td>Tratamiento 1</td>
                                                <td>200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-center">1</td>
                                                <td>Tratamiento 2</td>
                                                <td>100.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-center">1</td>
                                                <td>Tratamiento 3</td>
                                                <td>240.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2" rowspan="3">&nbsp;</td>
                                            <td colspan="1">Importe</td>
                                            <td colspan="2">442.80</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">IGV (18%)</td>
                                            <td colspan="2">97.20</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" class="bg-teal">Total (Neto)</td>
                                            <td colspan="2" class="bg-teal">540.00</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.table-responsive -->


                            </div>

                          </div>
                      </div><!-- /.panel -->
                      <!--/ End sample validation 1 -->
                    </div>
                    <!-- /. form de atencion medica -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded" data-dismiss="modal"><i class="fa fa-fw fa-arrow-right"></i> Salir</button>
                    <button type="button" class="btn btn-primary rounded" onclick="javascript:imprSelec('muestra');"><i class="fa fa-print"></i> Imprimir</button>
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
    name: 'pacpresupuesto',
    data () {
      return {}
    }
}
</script>
