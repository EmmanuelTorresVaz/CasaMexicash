<?php
include ('../Modelo/Cliente.php');
include ('../Dao/sql/sqlClienteDAO.php');
//require_once ('ESAPI.php');

$nombre =  $cliente->getNombre();
$apellido_Pat =  $cliente->getApellidoPat();
$apellido_Mat =  $cliente->getApellidoMat();
$sexo =  $cliente->getSexo();
$fecha_Nacimiento =  $cliente->getFechaNacimiento();
$curp =  $cliente->getCurp();
$ocupacion =  $cliente->getOcupacion();
$tipo_Identificacion =  $cliente->getTipoIdentificacion();
$num_Identificacion =  $cliente->getNumIdentificacion();
$celular =  $cliente->getCelular();
$rfc =  $cliente->getRfc();

$telefono =  $cliente->getTelefono();
$correo =  $cliente->getCorreo();
$estado =  $cliente->getEstado();
$codigo_Postal =  $cliente->getCodigoPostal();

$municipio =  $cliente->getMunicipio();
$colonia =  $cliente->getColonia();
$calle =  $cliente->getCalle();
$num_exterior =  $cliente->getNumExterior();
$num_interior =  $cliente->getNumInterior();

$mensaje =  $cliente->getMensaje();
$promocion =  $cliente->getPromocion();

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