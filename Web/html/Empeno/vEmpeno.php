<?php
/*if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}*/
$_SESSION['idUsuario'] = 1;
$_SESSION['usuario'] = "admin";
$_SESSION['sucursal'] = 1;
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlClienteDAO.php");
include_once(SQL_PATH . "sqlInteresesDAO.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");
include_once(SQL_PATH . "sqlContratoDAO.php");
include_once(HTML_PATH . "Clientes/modalRegistroCliente.php");
include_once(HTML_PATH . "Clientes/modalHistorial.php");
include_once(HTML_PATH . "Clientes/modalBusquedaCliente.php");
include_once(HTML_PATH . "Clientes/modalEditarCliente.php");
include_once (HTML_PATH. "Empeno/menuEmpeno.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--Generales-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empeño</title>
    <!--Funciones-->
    <script src="../../JavaScript/funcionesArticulos.js"></script>
    <script src="../../JavaScript/funcionesIntereses.js"></script>
    <script src="../../JavaScript/funcionesCliente.js"></script>
    <script src="../../JavaScript/funcionesContrato.js"></script>
    <script src="../../JavaScript/funcionesGenerales.js"></script>
    <!--Calendario-->
    <script src="../../JavaScript/funcionesCalendario.js"></script>
    <link rel="stylesheet"  type="text/css" href="../../librerias/jqueryui/jquery-ui.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="../../librerias/jqueryui/jquery-ui.min.js"></script>

    <!--    Script inicial-->
    <script type="application/javascript">
        $(document).ready(function () {
            // $('.menuContainer').load('menu.php');
            articulosObsoletos();
            $("#divElectronicos").hide();
            $("#divMetales").show();
            $("#idFormEmpeno").trigger("reset");
            $("#divTablaArticulos").load('tablaArticulos.php');
            $("#btnEditar").prop('disabled', true);
            llenarComboInteres(1);
            $("#idAvaluo").blur(function(){
                prestaMax();
            });
            $("#idAvaluoElectronico").blur(function(){
              prestaMaxElectronico();
            });
        })
    </script>
    <style type="text/css">
        #suggestionsNombreEmpeno {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 130px;
            z-index: 9999;
            width: 206px;
        }

        #suggestionsNombreEmpeno .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        .textArea {
            resize: none;
        }

        .headt td {
            height: 35px;
        }

        .inputCliente {
            text-transform: uppercase;
        }


    </style>
</head>
<body>
<form id="idFormEmpeno" name="formEmpeno">
    <div id="contenedor" class="container">
        <div>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col col-lg-4 border border-primary ">
                <table border="0" width="100%" class="tableInteres">
                    <tbody>
                    <tr>
                        <br>
                    </tr>
                    <tr class="headt">
                        <td colspan="3">
                            <input type="button" class="btn btn-success "
                                   data-toggle="modal" data-target="#modalRegistroNuevo"
                                   value="Agregar">
                            <input type="button" class="btn btn-warning "
                                   data-toggle="modal" data-target="#modalEditarNuevo" id="btnEditar"
                                   value="Editar" onclick="modalEditarCliente($('#idClienteEmpeno').val())" disabled>
                            <input type="button" class="btn btn-warning "
                                   data-toggle="modal" data-target="#modalHistorial" id="btnHistorial"
                                   value="Historial" onclick="historial($('#idClienteEmpeno').val())">
                            <input type="button" class="btn btn-success "
                                   data-toggle="modal" data-target="#modalBusquedaCliente"
                                   onclick="mostrarTodos($('#idNombres').val())"
                                   value="Ver todos">
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="12">
                            <label for="nombreCliente">Nombre:</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <div>
                                <input id="idNombres" name="Nombres" type="text" style="width: 300px"
                                       class="inputCliente"
                                       onkeypress="nombreAutocompletar()" placeholder="Buscar Cliente..."/>
                            </div>
                            <div id="suggestionsNombreEmpeno"></div>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="12">
                            <label for="celular">Celular:</label>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="12">
                            <input type="text" name="celularEmpeno" placeholder="" id="idCelularEmpeno"
                                   style="width: 120px"
                                   required disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <label for="direccion">Dirección:</label>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="12" rowspan="2" name="direccionEmpeno">
                                    <textarea rows="4" cols="35" id="idDireccionEmpeno" class="textArea" disabled>
                                    </textarea>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td>

                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="12">
                            <label for="cotitular">Nombre Cotitular:</label>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="12">
                            <input type="text" id="nombreCotitular" name="idNombreCotitular"
                                   style="width: 300px" required/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <label for="benediciario">Nombre Beneficiario:</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="text" id="idNombreBen" name="idNombreBen"
                                   style="width:300px" required/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col col-lg-4 border border-primary border-left-0">
                <table border="0" width="100%" class="tableInteres">
                    <tbody>
                    <tr>
                        <br>
                    </tr>
                    <tr class="headt">
                        <td colspan="6" class="border border-dark border-right-0">
                            <label for="contrato">Contrato:</label>
                            <?php
                            $contrato = array();
                            $sql = new sqlContratoDAO();
                            $contrato = $sql->buscarContratoTemp();
                            $contrato = $contrato + 1;
                            echo "<label id='idContratoTemp'>$contrato</label>";
                            ?>
                        </td>
                        <td colspan="6" class="border border-dark border-left-0" align="left">
                            <label for="vence">Vence:</label>
                            <label id="idFecVencimiento"></label>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="6" class="border border-dark">Tasa Interés:</td>
                        <td colspan="6" class="border border-dark" id="idComboInteresTD">
                            <select id="tipoInteresEmpeno" name="cmbTipoInteres" class="selectpicker"   style="width:150px"
                                    onchange="SeleccionarInteres($('#tipoInteresEmpeno').val())">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="table-info border border-dark" align="center">Tipo Interés</td>
                        <td colspan="4" class="table-info border border-dark" align="center">Periodo</td>
                        <td colspan="4" class="table-info border border-dark" align="center">Plazo</td>
                    </tr>
                    <tr class="headt">
                        <td colspan="4" class="border border-dark " align="center">
                            <label id="idTipoInteres"></label>
                            <br>
                        </td>
                        <td colspan="4" class="border border-dark" align="center">
                            <label id="idPeriodo"></label>
                        </td>
                        <td colspan="4" class="border border-dark" align="center">
                            <label id="idPlazo"></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="table-info border border-dark " align="center">% Tasa</td>
                        <td colspan="3" class="table-info border border-dark" align="center">% Alm.</td>
                        <td colspan="3" class="table-info border border-dark" align="center">% Seguro</td>
                        <td colspan="3" class="table-info border border-dark" align="center">% I.V.A.</td>
                    </tr>
                    <tr class="headt">
                        <td colspan="3" class="border border-dark" align="center">
                            <label id="idTasaPorcen"></label>
                        </td>
                        <td colspan="3" class="border border-dark" align="center">
                            <label id="idAlmPorcen"></label>
                        </td>
                        <td colspan="3" class="border border-dark" align="center">
                            <label id="idSeguroPorcen"></label>
                        </td>
                        <td colspan="3" class="border border-dark" align="center">
                            <label id="idIvaPorcen"></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="table-info border border-dark" align="center">Total Avalúo</td>
                        <td colspan="6" class="table-info border border-dark" align="center">Total Préstamo</td>
                    </tr>
                    <tr class="headt">
                        <td colspan="6" class="border border-dark" align="right">
                            <input id="idTotalAvaluo" name="totalAvaluo" disabled type="text" style="width: 150px; text-align: right"  value="0.00"
                                   class="inputCliente"/>
                        </td>
                        <td colspan="6" class="border border-dark" align="right">
                            <input id="idTotalPrestamo" name="totalPrestamo" disabled type="text" style="width: 150px; text-align: right"  value="0.00"
                                   class="inputCliente"/>
                            <input id="idTotalInteres" name="totalInteres" disabled type="text" style="width: 150px; text-align: right"/>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="6" class="table-info border border-dark">Tipo Promoción:</td>
                        <td colspan="6" class="border border-dark">
                            <select id="idTipoPromocion" name="cmbTipoPromocion" class="selectpicker"  style="width:155px">
                                <option value="0">Seleccione:</option>
                                <?php
                                $data = array();
                                $sql = new sqlInteresesDAO();
                                $data = $sql->llenarCmbTipoPromo();
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<option value=" . $data[$i]['id_TipoPromocion'] . ">" . $data[$i]['descripcion'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="6" class="table-info border border-dark">Tipo Agrupamiento:</td>
                        <td colspan="6" class="border border-dark" align="center">
                            <label id="idAgrupamiento"></label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col col-lg-4 border border-primary border-left-0">
                <table width="100%">
                    <tr>
                        <br>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="button" class="btn btn-primary" value="Metales"
                                   onclick="Metales();">
                        </td>
                        <td align="center">
                            <input type="button" class="btn btn-primary" value="Electronicos/Varios"
                                   onclick="Electronicos();">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="divMetales">
                                <table>
                                    <tbody class="text-body" align="left">
                                    <tr>
                                        <td colspan="6">Tipo:</td>
                                        <td colspan="6">
                                            <select id="idTipoMetal" name="cmbTipoMetal" class="selectpicker"
                                                    onchange="selectMetalCmb($('#idTipoMetal').val())" style="width: 150px">
                                                <option value="0">Seleccione:</option>
                                                <?php
                                                $data = array();
                                                $sql = new sqlArticulosDAO();
                                                $data = $sql->llenarCmbTipoPrenda();
                                                for ($i = 0; $i < count($data); $i++) {
                                                    echo "<option value=" . $data[$i]['id_tipo'] . ">" . $data[$i]['descripcion'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Prenda:</td>
                                        <td colspan="6">
                                            <select id="idPrenda" name="cmbPrenda" class="selectpicker" style="width: 150px">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Kilataje:</td>
                                        <td colspan="6">
                                            <select id="idKilataje" name="cmbKilataje" class="selectpicker" style="width: 100px">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Calidad:</td>
                                        <td colspan="6">
                                            <select id="idCalidad" name="cmbCalidad" class="selectpicker" style="width: 100px">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Cantidad:</td>
                                        <td colspan="6">
                                            <input type="text" id="idCantidad" name="cantidad" size="6"    onkeypress="return soloNumeros(event)"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Peso:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPeso" name="peso" size="6"    onkeypress="return isNumberDecimal(event)"
                                                   style="text-align:center"/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Peso Piedra:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPesoPiedra" name="pesoPiedra" size="6"    onkeypress="return isNumberDecimal(event)"
                                                   style="text-align:center"/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Piedras:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPiedras" name="piedras" size="6"    onkeypress="return soloNumeros(event)"
                                                   style="text-align:center"/>
                                            <label>pza</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Avalúo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idAvaluo" name="avaluo" size="6"    onkeypress="return isNumberDecimal(event)"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Préstamo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamo" name="prestamo" size="6"   onkeypress="return isNumberDecimal(event)";
                                                   style="text-align:center" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Préstamo Maximo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamoMax" name="prestamoMax" size="6" disabled value="0.00"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Ubicación:</td>
                                        <td colspan="6">
                                            <input type="text" id="idUbicacion" name="ubicacion" size="15"
                                                   style="text-align:left"/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" align="left">Detalle de la
                                            prenda:
                                        </td>
                                    <tr>
                                        <td colspan="12" name="detallePrenda">
                                    <textarea rows="2" cols="30" id="idDetallePrenda" class="textArea" style="text-align:left">
                                    </textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="divElectronicos">
                                <table>
                                    <tbody class="text-body border" align="left">
                                    <tr>
                                        <td colspan="6">Tipo:</td>
                                        <td colspan="6">
                                            <select id="idTipoElectronico" name="cmbTipoElectronico"
                                                    class="selectpicker"
                                                    onchange="selectArticuloCmb($('#idTipoElectronico').val())" style="width: 150px">
                                                <option value="0">Seleccione:</option>
                                                <?php
                                                $data = array();
                                                $sql = new sqlArticulosDAO();
                                                $data = $sql->llenarCmbTipoArticulo();
                                                for ($i = 0; $i < count($data); $i++) {
                                                    echo "<option value=" . $data[$i]['id_tipo'] . ">" . $data[$i]['descripcion'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Marca:</td>
                                        <td colspan="6">
                                            <input type="text" id="idMarca" name="marca" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Estado:</td>
                                        <td colspan="6">
                                            <select id="idEstadoArt" name="cmbEstado" class="selectpicker" style="width: 150px">
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Modelo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idModelo" name="modelo" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Tamaño:</td>
                                        <td colspan="6">
                                            <input type="text" id="idTamaño" name="tamaño" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Color:</td>
                                        <td colspan="6">
                                            <select id="idColor" name="cmbColor" class="selectpicker" style="width: 150px">
                                                    <option value="0">Seleccione:</option>
                                                    <?php
                                                    $data = array();
                                                    $sql = new sqlArticulosDAO();
                                                    $data = $sql->llenarCmbColores();
                                                    for ($i = 0; $i < count($data); $i++) {
                                                        echo "<option value=" . $data[$i]['id_Color'] . ">" . $data[$i]['descripcion'] . "</option>";
                                                    }
                                                    ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">No.Serie:</td>
                                        <td colspan="6">
                                            <input type="text" id="idSerie" name="serie" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Avalúo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idAvaluoElectronico" name="avaluoE" size="6"    onkeypress="return soloNumeros(event)"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Préstamo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamoElectronico" name="prestamoE" size="6"    onkeypress="return soloNumeros(event)"
                                                   style="text-align:center"/ >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Prestamo Máximo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamoMaxElectronico" name="prestamoMaximoE"   disabled value="0.00"
                                                   size="6"
                                                   style="text-align:center" value=""/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Ubicación:</td>
                                        <td colspan="6">
                                            <input type="text" id="idUbicacionElectronico" name="ubicacionE" size="15"
                                                   style="text-align:left" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" align="left">Detalle de la
                                            prenda:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" name="detallePrendaE">
                                    <textarea rows="2" cols="30" id="idDetallePrendaElectronico" class="textArea" style="text-align:left">
                                    </textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            <input type="button" class="btn btn-warning" value="Limpiar" onclick="Limpiar()">
                        </td>
                        <td>
                            <input type="button" class="btn btn-success" value="Agregar a la lista" onclick="Agregar()">
                        </td>
                        <td>
                            <input type="text" id="idClienteEmpeno" name="clienteEmpeno" size="20"  class="invisible"
                            />
                        </td>
                        <td>
                            <input type="text" id="idLlenarComboInteres" name="llenarComboInteres" size="20"
                                   class="invisible" value="1"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12">
                <br>
            </div>
        </div>
        <div class="row">
            <div id="divTablaArticulos" class="col col-lg-12">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-7">
                <br>
            </div>
            <div class="col col-lg-5">
                <input type="button" class="btn btn-success" value="pruebaCalc" onclick="prestaMax();">
                <input type="button" class="btn btn-warning" value="Cancelar" onclick="cancelar()">&nbsp;
                <input type="button" class="btn btn-info" value="Reimprimir" onclick="reimprimir()">&nbsp;
                <input type="button" class="btn btn-primary" value="Generar" onclick="generarContrato()">&nbsp;
                <input type="button" class="btn btn-danger" value="Salir" onclick="location.href='vInicio.php'">&nbsp;
            </div>
        </div>
    </div>
    </div>
    </div>
</form>

</body>
</html>
