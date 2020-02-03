<?php
if(!isset($_SESSION)) {
    session_start();
}
/*if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}*/
$_SESSION['idUsuario'] = 1;
$_SESSION['usuario'] = "admin";
$_SESSION['sucursal'] = 1;
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (HTML_PATH. "Catalogos/menuCatalogos.php");
include_once(HTML_PATH . "Catalogos/modalActualizarMetal.php");
include_once(HTML_PATH . "Catalogos/modalAgregarMetal.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");
include_once(SQL_PATH . "sqlCatalogoDAO.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--Generales-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo</title>
    <!--Funciones-->
    <script src="../../JavaScript/funcionesCatalogos.js"></script>
    <script src="../../JavaScript/funcionesGenerales.js"></script>
    <!--    Script inicial-->
</head>
<body>
<form id="idFormCatMetales" name="formCatMetales">
    <div id="contenedor" class="container">
        <div>
            <br>
            <br>
        </div>
        <div class="row" >
            <div class="col-6">
                <table width="70%">
                    <tbody class="text-body" align="left">
                    <tr>
                        <td colspan="6">Tipo:</td>
                        <td colspan="6">
                            <select id="idTipoMetalCat" name="cmbTipoMetal" class="selectpicker"
                                    onchange="cargarTablaCatMetales($('#idTipoMetalCat').val())" style="width: 150px">
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
                        <td align="center">
                            <input type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarMetal"
                                   value="Agregar">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" >
            <div class="col-6">
                <table class="table table-hover table-condensed table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>Tipo </th>
                        <th>Unidad </th>
                        <th>Precio</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody id="idCatMetales">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
</body>
</html>
