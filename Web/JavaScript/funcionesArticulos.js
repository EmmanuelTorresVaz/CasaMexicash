//Variables Globales
var Avaluo = 0.00;
var Prestamo = 0.00;
var Interes = 0.00;


//Limpia la tabla de Articulos
function Limpiar() {
    <!--   Limpiar Metales-->
    $("#idTipoMetal").val(0);
    $("#idKilataje").val(0);
    $("#idCalidad").val(0);
    $("#idCantidad").val("");
    $("#idPeso").val("");
    $("#idPesoPiedra").val("");
    $("#idPiedras").val("");
    $("#idPrestamo").val("");
    $("#idAvaluo").val("");
    $("#idUbicacion").val("");
    $("#idDetallePrenda").val("");
    <!--   Limpiar Electronicos-->
    $("#idTipoElectronico").val(0);
    $("#idMarca").val("");
    $("#idVitrina").val(0);
    $("#idVitrinaElectronico").val(0);
    $("#idModelo").val("");
    $("#idSerie").val("");
    $("#idPrestamoElectronico").val("");
    $("#idAvaluoElectronico").val("");
    $("#idUbicacionElectronico").val("");
    $("#idDetallePrendaElectronico").val("");
}

//Agrega articulos a la tabla
function Agregar() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    var tipoInteres = $("#tipoInteresEmpeno").val();
    if (clienteEmpeno != 0) {
        if (tipoInteres != 0) {
            var formElectronico = $("#idTipoElectronico").val();
            var formMetal = $("#idTipoMetal").val();
            if (formMetal != 0 || formElectronico != 0) {

                if (formMetal > 0) {
                    //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
                    var metalAvaluo = $("#idAvaluo").val();
                    var metalPrestamo = $("#idPrestamo").val();
                    var interesMetal = calcularInteresMetal(metalPrestamo);

                    var dataEnviar = {
                        "$idTipoEnviar": 1,
                        "idTipoMetal": formMetal,
                        "idKilataje": $("#idKilataje").val(),
                        "idCalidad": $("#idCalidad").val(),
                        "idCantidad": $("#idCantidad").val(),
                        "idPeso": $("#idPeso").val(),
                        "idPesoPiedra": $("#idPesoPiedra").val(),
                        "idPiedras": $("#idPiedras").val(),
                        "idPrestamo":metalPrestamo,
                        "idAvaluo": metalAvaluo,
                        "idVitrina": $("#idVitrina").val(),
                        "idUbicacion": $("#idUbicacion").val(),
                        "idDetallePrenda": $("#idDetallePrenda").val(),
                        "interes": interesMetal,

                    };
                    $.ajax({
                        data: dataEnviar,
                        url: '../../../com.Mexicash/Controlador/Articulo.php',
                        type: 'post',
                        success: function (response) {
                            if (response == 1) {
                                cargarTablaArticulo();
                                $("#divTablaArticulos").load('tablaArticulos.php');
                                Limpiar();
                                sumarTotalesMetal(metalPrestamo,metalAvaluo);
                                alertify.success("Articulo agregado exitosamente.");
                            } else {
                                alertify.error("Error al agregar articulo.");
                            }
                        },
                    })
                } else if (formElectronico > 0) {
                    var artiAvaluo = $("#idAvaluoElectronico").val();
                    var artiPrestamo = $("#idPrestamoElectronico").val();
                    var interesArti = calcularInteresArticulo(artiPrestamo);
                    //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
                    var dataEnviar = {
                        "$idTipoEnviar": 2,
                        "idTipoElectronico": formElectronico,
                        "idMarca": $("#idMarca").val(),
                        "idEstado": $("#idEstado").val(),
                        "idModelo": $("#idModelo").val(),
                        "idSerie": $("#idSerie").val(),
                        "idPrestamoElectronico": artiPrestamo,
                        "idAvaluoElectronico": artiAvaluo,
                        "idVitrina": $("#idVitrinaElectronico").val(),
                        "idUbicacionElectronico": $("#idUbicacionElectronico").val(),
                        "idDetallePrendaElectronico": $("#idDetallePrendaElectronico").val(),
                        "interes": interesArti,
                    };
                    $.ajax({
                        data: dataEnviar,
                        url: '../../../com.Mexicash/Controlador/Articulo.php',
                        type: 'post',
                        success: function (response) {
                            if (response == 1) {
                                cargarTablaArticulo();
                                $("#divTablaArticulos").load('tablaArticulos.php');
                                Limpiar();
                                sumarTotalesArticulo(artiPrestamo,artiAvaluo);
                                alertify.success("Articulo agregado exitosamente.");
                            } else {
                                alertify.error("Error al agregar articulo.");
                            }
                        },
                    })
                }
            } else {
                alertify.error("Por Favor. Selecciona un tipo de articulo.");
            }
        } else {
            alertify.error("Por Favor. Selecciona un tipo de interes.");
        }
    } else {
        alertify.error("Por Favor. Selecciona un cliente.");
    }

}

//Cargar tabla Articulos
function cargarTablaArticulo() {
    $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/tblArticulos.php',
            dataType: "json",
            success: function (datos) {
                alert("Refrescando tabla.");
                var html = '';
                var i = 0;
                for (i; i < datos.length; i++) {
                    var marca = datos[i].marca;
                    var modelo = datos[i].modelo;
                    var prestamo = datos[i].prestamo;
                    var avaluo = datos[i].avaluo;
                    var detalle = datos[i].detalle;
                    if (marca === null) {
                        marca = '';
                    }
                    if (modelo === null) {
                        modelo = '';
                    }
                    if (prestamo === null) {
                        prestamo = '';
                    }
                    if (avaluo === null) {
                        avaluo = '';
                    }
                    if (detalle === null) {
                        detalle = '';
                    }
                    html += '<tr>' +
                        '<td>' + marca + '</td>' +
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
    $("#divTablaArticulos").load('tablaArticulos.php');
}

//Menu Mentales
function Metales() {
    $("#divElectronicos").hide();
    $("#divMetales").show();
    Limpiar();
    LimpiarInteres();
    llenarComboInteres(1);
    limpiarTabla();
    $("#divTablaArticulos").load('tablaArticulos.php');
}

//Menu Electronicos
function Electronicos() {
    $("#divMetales").hide();
    $("#divElectronicos").show();
    Limpiar();
    LimpiarInteres();
    llenarComboInteres(2);
    limpiarTabla();
    $("#divTablaArticulos").load('tablaArticulos.php');
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
                cargarTablaArticulo();
                $("#divTablaArticulos").load('tablaArticulos.php');
                alertify.success("Eliminado con éxito.");
            } else {
                alertify.error("Error al eliminar articulo.");
            }
        },
    })

}

function selectMetalCmb($tipoMetal) {
    selectKilataje($tipoMetal);
    selectCalidad($tipoMetal);
}

function selectArticuloCmb($tipoMetal) {
    selectCalidadArt($tipoMetal);
}

function selectKilataje($tipoMetal) {
    var dataEnviar = {
        "clase": 2,
        "idTipoMetal": $tipoMetal
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/comboMetales.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var idKilataje = datos[i].id_Kilataje;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + idKilataje + '>' + descripcion + '</option>';
            }
            $('#idKilataje').html(html);

        }
    });
}

function llenaPrecioKilataje() {
    var idKil = $("#idKilataje").val();
    var dataEnviar = {
        "clase": 4,
        "idTipoMetal": idKil
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/comboMetales.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var i = 0;
            for (i; i < datos.length; i++) {
                var precio = datos[i].precio;
                $('#idKilatajePrecio').val(precio);
            }
        }
    });
}

function selectCalidad($tipoMetal) {
    var dataEnviar = {
        "clase": 3,
        "idTipoMetal": $tipoMetal
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/comboMetales.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var idCalidad = datos[i].id_calidad;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + idCalidad + '>' + descripcion + '</option>';
            }
            $('#idCalidad').html(html);
        }
    });
}


/*function calcularInteres(metalPrestamo, metalAvaluo) {*/

function calcularInteresMetal(metalPrestamo) {
    metalPrestamo =  parseFloat(metalPrestamo);
    var varTasaPorcen = parseFloat($("#idTasaPorcen").text());
    var varAlmPorcen = parseFloat($("#idAlmPorcen").text());
    var varSeguroPorcen = parseFloat($("#idSeguroPorcen").text());
    var varIvaPorcen = parseFloat($("#idIvaPorcen").text());

    var calculaTasa = Math.floor(metalPrestamo* varTasaPorcen)/100;
    var calculaALm = Math.floor(metalPrestamo* varAlmPorcen)/100;
    var calculaSeg = Math.floor(metalPrestamo* varSeguroPorcen)/100;
    var calculaIva = Math.floor(metalPrestamo* varIvaPorcen)/100;

    var interes = calculaTasa + calculaALm +calculaSeg + calculaIva;
    var interesMetal = metalPrestamo + interes;
    interesMetal = interesMetal.toFixed(2)
    interesMetal = parseFloat(interesMetal)
    interes = interes.toFixed(2)
    interes = parseFloat(interes)
    Interes = Interes + interesMetal;
    $("#idTotalInteres").val(Interes);
    return interes;
}

function calcularInteresArticulo(artiPrestamo) {
    artiPrestamo =  parseFloat(artiPrestamo);
    var varTasaPorcen = parseFloat($("#idTasaPorcen").text());
    var varAlmPorcen = parseFloat($("#idAlmPorcen").text());
    var varSeguroPorcen = parseFloat($("#idSeguroPorcen").text());
    var varIvaPorcen = parseFloat($("#idIvaPorcen").text());

    var calculaTasa = Math.floor(artiPrestamo* varTasaPorcen)/100;
    var calculaALm = Math.floor(artiPrestamo* varAlmPorcen)/100;
    var calculaSeg = Math.floor(artiPrestamo* varSeguroPorcen)/100;
    var calculaIva = Math.floor(artiPrestamo* varIvaPorcen)/100;

    var interes = +calculaTasa + calculaALm +calculaSeg + calculaIva;
    var interesArti = artiPrestamo + interes;

    interesArti = interesArti.toFixed(2)
    interesArti = parseFloat(interesArti)
    interes = interes.toFixed(2)
    interes = parseFloat(interes)
    Interes = Interes + interesArti;
    $("#idTotalInteres").val(Interes);
    return interes;
}

function sumarTotalesMetal(metalPrestamo,metalAvaluo) {
    var metalAva= parseFloat(metalAvaluo);
    var metalPres = parseFloat(metalPrestamo);
    //Suma el monto de avaluo
    Avaluo = Avaluo + metalAva;
    $("#idTotalAvaluo").val(Avaluo);
    Prestamo =Prestamo +metalPres;
    $("#idTotalPrestamo").val(Prestamo);
}

function sumarTotalesArticulo(artiPrestamo, artiAvaluo) {
    var artiAvaluo = parseFloat(artiAvaluo);
    var artiPrestamo = parseFloat(artiPrestamo);
    Avaluo = Avaluo + artiAvaluo;
    $("#idTotalAvaluo").val(Avaluo);
    Prestamo = Prestamo +artiPrestamo;
    $("#idTotalPrestamo").val(Prestamo);
}

function calculaAvaluo() {
    var prestamo = parseFloat($("#idPrestamo").val());
    var avaluoImporte = Math.floor(prestamo* 33)/100;
    prestamo = prestamo+ avaluoImporte;

    prestamo = prestamo.toFixed(2)
    prestamo = parseFloat(prestamo)
    $("#idAvaluo").val(prestamo);
}

function calculaAvaluoElec() {
    var pretamoElec = parseFloat($("#idPrestamoElectronico").val());
    var avaluoImporte = Math.floor(pretamoElec* 75)/100;
    pretamoElec = pretamoElec + avaluoImporte;
    pretamoElec = pretamoElec.toFixed(2)
    pretamoElec = parseFloat(pretamoElec)
    $("#idAvaluoElectronico").val(pretamoElec);
}

function calculaPrestamoPeso() {
    if($("#idTipoMetal").val()==0){
        alert("Selecciona un tipo de metal")
    }else {
        if($("#idKilataje").val()==0){
            alert("Selecciona un tipo de kilataje")
        }else {
            if($("#idCalidad").val()==0){
                alert("Selecciona un tipo de calidad")
            }else {
                if ($("#idCantidad").val() == "") {
                    alert("Ingresa el campo de Cantidad")
                }else{
                    if($("#idPeso").val()==""){
                        alert("Ingresa el campo de Peso")
                    }else {
                        if($("#idPiedras").val()==""){
                            alert("Ingresa el campo de Peso Piedras")
                        }else {
                            if($("#idPesoPiedra").val()==""){
                                alert("Ingresa el campo de Piedras")
                            }else {
                                var cantidad = parseInt($("#idCantidad").val());
                                var peso = parseFloat($("#idPeso").val());
                                var pesoPiedra = parseFloat($("#idPesoPiedra").val());
                                var piedras = parseInt($("#idPiedras").val());
                                var kilPrecio = parseInt($("#idKilatajePrecio").val());

                                var pesoTotalMetal = cantidad * peso;
                                var pesoTotalPiedra = piedras * pesoPiedra;
                                var pesoTotal = pesoTotalMetal - pesoTotalPiedra;
                                var prestamo = pesoTotal * kilPrecio;

                                $("#idAvaluo").val(prestamo);
                                var avaluoImporte = Math.floor(prestamo * 33)/100;
                                var avaluo = prestamo+ avaluoImporte;
                                $("#idPrestamo").val(prestamo);
                                $("#idAvaluo").val(avaluo);

                            }
                        }
                    }
                }
            }
        }
    }


}

/*
function prestaMax() {
    var avaluo = parseFloat($("#idAvaluo").val());
    var prestamoMax = Math.floor(avaluo* 75)/100;
    $("#idPrestamoMax").val(prestamoMax);
}
function prestaMaxElectronico() {
    var avaluo = parseFloat($("#idAvaluoElectronico").val());
    var prestamoMax = Math.floor(avaluo* 75)/100;
    $("#idPrestamoMaxElectronico").val(prestamoMax);

}*/

function traerDatosModal() {

}

function combMarcaVEmpe() {
    $('#idMarca').prop('disabled', false);
    $('#idMarca').val(0);

    var tipoSelect = $('#idTipoElectronico').val();
    var marcaSelect = 0;
    var modeloSelect = 0;
    var dataEnviar = {
        "tipo": 2,
        "tipoCombo": tipoSelect
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Electronicos/Electronico.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_marca = datos[i].id_marca;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_marca + '>' + descripcion + '</option>';
            }
            $('#idMarca').html(html);
        }
    });
}

function cmbModeloVEmpe() {
    $('#idModelo').prop('disabled', false);
    $('#idModelo').val(0);
    var tipoSelect = $('#idTipoElectronico').val();
    var marcaSelect = $('#idMarca').val();
    var modeloSelect = 0;
    var dataEnviar = {
        "tipo": 3,
        "tipoCombo": tipoSelect,
        "marcaCombo": marcaSelect
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Electronicos/Electronico.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_modelo = datos[i].id_modelo;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_modelo + '>' + descripcion + '</option>';
            }
            $('#idModelo').html(html);
        }
    });
}

function llenarDatosElectronico(tipoSelect, marcaSelect, modeloSelect) {
    var dataEnviar = {
        "tipoCombo": tipoSelect,
        "marcaCombo": marcaSelect,
        "modeloCombo": modeloSelect

    };
    $.ajax({
        data: dataEnviar,
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Electronicos/tblElectronico.php',
        dataType: "json",
        success: function (datos) {
            var i = 0;
            for (i; i < datos.length; i++) {
                var idElectronico = datos[i].idElectronico;
                var tipo = datos[i].tipoE;
                var marca = datos[i].marca;
                var modelo = datos[i].modelo;
                var precio = datos[i].precio;
                var vitrina = datos[i].vitrina;
                var caracteristicas = datos[i].caracteristicas;
                if (tipo === null) {
                    tipo = '';
                }
                if (marca === null) {
                    marca = '';
                }
                if (modelo === null) {
                    modelo = '';
                }
                if (precio === null) {
                    precio = '';
                }
                if (vitrina === null) {
                    vitrina = '';
                }
                if (caracteristicas === null) {
                    caracteristicas = '';
                }

                var pretamoElec = parseFloat(precio);
                var avaluoImporte = Math.floor(pretamoElec* 75)/100;
                avaluoImporte = pretamoElec + avaluoImporte;
                avaluoImporte = avaluoImporte.toFixed(2)
                avaluoImporte = parseFloat(avaluoImporte)

                $("#idPrestamoElectronico").val(precio);
                $("#idAvaluoElectronico").val(avaluoImporte);
                $("#idVitrinaElectronico").val(vitrina);
                $("#idDetallePrendaElectronico").val(caracteristicas);

            }
        }
    });
}

function llenarDatosFromModal($idProducto) {
    var dataEnviar = {
        "tipo": 1,
        "idProducto": $idProducto
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Electronicos/ActualizarTblElectronico.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            for (i = 0; i < datos.length; i++) {
                var idElectronico = datos[i].idElectronico;
                var tipoId = datos[i].tipoId;
                var tipoEditar = datos[i].tipoEditar;
                var marcaId = datos[i].marcaId;
                var marca = datos[i].marca;
                var modeloId = datos[i].modeloId;
                var modelo = datos[i].modelo;
                var precio = datos[i].precio;
                var vitrina = datos[i].vitrina;
                var caracteristicas = datos[i].caracteristicas;
                if (tipoId === null) {
                    tipoId = '';
                }
                if (marcaId === null) {
                    marcaId = '';
                }
                if (modeloId === null) {
                    modeloId = '';
                }
                if (tipoEditar === null) {
                    tipoEditar = '';
                }
                if (marca === null) {
                    marca = '';
                }
                if (modelo === null) {
                    modelo = '';
                }
                if (precio === null) {
                    precio = '';
                }
                if (vitrina === null) {
                    vitrina = '';
                }
                if (caracteristicas === null) {
                    caracteristicas = '';
                }
                combMarcaVEmpeFromModal(tipoId);
                cmbModeloVEmpeFromModal(tipoId,marcaId);
                alert("Cargando datos.")
                var pretamoElec = parseFloat(precio);
                var avaluoImporte = Math.floor(pretamoElec* 75)/100;
                avaluoImporte = pretamoElec + avaluoImporte;
                avaluoImporte = avaluoImporte.toFixed(2)
                avaluoImporte = parseFloat(avaluoImporte)
                $("#idTipoElectronico").val(tipoId);
                $("#idMarca").val(marcaId);
                $("#idModelo").val(modeloId);
                $("#idPrestamoElectronico").val(precio);
                $("#idAvaluoElectronico").val(avaluoImporte);
                $("#idVitrinaElectronico").val(vitrina);
                $("#idDetallePrendaElectronico").val(caracteristicas);


            }
        }
    });

}

function combMarcaVEmpeFromModal(tipoId) {
    $('#idMarca').prop('disabled', false);
    $('#idMarca').val(0);

    var tipoSelect = tipoId;
    var dataEnviar = {
        "tipo": 2,
        "tipoCombo": tipoSelect
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Electronicos/Electronico.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_marca = datos[i].id_marca;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_marca + '>' + descripcion + '</option>';
            }
            $('#idMarca').html(html);
        }
    });
}

function cmbModeloVEmpeFromModal(tipoId,marcaId) {
    $('#idModelo').prop('disabled', false);
    $('#idModelo').val(0);
    var tipoSelect = tipoId;
    var marcaSelect = marcaId;
    var dataEnviar = {
        "tipo": 3,
        "tipoCombo": tipoSelect,
        "marcaCombo": marcaSelect
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Electronicos/Electronico.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_modelo = datos[i].id_modelo;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_modelo + '>' + descripcion + '</option>';
            }
            $('#idModelo').html(html);
        }
    });
}
