<template>
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <topbarperfil></topbarperfil>

          <topbarnotificaciones></topbarnotificaciones>

        </ul>
      </nav>
    </div>
  </div>
</template>
<script>
import TopbarNotificaciones from './TopbarNotificaciones.vue'
import TopbarPerfil from './TopbarPerfil.vue'

export default {
  name: 'topbar',
  components:
            {'topbarnotificaciones': TopbarNotificaciones,
             'topbarperfil': TopbarPerfil },
  data () {
    return {}
  }
}
</script>
