<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Registro Clientes</title>

    <link rel="stylesheet" href="../style/less/main.css"/>
    <link rel="stylesheet" href="../style/css/bootstrap/bootstrap.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../style/css/magicsuggest/magicsuggest-min.css" rel="stylesheet">

    <script>
        $(document).ready(function () {
            $('.menuContainer').load('../html/menu.php');
        });
    </script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

</head>
    <body>
        <div class="menuContainer" ></div>

        <h4 style="position: absolute; width: 95%; text-align: center; top: 9.5%">Registro de Cliente</h4>

        <form method="post" name="formCliente" action="../../com.Mexicash/Controlador/RegistroCliente.php">

            <div class="col-2" style="position: absolute; top: 15vh; padding-left: 4vw; height: 80vh;">
                <h6>Sexo:</h6>
                <select class="boxSexo" name="boxSexo" id="boxSexo" required>
                    <option value="">Selecciona uno</option>
                    <option value="1">Hombre</option>
                    <option value="2">Mujer</option>
                    <option value="3">No definido</option>
                </select>
                <br><br>

                <h6>Fecha Nacimiento:</h6>
                <input type="text" id="datepicker" name="inFechaNac" placeholder="Fecha [dd/mm/aa]" required/>
                <br><br>

                <h6>CURP:</h6>
                <input type="text" id="inCurp" name="inCurp" placeholder="" required/>

            </div>

            <div class="col-7" style="position: absolute; top: 15vh; left: 20vw; height: 83vh; border-left: 1px solid black; border-right: 1px solid black">
                <h6>Nombre(s):</h6>
                <input type="text" name="inNombre" id="inNombre" placeholder="Nombres" style="width: 240px" required/>

                <div style="position: relative; top: -9.9%; left: 35%">
                    <h6>Apellido Paterno:</h6>
                    <input type="text" name="inApPat" id="inApPat" placeholder="Apellido Paterno" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -19.8%; left: 70%">
                    <h6>Apellido Materno:</h6>
                    <input type="text" name="inApMat" id="inApMat" placeholder="Apellido Materno" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -14%; left: 5%">
                    <h6 style="width: 90%; text-align: center">Ocupacion o actividad del cliente:</h6>
                    <select type="text" name="boxOcupacion" placeholder="Selecciona uno" id="boxOcupacion" style="width: 90%; " required>
                        <option value="">Selecciona Uno</option>
                        <option value="1">Estudiante</option>
                        <option value="2">Youtuber</option>
                        <option value="3">Agente de la URSS</option>
                        <option value="4">Catador de alitas buffalo</option>
                        <option value="5">Doble de peliculas bajo alto riesgo</option>
                    </select>
                </div>

                <div style="position: relative; top: -8.5%; left: 4%">
                    <h6>Tipo de Identificaci&oacute;n:</h6>
                    <select type="text" name="boxIdentificacion" placeholder="Selecciona uno" id="boxIdentificacion" style="width: 21%" required>
                        <option value="">Selecciona Uno</option>
                        <option value="1">Cartilla de Servicio Militar</option>
                        <option value="2">C&eacute;dula Profesional</option>
                        <option value="3">Certificado de matr&iacute;cula consular</option>
                        <option value="4">Credenciales y Carnets expedidos por el IMSS</option>
                        <option value="5">Documentaci&oacute;n expedida por el INE</option>
                        <option value="6">INE</option>
                        <option value="7">Pasaporte</option>
                        <option value="8">Licencia para conducir</option>
                        <option value="9">Credencial emitida por autoridades estatales</option>
                        <option value="10">Credencial emitida por autoridades federales</option>
                        <option value="11">Credencial emitida por autoridades municipales</option>
                        <option value="12">Tarjeta de afiliaci&oacute; al INP</option>
                        <option value="13">Tarjeta &uacute;nica de identificaci&oacute;n militar</option>
                    </select>
                </div>

                <div style="position: relative; top: -18.4%; left: 33%">
                    <h6>No. Identificaci&oacute;n:</h6>
                    <input type="text" name="inNoIdentificacion" placeholder="" id="inNoIdentificacion" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -28.3%; left: 69%">
                    <h6>RFC:</h6>
                    <input type="text" name="inRfc" id="inRfc" placeholder="" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -21%; left: 4%">
                    <h6>Calle:</h6>
                    <input type="text" name="inCalle" placeholder="" id="inCalle" style="width: 200px" required/>
                </div>

                <div style="position: relative; top: -30.9%; left: 33%">
                    <h6>No. Exterior:</h6>
                    <input type="text" name="inNoExt" placeholder="" id="inNoExt" style="width: 100px" required/>
                </div>

                <div style="position: relative; top: -40.8%; left: 49.5%">
                    <h6>No. Interior</h6>
                    <input type="text" name="inNoInt" placeholder="" id="inNoInt" style="width: 100px" required/>
                </div>

                <div style="position: relative; top: -50.7%; left: 69%">
                    <h6>Colonia:</h6>
                    <input type="text" name="inColonia" placeholder="" id="inColonia" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -44%; left: 4%">
                    <h6>Alcald&iacute;a:</h6>
                    <div class="ui-widget">
                        <input id="inAlcaldia" name="inAlcaldia" placeholder="Escribe una alcald&iacute;a" required>
                    </div>
                </div>

                <div style="position: relative; top: -53.9%; left: 33%">
                    <h6>Estado de Residencia:</h6>
                    <div class="ui-widget">
                        <input id="inEstadoActual" name="inEstadoActual" placeholder="Escribe un estado" style="width: 240px" required>
                    </div>
                </div>

                <div style="position: relative; top: -63.8%; left: 69%">
                    <h6>CP:</h6>
                    <input type="text" name="inCP" placeholder="" id="inCP" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -58%; left: 5%">
                    <h6 style="width: 90%; text-align: center">Mensaje de uso Interno</h6>
                    <input type="text" name="inMsjInt" placeholder="" id="inMsjInt" style="width: 90%" required/>
                </div>

                <div style="position: relative; top: -53%; left: 5%">
                    <h6 style="width: 40%; text-align: center">Promoci&oacute;n:</h6>
                    <input type="text" name="inInstFin" placeholder="" id="inInstFin" style="width: 40%" required/>
                </div>


            </div>

            <div class="col-2" style="position: absolute; top: 15vh; right: 3vw; height: 80vh;">
                <h4>Contacto</h4>
                <br/>
                <h6>Celular:</h6>
                <input type="text" name="inCelular" id="inCelular" placeholder="N&uacute;mero con lada" required/>
                <br><br>

                <h6>Tel&eacute;fono:</h6>
                <input type="text" name="inTelefono" id="inTelefono" placeholder="N&uacute;mero con lada" required/>
                <br><br>

                <h6>Correo Electr&oacute;nico:</h6>
                <input type="text" name="inCorreo" id="inCorreo" placeholder="" required/>
                <br/><br/><br/><br/><br/><br/>

                <input type="submit" id="btnRegCliente" name="btnRegCliente" class="btn btn-outline-primary btn-lg" style="margin-left: 30px"/>

            </div>

        </form>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../style/css/magicsuggest/magicsuggest-min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
</html>
