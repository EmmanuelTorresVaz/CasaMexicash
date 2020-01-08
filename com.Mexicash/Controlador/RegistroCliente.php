<?php
include ('../Modelo/Cliente.php');
include ('../Dao/sql/sqlClienteDAO.php');
//require_once ('ESAPI.php');

    $inNombre = $_POST['inNombre'];
    $inApPat = $_POST['inApPat'];
    $inApMat = $_POST['inApMat'];
    $boxSexo = $_POST['boxSexo'];
    $inFechaNac = $_POST['inFechaNac'];
    $inCurp = $_POST['inCurp'];
    $boxOcupacion = $_POST['boxOcupacion'];
    $boxIdentificacion = $_POST['boxIdentificacion'];
    $inNoIdentificacion = $_POST['inNoIdentificacion'];
    $inCelular = $_POST['$inCelular'];
    $inRfc = $_POST['$inRfc'];
    $inTelefono = $_POST['$inTelefono'];
    $inCorreo = $_POST['$inCorreo'];
    $inEstadoActual = $_POST['$inEstadoActual'];
    $inCP = $_POST['$inCP'];
    $inAlcaldia = $_POST['$inAlcaldia'];
    $inColonia = $_POST['$inColonia'];
    $inCalle = $_POST['$inCalle'];
    $inNoExt = $_POST['$inNoExt'];
    $inNoInt = $_POST['$inNoInt'];
    $inMsjInt = $_POST['$inMsjInt'];
    $inPromocion = $_POST['$inInstFin'];


    $cliente = new Cliente(

        $inNombre,
        $inApPat,
        $inApMat,
        $boxSexo,
        $inFechaNac,
        $inCurp,
        $boxOcupacion,
        $boxIdentificacion,
        $inNoIdentificacion,
        $inCelular,
        $inRfc,
        $inTelefono,
        $inCorreo,
        $inEstadoActual,
        $inCP,
        $inAlcaldia,
        $inColonia,
        $inCalle,
        $inNoExt,
        $inNoInt,
        $inMsjInt,
        $inPromocion

    );

    $sqlCliente = new sqlClienteDAO();
    if($sqlCliente->guardaCiente($cliente)){
        echo "Todo bien";
    }else{
        echo "Ocurrio un error";
    }

echo $inNombre;