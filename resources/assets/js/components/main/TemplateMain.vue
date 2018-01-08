<template>
  <div class="main_container">
    <!-- Parte Izquierda de la Plantilla -->
    <navbar v-show="authenticated"></navbar>
    <!-- fin de la Parte Izquierda de la plantilla -->

    <!-- top navigation -->
    <topbar v-show="authenticated"></topbar>
    <!-- /top navigation -->
    <div class="clearfix" v-show="authenticated"></div>

    <!-- Contenido -->
    <router-view></router-view>

    <!-- footer content -->
    <footervue v-show="authenticated"></footervue>
    <!-- /footer content -->
  </div>
</template>
<script>
import { mapState, mapGetters } from 'vuex'
    export default {
        name: 'templatemain',
        data () {
          return {
            
          }
        },
        mounted(){
          //this.$router.push({name: 'Dashboard'})
          console.log("autentificado: ",this.authenticated)
        },
        computed: {
            ...mapState(['authenticated'])
        }       

    }
</script>
