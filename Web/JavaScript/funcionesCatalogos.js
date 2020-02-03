

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

function cargarTablaCatMetales() {
        var dataEnviar = {
            "tipo": 1
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos/tblCatMetales.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                alert(datos)
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
                        '<td>' + TipoMetal + '</td>' +
                        '<td>' + DesMetal + '</td>' +
                        '<td><input type="text" size="6"    onkeypress="return soloNumeros(event)" ' +
                        ' style="text-align:center" value="' + precio + '"/></td>' +
                        '<td><input type="button" class="btn btn-primary" value="Actualizar" ' +
                        'onclick="guardarMetal(' + datos[i].id_Kilataje + ')"></td>' +
                        '<td><input type="button" class="btn btn-danger" value="Eliminar" ' +
                        'onclick="confirmarEliminarCatMetal(' + datos[i].id_Kilataje + ')"></td>' +
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

//Elimina articulos
function eliminarMetal($idMetal) {
    var dataEnviar = {
        "tipo": 1,
        "idMetal": $idMetal
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/EliminarArticulo.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                cargarTablaArticulo($("#idContratoTemp").text());
                $("#divTablaArticulos").load('tablaArticulos.php');
                alertify.success("Eliminado con éxito.");
            } else {
                alertify.error("Error al eliminar articulo.");
            }
        },
    })

}
function guardarMetal($idMetal) {
    var dataEnviar = {
        "tipo": 2,
        "idMetal": $idMetal
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/EliminarArticulo.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                cargarTablaArticulo($("#idContratoTemp").text());
                $("#divTablaArticulos").load('tablaArticulos.php');
                alertify.success("Eliminado con éxito.");
            } else {
                alertify.error("Error al eliminar articulo.");
            }
        },
    })

}