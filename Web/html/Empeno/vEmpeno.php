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


</head>
<body>
<div class="menuContainer"></div>

<h4 style="position: absolute; width: 95%; text-align: center; top: 9.5%">Empeño</h4>

<form method="post" name="formEmpeno">

    <div id="contenedor" class="container">
        <div class="row">
            <div class="col-6">
                <iframe height="300px" width="100%" src="consultaCliente.php" name="iframe_b"></iframe>
            </div>
            <div class="col-6">
                <iframe height="300px" width="100%" src="vInteres.php" name="iframe_b"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <iframe height="300px" width="100%" src="vArticulos.php" name="iframe_b"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-warning" onclick="Cargar();">Cargar</button>
            </div>
        </div>
</form>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
