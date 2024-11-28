<?php
// Verifica que se haya enviado una matrícula como parámetro
if (!isset($_GET['matricula'])) {
    echo "Error: Matrícula no proporcionada.";
    exit;
}

// Obtén la matrícula del estudiante
$matricula = $_GET['matricula'];

// Simula una búsqueda en la base de datos para obtener los documentos
$estudiantes = [
    "123456" => ["nombre" => "Juan Pérez", "documentos" => ["identificacion.pdf", "comprobante.pdf"]],
    "789012" => ["nombre" => "María López", "documentos" => ["acta_nacimiento.pdf", "curp.pdf"]],
    "345678" => ["nombre" => "Carlos Gómez", "documentos" => ["constancia_estudios.pdf", "recibo_pago.pdf"]],
    "567890" => ["nombre" => "Ana Rodríguez", "documentos" => ["comprobante_domicilio.pdf", "foto.pdf"]],
];

if (!array_key_exists($matricula, $estudiantes)) {
    echo "Error: No se encontró información para la matrícula proporcionada.";
    exit;
}

$estudiante = $estudiantes[$matricula];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisión de Documentos</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin: 10px 0;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-approve {
        background-color: #4CAF50;
        color: white;
    }

    .btn-reject {
        background-color: #f44336;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Revisión de Documentos</h2>
        <p><strong>Matrícula:</strong> <?php echo $matricula; ?></p>
        <p><strong>Nombre:</strong> <?php echo $estudiante['nombre']; ?></p>
        <h3>Documentos:</h3>
        <ul>
            <?php foreach ($estudiante['documentos'] as $documento): ?>
            <li><a href="documentos/<?php echo $documento; ?>" target="_blank"><?php echo $documento; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <form method="POST" action="resultado_becas.php">
            <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
            <input type="hidden" name="nombre" value="<?php echo $estudiante['nombre']; ?>">
            <button class="btn btn-approve" name="accion" value="aceptar">Aceptar</button>
            <button class="btn btn-reject" name="accion" value="rechazar">Rechazar</button>
        </form>
    </div>
</body>

</html>