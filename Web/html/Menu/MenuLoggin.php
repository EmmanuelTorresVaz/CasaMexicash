<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(MENU_PATH . "menuPrincipal.php");
?>

<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css"/>
<link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css"/>
<script src="../../librerias/jquery/jquery-3.4.1.min.js"></script>
<script src="../../librerias/bootstrap/js/bootstrap.js"></script>
<script src="../../librerias/alertifyjs/alertify.js"></script>
<script src="../../JavaScript/funcionesLogin.js"></script>
<body id="bodyHome">
<div class="login contChild">
    <div class="capa-Negra"></div><!--div Capa-Negra-->
    <form id="log" >
        <h3>Iniciar Sesion</h3>
        <br/><br/>
        <div id="resultado" style="color:#FF0000;"></div>
        <br/>
        <h5>Usuario:</h5>
        <input type="text" name="usuario" id="usuario" class="form-control"
               style="color: white; background-color: transparent; width: 80%; margin-left: 5%"
               placeholder="Usuario:" required/>
        <br/>
        <h5>Contraseña:</h5>
        <input type="password" name="password" id="password" class="form-control"
               style="color: white; background-color: transparent; width: 80%; margin-left: 5%"
               placeholder="*****************" required/>
        <br/>
        <input type="button" class=" sub btn btn-primary" value="Entrar" onclick="validarUser()">&nbsp;
    </form>



</div>
</body>