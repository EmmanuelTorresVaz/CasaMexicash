function estadoAutocompletar() {
    $('#idEstadoName').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idEstadoName=' + key;
        var dataEnviar = {
            "tipoConsulta": 1,
            "idEstadoName": key
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos.php',
            data: dataEnviar,
            success: function (data) {

                //Escribimos las sugerencias que nos manda la consulta
                $('#sugerenciaEstado').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idEstado').val(id);
                    $('#idEstadoName').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#sugerenciaEstado').fadeOut(1000);
                    return false;
                });
            }
        });
    });
}

function municipioAutocompletar() {
    $('#idMunicipioName').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idMunicipioName=' + key;
        var dataEnviar = {
            "tipoConsulta": 2,
            "idMunicipioName": key,
            "idEstado": $("#idEstado").val()
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos.php',
            data: dataEnviar,
            success: function (data) {

                //Escribimos las sugerencias que nos manda la consulta
                $('#sugerenciaMunicipio').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idMunicipio').val(id);
                    $('#idMunicipioName').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#sugerenciaMunicipio').fadeOut(1000);
                    return false;
                });
            }
        });
    });
}

function localidadAutocompletar() {
    $('#idLocalidadName').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idLocalidadName=' + key;
        var dataEnviar = {
            "tipoConsulta": 3,
            "idLocalidadName": key,
            "idEstado": $("#idEstado").val(),
            "idMunicipio": $("#idMunicipio").val()
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos.php',
            data: dataEnviar,
            success: function (data) {

                //Escribimos las sugerencias que nos manda la consulta
                $('#sugerenciaLocalidad').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idLocalidad').val(id);
                    $('#idLocalidadName').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#sugerenciaLocalidad').fadeOut(1000);
                    return false;
                });
            }
        });
    });
}

