<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlArticulosDAO.php");

$idContratoTemp = $_POST['idContratoTemp'];
$sqlTblArticulo= new sqlArticulosDAO();
$sqlTblArticulo->buscarArticulo($idContratoTemp) ;


?>