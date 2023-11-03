<!DOCTYPE html>
<html lang="es">

<?php require_once '../config.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="shortcut icon" href="../img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href=<?php echo $hojaEstilosUs; ?>>
</head>

<body>
    <?php
    include '../components/header.php';
    ?>
    <div class="PanelPrincipal">
        <div class="titulo">
            <h3>Usuarios de Bahía serena</h3>
        </div>
        <div class="panelagregar">
            <?php include '../components/buscar.php';?>
            <a href="index.php?tipo=Usuario&Insertar=true"><img src="../img/add.png" alt="" class="agregar"></a>
        </div>
        <div class="ListaDeUsuarios">
            <!-- Tarjetas que contienen cada usuario -->
            <?php 
            $conexion = conectarBD();
            $queryUsuarios = "SELECT U.Cedula,u.Nombre,U.Apellidos, TU.NombreTipo FROM `usuario` AS U INNER JOIN `tipousuario` AS TU ON u.TipoUsuario=TU.CodTipoUsuario WHERE u.Nombre like '%$buscar%' or U.Cedula like '%$buscar%' or U.Apellidos like '%$buscar%' OR TU.NombreTipo LIKE '%$buscar%' ORDER BY U.NOMBRE ASC, U.APELLIDOS ASC;";
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
            } else {
                echo '<div class="tarjeta">';
                echo '<div class="cuerpo">';
                echo 'No hay usuarios registrados';
                echo '</div>';
                echo '</div>';
            }
            ;
            if (isset($_GET['Insertar'])) {
                include '../components/modalInsertar.php';
            }
            ?>
        </div>
    </div>
</body>

</html>