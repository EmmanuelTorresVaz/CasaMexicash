<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Contrato.php");
include_once(SQL_PATH . "sqlContratoDAO.php");

$idContrato = $_POST['idContrato'];
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
$beneficiario = $_POST['beneficiario'];
$cotitular = $_POST['cotitular'];

$contrato = new Contrato(
    $idContrato,
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
    $beneficiario,
    $cotitular

);

$sqlContrato = new sqlContratoDAO();
$sqlContrato->guardarContrato($contrato);

?>

