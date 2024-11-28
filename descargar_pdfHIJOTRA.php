<?php
require 'vendor/autoload.php'; // Asegúrate de que DOMPDF esté incluido

use Dompdf\Dompdf;
use Dompdf\Options;

// Captura los datos del formulario
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$nombre = $_POST['nombre'];
$semestre = $_POST['semestre'];
$programa = $_POST['programa'];
$matricula = $_POST['matricula'];
$semestre_beca = $_POST['semestre_beca'];
$tutor = $_POST['tutor'];
$nombre_firma = $_POST['nombre_firma'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Configura DOMPDF
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// HTML para el PDF, incluyendo los datos del formulario
$html = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Solicitud de Beca de Aprovechamiento</title>
    <style>
        body { font-family: Arial, sans-serif; }
        p, h3 { margin: 0.5em 0; }
    </style>
</head>
<body>
    <p style='text-align: right;'>El Saucillo, Huichapan, Hidalgo a $dia de $mes de $anio</p>
    <h3>Asunto: Solicitud de Beca para Trabajadores e Hijos de Trabajadores</h3>
    <p>COMITÉ DE BECAS<br>DEL INSTITUTO TECNOLÓGICO SUPERIOR DE HUICHAPAN<br><strong>P R E S E N T E</strong></p>
    <p>Con el gusto de saludarle, el que suscribe $nombre, estudiante del $semestre semestre del Programa Educativo de Ingeniería en $programa con número de matrícula $matricula, me dirijo de la manera más atenta y respetuosa, para postularme al proceso de la Beca para Trabajadores e Hijos de Trabajadores $semestre_beca del año $anio.</p>
    <p>Es importante mencionar que en el semestre inmediato anterior acredite todas mis asignaturas y obtuve un promedio general mayor o igual a 80; así mismo, comentar que $tutor es mi tutor y actualmente se encuentra laborando en el Instituto Tecnológico Superior de Huichapan.</p>
    <p>Sin más por el momento agradezco de antemano la atención prestada; quedando en espera de una respuesta favorable.</p>
    <p style='text-align: center;'><strong>A T E N T A M E N T E</strong></p>
    <p style='text-align: center;'>_________________________</p>
    <p style='text-align: center;'>$nombre_firma</p>
    <p><strong>Teléfono:</strong> $telefono</p>
    <p><strong>Correo electrónico:</strong> $correo</p>
</body>
</html>";

// Genera el PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Envía el PDF al navegador
$dompdf->stream("Solicitud_Beca_TRABAJADORES.pdf", array("Attachment" => true));
?>