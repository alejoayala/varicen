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
  </div>
  <!-- /page content -->
</template>
<script>
export default {
    name: 'agenda',
    mounted() {

        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          defaultDate: '2017-05-12',
          locale: 'es',
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectHelper: true,
          select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
              eventData = {
                title: title,
                start: start,
                end: end
              };
              $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar').fullCalendar('unselect');
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
      return {}
    }
}
</script>
