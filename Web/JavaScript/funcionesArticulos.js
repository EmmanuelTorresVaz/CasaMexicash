
//Limpia la tabla de Articulos
function Limpiar() {
    <!--   Limpiar Metales-->
    $("#idTipoMetal").val(0);
    $("#idPrenda").val(0);
    $("#idKilataje").val(0);
    $("#idCalidad").val(0);
    $("#idCantidad").val("");
    $("#idPeso").val("");
    $("#idPesoPiedra").val("");
    $("#idPiedras").val("");
    $("#idPrestamo").val("");
    $("#idAvaluo").val("");
    $("#idPrestamoMax").val("");
    $("#idUbicacion").val("");
    $("#idDetallePrenda").val("");
    <!--   Limpiar Electronicos-->
    $("#idTipoElectronico").val(0);
    $("#idMarca").val("");
    $("#idEstado").val(0);
    $("#idModelo").val("");
    $("#idTamaño").val("");
    $("#idColor").val(0);
    $("#idSerie").val("");
    $("#idPrestamoElectronico").val("");
    $("#idAvaluoElectronico").val("");
    $("#idPrestamoMaxElectronico").val("");
    $("#idUbicacionElectronico").val("");
    $("#idDetallePrendaElectronico").val("");
}

//Agrega articulos a la tabla
function Agregar() {

    var clienteEmpeno = $("#idClienteEmpeno").val();
    if (clienteEmpeno != 0) {
        var formElectronico = $("#idTipoElectronico").val();
        var formMetal = $("#idTipoMetal").val();
        if (formMetal > 0) {
            //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
            var dataEnviar = {
                "$idTipoEnviar": 1,
                "idClienteInteres":clienteEmpeno,
                "idContratoTemp": $("#idContratoTemp").val(),
                "idTipoMetal": formMetal,
                "idPrenda": $("#idPrenda").val(),
                "idKilataje": $("#idKilataje").val(),
                "idCalidad": $("#idCalidad").val(),
                "idCantidad": $("#idCantidad").val(),
                "idPeso": $("#idPeso").val(),
                "idPesoPiedra": $("#idPesoPiedra").val(),
                "idPiedras": $("#idPiedras").val(),
                "idPrestamo": $("#idPrestamo").val(),
                "idAvaluo": $("#idAvaluo").val(),
                "idPrestamoMax": $("#idPrestamoMax").val(),
                "idUbicacion": $("#idUbicacion").val(),
                "idDetallePrenda": $("#idDetallePrenda").val()
            };
        } else if (formElectronico > 0) {
            //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
            var dataEnviar = {
                "$idTipoEnviar": 2,
                "idClienteInteres": clienteEmpeno,
                "idContratoTemp": $("#idContratoTemp").val(),
                "idTipoElectronico": formElectronico,
                "idMarca": $("#idMarca").val(),
                "idEstado": $("#idEstado").val(),
                "idModelo": $("#idModelo").val(),
                "idTamaño": $("#idTamaño").val(),
                "idColor": $("#idColor").val(),
                "idSerie": $("#idSerie").val(),
                "idPrestamoElectronico": $("#idPrestamoElectronico").val(),
                "idAvaluoElectronico": $("#idAvaluoElectronico").val(),
                "idPrestamoMaxElectronico": $("#idPrestamoMaxElectronico").val(),
                "idUbicacionElectronico": $("#idUbicacionElectronico").val(),
                "idDetallePrendaElectronico": $("#idDetallePrendaElectronico").val()
            };
        }
        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Articulo.php',
            type: 'post',
            success: function (response) {
                if (response) {
                    setTimeout('',200)
                    cargarTablaArticulo($("#idContratoTemp").val());
                    $("#divTablaArticulos").load('tablaArticulos.php');
                    alertify.success("Articulo agregado exitosamente.");
                } else {
                    alertify.error("Error al agregar articulo.");
                }
            },
        })
    } else {
        alert("Por Favor. Selecciona un cliente.")
    }

}

function cargarTablaArticulo($contratoTemp) {
    if ($contratoTemp != '') {
        var dataEnviar = {
            "idContratoTemp": $contratoTemp
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/tblArticulos.php',
            data: dataEnviar,
            dataType:"json",
            success: function (datos) {
                alert("Refrescando tabla.");
                setTimeout('',200)
                var html = '';
                var i= 0;
                for (i ; i < datos.length; i++) {
                    var marca = datos[i].marca;
                    var estado = datos[i].estado;
                    var modelo = datos[i].modelo;
                    var prestamo = datos[i].prestamo;
                    var avaluo = datos[i].avaluo;
                    var detalle = datos[i].detalle;
                    if (marca === null) {marca = '';}
                    if (estado === null) {estado = '';}
                    if (modelo === null) {modelo = '';}
                    if (prestamo === null) {prestamo = '';}
                    if (avaluo === null) {avaluo = '';}
                    if (detalle === null) {detalle = '';}
                    html += '<tr>' +
                        '<td>' + marca + '</td>' +
                        '<td>' + estado + '</td>' +
                        '<td>' + modelo + '</td>' +
                        '<td>' + prestamo + '</td>' +
                        '<td>' + avaluo + '</td>' +
                        '<td>' + detalle + '</td>' +
                        '<td><input type="button" class="btn btn-danger" value="Eliminar" ' +
                        'onclick="confirmarEliminar(' + datos[i].id_Articulo + ')"></td>' +
                        '</tr>';
                }
                $('#idTBodyArticulos').html(html);
            }
        });
    }
    $("#divTablaArticulos").load('tablaArticulos.php');
}

//Menu Mentales
function Metales() {
    $("#divElectronicos").hide();
    $("#divMetales").show();
}

//Menu Electronicos
function Electronicos() {
    $("#divMetales").hide();
    $("#divElectronicos").show();
}

//Alerta para confirmar la Eliminacion
function confirmarEliminar($idArticulo) {
    alertify.confirm('Eliminar',
        'Confirme eliminacion de articulo seleccionado.',
        function () {
            eliminarArticulo($idArticulo)
        },
        function () {
            alertify.error('Cancelado')
        });
}

//Elimina articulos
function eliminarArticulo($idArticulo) {
    var dataEnviar = {
        "$idArticulo": $idArticulo
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/EliminarArticulo.php',
        type: 'post',
        success: function (response) {
            if (response == 1) {
                cargarTablaArticulo($("#idContratoTemp").val());
                $("#divTablaArticulos").load('tablaArticulos.php');
                alertify.success("Eliminado con éxito.");
            } else {
                alertify.error("Error al eliminar articulo.");
            }
        },
    })

}


function prueba() {
    alert($("#idContratoTemp").val());
}


