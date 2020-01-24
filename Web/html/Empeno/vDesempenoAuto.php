<?php
/*session_start();
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}*/
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (HTML_PATH. "Empeno/menuEmpeno.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../JavaScript/funcionesDesempeno.js"></script>
    <style>
        .textArea {
            resize: none;
        }
    </style>

</head>
<body>
<form id="idFormDesAuto" name="formDesAuto">
    <div align="center">
        <br>
        <h2>Desempeño Auto</h2>
        <br>
    </div>
    <div id="contenedor" class="container border border-danger">
        <div class="row">
            <div class="col col-lg-5 border border-primary ">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px" align="left" colspan="2">
                            <input type="button" class="btn btn-info " onclick="buscarContratoDesAuto();"
                                   value="Buscar">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px" align="left">
                            <label>Contrato:</label>
                            <input type="text" id="idContratoDesempenoAuto" name="contrato" size="10" value="2"
                                   style="text-align:right"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Datos del Cliente
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="5" cols="45" id="idDatosClienteDesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Datos del Contrato
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="14" cols="45" id="idDatosContratoDesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Detalle de Contrato
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="4" cols="45" id="idDetalleContratoDesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col col-lg-7 border border-primary border-left-0">
                <table width="100%" border="0">
                    <tr>
                        <td colspan="3">
                            <div>
                                <table class="table table-bordered " width="100%">
                                    <thead>
                                    <th>Contrato</th>
                                    <th>Préstamo</th>
                                    <th>Interés</th>
                                    </thead>
                                    <tr>
                                        <td> <label id="idConTDDesAuto"></label></td>
                                        <td> <label id="idPresTDDesAuto"></label></td>
                                        <td> <label id="idInteresTDDesAuto"></label></td>
                                    </tr>
                                    <tr>
                                        <td>Preguntar</td>
                                        <td>Preguntar</td>
                                        <td>Preguntar</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px">
                            <div>
                                <h4>Descuento Interes</h4>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="idCheckPorcentaje">
                                    <label class="form-check-label" for="automovil">Porcentaje</label>
                                    <label class="form-check-label">0</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="idCheckImporte">
                                    <label class="form-check-label" for="automovil">Importe</label>
                                    <label class="form-check-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</label>
                                </div>
                            </div>
                        </td>
                        <td style="width: 200px"></td>
                        <td style="width: 200px"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td><h2>Total a Pagar:</h2></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td><h1><label id="totalAPagarTDAuto"></label></h1></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        </td>
                    </tr>
                    <tr>
                        <td><h1>Si esta en almoneda</h1></td>
                        <td colspan="2">
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

</body>
</html>
