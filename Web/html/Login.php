<?php
session_start();
if ($_SESSION['sautentificado'] == "1") {
    header("Location:Explorer.php");
}
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Acceder</title>
</head>
<body>

    <h3>Mexicash </h3>
    <div id="login">
        <form id="log" name="form1" method="post" action="Peticiones/PeticionesUsuario.php" autocomplete="off">
            <?php
                    if ($_GET["errorusuario"] != null && $_GET["errorusuario"] == "1") {
                        echo("<h3 id='error'>Datos incorrectos</h3>");
                    } else {
                        echo("<h3>Introduce tus datos de acceso</h3>");
                    }
            ?>
            <table width="410" border="0">
                <tr>
                    <td><label>Lider:</label></td>
                </tr>
                <tr>
                    <td><input name="lider" type="text" size="40" /></td>
                </tr>
                <tr>
                    <td height="13"><label>Contrase&ntilde;a</label></td>
                </tr>
                <tr>
                    <td height="14"><input name="contrasenaL" type="password" size="40" /></td>
                </tr>
                <tr>
                    <td height="45"  align="center"><input class="boton" type="submit" name="botonUsr" value="Entrar" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>