<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlArticulosDAO.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" href="../../style/css/bootstrap/bootstrap.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/JavaScript">
        function Seleccionar(tipoInteresValue) {
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
</head>
<body>
<form name="formArticulos">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#menuMetales">Metales</a></li>
                    <li><a data-toggle="pill" href="#menuElectronicos">Electrónicos/Varios</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menuMetales" class="tab-pane fade in active">
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
                                <td colspan="6" class=" border border-dark"><label>pza</label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Peso:</td>
                                <td colspan="6" class="border border-dark"><label>grs</label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Peso Piedra:</td>
                                <td colspan="6" class="border border-dark"><label>grs</label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Piedras:</td>
                                <td colspan="6" class=" border border-dark"><label>pza</label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Préstamo:</td>
                                <td colspan="6" class=" border border-dark"><label></label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Avalúo:</td>
                                <td colspan="6" class=" border border-dark"><label></label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Préstamo Maximo:</td>
                                <td colspan="6" class=" border border-dark"><label color="red">0.00</label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="border border-dark">Ubicación:</td>
                                <td colspan="6" class=" border border-dark"><label></label></td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Detalle de la prenda:</td>
                                <td colspan="6" class=" border border-dark"><label></label></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="menuElectronicos" class="tab-pane fade">
                        <table class="table table-bordered border border-dark ">
                            <thead class="thead-light">
                            <tr>
                                <th colspan="6" class="border border-dark">Contrato:</th>
                                <th colspan="6" class="border border-dark">Vence:</th>
                            </tr>
                            </thead>
                            <tbody class="text-body border" align="center">
                            <tr>
                                <td colspan="6" class="table-info border-dark">Tasa Interés</td>
                                <td colspan="6" class="border border-dark">
                                    <select id="tipoInteres" name="cmbTipoInteres"
                                            onChange="javascript:Seleccionar($('#tipoInteres').val());">
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
                                <td colspan="4" class="table-info border border-dark">Tipo Interés</td>
                                <td colspan="4" class="table-info border border-dark">Periodo</td>
                                <td colspan="4" class="table-info border border-dark">Plazo</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border border-dark ">
                                    <input type="text" id="idTipoInteres" name="tipoInteres" size="20"
                                           style="text-align:center"
                                           disabled/>
                                </td>
                                <td colspan="4" class="border border-dark">
                                    <input type="text" id="idPeriodo" name="periodo" size="20" style="text-align:center"
                                           disabled/>
                                </td>
                                <td colspan="4" class="border border-dark">
                                    <input type="text" id="idPlazo" name="plazo" size="6" style="text-align:center"
                                           disabled/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="table-info border border-dark ">% Tasa</td>
                                <td colspan="3" class="table-info border border-dark">% Alm.</td>
                                <td colspan="3" class="table-info border border-dark">% Seguro</td>
                                <td colspan="3" class="table-info border border-dark">% I.V.A.</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="border border-dark">
                                    <input type="text" id="idTasaPorcen" name="tasaPorcen" size="6"
                                           style="text-align:center"
                                           disabled/>

                                </td>
                                <td colspan="3" class="border border-dark">
                                    <input type="text" id="idAlmPorcen" name="almPorcen" size="6"
                                           style="text-align:center"
                                           disabled/>

                                </td>
                                <td colspan="3" class="border border-dark">
                                    <input type="text" id="idSeguroPorcen" name="seguroPorcen" size="6"
                                           style="text-align:center" disabled/>

                                </td>
                                <td colspan="3" class="border border-dark">
                                    <input type="text" id="idIvaPorcen" name="ivaPorcen" size="6"
                                           style="text-align:center"
                                           disabled/>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="table-info border border-dark">Total Avalúo</td>
                                <td colspan="6" class="table-info border border-dark">Total Préstamo</td>
                            </tr>
                            <tr>
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
                                <td colspan="6" class="table-info border border-dark">Tipo Promoción:</td>
                                <td colspan="6" class="border border-dark">
                                    <input type="text" id="idTipoPromocion" name="tipoPromocion" size="14"
                                           style="text-align:center" disabled/>

                                </td>
                            </tr>
                            <tr>
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
            </div>
            <div class="col">
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Prenda</th>
                        <th>Peso</th>
                        <th>Kilates</th>
                        <th>Avalúo</th>
                        <th>Préstamo</th>
                        <th>Observaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                    </tr>
                    <tr>
                        <td>Smith</td>
                        <td>Thomas</td>
                        <td>smith@example.com</td>
                    </tr>
                    <tr>
                        <td>Merry</td>
                        <td>Jim</td>
                        <td>merry@example.com</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="col-sm-2"><button type="button" class="btn btn-warning">Limpiar</button></div>
            <div class="col-sm-2"><button type="button" class="btn btn-danger">Eliminar</button></div>
            <div class="col-sm-2"><button type="button" class="btn btn-success">Agregar a la lista</button></div>
            </div>

        </div>
    </div>

    </div>
</form>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../style/css/magicsuggest/magicsuggest-min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
