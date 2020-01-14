function generarContrato() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    if (clienteEmpeno != 0) {
        var tipoInteres = $("#tipoInteres").val();
        if (tipoInteres != 0) {
            //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
            var dataEnviar = {
                "idCliente": clienteEmpeno,
                "id_Interes": tipoInteres,
                "folio": 1,
                "fechaVencimiento": $("#idFecVencimiento").val(),
                "totalAvaluo": 1,
                "totalPrestamo": 1,
                "abono": 0,
                "intereses":0,
                "pago": 0,
                "fecha_Alm":$("#idFecVencimiento").val(),
                "fecha_Movimiento": $("#idFecVencimiento").val(),
                "origen_Folio": 1,
                "dest_Folio": 2,
                "estatus": 1,
                "observaciones":33,
                "fecha_creacion" : $("#idFecVencimiento").val(),
                "fecha_modifiacion" : $("#idFecVencimiento").val(),
            };

            $.ajax({
                data: dataEnviar,
                url: '../../../com.Mexicash/Controlador/Contrato.php',
                type: 'post',
                success: function (response) {
                    if (response == 5) {
                        alertify.success("Contrato generado");
                        //Limpiar();
                    } else {
                        alertify.error("Error al generar contrato.");
                    }
                },
            })
        } else {
            alert("Por Favor. Selecciona tipo de interes.");
        }
    } else {
        alert("Por Favor. Selecciona un cliente.");
    }
}
