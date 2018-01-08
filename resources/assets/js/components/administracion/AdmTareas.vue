<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-edit"></i> Tareas Asignadas <span>Listado General</span></h2>
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
                  <a href="#">Tareas</a>
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
                  <button class="btn btn-primary" @click.prevent="Loadform"><i class="fa fa-edit"></i> Nueva Tarea</button>
                </div>
                <div class="pull-right">
                  <div class="form-group">
                    <label class="col-md-3 control-label pr-5 pt-5 pl-0">Filtro :</label>
                    <div class="col-md-9 pl-0">
                      <select class="form-control input-sm pl-5" v-model="filtro" @change="seleccionaFiltro">
                        <option value="1">ASIGNADAS A MI </option>
                        <option value="2">DESIGNADAS A </option>
                      </select>
                    </div>
                  </div><!-- /.form-group -->  
                </div>                
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Tarea...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="table-responsive" v-if="listChores">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th class="column-title" width="25%" v-if="filtro == 1">Asignado por </th>
                      <th class="column-title" width="25%" v-if="filtro == 2">Designado a </th>                      
                      <th class="column-title" width="30%">Titulo </th>
                      <th class="column-title" width="15%">Fecha</th>
                      <th class="column-title" width="15%">Estado</th>
                      <th class="column-title no-link last text-center" width="15%"><span class="nobr">Acción</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer" v-for="chore in listChores" :key="chore.id">
                      <td class=" " v-if="filtro == 1">{{ chore.user.employee.name }} {{chore.user.employee.lastname }}</td>
                      <td class=" " v-if="filtro == 2">{{ chore.employee.name}} {{ chore.employee.lastname}}</td>                      
                      <td class=" ">{{ chore.title}}</td>
                      <td class=" ">{{ chore.fecha_start | reversefecha}}</td>
                      <td class=" ">{{ chore.state}} </td>
                      <td class=" last text-center">
                        <span data-toggle="tooltip" title="" data-original-title="Editar" v-if="filtro == 2">
                          <button type="button" class="btn btn-primary btn-xs" @click.prevent="processEdit(chore)"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar" v-if="filtro == 2">
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Accion" v-if="filtro == 1">
                          <select class="" v-model="chore.state" @change="ChangeState(chore.id,chore.state)">
                            <option value="en espera">EN ESPERA</option>
                            <option value="en proceso">EN PROCESO</option>
                            <option value="ejecutada">EJECUTADA</option>
                            <option value="cancelada">CANCELADA</option>
                          </select>                         
                        </span>
                      </td>
                    </tr>

                  </tbody>
                </table>
                <vue-pagination  v-bind:pagination="pagination"
                                 v-on:click.native="getChores"
                                 :offset="4">
                </vue-pagination>                  
              </div>


            </div>
          </div>
          <!-- modal -->
          <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-light">
                <div class="modal-header alert-info pb-5">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="glyphicon glyphicon-remove-circle"></i></span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Registro de Tarea</h4>
                </div>
                <div class="modal-body">
                  <!-- form de atencion medica -->
                  <div class="container-fluid">
                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Titulo <span class="asterisk">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm mayusculas" name="title" v-model="dataChore.title">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Asignado a: <span class="asterisk">*</span></label>
                                <div class="col-sm-9">
                                    <autocomplete :suggestions="getEmployeesAutocomplete" v-model="selectionEmployee" placeholder="Buscar Empleado..." :minlength=3 @loadID="loadIDEmployee" ></autocomplete>
                                </div>
                            </div>                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Descripcion <span class="asterisk">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="4" v-model="dataChore.description"></textarea>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Estado</label>
                              <div class="col-sm-9">
                                <select class="form-control" disabled>
                                  <option>EN ESPERA</option>
                                  <option>EN PROCESO</option>
                                  <option>EJECUTADA</option>
                                  <option>CANCELADA</option>
                                </select>
                              </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.form-body -->
                    </form>
                  </div>
                  <!-- /. form de atencion medica -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <!--<button type="button" class="btn btn-primary" @click.prevent="createChore">Grabar</button>-->
                  <button type="button" class="btn btn-primary active" :disabled="ShowIcon" @click.prevent="ActionChore"><i v-show="ShowIcon" :class="[IconClass]"></i> {{ labelButton }}</button>                  
                  
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
import { mapState, mapGetters } from 'vuex'
import Autocomplete from '../utils/Autocomplete'
export default {
    name: 'admtareas',
    data () {
      return {
        IconClass : 'fa fa-cloud-upload',
        ShowIcon : false,
        labelButton: 'Grabar Datos',   

        selectionEmployee:'',
        dataChore: {
          title:'',
          employee_id:'', // asignado a
          user_id:'',     // designado por
          description:'',
          state:'en espera',
          fecha_start: moment().format('YYYY-MM-DD')
        },

        pagination: {
            total: 0,
            per_page: 5,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,

        filtro: 1,
        listChores:[],

        editar : false,

        accionTarea: ''
      }
    },
    created(){
        this.$store.dispatch('LOAD_EMPLOYEES_AUTOCOMPLETE_LIST')
    },    
    mounted(){
        this.$store.dispatch('LOAD_CHORES_ASIGNADAS_LIST', { page: this.pagination.current_page , employee_id: this.user_system.user.employee_id }).then(() => {          
          this.listChores = this.chores_asignadas
          this.pagination = this.chores_asignadas_paginate       
        }) 
        this.$store.dispatch('LOAD_CHORES_DESIGNADAS_LIST', { page: this.pagination.current_page , user_id: this.user_system.user.id  })               
    },
    computed: {
        ...mapState(['chores_asignadas','chores_designadas','chores_asignadas_paginate','chores_designadas_paginate','user_system']),      
        ...mapGetters(['getEmployeesAutocomplete'])      
    },
    components: {
      Autocomplete
    },  
    methods: {
      Loadform: function(){
        this.editar = false
        this.dataChore = {
          title:'',
          employee_id:'', // asignado a
          user_id:'',     // designado por
          description:'',
          state:'en espera',
          fecha_start: moment().format('YYYY-MM-DD')
        }
        this.selectionEmployee =''
        $('#mymodal').modal('show')
      },
      ActionChore: function(){
        if(typeof(this.dataChore.id) === "undefined"){
          this.createChore();
        }else{
          this.updateChore();
        }
      },      
      getChores: function(){
        if(this.filtro == 1){
          this.$store.dispatch('LOAD_CHORES_ASIGNADAS_LIST', { page: this.pagination.current_page , employee_id: this.user_system.user.employee_id }).then(() => {
            this.listChores = this.chores_asignadas
            this.pagination = this.chores_asignadas_paginate
          })        
        }else{
          this.$store.dispatch('LOAD_CHORES_DESIGNADAS_LIST', { page: this.pagination.current_page , user_id: this.user_system.user.id  }).then(() => {
            this.listChores = this.chores_designadas
            this.pagination = this.chores_designadas_paginate
          })        
        }         
      },
      createChore: function(){
        this.dataChore.user_id = this.user_system.user.id
        var url = '/api/chores'
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        this.ShowIcon = true
        this.IconClass = 'fa fa-circle-o-notch fa-spin'
        this.labelButton = 'Procesando'        
        axios.post(url, this.dataChore).then(response => {
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
          //this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
          this.getChores()
          this.errors = []
          this.ShowIcon = false
          this.IconClass = 'fa fa-cloud-upload'
          this.labelButton = 'Grabar Datos'              
          $('#mymodal').modal('hide');
          toastr.success('Nueva Tarea creada con exito');
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });

      },
      processEdit(chor){
        this.editar = true
        var datchor = []
        datchor = _.clone(chor)
        this.dataChore = datchor 
        if(this.filtro = 2){
          this.selectionEmployee = datchor.employee.name + ' ' + datchor.employee.lastname
        }     
        $('#mymodal').modal('show');      
      },       
      updateChore: function(){
        var url = '/api/chores/'+ this.dataChore.id
        toastr.options.closeButton = true
        toastr.options.progressBar = true
        this.ShowIcon = true
        this.IconClass = 'fa fa-circle-o-notch fa-spin'
        this.labelButton = 'Procesando' 
        console.log("dataChore: ",this.dataChore)       
        axios.put(url, this.dataChore).then(response => {
          if(typeof(response.data.errors) != "undefined"){
              this.errors = response.data.errors;
              var resultado = ""
              for (var i in this.errors) {
                if (this.errors.hasOwnProperty(i)) {
                    resultado += "error -> " + i + " = " + this.errors[i] + "\n"
                }
              }
              toastr.error(resultado);
              return;
          }
          //this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
          this.getChores()
          this.errors = []
          this.ShowIcon = false
          this.IconClass = 'fa fa-cloud-upload'
          this.labelButton = 'Grabar Datos'              
          $('#mymodal').modal('hide');
          toastr.success('Tarea actualizada con exito')
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors)
          console.log(error.response.status)
        });
      },
      ChangeState(id,state){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Cambiar el estado de esta tarea ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            this.dataChore.state = state
            var url = '/api/chores/updatestate/' + id
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.put(url, this.dataChore).then(response => {
              if(typeof(response.data.errors) != "undefined"){
                  this.errors = response.data.errors;
                  var resultado = ""
                  for (var i in this.errors) {
                    if (this.errors.hasOwnProperty(i)) {
                        resultado += "error -> " + i + " = " + this.errors[i] + "\n"
                    }
                  }
                  toastr.error(resultado);
                  return;
              }
              //this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
              this.getChores()
              this.errors = []
              this.ShowIcon = false
              this.IconClass = 'fa fa-cloud-upload'
              this.labelButton = 'Grabar Datos' 
              dialog.close();             
              $('#mymodal').modal('hide');
              toastr.success('Tarea actualizada con exito')
            }).catch(error => {
              this.errors = error.response.data.status;
              toastr.error("Hubo un error en el proceso: "+this.errors)
              console.log(error.response.status)
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },  
      loadIDEmployee: function(value){
        this.dataChore.employee_id = value;
      },
      seleccionaFiltro: function(){
        if(this.filtro == 1){
          this.listChores = this.chores_asignadas
          this.pagination = this.chores_asignadas_paginate
        }else{
          this.listChores = this.chores_designadas
          this.pagination = this.chores_designadas_paginate
        }
      }     
    },
    filters:{
      reversefecha: function(value){
        if(!value) return ''
        value = value.toString()
        return value.split('-').reverse().join('-')
      }
    }       
}
</script>
<style scoped>
  input.mayusculas{
    text-transform:uppercase;
  }  
</style>

