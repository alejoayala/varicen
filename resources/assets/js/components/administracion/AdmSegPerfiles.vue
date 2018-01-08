<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-check-square-o"></i> Perfiles <span>Listado General</span></h2>
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
                  <a href="#">Perfiles</a>
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
                  <button class="btn btn-primary" @click="loadForm"><i class="fa fa-check-square-o"></i> Nuevo Perfil</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Perfil...">
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
                      <th class="column-title">Nombre </th>
                      <th class="column-title">Descripcion </th>
                      <th class="column-title no-link last"><span class="nobr">Acción</span>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer" v-for="profile in profiles" :key="profile.id">
                      <td class=" ">{{ profile.name }}</td>
                      <td class=" ">Usuario del Sistema </td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" @click.prevent="loadPerfil(profile)"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <modal name="CreatePerfil" :width="'40%'" :height="'auto'" :scrollable="true" :clickToClose="false">
            <div class="modal-content">
              <form method="POST" @submit.prevent="createProfile">
                <div class="modal-header">
                  <button type="button" class="close" @click="$modal.hide('CreatePerfil')"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Registro de Perfil</h4>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 pb-20">
                    <label class="col-md-4 col-sm-4 col-xs-12 pt-5" for="name">Nombre de Perfil <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <input type="text" id="name" required="required" class="form-control input-sm col-md-12 col-xs-12 mayusculas" v-model="dataNewProfile.name">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" @click="$modal.hide('CreatePerfil')">Cerrar</button>
                  <!--<button type="submit" class="btn btn-primary" :disabled="loading" @click.prevent="createProfile">Guardar</button>-->
                  <button type="button" class="btn btn-primary" :disabled="ShowIcon" @click.prevent="createProfile"><i v-show="ShowIcon" class='fa fa-circle-o-notch fa-spin'></i> {{ labelButton }}</button>                  
                </div>
              </form>
            </div><!-- /.modal-content -->          
          </modal>  
          <!-- modal de configuracion-->
          <modal name="perfiles" :width="'70%'" :height="'auto'" :scrollable="true" :clickToClose="false">
            <!-- form de Perfiles -->
            <div class="container">
              <div class="row title-form">
                  <h3 class="pull-left h3-title">Configuración de Perfil {{ name }}</h3>
                  <div class="pull-right close-form" @click="$modal.hide('perfiles')"><i class="fa fa-close"></i></div>                
              </div>
              <div>
                  <div class="form-body">
                      <div class="container">
                          <div class="row ml-10 mr-10" style="display: flex; flex-wrap: wrap;">
                              <div class="col-md-6 pl-20 pr-20 pb-10" v-for="module in modules" :key="module.id" style="display: flex;flex-direction: column;">
                                  <div class="table table-responsive table-bordered mb-10" style="width: 100%">
                                      <table class="table">
                                          <thead class="bg-primary">
                                              <tr>
                                                  <th class="text-center" style="width: 50px;">   
                                                      <div class="ckbox ckbox-default rounded">
                                                          <label :for="module.idmenu" class="label-cbx">
                                                            <input :id="module.idmenu" :value="module.idmenu" v-model="dataProfile.checkedProfile" type="checkbox" class="invisible" @change="updateChildren($event,module)">
                                                            <div class="checkbox mt-0 mb-0">
                                                              <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                              </svg>
                                                            </div>
                                                          </label>                                                          
                                                      </div>                                                         
                                                  </th>
                                                  <th><strong>{{module.name}}</strong></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr v-for="opcion in module.options" :key="opcion.options.options.id">
                                                  <td class="text-center">                                                    
                                                      <div class="ckbox ckbox-default rounded">
                                                          <label :for="opcion.options.options.id" class="label-cbx">
                                                            <input :id="opcion.options.options.id" :value="opcion.options.options.id" v-model="dataProfile.checkedProfile" type="checkbox" class="invisible" @change="updateParent($event,opcion,module)">
                                                            <div class="checkbox mt-0 mb-0">
                                                              <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                              </svg>
                                                            </div>
                                                            
                                                          </label>      
                                                      </div>                                                        
                                                  </td>
                                                  <td>{{opcion.name}}</td> 
                                              </tr> 
                                          </tbody>
                                      </table>
                                  </div><!-- /.table-responsive --> 
                              </div>
                          </div>
                      </div>
                  </div><!-- /.form-body -->
                  <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                      <div class="pull-right pr-10">
                          <button type="button" class="btn btn-danger active" @click="$modal.hide('perfiles')"><i class="fa fa-reply-all"></i> Cancelar</button>
                          <button type="button" class="btn btn-primary active" @click="updateProfile"><i class="fa fa-cloud-upload"></i> Grabar</button>
                      </div>
                  </div><!-- /.form-footer -->                
              </div>
            </div>
            <!-- /. form de Perfiles -->
          </modal>
          <!-- /. modal -->
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
</template>
<script>
import  {_} from 'vue-underscore'
import { mapState , mapGetters } from 'vuex'

export default {
    name: 'admsegperfiles',
    data () {
      return {
        ShowIcon : false,
        labelButton: 'Grabar Datos',

        loading : false,
        dataNewProfile: {
          name: ''
        },
        name: '',
        dataProfile : {
          idPerfil : '',
          checkedProfile :[]
        }
      }
    },
    created() {
      this.$store.dispatch('LOAD_MODULES_LIST')
      this.$store.dispatch('LOAD_PROFILES_LIST')
    },    
    computed : {
        ...mapState(['modules','profiles']),
        ...mapGetters(['getProfileById']),
      profileByid: function(){
          return this.getProfileById(this.dataProfile.idPerfil);
      },                          
    },
    methods : {
      loadForm(){
        this.dataNewProfile = {
          name: ''
        }
        this.$modal.show('CreatePerfil')
      },
      loadPerfil(value) {
        this.dataProfile = {
          idPerfil : value.id,
          checkedProfile :[]
        }    
        this.cargaPerfiles()            
        this.name = value.name    
        this.$modal.show('perfiles')
      },
      cargaPerfiles(){
        var list=[];
        this.profileByid.modules.map(function(value, key) {
            if(value.pivot.state === 1){
              list.push(value.pivot.module_id)
            }
        })    
        this.dataProfile.checkedProfile = list     
      },
      createProfile(){
        var url = '/api/profiles'
        toastr.options.closeButton = true
        toastr.options.progressBar = true
        this.ShowIcon = true
        this.labelButton = 'Procesando'
        axios.post(url, this.dataNewProfile).then(response => {
          if(typeof(response.data.errors) != "undefined"){
              this.errors = response.data.errors;
              var resultado = "";
              for (var i in this.errors) {
                if (this.errors.hasOwnProperty(i)) {
                    resultado += "error -> " + i + " = " + this.errors[i] + "\n";
                }
              }
              this.loading = false
              toastr.error(resultado);
              return;
          }
          this.errors = [];
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'            
          this.$store.dispatch('LOAD_PROFILES_LIST')          
          this.$modal.hide('CreatePerfil');          
          toastr.success('se creo el perfil con exito');
        }).catch(error => {
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'              
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
        this.isSubmitted = true
      },      
      updateProfile: function(){
        var url = '/api/profiles/'+this.dataProfile.idPerfil;
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.put(url, this.dataProfile).then(response => {
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
          this.$store.dispatch('LOAD_PROFILES_LIST')          
          this.$modal.hide('perfiles');          
          toastr.success('se actualizo los modulos del perfil con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      updateChildren: function(e,valor){
        var list=[]
        valor.options.map(function(value, key) {
          list.push(value.options.options.id)
        })    
        if(e.target.checked){     // seleccionamos todos
          this.dataProfile.checkedProfile = _.union(this.dataProfile.checkedProfile,list)
        }else{        // deseleccionamos todos
          this.dataProfile.checkedProfile = _.difference(this.dataProfile.checkedProfile,list)
        }
      } ,
      updateParent: function(e,valor,mod){
        var list=[]
        var search = false
        mod.options.map(function(value, key) {
          list.push(value.options.options.id)
        })      
        if(e.target.checked){
          if(_.indexOf(this.dataProfile.checkedProfile,valor.options.idmenu)  == -1){
            this.dataProfile.checkedProfile.push(valor.options.idmenu)
          }
        }
        else{
          var self = this
          _.map(list, function(value) {
            if(_.indexOf(self.dataProfile.checkedProfile,value)  > -1){
              search = true
            }
          }); 
          if(!search){
            var i = _.indexOf(self.dataProfile.checkedProfile,valor.idmenu)
            self.dataProfile.checkedProfile.splice(i,1)
          }
        }

      }     

    }
}
</script>
<style scoped>
  /*-- estilos de la cabecera --*/
  .title-form {
    background-color: #337ab7;
    color: white;
    margin:0;
    margin-bottom: 20px;
    padding:0;
  }

  .h3-title {
    margin:10px 0 10px 20px;
  }

  .close-form {
    margin:15px;
    border-radius: 50%;
    cursor: pointer;
  }

  input.mayusculas{
    text-transform:uppercase;
  } 

  /*-- Estilos del input check ---*/
  .label-cbx {
    user-select: none;
    cursor: pointer;
    margin-bottom: 0;
  }
  .label-cbx input:checked + .checkbox {
    border-color: #20C2E0;
  }
  .label-cbx input:checked + .checkbox svg path {
    fill: #20C2E0;
  }
  .label-cbx input:checked + .checkbox svg polyline {
    stroke-dashoffset: 0;
  }
  .label-cbx:hover .checkbox svg path {
    stroke-dashoffset: 0;
  }
  .label-cbx .checkbox {
    position: relative;
    top: 2px;
    float: left;
    margin-right: 8px;
    width: 20px;
    height: 20px;
    border: 2px solid #C8CCD4;
    border-radius: 3px;
  }
  .label-cbx .checkbox svg {
    position: absolute;
    top: -2px;
    left: -2px;
  }
  .label-cbx .checkbox svg path {
    fill: none;
    stroke: #20C2E0;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 71px;
    stroke-dashoffset: 71px;
    transition: all 0.6s ease;
  }
  .label-cbx .checkbox svg polyline {
    fill: none;
    stroke: #FFF;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 18px;
    stroke-dashoffset: 18px;
    transition: all 0.3s ease;
  }
  .label-cbx > span {
    pointer-events: none;
    vertical-align: middle;
  }

  .cntr {
    position: absolute;
    top: 45%;
    left: 0;
    width: 100%;
    text-align: center;
  }

  .invisible {
    position: absolute;
    z-index: -1;
    width: 0;
    height: 0;
    opacity: 0;
  }

</style>
