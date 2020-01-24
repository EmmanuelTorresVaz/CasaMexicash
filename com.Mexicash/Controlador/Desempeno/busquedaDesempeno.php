<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$idtipe = $_POST['tipe'];
$idContratoDes = $_POST['contratoDese'];
$sqlDesempeno= new sqlDesempenoDAO();

//Datos del cliente
if($idtipe==1){
    $sqlDesempeno->buscarClienteDes($idContratoDes) ;
}else if($idtipe==2){
    $sqlDesempeno->buscarContratoDes($idContratoDes) ;
}else if($idtipe==3){
    $sqlDesempeno->buscarContratoDes($idContratoDes) ;
}



?>