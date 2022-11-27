<?php
require_once("../vendor/autoload.php");

//plantilla html
require_once("plantillas/reporte/prueba2.php");

$css = file_get_contents('../styles/styleAmortizationTable.css');

//base de datos
require_once('info.php');




$mpdf = new \Mpdf\Mpdf([
]);

$plantilla = getPlantilla($info);

$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);


$mpdf->Output();


?>