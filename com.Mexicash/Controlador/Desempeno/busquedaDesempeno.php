<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$idtipe = $_POST['tipe'];
$idContratoDes = $_POST['contratoDese'];
$sqlDesempeno= new sqlDesempenoDAO();

//Datos del cliente
if($idtipe==1){
    $sqlDesempeno->buscarCliente($idContratoDes) ;
}else if($idtipe==2){
    $sqlDesempeno->buscarContratoDes($idContratoDes) ;
}else if($idtipe==3){
    $sqlDesempeno->buscarDetalleDes($idContratoDes) ;
}else if($idtipe==4){
    $sqlDesempeno->buscarClienteDesAuto($idContratoDes) ;
}else if($idtipe==5){
    $sqlDesempeno->buscarContratoDesAuto($idContratoDes) ;
}else if($idtipe==6){
    $sqlDesempeno->buscarDetalleDesAuto($idContratoDes) ;
}else if($idtipe==7){
    //Buscar datos del contrato desde Referencia
    $sqlDesempeno->buscarContratoRef($idContratoDes) ;
}else if($idtipe==8){
    $sqlDesempeno->buscarContratoRefAuto($idContratoDes) ;
}else if($idtipe==9){
    //Busqueda de estatus
    $sqlDesempeno->estatusContrato($idContratoDes) ;
}else if($idtipe==10){
    //Busqueda de estatus
    $sqlDesempeno->estatusContratoAuto($idContratoDes) ;
}



?>