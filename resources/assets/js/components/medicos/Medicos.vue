<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-user"></i> Médicos <span>Listado General</span></h2>
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
                  <a href="#">Médicos</a>
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
                  <button class="btn btn-primary" @click.prevent="LoadForm"><i class="fa fa-user"></i> Nuevo Médico</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Médico..." v-model="medicSearch" @keyup.13="getMedic(1,medicSearch)">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"  @click.prevent="getMedic(1,medicSearch)"><i class="fa fa-search"></i></button>
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
                      <th class="column-title" width="28%">Médico </th>
                      <th class="column-title" width="10%">DNI </th>
                      <th class="column-title" width="15%">Sede </th>
                      <th class="column-title" width="15%">Telefono</th>
                      <th class="column-title" width="15%">Celular </th>
                      <th class="column-title no-link last" width="12%"><span class="nobr">Acción</span>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer" v-for="Medic in listMedics">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td>
                          <img :src="'images/'+ Medic.photo"  class="img-circle img-bordered-theme img-thumbs" alt="">
                          <span>{{ Medic.name }} {{ Medic.lastname }}</span>
                      </td>
                      <td class=" ">{{ Medic.dni }}</td>
                      <td class=" ">{{ Medic.address }}</td>
                      <td class=" ">{{ Medic.telephone }} </td>
                      <td class=" ">{{ Medic.cellphone }}</td>
                      <td class="last">
                        <router-link :to="{ name: 'MedDatos', params : { medic : Medic.id , page: pagination.current_page }}" v-tooltip.top-center="'Gestionar'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></router-link>
                        <a v-tooltip.top-center="'Eliminar'" href="#" class="btn btn-danger btn-xs" @click.prevent="processDelete(Medic.id)"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <vue-pagination  v-bind:pagination="pagination"
                                 v-on:click.native="getMedic(pagination.current_page,medicSearch)"
                                 :offset="4">
                </vue-pagination>               
              </div>
            </div>
          </div>

          <!-- nuevo modal -->
          <modal name="medico" :width="'90%'" :height="'auto'" :scrollable="true" :clickToClose="false">
            <!-- form de registro de pacientes -->
            <div class="container">
              <div class="row title-form">
                  <h3 class="pull-left h3-title">Registro de Médicos</h3>
                  <div class="pull-right close-form" @click="$modal.hide('medico')"><i class="fa fa-close"></i></div>                
              </div>
              <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createMedic">
                  <div class="form-body">
                    <div class="col-md-5 pt-20">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nombres <span class="asterisk">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm mayusculas" name="patient_name" v-model="dataMedic.name" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Apellidos <span class="asterisk">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm mayusculas" name="patient_lastname" v-model="dataMedic.lastname" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-4">Tipo Doc. </label>
                              <div class="col-md-8 col-sm-8 col-xs-8">
                                <!--<v-select placeholder="seleccione una opcion" :options="TipoDocumentos" v-model="dataMedic.typedocument_id" ></v-select>-->
                                <select name="tipodocumento" class="form-control soflow" v-model="dataMedic.typedocument_id">
                                  <option v-for="tipo in typedocuments" :value="tipo.id">{{ tipo.name }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Numero Doc. </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="patient_dni" v-model="dataMedic.dni" maxlength="8">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Sexo <span class="asterisk">*</span></label>
                              <div class="col-sm-8 pt-5">
                                <p class="mb-0">
                                    Masculino: <input type="radio" name="gender" id="genderM" value="H" v-model="dataMedic.sex" required />
                                    Femenino: <input type="radio" name="gender" id="genderF" value="M" v-model="dataMedic.sex" />
                                </p>
                              </div>
                            </div>
                            <div class="form-group mb-0">
                              <label class="control-label col-md-4 col-sm-4 col-xs-4">Fec.Nacimiento </label>
                              <div class="col-md-8 col-sm-8 col-xs-8">
                                <masked-input v-model="dataMedic.birthdate" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-4">Especialidad <span class="asterisk">*</span></label>
                              <div class="col-md-8 col-sm-8 col-xs-8 mt-10">
                                <select class="form-control soflow" v-model="dataMedic.charge_id">
                                  <option v-for="cargo in getCargosMedics" :value="cargo.id">{{ cargo.name }}</option>
                                </select>
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
                                    <input type="text" class="form-control input-sm mayusculas" name="patient_address" v-model="dataMedic.address">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-4">Departamento </label>
                              <div class="col-md-8 col-sm-8 col-xs-8">
                                <select name="dpto" class="form-control soflow" v-model="coddep" @change="getPro(coddep)">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dpto in departamentosBy" :value="dpto.coddpto">{{ dpto.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-4">Provincia </label>
                              <div class="col-md-8 col-sm-8 col-xs-8">
                                <select name="prov" class="form-control soflow" v-model="codpro" @change="getDis(codpro)">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="prov in provinciasBy" :value="prov.codprov">{{ prov.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-4">Distrito </label>
                              <div class="col-md-8 col-sm-8 col-xs-8">
                                <select name="dist" class="form-control soflow" v-model="dataMedic.ubigeo_id" data-placeholder="Placeholder text">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dist in distritosBy" :value="dist.id">{{ dist.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Telefono </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="patient_telephone" v-model="dataMedic.telephone" maxlength="7">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Celular </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" name="patient_cellphone" v-model="dataMedic.cellphone" maxlength="9">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email  </label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control input-sm" name="patient_email" v-model="dataMedic.email">
                                </div>
                            </div><!-- /.form-group -->                   
                    </div>
                  </div><!-- /.form-body -->
                  <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                      <div class="pull-right pr-10">
                          <button type="button" class="btn btn-danger active" @click="$modal.hide('medico')"><i class="fa fa-reply-all"></i> Cancelar</button>
                          <button type="submit" class="btn btn-primary active"><i class="fa fa-cloud-upload"></i> Grabar</button>
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
import MaskedInput from 'vue-masked-input'
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'

export default {
    name: 'medicos',
    mounted(){
      this.show = true;
      this.getMedic(this.pagination.current_page,this.medicSearch);      
      //this.$store.dispatch('LOAD_DATA_INIT_EMPLOYEES_LIST');
      //this.$store.dispatch('LOAD_EMPLOYEES_LIST');
    },
    data () {
      return {
        listMedics:[],

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
        dataMedic : {
          name:'',
          lastname:'',
          typedocument_id: 1,
          dni:'',
          charge_id:'',
          profile_id: 2,
          type: 1,
          birthdate: null,
          password: null,
          sex:'H',
          photo:'no-image.png',
          enabled: 1,
          access: 1,
          ubigeo_id: '',
          address:'',
          email:'',
          telephone:'',
          cellphone:'',
          image: ''
        },
        medicSearch : '',
        errors:[]
      }
    },
    computed: {
        ...mapState([ 'typedocuments' ,'employees','cargos']),
        ...mapGetters(['getubigeos','getCargosMedics']),
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
    methods: {
      LoadForm: function(){
        this.dataMedic = {
          name:'',
          lastname:'',
          typedocument_id: 1,
          dni:'',
          charge_id:'',
          profile_id: 2,
          type: 1,
          birthdate: null,
          password: null,
          sex:'H',
          photo:'no-image.png',
          enabled: 1,
          access: 1,
          ubigeo_id: '',
          address:'',
          email:'',
          telephone:'',
          cellphone:'',
          image: ''
        }

        this.coddep = '';
        this.codpro = '';
        this.$emit('getClear');
        this.$store.dispatch('LOAD_DATA_INIT_EMPLOYEES_LIST');
        this.$modal.show('medico')        
      },
      getMedic: function(page,search){
        this.show = true;
        var url ="/api/employees";
        axios.get(url,{
          params:{
            page: page,
            medic_name: search
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
          this.listMedics = response.data.employees.data;
          //this.listMedics = this.listMedics.filter(employee => employee.type == 1)
          this.pagination = response.data.pagination;
          this.show = false;

        }).catch(error => {
          console.log("error en el componente: ",error.response);
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
        });
      },      
      createMedic: function(){
        var url = '/api/employees';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, this.dataMedic).then(response => {
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
          this.getMedic(this.pagination.current_page,this.medicSearch);  
          this.errors = [];
          this.$modal.hide('medico');
          toastr.success('Nuevo Médico creado con exito');
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
            var url = 'employees/' + id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.$store.dispatch('LOAD_EMPLOYEES_LIST');
              toastr.success('Médico Eliminado correctamente');
              dialog.close();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },
      getImagen: function(imagen){
          this.dataMedic.image = imagen;
      },
      getClear: function(){
          console.log("evento clear");
      },
      getPro: function(){
        this.codpro = "";
        this.dataMedic.ubigeo_id ="";
      },
      getDis: function(){
        this.dataMedic.ubigeo_id ="";
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
