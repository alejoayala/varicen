<template>
  <div class="col-lg-9 col-md-9 col-sm-8">
      <!-- Tabla de contenido -->
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
                    <th class="column-title" width="30%">Concepto </th>
                    <th class="column-title" width="15%">Fecha </th>
                    <th class="column-title" width="20%">Tipo Doc. </th>
                    <th class="column-title" width="20%">Nro. Doc. </th>
                    <th class="column-title" width="15%">Importe</th>
                  </tr>
                </thead>

                <tbody>
                  <tr class="even pointer">
                    <td>PAGO DEL PRODUCCION MES DE AGOSTO</td>
                    <td class=" ">01-09-2017</td>
                    <td class=" ">RECIBO POR HONORARIOS</td>
                    <td class=" ">011-00045</td>
                    <td class=" ">2500.00 </td>

                  </tr>
                  <tr class="odd pointer">
                    <td>PAGO DEL PRODUCCION MES DE JULIO</td>
                    <td class=" ">01-08-2017</td>
                    <td class=" ">RECIBO POR HONORARIOS</td>
                    <td class=" ">011-00045</td>
                    <td class=" ">2500.00 </td>

                  </tr>
                  <tr class="even pointer">
                    <td>PAGO DEL PRODUCCION MES DE JUNIO</td>
                    <td class=" ">01-07-2017</td>
                    <td class=" ">RECIBO POR HONORARIOS</td>
                    <td class=" ">011-00045</td>
                    <td class=" ">2500.00 </td>

                  </tr>
                  <tr class="odd pointer">
                    <td>PAGO DEL PRODUCCION MES DE MAYO</td>
                    <td class=" ">01-06-2017</td>
                    <td class=" ">RECIBO POR HONORARIOS</td>
                    <td class=" ">011-00045</td>
                    <td class=" ">2500.00 </td>

                  </tr>
                  <tr class="even pointer">
                    <td>PAGO DEL PRODUCCION MES DE ABRIL</td>
                    <td class=" ">01-05-2017</td>
                    <td class=" ">RECIBO POR HONORARIOS</td>
                    <td class=" ">011-00045</td>
                    <td class=" ">2500.00 </td>

                  </tr>
                  <tr class="odd pointer">
                    <td>PAGO DEL PRODUCCION MES DE MARZO</td>
                    <td class=" ">01-04-2017</td>
                    <td class=" ">RECIBO POR HONORARIOS</td>
                    <td class=" ">011-00045</td>
                    <td class=" ">2500.00 </td>

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
      <!-- /. Tabla de contenido -->
  </div>
</template>
<script>
export default {
    name: 'medpagorecibido',
    data () {
      return {}
    }
}
</script>
