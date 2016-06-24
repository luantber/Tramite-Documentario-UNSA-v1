-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2016 a las 08:47:39
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaineficiente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contraseña` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Cargo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID`, `Nombre`, `Apellido`, `Correo`, `Contraseña`, `Area`, `Cargo`) VALUES
('EMP-000001', 'Yara', 'Quispe', 'yquispe@mail.com', 'empleado', 'Ingenierias', 'Docente'),
('EMP-000002', 'Katherine', 'Uñapilco', 'kuñapilco@mail.com', 'empleado', 'Sociales', 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Sexo` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellido`, `Username`, `Password`, `Email`, `Sexo`, `Fecha_Creacion`) VALUES
('Alexander', 'Apaza', 'AApaza', 'usuario', 'aapaza@mail.com', 'Masculino', '2016-06-24'),
('Luis', 'Bernal', 'LBernal', 'usuario', 'lbernal@mail.com', 'Masculino', '2016-06-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
