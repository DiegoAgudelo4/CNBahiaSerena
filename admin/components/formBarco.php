<link rel="stylesheet" type="text/css" href="./css/styleForms.css">
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

    echo "<div class='cuerpo'>";
    echo "    <img src=";

    if ($row['Foto'] == 'NULL') {
        echo './img/yatch.png';
    } else {
        echo '.' . $row['Foto'];
    }

    echo " alt='FotoDeBarco'>";
    echo "</div>";
}
?>

<?php
if ($set) {
    //carga la tabla de salidas del barco (si tiene)
    $conexion = conectarBD();
    $queryBarcos = 'SELECT * FROM `barco` B INNER JOIN `salida` S ON B.NumMatricula=S.BARCO WHERE NumMatricula = ?';
    $stmt = mysqli_prepare($conexion, $queryBarcos);
    if ($stmt) {
        // Vincular el parámetro
        mysqli_stmt_bind_param($stmt, "s", $id); // "s" para un parámetro de cadena
        // Ejecutar la declaración
        mysqli_stmt_execute($stmt);
        // Obtener el resultado
        $resultado2 = mysqli_stmt_get_result($stmt);
        if ($resultado2) {
            // Almacenar los resultados en un arreglo
            $resultadosArray = array();
            while ($row2 = mysqli_fetch_assoc($resultado2)) {
                $resultadosArray[] = $row2;
            }
            // Cerrar la declaración
            mysqli_stmt_close($stmt);

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);

            //La tabla de las salidas del barco
            echo "<div class='tablaSalidas'>
                <h2>Salidas de $id</h2>";
            if (count($resultadosArray) == 0) { 
                echo "Este barco no tiene salidas registradas";
            } else {

                echo "<table class='tablaAgregada'>";
                echo "<tr><th>#</th><th>ID Salida</th><th>Destino</th><th>Fecha y Hora</th> <th>Patron</th></tr>";
                $i=1;
                foreach ($resultadosArray as $row2) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo '<td><a href="../components/form.php?tipo=Salida&id=' . $row2['idSalida'] . '">' . $row2['idSalida'] . '</a></td>';
                    echo "<td>" . $row2["Destino"] . "</td>";
                    echo "<td>" . $row2["FechayHora"] . "</td>";
                    echo '<td><a href="../components/form.php?tipo=Usuario&id=' . $row2['Patron'] . '">' . $row2["Patron"] . '</a></td>';
                    echo "</tr>";
                    $i=$i+1;
                }
                echo "  </table>";

            }
            echo '</div>';
        } else {
            // Manejar el error en la obtención de resultados
            echo "Error al obtener resultados: " . mysqli_error($conexion);
        }
    } else {
        // Manejar el error en la preparación de la declaración
        echo "Error al preparar la declaración: " . mysqli_error($conexion);
    }
}

//carga el tipo de formulario
?>
<div class="containTableForm">
    <?php
    $set ?
        print ' <form action="./components/actualizar.php" method="post">
            <h2>Actualizar</h2>'
        :
        print ' <form action="../components/insertar.php" method="post" enctype="multipart/form-data">';
    ?>

    <table class="tablaForm">
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
                    print '<input type="text" maxlength="7" name="Matricula" id="codigo" placeholder="AB1234" required>  ';
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
                    print '<input type="text" maxlength="30" name="nombre" id="Nombre" placeholder="Nombre" required>';
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
                    print '<input type="text" maxlength="3" name="amarre" id="codigo" placeholder="Xxx" required>';
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
                    print '<input type="text" name="Cuota" id="codigo" step="0.01" value="' . $row['Cuota'] . '">'
                    :
                    print '<input type="text" name="Cuota" id="codigo" placeholder="0.00" step="0.01" required>';
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
            echo ' <a href="./components/eliminar.php?tipo=Barco&id=' . $id . '" class="btn danger">Eliminar</a> 
                <button class="btn success" type="submit">Actualizar</button>
            ';
        } else {
            echo '<button class="btn success" type="submit">Insertar</button>';
        }
        ?>
    </div>
    </form>
</div>