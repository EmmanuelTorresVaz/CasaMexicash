<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <!--   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css"/>
     <script src="../../librerias/jquery/jquery-3.4.1.min.js"></script>
     <script src="../../librerias/bootstrap/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script type="application/javascript">
        $(document).ready(function () {
            $('.menuContainer').load('menu.php');
        });
    </script>

</head>
<body>
<div class="menuContainer"></div>
<div class="container-fluid" style="position: absolute; top: 8.2vh; border:1px solid black; height: 91.8vh">
    <div>
        <br>
        <br>
        <h1 align="center">Menu acceso rapido</h1>
        <br>
        <br>
    </div>
    <div class="row">
        <div class="col-1" >

        </div>
        <div class="col-2 border border-info " >
            <table width="70%" border="0">
                <tr>
                    <td align="center" colspan="2">
                        <br>
                        <h1>Empeño</h1>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="left" width="50%">
                        <br>
                        <input type="button" class="btn btn-info btn-lg w-100" value="Empeño" onclick="location.href='vEmpeno.php'">
                        <br>
                    </td>
                    <td align="center">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <br>
                        <input type="button" class="btn btn-info btn-lg w-100" value="Autos"  onclick="location.href='vAuto.php'">
                        <br>
                    </td>
                    <td align="center">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <br>
                        <input type="button" class="btn btn-info btn-lg w-100" value="Desempeño" onclick="location.href='vDesempeno.php'">
                        <br>
                    </td>
                    <td align="center">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <br>
                        <input type="button" class="btn btn-info btn-lg w-100" value="Refrendo">
                        <br>
                    </td>
                    <td align="center">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        <br>
                        <input type="button" class="btn btn-info btn-lg w-100" value="Conulta" onclick="location.href='vConsulta.php'">
                        <br>
                    </td>
                    <td align="center">
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="2">
                        <br>
                        <br>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>


