<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="shortcut icon" href="../img/LogoBahiaSerenaIcon.png" type="image/x-icon">
</head>

<body>
    <div class="login">
        <h1 class="tituloLogin">Iniciar Sesión</h1>
        <div class="logo">
            <img src="../img/LogoBahiaSerenaFull.png" alt="">
        </div>
        <form action="controllerLogin.php" class="loginForm" method="post">
            <table>
                <tr class="contenedor-input">
                    <td>
                        <label for="usuario">Usuario</label>
                    </td>
                    <td>
                        <input type="text" name="usuario" id="usuario" required>
                    </td>
                </tr>
                <tr class="contenedor-input">
                    <td>
                        <label for="contrasena">Contraseña</label>
                    </td>
                    <td>
                        <input type="password" name="contrasena" id="contrasena" required>
                    </td>
                </tr>
            </table>
            <input type="submit" class="button" value="Iniciar Sesión">
        </form>
    </div>
</body>

</html>