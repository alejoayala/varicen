<template>
  <!-- Tabla de contenido -->
  <div class="col-lg-9 col-md-9 col-sm-8">
      <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                  <div class="page-title">
                    <div class="pull-right">
                      <!--<button class="btn btn-primary" data-toggle="modal" data-target="#mymodal_patient"><i class="fa fa-user"></i> Nuevo Paciente</button>-->
                      <button class="btn btn-success" @click.prevent="LoadAtencion"><i class="fa fa-folder-open"></i> Nuevo Tratamiento</button>
                      <a :href="'http://localhost:8000/api/pdf/'+idpaciente" target="_blank" class="btn btn-primary"> Reporte PDF</a>
                    </div>
                    <div class="title_left">
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar ...">
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
                          <th class="column-title" width="35%">Médico </th>
                          <th class="column-title" width="30%">Tratamiento </th>
                          <th class="column-title" width="20%">Fecha </th>
                          <th class="column-title no-link last" width="15%"><span class="nobr">Acción</span>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr class="even pointer" v-for="sale in sales_id_patient" :key="sale.id">
                          <td class=" "> {{ sale.employee.name }} {{ sale.employee.lastname }}</td>
                          <td class=" ">{{ sale.typetreatment.name }}</td>
                          <td class=" ">{{ sale.date_sale | reversefecha }}</td>
                          <td class=" last">
                            <span data-toggle="tooltip" title="" data-original-title="Ver Detalle">
                              <button type="button" class="btn btn-success btn-xs" @click.prevent="cargaSale(sale)"><i class="fa fa-eye"></i></button>
                            </span>
<!--                             <span data-toggle="tooltip" title="" data-original-title="Editar">
                              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-pencil"></i></button>
                            </span> -->
                            <span data-toggle="tooltip" title="" data-original-title="Eliminar">
                              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#mymodal"><i class="fa fa-trash-o"></i></button>
                            </span>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <!-- modal -->
            <modal name="historial" :width="'90%'" :height="'auto'" :scrollable="true" :clickToClose="false">
              <div class="container">
                <div class="row title-form">
                    <h3 class="pull-left h3-title">Registro de Atenciones</h3>
                    <div class="pull-right close-form" @click="$modal.hide('historial')"><i class="fa fa-close"></i></div>                
                </div>
                <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                    <div class="form-body p-10">
                        <div class="form-group">
                            <!-- Afecciones del Paciente -->
                            <div class="col-md-12 p-0 separator" v-if="patientByid.affections.length != 0" style="background-color:#669999;">
                              <div class="col-md-6 mt-5" style="color:white;"> 
                                  <div class="form-group">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-5">Condición Clínica </label>
                                      <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
                                          <ul class="list-unstyled">
                                            <li v-for="afeccion in patientByid.affections" :key="afeccion.id">
                                              <input :value="afeccion.id" v-model="afeccion.pivot.state" type="checkbox" disabled>{{ afeccion.abrev }}
                                            </li>
                                          </ul>
                                      </div> 
                                  </div><!-- /.form-group --> 
                              </div>
                              <div class="col-md-6 pt-10" style="color:white;">
                                <div class="form-group">
                                    <label class="pull-left">Observaciones </label>
                                    <div class="col-md-12 pl-0">
                                        <textarea class="form-control" rows="3" v-model="patientByid.observations" readonly></textarea>
                                    </div>                        
                                </div>
                              </div>                               
                            </div>
                            <div class="col-md-12 p-0 separator" v-if="patientByid.affections.length == 0" style="background-color:#669999;">
                              <div class="col-md-6 mt-5" style="color:white;"> 
                                  <div class="form-group">
                                      <label class="control-label col-md-5 col-sm-5 col-xs-5">Condición Clínica </label>
                                      <div class="col-md-7 col-sm-7 col-xs-7 mt-10">
                                          <ul class="list-unstyled">
                                            <li v-for="afeccion in afecciones" v-bind:key="afeccion.id">
                                              <input :value="afeccion.id" v-model="afeccion.checked" :id="afeccion.id" type="checkbox" disabled>{{ afeccion.name }}
                                            </li>
                                          </ul>                                          
                                      </div> 
                                  </div><!-- /.form-group --> 
                              </div>
                              <div class="col-md-6 pt-10" style="color:white;">
                                <div class="form-group">
                                    <label class="pull-left">Observaciones </label>
                                    <div class="col-md-12 pl-0">
                                        <textarea class="form-control" rows="3" v-model="patientByid.observations" readonly></textarea>
                                    </div>                        
                                </div>
                              </div>                               
                            </div>  
                        </div><!-- /.form-group -->
                        <div class="form-group contenedor content-flex pt-10 pr-10 pb-10" v-if="editing" v-for="attention in dataVenta.attentions" :key="attention.id">
                          <!-- Datos de la Atencion-->
                          <div class="col-md-9">
                              <div class="form-group">
                                <div class="col-md-3 borde">
                                  <label class="col-md-12 text-left pl-0"> Fecha :</label>
                                  <span> {{ attention.date_attention | reversefecha }} </span>
                                </div>
                                <div class="col-md-3 borde">
                                  <label class="col-md-12 text-left pl-0"> Medico : </label>
                                  <span>{{ dataVenta.employee.name }} {{ dataVenta.employee.lastname }}</span>
                                </div>
                                <div class="col-md-3 borde">
                                  <label class="col-md-12 text-left pl-0"> Tratamiento :</label>
                                  <span>{{ dataVenta.typetreatment.name }} </span>
                                </div>
                                <div class="col-md-3 borde">
                                  <label class="col-md-12 text-left pl-0"> Turno : </label>
                                  <span>{{ attention.turn }}</span>
                                </div> 
                                <div class="col-md-12 borde">
                                    <label for="" class="control-label"><strong> SYS : </strong>{{ attention.sys}}</label>
                                </div>
                                <div class="col-md-12 borde">
                                    <label for="" class="control-label"><strong> EXAMEN : </strong>{{ attention.exam}}</label>
                                </div>  
                                <div class="col-md-12 borde mb-0">
                                    <label for="" class="control-label"><strong> TRATAMIENTO : </strong>{{ attention.treatment}}</label> 
                                </div>                                                               
                              </div>

                          </div>
                          <!-- Pagos de la Atencion -->
                          <div class="col-md-3 borde mb-10">
                            <div class="form-group">
                              <div class="col-md-12">
                                <label class="control-label">Detalle de Pago</label>
                                <div v-for="payment in dataVenta.salesdetails" :key="payment.id">
                                  <label class="control-label">{{ payment.product.name}} - Costo: {{ payment.price }} </label><br/>
                                  <label class="control-label" v-for="pagos in payment.payments" :key="pagos.id">
                                    <span v-if="pagos.attention_id == attention.id">PAGO EFECTUADO : {{ pagos.rode }}</span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>                     
                        </div>
                        <div class="container" v-if="viewForm">                        
                            <!-- cabecera -->
                            <div class="form-group">
                              <div class="col-md-3 pl-0">
                                <label class="control-label">Fecha </label>
                                <div class="">
                                  <masked-input v-model="dataAttention.date_attention" mask="11/11/1111" placeholder="DD/MM/YYYY" />
                                </div>
                              </div>
                              <div class="col-md-3">
                                <label class="control-label">Medico <span class="asterisk">*</span></label>
                                <div class="">
                                    <autocomplete :suggestions="getMedicsAutocomplete" v-model="selectionMedico" placeholder="Buscar Medico" :minlength = 3 @loadID="loadIDMedic" v-if="!editing"></autocomplete>
                                    <label class="control-label" v-if="editing">{{ dataVenta.employee.name }} {{ dataVenta.employee.lastname }}</label>
                                </div>
                                
                              </div>
                              <div class="col-md-3">
                                <label class="control-label">Tipo Tratamiento <span class="asterisk">*</span></label>
                                <div class="">
                                    <autocomplete :suggestions="typetreatmentlist" v-model="selectionTypetreatment" placeholder="Buscar Tipo Tratamiento" :minlength = 3 @loadID="loadIDTypetreatment" v-if="!editing"></autocomplete>
                                    <label class="control-label" v-if="editing">{{ dataVenta.typetreatment.name }}</label>
                                </div>
                              </div>                          
                              <div class="col-md-3">
                                <label class="control-label">Turno <span class="asterisk">*</span></label>
                                <div class="pt-5">
                                  <p class="mb-0">
                                      Mañana: <input type="radio" name="turno" id="turnoM" value="M" v-model="dataAttention.turn" required />
                                      Tarde: <input type="radio" name="turno" id="turnoT" value="T" v-model="dataAttention.turn" />
                                  </p>
                                </div>
                              </div>
                            </div><!-- fin cabecera -->
                            <!-- datos atencion -->
                            <div class="form-group" v-if="!editing">
                                <label for="sys">SYS : <span class="asterisk">*</span></label>
                                <textarea class="form-control" rows="3" id="sys" v-model="dataAttention.sys" required></textarea>
                            </div>
                            <div class="form-group" v-if="!editing">
                                <label for="examen" >EXAMEN : <span class="asterisk">*</span></label>
                                <textarea class="form-control" rows="3" id="examen" v-model="dataAttention.exam" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tratamiento">TRATAMIENTO : <span class="asterisk">*</span></label>
                                <textarea class="form-control" rows="3" v-model="dataAttention.treatment" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="pull-left" style="color:red">
                                  <input type="checkbox" v-model="dataSale.concluded"> <strong>CONCLUIR</strong>
                                </div>
                            </div><!-- fin datos atencion -->
                            <hr/>
                            <!-- Pierna Derecha -->
                            <div class="form-group" v-if="visible_d">
                              <div class="col-md-4">
                                  <label class="checkbox-inline pull-right pr-5 pt-25">
                                    <input type="checkbox" value="1" v-model="derecha.add"> {{ products[0].name}}
                                  </label>
                              </div>
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">Costo Total</label>
                                  <div class="">
                                    <input type="number" class="form-control input-sm" v-model="derecha.costo" :disabled="!derecha.add">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">A Cuenta</label>
                                  <div class="">
                                    <input type="number" class="form-control input-sm" v-model="derecha.acuenta" readonly>
                                  </div>
                              </div>                          
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">Pago</label>
                                  <div class="">
                                    <input type="number" class="form-control input-sm" v-model="derecha.pago" :disabled="!derecha.add">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">Saldo</label>
                                  <div class="">
                                    <input type="number" id="saldo_derecha" class="form-control input-sm" :value="parseFloat(derecha.costo) - (parseFloat(derecha.acuenta) + parseFloat(derecha.pago))" readonly>
                                  </div>
                              </div>
                            </div>
                            <!-- Pierna Izquierda -->
                            <div class="form-group" v-if="visible_i">
                              <div class="col-md-4">
                                  <label class="checkbox-inline pull-right pt-25">
                                    <input type="checkbox" value="2" v-model="izquierda.add"> {{ products[1].name}}
                                  </label>
                              </div>
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">Costo Total</label>
                                  <div class="">
                                    <input type="number" class="form-control input-sm" v-model="izquierda.costo" :disabled="!izquierda.add">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">A Cuenta</label>
                                  <div class="">
                                    <input type="number" class="form-control input-sm" v-model="izquierda.acuenta" readonly>
                                  </div>
                              </div>                          
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">Pago</label>
                                  <div class="">
                                    <input type="number" class="form-control input-sm" v-model="izquierda.pago" :disabled="!izquierda.add">
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <label class="control-label text-right pt-5">Saldo</label>
                                  <div class="">
                                    <input type="number" id="saldo_izquierda" class="form-control input-sm" :value="parseFloat(izquierda.costo) - (parseFloat(izquierda.acuenta) + parseFloat(izquierda.pago))" readonly>
                                  </div>
                              </div>
                            </div> 
                        </div><!-- fin div container -->                       
                    </div><!-- /.form-body -->
                    <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                        <div class="pull-right pr-10">
                            <button type="button" class="btn btn-danger active" @click="$modal.hide('historial')"><i class="fa fa-reply-all"></i> Cancelar</button>
                            <button type="button" :disabled="ShowIcon" class="btn btn-primary active" v-if="viewForm" @click.prevent="Actionform"><i v-show="ShowIcon" class='fa fa-circle-o-notch fa-spin'></i> {{ labelButton }}</button>
                        </div>
                    </div><!-- /.form-footer -->                    
                </form>              
              </div>            
            </modal>
            <!-- /. modal -->
          </div>
      </div><!-- /.row -->

  </div>
  <!-- /. Tabla de contenido -->
</template>
<script>
import { mapState, mapGetters } from 'vuex'
import MaskedInput from 'vue-masked-input'
import Autocomplete from '../../utils/Autocomplete'

export default {
    name: 'pachistorial',
    data () {
      return {
        ShowIcon : false,
        labelButton: 'Grabar Datos',

        editing: false,
        visible_d: true,
        visible_i:true,
        viewForm: true,
        selectionMedico:'',
        selectionTypetreatment:'',

        dataAttention:{
          date_attention:moment().format('DD/MM/YYYY'),
          type:'0',
          sys:'',
          exam:'',
          treatment:'', 
          cie10_id:1,
          employee_id:'',
          turn: 'M'        
        },
        dataSale:{
          patient_id:'',
          employee_id:'',
          typetreatment_id:'',
          cost:'',
          igv:'',
          totalprice:'',
          date_sale:'',
          cancelled:0,
          concluded:false,
          user_id:''
        },
        derecha: {
          add:false,
          costo:'0',
          acuenta:'0',
          pago:'0',
          saldo:'0',
          iddetalle:''
        },
        izquierda: {
          add:false,
          costo:'0',
          acuenta:'0',
          pago:'0',
          saldo:'0',
          iddetalle:''
        },        
        datosDetails: [],
        afecciones :[
          {id: 1 , name: 'DB', checked: false},
          {id: 2 , name: 'HTA', checked: false},
          {id: 3 , name: 'ALERGIA', checked: false},
          {id: 4 , name: 'PROBLEMA DE COLUMNA', checked: false}
        ],        
        idpaciente:'',
        dataVenta: []
      }
    },
    created() {
      this.$store.dispatch('LOAD_SALES_ID_PATIENT', { patient_id: this.$route.params.patient })
      //this.$store.dispatch('LOAD_ATTENTIONS_ID_PATIENT' , { patient_id: this.$route.params.patient })
      this.$store.dispatch('LOAD_EMPLOYEES_AUTOCOMPLETE_LIST')
      this.$store.dispatch('LOAD_TYPETREATMENTS_AUTOCOMPLETE_LIST')
      this.idpaciente = this.$route.params.patient 

    },
    components:{
      MaskedInput,
      Autocomplete      
    },
    computed: {
      ...mapState(['sales_id_patient','attention_id_patient','products','typetreatmentlist','user_system']),
      ...mapGetters(['getPatientById','getubigeos','getMedicsAutocomplete']),
      patientByid: function(){
          return this.getPatientById(this.$route.params.patient);
      },      
    },  
    methods: {
      LoadAtencion: function(){
        this.editing = false
        this.visible_d = true,
        this.visible_i = true,
        this.viewForm = true
        this.selectionMedico = ''
        this.selectionTypetreatment = ''
        this.dataAttention = {
          date_attention:moment().format('DD/MM/YYYY'),
          type:'0',
          sys:'',
          exam:'',
          treatment:'', 
          cie10_id:1,
          employee_id:'',
          turn: 'M'          
        }  

        this.dataSale = {
          patient_id:'',
          employee_id:'',
          typetreatment_id:'',
          cost:'',
          igv:'',
          totalprice:'',
          date_sale:'',
          cancelled:0,
          concluded: false,
          user_id:''
        }

        this.derecha = {
          add:false,
          costo:'0',
          acuenta:'0',
          pago:'0',
          saldo:'0',
          iddetalle:''
        }

        this.izquierda = {
          add:false,
          costo:'0',
          acuenta:'0',
          pago:'0',
          saldo:'0',
          iddetalle:''          
        }

        this.$modal.show('historial')
      },
      cargaSale: function(value){
        this.dataVenta = value
        console.log("venta: ",this.dataVenta)
        this.viewForm = this.dataVenta.concluded == 1 ? false : true
        this.editing = true
        this.selectionMedico = ''
        this.selectionTypetreatment = ''
        this.dataSale.concluded = false
        this.dataAttention = {
          date_attention:moment().format('DD/MM/YYYY'),
          type:'1',
          sys:'',
          exam:'',
          treatment:'', 
          cie10_id:1,
          employee_id:'',
          turn: 'M'          
        }  

        this.derecha = {
          add:false,
          costo:'0',
          acuenta:'0',
          pago:'0',
          saldo:'0',
          iddetalle:''          
        }

        this.izquierda = {
          add:false,
          costo:'0',
          acuenta:'0',
          pago:'0',
          saldo:'0',
          iddetalle:''          
        }     

        this.visible_d = typeof (this.dataVenta.salesdetails.find(det => det.product_id == 1)) === 'undefined' ? false : true
        if(this.visible_d){
          var datos_d = this.dataVenta.salesdetails.find(det => det.product_id == 1)
          var todos_pagos = 0
          this.derecha.add = this.visible_d
          this.derecha.iddetalle = datos_d.id
          this.derecha.costo = datos_d.price
          _.each(datos_d.payments, function(pago){
            todos_pagos = parseFloat(todos_pagos) + parseFloat(pago.rode)
          })
          this.derecha.acuenta = todos_pagos
        }

        this.visible_i = typeof (this.dataVenta.salesdetails.find(det => det.product_id == 2)) === 'undefined' ? false : true
        if(this.visible_i){
          var datos_i = this.dataVenta.salesdetails.find(det => det.product_id == 2)
          var todos_pagos = 0
          this.izquierda.add = this.visible_i
          this.izquierda.iddetalle = datos_i.id
          this.izquierda.costo = datos_i.price
          _.each(datos_i.payments, function(pago){
            todos_pagos = parseFloat(todos_pagos) + parseFloat(pago.rode)
          })
          this.izquierda.acuenta = todos_pagos
        }                
        //this.izquierda.add = this.visible_i
        this.$modal.show('historial')
      },
      Actionform: function(){
        if(this.editing){
          this.createAttention()
        }else{
          this.createVenta()
        }
      },
      createVenta: function(){
        var url = '/api/sales';
        this.datosDetails = []
        this.dataAttention.date_attention = this.formatFecha(this.dataAttention.date_attention)
        if(this.derecha.add){
          var datito = { product_id: 1, quantity:1 , price: this.derecha.costo , date_payment: this.dataAttention.date_attention, rode: this.derecha.pago , user_id: this.user_system.user.id  }
          this.datosDetails.push(datito)
        }
        if(this.izquierda.add){
          var datito = { product_id: 2, quantity:1 , price: this.izquierda.costo , date_payment: this.dataAttention.date_attention, rode: this.izquierda.pago , user_id: this.user_system.user.id  }
          this.datosDetails.push(datito)
        } 
        this.CalculoIGV()
        this.dataSale.user_id = this.user_system.user.id  
        this.dataSale.date_sale = this.dataAttention.date_attention   
        this.dataSale.patient_id = this.$route.params.patient
        this.dataSale.concluded = this.dataSale.concluded ? 1 : 0

        this.ShowIcon = true
        this.labelButton = 'Procesando'

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, {
          sale: this.dataSale,
          attention: this.dataAttention,
          detalles: this.datosDetails
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
          this.$store.dispatch('LOAD_SALES_ID_PATIENT', { patient_id: this.$route.params.patient });
          this.$modal.hide('historial');
          toastr.success('Nueva Venta creada con exito');
        }).catch(error => {
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'              
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });
      },
      createAttention: function(){
        var url = '/api/attentions';
        var saldo_total = 0
        this.datosDetails = []
        this.dataAttention.date_attention = this.formatFecha(this.dataAttention.date_attention)
        this.dataAttention.sale_id = this.dataVenta.id
        this.dataAttention.employee_id = this.dataVenta.employee_id
        this.dataAttention.type = 1
        if(this.derecha.add){
          var datito = { product_id: 1, quantity:1 , saledetail_id:this.derecha.iddetalle ,price: this.derecha.costo , date_payment: this.dataAttention.date_attention, rode: this.derecha.pago , user_id: this.user_system.user.id  }
          this.datosDetails.push(datito)
          saldo_total = parseFloat(saldo_total) + parseFloat($("#saldo_derecha").val())
        }
        if(this.izquierda.add){
          var datito = { product_id: 2, quantity:1 , saledetail_id:this.izquierda.iddetalle ,price: this.izquierda.costo , date_payment: this.dataAttention.date_attention, rode: this.izquierda.pago , user_id: this.user_system.user.id  }
          this.datosDetails.push(datito)
          saldo_total = parseFloat(saldo_total) + parseFloat($("#saldo_izquierda").val())          
        } 
        if(saldo_total == 0){
          this.dataSale.cancelled = 1
        }
        this.dataSale.concluded = this.dataSale.concluded ? 1 : 0
        this.dataAttention.type = this.dataSale.concluded ? 2 : 1

        this.ShowIcon = true
        this.labelButton = 'Procesando'
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.post(url, {
          sale: this.dataSale,
          attention: this.dataAttention,
          detalles: this.datosDetails
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
          //this.$store.dispatch('LOAD_PATIENTS_LIST', { page: this.$route.params.page, search:this.patientSearch })
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'             
          this.$store.dispatch('LOAD_SALES_ID_PATIENT', { patient_id: this.$route.params.patient });
          this.$modal.hide('historial');
          toastr.success('Nueva Atencion creada con exito');
        }).catch(error => {
          this.ShowIcon = false
          this.labelButton = 'Grabar Datos'              
          this.errors = error.response.data.status;
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });        
      },
      reporte_pdf: function(){
        this.$router.push('/api/pdf');
      },
      CalculoIGV: function(){
        var tot = parseFloat(this.derecha.costo) + parseFloat(this.izquierda.costo)
        var sald = parseFloat(this.derecha.costo) - (parseFloat(this.derecha.acuenta) + parseFloat(this.derecha.pago))
        var sali = parseFloat(this.izquierda.costo) - (parseFloat(this.izquierda.acuenta) + parseFloat(this.izquierda.pago))
        var sal = parseFloat(sald) + parseFloat(sali)
        
        this.dataSale.totalprice = tot
        this.dataSale.igv = tot * 0.18
        this.dataSale.cost = tot - (tot * 0.18)
        if(parseFloat(sal) == 0){
          this.dataSale.cancelled = 1
        }
      },
      loadIDMedic: function(value){
        this.dataAttention.employee_id = value;
        this.dataSale.employee_id = value;        
      },
      loadIDTypetreatment: function(value){
        this.dataSale.typetreatment_id = value;
      },
      formatFecha: function(value){
        var valor = value.toString().split('/')
        return valor[2]+'-'+valor[1]+'-'+valor[0]
      }               
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

  .borde {
    border: 1px solid #347c7c;
    margin: 5px 0;
  }

  .contenedor {
    background-color: #f2fefe;
    border:1px solid #347c7c; 
  }
  
  .content-flex {
    display: flex;
  }

</style>

