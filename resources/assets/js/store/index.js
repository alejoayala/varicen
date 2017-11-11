import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {          // estados variables del sistema
        userProfile: [],
        patients: [],
        ubigeos: [],
        typedocuments: [],
        captaciones: []
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
      }

    },
    mutations: {      // funciones que ejecutan cambios en los estados
      SET_PATIENTS_LIST: (state, { list }) => {
        state.patients = list
      },
      SET_DATA_INIT_LIST: (state , { list }) => {
        state.typedocuments = list.typedocument;
        state.captaciones = list.catchment;
        state.ubigeos = list.ubigeo;
      }
    },
    getters: {        // funciones que extraen parte de los estados
      getPatientById: (state, getters) => (id) => {
        return state.patients.find(patient => patient.id == id)
      },
      getubigeos: state => {
        return state.ubigeos
      },
      getUbigeoById: state => id => {
        return state.ubigeos.find(ubigeo => ubigeo.id == id)
      }
    }
});
