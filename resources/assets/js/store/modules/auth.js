//import axios from 'axios'

const state = {
  user: null,
  authenticated: false,
  token: null
}

const mutations = {
  SAVE_TOKEN(state) {
    //localStorage.setItem('token', data)
    //state.token = data
    state.authenticated = true
  },

  SET_CURRENT_USER(state, data) {
    state.user = data
  },

  LOGOUT(state) {
    //localStorage.removeItem('token')
    //state.token = null
    state.authenticated = false
    //state.user = null
    //state.notes = []
  }
}

const actions = {
  saveToken({commit}) {
    commit('SAVE_TOKEN')
  },

  setCurrentUser({commit}, user) {
    commit('SET_CURRENT_USER', user)
  },

  closeSession({commit}){
    commit('LOGOUT')
  },

  logout({commit}) {
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

  refreshToken({commit}) {
    return new Promise((resolve, reject) => {
      axios.post('/api/refresh-token')
      .then(function (response) {
        resolve(response)
      })
      .catch(function (error) {
        console.log(error)
        reject(error)
      });
    }, error => console.log("error refresh:",error))
  }
}

const getters = {
  currentUser: (state) => {
    return state.user
  },

  authenticated: (state) => {
    return state.authenticated
  }
}


export default {
  state,
  mutations,
  actions,
  getters
}
