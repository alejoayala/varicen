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
                          <select class="select2_multiple form-control" multiple="multiple" v-model="dataTurno.day" style="height: 150px;">
                            <option v-for="dia in dias_semana" :value="dia.id">{{ dia.nombre }}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group col-md-6">
                        <label for="horainicio" class="control-label">MAÑANA: Hora Inicio</label>
                        <div id="horainicio">
                          <select name="horaini" class="form-control" v-model="dataTurno.hourini1_id">
                            <option value=""> --- </option>
                            <option v-for="hora in horainicialBy" :value="hora.id">{{ hora.name }}</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="horafin" class="control-label">Hora Final</label>
                        <div id="horafin">
                          <select name="horaini" class="form-control" v-model="dataTurno.hourfin1_id">
                            <option value=""> --- </option>
                            <option v-for="hora in horainicialBy" :value="hora.id">{{ hora.name }}</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="horainicio2" class="control-label">TARDE: Hora Inicio</label>
                        <div id="horainicio2">
                          <select name="horaini" class="form-control" v-model="dataTurno.hourini2_id">
                            <option value=""> --- </option>
                            <option v-for="hora in horafinalBy" :value="hora.id">{{ hora.name }}</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="horafin2" class="control-label">Hora Final</label>
                        <div id="horafin2">
                          <select name="horaini" class="form-control" v-model="dataTurno.hourfin2_id">
                            <option value=""> --- </option>
                            <option v-for="hora in horafinalBy" :value="hora.id">{{ hora.name }}</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                          <button tooltip="AGREGAR AL HORARIO" type="button" class="btn btn-primary btn-block" @click.prevent="CreateTurno" ><i class="fa fa-plus"></i> AGREGAR AL HORARIO </button>
                      </div>

                    </div>
                  </div>


                </div>
            </div><!-- /.row -->
          <!-- Start table with actions -->
          <div class="table-responsive mb-20">
                <table class="table" v-if="turnos">
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
                        <tr v-for="turn in turnos">
                            <td class="text-center"> {{ dias_semana[turn.day - 1].nombre }}</td>
                            <td>{{ turn.hourini1 ? turn.hourini1.name : '---' }}</td>
                            <td>{{ turn.hourfin1 ? turn.hourfin1.name : '---' }}</td>
                            <td>{{ turn.hourini2 ? turn.hourini2.name : '---' }}</td>
                            <td>{{ turn.hourfin2 ? turn.hourfin2.name : '---' }}</td>
                            <td class="text-center">
                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar" @click.prevent="processDelete(turn.id)"><i class="fa fa-trash-o"></i></a>
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
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'

export default {
    name: 'medturno',
    mounted(){
      this.$store.dispatch('LOAD_TURNS_MEDICS_LIST', { employee_id: this.$route.params.medic });
    },
    data () {
      return {
        dias_semana:[
          {id:1, nombre:'LUNES'},
          {id:2, nombre:'MARTES'},
          {id:3, nombre:'MIERCOLES'},
          {id:4, nombre:'JUEVES'},
          {id:5, nombre:'VIERNES'},
          {id:6, nombre:'SABADO'},
          {id:7, nombre:'DOMINGO'}],
        dataTurno: {
          day: [],
          hourini1_id:'',
          hourfin1_id:'',
          hourini2_id:'',
          hourfin2_id:'',
          employee_id:this.$route.params.medic
        }
      }
    },
    computed: {
      ...mapState(['horas','turnos']),
      horainicialBy: function(){
          return this.horas.filter((hora) => hora.turn == 1);
      },
      horafinalBy: function(){
          return this.horas.filter((hora) => hora.turn == 2);
      }
    },
    methods: {
      CreateTurno: function(){
        var url = 'medicalshifts';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, this.dataTurno).then(response => {
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
          this.$store.dispatch('LOAD_TURNS_MEDICS_LIST', { employee_id: this.$route.params.medic });
          this.errors = [];
          toastr.success('Datos Creados con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      processDelete(id){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Eliminar este Turno ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = 'medicalshifts/' + id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.$store.dispatch('LOAD_TURNS_MEDICS_LIST', { employee_id: this.$route.params.medic });
              toastr.success('Turno Eliminado correctamente');
              dialog.close();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      }
    }
}
</script>
<style scoped>
  .img-thumbs {
    max-width: 35px;
  }

  select.soflow {
     -webkit-appearance: button;
     -webkit-border-radius: 2px;
     -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
     -webkit-padding-end: 20px;
     -webkit-padding-start: 2px;
     -webkit-user-select: none;
     background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
     background-position: 97% center;
     background-repeat: no-repeat;
     border: 1px solid #AAA;
     border-radius: 6px;
     color: #555;
     font-size: inherit;
     /*margin: 20px;*/
     overflow: hidden;
     padding: 5px 10px;
     text-overflow: ellipsis;
     white-space: nowrap;
     width: 100%;
  }
</style>
