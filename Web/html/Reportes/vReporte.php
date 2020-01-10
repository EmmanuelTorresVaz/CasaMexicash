<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (SQL_PATH."sqlCatalogoDAO.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Reportes</title>

        <link rel="stylesheet" href="../../style/less/main.css"/>
        <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">
    </head>

    <script>
        $(document).ready(function () {
            $('.menuContainer').load('menu.php');
        });
    </script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

    <body>

    <div class="menuContainer" ></div>

        <h4 style="position: absolute; width: 95%; text-align: center; top: 9.5%">Reportes</h4>

        <form action="reporteEmpeño.php" method="post" style="position: absolute; top: 14.5%">
            <div>
                <label><input type="checkbox" id="Empe" name="Empe" value="1"/>Empeños</label>
                <label><input type="checkbox" id="Desemp" name="Desemp" value="1"/>Desempeños</label>
                <label><input type="checkbox" id="Refrendo" name="Refrendo" value="1"/>Refrendo</label>
                <label><input type="checkbox" id="Almoneda" name="Almoneda" value="1"/>Almoneda</label>

                <input type="submit" value="Imprimir"/>
            </div>
        </form>


        </form>
    </body>
</html>
