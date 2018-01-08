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
                      <li v-if="this.bloque_1.length > 0">
                          <a href="" class="btn btn-info btn-block">Historial Clinico</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link v-for="men in menuProfile.options" v-if="men.bloque == 1" tag="li" :to="{ name: men.name_router , params : { patient: patientByid.id , page: page_route}}" :key="men.id" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i>{{ men.name_template }}</router-link>
<!--                             <router-link :to="{ name: 'PacDatos', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Datos Personales</router-link>
                            <router-link :to="{ name: 'PacHistorial', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Historial Clinico</router-link>
                            <router-link :to="{ name: 'PacPresupuesto', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Presupuestos</router-link>
                            <router-link :to="{ name: 'PacDocumento', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i>Documentos Clinicos</router-link>
                            <router-link :to="{ name: 'PacImagen', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Imagenes y Videos</router-link>
 -->                         </div>
                      </li>
                      <li><br/></li>
                      <li v-if="this.bloque_2.length > 0">
                          <a href="" class="btn btn-info btn-block">Facturación</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link v-for="men in menuProfile.options" v-if="men.bloque == 2" tag="li" :to="{ name: men.name_router , params : { patient: patientByid.id , page: page_route}}" :key="men.id" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i>{{ men.name_template }}</router-link>                              
<!--                             <router-link :to="{ name: 'PacPagos', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Recaudacion(Pagos)</router-link>
                            <router-link :to="{ name: 'PacPagoefectuado', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Pagos Recibidos</router-link>
                            <router-link :to="{ name: 'PacPagoanulado', params : { patient: patientByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Pagos Anulados</router-link>
 -->                          </div>
                      </li>

                  </ul>
              </div>
          </div>
      </div><!-- /.panel -->

  </div>
</template>
<script>
import { mapState, mapGetters } from 'vuex'

export default {
    name: 'pacmenu',
    data () {
      return {
          page_route : 1,
          bloque_1: [],
          bloque_2: []
      }
    },
    created(){
      //console.log("page: ",this.$route.params.page)
      //this.$store.dispatch('LOAD_PATIENTS_LIST', { page: this.$route.params.page });         
    },
    mounted(){
       this.page_route = this.$route.params.page 
       this.bloque_1 = this.menuProfile.options.filter((menpac) => menpac.bloque == 1)
       this.bloque_2 = this.menuProfile.options.filter((menpac) => menpac.bloque == 2)
    },    
    computed: {
      ...mapState(['profile_user']),  
      ...mapGetters({ getpacient: 'getPatientById'}),
      patientByid: function(){
        console.log("patient menu: ",this.getpacient(this.$route.params.patient))  
        return this.getpacient(this.$route.params.patient);
      },
      menuProfile: function(){
        return this.profile_user.find((menpac) => menpac.idmenu == 3)  
      }
    }

}
</script>
<style scoped>
  .img-patient {
    max-width: 128px !important;
  }
</style>
