function validarUser() {
    var user = $("#usuario").val();
    var pass = $("#password").val();
    var validate = true;
    if(user==''||user==null){
        alertify.error("Por favor ingrese un usuario.");
        validate=false;
    }
    if(pass==''||pass==null){
        alertify.error("Por favor ingrese una contraseña.");
        validate=false;
    }
    if (validate) {
        var dataEnviar = {
            "User": user,
            "Pass": pass,
        };
        $.ajax({
            type: "POST",
            url: '../../../com.Mexicash/Controlador/contLogin.php',
            data: dataEnviar,
            success: function (response) {
                if(response>0){
                    location.href='../Empeno/vInicio.php'
                }else{
                    $('#resultado').html("Verifique usuario y contraseña.");
                }
            }

        });
    }
}

function pruebaLog() {
alert("entra");
}