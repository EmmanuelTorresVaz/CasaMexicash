//consultar contrato
function buscarContratoDes() {
    buscarClienteDes();
    buscarDatosConDes()
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
                for (i = 0; i < datos.length; i++) {
                    var NombreCompleto = datos[i].NombreCompleto;
                    var DireccionCompleta = datos[i].DireccionCompleta;
                    var Cotitular = datos[i].Cotitular;
                    var UsuarioName = datos[i].UsuarioName;

                    if (NombreCompleto === null) {
                        NombreCompleto = '';
                    }
                    if (DireccionCompleta === null) {
                        DireccionCompleta = '';
                    }
                    if (Cotitular === null) {
                        Cotitular = '';
                    }
                    if (UsuarioName === null) {
                        UsuarioName = '';
                    }
                    $("#idDatosClienteDes").val(NombreCompleto + "\n" + DireccionCompleta+ "\n" + "Cotitular: " + Cotitular + "\n" + "Usuario: " + UsuarioName);
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
                    var FechaVenc = datos[i].FechaEmp;
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
                    Dias = parseInt(Dias);
                    var interesTotal = InteresesDes -TotalPrest;
                    var interesDia = interesTotal / Dias;

                    $("#idDatosClienteDes").val("Fecha Emppeño :" + FechaEmp +"\n" +
                        "Fecha Vencimiento :" + FechaVenc +"\n" +
                        "Fecha Comercialización :" + FechaCom +"\n" +
                        "Días transcurridos :" + "Dias trans" +"\n" +
                        "Días transcurridos interés :" + "Dias trans" +"\n" +
                        "Plazo :" + PlazoDes +"\n" +
                        "Tasa :" + PlazoDes +"\n" +
                        "Interes diario : $" + interesDia +"\n" +
                        + DireccionCompleta+ "\n" + "Cotitular: " + Cotitular + "\n" + "Usuario: " + UsuarioName);
                }
            }
        });
    } else {
        alertify.error("Ingrese un contrato a buscar.");
    }
}