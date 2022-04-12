-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2021 a las 03:23:02
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mibiblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bb_datos`
--

CREATE TABLE `bb_datos` (
  `bb_id` int(11) NOT NULL,
  `bb_nombre` varchar(20) NOT NULL,
  `bb_apellidoP` varchar(20) NOT NULL,
  `bb_apellidoM` varchar(20) NOT NULL,
  `bb_Sexo` int(1) NOT NULL,
  `bb_Pais` varchar(20) NOT NULL,
  `bb_Estado` varchar(20) NOT NULL,
  `bb_Municipio` varchar(60) NOT NULL,
  `bb_Key` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bb_datos`
--

INSERT INTO `bb_datos` (`bb_id`, `bb_nombre`, `bb_apellidoP`, `bb_apellidoM`, `bb_Sexo`, `bb_Pais`, `bb_Estado`, `bb_Municipio`, `bb_Key`) VALUES
(5, 'estandar', 'l', 'l', 0, 'México', 'Durango', 'Victoria de Durango', 'ZXN0YW5kYXJlc3RhbmRhckBtYWlsLmNvbUFrYW1hcnUyOA=='),
(6, 'Admin', 'l', 'l', 0, 'México', 'Durango', 'Victoria de Durango', 'QWRtaW5hZG1pbmlzdHJhZG9yQG1haWwuY29tQWthbWFydTI4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bb_libros`
--

CREATE TABLE `bb_libros` (
  `bb_id` int(11) NOT NULL,
  `bb_Titulo` varchar(40) NOT NULL,
  `bb_Genero` varchar(40) NOT NULL,
  `bb_Autor` varchar(40) NOT NULL,
  `bb_Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bb_libros`
--

INSERT INTO `bb_libros` (`bb_id`, `bb_Titulo`, `bb_Genero`, `bb_Autor`, `bb_Estado`) VALUES
(1, 'El Gato Negro', 'Terror', 'Edgar Alan Poe', 0),
(2, '100 años de soledad', 'Novela', 'Gabriel García Márquez', 0),
(6, 'Biblia', 'Relijion', 'Varios', 0),
(7, 'El principito', 'Infantil', 'Autor', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bb_prestamos`
--

CREATE TABLE `bb_prestamos` (
  `bb_id` int(11) NOT NULL,
  `bb_Titulo` varchar(60) NOT NULL,
  `bb_poseedor` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bb_usrs`
--

CREATE TABLE `bb_usrs` (
  `bb_id` int(11) NOT NULL,
  `bb_nme` varchar(20) NOT NULL,
  `bb_cor` varchar(60) NOT NULL,
  `bb_psw` varchar(256) NOT NULL,
  `bb_rnk` int(1) NOT NULL,
  `bb_key` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bb_usrs`
--

INSERT INTO `bb_usrs` (`bb_id`, `bb_nme`, `bb_cor`, `bb_psw`, `bb_rnk`, `bb_key`) VALUES
(5, 'estandar', 'estandar@mail.com', 'Um9vYmVk', 0, 'ZXN0YW5kYXJlc3RhbmRhckBtYWlsLmNvbUFrYW1hcnUyOA=='),
(6, 'Admin', 'Roobed@mail.com', 'Um9vYmVk', 1, 'QWRtaW5hZG1pbmlzdHJhZG9yQG1haWwuY29tQWthbWFydTI4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bb_datos`
--
ALTER TABLE `bb_datos`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indices de la tabla `bb_libros`
--
ALTER TABLE `bb_libros`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indices de la tabla `bb_prestamos`
--
ALTER TABLE `bb_prestamos`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indices de la tabla `bb_usrs`
--
ALTER TABLE `bb_usrs`
  ADD PRIMARY KEY (`bb_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bb_datos`
--
ALTER TABLE `bb_datos`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bb_libros`
--
ALTER TABLE `bb_libros`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bb_prestamos`
--
ALTER TABLE `bb_prestamos`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bb_usrs`
--
ALTER TABLE `bb_usrs`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
