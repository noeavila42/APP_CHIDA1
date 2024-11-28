<?php
require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

use Dompdf\Dompdf;
use Dompdf\Options;

// Crear una nueva instancia de Dompdf
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Ruta donde se guardará la imagen
    $ruta_imagen = 'uploads/' . basename($_FILES['imagen']['name']);
    
    // Mueve la imagen a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        
        
$options = new Options();
$options->set('defaultFont', 'Arial');
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);


// Obtener los datos del formulario
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$nombre_completo = $_POST['nombre_completo'];
$curp = $_POST['curp'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];



$colonia_familia = $_POST['colonia_familia'];
$localidad_familia = $_POST['localidad_familia'];
$municipio_familia = $_POST['municipio_familia'];
$estado_familia = $_POST['estado_familia'];
$cp_familia = $_POST['cp_familia'];
$colonia_renta = $_POST['colonia_renta'];
$localidad_renta = $_POST['localidad_renta'];
$municipio_renta = $_POST['municipio_renta'];
$estado_renta = $_POST['estado_renta'];
$cp_renta = $_POST['cp_renta'];
if (isset($_POST['apoyo_economico'])) {
    $apoyoEconomico = $_POST['apoyo_economico'];
} else {
    $apoyoEconomico = "No se seleccionó ninguna opción";
}

// Crear contenido HTML para el PDF
$html = <<<EOD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuestionario Socioeconómico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>CUESTIONARIO SOCIOECONÓMICO</h1>
    <p style="text-align:right;">El Saucillo, Huichapan, Hidalgo a $dia de $mes de $anio</p>
    
    <h2>Datos Personales</h2>
    <p>Nombre Completo: $nombre_completo</p>
    <p>CURP: $curp</p>
    <p>Fecha de Nacimiento: $fecha_nacimiento</p>
    <p>Sexo: $sexo</p>
    <p>Teléfono: $telefono</p>
    <p>Correo electrónico: $correo_electronico</p>
    
<h2>Imagen Seleccionada</h2>
<img src="' . $ruta_imagen . '" style="max-width: 200px; height: auto; display: block; margin: auto;" />

    <h2>Domicilio de Residencia (Familia)</h2>
    <p>Colonia: $colonia_familia</p>
    <p>Localidad: $localidad_familia</p>
    <p>Municipio: $municipio_familia</p>
    <p>Estado: $estado_familia</p>
    <p>Código Postal: $cp_familia</p>

    <h2>Domicilio Actual (Renta)</h2>
    <p>Colonia: $colonia_renta</p>
    <p>Localidad: $localidad_renta</p>
    <p>Municipio: $municipio_renta</p>
    <p>Estado: $estado_renta</p>
    <p>Código Postal: $cp_renta</p>

    <h2>Integración Familiar</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Edad</th>
            <th>Parentesco</th>
            <th>Escolaridad </th>
            <th>Ocupación</th>
        </tr>
        <tr>
            <td>1</td>
            <td>{$_POST['nombre1']}</td>
            <td>{$_POST['sexo1']}</td>
            <td>{$_POST['edad1']}</td>
            <td>{$_POST['parentesco1']}</td>
            <td>{$_POST['escolaridad1']}</td>
            <td>{$_POST['ocupacion1']}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>{$_POST['nombre2']}</td>
            <td>{$_POST['sexo2']}</td>
            <td>{$_POST['edad2']}</td>
            <td>{$_POST['parentesco2']}</td>
            <td>{$_POST['escolaridad2']}</td>
            <td>{$_POST['ocupacion2']}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>{$_POST['nombre3']}</td>
            <td>{$_POST['sexo3']}</td>
            <td>{$_POST['edad3']}</td>
            <td>{$_POST['parentesco3']}</td>
            <td>{$_POST['escolaridad3']}</td>
            <td>{$_POST['ocupacion3']}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>{$_POST['nombre4']}</td>
            <td>{$_POST['sexo4']}</td>
            <td>{$_POST['edad4']}</td>
            <td>{$_POST['parentesco4']}</td>
            <td>{$_POST['escolaridad4']}</td>
            <td>{$_POST['ocupacion4']}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>{$_POST['nombre5']}</td>
            <td>{$_POST['sexo5']}</td>
            <td>{$_POST['edad5']}</td>
            <td>{$_POST['parentesco5']}</td>
            <td>{$_POST['escolaridad5']}</td>
            <td>{$_POST['ocupacion5']}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>{$_POST['nombre6']}</td>
            <td>{$_POST['sexo6']}</td>
            <td>{$_POST['edad6']}</td>
            <td>{$_POST['parentesco6']}</td>
            <td>{$_POST['escolaridad6']}</td>
            <td>{$_POST['ocupacion6']}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>{$_POST['nombre7']}</td>
            <td>{$_POST['sexo7']}</td>
            <td>{$_POST['edad7']}</td>
            <td>{$_POST['parentesco7']}</td>
            <td>{$_POST['escolaridad7']}</td>
            <td>{$_POST['ocupacion7']}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>{$_POST['nombre8']}</td>
            <td>{$_POST['sexo8']}</td>
            <td>{$_POST['edad8']}</td>
            <td>{$_POST['parentesco8']}</td>
            <td>{$_POST['escolaridad8']}</td>
            <td>{$_POST['ocupacion8']}</td>
        </tr>
        <tr>
            <td>9</td>
            <td>{$_POST['nombre9']}</td>
            <td>{$_POST['sexo9']}</td>
            <td>{$_POST['edad9']}</td>
            <td>{$_POST['parentesco9']}</td>
            <td>{$_POST['escolaridad9']}</td>
            <td>{$_POST['ocupacion9']}</td>
        </tr>
        <tr>
            <td>10</td>
            <td>{$_POST['nombre10']}</td>
            <td>{$_POST['sexo10']}</td>
            <td>{$_POST['edad10']}</td>
            <td>{$_POST['parentesco10']}</td>
            <td>{$_POST['escolaridad10']}</td>
            <td>{$_POST['ocupacion10']}</td>
        </tr>
        
    
    </table>
     <h2>Situación Económica</h2>
   <p><strong>2-Principal apoyo o sustento económico:</strong> $apoyoEconomico</p>
    <p>3-¿Cuántas personas dependen económicamente de ti?: {$_POST['dependientes']}</p>
    <p>4-¿El domicilio donde radicas actualmente es el mismo donde vive tu familia?: {$_POST['dependientes']}</p>
    <p>5-¿Cuántas personas dependen del ingreso de los miembros de tu hogar?: {$_POST['dependientes']}</p>
    <p>6-¿Qué institución le brinda servicios de salud a ti y a tu familia?: {$_POST['dependientes']}</p>
    <p>7-La vivienda donde vive tu familia: {$_POST['dependientes']}</p>
    <p>8-¿De qué material es la mayor parte del techo de tu vivienda?: {$_POST['dependientes']}</p>
    <p>9-¿Cuántos cuartos se usan para dormir?: {$_POST['dependientes']}</p>
    <p>10-¿Cuántos cuartos tiene en total la vivienda?: {$_POST['dependientes']}</p>
    <p>11-¿Tienen acceso a internet en tu casa?: {$_POST['dependientes']}</p>
    <p>12-¿Cuentas con computadora o laptop?: {$_POST['dependientes']}</p>
    <p>13-¿Con cuántos automóviles cuentan en tu hogar?: {$_POST['dependientes']}</p>
    <p>14-¿Cuentan con servicio de televisión de paga?: {$_POST['dependientes']}</p>
    <p>15-¿Cuántos miembros del hogar cuentan con teléfono celular?: {$_POST['dependientes']}</p>
    <p>16-¿Qué medio de transporte utilizas para ir a la escuela?: {$_POST['dependientes']}</p>
    <p>17-¿Actualmente recibes algún tipo de beca o apoyo?: {$_POST['dependientes']}</p>
    <p>18-¿Eres integrante de algún grupo indígena?: {$_POST['dependientes']}</p>
    <p>19-¿Tienes alguna discapacidad motriz, visual o auditiva?: {$_POST['dependientes']}</p>

    <h2>Ingresos Mensuales</h2>
    <table>
        <tr>
            <td>Padre</td>
            <td>{$_POST['ingreso_padre']}</td>
        </tr>
        <tr>
            <td>Madre</td>
            <td>{$_POST['ingreso_madre']}</td>
        </tr>
        <tr>
            <td>Hermanos</td>
            <td>{$_POST['ingreso_hermano']}</td>
        </tr>
        <tr>
            <td>Usted</td>
            <td>{$_POST['ingreso_usted']}</td>
        </tr>
        <tr>
            <td>Otros</td>
            <td>{$_POST['ingreso_otros']}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{$_POST['ingreso_total']}</td>
        </tr>
    </table>

    <h2>Egresos Mensuales</h2>
    <table>
        <tr>
            <td>Alimentación</td>
            <td>{$_POST['egresos_alimentacion']}</td>
        </tr>
        <tr>
            <td>Vestido</td>
            <td>{$_POST['egresos_vestido']}</td>
        </tr>
        <tr>
            <td>Transporte</td>
            <td>{$_POST['egresos_transporte']}</td>
        </tr>
        <tr>
            <td>Educación</td>
            <td>{$_POST['egresos_educacion']}</td>
        </tr>
        <tr>
            <td>Renta de Casa</td>
            <td>{$_POST['renta_casa']}</td>
        </tr>
        <tr>
            <td>Otros</td>
            <td>{$_POST['egresos_otros']}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>{$_POST['total_egresos']}</td>
        </tr>
    </table>

    <h2>Comentarios Adicionales</h2>
    <p>{$_POST['comentarios_adicionales']}</p>

    <div style="text-align: center">
    <h2>Firma del Solicitante</h2>
    <p>______________________________</p>
    <p>{$_POST['nombre_firma']}</p>
</body>
</html>
EOD;

// Cargar el contenido HTML al PDF
$dompdf->loadHtml($html);

// Configurar el tamaño y la orientación del papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar el HTML como PDF
$dompdf->render();

// Salida del PDF al navegador
$dompdf->stream('cuestionario_socioeconomico.pdf', ['Attachment' => true]);
} else {
    echo "Error al mover la imagen.";
}
} else {
echo "No se ha subido ninguna imagen o ha ocurrido un error.";
}
?>