import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login from '../components/login/Login.vue'
import Dashboard from '../components/dashboard/Dashboard.vue'
import Agenda from '../components/agenda/Agenda.vue'
/*<!-- Opciones del Menu Pacientes -->*/
import Pacientes from '../components/pacientes/Pacientes.vue'
import PacientesMain from '../components/pacientes/PacientesMain.vue'
import PacDatos from '../components/pacientes/content/PacDatos.vue'
import PacDocumento from '../components/pacientes/content/PacDocumento.vue'
import PacHistorial from '../components/pacientes/content/PacHistorial.vue'
import PacImagen from '../components/pacientes/content/PacImagen.vue'
import PacPagoanulado from '../components/pacientes/content/PacPagoanulado.vue'
import PacPagoefectuado from '../components/pacientes/content/PacPagoefectuado.vue'
import PacPagos from '../components/pacientes/content/PacPagos.vue'
import PacPresupuesto from '../components/pacientes/content/PacPresupuesto.vue'
/*<!-- Opciones del Menu Medicos -->*/
import Medicos from '../components/medicos/Medicos.vue'
import MedicosMain from '../components/medicos/MedicosMain.vue'
import MedBalance from '../components/medicos/content/MedBalance.vue'
import MedCita from '../components/medicos/content/MedCita.vue'
import MedDatos from '../components/medicos/content/MedDatos.vue'
import MedPagorecibido from '../components/medicos/content/MedPagorecibido.vue'
import MedProduccion from '../components/medicos/content/MedProduccion.vue'
import MedTurno from '../components/medicos/content/MedTurno.vue'

import AdmUsuarios from '../components/administracion/AdmUsuarios.vue'
import AdmPromociones from '../components/administracion/AdmPromociones.vue'
import AdmTareas from '../components/administracion/AdmTareas.vue'
import AdmTipodocumento from '../components/administracion/AdmTipodocumento.vue'
import AdmSegModulos from '../components/administracion/AdmSegModulos.vue'
import AdmSegPerfiles from '../components/administracion/AdmSegPerfiles.vue'
import ConEmpresa from '../components/configuracion/ConEmpresa.vue'
import ConTipocambio from '../components/configuracion/ConTipocambio.vue'
import RepCentralreportes from '../components/reportes/RepCentralreportes.vue'

export default new Router({
    // mode: 'history', // to enable html5 history api
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'Dashboard',
            component: Dashboard
        },
        {
            path: '/agenda',
            name: 'Agenda',
            component: Agenda
        },
        {
            path: '/pacientes',
            name: 'Pacientes',
            component: Pacientes
        },
        /*<!-- Menu Pacientes -->*/
        {
            path: '/detalle-pacientes',
            name: 'DetallePacientes',
            component: PacientesMain,
            children: [
                      {
                          path: 'datos/:patient',
                          name: 'PacDatos',
                          component: PacDatos,
                          props: true
                      },
                      {
                          path: 'documento/:patient',
                          name: 'PacDocumento',
                          component: PacDocumento,
                          props: true
                      },
                      {
                          path: 'historial/:patient',
                          name: 'PacHistorial',
                          component: PacHistorial,
                          props: true
                      },
                      {
                          path: 'imagen/:patient',
                          name: 'PacImagen',
                          component: PacImagen,
                          props: true
                      },
                      {
                          path: 'pagoanulado/:patient',
                          name: 'PacPagoanulado',
                          component: PacPagoanulado,
                          props: true
                      },
                      {
                          path: 'pagoefectuado/:patient',
                          name: 'PacPagoefectuado',
                          component: PacPagoefectuado,
                          props: true
                      },
                      {
                          path: 'pagos/:patient',
                          name: 'PacPagos',
                          component: PacPagos,
                          props: true
                      },
                      {
                          path: 'presupuesto/:patient',
                          name: 'PacPresupuesto',
                          component: PacPresupuesto,
                          props: true
                      }]
        },
        {
            path: '/medicos',
            name: 'Medicos',
            component: Medicos
        },
        /*<!-- Menu Medicos -->*/
        {
            path: '/detalle-medicos',
            name: 'DetalleMedicos',
            component: MedicosMain,
            children: [
                      {
                          path: 'datos/:medic',
                          name: 'MedDatos',
                          component: MedDatos,
                          props: true
                      },
                      {
                          path: 'balance/:medic',
                          name: 'MedBalance',
                          component: MedBalance,
                          props: true
                      },
                      {
                          path: 'cita/:medic',
                          name: 'MedCita',
                          component: PacHistorial,
                          props: true
                      },
                      {
                          path: 'pagorecibido/:medic',
                          name: 'MedPagorecibido',
                          component: MedPagorecibido,
                          props: true
                      },
                      {
                          path: 'produccion/:medic',
                          name: 'MedProduccion',
                          component: MedProduccion,
                          props: true
                      },
                      {
                          path: 'turno/:medic',
                          name: 'MedTurno',
                          component: MedTurno,
                          props: true
                      }]
        },
        /*<!-- Menu Administracion -->*/
        {
            path: '/administracion/usuarios',
            name: 'AdmUsuarios',
            component: AdmUsuarios
        },
        {
            path: '/administracion/promociones',
            name: 'AdmPromociones',
            component: AdmPromociones
        },
        {
            path: '/administracion/tareas',
            name: 'AdmTareas',
            component: AdmTareas
        },
        {
            path: '/administracion/tipodocumento',
            name: 'AdmTipodocumento',
            component: AdmTipodocumento
        },
        /* <!-- Menu Administracion Submenu Seguridad -->*/
        {
            path: '/administracion/seguridad/modulos',
            name: 'AdmSegModulos',
            component: AdmSegModulos
        },
        {
            path: '/administracion/seguridad/perfiles',
            name: 'AdmSegPerfiles',
            component: AdmSegPerfiles
        },
        /* <!-- Menu Configuracion -->*/
        {
            path: '/configuracion/empresa',
            name: 'ConEmpresa',
            component: ConEmpresa
        },
        {
            path: '/configuracion/tipocambio',
            name: 'ConTipocambio',
            component: ConTipocambio
        },
        /* <!-- Menu Reportes -->*/
        {
            path: '/reportes/centralreportes',
            name: 'RepCentralreportes',
            component: RepCentralreportes
        }
    ]
});
