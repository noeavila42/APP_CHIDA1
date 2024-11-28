<?php
include 'conexion.php';

$action = $_GET['action'];
$id = $_GET['id'];
$tabla = $_GET['tabla'];



if ($action === 'accept') {
    $sql = "INSERT INTO aceptados_egel (matricula, nombre_completo, semestre, carrera, estado)
            SELECT matricula, nombre_completo, semestre, carrera, 'Aceptado'
            FROM $tabla WHERE matricula = $id";
} elseif ($action === 'reject') {
    $sql = "INSERT INTO rechazados_egel (matricula, nombre_completo, semestre, carrera, estado)
            SELECT matricula, nombre_completo, semestre, carrera, 'Rechazado'
            FROM $tabla WHERE matricula = $id";
           
}

if ($action === 'delete') {
    $sql = "INSERT INTO final_egel (matricula, nombre_completo, semestre, carrera, estado)
            SELECT matricula, nombre_completo, semestre, carrera, 'Aceptado'
            FROM $tabla WHERE matricula = $id";
} 

if ($conn->query($sql) === TRUE) {
    $conn->query("DELETE FROM $tabla WHERE matricula = $id");
    echo "Acción procesada correctamente.";
} else {
    echo "Error: " . $conn->error;
}

header("Location: {$tabla}.php");
?>