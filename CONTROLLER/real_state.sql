-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 23:12:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `real_state`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE `busqueda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `buscarpublicacion` varchar(100) DEFAULT NULL,
  `preciodesde` decimal(10,2) DEFAULT NULL,
  `preciohasta` decimal(10,2) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `busqueda`
--

INSERT INTO `busqueda` (`id`, `nombre`, `buscarpublicacion`, `preciodesde`, `preciohasta`, `fecha`) VALUES
(69, '', '', 0.00, 0.00, '0000-00-00 00:00:00'),
(70, '', '', 0.00, 0.00, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coment`
--

CREATE TABLE `coment` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `coment` varchar(900) NOT NULL,
  `Calificacion` int(5) NOT NULL,
  `fecha` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coment`
--

INSERT INTO `coment` (`Id`, `nombre`, `coment`, `Calificacion`, `fecha`) VALUES
(1, 'Daniel', 'bonita casa. la quiero', 5, '2023-11-23 22:10:02.832733'),
(2, '', 'es una casa muy hermosa. quisiera comprarla. cómo me puedo contactar con sumerse para poder hacer un acuerdo por el precio y poder comprarla.\r\naquí mi número de contacto: 3193025247', 0, '2023-11-23 22:11:20.175339');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_rol`
--

CREATE TABLE `id_rol` (
  `id` int(11) NOT NULL,
  `id_Rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `id_rol`
--

INSERT INTO `id_rol` (`id`, `id_Rol`) VALUES
(1, 'Administrador'),
(2, 'Comprador'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_tipodocumento`
--

CREATE TABLE `id_tipodocumento` (
  `id` int(11) NOT NULL,
  `tipoDocumento` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `id_tipodocumento`
--

INSERT INTO `id_tipodocumento` (`id`, `tipoDocumento`) VALUES
(1, 'cedula de ciudadania'),
(2, 'cedula de extranjeria'),
(3, 'tarjeta de identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `Id_Publicacion` int(11) NOT NULL,
  `Id_Tipo_Establ` int(11) NOT NULL,
  `Id_Tipo_Oferta` int(11) NOT NULL,
  `Imagen` blob NOT NULL,
  `Descripcion` varchar(900) NOT NULL,
  `Caracteristicas` varchar(900) NOT NULL,
  `Num_Contacto` tinyint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Contrasena` varchar(30) DEFAULT NULL,
  `nombres` text DEFAULT NULL,
  `apellidos` text DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `tipoDocumento` int(11) DEFAULT NULL,
  `numeroDocumento` bigint(20) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `numeroTelefono` bigint(20) DEFAULT NULL,
  `correoElectronico` varchar(25) DEFAULT NULL,
  `Rol` int(11) DEFAULT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `Usuario`, `Contrasena`, `nombres`, `apellidos`, `fechaNacimiento`, `tipoDocumento`, `numeroDocumento`, `direccion`, `numeroTelefono`, `correoElectronico`, `Rol`, `activo`) VALUES
(7, 'prueba1', '123', 'jose roberto', 'maldonado perez', '1970-12-31', 1, 1026558996, 'carrera 38#13-119', 3202026512, 'prueba1@gmail.com', NULL, b'0'),
(8, 'rios', '123', 'juan david', 'rios martinez', '2000-01-20', 1, 1026558996, 'carrera 38#13-119', 3202026512, 'prueba1@gmail.com', 3, b'0'),
(9, 'rios', '123', 'juan david', 'rios martinez', '2000-01-20', 2, 1026558996, 'carrera 38#13-119', 3202026512, 'prueba1@gmail.com', 3, b'0'),
(10, 'sophya', '1234', 'Sophya', 'Rincon', '2006-02-07', 2, 6556585854, 'calle15bsur', 36666547, 'sophya@gmail.com', 3, b'0'),
(11, 'sophya', '1555', 'Sophya', 'Rincon', '2023-11-08', 2, 6556585854, 'calle15bsur', 36666547, 'sophya@gmail.com', 2, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_establ`
--

CREATE TABLE `tipo_establ` (
  `Id_Tipo_Establ` int(11) NOT NULL,
  `Descripcion_Establ` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_establ`
--

INSERT INTO `tipo_establ` (`Id_Tipo_Establ`, `Descripcion_Establ`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_oferta`
--

CREATE TABLE `tipo_oferta` (
  `Id_Tipo_Oferta` int(11) NOT NULL,
  `Descripcion_Oferta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_oferta`
--

INSERT INTO `tipo_oferta` (`Id_Tipo_Oferta`, `Descripcion_Oferta`) VALUES
(1, 'Venta'),
(2, 'Alquiler'),
(3, 'Hipoteca');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `id_rol`
--
ALTER TABLE `id_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `id_tipodocumento`
--
ALTER TABLE `id_tipodocumento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`Id_Publicacion`),
  ADD KEY `Id_Tipo_Establ` (`Id_Tipo_Establ`),
  ADD KEY `Id_Tipo_Oferta` (`Id_Tipo_Oferta`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoDocumento` (`tipoDocumento`),
  ADD KEY `id_Rol` (`Rol`),
  ADD KEY `Rol` (`Rol`);

--
-- Indices de la tabla `tipo_establ`
--
ALTER TABLE `tipo_establ`
  ADD PRIMARY KEY (`Id_Tipo_Establ`);

--
-- Indices de la tabla `tipo_oferta`
--
ALTER TABLE `tipo_oferta`
  ADD PRIMARY KEY (`Id_Tipo_Oferta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `coment`
--
ALTER TABLE `coment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `id_rol`
--
ALTER TABLE `id_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `id_tipodocumento`
--
ALTER TABLE `id_tipodocumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `Id_Publicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_establ`
--
ALTER TABLE `tipo_establ`
  MODIFY `Id_Tipo_Establ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_oferta`
--
ALTER TABLE `tipo_oferta`
  MODIFY `Id_Tipo_Oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`Id_Tipo_Establ`) REFERENCES `tipo_establ` (`Id_Tipo_Establ`),
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`Id_Tipo_Oferta`) REFERENCES `tipo_oferta` (`Id_Tipo_Oferta`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`tipoDocumento`) REFERENCES `id_tipodocumento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`Rol`) REFERENCES `id_rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
