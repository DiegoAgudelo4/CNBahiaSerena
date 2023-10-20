<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <link rel="shortcut icon" href="../img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <nav class="navbar">
        <img src="img/LogoBahiaSerenaFullIcon.png" alt="Logo Bahia Serena">
        <ul>
            <li><a href="Usuarios">Usuarios</a></li>
            <li><a href="Salidas">Salidas</a></li>
            <li><a href="Barcos">Barcos</a></li>
            <li><a href="index.php">Salir</a></li>
        </ul>
    </nav>
    <div class="PanelPrincipal">
        <div class="titulo">
            <h3>
                <?php echo $_GET["tipo"]; ?> de Bahía Serena
            </h3>
        </div>
        <div class="containTableForm">
            <?php
            $tipo = $_GET["tipo"];
            $id = $_GET["id"];
            echo '<iframe src="usuarios/formUsuario.php?tipo=' . $tipo . '&id=' . $id . '" width=500px height=400px frameborder="0">"No es posible visualizar el contenido"</iframe>'
                ?>
        </div>
        <div class="containTableForm">
        <a href="usuarios"><button class="btn primary">Volver</button></a>  
        </div>
    </div>
    
</body>
</html>