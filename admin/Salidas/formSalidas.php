<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php
$tipo = $_GET["tipo"];
$id = $_GET["id"];
$nombre_servidor = "localhost";
$nombre_BD = "clubbahiaserena";
$nombre_usuario = "root";
$contrasena = "1234";
$conexion = mysqli_connect($nombre_servidor, $nombre_usuario, $contrasena, $nombre_BD);
$queryUsuarios = 'SELECT * FROM `usuario` WHERE Cedula=' . $id . '';
$resultado = mysqli_fetch_array(mysqli_query($conexion, $queryUsuarios));
?>

<div class="containTableForm">
    <table>
        <tr class="contenedor-input">
            <td>
                <label>
                    Cedula
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $id; ?> disabled>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Nombre
                </label>
            </td>
            <td>
                <input type="text" name="" id="Nombre" value=<?php echo $resultado['Nombre']; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Apellidos
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $resultado['Apellidos']; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    NombreTipo
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $resultado['TipoUsuario']; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Telefono
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $id; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    FechaNacimiento
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $id; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Direccion
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $id; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Email
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $id; ?>>
            </td>
        </tr>
    </table>

</div>
<div class="formbuttons">
    <button class="btn danger">Eliminar</button>
    <button class="btn success">Actualizar</button>
    <button class="btn primary">Volver</button>
</div>