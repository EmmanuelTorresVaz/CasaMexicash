<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$tipeFormulario = $_POST['tipeFormulario'];
$contrato = $_POST['contrato'];
$token = $_POST['token'];
$descuento = $_POST['descuento'];
$descuentoFinal = $_POST['descuentoFinal'];
$abonoACapital = $_POST['abonoACapital'];
$saldoPendiente = $_POST['saldoPendiente'];
$gps = $_POST['gps'];
$pension = $_POST['pension'];
$poliza = $_POST['poliza'];
$newFechaAlm = $_POST['newFechaAlm'];
$newFechaVencimiento = $_POST['newFechaVencimiento'];
$idEstatusArt = $_POST['idEstatusArt'];



$sqlDesempeno = new sqlDesempenoDAO();
$sqlDesempeno->generar($tipeFormulario,$newFechaVencimiento,$saldoPendiente,$descuento, $descuentoFinal,$newFechaAlm, $abonoACapital,$contrato,$idEstatusArt,$token);



?>