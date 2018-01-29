<template>
    <!-- page content -->
    <div class="right_col" role="main" >
      <!-- top tiles -->
      <div class="header-content">
        <h2><i class="fa fa-home"></i> Dashboard <span>Inicio</span></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">Estas en:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a data-ng-href="#">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
      </div>
      <br/>
      <div class="x_panel">
        <div class="x_content">
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <img src="images/logo-medium.jpg" alt="" class="img-logo img-responsive center-block">
            </div>

          </div>
          <br/>
          <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-calendar-o fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge">{{ day }}</div>
                                  <div>{{ mounth }} del {{ year }}</div>
                              </div>
                          </div>
                      </div>
                      <div class="panel-footer">
                          <span class="pull-left"><i class="fa fa-clock-o"></i> Hora Actual</span>
                          <span id="liveclock" class="pull-right">{{ hours }}:{{ minutes }}:{{ seconds }} {{ hourtime }}</span>
                          <div class="clearfix"></div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-green">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-money fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge" v-if="diffExchange == 0">{{ SearchExchange.valor }}</div>
                                  <div class="huge" style="color:#d9534f" v-if="diffExchange > 0">{{ SearchExchange.valor }}</div>
                                  <div>Soles</div>
                              </div>
                          </div>
                      </div>
                      <div class="panel-footer">
                          <span class="pull-left">Tipo de Cambio </span>
                          <span class="pull-right" style="color:#d9534f" v-if="diffExchange == 1"><strong>Hace {{ diffExchange }} dia</strong></span>
                          <span class="pull-right" style="color:#d9534f" v-if="diffExchange > 1"><strong> Hace {{ diffExchange }} dias</strong></span>
                          <span class="pull-right" v-if="diffExchange == 0">Hoy</span>
                          <div class="clearfix"></div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-yellow">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-pencil-square-o fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge">12</div>
                                  <div>Tareas Pendientes</div>
                              </div>
                          </div>
                      </div>
                      <a href="#" @click.prevent="$modal.show('tareas')">
                          <div class="panel-footer">
                              <span class="pull-left">Ver Detalle</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-red">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-medkit fa-5x"></i>
                              </div>
                              <div class="col-xs-9 text-right">
                                  <div class="huge">3</div>
                                  <div>Campañas</div>
                              </div>
                          </div>
                      </div>
                      <a href="#" onclick="alert('VARICEN - LISTADO');">
                          <div class="panel-footer">
                              <span class="pull-left">Ver Detalle</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <!-- /.row -->
          <!-- /top tiles -->

          <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-violeta">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user-md fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">4</div>
                                <div>Especialistas</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="alert('VARICEN - LISTADO');">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-violeta">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-street-view fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">120</div>
                                <div>Pacientes</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="alert('VARICEN - LISTADO');">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
<!--             <div class="col-lg-3 col-md-6">
                <div class="panel panel-violeta">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>Citas Programadas</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="alert('VARICEN - LISTADO');">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-violeta">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-birthday-cake fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">3</div>
                                <div>Cumpleaños</div>
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="alert('VARICEN - LISTADO');">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
          </div><!-- fin row -->
        </div><!-- fin x_content-->
      </div><!-- fin x_panel-->

      <modal name="tareas" :width="'50%'" :height="'auto'" :scrollable="true" :clickToClose="false">
        <!-- form de registro de pacientes -->
        <div class="container">
            <div class="row title-form">
                <h3 class="pull-left h3-title">Tareas Pendientes</h3>
                <div class="pull-right close-form" @click="$modal.hide('tareas')"><i class="fa fa-close"></i></div>                
            </div>
            <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="createPatient">
                <div class="form-body">
                    <div class="col-md-12 pt-20">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title" width="40%">Asignado por </th>
                                        <th class="column-title" width="30%">Titulo </th>
                                        <th class="column-title" width="15%">Fecha</th>
                                        <th class="column-title" width="15%">Estado</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="even pointer">
                                        <td class=" " >Ernesto Cota</td>
                                        <td class=" ">Contactar Paciente Fernandez</td>
                                        <td class=" ">13-01-2018</td>
                                        <td class=" ">PENDIENTE </td>
                                    </tr>

                                </tbody>
                                </table>                
                            </div>
                        </div><!-- /.form-group -->                                                                                                                                               
                    </div>
                </div><!-- /.form-body -->
                <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                    <div class="pull-right pr-10">
                        <button type="button" class="btn btn-danger active" @click="$modal.hide('tareas')"><i class="fa fa-reply-all"></i> Cerrar</button>
<!--                         <button type="submit" class="btn btn-primary active"><i class="fa fa-cloud-upload"></i> Grabar</button>
 -->                    </div>
                </div><!-- /.form-footer -->
            </form>
        </div>
        <!-- /. form de registro de pacientes -->
      </modal>

    </div>
    <!-- /page content -->
</template>
<script>
import { mapState , mapGetters } from 'vuex'
import { getHourTime, getZeroPad , getFullMount } from './filters'
    export default {
        name: 'dashboard',
        data () {
          return {
            hours: '',
            minutes: '',
            seconds: '',
            hourtime: '',
            day:'',
            mounth: '',
            year: ''              
          }
        },
        created(){
            this.$store.dispatch('LOAD_EXCHANGE_RATE_LIST', { page: 1 })
        },
        mounted() {
            setInterval(this.updateDateTime, 1000)           
        },
        computed: {
            ...mapState(['exchangerates','user_system']),
            SearchExchange: function(){
                return this.exchangerates[0]
            },
            diffExchange: function(){
                var fec1 = moment(this.exchangerates[0].fecha).format("YYYY-MM-DD")
                var fec2 = moment().format("YYYY-MM-DD")
                return moment(fec2).diff(fec1,'days')
            },             
        },
        methods: {              
            updateDateTime () {
                let now = new Date()
                this.hours = now.getHours()
                this.minutes = getZeroPad(now.getMinutes())
                this.seconds = getZeroPad(now.getSeconds())
                this.hourtime = getHourTime(this.hours)
                this.hours = this.hours % 12 || 12
                this.day = now.getDate()
                this.mounth = getFullMount(now.getMonth())
                this.year = now.getFullYear()
            }          
        }       

    }
</script>
<style scoped>
  .title-form {
    background-color: #347c7c;
    color: white;
    margin:0;
    padding:0
  }

  .h3-title {
    margin:10px 0 10px 20px;
  }

  .close-form {
    margin:15px;
    border-radius: 50%;
    cursor: pointer;
  }

  .img-thumbs {
    max-width: 35px;
  }

  .separator {
    border-top: 1px solid #CCC7B8;
  }

  input.mayusculas{
    text-transform:uppercase;
  }   

</style>
