<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $conexion = conectarBD();
    $queryUsuarios = "SELECT * FROM `Admin` WHERE Usuario='$usuario' AND contrasena='$contrasena';";
    $resultado = mysqli_query($conexion, $queryUsuarios);
    if (mysqli_num_rows($resultado) > 0) {
        echo 'usuario correcto';
        header('location: '.$adminUsuarios);
    }else{
        //echo "<script>alert('Este es un mensaje de alerta desde PHP.');</script>";
        $datos_post=array(
            'CodigoError'=> '0',
        );
        $datos_codificados = http_build_query($datos_post);
        header('location: index.php?'.$datos_codificados);

    }
    mysqli_close($conexion);
    exit;
    // Haz algo con $usuario y $contrasena, como verificar las credenciales.
}
?>