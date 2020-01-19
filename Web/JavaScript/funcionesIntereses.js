function SeleccionarInteres(tipoInteresValue) {
    if (tipoInteresValue != "null" || tipoInteresValue != 0) {
        var dataEnviar = {
            "tipoInteresValue": tipoInteresValue
        };
        $.ajax({
            data: dataEnviar,
            url: '../../../com.Mexicash/Controlador/Intereses.php',
            type: 'post',
            dataType: "json",
            success: function (response) {
                if (response.status == 'ok') {
                    document.getElementById('idTipoInteres').innerHTML =response.result.tipoInteres;
                    document.getElementById('idPeriodo').innerHTML =response.result.periodo;
                    var diasPeriodo = response.result.dias;
                    if(response.result.periodo=="Mensual"){
                        var sumarMes = sumarDias(diasPeriodo);
                        document.getElementById('idFecVencimiento').innerHTML = sumarMes;
                    }
                    document.getElementById('idPlazo').innerHTML =response.result.plazo;
                    document.getElementById('idTasaPorcen').innerHTML =response.result.tasa;
                    document.getElementById('idAlmPorcen').innerHTML =response.result.alm;
                    document.getElementById('idSeguroPorcen').innerHTML =response.result.seguro;
                    document.getElementById('idIvaPorcen').innerHTML =response.result.iva + " %";
                    document.getElementById('idTipoPromocion').innerHTML =response.result.tipo_Promocion;
                    document.getElementById('idAgrupamiento').innerHTML =response.result.tipo_Agrupamiento;
                    $("#idTotalAvaluo").val('0.00');
                    $("#idTotalPrestamo").val('0.00');
                    if(tipoInteresValue==3){
                        $("#idPoliza").val('0.00');
                        $("#idGPS").val("0.00");
                    }
                }
            },
        })
    }
}


