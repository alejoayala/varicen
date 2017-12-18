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
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><i class="fa fa-check-square-o"></i> Nuevo Perfil</button>
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
                          <button type="button" class="btn btn-primary btn-xs" @click.prevent="loadPerfil(profile.name)"><i class="fa fa-pencil"></i></button>
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
          <!-- modal -->
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
                                                            <input :id="module.idmenu" type="checkbox" class="invisible">
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
                                              <tr v-for="opcion in module.options" :key="opcion.id">
                                                  <td class="text-center">                                                    
                                                      <div class="ckbox ckbox-default rounded">
                                                          <label :for="opcion.id" class="label-cbx">
                                                            <input :id="opcion.id" type="checkbox" class="invisible">
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
                          <button type="submit" class="btn btn-primary active"><i class="fa fa-cloud-upload"></i> Grabar</button>
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
import { mapState , mapGetters } from 'vuex'

export default {
    name: 'admsegperfiles',
    data () {
      return {
        name: ''
      }
    },
    created() {
      this.$store.dispatch('LOAD_MODULES_LIST')
      this.$store.dispatch('LOAD_PROFILES_LIST')
    },
    mounted() {
      console.log("modulos: ",this.modules)
    },
    computed : {
        ...mapState(['modules','profiles'])     
    },
    methods : {
      loadPerfil(value) {
          this.name = value
          this.$modal.show('perfiles')
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
