<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$tipeFormulario = $_POST['tipeFormulario'];
$contrato = $_POST['contrato'];
$token = $_POST['token'];
$descuento = $_POST['descuento'];
$abonoACapital = $_POST['abonoACapital'];
$saldoPendiente = $_POST['saldoPendiente'];
$gps = $_POST['gps'];
$pension = $_POST['pension'];
$poliza = $_POST['poliza'];

$sqlDesempeno = new sqlDesempenoDAO();
$sqlDesempeno->generar($tipeFormulario,$contrato,$token,$descuento,$abonoACapital,$saldoPendiente,$gps,$pension,$poliza);



?>