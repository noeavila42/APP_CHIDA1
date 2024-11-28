<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Becas</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        padding: 20px;
    }

    h2 {
        color: #2d3e50;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #2d3e50;
        color: #fff;
    }

    .no-data {
        text-align: center;
        color: #f44336;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <h1>Gestión de Becas</h1>

    <?php
    // Conexión a la base de datos
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "beca";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Configuración de las becas y sus etapas
    $becas = [
        "Alimenticia" => ["Etapa 1", "Etapa 2", "Etapa 3"],
        "Aprovechamiento" => ["Etapa 1", "Etapa 2", "Etapa 3"],
        "EGEL" => ["Etapa 1", "Etapa 2", "Etapa 3"],
        "Hijos de Trabajadores" => ["Etapa 1", "Etapa 2", "Etapa 3"]
    ];

    foreach ($becas as $beca => $etapas) {
        echo "<h2>" . htmlspecialchars($beca) . "</h2>";

        foreach ($etapas as $etapa) {
            echo "<h3>" . htmlspecialchars($etapa) . "</h3>";

            // Convertir el nombre de la beca a formato compatible con la base de datos
            $becaDB = strtolower($beca);

            // Consulta a la base de datos para la beca y etapa actual
            $sql = "SELECT* FROM alimenticia WHERE beca = ? AND etapa = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $becaDB, $etapa);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Nombre</th>
                            <th>Matrícula</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['nombre']) . "</td>
                            <td>" . htmlspecialchars($row['matricula']) . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-data'>No hay datos disponibles para esta etapa.</p>";
            }

            // Cerrar el statement
            $stmt->close();
        }
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>

</html>