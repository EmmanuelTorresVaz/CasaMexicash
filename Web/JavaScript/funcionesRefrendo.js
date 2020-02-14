var errorToken = 0;
//tipo de contrato articulo
var tipoContrato = 1;
//tipo de contrato auto
// var tipoContrato = 2;
//Estatus 1 es Empeño
var estatus = 1;
// tipe 1 refrendo,tipe 2 refrendo auto,tipe 3 desempeño,tipe 4 desempeño auto,
var tipeFormulario = 1;

//Consultar contrato
function estatusContrato() {
    var contrato = $("#idContrato").val();
    $("#idFormDesRef")[0].reset();
    $("#idConTDDes").text('')
    $("#idPresTDDes").text('')
    $("#idInteresTDDes").text('');
    $("#idAbonoTDDes").text('');
    $("#btnGenerar").prop('disabled', true);
    $("#btnAbono").prop('disabled', true);
    $("#idAbono").prop('disabled', true);
    $("#idContrato").prop('disabled', true);


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
                            buscarDetalle();
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
    var contrato = $("#idContrato").val();
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
    var contrato = $("#idContrato").val();
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
                    var FechaAbono = datos[i].FechaAbono;
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

                    //INTERES TABLA
                    var interesGenerado = totalVencInteres + totalVencAlm + totalVencSeg + diasInteresMor + totalVencIVA;


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


                    //Valida si esta en almoneda
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }


                    $("#idDatosContratoDes").val("Fecha Empeño : " + FechaEmp + "\n" +
                        "Fecha Vencimiento : " + FechaVenConvert + "\n" +
                        "Fecha Comercialización : " + FechaAlm + "\n" +
                        "Días transcurridos : " + diasForInteres + "\n" +
                        "Días transcurridos interés : " + diasMoratorios + "\n" +
                        "Plazo : " + PlazoDesc + "\n" +
                        "Tasa : " + tasaIvaTotal + "% \n" +
                        "Interes diario : " + interesDia + "\n" +
                        "Interes : " + totalVencInteres + "\n" +
                        "Almacenaje : " + totalVencAlm + "\n" +
                        "Seguro : " + totalVencSeg + "\n" +
                        "Moratorios : " + diasInteresMor + "\n" +
                        "IVA : " + totalVencIVA);

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
    var contrato = $("#idContrato").val();
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
    $("#idCodigoAut").val('');
    $("#btnDescuento").prop('disabled', false);
    $("#idAbonoCapitalNota").val('$0.00');
    $("#idSaldoPendiente").val($("#idTotalFinalInput").val());
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


        } else {
            alert("El importe no puede ser mayor al interes.");
        }
    }
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
            var totalFinalInput = parseFloat(totalFinalInput);
            if (abono > totalFinalInput) {
                alert("El abono no puede ser mayor al Total a Pagar.");
            } else {
                var totalPrestamo = $("#idPrestamoAbono").val();
                var totalPrestamo = parseFloat(totalPrestamo);
                var abonoResta = abono - interesPendiente;
                var saldoPendiente = totalPrestamo - abonoResta;
                $("#idSaldoPendienteInput").val(saldoPendiente);
                abonoResta = formatoMoneda(abonoResta);
                saldoPendiente = formatoMoneda(saldoPendiente);
                alert("Se abonara a capital: " + abonoResta);
                alert("El importe restante es : " + saldoPendiente);
                $("#idAbonoCapitalNota").val(abonoResta);
                $("#idSaldoPendiente").val(saldoPendiente);
            }
        }
    }
}

//Generar pago
function generar() {
    //$tipe == 1 es refrendo normal
    //$tipe == 2 es refrendo auto
    //$tipe == 3 es desempeño normal
    //$tipe == 4 es desempeño auto
    var contratoBusqueda = $("#idContratoBusqueda").val();

    if (contratoBusqueda == '') {
        alert("Por favor. Realice la busqueda de contrato.")
    } else {
        var saldoPendiente = $("#idSaldoPendienteInput").val();
        if (saldoPendiente == 0.00) {
            alert("Por favor. Realice la operación de pago.")
        } else {
            var totalInicial = $("#idTotalInput").val();
            totalInicial = parseFloat(totalInicial);
            saldoPendiente = parseFloat(saldoPendiente);
            if (totalInicial == saldoPendiente) {
                alert("Por favor realice un pago.");
            } else {
                var token = $("#idToken").val();
                var abonoACapital = 0.00;
                var descuento;
                var gps = null;
                var pension= null;
                var poliza= null;
                //si trae descuento
                if (token != '') {
                    descuento = $("#idImporte").val();
                }else{
                    token = 0;
                     descuento = 0.00;
                }
                //Refrendo
                if (tipeFormulario == 1) {
                    abonoACapital = $("#idAbonoCapitalNota").val();
                }


                var dataEnviar = {
                    "contrato": contratoBusqueda,
                    "token": token,
                    "descuento": descuento,
                    "abonoACapital": abonoACapital,
                    "saldoPendiente": saldoPendiente,
                    "gps": gps,
                    "pension": pension,
                    "poliza": poliza,
                    "tipeFormulario": tipeFormulario
                };

                $.ajax({
                    data: dataEnviar,
                    url: '../../../com.Mexicash/Controlador/Desempeno/generarDesempeno.php',
                    type: 'post',
                    success: function (response) {
                        if (response > 0) {
                            cancelarDesempeno();
                            alertify.success("Desempeño generado.");
                        } else {
                            alertify.error("Error al generar desempeño.");
                        }
                    },
                })
            }
        }
    }
}

function cancelar() {
    $("#idFormDesRef")[0].reset();
    $("#idConTDDes").text('')
    $("#idPresTDDes").text('')
    $("#idInteresTDDes").text('');
    $("#idAbonoTDDes").text('');
    $("#btnGenerar").prop('disabled', true);
    $("#btnAbono").prop('disabled', true);
    $("#idAbono").prop('disabled', true);
}

//consultar contrato
function buscarContratoRefAuto() {
    estatusContratoAutoRef();
}

function estatusContratoAutoRef() {
    var contrato = $("#idContrato").val();
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 10,
            "contratoDese": contrato
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
                            buscarClienteDesAutoRef();
                            buscarDatosConDesAutoRef();
                            buscarDetalleDesAutoRef();
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

function buscarClienteDesAutoRef() {
    var contrato = $("#idContrato").val();
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 4,
            "contratoDese": contrato
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                if (datos.length > 0) {
                    for (i = 0; i < datos.length; i++) {

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
                        $("#idDatosClienteDesAuto").val(NombreCompleto + "\n" + DireccionCompleta + "\n" + DireccionCompletaEst + "\n" + "Cotitular: " + Cotitular + "\n" + "Usuario: " + UsuarioName);

                    }
                } else {
                    $("#idDatosClienteDesAuto").val('');
                    $("#idDatosContratoDesAuto").val('');
                    $("#idDetalleContratoDesAuto").val('');
                    document.getElementById('idConTDDesAuto').innerHTML = '';
                    document.getElementById('idPresTDDesAuto').innerHTML = '';
                    document.getElementById('idInteresTDDesAuto').innerHTML = '';
                    document.getElementById('totalAPagarTDAuto').innerHTML = '';
                    estatusContrato();
                }
            }
        });
    } else {
        alertify.error("Ingrese un contrato a buscar.");
    }
}

function buscarDatosConDesAutoRef() {
    var contrato = $("#idContrato").val();
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 8,
            "contratoDese": contrato
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                $("#idContratoBusqueda").val(contrato);
                for (i = 0; i < datos.length; i++) {
                    var PolizaSeguro = datos[i].PolizaSeguro;
                    var GPS = datos[i].GPS;
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
                    var FechaAbono = datos[i].FechaAbono;
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
                        document.getElementById('idAbonoTDRefAuto').innerHTML = Abono;
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

                    //INTERES TABLA
                    var interesGenerado = totalVencInteres + totalVencAlm + totalVencSeg + diasInteresMor + totalVencIVA;
                    PolizaSeguro = parseFloat(PolizaSeguro);
                    GPS = parseFloat(GPS);
                    var TotalFinal = TotalPrestamo + interesGenerado + PolizaSeguro + GPS;

                    interesDia = Math.round(interesDia * 100) / 100;
                    totalVencInteres = Math.round(totalVencInteres * 100) / 100;
                    totalVencAlm = Math.round(totalVencAlm * 100) / 100;
                    totalVencSeg = Math.round(totalVencSeg * 100) / 100;
                    diasInteresMor = Math.round(diasInteresMor * 100) / 100;
                    totalVencIVA = Math.round(totalVencIVA * 100) / 100;
                    interesGenerado = Math.round(interesGenerado * 100) / 100;
                    TotalFinal = Math.round(TotalFinal * 100) / 100;
                    PolizaSeguro = Math.round(PolizaSeguro * 100) / 100;
                    GPS = Math.round(GPS * 100) / 100;


                    //Valida si esta en almoneda
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }


                    $("#idDatosContratoDesAuto").val("Fecha Empeño : " + FechaEmp + "\n" +
                        "Fecha Vencimiento : " + FechaVenc + "\n" +
                        "Fecha Comercialización : " + FechaAlm + "\n" +
                        "Días transcurridos : " + diasForInteres + "\n" +
                        "Días transcurridos interés : " + diasMoratorios + "\n" +
                        "Plazo : " + PlazoDesc + "\n" +
                        "Tasa : " + tasaIvaTotal + "% \n" +
                        "Interes diario : $" + interesDia + "\n" +
                        "Interes : $" + totalVencInteres + "\n" +
                        "Almacenaje : $" + totalVencAlm + "\n" +
                        "Seguro : $" + totalVencSeg + "\n" +
                        "Moratorios : $" + diasInteresMor + "\n" +
                        "IVA : $" + totalVencIVA + "\n" +
                        "GPS : " + GPS + "\n" +
                        "Desempeño Ext : $ Preguntar");

                    document.getElementById('idConTDDesAuto').innerHTML = contrato;
                    document.getElementById('idPresTDDesAuto').innerHTML = TotalPrestamo;
                    document.getElementById('idInteresTDDesAuto').innerHTML = interesGenerado;
                    document.getElementById('idPolizaSegTDDes').innerHTML = PolizaSeguro;
                    document.getElementById('idGPSTDDes').innerHTML = GPS;

                    document.getElementById('totalAPagarTDAuto').innerHTML = TotalFinal;
                    $("#btnGenerar").prop('disabled', false);
                    $("#idInteresAbono").val(interesGenerado);
                    $("#idPrestamoAbono").val(TotalPrestamo);
                }
            }
        });

    }
}

function buscarDetalleDesAutoRef() {
    var contrato = $("#idContrato").val();
    if (contrato != '') {
        var dataEnviar = {
            "tipe": 6,
            "contratoDese": contrato
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

                    detalleContrato = Marca + " " + Modelo + "\n" +
                        Anio + " " + ColorAuto + "\n" +
                        Obs + "\n";
                }
                $("#idDetalleContratoDesAuto").val(detalleContrato);
            }
        });
    }
}


function checkDescuentoAuto() {
    var checkBox = document.getElementById("idDescuentoAuto");
    if (checkBox.checked == true) {
        $("#idImporteAuto").prop('disabled', false);
    } else {
        $("#idImporteAuto").prop('disabled', true);
    }
}

function reCalculaDescuentoAuto() {
    var total = $("#totalAPagarTDAuto").text();
    var total = parseFloat(total);
    var importe = $("#idImporteAuto").val();
    var importe = parseFloat(importe);
    var descuento = total - importe;
    document.getElementById('totalDecuentoTD').innerHTML = descuento.toFixed(2);
    $("#totalDecuentoTD").show();
}

function generarDesempenoAuto() {
    var dataEnviar = {
        "pago": $("#totalDecuentoTD").text(),
        "idContrato": $("#idContratoBusqueda").val(),
        "descuento": $("#idImporteAuto").val()
    };

    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Desempeno/generarDesempenoAuto.php',
        type: 'post',
        success: function (response) {
            if (response > 0) {
                cancelarDesempenoAuto();
                alertify.success("Desempeño generado.");
            } else {
                alertify.error("Error al generar desempeño.");
            }
        },
    })
}

function cancelarDesempenoAuto() {
    $("#idFormDesAuto")[0].reset();
    $("#totalAPagarTDAuto").text('');
    $("#totalDecuentoTD").text('');


    $("#idConTDDesAuto").text('');
    $("#idPresTDDesAuto").text('');
    $("#idInteresTDDesAuto").text('');

}


