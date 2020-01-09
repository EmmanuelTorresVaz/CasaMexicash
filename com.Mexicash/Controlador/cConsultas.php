
<style>
    .boton {border:1px solid #808080;cursor:pointer;padding:2px 5px;color:Blue;}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Consultas</title>

    <link rel="stylesheet" href="../../Web/style/less/main.css"/>
    <link rel="stylesheet" href="../../Web/style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../Web/style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

</head>
<body>
<div class="menuContainer" ></div>

<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
    include_once (SQL_PATH."sqlClienteDAO.php");
    include_once  (MODELO_PATH."Cliente.php");

    $sql = new sqlClienteDAO();

    $nombre = $_POST['Nombres'];

    $arr = array();

    $arr = $sql->consultaClienteEmpeño($nombre, 2);
    echo "<table style='width: 100%'>";
    echo "<tr>";
    echo "<th>Nombre:</th>";
    echo "<th>Apellido Paterno:</th>";
    echo "<th>Apellido Materno:</th>";
    echo "<th>Fecha de Nacimiento:</th>";
    echo "<th>CURP:</th>";
    echo "<th>Celular:</th>";
    echo "<th>RFC:</th>";
    echo "<th>Telefono:</th>";
    echo "<th>Correo: </th>";
    echo "<th>Direccion: </th>";
    echo "</tr>";

    for($i = 0; $i < count($arr); $i++){
        $direccion = $arr[$i]['calle'] . " " . $arr[$i]['numExt'] . " Numero Interior: " . $arr[$i]['numInt'] . " " . $arr[$i]['colonia'] . " " . $arr[$i]['municipio'] . " " . $arr[$i]['codigoPostal'];
        echo "<tr>";
        echo "<td onclick='tablaClientes(this)' class='boton'>". $arr[$i]['nombre'] ."</td>";
        echo "<td>". $arr[$i]['apellidoPat'] ."</td>";
        echo "<td>". $arr[$i]['apellidoMat'] ."</td>";
        echo "<td>". $arr[$i]['fechaNac'] ."</td>";
        echo "<td>". $arr[$i]['curp'] ."</td>";
        echo "<td>". $arr[$i]['celular'] ."</td>";
        echo "<td>". $arr[$i]['rfc'] ."</td>";
        echo "<td>". $arr[$i]['telefono'] ."</td>";
        echo "<td>". $arr[$i]['correo'] ."</td>";
        echo "<td>". $direccion ."</td>";
        echo "</tr>";
    }

    echo "</table>";
?>

    <script src="../../Web/js/main/main.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../Web/style/css/magicsuggest/magicsuggest-min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>





