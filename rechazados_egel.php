<?php
include 'conexion.php';

$sql = "SELECT * FROM rechazados_egel";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados Rechazados EGEL</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Gestión de Resultados - Rechazados Egel</h1>
    </header>
    <nav>
        <a href="alumnos_egel.php">Regresar</a>
    </nav>
    <div class="container">
        <h2>Alumnos Rechazados</h2>
        <table>
            <thead>
                <tr>
                    <th>matricula</th>
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
                    <td colspan="9">No hay resultados rechazados.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
    function eliminarAlumno(id) {
        window.location.href = `procesarEge.php?action=delete&id=${id}&tabla=rechazados_egel`;
    }
    </script>
</body>

</html>