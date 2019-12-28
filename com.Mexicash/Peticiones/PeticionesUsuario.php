<?

session_start();
require_once('../Dao/sql/sqlUsuario.php');

if ($_POST['botonAcceder'] == "Entrar") {
    $userText = $_POST['usuario'];
    $passText = $_POST['password'];
    if ($userText != null || $passText != null) {
        $id = loginAutentificion($userText, $passText);
        if ($id > 0) {
            $_SESSION['sautentificado'] = 1;
            $_SESSION['userName'] = $id;

            header("Location:../Explorer.php");
        } else {
            header("Location:../index.php?errorusuario=1");
        }
    } else {
        header("Location:../index.php?errorusuario=1");
    }
}
?>