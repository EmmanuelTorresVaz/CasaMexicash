<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Articulo.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");

$idTipoEnviar = $_POST['$idTipoEnviar'];

if($idTipoEnviar ==1){

    $idTipoM = $_POST['idTipoMetal'];
    $idClienteInteres = $_POST['idClienteInteres'];
    $idPrenda = $_POST['idPrenda'];
    $idKilataje = $_POST['idKilataje'];
    $idCalidad = $_POST['idCalidad'];
    $idCantidad = $_POST['idCantidad'];
    $idPeso = $_POST['idPeso'];
    $idPesoPiedra = $_POST['idPesoPiedra'];
    $idPiedras = $_POST['idPiedras'];
    $idPrestamo = $_POST['idPrestamo'];
    $idAvaluo = $_POST['idAvaluo'];
    $idPrestamoMax = $_POST['idPrestamoMax'];
    $idUbicacion = $_POST['idUbicacion'];
    $idDetallePrenda = $_POST['idDetallePrenda'];
    $idUbicacion = $_POST['idUbicacion'];
    $idDetallePrenda = $_POST['idDetallePrenda'];

    $idTipoE = null;
    $idMarca = null;
    $idEstado = null;
    $idModelo = null;
    $idTamaño = null;
    $idColor = null;
    $idSerie = null;
    $idPrestamoE = null;
    $idAvaluoE = null;
    $idPrestamoMaxE = null;
    $idUbicacionE = null;
    $idDetallePrendaE = null;

}else if ($idTipoEnviar ==2){

    $idTipoM = null;
    $idPrenda = null;
    $idKilataje = null;
    $idCalidad = null;
    $idCantidad = null;
    $idPeso = null;
    $idPesoPiedra = null;
    $idPiedras = null;
    $idPrestamo = null;
    $idAvaluo = null;
    $idPrestamoMax = null;
    $idUbicacion = null;
    $idDetallePrenda = null;

    $idTipoE = $_POST['idTipoElectronico'];
    $idClienteInteres = $_POST['idClienteInteres'];
    $idMarca = $_POST['idMarca'];
    $idEstado = $_POST['idEstado'];
    $idModelo = $_POST['idModelo'];
    $idTamaño = $_POST['idTamaño'];
    $idColor = $_POST['idColor'];
    $idSerie = $_POST['idSerie'];
    $idPrestamoE = $_POST['idPrestamoElectronico'];
    $idAvaluoE = $_POST['idAvaluoElectronico'];
    $idPrestamoMaxE = $_POST['idPrestamoMaxElectronico'];
    $idUbicacionE = $_POST['idUbicacionElectronico'];
    $idDetallePrendaE = $_POST['idDetallePrendaElectronico'];
}

    $articulo = new Articulo(
        $idTipoM,
        $idClienteInteres,
        $idPrenda,
        $idKilataje,
        $idCalidad,
        $idCantidad,
        $idPeso,
        $idPesoPiedra,
        $idPiedras,
        $idPrestamo,
        $idAvaluo,
        $idPrestamoMax,
        $idUbicacion,
        $idDetallePrenda,
        $idTipoE,
        $idMarca,
        $idEstado,
        $idModelo,
        $idTamaño,
        $idColor,
        $idSerie,
        $idPrestamoE,
        $idAvaluoE,
        $idPrestamoMaxE,
        $idUbicacionE,
        $idDetallePrendaE
    );

$sqlArticulo = new sqlArticulosDAO();
$sqlArticulo->guardarArticulo($idTipoEnviar, $articulo);

?>

