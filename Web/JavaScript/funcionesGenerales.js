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
    diaActual = anio + '-' + mes + '-' + dia;

    return diaActual;
}

function sumarDias($diasASumar) {
    var fecha = new Date(),
        dia = fecha.getDate(),
        mes = fecha.getMonth() + 1,
        anio = fecha.getFullYear(),
        addTime = $diasASumar * 86400; //Tiempo en segundos
    fecha.setSeconds(addTime); //Añado el tiempo
    var mesNuevo = fecha.getMonth() + 1;
    var diaNuevo = fecha.getDate();

    if (mesNuevo < 10) {
        mesNuevo = "0" + mesNuevo;
    }
    if (diaNuevo < 10) {
        diaNuevo = "0" + diaNuevo;
    }

    var fechaDias = fecha.getFullYear() + "-" + mesNuevo + "-" + diaNuevo;
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


function isNumberDecimal(e) {
    var tecla;
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    var patron;
    patron = /[0-9.]/
    var te;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function fechaPrueba() {
    var tipoText = $('#idFecVencimiento').text();
    var tipoText2 = $('#idFechaAlm').val();

    var dataEnviar = {
        "tipo": 10,
        "descripcion": tipoText
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Electronicos/Electronico.php',
        type: 'post',
        success: function (response) {
            alert(response)
            if (response == 1) {
                alertify.success("Se guardo la fecha bien");

            } else {
                alertify.error("Error .");
            }
        },
    })

}

function formatStringToDate(text) {
    var myDate = text.split('-');
    return new Date(myDate[0], myDate[1] - 1, myDate[2]);

}

function fechaFormato() {
    var fecha = new Date();
    var mesNuevo = fecha.getMonth() + 1;
    var diaNuevo = fecha.getDate();

    if (mesNuevo < 10) {
        mesNuevo = "0" + mesNuevo;
    }
    if (diaNuevo < 10) {
        diaNuevo = "0" + diaNuevo;
    }

    var fechaHoyFormat = fecha.getFullYear() + "-" + mesNuevo + "-" + diaNuevo;
    return fechaHoyFormat;
}

function pruebadecimal() {
    var num = 9.3;
    alert(num)
    num = Math.round(num * 100) / 100;
    alert(num)
}

function isDateValidate(e) {
    var tecla;
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    var patron;
    patron = /[0-9-]/
    var te;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

//Saber el tipo de dato
//alert(typeof (totalVencInteres))
//Obtener el valor texto de un select
//  $('select[name="lineas"] option:selected').text());