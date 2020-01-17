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
    if (idNombre == "" || idNombre == null) {
        alert("Por favor ingrese un nombre.");
        validacion = false;
    } else if (idApPat == "" || idApPat == null) {
        alert("Por favor ingrese apellido paterno.");
        validacion = false;
    } else if (idSexo == "" || idSexo == null) {
        alert("Por favor seleccione el campo sexo.");
        validacion = false;
    } else if (idFechaNac == "" || idFechaNac == null) {
        alert("Por favor ingrese fecha de nacimiento.");
        validacion = false;
    } else if (idCelular == "" || idCelular == null) {
        alert("Por favor ingrese numero celular.");
        validacion = false;
    } else if (idIdentificacion == "" || idIdentificacion == null) {
        alert("Por favor ingrese tipo de identificacion.");
        validacion = false;
    } else if (idNumIdentificacion == "" || idNumIdentificacion == null) {
        alert("Por favor ingrese número de identificación.");
        validacion = false;
    } else if (idEstado == "" || idEstado == null) {
        alert("Por favor seleccione un estado.");
        validacion = false;
    } else if (idMunicipio == "" || idMunicipio == null) {
        alert("Por favor seleccione un municipio.");
        validacion = false;
    } else if (idLocalidad == "" || idLocalidad == null) {
        alert("Por favor seleccione una Localidad.");
        validacion = false;
    } else if (idCalle == "" || idCalle == null) {
        alert("Por favor ingrese la calle.");
        validacion = false;
    } else if (idNumExt == "" || idNumExt == null) {
        alert("Por favor ingrese número exterior.");
        validacion = false;
    }


    if (validacion == true) {
        var dataEnviar = {
            "idNombre": idNombre,
            "idApPat": idApPat,
            "idApMat": $("#idApMat").val(),
            "idSexo": idSexo,
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
            "idLocalidad": idLocalidad,
            "idCalle": idCalle,
            "idCP": $("#idCP").val(),
            "idNumExt": idNumExt,
            "idNumInt": $("#idNumInt").val(),
            "idPromocion": $("#idPromocion").val(),
            "idMensajeInterno": $("#idMensajeInterno").val().trim()
        };
        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Cliente/RegistroCliente.php',
            type: 'post',
            success: function (response) {
                if (response == 1) {
                    $("#idFormRegistro")[0].reset();
                    $("#modalRegistroNuevo").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    buscarClienteAgregado();
                    alertify.success("Cliente agregado.");
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
            url: '../../../com.Mexicash/Controlador/Cliente/AutocompleteCliente.php',
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
                    //var estado = $('#' + id).attr('estadoDesc');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idClienteEmpeno').val(id);
                    $('#idNombres').val($('#' + id).attr('data'));
                    $("#idCelularEmpeno").val(celular);
                    $("#idDireccionEmpeno").val(direccionComp);
                    $("#btnEditar").prop('disabled', false);
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

function modalEditarCliente($clienteEmpeno) {
    $("#idClienteEditar").val($clienteEmpeno);
    if($clienteEmpeno==''||$clienteEmpeno==null){
        alert("Por favor selecciona un cliente.")
    }else {
        $("#idClienteEditar").val($clienteEmpeno);
        var dataEnviar = {
            "idClienteEditar": $clienteEmpeno
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Cliente/BuscarClienteDatos.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                for (i = 0; i < datos.length; i++) {
                    var nombre = datos[i].nombre;
                    var apellido_Pat = datos[i].apellido_Pat;
                    var apellido_Mat = datos[i].apellido_Mat;
                    var sexo = datos[i].sexo;
                    var fecha_Nacimiento = datos[i].fecha_Nacimiento;
                    var curp = datos[i].curp;
                    var ocupacion = datos[i].ocupacion;
                    var tipo_Identificacion = datos[i].tipo_Identificacion;
                    var num_Identificacion = datos[i].num_Identificacion;
                    var celular = datos[i].celular;
                    var rfc = datos[i].rfc;
                    var telefono = datos[i].telefono;
                    var correo = datos[i].correo;
                    var estado = datos[i].estado;
                    var estadoName = datos[i].estadoName;
                    var codigo_Postal = datos[i].codigo_Postal;
                    var municipio = datos[i].municipio;
                    var municipioName = datos[i].municipioName;
                    var localidad = datos[i].localidad;
                    var localidadName = datos[i].localidadName;
                    var calle = datos[i].calle;
                    var num_exterior = datos[i].num_exterior;
                    var num_interior = datos[i].num_interior;
                    var mensaje = datos[i].mensaje;
                    var promocion = datos[i].promocion;

                    if (nombre === null) {
                        nombre = '';
                    }
                    if (apellido_Pat === null) {
                        apellido_Pat = '';
                    }
                    if (apellido_Mat === null) {
                        apellido_Mat = '';
                    }
                    if (sexo === null) {
                        sexo = '';
                    }
                    if (fecha_Nacimiento === null) {
                        fecha_Nacimiento = '';
                    }
                    if (curp === null) {
                        curp = '';
                    }
                    if (ocupacion === null) {
                        ocupacion = '';
                    }
                    if (tipo_Identificacion === null) {
                        tipo_Identificacion = '';
                    }
                    if (num_Identificacion === null) {
                        num_Identificacion = '';
                    }
                    if (celular === null) {
                        celular = '';
                    }
                    if (rfc === null) {
                        rfc = '';
                    }
                    if (telefono === null) {
                        telefono = '';
                    }
                    if (correo === null) {
                        correo = '';
                    }
                    if (estado === null) {
                        estado = '';
                    }
                    if (estadoName === null) {
                        estadoName = '';
                    }
                    if (codigo_Postal === null) {
                        codigo_Postal = '';
                    }
                    if (municipio === null) {
                        municipio = '';
                    }
                    if (municipioName === null) {
                        municipioName = '';
                    }
                    if (localidad === null) {
                        localidad = '';
                    }
                    if (localidadName === null) {
                        localidadName = '';
                    }
                    if (calle === null) {
                        calle = '';
                    }
                    if (num_exterior === null) {
                        num_exterior = '';
                    }
                    if (num_interior === null) {
                        num_interior = '';
                    }
                    if (mensaje === null) {
                        mensaje = '';
                    }
                    if (promocion === null) {
                        promocion = '';
                    }


                    $("#idNombreEdit").val(nombre);
                    $("#idApMatEdit").val(apellido_Mat);
                    $("#idApPatEdit").val(apellido_Pat);
                    $("#idSexoEdit").val(sexo);
                    $("#idIdentificacionEdit").val(tipo_Identificacion);
                    $("#idNumIdentificacionEdit").val(num_Identificacion);
                    $("#idFechaNacEdit").val(fecha_Nacimiento);
                    $("#idCorreoEdit").val(correo);

                    $("#idRfcEdit").val(rfc);
                    $("#idCurpEdit").val(curp);
                    $("#idCelularEdit").val(celular);
                    $("#idTelefonoEdit").val(telefono);
                    $("#idEstadoEdit").val(estado);
                    $("#idEstadoNameEdit").val(estadoName);
                    $("#idMunicipioEdit").val(municipio);
                    $("#idMunicipioNameEdit").val(municipioName);

                    $("#idLocalidadEdit").val(localidad);
                    $("#idLocalidadNameEdit").val(localidadName);
                    $("#idCalleEdit").val(calle);
                    $("#idCPEdit").val(codigo_Postal);
                    $("#idNumIntEdit").val(num_interior);
                    $("#idNumExtEdit").val(num_exterior);
                    $("#idOcupacionEdit").val(ocupacion);
                    $("#idMensajeInternoEdit").val(mensaje);
                    $("#idPromocionEdit").val(promocion);
                }
            }
        });
    }
}

//Alerta para confirmar la actualizacion
function confirmarActualizacion() {
    var idClienteEdit = $("#idClienteEditar").val();
    if (idClienteEdit == "" || idClienteEdit == null) {
        alert("Por favor seleccione un usuario en la pantalla anterior.");
        $("#modalEditarNuevo").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $("#btnEditar").prop('disabled', true);

    }else{
        alertify.confirm('Actualizar',
            'Confirme actualizacion del cliente.',
            function () {
                actualizarCliente()
            },
            function () {
                alertify.error('Cancelado')
            });
    }

}

function actualizarCliente() {
    //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
    var idNombre = $("#idNombreEdit").val();
    var idApPat = $("#idApPatEdit").val();
    var idSexo = $("#idSexoEdit").val();
    var idFechaNac = $("#idFechaNacEdit").val();
    var idCelular = $("#idCelularEdit").val();
    var idIdentificacion = $("#idIdentificacionEdit").val();
    var idNumIdentificacion = $("#idNumIdentificacionEdit").val();
    var idEstado = $("#idEstadoEdit").val();
    var idMunicipio = $("#idMunicipioEdit").val();
    var idLocalidad = $("#idLocalidadEdit").val();
    var idCalle = $("#idCalleEdit").val();
    var idNumExt = $("#idNumExtEdit").val();
    var validacion = true;
     if (idNombre == "" || idNombre == null) {
        alert("Por favor ingrese un nombre.");
        validacion = false;
    } else if (idApPat == "" || idApPat == null) {
        alert("Por favor ingrese apellido paterno.");
        validacion = false;
    } else if (idSexo == "" || idSexo == null) {
        alert("Por favor seleccione el campo sexo.");
        validacion = false;
    } else if (idFechaNac == "" || idFechaNac == null) {
        alert("Por favor ingrese fecha de nacimiento.");
        validacion = false;
    } else if (idCelular == "" || idCelular == null) {
        alert("Por favor ingrese numero celular.");
        validacion = false;
    } else if (idIdentificacion == "" || idIdentificacion == null) {
        alert("Por favor ingrese tipo de identificacion.");
        validacion = false;
    } else if (idNumIdentificacion == "" || idNumIdentificacion == null) {
        alert("Por favor ingrese número de identificación.");
        validacion = false;
    } else if (idEstado == "" || idEstado == null) {
        alert("Por favor seleccione un estado.");
        validacion = false;
    } else if (idMunicipio == "" || idMunicipio == null) {
        alert("Por favor seleccione un municipio.");
        validacion = false;
    } else if (idLocalidad == "" || idLocalidad == null) {
        alert("Por favor seleccione una Localidad.");
        validacion = false;
    } else if (idCalle == "" || idCalle == null) {
        alert("Por favor ingrese la calle.");
        validacion = false;
    } else if (idNumExt == "" || idNumExt == null) {
        alert("Por favor ingrese número exterior.");
        validacion = false;
    }


    if (validacion == true) {
        var dataEnviar = {
            "idClienteEditar" : $("#idClienteEditar").val(),
            "idNombre": idNombre,
            "idApPat": idApPat,
            "idApMat": $("#idApMatEdit").val(),
            "idSexo": idSexo,
            "idFechaNac": idFechaNac,
            "idRfc": $("#idRfcEdit").val(),
            "idCurp": $("#idCurpEdit").val(),
            "idCelular": idCelular,
            "idTelefono": $("#idTelefonoEdit").val(),
            "idCorreo": $("#idCorreoEdit").val(),
            "idOcupacion": $("#idOcupacionEdit").val(),
            "idIdentificacion": idIdentificacion,
            "idNumIdentificacion": idNumIdentificacion,
            "idEstado": idEstado,
            "idMunicipio": idMunicipio,
            "idLocalidad": idLocalidad,
            "idCalle": idCalle,
            "idCP": $("#idCPEdit").val(),
            "idNumExt": idNumExt,
            "idNumInt": $("#idNumIntEdit").val(),
            "idPromocion": $("#idPromocionEdit").val(),
            "idMensajeInterno": $("#idMensajeInternoEdit").val().trim()
        };
        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Cliente/ActualizarCliente.php',
            type: 'post',
            success: function (response) {
                if (response == 1) {
                    $("#idFormRegistro")[0].reset();
                    $("#modalEditarNuevo").modal('hide');//ocultamos el modal
                    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
                    alertify.success("Cliente actualizado.");
                } else {
                    alertify.error("Error al actualizar cliente.");
                }
            },
        })
    }

}


function buscarClienteAgregado() {
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Cliente/BuscarClienteAgregado.php',
        success: function (response) {
            alert(response)
            if (response.status == 'ok') {
                document.getElementById('idTipoInteres').innerHTML =response.result.tipoInteres;
                $("#idClienteEmpeno").val(response.result.idCliente);
                $("#idNombres").val(response.result.NombreCompleto);
                $("#idCelularEmpeno").val(response.result.celular);
                $("#idDireccionEmpeno").val(response.result.direccionCompleta);
                $("#btnEditar").prop('disabled', false);
            }
        }
    });
}
