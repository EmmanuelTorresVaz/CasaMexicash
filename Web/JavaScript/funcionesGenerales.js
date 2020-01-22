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

    return diaActual;
}

function sumarDias($diasASumar) {
    var fecha = new Date(),
        dia = fecha.getDate(),
        mes = fecha.getMonth() + 1,
        anio = fecha.getFullYear(),
        addTime = $diasASumar * 86400; //Tiempo en segundos
    fecha.setSeconds(addTime); //Añado el tiempo
    var fechaDias = fecha.getDate() + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear();
    return fechaDias;
}

function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    else if (tecla == 0 || tecla == 9) return true;
    // patron =/[0-9\s]/;// -> solo letras
    patron = /[0-9\s]/;// -> solo numeros
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function salirPagina() {
    alert("entra")
    location.href='../../../index.php';
}
