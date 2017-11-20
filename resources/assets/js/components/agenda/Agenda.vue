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
        </div>
      </div>
    </div>
    <!-- /.content calendar -->
    <!-- modal citas -->
    <div class="modal fade" id="mymodal_cita" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content bg-light">
          <div class="modal-header alert-info pb-5">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Registro de Citas</h4>
          </div>
          <div class="modal-body">
            <!-- form de citas medicas -->
            <div class="container-fluid">

              <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createMedic">
                  <div class="form-body">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Paciente <span class="asterisk">*</span></label>
                          <input id="hero-demo" autofocus type="text" name="q" placeholder="Programming languages ..." style="width:100%;max-width:600px;outline:0">
                      </div><!-- /.form-group -->
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Medico <span class="asterisk">*</span></label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control input-sm" name="patient_lastname" required>
                          </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Tratamiento <span class="asterisk">*</span></label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control input-sm" name="patient_lastname" required>
                          </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="horafin2" class="control-label">Hora Final</label>
                        <div id="horafin2">
                          <select name="horaini" class="form-control">
                            <option value=""> --- </option>
                            <!--<option v-for="hora in horafinalBy" :value="hora.id">{{ hora.name }}</option>-->
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Duracion <span class="asterisk">*</span></label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control input-sm" name="patient_dni" maxlength="2" required>
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
            <!-- /. form de atencion medica -->
          </div>
        </div>
      </div>
    </div>
    <!-- /. modal -->
  </div>
  <!-- /page content -->
</template>
<script>
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'

export default {
    name: 'agenda',
    created(){
      this.$store.dispatch('LOAD_QUOTES_MEDICS_LIST', { medic_id: null });
    },
    mounted() {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          defaultDate: new Date(),
          allDaySlot: false,
          slotDuration: '00:15:00',
          minTime:'03:00:00',
          maxTime:'20:00:00',
          nowIndicator: true,
          slotEventOverlap: false,
          locale: 'es',
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectHelper: true,
          select: function(start, end) {
            $('#mymodal_cita').modal('show');
            /*var title = prompt('Event Title:');
            var eventData;
            if (title) {
              eventData = {
                title: title,
                start: start,
                end: end
              };
              $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
            }*/
            $('#calendar').fullCalendar('unselect');
          },
          eventRender: function(event,element){
            var el = element.html();
            element.html("<div style='width:90%;float:left;'>" +  el + "</div><div style='text-align:right;display:inline-block;width:9%;' class='delet'>X</div>");
            element.find('.delet').click(function(){
              alert(event.id);
            });
          },
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: [
            {
              title: 'All Day Event',
              start: '2017-05-01'
            },
            {
              title: 'Long Event',
              start: '2017-05-07',
              end: '2017-05-10'
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: '2017-05-09T16:00:00'
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: '2017-05-16T16:00:00'
            },
            {
              title: 'Conference',
              start: '2017-05-11',
              end: '2017-05-13'
            },
            {
              title: 'Meeting',
              start: '2017-05-12T10:30:00',
              end: '2017-05-12T12:30:00'
            },
            {
              title: 'Lunch',
              start: '2017-05-12T12:00:00'
            },
            {
              title: 'Meeting',
              start: '2017-05-12T14:30:00'
            },
            {
              title: 'Happy Hour',
              start: '2017-05-12T17:30:00'
            },
            {
              title: 'Dinner',
              start: '2017-05-12T20:00:00'
            },
            {
              title: 'Birthday Party',
              start: '2017-05-13T07:00:00'
            },
            {
              title: 'Click for Google',
              url: 'http://google.com/',
              start: '2017-05-28'
            }
          ]
        });
        $('#calendar').fullCalendar('option', 'locale', 'es');
    },
    data () {
      return {
        dato:[],
      }
    },
    computed: {
        ...mapState([ 'quotes']),
    }

}
</script>
