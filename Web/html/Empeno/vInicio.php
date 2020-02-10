<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (HTML_PATH."Empeno/menuEmpeno.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form id="idFormEmpeno" name="formEmpeno">
    <div class="container-fluid" style="position: absolute; top: 8.2vh; height: 91.8vh">
        <div>
            <br>
            <h1 align="center">Menu acceso rapido</h1>
            <br>
            <br>
         <h2 align="center">Bienvenido: <?php echo $_SESSION["usuario"]; ?></h2>
        </div>
        <div class="row">
            <div class="col-1" >
            </div>
            <div class="col-2 border border-info " align="center">
                <table width="80%">
                    <tr>
                        <td align="center">
                            <br>
                            <h2>Empeño</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="50%">
                            <br>
                            <input type="button" class="btn btn-info w-100" value="Empeño" onclick="location.href='vEmpeno.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br>
                            <input type="button" class="btn btn-info  w-100" value="Refrendo" onclick="location.href='vRefrendo.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br>
                            <input type="button" class="btn btn-info  w-100" value="Desempeño" onclick="location.href='vDesempeno.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br>
                            <input type="button" class="btn btn-info  w-100" value="Consulta" onclick="location.href='vConsulta.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <br>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-2 border border-info " align="center">
                <table width="80%">
                    <tr>
                        <td align="center">
                            <br>
                            <h2>Auto</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="50%">
                            <br>
                            <input type="button" class="btn btn-info w-100" value="Auto" onclick="location.href='vAuto.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br>
                            <input type="button" class="btn btn-info  w-100" value="Refrendo" onclick="location.href='vRefrendoAuto.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br>
                            <input type="button" class="btn btn-info  w-100" value="Desempeño" onclick="location.href='vDesempenoAuto.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <br>
                            <input type="button" class="btn btn-info  w-100" value="Consulta" onclick="location.href='vConsulta.php'">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

</body>
</html>
