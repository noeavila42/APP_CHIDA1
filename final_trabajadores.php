<?php
include 'conexion.php';

$sql = "SELECT * FROM final_trabajadores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Final TRABAJADORES</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Gestión de Resultado Final TRABAJADORES</h1>
    </header>
    <nav>
        <a href="alumnos_trabajadores.php">Regresar</a>
    </nav>
    <div class="container">
        <h2>Alumnos en Resultado Final</h2>
        <table>
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['matricula'] ?></td>
                    <td><?= $row['nombre_completo'] ?></td>
                    <td><?= $row['semestre'] ?></td>
                    <td><?= $row['carrera'] ?></td>
                    <td><?= $row['estado'] ?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8">No hay resultados finales.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>