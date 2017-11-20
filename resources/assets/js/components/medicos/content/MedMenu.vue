<template>
  <div class="col-lg-3 col-md-3 col-sm-4">
      <div class="panel rounded shadow">
          <div class="panel-body" v-if="medicByid">
              <div class="inner-all">
                  <ul class="list-unstyled">
                      <li class="text-center">
                          <img class="img-circle img-bordered-primary img-medic" :src="'images/'+ medicByid.photo" alt="Tol Lee">
                      </li>
                      <li class="text-center">
                          <h4 class="text-capitalize">{{ medicByid.name }} {{ medicByid.lastname }}</h4>
                          <p class="text-muted text-capitalize">Sede CENTRAL</p>
                      </li>
                      <li>
                          <a href="" class="btn btn-info btn-block">Datos Generales</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link :to="{ name: 'MedDatos', params : { medic: medicByid.id }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Datos Personales</router-link>
                            <router-link :to="{ name: 'MedTurno', params : { medic: medicByid.id }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Turnos</router-link>
                            <router-link :to="{ name: 'MedCita', params : { medic: medicByid.id }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Citas Programadas</router-link>
                         </div>
                      </li>
                      <li><br/></li>
                      <li>
                          <a href="" class="btn btn-info btn-block">Facturación</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link :to="{ name: 'MedProduccion', params : { medic: medicByid.id }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Produccion</router-link>
                            <router-link :to="{ name: 'MedPagorecibido', params : { medic: medicByid.id }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Pagos Recibidos</router-link>
                            <router-link :to="{ name: 'MedBalance', params : { medic: medicByid.id }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Balance</router-link>
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
    name: 'medmenu',
    data () {
      return {}
    },
    computed: {
      ...mapGetters({ getmedic: 'getEmployeeById'}),
      medicByid: function(){
        return this.getmedic(this.$route.params.medic);
      }
    }
}
</script>
<style scoped>
  .img-medic {
    max-width: 128px !important;
  }
</style>
