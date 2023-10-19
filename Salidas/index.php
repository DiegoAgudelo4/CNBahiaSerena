<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salidas</title>
    <link rel="shortcut icon" href="img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <nav class="navbar">
        <img src="../img/LogoBahiaSerenaFullIcon.png" alt="Logo Bahia Serena">
        <ul>
            <li><a href="../Usuarios">Usuarios</a></li>
            <li><a href="../Salidas">Salidas</a></li>
            <li><a href="../Barcos">Barcos</a></li>
            <li><a href="../index.php">Salir</a></li>
        </ul>
    </nav>
    <div class="PanelPrincipal">
        <div class="titulo">
            <h3>Salidas de Bahía serena</h3>
        </div>
        <div class="ListaDeUsuarios">
            <!-- Tarjetas que contienen cada usuario -->
            <?php
            $nombre_servidor = "localhost";
            $nombre_BD = "clubbahiaserena";
            $nombre_usuario = "root";
            $contrasena = "1234";
            $conexion = mysqli_connect($nombre_servidor, $nombre_usuario, $contrasena, $nombre_BD);
            $queryUsuarios = "SELECT * FROM `salida` WHERE 1;";
            $resultado = mysqli_query($conexion, $queryUsuarios);
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) {
                    echo '<div class="tarjeta">';
                    echo '<div class="cuerpo">';
                    echo '<img src="../img/direction.png">';
                    echo '</div>';
                    echo '<div class="titulo">Barco: ' . $row['Barco'] . '</div>';
                    echo '<div class="titulo">Destino: ' . $row['Destino'] . '</div>';
                    echo '<div class="cuerpo">Fecha: ' . $row['FechayHora'] . '</div>';
                    echo '<div class="pie">';
                    echo '<a href="#">ver</a>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>