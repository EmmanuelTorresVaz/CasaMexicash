<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlDesempenoDAO.php");

$pago = $_POST['pago'];
$idContrato = $_POST['idContrato'];
$idImporte = $_POST['descuento'];
$sqlDesempeno = new sqlDesempenoDAO();

$sqlDesempeno->generarDesempeno($pago,$idImporte,$idContrato);


?>