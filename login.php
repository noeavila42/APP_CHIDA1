<?php

// Evitar que el navegador almacene la página en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root"; // Cambia esto si tu usuario es diferente
$password = ""; // Cambia esto si tienes una contraseña para tu base de datos
$dbname = "beca";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['username'];
$password_input = $_POST['password'];

// Consulta para validar usuario
$sql = "SELECT * FROM usuario WHERE EMAIL = ? AND CONTRASENIA = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password_input);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si los datos son correctos
if ($result->num_rows > 0) {
    // Verificar si es administrador
    if ($email === "any@iteshu.edu.mx" || $email === "any@iteshu.edu.mx") {
        // Redirigir al panel de administrador
        header("Location: index1.php");
    } else {
        // Redirigir al panel de usuario
        header("Location: inicio.html");
    }
    exit();
} else {
    // Mostrar mensaje de error y redirigir a la página de inicio de sesión
    echo "<script>
        window.location.href = 'error.html';
    </script>";
}

// Cerrar conexión
$stmt->close();
$conn->close();
exit();
?>