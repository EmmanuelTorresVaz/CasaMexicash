<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Articulo.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");

$idTipo = $_POST['idTipo'];


if ($idTipo == 1) {
    $idTipo = $_POST['idTipoElectronico'];
    $idTipo = $_POST['idFamilia'];
    $idMarca = $_POST['idMarca'];
    $idEstado = $_POST['idEstado'];
    $idModelo = $_POST['idModelo'];
    $idTamaño = $_POST['idTamaño'];
    $idColor = $_POST['idColor'];
    $idSerie = $_POST['idSerie'];
    $idPrestamo = $_POST['idPrestamo'];
    $idAvaluo = $_POST['idAvaluo'];
    $idPrestamoMax = $_POST['idPrestamoMax'];
    $idUbivacion = $_POST['idUbivacion'];
    $idDetallePrenda = $_POST['idDetallePrenda'];


    $articulo = new Articulo(
        $idMarca,
        $idEstado,
        $idModelo,
        $idTamaño,
        $idColor,
        $idSerie,
        $idPrestamo,
        $idAvaluo,
        $idPrestamoMax,
        $idUbivacion,
        $idDetallePrenda
    );

    $sqlArticulo = new sqlArticulosDAO();
    $sqlArticulo->guardaCiente($articulo);
} else if ($idTipo == 2) {

}


?>

