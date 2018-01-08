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
                    <th class="column-title" width="35%">Paciente </th>
                    <th class="column-title" width="15%">Fecha </th>
                    <th class="column-title" width="15%">Hora Cita </th>
                    <th class="column-title" width="20%">Tratamiento </th>
                    <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <tr class="even pointer" v-for="Quote in quotesMedicos">
                    <td class=" ">{{ Quote.patient.patient }}</td>
                    <td class=" ">{{ Quote.datequotes | reversefecha }}</td>
                    <td class=" ">{{ Quote.hourini | formatfecha }}</td>
                    <td class=" ">{{ Quote.typetreatment.name}} </td>
                    <td class=" last">
                      <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                        <button type="button" :disabled="Quote.statusquo_id == 4" class="btn btn-success btn-xs" @click.prevent="loadFicha(Quote)"><i class="fa fa-eye"></i></button>
                      </span>
                      <span data-toggle="tooltip" title="" data-original-title="Editar">
                        <button type="button" class="btn btn-primary btn-xs" @click.prevent="loadAtencion(Quote)"><i class="fa fa-pencil"></i></button>
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
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Registro de Atención</h4>
            </div>
            <div class="modal-body">
              <!-- form de atencion medica -->
              <div class="container-fluid">
                  <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createAttention">
                      <div class="form-body">
                          <div class="form-group mb-0">
                              <label class="pull-right">Fecha: <strong> {{ fecha | reversefecha }}</strong></label>
                          </div>
                          <div class="form-group">
                              <p class="mb-0"><strong>CONDICION :</strong></p>
                              <label class="checkbox-inline" v-for="affection in affections">
                                <input type="checkbox" value=""> {{ affection.abrev }}
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
                          <div class="form-footer mt-10">
                              <div class="col-sm-offset-3 pull-right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Grabar</button>                              </div>
                          </div><!-- /.form-footer -->
                      </div><!-- /.form-body -->
                  </form>
              </div>
              <!-- /. form de atencion medica -->
            </div>
          </div>
        </div>
      </div>
      <!-- /. modal -->
      <!-- /. Tabla de contenido -->
  </div>
</template>
<script>
import { mapState, mapGetters } from 'vuex'

export default {
    name: 'medcita',
    mounted(){
      this.$store.dispatch('LOAD_QUOTES_MEDICS_LIST', { medic_id: this.$route.params.medic });
      
    },
    data () {
      return {
        fecha:'',
        dataAttention:{
          sys:'',
          exam:'',
          treatment:'',
          employee_id: this.$route.params.medic,
          cie10_id:'1',
          quote_id:''
        },
        editing: false,
      }
    },
    computed: {
      ...mapState(['quotesMedicos','affections','attention_id_quote','affections_id_patient'])
    },
    methods:{
      loadFicha: function(value){
        this.$store.dispatch('LOAD_AFFECTIONS_ID_PATIENT', { patient_id: value.patient_id }).then(() => {
            console.log("afecciones: ",this.affections_id_patient)
            this.editing = false;
            this.fecha = value.datequotes;
            this.dataAttention.quote_id = value.id;
            this.dataAttention.sys = '';
            this.dataAttention.exam = '';
            this.dataAttention.treatment = '';
            $('#mymodal').modal('show');
        });

      },
      loadAtencion: function(value){
        console.log("valor: ",value)
        this.editing = true;
        this.$store.dispatch('LOAD_ATTENTION_ID_QUOTE', { quote_id: value.id }).then(() => {
          console.log("datos attention: ",this.attention_id_quote[0].exam);
          this.fecha = value.datequotes;
          this.dataAttention.quote_id = value.id;
          this.dataAttention.sys = this.attention_id_quote[0].sys;
          this.dataAttention.exam = this.attention_id_quote[0].exam;
          this.dataAttention.treatment = this.attention_id_quote[0].treatment;
          $('#mymodal').modal('show');
        });

      },
      createAttention: function(){
        if(this.editing == true){ return }
        var url = '/api/attentions';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, this.dataAttention).then(response => {
          if(typeof(response.data.errors) != "undefined"){
              this.errors = response.data.errors;
              var resultado = "";
              for (var i in this.errors) {
                if (this.errors.hasOwnProperty(i)) {
                    resultado += "error -> " + i + " = " + this.errors[i] + "\n";
                }
              }
              toastr.error(resultado);
              return;
          }
          //this.$store.dispatch('LOAD_EMPLOYEES_LIST');
          this.$store.dispatch('LOAD_QUOTES_MEDICS_LIST', { medic_id: this.$route.params.medic });
          this.errors = [];
          $('#mymodal').modal('hide');
          toastr.success('Nuevo Atención creada con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      }
    },
    filters:{
      formatfecha: function(value){
        if(!value) return ''
        value = value.toString()
        return value.substring(11)
      },
      reversefecha: function(value){
        if(!value) return ''
        value = value.toString()
        return value.split('-').reverse().join('-')
      }
    }
}
</script>
