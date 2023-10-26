<head>
    <link rel="stylesheet" type="text/css" href='../css/styleModal.css'>
</head>
<?php
$codigo = $_GET['Codigo'];
?>
<div class="modal">
    <div class="containerMessage">
        <div class="messageTitulo">
            Mensaje
        </div>
        <div class="messageMessage">
            <?php
            switch ($codigo) {
                case 1:
                    echo 'No se pudo eliminar';
                    break;
                case 10:
                    echo 'Eliminado Correctamente';
                    break;
                case 11:
                    echo 'Actualizado correctamente';
                    break;
                case 12:
                    echo 'Error al actualizar';
                    break;
                case 13:
                    echo 'Insertado correctamente';
                    break;
                case 14:
                    echo 'Error al insertar';
                default:
                    echo 'Error desconocido';
                    break;
            }
            ?>
        </div>
        <?php
            echo '<div class="containTableForm">';
            switch ($_GET['tipo']) {
                case 'Usuario':
                    echo '<a href="../usuarios"><button class="btn primary">Volver</button></a>';
                    break;
                case 'Salida':
                    echo '<a href="../salidas"><button class="btn primary">Volver</button></a>';
                    break;
                case 'Barco':
                    echo '<a href="../Barcos"><button class="btn primary">Volver</button></a>';
                default:
                    echo '';
                    break;
            };
            echo '</div>';
        ?>
    </div>
</div>