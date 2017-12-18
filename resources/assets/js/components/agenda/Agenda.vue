<template>
  <!-- page content -->
  <div class="right_col" role="main" >

    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-calendar-o"></i> Agenda <span>Control de Citas</span></h2>
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
                  <a href="#">Agenda</a>
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
              <h2>Control de Citas <small>Pacientes</small></h2>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div id='calendar'></div>

            </div>
          </div>
          <!--modal citas-->
          <div class="modal fade" id="mymodal_cita" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-light">
                <div class="modal-header alert-info pb-5">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Registro de Citas</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                      <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createQuote">
                          <div class="form-body">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Paciente <span class="asterisk">*</span></label>
                                  <div class="col-sm-9">
                                      <autocomplete :suggestions="patientlist" v-model="selection" placeholder="Buscar Paciente" :minlength = 3 @loadID="loadIDPatient"></autocomplete>
                                  </div>
                              </div><!-- /.form-group -->
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Medico <span class="asterisk">*</span></label>
                                  <div class="col-sm-9">
                                      <autocomplete :suggestions="getMedicsAutocomplete" v-model="selectionMedico" placeholder="Buscar Medico" :minlength = 3 @loadID="loadIDMedic"></autocomplete>
                                  </div>
                              </div><!-- /.form-group -->
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Tratamiento <span class="asterisk">*</span></label>
                                  <div class="col-sm-9">
                                      <autocomplete :suggestions="typetreatmentlist" v-model="selectionTypetreatment" placeholder="Buscar Tipo Tratamiento" :minlength = 3 @loadID="loadIDTypetreatment"></autocomplete>
                                  </div>
                              </div><!-- /.form-group -->
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Duracion: </label>
                                  <div class="col-sm-9">
                                      <label class="col-sm-12 pl-0 pt-10">De: {{ dataQuote.start | formatfecha }} A: {{ dataQuote.end | formatfecha }}</label>
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
          <!--Modal ShowCita-->
          <div class="modal fade" id="mymodal_showcita" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-light">
                <div class="modal-header alert-info pb-5">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Detalle de la Cita</h4>
                </div>
                <div class="modal-body">
                  <!-- form de citas medicas -->
                  <div class="container-fluid">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Paciente </label>
                            <div class="col-sm-9">
                                <input type="text" class="col-sm-12 mb-10" v-model="showQuote.patient">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group mb-10">
                            <label class="col-sm-3 control-label">Medico </label>
                            <div class="col-sm-9">
                                <input type="text" class="col-sm-12 mb-10" v-model="showQuote.medico">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group mb-10">
                            <label class="col-sm-3 control-label">Tratamiento </label>
                            <div class="col-sm-9">
                                <input type="text" class="col-sm-12 mb-10" v-model="showQuote.typetreatment">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Duración: </label>
                            <div class="col-sm-9">
                                <label class="col-sm-12 control-label pl-0">De: {{ showQuote.hourini }} A: {{ showQuote.hourfin }}</label>
                            </div>
                        </div><!-- /.form-group -->
                    </div><!-- /.form-body -->
                    <hr />
                    <div class="form-footer mt-10">
                        <div class="col-sm-offset-3 pull-right">
                            <button type="button" class="btn btn-danger" @click.prevent="processDelete">Eliminar</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div><!-- /.form-footer -->
                  </div>
                  <!-- /. form de atencion medica -->
                </div>
              </div>
            </div>
          </div>
          <!--/. Modal-->
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
import { mapState, mapGetters } from 'vuex'
import Autocomplete from '../utils/Autocomplete'

export default {
    name: 'agenda',
    created(){
        //this.$store.dispatch('LOAD_QUOTES_MEDICS_LIST', { medic_id: null });
        //this.$store.dispatch('LOAD_QUOTES_LIST');
        this.$store.dispatch('LOAD_PATIENTS_AUTOCOMPLETE_LIST');
        this.$store.dispatch('LOAD_EMPLOYEES_AUTOCOMPLETE_LIST');
        this.$store.dispatch('LOAD_TYPETREATMENTS_AUTOCOMPLETE_LIST');
    },
    mounted() {
        this.LoadQuotes();
        //this.show = false;      
    },
    computed: {
        //...mapState([ 'quotes','quotesMedicos','patientlist','typetreatmentlist']),
        ...mapState([ 'patientlist','typetreatmentlist']),        
        ...mapGetters(['getMedicsAutocomplete'])
    },
    watch: {
        patientlist: function(newVal) {
            if (newVal.length > 0) {
                //this.show = false;
            }
        }
    },    
    data () {
      return {

        show: false,
        label: 'Cargando...',
        overlay: true,

        selection: '',
        selectionMedico:'',
        selectionTypetreatment:'',
        start:'',
        end:'',
        showCalendar: false,
        dataQuote:{
          employee_id:1,
          medic_id:'',
          patient_id:'',
          typetreatment_id:'',
          datequotes:'',
          start:'',
          end:'',
          statusquo_id:1,
          duracion:0
        },
        showQuote:{
          id:'',
          medico:'',
          patient:'',
          typetreatment:'',
          datequotes:'',
          hourini:'',
          hourfin:''
        },
        errors:[]
      }
    },

    components: {
      Autocomplete
    },
    methods: {
      LoadQuotes: function(){
        //this.show = true;
        var self = this;
        $('#calendar').fullCalendar('destroy');
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'agendaWeek,agendaDay'
          },
          defaultView: 'agendaWeek',
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
                self.dataQuote = {
                    employee_id:1,
                    medic_id:'',
                    patient_id:'',
                    typetreatment_id:'',
                    datequotes:'',
                    start:'',
                    end:'',
                    statusquo_id:1,
                    duracion:0
                }         
                self.selection = '';
                self.selectionMedico = '';
                self.selectionTypetreatment = '';           
                self.dataQuote.start = moment(start).format("YYYY-MM-DD hh:mm:ss" );
                self.dataQuote.end = moment(end).format("YYYY-MM-DD hh:mm:ss");
                self.dataQuote.datequotes = moment(start).format("YYYY-MM-DD");

                $('#mymodal_cita').modal({ backdrop: 'static', keyboard: false });

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
              $('#mymodal_showcita').modal({backdrop: 'static', keyboard: false});

          },
          editable: true,
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
          events: 'api/quotes'//this.quotes
          //events: 'http://localhost:8000/api/quotes'//this.quotes
        });  
      },
      createQuote: function(){
        var url = 'api/quotes';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, this.dataQuote).then(response => {
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
          this.LoadQuotes();
          $('#mymodal_cita').modal('hide');
          toastr.success('Nueva Cita creada con exito');                    
        }).catch(error => {
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      processDelete(){
        this.$dialog.confirm("<span style='color:red'><strong>¿ Desea Eliminar esta Cita ?</strong></span>", {
            html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
            loader: true, // set to true if you want the dailog to show a loader after click on "proceed"
            reverse: false, // switch the button positions (left to right, and vise versa)
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            animation: 'fade', // Available: "zoom", "bounce", "fade"
            type: 'basic',
          })
        	.then((dialog) => {
            var url = 'api/quotes/' + this.showQuote.id;
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.delete(url).then(response=> {
              //this.$store.dispatch('LOAD_QUOTES_LIST');
              $('#mymodal_showcita').modal('hide');
              toastr.success('Cita Eliminada correctamente');
              dialog.close();
              this.LoadQuotes();
            });
        	})
          .catch(() => {
              console.log('Delete aborted');
          });
      },
      loadIDPatient: function(value){
        this.dataQuote.patient_id = value;
      },
      loadIDMedic: function(value){
        this.dataQuote.medic_id = value;
      },
      loadIDTypetreatment: function(value){
        this.dataQuote.typetreatment_id = value;
      },
      updateQuotes: function(){
        console.log("render ...");
        $('#calendar').fullCalendar('render');
      },
      loadQuotes: function(){
        console.log("cargando....");
        var self = this;


        $('#calendar').fullCalendar('option', 'locale', 'es');
        //self.show = false;
      }
    },
    filters:{
      formatfecha: function(value){
        if(!value) return ''
        value = value.toString()
        return value.substring(11);
      }
    }

}
</script>
