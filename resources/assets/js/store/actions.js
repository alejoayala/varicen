// archivo general de actions
export default {
    LOGOUT({ commit }) {
        return new Promise((resolve, reject) => {
            axios.post('/api/logout')
                .then(function (response) {
                    commit('LOGOUT')
                    resolve()
                })
                .catch(function (error) {
                    console.log(error)
                    reject(error)
                });
        }, error => console.log(error))
    },
    SAVE_TOKEN({ commit }, payload ) {
        commit('SAVE_TOKEN', { datos: payload })
    },
    CLOSE_SESSION({ commit }) {
        commit('LOGOUT')
    },
    LOAD_PATIENTS_LIST: function ({ commit }, payload) {
        commit('SET_BLANK_PATIENTS_LIST')
        var urlPatients = '/api/patients';
        return axios.get(urlPatients, {
            params: {
                page: payload.page,
                patient_name: payload.search
            }
        }).then((response) => {
            commit('SET_PATIENTS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_PATIENTS_AUTOCOMPLETE_LIST: function ({ commit }) {
        var urlPatients = '/api/patientlist';
        return axios.get(urlPatients).then((response) => {
            commit('SET_PATIENTS_AUTOCOMPLETE_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_DATA_INIT_LIST: function ({ commit }) {
        var urlType = '/api/patients/create';
        return axios.get(urlType).then((response) => {
            commit('SET_DATA_INIT_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_EMPLOYEES_LIST: function ({ commit }, payload) {
        var urlEmployees = '/api/employees';
        return axios.get(urlEmployees, {
            params: {
                page: payload.page,
                medic_name: '',
                type: payload.type
            }
        }).then((response) => {
            commit('SET_EMPLOYEES_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_EMPLOYEES_AUTOCOMPLETE_LIST: function ({ commit }) {
        var urlEmployees = '/api/employeelist';
        return axios.get(urlEmployees).then((response) => {
            commit('SET_EMPLOYEES_AUTOCOMPLETE_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_DATA_INIT_EMPLOYEES_LIST: function ({ commit }) {
        var urlType = '/api/employees/create';
        return axios.get(urlType).then((response) => {
            commit('SET_DATA_INIT_EMPLOYEES_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_CHARGES_LIST: function ({ commit }) {
        var urlCharges = '/api/charges';
        return axios.get(urlCharges).then((response) => {
            commit('SET_CHARGES_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_TURNS_MEDICS_LIST: function ({ commit }, payload) {
        var urlMedshi = '/api/medicalshifts/' + payload.employee_id;
        return axios.get(urlMedshi).then((response) => {
            commit('SET_TURNS_MEDICS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_QUOTES_LIST: function ({ commit }) {
        var urlquo = '/api/quotes';
        return axios.get(urlquo).then((response) => {
            commit('SET_QUOTES_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_QUOTES_MEDICS_LIST: function ({ commit }, payload) {
        commit('SET_BLANK_QUOTES_MEDICS_LIST')
        var urlMedquo = '/api/quotes/' + payload.medic_id;
        return axios.get(urlMedquo).then((response) => {
            commit('SET_QUOTES_MEDICS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_TYPETREATMENTS_AUTOCOMPLETE_LIST: function ({ commit }) {
        var url = '/api/typetreatmentlist';
        return axios.get(url).then((response) => {
            commit('SET_TYPETREATMENTS_AUTOCOMPLETE_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_AFFECTIONS_LIST: function ({ commit }) {
        var url = '/api/affections';
        return axios.get(url).then((response) => {
            commit('SET_AFFECTIONS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_ATTENTIONS_LIST: function ({ commit }) {
        var url = '/api/attentions';
        return axios.get(url).then((response) => {
            commit('SET_ATTENTIONS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_ATTENTION_ID_QUOTE: function ({ commit }, payload) {
        var url = '/api/attentions/' + payload.quote_id;
        return axios.get(url).then((response) => {
            commit('SET_ATTENTION_ID_QUOTE', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_ATTENTIONS_ID_PATIENT: function ({ commit }, payload) {
        var url = '/api/attentionpatients/' + payload.patient_id;
        return axios.get(url).then((response) => {
            commit('SET_ATTENTIONS_ID_PATIENT', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },
    LOAD_SALES_ID_PATIENT: function ({ commit }, payload) {
        var url = '/api/salespatients/' + payload.patient_id;
        return axios.get(url).then((response) => {
            commit('SET_SALES_ID_PATIENT', { list: response.data })
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
    LOAD_PROFILE_USER: function ({ commit , state }) {
        if(state.user_system != null){
            var url = "/api/profiles/" + state.user_system.user.employee.profile_id
            return axios.get(url).then((response) => {
                commit('SET_PROFILE_USER', { list: response.data })
            }, (err) => {
                console.log(err)
            });
        }
        commit('SET_PROFILE_USER', { list: null})
    }, 
    LOAD_EXCHANGE_RATE_LIST: function ({ commit }, payload) {
        var urlExchanges = '/api/exchangerates';
        return axios.get(urlExchanges, {
            params: {
                page: payload.page
            }
        }).then((response) => {
            commit('SET_EXCHANGE_RATE_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },  
    LOAD_CHORES_ASIGNADAS_LIST: function ({ commit }, payload) {
        var urlChores = '/api/chores';
        return axios.get(urlChores, {
            params: {
                page: payload.page,
                filter: 1,
                search: payload.employee_id
            }
        }).then((response) => {
            commit('SET_CHORES_ASIGNADAS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    }, 
    LOAD_CHORES_DESIGNADAS_LIST: function ({ commit }, payload) {
        var urlChores = '/api/chores';
        return axios.get(urlChores, {
            params: {
                page: payload.page,
                filter: 2,
                search: payload.user_id
            }
        }).then((response) => {
            commit('SET_CHORES_DESIGNADAS_LIST', { list: response.data })
        }, (err) => {
            console.log(err)
        });
    },              
}