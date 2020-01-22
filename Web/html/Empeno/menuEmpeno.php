<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
    <script src="../../librerias/jquery-3.4.1.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrap.js"></script>

    <title>Mexicash</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-success navbar-dark fixed-top" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="../../../../MexicashNuevo/Web/html/Empeno/vInicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active dropdown">
                <a class="nav-link" href="#" id="idEmpe" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Empeño
                </a>
                <div class="dropdown-menu" aria-labelledby="idEmpe">
                    <a class="dropdown-item" href="../../../../MexicashNuevo/Web/html/Empeno/vEmpeno.php">Empeños</a>
                    <a class="dropdown-item" href="../../../../MexicashNuevo/Web/html/Empeno/vDesempeno.php">Desempeños</a>
                    <a class="dropdown-item" href="../../../../MexicashNuevo/Web/html/Empeno/vRefrendo.php">Refrendo</a>
                    <a class="dropdown-item" href="../../../../MexicashNuevo/Web/html/Empeno/vConsulta.php">Consulta</a>
                    <a class="dropdown-item" href="../../../../MexicashNuevo/Web/html/Empeno/vAuto.php">Auto</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="idCierre" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Cierre
                </a>
                <div class="dropdown-menu" aria-labelledby="idCierre">
                    <a class="dropdown-item" href="../../../../MexicashNuevo/Web/html/Cierre/vInicio.php">Cierre de Sucursal(P)</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="idVenta" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Ventas
                </a>
                <div class="dropdown-menu" aria-labelledby="idVenta">
                    <a class="dropdown-item" href="#">Mostrador(P)</a>
                    <a class="dropdown-item" href="#">Abono(P)</a>
                    <a class="dropdown-item" href="#">Apartados(P)</a>
                    <a class="dropdown-item" href="#">Reportes(P)</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="idInventario"  data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Inventario
                </a>
                <div class="dropdown-menu" aria-labelledby="idInventario">
                    <a class="dropdown-item" href="#">Existencias</a>
                    <a class="dropdown-item" href="#" onclick="ventanaInvFisico(1)">Inventario F&iacute;sico</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="idReportes"  data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Reportes
                </a>
                <div class="dropdown-menu" aria-labelledby="idReportes">
                    <a href="#">
                        <strong>Empeños</strong>
                    </a>
                    <ul>
                        <li><a class="dropdown-item" href="#">Hist&oacute;rico(P)</a></li>
                        <li><a class="dropdown-item" href="#" onclick="ventanaInvFisico(1)">Inventarios</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Contratos Vencidos(P)</a></li>
                        <li><a class="dropdown-item"href="#" onclick="ventanaInvFisico(2)">Contratos Almoneda</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Desempeños-detallado(P)</a></li>
                        <li><a class="dropdown-item" href="#">Refrendo-detallado(P)</a></li>

                    </ul>
                    <a href="#">
                        <strong>Financieros</strong>
                    </a>
                    <ul>
                        <li><a class="dropdown-item" href="#">Ingresos(P)</a></li>
                    </ul>
                    <a href="#">
                        <strong>Monitoreo</strong>
                    </a>
                    <ul>
                        <li><a class="dropdown-item" href="#">Re-Impresiones(P)</a></li>
                    </ul>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="idMovimientos" data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    Movimientos
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Pasar a Almoneda(P)</a>
                    <a class="dropdown-item" href="#">Cancelar Movimiento(P)</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>
