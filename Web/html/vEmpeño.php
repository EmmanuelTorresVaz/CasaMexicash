
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Empe&ntilde;o</title>

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

        <input type="text" id="" name="" placeholder="" required/>

        <form method="post" action="" id="formEmpeño">

            <div class="col-2" style="position: absolute; top: 15vh; padding-left: 4vw; height: 80vh;">
                <h5>Datos del cliente:</h5>
                <br>

                <h6>Nombre del cliente:</h6>
                <input type="text" id="txtNombreClienteEmpeño" name="txtNombreClienteEmpeño" placeholder="Selecciona uno:" required/>
                <br><br>

                <h6>Direcci&oacute;n del cliente:</h6>
                <input type="text" class="txtDireccionEmpeño" id="txtDireccionEmpeño" placeholder="Direcci&oacute;n registrada:" disabled required/>

                <br><br>

                <h6>Ciudad del cliente:</h6>
                <input type="text" class="txtCiudadEmpeño" id="txtCiudadEmpeño" placeholder="Ciudad registrada:" disabled required/>
                <br><br>

                <h6>Correo Electr&oacute;nico:</h6>
                <input type="text" class="txtCorreoEmpeño" id="txtCorreoEmpeño" name="txtCorreoEmpeño" placeholder="Correo registrado:" disabled required/>
                <br><br/>

                <h6>N&uacute;mero celular:</h6>
                <input type="text" class="txtCelularEmpeño" id="txtCelularEmpeño" name="txtCelularEmpeño" placeholder="Celular registrado:" disabled required/>

            </div>

            <div class="col-7" style="position: absolute; top: 15vh; left: 20vw; height: 83vh; border-left: 1px solid black; border-right: 1px solid black">
                <h5>Datos del Cotitular:</h5>
                <h6>Nombre(s):</h6>
                <input type="text" name="txtNombreCot" id="txtNombreCot" placeholder="Nombres" style="width: 240px" required/>

                <div style="position: relative; top: -9.9%; left: 35%">
                    <h6>Apellido Paterno:</h6>
                    <input type="text" name="txtApPCot" id="txtApPCot" placeholder="Apellido Paterno" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -19.8%; left: 70%">
                    <h6>Apellido Materno:</h6>
                    <input type="text" name="txtApMCot" id="txtApMCot" placeholder="Apellido Materno" style="width: 240px" required/>
                </div>

                <div style="position: relative; top: -14%; left: 30%">
                    <h6>Beneficiario:</h6>
                    <input type="text" name="txtApMCot" id="txtApMCot" placeholder="Nombre completo del beneficiario:" style="width: 40%" required/>
                </div>
            </div>

            <div class="col-2" style="position: absolute; top: 15vh; right: 3vw; height: 80vh;">
                <h5>Contrato</h5>
                <br/>
                <h6>Fecha de Vencimiento:</h6>
                <input type="text" id="datepicker" name="txtFechaVencimiento" placeholder="Fecha [dd/mm/aa]" required/>
                <br><br>

                <h6>Tasa de inter&eacute;s:</h6>
                <div class="ui-widget">
                    <input id="boxTasaInteres" name="boxTasaInteres" placeholder="Tasa:" required/>
                </div>
                <br>

                <h6>Tipo de inter&eacute;s:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" placeholder="Tipo Interes:" required/>
                </div>
                <br/>

                <h6>Periodo:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" style="width: 60px" placeholder="Tipo Interes:" required/>
                </div>
                <br/>

                <h6>Plazo:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" style="width: 60px" placeholder="Tipo Interes:" required/>
                </div>
                <br/>

                <h6>%Tasa:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" placeholder="Tipo Interes:" required/>
                </div>
                <br/>

                <h6>%Alm:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" placeholder="Tipo Interes:" required/>
                </div>
                <br/>

                <h6>%Seguro:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" placeholder="Tipo Interes:" required/>
                </div>
                <br/>

                <h6>%IVA:</h6>
                <div class="ui-widget">
                    <input id="boxTipoInteres" name="boxTipoInteres" placeholder="16%" required/>
                </div>
                <br/>

                <input type="submit" id="btnRegEmpeño" name="btnRegEmpeño" class="btn btn-outline-primary btn-lg" style="margin-left: 30px"/>

            </div>

        </form>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../style/css/magicsuggest/magicsuggest-min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
</html>