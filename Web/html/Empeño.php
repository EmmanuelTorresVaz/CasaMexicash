
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

        <div class="infoClienteEmpeño">
            <h4>Empe&ntilde;os</h4>
            <form method="post" action="" id="formEmpeño">
                <h6>Nombre del Cliente:</h6>
                <input type="text" class="txtNombreEmpeño" placeholder="Nombres del cliente:" required/>
                <h6>Direcci&oacute;n del cliente:</h6>
                <input type="text" class="txtDireccionEmpeño" placeholder="Direcci&oacute;n registrada:" disabled required/>
                <h6>Ciudad del cliente:</h6>
                <input type="text" class="txtCiudadEmpeño" placeholder="Ciudad registrada:" disabled required/>
                <div class="divCotitular">
                    <h6>Nombre(s):</h6>
                    <input type="text" class="txtNombreCoti" placeholder="Nombres del cotitular:" required/>
                    <h6>Apellido paterno:</h6>
                    <input type="text" class="txtApPCot" placeholder="Apellido Paterno:" required/>
                    <h6>Apellido Materno:</h6>
                    <input type="text" class="txtApMCot" placeholder="Apellido Materno" required/>
                    <h6>Beneficiario:</h6>
                    <input type="text" class="txtBeneficiario" placeholder="Nombre del beneficiario:" required/>
                </div>
                <input id="btnRegEmpeño" name="btnRegEmpeño" class="btn btn-outline-primary btn-lg" type="submit" value="Entrar"/>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../style/css/magicsuggest/magicsuggest-min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
</html>