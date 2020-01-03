<!DOCTYPE html>

<!--
    Página creada por ZB Developers
-->

<html lang="en" id="htmlLogin">
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
            <div class="Inicio-Sec1 " style="padding-left: 0">

                <div class="col div-Navegador container-fluid" >
                    <nav class="navbar navbar-expand-lg navbar-light bg-light navegador fijador">
                        <a class="navbar-brand ZBNav" href="#">ZB Developer</a>
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
            </div><!--Home-->
        </header>

        <div class="contenidoInicio container-fluid" style="padding: 0">
            <div class="home contChild">
            <!--
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner car" style="">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../img/imgHome1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../img/billete.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../img/pig.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            -->

                <div class="divHome">
                    <div class="lblHome1">
                        <br><br><br>
                        <p>&Uacute;nete a nuestra familia</p>
                        <span>Ven y forma parte de la extensa familia de MexiCash, quienes contamos con
                        los mejores planes de pago, las m&aacute;s bajas tasas de intereses y el mejor
                        cuidado a los productos y con nuestros clientes</span>
                        <br><br>
                        <span>Comienza ahora y descubre una valoraci&oacute;n est&aacute;ndar de tu producto</span>
                        <br><br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-outline-secondary">Empezar</button>
                    </div>
                    <div class="lblHome2"></div>
                </div>

                <div class="capaNegra"></div>

                <div class="infoHome">

                </div>


                <div class="contentParallax contentParallaxJunta parallax">
                    <div class="contenido">
                        <ul>
                            <li>5</li><p>Sucursales</p>
                            <li>3000</li><p>Clientes</p>
                            <li>130</li><p>Empleados</p>
                        </ul>
                    </div>
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


            </div>
            <div class="nosotros contChild">
                <canvas class="canvas" id="canvas"></canvas>
                <div class="menuNosotros">
                    <nav>
                        <ul>
                            <li><a href="#hNosotros">Nosotros</a></li>
                            <li><a href="#hHistoria">Nuestra Historia</a></li>
                            <li><a href="#hIniciativa">Iniciativas Verdes</a></li>
                            <li><a href="#hDonde">Donde</a></li>
                            <li><a href="#hProyectos">Proyectos Futuros</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="lblNosotros">
                    <h2 id="hNosotros">Nosotros</h2>
                    <br/>
                    <p>Los años en el camino del empeño nos ha permitido decir que m&aacute;s que una empresa,
                    somos una familia que se preocupa por todos los clientes y trabajadores.
                    </p>
                    <p>Miles de clientes satisfechos por toda la Ciudad de M&eacute;xico nos respaldan por el
                    alto servicio de gran calidad, cuidado y personalizaci&oacute;n</p>
                    <p>Nos caracterizamos por enfocarnos en el impacto de los
                    valores y buenas acciones, nos preocupamos por el medio ambiente y la huella que dejaremos
                    a futuras generaciones.
                    </p>
                    <br/>
                    <h2 id="hHistoria">Nuestra Historia</h2>
                    <br/>
                    <p>Mexicash, comenz&oacute; siendo un negocio pequeño en un austero local
                    en el centro de la ciudad, aunque pronto recibi&oacute; gran clientela que nos permiti&oacute;
                    expandirnos con m&aacute;s sucursales y trabajadores.
                    </p>
                </div>
                <br/><br/>
                <div class="infoHome">
                    <h2 id="hIniciativa">Iniciativas Verdes</h2>
                    <br/>
                    <p>En MexiCash, nos preocupamos por el uso de materiales biodegradables, as&iacute; como el
                        dejar de utilizar bolsas pl&aacute;sticas. A su vez, creemos que es de suma importancia
                        el reciclaje y separaci&oacute;n de desechos. Por eso y m&aacute;s, nos comprometemos
                        a regir las normativas de nuestros establecimientos bajo la Norma ISO 140001.</p>
                </div>
                <div class="contentParallax contentParallaxDinero parallax">
                    <div class="contenido">
                        <ul>
                            <li>5</li><p>Sucursales</p>
                            <li>3000</li><p>Clientes</p>
                            <li>130</li><p>Empleados</p>
                        </ul>
                    </div>
                </div>

                <div class="mapa"></div>

            </div>
            <div class="comoEmpeño contChild">
                <canvas class="canvas2" id="canvas2"></canvas>
            </div>
            <div class="contacto contChild"></div>
            <div class="login contChild">
                <div class="capa-Negra"></div><!--div Capa-Negra-->

                <div class="container-fluid">
                    <ul class="circle-area">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div><!--Area-Animación-Home-->
                <form id="log" name="form1" method="post" action="../../com.Mexicash/Controlador/contLogin.php" autocomplete="off">
                    <h3>Iniciar Sesion</h3>
                    <br/><br/>
                    <h5>Usuario:</h5>
                    <input type="text" name="usuario" id="usuario" class="form-control" style="background-color: transparent; width: 80%; margin-left: 5%" placeholder="Correo Electr&oacute;nico o usuario:"/>
                    <br/>
                    <h5>Contraseña:</h5>
                    <input type="password" name="password" id="password" class="form-control" style="background-color: transparent; width: 80%; margin-left: 5%" placeholder="*****************"/>
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