<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["idUsuario"])) {
    header("Location: ../index.php");
    session_destroy();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(HTML_PATH . "Empeno/menuEmpeno.php");
include_once (HTML_PATH. "Empeno/modalDescuento.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refrendo</title>
    <script src="../../JavaScript/funcionesRefrendo.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#trAlmoneda").hide();
            $("#btnGenerar").prop('disabled', true);
        });
    </script>
</head>
<body>
<form id="idFormDesRef" name="formDes">
    <div id="contenedor" class="container ">
        <div align="center">
            <br>
            <h2>Refrendo</h2>
            <br>
        </div>
        <div class="row">
            <div class="col col-lg-5 border border-primary ">
                <table border="0" width="100%">
                    <tr>
                        <td style="width: 200px" align="left">
                            <label>Contrato:</label>
                            <input type="text" id="idContrato" name="contrato" size="10" value="53"
                                   style="text-align:right"/>
                        </td>
                        <td style="width: 200px" align="left" >
                            <input type="button" class="btn btn-info " onclick="estatusContrato();"
                                   value="Buscar">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Datos del Cliente
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="5" cols="45" id="idDatosClienteDes" class="textAreaUP" disabled>
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
                            <textarea rows="13" cols="45" id="idDatosContratoDes" class="textAreaRes" disabled>
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
                            <textarea rows="2" cols="45" id="idDetalleContratoDes" class="textAreaUP" disabled>
                            </textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col col-lg-7 border border-primary border-left-0">
                <table width="100%" border="0">
                    <tr>
                        <td colspan="4">
                            <div>
                                <table class="table table-bordered " width="100%">
                                    <thead>
                                    <th>Contrato</th>
                                    <th>Préstamo</th>
                                    <th>Interés</th>
                                    <th>Abono</th>
                                    </thead>
                                    <tr align="center">
                                        <td><label id="idConTDDes"></label></td>
                                        <td><label id="idPresTDDes"></label></td>
                                        <td><label id="idInteresTDDes"></label></td>
                                        <td><label id="idAbonoTDDes"></label></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="form-check-label">Aplicar descuento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="checkbox" class="form-check-input" id="idChekcDescuento"
                                   data-toggle="modal" data-target="#modalDescuento" disabled
                                   onclick="checkDescuento()">
                        </td>
                        <td align="center"><input type="button" class="btn btn-info" value="Calcular Descuento" id="btnDescuento" disabled onclick="reCalculaDescuento();">&nbsp;
                        </td>
                        <td align="center"><input type="button" class="btn btn-info" value="Caclular Abono" id="btnAbono" disabled onclick="calcularAbono()">&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h4>Prestamo:</label></h4>
                        </td>
                        <td align="right">
                            <h4 ><input type="text" id="idPrestamoNota" name="prestamoNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h4>Interes:</label></h4>
                        </td>
                        <td align="right">
                            <h4 ><input type="text" id="idInteresNota" name="interesNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h4>SubTotal Prestamo:</label></h4>
                        </td>
                        <td align="right">
                                <h4><input type="text" id="idTotalPrestamoNota" name="totalPrestamoNota"
                                            style="width: 160px; text-align: right" disabled value="$0.00"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td align="right"  >
                            <h4>Descuento:</h4>
                        </td>
                        <td align="right">
                            <h4 ><input type="text" id="idImporte" name="importe" onkeypress="return isNumberDecimal(event)"
                                       style="width: 160px; text-align: right" disabled placeholder="$0.00"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h4>Interes Pendiente:</label></h4>
                        </td>
                        <td align="right">
                            <h4 ><input type="text" id="idInteresPendienteNota" name="interesNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h4>Total a Pagar :</label></h4>
                        </td>
                        <td align="right" style="width: 180px">
                            <h4><input type="text" id="idTotalFinalNota" name="totalFinalNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h4>Abono :</label></h4>
                        </td>
                        <td align="right" style="width: 180px">
                            <h4>  <input type="text" id="idAbono" name="abono"disabled
                                          style="width: 160px; text-align: right" placeholder="$0.00"
                                          onkeypress="return isNumberDecimal(event)"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h4>Abono a Capital:</label></h4>
                        </td>
                        <td align="right" style="width: 180px">
                            <h4>  <input type="text" id="idAbonoCapitalNota" name="abonoCapitalNota"
                                          style="width: 160px; text-align: right" value="$0.00" disabled
                                          onkeypress="return isNumberDecimal(event)"/></h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h4>Saldo Pendiente:</label></h4>
                        </td>
                        <td align="right" style="width: 180px">
                            <h4>  <input type="text" id="idSaldoPendiente" value="$0.00" name="saldoPendiente"
                                          style="width: 160px; text-align: right" disabled
                            </h4>
                        </td>
                    </tr>
                    <tr id="trAlmoneda" style="color:#FF0000">
                        <td colspan="3"><h3>¡Contrato en almoneda!</h3></td>
                    </tr>
                    <tr class="">
                        <td>
                            <input type="text" id="idPrestamoAbono"  style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idInteresAbono" style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idTotalInput" style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idInteresPendiente" style="width: 100px; text-align: right"/>
                        </td>
                    </tr>
                    <tr class="">
                        <td >
                            <input type="text" id="idTotalFinalInput"  style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idToken"  style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idSaldoPendienteInput" value="0.00" style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idNuevaFechaVenc" value="0" style="width: 100px; text-align: right"/>
                        </td>
                    </tr>
                    <tr class="">
                        <td colspan="2">
                            <input type="text" id="idNuevaFechaAlm" value="0" style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idAbonoAnteriorInput" value="0" style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <input type="text" id="idAbonoACapitalInput" value="0" style="width: 100px; text-align: right"/>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col col-lg-7">
                <input type="text" id="idContratoBusqueda" name="contratoBus"
                       style="width: 100px;" class="invisible"/>
            </div>
            <div class="col col-lg-5" align="right">
                <input type="button" class="btn btn-warning" value="x" onclick="prueba()">&nbsp;
                <input type="button" class="btn btn-warning" value="Cancelar" onclick="cancelar()">&nbsp;
                <input type="button" class="btn btn-info" value="Reimprimir" onclick="reimprimir()">&nbsp;
                <input type="button" class="btn btn-primary" value="Refrendo" onclick="generar()">&nbsp;
                <input type="button" class="btn btn-danger" value="Salir" onclick="location.href='vInicio.php'">&nbsp;
            </div>
        </div>
    </div>
</form>

</body>
</html>
