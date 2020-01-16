<?php
sleep(3);
echo ("He tardado 3 segundos en ejecutar esta p&aactute;gina...");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<html>
<head>
    <title>Ajax Simple</title>
    <script src="jquery-1.3.2.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("#enlaceajax").click(function(evento){
                evento.preventDefault();
                $("#cargando").css("display", "inline");
                $("#destino").load("pagina-lenta.php", function(){
                    $("#cargando").css("display", "none");
                });
            });
        })
    </script>
</head>

<body>
Esto es un Ajax con un mensaje de cargando...
<br>
<br>

<a href="#" id="enlaceajax">Haz clic!</a>
<div id="cargando" style="display:none; color: green;">Cargando...</div>
<br>
<div id="destino"></div>

</body>
</html>