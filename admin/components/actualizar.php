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
        $sql = "UPDATE Usuario SET Nombre=?, Apellidos=?, Telefono=?, FechaNacimiento=?, Direccion=?, Email=? WHERE Cedula=?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssssssi", $nombre, $apellidos, $telefono, $fechanacimiento, $direccion, $email, $id);
            if ($stmt->execute()) {
                $datos_post=array(
                    'tipo' =>'Usuario',
                    'Codigo'=> '11',
                );
                $datos_codificados = http_build_query($datos_post);
                header('location: form.php?'.$datos_codificados);
            } else {
                $datos_post=array(
                    'tipo' =>'Usuario',
                    'Codigo'=> '12',
                );
                header('location: form.php?'.$datos_codificados);
            }
            ;
            $stmt->close();
        }
        ;
    }
    ;
    if(isset($_POST['idSalida'])){
        $id = $_POST['idSalida'];
        $Destino = $_POST['Destino'];
        $fechayhora = $_POST['fechayhora'];
        $Barco = $_POST['Barco'];
        $conexion = conectarBD();
        $sql = "UPDATE salida SET Destino=?, FechaYHora=? WHERE idSalida=?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssi",$Destino, $fechayhora, $id);
            if ($stmt->execute()) {
                $datos_post=array(
                    'tipo' =>'Salida',
                    'Codigo'=> '11',
                );
                $datos_codificados = http_build_query($datos_post);
                header('location: form.php?'.$datos_codificados);
            } else {
                $datos_post=array(
                    'tipo' =>'Salida',
                    'Codigo'=> '12',
                );
                header('location: form.php?'.$datos_codificados);
            }
            ;
            $stmt->close();
        }
        ;
    };
    if(isset($_POST['NumMatricula'])){
        $id = $_POST['NumMatricula'];
        $Destino = $_POST['Destino'];
        $fechayhora = $_POST['fechayhora'];
        $Barco = $_POST['Barco'];
        $conexion = conectarBD();
        $sql = "UPDATE salida SET Destino=?, FechaYHora=? WHERE idSalida=?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("ssi",$Destino, $fechayhora, $id);
            if ($stmt->execute()) {
                $datos_post=array(
                    'tipo' =>'Salida',
                    'Codigo'=> '11',
                );
                $datos_codificados = http_build_query($datos_post);
                header('location: form.php?'.$datos_codificados);
            } else {
                $datos_post=array(
                    'tipo' =>'Salida',
                    'Codigo'=> '12',
                );
                header('location: form.php?'.$datos_codificados);
            }
            ;
            $stmt->close();
        }
        ;

    };

    // Realiza acciones con los datos, como almacenarlos en una base de datos o procesarlos de alguna otra manera.
};

