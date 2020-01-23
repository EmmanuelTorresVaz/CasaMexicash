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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrapNav.css">
    <script src="../../librerias/jquery-3.4.1.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../librerias/alertifyjs/alertify.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrapNav.js"></script>
    <!-- Pooper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous">
    </script>
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

</head>
<body>
<nav class="navbar navbar-expand-xl bg-success navbar-dark">
    <a class="navbar-brand" href="vInicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Empeño
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="vEmpeno.php">Empeños</a></li>
                    <li><a class="dropdown-item" href="vDesempeno.php">Desempeños</a></li>
                    <li><a class="dropdown-item" href="vRefrendo.php">Refrendo</a></li>
                    <li><a class="dropdown-item" href="vConsulta.php">Consulta</a></li>
                    <li><a class="dropdown-item" href="vAuto.php">Auto</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cierre
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Cierre de Sucursal(P)</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ventas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Mostrador (P)</a></li>
                </ul>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Abono (P)</a></li>
                </ul>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Apartados (P)</a></li>
                </ul>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Reportes (P)</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Inventario
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Existencias (P)</a></li>
                </ul>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#" onclick="ventanaInvFisico(1)">Inventario F&iacute;sico (M)</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item dropdown-toggle" href="#">Empeños</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hist&oacute;rico (P)</a></li>
                            <li><a class="dropdown-item" href="#" onclick="ventanaInvFisico(1)">Inventarios(M)</a></li>
                            <li><a class="dropdown-item" href="#">Contratos Vencidos (P)</a></li>
                            <li><a class="dropdown-item" href="#" onclick="ventanaInvFisico(2)">Contratos Almoneda (M)</a></li>
                            <li><a class="dropdown-item" href="#">Desempeños-detallado (P)</a></li>
                            <li><a class="dropdown-item" href="#">Refrendo-detallado (P)</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item dropdown-toggle" href="#">Financieros</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ingresos(P)</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item dropdown-toggle" href="#">Monitoreo (P)</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Re-Impresiones(P)</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
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
