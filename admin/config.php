<?php
function conectarBD() {
    $nombre_servidor = "localhost";
    $nombre_BD = "clubbahiaserena";
    $nombre_usuario = "root";
    $contrasena = "1234";
    $conexion = mysqli_connect($nombre_servidor, $nombre_usuario, $contrasena, $nombre_BD);
    return $conexion;
}
$nombreGlobalAdmin='CNBahiaSerena/admin/';
//Hojas de estilos
$hojaEstilos='./css/style.css';
$hojaEstilosForm='./css/styleForm.css';
$hojaEstilosFormUs='../css/styleForm.css';
$hojaEstilosUs='../css/style.css';
//componentes
$header='../components/header.php';

$img='./img/';
$adminUsuarios='Usuarios';
$adminBarcos=$nombreGlobalAdmin.'Barcos';
$adminSalidas=$nombreGlobalAdmin.'Salidas';
?>