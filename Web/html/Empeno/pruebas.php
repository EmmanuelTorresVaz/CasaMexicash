<?php
sleep(3);
echo("He tardado 3 segundos en ejecutar esta p&aactute;gina...");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<html>
<head>
    <title>Ajax Simple</title>
    <script src="jquery-1.3.2.min.js" type="text/javascript"></script>
    <script>
        function validacion() {
            var hola = '';
            var hola2 = null;
            var hola3;

            if (h) {
                alert("vacio");
            }
            if (hola != '') {
                alert("diferete a vacio");
            }
            if (hola2 == null) {
                alert("variable null")
            }
            if (hola2 != null) {
                alert("diferente a null")
            }
            if (hola3 == null) {
                alert("variable null")
            }
            if (hola3 == '') {
                alert("diferente a null")
            }

        }
    </script>
</head>

<body>
Esto es un Ajax con un mensaje de cargando...
<br>
<br>

<input type="button" value="hola" onclick="validacion();">

</body>
</html>