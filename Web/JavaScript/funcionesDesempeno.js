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
                    var  diasInteresMor =0;


                    // Dias trasncurridos
                    if(Abono==null){
                        if(FechaEmpConvert==fechaHoyText){
                            //Si la fecha es igual el dia de interes generado es 1
                            diasForInteres =1;
                        }else{
                            //Si la fecha es menor que hoy  el dia de interes generado es  el total -1
                            var diasdif = fechaHoy.getTime() - FechaEmpFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        }
                    }else {
                        var FechaAbonoFormat = formatStringToDate(FechaAbono);
                        if(FechaAbono==fechaHoyText){
                            //Si la fecha es igual el dia de interes generado es 1
                            diasForInteres =1;
                        }else{
                            var diasdif = fechaHoy.getTime() - FechaAbonoFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        }
                    }

                    // Dias trasncurridos con dias moratorios
                    if (FechaVencFormat < fechaHoy) {
                        diasMoratorios = diasForInteres - DiasContrato;
                        diasForInteres = diasForInteres -diasMoratorios;
                    }

                    //Plazo
                    if(DiasContrato==30){
                        PlazoDesc = PlazoDesc + " Mensual";
                    }else if (DiasContrato ==1){
                        PlazoDesc = PlazoDesc + " Diario";
                    }

                    //INTERES DIARIO
                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrestamo * TasaDesc) / 100;
                    var calculaALm = Math.floor(TotalPrestamo * AlmacDesc) / 100;
                    var calculaSeg = Math.floor(TotalPrestamo * SeguDesc) / 100;
                    var calculaIva = Math.floor(TotalPrestamo * IvaDesc) / 100;

                    var totalInteres = calculaInteres + calculaALm +calculaSeg + calculaIva;
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
                    diasInteresMor =  diasMoratorios * interesDia;
                    //IVA
                    var totalVencIVA = diaIva * diasForInteres;

                    //INTERES TABLA
                    var interesGenerado = totalVencInteres+ totalVencAlm+ totalVencSeg+ diasInteresMor+totalVencIVA ;

                    var TotalFinal = TotalPrestamo + interesGenerado;


                    interesDia = Math.round(interesDia * 100) / 100;
                    totalVencInteres = Math.round(totalVencInteres * 100) / 100;
                    totalVencAlm = Math.round(totalVencAlm * 100) / 100;
                    totalVencSeg = Math.round(totalVencSeg * 100) / 100;
                    diasInteresMor = Math.round(diasInteresMor * 100) / 100;
                    totalVencIVA = Math.round(totalVencIVA * 100) / 100;
                    interesGenerado = Math.round(interesGenerado * 100) / 100;
                    TotalFinal = Math.round(TotalFinal * 100) / 100;


                    //Valida si esta en almoneda
                    var FechaAlmFormat = formatStringToDate(FechaAlm);
                    if (FechaAlmFormat < fechaHoy) {
                        $("#trAlmoneda").show();
                    }
                    $("#idDatosContratoDes").val("Fecha Empeño :" + FechaEmp + "\n" +
                        "Fecha Vencimiento :" + FechaVenc + "\n" +
                        "Fecha Comercialización :" + FechaAlm + "\n" +
                        "Días transcurridos :" + diasForInteres + "\n" +
                        "Días transcurridos interés :" + diasMoratorios + "\n" +
                        "Plazo :" + PlazoDesc + "\n" +
                        "Tasa :" + tasaIvaTotal + "\n" +
                        "Interes diario : $" + interesDia+ "\n" +
                        "Interes : $" + totalVencInteres + "\n" +
                        "Almacenaje : $" + totalVencAlm+ "\n" +
                        "Seguro : $" + totalVencSeg + "\n" +
                        "Moratorios : $" +  diasInteresMor + "\n" +
                        "IVA : $" + totalVencIVA + "\n" +
                        "Desempeño Ext : $ Preguntar");

                    document.getElementById('idConTDDes').innerHTML = contratoDesp;
                    document.getElementById('idPresTDDes').innerHTML = TotalPrestamo;
                    document.getElementById('idInteresTDDes').innerHTML = interesGenerado;
                    document.getElementById('totalAPagarTD').innerHTML = TotalFinal;
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
                    var  diasInteresMor =0;


                    // Dias trasncurridos
                    if(Abono==null){
                        if(FechaEmpConvert==fechaHoyText){
                            //Si la fecha es igual el dia de interes generado es 1
                            diasForInteres =1;
                        }else{
                            //Si la fecha es menor que hoy  el dia de interes generado es  el total -1
                            var diasdif = fechaHoy.getTime() - FechaEmpFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        }
                    }else {
                        var FechaAbonoFormat = formatStringToDate(FechaAbono);
                        if(FechaAbono==fechaHoyText){
                            //Si la fecha es igual el dia de interes generado es 1
                            diasForInteres =1;
                        }else{
                            var diasdif = fechaHoy.getTime() - FechaAbonoFormat.getTime();
                            diasForInteres = Math.round(diasdif / (1000 * 60 * 60 * 24));
                        }
                    }

                    // Dias trasncurridos con dias moratorios
                    if (FechaVencFormat < fechaHoy) {
                        diasMoratorios = diasForInteres - DiasContrato;
                        diasForInteres = diasForInteres -diasMoratorios;
                    }

                    //Plazo
                    if(DiasContrato==30){
                        PlazoDesc = PlazoDesc + " Mensual";
                    }else if (DiasContrato ==1){
                        PlazoDesc = PlazoDesc + " Diario";
                    }

                    //INTERES DIARIO
                    //Se saca los porcentajes mensuales
                    var calculaInteres = Math.floor(TotalPrestamo * TasaDesc) / 100;
                    var calculaALm = Math.floor(TotalPrestamo * AlmacDesc) / 100;
                    var calculaSeg = Math.floor(TotalPrestamo * SeguDesc) / 100;
                    var calculaIva = Math.floor(TotalPrestamo * IvaDesc) / 100;

                    var totalInteres = calculaInteres + calculaALm +calculaSeg + calculaIva;
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
                    diasInteresMor =  diasMoratorios * interesDia;
                    //IVA
                    var totalVencIVA = diaIva * diasForInteres;

                    //INTERES TABLA
                    var interesGenerado = totalVencInteres+ totalVencAlm+ totalVencSeg+ diasInteresMor+totalVencIVA ;
                    PolizaSeguro = parseFloat(PolizaSeguro);
                    GPS = parseFloat(GPS);
                    var TotalFinal = TotalPrestamo + interesGenerado +PolizaSeguro +GPS;

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



                    $("#idDatosContratoDesAuto").val("Fecha Empeño :" + FechaEmp + "\n" +
                        "Fecha Vencimiento :" + FechaVenc + "\n" +
                        "Fecha Comercialización :" + FechaAlm + "\n" +
                        "Días transcurridos :" + diasForInteres + "\n" +
                        "Días transcurridos interés :" + diasMoratorios + "\n" +
                        "Plazo :" + PlazoDesc + "\n" +
                        "Tasa :" + tasaIvaTotal + "\n" +
                        "Interes diario : $" + interesDia+ "\n" +
                        "Interes : $" + totalVencInteres + "\n" +
                        "Almacenaje : $" + totalVencAlm+ "\n" +
                        "Seguro : $" + totalVencSeg + "\n" +
                        "Moratorios : $" +  diasInteresMor + "\n" +
                        "IVA : $" + totalVencIVA + "\n" +
                        "GPS : " + GPS + "\n" +
                        "Desempeño Ext : $ Preguntar");

                    document.getElementById('idConTDDesAuto').innerHTML = contratoDesp;
                    document.getElementById('idPresTDDesAuto').innerHTML = TotalPrestamo;
                    document.getElementById('idInteresTDDesAuto').innerHTML = interesGenerado;
                    document.getElementById('idPolizaSegTDDes').innerHTML = PolizaSeguro;
                    document.getElementById('idGPSTDDes').innerHTML = GPS;
                    document.getElementById('totalAPagarTDAuto').innerHTML = TotalFinal;
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
        $("#idImporte").prop('disabled', false);
    } else {
        $("#idImporte").prop('disabled', true);
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