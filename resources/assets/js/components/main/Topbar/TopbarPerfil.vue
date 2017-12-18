<template>

          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="/images/img2.jpg" alt="">Ernesto Cota
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Cambio de contraseña<i class="fa fa-key pull-right"></i></a></li>
              <li><a @click.prevent="logout"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
            </ul>
          </li>

</template>
<script>
export default {
  name: 'topbarperfil',
  data () {
    return {}
  },
  methods: {
    logout() {
      this.$store.dispatch('logout').then(() => {
        this.$router.push({ name: 'login' })
      })
    }
  }  
}
</script>
<style>
</style>
