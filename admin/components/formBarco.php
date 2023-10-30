<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php require_once '../config.php'; ?>
<?php
$set = isset($_GET["id"]);
if ($set) {
    $conexion = conectarBD();
    $queryBarcos = 'SELECT * FROM `barco` WHERE NumMatricula = ?';
    // Preparar la declaración
    $stmt = mysqli_prepare($conexion, $queryBarcos);

    if ($stmt) {
        // Vincular el parámetro
        mysqli_stmt_bind_param($stmt, "s", $id); // "s" para un parámetro de cadena
        // Ejecutar la declaración
        mysqli_stmt_execute($stmt);
        // Obtener el resultado
        $resultado = mysqli_stmt_get_result($stmt);
        if ($resultado) {
            // Obtener los datos en un arreglo asociativo
            $row = mysqli_fetch_assoc($resultado);
            // Ahora puedes acceder a los datos utilizando $row
            //$nombre = $row['NombreBarco']; // Por ejemplo, para obtener el valor de la columna 'Nombre'
            // ... Realiza las operaciones que necesites con los datos ...
        } else {
            // Manejar el error en la obtención de resultados
            echo "Error al obtener resultados: " . mysqli_error($conexion);
        }
        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        // Manejar el error en la preparación de la declaración
        echo "Error al preparar la declaración: " . mysqli_error($conexion);
    }
    // Cerrar la conexión a la base de datos cuando hayas terminado
    mysqli_close($conexion);
}

?>

<div class="containTableForm">
    <?php
    $set ?
        print ' <form action="actualizar.php" method="post">'
        :
        print ' <form action="../components/insertar.php" method="post" enctype="multipart/form-data">';
    ?>

    <table>
        <tr class="contenedor-input">
            <td>
                <label>
                    Matricula
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="Matricula" id="codigo" value="' . $id . '" readonly> '
                    :
                    print '<input type="text" name="Matricula" id="codigo" placeholder="AB1234" required>  ';
                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Nombre
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="nombre" id="Nombre" value="' . $row['NombreBarco'] . '">'
                    :
                    print '<input type="text" name="nombre" id="Nombre" placeholder="Nombre" required>';
                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Amarre
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="amarre" id="codigo" value="' . $row['NumeroAmarre'] . '" >'
                    :
                    print '<input type="text" name="amarre" id="codigo" placeholder="Xxx" required>';
                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Cuota
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="number" name="Cuota" id="codigo" value="' . $row['Cuota'] . '">'
                    :
                    print '<input type="number" name="Cuota" id="codigo" placeholder="0.00" required>';
                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Dueño
                </label>
            </td>
            <td>
                <?php
                if ($set) {
                    print '<input type="number" name="dueño" id="codigo" value="' . $row['Usuario'] . '" readonly>';
                } else {
                    echo '<select name="usuario" required>';
                    echo '<option value="">  </option>';
                    $sql = "SELECT * FROM `usuario`";
                    $conexion = conectarBD();
                    $resultado = (mysqli_query($conexion, $sql));
                    while ($fila = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $fila['Cedula'] . '">' . $fila['Nombre'] . ' ' . $fila['Apellidos'] . '</option>';
                    }
                    echo '</select>';
                }
                ?>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    <?php
                    !$set ? print 'Foto del barco' : '';
                    ?>
                </label>
            </td>
            <td>
                <?php
                !$set ? print ' <input type="file" name="imagen" id="imagen">' : '';
                ?>
            </td>
        </tr>
    </table>
    <div class="formbuttons">
        <?php
        if ($set) {
            echo ' <a href="eliminar.php?tipo=Barco&id=' . $id . '" class="btn danger">Eliminar</a>
                    <button class="btn success" type="submit">Actualizar</button>';
        } else {
            echo '<button class="btn success" type="submit">Insertar</button>';
        }
        ?>
    </div>
    </form>
</div>