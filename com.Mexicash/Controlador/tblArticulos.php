<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlArticulosDAO.php.php");

$idClienteInteres = $_POST['idClienteInteres'];

$sqlTblArticulo= new sqlArticulosDAO();
$sqlTblArticulo->buscarArticulo($idClienteInteres) ;


?>