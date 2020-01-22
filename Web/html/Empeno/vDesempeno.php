<?php
/*session_start();
if(!isset($_SESSION["idUsuario"])){
    header("Location: ../index.php");
    session_destroy();
}*/
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once(SQL_PATH . "sqlClienteDAO.php");
include_once(SQL_PATH . "sqlInteresesDAO.php");
include_once(SQL_PATH . "sqlArticulosDAO.php");
include_once(SQL_PATH . "sqlContratoDAO.php");
include_once(HTML_PATH . "Clientes/modalRegistroCliente.php");
include_once(HTML_PATH . "Clientes/modalHistorial.php");
include_once(HTML_PATH . "Clientes/modalBusquedaCliente.php");
include_once(HTML_PATH . "Clientes/modalEditarCliente.php");
include_once(EMPE_PATH . "menuEmpeno.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
    <script src="../../librerias/alertifyjs/alertify.js"></script>
    <script src="../../JavaScript/funcionesArticulos.js"></script>
    <script src="../../JavaScript/funcionesIntereses.js"></script>
    <script src="../../JavaScript/funcionesCliente.js"></script>
    <script src="../../JavaScript/funcionesContrato.js"></script>
    <script src="../../JavaScript/funcionesGenerales.js"></script>
    <!--    Script inicial-->
    <!--    Script inicial-->
    <script type="application/javascript">
        $(document).ready(function () {
           // $('.menuContainer').load('menu.php');
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

        .textArea {
            resize: none;
        }

        .headt td {
            height: 35px;
        }

        .inputCliente {
            text-transform: uppercase;
        }

    </style>
</head>
<body>
<form id="idForm>uto" name="formEmpeno">

    <div id="contenedor" class="container">
        <div>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col col-lg-4 border border-primary ">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px" align="center">
                            <label>Contrato</label>
                            <input type="text" id="idContratoDesempeno" name="contrato" size="10"
                                   style="text-align:center"/>
                        </td>
                        <td style="width: 200px" align="left">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="idCheckAutomovil">
                                <label class="form-check-label" for="automovil">Automovil</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Datos del Cliente
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea rows="3" cols="40" id="idObservacionesAuto" class="textArea" disabled>
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
                            <textarea rows="8" cols="40" id="idObservacionesAuto" class="textArea" disabled>
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
                            <textarea rows="2" cols="40" id="idObservacionesAuto" class="textArea" disabled>
                            </textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col col-lg-8 border border-primary border-left-0">
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
                        <td ><h2>Total a Pagar:</h2></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td ><h1>**Cantidad**</h1></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        </td>
                    </tr>
                    <tr>
                        <td ><h1>Si esta en almoneda</h1></td>
                        <td colspan="2">
                        </td>

                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-7">
                <br>
            </div>
            <div class="col col-lg-5">
                <input type="button" class="btn btn-success" value="prueba" onclick="location.href='pruebas.php'">
                <input type="button" class="btn btn-warning" value="Cancelar" onclick="cancelar()">&nbsp;
                <input type="button" class="btn btn-info" value="Reimprimir" onclick="reimprimir()">&nbsp;
                <input type="button" class="btn btn-primary" value="Generar" onclick="generarContrato()">&nbsp;
                <input type="button" class="btn btn-danger" value="Salir" onclick="location.href='vInicio.php'">&nbsp;
            </div>
        </div>
    </div>
</form>

</body>
</html>
