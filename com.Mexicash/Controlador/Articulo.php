<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MODELO_PATH . "Interes.php");
include_once(SQL_PATH . "sqlArticulosDAO.php.php");

while ($post = each($_POST))
{
    echo $post[0] . " = " . $post[1];
}


$idTipo = $_POST['idTipo'];


$interes = new sqlArticulosDAO();
$interes->insertarArticulo($idTipo);


?>

