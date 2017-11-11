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
import MedMenu from './content/MedMenu.vue'

export default {
  name: 'medicosmain',
  components:
            {'medmenu': MedMenu},
  data () {
    return {}
  }

}
</script>
