<!DOCTYPE html>

<!--
    Página creada por ZB Developers
-->

<html lang="en" id="htmlInicial">
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../style/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../style/less/pagPrincipal.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic&display=swap" rel="stylesheet">
    <title class="">ZB Developer</title>

</head>
    <body id="bodyHome">

        <header>
            <div class="container-fluid Inicio-Sec1 " >

                <div class="col div-Navegador container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light navegador fijador">
                        <a class="navbar-brand ZBNav" href="#">MexiCash</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav nav-Home-collapsed navInicio">
                                <a id="home" name="home" class="nav-item nav-link active" href="#">Home<span class="sr-only">(current)</span></a>
                                <a id="nosotros" name="nosotros" class="nav-item nav-link" href="#">Nosotros</a>
                                <a id="comoEmpeño" name="comoEmpeño" class="nav-item nav-link" href="#">¿C&oacute;mo empeñar?</a>
                                <a id="contacto" name="contacto" class="nav-item nav-link" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
                                <a id="login" name="login" class="nav-item nav-link menu-Opcion-Login" href="#">Iniciar Sesión</a>
                                <!--
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                -->
                                <form class="navbar-form navbar-left buscador" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control caja" placeholder="Buscar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div ><!--Barra Navegación Home-->

                <div class="capa-Negra" ></div><!--div Capa-Negra-->

                <div class="container-fluid" >
                    <ul class="circle-area">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div><!--Area-Animación-Home-->

            </div><!--Home-->
        </header>

        <div class="contenidoInicio">
            <div class="home contChild"></div>
            <div class="nosotros contChild"></div>
            <div class="comoEmpeño contChild"></div>
            <div class="contacto contChild"></div>
            <div class="login contChild">
                <form id="log" name="form1" method="post" action="../../com.Mexicash/Peticiones/PeticionesUsuario.php" autocomplete="off">
                    <h3>Iniciar Sesion</h3>
                    <br/><br/>
                    <h5>Usuario:</h5>
                    <input type="text" class="form-control" style="background-color: transparent; width: 80%; margin-left: 5%" placeholder="Correo Electr&oacute;nico o usuario:"/>
                    <br/>
                    <h5>Contraseña:</h5>
                    <input type="password" class="form-control" style="background-color: transparent; width: 80%; margin-left: 5%" placeholder="*****************"/>
                    <br/><br/>
                    <input type="submit" class="sub btn btn-outline-secondary" value="Entrar">
                </form>
            </div>
        </div>

        <!--Scripts-->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/main/main.js"></script>
        <script src="../js/jquery-1.12.0.min.js"></script>
    </body>
</html>