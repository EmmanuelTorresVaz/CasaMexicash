<?php
if(!isset($_SESSION)) {
    session_start();
}
/*if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}*/
$_SESSION['idUsuario'] = 1;
$_SESSION['usuario'] = "admin";
$_SESSION['sucursal'] = 1;
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (HTML_PATH. "Catalogos/menuCatalogos.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--Generales-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo</title>
    <!--Funciones-->
    <script src="../../JavaScript/funcionesCatalogos.js"></script>
    <!--    Script inicial-->
    <script type="application/javascript">
        $(document).ready(function () {
            cargarTablaCatMetales();
        })
    </script>
    <style type="text/css">


    </style>
</head>
<body>
<form id="idFormCatMetales" name="formCatMetales">
    <div id="contenedor" class="container">
        <div>
            <br>
            <br>
        </div>
        <div class="row" >
        </div>
        <div class="row" >
            <table class="table table-hover table-condensed table-bordered" width="100%">
                <thead>
                <tr>
                    <th>Tipo </th>
                    <th>Unidad </th>
                    <th>Precio</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="idCatMetales">
                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
</html>
