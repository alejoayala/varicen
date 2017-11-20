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
                  <!--<button class="btn btn-primary" data-toggle="modal" data-target="#mymodal_patient"><i class="fa fa-user"></i> Nuevo Paciente</button>-->
                  <button class="btn btn-primary" @click.prevent="LoadForm"><i class="fa fa-user"></i> Nuevo Paciente</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Paciente..." v-model="patientSearch">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" @click.prevent="SearchPatient"><i class="fa fa-search"></i></button>
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
                    <tr class="even pointer" v-for="Patient in SearchPatient">
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
                        <router-link :to="{ name: 'PacDatos', params : { patient: Patient.id }}" v-tooltip.top-center="'Gestionar'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></router-link>
                        <a v-tooltip.top-center="'Eliminar'" href="#" class="btn btn-danger btn-xs" @click.prevent="processDelete(Patient.id)"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- modal -->
          <div class="modal fade" id="mymodal_patient" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-light">
                <div class="modal-header alert-info pb-5">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Registro de Paciente</h4>
                </div>
                <div class="modal-body">
                  <!-- form de atencion medica -->
                  <div class="container-fluid">

                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createPatient">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombres <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_name" v-model="dataPatient.name" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Apellidos <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_lastname" v-model="dataPatient.lastname" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Tipo Doc. </label>
                              <div class="col-md-7 col-sm-7 col-xs-7">
                                <!--<v-select placeholder="seleccione una opcion" :options="TipoDocumentos" v-model="dataPatient.typedocument_id" ></v-select>-->
                                <select name="tipodocumento" class="form-control soflow" v-model="dataPatient.typedocument_id">
                                  <option v-for="tipo in typedocuments" :value="tipo.id">{{ tipo.name }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Numero Doc. <span class="asterisk">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-sm" name="patient_dni" v-model="dataPatient.dni" maxlength="8" required>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Sexo <span class="asterisk">*</span></label>
                              <div class="col-sm-5 pt-5">
                                <p class="mb-0">
                                    Masculino: <input type="radio" name="gender" id="genderM" value="H" v-model="dataPatient.sex" required />
                                    Femenino: <input type="radio" name="gender" id="genderF" value="M" v-model="dataPatient.sex" />
                                </p>
                              </div>
                            </div>
                            <div class="form-group mb-0">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Fec.Nacimiento </label>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <masked-input v-model="dataPatient.birthdate" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                                <!--<input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'" name="patient_birthdate" v-model="dataPatient.birthdate">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>-->
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Como nos conocio </label>
                              <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
                                <select class="form-control soflow" v-model="dataPatient.catchment_id">
                                  <option v-for="capta in captaciones" :value="capta.id">{{ capta.name }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dirección <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_address" v-model="dataPatient.address">
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
                                <select name="dist" class="form-control soflow" v-model="dataPatient.ubigeo_id" data-placeholder="Placeholder text">
                                  <option value="" selected>seleccione una opcion</option>
                                  <option v-for="dist in distritosBy" :value="dist.id">{{ dist.nombre }}</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefono <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_telephone" v-model="dataPatient.telephone" maxlength="7">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Celular <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="patient_cellphone" v-model="dataPatient.cellphone" maxlength="9">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email  <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control input-sm" name="patient_email" v-model="dataPatient.email">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                              <file-upload @cargaImagen="getImagen" @removeImage="getClear"></file-upload>
                            </div>
                        </div><!-- /.form-body -->
                        <hr/>
                        <div class="form-footer mt-10">
                            <div class="col-sm-offset-3 pull-right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Grabar</button>
                            </div>
                        </div><!-- /.form-footer -->
                    </form>

                  </div>
                  <!-- /. form de atencion medica -->
                </div>
              </div>
            </div>
          </div>
          <!-- /. modal -->
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
</template>
<script>
import MaskedInput from 'vue-masked-input'
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'

export default {
    name: 'pacientes',
    mounted(){
      this.$store.dispatch('LOAD_DATA_INIT_LIST');
      this.$store.dispatch('LOAD_PATIENTS_LIST');
    },
    data () {
      return {
        coddep:'',
        codpro:'',
        dataPatient : {
          numberhistory:'',
          name:'',
          lastname:'',
          patient:'',
          typedocument_id: 1,
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
          image: ''
        },
        patientSearch : '',
        errors:[]
      }
    },
    computed: {
        ...mapState([ 'typedocuments','captaciones' ,'patients']),
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
      MaskedInput
    },
    methods: {
      LoadForm: function(){
        this.dataPatient.numberhistory = '';
        this.dataPatient.name = '';
        this.dataPatient.lastname = '';
        this.dataPatient.patient = '';
        this.dataPatient.typedocument_id = 1;
        this.dataPatient.dni = '';
        this.dataPatient.sex = 'H';
        this.dataPatient.birthdate = '';
        this.dataPatient.catchment_id = 1;
        this.dataPatient.ubigeo_id = '0';
        this.dataPatient.address = '';
        this.dataPatient.email = '';
        this.dataPatient.telephone = '';
        this.dataPatient.cellphone = '';
        this.dataPatient.photo = 'no-image.png';
        this.dataPatient.image = '';
        this.coddep = '';
        this.codpro = '';
        this.$emit('getClear');
        $('#mymodal_patient').modal('show');
        this.$store.dispatch('LOAD_DATA_INIT_LIST');
      },
      createPatient: function(){
        var url = 'patients';
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
          this.$store.dispatch('LOAD_PATIENTS_LIST');
          this.errors = [];
          $('#mymodal_patient').modal('hide');
          toastr.success('Nuevo paciente creado con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          //console.log("ver: ",this.errors);
          //console.log(error.response.data);
          console.log(error.response.status);
          //console.log(error.response.headers);
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
            var url = 'patients/' + id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.$store.dispatch('LOAD_PATIENTS_LIST');
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
