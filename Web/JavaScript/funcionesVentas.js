function buscarCodigo($idCodigo) {
    alert("entra")
    if ($idCodigo == '' || $idCodigo == null) {
        var dataEnviar = {
            "tipo": 1,
            "idCodigo": ''
        };
    } else {
        var dataEnviar = {
            "tipo": 2,
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
                if (id_Articulo === null) {
                    id_Articulo = '';
                }
                if (detalle === null) {
                    detalle = '';
                }
                if (avaluo === null) {
                    avaluo = '';
                }

                html += '<tr>' +
                    '<td>' + id_Articulo + '</td>' +
                    '<td>' + detalle + '</td>' +
                    '<td>' + avaluo + '</td>' +
                    '<td><input type="button" class="btn btn-info" data-dismiss="modal" value="Seleccionar" ' +
                    'onclick="buscarCodigoSeleccionado(' + id_Articulo + ')"></td>' +
                    '</tr>';
            }
            $('#idTBodyBuscarCodigo').html(html);
        }
    });
}

function buscarCodigoSeleccionado($id_Articulo) {
    var dataEnviar = {
        "$clienteEditado": $clienteEditado
    };
    $.ajax({
        data: dataEnviar,
        type: "POST",
        url: '../../../com.Mexicash/Controlador/Cliente/BuscarClienteEditado.php',
        dataType: "json",
        success: function (response) {
            if (response.status == 'ok') {
                $("#idClienteEmpeno").val($clienteEditado);
                $("#idNombres").val(response.result.NombreCompleto);
                $("#idCelularEmpeno").val(response.result.celular);
                $("#idDireccionEmpeno").val(response.result.direccionCompleta);
                $("#btnEditar").prop('disabled', false);
            }
        }
    });
}