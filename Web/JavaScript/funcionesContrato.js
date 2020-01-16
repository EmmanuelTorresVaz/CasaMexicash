function generarContrato() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    var tipoInteres = $("#tipoInteres").val();
    var contratoTemporal = cargarTablaArticulo();


    var validate = true;
    if (clienteEmpeno =='' || clienteEmpeno == null) {
        alert("Por Favor. Selecciona un cliente.");
        validate = false;
    } else if (tipoInteres == '' || tipoInteres == null) {
        alert("Por Favor. Selecciona tipo de interes.");
        validate = false;
    } else if (contratoTemporal == 0) {
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
            "fecha_creacion": '',
            "fecha_modifiacion": '',
            "usuario": 1,
        };

        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Contrato.php',
            type: 'post',
            success: function (response) {
                if (response) {
                    alertify.success("Contrato generado");
                    //Limpiar();
                } else {
                    alertify.error("Error al generar contrato.");
                }
            },
        })
    }
}

//consultar contratos
function consultarContratos() {
    var contratoTemporal = $("#idContratoTemp").val();
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
