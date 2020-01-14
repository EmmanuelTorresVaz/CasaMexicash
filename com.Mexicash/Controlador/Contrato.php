<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Contrato.php");
include_once(SQL_PATH . "sqlContratoDAO.php");

$idCliente = $_POST['idCliente'];
$id_Interes = $_POST['id_Interes'];
$folio = $_POST['folio'];
$fechaVencimiento = $_POST['fechaVencimiento'];
$totalAvaluo = $_POST['totalAvaluo'];
$totalPrestamo = $_POST['totalPrestamo'];
$abono = $_POST['abono'];
$intereses = $_POST['intereses'];
$pago = $_POST['pago'];
$fecha_Alm = $_POST['fecha_Alm'];
$fecha_Movimiento = $_POST['fecha_Movimiento'];
$origen_Folio = $_POST['origen_Folio'];
$dest_Folio = $_POST['dest_Folio'];
$estatus = $_POST['estatus'];
$observaciones = $_POST['observaciones'];
$fecha_creacion = $_POST['fecha_creacion'];
$idFecVencimiento = $_POST['idFecVencimiento'];


$contrato = new Contrato(
    $idCliente,
    $id_Interes,
    $folio,
    $fechaVencimiento,
    $totalAvaluo,
    $totalPrestamo,
    $abono,
    $intereses,
    $pago,
    $fecha_Alm,
    $fecha_Movimiento,
    $origen_Folio,
    $dest_Folio,
    $estatus,
    $observaciones,
    $fecha_creacion,
    $idFecVencimiento
);

$sqlContrato = new sqlContratoDAO();
$sqlContrato->guardarArticulo($contrato);

?>

