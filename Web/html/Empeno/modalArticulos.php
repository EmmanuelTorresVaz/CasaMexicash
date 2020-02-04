<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historial Cliente</title>
</head>
<body>
<div class="modal fade " id="modalArticulos" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <table >
                        <tr>
                            <td>
                                <label>Tipo:</label>
                            </td>
                            <td>
                                <label>Marca:</label>
                            </td>
                            <td>
                                <label>Modelo:</label>
                            </td>
                            <td>
                                <img src="../../style/Img/mas.png"  data-toggle="modal"
                                     data-target="#modalArticulos" alt="Agregar">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select id="idTipoModArt" name="tipoElect" class="selectpicker"  style="width:155px"
                                        onchange="llenarComboMunicipio()">
                                    <option value="0">Seleccione:</option>
                                    <?php
                                    $dataEstado = array();
                                    $sqlEstado = new sqlCatalogoDAO();
                                    $dataEstado = $sqlEstado->completaEstado();
                                    for ($i = 0; $i < count($dataEstado); $i++) {
                                        echo "<option value=" . $dataEstado[$i]['id_Estado'] . ">" . $dataEstado[$i]['descripcion'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select id="idMunicipio" name="municipioName" class="selectpicker"  style="width:200px" disabled onchange="llenarComboLocalidad()">
                                </select>
                            </td>
                            <td>
                                <select id="idMunicipio" name="municipioName" class="selectpicker"  style="width:200px" disabled onchange="llenarComboLocalidad()">
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <table class="table table-hover table-condensed table-bordered" width="100%">
                        <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Caracteristicas</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody id="idTBodyElectronico">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-warning w-23" data-dismiss="modal"
                       value="Salir">
            </div>
        </div>
    </div>
</div>
</body>
</html>
