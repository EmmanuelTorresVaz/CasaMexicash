<?php

include ('../Modelo/Auto.php');

    $nombreCot = $_POST['txtNombreCot'];
    $apellPCot = $_POST['txtApPCot'];
    $apellMCot = $_POST['txtApMCot'];
    $beneficiario = $_POST['txtBeneficiario'];
    $tipoAuto = $_POST['boxTipoAuto'];
    $marca = $_POST['boxMarca'];
    $modelo = $_POST['txtModelo'];
    $anio = $_POST['txtAnio'];
    $color = $_POST['boxColor'];
    $placas = $_POST['txtPlacas'];
    $factura = $_POST['txtFactura'];
    $kilometraje = $_POST['txtKilometraje'];
    $agencia = $_POST['txtAgencia'];
    $numMotor = $_POST['txtNumMotor'];
    $serieChasis = $_POST['txtSerieChasis'];
    $vin = $_POST['txtVin'];
    $repuve = $_POST['txtRepuve'];
    $gasolina = $_POST['txtGasolina'];
    $tarjetaCirc = $_POST['txtTarjetaCirc'];
    $tipoBlindaje = $_POST['boxTipoBlindaje'];
    $aseguradora = $_POST['txtAseguradora'];
    $poliza = $_POST['txtPoliza'];
    $fechaVencPoliza = $_POST['txtFechaVencPoliza'];
    $tipoPoliza = $_POST['boxTipoPoliza'];
    $observacionesAuto = $_POST['txtObservacionesAuto'];
    $autoCirculacion = $_POST['checkAutoCirculacion'];
    //Documentos Entregados -- Todos booleanos
    $bTarjCirc = $_POST['checkTarjCirc'];
    $bIfe = $_POST['checkIfe'];
    $bTenencia = $_POST['checkTenencia'];
    $bPolizaSeguro = $_POST['checkPolizaSeguro'];
    $bLicencia = $_POST['checkLicencia'];
    $bFactura = $_POST['checkFactura'];
    $bImportacion = $_POST['checkImportacion'];

    //Sección de los datos del contrato del auto Todos box excepto los últimos dos y totales
    $tasaInteres = $_POST['boxTasaInteres'];
    $tipoInteres = $_POST['boxTipoInteres'];
    $periodo = $_POST['boxPeriodo'];
    $plazo = $_POST['boxPlazo'];
    $tasa = $_POST['boxTasa'];
    $alm = $_POST['boxAlm'];
    $seguro = $_POST['boxSeguro'];
    //private $iva; el iva es constante
    $totalEvaluo = $_POST['txtTotalEvaluo'];
    $totalPrestamo = $_POST['txtTotalPrestamo'];
    $tipoPromocion = $_POST['boxTipoPromocion'];
    $tipoAgrupamiento = $_POST['boxTipoAgrupamiento'];
    $ctoPolizaSeguro = $_POST['txtCtoPolizaSeguro'];
    $ctoGPS = $_POST['txtCtoGPS'];
    //Extras-------------------------------
    $msjInternoAuto = $_POST['txtMsjInternoAuto'];
    $comoSeEntero = $_POST['boxComoSeEntero'];

    $auto = new Auto(
        $nombreCot,
        $apellPCot,
        $apellMCot,
        $beneficiario,
        $tipoAuto,
        $modelo,
        $marca,
        $anio,
        $color,
        $placas,
        $factura,
        $kilometraje,
        $agencia,
        $numMotor,
        $serieChasis,
        $vin,
        $repuve,
        $gasolina,
        $tarjetaCirc,
        $tipoBlindaje,
        $aseguradora,
        $poliza,
        $fechaVencPoliza,
        $tipoPoliza,
        $observacionesAuto,
        $autoCirculacion,
        $bTarjCirc,
        $bIfe,
        $bTenencia,
        $bPolizaSeguro,
        $bLicencia,
        $bFactura,
        $bImportacion,
        $tasaInteres,
        $tipoInteres,
        $periodo,
        $plazo,
        $tasa,
        $alm,
        $seguro,
        $totalEvaluo,
        $totalPrestamo,
        $tipoPromocion,
        $tipoAgrupamiento,
        $ctoPolizaSeguro,
        $ctoGPS,
        $msjInternoAuto,
        $comoSeEntero
    );

    $aut = new sqlAutoDAO();

    if($nombreCot == null || $apellPCot== null || $apellMCot== null || $beneficiario== null || $tipoAuto== null || $modelo== null || $marca== null || $anio== null || $color== null || $placas== null || $factura== null || $kilometraje== null || $agencia== null || $numMotor== null ||$serieChasis== null || $vin== null || $repuve== null || $gasolina== null || $tarjetaCirc== null || $tipoBlindaje== null || $aseguradora== null || $poliza== null || $fechaVencPoliza== null || $tipoPoliza== null || $observacionesAuto== null || $autoCirculacion== null || $bTarjCirc== null || $bIfe== null || $bTenencia== null || $bPolizaSeguro== null || $bLicencia== null || $bFactura== null || $bImportacion== null || $tasaInteres== null || $tipoInteres== null || $periodo== null || $plazo== null || $tasa== null || $alm== null || $seguro== null || $totalEvaluo== null || $totalPrestamo== null || $tipoPromocion== null || $tipoAgrupamiento== null || $ctoPolizaSeguro== null || $ctoGPS== null || $msjInternoAuto== null || $comoSeEntero == null){
        header('Status: 301 Moved Permanently', false, 301);
        header('Location: ../../Web/html/vAuto');
        exit();
    }else{
        if(!$aut->guardaAuto($auto)){
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: ../../Web/html/vAuto.php');
            exit();
        }else{
            header('Status: 301 Moved Permanently', false, 301);
            header('Location: ../../Web/html/index.php');
            exit();
        }
    }



