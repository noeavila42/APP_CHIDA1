<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beca";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener datos del formulario y escaparlos
$matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contrasenia = mysqli_real_escape_string($conn, $_POST['password']); // Guardar la contraseña directamente

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO usuario (matricula, nombre, email, contrasenia) VALUES ('$matricula', '$nombre', '$email', '$contrasenia')";

if ($conn->query($sql) === TRUE) {
    // Si el registro es exitoso, mostrar mensaje animado y redirigir
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Exitoso</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Arial, sans-serif;
                background-color: #f0f8ff;
                margin: 0;
            }
            .message {
                text-align: center;
                font-size: 1.5rem;
                color: #2e8b57;
                animation: fadeIn 1s ease-in-out;
            }
            .message span {
                display: block;
                font-size: 2rem;
                font-weight: bold;
                margin-top: 10px;
            }
            @keyframes fadeIn {
                0% { opacity: 0; transform: scale(0.8); }
                100% { opacity: 1; transform: scale(1); }
            }
        </style>
    </head>
    <body>
        <div class="message">
            ¡Registro exitoso!
            <span>Redirigiendo al inicio de sesión...</span>
        </div>
        <script>
            // Redirigir al inicio de sesión después de 3 segundos
            setTimeout(function() {
                window.location.href = "index.php"; // Cambia "login.php" a la URL de tu página de inicio de sesión
            }, 3000);
        </script>
    </body>
    </html>
    ';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>