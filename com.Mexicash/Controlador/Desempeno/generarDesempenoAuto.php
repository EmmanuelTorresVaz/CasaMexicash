<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$saldoPendiente = $_POST['saldoPendiente'];
$token = $_POST['token'];
$abonoACapital = $_POST['abonoACapital'];
$descuento = $_POST['abonoACapital'];
$gps = $_POST['saldoPendiente'];
$pension = $_POST['token'];
$poliza = $_POST['abonoACapital'];
$sqlDesempeno = new sqlDesempenoDAO();

$sqlDesempeno->generarDesempenoAuto($pago,$idImporte,$idContrato);


?>