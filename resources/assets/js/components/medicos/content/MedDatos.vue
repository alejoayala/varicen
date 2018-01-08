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
<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tipo Doc. </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="tipodocumento" class="form-control soflow" v-model="medicByid.typedocument_id">
                                  <option v-for="tipo in typedocuments" :value="tipo.id">{{ tipo.name }}</option>
                                </select>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tipo Doc. </label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="typedocuments"
                                  :selected-option="item_doc"
                                  placeholder="seleccione un tipo"
                                  @select="onSelectDoc">
                                </basic-select>
                              </div>
                              
                              <div class="col-md-1 col-sm-1" >
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_doc.text"></span>
                                <button type="button" v-if="item_doc.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetDoc"><i class="fa fa-close"></i> </button>
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
<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Especialidad </label>
                              <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
                                <select class="form-control soflow" v-model="medicByid.charge_id">
                                  <option v-for="cargo in getCargosMedics" :value="cargo.id">{{ cargo.name }}</option>
                                </select>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Especialidad </label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="cargos"
                                  :selected-option="item_esp"
                                  placeholder="seleccione una opción"
                                  @select="onSelectEsp">
                                </basic-select>
                              </div>
                              <div class="col-md-1 col-sm-1">
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_esp.text"></span>
                                <button type="button" v-if="item_esp.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetEsp"><i class="fa fa-close"></i> </button>
                              </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dirección </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_address" v-model="medicByid.address">
                                </div>
                            </div><!-- /.form-group -->
<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Departamento </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="dpto" class="form-control soflow" v-model="coddep" @change="getPro(coddep)">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dpto in departamentosBy" :value="dpto.coddpto">{{ dpto.nombre }}</option>
                                </select>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Departamento </label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="departamentosBy"
                                  :selected-option="item_dpto"
                                  placeholder="seleccione una opción"
                                  @select="onSelectDpto">
                                </basic-select>
                              </div> 
                              <div class="col-md-1 col-sm-1">
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_dpto.text"></span>
                                <button type="button" v-if="item_dpto.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetDpto"><i class="fa fa-close"></i> </button>
                              </div>
                            </div>


<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Provincia </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="prov" class="form-control soflow" v-model="codpro" @change="getDis(codpro)">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="prov in provinciasBy" :value="prov.codprov">{{ prov.nombre }}</option>
                                </select>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Provincia </label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="provinciasBy"
                                  :selected-option="item_prov"
                                  placeholder="seleccione una opción"
                                  @select="onSelectProv">
                                </basic-select>
                              </div>                        
                              <div class="col-md-1 col-sm-1">
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_prov.text"></span>
                                <button type="button"  v-if="item_prov.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetProv"><i class="fa fa-close"></i> </button>
                              </div>
                            </div>

<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Distrito </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="dist" class="form-control soflow" v-model="medicByid.ubigeo_id" data-placeholder="Placeholder text">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dist in distritosBy" :value="dist.id">{{ dist.nombre }}</option>
                                </select>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Distrito </label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="distritosBy"
                                  :selected-option="item_dist"
                                  placeholder="seleccione una opción"
                                  @select="onSelectDist">
                                </basic-select>
                              </div>                              
                              <div class="col-md-1 col-sm-1">
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_dist.text"></span>
                                <button type="button" v-if="item_dist.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetDist"><i class="fa fa-close"></i> </button>
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
import { BasicSelect } from 'vue-search-select'
import MaskedInput from 'vue-masked-input'
import { mapState,mapGetters } from 'vuex'

export default {
    name: 'meddatos',
    mounted() {
      this.show = typeof this.medicByid === 'undefined' ? true : false  
    },    
    data () {
      return {
        searchText: '', // If value is falsy, reset searchText & searchItem
        item_doc: { value: '', text: ''},
        item_esp: { value: '', text: ''},
        item_dpto: { value: '', text: ''},
        item_prov: { value: '', text: ''},
        item_dist: { value: '', text: ''},

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
      MaskedInput,
      BasicSelect      
    },
    watch:{
      medicByid: function(newVal){
        if(newVal != 'undefined'){
          this.show = false
          if(this.medicByid.ubigeo_id != null){
            this.coddep = this.medicByid.ubigeo.coddpto;
            this.codpro = this.medicByid.ubigeo.codprov;
            this.item_dpto = this.departamentosBy.find(depa => depa.coddpto == this.medicByid.ubigeo.coddpto)
            this.item_prov = this.provinciasBy.find(provi => provi.codprov == this.medicByid.ubigeo.codprov)
            this.item_dist = this.distritosBy.find(dist => dist.value == this.medicByid.ubigeo_id)
          }
          if(this.medicByid.typedocument_id != null){
            this.item_doc = this.typedocuments.find(type => type.value == this.medicByid.typedocument_id)
          }
          if(this.medicByid.charge_id != null){
            this.item_esp = this.cargos.find(espec => espec.value == this.medicByid.charge_id)
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
        var url = '/api/employees/'+this.$route.params.medic;
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
      onSelectDoc (item_doc) {
        this.item_doc = item_doc
        this.medicByid.typedocument_id = item_doc.value
      },
      resetDoc () {
        this.item_doc = {}
        this.medicByid.typedocument_id = ''   
      },
      onSelectEsp (item_esp) {
        this.item_esp = item_esp
        this.medicByid.charge_id = item_esp.value
      },
      resetEsp () {
        this.item_esp = {}
        this.medicByid.charge_id = ''
      },
      onSelectDpto (item_dpto) {
        this.item_dpto = item_dpto
        this.coddep = item_dpto.coddpto
        this.resetProv()
      },
      resetDpto () {
        this.item_dpto = {}
        this.coddep = ''
        this.resetProv()        
      },   
      onSelectProv (item_prov) {
        this.item_prov = item_prov
        this.codpro = item_prov.codprov
        this.resetDist()
      },
      resetProv () {
        this.item_prov = {}
        this.codpro = ''
        this.resetDist()
      }, 
      onSelectDist (item_dist) {
        this.item_dist = item_dist
        this.medicByid.ubigeo_id = item_dist.value
      },
      resetDist () {
        this.item_dist = {}
        this.medicByid.ubigeo_id = ''
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
