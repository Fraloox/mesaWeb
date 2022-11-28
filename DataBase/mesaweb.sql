-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-11-2022 a las 03:15:24
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mesaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dni`, `email`, `direccion`, `telefono`) VALUES
(1, 'Dionne', 'Sides', '78963412', 'dside0@feedburner.com', '06 Wayridge Pass', '4282878136'),
(3, 'Enos', 'Noen', '78912345', 'enoen1@amazon.co.uk', '3853 Cordelia Plaza', '2293473908'),
(4, 'Nissie  Pit', 'Acutt', '12378945', 'nacutt2@hhs.gov', '803 Continental Court', '4723420324'),
(5, 'Fidelity', 'McGeneay', '74196385', 'fmcgeneay3@cnn.com', '87437 Butterfield Parkway', '6294713072'),
(6, 'Chucho', 'Applegarth', '75395185', 'capplegarth4@vinaora.com', '75935 Hanover Junction', '7457561440');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `cantidad`, `marca`, `descripcion`, `precio`) VALUES
(1, 'Monitor Gamer F24T35', 5, 'Samsung', 'azul y gris oscuro 100v/240v de 24 pulgadas', 53399),
(2, 'Joystick inalámbrico PS5', 30, 'Sony', 'Para PS5, Dual-sense Original\r\nDisponibles en colores blanco y negro', 22999.6),
(3, 'Parlante Portátil Bluetooth Anker', 40, 'Anker', 'Modelo A3102, 12W con 24h de batería ', 11000.2),
(4, 'Disco solido interno snv2s2000g 2tb', 10, 'Kingston', 'Útil para guardar programas y documentos con su capacidad de 2 TB.\r\nMás espacio en tu PC con su factor de forma M.2 2280.\r\nInterfaces de conexión: PCIe 4.0 x4 y NVMe.\r\nApto para PC y Notebook.\r\nIncrementa el rendimiento de tu equipo.\r\n', 39523.1),
(5, 'Smart tv 7000 series led 4k', 15, 'Philips', 'Su resolución es 4K.\r\nTecnología HDR para una calidad de imagen mejorada.\r\nModo de sonido: Dolby Atmos, AI Sound.\r\nCon Prime Video, Disney+, YouTube, Netflix, Web browser, GloboPlay.\r\nGoogle Assistant incorporado.\r\nControl LG Magic Remote no incluido.\r\nSistema operativo Android 10.\r\nCapacidad de almacenamiento de 8GB.\r\nConectá tus dispositivos mediante sus 4 puertos HDMI y sus 2 puertos USB.\r\nDimensiones: 1226.8mm de ancho, 711.8mm de alto, 86.6mm de profundidad.\r\n', 129999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `rol` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `dni`, `email`, `direccion`, `telefono`, `contrasena`, `rol`) VALUES
(16, 'Lautaro Joel', 'Franco', '43529886', 'lautarofranco75@gmail.com', 'Barrio Villa Poujade calle 47 y 160', '3764604104', 'LautaroFranco1', 1),
(11, 'Fernandez', 'Martinez', '45652895', 'carinita@gmail.com', 'Barrio Villa Poujade calle 47 y 160', '3764604104', '43529886', 2),
(17, 'Dev', 'O\'Mailey', '43521589', 'domailey5@bing.com', '26 Annamark Drive', '3777021308', '43529886', 2),
(18, 'Arvin Cleen', 'Beeden', '52456789', 'abeeden6@a8.net', 'abeeden6@a8.net', '4096755576', '78456521', 2),
(19, 'Rosalyn', 'Korting', '45852456', 'rkorting7@lulu.com', 'rkorting7@lulu.com', '2094166176', 'pepecontra', 2),
(20, 'Carina Beatriz', 'Galdi', '29906089', 'carinita@gmail.com', 'Barrio Villa Poujade calle 47 y 160', '3764604104', '43529886', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
