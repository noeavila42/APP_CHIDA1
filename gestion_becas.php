<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Becas</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }

    .header {
        background: #333;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    .buttons {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .submenu {
        display: none;
        flex-direction: column;
        margin-top: 10px;
    }

    .submenu button {
        margin: 5px 0;
        background-color: #28a745;
    }

    .submenu button:hover {
        background-color: #1c7430;
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>Sistema de Gestión de Becas ITESHU</h1>
    </div>
    <div class="container">
        <div class="buttons">
            <div>
                <button onclick="toggleSubmenu('alimenticia')">Beca Alimenticia</button>
                <div id="alimenticia" class="submenu">
                    <button onclick="window.location.href='ver_docs.php?beca=alimenticia'">Ver
                        Documentación</button>
                    <button
                        onclick="window.location.href='aprobar_rechazar.php?beca=alimenticia'">Aprobar/Rechazar</button>
                    <button onclick="window.location.href='ver_resultados.php?beca=alimenticia'">Resultados</button>
                </div>
            </div>
            <div>
                <button onclick="toggleSubmenu('aprovechamiento')">Beca Aprovechamiento</button>
                <div id="aprovechamiento" class="submenu">
                    <button onclick="window.location.href='ver_documentacion.php?beca=aprovechamiento'">Ver
                        Documentación</button>
                    <button
                        onclick="window.location.href='aprobar_rechazar.php?beca=aprovechamiento'">Aprobar/Rechazar</button>
                    <button onclick="window.location.href='ver_resultados.php?beca=aprovechamiento'">Resultados</button>
                </div>
            </div>
            <div>
                <button onclick="toggleSubmenu('egel')">Beca EGEL</button>
                <div id="egel" class="submenu">
                    <button onclick="window.location.href='ver_documentacion.php?beca=egel'">Ver Documentación</button>
                    <button onclick="window.location.href='aprobar_rechazar.php?beca=egel'">Aprobar/Rechazar</button>
                    <button onclick="window.location.href='ver_resultados.php?beca=egel'">Resultados</button>
                </div>
            </div>
            <div>
                <button onclick="toggleSubmenu('trabajadores')">Beca Trabajadores</button>
                <div id="trabajadores" class="submenu">
                    <button onclick="window.location.href='ver_documentacion.php?beca=trabajadores'">Ver
                        Documentación</button>
                    <button
                        onclick="window.location.href='aprobar_rechazar.php?beca=trabajadores'">Aprobar/Rechazar</button>
                    <button onclick="window.location.href='ver_resultados.php?beca=trabajadores'">Resultados</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleSubmenu(id) {
        const submenu = document.getElementById(id);
        if (submenu.style.display === 'flex') {
            submenu.style.display = 'none';
        } else {
            submenu.style.display = 'flex';
        }
    }
    </script>
</body>

</html>