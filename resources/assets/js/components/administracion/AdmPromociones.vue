<template>
  <!-- page content -->
  <div class="right_col" role="main" >

    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-calendar-o"></i> Campañas <span>Programación</span></h2>
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
                  <a href="#">Campañas</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ol>
      </div>
      <!-- /.breadcrumb-wrapper -->
    </div>
    <!-- /.header-content -->
    <br/>
    <!-- content calendar -->
    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Control de Campañas <small>Listado</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div id='calendar'></div>

            </div>
          </div>
          <!--modal citas-->
          <div class="modal fade" id="mymodal_bell" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-light">
                <div class="modal-header alert-info pb-5">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Registro de Campaña</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                      <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createBell">
                          <div class="form-body">

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-4">Departamento <span class="asterisk">*</span></label>
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
                                <label class="control-label col-md-4 col-sm-4 col-xs-4">Especialistas <span class="asterisk">*</span></label>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <multi-select :options="employeecombo"
                                                :selected-options="items_emp"
                                                placeholder="seleccione Empleado"
                                                @select="onSelectEmp">
                                    </multi-select>
                                </div>

                                <span class="glyphicon glyphicon-folder-open mt-5" style="font-size:20px" aria-hidden="true" v-if="!items_emp.text"></span>
                                <div class="col-md-1 col-sm-1" v-if="items_emp.text">
                                <button type="button" title="Borrar Opción" class="btn btn-danger btn-md pull-right" @click.prevent="resetEmp"><i class="fa fa-close"></i> </button>
                                </div>


                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-4">Observaciones </label>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <textarea class="form-control" rows="3" v-model="dataBell.description"></textarea>
                                </div>
                            </div>
                          </div><!-- /.form-body -->
                          <hr/>
                          <div class="form-footer mt-10">
                              <div class="col-sm-offset-3 pull-right">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                  <!--<button type="submit" class="btn btn-primary" v-if="!editing">Grabar</button>-->
                                  <button type="button" :disabled="ShowIcon" class="btn btn-primary active" v-if="!editing" @click.prevent="createBell"><i v-show="ShowIcon" class='fa fa-circle-o-notch fa-spin'></i> {{ labelButton }}</button>                                  
                                  <button type="button" class="btn btn-danger" v-if="editing" @click.prevent="processDelete" >Eliminar</button>
                                  
                              </div>
                          </div><!-- /.form-footer -->
                      </form>                        
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!--/. modal --> 


        </div>
      </div>
    </div>
    <!-- /.content calendar -->
  </div>
  <!-- /page content -->

</template>
<script>
import 'semantic-ui-icon/icon.min.css';
import _ from 'lodash'
import { mapState, mapGetters } from 'vuex'
import { MultiSelect } from 'vue-search-select'
import { BasicSelect } from 'vue-search-select'
import MaskedInput from 'vue-masked-input'
export default {
    name: 'admpromociones',
    data () {
      return {
        editing: false,  
        searchText: '', // If value is falsy, reset searchText & searchItem
        items_emp: [],
        lastSelectItem: {},

        ShowIcon : false,
        labelButton: 'Grabar Datos',

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

        dataBell: {
            dateini:'',
            start:'',
            datefin:'',
            end:'',
            hourini1_id:1,
            hourfin1_id:12,
            hourini2_id:13,
            hourfin2_id:24,
            ubigeo_id:0,
            description:'',
            user_id:''
        }
        //codigo_ubigeo:''

      }
    },
    mounted() {
        this.LoadBells();    
    },  
    computed: {
        ...mapState([ 'employeecombo','user_system']),        
        ...mapGetters(['getMedicsAutocomplete','getubigeos']),
        departamentosBy: function(){
            return this.getubigeos.filter((ubigeo) => ubigeo.codprov == '0').filter((ubigeo) => ubigeo.coddist == '0');
        },
        provinciasBy: function(){
            return this.getubigeos.filter((ubigeo) => ubigeo.coddpto == this.coddep).filter((ubigeo) => ubigeo.codprov != '0').filter((ubigeo) => ubigeo.coddist == '0');
        },
        distritosBy: function(){
            return this.getubigeos.filter((ubigeo) => ubigeo.coddpto == this.coddep).filter((ubigeo) => ubigeo.codprov == this.codpro).filter((ubigeo) => ubigeo.coddist != '0');
        },        
    },    
    components: {
      MaskedInput ,
      BasicSelect,
      MultiSelect      
    },    
    methods: {
      LoadBells: function(){
        var self = this;
        $('#calendar').fullCalendar('destroy');
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month' //'agendaWeek,agendaDay'
          },
          defaultView: 'month', //'agendaWeek',
          slotLabelFormat:"HH:mm",
          defaultDate: new Date(),
          allDaySlot: false,
          slotDuration: '00:15:00',
          minTime:'08:00:00',
          maxTime:'20:00:00',
          nowIndicator: true,
          slotEventOverlap: false,
          locale: 'es',
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectHelper: true,
          select: function (start, end) {
              //self.ClearForm();
                self.editing = false
                self.dataBell = {
                    dateini:'',
                    start:'',
                    datefin:'',
                    end:'',
                    hourini1_id:1,
                    hourfin1_id:12,
                    hourini2_id:13,
                    hourfin2_id:24,
                    ubigeo_id:0,
                    description:'',
                    user_id: self.user_system.user.id
                }        

                self.item_dpto = {}
                self.item_prov = {}
                self.item_dist = {} 
                self.items_emp = []
       
                self.dataBell.start = moment(start).format("YYYY-MM-DD" );
                self.dataBell.end = moment(end).subtract(1, 'days').format("YYYY-MM-DD" )
                //self.dataBell.end = moment(end).format("YYYY-MM-DD hh:mm:ss");
                $('#mymodal_bell').modal({ backdrop: 'static', keyboard: false });

                $('#calendar').fullCalendar('unselect');
          },          
          loading: function( isLoading, view ) {
              if(isLoading) {// isLoading gives boolean value
                self.show = true;
              } else {
                self.show = false;
              }
          },
          eventClick: function(calEvent, jsEvent, view) {
              self.editing = true
              self.item_dpto = {}
              self.item_prov = {}
              self.item_dist = {} 
              self.items_emp = []   

              _.forEach(calEvent.bellsdetails, function(value, key) {
                  self.items_emp.push(_.find(self.employeecombo, function(o) { return o.value == value.employee_id; }));
              });

              self.coddep = calEvent.ubigeo.coddpto;
              self.codpro = calEvent.ubigeo.codprov;
              self.coddis = calEvent.ubigeo.coddist;

              self.item_dpto = self.departamentosBy.find(depa => depa.coddpto == calEvent.ubigeo.coddpto)
              if(self.codpro != '0'){
                self.item_prov = self.provinciasBy.find(provi => provi.codprov == calEvent.ubigeo.codprov)
              }
              if(self.coddis != '0'){
                self.item_dist = self.distritosBy.find(dist => dist.coddist == calEvent.ubigeo.coddist)
              }
              //console.log("ubi: ",calEvent.ubigeo)
              self.dataBell.id = calEvent.id;
              self.dataBell.description = calEvent.description
              $('#mymodal_bell').modal({backdrop: 'static', keyboard: false});

          },
          editable: true,
          eventDrop: function(event, delta , revertFunc) {       // ARRASTRAR Y ACTUALIZAR EVENTO EN LA TABLA
                self.dataBell.start = moment(event.start).format("YYYY-MM-DD" );                
                self.dataBell.end = (event.end == null) ? self.dataBell.start : moment(event.end).format("YYYY-MM-DD" ) ;
                var url = '/api/bells/'+ event.id;
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                axios.put(url, self.dataBell).then(response => {
                    if(typeof(response.data.errors) != "undefined"){
                        self.errors = response.data.errors;
                        var resultado = "";
                        for (var i in this.errors) {
                            if (self.errors.hasOwnProperty(i)) {
                                resultado += "error -> " + i + " = " + self.errors[i] + "\n";
                            }
                        }
                        revertFunc();
                        toastr.error(resultado);
                        return;
                    }
                    self.errors = [];
                    toastr.success('Campaña Actualizada con exito');                    
                }).catch(error => {
                    revertFunc();
                    self.errors = error.response.data.status;
                    toastr.error("Hubo un error en el proceso: "+self.errors);
                });
          },         
          eventLimit: true, // allow "more" link when too many events
          events: '/api/bells'//this.quotes
          //events: 'http://localhost:8000/api/quotes'//this.quotes
        });  
      }, 
      createBell: function(){
        var url = '/api/bells';

        this.ShowIcon = true
        this.labelButton = 'Procesando'

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        if(this.id_dep != '0'){
            this.dataBell.ubigeo_id = this.id_dep
            if (this.id_pro != '0') {
                this.dataBell.ubigeo_id = this.id_pro
                if (this.id_dis != '0') {
                    this.dataBell.ubigeo_id = this.id_dis
                }
            }            
        } 
        axios.post(url, {
            bell: this.dataBell,
            detalle: this.items_emp
        }).then(response => {
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
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'

          this.errors = [];
          this.LoadBells();
          $('#mymodal_bell').modal('hide');
          toastr.success('Nueva Campaña creada con exito');                    
        }).catch(error => {
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'              
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },  
      processDelete(){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Eliminar esta Campaña ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = '/api/bells/' + this.dataBell.id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              //this.$store.dispatch('LOAD_QUOTES_LIST');
              this.LoadBells();
              $('#mymodal_bell').modal('hide');
              toastr.success('Campaña Eliminada correctamente');
              dialog.close();

            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },               
      loadIDMedic: function(value){
        this.dataDetBell.employee_id = value;
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
      },
      resetDist () {
        this.item_dist = {}
        this.id_dis = '0'
      },   
      
      onSelectEmp (items, lastSelectItem) {
        this.items_emp = items
        this.lastSelectItem = lastSelectItem
        console.log("seleccionados: ",this.items_emp)
      },
      // deselect option
      resetEmp () {
        this.items_emp = [] // reset
      },      
    }
}
</script>
<style scoped>

</style>

