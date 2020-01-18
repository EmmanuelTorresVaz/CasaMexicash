<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlCatalogoDAO.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registro Clientes</title>
    <link rel="stylesheet" href="../../style/less/main.css"/>
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <link href="../../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css"/>
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css"/>
    <script src="../../librerias/jquery/jquery-3.4.1.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrap.js"></script>
    <script src="../../librerias/alertifyjs/alertify.js"></script>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../JavaScript/funcionesCatalogos.js"></script>
    <script src="../../JavaScript/funcionesCliente.js"></script>

    <style type="text/css">
        #sugerenciaEstado {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaMunicipio {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
            z-index: 9999;
            width: 206px;
        }

        #sugerenciaLocalidad {
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            top: 45px;
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
    <script>
        $(document).ready(function () {
            //  $('.menuContainer').load('menu.php');
            $("#idFecNac").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</head>
<body>
<div class="modal fade " id="modalEditarNuevo" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <form id="idFormRegistro" autocomplete="off">
                        <div id="conteiner" class="container">
                            <div class="row">
                                <input id="idEstadoEdit" name="Estado" type="text" style="width: 5px" class="invisible"/>
                                <input id="idMunicipioEdit" name="municipio" type="text" style="width: 5px"
                                       class="invisible"/>
                                <input id="idLocalidadEdit" name="localidad" type="text" style="width: 5px"
                                       class="invisible"/>
                                <input id="idClienteEditar" name="clienteEditar" type="text" style="width: 5px"
                                       class="invisible"/>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table>
                                        <tr>
                                            <td>Nombre(s):</td>
                                            <td>Apellido Paterno:</td>
                                            <td>Apellido Materno:</td>
                                            <td>Sexo:</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="inputCliente" name="nombre" id="idNombreEdit"
                                                       placeholder="Nombres"
                                                       style="width: 200px"
                                                       required/>
                                            </td>
                                            <td>
                                                <input type="text" class="inputCliente" name="apPat" id="idApPatEdit"
                                                       placeholder="Apellido Paterno" style="width: 200px"
                                                       required/>
                                            </td>
                                            <td>
                                                <input type="text" class="inputCliente" name="apMat" id="idApMatEdit"
                                                       placeholder="Apellido Materno" style="width: 200px"/>
                                            </td>
                                            <td>
                                                <select name="sexo" id="idSexoEdit" style="width: 200px" required>
                                                    <option value="0">Selecciona:</option>
                                                    <?php
                                                    $dataSexo = array();
                                                    $sqlCatalogo = new sqlCatalogoDAO();
                                                    $dataSexo = $sqlCatalogo->llenarCmbSexo();
                                                    for ($i = 0; $i < count($dataSexo); $i++) {
                                                        echo "<option value=" . $dataSexo[$i]['id_Cat_Cliente'] . ">" . $dataSexo[$i]['descripcion'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tipo de Identificaci&oacute;n:
                                            </td>
                                            <td>
                                                No. Identificaci&oacute;n:
                                            </td>
                                            <td>Fecha Nacimiento:</td>
                                            <td>
                                                Correo Electr&oacute;nico:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select type="text" name="identificacion" placeholder="Selecciona uno"
                                                        id="idIdentificacionEdit"
                                                        style="width: 200px" required>
                                                    <option value="44">Selecciona Uno</option>
                                                    <?php
                                                    $dataIdent = array();
                                                    $sq = new sqlCatalogoDAO();
                                                    $dataIdent = $sq->traeIdentificaciones();
                                                    for ($i = 0; $i < count($dataIdent); $i++) {
                                                        echo "<option value=" . $dataIdent[$i]['id_Cat_Cliente'] . ">" . $dataIdent[$i]['descripcion'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="numIdentificacion" placeholder=""
                                                       id="idNumIdentificacionEdit"
                                                       style="width: 200px"
                                                       required/>
                                            </td>
                                            <td>
                                                <input type="text" name="fechaNac" id="idFechaNacEdit" style="width: 200px"
                                                       placeholder="aaaa/mm/dd"
                                                       required/>
                                            </td>
                                            <td>
                                                <input type="text" name="correo" id="idCorreoEdit" style="width: 200px"
                                                       placeholder=""/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>RFC:</td>
                                            <td>
                                                CURP:
                                            </td>
                                            <td>
                                                Celular:
                                            </td>
                                            <td>
                                                Tel&eacute;fono:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="inputCliente" name="rfc" id="idRfcEdit"
                                                       placeholder=""
                                                       style="width: 200px"/>
                                            </td>
                                            <td>
                                                <input type="text" class="inputCliente" name="curp" id="idCurpEdit"
                                                       style="width: 200px"
                                                       placeholder=""/>
                                            </td>
                                            <td>
                                                <input type="text" name="celular" id="idCelularEdit"
                                                       onkeypress="return soloNumeros(event)"
                                                       style="width: 200px" maxlength="11"
                                                       required/>
                                            </td>
                                            <td>
                                                <input type="text" name="telefono" id="idTelefonoEdit"
                                                       onkeypress="return soloNumeros(event)"
                                                       style="width: 200px" maxlength="8"
                                                       placeholder="N&uacute;mero con lada"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Estado de Residencia:
                                            </td>
                                            <td>
                                                Municipio:
                                            </td>
                                            <td>
                                                Localidad:
                                            </td>
                                            <td>
                                                Calle:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="idEstadoNameEdit" name="estadoName" type="text"
                                                       style="width: 200px"
                                                       onkeypress="estadoAutocompletar()" placeholder="Buscar Estado..."
                                                       required/>
                                                <div id="sugerenciaEstadoEdit"></div>
                                            </td>
                                            <td>
                                                <input id="idMunicipioNameEdit" name="municipioName" type="text"
                                                       style="width: 200px"
                                                       onkeypress="municipioAutocompletar()"
                                                       placeholder="Buscar Municipio..." required disabled/>
                                                <div id="sugerenciaMunicipioEdit"></div>
                                            </td>
                                            <td>
                                                <input id="idLocalidadNameEdit" name="localidadName" type="text"
                                                       style="width: 200px"
                                                       onkeypress="localidadAutocompletar()"
                                                       placeholder="Buscar Localidad..." required disabled/>
                                                <div id="sugerenciaLocalidadEdit"></div>
                                            </td>
                                            <td>
                                                <input type="text" class="inputCliente" name="calle" placeholder=""
                                                       id="idCalleEdit"
                                                       style="width: 200px"
                                                       required/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Codigo Postal:
                                            </td>
                                            <td>
                                                No. Exterior:
                                            </td>
                                            <td>
                                                No. Interior:
                                            </td>
                                            <td>
                                                Ocupacion:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="cp" placeholder=""
                                                       onkeypress="return soloNumeros(event)"
                                                       id="idCPEdit" style="width: 100px" required/>
                                            </td>
                                            <td>
                                                <input type="text" name="numExt" placeholder=""
                                                       onkeypress="return soloNumeros(event)"
                                                       id="idNumExtEdit" style="width: 50px" required/>
                                            </td>
                                            <td>
                                                <input type="text" name="numInt" placeholder="" id="idNumIntEdit"
                                                       style="width: 150px"/>
                                            </td>
                                            <td>
                                                <select type="text" name="ocupacion" placeholder="Selecciona uno"
                                                        class="selectpicker"
                                                        id="idOcupacionEdit"
                                                        style="width: 200px" required>
                                                    <option value="22">Selecciona Uno</option>
                                                    <?php
                                                    $dataOcupaciones = array();
                                                    $sq = new sqlCatalogoDAO();
                                                    $dataOcupaciones = $sq->catOcupacionesLlenar();
                                                    for ($i = 0; $i < count($dataOcupaciones); $i++) {
                                                        echo "<option value=" . $dataOcupaciones[$i]['id_Ocupacion'] . ">" . $dataOcupaciones[$i]['descripcion'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Mensaje de uso interno:
                                            </td>
                                            <td>
                                                ¿Como se entero?
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                            <textarea type="text" class="inputCliente" name="mensajeInterno" placeholder=""
                                      id="idMensajeInternoEdit"
                                      rows="3" cols="80"></textarea>
                                            </td>
                                            <td>
                                                <select type="text" name="promocion" placeholder="Selecciona:"
                                                        class="selectpicker"
                                                        id="idPromocionEdit" style="width: 150px">
                                                    <option value="0">Selecciona:</option>
                                                    <?php

                                                    $dataPromo = array();

                                                    $sql = new sqlCatalogoDAO();

                                                    $dataPromo = $sql->traePromociones();

                                                    for ($i = 0; $i < count($dataPromo); $i++) {
                                                        echo "<option value=" . $dataPromo[$i]['id_Cat_Cliente'] . ">" . $dataPromo[$i]['descripcion'] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </td>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-warning" onclick="confirmarActualizacion()"
                       value="Actualizar">
            </div>
        </div>
    </div>
</div>
</body>
</html>