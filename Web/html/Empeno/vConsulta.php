<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Consultas</title>

    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

    <script>
        $(document).ready(function () {
            $('.menuContainer').load('menu.php');
            $('#consultas').load('consultaCliente.php');
        });
    </script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

    </script>

    <style type="text/css">
        table{
            width: 100%; text-align: center;
        }
        thead{
            text-align: center;
        }
        th{
            padding-left: 1%; padding-right: 1%; border: 1px solid black;
        }
    </style>

</head>
<body>
<div class="menuContainer" ></div>

<div class="container-fluid" style="position: absolute; top: 8.2vh; border:1px solid black; height: 91.8vh">

    <div style="position: relative; top: 2vh; left: 60%; height: 33vh">
        <h5>Detalle del Cliente</h5>
        <div id="consultas"></div>
    </div>

    <div style="position: relative; width: 60%; top: -32vh; left: 0; height: 33vh;">

        <div style="position: relative; width: 25%; height: 100%; padding-top: 20px">
            <div style="width: 90%; float: left">
                <label for=""><input type="checkbox" id="chkContrato" value="1"/>Por Contrato</label>
            </div>
            <div style="width: 90%; float: left">
                <label for=""><input type="checkbox" id="chkNombre" value="1"/>Por Nombre</label>
            </div>
            <div style="width: 90%; float: left; padding-top: 20px">
                <h5>Detalles del Contrato</h5>
                <div style="width: 100%">
                    <h6>Contrato:</h6>
                    <input type="text" name="inContrato" placeholder="" id="inContrato" style="width: 90%" >
                    <input type="button" id="btnContrato" onclick="buscarContrato();" class="btn btn-outline-primary" value="Buscar" style="margin-top: 5px" />
                </div>
            </div>
        </div>

        <div style="position:relative; width: 70%; height: 100%; left: 25%; top: -100%; border: 1px solid black">
            <table id="tblArticulo">
                <thead style="width: 100%">
                <tr>
                    <th style="width: 20%">Cantidad</th>
                    <th style="width: 20%">Articulo</th>
                    <th style="width: 60%">Observaciones</th>
                </tr>
                </thead>
            </table>
        </div>

    </div>

    <div class="tblConsultaEmpeños" style="  position: relative;width: 95%;height: 55.6vh;border: 1px solid black;top: -34%;left: 0;right: 0;margin-left: auto;margin-right: auto;">
        <table width="100%" id="tblContratos">
            <thead style="width: 100%">
            <tr>
                <th>Contrato</th>
                <th>Folio</th>
                <th>Pr&eacute;stamo</th>
                <th>Abono</th>
                <th>Inter&eacute;s</th>
                <th>Pago</th>
                <th>Fecha Alm</th>
                <th>Fecha mto.</th>
                <th>Estatus</th>
                <th>Vencimiento</th>
            </tr>
            </thead>
        </table>
    </div>

</div>



<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>