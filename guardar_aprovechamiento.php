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
    $matricula = htmlspecialchars($_POST['matricula']);
    $nombre_completo = htmlspecialchars($_POST['nombre_completo']);
    $semestre = intval($_POST['semestre']);
    $carrera = htmlspecialchars($_POST['carrera']);

    // Directorio para guardar los archivos
    $uploadDir = 'uploads/APROVECHAMIENTO/';

    // Crear el directorio si no existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Verificar si los archivos fueron subidos correctamente
    if (isset($_FILES['documento1']) && isset($_FILES['documento2'])) {
        $doc1Name = basename($_FILES['documento1']['name']);
        $doc2Name = basename($_FILES['documento2']['name']);

        // Limpiar nombres de archivos para mayor seguridad
        $doc1Name = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $doc1Name);
        $doc2Name = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $doc2Name);

        // Rutas finales de los archivos
        $doc1Path = $uploadDir .$matricula."_ INE_APROVECHAMINETO.pdf";
        $doc2Path = $uploadDir .$matricula."_ SOLICITUD_APROVECHAMIENTO.pdf";

        // Mover archivos a la carpeta de destino
        if (move_uploaded_file($_FILES['documento1']['tmp_name'], $doc1Path) &&
            move_uploaded_file($_FILES['documento2']['tmp_name'], $doc2Path)) {

            // Insertar los datos y rutas de los archivos en la base de datos
            $stmt = $conn->prepare("INSERT INTO alumnos_aprovechamiento (matricula, nombre_completo, semestre, carrera, ine, solicitud) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isisss", $matricula, $nombre_completo, $semestre, $carrera, $doc1Path, $doc2Path);

            if ($stmt->execute()) {
                echo "Datos y archivos subidos correctamente.";
                header("Refresh: 1; URL=inicio.html"); // Redirige después de 3 segundos
            } else {
                echo "Error al guardar los datos: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error al mover los archivos. Verifica los permisos de la carpeta.";
        }
    } else {
        echo "Error: Los archivos no fueron enviados correctamente.";
    }
}

$conn->close();
?>