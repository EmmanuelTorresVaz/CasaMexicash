<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlClienteDAO.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");
include_once(SQL_PATH . "sqlUsuarioDAO.php");
include_once(HTML_PATH . "Clientes/modalRegistroCliente.php");
include_once(HTML_PATH . "Clientes/modalBusquedaCliente.php");
include_once(HTML_PATH . "Clientes/modalEditarCliente.php");
include_once(HTML_PATH . "Ventas/modalBusquedaCodigo.php");
include_once (HTML_PATH. "Ventas/menuVentas.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--Generales-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ventas</title>
    <!--Funciones-->
    <script src="../../JavaScript/funcionesArticulos.js"></script>
    <script src="../../JavaScript/funcionesIntereses.js"></script>
    <script src="../../JavaScript/funcionesCliente.js"></script>
    <script src="../../JavaScript/funcionesContrato.js"></script>
    <script src="../../JavaScript/funcionesGenerales.js"></script>
    <script src="../../JavaScript/funcionesVentas.js"></script>
    <!--Calendario-->
  <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="//resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--    Script inicial-->
    <script type="application/javascript">
        $(document).ready(function () {
            $("#idFormEmpeno").trigger("reset");
            $("#btnEditar").prop('disabled', true);
            var fechaHoy = fechaActual();
            $("#idFechaHoy").val(fechaHoy);
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

        #sugerenciaEstado {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 230px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaMunicipio {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 230px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaLocalidad {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 230px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaEstado .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        #sugerenciaMunicipio .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        #sugerenciaLocalidad .suggest-element {
            background-color: #EEEEEE;
            border-top: 1px solid #d6d4d4;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
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
            <div class="col col-lg-12 border border-primary border-left-0 border-right-0 border-top-0">
                <table border="0" width="90%" >
                    <tbody>
                    <tr colspan="12">
                        <br>
                    </tr>
                    <tr class="headt">
                        <td colspan="6">
                            <label>Fecha:</label>
                            <input type="text" name="fechaHoy" placeholder="" id="idFechaHoy"
                                   style="width: 100px" disabled/>
                            <input type="button" class="btn btn-success "
                                   data-toggle="modal" data-target="#modalRegistroNuevo"
                                   value="Agregar">
                            <input type="button" class="btn btn-warning "
                                   data-toggle="modal" data-target="#modalEditarNuevo" id="btnEditar"
                                   value="Editar" onclick="modalEditarCliente($('#idClienteEmpeno').val())" disabled>
                            <input type="button" class="btn btn-success "
                                   data-toggle="modal" data-target="#modalBusquedaCliente"
                                   onclick="mostrarTodos($('#idNombres').val())"
                                   value="Ver todos">
                        </td>
                        <td colspan="6">
                            <input type="text" id="idClienteEmpeno" name="clienteEmpeno" size="20"  class="invisible"/>
                        </td>
                    </tr>
                    <tr class="headt">
                        <td colspan="2">
                            <label for="nombreCliente">Nombre:</label>
                        </td>
                        <td colspan="2">
                            <label for="celular">Celular:</label>
                        </td>
                        <td colspan="8">
                            <label for="direccion">Dirección:</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="vertical-align:top;">
                            <div>
                                <input id="idNombres" name="Nombres" type="text" style="width: 300px"
                                       class="inputCliente"
                                       onkeypress="nombreAutocompletar()" placeholder="Buscar Cliente..."/>
                            </div>
                            <div id="suggestionsNombreEmpeno"></div>
                        </td>
                        <td colspan="2" style="vertical-align:top;">
                            <input type="text" name="celularEmpeno" placeholder="" id="idCelularEmpeno"
                                   style="width: 120px, "
                                   required disabled/>
                        </td>
                        <td colspan="8" name="direccionEmpeno">
                                    <textarea  cols="70" id="idDireccionEmpeno" class="textArea" disabled>
                                    </textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12 border border-primary border-left-0 border-right-0 border-top-0">
                <table border="0" width="70%" >
                    <tbody>
                    <tr class="headt">
                        <td colspan="4">
                            <label for="nombreCliente">Codigo:</label>
                        </td>
                        <td colspan="4">
                            <input type="button" class="btn btn-success "
                                   data-toggle="modal" data-target="#modalBusquedaCodigo"
                                   onclick="buscarCodigo($('#idCodigo').val())"
                                   value="Buscar Codigo">
                        </td>
                        <td colspan="4">
                            <label for="direccion">Vendedor:</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="vertical-align:top;">
                            <input type="text" name="codigo" placeholder="" id="idCodigo"
                                   style="width: 120px"/>
                        </td>
                        <td colspan="4" rowspan="2" >
                            <select id="idVendedor" name="cmbVendedor" class="selectpicker" style="width: 200px">
                                <option value="0">Seleccione:</option>
                                <?php
                                $data = array();
                                $sqlUsu = new sqlUsuarioDAO();
                                $data = $sqlUsu->llenarCmbVendedor();
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "<option value=" . $data[$i]['id_User'] . ">" . $data[$i]['NombreVend'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
