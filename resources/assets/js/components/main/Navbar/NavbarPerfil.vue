<template>
  <!-- menu profile quick info (foto y perfil de usuario - menu Principal)-->
  <div class="profile clearfix" v-if="user_system">
    <div class="profile_pic">
      <!-- foto de usuario -->
      <img :src="'/images/'+ user_system.user.employee.photo" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <!-- Perfil de usuario -->
      <span>{{ user_system.user.employee.charge.name }}</span>
      <!-- Nombre de usuario -->
      <h2>{{ user_system.user.employee.name }} {{ user_system.user.employee.lastname }}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->
</template>
<script>
import { mapState, mapGetters } from 'vuex'
  export default {
    name: 'navbarperfil',
    data () {
      return {}
    },
    computed: {
        ...mapState(['user_system']),
    },
    mounted() {
      console.log("usuario: ",this.user_system)
    }      
  }
</script>
<style>

</style>
