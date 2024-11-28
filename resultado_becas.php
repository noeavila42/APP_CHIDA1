<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $accion = $_POST['accion'];

    // Simula guardar el resultado en la base de datos
    $resultado = ($accion === "aceptar") ? "Aceptado" : "Rechazado";
} else {
    echo "Error: Solicitud no válida.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Solicitud</title>
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

    .result {
        text-align: center;
        margin: 20px 0;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Resultado de la Solicitud</h2>
        <p><strong>Matrícula:</strong> <?php echo $matricula; ?></p>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <div class="result">
            <h3>Resultado: <?php echo $resultado; ?></h3>
        </div>
        <a href="index.php" class="btn">Volver al menú principal</a>
    </div>
</body>

</html>