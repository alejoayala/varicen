<script type='text/javascript'>
    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            weekMode: 'liquid',
            header: {
                left:   'prev,next today',
                center: 'title',
                right:  'month,agendaWeek,agendaDay'
            },

            events: "fullcalendar/fullcalendar/events.php",
            // Convert the allDay from string to boolean
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },

            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {      // AGREGAR EVENTO A LA TABLA Y AL FULLCALENDAR
                var title = prompt('Event Title:');
                var url = prompt('Type Event url, if exits:');
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
                    $.ajax({
                            url: 'fullcalendar/fullcalendar/add_events.php',
                            data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
                            type: "POST",
                            success: function(json) {
                                    alert('Added Successfully');
                            }
                    })

                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            editable: true,
            eventDrop: function(event, delta) {       // ARRASTRAR Y ACTUALIZAR EVENTO EN LA TABLA
                var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                $.ajax({
                        url: 'fullcalendar/fullcalendar/update_events.php',
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                        type: "POST",
                        success: function(json) {
                            alert("Updated Successfully");
                        }
                });
            },
            eventResize: function(event) {          // AGRANDAR ACHICAR Y ACTUALIZAR EVENTO EN LA TABLA
                var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                $.ajax({
                        url: 'fullcalendar/fullcalendar/update_events.php',
                        data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                        type: "POST",
                        success: function(json) {
                            alert("Updated Successfully");
                        }
                });
            },
            eventClick: function(event) {           // ELIMINAR EL EVENTO EN LA TABLA Y EN EL FULLCALENDAR
                var decision = confirm("Do you really want to delete this Event?");
                if (decision==true) {
                    $.ajax({
                        url: 'fullcalendar/fullcalendar/delete_events.php',
                        data: '&id=' + event.id,
                        type: "POST",
                        success: function (json) {
                            alert("Removed Succesfully");
                        }
                    });
                    $('#calendar').fullCalendar('removeEvents', event.id);
                } 
            }
        });
    });
</script>


            <!-- /.content calendar -->
            <!--modal citas-- >
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

                                <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on: submit.prevent="createQuote">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Paciente <span class="asterisk">*</span></label>
                                            <div class="col-sm-9">
                                                <autocomplete : suggestions="patientlist" v-model="selection" placeholder="Buscar Paciente" :minlength = 3 @loadID="loadIDPatient"></autocomplete>
                                            </div>

                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Medico <span class="asterisk">*</span></label>
                                            <div class="col-sm-9">
                                                <autocomplete : suggestions="getMedicsAutocomplete" v-model="selectionMedico" placeholder="Buscar Medico" :minlength = 3 @loadID="loadIDMedic"></autocomplete>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tratamiento <span class="asterisk">*</span></label>
                                            <div class="col-sm-9">
                                                <autocomplete : suggestions="typetreatmentlist" v-model="selectionTypetreatment" placeholder="Buscar Tipo Tratamiento" :minlength = 3 @loadID="loadIDTypetreatment"></autocomplete>
                                            </div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Duracion: </label>
                                            <div class="col-sm-9">
                                                <label class="col-sm-12 pl-0 pt-10">De: {{ dataQuote.hourini | formatfecha }} A: {{ dataQuote.hourfin | formatfecha }}</label>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.form-body -->
                                    <hr />
                                    <div class="form-footer mt-10">
                                        <div class="col-sm-offset-3 pull-right">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Grabar</button>
                                            <!--<button type="button" class="btn btn-primary" @click.prevent="salvar">Test</button>-->
                                        </div>
                                    </div><!-- /.form-footer -->
                                </form>

                            </div >
                            <!-- /. form de atencion medica -->
                        </div >
                    </div >
                </div >
            </div >
            <!-- /. modal -->

    < !--modal Mostrar cita-- >
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
                                        <input type="text" class="col-sm-12 mb-10" v-model="showQuote.patient"></input>
                                    </div>

                                </div><!-- /.form-group -->
                      <div class="form-group mb-10">
                                    <label class="col-sm-3 control-label">Medico </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-12 mb-10" v-model="showQuote.medico"></input>
                                    </div>
                                </div><!-- /.form-group -->
                      <div class="form-group mb-10">
                                    <label class="col-sm-3 control-label">Tratamiento </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-12 mb-10" v-model="showQuote.typetreatment"></input>
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
    </div >
    < !-- /. modal -->


computed: {
    //...mapState([ 'quotes','quotesMedicos','patientlist','typetreatmentlist']),
    //...mapGetters(['getMedicsAutocomplete','getQuoteById'])
},
watch: {
    patientlist: function(newVal) {
        if (newVal.length > 0) {
            //this.loadQuotes();
        }
    }
},


$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaWeek,agendaDay'
    },
    defaultView: 'agendaWeek',
    slotLabelFormat: "HH:mm",
    defaultDate: new Date(),
    allDaySlot: false,
    slotDuration: '00:15:00',
    minTime: '08:00:00',
    maxTime: '20:00:00',
    nowIndicator: true,
    slotEventOverlap: false,
    locale: 'es',
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectHelper: true,
    select: function (start, end) {
        self.dataQuote.hourini = moment(start).format();
        self.dataQuote.hourfin = moment(end).format();
        self.dataQuote.datequotes = moment(start).format("YYYY-MM-DD");

        $('#mymodal_cita').modal({ backdrop: 'static', keyboard: false });
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
    eventRender: function (event, element) {
        var el = element.html();
        element.html("<div style='width:90%;float:left;'>" + el + "</div><div style='text-align:right;display:inline-block;width:9%;' class='delet'>X</div>");
        element.find('.delet').click(function () {
            alert(event.id);
        });
    },
    eventClick: function (calEvent, jsEvent, view) {
        console.log('description; ', self.getQuoteById(calEvent.id));
        var datquote = self.getQuoteById(calEvent.id);
        self.showQuote.id = calEvent.id;
        self.showQuote.patient = datquote.patient.patient.toUpperCase();
        self.showQuote.medico = datquote.medic.name.toUpperCase() + ' ' + datquote.medic.lastname.toUpperCase();
        self.showQuote.typetreatment = datquote.typetreatment.name;
        self.showQuote.hourini = datquote.start.substring(11);
        self.showQuote.hourfin = datquote.end.substring(11);
        $('#mymodal_showcita').modal({ backdrop: 'static', keyboard: false });
        //console.log("show: ",self.showQuote);
        //alert('Event: ' + calEvent.patient.name);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //alert('View: ' + view.name);

        // change the border color just for fun
        //$(this).css('border-color', 'red');

    },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: 'http://localhost:8000/api/quotes'//this.quotes
});



        <div class="col-md-12">
            <div class="col-md-2" style="border:1px solid red;">
                <img :src="image" class="img-responsive">
            </div>
            <div class="col-md-8" style="border:1px solid blue;">
                <input type="file" @change="onFileChange">
            </div>
            <div v-if="image" style="border:1px solid yellow;"> 
                <button @click.prevent="removeImage">Remove image</button>
            </div>
            <!--<div class="col-md-2">
                <button class="btn btn-success btn-block" @click="upload">Upload</button>
            </div>-->
        </div>