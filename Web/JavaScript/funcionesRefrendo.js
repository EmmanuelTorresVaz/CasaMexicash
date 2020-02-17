var errorToken = 0;
//tipo de contrato articulo
var tipoContrato = 0;
var contrato = 0;
var tipeFormulario = 0;
//tipo de contrato auto
// var tipoContrato = 2;
//Estatus 1 es Empeño
var estatus = 1;
// tipe 1 refrendo,tipe 2 refrendo auto,tipe 3 desempeño,tipe 4 desempeño auto,

//Consultar contrato
function estatusContrato() {
    contrato = $("#idContrato").val();
    tipoContrato = $("#idTipoDeContrato").val();
    tipoContrato = parseInt(tipoContrato);
    tipeFormulario = $("#idFormulario").val();
    $("#idFormDesRef")[0].reset();
    $("#idConTDDes").text('')
    $("#idPresTDDes").text('')
    $("#idInteresTDDes").text('');
    $("#idAbonoTDDes").text('');
    $("#btnGenerar").prop('disabled', true);
    $("#btnAbono").prop('disabled', true);
    $("#idAbono").prop('disabled', true);
    $("#idContrato").prop('disabled', true);
    $("#btnBuscar").prop('disabled', true);
    $("#idContrato").val(contrato);

    if (contrato != '') {
        var dataEnviar = {
            "tipe": 1,
            "contrato": contrato,
            "tipoContrato": tipoContrato,
            "estatus": estatus
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                if (datos.length > 0) {
                    $("#idContratoBusqueda").val(contrato);
                    for (i = 0; i < datos.length; i++) {
                        var Contrato = datos[i].Contrato;
                        var Fecha = datos[i].Fecha;
                        var NombreCompleto = datos[i].NombreCompleto;
                        var Estatus = datos[i].Estatus;
                        var idEstatus = datos[i].idEstatus;

                        if (idEstatus == 1) {
                            buscarCliente();
                            buscarDatosContrato();
                            if (tipoContrato == 1) {
                                buscarDetalle();
                            } else if (tipoContrato == 2) {
                                buscarDetalleAuto();
                            }

                        } else {
                            alert("El contrato No. : " + Contrato + ", creado el " + Fecha + "\n" +
                                " del cliente:   " + NombreCompleto + "\n" +
                                " se ecnuentra con el estatus " + Estatus + ". \n");
                        }
                    }
                } else {
                    alertify.error("No se encontro ningun contrato con ese número.");
                }
            }
        });
    } else {
        alertify.error("Ingrese un contrato a buscar.");
    }
}

//Buscar cliente
function buscarCliente() {
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 2,
            "contrato": contrato,
            "tipoContrato": tipoContrato,
            "estatus": estatus
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                if (datos.length > 0) {
                    for (i = 0; i < datos.length; i++) {
                        $("#idChekcDescuento").prop('disabled', false);
                        var NombreCompleto = datos[i].NombreCompleto;
                        var DireccionCompleta = datos[i].DireccionCompleta;
                        var DireccionCompletaEst = datos[i].DireccionCompletaEst;
                        var Cotitular = datos[i].Cotitular;
                        var UsuarioName = datos[i].UsuarioName;

                        if (NombreCompleto === null) {
                            NombreCompleto = '';
                        }

                        if (DireccionCompleta === null) {
                            DireccionCompleta = '';
                        }
                        if (DireccionCompletaEst === null) {
                            DireccionCompletaEst = '';
                        }
                        if (Cotitular === null) {
                            Cotitular = '';
                        }
                        if (UsuarioName === null) {
                            UsuarioName = '';
                        }

                        $("#idDatosClienteDes").val(NombreCompleto + "\n" + DireccionCompleta + "\n" + DireccionCompletaEst + "\n" + "Cotitular: " + Cotitular + "\n" + "Usuario: " + UsuarioName);
                    }
                } else {
                    $("#idDatosClienteDes").val('');
                    $("#idDatosContratoDes").val('');
                    $("#idDetalleContratoDes").val('');

                    document.getElementById('idConTDDes').innerHTML = '';
                    document.getElementById('idPresTDDes').innerHTML = '';
                    document.getElementById('idInteresTDDes').innerHTML = '';
                    document.getElementById('totalAPagarTD').innerHTML = '';
                    alertify.error("Sin resultados para mostrar.");
                }
            }
        });
    }
}

//Buscar datos del contrato
function buscarDatosContrato() {
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 3,
            "contrato": contrato,
            "tipoContrato": tipoContrato,
            "estatus": estatus
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                $("#idContratoBusqueda").val(contrato);
                for (i = 0; i < datos.length; i++) {
                    var FechaEmp = datos[i].FechaEmp;
                    var FechaVenConvert = datos[i].FechaVenConvert;
                    var FechaVenc = datos[i].FechaVenc;
                    var FechaEmpConvert = datos[i].FechaEmpConvert;
                    var FechaAlm = datos[i].FechaAlm;
                    var PlazoDesc = datos[i].PlazoDesc;
                    var TasaDesc = datos[i].TasaDesc;
                    var AlmacDesc = datos[i].AlmacDesc;
                    var SeguDesc = datos[i].SeguDesc;
                    var IvaDesc = datos[i].IvaDesc;
                    var DiasContrato = datos[i].Dias;
                    var TotalPrestamo = datos[i].TotalPrestamo;
                    var TotalInteresPrestamo = datos[i].TotalInteresPrestamo;
                    var Abono = datos[i].Abono;
                    var Descuento = datos[i].Descuento;
                    var FechaAbono = datos[i].FechaAbono;
                    var DiasAlmoneda = datos[i].DiasAlmoneda;
                    var PolizaSeguro = datos[i].PolizaSeguro;
                    var GPS = datos[i].GPS;
                    var Pension = datos[i].Pension;
                    var fechaHoy = new Date();
                    var diasForInteres = 0;

                    //SE obtienen los intereses en  porcentajes
                    IvaDesc = "0." + IvaDesc;
                    TasaDesc = parseFloat(TasaDesc);
                    AlmacDesc = parseFloat(AlmacDesc);
                    SeguDesc = parseFloat(SeguDesc);
                    IvaDesc = parseFloat(IvaDesc);
                    DiasContrato = parseInt(DiasContrato);
                    TotalPrestamo = parseFloat(TotalPrestamo);
                    TotalInteresPrestamo = parseFloat(TotalInteresPrestamo);
                    var FechaVencFormat = formatStringToDate(FechaVenConvert);
                    var FechaEmpFormat = formatStringToDate(FechaEmpConvert);
                    var fechaHoyText = fechaFormato();
                    var diasMoratorios = 0;
                    var diasInteresMor = 0;

                    // Dias trasncurridos
                    if (Abono == null) {
                        if (FechaEmpConvert == fechaHoyText) {
                            //Si la fecha es igual el dia de interes generado es 1
                            diasForInteres = 1;
                        } else {
                            //Si la fecha es menor que hoy  el dia de interes generado es  el total -1
                            var diasdif = fechaHoy.getTime() - FechaEmpFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        }
                    } else {
                        var FechaAbonoFormat = formatStringToDate(FechaAbono);
                        if (FechaAbono == fechaHoyText) {
                            //Si la fecha es igual el dia de interes generado es 1
                            diasForInteres = 1;
                        } else {
                            var diasdif = fechaHoy.getTime() - FechaAbonoFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        }
                    }

                    // Dias trasncurridos con dias moratorios
                    if (FechaVencFormat < fechaHoy) {
                        diasMoratorios = diasForInteres - DiasContrato;
                        diasForInteres = diasForInteres - diasMoratorios;
                    }

                    //Plazo
                    if (DiasContrato == 30) {
                        PlazoDesc = PlazoDesc + " Mensual";
                    } else if (DiasContrato == 1) {
                        PlazoDesc = PlazoDesc + " Diario";
                    }


                    if (Abono == '' || Abono == null) {
                        Abono = 0.00;
                    }
                    if (Descuento == '' || Descuento == null) {
                        Descuento = 0.00;
                    }
                    $("#idDescuentoAnterior").val(Descuento);
                    var nuevaFechaVencimiento = sumarDias(DiasContrato);
                    var nuevaFechaAlm = calcularDiasAlmoneda(DiasContrato, DiasAlmoneda)
                    $("#idNuevaFechaVenc").val(nuevaFechaVencimiento);
                    $("#idNuevaFechaAlm").val(nuevaFechaAlm);
                    //INTERES DIARIO
                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrestamo * TasaDesc) / 100;
                    var calculaALm = Math.floor(TotalPrestamo * AlmacDesc) / 100;
                    var calculaSeg = Math.floor(TotalPrestamo * SeguDesc) / 100;
                    var calculaIva = Math.floor(TotalPrestamo * IvaDesc) / 100;

                    var totalInteres = calculaInteres + calculaALm + calculaSeg + calculaIva;
                    //interes por dia
                    var interesDia = totalInteres / DiasContrato;
                    //TASA:
                    var tasaIvaTotal = TasaDesc + AlmacDesc + SeguDesc + IvaDesc;


                    //Porcentajes por dia
                    var diaInteres = calculaInteres / DiasContrato;
                    var diaAlm = calculaALm / DiasContrato;
                    var diaSeg = calculaSeg / DiasContrato;
                    var diaIva = calculaIva / DiasContrato;
                    //INTERES:
                    var totalVencInteres = diaInteres * diasForInteres;

                    //ALMACENAJE
                    var totalVencAlm = diaAlm * diasForInteres;

                    //SEGURO
                    var totalVencSeg = diaSeg * diasForInteres;

                    //MORATORIOS
                    diasInteresMor = diasMoratorios * interesDia;
                    //IVA
                    var totalVencIVA = diaIva * diasForInteres;

                    var gpsSumarAInteres = 0.00;
                    var pensionSumarAInteres = 0.00;
                    var polizaSumarAInteres = 0.00;
                    //Si es auto
                    if (tipeFormulario == 2 || tipeFormulario == 4) {
                        if (PolizaSeguro == '' || PolizaSeguro == null) {
                            PolizaSeguro = 0.00;
                        }
                        if (GPS == '' || GPS == null) {
                            GPS = 0.00;
                        }
                        if (Pension == '' || Pension == null) {
                            Pension = 0.00;
                        }
                        var gpsDiario = GPS / DiasContrato;
                        var pensionDiario = Pension / DiasContrato;
                        var polizaDiario = PolizaSeguro / DiasContrato;

                        var gpsInteresDiario = gpsDiario * diasForInteres;
                        var pensionInteresDiario = pensionDiario * diasForInteres;
                        var polizaInteresDiario = polizaDiario * diasForInteres;

                        var gpsInteresMoratorio = gpsDiario * diasMoratorios;
                        var pensionInteresMoratorio = pensionDiario * diasMoratorios;
                        var polizaInteresMoratorio = polizaDiario * diasMoratorios;

                        var gpsInteresFinal = gpsInteresDiario + gpsInteresMoratorio;
                        var pensionInteresFinal = pensionInteresDiario + pensionInteresMoratorio;
                        var polizaInteresFinal = polizaInteresDiario + polizaInteresMoratorio;

                        gpsSumarAInteres = gpsInteresFinal;
                        pensionSumarAInteres = pensionInteresFinal;
                        polizaSumarAInteres = polizaInteresFinal;

                        GPS = formatoMoneda(GPS);
                        Pension = formatoMoneda(Pension);
                        PolizaSeguro = formatoMoneda(PolizaSeguro);
                        document.getElementById('idGPSTDDes').innerHTML = GPS;
                        ;
                        document.getElementById('idPensionTDDes').innerHTML = Pension;
                        document.getElementById('idPolizaTDDes').innerHTML = PolizaSeguro;
                        $("#idGPSNota").val(formatoMoneda(gpsInteresFinal));
                        $("#idPolizaNota").val(formatoMoneda(pensionInteresFinal));
                        $("#idPensionNota").val(formatoMoneda(polizaInteresFinal));
                    }

                    //INTERES TABLA
                    var interesGenerado = totalVencInteres + totalVencAlm + totalVencSeg + diasInteresMor + totalVencIVA
                        //Mas auto
                        + gpsSumarAInteres + pensionSumarAInteres + polizaSumarAInteres;


                    interesGenerado = Math.round(interesGenerado * 100) / 100;
                    TotalPrestamo = Math.round(TotalPrestamo * 100) / 100;
                    diasInteresMor = Math.round(diasInteresMor * 100) / 100;
                    var TotalFinal = TotalPrestamo + interesGenerado;
                    $("#idInteresAbono").val(interesGenerado);
                    $("#idPrestamoAbono").val(TotalPrestamo);
                    $("#idTotalInput").val(TotalFinal);
                    totalFinal = TotalFinal;
                    $("#idTotalFinalInput").val(TotalFinal);
                    $("#idInteresPendiente").val(interesGenerado);


                    interesDia = formatoMoneda(interesDia);
                    totalVencInteres = formatoMoneda(totalVencInteres);
                    totalVencAlm = formatoMoneda(totalVencAlm);
                    totalVencSeg = formatoMoneda(totalVencSeg);
                    diasInteresMor = formatoMoneda(diasInteresMor);
                    totalVencIVA = formatoMoneda(totalVencIVA);
                    interesGenerado = formatoMoneda(interesGenerado);
                    TotalFinal = formatoMoneda(TotalFinal);
                    TotalPrestamo = formatoMoneda(TotalPrestamo);
                    $("#idAbonoAnteriorInput").val(Abono)
                    Abono = formatoMoneda(Abono);


                    //Valida si esta en almoneda
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }
                    $("#idTblFechaEmpeno").val(FechaEmp);
                    $("#idTblFechaVenc").val(FechaVenConvert);
                    $("#idTblFechaComer").val(FechaAlm);
                    $("#idTblDiasTransc").val(diasForInteres);
                    $("#idTblDiasTransInt").val(diasMoratorios);
                    $("#idTblPlazo").val(PlazoDesc);
                    $("#idTblTasa").val(tasaIvaTotal);
                    $("#idTblInteresDiario").val(interesDia);
                    $("#idTblInteres").val(totalVencInteres);
                    $("#idTblAlmacenaje").val(totalVencAlm);
                    $("#idTblSeguro").val(totalVencSeg);
                    $("#idTblMoratorios").val(diasInteresMor);
                    $("#idTblIva").val(totalVencIVA);

                    document.getElementById('idConTDDes').innerHTML = contrato;
                    document.getElementById('idPresTDDes').innerHTML = TotalPrestamo;
                    document.getElementById('idInteresTDDes').innerHTML = interesGenerado;
                    document.getElementById('idAbonoTDDes').innerHTML = Abono;

                    /*
                                      document.getElementById('totalAPagarTD').innerHTML = TotalFinal;*/
                    //NOTA Entrega
                    $("#idPrestamoNota").val(TotalPrestamo);
                    $("#idInteresNota").val(interesGenerado);
                    $("#idMoratoriosNota").val(diasInteresMor);
                    $("#idTotalPrestamoNota").val(TotalFinal);
                    $("#idTotalFinalNota").val(TotalFinal);
                    $("#idSaldoPendiente").val(TotalFinal);
                    $("#idInteresPendienteNota").val(interesGenerado);
                    $("#btnGenerar").prop('disabled', false);
                    $("#btnAbono").prop('disabled', false);
                    $("#idAbono").prop('disabled', false);

                }
            }
        });
    }
}

//Buscar detalle del contrato
function buscarDetalle() {
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 4,
            "contrato": contrato,
            "tipoContrato": tipoContrato,
            "estatus": estatus
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                var detalleContrato;
                for (i = 0; i < datos.length; i++) {
                    var Detalle = datos[i].Detalle;
                    var Ubicacion = datos[i].Ubicacion;

                    if (Detalle === null) {
                        Detalle = '';
                    }
                    if (Ubicacion === null) {
                        Ubicacion = '';
                    }

                    detalleContrato = Detalle + "\n" + "Ubicacion:" + Ubicacion;
                }
                $("#idDetalleContratoDes").val(detalleContrato);
            }
        });
    }
}

//Buscar detalle del auto
function buscarDetalleAuto() {
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 5,
            "contrato": contrato,
            "tipoContrato": tipoContrato,
            "estatus": estatus
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                var detalleContrato;
                for (i = 0; i < datos.length; i++) {
                    var Marca = datos[i].Marca;
                    var Modelo = datos[i].Modelo;
                    var Anio = datos[i].Anio;
                    var ColorAuto = datos[i].ColorAuto;
                    var Obs = datos[i].Obs;


                    if (Marca === null) {
                        Marca = '';
                    }
                    if (Modelo === null) {
                        Modelo = '';
                    }
                    if (Anio === null) {
                        Anio = '';
                    }
                    if (ColorAuto === null) {
                        ColorAuto = '';
                    }
                    if (Obs === null) {
                        Obs = '';
                    }

                    detalleContrato = "Marca: " + Marca + ", Modelo: " + Modelo + "\n" + "Año: " + Anio +
                        ColorAuto + "\n" +
                        Obs + "\n";
                }
                $("#idDetalleContratoDes").val(detalleContrato);
            }
        });
    }
}

//Validar token
function token() {
    var dataEnviar = {
        "token": $("#idCodigoAut").val()
    };
    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Desempeno/Token.php',
        type: 'post',
        success: function (response) {
            if (response > 0) {
                $("#idImporte").prop('disabled', false);
                $("#idToken").val(response);
                // var token = parseInt(response);
                var token = 20;

                if (token > 20) {
                    alert("Los Token se estan terminando, favor de avisar al administrador");
                }

                alertify.success("Código correcto.");
                $("#idCodigoAut").val('');
                $("#btnDescuento").prop('disabled', false);
                $("#idAbonoCapitalNota").val('$0.00');
                var totaFinalInput = $("#idTotalFinalInput").val();
                totaFinalInput = parseFloat(totaFinalInput);
                totaFinalInput = formatoMoneda(totaFinalInput);
                $("#idSaldoPendiente").val(totaFinalInput);

            } else {
                $("#idChekcDescuento").prop("checked", false);
                $("#idImporte").prop('disabled', true);
                if (errorToken < 3) {
                    errorToken += 1;
                    alertify.warning("Error de código. Por favor Verifique.");

                } else {
                    alertify.error("Demasiados intentos. Intente más tarde.");
                }
            }
        },
    })

}

//Check de descuento activado
function checkDescuento() {

}

//Calcular descuento
function reCalculaDescuento() {
    var importe = $("#idImporte").val();
    if (importe == '') {
        alert("Por favor ingrese el descuento.");
    } else {
        var interes = $("#idInteresAbono").val();
        var interes = parseFloat(interes);

        var importe = parseFloat(importe);
        if (importe <= interes) {
            var intersPendiente = interes - importe;
            intersPendiente = Math.round(intersPendiente * 100) / 100;
            $("#idInteresPendiente").val(intersPendiente);
            $("#idInteresPendienteNota").val(intersPendiente);
            var toatalFinal = $("#idTotalInput").val();
            var totalFinal = parseFloat(toatalFinal);
            var subTotal = totalFinal - importe;
            $("#idSaldoPendienteInput").val(subTotal);
            totalFinal = subTotal;
            subTotal = formatoMoneda(subTotal);
            $("#idTotalFinalInput").val(totalFinal);
            $("#idTotalFinalNota").val(subTotal);
            $("#idSaldoPendiente").val(subTotal);
            $("#btnDescuento").hide();
            $("#idImporte").prop('disabled', true)
            $("#btnDescuentoDelete").show();
            borrarAbono();

        } else {
            alert("El importe no puede ser mayor al interes.");
        }
    }
}

//Borrar descuento
function borrarDescuento() {
    var importe = 0;
    var interes = $("#idInteresAbono").val();
    var interes = parseFloat(interes);
    var intersPendiente = interes - importe;
    intersPendiente = Math.round(intersPendiente * 100) / 100;
    $("#idInteresPendiente").val(intersPendiente);
    $("#idInteresPendienteNota").val(intersPendiente);
    var toatalFinal = $("#idTotalInput").val();
    var totalFinal = parseFloat(toatalFinal);
    var subTotal = totalFinal - importe;
    $("#idSaldoPendienteInput").val(subTotal);
    totalFinal = subTotal;
    subTotal = formatoMoneda(subTotal);
    $("#idTotalFinalInput").val(totalFinal);
    $("#idTotalFinalNota").val(subTotal);
    $("#idSaldoPendiente").val(subTotal);
    $("#idImporte").val('');
    $("#btnDescuento").show();
    $("#idImporte").prop('disabled', false)
    $("#btnDescuentoDelete").hide();


}

//Calcular Abono
function calcularAbono() {
    var abono = $("#idAbono").val();
    if (abono == '') {
        alert("Por favor ingrese el abono.");
    } else {
        var abono = parseFloat(abono);
        var interesPendiente = $("#idInteresPendiente").val();
        var interesPendiente = parseFloat(interesPendiente);
        if (abono < interesPendiente) {
            alert("El abono no puede ser menor al Interes Pendiente");
        } else {
            var totalFinalInput = $("#idTotalFinalInput").val();
            totalFinalInput = parseFloat(totalFinalInput);
            if (abono > totalFinalInput) {
                alert("El abono no puede ser mayor al Total a Pagar.");
            } else {
                var totalPrestamo = $("#idPrestamoAbono").val();
                var totalPrestamo = parseFloat(totalPrestamo);
                var abonoResta = abono - interesPendiente;
                var saldoPendiente = totalPrestamo - abonoResta;
                saldoPendiente = Math.round(saldoPendiente * 100) / 100;
                $("#idSaldoPendienteInput").val(saldoPendiente);
                abonoResta = Math.round(abonoResta * 100) / 100;
                $("#idAbonoACapitalInput").val(abonoResta)
                abonoResta = formatoMoneda(abonoResta);
                saldoPendiente = formatoMoneda(saldoPendiente);
                alert("Se abonara a capital: " + abonoResta);
                alert("El importe restante es : " + saldoPendiente);
                $("#idAbonoCapitalNota").val(abonoResta);
                $("#idSaldoPendiente").val(saldoPendiente);
                $("#btnAbono").hide();
                $("#idAbono").prop('disabled', true)
                $("#btnAbonoDelete").show();
            }
        }
    }
}
//Borrar Abono
function borrarAbono() {
    var totalPrestamo = $("#idPrestamoAbono").val();
    var totalPrestamo = parseFloat(totalPrestamo);
    var interes = $("#idInteresPendiente").val();
    var interes = parseFloat(interes);

    var saldoPendiente = totalPrestamo +interes;
    saldoPendiente = Math.round(saldoPendiente * 100) / 100;
    $("#idSaldoPendienteInput").val(saldoPendiente);
    saldoPendiente = formatoMoneda(saldoPendiente);
    $("#idSaldoPendiente").val(saldoPendiente);
    $("#idAbonoACapitalInput").val(0)
    $("#idAbonoCapitalNota").val('$0.00');


    $("#idAbono").val('')
    $("#btnAbono").show();
    $("#idAbono").prop('disabled', false)
    $("#btnAbonoDelete").hide();


}

//Generar pago
function generar() {
    //$tipe == 1 es refrendo normal
    //$tipe == 2 es refrendo auto
    //$tipe == 3 es desempeño normal
    //$tipe == 4 es desempeño auto
    var contratoBusqueda = $("#idContratoBusqueda").val();
    var saldoPendiente = $("#idSaldoPendienteInput").val();
    var abonoACapital=0;
    var validate = 1;
    if (contratoBusqueda == '') {
        alert("Por favor. Realice la busqueda de contrato.");
        validate = 0;
    }
    if (saldoPendiente == 0.00) {
        alert("Por favor. Realice la operación de pago.");
        validate = 0;
    }
    if (tipeFormulario == 1 || tipeFormulario == 2) {
        abonoACapital = $("#idAbonoACapitalInput").val();

    }
    if (validate == 1) {
        var totalInicial = $("#idTotalInput").val();
        totalInicial = parseFloat(totalInicial);
        saldoPendiente = parseFloat(saldoPendiente);
        if (totalInicial == saldoPendiente) {
            alert("Por favor realice un pago.");
        } else {
            var token = $("#idToken").val();




            var abono = 0.00;
            var descuento;
            var descuentoFinal = 0.00;
            var descuentoAnterior = 0.00;
            var gps = null;
            var pension = null;
            var poliza = null;
            var newFechaVencimiento = null;
            var newFechaAlm = null;
            var idEstatusArt = 1;
            //si trae descuento
            if (token != '') {
                descuento = $("#idImporte").val();
                descuentoAnterior = $("#idDescuentoAnterior").val();
                descuento = parseFloat(descuento);
                descuentoAnterior = parseFloat(descuentoAnterior);
                descuentoFinal = descuento + descuentoAnterior;
            } else {
                token = 0;
                descuento = 0.00;
                descuentoAnterior = $("#idDescuentoAnterior").val();
                descuentoAnterior = parseFloat(descuentoAnterior);
                descuentoFinal = descuento + descuentoAnterior;
                descuentoFinal = Math.round(descuentoFinal * 100) / 100;

            }
            //Refrendo
            if (tipeFormulario == 1||tipeFormulario == 2) {
                var abonoAnterior = $("#idAbonoAnteriorInput").val();

                var nombreMensaje = "Refrendo";
                abonoAnterior = parseFloat(abonoAnterior);
                abonoACapital = parseFloat(abonoACapital);
                abono = abonoAnterior + abonoACapital;
                abono = Math.round(abono * 100) / 100;

                newFechaVencimiento = $("#idNuevaFechaVenc").val();
                newFechaAlm = $("#idNuevaFechaAlm").val();
            }
            descuentoFinal = Math.round(descuentoFinal * 100) / 100;

            var dataEnviar = {
                "contrato": contratoBusqueda,
                "token": token,
                "descuento": descuento,
                "descuentoFinal": descuentoFinal,
                "abonoACapital": abono,
                "saldoPendiente": saldoPendiente,
                "gps": gps,
                "pension": pension,
                "poliza": poliza,
                "newFechaVencimiento": newFechaVencimiento,
                "newFechaAlm": newFechaAlm,
                "idEstatusArt": idEstatusArt,
                "tipeFormulario": tipeFormulario
            };

            $.ajax({
                data: dataEnviar,
                url: '../../../com.Mexicash/Controlador/Desempeno/generarDesempeno.php',
                type: 'post',
                success: function (response) {
                    if (response == -1) {
                        alertify.error("Error al generar " + nombreMensaje);
                    } else {
                        alert(nombreMensaje+" generado.")
                        cancelar();

                    }
                },
            })
        }

    }

}


function cancelar() {
    location.reload();
    alertify.success(nombreMensaje + " generado.");
}



