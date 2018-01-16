// archivo general de getters
export default {
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
/*     getMedics: state => {
        return state.employees.filter(employee => employee.type == 1)
    },
    getEmployees: state => {
        return state.employees.filter(employee => employee.type == 0)
    }, */    
    getMedicsAutocomplete: state => {
        return state.employeelist.filter(employee => employee.type == 1)
    },
    getMedicsCombobox: state => {
        //console.log("datos combo: ", state.employeecombo)
        return state.employeecombo.filter(employee => employee.type == 1)
    },    
    getEmployeesAutocomplete: state => {
        return state.employeelist
    },    
    getCargosMedics: state => {
        return state.cargos.filter(cargo => cargo.type == 1)
    },
    getCargosEmployees: state => {
        return state.cargos.filter(cargo => cargo.type == 0)
    },    
    getQuoteById: (state, getters) => (id) => {
        return state.quotes.find(quote => quote.id == id)
    },
    getProfileById: (state, getters) => (id) => {
        return state.profiles.find(profile => profile.id == id)
    },     
}