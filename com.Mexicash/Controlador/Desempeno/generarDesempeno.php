<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$tipe = $_POST['tipe'];
$saldoPendiente = $_POST['saldoPendiente'];
$token = $_POST['token'];
$abonoACapital = $_POST['abonoACapital'];
$descuento = $_POST['abonoACapital'];
$gps = $_POST['saldoPendiente'];
$pension = $_POST['token'];
$poliza = $_POST['abonoACapital'];
$sqlDesempeno = new sqlDesempenoDAO();

//Refrendo
if($tipe==1){
    $sqlDesempeno->generarRefrendo($saldoPendiente,$token,$abonoACapital,$descuento,$gps,$pension,$poliza);
}else if($tipe==2){
    //Refrendo Auto
    $sqlDesempeno->generarRefrendo($saldoPendiente,$token,$abonoACapital,$descuento,$gps,$pension,$poliza);
}


?>