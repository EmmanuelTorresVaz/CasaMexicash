<!DOCTYPE html>
<html lang="en">
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
    <!-- bootstrap 4 -->


    <title>Mexicash</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-success navbar-dark fixed-top" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="vInicio.php">Inicio</a>
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
                    <a class="dropdown-item" href="vEmpeno.php">Empeños</a>
                    <a class="dropdown-item" href="vDesempeno.php">Desempeños</a>
                    <a class="dropdown-item" href="vRefrendo.php">Refrendo</a>
                    <a class="dropdown-item" href="vConsulta.php">Consulta</a>
                    <a class="dropdown-item" href="vAuto.php">Auto</a>
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
            <li class="nav-item dropdown">
                <a class="nav-link" href="../../../index.php" id="idMovimientos" data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
               Salir</a>

            </li>
        </ul>
    </div>
</nav>
</body>
</html>
