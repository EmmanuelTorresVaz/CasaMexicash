<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <!--   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css"/>
     <script src="../../librerias/jquery/jquery-3.4.1.min.js"></script>
     <script src="../../librerias/bootstrap/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../librerias/jsPDF/jspdf.min.js"></script>


    <script type="application/javascript">
        function demoFromHTML() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#customers')[0];

            // we support special element handlers. Register them with jQuery-style
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function (element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 522
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },

                function (dispose) {
                    // dispose: object with X, Y of the last line add to the PDF
                    //          this allow the insertion of new lines after html
                    pdf.save('Contrato.pdf');
                }, margins);
        }
    </script>

</head>
<body>
<div id="customers">
    <table id="tab_customers" >
        <colgroup>
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
        </colgroup>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Contrato</td>
            <td></td>
        </tr>
        <tr>
            <td>Fecha de celebración del contrato: CIUDAD DE MEXICO NA a 9/ene/2020
                CONTRATO DE MUTUO CON INTERÉS Y GARANTÍA PRENDARIA (PRESTAMO), que celebran: MIRIAM GAMA VAZQUEZ, "EL PROVEEDOR", con
                domicilio en: AV. AZTECAS 4380 CIUDAD DE MEXICO NA , R.F.C.: GAVM800428KQ3, Tel.: 5525252125, correo electrónico: na, y el "EL CONSUMIDOR",
                GERARDO CRUZ PEREZ que se identifica con: INE número: 0390094720327 con domicilio en: JALTIPA COL. PGAL DE SANTO DOMINGO COYOACAN,
                DISTRITO FEDERAL Tel.: correo electrónico: x quien designa como cotitular a: con domicilio en AV. AZTECAS y beneficiario a: solo para efectos de este
                contrato.</td>
        </tr>
        <tr>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
        </tr>
        <tr>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
        </tr>
        <tr>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
        </tr>
        <tr>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>Chinna</td>
            <td>1,363,480,000</td>
            <td>March 24, 2014</td>
            <td>19.1</td>
        </tr>
        </tbody>
    </table>
</div>
<button onclick="javascript:demoFromHTML();">PDF</button>
</body>
</html>