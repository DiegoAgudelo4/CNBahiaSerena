<?php
function conectarBD() {
    $nombre_servidor = "localhost";
    $nombre_BD = "clubbahiaserena";
    $nombre_usuario = "root";
    $contrasena = "1234";
    $conexion = mysqli_connect($nombre_servidor, $nombre_usuario, $contrasena, $nombre_BD);
    return $conexion;
}
?>