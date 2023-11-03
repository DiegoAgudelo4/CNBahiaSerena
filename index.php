<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/LogoBahiaSerenaIcon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Bahía serena</title>

</head>

<body>
    <nav class="navbar">
        <img src="./img/LogoBahiaSerenaFullIcon.png" alt="Logo Bahia Serena">
        <ul>
            <li><a href="./admin">Iniciar Sesion</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="introduction">
            <h2>Introducción</h2>
            <p>
                Se quiere diseñar una base de datos relacional para gestionar los datos de los socios de un club
                náutico. De cada socio se guardan los datos personales y los datos del barco o barcos que posee: número
                de matrícula, nombre, número del amarre y cuota que paga por el mismo. Además, se quiere mantener
                información sobre las salidas realizadas por cada barco, como la fecha y hora de salida, el destino y
                los datos personales del patrón, que no tiene porque ser el propietario del barco, ni es necesario que
                sea socio del club.
            </p>
        </div>
        <div class="objectives">
            <h2>Objetivos</h2>
            <ul>
                <li>Crear una base de datos relacional para gestionar los datos de los socios del club náutico.</li>
                <li>Almacenar datos personales de los socios, como nombre, dirección, etc.</li>
                <li>Registrar información de los barcos propiedad de los socios, incluyendo número de matrícula, nombre,
                    número de amarre y cuota.</li>
                <li>Registrar las salidas de los barcos, incluyendo fecha, hora, destino y datos del patrón.</li>
                <li>Permitir la gestión de datos de los patrones, que no necesariamente son socios del club.</li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="page-container">
        <div class="containTituloBarcos">
            <h2>Algunos de nuestros barcos</h2>
        </div>
        <div class="containBarcos">
            <?php
            include './admin/config.php';
            $conexion = conectarBD();
            $queryUsuarios = "SELECT NumMatricula, NombreBarco,NumeroAmarre, Cuota,Foto, U.Nombre,u.Apellidos FROM `barco` AS B INNER JOIN `Usuario` AS U ON B.Usuario=U.Cedula AND Foto!='NULL' WHERE 1 LIMIT 4; ";
            $resultado = mysqli_query($conexion, $queryUsuarios);
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_array($resultado)) {
                    echo '<div class="tarjeta">';
                    echo '<div class="cuerpo">';
                    echo '<img src="';
                    if ($row['Foto'] == 'NULL') {
                        echo './admin/img/yatch.png';
                    } else {
                        echo './admin' . $row['Foto'];
                    }
                    echo '">';
                    echo '</div>';
                    echo '<div class="titulo">Matricula: ' . $row['NumMatricula'] . '</div>';
                    echo '<div class="titulo">Amarre: ' . $row['NumeroAmarre'] . '</div>';
                    echo '<div class="cuerpo">Nombre del barco:' . $row['NombreBarco'] . '</div>';
                    echo '<div class="cuerpo">Cuota: $' . $row['Cuota'] . '</div>';
                    echo '<div class="titulo">Dueño</div>';
                    echo '<div class="cuerpo">' . $row['Nombre'] . '</div>';
                    echo '<div class="cuerpo">' . $row['Apellidos'] . '</div>';

                    echo '</div>';
                }
            }
            if (isset($_GET['Insertar'])) {
                include '../components/modalInsertar.php';
            }
            ?>
        </div>
    </div>
    <hr>
    <div class="containForm">
        <div>
            <h2>¿Deseas Ser Socio?</h2>
        </div>
        <div class="Form">
            <form action="./admin/components/insertar.php" method="post">
                <label for="">
                    <h2>Inscribete!</h2>
                </label>
                <label for="">Cedula</label>
                <input class="input" type="text" name="cedula" id="codigo" placeholder="0123456789" required>
                <label for="">Nombre</label>
                <input class="input" type="text" name="nombre" id="Nombre" placeholder="Pepito" required>
                <label for="">Apellidos</label>
                <input class="input" type="text" name="apellidos" id="codigo" placeholder="Perez" required>
                <label for="">Telefono</label>
                <input class="input" type="text" name="telefono" id="codigo" placeholder="0123456789" required>
                <label for="">Fecha de nacimiento</label>
                <input class="input" type="date" name="fechanacimiento" id="codigo" required>
                <label for="">Direccion</label>
                <input class="input" type="text" name="direccion" id="codigo" placeholder="calle 123 #45-67" required>
                <label for="">Email</label>
                <input class="input" type="text" name="email" id="codigo" placeholder="email@ejemplo.com" required>
                <?php
                if (isset($_GET['codigo'])) {
                    echo 'Te has registrado correctamente :)';
                }
                ?>
                <button class="btn success" type="submit">inscribirse</button>

            </form>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Información de Contacto</h3>
                <ul>
                    <li>Teléfono: (123) 456-7890</li>
                    <li>Correo Electrónico: info@example.com</li>
                    <li>Dirección: 123 Calle Principal, Ciudad</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Acerca de Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Redes Sociales</h3>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>