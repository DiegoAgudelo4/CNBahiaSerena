<head>
    <link rel="stylesheet" type="text/css" href='../css/styleModal.css'>
</head>
<?php
?>
<div class="modal">
    <div class="containerMessage">
        <div class="messageTitulo">
            Insertar
        </div>
        <div class="messageMessage">
            <?php
            switch ($_GET['tipo']) {
                case 'Usuario':
                    include('formUsuario.php');
                    break;
                case 'Salida':
                    include('formSalida.php');
                    break;
                case 'Barco':
                    include('formBarco.php');
                    break;
                default:
                    echo '';
                    break;
            }
            ;
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
                break;
            default:
                echo '';
                break;
        }
        ;
        echo '"><button class="btn primary">Volver</button></a>';
        echo '</div>';
        ?>
    </div>
</div>