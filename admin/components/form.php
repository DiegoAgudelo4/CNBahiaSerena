<!DOCTYPE html>
<html lang="es">

<?php require_once '../config.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <link rel="shortcut icon" href="<?php echo $img; ?>LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href=<?php echo $hojaEstilosUs; ?>>
</head>

<body>
    <?php
    include '../components/header.php';
    ?>
    <div class="PanelPrincipal">
        <div class="titulo">
            <h3>
                <?php echo $_GET["tipo"]; ?> de Bahía Serena
            </h3>
        </div>
        <div class="containTableForm">
            <?php
            if (isset($_GET['Codigo'])) {
                include 'mensaje.php';
            } else {
                $tipo = $_GET["tipo"];
                $id = $_GET["id"];
                switch ($tipo) {
                    case "Usuario":
                        include 'formUsuario.php';
                        break;
                    case 'Salida':
                        include 'formSalida.php';
                        break;
                    case 'Barco':
                        include 'formBarco.php';
                        break;
                    default:
                        echo 'Error desconocido';
                        break;
                }
            }
            ?>
        </div>
        <?php
        if (!isset($_GET['Codigo'])) {
            echo '  <div class="containTableForm">';
            switch ($tipo) {
                case 'Usuario':
                    echo '<a href="../usuarios"><button class="btn primary">Volver</button></a>';
                    break;
                case 'Salida':
                    echo '<a href="../salidas"><button class="btn primary">Volver</button></a>';
                    break;
                case 'Barco':
                    echo '<a href="../Barco"><button class="btn primary">Volver</button></a>';
                    break;
                default:
                    echo '';
                    break;
            }

            echo '</div>';
        }
        ;
        ?>
    </div>

</body>

</html>