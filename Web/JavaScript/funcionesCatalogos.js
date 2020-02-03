

function llenarComboMunicipio() {
    $('#idMunicipio').prop('disabled',false);
    $('#idLocalidad').prop('disabled',true);
    $('#idMunicipio').val(0);
    $('#idLocalidad').val(0);
    var dataEnviar = {
        "Estado":  $('#idEstado').val(),
        "tipoConsulta" :1
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Catalogos.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_Municipio = datos[i].id_Municipio;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_Municipio + '>' + descripcion + '</option>';
            }
            $('#idMunicipio').html(html);
        }
    });
}

function llenarComboLocalidad() {
    $('#idLocalidad').prop('disabled',false);
    $('#idLocalidad').val(0);
    var dataEnviar = {
        "Estado":  $('#idEstado').val(),
        "Municipio":  $('#idMunicipio').val(),
        "tipoConsulta" :2
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Catalogos.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_Localidad = datos[i].id_Localidad;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_Localidad + '>' + descripcion + '</option>';
            }
            $('#idLocalidad').html(html);
        }
    });
}

function cargarTablaCatMetales($tipoMetal) {
        var dataEnviar = {
            "tipoMetal" :$tipoMetal
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos/tblCatMetales.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                var html = '';
                var i = 0;
                for (i; i < datos.length; i++) {
                    var id_Kilataje = datos[i].id_Kilataje;
                    var TipoMetal = datos[i].TipoMetal;
                    var DesMetal = datos[i].DesMetal;
                    var precio = datos[i].precio;
                    if (TipoMetal === null) {
                        TipoMetal = '';
                    }
                    if (DesMetal === null) {
                        DesMetal = '';
                    }
                    if (precio === null) {
                        precio = '0.00';
                    }
                    html += '<tr>' +
                        '<td align="center">' + TipoMetal + '</td>' +
                        '<td align="center">' + DesMetal + '</td>' +
                        '<td align="center">$' + precio + '</td>' +
                        '<td><input type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalActualizarMetal"' +
                        'value="Editar"  onclick="modalEditarMetal('+id_Kilataje+')"></td>' +
                        '<td><input type="button" class="btn btn-danger" value="Eliminar" ' +
                        'onclick="confirmarEliminarCatMetal(' + id_Kilataje + ')"></td>' +
                        '</tr>';
                }

                $('#idCatMetales').html(html);
            }
        });
}

//Alerta para confirmar la Eliminacion
function confirmarEliminarCatMetal($idMetal) {
    alertify.confirm('Eliminar',
        'Confirme eliminacion de articulo seleccionado.',
        function () {
            eliminarMetal($idMetal)
        },
        function () {
            alertify.error('Cancelado')
        });
}
//Elimina metal
function eliminarMetal($idMetal) {
    var $tipoMetal = $("#idTipoMetalCat").val();
    var dataEnviar = {
        "tipo": 1,
        "idMetal": $idMetal
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Catalogos/ActualizarMetal.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                cargarTablaCatMetales($tipoMetal)
                alertify.success("Eliminado con éxito.");
            } else {
                alertify.error("Error al eliminar metal.");
            }
        },
    })

}
function modalEditarMetal($idMetal) {
    var dataEnviar = {
        "tipo" : 4,
        "idMetal": $idMetal
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Catalogos/ActualizarMetal.php',
        type: 'post',
        dataType: "json",
        success: function (datos) {
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_Kilataje = datos[i].id_Kilataje;
                var TipoMetal = datos[i].TipoMetal;
                var DesMetal = datos[i].DesMetal;
                var precio = datos[i].precio;
                if (TipoMetal === null) {
                    TipoMetal = '';
                }
                if (DesMetal === null) {
                    DesMetal = '';
                }
                if (precio === null) {
                    precio = '0.00';
                }
                $("#idKilatajeEditModal").val(id_Kilataje);
                $('#idTipoCatMetEditModal').val(TipoMetal);
                $('#idUnidadEditModal').val(DesMetal);
                $('#idPrecioEditModal').val(precio);
            }
        }
    })

}
function guardarMetal() {
    var idTipo =  $('#idTipoMetalCatModal').val();
    var unidad =  $('#idUnidadModal').val();
    var precio =  $('#idPrecioModal').val();
    var dataEnviar = {
        "tipo" : 3,
        "idTipo": idTipo,
        "unidad": unidad,
        "precio": precio
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Catalogos/ActualizarMetal.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                cargarTablaCatMetales(idTipo)
                alertify.success("Guardado con éxito.");
            } else {
                alertify.error("Error al guardar metal.");
            }
        },
    })

}
function actualizarMetal() {
    var $idMetal =  $('#idKilatajeEditModal').val();
    var precio =  $('#idPrecioEditModal').val();
    var $tipoMetal = $("#idTipoMetalCat").val();
    var dataEnviar = {
        "tipo": 2,
        "idMetal": $idMetal,
        "precio": precio
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Catalogos/ActualizarMetal.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                cargarTablaCatMetales($tipoMetal)
                alertify.success("Guardado con éxito.");
            } else {
                alertify.error("Error al guardar precio metal.");
            }
        },
    })

}