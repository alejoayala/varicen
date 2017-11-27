import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {          // estados variables del sistema
        userProfile: [],
        patients: [],
        patientlist:[],
        employees:[],
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
        attention_id_patient:[]
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
      LOAD_PATIENTS_AUTOCOMPLETE_LIST: function ({ commit }){
        var urlPatients = 'patientlist';
        return axios.get(urlPatients).then((response) => {
              commit('SET_PATIENTS_AUTOCOMPLETE_LIST', { list: response.data })
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
      LOAD_EMPLOYEES_LIST: function ({ commit }){
        var urlEmployees = 'employees';
        return axios.get(urlEmployees).then((response) => {
              commit('SET_EMPLOYEES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_EMPLOYEES_AUTOCOMPLETE_LIST: function ({ commit }){
        var urlEmployees = 'employeelist';
        return axios.get(urlEmployees).then((response) => {
              commit('SET_EMPLOYEES_AUTOCOMPLETE_LIST', { list: response.data })
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
      LOAD_QUOTES_LIST: function ({ commit }){
        var urlquo = 'quotes';
        return axios.get(urlquo).then((response) => {
              commit('SET_QUOTES_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_QUOTES_MEDICS_LIST: function ({ commit },payload){
        commit('SET_BLANK_QUOTES_MEDICS_LIST')
        var urlMedquo = 'quotes/'+ payload.medic_id;
        return axios.get(urlMedquo).then((response) => {
              commit('SET_QUOTES_MEDICS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_TYPETREATMENTS_AUTOCOMPLETE_LIST: function ({ commit }){
        var url = 'typetreatmentlist';
        return axios.get(url).then((response) => {
              commit('SET_TYPETREATMENTS_AUTOCOMPLETE_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_AFFECTIONS_LIST: function ({ commit }){
        var url = 'affections';
        return axios.get(url).then((response) => {
              commit('SET_AFFECTIONS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_ATTENTIONS_LIST: function ({ commit }){
        var url = 'attentions';
        return axios.get(url).then((response) => {
              commit('SET_ATTENTIONS_LIST', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_ATTENTION_ID_QUOTE: function ({ commit } , payload){
        var url = 'attentions/'+ payload.quote_id;
        return axios.get(url).then((response) => {
              commit('SET_ATTENTION_ID_QUOTE', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      },
      LOAD_ATTENTIONS_ID_PATIENT: function ({ commit } , payload){
        var url = 'attentions/'+ payload.patient_id;
        return axios.get(url).then((response) => {
              commit('SET_ATTENTIONS_ID_PATIENT', { list: response.data })
              }, (err) => {
              console.log(err)
        });
      }

    },
    mutations: {      // funciones que ejecutan cambios en los estados
      SET_PATIENTS_LIST: (state, { list }) => {      // PACIENTES
        state.patients = list
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
        state.employees = list
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
      SET_ATTENTION_ID_PATIENT: (state, { list }) => {      //
        state.attention_id_patient = list
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
    }
});
