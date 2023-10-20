<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcos</title>
    <link rel="shortcut icon" href="img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <?php
    include '../config.php'; 
    include $header;    
    ?>
    <div class="PanelPrincipal">
        <div class="titulo">
            <h3>Barcos de Bahía serena</h3>
        </div>
        <div class="ListaDeUsuarios">
            <!-- Tarjetas que contienen cada usuario -->
            <?php
            $conexion = conectarBD();
            $queryUsuarios = "SELECT NumMatricula, NombreBarco,NumeroAmarre, Cuota, U.Nombre,u.Apellidos FROM `barco` AS B INNER JOIN `Usuario` AS U ON B.Usuario=U.Cedula WHERE 1;";
            $resultado = mysqli_query($conexion, $queryUsuarios);
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) {
                    echo '<div class="tarjeta">';
                    echo '<div class="cuerpo">';
                    echo '<img src="../img/yatch.png">';
                    echo '</div>';
                    echo '<div class="titulo">Matricula: '          . $row['NumMatricula']  . '</div>';
                    echo '<div class="titulo">Amarre: '             . $row['NumeroAmarre']  . '</div>';
                    echo '<div class="cuerpo">Cuota: $'             . $row['Cuota']         . '</div>';
                    echo '<div class="titulo">Dueño</div>';
                    echo '<div class="cuerpo">'                     . $row['Nombre']        . '</div>';
                    echo '<div class="cuerpo">'                     . $row['Apellidos']     . '</div>';
                    echo '<div class="pie">';
                    echo '<a href="form.php?tipo=Barco&id=' . $row['NumMatricula']          . '">ver</a>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>