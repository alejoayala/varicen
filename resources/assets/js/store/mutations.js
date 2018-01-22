//  archivo general de mutations
export default {
    LOGOUT(state) {
        state.authenticated = false
        state.user_system = null
        localStorage.removeItem('autentificado')
        localStorage.removeItem('user')
    },
    SAVE_TOKEN(state , { datos }) {
        state.authenticated = true
        state.user_system = datos    // aca estan los datos del usuario loggeado        
        localStorage.setItem('autentificado', true)
        localStorage.setItem('user', JSON.stringify(datos))
    },
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
    SET_DATA_INIT_LIST: (state, { list }) => {
        state.typedocuments = list.typedocument
        state.captaciones = list.catchment
        state.ubigeos = list.ubigeo
        state.products = list.product
        state.sedes = list.venue        
    },
    SET_EMPLOYEES_LIST: (state, { list }) => {      // EMPLEADOS
        state.employees = list.employees.data
        state.employees_paginate = list.pagination
    },
    SET_EMPLOYEES_AUTOCOMPLETE_LIST: (state, { list }) => {      // EMPLEADOS
        state.employeelist = list
    },
    SET_EMPLOYEES_COMBOBOX: (state, { list }) => {      // EMPLEADOS
        //console.log("llenando:",list)
        state.employeecombo = list
    },    
    SET_DATA_INIT_EMPLOYEES_LIST: (state, { list }) => {
        state.typedocuments = list.typedocument
        state.cargos = list.charge
        state.ubigeos = list.ubigeo
        state.horas = list.hour
        state.profiles = list.profile
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
    SET_TYPETREATMENTS_COMBOBOX: (state, { list }) => {      //
        state.typetreatmentcombo = list
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
    SET_SALES_ID_PATIENT: (state, { list }) => {      //
        state.sales_id_patient = list
    },    
    SET_MODULES_LIST: (state, { list }) => {      // MODULOS
        state.modules = list
    },
    SET_PROFILES_LIST: (state, { list }) => {      // PERFILES
        state.profiles = list
    },
    SET_AFFECTIONS_ID_PATIENT: (state, { list }) => {      //
        state.affections_id_patient = list
    }, 
    SET_PROFILE_USER: (state, { list }) => {      // PERFIL DE USUARIO
        state.profile_user = list
    },   
    SET_EXCHANGE_RATE_LIST: (state, { list }) => {      // TIPO DE CAMBIO
        state.exchangerates = list.exchangerates.data
        state.exchangerates_paginate = list.pagination
    }, 
    SET_CHORES_ASIGNADAS_LIST: (state, { list }) => {      // TAREAS
        state.chores_asignadas = list.chores.data
        state.chores_asignadas_paginate = list.pagination
    }, 
    SET_CHORES_DESIGNADAS_LIST: (state, { list }) => {      // TAREAS
        state.chores_designadas = list.chores.data
        state.chores_designadas_paginate = list.pagination
    },  
    SET_COMPANY_LIST: (state, { list }) => {      // PERFILES
        state.company = list
    },    
    SET_USERS_LIST: (state, { list }) => {      // EMPLEADOS
        state.users = list.users.data
        state.users_paginate = list.pagination
    },    
}