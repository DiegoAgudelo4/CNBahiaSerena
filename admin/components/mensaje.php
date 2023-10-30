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
                    echo 'No se pudo eliminar, *existe una relacion con algun objeto*';
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
            echo '<a href="';
            switch ($_GET['tipo']) {
                case 'Usuario':
                    echo '../usuarios';
                    break;
                case 'Salida':
                    echo '../salidas';
                    break;
                case 'Barco':
                    echo '../Barcos';
                default:
                    echo '';
                    break;
            };
            echo '"><button class="btn primary">Volver</button></a>';
            echo '</div>';
        ?>
    </div>
</div>