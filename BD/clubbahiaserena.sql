-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 02:16:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubbahiaserena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Usuario` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`Usuario`, `Contrasena`) VALUES
('Pepito', 'pepito123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barco`
--

CREATE TABLE `barco` (
  `NumMatricula` varchar(7) NOT NULL,
  `NombreBarco` varchar(30) NOT NULL,
  `NumeroAmarre` varchar(3) NOT NULL,
  `Cuota` float NOT NULL,
  `Usuario` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `barco`
--

INSERT INTO `barco` (`NumMatricula`, `NombreBarco`, `NumeroAmarre`, `Cuota`, `Usuario`) VALUES
('BN1234', 'Mar Azul', 'A12', 500, '1001395801'),
('GT98765', 'Viento Marino', 'B8', 600, '1001395802');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `idSalida` int(11) NOT NULL,
  `Destino` varchar(50) NOT NULL,
  `FechayHora` datetime NOT NULL,
  `Barco` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`idSalida`, `Destino`, `FechayHora`, `Barco`) VALUES
(4, 'Isla', '2023-09-25 00:00:00', 'GT98765');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `CodTipoUsuario` varchar(5) NOT NULL,
  `NombreTipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`CodTipoUsuario`, `NombreTipo`) VALUES
('TPU-1', 'Socio'),
('TPU-2', 'Patron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cedula` varchar(12) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `TipoUsuario` varchar(5) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cedula`, `Nombre`, `Apellidos`, `TipoUsuario`, `Telefono`, `FechaNacimiento`, `Direccion`, `Email`) VALUES
('1001395801', 'Diego', 'Agudelo', 'TPU-2', '3134171749', '2002-03-04', 'Enrique', 'diegoagudelo180@gmail.com'),
('1001395802', 'Diego', 'Agudelo', 'TPU-2', '3134171749', '2002-03-04', 'Enrique', 'diegoagudelo180@gmail.com'),
('254684', 'Pepito', 'Perez', 'TPU-1', '2423112', '1994-03-09', 'calle 1234', 'pepito@gmail.com'),
('45451784', 'Alfonso', 'Cano', 'TPU-2', '54878946', '1994-10-12', 'Calle 23123', 'Alfonzo@cano.com'),
('546544621', 'Oscar ', 'Martinez Contreras', 'TPU-1', '45464216', '1990-06-06', 'carrera', 'Oscar@gmail.com'),
('548485112', 'Roberto', 'Pelaez', 'TPU-2', '45481151', '2023-10-05', 'calle 1234', 'pepito@gmail.com'),
('69874845', 'MAndinga', 'Rodriguez', 'TPU-1', '3135986943', '1982-02-02', 'calle', 'RRodriguez@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barco`
--
ALTER TABLE `barco`
  ADD PRIMARY KEY (`NumMatricula`),
  ADD KEY `BarcoUsuario` (`Usuario`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `SalidaBarco` (`Barco`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`CodTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `UsuarioTipoUsuario` (`TipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `idSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barco`
--
ALTER TABLE `barco`
  ADD CONSTRAINT `BarcoUsuario` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Cedula`);

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `SalidaBarco` FOREIGN KEY (`Barco`) REFERENCES `barco` (`NumMatricula`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `UsuarioTipoUsuario` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`CodTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
