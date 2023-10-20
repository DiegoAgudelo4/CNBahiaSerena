<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php require_once '../config.php'; ?>
<?php
$conexion = conectarBD();
$queryUsuarios = 'SELECT * FROM `usuario` AS U INNER JOIN `tipousuario` AS TU ON u.TipoUsuario=TU.CodTipoUsuario WHERE Cedula=' . $id . '';
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
                    Tipo de usuario
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $resultado['NombreTipo']; ?> disabled>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Telefono
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $resultado['Telefono']; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Fecha de Nacimiento
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $resultado['FechaNacimiento']; ?>>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Direccion
                </label>
            </td>
            <td>
                <input type="text" name="" id="codigo" value=<?php echo $resultado['Direccion']; ?>>
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
    <div class="formbuttons">
        <a href="eliminar.php?tipo=Usuario&id=<?php echo $id; ?>" class="btn danger">Eliminar</a>
        <a class="btn success">Actualizar</a>
    </div>
</div>