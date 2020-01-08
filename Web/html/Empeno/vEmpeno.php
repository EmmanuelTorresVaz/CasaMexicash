<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registro Clientes</title>

    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

    <script>
        $(document).ready(function () {
            $('.menuContainer').load('../html/menu.php');
        });
    </script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

</head>
<body>
<div class="menuContainer" ></div>

<h4 style="position: absolute; width: 95%; text-align: center; top: 9.5%">Empeño</h4>

<form method="post" name="formCliente" action="../../../com.Mexicash/Controlador/RegistroCliente.php">

    <div class="row-2" style="position: absolute; top: 15vh; padding-left: 4vw; height: 80vh;">
        <h6>Nombre(s):</h6>
        <input type="text" name="inNombre" id="inNombre" placeholder="Nombres" style="width: 240px" required/>

        <div style="position: relative; top: -9.9%; left: 35%">
            <h6>Apellido Paterno:</h6>
            <input type="text" name="inApPat" id="inApPat" placeholder="Apellido Paterno" style="width: 240px" required/>
        </div>

        <div style="position: relative; top: -19.8%; left: 70%">
            <h6>Apellido Materno:</h6>
            <input type="text" name="inApMat" id="inApMat" placeholder="Apellido Materno" style="width: 240px" required/>
        </div>
    </div>

    <div class="row-7" style="position: absolute; top: 15vh; left: 20vw; height: 83vh; border-left: 1px solid black; border-right: 1px solid black">


    </div>

    <div class="row-2" style="position: absolute; top: 15vh; right: 3vw; height: 80vh;">

    </div>

</form>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
