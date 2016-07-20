-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2016 a las 08:25:10
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `Id_Area` int(11) NOT NULL,
  `Nom_Area` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`Id_Area`, `Nom_Area`, `Descripcion`) VALUES
(1, 'CS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `Id_Cargo` int(11) NOT NULL,
  `Nombre_Cargo` varchar(40) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`Id_Cargo`, `Nombre_Cargo`, `Descripcion`) VALUES
(1, 'Jefe de Area', 'Gestor estrategico de sitio'),
(2, 'Encargado', 'Se encarga de gestionar los tramites'),
(3, 'Mesa de Partes', 'Se encarga de direccionar los tramites'),
(4, 'Obrero', 'Se encarga de trabajar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Id_Empleado` int(11) NOT NULL,
  `Id_Cargo` int(11) NOT NULL,
  `Id_Area` int(11) NOT NULL,
  `Activo` varchar(20) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Dni_Empleado` int(8) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id_Empleado`, `Id_Cargo`, `Id_Area`, `Activo`, `Correo`, `Dni_Empleado`, `Password`) VALUES
(14, 4, 1, 'vacaciones', 'lla@la', 22222222, 'pass'),
(15, 4, 1, 'vacaciones', 'a@a', 11111111, 'cont');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id_Expediente` int(11) NOT NULL,
  `Estado` varchar(11) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id_Expediente`, `Estado`, `Descripcion`) VALUES
(6, 'pendiente', 'Aun esta pendiente'),
(7, 'pendiente', 'Aun esta pendiente'),
(8, 'pendiente', 'Aun esta pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `Id_Movimiento` int(11) NOT NULL,
  `Id_Expediente` int(11) NOT NULL,
  `Id_Remitente` int(11) NOT NULL,
  `Id_Destino` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Id_Personas` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`Id_Movimiento`, `Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Id_Personas`, `Fecha`) VALUES
(1, 7, 0, 1, 6, 0, '2016-07-15'),
(2, 8, 0, 1, 8, 0, '2016-07-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `Id_Persona` int(11) NOT NULL,
  `Dni` int(8) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Nombre_Empresa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa`) VALUES
(13, 22222222, 'Alexis', 'Mendoza', ''),
(14, 22222222, 'Alexis', 'Mendoza', ''),
(15, 11111111, 'bryce', 'jano', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tramite`
--

CREATE TABLE `tipo_tramite` (
  `Id_Expediente` int(11) NOT NULL,
  `Tipo_Tramite` varchar(20) NOT NULL,
  `Prioridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_tramite`
--

INSERT INTO `tipo_tramite` (`Id_Expediente`, `Tipo_Tramite`, `Prioridad`) VALUES
(2, 'Algun tipo', 3),
(3, 'Algun tipo', 3),
(4, 'Algun tipo', 3),
(5, 'algun tipo', 3),
(6, 'solicitud', 2),
(7, 'solicitud', 2),
(8, 'solicitud', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `Id_Expediente` int(11) NOT NULL,
  `Folios` int(11) NOT NULL,
  `Fecha_Ingreso` int(11) NOT NULL,
  `Fecha_Termino` int(11) NOT NULL,
  `Asunto` varchar(500) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Id_Area_Destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`Id_Expediente`, `Folios`, `Fecha_Ingreso`, `Fecha_Termino`, `Asunto`, `Id_Persona`, `Id_Area_Destino`) VALUES
(2, 7, 2016, 0, 'algun problema', 6, 1),
(3, 7, 2016, 0, 'algun problema', 6, 1),
(4, 7, 2016, 0, 'algun problema', 6, 1),
(5, 7, 2016, 0, 'algun problema', 7, 1),
(6, 46, 2016, 0, 'algun asunto', 6, 1),
(7, 46, 2016, 0, 'algun asunto', 6, 1),
(8, 46, 2016, 0, 'algun asunto', 6, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Id_Area`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`Id_Cargo`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id_Empleado`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`Id_Movimiento`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`Id_Persona`);

--
-- Indices de la tabla `tipo_tramite`
--
ALTER TABLE `tipo_tramite`
  ADD PRIMARY KEY (`Id_Expediente`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`Id_Expediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `Id_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `Id_Movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `Id_Expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
