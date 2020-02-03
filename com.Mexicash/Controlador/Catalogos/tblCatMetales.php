<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlCatalogoDAO.php");

$sqlTblCatMetales= new sqlCatalogoDAO();
$sqlTblCatMetales->llenarTblCatMetales() ;


?>