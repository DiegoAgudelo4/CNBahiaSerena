<?php
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cedula"])) {
        $id = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $nombretipo = $_POST["nombretipo"];
        $telefono = $_POST["telefono"];
        $fechanacimiento = $_POST["fechanacimiento"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];

        $conexion = conectarBD();
        $sql = "INSERT INTO `usuario` (`Cedula`, `Nombre`, `Apellidos`, `TipoUsuario`, `Telefono`, `FechaNacimiento`, `Direccion`, `Email`) 
        VALUES (?,?,?,?,?,?,?,?)";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("isssssss", $id, $nombre, $apellidos, $nombretipo, $telefono, $fechanacimiento, $direccion, $email);
            if ($stmt->execute()) {
                $datos_post = array(
                    'tipo' => 'Usuario',
                    'Codigo' => '13',
                );
                $datos_codificados = http_build_query($datos_post);
                header('location: form.php?' . $datos_codificados);
            } else {
                $datos_post = array(
                    'tipo' => 'Usuario',
                    'Codigo' => '14',
                );
                header('location: form.php?' . $datos_codificados);
            }
            ;
            $stmt->close();
        }
        ;
    }
    ;
    if (isset($_POST['idSalida'])) {
        $id = $_POST['idSalida'];
        $Destino = $_POST['Destino'];
        $fechayhora = $_POST['fechayhora'];
        $Barco = $_POST['Barco'];
        $conexion = conectarBD();
        //$sql = "UPDATE salida SET Destino=?, FechaYHora=? WHERE idSalida=?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssi", $Destino, $fechayhora, $id);
            if ($stmt->execute()) {
                $datos_post = array(
                    'tipo' => 'Salida',
                    'Codigo' => '13',
                );
                $datos_codificados = http_build_query($datos_post);
                header('location: form.php?' . $datos_codificados);
            } else {
                $datos_post = array(
                    'tipo' => 'Salida',
                    'Codigo' => '14',
                );
                header('location: form.php?' . $datos_codificados);
            }
            ;
            $stmt->close();
        }
        ;
    }
    ;
    if (isset($_POST['Matricula'])) {
        $id = $_POST['Matricula'];
        $nombre = $_POST['nombre'];
        $amarre = $_POST['amarre'];
        $Cuota = $_POST['Cuota'];
        $usuario = $_POST['usuario'];
        $archivo = $_FILES["imagen"];
        $nombre_temporal = $archivo["tmp_name"];
        if ($nombre_temporal == null) {
            $nombre_destino = 'NULL';
        } else {
            $nombre_destino = "../img/ImgUsers/Barcos/" . $id . '.jpg';
            if (move_uploaded_file($nombre_temporal, $nombre_destino)) {
                echo "La imagen se cargó con éxito.";
            } else {
                //no se cargó con exito
                echo 'no se cargó con exito';
            }
        }
        $conexion = conectarBD();
        $sql= "INSERT INTO `barco` (`NumMatricula`, `NombreBarco`, `NumeroAmarre`, `Cuota`, `Foto`, `Usuario`) VALUES (?, ?, ?, ?, ?, ?);";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssssss",$id, $nombre, $amarre, $Cuota,$nombre_destino, $usuario);
            if ($stmt->execute()) {
                $datos_post = array(
                    'tipo' => 'Barco',
                    'Codigo' => '13',
                );
                $datos_codificados = http_build_query($datos_post);
                header('location: form.php?' . $datos_codificados);
            } else {
                $datos_post = array(
                    'tipo' => 'Barco',
                    'Codigo' => '14',
                );
                header('location: form.php?' . $datos_codificados);
            }
            ;
            $stmt->close();
        }
        ;

    }
    ;

    // Realiza acciones con los datos, como almacenarlos en una base de datos o procesarlos de alguna otra manera.
}
;