<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once (SQL_PATH."sqlClienteDAO.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registro Clientes</title>

    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

    <script>
        $(document).ready(function () {
            $('.menuContainer').load('menu.php');
        });
    </script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

</head>
<body>
<div class="menuContainer" ></div>

<script type="text/javascript">
    function onk(){

        var x = document.getElementById('inNombre').value;

        <?php
        $texto = "<script> document.getElementById('inNombre').value; </script>";

        $sql = new sqlClienteDAO();
        $sq = new sqlClienteDAO();
        $nombre = "Alejandro";

        $arr = array();

        $arr = $sql->consultaClienteEmpeño($nombre, 1);

        $direccion = $arr[0]['calle'] . " " . $arr[0]['numExt'] . " Num interior " . $arr[0]['numInt'] . " " . $arr[0]['colonia'] . " " . $arr[0]['municipio'] . " " . $arr[0]['codigoPostal'];
        $ciudad  = $arr[0]['estado'];
        $celular = $arr[0]['celular'];

        ?>

        document.getElementById('inCelular').value = "<?php echo $celular; ?>"
        document.getElementById('inDireccion').value = "<?php echo $direccion; ?>"
        document.getElementById('inCiudad').value = "<?php echo $ciudad; ?>"



    }
</script>

<form method="post" name="formCliente" action="../../../com.Mexicash/Controlador/cConsultas.php">

    <div class="col-7 clearfix" style="position: absolute; top: 10vh; padding-left: 4vw; height: 60vh; border: 1px solid black" >
        <h5>Datos</h5>
        <div style="float: left; padding-right: 30px">
            <h6>Nombre Completo:</h6>
            <input type="text" id="inNombre" name="inNombre" placeholder="" style="width: 400px" required/>
        </div>

        <div style="float: left; padding-right: 30px">
            <br/>
            <input type="button" class="btn btn-outline-primary" onclick="onk()" value="Buscar">
            <input type="button" class="btn btn-outline-primary" value="Editar">
            <input type="button" class="btn btn-outline-primary" onclick="cambiar(1)" value="Ver todos" disabled>
        </div>

        <!--<div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>CURP:</h6>
            <input type="text" name="inDireccion" placeholder="" id="inDireccion" style="width: 300px" required/>
            <input type="button" class="btn btn-outline-primary" value="Buscar" disabled/>
        </div>-->

        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Direcci&oacute;n:</h6>
            <input type="text" name="inDireccion" placeholder="" id="inDireccion" style="width: 300px" required disabled/>
        </div>

        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Ciudad:</h6>
            <input type="text" name="inCiudad" placeholder="" id="inCiudad" required disabled/>
        </div>

        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Celular:</h6>
            <input type="text" name="inCelular" placeholder="" id="inCelular" required disabled/>
        </div>

        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Nombre Completo Cotitular:</h6>
            <input type="text" id="inNombreCot" name="inNombreCot" placeholder="" style="width: 375px" required disabled/>
        </div>

        <div style="float: left; padding-right: 30px; padding-top: 20px;">
            <h6>Nombre Completo Beneficiario:</h6>
            <input type="text" id="inBeneficiario" name="inBeneficiario" placeholder="" style="width: 375px" required disabled/>
        </div>

        <!--
        <div style="float: left; padding-right: 30px"></div>
        <div style="position: relative; top: %; left: %"></div>
        -->

    </div>

</form>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
