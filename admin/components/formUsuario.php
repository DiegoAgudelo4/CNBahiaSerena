<link rel="stylesheet" type="text/css" href="../css/styleForms.css">
<?php require_once '../config.php'; ?>
<?php
$set = isset($_GET["id"]);
if ($set) {
    $conexion = conectarBD();
    $queryUsuarios = 'SELECT * FROM `usuario` AS U INNER JOIN `tipousuario` AS TU ON u.TipoUsuario=TU.CodTipoUsuario WHERE Cedula=' . $id . '';
    $resultado = mysqli_fetch_array(mysqli_query($conexion, $queryUsuarios));
}
?>
<?php
if ($set) {
    //carga la tabla de salidas del barco (si tiene)
    $conexion = conectarBD();
    $queryBarcos = 'SELECT * FROM `barco` B INNER JOIN `Usuario` A ON B.Usuario=A.Cedula WHERE A.Cedula = ?';
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
                <h2>Barcos de $id</h2>";
            if (count($resultadosArray) == 0) { 
                echo "Este Usuario no es dueño de ningun barco";
            } else {

                echo "<table class='tablaAgregada'>";
                echo "<tr><th>#</th><th>Matricula</th><th>Amarre</th><th>Cuota $</th></tr>";
                $i=1;
                foreach ($resultadosArray as $row2) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo '<td><a href="../components/form.php?tipo=Barco&id=' . $row2['NumMatricula'] . '">' . $row2['NumMatricula'] . '</a></td>';
                    echo "<td>" . $row2["NumeroAmarre"] . "</td>";
                    echo "<td>" . $row2["Cuota"] . "</td>";
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
    if($resultado["NombreTipo"]=='Patron'){
    $conexion = conectarBD();
    $queryBarcos = 'SELECT * FROM `Salida` B INNER JOIN `Usuario` A ON B.Patron=A.Cedula WHERE A.Cedula = ?';
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
                echo "Este Usuario no es dueño de ningun barco";
            } else {

                echo "<table class='tablaAgregada'>";
                echo "<tr><th>#</th><th>IdSalida</th><th>Fecha y Hora</th><th>Barco</th></tr>";
                $i=1;
                foreach ($resultadosArray as $row2) {
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo '<td><a href="../components/form.php?tipo=Salida&id=' . $row2['idSalida'] . '">' . $row2['idSalida'] . '</a></td>';
                    echo "<td>" . $row2["FechayHora"] . "</td>";
                    echo '<td><a href="../components/form.php?tipo=Barco&id=' . $row2['Barco'] . '">' . $row2["Barco"] . '</td>';
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
}

//carga el tipo de formulario
?>
<div class="containTableForm">
    <?php
    $set ?
        print ' <form action="actualizar.php" method="post">'
        :
        print ' <form action="../components/insertar.php" method="post" >';
    ?>
    <table>
        <tr class="contenedor-input">
            <td>
                <label>
                    Cedula
                </label>
            </td>
            <td>
                <?php
                $set ? print(' <input type="text" name="cedula" id="codigo" value=' . $id . ' readonly>')
                    : print(' <input type="text" maxlength="10" name="cedula" id="codigo" placeholder="0123456789" required>');
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
                    print '<input type="text" name="nombre" id="Nombre" value="' . $resultado['Nombre'] . '">'
                    :
                    print '<input type="text"  maxlength="50" name="nombre" id="Nombre" placeholder="Pepito" required>';
                ?>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Apellidos
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="apellidos" id="codigo" value="' . $resultado['Apellidos'] . '">'
                    :
                    print '<input type="text" maxlength="50" name="apellidos" id="codigo" placeholder="Perez" required>';
                ?>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Tipo de usuario
                </label>
            </td>
            <td>
                <?php
                if ($set) {
                    print '<input type="text" name="nombretipo" id="codigo" value="' . $resultado['NombreTipo'] . '" readonly>';
                } else {
                    echo '<select name="nombretipo">';
                    $sql = "SELECT * FROM `tipousuario`";
                    $conexion = conectarBD();
                    $resultado = (mysqli_query($conexion, $sql));
                    while ($fila = mysqli_fetch_array($resultado)) {
                        echo '<option value="' . $fila['CodTipoUsuario'] . '">' . $fila['NombreTipo'] . '</option>';
                    }
                    echo '</select>';
                }
                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Telefono
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="telefono" id="codigo" value=' . $resultado['Telefono'] . '>'
                    :
                    print '<input type="text" maxlength="15" name="telefono" id="codigo" placeholder="0123456789" required>';
                ?>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Fecha de Nacimiento
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="fechanacimiento" id="codigo" value="' . $resultado['FechaNacimiento'] . '" readonly>'
                    :
                    print '<input type="date" name="fechanacimiento" id="codigo" required>';
                ?>
            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Direccion
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="direccion" id="codigo" value="' . $resultado['Direccion'] . '">'
                    :
                    print '<input type="text" maxlength="100" name="direccion" id="codigo" placeholder="calle 123 #45-67" required>';
                ?>

            </td>
        </tr>
        <tr class="contenedor-input">
            <td>
                <label>
                    Email
                </label>
            </td>
            <td>
                <?php
                $set ?
                    print '<input type="text" name="email" id="codigo" value=' . $resultado['Email'] . '>'
                    :
                    print '<input type="text" maxlength="50" name="email" id="codigo" placeholder="email@ejemplo.com" required> ';
                ?>
            </td>
        </tr>
    </table>
    <div class="formbuttons">
        <?php
        if ($set) {
            echo '
                <a href="eliminar.php?tipo=Usuario&id=' . $id . '" class="btn danger">Eliminar</a>
                <button class="btn success" type="submit">Actualizar</button>
              ';
        } else {
            echo '<button class="btn success" type="submit">Insertar</button>';
        }
        ?>
    </div>

    </form>

</div>