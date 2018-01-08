<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-user"></i> Pacientes <span>Listado General</span></h2>
      <!-- breadcrumb-wrapper -->
      <div class="breadcrumb-wrapper hidden-xs">
          <span class="label">Estas en:</span>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a data-ng-href="#">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="#">Pacientes</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ol>
      </div>
      <!-- /.breadcrumb-wrapper -->
    </div>
    <!-- /.header-content -->
    <br/>
    <div class="">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">

            <div class="x_content">
              <div class="page-title">
                <div class="pull-right">
                  <button type="button" class="btn btn-primary" @click.prevent="LoadForm" ><i class="fa fa-user"></i> Nuevo Paciente</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Paciente..." v-model="patientSearch" @keyup.13="getPatient(1,patientSearch)">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" @click.prevent="getPatient(pagination.current_page,patientSearch)"><i class="fa fa-search"></i></button>
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
                      <th width="5%">
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title" width="28%">Paciente </th>
                      <th class="column-title" width="10%">DNI </th>
                      <th class="column-title" width="15%">Sede </th>
                      <th class="column-title" width="15%">Telefono</th>
                      <th class="column-title" width="15%">Celular </th>
                      <th class="column-title no-link last" width="12%"><span class="nobr">Acción</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="even pointer" v-for="Patient in patients" :key="Patient.id">
                    <!--<tr class="even pointer" v-for="Patient in listPatients" :key="Patient.id">-->                      
                    <!--<tr class="even pointer" v-for="Patient in SearchPatient">-->
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img :src="'images/'+ Patient.photo"  class="img-circle img-bordered-theme img-thumbs" alt="">
                          <span>{{ Patient.patient }}</span>
                      </td>
                      <td class=" ">{{ Patient.dni }}</td>
                      <td class=" ">{{ Patient.address }}</td>
                      <td class=" ">{{ Patient.telephone }} </td>
                      <td class=" ">{{ Patient.cellphone }}</td>
                      <td class=" last">
                        <router-link :to="{ name: 'PacDatos', params : { patient: Patient.id , page: pagination.current_page }}" v-tooltip.top-center="'Gestionar'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></router-link>
                        <a v-tooltip.top-center="'Eliminar'" href="#" class="btn btn-danger btn-xs" @click.prevent="processDelete(Patient.id)"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <vue-pagination  v-bind:pagination="pagination"
                                 v-on:click.native="getPatient(pagination.current_page,patientSearch)"
                                 :offset="4">
                </vue-pagination>
              </div>
            </div>
          </div>
          <modal name="example" :width="'90%'" :height="'auto'" :scrollable="true" :clickToClose="false">
            <!-- form de registro de pacientes -->
            <div class="container">
              <div class="row title-form">
                  <h3 class="pull-left h3-title">Registro de Pacientes</h3>
                  <div class="pull-right close-form" @click="$modal.hide('example')"><i class="fa fa-close"></i></div>                
              </div>
              <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createPatient">
                  <div class="form-body">
                    <div class="col-md-5 pt-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nombres <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm mayusculas" name="patient_name" v-model="dataPatient.name" required>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Apellidos <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm mayusculas" name="patient_lastname" v-model="dataPatient.lastname" required>
                            </div>
                        </div><!-- /.form-group -->
<!--                         <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Tipo Doc. </label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <select name="tipodocumento" class="form-control soflow" v-model="dataPatient.typedocument_id">
                              <option v-for="tipo in typedocuments" :value="tipo.value" :key="tipo.value">{{ tipo.text }}</option>
                            </select>
                          </div>
                        </div>< /.form-group  --> 
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Tipo Doc. </label>
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <basic-select :options="typedocuments"
                              :selected-option="item_doc"
                              placeholder="seleccione un tipo"
                              @select="onSelectDoc">
                            </basic-select>
                          </div>
                          <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_doc.text"></span>
                          <div class="col-md-1 col-sm-1" v-if="item_doc.text">
                            <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetDoc"><i class="fa fa-close"></i> </button>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Numero Doc. </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" name="patient_dni" v-model="dataPatient.dni" maxlength="8" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                            </div>
                            
                        </div><!-- /.form-group -->                         
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Sexo <span class="asterisk">*</span></label>
                          <div class="col-sm-8 pt-5">
                            <p class="mb-0">
                                Masculino: <input type="radio" name="gender" id="genderM" value="H" v-model="dataPatient.sex" required />
                                Femenino: <input type="radio" name="gender" id="genderF" value="M" v-model="dataPatient.sex" />
                            </p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Fec.Nacimiento </label>
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <masked-input v-model="dataPatient.birthdate" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                          </div>
                        </div>
<!--                         <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4 mt-10">Como nos conocio </label>
                          <div class="col-md-8 col-sm-8 col-xs-8 mt-10">
                            <select class="form-control soflow" v-model="dataPatient.catchment_id">
                              <option v-for="capta in captaciones" :value="capta.id">{{ capta.name }}</option>
                            </select>
                          </div>
                        </div> -->
                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Como nos conocio </label>
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <basic-select :options="captaciones"
                              :selected-option="item_cap"
                              placeholder="seleccione una opción"
                              @select="onSelectCap">
                            </basic-select>
                          </div>
                          <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_cap.text"></span>
                          <div class="col-md-1 col-sm-1" v-if="item_cap.text">
                            <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetCap"><i class="fa fa-close"></i> </button>
                          </div>
                        </div>                         
                                                                                               
                    </div>
                    <div class="col-md-2 pt-20">
                        <label class="col-sm-12 text-center">Foto </label>
                        <div class="form-group pull-right">
                          <file-upload @cargaImagen="getImagen" @removeImage="getClear"></file-upload>
                        </div><!-- /.form-group -->
                    </div>                    
                    <div class="col-md-5 pt-20 pr-20">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Dirección </label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control input-sm mayusculas" name="patient_address" v-model="dataPatient.address">
                          </div>
                      </div><!-- /.form-group -->
<!--                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Departamento </label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          <select name="dpto" class="form-control soflow" v-model="coddep" @change="getPro(coddep)">
                            <option value="" selected>seleccione una opcion</option>
                            <option v-for="dpto in departamentosBy" :value="dpto.value">{{ dpto.text }}</option>
                          </select>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Departamento </label>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                          <basic-select :options="departamentosBy"
                            :selected-option="item_dpto"
                            placeholder="seleccione una opción"
                            @select="onSelectDpto">
                          </basic-select>
                        </div>
                        <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_dpto.text"></span>
                        <div class="col-md-1 col-sm-1" v-if="item_dpto.text">
                          <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetDpto"><i class="fa fa-close"></i> </button>
                        </div>
                      </div> 

<!--                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Provincia </label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          <select name="prov" class="form-control soflow" v-model="codpro" @change="getDis(codpro)">
                            <option value="" selected>seleccione una opcion</option>
                            <option v-for="prov in provinciasBy" :value="prov.value">{{ prov.text }}</option>
                          </select>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Provincia </label>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                          <basic-select :options="provinciasBy"
                            :selected-option="item_prov"
                            placeholder="seleccione una opción"
                            @select="onSelectProv">
                          </basic-select>
                        </div>
                        <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_prov.text"></span>
                        <div class="col-md-1 col-sm-1" v-if="item_prov.text">
                          <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetProv"><i class="fa fa-close"></i> </button>
                        </div>
                      </div> 

<!--                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Distrito </label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          <select name="dist" class="form-control soflow" v-model="dataPatient.ubigeo_id" data-placeholder="Placeholder text">
                            <option value="" selected>seleccione una opcion</option>
                            <option v-for="dist in distritosBy" :value="dist.value">{{ dist.text }}</option>
                          </select>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Distrito </label>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                          <basic-select :options="distritosBy"
                            :selected-option="item_dist"
                            placeholder="seleccione una opción"
                            @select="onSelectDist">
                          </basic-select>
                        </div>
                        <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_dist.text"></span>
                        <div class="col-md-1 col-sm-1" v-if="item_dist.text">
                          <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetDist"><i class="fa fa-close"></i> </button>
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-4 control-label">Telefono </label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control input-sm" name="patient_telephone" v-model="dataPatient.telephone" maxlength="7" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                          </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Celular </label>
                          <div class="col-sm-8">
                              <input type="text" class="form-control input-sm" name="patient_cellphone" v-model="dataPatient.cellphone" maxlength="9" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                          </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Email </label>
                          <div class="col-sm-8">
                              <input type="email" class="form-control input-sm" name="patient_email" v-model="dataPatient.email">
                          </div>
                      </div><!-- /.form-group -->                    
                    </div>
                    <div class="col-md-12 p-0 separator" style="background-color:#669999;">
                      <div class="col-md-6 mt-5" style="color:white;"> 
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Condición Clínica </label>
                              <div class="col-md-8 col-sm-8 col-xs-8 mt-10">
                                  <label :for="afeccion.id" v-for="afeccion in dataPatient.afecciones" v-bind:key="afeccion.id" class="mr-10">
                                    <input :value="afeccion.id" v-model="afeccion.checked" :id="afeccion.id" type="checkbox">
                                    {{ afeccion.name }}
                                  </label>                                
                              </div> 
                          </div><!-- /.form-group --> 
                      </div>
                    </div>
                  </div><!-- /.form-body -->
                  <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                      <div class="pull-right pr-10">
                          <button type="button" class="btn btn-danger active" @click="$modal.hide('example')"><i class="fa fa-reply-all"></i> Cancelar</button>
                          <button type="submit" class="btn btn-primary active"><i class="fa fa-cloud-upload"></i> Grabar</button>
                      </div>
                  </div><!-- /.form-footer -->
              </form>
            </div>
            <!-- /. form de registro de pacientes -->
          </modal>
        </div>
      </div>
    </div>
    <loading
        :show="show"
        :label="label">
    </loading>
  </div>
  <!-- /page content -->

</template>
<script>
import { BasicSelect } from 'vue-search-select'
import MaskedInput from 'vue-masked-input'
import { mapState, mapGetters } from 'vuex'

export default {
    name: 'pacientes',
    mounted(){
      this.show = true;
      this.$store.dispatch('LOAD_PATIENTS_LIST', { page: this.$route.params.page, search:this.patientSearch }).then(() => {
        this.pagination = this.patients_paginate
        this.show = false
      })  
      //this.getPatient(this.pagination.current_page,this.patientSearch);
    },
    data () {
      return {
        searchText: '', // If value is falsy, reset searchText & searchItem
        item_doc: { value: '', text: ''},
        item_cap: { value: '', text: ''},
        item_dpto: { value: '', text: ''},
        item_prov: { value: '', text: ''},
        item_dist: { value: '', text: ''},

        listPatients:[],

        show: false,
        label: 'Cargando...',
        overlay: true,

        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,

        coddep:'',
        codpro:'',
        dataPatient : {
          numberhistory:'',
          name:'',
          lastname:'',
          patient:'',
          typedocument_id: '',
          dni:'',
          sex:'H',
          birthdate:'',
          catchment_id: 1,
          ubigeo_id: '',
          address:'',
          email:'',
          telephone:'',
          cellphone:'',
          photo:'no-image.png',
          image: '',
          afecciones :[
            {id: 1 , name: 'DB', checked: false},
            {id: 2 , name: 'HTA', checked: false},
            {id: 3 , name: 'ALERGIA', checked: false},
            {id: 4 , name: 'PROBLEMA DE COLUMNA', checked: false}
          ],          
        },
        patientSearch : '',
        errors:[]
      }
    },
    computed: {
        ...mapState([ 'typedocuments','captaciones' ,'patients','patients_paginate','affections']),
        ...mapGetters(['getubigeos']),
        departamentosBy: function(){
            return this.getubigeos.filter((ubigeo) => ubigeo.codprov == '0').filter((ubigeo) => ubigeo.coddist == '0');
        },
        provinciasBy: function(){
            return this.getubigeos.filter((ubigeo) => ubigeo.coddpto == this.coddep).filter((ubigeo) => ubigeo.codprov != '0').filter((ubigeo) => ubigeo.coddist == '0');
        },
        distritosBy: function(){
            return this.getubigeos.filter((ubigeo) => ubigeo.coddpto == this.coddep).filter((ubigeo) => ubigeo.codprov == this.codpro).filter((ubigeo) => ubigeo.coddist != '0');
        },
        SearchPatient: function(){
            return this.patients.filter((item) => item.patient.includes(this.patientSearch));
        }
    },
    components: {
      MaskedInput ,
      BasicSelect
    },
    methods: {
      LoadForm: function(){  
        this.item_doc = {}
        this.item_cap = {}      
        this.coddep = '';
        this.codpro = '';
        this.dataPatient = {
          numberhistory:'',
          name:'',
          lastname:'',
          patient:'',
          typedocument_id: '',
          dni:'',
          sex:'H',
          birthdate:'',
          catchment_id: 1,
          ubigeo_id: '',
          address:'',
          email:'',
          telephone:'',
          cellphone:'',
          photo:'no-image.png',
          image: '',
          afecciones :[
            {id: 1 , name: 'DB', checked: false},
            {id: 2 , name: 'HTA', checked: false},
            {id: 3 , name: 'ALERGIA', checked: false},
            {id: 4 , name: 'PROBLEMA DE COLUMNA', checked: false}
          ],          
        }
        this.$emit('getClear')
        this.$store.dispatch('LOAD_DATA_INIT_LIST')       
        this.$modal.show('example')
      },
      getPatient: function(vpage,vsearch){
        this.show = true
        this.$store.dispatch('LOAD_PATIENTS_LIST', { page: vpage, search: vsearch }).then(() => {
          this.pagination = this.patients_paginate
          this.show = false
        }) 
        return 
        this.show = true;
        var url ="api/patients";
        axios.get(url,{
          params:{
            page: page,
            patient_name: search
          }
        }).then(response => {
          console.log("response: ",response.data);
          if(typeof(response.data.errors) != "undefined"){
              this.errors = response.data.errors;
              var resultado = "";
              for (var i in this.errors) {
                if (this.errors.hasOwnProperty(i)) {
                    resultado += "error -> " + i + " = " + this.errors[i] + "\n";
                }
              }
              return;
          }
          this.listPatients = response.data.patients.data;
          this.pagination = response.data.pagination;
          this.show = false;

        }).catch(error => {
          console.log("error en el componente: ",error.response);
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
        });
      },
      createPatient: function(){
        var url = 'api/patients';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, this.dataPatient).then(response => {
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
          //this.$store.dispatch('LOAD_PATIENTS_LIST', { page: this.$route.params.page, search:this.patientSearch })
          this.getPatient(this.pagination.current_page,this.patientSearch);          
          this.errors = [];
          this.$modal.hide('example');
          toastr.success('Nuevo paciente creado con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      processDelete(id){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Eliminar este Paciente ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = 'api/patients/' + id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.getPatient(this.pagination.current_page,this.patientSearch); 
              //this.$store.dispatch('LOAD_PATIENTS_LIST', { page: this.$route.params.page, search:this.patientSearch });     
              toastr.success('Paciente Eliminado correctamente');
              dialog.close();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },
      getImagen: function(imagen){
          this.dataPatient.image = imagen;
      },
      getClear: function(){
          console.log("evento clear");
      },
      getPro: function(){
        this.codpro = "";
        this.dataPatient.ubigeo_id ="";
      },
      getDis: function(){
        this.dataPatient.ubigeo_id ="";
      },
      onSelectDoc (item_doc) {
        this.item_doc = item_doc
        this.dataPatient.typedocument_id = item_doc.value
      },
      resetDoc () {
        this.item_doc = {}
        this.dataPatient.typedocument_id = ''   
      },
      onSelectCap (item_cap) {
        this.item_cap = item_cap
        this.dataPatient.catchment_id = item_cap.value
      },
      resetCap () {
        this.item_cap = {}
        this.dataPatient.catchment_id = ''
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
        this.dataPatient.ubigeo_id = item_dist.value
      },
      resetDist () {
        this.item_dist = {}
        this.dataPatient.ubigeo_id = ''
      },                                      

    }
}
</script>
<style scoped>
  .title-form {
    background-color: #347c7c;
    color: white;
    margin:0;
    padding:0
  }

  .h3-title {
    margin:10px 0 10px 20px;
  }

  .close-form {
    margin:15px;
    border-radius: 50%;
    cursor: pointer;
  }

  .img-thumbs {
    max-width: 35px;
  }

  .separator {
    border-top: 1px solid #CCC7B8;
  }

  input.mayusculas{
    text-transform:uppercase;
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
