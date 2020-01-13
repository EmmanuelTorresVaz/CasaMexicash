function estadoAutocompletar() {
    $('#idEstado').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idEstado=' + key;
        var dataEnviar = {
            "tipoConsulta": 1,
            "idEstado": key
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos.php',
            data: dataEnviar,
            success: function (data) {

                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idEstado').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    alert('Has seleccionado el ' + id + ' ' + $('#' + id).attr('data'));
                    return false;
                });
            }
        });
    });
}

function municipioAutocompletar() {
    $('#idMunicipio').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idMunicipio=' + key;
        var dataEnviar = {
            "tipoConsulta": 2,
            "idMunicipio": key,
            "idEstado": $("#idEstado").val()
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos.php',
            data: dataEnviar,
            success: function (data) {

                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idMunicipio').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    alert('Has seleccionado el ' + id + ' ' + $('#' + id).attr('data'));
                    return false;
                });
            }
        });
    });
}

function localidadAutocompletar() {
    $('#idEstado').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idEstado=' + key;
        var dataEnviar = {
            "tipoConsulta": 1,
            "idEstado": key
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/Catalogos.php',
            data: dataEnviar,
            success: function (data) {

                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idEstado').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    alert('Has seleccionado el ' + id + ' ' + $('#' + id).attr('data'));
                    return false;
                });
            }
        });
    });
}