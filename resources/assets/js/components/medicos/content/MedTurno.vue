<template>
  <div class="col-lg-9 col-md-9 col-sm-8">
    <div class="x_panel">
        <div class="x_content">
          <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dias">Seleccione los Dias</label>
                        <div id="dias">
                          <select class="select2_multiple form-control" multiple="multiple" style="height: 150px;">
                            <option>Lunes</option>
                            <option>Martes</option>
                            <option>Miercoles</option>
                            <option>Jueves</option>
                            <option>Viernes</option>
                            <option>Sabado</option>
                            <option>Domingo</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group col-md-6">
                        <label for="horainicio" class="control-label">MAÑANA: Hora Inicio</label>
                        <div id="horainicio">
                          <select class="form-control">
                            <option>08:00</option>
                            <option>08:30</option>
                            <option>09:00</option>
                            <option>09:30</option>
                            <option>10:00</option>
                            <option>10:30</option>
                            <option>11:00</option>
                            <option>11:30</option>
                            <option>12:00</option>
                            <option>12:30</option>
                            <option>13:00</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="horafin" class="control-label">Hora Final</label>
                        <div id="horafin">
                          <select class="form-control">
                            <option>08:00</option>
                            <option>08:30</option>
                            <option>09:00</option>
                            <option>09:30</option>
                            <option>10:00</option>
                            <option>10:30</option>
                            <option>11:00</option>
                            <option>11:30</option>
                            <option>12:00</option>
                            <option>12:30</option>
                            <option>13:00</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="horainicio2" class="control-label">TARDE: Hora Inicio</label>
                        <div id="horainicio2">
                          <select class="form-control">
                            <option>14:00</option>
                            <option>14:30</option>
                            <option>15:00</option>
                            <option>15:30</option>
                            <option>16:00</option>
                            <option>16:30</option>
                            <option>17:00</option>
                            <option>17:30</option>
                            <option>18:00</option>
                            <option>18:30</option>
                            <option>19:00</option>
                            <option>19:30</option>
                            <option>20:00</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="horafin2" class="control-label">Hora Final</label>
                        <div id="horafin2">
                          <select class="form-control">
                            <option>14:00</option>
                            <option>14:30</option>
                            <option>15:00</option>
                            <option>15:30</option>
                            <option>16:00</option>
                            <option>16:30</option>
                            <option>17:00</option>
                            <option>17:30</option>
                            <option>18:00</option>
                            <option>18:30</option>
                            <option>19:00</option>
                            <option>19:30</option>
                            <option>20:00</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                          <button tooltip="AGREGAR AL HORARIO" type="button" class="btn btn-primary btn-block" ><i class="fa fa-plus"></i> AGREGAR AL HORARIO </button>
                      </div>

                    </div>
                  </div>


                </div>
            </div><!-- /.row -->
          <!-- Start table with actions -->
          <div class="table-responsive mb-20">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Dia</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th class="text-center" style="min-width: 5%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">Lunes</td>
                            <td>09:00</td>
                            <td>13:00</td>
                            <td>14:00</td>
                            <td>20:00</td>
                            <td class="text-center">
                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <tr>
                          <td class="text-center">Martes</td>
                          <td>09:00</td>
                          <td>13:00</td>
                          <td>14:00</td>
                          <td>20:00</td>
                          <td class="text-center">
                              <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">Miercoles</td>
                          <td>09:00</td>
                          <td>13:00</td>
                          <td>14:00</td>
                          <td>20:00</td>
                          <td class="text-center">
                              <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">Jueves</td>
                          <td>09:00</td>
                          <td>13:00</td>
                          <td>14:00</td>
                          <td>20:00</td>
                          <td class="text-center">
                              <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">Viernes</td>
                          <td>09:00</td>
                          <td>13:00</td>
                          <td>14:00</td>
                          <td>20:00</td>
                          <td class="text-center">
                              <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">Sabado</td>
                          <td>09:00</td>
                          <td>13:00</td>
                          <td>14:00</td>
                          <td>20:00</td>
                          <td class="text-center">
                              <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                    </tbody>

                </table>
            </div><!-- /.table-responsive -->
        </div>
    </div>
  </div>
</template>
<script>
export default {
    name: 'medturno',
    data () {
      return {}
    }
}
</script>
