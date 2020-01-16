function agregarCliente() {
    //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
   var idNombre = $("#idNombre").val();
    var idApPat = $("#idApPat").val();
    var idSexo = $("#idSexo").val();
    var idFechaNac = $("#idFechaNac").val();
    var idCelular = $("#idCelular").val();
    var idIdentificacion = $("#idIdentificacion").val();
    var idNumIdentificacion = $("#idNumIdentificacion").val();
    var idEstado = $("#idEstado").val();
    var idMunicipio = $("#idMunicipio").val();
    var idLocalidad = $("#idLocalidad").val();
    var idCalle = $("#idCalle").val();
    var idNumExt = $("#idNumExt").val();
    var validacion = true;
    if(idNombre==""||idNombre==null){alert("Por favor ingrese un nombre.");validacion =false;}
    else if(idApPat==""||idApPat==null){alert("Por favor ingrese apellido paterno.");validacion =false;}
    else if(idSexo==""||idSexo==null){alert("Por favor seleccione el campo sexo.");validacion =false;}
    else if(idFechaNac==""||idFechaNac==null){alert("Por favor ingrese fecha de nacimiento.");validacion =false;}
    else if(idCelular==""||idCelular==null){alert("Por favor ingrese numero celular.");validacion =false;}
    else if(idIdentificacion==""||idIdentificacion==null){alert("Por favor ingrese tipo de identificacion.");validacion =false;}
    else if(idNumIdentificacion==""||idNumIdentificacion==null){alert("Por favor ingrese número de identificación.");validacion =false;}
    else if(idEstado==""||idEstado==null){alert("Por favor seleccione un estado.");validacion =false;}
    else if(idMunicipio==""||idMunicipio==null){alert("Por favor seleccione un municipio.");validacion =false;}
    else if(idLocalidad==""||idLocalidad==null){alert("Por favor seleccione una Localidad.");validacion =false;}
    else if(idCalle==""||idCalle==null){alert("Por favor ingrese la calle.");validacion =false;}
    else if(idNumExt==""||idNumExt==null){alert("Por favor ingrese número exterior.");validacion =false;}



    if(validacion==true){
        var dataEnviar = {
            "idNombre": idNombre,
            "idApPat": idApPat,
            "idApMat": $("#idApMat").val(),
            "idSexo":idSexo,
            "idFechaNac": idFechaNac,
            "idRfc": $("#idRfc").val(),
            "idCurp": $("#idCurp").val(),
            "idCelular": idCelular,
            "idTelefono": $("#idTelefono").val(),
            "idCorreo": $("#idCorreo").val(),
            "idOcupacion": $("#idOcupacion").val(),
            "idIdentificacion": idIdentificacion,
            "idNumIdentificacion": idNumIdentificacion,
            "idEstado": idEstado,
            "idMunicipio": idMunicipio,
            "idLocalidad":idLocalidad,
            "idCalle": idCalle,
            "idCP": $("#idCP").val(),
            "idNumExt": idNumExt,
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
                    alertify.success("Cliente agregado.");
                    $("#idFormRegistro")[0].reset();
                } else {
                    alertify.error("Error al agregar cliente.");
                }
            },
        })
    }

}

function mostrarTodos() {
alert("Funcion mostrar todo");
}

function historial() {
    alert("Funcion historial");
}

function nombreAutocompletar() {
    $('#idNombres').on('keyup', function () {
        var key = $('#idNombres').val();
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
                $('#suggestionsNombreEmpeno').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    var celular = $('#' + id).attr('celular');
                    var direccionComp = $('#' + id).attr('direccionCompleta');
                    var estado = $('#' + id).attr('estadoDesc');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idClienteEmpeno').val(id);
                    $('#idNombres').val($('#' + id).attr('data'));
                    $("#idCelularEmpeno").val(celular);
                    $("#idEstadoEmpeno").val(estado);
                    $("#idDireccionEmpeno").val(direccionComp);
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestionsNombreEmpeno').fadeOut(1000);
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
