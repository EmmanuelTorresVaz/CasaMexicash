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
        var form= 2;
        var nameForm = "Error";
        var tipoArticuloOAuto = 0;


        $(document).ready(function () {
            $("#trAlmoneda").hide();
            $("#btnGenerar").prop('disabled', true);
            $("#idFormulario").val(form);
            $("#btnAbonoDelete").hide();
            $("#btnDescuentoDelete").hide();

            if(form==1){
                //Quitar sigueinte linea
                $("#idContrato").val(64);
                nameForm = "Refrendo";
                $("#idGPSTH").hide();
                $("#idPensionTH").hide();
                $("#idPolizaTH").hide();
                $("#idGPSTDform").hide();
                $("#idPensionTDform").hide();
                $("#idPolizaTDform").hide();
                $("#trGPSNota").hide();
                $("#trPensionNota").hide();
                $("#trPolizaNota").hide();
                $("#idFormulario").val(form);
                tipoArticuloOAuto = 1;
                $("#idTipoDeContrato").val(tipoArticuloOAuto);


            }else if(form==2){
                //Quitar sigueinte linea
                $("#idContrato").val(67);
                nameForm = "Refrendo Auto";
                $("#idGPSTH").show();
                $("#idPensionTH").show();
                $("#idPolizaTH").show();
                $("#idGPSTDform").show();
                $("#idPensionTDform").show();
                $("#idPolizaTDform").show();
                $("#trGPSNota").show();
                $("#trPensionNota").show();
                $("#trPolizaNota").show();
                $("#idFormulario").val(form);
                tipoArticuloOAuto = 2;
                $("#idTipoDeContrato").val(tipoArticuloOAuto);

            }else if(form==3){
                nameForm = "Desempeño";
                tipoArticuloOAuto = 1;
            }else if(form==4){
                nameForm = "Desempeño Auto";
                tipoArticuloOAuto = 2;
            }

            document.getElementById('nameFormLbl').innerHTML =nameForm;
        });
    </script>
    <style>
        .propInvisible {
            visibility: visible;
        }
    </style>
</head>
<body >
<form id="idFormDesRef" name="formDes">
    <div id="newContenedor" >
        <div align="center">
            <br>
            <h2><label id="nameFormLbl"></label></h2>
            <br>
        </div>
        <div class="row">
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3 border border-primary ">
                <table border="0" width="100%">
                    <tr>
                        <td style="width: 200px" align="left">
                            <label>Contrato:</label>
                            <input type="text" id="idContrato" name="contrato" size="10" value=""
                                   style="text-align:right"/>
                        </td>
                        <td style="width: 200px" align="left" >
                            <input type="button" class="btn btn-info " id="btnBuscar" onclick="estatusContrato();"
                                   value="Buscar">
                            <input type="button" class="btn btn-warning" value="Cancelar" onclick="cancelar()">&nbsp;

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
                            <!--   <textarea rows="13" cols="45" id="idDatosContratoDes" class="textAreaRes" disabled>
                               </textarea>-->
                            <table>
                                <tr>
                                    <td><label>Fecha Empeño :</label></td>
                                    <td><input type="text" id="idTblFechaEmpeno" name="tblFechaEmpe" size="10" disabled
                                               style="text-align:left"/></td>
                                </tr>
                                <tr>
                                    <td><label>Fecha Vencimiento :</label></td>
                                    <td><input type="text" id="idTblFechaVenc" name="tblFechaVenc" size="10" disabled
                                               style="text-align:left"/></td>
                                </tr>
                                <tr>
                                    <td><label>Fecha Comercialización :</label></td>
                                    <td><input type="text" id="idTblFechaComer" name="tblFechaComer" size="10" disabled
                                               style="text-align:left"/></td>
                                </tr>
                                <tr>
                                    <td><label>Días transcurridos :</label></td>
                                    <td ><input type="text" id="idTblDiasTransc" name="tblDiasTransc" size="10" disabled
                                                style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Días transcurridos interés :</label></td>
                                    <td><input type="text" id="idTblDiasTransInt" name="tblDiasTranscInteres" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Plazo :</label></td>
                                    <td><input type="text" id="idTblPlazo" name="tblPlazo" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Tasa :</label></td>
                                    <td><input type="text" id="idTblTasa" name="tblTasa" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Interés diario :</label></td>
                                    <td><input type="text" id="idTblInteresDiario" name="tblInteresDiario" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Interés :</label></td>
                                    <td><input type="text" id="idTblInteres" name="tblInteres" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Almacenaje :</label></td>
                                    <td><input type="text" id="idTblAlmacenaje" name="contrato" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Seguro :</label></td>
                                    <td><input type="text" id="idTblSeguro" name="tblSeguro" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>Moratorios :</label></td>
                                    <td><input type="text" id="idTblMoratorios" name="tblMoratorios" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                                <tr>
                                    <td><label>I.V.A. :</label></td>
                                    <td><input type="text" id="idTblIva" name="tblIva" size="10" disabled
                                               style="text-align:center"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Detalle de Contrato
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="3" cols="45" id="idDetalleContratoDes" class="textAreaUP" disabled>
                            </textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col col-md-7 border border-primary border-left-0">
                <table width="100%" border="0">
                    <tr>
                        <td colspan="4">
                            <div>
                                <table class="table table-bordered " width="100%">
                                    <thead>
                                    <th>Contrato</th>
                                    <th>Préstamo</th>
                                    <th>Interés</th>
                                    <th id="idGPSTH">GPS</th>
                                    <th id="idPolizaTH">Poliza</th>
                                    <th id="idPensionTH">Pension</th>
                                    <th>Abono</th>
                                    </thead>
                                    <tr align="center">
                                        <td><label id="idConTDDes"></label></td>
                                        <td><label id="idPresTDDes"></label></td>
                                        <td><label id="idInteresTDDes"></label></td>
                                        <td id="idGPSTDform"><label id="idGPSTDDes"></label></td>
                                        <td id="idPensionTDform"><label id="idPensionTDDes"></label></td>
                                        <td id="idPolizaTDform"><label id="idPolizaTDDes"></label></td>
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
                            >
                        </td>
                        <td align="center">
                            <input type="button" class="btn btn-info" value="Calcular Descuento" id="btnDescuento" disabled onclick="reCalculaDescuento();">&nbsp;
                            <input type="button" class="btn btn-warning" value="Borrar Descuento" id="btnDescuentoDelete"  onclick="borrarDescuento();">&nbsp;
                        </td>
                        <td align="center">
                            <input type="button" class="btn btn-info" value="Caclular Abono" id="btnAbono" disabled onclick="calcularAbono()">&nbsp;
                            <input type="button" class="btn btn-warning" value="Borrar Abono" id="btnAbonoDelete"  onclick="borrarAbono()">&nbsp;
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
                            <h5>Prestamo:</label></h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idPrestamoNota" name="prestamoNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr id="trGPSNota">
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h5>GPS:</label></h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idGPSNota" name="gpsNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr id="trPolizaNota">
                        <td colspan="2">&nbsp;
                        </td>
                        <td align="right">
                            <h5>Poliza:</label></h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idPolizaNota" name="polizaNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr id="trPensionNota">
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h5>Pension:</label></h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idPensionNota" name="pensionNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h5>Interes:</label></h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idInteresNota" name="interesNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h5>SubTotal Prestamo:</label></h5>
                        </td>
                        <td align="right">
                            <h5><input type="text" id="idTotalPrestamoNota" name="totalPrestamoNota"
                                       style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td align="right"  >
                            <h5>Descuento:</h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idImporte" name="importe" onkeypress="return isNumberDecimal(event)"
                                        style="width: 160px; text-align: right" disabled placeholder="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                        <td align="right">
                            <h5>Interes Pendiente:</label></h5>
                        </td>
                        <td align="right">
                            <h5 ><input type="text" id="idInteresPendienteNota" name="interesNota"
                                        style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h5>Total a Pagar :</label></h5>
                        </td>
                        <td align="right" style="width: 180px">
                            <h5><input type="text" id="idTotalFinalNota" name="totalFinalNota"
                                       style="width: 160px; text-align: right" disabled value="$0.00"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h5>Abono :</label></h5>
                        </td>
                        <td align="right" style="width: 180px">
                            <h5>  <input type="text" id="idAbono" name="abono"disabled
                                         style="width: 160px; text-align: right" placeholder="$0.00"
                                         onkeypress="return isNumberDecimal(event)"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h5>Abono a Capital:</label></h5>
                        </td>
                        <td align="right" style="width: 180px">
                            <h5>  <input type="text" id="idAbonoCapitalNota" name="abonoCapitalNota"
                                         style="width: 160px; text-align: right" value="$0.00" disabled
                                         onkeypress="return isNumberDecimal(event)"/></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" ><h5>Saldo Pendiente:</label></h5>
                        </td>
                        <td align="right" style="width: 180px">
                            <h5>  <input type="text" id="idSaldoPendiente" value="$0.00" name="saldoPendiente"
                                         style="width: 160px; text-align: right" disabled
                            </h5>
                        </td>
                    </tr>
                    <tr id="trAlmoneda" style="color:#FF0000">
                        <td colspan="3"><h3>¡Contrato en almoneda!</h3></td>
                    </tr>
                    <tr class="propInvisible">
                        <td><label>prestamo</label>
                            <input type="text" id="idPrestamoAbono"  style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>interes abono</label>
                            <input type="text" id="idInteresAbono" style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>total</label>
                            <input type="text" id="idTotalInput" style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>interes pendiente</label>
                            <input type="text" id="idInteresPendiente" style="width: 100px; text-align: right"/>
                        </td>
                    </tr>
                    <tr class="propInvisible">
                        <td ><label>total final</label>
                            <input type="text" id="idTotalFinalInput"  style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>token</label>
                            <input type="text" id="idToken"  style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>saldo pendiente</label>
                            <input type="text" id="idSaldoPendienteInput" value="0.00" style="width: 100px; text-align: right"/>
                        </td>
                        <td>
                            <label>nueva fecha vencimiento</label>
                            <input type="text" id="idNuevaFechaVenc" value="0" style="width: 100px; text-align: right"/>
                        </td>
                    </tr>
                    <tr class="propInvisible">
                        <td><label>nueva fecha alm</label>
                            <input type="text" id="idNuevaFechaAlm" value="0" style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>Abono Anterior</label>
                            <input type="text" id="idAbonoAnteriorInput" value="0" style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>Abono a Capital</label>
                            <input type="text" id="idAbonoACapitalInput" value="0" style="width: 100px; text-align: right"/>
                        </td>
                        <td><label>Descuento anterior</label>
                            <input type="text" id="idDescuentoAnterior" value="0" style="width: 100px; text-align: right"/>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col col-md-1 ">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-6" >
                <label>contrato de busqueda</label>
                <input type="text" id="idContratoBusqueda" name="contratoBus" class="propInvisible"
                       style="width: 100px;" />
                <label>formulario</label>
                <input type="text" id="idFormulario" class="propInvisible"
                       style="width: 100px;"/>
                <label>tipo contrato</label>
                <input type="text" id="idTipoDeContrato" class="propInvisible"
                       style="width: 100px;" />
            </div>
            <div class="col col-md-5" align="right">
                <input type="button" class="btn btn-primary" value="Refrendo" onclick="generar()">&nbsp;
                <input type="button" class="btn btn-info" value="Reimprimir" onclick="reimprimir()">&nbsp;
                <input type="button" class="btn btn-danger" value="Salir" onclick="location.href='vInicio.php'">&nbsp;
                <input type="button" class="btn btn-warning" value="x" onclick="prueba()">&nbsp;
            </div>
            <div class="col col-md-1" align="right">
            </div>
        </div>
    </div>
</form>

</body>
</html>
