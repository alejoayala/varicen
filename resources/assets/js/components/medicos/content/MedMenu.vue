<template>
  <div class="col-lg-3 col-md-3 col-sm-4">
      <div class="panel rounded shadow">
          <div class="panel-body" v-if="medicByid">
              <div class="inner-all">
                  <ul class="list-unstyled">
                      <li class="text-center">
                          <img class="img-circle img-bordered-primary img-medic" :src="'/images/'+ medicByid.photo" alt="Tol Lee">
                      </li>
                      <li class="text-center">
                          <h4 class="text-capitalize">{{ medicByid.name }} {{ medicByid.lastname }}</h4>
                          <p class="text-muted text-capitalize">Sede CENTRAL</p>
                      </li>
                      <li v-if="bloque_1.length > 0">
                          <a href="" class="btn btn-info btn-block">Datos Generales</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link v-for="men in menuProfile.options" v-if="men.bloque == 1" tag="li" :to="{ name: men.name_router , params : { medic: medicByid.id , page: page_route}}" :key="men.id" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i>{{ men.name_template }}</router-link>
                              
<!--                             <router-link :to="{ name: 'MedDatos', params : { medic: medicByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Datos Personales</router-link>
                            <router-link :to="{ name: 'MedTurno', params : { medic: medicByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Turnos</router-link>
                            <router-link :to="{ name: 'MedCita', params : { medic: medicByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Citas Programadas</router-link>
 -->                         </div>
                      </li>
                      <li><br/></li>
                      <li v-if="bloque_2.length > 0">
                          <a href="" class="btn btn-info btn-block">Facturación</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link v-for="men in menuProfile.options" v-if="men.bloque == 2" tag="li" :to="{ name: men.name_router , params : { medic: medicByid.id , page: page_route}}" :key="men.id" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i>{{ men.name_template }}</router-link>
                              
<!--                             <router-link :to="{ name: 'MedProduccion', params : { medic: medicByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Produccion</router-link>
                            <router-link :to="{ name: 'MedPagorecibido', params : { medic: medicByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Pagos Recibidos</router-link>
                            <router-link :to="{ name: 'MedBalance', params : { medic: medicByid.id , page: page_route}}" class="btn btn-default" exact><i class="fa fa-angle-double-right pull-left"></i> Balance</router-link>
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
    name: 'medmenu',
    data () {
      return {
          page_route : 1,
          bloque_1: [],
          bloque_2: []          
      }
    },
    mounted(){
       this.page_route = this.$route.params.page 
       this.bloque_1 = this.menuProfile.options.filter((menpac) => menpac.bloque == 1)
       this.bloque_2 = this.menuProfile.options.filter((menpac) => menpac.bloque == 2)       
    },     
    created(){
      this.$store.dispatch('LOAD_EMPLOYEES_LIST', { page: this.$route.params.page , type: 1 });         
    },    
    computed: {
      ...mapState(['profile_user']),          
      ...mapGetters({ getmedic: 'getEmployeeById'}),
      medicByid: function(){
        return this.getmedic(this.$route.params.medic);
      },
      menuProfile: function(){
        return this.profile_user.find((menpac) => menpac.idmenu == 4)  
      }      
    }
   
}
</script>
<style scoped>
  .img-medic {
    max-width: 128px !important;
  }
</style>
