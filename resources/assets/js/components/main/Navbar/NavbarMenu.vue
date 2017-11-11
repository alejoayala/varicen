<template>
    <!-- sidebar menu (Menu de Opciones Izquierda) -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <!-- tabla module - type:module -->
        <h3>General</h3>
        <ul class="nav side-menu">
          <!-- tabla module - type:menu -->
          <router-link tag="li" :to="{ name: 'Dashboard'}" exact><a><i class="fa fa-home"></i> Dashboard</a></router-link>
          <router-link tag="li" :to="{ name: 'Agenda'}" exact><a><i class="fa fa-calendar"></i> Agenda</a></router-link>
          <router-link tag="li" :to="{ name: 'Pacientes'}" exact><a><i class="fa fa-user"></i> Pacientes</a></router-link>
          <router-link tag="li" :to="{ name: 'Medicos'}" exact><a><i class="fa fa-user-md"></i> Medicos</a></router-link>

          <li><a><i class="fa fa-bar-chart-o"></i>Administración <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <!-- tabla module - type:option -->
              <router-link tag="li" :to="{ name: 'AdmUsuarios'}" exact><a>Usuarios</a></router-link>
              <router-link tag="li" :to="{ name: 'AdmPromociones'}" exact><a>Promociones</a></router-link>
              <router-link tag="li" :to="{ name: 'AdmTareas'}" exact><a>Tareas</a></router-link>
              <router-link tag="li" :to="{ name: 'AdmTipodocumento'}" exact><a>Tipo Documento</a></router-link>

              <li><a>Seguridad<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <router-link class="sub_menu" tag="li" :to="{ name: 'AdmSegModulos'}" exact><a>Modulos</a></router-link>
                  <router-link class="sub_menu" tag="li" :to="{ name: 'AdmSegPerfiles'}" exact><a>Perfiles</a></router-link>
                </ul>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i>Configuración <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <router-link tag="li" :to="{ name: 'ConEmpresa'}" exact><a>Empresa</a></router-link>
              <router-link tag="li" :to="{ name: 'ConTipocambio'}" exact><a>Tipo Cambio</a></router-link>
            </ul>
          </li>
          <li><a><i class="fa fa-file-pdf-o"></i>Reportes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <router-link tag="li" :to="{ name: 'RepCentralreportes'}" exact><a>Central de Reportes</a></router-link>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->
</template>
<script>
  export default {
    name: 'navbarmenu',
    data () {
      return {}
    }
  }
</script>
<style>

</style>
