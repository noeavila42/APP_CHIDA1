<?php
include 'conexion.php';

$sql = "SELECT * FROM aceptados_aprovechamiento";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados Aceptados APROVECHAMIENTO</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Gestión de Resultados - Aceptados Aprobechamiento</h1>
    </header>
    <nav>
        <a href="alumnos_aprovechamiento.php">Regresar</a>
    </nav>
    <div class="container">
        <h2>Alumnos Aceptados</h2>
        <table>
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                    <th>Estado</th>
                    <th>Acciones</th>
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
                    <td>
                        <button class="reject" onclick="eliminarAlumno(<?= $row['matricula'] ?>)">Aceptar</button>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="9">No hay resultados aceptados.</td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

    <script>
    function eliminarAlumno(id) {
        window.location.href = `procesarApro.php?action=delete&id=${id}&tabla=aceptados_aprovechamiento`;
    }
    </script>
</body>

</html>