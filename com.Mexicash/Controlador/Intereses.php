<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (MODELO_PATH."Intereses.php");
include_once (SQL_PATH."sqlInteresesDAO.php");

    $inTasaInteres = $_POST['boxTasaInteres'];

    $interes = new Interes(
        $inTasaInteres,
    );

    $sqlIntereses = new sqlInteresesDAO();
    if($sqlIntereses->buscarTasaInteres($interes)){
        echo "\nTodo bien";
    }else{
        echo "Ocurrio un error";
    }


