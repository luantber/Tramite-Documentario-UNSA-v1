-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-07-2016 a las 00:17:33
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tramite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `Id_Area` int(11) NOT NULL,
  `Id_JefedeArea` int(11) NOT NULL,
  `Nom_Area` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`Id_Area`, `Id_JefedeArea`, `Nom_Area`, `Descripcion`) VALUES
(1, 0, 'Mesa de Partes', 'Se encarga de la recepción de documentos necesarios para la gestión de un tramite.'),
(2, 0, 'Gerencia', 'Gestiona los tramites y los redirige a cada area especializada.'),
(3, 0, 'Logistica', 'Area del personal encargando de gestion logistica.'),
(4, 0, 'Recursos Humanos', 'Area que vela por las necesidades del personal'),
(5, 0, 'Informatica', 'Area encargada del manejo de material informatico.'),
(6, 0, 'Contabilidad', 'Area encargada los estudios contables.');

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
(5, 'Gerente', 'Encargado de la administración de la empresa.');

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
(1, 1, 6, 'Trabajando', 'alejandrolarraondo@gmail.com', 70125996, 'karlaConK'),
(4, 2, 3, 'Trabajando', 'CatGirl_26@gmail.com', 78947568, 'elbryce'),
(5, 1, 5, 'Trabajando', 'alrus27@gmail.com', 76439586, 'ggladotanub'),
(6, 2, 5, 'Trabajando', 'luisbch@gmail.com', 78452375, 'luzithoMazNah'),
(7, 2, 1, 'Trabajando', 'margarcuae.19.29.46@gmail.com', 75463211, 'viskmokjojo'),
(10, 1, 3, 'Trabajando', 'mapo100@outlook.com', 74658346, 'nekochan'),
(12, 2, 4, 'Trabajando', 'JosueZabalaR@gmail.com', 78945634, 'jembo21_1'),
(13, 1, 4, 'Trabajando', 'BrianArrospide@hotmail.com', 76534567, 'elBrayan'),
(15, 2, 6, 'Trabajando', 'd1llarmando_13@hotmail.com', 77865454, 'yaNoTeAmoTeffy'),
(16, 5, 2, 'Trabajando', 'alexithoMakerito@hotmail.com', 77865487, 'elDineroEsDinero'),
(19, 3, 1, 'Vacaciones', 'tuAmigaAl100@hotmail.com', 76543644, 'teAmoDill');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Descripcion` varchar(100) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Id_Expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Descripcion`, `Estado`, `Id_Expediente`) VALUES
('esta es una prueba', '0', 9),
('en redireccionamiento', 'pendiente', 10),
('en redireccionamiento', 'pendiente', 11),
('en redireccionamiento', 'pendiente', 0),
('en redireccionamiento', 'pendiente', 0),
('en redireccionamiento', 'pendiente', 0),
('en redireccionamiento', 'pendiente', 12),
('en redireccionamiento', 'pendiente', 13);

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
(3, 9, 0, 1, 9, 0, '2016-07-15'),
(4, 9, 1, 3, 9, 10, '2016-06-20'),
(5, 9, 3, 2, 9, 1, '2016-06-20'),
(6, 10, 0, 1, 10, 0, '2016-07-15'),
(7, 10, 1, 3, 10, 0, '2016-07-15'),
(8, 11, 0, 1, 11, 19, '2016-07-15'),
(9, 11, 1, 3, 11, 19, '2016-07-15'),
(10, 0, 0, 1, 0, 19, '2016-07-15'),
(11, 0, 1, 3, 0, 19, '2016-07-15'),
(12, 0, 0, 1, 0, 19, '2016-07-15'),
(13, 0, 1, 3, 0, 19, '2016-07-15'),
(14, 0, 0, 1, 0, 19, '2016-07-15'),
(15, 0, 1, 3, 0, 19, '2016-07-15'),
(16, 12, 0, 1, 12, 19, '2016-07-15'),
(17, 12, 1, 3, 12, 19, '2016-07-15'),
(18, 13, 0, 1, 13, 18, '2016-07-15'),
(19, 13, 1, 3, 13, 18, '2016-07-15');

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
(1, 70125996, 'Alejandro Jesús', 'Larraondo Lamchog', ''),
(2, 70293485, 'Alexis Aldo', 'Mendoza Villarroel', 'Inmobiliaria Mendoza'),
(3, 45964813, 'Yara Jeanette', 'Quispe Quispe', 'YaraXDiana - Eventos Infantiles'),
(4, 78947568, 'Katherine Rocio', 'Uñapilco Chambi', ''),
(5, 76439586, 'Alexander Rusvell', 'Apaza Torrez', ''),
(6, 78452375, 'Luis Antonio', 'Bernal Chahuayo', ''),
(7, 75463211, 'Margarita', 'Lacuaña Apaza', ''),
(8, 78990034, 'Ademir Clemente', 'Villena Zevallos', 'YaraXDiana - Eventos Infantiles'),
(9, 72396743, 'Carla', 'Torres Flores', 'Enapu SRL'),
(10, 74658346, 'Maria Pia', 'Vargas Galdos', ''),
(11, 77777777, 'Luis Enrique', 'Zevallos Zeballos', 'Zevallos Catering'),
(12, 78945634, 'Jesús Josue', 'Zabala Ramirez', ''),
(13, 76534567, 'Brian Paolo', 'Arrospide Lopez', ''),
(14, 78956456, 'Maria Angelica', 'Rivera Zegarra', 'Metales Zegarra SRL'),
(15, 77865454, 'Dillarmando', 'Zevallos Zeballos', ''),
(16, 77865487, 'Alexander', 'Maquera Chuctaya', ''),
(17, 78896543, 'Miluska Samantha', 'Quispe Maldonado', ''),
(18, 77243545, 'Beatriz del Milagro', 'Meza Chipoco', 'Servicios de Limpieza - La Bea'),
(19, 76543644, 'Estefany Paola', 'Mamani Gutierrez', ''),
(20, 76546571, 'Diana Milagros', 'Zuñiga Diaz', '');

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
(0, 'aun mas cosas', 2),
(9, 'seguros', 3),
(10, 'cosas', 3),
(11, 'mas cosas', 2),
(12, 'aun mas cosas', 2),
(13, 'con fe funciona', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `Id_Expediente` int(11) NOT NULL,
  `Folios` int(11) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Termino` date NOT NULL,
  `Asunto` varchar(500) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Id_Encargado` int(11) NOT NULL,
  `Recibido` tinyint(1) NOT NULL,
  `Id_Area_Actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`Id_Expediente`, `Folios`, `Fecha_Ingreso`, `Fecha_Termino`, `Asunto`, `Id_Persona`, `Id_Encargado`, `Recibido`, `Id_Area_Actual`) VALUES
(9, 12, '0000-00-00', '0000-00-00', 'noidea', 1, 5, 1, 1),
(10, 321, '2016-07-15', '0000-00-00', 'mas pruebas', 19, 0, 0, 1),
(11, 41, '2016-07-15', '0000-00-00', 'mas pruebas', 19, 0, 0, 1),
(12, 41, '2016-07-15', '0000-00-00', 'mas pruebas', 19, 0, 0, 1),
(13, 41, '2016-07-15', '0000-00-00', 'mas pruebas', 18, 0, 0, 1);

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
  MODIFY `Id_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `Id_Movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `Id_Expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
