<template>
  <!-- page content -->
  <div class="right_col" role="main" >
    <!-- top tiles -->
    <div class="header-content">
      <h2><i class="fa fa-home"></i> Datos Personales <span>Ernesto Cota Condori</span></h2>
      <div class="breadcrumb-wrapper hidden-xs">
          <span class="label">Estas en:</span>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a data-ng-href="#">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="#">Médicos</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ol>
      </div><!-- /.breadcrumb-wrapper -->
    </div>
    <br/>
    <!-- /.row -->
    <div class="row">
      <medmenu></medmenu>

      <router-view></router-view>
    </div><!-- /.row -->
  </div>
  <!-- /page content -->
</template>
<script>
import { mapGetters } from 'vuex'
import MedMenu from './content/MedMenu.vue'

export default {
  name: 'medicosmain',
  components:
            {'medmenu': MedMenu},
  data () {
    return {}
  },
  mounted(){

  },
  created(){
    //this.$store.dispatch('LOAD_EMPLOYEES_LIST');    
    this.$store.dispatch('LOAD_DATA_INIT_EMPLOYEES_LIST');
  },
  computed :{
      ...mapGetters({ getmedical: 'getEmployeeById'}),
      medicByid: function(){
        console.log(this.getmedical)
          return this.getmedical(this.$route.params.medic);
      }
  }
  

   

}
</script>
