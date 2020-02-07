//consultar contrato
function buscarContratoRef() {
    buscarClienteDes();
    buscarDatosConDes();
    buscarDetalleDes();
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
                if(datos.length>0) {
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
                }else{
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
    } else {
        alertify.error("Ingrese un contrato a buscar.");
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
                    var Dias = datos[i].Dias;
                    var TotalPrestamo = datos[i].TotalPrestamo;
                    var TotalInteres = datos[i].TotalInteres;
                    var TotalInteresPrestamo = datos[i].TotalInteresPrestamo;

                    if (PlazoDesc === null) {
                        PlazoDesc = '';
                    }
                    if (TasaDesc === null) {
                        TasaDesc = '';
                    }
                    if (AlmacDesc === null) {
                        AlmacDesc = '';
                    }
                    if (SeguDesc === null) {
                        SeguDesc = '';
                    }
                    if (IvaDesc === null) {
                        IvaDesc = '';
                    }
                    if (Dias === null) {
                        Dias = '';
                    }


                    IvaDesc = "0." + IvaDesc;

                    TasaDesc = parseFloat(TasaDesc);
                    AlmacDesc = parseFloat(AlmacDesc);
                    SeguDesc = parseFloat(SeguDesc);
                    IvaDesc = parseFloat(IvaDesc);
                    var tasaIvaTotal = TasaDesc + AlmacDesc + IvaDesc;
                    Dias = parseInt(Dias);
                    TotalPrestamo = parseFloat(TotalPrestamo);
                    TotalInteres = parseFloat(TotalInteres);
                    TotalInteresPrestamo = parseFloat(TotalInteresPrestamo);


                    var fechaHoy = new Date();
                    var FechaVencFormat = formatStringToDate(FechaVenc);
                    var diasVencidos = 0;
                    if (FechaVencFormat < fechaHoy) {
                        var diasdif = fechaHoy.getTime() - FechaVencFormat.getTime();
                        diasVencidos = Math.round(diasdif / (1000 * 60 * 60 * 24));
                    }
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }


                    //Se calcula el interes por día
                    var interesDia = TotalInteres / Dias;
                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrestamo * TasaDesc) / 100;
                    var calculaALm = Math.floor(TotalPrestamo * AlmacDesc) / 100;
                    var calculaSeg = Math.floor(TotalPrestamo * SeguDesc) / 100;
                    var calculaIva = Math.floor(TotalPrestamo * IvaDesc) / 100;


                    var diaInteres = calculaInteres / Dias;
                    var diaAlm = calculaALm / Dias;
                    var diaSeg = calculaSeg / Dias;
                    var diaIva = calculaIva / Dias;


                    //Se calculan los intereses por día
                    var totalVencInteres = diaInteres * diasVencidos;
                    var totalVencAlm = diaAlm * diasVencidos;
                    var totalVencSeg = diaSeg * diasVencidos;
                    var totalVencIVA = diaIva * diasVencidos;

                    var interesGenerado = totalVencInteres + totalVencAlm + totalVencSeg + totalVencIVA;

                    var TotalFinal = TotalPrestamo + interesGenerado;

                    $("#idDatosContratoDes").val("Fecha Empeño :" + FechaEmp + "\n" +
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
                        "Moratorios : $Preguntar" + "\n" +
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

                    if (Detalle === null) {Detalle = '';}
                    if (Ubicacion === null) {Ubicacion = '';}

                    detalleContrato = Detalle + "\n" + "Ubicacion" +"\n" +  Ubicacion + "\n";
                }
                $("#idDetalleContratoDes").val(detalleContrato);
            }
        });
    }
}


//consultar contrato Auto
function buscarContratoDesAuto() {
    buscarClienteDesAuto();
    buscarDatosConDesAuto();
    buscarDetalleDesAuto();
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
                if(datos.length>0){
                    for (i = 0; i < datos.length; i++) {

                        var NombreCompleto = datos[i].NombreCompleto;
                        var DireccionCompleta = datos[i].DireccionCompleta;
                        var DireccionCompletaEst = datos[i].DireccionCompletaEst;
                        var Cotitular = datos[i].Cotitular;
                        var UsuarioName = datos[i].UsuarioName;

                        if (NombreCompleto === null) {NombreCompleto = '';}
                        if (DireccionCompleta === null) {DireccionCompleta = '';}
                        if (DireccionCompletaEst === null) {DireccionCompletaEst = '';}
                        if (Cotitular === null) {Cotitular = '';}
                        if (UsuarioName === null) {UsuarioName = '';}
                        $("#idDatosClienteDesAuto").val(NombreCompleto + "\n" + DireccionCompleta+ "\n" + DireccionCompletaEst+ "\n" + "Cotitular: " + Cotitular + "\n" + "Usuario: " + UsuarioName);

                    }
                }else{
                    $("#idDatosClienteDesAuto").val('');
                    $("#idDatosContratoDesAuto").val('');
                    $("#idDetalleContratoDesAuto").val('');
                    document.getElementById('idConTDDesAuto').innerHTML = '';
                    document.getElementById('idPresTDDesAuto').innerHTML = '';
                    document.getElementById('idInteresTDDesAuto').innerHTML = '';
                    document.getElementById('totalAPagarTDAuto').innerHTML = '';
                    alertify.error("Sin resultados para mostrar.");
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
            "tipe": 8,
            "contratoDese": contratoDesp
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Desempeno/busquedaDesempeno.php',
            data: dataEnviar,
            dataType: "json",
            success: function (datos) {
                for (i = 0; i < datos.length; i++) {
                    var FechaEmp = datos[i].FechaEmp;
                    var FechaVenc = datos[i].FechaVenc;
                    var FechaCom = datos[i].FechaCom;
                    var PlazoDes = datos[i].PlazoDes;
                    var TasaDesc = datos[i].TasaDesc;
                    var AlmacDesc = datos[i].AlmacDesc;
                    var SeguDesc = datos[i].SeguDesc;
                    var IvaDesc = datos[i].IvaDesc;
                    var Dias = datos[i].Dias;
                    var InteresesDes = datos[i].InteresesDes;
                    var TotalPrest = datos[i].TotalPrest;
                    var Abono = datos[i].Abono;

                    if (FechaEmp === null) {FechaEmp = '';}
                    if (FechaVenc === null) {FechaVenc = '';}
                    if (FechaCom === null) {FechaCom = '';}
                    if (PlazoDes === null) {PlazoDes = '';}
                    if (TasaDesc === null) {TasaDesc = '';}
                    if (AlmacDesc === null) {AlmacDesc = '';}
                    if (SeguDesc === null) {SeguDesc = '';}
                    if (IvaDesc === null) {IvaDesc = '';}
                    if (Dias === null) {Dias = '';}
                    if (InteresesDes === null) {InteresesDes = '';}
                    if (TotalPrest === null) {TotalPrest = '';}
                    if (FechaCom == '0000-00-00 00:00:00') {FechaCom = '';}
                    if (Abono === null) {Abono = '0.00';}
                    if (Abono === '') {Abono = '0.00';}

                    InteresesDes = parseFloat(InteresesDes);
                    TotalPrest =  parseFloat(TotalPrest);
                    TasaDesc = parseFloat(TasaDesc);
                    AlmacDesc =  parseFloat(AlmacDesc);
                    SeguDesc = parseFloat(SeguDesc);
                    IvaDesc =  parseFloat(IvaDesc);
                    Dias = parseInt(Dias);

                    //Prueba dias vencidos
                    var diasVencidos = 10;
                    //Se resta el prestamo a los intereses
                    var interesTotal = InteresesDes -TotalPrest;
                    //Se calcula el interes por día
                    var interesDia = interesTotal / Dias;
                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrest * TasaDesc)/100;
                    var calculaALm = Math.floor(TotalPrest* AlmacDesc)/100;
                    var calculaSeg = Math.floor(TotalPrest * SeguDesc)/100;
                    var calculaIva = Math.floor(TotalPrest * IvaDesc)/100;
                    //Se calculan los intereses por día
                    var diaInteres = calculaInteres / Dias;
                    var diaAlm = calculaALm / Dias;
                    var diaSeg = calculaSeg / Dias;
                    var diaIva = calculaIva / Dias;

                    var totalVencInteres = diaInteres * diasVencidos;
                    var totalVencAlm = diaAlm * diasVencidos;
                    var totalVencSeg = diaSeg * diasVencidos;
                    var totalVencIVA = diaIva * diasVencidos;


                    $("#idDatosContratoDesAuto").val("Fecha Empeño :" + FechaEmp +"\n" +
                        "Fecha Vencimiento :" + FechaVenc +"\n" +
                        "Fecha Comercialización :" + FechaCom +"\n" +
                        "Días transcurridos :Prue" + diasVencidos+"\n" +
                        "Días transcurridos interés :Prue" + diasVencidos +"\n" +
                        "Plazo :" + PlazoDes +"\n" +
                        "Tasa :" + TasaDesc +"\n" +
                        "Interes diario : $" + interesDia.toFixed(2) +"\n" +
                        "Interes : $" + totalVencInteres.toFixed(2) +"\n" +
                        "Almacenaje : $" + totalVencAlm.toFixed(2) +"\n" +
                        "Seguro : $" + totalVencSeg.toFixed(2) +"\n" +
                        "Moratorios : $Preguntar" +"\n" +
                        "IVA : $" + totalVencIVA.toFixed(2) +"\n" +
                        "Desempeño Ext : $ Preguntar");

                    var totalAPagar = TotalPrest + interesTotal;
                    document.getElementById('idConTDDesAuto').innerHTML = contratoDesp;
                    document.getElementById('idPresTDDesAuto').innerHTML = TotalPrest.toFixed(2);
                    document.getElementById('idInteresTDDesAuto').innerHTML = interesTotal.toFixed(2);
                    document.getElementById('totalAPagarTDAuto').innerHTML = totalAPagar.toFixed(2);
                    document.getElementById('idAbonoTDRefAuto').innerHTML = Abono.toFixed(2);
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


                    if (Marca === null) {Marca = '';}
                    if (Modelo === null) {Modelo = '';}
                    if (Anio === null) {Anio = '';}
                    if (ColorAuto === null) {ColorAuto = '';}
                    if (Obs === null) {Obs = '';}

                    detalleContrato = Marca + " "+ Modelo + "\n" +
                        Anio + " "+ ColorAuto +  "\n" +
                        Obs + "\n" ;
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
}
