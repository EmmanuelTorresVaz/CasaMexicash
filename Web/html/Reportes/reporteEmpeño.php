<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dirs.php');
include_once (SERVICIOS_PATH."pdf/vendor/autoload.php");

include_once (SERVICIOS_PATH."pdf/plantillas/plantillaReporte.php");


$css = file_get_contents(STYLE_PATH."css/pdfCSS/reportesPDF.css");

$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla();

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output();