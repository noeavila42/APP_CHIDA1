|<?php
include 'conexion.php';

$sql = "SELECT * FROM alumnos_aprovechamiento";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beca Aprovechamiento</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="estilos_botones.css">
</head>

<body>
    <header>
        <h1>Gestión de Alumnos - Beca Aprovechamiento</h1>
    </header>
    <nav>
        <a href="index.php">Inicio</a>
    </nav>
    <div class="container">
        <h2>Alumnos Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                    <th>Documentos</th>
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
                    <td>
                        <ul>
                            <li> <a href="<?= "uploads/APROVECHAMIENTO/".$row['matricula']."_ INE_APROVECHAMINETO.pdf" ?>"
                                    TARGET='_blank'>INE</a>
                            </li>
                            <li> <a href="<?= "uploads/APROVECHAMIENTO/".$row['matricula']."_ SOLICITUD_APROVECHAMIENTO.pdf" ?>"
                                    TARGET='_blank'>SOLICITUD</a> </li>
                        </ul>
                    </td>
                    <td>
                        <button class="accept" onclick="aceptarAlumno(<?= $row['matricula'] ?>)">Aceptar</button>
                        <button class="reject" onclick="rechazarAlumno(<?= $row['matricula'] ?>)">Rechazar</button>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8">No hay alumnos registrados.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <nav>
        <div class="contenedor">
            <button class="botoncito" onclick="location.href='aceptados_aprovechamiento.php'">Alumnos Aceptados</button>
            <button class="botoncito" onclick="location.href='rechazados_aprovechamiento.php'">Alumnos
                Rechazados</button>
            <button class="botoncito" onclick="location.href='final_aprovechamiento.php'">Resultado Final</button>
        </div>
    </nav>

    <script>
    function aceptarAlumno(id) {
        window.location.href = `procesarApro.php?action=accept&id=${id}&tabla=alumnos_aprovechamiento`;
    }

    function rechazarAlumno(id) {
        window.location.href = `procesarApro.php?action=reject&id=${id}&tabla=alumnos_aprovechamiento`;
    }
    </script>
</body>

</html>