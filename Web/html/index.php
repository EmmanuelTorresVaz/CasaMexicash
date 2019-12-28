<?php
    require_once('../../com.prueba1/dao/sql/sqlUsuarioDAO.php');
    require_once ('../../com.prueba1/dao/UsuarioDAO.php');
    require_once ('../../com.prueba1/modelo/Usuario.php');
    require_once ('../../com.prueba1/servicios/Errores.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
    try {
        $ver = false;
        $usuario = new Usuario("b", "b", "b", "b", "b", 2);
        $s = new sqlUsuarioDAO();
        if($ver = $s->guardaUsuario($usuario)){
            echo "Registrado";
        }else{
            echo "No registrado";
        }
    }catch (Exception $e){
        echo "No registrado";
    }
    ?>
</body>
</html>