<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Contrato.php");
include_once(SQL_PATH . "sqlContratoDAO.php");

$idCliente = $_POST['idCliente'];
$fechaVencimiento = $_POST['fechaVencimiento'];
$totalAvaluo = $_POST['totalAvaluo'];
$totalPrestamo = $_POST['totalPrestamo'];
$total_Interes = $_POST['total_Interes'];
$sumaInteresPrestamo = $_POST['sumaInteresPrestamo'];
$fecha_Alm = $_POST['fecha_Alm'];
$estatus = $_POST['estatus'];
$cotitular = $_POST['cotitular'];
$beneficiario = $_POST['beneficiario'];
$plazo = $_POST['plazo'];
$tasa = $_POST['tasa'];
$alm = $_POST['alm'];
$seguro = $_POST['seguro'];
$iva = $_POST['iva'];
$dias = $_POST['dias'];

$contrato = new Contrato(
    $idCliente,
    $fechaVencimiento,
    $totalAvaluo,
    $totalPrestamo,
    $total_Interes,
    $sumaInteresPrestamo,
    $fecha_Alm,
    $estatus,
    $cotitular,
    $beneficiario,
    $plazo,
    $tasa,
    $alm,
    $seguro,
    $iva,
    $dias
);

$sqlContrato = new sqlContratoDAO();
$sqlContrato->guardarContrato($contrato);

?>

