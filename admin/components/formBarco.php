<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php require_once '../config.php'; ?>
<?php
$conexion = conectarBD();
$queryBarcos= 'SELECT * FROM `barco` WHERE NumMatricula=' . $id . '';
$resultado = mysqli_fetch_array(mysqli_query($conexion, $queryBarcos));
?>

<div class="containTableForm">
    <form action="actualizar.php" method="post">
        <table>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Matricula
                    </label>
                </td>
                <td>
                    <input type="text" name="Matricula" id="codigo" value=<?php echo $id; ?> readonly>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Nombre
                    </label>
                </td>
                <td>
                    <input type="text" name="nombre" id="Nombre" value=<?php echo $resultado['NombreBarco']; ?>>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Amarre
                    </label>
                </td>
                <td>
                    <input type="text" name="amarre" id="codigo" value=<?php echo $resultado['numeroAmarre']; ?>>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Cuota
                    </label>
                </td>
                <td>
                    <input type="text" name="Cuota" id="codigo" value=<?php echo $resultado['Cuota']; ?> readonly>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Dueño
                    </label>
                </td>
                <td>
                    <input type="text" name="dueño" id="codigo" value=<?php echo $resultado['Usuario']; ?>>
                </td>
            </tr>
        </table>
        <div class="formbuttons">
        <a href="eliminar.php?tipo=Usuario&id=<?php echo $id; ?>" class="btn danger">Eliminar</a>
        <button class="btn success" type="submit">Actualizar</button>
    </div>
    </form>

</div>