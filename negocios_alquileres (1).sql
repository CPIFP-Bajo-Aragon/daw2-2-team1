-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-02-2024 a las 07:55:27
-- Versión del servidor: 8.0.35-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `negocios_alquileres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ADMINISTRADOR`
--

CREATE TABLE `ADMINISTRADOR` (
  `id_administrador` int NOT NULL,
  `NIF` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ADMINISTRADOR`
--

INSERT INTO `ADMINISTRADOR` (`id_administrador`, `NIF`) VALUES
(1, '111222333'),
(2, '112233445'),
(3, '121212121');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AVISO`
--

CREATE TABLE `AVISO` (
  `id_aviso` int NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `id_administrador` int DEFAULT NULL,
  `NIF` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CHATEAR`
--

CREATE TABLE `CHATEAR` (
  `Id_mensaje` int NOT NULL,
  `NIF` varchar(255) DEFAULT NULL,
  `NIF_chatear` varchar(255) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `fecha_envío` date DEFAULT NULL,
  `hora_envio` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `CHATEAR`
--

INSERT INTO `CHATEAR` (`Id_mensaje`, `NIF`, `NIF_chatear`, `mensaje`, `fecha_envío`, `hora_envio`) VALUES
(1, '123456789', '987654321', 'Hello, how are you?', '2024-01-22', '0'),
(2, '987654321', '123456789', 'Hi John! I am doing well.', '2024-01-23', '0'),
(3, '222333111', '123456789', 'd', '2024-01-28', '23:16:18'),
(4, '222333111', '123456789', 'h', '2024-01-28', '23:16:19'),
(5, '222333111', '987654321', 'isno', '2024-01-28', '23:28:02'),
(6, '123456789', '222333111', 'eyyyyy', '2024-01-29', '00:41:25'),
(7, '111222333', '222333111', 'hola', '2024-01-30', '02:23:02'),
(8, '111222333', '112233445', 'a', '2024-01-30', '02:25:22'),
(10, '987654321', '1', 'holi', '2024-01-31', '12:22:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DISPONER_SERVICIO`
--

CREATE TABLE `DISPONER_SERVICIO` (
  `id_municipio` int NOT NULL,
  `id_servicio` int NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `Nombre_da_servicio` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `DISPONER_SERVICIO`
--

INSERT INTO `DISPONER_SERVICIO` (`id_municipio`, `id_servicio`, `descripcion`, `telefono`, `direccion`, `latitud`, `longitud`, `Nombre_da_servicio`, `ID`) VALUES
(1, 2, 'Limpiamos casas', '123456789', 'a', '41.642537', '-0.891522', 'limpiamucho', 14),
(1, 1, 'te damos internet', '234567891', 'b', '41.632541', '-0.868176', 'movita', 15),
(1, 1, 'te damos mejor internet', '345678912', 'c', '41.648751', '-0.867747', 'ornge', 16),
(2, 4, 'aparcamos tu coche', '456789123', 'd', '42.141306', '-0.421769', 'aparchadores', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOCUMENTO`
--

CREATE TABLE `DOCUMENTO` (
  `id_documento` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_carga` date DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `NIF` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `DOCUMENTO`
--

INSERT INTO `DOCUMENTO` (`id_documento`, `nombre`, `tipo_documento`, `descripcion`, `fecha_carga`, `archivo`, `NIF`) VALUES
(1, 'Resume', 'PDF', 'John Doe Resume', '2024-01-22', 'resume.pdf', '123456789'),
(2, 'Contract', 'Word', 'Business Agreement', '2024-01-23', 'contract.doc', '987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENTIDAD`
--

CREATE TABLE `ENTIDAD` (
  `id_entidad` int NOT NULL,
  `nombre_entidad` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `dirección` varchar(255) DEFAULT NULL,
  `número_telefónico` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `página_web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ENTIDAD`
--

INSERT INTO `ENTIDAD` (`id_entidad`, `nombre_entidad`, `sector`, `dirección`, `número_telefónico`, `correo`, `página_web`) VALUES
(1, 'Company A', 'Technology', '123 Tech Street', '555-1234', 'info@companyA.com', 'www.companyA.com'),
(2, 'Business B', 'Finance', '456 Finance Avenue', '555-5678', 'info@businessB.com', 'www.businessB.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GESTOR`
--

CREATE TABLE `GESTOR` (
  `id_gestor` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `GESTOR`
--

INSERT INTO `GESTOR` (`id_gestor`, `nombre`, `correo`) VALUES
(3, 'Manager C', 'managerC@example.com'),
(4, 'Manager D', 'managerD@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `IMAGEN`
--

CREATE TABLE `IMAGEN` (
  `id_imagen` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `formato` varchar(255) DEFAULT NULL,
  `tamaño` varchar(255) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `descripción` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `codigo_inmueble` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `IMAGEN`
--

INSERT INTO `IMAGEN` (`id_imagen`, `nombre`, `formato`, `tamaño`, `fecha_subida`, `descripción`, `ruta`, `codigo_inmueble`) VALUES
(7, 'dormir', 'jpg', 'x', '2024-01-10', 'x', '/images/inmueble_', 1),
(8, 'casa2', 'jpg', 'x', '2024-01-01', 'a', '/images/inmueble_', 1),
(9, 'fondo', 'jpg', 'x', '2024-01-03', 'x', '/images/inmueble_', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INMUEBLE`
--

CREATE TABLE `INMUEBLE` (
  `id_oferta` int NOT NULL,
  `codigo_inmueble` int NOT NULL,
  `metros_cuadrados` varchar(255) DEFAULT NULL,
  `distribucion` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `caracteristicas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fotos` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `tipo_alquiler` varchar(255) DEFAULT NULL,
  `planta` varchar(255) DEFAULT NULL,
  `planos` varchar(255) DEFAULT NULL,
  `equipamiento` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `id_municipio` int DEFAULT NULL,
  `latitud` varchar(250) NOT NULL,
  `longitud` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `INMUEBLE`
--

INSERT INTO `INMUEBLE` (`id_oferta`, `codigo_inmueble`, `metros_cuadrados`, `distribucion`, `titulo`, `caracteristicas`, `descripcion`, `fotos`, `direccion`, `precio`, `ubicacion`, `tipo_alquiler`, `planta`, `planos`, `equipamiento`, `estado`, `id_municipio`, `latitud`, `longitud`) VALUES
(1, 1, '2', 'ninguna', 'Local narcopiso', 'cocaina abundante', 'pues eso un narco piso', NULL, 'a ti te lo voy a decir', '1', 'secreta', 'tipo', 'de maria', 'ninguno', 'provetas macetas\r\n', 'nueva zelanda', 1, '40.453100', '-3.688300'),
(2, 2, '1', 'secreta', 'secreta', 'secreta', 'secreta', 'secreta', 'secreta', '2', 'secreta', 'secreta', 'secreta', 'secreta', 'secreta', 'secreta', 2, '40.452812', '-3.688238');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INSCRIBIR`
--

CREATE TABLE `INSCRIBIR` (
  `NIF` varchar(255) NOT NULL,
  `id_oferta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LOCAL`
--

CREATE TABLE `LOCAL` (
  `codigo_inmueble` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `capacidad` varchar(255) DEFAULT NULL,
  `recursos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `LOCAL`
--

INSERT INTO `LOCAL` (`codigo_inmueble`, `nombre`, `capacidad`, `recursos`) VALUES
(2, 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MUNICIPIO`
--

CREATE TABLE `MUNICIPIO` (
  `id_municipio` int NOT NULL,
  `nombre_municipio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `código_postal` varchar(255) DEFAULT NULL,
  `log` varchar(250) NOT NULL,
  `lat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `MUNICIPIO`
--

INSERT INTO `MUNICIPIO` (`id_municipio`, `nombre_municipio`, `código_postal`, `log`, `lat`) VALUES
(1, 'Cityville', '12345', '-0.873413', '41.644183'),
(2, 'Townsville', '67890', '-0.43396', '42.143042');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NEGOCIO`
--

CREATE TABLE `NEGOCIO` (
  `codigo_inmueble` int DEFAULT NULL,
  `codigo_negocio` int NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `motivo_traspaso` varchar(255) DEFAULT NULL,
  `coste_traspaso` varchar(255) DEFAULT NULL,
  `coste_mensual` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `capital_minimo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `NEGOCIO`
--

INSERT INTO `NEGOCIO` (`codigo_inmueble`, `codigo_negocio`, `titulo`, `motivo_traspaso`, `coste_traspaso`, `coste_mensual`, `ubicacion`, `descripcion`, `capital_minimo`) VALUES
(2, 1, 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(NULL, 37, 'Negocio', 'sfg', 'sefg', 'rgf', 'f', 'vvvvvvvvvvvvvvvvvvv', 'v'),
(2, 333, 'ninguna', 'me jubilo', '1', '1', 'a', 'a', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NOTICIA`
--

CREATE TABLE `NOTICIA` (
  `id_noticia` int NOT NULL,
  `título` varchar(255) DEFAULT NULL,
  `fecha_publicación` date DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `id_municipio` int DEFAULT NULL,
  `id_gestor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NOTIFICACION`
--

CREATE TABLE `NOTIFICACION` (
  `id_notificacion` int NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `NIF` varchar(255) NOT NULL,
  `leido` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `NOTIFICACION`
--

INSERT INTO `NOTIFICACION` (`id_notificacion`, `tipo`, `contenido`, `NIF`, `leido`) VALUES
(1, 'Message', 'You have a new message.', '123456789', 0),
(2, 'Alert', 'Important alert!', '987654321', 0),
(3, 'el que tu quieras', 'ninguno', '222333111', 1),
(5, 'ninguno', 'secreto', '222333111', 1),
(8, 'aaaaaaaaaaa', 'ddd', '222333111', 1),
(9, 'bbbbbb', 'dddddddddddddddddddddd', '222333111', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OFERTA`
--

CREATE TABLE `OFERTA` (
  `id_oferta` int NOT NULL,
  `tipo_oferta` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `condiciones` varchar(255) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `NIF` varchar(255) DEFAULT NULL,
  `id_entidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `OFERTA`
--

INSERT INTO `OFERTA` (`id_oferta`, `tipo_oferta`, `fecha_inicio`, `fecha_fin`, `condiciones`, `fecha_publicacion`, `tipo`, `NIF`, `id_entidad`) VALUES
(1, 'a', '2024-01-01', '2024-01-10', 'asdfasd', '2024-01-18', 'as', '123456789', 1),
(2, 'laaaaa', '2024-01-03', '2024-01-03', 'jkljk', '2024-01-01', 'kjhlhj', '222333111', 2),
(5, NULL, NULL, NULL, NULL, NULL, NULL, '123456789', NULL),
(6, 'G', '2023-01-01', '2023-01-01', 'ALGO', '2023-01-01', 'loquesea', NULL, NULL),
(7, 'G', '2023-01-01', '2023-01-01', 'ALGO', '2023-01-01', 'loquesea', NULL, NULL),
(8, 'G', '2023-01-01', '2023-01-01', 'ALGO', '2023-01-01', 'loquesea', NULL, NULL),
(9, 'G', '2023-01-01', '2023-01-01', 'ALGO', '2023-01-01', 'loquesea', NULL, NULL),
(10, 'G', '2023-01-01', '2023-01-01', 'ALGO', '2023-01-01', 'loquesea', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERTENECER`
--

CREATE TABLE `PERTENECER` (
  `NIF` varchar(255) NOT NULL,
  `id_entidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PERTENECER`
--

INSERT INTO `PERTENECER` (`NIF`, `id_entidad`) VALUES
('123456789', 1),
('222333111', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SERVICIO`
--

CREATE TABLE `SERVICIO` (
  `id_servicio` int NOT NULL,
  `nombre_servicio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `SERVICIO`
--

INSERT INTO `SERVICIO` (`id_servicio`, `nombre_servicio`, `tipo`) VALUES
(1, 'Internet', 'Communication'),
(2, 'Cleaning', 'Maintenance'),
(3, 'Security', 'Safety'),
(4, 'Parking', 'Facility');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `NIF` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `id_municipio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`NIF`, `nombre`, `apellido`, `correo`, `contrasena`, `id_municipio`) VALUES
('1', '1', 'E', 'eduardo.lizana2014@gmail.com', '1', 1),
('111222333', 'eduadmin', 'eduadmin', 'eduadmin@eduadmin', 'admin', 1),
('112233445', 'samuadmin', 'samuadmin', 'samuadmin@samuadmin', 'samuadmin', 1),
('121212121', 'hajaradmin', 'hajaradmin', 'hajaradmin@hajaradmin', 'admin', 1),
('123456789', 'samu', 'samu', 'samu@samu', 'samu', 1),
('222333111', 'eduardo', 'edu', 'edu@edu', 'edu', 1),
('987654321', 'hajar', 'hajar', 'hajar@hajar', 'hajar', 1),
('X1234567', 'zdfed', 'sdf', 'dsf', 'df', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VAL_INMUEBLE`
--

CREATE TABLE `VAL_INMUEBLE` (
  `id_valoracion_inmueble` int NOT NULL,
  `puntuacion` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `fecha_valoracion` date DEFAULT NULL,
  `NIF` varchar(255) DEFAULT NULL,
  `codigo_inmueble` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `VAL_INMUEBLE`
--

INSERT INTO `VAL_INMUEBLE` (`id_valoracion_inmueble`, `puntuacion`, `comentario`, `fecha_valoracion`, `NIF`, `codigo_inmueble`) VALUES
(5, '0', 'l', '2024-01-29', '222333111', 1),
(7, '4', 'asfdasdas', '2024-01-29', '222333111', 1),
(8, '20', 's\r\n', '2024-01-30', '123456789', 2),
(9, '0', 'l', '2024-01-30', '123456789', 2),
(10, '3', 'a', '2024-01-30', '987654321', 2),
(11, '3', 'a', '2024-01-30', '123456789', 2),
(12, '111111111111', 'a', '2024-01-31', '987654321', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VAL_NEGOCIO`
--

CREATE TABLE `VAL_NEGOCIO` (
  `id_valoracion_negocio` int NOT NULL,
  `puntuacion` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `fecha_valoracion` date DEFAULT NULL,
  `NIF` varchar(255) DEFAULT NULL,
  `codigo_negocio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `VAL_NEGOCIO`
--

INSERT INTO `VAL_NEGOCIO` (`id_valoracion_negocio`, `puntuacion`, `comentario`, `fecha_valoracion`, `NIF`, `codigo_negocio`) VALUES
(6, '4', 'a', '2024-01-30', '123456789', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VIVIENDA`
--

CREATE TABLE `VIVIENDA` (
  `codigo_inmueble` int NOT NULL,
  `habitaciones` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ADMINISTRADOR`
--
ALTER TABLE `ADMINISTRADOR`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `NIF` (`NIF`);

--
-- Indices de la tabla `AVISO`
--
ALTER TABLE `AVISO`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `id_administrador` (`id_administrador`),
  ADD KEY `NIF` (`NIF`);

--
-- Indices de la tabla `CHATEAR`
--
ALTER TABLE `CHATEAR`
  ADD PRIMARY KEY (`Id_mensaje`),
  ADD KEY `NIF` (`NIF`),
  ADD KEY `NIF_chatear` (`NIF_chatear`);

--
-- Indices de la tabla `DISPONER_SERVICIO`
--
ALTER TABLE `DISPONER_SERVICIO`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `restriccion1` (`id_municipio`),
  ADD KEY `restriccion2` (`id_servicio`);

--
-- Indices de la tabla `DOCUMENTO`
--
ALTER TABLE `DOCUMENTO`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `NIF` (`NIF`);

--
-- Indices de la tabla `ENTIDAD`
--
ALTER TABLE `ENTIDAD`
  ADD PRIMARY KEY (`id_entidad`);

--
-- Indices de la tabla `GESTOR`
--
ALTER TABLE `GESTOR`
  ADD PRIMARY KEY (`id_gestor`);

--
-- Indices de la tabla `IMAGEN`
--
ALTER TABLE `IMAGEN`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `codigo_inmueble` (`codigo_inmueble`);

--
-- Indices de la tabla `INMUEBLE`
--
ALTER TABLE `INMUEBLE`
  ADD PRIMARY KEY (`id_oferta`),
  ADD UNIQUE KEY `codigo_inmueble` (`codigo_inmueble`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `INSCRIBIR`
--
ALTER TABLE `INSCRIBIR`
  ADD PRIMARY KEY (`NIF`,`id_oferta`),
  ADD KEY `id_oferta` (`id_oferta`);

--
-- Indices de la tabla `LOCAL`
--
ALTER TABLE `LOCAL`
  ADD PRIMARY KEY (`codigo_inmueble`);

--
-- Indices de la tabla `MUNICIPIO`
--
ALTER TABLE `MUNICIPIO`
  ADD PRIMARY KEY (`id_municipio`),
  ADD UNIQUE KEY `código_postal` (`código_postal`);

--
-- Indices de la tabla `NEGOCIO`
--
ALTER TABLE `NEGOCIO`
  ADD PRIMARY KEY (`codigo_negocio`),
  ADD KEY `codigo_inmueble` (`codigo_inmueble`);

--
-- Indices de la tabla `NOTICIA`
--
ALTER TABLE `NOTICIA`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `id_gestor` (`id_gestor`);

--
-- Indices de la tabla `NOTIFICACION`
--
ALTER TABLE `NOTIFICACION`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `NOTIFICACION_ibfk_1` (`NIF`);

--
-- Indices de la tabla `OFERTA`
--
ALTER TABLE `OFERTA`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `NIF` (`NIF`,`id_entidad`);

--
-- Indices de la tabla `PERTENECER`
--
ALTER TABLE `PERTENECER`
  ADD PRIMARY KEY (`NIF`,`id_entidad`),
  ADD KEY `id_entidad` (`id_entidad`);

--
-- Indices de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`NIF`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `VAL_INMUEBLE`
--
ALTER TABLE `VAL_INMUEBLE`
  ADD PRIMARY KEY (`id_valoracion_inmueble`),
  ADD KEY `NIF` (`NIF`),
  ADD KEY `codigo_inmueble` (`codigo_inmueble`);

--
-- Indices de la tabla `VAL_NEGOCIO`
--
ALTER TABLE `VAL_NEGOCIO`
  ADD PRIMARY KEY (`id_valoracion_negocio`),
  ADD KEY `NIF` (`NIF`),
  ADD KEY `codigo_negocio` (`codigo_negocio`);

--
-- Indices de la tabla `VIVIENDA`
--
ALTER TABLE `VIVIENDA`
  ADD PRIMARY KEY (`codigo_inmueble`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ADMINISTRADOR`
--
ALTER TABLE `ADMINISTRADOR`
  MODIFY `id_administrador` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `AVISO`
--
ALTER TABLE `AVISO`
  MODIFY `id_aviso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `CHATEAR`
--
ALTER TABLE `CHATEAR`
  MODIFY `Id_mensaje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `DISPONER_SERVICIO`
--
ALTER TABLE `DISPONER_SERVICIO`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `DOCUMENTO`
--
ALTER TABLE `DOCUMENTO`
  MODIFY `id_documento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ENTIDAD`
--
ALTER TABLE `ENTIDAD`
  MODIFY `id_entidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `GESTOR`
--
ALTER TABLE `GESTOR`
  MODIFY `id_gestor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `IMAGEN`
--
ALTER TABLE `IMAGEN`
  MODIFY `id_imagen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `INMUEBLE`
--
ALTER TABLE `INMUEBLE`
  MODIFY `codigo_inmueble` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2003;

--
-- AUTO_INCREMENT de la tabla `MUNICIPIO`
--
ALTER TABLE `MUNICIPIO`
  MODIFY `id_municipio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `NOTICIA`
--
ALTER TABLE `NOTICIA`
  MODIFY `id_noticia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `NOTIFICACION`
--
ALTER TABLE `NOTIFICACION`
  MODIFY `id_notificacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `OFERTA`
--
ALTER TABLE `OFERTA`
  MODIFY `id_oferta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  MODIFY `id_servicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `VAL_INMUEBLE`
--
ALTER TABLE `VAL_INMUEBLE`
  MODIFY `id_valoracion_inmueble` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `VAL_NEGOCIO`
--
ALTER TABLE `VAL_NEGOCIO`
  MODIFY `id_valoracion_negocio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ADMINISTRADOR`
--
ALTER TABLE `ADMINISTRADOR`
  ADD CONSTRAINT `ADMINISTRADOR_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `AVISO`
--
ALTER TABLE `AVISO`
  ADD CONSTRAINT `AVISO_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `ADMINISTRADOR` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AVISO_ibfk_2` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `CHATEAR`
--
ALTER TABLE `CHATEAR`
  ADD CONSTRAINT `CHATEAR_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CHATEAR_ibfk_2` FOREIGN KEY (`NIF_chatear`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `DISPONER_SERVICIO`
--
ALTER TABLE `DISPONER_SERVICIO`
  ADD CONSTRAINT `restriccion1` FOREIGN KEY (`id_municipio`) REFERENCES `MUNICIPIO` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restriccion2` FOREIGN KEY (`id_servicio`) REFERENCES `SERVICIO` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `DOCUMENTO`
--
ALTER TABLE `DOCUMENTO`
  ADD CONSTRAINT `DOCUMENTO_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `IMAGEN`
--
ALTER TABLE `IMAGEN`
  ADD CONSTRAINT `IMAGEN_ibfk_1` FOREIGN KEY (`codigo_inmueble`) REFERENCES `INMUEBLE` (`codigo_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `INMUEBLE`
--
ALTER TABLE `INMUEBLE`
  ADD CONSTRAINT `INMUEBLE_ibfk_1` FOREIGN KEY (`id_oferta`) REFERENCES `OFERTA` (`id_oferta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `INMUEBLE_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `MUNICIPIO` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `INSCRIBIR`
--
ALTER TABLE `INSCRIBIR`
  ADD CONSTRAINT `INSCRIBIR_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `INSCRIBIR_ibfk_2` FOREIGN KEY (`id_oferta`) REFERENCES `OFERTA` (`id_oferta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `LOCAL`
--
ALTER TABLE `LOCAL`
  ADD CONSTRAINT `LOCAL_ibfk_1` FOREIGN KEY (`codigo_inmueble`) REFERENCES `INMUEBLE` (`codigo_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `NEGOCIO`
--
ALTER TABLE `NEGOCIO`
  ADD CONSTRAINT `NEGOCIO_ibfk_1` FOREIGN KEY (`codigo_inmueble`) REFERENCES `INMUEBLE` (`codigo_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `NOTICIA`
--
ALTER TABLE `NOTICIA`
  ADD CONSTRAINT `NOTICIA_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `MUNICIPIO` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `NOTICIA_ibfk_2` FOREIGN KEY (`id_gestor`) REFERENCES `GESTOR` (`id_gestor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `NOTIFICACION`
--
ALTER TABLE `NOTIFICACION`
  ADD CONSTRAINT `NOTIFICACION_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `OFERTA`
--
ALTER TABLE `OFERTA`
  ADD CONSTRAINT `OFERTA_ibfk_1` FOREIGN KEY (`NIF`,`id_entidad`) REFERENCES `PERTENECER` (`NIF`, `id_entidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PERTENECER`
--
ALTER TABLE `PERTENECER`
  ADD CONSTRAINT `PERTENECER_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERTENECER_ibfk_2` FOREIGN KEY (`id_entidad`) REFERENCES `ENTIDAD` (`id_entidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VAL_INMUEBLE`
--
ALTER TABLE `VAL_INMUEBLE`
  ADD CONSTRAINT `VAL_INMUEBLE_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `VAL_INMUEBLE_ibfk_2` FOREIGN KEY (`codigo_inmueble`) REFERENCES `INMUEBLE` (`codigo_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VAL_NEGOCIO`
--
ALTER TABLE `VAL_NEGOCIO`
  ADD CONSTRAINT `VAL_NEGOCIO_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `USUARIO` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `VAL_NEGOCIO_ibfk_2` FOREIGN KEY (`codigo_negocio`) REFERENCES `NEGOCIO` (`codigo_negocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VIVIENDA`
--
ALTER TABLE `VIVIENDA`
  ADD CONSTRAINT `VIVIENDA_ibfk_1` FOREIGN KEY (`codigo_inmueble`) REFERENCES `INMUEBLE` (`codigo_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
