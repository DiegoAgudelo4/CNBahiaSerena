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
                if($_GET['Codigo']==10){
                    echo 'Eliminado correctamente';
                }else if($_GET['Codigo']==1){
                    echo 'El usuario no se puede eliminar';
                }else{
                    echo 'Error desconocido';
                }
            } else {
                $tipo = $_GET["tipo"];
                $id = $_GET["id"];
                if ($tipo == 'Usuario') {
                    include 'formUsuario.php';
                }
            }
            ?>
        </div>
        <div class="containTableForm">
            <a href="../usuarios"><button class="btn primary">Volver</button></a>
        </div>
    </div>

</body>

</html>