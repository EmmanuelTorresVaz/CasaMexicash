<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Articulo.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");

$idTipo = $_POST['idTipo'];



if ($idTipo == 1) {
   echo $idTipo;
} else if ($idTipo == 2) {
    $idTipo = $_POST['idTipoElectronico'];
    $idFolio = $_POST['idFolio'];
    $idMarca = $_POST['idMarca'];
    $idEstado = $_POST['idEstado'];
    $idModelo = $_POST['idModelo'];
    $idTamaño = $_POST['idTamaño'];
    $idColor = $_POST['idColor'];
    $idSerie = $_POST['idSerie'];
    $idPrestamoE = $_POST['idPrestamoElectronico'];
    $idAvaluoE = $_POST['idAvaluoElectronico'];
    $idPrestamoMaxE = $_POST['idPrestamoMaxElectronico'];
    $idUbivacion = $_POST['idUbivacion'];
    $idDetallePrendaE = $_POST['idDetallePrendaElectronico'];


    $articulo = new Articulo(
        $idTipo,
        $idFolio,
        $idMarca,
        $idEstado,
        $idModelo,
        $idTamaño,
        $idColor,
        $idSerie,
        $idPrestamoE,
        $idAvaluoE,
        $idPrestamoMaxE,
        $idUbivacion,
        $idDetallePrendaE
    );

    $sqlArticulo = new sqlArticulosDAO();
    $sqlArticulo->guardarArticulo($articulo);
}


?>

