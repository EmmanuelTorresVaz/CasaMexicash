function fechaActual() {
    var diaActual = new Date();
    var dia = diaActual.getDate();
    var mes = diaActual.getMonth() + 1;
    var anio = diaActual.getFullYear();
    if (dia < 10) {
        dia = '0' + dia;
    }
    if (mes < 10) {
        mes = '0' + mes;
    }
     // diaActual = dia + '/' + mes + '/' + anio;
    diaActual = anio + '/' + mes + '/' + dia;

    alert(diaActual);
    return diaActual;
}

function sumarDias($diasASumar) {
    var diaActual = new Date();
    diaActual.setDate(diaActual.getDate() + $diasASumar);
    var dia = diaActual.getDate();
    var mes = diaActual.getMonth() + 1;
    var anio = diaActual.getFullYear();
    if (dia < 10) {
        dia = '0' + dia;
    }
    if (mes < 10) {
        mes = '0' + mes;
    }
    diaActual = dia + '/' + mes + '/' + anio;
    return diaActual;
}