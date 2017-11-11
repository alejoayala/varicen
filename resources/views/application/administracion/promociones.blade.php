@extends('admin.template.main')

@section('content')

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
          </div>
        </div>
      </div>
      <!-- /.content calendar -->
    </div>
    <!-- /page content -->

@endsection

@section('modal')
    <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
@endsection

@section('scripts')
    <script>

    	$(document).ready(function() {

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

    	});

    </script>

@endsection
