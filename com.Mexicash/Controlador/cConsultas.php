<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (SQL_PATH."sqlClienteDAO.php");
include_once  (MODELO_PATH."Cliente.php");

$sql = new sqlClienteDAO();

$nombre = "Angel";

$arr = array();

$arr = $sql->consultaClienteEmpeño($nombre, 2);
for($i = 0; $i < count($arr); $i++){
    print_r($arr[$i]);
    echo "<br><br><br>";
}

$direccion = $arr[0]['calle'] . " " . $arr[0]['numExt'] . " Num interior " . $arr[0]['numInt'] . " " . $arr[0]['colonia'] . " " . $arr[0]['municipio'] . " " . $arr[0]['codigoPostal'];
$ciudad  = $arr[0]['estado'];
$celular = $arr[0]['celular'];

echo $direccion . "    " . $ciudad . "    " . $celular;




