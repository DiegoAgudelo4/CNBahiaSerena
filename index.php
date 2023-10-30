<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Bahía serena</title>

</head>

<body>
    <nav class="navbar">
        <img src="./img/LogoBahiaSerenaFullIcon.png" alt="Logo Bahia Serena">
        <ul>
            <li><a href="./admin">Iniciar Sesion</a></li>
        </ul>
    </nav>
    <div class="sedes">
        <h2>Nuestras sedes</h2>
        <div class="sede">
            <div class="sedesTitulo">
                <h3>Bahía de Ha-Long (Vietnam)</h3>
            </div>
            <?php
            $ruta = "./img/sedeVietnam/";
            $images = [$ruta . '1.png', $ruta . '2.png', $ruta . '3.png', $ruta . '4.png', $ruta . '5.png'];
            $currentImageIndex = isset($_GET['index']) ? intval($_GET['index']) : 0;
            if (isset($_GET['prev'])) {
                $currentImageIndex = ($currentImageIndex - 1 + count($images)) % count($images);
            } elseif (isset($_GET['next'])) {
                $currentImageIndex = ($currentImageIndex + 1) % count($images);
            }
            ?>
           
            <div class="slider">
                <div class="slide">
                    <img src="<?php echo $images[$currentImageIndex]; ?>" alt="Imagen <?php echo $currentImageIndex + 1; ?>">
                </div>
            </div>
            <div class="controls">
                <a href="?index=<?php echo $currentImageIndex; ?>&prev=1">Anterior</a>
                <a href="?index=<?php echo $currentImageIndex; ?>&next=1">Siguiente</a>
            </div>
        </div>
    </div>
</body>

</html>