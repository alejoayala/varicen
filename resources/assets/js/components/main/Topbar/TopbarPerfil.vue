<template>

          <li class="" v-if="user_system">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img :src="'/images/'+ user_system.user.employee.photo" alt="">{{user_system.user.employee.name}} {{user_system.user.employee.lastname}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Cambio de contraseña<i class="fa fa-key pull-right"></i></a></li>
              <li><a @click.prevent="logout"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
            </ul>
          </li>

</template>
<script>
import { mapState, mapGetters } from 'vuex'
export default {
  name: 'topbarperfil',
  data () {
    return {}
  },
  computed: {
      ...mapState(['user_system']),
  },  
  methods: {
    logout() {
      //this.$router.push({ name: 'login' })
      this.$store.dispatch('LOGOUT').then(() => {
        this.$store.dispatch('LOAD_PROFILE_USER')
        this.$router.push({ name: 'login' })
      })
    }
  }  
}
</script>
<style>
</style>
