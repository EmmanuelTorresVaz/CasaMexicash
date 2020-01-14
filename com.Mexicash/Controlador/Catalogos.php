<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlCatalogoDAO.php");

$tipoConsulta= $_POST['tipoConsulta'];
$sqlCatalogo = new sqlCatalogoDAO();

if($tipoConsulta==1){
    $idEstadoName= $_POST['idEstadoName'];
    $idMunicipio= null;
    $idLocalidad= null;
    $sqlCatalogo->completaEstado($idEstadoName);

}else if($tipoConsulta==2){
    $idEstado= $_POST['idEstado'];
    $idMunicipioName = $_POST['idMunicipioName'];
    $idLocalidad= null;
    $sqlCatalogo->completaMunicipio($idEstado,$idMunicipioName);
}else if($tipoConsulta==3){
    $idEstado= $_POST['idEstado'];
    $idMunicipio= $_POST['idMunicipio'];
    $idLocalidad= $_POST['idLocalidadName'];
    $sqlCatalogo->completaLocalidad($idEstado,$idMunicipio,$idLocalidad);
}


