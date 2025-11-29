-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 21:47:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Apellido1` varchar(20) NOT NULL,
  `Apellido2` varchar(20) NOT NULL,
  `Matricula` varchar(20) NOT NULL,
  `Semestre` int(11) NOT NULL,
  `Carrera_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_Alumno`),
  KEY `Carrera_ID` (`Carrera_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT,
  `Carreras` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_Carrera`, `Carreras`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_Libro` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Categoria_ID` int(11) NOT NULL,
  `Editorial` varchar(50) NOT NULL,
  `Imagen` longblob NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`ID_Libro`),
  KEY `Categoria_ID` (`Categoria_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_prestados`
--

CREATE TABLE `libros_prestados` (
  `ID_Prestado` int(11) NOT NULL AUTO_INCREMENT,
  `libro_ID` int(11) NOT NULL,
  `alumno_ID` int(11) NOT NULL,
  `Fecha_Prestamo` date NOT NULL,
  PRIMARY KEY (`ID_Prestado`),
  KEY `libro_ID` (`libro_ID`),
  KEY `alumno_ID` (`alumno_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`ID_Usuario`, `usuario`, `password`, `nombre`) VALUES
(1, 'carmen@gmail.com', '12345', 'Carmen');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`Carrera_ID`) REFERENCES `carreras` (`ID_Carrera`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Categoria_ID`) REFERENCES `categoria` (`ID_Categoria`);

--
-- Filtros para la tabla `libros_prestados`
--
ALTER TABLE `libros_prestados`
  ADD CONSTRAINT `libros_prestados_ibfk_1` FOREIGN KEY (`libro_ID`) REFERENCES `libros` (`ID_Libro`),
  ADD CONSTRAINT `libros_prestados_ibfk_2` FOREIGN KEY (`alumno_ID`) REFERENCES `alumnos` (`ID_Alumno`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
