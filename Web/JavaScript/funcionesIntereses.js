function SeleccionarInteres(tipoInteresValue) {
    $("#idDiasAlmoneda").val(0);

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
                    document.getElementById('idTipoInteres').innerHTML = response.result.tipoInteres;
                    document.getElementById('idPeriodo').innerHTML = response.result.periodo;
                    var diasPeriodo = response.result.dias;
                    var sumarMes = sumarDias(diasPeriodo);
                    diasPeriodo = parseInt(diasPeriodo);
                    $("#idDiasAlmoneda").prop('disabled', false);
                    $("#diasInteres").val(diasPeriodo);
                    document.getElementById('idFecVencimiento').innerHTML = sumarMes;
                    document.getElementById('idPlazo').innerHTML = response.result.plazo;
                    document.getElementById('idTasaPorcen').innerHTML = response.result.tasa;
                    document.getElementById('idAlmPorcen').innerHTML = response.result.alm;
                    document.getElementById('idSeguroPorcen').innerHTML = response.result.seguro + ".00";
                    document.getElementById('idIvaPorcen').innerHTML = response.result.iva + " %";
                    limpiarTablaInteres();
                    $("#divTablaMetales").load('tablaMetales.php');
                    $("#divTablaArticulos").load('tablaArticulos.php');
                }
            },
        })
    }
}

function limpiarTablaInteres() {
    $.ajax({
        url: '../../../com.Mexicash/Controlador/ArticulosObsoletos.php',
        type: 'post',
        success: function (response) {
            if (response == -1 || response == 0) {
                alertify.error("Error 0001.");
            } else {
                alertify.warning("Se limpio tabla por modificar el tipo de interes.");
            }
        },
    })
}

function llenarComboInteres($tipoCombo) {
    var dataEnviar = {
        "idTipoCombo": $tipoCombo
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/comboInteres.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_interes = datos[i].id_interes;
                var tasa_interes = datos[i].tasa_interes;
                html += '<option value=' + id_interes + '>' + tasa_interes + '</option>';
            }
            $('#tipoInteresEmpeno').html(html);
        }
    });


}

function LimpiarInteres() {
    document.getElementById('idTipoInteres').innerHTML = '';
    document.getElementById('idPeriodo').innerHTML =  '';
    document.getElementById('idFecVencimiento').innerHTML = '';
    document.getElementById('idPlazo').innerHTML= '';
    document.getElementById('idTasaPorcen').innerHTML = '';
    document.getElementById('idAlmPorcen').innerHTML= '';
    document.getElementById('idSeguroPorcen').innerHTML = '';
    document.getElementById('idIvaPorcen').innerHTML= '';
    $("#idTotalAvaluo").val('0.00');
    $("#idTotalPrestamo").val('0.00');
    $("#idDiasAlmoneda").val('0');
}

function calcularDias() {

    var diasAlm =  $('select[name="diasAlmName"] option:selected').text();
    var diasPeriodo =$("#diasInteres").val();
    diasAlm = parseInt(diasAlm);
    diasPeriodo = parseInt(diasPeriodo);
    diasAlm = diasAlm + diasPeriodo;
    var sumarAlm = sumarDias(diasAlm);
    $("#idFechaAlm").val(sumarAlm);
}