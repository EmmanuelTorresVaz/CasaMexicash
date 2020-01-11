<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (SERVICIOS_PATH."pdf/vendor/autoload.php");

include_once (SERVICIOS_PATH."pdf/plantillas/plantillaReporte.php");

$empe = filter_input(INPUT_POST, 'Empe', FILTER_VALIDATE_BOOLEAN);
if (!isset($_POST['Empe'])){ $empe = 0; }

$desemp = filter_input(INPUT_POST, 'Desemp', FILTER_VALIDATE_BOOLEAN);
if (!isset($_POST['Desemp'])){ $desemp = 0; }

$refrendo = filter_input(INPUT_POST, 'Refrendo', FILTER_VALIDATE_BOOLEAN);
if (!isset($_POST['Refrendo'])){ $refrendo = 0; }

$almoneda = filter_input(INPUT_POST, 'Almoneda', FILTER_VALIDATE_BOOLEAN);
if (!isset($_POST['Almoneda'])){ $almoneda = 0; }

$auto = filter_input(INPUT_POST, 'Auto', FILTER_VALIDATE_BOOLEAN);
if (!isset($_POST['Auto'])){ $auto = 0; }


$css = file_get_contents(STYLE_PATH."css/pdfCSS/reportesPDF.css");

$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getInventarioFisico($empe, $desemp, $refrendo, $almoneda, $auto);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output();