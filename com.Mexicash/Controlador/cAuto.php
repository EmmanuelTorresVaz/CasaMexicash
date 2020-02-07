<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Auto.php");
include_once(SQL_PATH . "sqlAutoDAO.php");

//DatosContrato
$idClienteAuto = $_POST['idClienteAuto'];
$fechaVencimiento = $_POST['fechaVencimiento'];
$totalAvaluo = $_POST['totalAvaluo'];
$totalPrestamo = $_POST['totalPrestamo'];
$total_Interes = $_POST['total_Interes'];
$sumaInteresPrestamo = $_POST['sumaInteresPrestamo'];
$polizaSeguroCost = $_POST['polizaSeguro'];
$gps = $_POST['gps'];
$fecha_Alm = $_POST['fecha_Alm'];
$estatus = $_POST['estatus'];
$beneficiario = $_POST['beneficiario'];
$cotitular = $_POST['cotitular'];
$plazo = $_POST['plazo'];
$tasa = $_POST['tasa'];
$alm = $_POST['alm'];
$seguro = $_POST['seguro'];
$iva = $_POST['iva'];
$dias = $_POST['dias'];
//Auto
$idTipoVehiculo = $_POST['idTipoVehiculo'];
$idMarca = $_POST['idMarca'];
$idModelo = $_POST['idModelo'];
$idAnio = $_POST['idAnio'];
$idColor = $_POST['idColor'];
$idPlacas = $_POST['idPlacas'];
$idFactura = $_POST['idFactura'];
$idKms = $_POST['idKms'];
$idAgencia = $_POST['idAgencia'];
$idMotor = $_POST['idMotor'];
$idSerie = $_POST['idSerie'];
$idVehiculo = $_POST['idVehiculo'];
$idRepuve = $_POST['idRepuve'];
$idGasolina = $_POST['idGasolina'];
$idAseguradora = $_POST['idAseguradora'];
$idTarjeta = $_POST['idTarjeta'];
$idPoliza = $_POST['idPoliza'];
$idFecVencimientoAuto = $_POST['idFechaVencAuto'];
$idTipoPoliza = $_POST['idTipoPoliza'];
$idObservacionesAuto = $_POST['idObservacionesAuto'];
$idCheckTarjeta = $_POST['idCheckTarjeta'];
$idCheckFactura = $_POST['idCheckFactura'];
$idCheckINE = $_POST['idCheckINE'];
$idCheckImportacion = $_POST['idCheckImportacion'];
$idCheckTenecia = $_POST['idCheckTenecia'];
$idCheckPoliza = $_POST['idCheckPoliza'];
$idCheckLicencia = $_POST['idCheckLicencia'];


$auto = new Auto(
//Contrato
    $idClienteAuto,
    $fechaVencimiento,
    $totalAvaluo,
    $totalPrestamo,
    $total_Interes,
    $sumaInteresPrestamo,
    $polizaSeguroCost,
    $gps,
    $fecha_Alm,
    $estatus,
    $beneficiario,
    $cotitular,
    $plazo,
    $tasa,
    $alm,
    $seguro,
    $iva,
    $dias,
    //Auto
    $idTipoVehiculo,
    $idMarca,
    $idModelo,
    $idAnio,
    $idColor,
    $idPlacas,
    $idFactura,
    $idKms,
    $idAgencia,
    $idMotor,
    $idSerie,
    $idVehiculo,
    $idRepuve,
    $idGasolina,
    $idAseguradora,
    $idTarjeta,
    $idPoliza,
    $idFecVencimientoAuto,
    $idTipoPoliza,
    $idObservacionesAuto,
    $idCheckTarjeta,
    $idCheckFactura,
    $idCheckINE,
    $idCheckImportacion,
    $idCheckTenecia,
    $idCheckPoliza,
    $idCheckLicencia
);

$sqlAuto = new sqlAutoDAO();
$sqlAuto->generaContratoAuto($auto);




