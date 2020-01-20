//Genera contrato
function generarContrato() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    var tipoInteres = $("#tipoInteresEmpeno").val();
    var validarContratoTemporal = consultarContratos();
    var contratoTemporal = $("#idContratoTemp").text();


    var validate = true;
    if (clienteEmpeno == '' || clienteEmpeno == null) {
        alert("Por Favor. Selecciona un cliente.");
        validate = false;
    } else if (tipoInteres == '' || tipoInteres == null) {
        alert("Por Favor. Selecciona tipo de interes.");
        validate = false;
    } else if (validarContratoTemporal == 0) {
        alert("Por Favor. Ingresa los articulos.");
        validate = false;
    }
    if (validate) {
        //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
        var dataEnviar = {
            "idContrato": contratoTemporal,
            "idCliente": clienteEmpeno,
            "id_Interes": tipoInteres,
            "folio": '',
            "fechaVencimiento": $("#idFecVencimiento").val(),
            "totalAvaluo": '',
            "totalPrestamo": '',
            "abono": '',
            "intereses": '',
            "pago": '',
            "fecha_Alm": '',
            "fecha_Movimiento": '',
            "origen_Folio": '',
            "dest_Folio": '',
            "estatus": 1,
            "observaciones": '',
            "cotitular": $("#idNombreBen").val(),
            "beneficiario": $("#nombreCotitular").val(),
        };

        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Contrato.php',
            type: 'post',
            success: function (response) {
                if (response) {
                    actualizarArticulo();
                    alertify.success("Contrato generado.");

                } else {
                    alertify.error("Error al generar contrato.");
                }
            },
        })
    }
}

//consultar contratos
function consultarContratos() {
    var contratoTemporal = $("#idContratoTemp").text();
    var retorno;
    if (contratoTemporal != '') {
        var dataEnviar = {
            "idContratoTemp": contratoTemporal
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/tblArticulos.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                retorno = datos.length;
            }
        });
    } else {
        retorno = 0;
    }
    return retorno;
}

//Agrega articulos a la tabla
function actualizarArticulo() {
    var dataEnviar = {
        "contratoTemp": $("#idContratoTemp").text()
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/ArticuloUpdate.php',
        type: 'post',
        beforeSend: function () {
        },
        success: function (response) {
            if (response == -1 || response == 0) {
                alertify.error("Error al agregar articulos al contrato.");
            } else {
                $("#idFormEmpeno")[0].reset();
                alertify.success("Articulos agregados al contrato.");
                setTimeout('location.reload();', 700)
            }
        },
    })


}

//Agrega articulos obsololetos
function articulosObsoletos() {
    $.ajax({
        url: '../../../com.Mexicash/Controlador/ArticulosObsoletos.php',
        type: 'post',
        success: function (response) {
            if (response == -1 || response == 0) {
                alertify.error("Error 0001.");
            } else {
                $("#idFormEmpeno")[0].reset();
                alertify.success("Bienvenidos");
            }
        },
    })
}

//Reimprimir
function reimprimir() {
    alert("Reimprimiendo..");
}

//Canelar
function cancelar() {
    $("#idFormEmpeno")[0].reset();
    $("#idFormAuto")[0].reset();
    alertify.success("Contrato cancelado");
}

//Contrato
function generarContratoAuto() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    if (clienteEmpeno != 0) {
        var chkTarjeta = 0;
        var chkFActura = 0;
        var chkIne = 0;
        var chkImportacion = 0;
        var chkTenencia = 0;
        var chkPoliza = 0;
        var chkLicencia = 0;
        if ($('#idCheckTarjeta').is(":checked")) {
            chkTarjeta = 1;
        }
        if ($('#idCheckFactura').is(":checked")) {
            chkFActura = 1;
        }
        if ($('#idCheckINE').is(":checked")) {
            chkIne = 1;
        }
        if ($('#idCheckImportacion').is(":checked")) {
            chkImportacion = 1;
        }
        if ($('#idCheckTenecia').is(":checked")) {
            chkTenencia = 1;
        }
        if ($('#idCheckPoliza').is(":checked")) {
            chkPoliza = 1;
        }
        if ($('#idCheckLicencia').is(":checked")) {
            chkLicencia = 1;
        }


        var dataEnviar = {
            "idClienteAuto": clienteEmpeno,
            "id_Interes": $("#tipoInteresEmpeno").val(),
            "folio": '',
            "fechaVencimiento": $("#idFecVencimiento").val(),
            "totalAvaluo": '',
            "totalPrestamo": '',
            "abono": '',
            "intereses": '',
            "pago": '',
            "fecha_Alm": '',
            "fecha_Movimiento": '',
            "origen_Folio": '',
            "dest_Folio": '',
            "estatus": 1,
            "observaciones": '',
            "cotitular": $("#idNombreBen").val(),
            "beneficiario": $("#nombreCotitular").val(),
            "idTipoVehiculo": $("#idTipoVehiculo").val(),
            "idMarca": $("#idMarca").val(),
            "idModelo": $("#idModelo").val(),
            "idAnio": $("#idAnio").val(),
            "idColor": $("#idColor").val(),
            "idPlacas": $("#idPlacas").val(),
            "idFactura": $("#idFactura").val(),
            "idKms": $("#idKms").val(),
            "idAgencia": $("#idAgencia").val(),
            "idMotor": $("#idMotor").val(),
            "idSerie": $("#idChasis").val(),
            "idVehiculo": $("#idVehiculo").val(),
            "idRepuve": $("#idRepuve").val(),
            "idGasolina": $("#idGasolina").val(),
            "idAseguradora": $("#idAseguradora").val(),
            "idTarjeta": $("#idTarjeta").val(),
            "idPoliza": $("#idPoliza").val(),
            "idFechaVencAuto": $("#idFechaVencAuto").val(),
            "idTipoPoliza": $("#idTipoPoliza").val(),
            "idObservacionesAuto": $("#idObservacionesAuto").val().trim(),
            "idCheckTarjeta": chkTarjeta,
            "idCheckFactura": chkFActura,
            "idCheckINE": chkIne,
            "idCheckImportacion": chkImportacion,
            "idCheckTenecia": chkTenencia,
            "idCheckPoliza": chkPoliza,
            "idCheckLicencia": chkLicencia
        };
        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/cAuto.php',
            type: 'post',
            success: function (response) {
                if (response) {
                    $("#idFormAuto")[0].reset();
                    alertify.success("Contrato generado exitosamente.");
                } else {
                    alertify.error("Error al generar contrato.");
                }

            },
        })
    } else {
        alert("Por Favor. Selecciona un cliente.")
    }

}

function pruebasAuto() {
    var chkTarjeta = 0;
    if ($('#idCheckTarjeta').is(":checked")) {
        alert("chek")
        chkTarjeta = 1;
    } else {
        alert("no")
    }
}