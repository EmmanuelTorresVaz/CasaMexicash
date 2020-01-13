function agregarCliente() {
}
function mostrarTablaExtras() {
}

function nombreAutocompletar() {
    $('#idNombres').on('keyup', function () {
        var key = $(this).val();
        var dataString = 'idNombres=' + key;
        var dataEnviar = {
            "idNombres": key
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/AutocompleteCliente.php',
            data: dataEnviar,
            success: function (data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#idNombres').val($('#' + id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    alert('Has seleccionado el ' + id + ' ' + $('#' + id).attr('data'));
                    return false;
                });

            }
        });
    });
}
