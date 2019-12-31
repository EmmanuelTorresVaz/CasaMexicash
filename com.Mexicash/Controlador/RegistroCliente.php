<?php
include ('../Modelo/Cliente.php');
include ('../Dao/sql/sqlClienteDAO.php');
//require_once ('ESAPI.php');

    $boxPersona = $_POST['boxPersona'];
    $boxSexo = $_POST['boxSexo'];
    $inFechaNac = $_POST['inFechaNac'];
    $inPaises = $_POST['inPaises'];
    $inEstados = $_POST['inEstados'];
    $inCurp = $_POST['inCurp'];
    $inNombre = $_POST['inNombre'];
    $inApPat = $_POST['inApPat'];
    $inApMat = $_POST['inApMat'];
   /* $boxOcupacion = $_POST['boxOcupacion'];
    $boxIdentificacion = $_POST['boxIdentificacion'];
    $inNoIdentificacion = $_POST['inNoIdentificacion'];
    $inRfc = $_POST['$inRfc'];
    $inCalle = $_POST['$inCalle'];
    $inNoExt = $_POST['$inNoExt'];
    $inNoInt = $_POST['$inNoInt'];
    $inColonia = $_POST['$inColonia'];
    $inAlcaldia = $_POST['$inAlcaldia'];
    $inEstadoActual = $_POST['$inEstadoActual'];
    $inCP = $_POST['$inCP'];
    $inMsjInt = $_POST['$inMsjInt'];
    $inInstFin = $_POST['$inInstFin'];
    $inCuentaBanc = $_POST['inCuentaBanc'];
    $inCelular = $_POST['$inCelular'];
    $inTelefono = $_POST['$inTelefono'];
    $inCorreo = $_POST['$inCorreo'];

    $direccion = $inCalle . " " . $inNoExt . " " . $inNoInt . " " . $inColonia . " " . $inAlcaldia . " " . $inEstadoActual . " " . $inCP;


    //ESAPI

    //$esapi = new ESAPI();

    /*$cliente = new Cliente(
        $esapi->encodeForHTML(strval($inNombre)),
        $esapi->encodeForHTML(strval($inApPat)),
        $esapi->encodeForHTML(strval($inApMat)),
        $esapi->encodeForHTML(strval($boxPersona)),
        $esapi->encodeForHTML(strval($boxSexo)),
        $esapi->encodeForHTML(strval($inFechaNac)),
        $esapi->encodeForHTML(strval($inPaises)),
        $esapi->encodeForHTML(strval($inEstados)),
        $esapi->encodeForHTML(strval($inCurp)),
        $esapi->encodeForHTML(strval($boxOcupacion)),
        $esapi->encodeForHTML(strval($boxIdentificacion)),
        $esapi->encodeForHTML(strval($inNoIdentificacion)),
        $esapi->encodeForHTML(strval($inCelular)),
        $esapi->encodeForHTML(strval($inRfc)),
        $esapi->encodeForHTML(strval($inTelefono)),
        $esapi->encodeForHTML(strval($inCorreo)),
        $esapi->encodeForHTML(strval($direccion)),
        $esapi->encodeForHTML(strval($inMsjInt)),
        $esapi->encodeForHTML(strval($inInstFin)),
        $esapi->encodeForHTML(strval($inCuentaBanc))
    );*/
/*
    $cliente = new Cliente(

        $inNombre,
        $inApPat,
        $inApMat,
        $boxPersona,
        $boxSexo,
        $inFechaNac,
        $inPaises,
        $inEstados,
        $inCurp,
        $boxOcupacion,
        $boxIdentificacion,
        $inNoIdentificacion,
        $inCelular,
        $inRfc,
        $inTelefono,
        $inCorreo,
        $direccion,
        $inMsjInt,
        $inInstFin,
        $inCuentaBanc

    );

    $sqlCliente = new sqlClienteDAO();
    if($sqlCliente->guardaCiente($cliente)){
        echo "Todo bien";
    }else{
        echo "Ocurrio un error";
    }
*/
echo $inNombre;