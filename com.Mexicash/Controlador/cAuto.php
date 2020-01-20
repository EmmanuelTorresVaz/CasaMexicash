<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Auto.php");
include_once(SQL_PATH . "sqlAutoDAO.php");

//DatosContrato
$idClienteAuto = $_POST['idClienteAuto'];
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
$cotitular,
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




