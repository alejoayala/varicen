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
                  <!-- Start sample validation 1-->
                  <div class="panel rounded shadow">

                      <div class="panel-body no-padding">
                        <div class="form-group">
                            <label class="control-label">Cargar Archivo</label>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Seleccione Archivo</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm pull-right mb-10"><i class="fa fa-cloud-upload"></i> Subir Archivo</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <!-- Start table with actions -->
                            <div class="table-responsive mb-20">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Item</th>
                                        <th>Subido Por</th>
                                        <th>Fecha</th>
                                        <th>Nombre Archivo</th>
                                        <th class="text-center" style="min-width: 15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Alvaro Fernandez</td>
                                            <td>27-Abr-2016</td>
                                            <td>documento_clinico_1.pdf</td>
                                            <td class="text-center">
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td class="text-center">2</td>
                                          <td>Oscar Vera</td>
                                          <td>23-May-2016</td>
                                          <td>documento_clinico_2.pdf</td>
                                            <td class="text-center">
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td class="text-center">3</td>
                                          <td>Alfredo Carpio</td>
                                          <td>7-Jun-2016</td>
                                          <td>documento_clinico_3.pdf</td>
                                            <td class="text-center">
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div><!-- /.table-responsive -->
                        </div>

                      </div>
                  </div><!-- /.panel -->
                  <!--/ End sample validation 1 -->
                </div>
            </div>

          </div>
      </div><!-- /.row -->

  </div>
  <!-- /. Tabla de contenido -->
</template>
<script>
export default {
    name: 'pacdocumento',
    data () {
      return {}
    }
}
</script>
