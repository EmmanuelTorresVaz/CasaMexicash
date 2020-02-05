//Genera contrato
function generarContrato() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    var tipoInteres = $("#tipoInteresEmpeno").val();
    var validarContratoTemporal = consultarContratos();

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
        var totalPrestamo = parseFloat($("#idTotalPrestamo").val());
        var sumaInteresPrestamo = parseFloat($("#idTotalInteres").val());
        var totalInteres = sumaInteresPrestamo -totalPrestamo;
        totalInteres =totalInteres.toFixed(2);
        var dataEnviar = {
            "idCliente": clienteEmpeno,
            "fechaVencimiento": $("#idFecVencimiento").text(),
            "totalAvaluo": $("#idTotalAvaluo").val(),
            "totalPrestamo": totalPrestamo,
            "total_Interes": totalInteres,
            "sumaInteresPrestamo":sumaInteresPrestamo,
            "fecha_Alm": $("#idFechaAlm").val(),
            "estatus": 1,
            "cotitular": $("#nombreCotitular").val(),
            "beneficiario": $("#idNombreBen").val(),
            "plazo": $("#idPlazo").text(),
            "tasa": $("#idTasaPorcen").text(),
            "alm": $("#idAlmPorcen").text(),
            "seguro": $("#idSeguroPorcen").text(),
            "iva": $("#idIvaPorcen").text(),
            "dias": $("#diasInteres").val(),
        };

        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Contrato.php',
            type: 'post',
            success: function (response) {
                if (response) {
                    alert(response)
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
    var retorno;
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/tblArticulos.php',
            dataType: "json",
            success: function (datos) {
                retorno = datos.length;
            }
        });

    return retorno;
}

//Agrega articulos a la tabla
function actualizarArticulo() {
    var dataEnviar = {
        "contratoTemp": 1
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
//Limpia la tabla cuando cambia el tipo de articulo
function limpiarTabla() {
    $.ajax({
        url: '../../../com.Mexicash/Controlador/ArticulosObsoletos.php',
        type: 'post',
        success: function (response) {
            if (response == -1 || response == 0) {
                alertify.error("Error 0001.");
            } else {
                alertify.warning("Se limpio tabla por modificar el tipo de articulo.");
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
            "fechaVencimiento": $("#idFechaVencAuto").val(),
            "totalAvaluo":  $("#idTotalAvaluoAuto").val(),
            "totalPrestamo":  $("#idTotalPrestamoAuto").val(),
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