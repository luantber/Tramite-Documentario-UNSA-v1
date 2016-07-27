-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2016 a las 06:55:14
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tramitedocumentario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre` varchar(10) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Sexo` tinyint(1) NOT NULL,
  `Fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellido`, `DNI`, `Email`, `Sexo`, `Fecha_registro`) VALUES
('Alexander', 'Apaza', '770460', 'alrus@mail.com', 1, '2016-06-20'),
('A', 'B', '77046056', 'alrus@mailp.com', 1, '2016-06-20'),
('Asadsa', 'asdsad', '12321322', 'alrassd@mail.com', 1, '2016-06-20'),
('', '', '', '', 1, '2016-06-20'),
('Bra', 'ASD', '12345678', 'al@mail.com', 1, '2016-06-20'),
('Brais', 'Echenique', '12345678', 'bra@mail.com', 1, '2016-06-20'),
('A', 'B', '87654321', 'd@mail.com', 1, '2016-06-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
