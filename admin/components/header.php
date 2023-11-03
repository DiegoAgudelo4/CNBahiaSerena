<head>
    <link rel="stylesheet" type="text/css" href=<?php echo $hojaEstilosUs; ?>>
</head>
<nav class="navbar">
    <img src="../img/LogoBahiaSerenaFullIcon.png" alt="Logo Bahia Serena">
    <ul>
        <?php 
        if(!isset($_GET["id"])){
            echo '<li><a href="../Usuarios">Usuarios</a></li>';
            echo' <li><a href="../Barcos">Barcos</a></li>';
            echo ' <li><a href="../Salidas">Salidas</a></li>';
            echo '<li><a href="../">Cerrar Sesion</a></li>';
            echo '<li><a href="../../">Salir</a></li>';
        }else{
            echo '<li><a href="./Usuarios">Usuarios</a></li>';
            echo' <li><a href="./Barcos">Barcos</a></li>';
            echo ' <li><a href="./Salidas">Salidas</a></li>';
            echo '<li><a href="./">Cerrar Sesion</a></li>';
            echo '<li><a href="./../">Salir</a></li>';
        }
        ?>
    </ul>
</nav>