-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2017 a las 11:03:23
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inso2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `NombreCompleto` varchar(50) DEFAULT NULL,
  `DNI` varchar(9) NOT NULL,
  `Edad` int(3) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `Contraseña` varchar(8) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Tarifa` varchar(150) NOT NULL,
  `Telefono1` int(9) NOT NULL,
  `Telefono2` int(9) NOT NULL,
  `Telefono3` int(9) NOT NULL,
  `privilegios` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `NombreCompleto`, `DNI`, `Edad`, `CorreoElectronico`, `Contraseña`, `Direccion`, `Tarifa`, `Telefono1`, `Telefono2`, `Telefono3`, `privilegios`) VALUES
(28, 'alex', '71457094G', 7, 'aja@aja.com', 'jaja', 'jaaaaaaaaaaaaaaaaa', 'Delfin', 693838, 4746646, 477447, 1),
(29, 'hola', '72727', 7227, 'jssjj', 'jaja', '', 'polla', 0, 0, 0, 1),
(30, 'Guille', '74547', 84, 'ioko', 'hola', 'hola', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `DNI` varchar(9) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `PuestoTrabajo` varchar(30) NOT NULL,
  `Contraseña` varchar(7) NOT NULL,
  `privilegios` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`DNI`, `Nombre`, `Correo`, `PuestoTrabajo`, `Contraseña`, `privilegios`) VALUES
('71446712M', 'Fernando', 'fergarc@estudiantes.unileon.es', 'AlCarrer', 'fustas1', 0),
('71446745M', 'Guillermo ', 'gvegag02@estudiantes.unileon.es', 'Boss', 'putoamo', 0),
('71446780M', 'Alejandro', 'aalvag11@estudiantes.unileon.es', 'Barrendero', 'fustas2', 0),
('7474', 'pepe', 'ffff', 'trabajador', 'hola', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
