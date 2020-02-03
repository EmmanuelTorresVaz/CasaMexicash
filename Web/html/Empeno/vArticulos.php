<?php
session_start();
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}
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
                            $('#idAgrupamiento').val(response.result.tipo_Agrupamiento);
                        }
                    },
                })
            }
        }

        function Limpiar() {
            $('#idFormArticulos').trigger("reset");
        }



       function Agregar() {
            var formElectronico = $("#idTipoElectronico").val();
            var formMetal = $("#idTipoMetal").val();
            if (formMetal > 0) {
                alert("Estas en el form de electronicos");
            } else if (formElectronico > 0) {
              //  si es metal envia tipoAtticulo como 1 si es Electronico corresponde el 2
                
                var dataEnviar = {
                    "idTipo": 2,
                    "idFolio":  $("#idFolio").val(),
                    "idTipoElectronico": $("#idTipoElectronico").val(),
                    "idMarca": $("#idMarca").val(),
                    "idEstado": $("#idEstado").val(),
                    "idModelo": $("#idModelo").val(),
                    "idSerie": $("#idSerie").val(),
                    "idPrestamoElectronico": $("#idPrestamoElectronico").val(),
                    "idAvaluoElectronico": $("#idAvaluoElectronico").val(),
                    "idUbivacion": $("#idUbivacion").val(),
                    "idDetallePrendaElectronico": $("#idDetallePrendaElectronico").val()
                };

                $.ajax({
                    data: dataEnviar,
                    url: '../../../com.Mexicash/Controlador/Articulo.php',
                    type:'post',
                    beforeSend:function () {
                    },
                    success:function (response) {
                        if(response=1){
                            alert("1")
                        }else{
                            alert("2")
                        }
                    },
                })
            }
        }

        function Cargar() {
        }
    </script>
</head>
<body>
<form name="formArticulos" id="idFormArticulos">
    <div class="container" id="idContenedor">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills">
                    <li ><a data-toggle="pill" href="#menuMetales" onclick="Limpiar();">Metales</a></li>
                    <li class="active"><a data-toggle="pill" href="#menuElectronicos" onclick="Limpiar();">Electrónicos/Varios</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menuMetales" class="tab-pane ">
                        &nbsp;
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
                                <td colspan="6" class=" border border-dark">

                                    <input type="text" id="idCantidad" name="cantidad" size="6"
                                           style="text-align:center"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">Peso:</td>
                                <td colspan="6" class="border border-dark">
                                    <input type="text" id="idPeso" name="peso" size="6" style="text-align:center"/>
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
                                    <input type="text" id="idAvaluo" name="avaluo" size="6" style="text-align:center"/>
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
                                <td colspan="6" class=" border border-dark">Detalle de la prenda:</td>
                                <td colspan="6" class=" border border-dark">
                                    <input type="text" id="idDetallePrenda" name="detallePrenda" size="6"
                                           style="text-align:center"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="menuElectronicos" class="tab-pane fade in active">
                        &nbsp;
                        <table class="table table-bordered border border-dark ">
                            <tbody class="text-body border" align="center">
                            <tr>
                                <td colspan="12" class=" border border-dark"  style="display:none">
                                    <?php
                                    $sql = new sqlArticulosDAO();
                                    $contrato = $sql->BuscarContrato();
                                    $contrato = $contrato +1;
                                    echo "<input type='text' id='idFolio' name='folio' value='" . $contrato . "'/>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border-dark">Tipo:</td>
                                <td colspan="6" class="border border-dark">
                                    <select id="idTipoElectronico" name="cmbTipoElectronico" required>
                                        <option value="1">1:</option>
                                        <option value="2">1</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border-dark">Marca:</td>
                                <td colspan="6" class="border border-dark">
                                    <input type="text" id="idMarca" name="marca" size="6" style="text-align:center" value="3"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class=" border-dark">Estado:</td>
                                <td colspan="3" class="border border-dark">
                                    <select id="idEstado" name="cmbEstado">
                                        <option value="4">4:</option>
                                        <option value="1">1</option>
                                    </select>
                                </td>
                                <td colspan="3" class=" border border-dark">Modelo:</td>
                                <td colspan="3" class=" border border-dark">
                                    <input type="text" id="idModelo" name="modelo" size="6" style="text-align:center" value="5"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class=" border-dark">Tamaño:</td>
                                <td colspan="3" class=" border border-dark">
                                    <input type="text" id="idTamaño" name="tamaño" size="6" style="text-align:center" value="6"/>
                                </td>
                                <td colspan="3" class=" border border-dark">Color:</td>
                                <td colspan="3" class="border border-dark">
                                    <select id="idColor" name="cmbColor">
                                        <option value="7">7:</option>
                                        <option value="1">1</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class=" border border-dark">No.Serie:</td>
                                <td colspan="6" class=" border border-dark">
                                    <input type="text" id="idSerie" name="serie" size="6" style="text-align:center" value="8"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class=" border-dark">Préstamo:</td>
                                <td colspan="3" class=" border border-dark">
                                    <input type="text" id="idPrestamoElectronico" name="prestamoE" size="6"
                                           style="text-align:center"/ value="9">
                                </td>
                                <td colspan="3" class=" border-dark">Avalúo:</td>
                                <td colspan="3" class=" border border-dark">
                                    <input type="text" id="idAvaluoElectronico" name="avaluoE" size="6" style="text-align:center" value="10"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" class=" border border-dark">Ubivación:</td>
                                <td colspan="6" class="border border-dark">
                                    <input type="text" id="idUbivacion" name="ubivacion" size="6"
                                           style="text-align:center" value="12"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class=" border border-dark" align="left">Detalle de la prenda:</td>
                            </tr>
                            <tr>
                                <td colspan="12" class="border border-dark"  name="detallePrenda">
                                    <textarea rows="4" cols="50"  id="idDetallePrendaElectronico">13
                                    </textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <table class="table table-responsive table-striped" id="tblArticulos">
                    <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Marca</th>
                        <th>Estado</th>
                        <th>Modelo</th>
                        <th>Préstamo</th>
                        <th>Avalúo</th>
                        <th>Observaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = new sqlArticulosDAO();
                    $data = $sql->buscarArticulo();

                    for ($i = 0; $i < count($data); $i++) {
                        ?>
                        <tr id="<?php echo $data[$i]['id_Articulo']; ?>">
                            <td><?php echo$data[$i]['id_Contrato']; ?></td>
                            <td><?php echo $data[$i]['marca']; ?></td>
                            <td><?php echo $data[$i]['estado']; ?></td>
                            <td><?php echo $data[$i]['modelo']; ?></td>
                            <td><?php echo $data[$i]['prestamo']; ?></td>
                            <td><?php echo $data[$i]['avaluo']; ?></td>
                            <td><?php echo $data[$i]['detalle']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>
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
                    <button type="button" class="btn btn-success" onclick="Agregar();">Agregar a la lista</button>
                </div>
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
