function fnBuscarCodigo($idCodigo) {
    if ($idCodigo == '' || $idCodigo == null) {
        var dataEnviar = {
            "idCodigo": 'x'
        };
    } else {
        var dataEnviar = {
            "idCodigo": $idCodigo
        };
    }

    $.ajax({
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Ventas/BusquedaCodigo.php',
        data: dataEnviar,
        dataType: "json",
        success: function (datos) {
            var html = '';
            var i = 0;
            for (i; i < datos.length; i++) {
                var id_Articulo = datos[i].id_Articulo;
                var detalle = datos[i].detalle;
                var avaluo = datos[i].avaluo;
                if (NombreCompleto === null) {
                    NombreCompleto = '';
                }
                if (celular === null) {
                    celular = '';
                }
                if (direccionCompleta === null) {
                    direccionCompleta = '';
                }

                html += '<tr>' +
                    '<td>' + NombreCompleto + '</td>' +
                    '<td>' + celular + '</td>' +
                    '<td>' + direccionCompleta + '</td>' +
                    '<td><input type="button" class="btn btn-info" data-dismiss="modal" value="Seleccionar" ' +
                    'onclick="buscarClienteEditado(' + id_Cliente + ')"></td>' +
                    '</tr>';
            }
            $('#idTBodyVerTodos').html(html);
        }
    });
}