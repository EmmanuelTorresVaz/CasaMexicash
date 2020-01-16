<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlContratoDAO.php");

$contratoTemp = $_POST['contratoTemp'];

$sqlContrato = new sqlContratoDAO();
$sqlContrato->actualizarArticulo($contratoTemp);

?>

