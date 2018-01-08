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
                      <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createQuote">
                          <div class="form-body">

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
                                <label class="col-sm-3 control-label">Medicos <span class="asterisk">*</span></label>
                                <div class="col-sm-9">
                                    <autocomplete :suggestions="getMedicsAutocomplete" v-model="selectionMedico" placeholder="Buscar Medico" :minlength = 3 @loadID="loadIDMedic"></autocomplete>
                                </div>
                            </div><!-- /.form-group -->
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
import { mapState, mapGetters } from 'vuex'
import { BasicSelect } from 'vue-search-select'
import MaskedInput from 'vue-masked-input'
import Autocomplete from '../utils/Autocomplete'
export default {
    name: 'admpromociones',
    data () {
      return {
        searchText: '', // If value is falsy, reset searchText & searchItem
        item_doc: { value: '', text: ''},
        item_cap: { value: '', text: ''},
        item_dpto: { value: '', text: ''},
        item_prov: { value: '', text: ''},
        item_dist: { value: '', text: ''},

        selection: '',
        selectionMedico:'',

        show: false,
        label: 'Cargando...',
        overlay: true,   

        coddep:'',
        codpro:'',

        dataBell: {
            dateini:'',
            start:'',
            datefin:'',
            end:'',
            hourini1_id:1,
            hourfin1_id:1,
            hourini2_id:1,
            hourfin2_id:1,
            ubigeo_id:0,
            description:'',
            user_id:''
        },
        dataDetBell: {
            employee_id:[]
        }

      }
    },
    mounted() {
        this.LoadBells();    
    },  
    computed: {
        //...mapState([ 'patientlist','typetreatmentlist']),        
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
      Autocomplete,
      MaskedInput ,
      BasicSelect      
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
                self.dataBell = {
                    dateini:'',
                    start:'',
                    datefin:'',
                    end:'',
                    hourini1_id:1,
                    hourfin1_id:1,
                    hourini2_id:1,
                    hourfin2_id:1,
                    ubigeo_id:0,
                    description:'',
                    user_id:''
                }         
                self.selection = '';
                self.selectionMedico = '';          
                self.dataBell.start = moment(start).format("YYYY-MM-DD hh:mm:ss" );
                self.dataBell.end = moment(end).format("YYYY-MM-DD hh:mm:ss");
                //self.dataBell.datequotes = moment(start).format("YYYY-MM-DD");

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
              var horini = $.fullCalendar.moment(calEvent.start).format('hh:mm:ss');
              var horfin = $.fullCalendar.moment(calEvent.end).format('hh:mm:ss');              
              self.showQuote.id = calEvent.id;
              self.showQuote.patient = calEvent.patient.patient.toUpperCase();
              self.showQuote.medico = calEvent.medic.name.toUpperCase() + ' ' + calEvent.medic.lastname.toUpperCase();
              self.showQuote.typetreatment = calEvent.typetreatment.name;
              self.showQuote.hourini = horini;
              self.showQuote.hourfin = horfin;
              $('#mymodal_showBell').modal({backdrop: 'static', keyboard: false});

          },
          editable: true,
          eventDrop: function(event, delta , revertFunc) {       // ARRASTRAR Y ACTUALIZAR EVENTO EN LA TABLA
                self.dataQuote.start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD hh:mm:ss");
                self.dataQuote.end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD hh:mm:ss");

                var url = 'api/quotes/'+ event.id;
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                axios.put(url, self.dataQuote).then(response => {
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
                    toastr.success('Cita Actualizada con exito');                    
                }).catch(error => {
                    revertFunc();
                    self.errors = error.response.data.status;
                    toastr.error("Hubo un error en el proceso: "+self.errors);
                });
          },
          eventResize: function(event, delta, revertFunc) {          // AGRANDAR ACHICAR Y ACTUALIZAR EVENTO EN LA TABLA
                self.dataQuote.start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD hh:mm:ss");
                self.dataQuote.end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD hh:mm:ss");

                var url = 'api/quotes/'+ event.id;
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                axios.put(url, self.dataQuote).then(response => {
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
                    toastr.success('Cita Actualizada con exito');                    
                }).catch(error => {
                    revertFunc();
                    self.errors = error.response.data.status;
                    toastr.error("Hubo un error en el proceso: "+self.errors);
                });
          },          
          eventLimit: true, // allow "more" link when too many events
          events: 'api/bells'//this.quotes
          //events: 'http://localhost:8000/api/quotes'//this.quotes
        });  
      }, 
      loadIDMedic: function(value){
        this.dataDetBell.employee_id = value;
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
        this.dataBell.ubigeo_id = item_dist.value
      },
      resetDist () {
        this.item_dist = {}
        this.dataBell.ubigeo_id = ''
      },                                      
      

    }
}
</script>
