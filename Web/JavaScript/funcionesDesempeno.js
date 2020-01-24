//consultar contrato
function buscarContratoDes() {
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


                    $("#idDatosContratoDes").val("Fecha Empeño :" + FechaEmp +"\n" +
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
                    document.getElementById('idConTDDes').innerHTML = contratoDesp;
                    document.getElementById('idPresTDDes').innerHTML = TotalPrest.toFixed(2);
                    document.getElementById('idInteresTDDes').innerHTML = interesTotal.toFixed(2);
                    document.getElementById('totalAPagarTD').innerHTML = totalAPagar.toFixed(2);
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
            "tipe": 5,
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