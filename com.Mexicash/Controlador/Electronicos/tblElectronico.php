<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlCatalogoDAO.php");

$sqlTblElectronico= new sqlCatalogoDAO();
$sqlTblElectronico->buscarElectronico() ;


?>