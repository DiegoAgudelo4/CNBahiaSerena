<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salidas</title>
    <link rel="shortcut icon" href="../img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <?php
    include '../components/header.php';
    require_once '../config.php';
    ?>
    </nav>
    <div class="PanelPrincipal">
        <div class="titulo">
            <h3>Salidas de Bahía serena</h3>
        </div>
        <div class="panelagregar">
            <?php include '../components/buscar.php';?>
            <a href="index.php?tipo=Salida&Insertar=true"><img src="../img/add.png" alt=""  class="agregar"></a>
        </div>
        <div class="ListaDeUsuarios">
            <!-- Tarjetas que contienen cada usuario -->
            <?php
            $conexion=conectarBD();
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
                    echo '<a href="../components/form.php?tipo=Salida&id=' . $row['idSalida'] . '">ver</a>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            if (isset($_GET['Insertar'])) {
                include '../components/modalInsertar.php';
            }
            ?>
        </div>
    </div>
</body>

</html>