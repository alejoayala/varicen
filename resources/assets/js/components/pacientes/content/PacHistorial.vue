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
                          <th class="column-title" width="35%">Médico </th>
                          <th class="column-title" width="30%">Tratamiento </th>
                          <th class="column-title" width="20%">Fecha </th>
                          <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr class="even pointer" v-for="attention in attention_id_patient">
                          <td class=" "> {{ attention.quote.medic_id }}</td>
                          <td class=" ">{{ attention.quote.treatment_id }}</td>
                          <td class=" ">{{ attention.quote.datequotes }}</td>
                          <td class=" last">
                            <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                              <button type="button" class="btn btn-success btn-xs" @click.prevent="cargaAtencion(attention)"><i class="fa fa-eye"></i></button>
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
                                    <textarea class="form-control" rows="4" id="sys" v-model="dataAttention.sys"></textarea>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="examen">EXAMEN : <span class="asterisk">*</span></label>
                                    <textarea class="form-control" rows="4" id="examen" v-model="dataAttention.exam"></textarea>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label for="tratamiento">TRATAMIENTO : <span class="asterisk">*</span></label>
                                    <textarea class="form-control" rows="4" v-model="dataAttention.treatment"></textarea>
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
import { mapState, mapGetters } from 'vuex'

export default {
    name: 'pachistorial',
    data () {
      return {
        dataAttention:{
          sys:'',
          exam:'',
          treatment:''
        }
      }
    },
    mounted(){
      this.$store.dispatch('LOAD_ATTENTIONS_ID_PATIENT', { patient_id: this.$route.params.patient });
      //this.$store.dispatch('LOAD_AFFECTIONS_LIST');
    },
    computed: {
      ...mapState(['attention_id_patient'])
    },
    methods: {
      cargaAtencion: function(value){
        this.dataAttention = value;
        $('#mymodal').modal('show');

      },
    }
}
</script>
