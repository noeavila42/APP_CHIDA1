<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ITESHU</title>
    <style>
    /* Estilos generales */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Fondo de pantalla */
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('1.jpg');
        background-size: cover;
        background-position: center;
    }

    /* Contenedor principal */
    .main-container {
        display: flex;
        width: 80%;
        max-width: 1000px;
        background-color: rgba(51, 51, 51, 0.85);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    }

    /* Sección izquierda con los logos y el título */
    .left-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem;
        width: 65%;
        color: white;
        text-align: center;
    }

    .left-section .logos {
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding-bottom: 1rem;
    }

    .left-section .logos img {
        height: 60px;
    }

    .left-section h1 {
        font-size: 1.8rem;
        font-weight: bold;
        margin-top: 1rem;
    }

    /* Sección derecha con el formulario de inicio de sesión */
    .right-section {
        width: 35%;
        background-color: rgba(85, 85, 85, 0.9);
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
    }

    .right-section h2 {
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
    }

    .right-section input[type="text"],
    .right-section input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .right-section input[type="submit"],
    .right-section .register-button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
        text-decoration: none;
    }

    .right-section input[type="submit"]:hover,
    .right-section .register-button:hover {
        background-color: #0056b3;
    }

    .right-section p {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #ddd;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="left-section">
            <div class="logos">
                <img src="iteshu.png" alt="Logo ITESHU">
                <img src="LOGO-VERTICAL-TECNM.png" alt="Logo TecNM">
            </div>
            <h1>Bienvenido al departamento de becas "ITESHU"</h1>
        </div>

        <div class="right-section">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST" autocomplete="off">
                <input type="text" name="username" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required minlength="8" maxlength="15">
                <input type="submit" value="Iniciar sesión">
            </form>
            <a href="REGISTRO.html" class="register-button">Registrar</a>

        </div>
    </div>
</body>

</html>