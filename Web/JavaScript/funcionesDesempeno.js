//consultar contrato
function buscarContratoDes() {
    estatusContrato();
}

function estatusContrato(){
    var contratoDesp = $("#idContratoDesempeno").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 9,
            "contratoDese": contratoDesp
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                if (datos.length > 0) {
                    $("#idContratoBusqueda").val(contratoDesp);
                    for (i = 0; i < datos.length; i++) {
                        var Contrato = datos[i].Contrato;
                        var Fecha = datos[i].Fecha;
                        var NombreCompleto = datos[i].NombreCompleto;
                        var Estatus = datos[i].Estatus;
                        var idEstatus = datos[i].idEstatus;

                        if (idEstatus == 1) {
                            buscarClienteDes();
                            buscarDatosConDes();
                            buscarDetalleDes();
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
    }else{
        alertify.error("Ingrese un contrato a buscar.");
    }
}

function buscarClienteDes() {
    var contratoDesp = $("#idContratoDesempeno").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 1,
            "contratoDese": contratoDesp
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

function buscarDatosConDes() {
    var contratoDesp = $("#idContratoDesempeno").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 2,
            "contratoDese": contratoDesp
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                $("#idContratoBusqueda").val(contratoDesp);
                for (i = 0; i < datos.length; i++) {
                    var FechaEmp = datos[i].FechaEmp;
                    var FechaEmpConvert = datos[i].FechaEmpConvert;
                    var FechaVenc = datos[i].FechaVenc;
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

                    if(Abono==''){
                        alert("Si tiene abono");
                    }else {
                        var FechaEmpFormat = formatStringToDate(FechaEmpConvert);
                        var fechaHoyText = fechaFormato();
                        if(FechaEmpConvert==fechaHoyText){
                            diasForInteres =1;
                        }else{
                            var diasdif = fechaHoy.getTime() - FechaEmpFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                            diaInteres= diaInteres -1;
                        }


                       /* if ( FechaEmpFormat < fechaHoy ) {
                            var diasdif = fechaHoy.getTime() - FechaEmpFormat.getTime();
                            dias = Math.round(diasdif / (1000 * 60 * 60 * 24));
                           alert(dias)
                        }else{
                            alert("La Fecha de empeño es la misma a la de hoy")
                        }*/
                    }

                    //SE obtienen los intereses en  porcentajes
                    IvaDesc = "0." + IvaDesc;
                    TasaDesc = parseFloat(TasaDesc);
                    AlmacDesc = parseFloat(AlmacDesc);
                    SeguDesc = parseFloat(SeguDesc);
                    IvaDesc = parseFloat(IvaDesc);
                    DiasContrato = parseInt(DiasContrato);
                    TotalPrestamo = parseFloat(TotalPrestamo);
                    TotalInteresPrestamo = parseFloat(TotalInteresPrestamo);

                    //Interes Total porcentaje
                    var tasaIvaTotal = TasaDesc + AlmacDesc + SeguDesc + IvaDesc;

                    //var diasVencidos = Dias;

                    //Valida si esta en almoneda
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }

                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrestamo * TasaDesc) / 100;
                    var calculaALm = Math.floor(TotalPrestamo * AlmacDesc) / 100;
                    var calculaSeg = Math.floor(TotalPrestamo * SeguDesc) / 100;
                    var calculaIva = Math.floor(TotalPrestamo * IvaDesc) / 100;

                    var totalInteres = calculaInteres + calculaALm +calculaSeg + calculaIva;
                    //Se calcula el interes por día
                    var interesDia = totalInteres / DiasContrato;
                    //Formato a fechas para obtener dias moratorios

                    var FechaVencFormat = formatStringToDate(FechaVenc);
                    var diasMoratorios = 0;
                    var  diasInteresMor =0;
                    if (FechaVencFormat < fechaHoy) {
                        var diasdif = fechaHoy.getTime() - FechaVencFormat.getTime();
                        diasMoratorios = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        diasInteresMor =  diasMoratorios * interesDia;
                    }

                    //Porcentajes por dia
                    var diaInteres = calculaInteres / DiasContrato;
                    var diaAlm = calculaALm / DiasContrato;
                    var diaSeg = calculaSeg / DiasContrato;
                    var diaIva = calculaIva / DiasContrato;
                    //Se calculan los intereses por día
                    var totalVencInteres = diaInteres * diasInteres;
                    var totalVencAlm = diaAlm * diasInteres;
                    var totalVencSeg = diaSeg * diasInteres;
                    var totalVencIVA = diaIva * diasInteres;

                    //Porcentajes por dia

                    var interesGenerado = totalVencInteres + totalVencAlm + totalVencSeg + totalVencIVA;
                    interesGenerado = interesGenerado + diasInteresMor;
                    var TotalFinal = TotalPrestamo + interesGenerado;

                    $("#idDatosContratoDes").val("Fecha Empeño :" + FechaEmp + "\n" +
                        "Fecha Vencimiento :" + FechaVenc + "\n" +
                        "Fecha Comercialización :" + FechaAlm + "\n" +
                        "Días transcurridos :" + diasInteres + "\n" +
                        "Días transcurridos interés :" + diasMoratorios + "\n" +
                        "Plazo :" + PlazoDesc + "\n" +
                        "Tasa :" + tasaIvaTotal + "\n" +
                        "Interes diario : $" + interesDia.toFixed(2) + "\n" +
                        "Interes : $" + totalVencInteres.toFixed(2) + "\n" +
                        "Almacenaje : $" + totalVencAlm.toFixed(2) + "\n" +
                        "Seguro : $" + totalVencSeg.toFixed(2) + "\n" +
                        "Moratorios : $" +  diasInteresMor.toFixed(2) + "\n" +
                        "IVA : $" + totalVencIVA.toFixed(2) + "\n" +
                        "Desempeño Ext : $ Preguntar");

                    document.getElementById('idConTDDes').innerHTML = contratoDesp;
                    document.getElementById('idPresTDDes').innerHTML = TotalPrestamo.toFixed(2);
                    document.getElementById('idInteresTDDes').innerHTML = interesGenerado.toFixed(2);
                    document.getElementById('totalAPagarTD').innerHTML = TotalFinal.toFixed(2);
                    $("#btnGenerar").prop('disabled', false);
                    $("#totalTD").show();
                }
            }
        });
    }
}

function buscarDetalleDes() {
    var contratoDesp = $("#idContratoDesempeno").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 3,
            "contratoDese": contratoDesp
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

                    detalleContrato = Detalle + "\n" + "Ubicacion:" + "\n" + Ubicacion + "\n";
                }
                $("#idDetalleContratoDes").val(detalleContrato);
            }
        });
    }
}


//consultar contrato
function buscarContratoDesAuto() {
    estatusContratoAuto();
}

function estatusContratoAuto(){
    var contratoDesp = $("#idContratoDesempenoAuto").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 10,
            "contratoDese": contratoDesp
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                if (datos.length > 0) {
                    $("#idContratoBusqueda").val(contratoDesp);
                    for (i = 0; i < datos.length; i++) {
                        var Contrato = datos[i].Contrato;
                        var Fecha = datos[i].Fecha;
                        var NombreCompleto = datos[i].NombreCompleto;
                        var Estatus = datos[i].Estatus;
                        var idEstatus = datos[i].idEstatus;

                        if (idEstatus == 1) {
                            buscarClienteDesAuto();
                            buscarDatosConDesAuto();
                            buscarDetalleDesAuto();
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
    }else{
        alertify.error("Ingrese un contrato a buscar.");
    }
}

function buscarClienteDesAuto() {
    var contratoDesp = $("#idContratoDesempenoAuto").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 4,
            "contratoDese": contratoDesp
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

function buscarDatosConDesAuto() {
    var contratoDesp = $("#idContratoDesempenoAuto").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 5,
            "contratoDese": contratoDesp
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                $("#idContratoBusqueda").val(contratoDesp);
                for (i = 0; i < datos.length; i++) {
                    var PolizaSeguro = datos[i].PolizaSeguro;
                    var GPS = datos[i].GPS;
                    var FechaEmp = datos[i].FechaEmp;
                    var FechaVenc = datos[i].FechaVenc;
                    var FechaAlm = datos[i].FechaAlm;
                    var PlazoDesc = datos[i].PlazoDesc;
                    var TasaDesc = datos[i].TasaDesc;
                    var AlmacDesc = datos[i].AlmacDesc;
                    var SeguDesc = datos[i].SeguDesc;
                    var IvaDesc = datos[i].IvaDesc;
                    var Dias = datos[i].Dias;
                    var TotalPrestamo = datos[i].TotalPrestamo;
                    var TotalInteresPrestamo = datos[i].TotalInteresPrestamo;



                    //SE obtienen los intereses en  porcentajes
                    IvaDesc = "0." + IvaDesc;
                    TasaDesc = parseFloat(TasaDesc);
                    AlmacDesc = parseFloat(AlmacDesc);
                    SeguDesc = parseFloat(SeguDesc);
                    IvaDesc = parseFloat(IvaDesc);
                    Dias = parseInt(Dias);
                    TotalPrestamo = parseFloat(TotalPrestamo);
                    TotalInteresPrestamo = parseFloat(TotalInteresPrestamo);

                    //Interes Total porcentaje
                    var tasaIvaTotal = TasaDesc + AlmacDesc + SeguDesc + IvaDesc;

                    var diasVencidos = Dias;

                    //Valida si esta en almoneda
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }





                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrestamo * TasaDesc) / 100;
                    var calculaALm = Math.floor(TotalPrestamo * AlmacDesc) / 100;
                    var calculaSeg = Math.floor(TotalPrestamo * SeguDesc) / 100;
                    var calculaIva = Math.floor(TotalPrestamo * IvaDesc) / 100;

                    var totalInteres = calculaInteres + calculaALm +calculaSeg + calculaIva;
                    //Se calcula el interes por día
                    var interesDia = totalInteres / Dias;
                    //Formato a fechas para obtener dias moratorios
                    var fechaHoy = new Date();
                    var FechaVencFormat = formatStringToDate(FechaVenc);
                    var diasMoratorios = 0;
                    var  diasInteresMor =0;
                    if (FechaVencFormat < fechaHoy) {
                        var diasdif = fechaHoy.getTime() - FechaVencFormat.getTime();
                        diasMoratorios = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        diasInteresMor =  diasMoratorios * interesDia;
                    }

                    //Porcentajes por dia
                    var diaInteres = calculaInteres / Dias;
                    var diaAlm = calculaALm / Dias;
                    var diaSeg = calculaSeg / Dias;
                    var diaIva = calculaIva / Dias;
                    //Se calculan los intereses por día
                    var totalVencInteres = diaInteres * diasVencidos;
                    var totalVencAlm = diaAlm * diasVencidos;
                    var totalVencSeg = diaSeg * diasVencidos;
                    var totalVencIVA = diaIva * diasVencidos;

                    //Porcentajes por dia

                    var interesGenerado = totalVencInteres + totalVencAlm + totalVencSeg + totalVencIVA;
                    interesGenerado = interesGenerado + diasInteresMor;
                    PolizaSeguro = parseFloat(PolizaSeguro);
                    GPS = parseFloat(GPS);
                    var TotalFinal = TotalPrestamo + interesGenerado +PolizaSeguro +GPS;


                    $("#idDatosContratoDesAuto").val("Fecha Empeño :" + FechaEmp + "\n" +
                        "Fecha Vencimiento :" + FechaVenc + "\n" +
                        "Fecha Comercialización :" + FechaAlm + "\n" +
                        "Días transcurridos :" + diasVencidos + "\n" +
                        "Días transcurridos interés :" + diasVencidos + "\n" +
                        "Plazo :" + PlazoDesc + "\n" +
                        "Tasa :" + tasaIvaTotal + "\n" +
                        "Interes diario : $" + interesDia.toFixed(2) + "\n" +
                        "Interes : $" + totalVencInteres.toFixed(2) + "\n" +
                        "Almacenaje : $" + totalVencAlm.toFixed(2) + "\n" +
                        "Seguro : $" + totalVencSeg.toFixed(2) + "\n" +
                        "Moratorios : $" +  diasInteresMor.toFixed(2) + "\n" +
                        "IVA : $" + totalVencIVA.toFixed(2) + "\n" +
                        "Poliza Seguro :"  + PolizaSeguro.toFixed(2) + "\n" +
                        "GPS : " + GPS.toFixed(2) + "\n" +
                        "Desempeño Ext : $ Preguntar");

                    document.getElementById('idConTDDesAuto').innerHTML = contratoDesp;
                    document.getElementById('idPresTDDesAuto').innerHTML = TotalPrestamo.toFixed(2);
                    document.getElementById('idInteresTDDesAuto').innerHTML = interesGenerado.toFixed(2);
                    document.getElementById('idPolizaSegTDDes').innerHTML = PolizaSeguro.toFixed(2);
                    document.getElementById('idGPSTDDes').innerHTML = GPS.toFixed(2);

                    document.getElementById('totalAPagarTDAuto').innerHTML = TotalFinal.toFixed(2);
                    $("#btnGenerar").prop('disabled', false);
                    $("#totalTD").show();
                }
            }
        });

    }
}

function buscarDetalleDesAuto() {
    var contratoDesp = $("#idContratoDesempenoAuto").val();
    if (contratoDesp != '') {
        var dataEnviar = {
            "tipe": 6,
            "contratoDese": contratoDesp
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




function checkDescuento() {
    var checkBox = document.getElementById("idDescuento");
    if (checkBox.checked == true) {
        $("#idPorcentaje").prop('disabled', false);
        $("#idImporte").prop('disabled', false);
    } else {
        $("#idPorcentaje").prop('disabled', true);
        $("#idImporte").prop('disabled', true);
    }
}
function calculaDescuento() {
    var descuento = $("#idPorcentaje").val();
    var descuento = parseInt(descuento);
    if (descuento > 10) {
        alert("El descuento no puede ser mayor al 10%");
    } else {
        var total = $("#totalAPagarTD").text();
        var total = parseFloat(total);
        var importe = Math.floor(total * descuento) / 100;
        importe = importe.toFixed(2);
        var descuento = total - importe;
        $("#idImporte").val(importe);
        document.getElementById('totalDecuentoTD').innerHTML = descuento.toFixed(2);
        $("#descuentoTD").show();

    }
}
function reCalculaDescuento() {
    var total = $("#totalAPagarTD").text();
    var total = parseFloat(total);
    var importe = $("#idImporte").val();
    var importe = parseFloat(importe);
    var descuento = total - importe;
    document.getElementById('totalDecuentoTD').innerHTML = descuento.toFixed(2);
    $("#totalDecuentoTD").show();
}

function generarDesempeno() {
        var dataEnviar = {
            "pago":  $("#totalDecuentoTD").text(),
            "idContrato":  $("#idContratoBusqueda").val(),
            "descuento": $("#idImporte").val()
        };

        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Desempeno/generarDesempeno.php',
            type: 'post',
            success: function (response) {
                if (response>0) {
                    cancelarDesempeno();
                    alertify.success("Desempeño generado.");
                } else {
                    alertify.error("Error al generar desempeño.");
                }
            },
        })
}
function cancelarDesempeno() {
    $("#idFormDes")[0].reset();
    $("#totalAPagarTD").text('')
    $("#totalDecuentoTD").text('')
    $("#totalTD").hide();
    $("#descuentoTD").hide();

    $("#idConTDDes").text('');
    $("#idPresTDDes").text('');
    $("#idInteresTDDes").text('');
}

function checkDescuentoAuto() {
    var checkBox = document.getElementById("idDescuentoAuto");
    if (checkBox.checked == true) {
        $("#idPorcentajeAuto").prop('disabled', false);
        $("#idImporteAuto").prop('disabled', false);
    } else {
        $("#idPorcentajeAuto").prop('disabled', true);
        $("#idImporteAuto").prop('disabled', true);
    }
}
function calculaDescuentoAuto() {
    var descuento = $("#idPorcentajeAuto").val();
    var descuento = parseInt(descuento);
    if (descuento > 10) {
        alert("El descuento no puede ser mayor al 10%");
    } else {
        var total = $("#totalAPagarTDAuto").text();
        var total = parseFloat(total);
        var importe = Math.floor(total * descuento) / 100;
        importe = importe.toFixed(2);
        var descuento = total - importe;
        $("#idImporteAuto").val(importe);
        document.getElementById('totalDecuentoTD').innerHTML = descuento.toFixed(2);
        $("#descuentoTD").show();

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
        "pago":  $("#totalDecuentoTD").text(),
        "idContrato":  $("#idContratoBusqueda").val(),
        "descuento": $("#idImporteAuto").val()
    };

    $.ajax({
        data: dataEnviar,
        url: '../../../com.Mexicash/Controlador/Desempeno/generarDesempenoAuto.php',
        type: 'post',
        success: function (response) {
            if (response>0) {
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
    $("#totalTD").hide();
    $("#descuentoTD").hide();


    $("#idConTDDesAuto").text('');
    $("#idPresTDDesAuto").text('');
    $("#idInteresTDDesAuto").text('');

}