<template>
  <div class="col-lg-9 col-md-9 col-sm-8">
      <div class="row">
          <div class="col-md-12">
              <!-- Start sample validation 1-->
              <div class="panel rounded shadow" v-if="patientByid">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <h3 class="panel-title">Datos Personales</h3>
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="panel-body no-padding">
                      <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" @submit.prevent="updatePatient">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombres <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_name" v-model="patientByid.name" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Apellidos <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_lastname" v-model="patientByid.lastname" required>
                                </div>
                            </div><!-- /.form-group -->
<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tipo Doc. </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="tipodocumento" class="form-control soflow" v-model="patientByid.typedocument_id">
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
                                    <input type="text" class="form-control input-sm" name="patient_dni" v-model="patientByid.dni" maxlength="8">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Sexo <span class="asterisk">*</span></label>
                              <div class="col-sm-5 pt-5">
                                <p class="mb-0">
                                    Masculino: <input type="radio" name="gender" id="genderM" value="H" v-model="patientByid.sex" required />
                                    Femenino: <input type="radio" name="gender" id="genderF" value="M" v-model="patientByid.sex" />
                                </p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Fec.Nacimiento </label>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <masked-input v-model="patientByid.birthdate" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                              </div>
                            </div>
<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Como nos conocio </label>
                              <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
                                <select class="form-control soflow" v-model="patientByid.catchment_id">
                                  <option v-for="capta in captaciones" :value="capta.id">{{ capta.name }}</option>
                                </select>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Como nos conocio </label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="captaciones"
                                  :selected-option="item_cap"
                                  placeholder="seleccione una opción"
                                  @select="onSelectCap">
                                </basic-select>
                              </div>
                              <div class="col-md-1 col-sm-1">
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_cap.text"></span>
                                <button type="button" v-if="item_cap.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetCap"><i class="fa fa-close"></i> </button>
                              </div>
                            </div> 

                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Sede <span class="asterisk">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                <basic-select :options="sedes"
                                  :selected-option="item_sed"
                                  placeholder="seleccione una opción"
                                  @select="onSelectSed">
                                </basic-select>
                              </div>
                              <div class="col-md-1 col-sm-1">
                                <span class="glyphicon glyphicon-folder-open mt-5 mr-10 pull-right" style="font-size:20px" aria-hidden="true" v-if="!item_sed.text"></span>                                
                                <button type="button" v-if="item_sed.text" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetSed"><i class="fa fa-close"></i> </button>
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dirección </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_address" v-model="patientByid.address">
                                </div>
                            </div><!-- /.form-group -->
<!--                             <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Departamento </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <select name="dpto" class="form-control soflow" v-model="coddep" @change="getPro">
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
                                <select name="prov" class="form-control soflow" v-model="codpro" @change="getDis">
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
                                <select name="dist" class="form-control soflow" v-model="patientByid.ubigeo_id">
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
                                    <input type="text" class="form-control input-sm" name="patient_telephone" v-model="patientByid.telephone" maxlength="7">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Celular </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_cellphone" v-model="patientByid.cellphone" maxlength="9">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email </label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control input-sm" name="patient_email" v-model="patientByid.email">
                                </div>
                            </div><!-- /.form-group -->
                            <!-- Afecciones del Paciente -->
                            <div class="col-md-12 p-0 mb-20 separator" v-if="patientByid.affections.length != 0" style="background-color:#669999;">
                              <div class="col-md-6 mt-5" style="color:white;"> 
                                  <div class="form-group">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-5">Condición Clínica </label>
                                      <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
<!--                                           <label :for="afeccion.id" v-for="afeccion in patientByid.affections" :key="afeccion.id" class="mr-10">
                                            <input :value="afeccion.id" v-model="afeccion.pivot.state" type="checkbox">
                                            {{ afeccion.abrev }}
                                          </label> -->
                                          <ul class="list-unstyled">
                                            <li v-for="afeccion in patientByid.affections" :key="afeccion.id">
                                              <input :value="afeccion.id" v-model="afeccion.pivot.state" type="checkbox">{{ afeccion.abrev }}
                                            </li>
                                          </ul>


                                      </div> 
                                  </div><!-- /.form-group --> 
                              </div>
                              <div class="col-md-6 pt-10" style="color:white;">
                                <div class="form-group">
                                    <label class="pull-left">Observaciones </label>
                                    <div class="col-md-12 pl-0">
                                        <textarea class="form-control" rows="3" v-model="patientByid.observations"></textarea>
                                    </div>                        
                                </div>
                              </div>                               
                            </div>
                            <div class="col-md-12 p-0 mb-20 separator" v-if="patientByid.affections.length == 0" style="background-color:#669999;">
                              <div class="col-md-6 mt-5" style="color:white;"> 
                                  <div class="form-group">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-5">Condición Clínica </label>
                                      <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
<!--                                           <label :for="afeccion.id" v-for="afeccion in afecciones" v-bind:key="afeccion.id" class="mr-10">
                                            <input :value="afeccion.id" v-model="afeccion.checked" :id="afeccion.id" type="checkbox">
                                            {{ afeccion.name }}
                                          </label> -->

                                          <ul class="list-unstyled">
                                            <li v-for="afeccion in afecciones" v-bind:key="afeccion.id">
                                              <input :value="afeccion.id" v-model="afeccion.checked" :id="afeccion.id" type="checkbox">{{ afeccion.name }}
                                            </li>
                                          </ul>                                          

                                      </div> 
                                  </div><!-- /.form-group --> 
                              </div>
                              <div class="col-md-6 pt-10" style="color:white;">
                                <div class="form-group">
                                    <label class="pull-left">Observaciones </label>
                                    <div class="col-md-12 pl-0">
                                        <textarea class="form-control" rows="3" v-model="patientByid.observations"></textarea>
                                    </div>                        
                                </div>
                              </div>                               
                            </div>                                                        
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
import { mapState , mapGetters } from 'vuex'

export default {
    name: 'pacdatos',
    mounted() {
      this.show = typeof this.patientByid === 'undefined' ? true : false 
      // cargamos los datos del paciente
      if(typeof this.patientByid != 'undefined'){
        this.show = false
        if(this.patientByid.ubigeo_id != null){
          this.coddep = this.patientByid.ubigeo.coddpto;
          this.codpro = this.patientByid.ubigeo.codprov;
          this.coddis = this.patientByid.ubigeo.coddist;          
          this.item_dpto = this.departamentosBy.find(depa => depa.coddpto == this.patientByid.ubigeo.coddpto)
          if(this.codpro != '0'){
            this.item_prov = this.provinciasBy.find(provi => provi.codprov == this.patientByid.ubigeo.codprov)
          }
          if(this.coddis != '0'){
            this.item_dist = this.distritosBy.find(dist => dist.value == this.patientByid.ubigeo_id)
          }
        }
        if(this.patientByid.typedocument_id != null){
          this.item_doc = this.typedocuments.find(type => type.value == this.patientByid.typedocument_id)
        }
        if(this.patientByid.catchment_id != null){
          this.item_cap = this.captaciones.find(captac => captac.value == this.patientByid.catchment_id)
        }  
        if(this.patientByid.venue_id != null){
          this.item_sed = this.sedes.find(se => se.value == this.patientByid.venue_id)
        }                     
      }      
    },
    data () {
      return {
        searchText: '', // If value is falsy, reset searchText & searchItem
        item_doc: { value: '', text: ''},
        item_cap: { value: '', text: ''},
        item_sed: { value: '', text: ''},        
        item_dpto: { value: '', text: ''},
        item_prov: { value: '', text: ''},
        item_dist: { value: '', text: ''},

        show: false,
        label: 'Cargando...',
        overlay: true,

        coddep:'',
        codpro:'',
        coddis:'',
        id_dep:'0',
        id_pro:'0',
        id_dis:'0',        

        afecciones :[
          {id: 1 , name: 'DB', checked: false},
          {id: 2 , name: 'HTA', checked: false},
          {id: 3 , name: 'ALERGIA', checked: false},
          {id: 4 , name: 'PROBLEMA DE COLUMNA', checked: false},
          {id: 5 , name: 'ASMA', checked: false}          
        ]       
      }
    },
    computed: {
      ...mapState(['typedocuments','captaciones','sedes']),
      ...mapGetters(['getPatientById','getubigeos']),
      patientByid: function(){
          console.log("patient datos: ",this.getPatientById(this.$route.params.patient))  
          return this.getPatientById(this.$route.params.patient);
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
      // colocamos un listen para ver si hay cambios en el paciente
      patientByid: function(newVal){                 
        if(typeof newVal != 'undefined'){
          this.show = false
          if(this.patientByid.ubigeo_id != null){
            this.coddep = this.patientByid.ubigeo.coddpto;
            this.codpro = this.patientByid.ubigeo.codprov;
            this.coddis = this.patientByid.ubigeo.coddist;          
            this.item_dpto = this.departamentosBy.find(depa => depa.coddpto == this.patientByid.ubigeo.coddpto)
            if(this.codpro != '0'){
              this.item_prov = this.provinciasBy.find(provi => provi.codprov == this.patientByid.ubigeo.codprov)
            }
            if(this.coddis != '0'){
              this.item_dist = this.distritosBy.find(dist => dist.value == this.patientByid.ubigeo_id)
            }
          }
          if(this.patientByid.typedocument_id != null){
            this.item_doc = this.typedocuments.find(type => type.value == this.patientByid.typedocument_id)
          }
          if(this.patientByid.catchment_id != null){
            this.item_cap = this.captaciones.find(captac => captac.value == this.patientByid.catchment_id)
          }  
          if(this.patientByid.venue_id != null){
            this.item_sed = this.sedes.find(se => se.value == this.patientByid.venue_id)
          }                     
        }
      }
    },
    methods: {
      getPro: function(){
        this.codpro = "";
        this.patientByid.ubigeo_id ="";
      },
      getDis: function(){
        this.patientByid.ubigeo_id ="";
      },
      updatePatient: function(){
        var afec_pac = this.patientByid.affections.length == 0 ? this.afecciones : this.patientByid.affections              
        if(this.id_dep != '0'){
            this.patientByid.ubigeo_id = this.id_dep          
        } 
        if (this.id_pro != '0') {
            this.patientByid.ubigeo_id = this.id_pro
        }  
        if (this.id_dis != '0') {
            this.patientByid.ubigeo_id = this.id_dis
        }                                   
        var data_completa = this.patientByid
        var url = '/api/patients/'+this.$route.params.patient;

        data_completa['afecciones'] = afec_pac
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;

        axios.put(url, data_completa).then(response => {
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
        this.patientByid.typedocument_id = item_doc.value
      },
      resetDoc () {
        this.item_doc = {}
        this.patientByid.typedocument_id = ''   
      },
      onSelectCap (item_cap) {
        this.item_cap = item_cap
        this.patientByid.catchment_id = item_cap.value
      },
      resetCap () {
        this.item_cap = {}
        this.patientByid.catchment_id = ''
      },
      onSelectSed (item_sed) {
        this.item_sed = item_sed
        this.patientByid.venue_id = item_sed.value
      },
      resetSed () {
        this.item_sed = {}
        this.patientByid.venue_id = ''
      },      
      onSelectDpto (item_dpto) {
        this.item_dpto = item_dpto
        this.coddep = item_dpto.coddpto
        this.resetProv()
        this.id_dep = item_dpto.value         
      },
      resetDpto () {
        this.item_dpto = {}
        this.coddep = ''
        this.id_dep = '0'          
        this.resetProv()        
      },   
      onSelectProv (item_prov) {
        this.item_prov = item_prov
        this.codpro = item_prov.codprov
        this.resetDist()
        this.id_pro = item_prov.value       
      },
      resetProv () {
        this.item_prov = {}
        this.codpro = ''
        this.id_pro = '0'          
        this.resetDist()
      }, 
      onSelectDist (item_dist) {
        this.item_dist = item_dist
        this.id_dis = item_dist.value          
        //this.patientByid.ubigeo_id = item_dist.value
      },
      resetDist () {
        this.item_dist = {}
        this.id_dis = '0'        
        //this.patientByid.ubigeo_id = ''
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
