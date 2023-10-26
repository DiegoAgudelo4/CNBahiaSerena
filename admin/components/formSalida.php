<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php require_once '../config.php'; ?>
<?php
$conexion = conectarBD();
$queryBarcos= 'SELECT * FROM `salida` WHERE idSalida=' . $id . '';
$resultado = mysqli_fetch_array(mysqli_query($conexion, $queryBarcos));
?>

<div class="containTableForm">
    <form action="actualizar.php" method="post">
        <table>
            <tr class="contenedor-input">
                <td>
                    <label>
                        idSalida
                    </label>
                </td>
                <td>
                    <input type="text" name="idSalida" id="idSalida" value=<?php echo $id; ?> readonly>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Destino
                    </label>
                </td>
                <td>
                    <input type="text" name="Destino" id="Destino" value=<?php echo $resultado['Destino']; ?>>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Fecha y Hora
                    </label>
                </td>
                <td>
                    <input type="text" name="fechayhora" id="fechayhora" value=<?php echo $resultado['FechayHora']; ?>>
                </td>
            </tr>
            <tr class="contenedor-input">
                <td>
                    <label>
                        Barco
                    </label>
                </td>
                <td>
                    <input type="text" name="Barco" id="Barco" value=<?php echo $resultado['Barco']; ?> readonly>
                </td>
            </tr>
            
        </table>
        <div class="formbuttons">
        <a href="eliminar.php?tipo=Salida&id=<?php echo $id; ?>" class="btn danger">Eliminar</a>
        <button class="btn success" type="submit">Actualizar</button>
    </div>
    </form>

</div>