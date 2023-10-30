<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php require_once '../config.php'; ?>
<?php
$set = isset($_GET["id"]);
if ($set) {
    $conexion = conectarBD();
    $querySalida = 'SELECT * FROM `salida` WHERE idSalida=' . $id . '';
    $resultado = mysqli_fetch_array(mysqli_query($conexion, $querySalida));
}
?>

<div class="containTableForm">
    <?php
    $set ?
        print ' <form action="actualizar.php" method="post">'
        :
        print ' <form action="../components/insertar.php" method="post">';
    ?>

    <table>
        <tr class="contenedor-input">
            <td>
                <label>
                    <?php 
                    $set ? 'id Salida': '';
                    ?>
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="idSalida" id="idSalida" value="' . $id . '" readonly>'
                    :
                    ''
                    ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Destino
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="Destino" id="Destino" value="' . $resultado['Destino'] . '">'
                    :
                    print '<input type="text" name="Destino" id="Destino" placeholder="lugar">';

                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Fecha y Hora
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print ' <input type="text" name="fechayhora" id="fechayhora" value="' . $resultado['FechayHora'] . '">'
                    :
                    print '<input type="datetime-local" name="fechayhora" id="fechayhora" placeholder="aaaa-mm-dd hh-mm--ss" >'
                    ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Barco
                </label>
            </td>
            <td>
                <?php
                if ($set) {
                    print '<input type="text" name="Barco" id="Barco" value="' . $resultado['Barco'] . '" readonly>';
                } else {
                    echo '<select name="Barco">';
                    $sql = "SELECT * FROM `barco`";
                    $conexion = conectarBD();
                    $resultado = (mysqli_query($conexion, $sql));
                    while ($fila = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $fila['NumMatricula'] . '">' . $fila['NombreBarco'] . ' [' . $fila['NumMatricula'] . ']</option>';
                    }
                    echo '</select>';
                }
                ?>

            </td>
        </tr>

    </table>
    <div class="formbuttons">
        <?php
        if ($set) {
            echo ' <a href="eliminar.php?tipo=Salida&id=<?php echo $id; ?>" class="btn danger">Eliminar</a>
                    <button class="btn success" type="submit">Actualizar</button>';
        } else {
            echo '<button class="btn success" type="submit">Insertar</button>';
        }
        ?>
    </div>
    </form>
</div>