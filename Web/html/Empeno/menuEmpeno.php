<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrapNav.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/alertifyjs/css/themes/default.css">
    <script src="../../librerias/jquery-3.4.1.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../librerias/bootstrap/js/bootstrapNav.js"></script>
    <script src="../../librerias/alertifyjs/alertify.js"></script>
    <script src="../../librerias/popper.min.js"></script>
    <!--Calendario-->
<!--    <script src="../../JavaScript/funcionesCalendario.js"></script>
--></head>
<body>
<nav class="navbar navbar-expand-xl bg-success navbar-dark">
    <a class="navbar-brand" href="vInicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Empeño
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="vEmpeno.php">Empeños</a></li>
                    <li><a class="dropdown-item" href="vDesempeno.php">Desempeños</a></li>
                    <li><a class="dropdown-item" href="vRefrendo.php">Refrendo</a></li>
                    <li><a class="dropdown-item" href="vConsulta.php">Consulta</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Auto
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="vAuto.php">Empeños</a></li>
                    <li><a class="dropdown-item" href="vDesempenoAuto.php">Desempeños</a></li>
                    <li><a class="dropdown-item" href="vRefrendoAuto.php">Refrendo</a></li>
                    <li><a class="dropdown-item" href="vConsulta.php">Consulta</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cierre
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="../Cierre/vCierre.php">Cierre de Sucursal(P)</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
</body>
</html>
