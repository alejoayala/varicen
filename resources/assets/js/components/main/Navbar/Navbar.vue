<template>
  <!-- Parte Izquierda de la Plantilla -->
  <div class="col-md-3 left_col">
    <div class="left_col scroll-view">

      <navbarlogo></navbarlogo>

      <div class="clearfix"></div>

      <!-- menu profile quick info (foto y perfil de usuario - menu Principal)-->
      <navbarperfil></navbarperfil>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu (Menu de Opciones Izquierda) -->
      <navbarmenu></navbarmenu>
      <!-- /sidebar menu -->

    </div>
  </div>
  <!-- fin de la Parte Izquierda de la plantilla -->
</template>
<script>
import NavbarPerfil from './NavbarPerfil.vue'
import NavbarLogo from './NavbarLogo.vue'
import NavbarMenu from './NavbarMenu.vue'

export default {
  name: 'navbar',
  components:
            {'navbarperfil': NavbarPerfil,
             'navbarlogo': NavbarLogo ,
             'navbarmenu': NavbarMenu},
  data () {
    return {}
  }

}
</script>
