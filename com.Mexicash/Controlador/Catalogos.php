<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlCatalogoDAO.php");

$tipoConsulta= $_POST['tipoConsulta'];
$sqlCatalogo = new sqlCatalogoDAO();

if($tipoConsulta==1){
    $idEstado= $_POST['idEstado'];
    $idMunicipio= null;
    $idLocalidad= null;
    $sqlCatalogo->completaEstado($idEstado);

}else if($tipoConsulta==2){
    $idEstado= $_POST['idEstado'];
    $idMunicipio= $_POST['idMunicipio'];
    $idLocalidad= null;
    $sqlCatalogo->completaMunicipio($idEstado,$idMunicipio);
}else if($tipoConsulta==3){
    $idEstado= $_POST['idEstado'];
    $idMunicipio= $_POST['idMunicipio'];
    $idLocalidad= $_POST['idLocalidad'];
    $sqlCatalogo->completaLocalidad($idEstado,$idMunicipio,$idLocalidad);
}


