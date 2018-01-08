<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-user"></i> Tipo de Cambio <span>Historial General</span></h2>
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
                  <a href="#">Tipo Cambio</a>
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
                <div class="pull-right" v-if="!SearchExchange">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><i class="fa fa-user"></i> Nuevo Valor</button>
                </div>
                <div class="title_left">
                  <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar Fecha...">
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
                      <th class="column-title" width="30%">Fecha </th>
                      <th class="column-title" width="50%">Tipo Cambio </th>
                      <th class="column-title no-link last" width="20%"><span class="nobr">Acción</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="even pointer" v-for="Exchange in exchangerates" :key="Exchange.id">
                      <td class=" ">{{ Exchange.fecha | reversefecha }}</td>
                      <td class=" ">{{ Exchange.valor }}</td>
                      <td class=" last">
                        <span data-toggle="tooltip" title="" data-original-title="Editar">
                          <button type="button" class="btn btn-primary btn-xs" @click.prevent="processEdit(Exchange)"><i class="fa fa-pencil"></i></button>
                        </span>
                        <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                          <button type="button" class="btn btn-danger btn-xs" @click.prevent="processDelete(Exchange.id)"><i class="fa fa-trash-o"></i></button>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <vue-pagination  v-bind:pagination="pagination"
                                 v-on:click.native="getExchangeRate"
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
                  <h4 class="modal-title" id="myModalLabel">Registro de Tipo Cambio</h4>
                </div>
                <div class="modal-body">
                  <!-- form de atencion medica -->
                  <div class="container-fluid">
                    <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                        <div class="form-body">
                            <div class="form-group text-center">
                                <label class="col-sm-12">{{ fecha }}</label>
                            </div><!-- /.form-group -->                          
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Valor: <span class="asterisk">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" name="tipo_cambio" v-model="dataTipo.valor">
                                </div>
                            </div><!-- /.form-group -->

                        </div><!-- /.form-body -->
                    </form>
                  </div>
                  <!-- /. form de atencion medica -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary active" :disabled="ShowIcon" @click.prevent="ActionExchangeRate"><i v-show="ShowIcon" :class="[IconClass]"></i> {{ labelButton }}</button>                  
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
import { mapState , mapGetters } from 'vuex'
import { getFullMount ,getFullDay } from '../utils/filters'
export default {
    name: 'contipocambio',
    data () {
      return {
        IconClass : 'fa fa-cloud-upload',
        ShowIcon : false,
        labelButton: 'Grabar Datos',   

        listExchangeRates:[],

        show: false,
        label: 'Cargando...',
        overlay: true,

        dataTipo : {
          valor :'',
          fecha: moment().format('YYYY-MM-DD'),
          user_id:''
        },

        pagination: {
            total: 0,
            per_page: 5,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,

        fecha: ''
      }
    },
    computed: {
        ...mapState([ 'exchangerates' ,'exchangerates_paginate','user_system']),
        SearchExchange: function(){
            return this.exchangerates.find((item) => item.fecha == moment().format('YYYY-MM-DD'))
        }        
    },    
    created() {
      this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page });
    },
    mounted(){
      this.show = true;
      this.pagination = this.exchangerates_paginate
      this.dataTipo.user_id = this.user_system.user.id
    },
    methods: {
      LoadForm: function(){
        let now = new Date()
        this.fecha = getFullDay(now.getDay()) + ', ' + now.getDate() + ' ' + getFullMount(now.getMonth()) + ' del ' + now.getFullYear()

        this.dataTipo = {
          valor :'',
          fecha: moment().format('YYYY-MM-DD'),
          user_id:''
        }
      },
      ActionExchangeRate: function(){
        if(this.dataTipo.id === 'undefined'){
          this.createExchangeRate()
        }else{
          this.updateExchangeRate()
        }
      },      
      processEdit(tip){
        var dattip = []
        dattip = _.clone(tip)
        let now = new Date(Date.parse(dattip.fecha))
        
        this.fecha = getFullDay(now.getDay()) + ', ' + now.getDate() + ' ' + getFullMount(now.getMonth()) + ' del ' + now.getFullYear()

        this.dataTipo = dattip
      
        $('#mymodal').modal('show');
      
      },  
      getExchangeRate : function(){
          this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
      },         
      createExchangeRate: function(){
        var url = '/api/exchangerates';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        this.ShowIcon = true
        this.IconClass = 'fa fa-circle-o-notch fa-spin'
        this.labelButton = 'Procesando'        
        axios.post(url, this.dataTipo).then(response => {
          if(typeof(response.data.errors) != "undefined"){
              this.errors = response.data.errors;
              var resultado = "";
              for (var i in this.errors) {
                if (this.errors.hasOwnProperty(i)) {
                    resultado += "error -> " + i + " = " + this.errors[i] + "\n"
                }
              }
              toastr.error(resultado);
              return;
          }
          this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
          this.errors = []
          this.ShowIcon = false
          this.IconClass = 'fa fa-cloud-upload'
          this.labelButton = 'Grabar Datos'              
          $('#mymodal').modal('hide');
          toastr.success('Nuevo Tipo de cambio creado con exito')
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors)
          console.log(error.response.status);
        });
      },
      updateExchangeRate: function(){
        var url = '/api/exchangerates/'+ this.dataTipo.id
        toastr.options.closeButton = true
        toastr.options.progressBar = true
        this.ShowIcon = true
        this.IconClass = 'fa fa-circle-o-notch fa-spin'
        this.labelButton = 'Procesando' 
        console.log("dataTipo: ",this.dataTipo)       
        axios.put(url, this.dataTipo).then(response => {
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
          this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
          this.errors = []
          this.ShowIcon = false
          this.IconClass = 'fa fa-cloud-upload'
          this.labelButton = 'Grabar Datos'              
          $('#mymodal').modal('hide');
          toastr.success('Tipo de cambio actualizado con exito')
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors)
          console.log(error.response.status)
        });
      },
      processDelete(id){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Eliminar este Dato ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = '/api/exchangerates/' + id
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: this.pagination.current_page })
              toastr.success('Dato Eliminado correctamente');
              dialog.close();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },            
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
