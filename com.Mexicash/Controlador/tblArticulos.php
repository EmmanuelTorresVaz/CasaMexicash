<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlArticulosDAO.php");

$idClienteInteres = $_POST['idCliente'];
$sqlTblArticulo= new sqlArticulosDAO();
$sqlTblArticulo->buscarArticulo($idClienteInteres) ;


?>