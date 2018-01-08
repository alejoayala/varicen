import Login from './components/login/Login.vue'
import TemplateMain from './components/main/TemplateMain.vue'
import Dashboard from './components/dashboard/Dashboard.vue'
import Agenda from './components/agenda/Agenda.vue'
/*<!-- Opciones del Menu Pacientes -->*/
import Pacientes from './components/pacientes/Pacientes.vue'
import PacientesMain from './components/pacientes/PacientesMain.vue'
import PacDatos from './components/pacientes/content/PacDatos.vue'
import PacDocumento from './components/pacientes/content/PacDocumento.vue'
import PacHistorial from './components/pacientes/content/PacHistorial.vue'
import PacImagen from './components/pacientes/content/PacImagen.vue'
import PacPagoanulado from './components/pacientes/content/PacPagoanulado.vue'
import PacPagoefectuado from './components/pacientes/content/PacPagoefectuado.vue'
import PacPagos from './components/pacientes/content/PacPagos.vue'
import PacPresupuesto from './components/pacientes/content/PacPresupuesto.vue'
/*<!-- Opciones del Menu Medicos -->*/
import Medicos from './components/medicos/Medicos.vue'
import MedicosMain from './components/medicos/MedicosMain.vue'
import MedBalance from './components/medicos/content/MedBalance.vue'
import MedCita from './components/medicos/content/MedCita.vue'
import MedDatos from './components/medicos/content/MedDatos.vue'
import MedPagorecibido from './components/medicos/content/MedPagorecibido.vue'
import MedProduccion from './components/medicos/content/MedProduccion.vue'
import MedTurno from './components/medicos/content/MedTurno.vue'

import Empleados from './components/empleados/Empleados.vue'
import AdmUsuarios from './components/administracion/AdmUsuarios.vue'
import AdmPromociones from './components/administracion/AdmPromociones.vue'
import AdmTareas from './components/administracion/AdmTareas.vue'
import AdmTipodocumento from './components/administracion/AdmTipodocumento.vue'
import AdmSegModulos from './components/administracion/AdmSegModulos.vue'
import AdmSegPerfiles from './components/administracion/AdmSegPerfiles.vue'
import ConEmpresa from './components/configuracion/ConEmpresa.vue'
import ConTipocambio from './components/configuracion/ConTipocambio.vue'
import RepCentralreportes from './components/reportes/RepCentralreportes.vue'

import NotFound from './components/errors/NotFound.vue'

export default [
  {
      path: '/',
      name: 'Admin',
      component: TemplateMain,
      //meta: { requiresAuth: true },
      children: [
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            meta: { requiresAuth: true }
        },
        {
            path: '/agenda',
            name: 'Agenda',
            component: Agenda,
            meta: { requiresAuth: true }
        },
        {
            path: '/pacientes',
            name: 'Pacientes',
            component: Pacientes,
            meta: { requiresAuth: true }
        },
        /*<!-- Menu Pacientes -->*/
        {
            path: '/detalle-pacientes',
            name: 'DetallePacientes',
            component: PacientesMain,
            children: [
                      {
                          path: 'datos/:patient/:page',
                          name: 'PacDatos',
                          component: PacDatos,
                          props: true
                      },
                      {
                          path: 'documento/:patient/:page',
                          name: 'PacDocumento',
                          component: PacDocumento,
                          props: true
                      },
                      {
                          path: 'historial/:patient/:page',
                          name: 'PacHistorial',
                          component: PacHistorial,
                          props: true
                      },
                      {
                          path: 'imagen/:patient/:page',
                          name: 'PacImagen',
                          component: PacImagen,
                          props: true
                      },
                      {
                          path: 'pagoanulado/:patient/:page',
                          name: 'PacPagoanulado',
                          component: PacPagoanulado,
                          props: true
                      },
                      {
                          path: 'pagoefectuado/:patient/:page',
                          name: 'PacPagoefectuado',
                          component: PacPagoefectuado,
                          props: true
                      },
                      {
                          path: 'pagos/:patient/:page',
                          name: 'PacPagos',
                          component: PacPagos,
                          props: true
                      },
                      {
                          path: 'presupuesto/:patient/:page',
                          name: 'PacPresupuesto',
                          component: PacPresupuesto,
                          props: true
                      }]
        },
        {
            path: '/medicos',
            name: 'Medicos',
            component: Medicos,
            meta: { requiresAuth: true }
        },
        /*<!-- Menu Medicos -->*/
        {
            path: '/detalle-medicos',
            name: 'DetalleMedicos',
            component: MedicosMain,
            children: [
                      {
                          path: 'datos/:medic/:page',
                          name: 'MedDatos',
                          component: MedDatos,
                          props: true
                      },
                      {
                          path: 'balance/:medic/:page',
                          name: 'MedBalance',
                          component: MedBalance,
                          props: true
                      },
                      {
                          path: 'cita/:medic/:page',
                          name: 'MedCita',
                          component: MedCita,
                          props: true
                      },
                      {
                          path: 'pagorecibido/:medic/:page',
                          name: 'MedPagorecibido',
                          component: MedPagorecibido,
                          props: true
                      },
                      {
                          path: 'produccion/:medic/:page',
                          name: 'MedProduccion',
                          component: MedProduccion,
                          props: true
                      },
                      {
                          path: 'turno/:medic/:page',
                          name: 'MedTurno',
                          component: MedTurno,
                          props: true
                      }]
        },
          /*<!-- Menu Empleados -->*/
          {
              path: '/empleados',
              name: 'Empleados',
              component: Empleados,
              meta: { requiresAuth: true }
          },        
        /*<!-- Menu Administracion -->*/
        {
            path: '/administracion/usuarios',
            name: 'AdmUsuarios',
            component: AdmUsuarios,
            meta: { requiresAuth: true }
        },
        {
            path: '/administracion/promociones',
            name: 'AdmPromociones',
            component: AdmPromociones,
            meta: { requiresAuth: true }
        },
        {
            path: '/administracion/tareas',
            name: 'AdmTareas',
            component: AdmTareas,
            meta: { requiresAuth: true }
        },
        {
            path: '/administracion/tipodocumento',
            name: 'AdmTipodocumento',
            component: AdmTipodocumento,
            meta: { requiresAuth: true }
        },
        /* <!-- Menu Administracion Submenu Seguridad -->*/
        {
            path: '/administracion/seguridad/modulos',
            name: 'AdmSegModulos',
            component: AdmSegModulos,
            meta: { requiresAuth: true }
        },
        {
            path: '/administracion/seguridad/perfiles',
            name: 'AdmSegPerfiles',
            component: AdmSegPerfiles,
            meta: { requiresAuth: true }
        },
        /* <!-- Menu Configuracion -->*/
        {
            path: '/configuracion/empresa',
            name: 'ConEmpresa',
            component: ConEmpresa,
            meta: { requiresAuth: true }
        },
        {
            path: '/configuracion/tipocambio',
            name: 'ConTipocambio',
            component: ConTipocambio,
            meta: { requiresAuth: true }
        },
        /* <!-- Menu Reportes -->*/
        {
            path: '/reportes/centralreportes',
            name: 'RepCentralreportes',
            component: RepCentralreportes,
            meta: { requiresAuth: true }
        },
          {
              path: '/login',
              name: 'login',
              component: Login,
              meta: { redirectIfLogged: true }
          },        
      ]
  },
  /*{
      path: '/login',
      name: 'login',
      component: Login,
      meta: { redirectIfLogged: true }
  },*/
  {
      path: '*',
      name: 'not-found',
      component: NotFound
  }

]
