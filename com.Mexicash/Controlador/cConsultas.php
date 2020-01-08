<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (SQL_PATH."sqlClienteDAO.php");
include_once  (MODELO_PATH."Cliente.php");

$sql = new sqlClienteDAO();

$nombre = "Angel";

$arr = array();

$arr = $sql->traerTodos($nombre);

for ($i = 0; $i < count($arr); $i++) {
    $key=key($arr);
    $val=$arr[$key];
    if ($val<> ' ') {
        echo $key ." = ".  $val ." <br> ";
    }
    next($arr);
}


