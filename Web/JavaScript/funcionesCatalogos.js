

function llenarComboMunicipio() {
    $('#idMunicipio').prop('disabled',false);
    $('#idLocalidad').prop('disabled',true);
    $('#idMunicipio').val(0);
    $('#idLocalidad').val(0);
    var dataEnviar = {
        "Estado":  $('#idEstado').val(),
        "tipoConsulta" :1
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Catalogos.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_Municipio = datos[i].id_Municipio;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_Municipio + '>' + descripcion + '</option>';
            }
            $('#idMunicipio').html(html);
        }
    });
}

function llenarComboLocalidad() {
    $('#idLocalidad').prop('disabled',false);
    $('#idLocalidad').val(0);
    var dataEnviar = {
        "Estado":  $('#idEstado').val(),
        "Municipio":  $('#idMunicipio').val(),
        "tipoConsulta" :2
    };
    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Catalogos.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = "";
            html += " <option value=0>Seleccione:</option>"
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_Localidad = datos[i].id_Localidad;
                var descripcion = datos[i].descripcion;
                html += '<option value=' + id_Localidad + '>' + descripcion + '</option>';
            }
            $('#idLocalidad').html(html);
        }
    });
}