function agregarCliente() {
    //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
    var dataEnviar = {
        "idNombre": $("#idNombre").val(),
        "idApPat": $("#idApPat").val(),
        "idApMat": $("#idApMat").val(),
        "idSexo": $("#idSexo").val(),
        "idFechaNac": $("#idFechaNac").val(),
        "idRfc": $("#idRfc").val(),
        "idCurp": $("#idCurp").val(),
        "idCelular": $("#idCelular").val(),
        "idTelefono": $("#idTelefono").val(),
        "idCorreo": $("#idCorreo").val(),
        "idOcupacion": $("#idOcupacion").val(),
        "idIdentificacion": $("#idIdentificacion").val(),
        "idNumIdentificacion": $("#idNumIdentificacion").val(),
        "idEstado": $("#idEstado").val(),
        "idMunicipio": $("#idMunicipio").val(),
        "idLocalidad": $("#idLocalidad").val(),
        "idCalle": $("#idCalle").val(),
        "idCP": $("#idCP").val(),
        "idNumExt": $("#idNumExt").val(),
        "idNumInt": $("#idNumInt").val(),
        "idPromocion": $("#idPromocion").val(),
        "idMensajeInterno": $("#idMensajeInterno").val()
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/RegistroCliente.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                alertify.success("Cliente agregado exitosamente.");
               LimpiarRegistroCliente();
            } else {
                alertify.error("Error al agregar cliente.");
            }
        },
    })
}

function mostrarTablaExtras() {
}

function nombreAutocompletar() {
    $('#idNombres').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idNombres=' + key;
        var dataEnviar = {
            "idNombres": key
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/AutocompleteCliente.php',
            data: dataEnviar,
            success: function (data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idNombres').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    alert('Has seleccionado el ' + id + ' ' + $('#' + id).attr('data'));
                    return false;
                });

            }
        });
    });
}

function LimpiarRegistroCliente() {
    $("#idNombre").val("");
    $("#idApPat").val("");
    $("#idApMat").val("");
    $("#idFechaNac").val("");
    $("#idSexo").val("");
    $("#idRfc").val("");
    $("#idCurp").val("");
    $("#idCelular").val("");
    $("#idTelefono").val("");
    $("#idCorreo").val("");
    $("#idOcupacion").val("");
    $("#idIdentificacion").val("");
    $("#idNumIdentificacion").val("");
    $("#idEstado").val("");
    $("#idMunicipio").val("");
    $("#idLocalidad").val("");
    $("#idCalle").val("");
    $("#idCP").val("");
    $("#idNumExt").val("");
    $("#idNumInt").val("");
    $("#idPromocion").val("");
    $("#idMensajeInterno").val("");
}
