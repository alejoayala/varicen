export function getHourTime(h) {
    return h >= 12 ? 'PM' : 'AM'
}

export function getZeroPad(n) {
    return (parseInt(n, 10) >= 10 ? '' : '0') + n
}

export function getFullMount(n) {
    let mes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    return mes[n]
}