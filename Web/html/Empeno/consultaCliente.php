<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (SQL_PATH."sqlClienteDAO.php");

$sql = new sqlClienteDAO();

$arr = array();
$arr = $sql->traerTodos();
$nombres = array();

for($i = 0; $i < count($arr); $i++){
    $name = utf8_encode($arr[$i]['nombre'] . " " . $arr[$i]['apellidoPat'] . " " . $arr[$i]['apellidoMat']);
    array_push($nombres, $name);
}
$x = json_encode($nombres);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" src="../../js/jquery-1.12.1.min.js"></script>
    <link rel="stylesheet" href="../../style/jquery-ui.css"/>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registro Clientes</title>
    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();

            var nombres = <?= json_encode($nombres) ?>;

            console.log(nombres);

            $('#Nombres').autocomplete({
                source: nombres,
                select: function (event, item) {
                    var params = {
                        cliente: item.item.value
                    };

                    $.get("../../../com.Mexicash/Controlador/cConsultaTiempoReal.php", params, function (response) {
                        var json = JSON.parse(response);

                        var direccion = json[0]['direccionCompleta'];
                        var celular = json[0]['celular'];
                        var estado = json[0]['estado'];

                        document.getElementById("inDireccion").value = direccion;
                        document.getElementById("inCiudad").value = estado;
                        document.getElementById("inCelular").value = celular;

                        console.log(direccion + "    " + celular + "    " + estado);
                    })
                }
            });
        } );
    </script>
</head>
<body>

<div class="container-fluid" id="tablaExtras" style="position: absolute; display: none; top: 10%; left: -60%; padding-left: 4vw; height: 70vh; border: 1px solid black; background-color: white; z-index: 3"></div>
<div class="col-5 clearfix">
            <div style="float: left; padding-right: 30px">
                <h6>Nombre Completo:</h6>
                <input id="Nombres" name="Nombres" type="text" style="width: 250px" disabled/>
            </div>
            <div style="float: left; padding-right: 30px; padding-top: 4%;">
                <input type="button" id="btnTodos" class="btn btn-outline-primary" onclick="mostrarTablaExtras()" value="Ver todos" disabled>
                <input type="button" id="btnBuscar" class="btn btn-outline-primary" onclick="buscarContratoPorNombre()" value="Buscar" disabled>
            </div>
        <div style="float: left; width: 100%; padding-right: 30px; padding-top: 1.5%;">
            <h6>Direcci&oacute;n:</h6>
            <input type="text" name="inDireccion" placeholder="" id="inDireccion" style="width: 100%" required readonly disabled/>
        </div>
        <div style="float: left; width: 50%; padding-right: 30px; padding-top: 1.5%;">
            <h6>Ciudad:</h6>
            <input type="text" name="inCiudad" placeholder="" id="inCiudad" required readonly disabled/>
        </div>
        <div style="float: left; width: 50%; padding-top: 1.5%;">
            <h6>Celular:</h6>
            <input type="text" name="inCelular" placeholder="" id="inCelular" required readonly disabled/>
        </div>
        <!--
        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Nombre Completo Cotitular:</h6>
            <input type="text" id="inNombreCot" name="inNombreCot" placeholder="" style="width: 250px" required disabled/>
        </div>

        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Nombre Completo Beneficiario:</h6>
            <input type="text" id="inBeneficiario" name="inBeneficiario" placeholder="" style="width: 250px" required disabled/>
        </div>-->
    </div>

<script src="../../js/main/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
