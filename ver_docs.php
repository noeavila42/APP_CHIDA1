<?php
$beca = $_GET['beca'];
include 'conexion.php';

$query = "SELECT * FROM alumnos_" . $beca;
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Documentación - <?= ucfirst($beca) ?></title>
</head>

<body>
    <h1>Documentación Subida para la Beca: <?= ucfirst($beca) ?></h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Semestre</th>
                <th>Carrera</th>
                <th>Matrícula</th>
                <th>Documentos</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['nombre'] . ' ' . $row['ap_paterno'] . ' ' . $row['ap_materno'] ?></td>
                <td><?= $row['semestre'] ?></td>
                <td><?= $row['carrera'] ?></td>
                <td><?= $row['matricula'] ?></td>
                <td>
                    <a href="ver_documento.php?tipo=ine&id=<?= $row['id_alumno'] ?>&beca=<?= $beca ?>">INE</a>
                    <a
                        href="ver_documento.php?tipo=solicitud&id=<?= $row['id_alumno'] ?>&beca=<?= $beca ?>">Solicitud</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>