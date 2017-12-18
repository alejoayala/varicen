<template>
  <div class="col-lg-9 col-md-9 col-sm-8">
      <div class="row">
          <div class="col-md-12">
            <!-- Start sample validation 1-->
            <div class="panel rounded shadow" v-if="medicByid">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Datos Personales</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body no-padding">
                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="updateMedic">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombres <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_name" v-model="medicByid.name" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Apellidos <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_lastname" v-model="medicByid.lastname" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tipo Doc. </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="tipodocumento" class="form-control soflow" v-model="medicByid.typedocument_id">
                                  <option v-for="tipo in typedocuments" :value="tipo.id">{{ tipo.name }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Numero Doc.</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-sm" name="patient_dni" v-model="medicByid.dni" maxlength="8">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Sexo <span class="asterisk">*</span></label>
                              <div class="col-sm-5 pt-5">
                                <p class="mb-0">
                                    Masculino: <input type="radio" name="gender" id="genderM" value="H" v-model="medicByid.sex" required />
                                    Femenino: <input type="radio" name="gender" id="genderF" value="M" v-model="medicByid.sex" />
                                </p>
                              </div>
                            </div>
                            <div class="form-group mb-0">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Fec.Nacimiento </label>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <masked-input v-model="medicByid.birthdate" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Especialidad </label>
                              <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
                                <select class="form-control soflow" v-model="medicByid.charge_id">
                                  <option v-for="cargo in getCargosMedics" :value="cargo.id">{{ cargo.name }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dirección </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_address" v-model="medicByid.address">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Departamento </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="dpto" class="form-control soflow" v-model="coddep" @change="getPro(coddep)">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dpto in departamentosBy" :value="dpto.coddpto">{{ dpto.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Provincia </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="prov" class="form-control soflow" v-model="codpro" @change="getDis(codpro)">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="prov in provinciasBy" :value="prov.codprov">{{ prov.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Distrito </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="dist" class="form-control soflow" v-model="medicByid.ubigeo_id" data-placeholder="Placeholder text">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dist in distritosBy" :value="dist.id">{{ dist.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefono </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_telephone" v-model="medicByid.telephone" maxlength="7">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Celular</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_cellphone" v-model="medicByid.cellphone" maxlength="9">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email </label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control input-sm" name="patient_email" v-model="medicByid.email">
                                </div>
                            </div><!-- /.form-group -->
                            <!--<div class="form-group">
                              <file-upload @cargaImagen="getImagen" @removeImage="getClear"></file-upload>
                            </div>-->
                        </div><!-- /.form-body -->
                        <hr/>
                        <div class="form-footer mt-10">
                            <div class="col-sm-offset-3 pull-right mb-20 pr-20">
                                <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>-->
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Actualizar</button>
                            </div>
                        </div><!-- /.form-footer -->
                    </form>

                </div>
            </div><!-- /.panel -->
            <!--/ End sample validation 1 -->
          </div>
      </div><!-- /.row -->
      <loading
          :show="show"
          :label="label">
      </loading>       
  </div>
</template>
<script>
import MaskedInput from 'vue-masked-input'
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'

export default {
    name: 'meddatos',
    mounted() {
      this.show = typeof this.medicByid === 'undefined' ? true : false  
    },    
    data () {
      return {
        show: false,
        label: 'Cargando...',
        overlay: true,

        coddep:'',
        codpro:''
      }
    },
    computed: {
      ...mapState([ 'typedocuments' ,'employees','cargos']),
      ...mapGetters(['getubigeos','getEmployeeById','getCargosMedics']),
      medicByid: function(){
          return this.getEmployeeById(this.$route.params.medic);
      },
      departamentosBy: function(){
          return this.getubigeos.filter((ubigeo) => ubigeo.codprov == '0').filter((ubigeo) => ubigeo.coddist == '0');
      },
      provinciasBy: function(){
          return this.getubigeos.filter((ubigeo) => ubigeo.coddpto == this.coddep).filter((ubigeo) => ubigeo.codprov != '0').filter((ubigeo) => ubigeo.coddist == '0');
      },
      distritosBy: function(){
          return this.getubigeos.filter((ubigeo) => ubigeo.coddpto == this.coddep).filter((ubigeo) => ubigeo.codprov == this.codpro).filter((ubigeo) => ubigeo.coddist != '0');
      }
    },
    components: {
      MaskedInput
    },
    watch:{
      medicByid: function(newVal){
        if(newVal != 'undefined'){
          if(this.medicByid.ubigeo_id != null){
            this.coddep = this.medicByid.ubigeo.coddpto;
            this.codpro = this.medicByid.ubigeo.codprov;
          }
        }
      }
    },
    methods: {
      getPro: function(){
        this.codpro = "";
        this.medicByid.ubigeo_id ="";
      },
      getDis: function(){
        this.medicByid.ubigeo_id ="";
      },
      updateMedic: function(){
        var url = '/employees/'+this.$route.params.medic;
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.put(url, this.medicByid).then(response => {
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
          this.errors = [];
          toastr.success('se actualizo el paciente con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
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
