<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $conexion = conectarBD();
    $queryUsuarios = "SELECT * FROM `Admin` WHERE Usuario='$usuario' AND Password='$contrasena';";
    $resultado = mysqli_query($conexion, $queryUsuarios);
    if (mysqli_num_rows($resultado) > 0) {
        echo 'usuario correcto';
        header('location: /BahiaSerena/admin/Usuarios');
    }else{
        echo 'Usuario y/o contraseña incorrectos';
        //echo "<script>alert('Este es un mensaje de alerta desde PHP.');</script>";
        header('location: index.php');
    }

    // Haz algo con $usuario y $contrasena, como verificar las credenciales.
}
?>