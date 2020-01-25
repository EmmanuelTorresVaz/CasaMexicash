<?php
session_start();
if(!isset($_SESSION["idUsuario"])){
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
            <div class="col-1" >
            </div>
            <div class="col-10 border border-info " align="center">
                <table width="100%">
                    <tr>
                        <td align="center">
                            <h4>Fecha Inicial</h4>
                        </td>
                        <td align="center">
                            <h4>Fecha Final</h4>
                        </td>
                        <td align="center">
                            <input type="button" class="btn btn-info w-100" value="Buscar" onclick="">
                        </td>
                        <td align="center">
                            <h4 align="center">Cajero: <?php echo $_SESSION["usuario"]; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="fechaIni" id="idFechaIni" class="calendarioMod" style="width: 100px"
                                   required disabled/>
                        </td>
                        <td align="center">
                            <input type="text" name="fechaFin" id="idFechaFin" class="calendarioMod" style="width: 100px"
                                   required disabled/>
                        </td>
                        <td align="center">
                        </td>
                        <td align="center">
                        </td>
                    </tr>
                    <tr>
                        <td>Saldo inicial:</td>
                        <td>
                            <input type="text" name="saldoInicial" id="idSaldoInicial" style="width: 120px" />
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Dotaciones a caja:</td>
                        <td>
                            <input type="text" name="saldoInicial" id="idSaldoInicial" style="width: 120px" />
                        </td>
                        <td>*Retiros a caja</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4"> &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">Entradas</td>
                        <td colspan="2">Salidas</td>
                    </tr>
                    <tr>
                        <td>Aportaciones a bóveda:</td>
                        <td>
                            <input type="text" name="aportacionesBov" id="idAportacionesBov" style="width: 120px" />
                        </td>
                        <td>Retiros a bóveda:</td>
                        <td>
                            <input type="text" name="retirosBov" id="idRetirosBov" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td>Capital recuperado:</td>
                        <td>
                            <input type="text" name="capitalRec" id="idCapitalRec" style="width: 120px" />
                        </td>
                        <td>Préstamos nuevos:</td>
                        <td>
                            <input type="text" name="prestamoNuevos" id="idPrestamosNuevos" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td>Abono a capital:</td>
                        <td>
                            <input type="text" name="abonoCap" id="idAbonoCap" style="width: 120px" />
                        </td>
                        <td>Compra divisas:</td>
                        <td>
                            <input type="text" name="compraDivisas" id="idCompraDivisas" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td>Intereses:</td>
                        <td>
                            <input type="text" name="intereses" id="idIntereses" style="width: 120px" />
                        </td>
                        <td>Compra varios:</td>
                        <td>
                            <input type="text" name="compraVarios" id="idCompraVarios" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td>IVA inntereses:</td>
                        <td>
                            <input type="text" name="ivaIntres" id="idIvaInteres" style="width: 120px" />
                        </td>
                        <td>IVA compras:</td>
                        <td>
                            <input type="text" name="ivaCompras" id="idIvaCompras" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td>Ventas:</td>
                        <td>
                            <input type="text" name="ventas" id="idVentas" style="width: 120px" />
                        </td>
                        <td>Devoluciones:</td>
                        <td>
                            <input type="text" name="devoluciones" id="idDevoluciones" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td >I.V.A. Ventas:</td>
                        <td>
                            <input type="text" name="Ivaventas" id="idIvaVentas" style="width: 120px" />
                        </td>
                        <td>Gastos varios:</td>
                        <td>
                            <input type="text" name="gastosVarios" id="idGastosVarios" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td >Abonos a apartados:</td>
                        <td>
                            <input type="text" name="abonosApartados" id="idAbonosApartados" style="width: 120px" />
                        </td>
                        <td>Demasias:</td>
                        <td>
                            <input type="text" name="demasias" id="idDemasias" style="width: 120px" />
                        </td>
                    </tr>
                    <tr>
                        <td >Cuotas:</td>
                        <td>
                            <input type="text" name="cuotas" id="idCuotas" style="width: 120px" />
                        </td>
                        <td>Ajustes:</td>
                        <td>
                            <input type="text" name="ajustes" id="idAjustes" style="width: 120px" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

</body>
</html>
