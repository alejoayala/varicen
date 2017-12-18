import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './modules/auth'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {          // estados variables del sistema
        userProfile: [],
        patients: [],
        patients_paginate:[],
        patientlist:[],
        employees:[],
        employees_paginate: [],
        employeelist:[],
        cargos:[],
        ubigeos: [],
        typedocuments: [],
        captaciones: [],
        horas:[],
        turnos:[],
        quotes:[],
        quotesMedicos:[],
        typetreatmentlist:[],
        affections:[],
        attentions:[],
        attention_id_quote:[],
        attention_id_patient:[],
        affections_id_patient: [],        
        modules:[],
        profiles: [],
    },
    actions: {        // funciones que ejecutan las mutaciones
      LOAD_PATIENTS_LIST: function ({ commit }, payload){
        commit('SET_BLANK_PATIENTS_LIST')
        var urlPatients = '/api/patients';
        return axios.get(urlPatients, {
          params: {
            page: payload.page,
            patient_name: ''
          }
        }).then((response) => {
              commit('SET_PATIENTS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_PATIENTS_AUTOCOMPLETE_LIST: function ({ commit }){
        var urlPatients = '/api/patientlist';
        return axios.get(urlPatients).then((response) => {
              commit('SET_PATIENTS_AUTOCOMPLETE_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_DATA_INIT_LIST: function({ commit }){
        var urlType = '/api/patients/create';
        return axios.get(urlType).then((response) => {
              commit('SET_DATA_INIT_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_EMPLOYEES_LIST: function ({ commit }, payload){
        var urlEmployees = '/api/employees';
        return axios.get(urlEmployees,{
          params: {
            page: payload.page,
            medic_name: ''
          }
        }).then((response) => {
              commit('SET_EMPLOYEES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_EMPLOYEES_AUTOCOMPLETE_LIST: function ({ commit }){
        var urlEmployees = '/api/employeelist';
        return axios.get(urlEmployees).then((response) => {
              commit('SET_EMPLOYEES_AUTOCOMPLETE_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_DATA_INIT_EMPLOYEES_LIST: function({ commit }){
        var urlType = '/api/employees/create';
        return axios.get(urlType).then((response) => {
              commit('SET_DATA_INIT_EMPLOYEES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_CHARGES_LIST: function ({ commit }){
        var urlCharges = '/api/charges';
        return axios.get(urlCharges).then((response) => {
              commit('SET_CHARGES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_TURNS_MEDICS_LIST: function ({ commit },payload){
        var urlMedshi = '/api/medicalshifts/'+ payload.employee_id;
        return axios.get(urlMedshi).then((response) => {
              commit('SET_TURNS_MEDICS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_QUOTES_LIST: function ({ commit }){
        var urlquo = '/api/quotes';
        return axios.get(urlquo).then((response) => {
              commit('SET_QUOTES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_QUOTES_MEDICS_LIST: function ({ commit },payload){
        commit('SET_BLANK_QUOTES_MEDICS_LIST')
        var urlMedquo = '/api/quotes/'+ payload.medic_id;
        return axios.get(urlMedquo).then((response) => {
              commit('SET_QUOTES_MEDICS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_TYPETREATMENTS_AUTOCOMPLETE_LIST: function ({ commit }){
        var url = '/api/typetreatmentlist';
        return axios.get(url).then((response) => {
              commit('SET_TYPETREATMENTS_AUTOCOMPLETE_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_AFFECTIONS_LIST: function ({ commit }){
        var url = '/api/affections';
        return axios.get(url).then((response) => {
              commit('SET_AFFECTIONS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_ATTENTIONS_LIST: function ({ commit }){
        var url = '/api/attentions';
        return axios.get(url).then((response) => {
              commit('SET_ATTENTIONS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_ATTENTION_ID_QUOTE: function ({ commit } , payload){
        var url = '/api/attentions/'+ payload.quote_id;
        return axios.get(url).then((response) => {
              commit('SET_ATTENTION_ID_QUOTE', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_ATTENTIONS_ID_PATIENT: function ({ commit } , payload){
        var url = '/api/attentionpatients/'+ payload.patient_id;
        return axios.get(url).then((response) => {
              commit('SET_ATTENTIONS_ID_PATIENT', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_MODULES_LIST: function ({ commit }) {
        var urlModules = '/api/modules';
        return axios.get(urlModules).then((response) => {
          commit('SET_MODULES_LIST', { list: response.data })
        }, (err) => {
          console.log(err)
        });
      }, 
      LOAD_PROFILES_LIST: function ({ commit }) {
        var urlProfiles = '/api/profiles';
        return axios.get(urlProfiles).then((response) => {
          commit('SET_PROFILES_LIST', { list: response.data })
        }, (err) => {
          console.log(err)
        });
      },            
      LOAD_AFFECTIONS_ID_PATIENT: function ({ commit }, payload) {
        var url = '/api/affectionpatients/' + payload.patient_id;
        return axios.get(url).then((response) => {
          commit('SET_AFFECTIONS_ID_PATIENT', { list: response.data })
        }, (err) => {
          console.log(err)
        });
      },
    },
    mutations: {      // funciones que ejecutan cambios en los estados
      SET_PATIENTS_LIST: (state, { list }) => {      // PACIENTES
        state.patients = list.patients.data
        state.patients_paginate = list.pagination
      },
      SET_BLANK_PATIENTS_LIST: (state) => {
        state.patients = []
      },
      SET_PATIENTS_AUTOCOMPLETE_LIST: (state, { list }) => {      // PACIENTES
        state.patientlist = list
      },
      SET_DATA_INIT_LIST: (state , { list }) => {
        state.typedocuments = list.typedocument;
        state.captaciones = list.catchment;
        state.ubigeos = list.ubigeo;
      },
      SET_EMPLOYEES_LIST: (state, { list }) => {      // EMPLEADOS
        state.employees = list.employees.data
        state.employees_paginate = list.paginate
      },
      SET_EMPLOYEES_AUTOCOMPLETE_LIST: (state, { list }) => {      // PACIENTES
        state.employeelist = list
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
      SET_QUOTES_LIST: (state, { list }) => {   // CITAS-MEDICOS
        state.quotes = list
      },
      SET_BLANK_QUOTES_MEDICS_LIST: (state) => {   // CITAS-MEDICOS
        state.quotesMedicos = []
      },
      SET_QUOTES_MEDICS_LIST: (state, { list }) => {   // CITAS-MEDICOS
        state.quotesMedicos = list
      },
      SET_TYPETREATMENTS_AUTOCOMPLETE_LIST: (state, { list }) => {      //
        state.typetreatmentlist = list
      },
      SET_AFFECTIONS_LIST: (state, { list }) => {      //
        state.affections = list
      },
      SET_ATTENTION_ID_QUOTE: (state, { list }) => {      //
        state.attention_id_quote = list
      },
      SET_ATTENTIONS_ID_PATIENT: (state, { list }) => {      //
        state.attention_id_patient = list
      },
      SET_MODULES_LIST: (state, { list }) => {      // PACIENTES
        state.modules = list
      },   
      SET_PROFILES_LIST: (state, { list }) => {      // PACIENTES
        state.profiles = list
      }, 
      SET_AFFECTIONS_ID_PATIENT: (state, { list }) => {      //
        state.affections_id_patient = list
      },               
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
      getMedicsAutocomplete: state => {
        return state.employeelist.filter(employee => employee.type == 1)
      },
      getCargosMedics: state => {
        return state.cargos.filter(cargo => cargo.type == 1)
      },
      getQuoteById: (state, getters) => (id) => {
        return state.quotes.find(quote => quote.id == id)
      },
    },
    modules:{
      auth
    },
    plugins: [createPersistedState()]
});
