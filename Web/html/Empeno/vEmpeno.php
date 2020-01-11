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
    <script type="text/javascript" src="../../js/jquery-1.12.1.min.js"></script>
    <link rel="stylesheet" href="../../style/jquery-ui.css"/>
    <script type="text/javascript" src="../../js/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Empeno</title>
    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

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
    </script>

    <script type="text/javascript">
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

    <script language="JavaScript" type="text/JavaScript">
        function Limpiar() {
            //   $('#idFormArticulos').trigger("reset");
        }

        function Agregar() {
            var formElectronico = $("#idTipoElectronicoArt").val();
            var formMetal = $("#idTipoMetalArt").val();
            if (formMetal > 0) {
                alert("Estas en el form de electronicos");
            } else if (formElectronico > 0) {
                //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2

                var dataEnviar = {
                    "idTipo": 2,
                    "idFolio": $("#idFolioArt").val(),
                    "idTipoElectronico": $("#idTipoElectronicoArt").val(),
                    "idMarca": $("#idMarcaArt").val(),
                    "idEstado": $("#idEstadoArt").val(),
                    "idModelo": $("#idModeloArt").val(),
                    "idTamaño": $("#idTamañoArt").val(),
                    "idColor": $("#idColorArt").val(),
                    "idSerie": $("#idSerieArt").val(),
                    "idPrestamoElectronico": $("#idPrestamoElectronicoArt").val(),
                    "idAvaluoElectronico": $("#idAvaluoElectronicoArt").val(),
                    "idPrestamoMaxElectronico": $("#idPrestamoMaxElectronicoArt").val(),
                    "idUbivacion": $("#idUbivacionArt").val(),
                    "idDetallePrendaElectronico": $("#idDetallePrendaElectronicoArt").val()
                };

                $.ajax({
                    data: dataEnviar,
                    url: '../../../com.Mexicash/Controlador/Articulo.php',
                    type: 'post',
                    beforeSend: function () {
                    },
                    success: function (response) {
                        if (response = 1) {
                            alert("1")
                        } else {
                            alert("2")
                        }
                    },
                })
            }
        }

    </script>

    <!--  <script>
          $(document).ready(function () {
              $('.menuContainer').load('menu.php');
          });
      </script>-->
</head>
<body>
<div class="menuContainer"></div>
<div class="container-fluid" id="tablaExtras"
     style="position: absolute; display: none; top: 10%; left: 0%; padding-left: 4vw; height: 70vh; border: 1px solid black; background-color: white; z-index: 3"></div>
<form method="post" name="formEmpeno">
    <div id="contenedor" class="container">
        <div class="row">
            <div class="col">
                <table border="0" width="100%">
                    <tbody>
                    <tr>
                        <td colspan="24">
                            <label>Empeno</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <label for="nombreCliente">Nombre:</label>
                        </td>
                        <td colspan="3">
                            <input type="button" class="btn btn-outline-primary" onclick="mostrarTablaExtras()"
                                   value="Ver todos">
                        </td>
                        <td colspan="3">
                            <input type="button" class="btn btn-outline-primary"
                                   value="Historial">
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
                            <input id="Nombres" name="Nombres" type="text" style="width: 300px"/>
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
            <ul class="nav nav-pills">
                <li><a data-toggle="pill" href="#menuMetales" onclick="Limpiar();">Metales</a></li>
                <li class="active"><a data-toggle="pill" href="#menuElectronicos" onclick="Limpiar();">Electrónicos/Varios</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="menuMetales" class="tab-pane ">
                    <table class="table table-bordered border border-dark ">
                        <tbody class="text-body border" align="center">
                        <tr>
                            <td colspan="6" class=" border-dark">Tipo:</td>
                            <td colspan="6" class="border border-dark">
                                <select id="idTipoMetal" name="cmbTipoMetal">
                                    <option value="0">Seleccione:</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="menuElectronicos" class="tab-pane fade in active">
                    <table class="table table-bordered border border-dark ">
                        <tbody class="text-body border" align="center">
                        <tr>
                            <td colspan="12" class=" border border-dark" style="display:none">
                                <?php
                                $sql = new sqlArticulosDAO();
                                $contrato = $sql->BuscarContrato();
                                $contrato = $contrato + 1;
                                echo "<input type='text' id='idFolio' name='folio' value='" . $contrato . "'/>";
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm-2">
                    <button type="button" class="btn btn-warning" onclick="Limpiar();">Limpiar</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger" onclick="Cargar();">Eliminar</button>
                </div>
                <div class="col-sm-2">
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
