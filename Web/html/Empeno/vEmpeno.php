<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlClienteDAO.php");
include_once(SQL_PATH . "sqlInteresesDAO.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");

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
    <script type="text/javascript" src="../../js/jquery-1.12.1.min.js"></script>
    <link rel="stylesheet" href="../../style/jquery-ui.css"/>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../alertifyjs/css/alertify.css"/>
    <link rel="stylesheet" type="text/css" href="../../alertifyjs/css/themes/default.css"/>

    <script src="../../alertifyjs/alertify.js"></script>
    <script src="../../JavaScript/funciones.js"></script>

    <!--    Script inicial-->
    <script type="application/javascript">
        $(document).ready(function () {
            $("#divElectronicos").hide();
            $("#divMetales").show();
            $("#idFormEmpeno").trigger("reset");
            $("#divTablaArticulos").load('tablaArticulos.php');
        });
    </script>
    <!--    Script Consultar Cliente-->
    <script>
        $(function () {
            $("#datepicker").datepicker();

            var nombres = <?= json_encode($nombres) ?>;

            console.log(nombres);

            $('#Nombres').autocomplete({
                source: nombres,
                select: function (event, item) {
                    var params = {
                        cliente: item.item.value
                    };

                    $.get("../../../com.Mexicash/Controlador/cConsultaTiempoReal.php", params, function (response) {
                        var json = JSON.parse(response);

                        var direccion = json[0]['calle'] + " " + json[0]['numExt'] + " numInt: " + json[0]['numInt'] + " " + json[0]['colonia'] + " " + json[0]['municipio'] + " " + json[0]['codigoPostal'];
                        var celular = json[0]['celular'];
                        var estado = json[0]['estado'];

                        document.getElementById("inDireccion").value = direccion;
                        document.getElementById("inCiudad").value = estado;
                        document.getElementById("inCelular").value = celular;

                        console.log(direccion + "    " + celular + "    " + estado);
                    })
                }
            });
        });

        function onk() {

            var texto = document.getElementById('inNombre').value;

            var parametros = {
                "texto": texto
            };

            $.ajax({
                data: parametros,
                url: "../../js/ajax/busqueda.php",
                type: "POST",
                success: function (response) {
                    $('.datosTiempoReal').html(response);
                }
            });

            <?php

            $sql = new sqlClienteDAO();
            $sq = new sqlClienteDAO();
            $nombre = "Alejandro";

            $arr = array();

            $arr = $sql->consultaClienteEmpeño($nombre, 1);

            $direccion = $arr[0]['calle'] . " " . $arr[0]['numExt'] . " Num interior " . $arr[0]['numInt'] . " " . $arr[0]['colonia'] . " " . $arr[0]['municipio'] . " " . $arr[0]['codigoPostal'];
            $ciudad = $arr[0]['estado'];
            $celular = $arr[0]['celular'];

            $id = $sq->buscarIdCliente(42322, "prueba@gmail.com");

            ?>

            document.getElementById('inCelular').value = "<?php echo $celular; ?>"
            document.getElementById('inDireccion').value = "<?php echo $direccion; ?>"
            document.getElementById('inCiudad').value = "<?php echo $ciudad; ?>"

            alert("<?php echo $id; ?>");

        }
    </script>
    <!--    Script intereses-->
    <script>
        function SeleccionarInteres(tipoInteresValue) {
            if (tipoInteresValue != "null" || tipoInteresValue != 0) {
                var dataEnviar = {
                    "tipoInteresValue": tipoInteresValue
                };
                $.ajax({
                    data: dataEnviar,
                    url: '../../../com.Mexicash/Controlador/Intereses.php',
                    type: 'post',
                    dataType: "json",
                    beforeSend: function () {
                        $("#pperiodo").html("Procesando");
                    },
                    success: function (response) {
                        if (response.status == 'ok') {
//para asignar a input
                            $("#idTipoInteres").val(response.result.tipoInteres);
                            $("#idPeriodo").val(response.result.periodo);
                            $("#idPlazo").val(response.result.plazo);
                            $('#idTasaPorcen').val(response.result.tasa);
                            $('#idAlmPorcen').val(response.result.alm);
                            $('#idSeguroPorcen').val(response.result.seguro);
                            $('#idIvaPorcen').val(response.result.iva + " %");
                            $('#idTipoPromocion').val(response.result.tipo_Promocion);
                            $('#idAgrupamiento').val(response.result.tipo_Agrupamiento);
                        }
                    },
                })
            }
        }
    </script>
    <!--    Script articulos-->
    <script language="JavaScript" type="text/JavaScript">

        function Limpiar() {
            <!--   Limpiar Metales-->
            $("#idTipoMetal").val(0);
            $("#idPrenda").val(0);
            $("#idKilataje").val(0);
            $("#idCalidad").val(0);
            $("#idCantidad").val("");
            $("#idPeso").val("");
            $("#idPesoPiedra").val("");
            $("#idPiedras").val("");
            $("#idPrestamo").val("");
            $("#idAvaluo").val("");
            $("#idPrestamoMax").val("");
            $("#idUbicacion").val("");
            $("#idDetallePrenda").val("");
            <!--   Limpiar Electronicos-->
            $("#idTipoElectronico").val(0);
            $("#idMarca").val("");
            $("#idEstado").val(0);
            $("#idModelo").val("");
            $("#idTamaño").val("");
            $("#idColor").val(0);
            $("#idSerie").val("");
            $("#idPrestamoElectronico").val("");
            $("#idAvaluoElectronico").val("");
            $("#idPrestamoMaxElectronico").val("");
            $("#idUbicacionElectronico").val("");
            $("#idDetallePrendaElectronico").val("");
        }

        function Agregar() {
            var formElectronico = $("#idTipoElectronico").val();
            var formMetal = $("#idTipoMetal").val();
            if (formMetal > 0) {
                //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
                var dataEnviar = {
                    "$idTipoEnviar": 1,
                    "idClienteInteres": $("#idClienteInteres").val(),
                    "idTipoMetal": $("#idTipoMetal").val(),
                    "idPrenda": $("#idPrenda").val(),
                    "idKilataje": $("#idKilataje").val(),
                    "idCalidad": $("#idCalidad").val(),
                    "idCantidad": $("#idCantidad").val(),
                    "idPeso": $("#idPeso").val(),
                    "idPesoPiedra": $("#idPesoPiedra").val(),
                    "idPiedras": $("#idPiedras").val(),
                    "idPrestamo": $("#idPrestamo").val(),
                    "idAvaluo": $("#idAvaluo").val(),
                    "idPrestamoMax": $("#idPrestamoMax").val(),
                    "idUbicacion": $("#idUbicacion").val(),
                    "idDetallePrenda": $("#idDetallePrenda").val()
                };
            } else if (formElectronico > 0) {
                //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
                var dataEnviar = {
                    "$idTipoEnviar": 2,
                    "idClienteInteres": $("#idClienteInteres").val(),
                    "idTipoElectronico": $("#idTipoElectronico").val(),
                    "idMarca": $("#idMarca").val(),
                    "idEstado": $("#idEstado").val(),
                    "idModelo": $("#idModelo").val(),
                    "idTamaño": $("#idTamaño").val(),
                    "idColor": $("#idColor").val(),
                    "idSerie": $("#idSerie").val(),
                    "idPrestamoElectronico": $("#idPrestamoElectronico").val(),
                    "idAvaluoElectronico": $("#idAvaluoElectronico").val(),
                    "idPrestamoMaxElectronico": $("#idPrestamoMaxElectronico").val(),
                    "idUbicacionElectronico": $("#idUbicacionElectronico").val(),
                    "idDetallePrendaElectronico": $("#idDetallePrendaElectronico").val()
                };
            }
            $.ajax({
                data: dataEnviar,
                url: '../../../com.Mexicash/Controlador/Articulo.php',
                type: 'post',
                beforeSend: function () {
                },
                success: function (response) {
                    if (response == 5) {
                        alertify.success("Articulo agregado exitosamente.");
                        $("#divTablaArticulos").load('tablaArticulos.php');
                    } else {
                        alertify.error("Error al agregar articulo.");
                    }
                },
            })
        }

        function Metales() {
            $(document).ready(function () {
                $("#divElectronicos").hide();
                $("#divMetales").show();
            });
        }

        function Electronicos() {
            $(document).ready(function () {
                $("#divMetales").hide();
                $("#divElectronicos").show();
            });
        }

        function Recargar() {
            <?php
            $sql = new sqlArticulosDAO();
            $data = $sql->buscarArticulo();
            ?>
        }

    </script>
</head>
<body>
<div class="menuContainer"></div>
<div class="container-fluid" id="tablaExtras"
     style="position: absolute; display: none; top: 10%; left: 0%; padding-left: 4vw; height: 70vh; border: 1px solid black; background-color: white; z-index: 3"></div>
<form name="formEmpeno" id="idFormEmpeno" class="form-control input-sm">
    <div id="contenedor" class="container">
        <div class="row">
            <div class="col col-lg-12">
                <table border="0" width="100%">
                    <tbody>
                    <tr>
                        <td colspan="24">
                            <label>Empeno</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <input type="button" class="btn btn-success " onclick="agregarCliente()"
                                   value="Agregar Cliente">
                        </td>
                        <td colspan="3">
                            <input type="button" class="btn btn-success " onclick="mostrarTablaExtras()"
                                   value="Ver todos">
                        </td>
                        <td colspan="3">
                            <input type="button" class="btn btn-success"
                                   value="Historial">
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
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <div>
                                <input id="Nombres" name="Nombres" type="text" style="width: 300px"/>
                            </div>
                        </td>
                        <td colspan="6" class="border border-dark">Tasa Interés</td>
                        <td colspan="6" class="border border-dark">
                            <select id="tipoInteres" name="cmbTipoInteres"
                                    onChange="javascript:SeleccionarInteres($('#tipoInteres').val());">
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
                            <input type="text" name="inDireccion" placeholder="" id="inDireccion" style="width: 400px"
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
                        <td colspan="6">
                            <label for="ciudad">Ciudad:</label>
                        </td>
                        <td colspan="6">
                            <label for="celular">Celular:</label>
                        </td>
                        <td colspan="3" class="table-info border border-dark ">% Tasa</td>
                        <td colspan="3" class="table-info border border-dark">% Alm.</td>
                        <td colspan="3" class="table-info border border-dark">% Seguro</td>
                        <td colspan="3" class="table-info border border-dark">% I.V.A.</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <input type="text" name="inCiudad" placeholder="" id="inCiudad" required disabled/>
                        </td>
                        <td colspan="6">
                            <input type="text" name="inCelular" placeholder="" id="inCelular" style="width: 100px"
                                   required
                                   disabled/>
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
                            <label for="cotitular">Nombre Completo Cotitular:</label>
                        </td>
                        <td colspan="6" class="table-info border border-dark">Total Avalúo</td>
                        <td colspan="6" class="table-info border border-dark">Total Préstamo</td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="text" id="inNombreCot" name="inNombreCot" placeholder="" style="width: 400px"
                                   required
                                   disabled/>
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
                            <label for="benediciario">Nombre Completo Beneficiario:</label>
                        </td>
                        <td colspan="6" class="table-info border border-dark">Tipo Promoción:</td>
                        <td colspan="6" class="border border-dark">
                            <input type="text" id="idTipoPromocion" name="tipoPromocion" size="14"
                                   style="text-align:center"
                                   disabled/>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <input type="text" id="inBeneficiario" name="inBeneficiario" placeholder=""
                                   style="width:400px"
                                   required disabled/>
                        </td>
                        <td colspan="6" class="table-info border border-dark">Tipo Agrupamiento:</td>
                        <td colspan="6" class="border border-dark">
                            <input type="text" id="idAgrupamiento" name="agrupamiento" size="14"
                                   style="text-align:center"
                                   disabled/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <table>
                    <tr>
                        <td>
                            <input type="text" id="idClienteInteres" name="clienteInteres" size="6"
                                   style="text-align:center" value="1"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="Limpiar();Metales();">Metales
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-primary" onclick="Limpiar();Electronicos();">
                                Electronicos/Varios
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="divMetales">
                                <table class=" table-bordered border border-dark ">
                                    <tbody class="text-body border" align="center">
                                    <tr>
                                        <td colspan="6" class=" border-dark">Tipo:</td>
                                        <td colspan="6" class="border border-dark">
                                            <select id="idTipoMetal" name="cmbTipoMetal" class="classArticulos">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border-dark">Prenda:</td>
                                        <td colspan="6" class="border border-dark">
                                            <select id="idPrenda" name="cmbPrenda">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class=" border-dark">Kilataje:</td>
                                        <td colspan="3" class="border border-dark">
                                            <select id="idKilataje" name="cmbKilataje">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                        <td colspan="3" class=" border-dark">Calidad:</td>
                                        <td colspan="3" class="border border-dark">
                                            <select id="idCalidad" name="cmbCalidad">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Cantidad:</td>
                                        <td colspan="6" class=" border border-dark">

                                            <input type="text" id="idCantidad" name="cantidad" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Peso:</td>
                                        <td colspan="6" class="border border-dark">
                                            <input type="text" id="idPeso" name="peso" size="6"
                                                   style="text-align:center"/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Peso Piedra:</td>
                                        <td colspan="6" class="border border-dark">
                                            <input type="text" id="idPesoPiedra" name="pesoPiedra" size="6"
                                                   style="text-align:center"/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Piedras:</td>
                                        <td colspan="6" class=" border border-dark">
                                            <input type="text" id="idPiedras" name="piedras" size="6"
                                                   style="text-align:center"/>
                                            <label>pza</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Préstamo:</td>
                                        <td colspan="6" class=" border border-dark">
                                            <input type="text" id="idPrestamo" name="prestamo" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Avalúo:</td>
                                        <td colspan="6" class=" border border-dark">
                                            <input type="text" id="idAvaluo" name="avaluo" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Préstamo Maximo:</td>
                                        <td colspan="6" class=" border border-dark">
                                            <input type="text" id="idPrestamoMax" name="prestamoMax" size="6"
                                                   style="text-align:center"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="border border-dark">Ubicación:</td>
                                        <td colspan="6" class=" border border-dark">
                                            <input type="text" id="idUbicacion" name="ubicacion" size="6"
                                                   style="text-align:center"/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class=" border border-dark" align="left">Detalle de la
                                            prenda:
                                        </td>
                                    <tr>
                                        <td colspan="12" class="border border-dark" name="detallePrenda">
                                    <textarea rows="4" cols="35" id="idDetallePrenda">
                                    </textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="divElectronicos">
                                <table class="table-bordered border border-dark ">
                                    <tbody class="text-body border" align="center">
                                    <tr>
                                        <td colspan="6" class=" border-dark">Tipo:</td>
                                        <td colspan="6" class="border border-dark">
                                            <select id="idTipoElectronico" name="cmbTipoElectronico" required>
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border-dark">Marca:</td>
                                        <td colspan="6" class="border border-dark">
                                            <input type="text" id="idMarca" name="marca" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class=" border-dark">Estado:</td>
                                        <td colspan="3" class="border border-dark">
                                            <select id="idEstado" name="cmbEstado">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                        <td colspan="3" class=" border border-dark">Modelo:</td>
                                        <td colspan="3" class=" border border-dark">
                                            <input type="text" id="idModelo" name="modelo" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class=" border-dark">Tamaño:</td>
                                        <td colspan="3" class=" border border-dark">
                                            <input type="text" id="idTamaño" name="tamaño" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                        <td colspan="3" class=" border border-dark">Color:</td>
                                        <td colspan="3" class="border border-dark">
                                            <select id="idColor" name="cmbColor">
                                                <option value="0">Seleccione:</option>
                                                <option value="1">1</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">No.Serie:</td>
                                        <td colspan="6" class=" border border-dark">
                                            <input type="text" id="idSerie" name="serie" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class=" border-dark">Préstamo:</td>
                                        <td colspan="3" class=" border border-dark">
                                            <input type="text" id="idPrestamoElectronico" name="prestamoE" size="6"
                                                   style="text-align:center"/ value="">
                                        </td>
                                        <td colspan="3" class=" border-dark">Avalúo:</td>
                                        <td colspan="3" class=" border border-dark">
                                            <input type="text" id="idAvaluoElectronico" name="avaluoE" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Prestamo Máximo:</td>
                                        <td colspan="6" class="border border-dark">
                                            <input type="text" id="idPrestamoMaxElectronico" name="prestamoMaximoE"
                                                   size="6"
                                                   style="text-align:center" value=""/>
                                            <label>grs</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class=" border border-dark">Ubicación:</td>
                                        <td colspan="6" class="border border-dark">
                                            <input type="text" id="idUbicacionElectronico" name="ubicacionE" size="6"
                                                   style="text-align:center" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class=" border border-dark" align="left">Detalle de la
                                            prenda:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="border border-dark" name="detallePrendaE">
                                    <textarea rows="4" cols="35" id="idDetallePrendaElectronico">
                                    </textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="divTablaArticulos" class="col col-lg-8"></div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-warning" onclick="Limpiar();">Limpiar</button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-success" onclick="Agregar();">Agregar a la lista
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script src="../../js/main/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
