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
                    $("#idTipoInteres").val(response.result.tipoInteres);
                    $("#idPeriodo").val(response.result.periodo);
                    $("#idPlazo").val(response.result.plazo);
                    $('#idTasaPorcen').val(response.result.tasa);
                    $('#idAlmPorcen').val(response.result.alm);
                    $('#idSeguroPorcen').val(response.result.seguro);
                    $('#idIvaPorcen').val(response.result.iva + " %");
                    $('#idTipoPromocion').val(response.result.tipo_Promocion);
                    $('#idAgrupamiento').val(response.result.tipo_Agrupamiento);
                }
            },
        })
    }
}


