<template>
      <!-- page content -->
      <div class="right_col" role="main" >
        <!-- top tiles -->
        <div class="header-content" v-if="patientByid">
          <h2><i class="fa fa-home"></i> Datos Personales <span>{{ patientByid.patient }}</span></h2>
          <div class="breadcrumb-wrapper hidden-xs">
              <span class="label">Estas en:</span>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-home"></i>
                      <a data-ng-href="#">Home</a>
                      <i class="fa fa-angle-right"></i>
                  </li>
                  <li>
                      <a href="#">Paciente</a>
                      <i class="fa fa-angle-right"></i>
                  </li>
              </ol>
          </div><!-- /.breadcrumb-wrapper -->
        </div>
        <br/>
        <!-- /.row -->
        <div class="row">
            <pacmenu></pacmenu>

            <router-view></router-view>

        </div><!-- /.row -->
      </div>
      <!-- /page content -->
</template>
<script>
import { mapGetters } from 'vuex'
import PacMenu from './content/PacMenu.vue'

export default {
  name: 'pacientesmain',
  components:
            {'pacmenu': PacMenu},
  data () {
    return {}
  },
  created(){
    //this.$store.dispatch('LOAD_PATIENTS_LIST');    
    this.$store.dispatch('LOAD_DATA_INIT_LIST');
    this.$store.dispatch('LOAD_AFFECTIONS_LIST');    
  },
  mounted(){

  },
  computed: {
    ...mapGetters({ getpacient: 'getPatientById'}),
    patientByid: function(){
      return this.getpacient(this.$route.params.patient);
    }
  }

}
</script>
