import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {          // estados variables del sistema
        userProfile: [],
        patients: [],
        employees:[],
        cargos:[],
        ubigeos: [],
        typedocuments: [],
        captaciones: [],
        horas:[],
        turnos:[],
        quotes:[],
    },
    actions: {        // funciones que ejecutan las mutaciones
      LOAD_PATIENTS_LIST: function ({ commit }){
        var urlPatients = 'patients';
        return axios.get(urlPatients).then((response) => {
              commit('SET_PATIENTS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_DATA_INIT_LIST: function({ commit }){
        var urlType = 'patients/create';
        return axios.get(urlType).then((response) => {
              commit('SET_DATA_INIT_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_DATA_INIT_EMPLOYEES_LIST: function({ commit }){
        var urlType = 'employees/create';
        return axios.get(urlType).then((response) => {
              commit('SET_DATA_INIT_EMPLOYEES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_EMPLOYEES_LIST: function ({ commit }){
        var urlEmployees = 'employees';
        return axios.get(urlEmployees).then((response) => {
              commit('SET_EMPLOYEES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_CHARGES_LIST: function ({ commit }){
        var urlCharges = 'charges';
        return axios.get(urlCharges).then((response) => {
              commit('SET_CHARGES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_TURNS_MEDICS_LIST: function ({ commit },payload){
        var urlMedshi = 'medicalshifts/'+ payload.employee_id;
        return axios.get(urlMedshi).then((response) => {
              commit('SET_TURNS_MEDICS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_QUOTES_MEDICS_LIST: function ({ commit },payload){
        var urlMedquo = 'quotes/'+ payload.medic_id;
        return axios.get(urlMedquo).then((response) => {
              commit('SET_QUOTES_MEDICS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      }

    },
    mutations: {      // funciones que ejecutan cambios en los estados
      SET_PATIENTS_LIST: (state, { list }) => {      // PACIENTES
        state.patients = list
      },
      SET_DATA_INIT_LIST: (state , { list }) => {
        state.typedocuments = list.typedocument;
        state.captaciones = list.catchment;
        state.ubigeos = list.ubigeo;
      },
      SET_EMPLOYEES_LIST: (state, { list }) => {      // EMPLEADOS
        state.employees = list
      },
      SET_DATA_INIT_EMPLOYEES_LIST: (state , { list }) => {
        state.typedocuments = list.typedocument;
        state.cargos = list.charge;
        state.ubigeos = list.ubigeo;
        state.horas = list.hour;
      },
      SET_CHARGES_LIST: (state, { list }) => {        // CARGOS
        state.charges = list
      },
      SET_TURNS_MEDICS_LIST: (state, { list }) => {   // TURNOS-MEDICOS
        state.turnos = list
      },
      SET_QUOTES_MEDICS_LIST: (state, { list }) => {   // CITAS-MEDICOS
        state.quotes = list
      }
    },
    getters: {        // funciones que extraen parte de los estados
      getPatientById: (state, getters) => (id) => {
        return state.patients.find(patient => patient.id == id)
      },
      getEmployeeById: (state, getters) => (id) => {
        return state.employees.find(employee => employee.id == id)
      },
      getubigeos: state => {
        return state.ubigeos
      },
      getUbigeoById: state => id => {
        return state.ubigeos.find(ubigeo => ubigeo.id == id)
      },
      getMedics: state => {
        return state.employees.filter(employee => employee.type == 1)
      },
      getCargosMedics: state => {
        return state.cargos.filter(cargo => cargo.type == 1)
      }
    }
});
