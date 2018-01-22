<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-user"></i> Usuarios <span>Listado General</span></h2>
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
                  <a href="#">Usuarios</a>
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
<!--                 <div class="pull-right">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><i class="fa fa-user"></i> Nuevo Usuario</button>
                </div> -->
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Usuario..." v-model="userSearch" @keyup.13="getUser(1,userSearch)">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" @click.prevent="getUser(pagination.current_page,userSearch)"><i class="fa fa-search"></i></button>
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
                      <th class="column-title">Usuario </th>
                      <th class="column-title">Empleado </th>
                      <th class="column-title">Cargo</th>
                      <th class="column-title">Perfil </th>
                      <th class="column-title">Habilitado </th>
                      <th class="column-title no-link last"><span class="nobr">Acción</span>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer" v-for="user in users" :key="user.id">
                      <td><span>{{ user.name }}</span></td>
                      <td class=" ">{{  user.employee.name }} {{ user.employee.lastname}}</td>
                      <td class=" ">{{ user.employee.charge.name}} </td>
                      <!--<td class=" ">{{ user.employee.profile.name }}</td>-->
                      <td>
                        <select v-model="user.employee.profile_id" @change="updateAtributos(user.employee.id,user.employee.profile_id,null)">
                          <option v-for="profile in profiles" v-bind:value="profile.id" :key="profile.id">
                            {{ profile.name }}
                          </option>
                        </select>
                      </td>
                      <!--<td class=" ">{{ user.employee.enabled }} </td>-->
                      <td>
                        <toggle-button :value="user.access" :color="{checked: '#337ab7', unchecked: '#FF0000'}" :sync="true" :labels="{checked: 'SI', unchecked: 'NO'}" @change="updateAtributos(user.employee.id,null,user.access)"/>                            
                      </td>
                      <td class=" last">
<!--                         <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                        </span> -->
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" @click.prevent="processDelete(user.id)"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>

                  </tbody>
                </table>
                <vue-pagination  v-bind:pagination="pagination"
                                 v-on:click.native="getUser(pagination.current_page,userSearch)"
                                 :offset="4">
                </vue-pagination>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
</template>
<script>
import { mapState, mapGetters } from 'vuex'
export default {
    name: 'admusuarios',
    data () {
      return {

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

        dataAtributos: {
          profile_id:null,
          enabled:null
        },

        userSearch : '',
        errors:[]             
      }
    },
    created(){
      this.show = true;
      this.$store.dispatch('LOAD_PROFILES_LIST')
      this.$store.dispatch('LOAD_USERS_LIST', { page: this.pagination.current_page , search:this.userSearch }).then(() => {
        this.pagination = this.users_paginate
        this.show = false
      })  
    },
    computed: {
        ...mapState([ 'users','users_paginate','profiles']),
    }, 
    methods: {
      getUser: function(vpage,vsearch){
        this.show = true
        this.$store.dispatch('LOAD_USERS_LIST', { page: vpage, search: vsearch }).then(() => {
          this.pagination = this.users_paginate
          this.show = false
        }) 
      },
      updateAtributos: function(id,perf,acce){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Actualizar este atributo ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = '/api/employees/updateattribute/'+id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            if(perf != null){
              this.dataAtributos.profile_id = perf
              this.dataAtributos.enabled = null
            }
            if(acce != null){
              if(acce == true){
                this.dataAtributos.enabled = 0
              }else{
                this.dataAtributos.enabled = 1
              }
              this.dataAtributos.profile_id = null
            }            
            axios.put(url, this.dataAtributos).then(response => {
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
              toastr.success('se actualizaron los datos correctamente');
              dialog.close();
              this.$store.dispatch('LOAD_USERS_LIST', { page: this.pagination.current_page , search:this.userSearch }).then(() => {
                this.pagination = this.users_paginate
                this.show = false
              })               
            }).catch(error => {
              this.errors = error.response.data.status;
              toastr.error("Hubo un error en el proceso: "+this.errors);
              console.log(error.response.status);
              dialog.close();
            });
        	})
          .catch(() => {
              this.$store.dispatch('LOAD_USERS_LIST', { page: this.pagination.current_page , search:this.userSearch }).then(() => {
                this.pagination = this.users_paginate
                this.show = false
              })             
              console.log('Delete aborted');
          });
      }, 
      processDelete(id){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Eliminar este usuario ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = '/api/users/' + id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.$store.dispatch('LOAD_USERS_LIST', { page: this.pagination.current_page , search:this.userSearch }).then(() => {
                this.pagination = this.users_paginate
                this.show = false
              }) 
              toastr.success('Usuario Eliminado correctamente');
              dialog.close();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },                         
    }       
}
</script>
