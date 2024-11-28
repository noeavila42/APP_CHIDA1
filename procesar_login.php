<?php

include 'conexion.php'; // Incluir la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el email y la contraseña están definidos
    if (isset($_POST['email']) && isset($_POST['contrasenia'])) {
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];

        // Consulta para verificar las credenciales
        $sql = "SELECT * FROM usuario WHERE EMAIL = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            // Verificar la contraseña (usa password_verify si estás usando hashing)
            if ($contrasenia === $usuario['CONTRASENIA']) {
                // Credenciales válidas
                $_SESSION['nombre'] = $usuario['NOMBRE']; // Almacenar el nombre en la sesión
                
                // Redirigir a otra página (por ejemplo, dashboard.html)
                header("Location: DATOS_FAMILIARES.html");
                exit(); // Asegúrate de llamar a exit después de header
            } else {
                // Contraseña incorrecta
                echo "Email o contraseña incorrectas.";
            }
        } else {
            // Email no encontrado
            echo "Email o contraseña incorrectas.";
        }

        $stmt->close();
    } else {
        echo "Por favor, completa todos los campos.";
    }
}
$conn->close();
?>