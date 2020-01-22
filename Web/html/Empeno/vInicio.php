<?php
/*session_start();
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}*/
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(EMPE_PATH . "menuEmpeno.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
    <script src="../../librerias/alertifyjs/alertify.js"></script>
</head>
<body>
<form id="idFormEmpeno" name="formEmpeno">
    <div class="container-fluid" style="position: absolute; top: 8.2vh; height: 91.8vh">
        <div>
            <br>
            <h1 align="center">Menu acceso rapido</h1>
            <br>
            <br>
         <!--   <h2 align="center">Bienvenido: <?php /*echo $_SESSION["usuario"]; */?></h2>-->
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
                            <input type="button" class="btn btn-info  w-100" value="Autos"  onclick="location.href='vAuto.php'">
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
                            <input type="button" class="btn btn-info  w-100" value="Refrendo">
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
