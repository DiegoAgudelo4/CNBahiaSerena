<!DOCTYPE html>
<html lang="es">

<?php require_once '../config.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/LogoBahiaSerenaIcon.png" type="image/x-icon">

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
        <div class="containTableForm ">
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
            echo '<a href="';
            switch ($tipo) {
                case 'Usuario':
                    echo '../usuarios';
                    break;
                case 'Salida':
                    echo '../salidas';
                    break;
                case 'Barco':
                    echo '../Barcos';
                    break;
                default:
                    echo '';
                    break;
            }
            echo '"><button class="btn primary">Volver a '.$tipo.'s</button></a>';
            echo '</div>';
        }
        ;
        ?>
    </div>

</body>

</html>