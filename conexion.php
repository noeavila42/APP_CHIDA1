<?php
// conexion.php
$host = "localhost";
$user = "root"; // Cambia esto si tienes otro usuario
$password = ""; // Cambia esto si tienes una contraseña configurada
$dbname = "beca"; // Nombre de la base de datos

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>