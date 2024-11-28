<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Obtener los datos del formulario
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$nombre = $_POST['nombre'];
$semestre = $_POST['semestre'];
$programa = $_POST['programa'];
$matricula = $_POST['matricula'];
$nombre_firma = $_POST['nombre_firma'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Crear el contenido HTML con los datos insertados
$html = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; }
        p { text-align: justify; }
        .center { text-align: center; }
        .right { text-align: right; }
    </style>
</head>
<body>
<p class='right'>El Saucillo, Huichapan, Hidalgo a $dia de $mes de $anio</p>

<h3>Asunto: Solicitud para la Beca del Examen General de Egreso de Licenciatura (EGEL).</h3>

<p>COMITÉ DE BECAS<br>
DEL INSTITUTO TECNOLÓGICO SUPERIOR DE HUICHAPAN<br>
<strong>P R E S E N T E</strong></p>

<p>Con el gusto de saludarle, el que subscribe <strong>$nombre</strong>, estudiante del <strong>$semestre</strong>° semestre del programa educativo de Ingeniería en <strong>$programa</strong> del Instituto Tecnológico Superior de Huichapan con número de matrícula <strong>$matricula</strong>, se dirige de la manera más atenta y respetuosa, para que se considere mi postulación a la Beca del Examen General de Egreso de Licenciatura (EGEL) convocatoria <strong>$anio</strong>, la cual me permitirá continuar y culminar mi proceso de titulación.</p>

<p>Así mismo, una vez recibidos los resultados del Examen General de Egreso, me comprometo a entregar una copia física o electrónica de la constancia en donde se da a conocer el reporte de resultados del nivel de desempeño obtenido, si este es sobresaliente o satisfactorio.</p>

<p>Sin más por el momento, y en espera de una respuesta favorable, me despido agradeciendo la atención prestada.</p>

<p class='center'><strong>A T E N T A M E N T E</strong></p>

<p class='center'>______________________________</p>
<p class='center'>$nombre_firma</p>

<p><strong>Teléfono:</strong> $telefono</p>
<p><strong>Correo electrónico:</strong> $correo</p>
</body>
</html>
";

// Cargar el HTML en DOMPDF
$dompdf->loadHtml($html);

// Configurar el tamaño de papel y la orientación
$dompdf->setPaper('A4', 'portrait');

// Renderizar el HTML como PDF
$dompdf->render();

// Enviar el PDF al navegador para su descarga
$dompdf->stream("Solicitud_de_Beca_EGEL.pdf", ["Attachment" => true]);
?>