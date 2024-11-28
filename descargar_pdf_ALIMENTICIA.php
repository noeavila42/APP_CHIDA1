<?php
require 'vendor/autoload.php'; // Cargar Dompdf (asegúrate de haber instalado Dompdf con Composer)

// Importar la clase Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

// Crear una instancia de opciones para habilitar la descarga
$options = new Options();
$options->set('isRemoteEnabled', true);

// Crear una instancia de Dompdf
$dompdf = new Dompdf($options);

// Recoger datos del formulario
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$nombre = $_POST['nombre'];
$semestre = $_POST['semestre'];
$programa = $_POST['programa'];
$matricula = $_POST['matricula'];
$periodo = $_POST['periodo'];
$anio_periodo = $_POST['anio'];
$motivos = $_POST['motivos'];
$nombre_firma = $_POST['nombre_firma'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Crear el contenido HTML para el PDF usando las variables de los datos del formulario
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
    <h3>Asunto: Solicitud para la Beca Alimenticia.</h3>
    <p>COMITÉ DE BECAS<br> DEL INSTITUTO TECNOLÓGICO SUPERIOR DE HUICHAPAN<br><strong>P R E S E N T E</strong></p>
    <p>Con el gusto de saludarle, el que subscribe <strong>$nombre</strong>, estudiante del <strong>$semestre</strong>° semestre del programa educativo de Ingeniería en <strong>$programa</strong> del Instituto Tecnológico Superior de Huichapan con número de matrícula <strong>$matricula</strong>, me dirijo a usted de la manera más atenta para postularme al proceso de Beca Alimenticia del semestre <strong>$periodo $anio_periodo</strong>.</p>
    <p>Me gustaría poder obtener la beca alimenticia por los siguientes motivos: <strong>$motivos</strong></p>
    <p>Sin más por el momento, y en espera de una respuesta favorable, me despido agradeciendo la atención prestada.</p>
    <p class='center'><strong>A T E N T A M E N T E</strong></p>
    <p class='center'>______________________________</p>
    <p class='center'>$nombre_firma</p>
    <p><strong>Teléfono:</strong> $telefono</p>
    <p><strong>Correo electrónico:</strong> $correo</p>
</body>
</html>
";

// Cargar el HTML en Dompdf
$dompdf->loadHtml($html);

// Configurar el tamaño de papel y la orientación
$dompdf->setPaper('A4', 'portrait');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador para descargar
$dompdf->stream("Solicitud_Beca_Alimenticia.pdf", ["Attachment" => true]);
?>