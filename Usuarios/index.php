<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="shortcut icon" href="../img/LogoBahiaSerenaIcon.png" type="image/x-icon">
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
            <h3>Usuarios de Bahía serena</h3>
        </div>
        <div class="ListaDeUsuarios">
            <!-- Tarjetas que contienen cada usuario -->
            <?php
            $nombre_servidor = "localhost";
            $nombre_BD = "clubbahiaserena";
            $nombre_usuario = "root";
            $contrasena = "1234";
            $conexion = mysqli_connect($nombre_servidor, $nombre_usuario, $contrasena, $nombre_BD);
            $queryUsuarios = "SELECT U.Cedula,u.Nombre,U.Apellidos, TU.NombreTipo FROM `usuario` AS U INNER JOIN `tipousuario` AS TU ON u.TipoUsuario=TU.CodTipoUsuario WHERE 1;";
            $resultado = mysqli_query($conexion, $queryUsuarios);
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) {
                    echo '<div class="tarjeta">';
                    echo '<div class="cuerpo">';
                    echo '<img src="../img/userIcon.png">';
                    echo '</div>';
                    echo '<div class="titulo">' . $row['Nombre'] . '</div>';
                    echo '<div class="titulo">' . $row['Apellidos'] . '</div>';
                    echo '<div class="cuerpo">' . $row['NombreTipo'] . '</div>';
                    echo '<div class="cuerpo">Id: ' . $row['Cedula'] . '</div>';
                    echo '<div class="pie">';
                    echo '<a href="../form.php?tipo=Usuario&id=' . $row['Cedula'] . '">ver</a>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        
    </div>
    </div>
</body>

</html>