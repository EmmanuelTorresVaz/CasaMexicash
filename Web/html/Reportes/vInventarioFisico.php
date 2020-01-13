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
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
        $( function() {
            $( "#dateFinal" ).datepicker();
        } );


        function cerrarVentana() {
            window.close();
        }
/*
        var empe = 0, desempe = 0, refrendo = 0, almoneda = 0, auto = 0;

        function getInvCheck() {
            if($('#Empe').prop('checked')){
                empe = 1;
            }else {
                empe = 0;
            }

            if($('#Desemp').prop('checked')){
                desempe = 1;
            }else {
                desempe = 0;
            }

            if($('#Refrendo').prop('checked')){
                refrendo = 1;
            }else {
                refrendo = 0;
            }

            if($('#Almoneda').prop('checked')){
                almoneda = 1;
            }else {
                almoneda = 0;
            }

            if($('#Auto').prop('checked')){
                auto = 1;
            }else {
                auto = 0;
            }
        }

        function invFisicoPDF() {
            var p = "PDF";
            var params = {
                "Empe": empe,
                "Desempe": desempe,
                "Refrendo": refrendo,
                "Almoneda": almoneda,
                "Auto": auto,
                "Tipo": p
            };

        $.ajax({
                data: params,
                url: "reporteInventFisico.php",
                type: "POST",
                success: function (params) {
                    var a = document.createElement("a");
                    a.target = "_blank";
                    a.href = "reporteInventFisico.php";
                    a.click();
                }
            });

            alert(params);
        }

        function invFisicoEXCEL() {
            var e = 'EXCEL';
            var params = {
                "Empe": empe,
                "Desempe": desempe,
                "Refrendo": refrendo,
                "Almoneda": almoneda,
                "Auto": auto,
                "Tipo": e
            };

        $.ajax({
                data: params,
                url: "reporteInventFisico.php",
                type: "POST",
                success: function (params) {
                    var a = document.createElement("a");
                    a.target = "_blank";
                    a.href = "reporteInventFisico.php";
                    a.click();
                }
            });

            alert(params.Empe + " " + params.Desempe + " " + params.Refrendo + " " + params.Almoneda + " " + params.Auto);

        }
*/

    </script>


    <body>

    <div style="width: 500px; height: 210px; position:absolute;">
        <h5 style="width: 100%; text-align: center">Inventario Fisico</h5>
        <form method="post" action="reporteInventFisico.php" target="_blank">
            <div class="clearfix">
                <div style="float: left; margin-right: 15%; margin-left: 5%; width: 33%">
                    <h6>Fecha Inicial</h6>
                    <input type="text" id="inFechaIn" name="inFechaIn" placeholder="Fecha [dd/mm/aa]" required/>
                </div>
                <div style="float: left; width: 33%">
                    <h6>Fecha Final</h6>
                    <input type="text" id="inFechaFi" name="inFechaFi" placeholder="Fecha [dd/mm/aa]" required />
                </div>

            </div>
            <br>
            <div style="width: 100%; height: 50%; margin-left: 5%">
                <div style="float: left; margin-right: 20px; ">
                    <label><input type="checkbox" id="Empe" name="Empe" value="1"/>Empeños</label>
                </div>
                <div style="float: left; margin-right: 20px;">
                    <label><input type="checkbox" id="Desemp" name="Desemp" value="1"/>Desempeños</label>
                </div>
                <div style="float: left; margin-right: 20px;">
                    <label><input type="checkbox" id="Refrendo" name="Refrendo" value="1"/>Refrendo</label>
                </div>
                <div style="float: left; margin-right: 20px;">
                    <label><input type="checkbox" id="Almoneda" name="Almoneda" value="1"/>Almoneda</label>
                </div>
                <div style="float: left; margin-right: 40px;">
                    <label><input type="checkbox" id="Auto" name="Auto" value="1"/>Solo Autos</label>
                </div>
                <div style="float: left; margin-right: 20px;">
                    <label><input type="checkbox" id="PDF" name="PDF" value="1"/>PDF</label>
                </div>
                <div style="float: left;">
                    <label><input type="checkbox" id="Excel" name="Excel" value="1"/>Excel</label>
                </div>

                <input type="submit" value="Imprimir" onclick="cerrarVentana();" style="margin-left: 10%; padding-right: 12px; padding-left: 12px"/>
            </div>
        </form>


    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>
</html>
