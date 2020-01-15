<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlClienteDAO.php");
include_once(SQL_PATH . "sqlInteresesDAO.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");
include_once(HTML_PATH . "Clientes/modalRegistroCliente.php");


$sql = new sqlClienteDAO();
$arr = array();
$arr = $sql->traerTodos();
$nombres = array();
for ($i = 0; $i < count($arr); $i++) {
    $name = utf8_encode($arr[$i]['nombre'] . " " . $arr[$i]['apellidoPat'] . " " . $arr[$i]['apellidoMat']);
    array_push($nombres, $name);
}
$x = json_encode($nombres);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Empe&ntilde;o</title>
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css"/>
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css"/>

    <script src="../../librerias/jquery/jquery-3.4.1.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrap.js"></script>
    <script src="../../librerias/alertifyjs/alertify.js"></script>
    <script src="../../JavaScript/funcionesArticulos.js"></script>
    <script src="../../JavaScript/funcionesIntereses.js"></script>
    <script src="../../JavaScript/funcionesCliente.js"></script>
    <script src="../../JavaScript/funcionesContrato.js"></script>
    <script src="../../JavaScript/funcionesGenerales.js"></script>

    <!--    Script inicial-->
    <script type="application/javascript">
        $(document).ready(function () {
            $('.menuContainer').load('menu.php');
            $("#divElectronicos").hide();
            $("#divMetales").show();
            $("#idFormEmpeno").trigger("reset");
            $("#divTablaArticulos").load('tablaArticulos.php');
            $('.inputNumeric').numeric();
            $("#tipoInteres").change(function () {
                SeleccionarInteres($("#tipoInteres").val());
            });
        });
    </script>


    <style type="text/css">
        #suggestionsNombreEmpeno {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
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

    </style>
</head>
<body>
<div class="menuContainer"></div>
<div class="container-fluid" id="tablaExtras"
     style="position: absolute; display: none; top: 10%; left: 0%; padding-left: 4vw; height: 70vh; border: 1px solid black; background-color: white; z-index: 3"></div>
<form name="formEmpeno" id="idFormEmpeno" class="form-control input-sm">
    <br>
    <div id="contenedor" class="container">
        <div class="row">
            <div class="col col-lg-12">
                <table border="0" width="90%" style="margin: 0 auto;">
                    <tbody>
                    <tr>
                        <br>
                    </tr>
                    <tr>
                        <br>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="button" class="btn btn-success "
                                   data-toggle="modal" data-target="#modalRegistroNuevo"
                                   value="Agregar Cliente">
                            &nbsp;
                            <input type="button" class="btn btn-success " onclick="mostrarTodos()"
                                   value="Ver todos">
                            &nbsp;
                            <input type="button" class="btn btn-success" value="Historial" onclick="historial();">

                            <input type="button" class="btn btn-success" value="prueba" onclick="prueba();">                        </td>
                        <td colspan="12">
                            <input type="text" id="idClienteEmpeno" name="clienteEmpeno" size="20"
                                   style="text-align:center" class="invisible" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <label for="nombreCliente">Nombre:</label>
                        </td>

                        <td colspan="6" class="border border-dark">
                            <label for="contrato">Contrato:</label>
                        </td>
                        <td colspan="6" class="border border-dark">
                            <label for="vence">Vence:</label>
                            <input id="idFecVencimiento" name="fecVencimiento" type="text" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <div>
                                <input id="idNombres" name="Nombres" type="text" style="width: 400px"
                                       onkeypress="nombreAutocompletar()" placeholder="Buscar Cliente..."/>
                            </div>
                            <div id="suggestionsNombreEmpeno" ></div>
                        </td>
                        <td colspan="6" class="border border-dark">Tasa Interés</td>
                        <td colspan="6" class="border border-dark">
                            <select id="tipoInteres" name="cmbTipoInteres" class="selectpicker">
                                <option value="0">Seleccione:</option>
                                <?php

                                $data = array();
                                $sql = new sqlInteresesDAO();
                                $data = $sql->llenarCmbTipoInteres();
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<option value=" . $data[$i]['id_interes'] . ">" . $data[$i]['tasa_interes'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <label for="direccion">Dirección:</label>
                        </td>
                        <td colspan="4" class="table-info border border-dark">Tipo Interés</td>
                        <td colspan="4" class="table-info border border-dark">Periodo</td>
                        <td colspan="4" class="table-info border border-dark">Plazo</td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="text" name="direccion" placeholder="" id="idDireccionEmpeno"
                                   style="width: 400px"
                                   required disabled/>
                        </td>
                        <td colspan="4" class="border border-dark ">
                            <input type="text" id="idTipoInteres" name="tipoInteres" size="20" style="text-align:center"
                                   disabled/>
                        </td>
                        <td colspan="4" class="border border-dark">
                            <input type="text" id="idPeriodo" name="periodo" size="20" style="text-align:center"
                                   disabled/>
                        </td>
                        <td colspan="4" class="border border-dark">
                            <input type="text" id="idPlazo" name="plazo" size="6" style="text-align:center" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label for="ciudad">Ciudad:</label>
                        </td>
                        <td colspan="9">
                            <label for="celular">Celular:</label>
                        </td>
                        <td colspan="3" class="table-info border border-dark ">% Tasa</td>
                        <td colspan="3" class="table-info border border-dark">% Alm.</td>
                        <td colspan="3" class="table-info border border-dark">% Seguro</td>
                        <td colspan="3" class="table-info border border-dark">% I.V.A.</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="text" name="ciudadEmpeno" placeholder="" id="idEstadoEmpeno" required
                                   disabled/>
                        </td>
                        <td colspan="9">
                            <input type="text" name="celularEmpeno" placeholder="" id="idCelularEmpeno"
                                   style="width: 100px"
                                   required disabled/>
                        </td>
                        <td colspan="3" class="border border-dark">
                            <input type="text" id="idTasaPorcen" name="tasaPorcen" size="6" style="text-align:center"
                                   disabled/>

                        </td>
                        <td colspan="3" class="border border-dark">
                            <input type="text" id="idAlmPorcen" name="almPorcen" size="6" style="text-align:center"
                                   disabled/>

                        </td>
                        <td colspan="3" class="border border-dark">
                            <input type="text" id="idSeguroPorcen" name="seguroPorcen" size="6"
                                   style="text-align:center"
                                   disabled/>

                        </td>
                        <td colspan="3" class="border border-dark">
                            <input type="text" id="idIvaPorcen" name="ivaPorcen" size="6" style="text-align:center"
                                   disabled/>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <label for="cotitular">Nombre Cotitular:</label>
                        </td>
                        <td colspan="6" class="table-info border border-dark">Total Avalúo</td>
                        <td colspan="6" class="table-info border border-dark">Total Préstamo</td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="text" id="nombreCotitular" name="idNombreCotitular"
                                   style="width: 400px"
                                   required/>
                        </td>
                        <td colspan="6" class="border border-dark">
                            <input type="text" id="idTotalAvaluo" name="totalAvaluo" size="9" value="0.00"
                                   style="text-align:center" disabled/>
                        </td>
                        <td colspan="6" class="border border-dark">
                            <input type="text" id="idTotalPrestamo" name="totalPrestamo" size="9" value="0.00"
                                   style="text-align:center" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <label for="benediciario">Nombre Beneficiario:</label>
                        </td>
                        <td colspan="6" class="table-info border border-dark">Tipo Promoción:</td>
                        <td colspan="6" class="border border-dark">
                            <input type="text" id="idTipoPromocion" name="tipoPromocion" size="14"
                                   style="text-align:center" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="text" id="idNombreBen" name="idNombreBen"
                                   style="width:400px" required/>
                        </td>
                        <td colspan="6" class="table-info border border-dark">Tipo Agrupamiento:</td>
                        <td colspan="6" class="border border-dark">
                            <input type="text" id="idAgrupamiento" name="agrupamiento" size="14"
                                   style="text-align:center" disabled/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12" >
                <table border="0" width="90%" style="margin: 0 auto;">
                    <tr>
                        <td colspan="3">
                            <br>
                        </td>
                    </tr>
                    <tr >
                        <td class="border border-primary" align="center">
                            <input type="button" class="btn btn-primary" value="Metales"
                                   onclick="Limpiar(), Metales();">
                        </td>
                        <td class="border border-primary" align="center">
                            <input type="button" class="btn btn-primary" value=" Electronicos/Varios"
                                   onclick="Limpiar(), Electronicos();">
                        </td>
                        <td align="right" rowspan="2"  valign="top">
                            <div id="divTablaArticulos" class="col col-lg-12 "></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <div id="divMetales">
                                <table >
                                    <tbody class="text-body" align="left">
                                    <tr>
                                        <td colspan="6">Tipo:</td>
                                        <td colspan="6">
                                            <select id="idTipoMetal" name="cmbTipoMetal"
                                                    class="classArticulos selectpicker">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Prenda:</td>
                                        <td colspan="6">
                                            <select id="idPrenda" name="cmbPrenda" class="selectpicker">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Kilataje:</td>
                                        <td colspan="6">
                                            <select id="idKilataje" name="cmbKilataje" class="selectpicker">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Calidad:</td>
                                        <td colspan="6">
                                            <select id="idCalidad" name="cmbCalidad" class="selectpicker">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Cantidad:</td>
                                        <td colspan="6">
                                            <input type="text" id="idCantidad" name="cantidad" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Peso:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPeso" name="peso" size="6"
                                                   style="text-align:center"/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Peso Piedra:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPesoPiedra" name="pesoPiedra" size="6"
                                                   style="text-align:center"/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Piedras:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPiedras" name="piedras" size="6"
                                                   style="text-align:center"/>
                                            <label>pza</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Préstamo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamo" name="prestamo" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Avalúo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idAvaluo" name="avaluo" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Préstamo Maximo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamoMax" name="prestamoMax" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Ubicación:</td>
                                        <td colspan="6">
                                            <input type="text" id="idUbicacion" name="ubicacion" size="6"
                                                   style="text-align:center"/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" align="left">Detalle de la
                                            prenda:
                                        </td>
                                    <tr>
                                        <td colspan="12" name="detallePrenda">
                                    <textarea rows="4" cols="35" id="idDetallePrenda">
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
                                                    class="selectpicker" required>
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
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
                                            <select id="idEstado" name="cmbEstado" class="selectpicker">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
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
                                            <select id="idColor" name="cmbColor" class="selectpicker">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
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
                                        <td colspan="6">Préstamo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamoElectronico" name="prestamoE" size="6"
                                                   style="text-align:center"/ value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Avalúo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idAvaluoElectronico" name="avaluoE" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Prestamo Máximo:</td>
                                        <td colspan="6">
                                            <input type="text" id="idPrestamoMaxElectronico" name="prestamoMaximoE"
                                                   size="6"
                                                   style="text-align:center" value=""/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">Ubicación:</td>
                                        <td colspan="6">
                                            <input type="text" id="idUbicacionElectronico" name="ubicacionE" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" align="left">Detalle de la
                                            prenda:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" name="detallePrendaE">
                                    <textarea rows="4" cols="35" id="idDetallePrendaElectronico">
                                    </textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr  align="center">
                        <td >
                            <input type="button" class="btn btn-warning" value="Limpiar" onclick="Limpiar()">
                        </td>
                        <td>
                            <input type="button" class="btn btn-success" value="Agregar a la lista" onclick="Agregar()">
                        </td>
                        <td align="right">
                            <input type="button" class="btn btn-primary" value="Generar" onclick="generarContrato()">&nbsp;
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <br>
        </div>
    </div>
</form>
</body>
</html>
