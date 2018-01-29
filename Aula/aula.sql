-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-01-2018 a las 20:33:30
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
-- Base de datos: `aula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nombreCorto` varchar(100) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `tic` tinyint(1) NOT NULL,
  `ordenadores` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `nombre`, `nombreCorto`, `ubicacion`, `tic`, `ordenadores`) VALUES
(1, 'clase 105', '105', 'centro', 0, NULL),
(2, 'aula 100', '100', 'sur', 1, 21),
(3, 'aula 101', '101', 'norte', 0, NULL),
(4, 'aula102', '102', 'centro', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `contrasena`, `nick`) VALUES
(6, 'juanma', '123', 'juanma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_aulas` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_aulas` (`id_aulas`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `fecha`, `id_aulas`, `usuario`, `descripcion`) VALUES
(1, '2018-01-05 00:00:00', 1, '', ''),
(2, '2018-01-05 00:00:00', 2, '', ''),
(3, '2018-01-05 00:00:00', 3, '', ''),
(6, '2018-01-03 08:15:00', 1, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
