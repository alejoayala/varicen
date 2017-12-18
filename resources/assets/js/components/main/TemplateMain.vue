<template>
  <div class="main_container">
    <!-- Parte Izquierda de la Plantilla -->
    <navbar></navbar>
    <!-- fin de la Parte Izquierda de la plantilla -->

    <!-- top navigation -->
    <topbar></topbar>
    <!-- /top navigation -->
    <div class="clearfix"></div>

    <!-- Contenido -->
    <router-view></router-view>

    <!-- footer content -->
    <footervue></footervue>
    <!-- /footer content -->
  </div>
</template>
<script>
    export default {
        name: 'templatemain',
        data () {
          return {
            
          }
        },
        mounted(){
          //this.$router.push({name: 'Dashboard'})
        }

    }
</script>
