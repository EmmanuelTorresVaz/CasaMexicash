var contador = 1;
function myFunction(x){
    if(contador%2!==0){
        x.classList.toggle("change");
        var a = document.getElementById('menu');
        a.style.display="block";
        contador+=1;
    }
    else{
        if(contador%2===0){
            x.classList.toggle("change");
            var a = document.getElementById('menu');
            a.style.display="none";
            contador+=1;
        }
    }
}
var cont = 1;
function menu(x, opc){

        x.classList.toggle("change");
        var a;
        switch (opc) {
            case 1:
                a = document.getElementById('empeño');
                break;
            case 2:
                a = document.getElementById('cierre');
                break;
            case 3:
                a = document.getElementById('ventas');
                break;
            case 4:
                a = document.getElementById('inventario');
                break;
            case 5:
                a = document.getElementById('reportes');
                break;
            case 6:
                a = document.getElementById('movimientos');
                break;
            case 7:
                a = document.getElementById('antilavado');
                break;
            case 8:
                a = document.getElementById('utilerias');
                break;
            case 9:
                a = document.getElementById('cuenta');
                break;
        }
        if(cont%2 !== 0){
            x.classList.toggle("change");
            a.style.display="block";
        }
        else{
            if(cont%2===0){
                x.classList.toggle("change");
                a.style.display="none";
            }
        }
        cont += 1;
}

function closeMenu(x) {
    x.classList.toggle("change");
    var wid = document.getElementById('menu');
    wid.style.display="none";
}

$( function() {
    var paises = [
        "Afganistán",
        "Albania",
        "Alemania",
        "Andorra",
        "Angola",
        "Antigua y Barbuda",
        "Arabia Saudita",
        "Argelia",
        "Argentina",
        "Armenia",
        "Australia",
        "Austria",
        "Azerbaiyán",
        "Bahamas",
        "Bangladés",
        "Barbados",
        "Baréin",
        "Bélgica",
        "Belice",
        "Benín",
        "Bielorrusia",
        "Birmania",
        "Bolivia",
        "Bosnia y Herzegovina",
        "Botsuana",
        "Brasil",
        "Brunéi",
        "Bulgaria",
        "Burkina Faso",
        "Burundi",
        "Bután",
        "Cabo Verde",
        "Camboya",
        "Camerún",
        "Canadá",
        "Catar",
        "Chad",
        "Chile",
        "China",
        "Chipre",
        "Ciudad del Vaticano",
        "Colombia",
        "Comoras",
        "Corea del Norte",
        "Corea del Sur",
        "Costa de Marfil",
        "Costa Rica",
        "Croacia",
        "Cuba",
        "Dinamarca",
        "Dominica",
        "Ecuador",
        "Egipto",
        "El Salvador",
        "Emiratos Árabes Unidos",
        "Eritrea",
        "Eslovaquia",
        "Eslovenia",
        "España",
        "Estados Unidos",
        "Estonia",
        "Etiopía",
        "Filipinas",
        "Finlandia",
        "Fiyi",
        "Francia",
        "Gabón",
        "Gambia",
        "Georgia",
        "Ghana",
        "Granada",
        "Grecia",
        "Guatemala",
        "Guyana",
        "Guinea",
        "Guinea ecuatorial",
        "Guinea-Bisáu",
        "Haití",
        "Honduras",
        "Hungría",
        "India",
        "Indonesia",
        "Irak",
        "Irán",
        "Irlanda",
        "Islandia",
        "Islas Marshall",
        "Islas Salomón",
        "Israel",
        "Italia",
        "Jamaica",
        "Japón",
        "Jordania",
        "Kazajistán",
        "Kenia",
        "Kirguistán",
        "Kiribati",
        "Kuwait",
        "Laos",
        "Lesoto",
        "Letonia",
        "Líbano",
        "Liberia",
        "Libia",
        "Liechtenstein",
        "Lituania",
        "Luxemburgo",
        "Macedonia del Norte",
        "Madagascar",
        "Malasia",
        "Malaui",
        "Maldivas",
        "Malí",
        "Malta",
        "Marruecos",
        "Mauricio",
        "Mauritania",
        "México",
        "Micronesia",
        "Moldavia",
        "Mónaco",
        "Mongolia",
        "Montenegro",
        "Mozambique",
        "Namibia",
        "Nauru",
        "Nepal",
        "Nicaragua",
        "Níger",
        "Nigeria",
        "Noruega",
        "Nueva Zelanda",
        "Omán",
        "Países Bajos",
        "Pakistán",
        "Palaos",
        "Panamá",
        "Papúa Nueva Guinea",
        "Paraguay",
        "Perú",
        "Polonia",
        "Portugal",
        "Reino Unido",
        "República Centroafricana",
        "República Checa",
        "República del Congo",
        "República Democrática del Congo",
        "República Dominicana",
        "República Sudafricana",
        "Ruanda",
        "Rumanía",
        "Rusia",
        "Samoa",
        "San Cristóbal y Nieves",
        "San Marino",
        "San Vicente y las Granadinas",
        "Santa Lucía",
        "Santo Tomé y Príncipe",
        "Senegal",
        "Serbia",
        "Seychelles",
        "Sierra Leona",
        "Singapur",
        "Siria",
        "Somalia",
        "Sri Lanka",
        "Suazilandia",
        "Sudán",
        "Sudán del Sur",
        "Suecia",
        "Suiza",
        "Surinam",
        "Tailandia",
        "Tanzania",
        "Tayikistán",
        "Timor Oriental",
        "Togo",
        "Tonga",
        "Trinidad y Tobago",
        "Túnez",
        "Turkmenistán",
        "Turquía",
        "Tuvalu",
        "Ucrania",
        "Uganda",
        "Uruguay",
        "Uzbekistán",
        "Vanuatu",
        "Venezuela",
        "Vietnam",
        "Yemen",
        "Yibuti",
        "Zambia",
        "Zimbabue",
    ];
    var estados = [
        "Aguascalientes",
        "Baja California Norte",
        "Baja California Sur",
        "Campeche",
        "Chiapas",
        "Chihuahua",
        "Coahuila",
        "Colima",
        "Distrito Federal",
        "Durango",
        "Estado de México",
        "Guanajuato",
        "Guerrero",
        "Hidalgo",
        "Jalisco",
        "Michoacán",
        "Morelos",
        "Nayarit",
        "Nuevo León",
        "Oaxaca",
        "Puebla",
        "Querétaro",
        "Quintana Roo",
        "San Luis Potosí",
        "Sinaloa",
        "Sonora",
        "Tabasco",
        "Tamaulipas",
        "Tlaxcala",
        "Veracruz",
        "Yucatán",
        "Zacatecas",
    ];
    var alcaldias = [
        "Álvaro Obregón",
        "Benito Juárez",
        "Coyoacán",
        "Cuajimalpa",
        "Cuauhtémoc",
        "Gustavo A. Madero",
        "Iztacalco",
        "Iztapalapa",
        "Magdalena Contreras",
        "Miguel Hidalgo",
        "Milpa Alta",
        "Tláhuac",
        "Tlalpan",
        "Venustiano Carranza",
        "Xochimilco",
    ];
    var tasaInteres = [
        'tasa 1',
        'tasa 2',
        'tasa 3',
        'tasa 4'
    ];
    var tipoInteres = [
      'tipo 1',
      'tipo 2',
      'tipo 3'
    ];

    $( "#inPaises" ).autocomplete({
        source: paises
    });
    $( "#inEstados" ).autocomplete({
        source: estados
    });

    $( "#inAlcaldia" ).autocomplete({
        source: alcaldias
    });
    $( "#inEstadoActual" ).autocomplete({
        source: estados
    });
    $( "#boxTasaInteres" ).autocomplete({
        source: tasaInteres
    });
    $( "#boxTipoInteres" ).autocomplete({
        source: tipoInteres
    });
} );

/************************************************Pagina Principal*************************************************/

$(function () {
    $('.contenidoInicio .contChild').hide();
    $('.home').show();
    $('.navInicio a').on('click', function () {

        $('.contenidoInicio .contChild:first').show();

        var link = $(this).attr('id');
        $(link).fadeIn(1000);
        switch (link) {
            case 'home':
                $('.contenidoInicio .contChild').hide();
                $('.contenidoInicio .contChild:nth-child(1)').show();
                break;
            case 'nosotros':
                $('.contenidoInicio .contChild').hide();
                $('.contenidoInicio .contChild:nth-child(2)').show();
                break;
            case 'comoEmpeño':
                $('.contenidoInicio .contChild').hide();
                $('.contenidoInicio .contChild:nth-child(3)').show();
                break;
            case 'contacto':
                $('.contenidoInicio .contChild').hide();
                $('.contenidoInicio .contChild:nth-child(4)').show();
                break;
            case 'login':
                $('.contenidoInicio .contChild').hide();
                $('.contenidoInicio .contChild:nth-child(5)').show();
                $('#htmlLogin').style.overflowY = "hidden";
                break;
        }
    })
})

/************************************Obtención de los campos RegistroCliente**************************************/

function obtenDatosCliente() {

    var boxPersona = document.getElementsByName('boxPersona');
    var boxSexo = document.getElementsByName('boxSexo');
    var inFechaNac = document.getElementsByName('inFechaNac');
    var inPaises = document.getElementsByName('inPaises');
    var inEstados = document.getElementsByName('inEstados');
    var inCurp = document.getElementsByName('inCurp');
    var inNombre = document.getElementsByName('inNombre');
    var inApPat = document.getElementsByName('inApPat');
    var inApMat = document.getElementsByName('inApMat');
    var boxOcupacion = document.getElementsByName('boxOcupacion');
    var boxIdentificacion = document.getElementsByName('boxIdentificacion');
    var inNoIdentificacion = document.getElementsByName('inNoIdentificacion');
    var inRfc = document.getElementsByName('inRfc');
    var inCalle = document.getElementsByName('inCalle');
    var inNoExt = document.getElementsByName('inNoExt');
    var inNoInt = document.getElementsByName('inNoInt');
    var inColonia = document.getElementsByName('inColonia');
    var inAlcaldia = document.getElementsByName('inAlcaldia');
    var inEstadoActual = document.getElementsByName('inEstadoActual');
    var inCP = document.getElementsByName('inCP');
    var inMsjInt = document.getElementsByName('inMsjInt');
    var inInstFin = document.getElementsByName('inInstFin');
    var inCelular = document.getElementsByName('inCelular');
    var inTelefono = document.getElementsByName('inTelefono');
    var inCorreo = document.getElementsByName('inCorreo');



}

/*****************************************************Canvas******************************************************************/

$(function () {
    const ALTURA_CANVAS = 500,
        ANCHURA_CANVAS = 1536;

// Obtener el elemento del DOM
    const canvas = document.querySelector("#canvas");
    canvas.width = ANCHURA_CANVAS;
    canvas.height = ALTURA_CANVAS;
// Del canvas, obtener el contexto para poder dibujar
    const contexto = canvas.getContext("2d");

// Mover a donde comienza la curva
    let inicioX = 1200, inicioY = -5;
    contexto.moveTo(inicioX, inicioY);
// Coordenadas del primer punto
    let puntoX1 = 1600,
        puntoY1 = 250;
// Coordenadas del segundo punto
    let puntoX2 = 1250,
        puntoY2 = 400;
// Coordenadas en donde termina la curva
    let x = 1540, y = 450;

    var my_gradient = contexto.createLinearGradient(0, 0, 170, 0);
    my_gradient.addColorStop(0, "#8942a8");
    my_gradient.addColorStop(1, "#ba382f");

    contexto.lineWidth = 20;
    contexto.bezierCurveTo(puntoX1, puntoY1, puntoX2, puntoY2, x, y);
    contexto.strokeStyle = my_gradient;
    contexto.stroke();
/**************************************************************************************************/
    // Obtener el elemento del DOM
    const canvas2 = document.querySelector("#canvas2");
    canvas2.width = ANCHURA_CANVAS;
    canvas2.height = ALTURA_CANVAS;
// Del canvas, obtener el contexto para poder dibujar
    const contexto2 = canvas2.getContext("2d");

// Mover a donde comienza la curva
    let inicioXX = 336, inicioYY = -5;
    contexto2.moveTo(inicioXX, inicioYY);
// Coordenadas del primer punto
    let puntoX11 = -64,
        puntoY11 = 250;
// Coordenadas del segundo punto
    let puntoX22 = 286,
        puntoY22 = 400;
// Coordenadas en donde termina la curva
    let xx = -4, yy = 450;

    var my_gradient2 = contexto2.createLinearGradient(0, 0, 170, 0);
    my_gradient2.addColorStop(0, "#8942a8");
    my_gradient2.addColorStop(1, "#ba382f");

    contexto2.lineWidth = 20;
    contexto2.bezierCurveTo(puntoX11, puntoY11, puntoX22, puntoY22, xx, yy);
    contexto2.strokeStyle = my_gradient2;
    contexto2.stroke();

});