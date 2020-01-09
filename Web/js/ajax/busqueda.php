<?php
include_once (BASE_PATH."Conexion.php");
include_once (SQL_PATH."sqlClienteDAO.php");

    $tmp = "";


    $sql = new sqlClienteDAO();
    $nombre = $_POST["texto"];

    $arr = array();

    $arr = $sql->consultaClienteEmpeño($nombre, 2);

    for($i = 0; $i < count($arr); $i++){
        $nombre = $arr[$i]['nombre'];

    }



