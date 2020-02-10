<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (HTML_PATH. "Empeno/menuEmpeno.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../JavaScript/funcionesDesempeno.js"></script>
    <script src="../../JavaScript/funcionesGenerales.js"></script>
    <style>
        .textArea {
            resize: none;
        }
    </style>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#trAlmoneda").hide();
            $("#totalTD").hide();
            $("#descuentoTD").hide();
            $("#idImporteAuto").blur(function(){
                reCalculaDescuentoAuto();
            });
            $("#btnGenerar").prop('disabled', true);

        });
    </script>
</head>
<body>
<form id="idFormDesAuto" name="formDesAuto">
    <div align="center">
        <br>
        <h2>Desempeño Auto</h2>
        <br>
    </div>
    <div id="contenedor" class="container">
        <div class="row">
            <div class="col col-lg-5 border border-primary ">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px" align="left" colspan="2">
                            <input type="button" class="btn btn-info " onclick="buscarContratoDesAuto();"
                                   value="Buscar">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px" align="left">
                            <label>Contrato:</label>
                            <input type="text" id="idContratoDesempenoAuto" name="contrato" size="10" value=""
                                   style="text-align:right"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Datos del Cliente
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="6" cols="45" id="idDatosClienteDesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Datos del Contrato
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="16" cols="45" id="idDatosContratoDesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Detalle de Contrato
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="4" cols="45" id="idDetalleContratoDesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col col-lg-7 border border-primary border-left-0">
                <table width="100%" border="0">
                    <tr>
                        <td colspan="3">
                            <div>
                                <table class="table table-bordered " width="100%">
                                    <thead>
                                    <th>Contrato</th>
                                    <th>Préstamo</th>
                                    <th>Interés</th>
                                    <th>Seguro Poliza</th>
                                    <th>GPS</th>
                                    </thead>
                                    <tr>
                                        <td> <label id="idConTDDesAuto"></label></td>
                                        <td> <label id="idPresTDDesAuto"></label></td>
                                        <td> <label id="idInteresTDDesAuto"></label></td>
                                        <td> <label id="idPolizaSegTDDes"></label></td>
                                        <td> <label id="idGPSTDDes"></label></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 100px">
                            <label class="form-check-label">Descuento Interes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="checkbox" class="form-check-input" id="idDescuentoAuto" onclick="checkDescuentoAuto()">
                        </td>
                        <td align="right" id="totalTD"><h3>Total a Pagar: $<label id="totalAPagarTDAuto"></label></h3></td>
                    </tr>
                    <tr>
                        <td align="right" id="descuentoTD"><h3>Con Descuento: $<label id="totalDecuentoTD"></label></h3></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="width: 100px">
                            <label >Importe</label>
                        </td>
                        <td colspan="1" align="center">
                            <input type="text" id="idImporteAuto" name="importe"
                                   style="width: 100px; text-align: right" disabled />
                        </td>
                        <td style="width: 400px">
                            &nbsp;
                        </td>
                    </tr>
                    <tr id="trAlmoneda" style="color:#FF0000" >
                        <td colspan="3"><h3>¡Contrato en almoneda!</h3></td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-7">
                <input type="text" id="idContratoBusqueda" name="contratoBus"
                       style="width: 100px;" class="invisible" />
            </div>
            <div class="col col-lg-5">
                <input type="button" class="btn btn-success" value="prueba" onclick="formatStringToDate('2019-03-05')">
                <input type="button" class="btn btn-warning" value="Cancelar" onclick="cancelarDesempenoAuto()">&nbsp;
                <input type="button" class="btn btn-info" value="Reimprimir" onclick="reimprimir()">&nbsp;
                <input type="button" class="btn btn-primary" value="Generar" id="btnGenerar" onclick="generarDesempenoAuto()" disabled>&nbsp;
                <input type="button" class="btn btn-danger" value="Salir" onclick="location.href='vInicio.php'">&nbsp;
            </div>
        </div>
    </div>
</form>

</body>
</html>
