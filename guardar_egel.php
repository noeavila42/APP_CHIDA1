<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "beca");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron los datos y archivos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos del formulario
    $matricula = $_POST['matricula'];
    $nombre_completo = $_POST['nombre_completo'];
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];

    // Directorio para guardar los archivos
    $uploadDir = 'uploads/EGEL/';

    // Crear el directorio si no existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Rutas de los archivos
    $doc1Path = $uploadDir .$matricula."_ COMPROBANTE_EGEL.pdf";
    $doc2Path = $uploadDir .$matricula."_ INE_EGEL.pdf";
    $doc3Path = $uploadDir .$matricula."_ SOLICITUD_EGEL.pdf";

    // Mover archivos a la carpeta de destino
    move_uploaded_file($_FILES['documento1']['tmp_name'], $doc1Path);
    move_uploaded_file($_FILES['documento2']['tmp_name'], $doc2Path);
    move_uploaded_file($_FILES['documento3']['tmp_name'], $doc3Path);
    


    // Insertar los datos y rutas de los archivos en la base de datos
    $stmt = $conn->prepare("INSERT INTO alumnos_egel (matricula, nombre_completo, semestre, carrera, ine, solicitud, comprobante_pago) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $matricula, $nombre_completo, $semestre, $carrera, $doc1Path, $doc2Path, $doc3Path);

    if ($stmt->execute()) {
        echo "Datos y archivos subidos correctamente.";
        header("Refresh: 1; URL=inicio.html"); // Redirige después de 3 segundos
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>