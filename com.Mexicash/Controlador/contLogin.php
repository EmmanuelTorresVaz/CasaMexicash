<?php
//include ('../esapi/ESAPI.php');
//include ('../esapi/reference/DefaultEncoder.php');
//include ('../esapi/reference/');

include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
include_once (SQL_PATH."sqlUsuarioDAO.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];


if($usuario == null || $password == null){
    header('Status: 301 Moved Permanently', false, 301);
    header('Location: ../../Web/html/index.php');
    exit();
}else{
    if($usuario == $password){
        header('Status: 301 Moved Permanently', false, 301);
        header('Location: ../../Web/html/index.php');
        exit();
    }else{
        $usu = new sqlUsuarioDAO();
        if($usu->loginAutentificion($usuario, $password) > 0){
            header('Location: ../../Web/html/Empeno/vInicio.php');
            exit();
        }else{
            header('Location: ../../Web/html/index.php');
            exit();
        }
    }
}

