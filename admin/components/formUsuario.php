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

<div class="containTableForm">
    <?php
    if ($set) {
        echo ' <form action="actualizar.php" method="post">';
    } else {
        echo ' <form action="../components/insertar.php" method="post">';
    }
    ?>
    <?php
    if ($set) {
        echo '';
    } else {
        echo '';
    }
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
                if ($set) {
                    echo ' <input type="text" name="cedula" id="codigo" value=' . $id . ' readonly>';
                } else {
                    echo ' <input type="text" name="cedula" id="codigo" placeholder="0123456789" required>';
                }
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
                if ($set) {
                    echo '<input type="text" name="nombre" id="Nombre" value=' . $resultado['Nombre'] . '>';
                } else {
                    echo '<input type="text" name="nombre" id="Nombre" placeholder="Pepito" required>';
                }
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
                if ($set) {
                    echo '<input type="text" name="apellidos" id="codigo" value=' . $resultado['Apellidos'] . '>';
                } else {
                    echo '<input type="text" name="apellidos" id="codigo" placeholder="Perez" required>';
                }
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
                    echo '<input type="text" name="nombretipo" id="codigo" value=' . $resultado['NombreTipo'] . ' readonly>';
                } else {
                    echo '<input type="text" name="nombretipo" id="codigo" placeholder="TPU-1" required>';
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
                if ($set) {
                    echo '<input type="text" name="telefono" id="codigo" value=' . $resultado['Telefono'] . '>';
                } else {
                    echo '<input type="text" name="telefono" id="codigo" placeholder="0123456789" required>';
                }
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
                if ($set) {
                    echo '<input type="text" name="fechanacimiento" id="codigo" value=' . $resultado['FechaNacimiento'] . ' readonly>';
                } else {
                    echo '<input type="date" name="fechanacimiento" id="codigo" required>';
                }
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
                if ($set) {
                    echo '<input type="text" name="direccion" id="codigo" value=' . $resultado['Direccion'] . '>';
                } else {
                    echo '<input type="text" name="direccion" id="codigo" placeholder="calle 123 #45-67" required>';
                }
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
                if ($set) {
                    echo '<input type="text" name="email" id="codigo" value=' . $resultado['Email'] . '>';
                } else {
                    echo '<input type="text" name="email" id="codigo" placeholder="email@ejemplo.com" required> ';
                }
                ?>

            </td>
        </tr>
    </table>
    <div class="formbuttons">
        <?php
        if ($set) {
            echo '
                <a href="eliminar.php?tipo=Usuario&id='.$id.'" class="btn danger">Eliminar</a>
                <button class="btn success" type="submit">Actualizar</button>
              ';
        } else {
            echo '<button class="btn success" type="submit">Insertar</button>';
        }
        ?>
    </div>

    </form>

</div>