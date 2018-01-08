<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-user"></i> Empleados <span>Listado General</span></h2>
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
                  <a href="#">Empleados</a>
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
                  <button class="btn btn-primary" @click.prevent="LoadForm"><i class="fa fa-user"></i> Nuevo Empleado</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Empleado..." v-model="employeeSearch" @keyup.13="getEmployee(1,employeeSearch)">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"  @click.prevent="getEmployee(1,employeeSearch)"><i class="fa fa-search"></i></button>
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
                      <th class="column-title" width="28%">Empleado </th>
                      <th class="column-title" width="10%">DNI </th>
                      <th class="column-title" width="15%">Sede </th>
                      <th class="column-title" width="15%">Telefono</th>
                      <th class="column-title" width="15%">Celular </th>
                      <th class="column-title no-link last" width="12%"><span class="nobr">Acción</span>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer" v-for="Employee in listEmployees" :key="Employee.id">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img :src="'images/'+ Employee.photo"  class="img-circle img-bordered-theme img-thumbs" alt="">
                          <span>{{ Employee.name }} {{ Employee.lastname }}</span>
                      </td>
                      <td class=" ">{{ Employee.dni }}</td>
                      <td class=" ">{{ Employee.address }}</td>
                      <td class=" ">{{ Employee.telephone }} </td>
                      <td class=" ">{{ Employee.cellphone }}</td>
                      <td class="last">
                        <!--<router-link :to="{ name: 'MedDatos', params : { medic : Medic.id , page: pagination.current_page }}" v-tooltip.top-center="'Gestionar'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></router-link>-->
                        <a v-tooltip.top-center="'Editar'" href="#" class="btn btn-primary btn-xs" @click.prevent="processEdit(Employee)"><i class="fa fa-pencil"></i></a>
                        <a v-tooltip.top-center="'Eliminar'" href="#" class="btn btn-danger btn-xs" @click.prevent="processDelete(Employee.id)"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <vue-pagination  v-bind:pagination="pagination"
                                 v-on:click.native="getEmployee(pagination.current_page,employeeSearch)"
                                 :offset="4">
                </vue-pagination>               
              </div>
            </div>
          </div>

          <!-- nuevo modal -->
          <modal name="empleado" :width="'90%'" :height="'auto'" :scrollable="true" :clickToClose="false">
            <!-- form de registro de empleados -->
            <div class="container">
              <div class="row title-form">
                  <h3 class="pull-left h3-title">Registro de Empleado</h3>
                  <div class="pull-right close-form" @click="$modal.hide('empleado')"><i class="fa fa-close"></i></div>                
              </div>
              <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="ActionEmployee">
                  <div class="form-body">
                    <div class="col-md-5 pt-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nombres <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm mayusculas" name="employee_name" v-model="dataEmployee.name" required>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Apellidos <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm mayusculas" name="employee_lastname" v-model="dataEmployee.lastname" required>
                            </div>
                        </div><!-- /.form-group -->
<!--                         <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">Tipo Doc. </label>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                            <select name="tipodocumento" class="form-control soflow" v-model="dataEmployee.typedocument_id">
                                <option v-for="tipo in typedocuments" :value="tipo.id" :key="tipo.id">{{ tipo.name }}</option>
                            </select>
                            </div>
                        </div> -->

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
                                <input type="text" class="form-control input-sm" name="employee_dni" v-model="dataEmployee.dni" maxlength="8">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Sexo <span class="asterisk">*</span></label>
                            <div class="col-sm-8 pt-5">
                            <p class="mb-0">
                                Masculino: <input type="radio" name="gender" id="genderM" value="H" v-model="dataEmployee.sex" required />
                                Femenino: <input type="radio" name="gender" id="genderF" value="M" v-model="dataEmployee.sex" />
                            </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">Fec.Nacimiento </label>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                            <masked-input v-model="dataEmployee.birthdate" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">Cargo <span class="asterisk">*</span></label>
                            <div class="col-md-8 col-sm-8 col-xs-8 mt-10">
                            <select class="form-control soflow" v-model="dataEmployee.charge_id">
                                <option v-for="cargo in getCargosEmployees" :value="cargo.id" :key="cargo.id">{{ cargo.name }}</option>
                            </select>
                            </div>
                        </div>  -->

                        <div class="form-group">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4">Cargo </label>
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <basic-select :options="getCargosEmployees"
                              :selected-option="item_car"
                              placeholder="seleccione una opción"
                              @select="onSelectCar">
                            </basic-select>
                          </div>
                          <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_car.text"></span>
                          <div class="col-md-1 col-sm-1" v-if="item_car.text">
                            <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetCar"><i class="fa fa-close"></i> </button>
                          </div>
                        </div>                        

                    </div>
                    <div class="col-md-2 pt-20">
                        <label class="col-sm-12 text-center">Foto </label>
                        <div class="form-group pull-right">
                          <file-upload @cargaImagen="getImagen" @removeImage="getClear"></file-upload>
                        </div>                        
                    </div>                    
                    <div class="col-md-5 pt-20 pr-20">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Dirección </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm mayusculas" name="employee_address" v-model="dataEmployee.address">
                            </div>
                        </div><!-- /.form-group -->
<!--                         <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">Departamento </label>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                            <select name="dpto" class="form-control soflow" v-model="coddep" @change="getPro(coddep)">
                                <option value="" selected>seleccione una opcion</option>
                                <option v-for="dpto in departamentosBy" :value="dpto.coddpto" :key="dpto.coddpto">{{ dpto.nombre }}</option>
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

<!--                         <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">Provincia </label>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                            <select name="prov" class="form-control soflow" v-model="codpro" @change="getDis(codpro)">
                                <option value="" selected>seleccione una opcion</option>
                                <option v-for="prov in provinciasBy" :value="prov.codprov" :key="prov.codprov">{{ prov.nombre }}</option>
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

<!--                         <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">Distrito </label>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                            <select name="dist" class="form-control soflow" v-model="dataEmployee.ubigeo_id" data-placeholder="Placeholder text">
                                <option value="" selected>seleccione una opcion</option>
                                <option v-for="dist in distritosBy" :value="dist.id" :key="dist.id">{{ dist.nombre }}</option>
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
                                <input type="text" class="form-control input-sm" name="employee_telephone" v-model="dataEmployee.telephone" maxlength="7">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Celular </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" name="employee_cellphone" v-model="dataEmployee.cellphone" maxlength="9">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Email  </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control input-sm" name="employee_email" v-model="dataEmployee.email">
                            </div>
                        </div><!-- /.form-group --> 
                        <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:right">
                            <button id="btn-access" v-show="false" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">...</button>
                            <label class="control-label">Acceso al Sistema </label>
                            <toggle-button :value="dataEmployee.access" v-model="dataEmployee.access" :color="{checked: '#337ab7', unchecked: '#FF0000'}" :sync="true" :labels="{checked: 'SI', unchecked: 'NO'}" @change="cambioAcceso"/>                            
                          </div>
                          <div class="clearfix"></div>
                          
                          <div :class="[collapse]" id="collapseExample">
                            <div class="well">
                                <div class="form-group">
                                  <label class="control-label col-md-4 col-sm-4 col-xs-4">Perfil </label>
                                  <div class="col-md-7 col-sm-7 col-xs-7">
                                    <basic-select :options="profiles"
                                      :selected-option="item_prof"
                                      placeholder="seleccione una opción"
                                      @select="onSelectProf">
                                    </basic-select>
                                  </div>
                                  <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!item_prof.text"></span>
                                  <div class="col-md-1 col-sm-1" v-if="item_prof.text">
                                    <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetProf"><i class="fa fa-close"></i> </button>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nombre de Usuario </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm minusculas" name="employee_username" v-model="dataEmployee.username" />
                                    </div>
                                </div>                                
                            </div>
                          </div>
                        </div>

                    </div>
                  </div><!-- /.form-body -->
                  <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                      <div class="pull-right pr-10">
                          <button type="button" class="btn btn-danger active" @click="$modal.hide('empleado')"><i class="fa fa-reply-all"></i> Cancelar</button>
                          <!--<button type="button" class="btn btn-primary active" @click.prevent="ActionEmployee"><i class="fa fa-cloud-upload"></i> Grabar</button>-->
                          <button type="button" class="btn btn-primary active" :disabled="ShowIcon" @click.prevent="ActionEmployee"><i v-show="ShowIcon" :class="[IconClass]"></i> {{ labelButton }}</button>                  
                      </div>
                  </div><!-- /.form-footer -->
              </form>
            </div>
            <!-- /. form de registro de medicos -->
          </modal>          
          <!-- fin nuevo modal -->
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
import  {_} from 'vue-underscore'
import { mapState , mapGetters } from 'vuex'

export default {
    name: 'empleados',
    mounted(){
      this.show = true;
      this.getEmployee(this.pagination.current_page,this.employeeSearch);   
    },
    data () {
      return {
        IconClass : 'fa fa-cloud-upload',
        ShowIcon : false,
        labelButton: 'Grabar Datos',        

        searchText: '', // If value is falsy, reset searchText & searchItem
        item_doc: { value: '', text: ''},
        item_car: { value: '', text: ''},
        item_dpto: { value: '', text: ''},
        item_prov: { value: '', text: ''},
        item_dist: { value: '', text: ''},
        item_prof: { value: '', text: ''},        

        listEmployees:[],

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
        dataEmployee : {
          name:'',
          lastname:'',
          typedocument_id: 1,
          dni:'',
          charge_id:'',
          profile_id: '',
          type: 0,
          birthdate: null,
          password: '',
          sex:'H',
          photo:'no-image.png',
          enabled: 1,
          access: false,
          ubigeo_id: '',
          address:'',
          email:'',
          telephone:'',
          cellphone:'',
          image: '',
          username :''
        },
        employeeSearch : '',
        errors:[],
        collapse : 'collapse'
      }
    },
    computed: {
        ...mapState([ 'typedocuments' ,'employees','cargos','profiles']),
        ...mapGetters(['getubigeos','getCargosEmployees']),
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
    methods: {
      LoadForm: function(){
        this.searchText = '', // If value is falsy, reset searchText & searchItem
        this.item_doc = { value: '', text: ''}
        this.item_car = { value: '', text: ''}
        this.item_dpto = { value: '', text: ''}
        this.item_prov = { value: '', text: ''}
        this.item_dist = { value: '', text: ''}
        this.item_prof = { value: '', text: ''}
        this.collapse = 'collapse'  

        this.dataEmployee = {
          name:'',
          lastname:'',
          typedocument_id: 1,
          dni:'',
          charge_id:'',
          profile_id: '',
          type: 0,
          birthdate: null,
          password: '',
          sex:'H',
          photo:'no-image.png',
          enabled: 1,
          access: false,
          ubigeo_id: '',
          address:'',
          email:'',
          telephone:'',
          cellphone:'',
          image: '',
          username: ''
        }
        this.coddep = ''
        this.codpro = ''
        this.$emit('getClear')
        this.$store.dispatch('LOAD_DATA_INIT_EMPLOYEES_LIST')
        this.$modal.show('empleado')       
      },
      getEmployee: function(page,search){
        this.show = true;
        var url ="/api/employees";
        axios.get(url,{
          params:{
            page: page,
            medic_name: search,
            type: 0
          }
        }).then(response => {
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
          this.listEmployees = response.data.employees.data;
          this.pagination = response.data.pagination;
          this.show = false;

        }).catch(error => {
          console.log("error en el componente: ",error.response);
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
        });
      },  
      ActionEmployee: function(){
        if(typeof(this.dataEmployee.id) === "undefined"){
        //if(this.dataEmployee.id === 'undefined'){
          this.createEmployee()
        }else{
          this.updateEmployee()
        }
      },   
      createEmployee: function(){
        var url = '/api/employees';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        this.ShowIcon = true
        this.IconClass = 'fa fa-circle-o-notch fa-spin'
        this.labelButton = 'Procesando'        
        axios.post(url, this.dataEmployee).then(response => {
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
          this.getEmployee(this.pagination.current_page,this.employeeSearch);  
          this.errors = [];
          this.ShowIcon = false
          this.IconClass = 'fa fa-cloud-upload'
          this.labelButton = 'Grabar Datos'              
          this.$modal.hide('empleado');
          toastr.success('Nuevo Empleado creado con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      updateEmployee: function(){
        var url = '/api/employees/'+this.dataEmployee.id;
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        this.ShowIcon = true
        this.IconClass = 'fa fa-circle-o-notch fa-spin'        
        this.labelButton = 'Procesando'          
        axios.put(url, this.dataEmployee).then(response => {
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
          this.getEmployee(this.pagination.current_page,this.employeeSearch);  
          this.errors = [];
          this.ShowIcon = false
          this.IconClass = 'fa fa-cloud-upload'          
          this.labelButton = 'Grabar Datos'             
          this.$modal.hide('empleado');
          toastr.success('el Empleado fue actualizado con exito');          
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      processEdit(empl){
        var dataempl = []
        dataempl = _.clone(empl)
        dataempl.access = dataempl.access == 1 ? true : false
        if(dataempl.typedocument_id != null){
          this.item_doc = this.typedocuments.find((type) => type.value == dataempl.typedocument_id);
        }
        if(dataempl.charge_id != null){
          this.item_car = this.cargos.find((cargo) => cargo.value == dataempl.charge_id);
        }
        if(dataempl.ubigeo_id != null){
          this.coddep = dataempl.ubigeo.coddpto;
          this.codpro = dataempl.ubigeo.codprov;
          this.item_dpto = this.departamentosBy.find((dpto) => dpto.coddpto == dataempl.ubigeo.coddpto)
          this.item_prov = this.provinciasBy.find((prov) => prov.codprov == dataempl.ubigeo.codprov)
          this.item_dist = this.distritosBy.find((dist) => dist.value == dataempl.ubigeo_id)
        }   
        if(dataempl.profile_id != null){
          this.item_prof = this.profiles.find((profi) => profi.value == dataempl.profile_id)
        }  

        if(dataempl.access){
          this.collapse = 'collapse in'
        }
        this.dataEmployee = dataempl
        this.dataEmployee.username = dataempl.user.name
        this.$modal.show('empleado')
      
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
            var url = '/api/employees/' + id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.getEmployee(this.pagination.current_page,this.employeeSearch);  
              toastr.success('Empleado Eliminado correctamente');
              dialog.close();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },
      getImagen: function(imagen){
          this.dataEmployee.image = imagen;
      },
      getClear: function(){
          console.log("evento clear");
      },
      getPro: function(){
        this.codpro = "";
        this.dataEmployee.ubigeo_id ="";
      },
      getDis: function(){
        this.dataEmployee.ubigeo_id ="";
      },
      onSelectDoc (item_doc) {
        this.item_doc = item_doc
        this.dataEmployee.typedocument_id = item_doc.value
      },
      resetDoc () {
        this.item_doc = {}
        this.dataEmployee.typedocument_id = ''   
      },
      onSelectCar (item_car) {
        this.item_car = item_car
        this.dataEmployee.charge_id = item_car.value
      },
      resetCar () {
        this.item_car = {}
        this.dataEmployee.charge_id = ''
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
        this.dataEmployee.ubigeo_id = item_dist.value
      },
      resetDist () {
        this.item_dist = {}
        this.dataEmployee.ubigeo_id = ''
      },                                      
      onSelectProf (item_prof) {
        this.item_prof = item_prof
        this.dataEmployee.profile_id = item_prof.value
      },
      resetProf () {
        this.item_prof = {}
        this.dataEmployee.profile_id = ''
      },  
      cambioAcceso() {
        $('#btn-access').click()
        if(!this.checkAccess){
          this.resetProf()  
          this.dataEmployee.username =''
        }      
      }     

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

  input.mayusculas{
    text-transform:uppercase;
  }  

  input.minusculas{
    text-transform:lowercase;
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
