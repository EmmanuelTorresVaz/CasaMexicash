<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlCatalogoDAO.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registro Clientes</title>
    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css"/>
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css"/>
    <script src="../../librerias/jquery/jquery-3.4.1.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrap.js"></script>
    <script src="../../librerias/alertifyjs/alertify.js"></script>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../JavaScript/funcionesCatalogos.js"></script>
    <script src="../../JavaScript/funcionesCliente.js"></script>

    <style type="text/css">
        #sugerenciaEstado {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaMunicipio {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaLocalidad {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaEstado .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        #sugerenciaMunicipio .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        #sugerenciaLocalidad .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        .inputCliente {
            text-transform: uppercase;
        }

    </style>
    <script>
        $(document).ready(function () {
            //  $('.menuContainer').load('menu.php');
            $("#idFecNac").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</head>
<body>
<div class="modal fade " id="modalBusquedaCliente" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver todos los cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <table class="table table-hover table-condensed table-bordered" width="100%">
                        <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>Celular</th>
                            <th>Dirección Completa</th>
                            <th>Seleccionar</th>
                        </tr>
                        </thead>
                        <tbody id="idTBodyVerTodos">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-danger" data-dismiss="modal"
                       value="Salir">
            </div>
        </div>
    </div>
</div>
</body>
</html>
