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
                   include ('formUsuario.php');
                    break;
                case 'Salida':
                    
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
        switch ($_GET['tipo']) {
            case 'Usuario':
                echo '<a href="../usuarios"><button class="btn primary">Volver</button></a>';
                break;
            case 'Salida':
                echo '<a href="../salidas"><button class="btn primary">Volver</button></a>';
                break;
            default:
                echo '';
                break;
        }
        ;
        echo '</div>';
        ?>
    </div>
</div>