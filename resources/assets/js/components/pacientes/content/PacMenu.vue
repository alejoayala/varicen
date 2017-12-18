<template>
  <div class="col-lg-3 col-md-3 col-sm-4">
      <div class="panel rounded shadow">
          <div class="panel-body" v-if="patientByid">
              <div class="inner-all">
                  <ul class="list-unstyled">
                      <li class="text-center">
                          <img class="img-circle img-bordered-primary img-patient" :src="'/images/'+ patientByid.photo" alt="Tol Lee">
                      </li>
                      <li class="text-center">
                          <!--<h4 class="text-capitalize">Alexander Ayala Suncion</h4>-->
                          <h4 class="text-capitalize">{{ patientByid.patient }}</h4>
                          <p class="text-muted text-capitalize">Sede CENTRAL</p>
                      </li>
                      <li>
                          <a href="" class="btn btn-info btn-block">Historial Clinico</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link :to="{ name: 'PacDatos', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Datos Personales</router-link>
                            <router-link :to="{ name: 'PacHistorial', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Historial Clinico</router-link>
                            <router-link :to="{ name: 'PacPresupuesto', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Presupuestos</router-link>
                            <router-link :to="{ name: 'PacDocumento', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i>Documentos Clinicos</router-link>
                            <router-link :to="{ name: 'PacImagen', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Imagenes y Videos</router-link>
                         </div>
                      </li>
                      <li><br/></li>
                      <li>
                          <a href="" class="btn btn-info btn-block">Facturación</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link :to="{ name: 'PacPagos', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Recaudacion(Pagos)</router-link>
                            <router-link :to="{ name: 'PacPagoefectuado', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Pagos Recibidos</router-link>
                            <router-link :to="{ name: 'PacPagoanulado', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Pagos Anulados</router-link>
                          </div>
                      </li>

                  </ul>
              </div>
          </div>
      </div><!-- /.panel -->

  </div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
    name: 'pacmenu',
    data () {
      return {
          page_route : 1
      }
    },
    created(){
      this.$store.dispatch('LOAD_PATIENTS_LIST', { page: this.$route.params.page });         
    },
    computed: {
      ...mapGetters({ getpacient: 'getPatientById'}),
      patientByid: function(){
        return this.getpacient(this.$route.params.patient);
      }
    },
    mounted(){
       this.page_route = this.$route.params.page 
    }
}
</script>
<style scoped>
  .img-patient {
    max-width: 128px !important;
  }
</style>
