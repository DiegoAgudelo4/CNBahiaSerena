<?php
require_once '../config.php';
$tipo = $_GET["tipo"];
$id = $_GET["id"];
$conexion = conectarBD();
if ($tipo == 'Usuario') {
    $queryUsuarios = 'DELETE FROM `usuario` WHERE Cedula = ?';
    
    $stmt = mysqli_prepare($conexion, $queryUsuarios);
    mysqli_stmt_bind_param($stmt, 'i', $id); // 'i' indica que $id es un entero
    try {
        if (mysqli_stmt_execute($stmt)) {
            // Éxito: La eliminación se realizó con éxito.
            $datos_post=array(
                'tipo' =>'Usuario',
                'Codigo'=> '10',
            );
            $datos_codificados = http_build_query($datos_post);
            header('location: form.php?'.$datos_codificados);
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1451) {
            // Error de clave foránea
            //echo "Error de clave foránea: " . $e->getMessage();
            $datos_post=array(
                'tipo' =>'Usuario',
                'Codigo'=> '1',
            );
            $datos_codificados = http_build_query($datos_post);
            header('location: form.php?'.$datos_codificados);
        } else {
            // Otro tipo de error
            echo "Error: " . $e->getMessage();
        }
    }
    mysqli_stmt_close($stmt);
}
?>