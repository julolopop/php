-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-01-2018 a las 19:12:31
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nombreCorto` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `tic` tinyint(1) NOT NULL,
  `ordenadores` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `nombre`, `nombreCorto`, `ubicacion`, `tic`, `ordenadores`) VALUES
(1, 'aula 100', '100', 'centro', 0, NULL),
(2, 'aula 101', '101', 'sur', 1, 25),
(3, 'aula 102', '102', 'norte', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `contraseña`, `nick`) VALUES
(1, 'juanma', '123', 'juanma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `id_aulas` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `eliminacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aulas` (`id_aulas`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `fecha`, `id_aulas`, `descripcion`, `id_usuario`, `eliminacion`) VALUES
(1, '2018-01-03 08:15:00', 1, 'adfs', 1, NULL),
(2, '2018-01-03 08:15:00', 2, '456', 1, NULL),
(6, '2018-01-03 08:15:00', 3, 'asf', 1, NULL),
(7, '2018-01-03 09:15:00', 1, 'df', 1, NULL),
(9, NULL, 2, 'si', 1, 'da'),
(10, '2018-01-04 08:15:00', 1, 'joseda', 1, NULL),
(11, NULL, 1, 'ad', 1, 'as');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `id_aulas_for` FOREIGN KEY (`id_aulas`) REFERENCES `aula` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_consultas_for` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
