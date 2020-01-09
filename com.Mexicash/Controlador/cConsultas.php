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
    echo "<td>". $arr[$i]['nombre'] ."</td>";
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
    echo "<br><br><br>";
}

echo "</table>";



