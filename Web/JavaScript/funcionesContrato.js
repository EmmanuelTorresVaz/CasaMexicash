//Genera contrato
function generarContrato() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    var tipoInteres = $("#tipoInteresEmpeno").val();
    var validarContratoTemporal = consultarContratos();
    var diasAlmoneda = $("#idDiasAlmoneda").val();

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
    } else if (diasAlmoneda == 0) {
        alert("Por Favor. Selecciona los días de almoneda.");
        validate = false;
    }
    if (validate) {
        var totalPrestamo = parseFloat($("#idTotalPrestamo").val());
        var sumaInteresPrestamo = parseFloat($("#idTotalInteres").val());
        var totalInteres = sumaInteresPrestamo -totalPrestamo;
        totalInteres =totalInteres.toFixed(2);
        var diasAlmonedaValue = $('select[name="diasAlmName"] option:selected').text();
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
            "diasAlmonedaValue": diasAlmonedaValue
        };

        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Contrato.php',
            type: 'post',
            success: function (response) {
                if (response) {
                    actualizarArticulo();
                    generarPDF();
                    alertify.success("Contrato generado.");

                } else {
                    alertify.error("Error al generar contrato.");
                }
            },
        })
    }
}
//Generar PDF
//Agrega articulos a la tabla
function generarPDF() {
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/PDF/ContratoPDF.php',
            dataType: "json",
            success: function (datos) {
                for (i = 0; i < datos.length; i++) {
                    var Contrato = datos[i].Contrato;
                    var FechaCreacion = datos[i].FechaCreacion;
                    var NombreCompleto = datos[i].NombreCompleto;
                    var Identificacion = datos[i].Identificacion;
                    var NumIde = datos[i].NumIde;
                    var Direccion = datos[i].Direccion;
                    var Telefono = datos[i].Telefono;
                    var Celular = datos[i].Celular;
                    var Correo = datos[i].Correo;
                    var Cotitular = datos[i].Cotitular;
                    var Beneficiario = datos[i].Beneficiario;
                    //Tabla
                    var MontoPrestamo = datos[i].MontoPrestamo;
                    var MontoTotal = datos[i].MontoTotal;
                    var Tasa = datos[i].Tasa;
                    var Almacenaje = datos[i].Almacenaje;
                    var Seguro = datos[i].Seguro;
                    var Iva = datos[i].Iva;
                    //Tabla 2
                    var FechaAlmoneda = datos[i].FechaAlmoneda;
                    var Dias = datos[i].Dias;
                    var FechaVenc = datos[i].FechaVenc;
                    var Intereses = datos[i].Intereses;
                    //Articulo
                    var TipoElectronico = datos[i].TipoElectronico;
                    var MarcaElectronico = datos[i].MarcaElectronico;
                    var ModeloElectronico = datos[i].ModeloElectronico;
                    var TipoMetal = datos[i].TipoMetal;
                    var Kilataje = datos[i].Kilataje;
                    var Calidad = datos[i].Calidad;
                    var Detalle = datos[i].Detalle;
                    var Avaluo = datos[i].Avaluo;
                    var NombreUsuario = datos[i].NombreUsuario;

                    Dias = parseInt(Dias);
                    var diasLabel= "";
                    if(Dias==30){
                        diasLabel= "1 Mes";
                    }else {
                        diasLabel = Dias
                    }

                    //Porcentajes
                    Iva = "0." + Iva;
                    Tasa = parseFloat(Tasa);
                    Almacenaje = parseFloat(Almacenaje);
                    Seguro = parseFloat(Seguro);
                    Iva = parseFloat(Iva);
                    Dias = parseInt(Dias);
                    MontoPrestamo = parseFloat(MontoPrestamo);

                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(MontoPrestamo * Tasa) / 100;
                    var calculaALm = Math.floor(MontoPrestamo * Almacenaje) / 100;
                    var calculaSeg = Math.floor(MontoPrestamo * Seguro) / 100;
                    var calculaIva = Math.floor(MontoPrestamo * Iva) / 100;
                    var totalInteres = calculaInteres + calculaALm + calculaSeg + calculaIva;
                    //interes por dia
                    var interesDia = totalInteres / Dias;
                    //TASA:
                    var tasaIvaTotal = Tasa + Almacenaje + Seguro + Iva;
                    var tasaDiaria = tasaIvaTotal /Dias;


                    calculaInteres = Math.round(calculaInteres * 100) / 100;
                    calculaALm = Math.round(calculaALm * 100) / 100;
                    calculaIva = Math.round(calculaIva * 100) / 100;
                    tasaIvaTotal = Math.round(tasaIvaTotal * 100) / 100;
                    tasaDiaria = Math.round(tasaDiaria * 100) / 100;

                    document.getElementById('Contrato').innerHTML = Contrato;
                    document.getElementById('FechaCreacion').innerHTML = FechaCreacion;
                    document.getElementById('NombreCompleto').innerHTML = NombreCompleto;
                    document.getElementById('Identificacion').innerHTML = Identificacion;
                    document.getElementById('NumIde').innerHTML = NumIde;
                    document.getElementById('Direccion').innerHTML = Direccion;
                    document.getElementById('Telefono').innerHTML = Telefono;
                    document.getElementById('Celular').innerHTML = Celular;
                    document.getElementById('Correo').innerHTML = Correo;
                    document.getElementById('Cotitular').innerHTML = Cotitular;
                    document.getElementById('Beneficiario').innerHTML = Beneficiario;
                    //Tabla
                    document.getElementById('MontoPrestamo').innerHTML = MontoPrestamo;
                    document.getElementById('MontoTotal').innerHTML = MontoTotal;
                    //document.getElementById('Tasa').innerHTML = Tasa;
                    document.getElementById('Almacenaje').innerHTML = Almacenaje;
                  /*  document.getElementById('Seguro').innerHTML = Seguro;
                    document.getElementById('Iva').innerHTML = Iva;*/

                    //Tabla 2
                    document.getElementById('FechaAlmoneda').innerHTML = FechaAlmoneda;
                    document.getElementById('diasLabel').innerHTML = diasLabel;

                    document.getElementById('importeMutuo').innerHTML = MontoPrestamo;
                    document.getElementById('intereses').innerHTML =calculaInteres;
                    document.getElementById('almacenaje').innerHTML = calculaALm;
                    document.getElementById('iva').innerHTML = calculaIva;
                    document.getElementById('porRefrendo').innerHTML = Intereses;
                    document.getElementById('porDesempeño').innerHTML = MontoTotal;
                    document.getElementById('fechaVencimiento').innerHTML = FechaVenc;

                    document.getElementById('CostoMensualTotal').innerHTML = tasaIvaTotal;
                    document.getElementById('CostoDiarioTotal').innerHTML = tasaDiaria;
var tipoArticuloName = '';
var descripcionArticulo = '';
                    if(Kilataje==null||Kilataje==''){
                        //Es Electronico
                        tipoArticuloName = "Electronico";
                        descripcionArticulo = TipoElectronico + ' ' + MarcaElectronico + ' ' + ModeloElectronico + ' ' + Detalle;
                    }else{
                        tipoArticuloName = "Metales";
                        descripcionArticulo = TipoMetal + ' ' + Kilataje + ' ' + Calidad + ' ' + Detalle;

                    }

                    document.getElementById('tipoArticulo').innerHTML = tipoArticuloName;
                    document.getElementById('descripcionArt').innerHTML = descripcionArticulo;
                    document.getElementById('Avaluo').innerHTML = Avaluo;
                    document.getElementById('PrestamoArticulo').innerHTML = MontoPrestamo;

                    document.getElementById('MontoAvaluo').innerHTML = Avaluo;
                    document.getElementById('AvaluoLetra').innerHTML = Avaluo;
                    document.getElementById('FechaComer').innerHTML = FechaAlmoneda;

                    document.getElementById('FechaPieAlmoneda').innerHTML = FechaAlmoneda;
                    document.getElementById('FechaPieContrato').innerHTML = FechaCreacion;
                    document.getElementById('NombrePieContrato').innerHTML = NombreCompleto;
                    document.getElementById('NombrePieContrato2').innerHTML = NombreCompleto;
                    document.getElementById('nombreUsuario').innerHTML = NombreUsuario;

                    document.getElementById('idContratoPie').innerHTML = Contrato;
                    document.getElementById('idContratoPie2').innerHTML = Contrato;
                    document.getElementById('idNombrePie').innerHTML = NombreCompleto;
                    document.getElementById('fechaCreacionPie').innerHTML = FechaCreacion;
                    document.getElementById('prestmoPie').innerHTML = MontoPrestamo;
                    document.getElementById('descripcionPie').innerHTML = descripcionArticulo;



                }
            }
        });


}
function pruebaPDFMEX() {
alert("entra");
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

function prueba2() {
    var diasAlmonedaValue = $('select[name="diasAlmName"] option:selected').text();
    alert(diasAlmonedaValue)

}

//Contrato
function generarContratoAuto() {
    var clienteEmpeno = $("#idClienteEmpeno").val();
    var tipoInteres = $("#tipoInteresEmpeno").val();
    var diasAlmoneda = $("#idDiasAlmoneda").val();

    var validate = true;
    if (clienteEmpeno == '' || clienteEmpeno == null) {
        alert("Por Favor. Selecciona un cliente.");
        validate = false;
    } else if (tipoInteres == 0) {
        alert("Por Favor. Selecciona tipo de interes.");
        validate = false;
    } else if (diasAlmoneda == 0) {
        alert("Por Favor. Selecciona los días de almoneda.");
        validate = false;
    }
    if (validate) {
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
        var diasAlmonedaValue = $('select[name="diasAlmName"] option:selected').text();

        var prestamoAuto = $("#idTotalPrestamoAuto").val();
        var interesAuto = calcularInteresAuto(prestamoAuto);
        var dataEnviar = {
            "idClienteAuto": clienteEmpeno,
            "fechaVencimiento": $("#idFecVencimiento").text(),
            "totalAvaluo":  $("#idTotalAvaluoAuto").val(),
            "totalPrestamo":  $("#idTotalPrestamoAuto").val(),
            "total_Interes": interesAuto,
            "sumaInteresPrestamo": $("#idSumaInteresPrestamo").val(),
            "polizaSeguro": $("#idPolizaSeguro").val(),
            "gps": $("#idGPS").val(),
            "pension": $("#idPension").val(),
            "estatus": 1,
            "beneficiario": $("#idNombreBen").val(),
            "cotitular": $("#nombreCotitular").val(),
            "plazo": $("#idPlazo").text(),
            "tasa": $("#idTasaPorcen").text(),
            "alm": $("#idAlmPorcen").text(),
            "seguro": $("#idSeguroPorcen").text(),
            "iva": $("#idIvaPorcen").text(),
            "dias": $("#diasInteres").val(),
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
            "idCheckLicencia": chkLicencia,
            "diasAlmoneda": diasAlmonedaValue,
            "fecha_Alm": $("#idFechaAlm").val()

        };
        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/cAuto.php',
            type: 'post',
            success: function (response) {
                if (response>0) {
                    $("#idFormAuto")[0].reset();
                    alertify.success("Contrato generado exitosamente.");
                } else {
                    alertify.error("Error al generar contrato.");
                }

            },
        })
    }





}

function pruebaspdf() {
    var dataEnviar = {
        "idCliente": 5648,
    };

    $.ajax({
        data: dataEnviar,
        url: '../PDF/contrato.php',
        type: 'post',
        success: function (response) {
                alertify.success("Contrato pdf.");
        },
    })
    window.open('../PDF/contrato.php')

}