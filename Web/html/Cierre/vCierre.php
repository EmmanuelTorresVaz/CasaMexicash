<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header("Location: ../index.php");
    session_destroy();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(HTML_PATH . "Cierre/menuCierre.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="//resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../JavaScript/funcionesCalendario.js"></script>

</head>
<body>
<form id="idFormEmpeno" name="formEmpeno">
    <div class="container-fluid" style="position: absolute; top: 8.2vh; height: 91.8vh">
        <div>
            <br>
            <h1 align="center">Cierre de sucursal</h1>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10 border border-info " align="center">
                <table width="65%" border="0">
                    <tr>
                        <td align="center">
                            <h4>Fecha Inicial</h4>
                        </td>
                        <td align="center">
                            <h4>Fecha Final</h4>
                        </td>
                        <td align="center">
                            <input type="button" class="btn btn-info w-50" value="Buscar" onclick=""/>
                        </td>
                        <td align="center">
                            <h4 align="center">Cajero: <?php echo $_SESSION["usuario"]; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="fechaIni" id="idFechaIni" class="calendarioMod"
                                   style="width: 100px"
                                   required disabled/>
                        </td>
                        <td align="center">
                            <input type="text" name="fechaFin" id="idFechaFin" class="calendarioMod"
                                   style="width: 100px"
                                   required disabled/>
                        </td>
                        <td align="center">
                        </td>
                        <td align="center">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#669999" style="color:white">Saldo inicial:</td>
                        <td>
                            <input type="text" name="saldoInicial" id="idSaldoInicial" style="width: 120px"/>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td bgcolor="#669999" style="color:white">Dotaciones a caja:</td>
                        <td>
                            <input type="text" name="saldoInicial" id="idSaldoInicial" style="width: 120px"/>
                        </td>
                        <td bgcolor="#669999" style="color:white">*Retiros a caja</td>
                        <td><input type="text" name="retiroCaja" id="idRetiroCaja" style="width: 120px"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"> &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" bgcolor="#009900" style="color:white" align="center">Entradas</td>
                        <td colspan="2" bgcolor="#cc0000" style="color:white" align="center">Salidas</td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Aportaciones a bóveda:</td>
                        <td align="right">
                            <input type="text" name="aportacionesBov" id="idAportacionesBov"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Retiros a bóveda:</td>
                        <td align="right">
                            <input type="text" name="retirosBov" id="idRetirosBov"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Capital recuperado:</td>
                        <td align="right">
                            <input type="text" name="capitalRec" id="idCapitalRec"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Préstamos nuevos:</td>
                        <td align="right">
                            <input type="text" name="prestamoNuevos" id="idPrestamosNuevos"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Abono a capital:</td>
                        <td align="right">
                            <input type="text" name="abonoCap" id="idAbonoCap" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Compra divisas:</td>
                        <td align="right">
                            <input type="text" name="compraDivisas" id="idCompraDivisas"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Intereses:</td>
                        <td align="right">
                            <input type="text" name="intereses" id="idIntereses" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Compra varios:</td>
                        <td align="right">
                            <input type="text" name="compraVarios" id="idCompraVarios"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">IVA inntereses:</td>
                        <td align="right">
                            <input type="text" name="ivaIntres" id="idIvaInteres"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">IVA compras:</td>
                        <td align="right">
                            <input type="text" name="ivaCompras" id="idIvaCompras"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Ventas:</td>
                        <td align="right">
                            <input type="text" name="ventas" id="idVentas" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Devoluciones:</td>
                        <td align="right">
                            <input type="text" name="devoluciones" id="idDevoluciones"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">I.V.A. Ventas:</td>
                        <td align="right">
                            <input type="text" name="Ivaventas" id="idIvaVentas" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Gastos varios:</td>
                        <td align="right">
                            <input type="text" name="gastosVarios" id="idGastosVarios"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Abonos a apartados:</td>
                        <td align="right">
                            <input type="text" name="abonosApartados" id="idAbonosApartados"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Demasias:</td>
                        <td align="right">
                            <input type="text" name="demasias" id="idDemasias" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Cuotas:</td>
                        <td align="right">
                            <input type="text" name="cuotas" id="idCuotas" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">Ajustes:</td>
                        <td align="right">
                            <input type="text" name="ajustes" id="idAjustes" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Refrendos foraneaos:</td>
                        <td align="right">
                            <input type="text" name="refrendos" id="idRefrendos" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">*Redencion Puntos:</td>
                        <td align="right">
                            <input type="text" name="redencion" id="idRedencion" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Renta GPS y Seguro Foraneo:</td>
                        <td align="right">
                            <input type="text" name="rentaGPSySeg" id="idRentaGPSySeg"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">*Desc. Aplicados:</td>
                        <td align="right">
                            <input type="text" name="descAplicados" id="idDescAplicados"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Otros Cobros:</td>
                        <td align="right">
                            <input type="text" name="otrosCobros" id="idOtrosCobro"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">*Desc. Aplicados ventas:</td>
                        <td align="right">
                            <input type="text" name="descAplicadosVenta" id="idDescAplicadosVenta"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Otros Cobros:</td>
                        <td align="right">
                            <input type="text" name="otrosCobros" id="idOtrosCobro"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">*Desc. Aplicados ventas:</td>
                        <td align="right">
                            <input type="text" name="descAplicadosVenta" id="idDescAplicadosVenta"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Renta GPS:</td>
                        <td align="right">
                            <input type="text" name="rentaGPS" id="idRentaGPS" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#cc0000" style="color:white">TOTAL SALIDAS:</td>
                        <td align="right">
                            <input type="text" name="totalSalidas" id="idTotalSalidas"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Renta Poliza Seguro:</td>
                        <td align="right">
                            <input type="text" name="rentaPoliza" id="idRentaPoliza"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                        <td bgcolor="#cc9900" style="color:white">SALDO FINAL:</td>
                        <td align="right">
                            <input type="text" name="saldoFinal" id="idSaldoFinal"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">I.V.A. Renta GPS y seguro:</td>
                        <td align="right">
                            <input type="text" name="ivaGPS" id="idIvaGPS" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#996633" style="color:white" colspan="2" align="center">Depositaría:</td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white">Ajustes:</td>
                        <td align="right">
                            <input type="text" name="ajustes" id="idAjustes" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                        <td bgcolor="#996633" style="color:white">Saldo Inicial:</td>
                        <td align="right">
                            <input type="text" name="saldoInicialDep" id="idSaldoInicial"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white"></td>
                        <td>
                        </td>
                        <td bgcolor="#996633" style="color:white">Entradas:</td>
                        <td align="right">
                            <input type="text" name="entradas" id="idEntradas" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#009900" style="color:white"> TOTAL ENTRADAS:</td>
                        <td align="right">
                            <input type="text" name="totalEntradas" id="idTotalEntradas"
                                   style="width: 120px; text-align: right" value="0.00">

                        <td bgcolor="#996633" style="color:white">Salidas:</td>
                        <td align="right">
                            <input type="text" name="salidas" id="idSalidas" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#996600" style="color:white"> Transferencias:</td>
                        <td align="right">
                            <input type="text" name="transferencias" id="idTransferencias"
                                   style="width: 120px; text-align: right" value="0.00">

                        <td bgcolor="#996633" style="color:white">Saldo Final:</td>
                        <td align="right">
                            <input type="text" name="saldoFinal" id="idSaldoFinal"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#996600" style="color:white"> Cobro con Tarjetas:</td>
                        <td align="right">
                            <input type="text" name="cobroTarjetas" id="idCobroTarjetas"
                                   style="width: 120px; text-align: right" value="0.00">

                        <td bgcolor="#996633" style="color:white">Depositaria Vencida:</td>
                        <td align="right">
                            <input type="text" name="depositariaVenc" id="idDepositariaVenc"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#996600" style="color:white">Comisión retiro en efectivo:</td>
                        <td align="right">
                            <input type="text" name="comisionRetiroEfect" id="idComisionRetiroEfect"
                                   style="width: 120px; text-align: right" value="0.00">

                        <td bgcolor="#996633" style="color:white">Depositaria Vig/Ven:</td>
                        <td align="right">
                            <input type="text" name="depositariaVenVig" id="idDepositariaVenVig"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td bgcolor="#996633" style="color:white">*Refrendos Ext:</td>
                        <td align="right">
                            <input type="text" name="refrendosExt" id="idRefrendosExt"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td bgcolor="#996633" style="color:white">*Desempeños Ext:</td>
                        <td align="right">
                            <input type="text" name="desempenoExt" id="idDesempenoExt"
                                   style="width: 120px; text-align: right" value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td bgcolor="#996633" style="color:white">*Pases Almoneda:</td>
                        <td align="right">
                            <input type="text" name="pasesAlmo" id="idPasesAlmo" style="width: 120px; text-align: right"
                                   value="0.00">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right">
                            <input type="button" class="btn btn-info w-50" value="Aceptar" onclick="">
                        </td>
                        <td align="right">
                            <input type="button" class="btn btn-danger w-50" value="Salir" onclick="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><br></td>
                    </tr>

                </table>
            </div>
        </div>
        <div>
            <br>
            <br>
        </div>
    </div>
</form>

</body>
</html>
