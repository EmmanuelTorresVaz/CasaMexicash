
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

        <form method="post" action="" id="formEmpeño">

            <div class="col-2" style="position: absolute; top: 10vh; padding-left: 4vw; height: 80vh;">
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
                <br/><br/>

                <h6>Beneficiario:</h6>
                <input type="text" name="txtApMCot" id="txtApMCot" placeholder="Nombre completo:" required/>

            </div>

            <div class="col-7" style="position: absolute; top: 10vh; left: 20vw; height: 83vh; border-left: 1px solid black; border-right: 1px solid black">
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

                <div style="position: relative; top: -15.8%; left: 0">
                    <nav>
                        <ul class="opcEmpeño">
                            <li>Metales</li>
                            <li>Electr&oacute;nico</li>
                        </ul>
                    </nav>
                </div>

                <div style="position: relative; top: -5%; left: 0; width: 240px">
                    <div class="ui-widget">
                        <input id="boxComoSeEntero" name="boxComoSeEntero" placeholder="¿C&oacute;mo se enter&oacute;?" required/>
                    </div>
                </div>

                <div class="opcInfoEmpeño">

                </div>

                <div class="resumenEmpeño">
                    <table>
                        <td>C&oacute;digo</td>
                        <td>Producto</td>
                        <td>Tipo</td>
                        <td>Aval&uacute;o</td>
                        <td>Pr&eacute;stamo</td>
                        <td>Observaciones</td>
                    </table>
                </div>

            </div>

            <div class="col-2" style="position: absolute; top: 10vh; right: 3vw; height: 80vh;">
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

                <div class="clearfix" style="width: 100%">
                    <div style="float: left; margin-right: 3%">
                        <h6>Periodo:</h6>
                        <div class="ui-widget">
                            <input id="boxPeriodo" name="boxPeriodo" style="width: 60px" placeholder="" required/>
                        </div>
                        <br/>
                    </div>
                    <div style="float: left; margin-right: 3%">
                        <h6>Plazo:</h6>
                        <div class="ui-widget">
                            <input id="boxPlazo" name="boxPlazo" style="width: 60px" placeholder="" required/>
                        </div>
                        <br/>
                    </div>
                    <div style="float: left;">
                        <h6>%Tasa:</h6>
                        <div class="ui-widget">
                            <input id="boxTasa" name="boxTasa" style="width: 60px" placeholder="" required/>
                        </div>
                        <br/>
                    </div>
                </div>

                <div class="clearfix" style="width: 100%">
                    <div style="float: left; margin-right: 3%">
                        <h6>%Tasa:</h6>
                        <div class="ui-widget">
                            <input id="boxTasa" name="boxTasa" style="width: 60px" placeholder="" required/>
                        </div>
                        <br/>
                    </div>

                    <div style="float: left;  margin-right: 3%">
                        <h6>%Alm:</h6>
                        <div class="ui-widget">
                            <input id="boxAlm" name="boxAlm" style="width: 60px" placeholder="" required/>
                        </div>
                        <br/>
                    </div>

                    <div style="float: left;">
                        <h6>%Seguro:</h6>
                        <div class="ui-widget">
                            <input id="boxSeguro" name="boxSeguro" style="width: 60px" placeholder="" required/>
                        </div>
                        <br/>
                    </div>

                </div>

                <div class="clearfix" style="width: 100%">

                    <div style="float: left; margin-right: 3%">
                        <h6>%IVA:</h6>
                        <div class="ui-widget">
                            <input id="boxIva" name="boxIva" style="width: 60px"  placeholder="" required/>
                        </div>
                        <br/>
                    </div>

                    <div style="float: left;">
                        <h6>Total Eval&uacute;o:</h6>
                        <input type="text" id="txtTotalEvaluo" name="txtTotalEvaluo" style="width: 125px" placeholder="0.00"/>
                        <br/>
                    </div>

                </div>

                <div class="clearfix" style="width: 100%">
                    <h6>Total Pr&eacute;stamo:</h6>
                    <input type="text" id="txtTotalPrestamo" name="txtTotalPrestamo" style="width: 198px" placeholder="0.00"/>
                </div>

                <!--<input type="submit" id="btnRegEmpeño" name="btnRegEmpeño" class="btn btn-outline-primary btn-lg" style="margin-left: 30px"/>
-->
            </div>

        </form>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../style/css/magicsuggest/magicsuggest-min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
</html>