-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 20-03-2024 a las 12:53:05
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--
CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso`
--

CREATE TABLE `aviso` (
  `id_aviso` int NOT NULL,
  `titulo_aviso` varchar(255) NOT NULL,
  `contenido_aviso` varchar(255) NOT NULL,
  `fecha_creacion_aviso` date NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `aviso`
--

INSERT INTO `aviso` (`id_aviso`, `titulo_aviso`, `contenido_aviso`, `fecha_creacion_aviso`, `id_usuario`) VALUES
(1, 'Oferta de trabajo', 'Se busca desarrollador web con experiencia en HTML, CSS y JavaScript.', '2024-02-06', 2),
(2, 'Venta de coche', 'Se vende coche usado en excelente estado. Modelo: XYZ, Año: 2020.', '2024-02-06', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatear`
--

CREATE TABLE `chatear` (
  `id_usuario` int NOT NULL,
  `id_usuario1` int NOT NULL,
  `fecha_chat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mensaje_chat` varchar(255) DEFAULT NULL,
  `estado_chat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `chatear`
--

INSERT INTO `chatear` (`id_usuario`, `id_usuario1`, `fecha_chat`, `mensaje_chat`, `estado_chat`) VALUES
(1, 2, '2024-02-14 08:04:18', 'hola', NULL),
(2, 1, '2024-02-14 08:15:45', 'holaaaaaaaaaaaaaaaa', NULL),
(1, 2, '2024-02-14 08:16:18', 'hola', NULL),
(1, 3, '2024-02-29 10:00:02', 'as', NULL),
(1, 2, '2024-02-29 10:23:15', 'asdf', NULL),
(1, 3, '2024-02-29 10:23:20', 'asdf', NULL),
(3, 1, '2024-02-29 10:23:35', 'hola', NULL),
(1, 2, '2024-03-05 13:32:09', 'ja', NULL),
(1, 2, '2024-03-05 18:27:28', 'hj', NULL),
(1, 3, '2024-03-05 18:28:18', 'hola', NULL),
(1, 3, '2024-03-05 18:35:44', 'asdf', NULL),
(1, 2, '2024-03-05 18:36:32', 'asdf', NULL),
(1, 3, '2024-03-05 18:39:28', 'samu', NULL),
(1, 2, '2024-03-05 18:39:36', 'hajar', NULL),
(1, 2, '2024-03-05 18:40:41', 'hola hajnar', NULL),
(1, 2, '2024-03-05 18:40:55', 'quiere ce mi amiga', NULL),
(1, 3, '2024-03-05 18:41:03', 'hijo de puta', NULL),
(1, 2, '2024-03-07 08:26:12', 'hola', NULL),
(1, 3, '2024-03-07 08:26:19', 'samu', NULL),
(1, 3, '2024-03-07 08:27:21', 'hola', NULL),
(3, 1, '2024-03-07 08:27:31', 'hola', NULL),
(1, 3, '2024-03-11 08:03:30', 'ype', NULL),
(3, 2, '2024-03-12 10:45:19', 'jola', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int NOT NULL,
  `nombre_documento` varchar(45) NOT NULL,
  `descripcion_documento` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `ruta_archivo` varchar(45) DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id_entidad` int NOT NULL,
  `nombre_entidad` varchar(100) NOT NULL,
  `cif_entidad` varchar(20) NOT NULL,
  `sector_entidad` varchar(50) DEFAULT NULL,
  `direccion_entidad` varchar(200) NOT NULL,
  `numero_telefono_entidad` varchar(15) NOT NULL,
  `correo_entidad` varchar(100) NOT NULL,
  `pagina_web_entidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre_entidad`, `cif_entidad`, `sector_entidad`, `direccion_entidad`, `numero_telefono_entidad`, `correo_entidad`, `pagina_web_entidad`) VALUES
(1, 'Empresa', '12312366a', 'Tecnolog', 'Calle Principal 123', '987654321', 'info@gmail.com', 'https://192.168.4.244/EntidadesControlador/editarentidades/1'),
(2, 'Tienda ABC', 'DEF789012', 'Comercio', 'Avenida Comercial 456', '123456789', 'info@tiendaabc.com', 'www.tiendaabc.com'),
(3, 'Organización Solidaria', 'GHI345678', 'Sin fines de lucro', 'Plaza Solidaria 789', '555555555', 'contacto@solidario.org', 'www.solidario.org'),
(4, 'Consultora XYZ', 'JKL901234', 'Consultoría', 'Calle Consultora 567', '111222333', 'info@consultoraxyz.com', 'www.consultoraxyz.com'),
(8, 'eduardo', '12345678A', 'autonomo', 'a', '12345', 'edu@edu', 'www.edu.com'),
(9, 'hajar', '987654321B', 'autonomo', 'a', '12', 'hajar@hajar', 'hajar.com'),
(10, 'samu', '555555555C', 'autonomo', 'secreto', '321', 'samu@samu', 'www.samuelempresa.com'),
(11, 'asd', '12312332R', 'a', 'a', 'a', 'ppp@gmail.com', 'https://192.168.4.244/EntidadesControlador/addentidades'),
(12, 'asd', '12344444T', '<h1>asdf</h1>', '<h1>asdf</h1>', '<h1>asdf</h1>', 'aaaaaa@gmail.com', 'https://192.168.4.244/EntidadesControlador/addentidades'),
(13, 'aaaaaaaaaa', '65465454Q', '<h1>aaa</h1>', '<h1>aaa</h1>', '<h1>aaa</h1>', 'aaaaaaaaa@gmail.com', 'https://192.168.4.244/EntidadesControlador/addentidades'),
(14, 'empresaaa', '12345678K', 'alguno', '', '123', 'empresa@empresa', 'www.jksdhasjd.com'),
(15, 'asdf', '12334214a', 'asdf', 'adsf', '234', 'eli@gmail.com', 'https://192.168.4.244/EntidadesControlador/addentidades'),
(16, 'Piratas y bucaneros SA', '70671072F', 'crimen organizado', 'mayor 1', '666555777', 'jrodenas@cpifpbajoaragon.com', 'https://service1.retodaw.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'bueno'),
(2, 'malo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int NOT NULL,
  `nombre_imagen` varchar(45) NOT NULL,
  `formato_imagen` varchar(45) NOT NULL,
  `ruta_imagen` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion_imagen` varchar(45) DEFAULT NULL,
  `id_inmueble` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre_imagen`, `formato_imagen`, `ruta_imagen`, `descripcion_imagen`, `id_inmueble`) VALUES
(1, 'jamon', 'jpg', '/images/inmueble_', 'a', 1),
(2, 'escaparate', 'jpg', '/images/inmueble_', 'a', 1),
(3, 'fachada', 'jpg', '/images/inmueble_', 'a', 1),
(5, 'escaparate', 'jpg', '/images/inmueble_', 'a', 2),
(6, 'producto', 'jpg', '/images/inmueble_', 'a', 2),
(7, 'casoplon', 'jpg', '/images/inmueble_', NULL, 3),
(8, 'descansillo', 'jpg', '/images/inmueble_', NULL, 3),
(9, 'dormitorio', 'jpg', '/images/inmueble_', NULL, 3),
(10, 'casa2', 'jpg', '/images/inmueble_', NULL, 4),
(11, 'fondo', 'jpg', '/images/inmueble_', NULL, 4),
(12, 'piso', 'jpg', '/images/inmueble_', NULL, 5),
(13, 'pisointerior', 'jpg', '/images/inmueble_', NULL, 5),
(14, 'bar', 'jpg', '/images/inmueble_', NULL, 6),
(15, 'barinterior', 'jpg', '/images/inmueble_', NULL, 6),
(16, 'hotel', 'jpg', '/images/inmueble_', NULL, 7),
(17, 'hotelpasillo', 'jpg', '/images/inmueble_', NULL, 7),
(18, 'empresa', 'jpg', '/images/inmueble_', NULL, 8),
(19, 'empresa2', 'jpg', '/images/inmueble_', NULL, 8),
(20, 'si', 'jpg', '/images/inmueble_', 'a', 9),
(21, 'no', 'jpg', '/images/inmueble_', 'a', 9),
(22, 'casica', 'jpg', '/images/inmueble_', NULL, 10),
(23, 'casica2', 'jpg', '/images/inmueble_', NULL, 10),
(24, 'mansion', 'jpg', '/images/inmueble_', 'a', 11),
(25, 'mansiondentro', 'jpg', '/images/inmueble_', 'a', 11),
(26, 'zf5g_p1m3_210127.jpg', '', '/public/images/inmueble_22/zf5g_p1m3_210127.jpg', NULL, 22),
(27, '50819.jpg', 'image/jpeg', '/public/images/inmueble_22/50819.jpg', NULL, 22),
(28, 'zf5g_p1m3_210127.jpg', '', '/srv/www/api/mvc_reto/public/images/inmueble_23/zf5g_p1m3_210127.jpg', NULL, 23),
(29, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/public/images/inmueble_23/50819.jpg', NULL, 23),
(30, 'zf5g_p1m3_210127.jpg', '', '/public/images/inmueble_24/zf5g_p1m3_210127.jpg', NULL, 24),
(31, '50819.jpg', 'image/jpeg', '/public/images/inmueble_24/50819.jpg', NULL, 24),
(32, 'zf5g_p1m3_210127.jpg', '', '/srv/www/api/mvc_reto/App/public/images/inmueble_25/zf5g_p1m3_210127.jpg', NULL, 25),
(33, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_25/50819.jpg', NULL, 25),
(34, 'zf5g_p1m3_210127.jpg', '', '/srv/www/api/mvc_reto/App/public/images/inmueble_26/zf5g_p1m3_210127.jpg', NULL, 26),
(35, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_26/50819.jpg', NULL, 26),
(36, 'zf5g_p1m3_210127.jpg', '', '/srv/www/api/mvc_reto/App/public/images/inmueble_27/zf5g_p1m3_210127.jpg', NULL, 27),
(37, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_27/50819.jpg', NULL, 27),
(38, 'zf5g_p1m3_210127.jpg', '', '/srv/www/api/mvc_reto/App/public/images/inmueble_28/zf5g_p1m3_210127.jpg', NULL, 28),
(39, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_28/50819.jpg', NULL, 28),
(40, 'zf5g_p1m3_210127.jpg', '', '/srv/www/api/mvc_reto/App/public/images/inmueble_29/zf5g_p1m3_210127.jpg', NULL, 29),
(41, '50819', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_29/50819.jpg', NULL, 29),
(42, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_30/50819.jpg', NULL, 30),
(43, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_31/50819.jpg', NULL, 31),
(44, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/public/images/inmueble_32/50819.jpg', NULL, 32),
(45, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/../public/images/inmueble_35/50819.jpg', NULL, 35),
(46, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/../public/images/inmueble_36/50819.jpg', NULL, 36),
(47, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/../public/images/inmueble_37/50819.jpg', NULL, 37),
(48, '50819.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/../public/images/inmueble_38/50819.jpg', NULL, 38),
(49, '50819.jpg', 'image/jpeg', '/images/inmueble_', NULL, 39),
(50, '50819.jpg', 'image/jpeg', '/images/inmueble_', NULL, 40),
(51, '50819.jpg', 'jpg', '/images/inmueble_', NULL, 41),
(52, '50819.jpg', 'jpg', '/images/inmueble_', NULL, 42),
(53, '50819', 'jpg', '/images/inmueble_', NULL, 43),
(54, 'hobbit06.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/../public/images/inmueble_49/hobbit06.jpg', NULL, 49),
(55, 'hobbit06.jpg', 'image/jpeg', '/srv/www/api/mvc_reto/App/../public/images/inmueble_50/hobbit06.jpg', NULL, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` int NOT NULL,
  `metros_cuadrados_inmueble` varchar(255) DEFAULT NULL,
  `descripcion_inmueble` varchar(250) DEFAULT NULL,
  `distribucion_inmueble` varchar(250) DEFAULT NULL,
  `precio_inmueble` int DEFAULT NULL,
  `direccion_inmueble` varchar(200) DEFAULT NULL,
  `caracteristicas_inmueble` varchar(200) DEFAULT NULL,
  `equipamiento_inmueble` varchar(200) DEFAULT NULL,
  `latitud_inmueble` varchar(255) DEFAULT NULL,
  `longitud_inmueble` varchar(255) DEFAULT NULL,
  `activo_inmueble` tinyint(1) NOT NULL DEFAULT '1',
  `id_municipio` int DEFAULT NULL,
  `id_estado` int DEFAULT NULL,
  `id_entidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`, `caracteristicas_inmueble`, `equipamiento_inmueble`, `latitud_inmueble`, `longitud_inmueble`, `activo_inmueble`, `id_municipio`, `id_estado`, `id_entidad`) VALUES
(1, '23', 'caniceria', 'mostrador/nevera', 7000, 'calle', 'la nevera funciona', 'nevera mostrador ', '15', '15', 1, 2, 1, 8),
(2, '2', 'local destinado a explotar', 'distribuido para que todo explote', 5000, 'explosivo', 'explota muy bien', 'polvoraaaaaaaaaaaaaaaaa', '25', '25', 1, 41, 1, 9),
(3, '455', 'casoplon', 'penosa', 30000, 't,t,t', 'Jardín,Piscina,Terraza', 'Amueblado', '35', '35', 1, 46, 1, 10),
(4, '34', 'algo', 'ergdr', 3000, 'w,1,2', 'Jardín', 'Amueblado', '45', '45', 1, 48, 1, 8),
(5, '20', 'casita', 'un piso', 3000, 'calle de la muerte', 'muerte', 'cadaver', '420', '410', 1, 30, 1, 9),
(6, '23', 'Un bar', 'tiene barra y un salon', 10000, 'la calle', 'tiene grifo', 'grifo de cerveza', '12', '12', 1, 32, 1, 10),
(7, '50', 'hotel', 'hotel a pie de playa', 150000, 'enfrete la playa', 'tiene puertas', 'ascensor', '0', '0', 1, 39, 1, 4),
(8, '64', 'inmueble de la empresa xyz', 'sisissiisisis', 12000, 'en la calle seccreto', 'no tengo', '', '60', '65', 1, 30, 1, 1),
(9, '99', 'si no?', 'no si?', 15600, 'calle 99', 'hacer 69', 'un columpio raro', '99', '99', 1, 30, 1, 2),
(10, '35', 'inmeble de empresa xyz', 'la que a mi me guste', 15000, 'calle en la que este', 'no', 'no', '16', '23', 1, 47, 1, 1),
(11, '90', 'mansion', 'no', 65000, 'aaa', 'aaa', 'aaa', '62', '62', 1, 49, 1, 2),
(12, '12', 'asdf', 'asdf', NULL, 'asdf,12,12', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 4),
(13, '1', '<h1>azzxcvz</h1>', '<h1>azzxcvz</h1>', NULL, '<h1>azzxcvz</h1>,1,1', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 44, 1, 1),
(14, '5', 'swf', 'sdt', NULL, 'calle hola,55,y', 'Aire acondicionado,Jardín', 'Sin amueblar', NULL, NULL, 1, 1, 1, 2),
(15, '65', 'yyyyyyyyyyyyyyyy', 'yyyyyyy', NULL, 'yyy,yy,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 2),
(16, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(17, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(18, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(19, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(20, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(21, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(22, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(23, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(24, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(25, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(26, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(27, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(28, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(29, '5', 't', 't', NULL, 'tr,tytrytr,', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 48, 1, 1),
(30, '65', 'rrrrrrrr', 'rrrrr', NULL, 'rr,rrrrr,rr', 'Aire acondicionado,Electrodomésticos', 'Amueblado', NULL, NULL, 1, 48, 1, 3),
(31, '65', 'rrrrrrrr', 'rrrrr', NULL, 'rr,rrrrr,rr', 'Aire acondicionado,Electrodomésticos', 'Amueblado', NULL, NULL, 1, 48, 1, 3),
(32, '65', 'rrrrrrrr', 'rrrrr', NULL, 'rr,rrrrr,rr', 'Aire acondicionado,Electrodomésticos', 'Amueblado', NULL, NULL, 1, 48, 1, 3),
(33, '2', 'ujhytjhyj', 'gfdgfdgf', NULL, 'tuyyiui,yuiyuiuy,', 'Piscina,Terraza', 'Amueblado', NULL, NULL, 1, 31, 1, 3),
(34, '2', 'ujhytjhyj', 'gfdgfdgf', NULL, 'tuyyiui,yuiyuiuy,', 'Piscina,Terraza', 'Amueblado', NULL, NULL, 1, 31, 1, 3),
(35, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(36, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(37, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(38, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(39, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(40, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(41, '33', 'www', 'ww', NULL, 'ww,ww,', 'Aire acondicionado', 'Amueblado', NULL, NULL, 1, 49, 1, 3),
(42, '90', 'zzz', 'zzz', NULL, 'zzz,zz,', 'Terraza,Garaje,Trastero', 'Amueblado', NULL, NULL, 1, 45, 1, 10),
(43, '90', 'zzz', 'zzz', NULL, 'zzz,zz,', 'Terraza,Garaje,Trastero', 'Amueblado', NULL, NULL, 1, 45, 1, 10),
(44, '54', 'gfdgfd', 'fggfdg', NULL, 'fgdg,gfd,hftgh', 'Aire acondicionado,Jardín', 'Amueblado', NULL, NULL, 1, 36, 1, 13),
(47, '12', 'asdf', 'asdf', NULL, 'afd,12,12', 'Aire acondicionado,Jardín', 'Sin amueblar', NULL, NULL, 1, 50, 1, 1),
(48, '12', 'asdf', 'asdf', NULL, 'afd,12,12', 'Aire acondicionado,Jardín', 'Sin amueblar', NULL, NULL, 1, 50, 1, 1),
(49, '197', 'Cabaña ideal para entrar a vivir', '8 galerías', NULL, 'Mayor,1,sn', 'Aire acondicionado,Piscina,Ascensor', 'Amueblado', NULL, NULL, 1, 32, 1, NULL),
(50, '222222', 'para entrar a vivir', '80000 habitaciones', NULL, 'mayor,1,no', 'Aire acondicionado', 'Sin amueblar', NULL, NULL, 1, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `id_local` int NOT NULL,
  `nombre_local` varchar(45) DEFAULT NULL,
  `capacidad_local` varchar(200) DEFAULT NULL,
  `recursos_local` varchar(200) DEFAULT NULL,
  `id_inmueble` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id_local`, `nombre_local`, `capacidad_local`, `recursos_local`, `id_inmueble`) VALUES
(1, 'a', 'a', 'a', 1),
(2, 'adsdsd', 'adada', 'aa', 2),
(3, 'piscina municipal', '250', 'bar, cesped, piscina', 3),
(4, 'negador', '25', 'no', 10),
(5, 'mansion encantada', '65', 'muchas cosas', 11),
(6, NULL, '12', '<adsf', 12),
(7, NULL, '1', '<h1>azzxcvz</h1>', 13),
(8, NULL, '5', 'ghjf', 14),
(9, NULL, '45', 't', 16),
(10, NULL, '45', 't', 17),
(11, NULL, '45', 't', 18),
(12, NULL, '45', 't', 19),
(13, NULL, '45', 't', 20),
(14, NULL, '45', 't', 21),
(15, NULL, '45', 't', 22),
(16, NULL, '45', 't', 23),
(17, NULL, '45', 't', 24),
(18, NULL, '45', 't', 25),
(19, NULL, '45', 't', 26),
(20, NULL, '45', 't', 27),
(21, NULL, '45', 't', 28),
(22, NULL, '45', 't', 29),
(23, NULL, 'gfd', 'gdf', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int NOT NULL,
  `nombre_municipio` varchar(50) NOT NULL,
  `provincia_municipio` varchar(50) NOT NULL,
  `codigo_postal_municipio` varchar(45) NOT NULL,
  `longitud_municipio` varchar(250) DEFAULT NULL,
  `latitud_municipio` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `provincia_municipio`, `codigo_postal_municipio`, `longitud_municipio`, `latitud_municipio`) VALUES
(1, 'Aguaviva', 'Teruel', '44566', '-0.1389', '41.0639'),
(2, 'Alcañiz', 'Teruel', '44600', '-0.1292', '41.0412'),
(30, 'Alcorisa', 'Teruel', '44550', '-0.3178', '40.9171'),
(31, 'Belmonte de San José', 'Teruel', '44642', '-0.3691', '41.0125'),
(32, 'Berge', 'Teruel', '44556', '-0.2847', '40.9993'),
(33, 'Calanda', 'Teruel', '44570', '-0.1833', '41.0500'),
(34, 'Castelserás', 'Teruel', '44630', '-0.2953', '41.0172'),
(35, 'Foz Calanda', 'Teruel', '44579', '-0.1975', '41.0083'),
(36, 'Jaganta', 'Teruel', '44566', '-0.2735', '41.0784'),
(37, 'La Cañada de Verich', 'Teruel', '44643', '-0.3663', '41.0173'),
(38, 'La Cerollera', 'Teruel', '44651', '-0.2746', '41.0032'),
(39, 'La Codoñera', 'Teruel', '44640', '-0.3566', '41.0183'),
(40, 'La Ginebrosa', 'Teruel', '44643', '-0.3667', '41.0000'),
(41, 'La Mata de Los Olmos', 'Teruel', '44557', '-0.2833', '40.9333'),
(42, 'Las Parras de Castellote', 'Teruel', '44566', '-0.3167', '41.0667'),
(43, 'Los Olmos', 'Teruel', '44557', '-0.2833', '40.9333'),
(44, 'Mas de Las Matas', 'Teruel', '44564', '-0.4000', '41.0333'),
(45, 'Puigmoreno', 'Teruel', '44600', '-0.1292', '41.0412'),
(46, 'Seno', 'Teruel', '44561', '-0.2833', '41.0833'),
(47, 'Torrecilla de Alcañiz', 'Teruel', '44640', '-0.3566', '41.0183'),
(48, 'Torrevelilla', 'Teruel', '44641', '-0.4000', '41.0333'),
(49, 'Valdealgorfa', 'Teruel', '44594', '-0.2500', '41.1333'),
(50, 'Valmuel', 'Teruel', '44600', '-0.1292', '41.0412');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id_negocio` int NOT NULL,
  `titulo_negocio` varchar(255) NOT NULL,
  `motivo_traspaso_negocio` varchar(255) DEFAULT NULL,
  `coste_traspaso_negocio` int DEFAULT NULL,
  `coste_mensual_negocio` int DEFAULT NULL,
  `descripcion_negocio` varchar(250) DEFAULT NULL,
  `capital_minimo_negocio` int DEFAULT NULL,
  `activo_negocio` tinyint(1) NOT NULL DEFAULT '1',
  `local_id_inmueble` int DEFAULT NULL,
  `id_entidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id_negocio`, `titulo_negocio`, `motivo_traspaso_negocio`, `coste_traspaso_negocio`, `coste_mensual_negocio`, `descripcion_negocio`, `capital_minimo_negocio`, `activo_negocio`, `local_id_inmueble`, `id_entidad`) VALUES
(1, 'chatarrero', 'toy cansado jefe', 5000, 500, 'ser chatarrero', 3000, 1, NULL, 8),
(2, 'cerrajero', 'no quiero abrir mas puertas', 6000, 150, 'abrir puertas cerradas', 3000, 1, NULL, 9),
(3, 'Loco del pueblo', 'ya no estoy loco', 100, 100, 'estar mu loco', 1000, 1, NULL, 10),
(4, 'Pirotecnia', 'me dan mied', 6000, 700, 'vender petardos', 15000, 1, 2, 1),
(5, 'Servicio piscina', 'me mudo', 3500, 600, 'atender el bar de la piscina', 6000, 1, 3, 1),
(6, 'titulo', 'algun motivo tendre', 2500, 250, 'negocio', 5000, 1, 1, 8),
(7, 'TIMBRADOR', 'no necisito mas timbradores', 1600, 100, 'ir timbrado por casas y salir corriendo', 3000, 1, NULL, 2),
(8, 'OJEADOR', 'ya no quiero ojear', 10, 1, 'mirar al timbrador', 150, 1, NULL, 1),
(12, 'negador', 'ya no quiero decir q no', 6000, 1000, 'niega siempre', 10000, 1, 4, 1),
(13, 'Encantar mansiones', 'un niño me metio una pata en la boca', 50000, 1750, 'asustar niños y esquivar puñetazos', 70000, 1, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int NOT NULL,
  `titulo_noticia` varchar(45) NOT NULL,
  `fecha_publicacion_noticia` date DEFAULT NULL,
  `contenido_noticia` varchar(255) NOT NULL,
  `id_municipio` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id_notificacion` int NOT NULL,
  `leida_notificacion` tinyint(1) NOT NULL,
  `contenido_notificacion` varchar(250) NOT NULL,
  `id_usuario` int NOT NULL,
  `Titulo_notificacion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id_notificacion`, `leida_notificacion`, `contenido_notificacion`, `id_usuario`, `Titulo_notificacion`) VALUES
(4, 1, 'edu@edu', 1, 'Has editado una entidad'),
(5, 1, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(6, 0, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(7, 1, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(8, 0, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(9, 0, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(10, 0, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(11, 0, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(12, 0, 'eduardo.lizana2014@gmail.com', 1, 'Has editado una entidad'),
(13, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(14, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(15, 1, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(16, 1, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(17, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(18, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(19, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(20, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(21, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(22, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(23, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(24, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(25, 1, 'Buenas Sr./Sra.  3 le informamos que has creado la entidad: asd. Un saludo', 3, 'Añadir Entidad'),
(26, 1, 'Buenas Sr./Sra.  3 le informamos que has creado la entidad: asd. Un saludo', 3, 'Añadir Entidad'),
(27, 1, 'Buenas Sr./Sra.  3 le informamos que has creado la entidad: aaaaaaaaaa. Un saludo', 3, 'Añadir Entidad'),
(28, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(29, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(30, 1, 'Buenas Sr./Sra.  samu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 3, 'Inscripcion de  oferta'),
(31, 1, 'Buenas Sr./Sra.  samu le informamos que has activado la oferta: sdaf. Un saludo', 3, 'Activación de  oferta'),
(32, 1, 'Buenas Sr./Sra.  samu le informamos que has editado la oferta: <script>location.href=\"https://www.google.com/\"</script> y que los cambios se han realizado correctamente. Un saludo', 3, 'Edicion de oferta'),
(33, 1, 'Buenas Sr./Sra.  samu le informamos que has editado la oferta: <script>location.href=\"https://www.google.com/\"</script> y que los cambios se han realizado correctamente. Un saludo', 3, 'Edicion de oferta'),
(34, 0, 'Buenas Sr./Sra.  hajar le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 2, 'Inscripcion de  oferta'),
(35, 0, 'Buenas Sr./Sra.  hajar le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 2, 'Inscripcion de  oferta'),
(36, 0, 'Buenas Sr./Sra.  edu le informamos que has editado el perfil correctamente', 1, 'Edicion de perfil'),
(37, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(38, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(39, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(40, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: empaaaaaaaaaaaaaaaa y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(41, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(42, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(43, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(44, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(45, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(46, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(47, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(48, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(49, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(50, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(51, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(52, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(53, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(54, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: emp y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(55, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: aseraser y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(56, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta: fgfgfg y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(57, 0, 'Buenas Sr./Sra.  edu le informamos que has editado la oferta:  y que los cambios se han realizado correctamente. Un saludo', 1, 'Edicion de oferta'),
(58, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(59, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(60, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(61, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(62, 0, 'Buenas Sr./Sra.  samu le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(63, 0, 'Buenas Sr./Sra.  samu le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(64, 0, 'Buenas Sr./Sra.  samu le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(65, 0, 'Buenas Sr./Sra.  samuiiiiiiiii le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(66, 0, 'Buenas Sr./Sra.  samuiiiiiiiii le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(67, 0, 'Buenas Sr./Sra.  samu le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(68, 1, 'Buenas Sr./Sra.  samu le informamos que has editado el perfil correctamente', 3, 'Edicion de perfil'),
(69, 0, 'Buenas Sr./Sra.  edu le informamos que has editado el perfil correctamente', 1, 'Edicion de perfil'),
(70, 0, 'Buenas Sr./Sra.  edu le informamos que has editado el perfil correctamente', 1, 'Edicion de perfil'),
(71, 0, 'Buenas Sr./Sra.  edu le informamos que has editado el perfil correctamente', 1, 'Edicion de perfil'),
(72, 0, 'Buenas Sr./Sra.  edu le informamos que has editado el perfil correctamente', 1, 'Edicion de perfil'),
(73, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(74, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(75, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(76, 0, 'Buenas Sr./Sra.  edu le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 1, 'Inscripcion de  oferta'),
(77, 0, 'Buenas Sr./Sra.  edu le informamos que has comentado en el inmueble: . Un saludo', 1, 'Comentar en inmueble'),
(78, 0, 'Buenas Sr./Sra.  edu le informamos que has comentado en el inmueble: . Un saludo', 1, 'Comentar en inmueble'),
(79, 0, 'Buenas Sr./Sra.  edu le informamos que has comentado en el inmueble: . Un saludo', 1, 'Comentar en inmueble'),
(80, 0, 'Buenas Sr./Sra.  edu le informamos que has comentado en el inmueble: . Un saludo', 1, 'Comentar en inmueble'),
(81, 0, 'Buenas Sr./Sra.  edu le informamos que has comentado en el inmueble: . Un saludo', 1, 'Comentar en inmueble'),
(82, 0, 'Buenas Sr./Sra.  edu le informamos que has comentado en el inmueble: . Un saludo', 1, 'Comentar en inmueble'),
(83, 1, 'Buenas Sr./Sra.  le informamos que has solicitado la entrada a la entidad. Un saludo', 109, 'Solicitar participacion en entidad'),
(84, 0, 'Buenas Sr./Sra.  pedro le informamos que ha inscrito  la oferta:  correctamente. Un saludo', 109, 'Inscripcion de  oferta'),
(85, 0, 'Buenas Sr./Sra.  pedro le informamos que has borrado la inscripcion de la oferta:  correctamente. Un saludo', 109, 'Inscripcion de  oferta'),
(86, 0, 'Buenas Sr./Sra.  109 le informamos que has creado la entidad: asdf. Un saludo', 109, 'Añadir Entidad'),
(87, 1, 'Buenas Sr./Sra.  111 le informamos que has creado la entidad: Piratas y bucaneros SA. Un saludo', 111, 'Añadir Entidad'),
(88, 1, 'Buenas Sr./Sra.  Jose le informamos que has editado el perfil correctamente', 111, 'Edicion de perfil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `id_oferta` int NOT NULL,
  `titulo_oferta` varchar(255) DEFAULT NULL,
  `fecha_inicio_oferta` date DEFAULT NULL,
  `fecha_fin_oferta` date DEFAULT NULL,
  `condiciones_oferta` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `descripcion_oferta` varchar(255) DEFAULT NULL,
  `fecha_publicacion_oferta` date DEFAULT NULL,
  `activo_oferta` tinyint(1) DEFAULT NULL,
  `id_entidad` int DEFAULT NULL,
  `id_negocio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_oferta`, `titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `descripcion_oferta`, `fecha_publicacion_oferta`, `activo_oferta`, `id_entidad`, `id_negocio`) VALUES
(1, 'Oferta 1', '2024-01-01', '2024-02-29', 'no tener perro', 'no tener perro', '2023-12-29', 1, 8, NULL),
(2, 'casita en oferta', '2023-10-01', '2024-04-04', 'no tener miedo a la muerte', 'barrio de mala muerte', '2024-02-15', 1, 9, NULL),
(3, 'BAR PAQUITO', '2024-02-01', '2024-03-08', 'ser bebedor', 'un bar situado perfecto', '2024-02-15', 1, 10, NULL),
(4, 'chaterrero', '2024-02-08', '2024-02-15', 'a', 'a', '2024-02-01', 1, 8, 1),
(5, 'Abridor', '2024-02-08', '2024-02-24', 'saber usar llaves', 'abrir puertas normalmente a borrachos', '2024-02-15', 1, 9, 2),
(6, 'Loco Loco', '2024-02-01', '2030-02-28', 'estar loco', 'hacer locuras', '2024-02-01', 1, 10, 3),
(7, 'Carniceria', '2024-02-16', '2024-02-29', 'sabes que es la carne', 'matar y vender la carne de los animales', '2024-02-07', 1, 8, NULL),
(8, 'pirotex', '2024-02-01', '2024-02-29', 'Saber que es la polvora', 'vender y comprar explosivos', '2024-01-12', 1, 9, NULL),
(9, 'Piscina municipal', '2024-02-01', '2024-02-29', 'no ser alergico a la piscina', 'ser vende local de la piscina', '2020-02-12', 1, 10, NULL),
(10, 'fgfgfg', '1212-12-12', '1212-12-12', 'asdfasdasdf', 'eresaraser', '2024-01-10', 1, 1, NULL),
(11, 'SI NO', '2024-02-13', '2024-02-22', 'SIIIIIIIIIIIII', 'NOOOOOOOOOOO', '2024-02-08', 1, 2, NULL),
(12, 'TIMBRADOR', '2024-02-01', '2024-05-17', 'PODER TIMBRAR', 'timbra y correo', '2024-02-01', 1, 2, 7),
(13, 'ojeador', '2024-02-01', '2024-05-10', 'no ser ciego', 'mira y informa', '2024-02-01', 1, 1, 8),
(14, 'negador profesional', '2024-02-08', '2024-05-10', 'saber decir q no', 'niega todo lo q digan', '2024-02-01', 1, 1, NULL),
(15, 'encantador de casas', '2024-02-08', '2024-02-09', 'no ser un miedoso', 'cuelate en casas y haz que estan encantadas', '2024-02-01', 1, 2, NULL),
(20, 'ofertahajarpruebaa', '2024-02-01', '2024-02-01', 'algunas`pocas', 'si', '2024-02-01', 1, 2, NULL),
(21, 'ofertahajarpruebaa', '2020-01-01', '2020-01-01', 'alguna', 'si', '2020-01-01', 1, 1, NULL),
(22, 'ofertahajarpruebaa', '2020-01-01', '2020-01-01', 'alguna', 'si', '2020-01-01', 1, 1, NULL),
(23, 'ofertahajarpruebaa', '2020-01-01', '2020-01-01', 'alguna', 'si', '2020-01-01', 1, 1, NULL),
(24, 'ofertahajarpruebaa', '2020-01-01', '2020-01-01', 'alguna', 'si', '2020-01-01', 1, 1, NULL),
(25, 'ofertahajarpruebaa', '2020-01-01', '2020-01-01', 'alguna', 'si', '2020-01-01', 1, 1, NULL),
(26, 'ofertahajarpruebaa', '2020-01-01', '2020-01-01', 'alguna', 'si', '2020-01-01', 1, 1, NULL),
(27, 'ofertaPruebahajar', '2023-01-01', '2023-01-01', 'alguna', 's', '2023-01-01', 1, 9, NULL),
(28, NULL, '1212-12-12', '1212-12-12', '<spam class=\"bg-black\"> a </spam>', NULL, '2024-03-05', NULL, 4, NULL),
(29, NULL, '1212-12-12', '1212-12-12', '<h1>azzxcvz</h1>', NULL, '2024-03-05', NULL, 1, NULL),
(30, 'sdaf', '0213-05-02', '0005-05-05', '53hig', NULL, '2024-03-05', 1, 2, NULL),
(31, 'Coche', '2024-03-13', '2024-03-20', 'optimas', 'Eduardo no tiene el teórico y yo como si no lo tuviera', '2024-03-11', 1, 2, NULL),
(32, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(33, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(34, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(35, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(36, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(37, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(38, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(39, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(40, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(41, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(42, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(43, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(44, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(45, 't', '2024-03-01', '2024-03-28', 't', 't', '2024-03-11', 1, 1, NULL),
(46, 'rr', '2024-03-06', '2024-03-27', 'rrrrrrr', 'trr', '2024-03-11', 1, 3, NULL),
(47, 'rr', '2024-03-06', '2024-03-27', 'rrrrrrr', 'trr', '2024-03-11', 1, 3, NULL),
(48, 'rr', '2024-03-06', '2024-03-27', 'rrrrrrr', 'trr', '2024-03-11', 1, 3, NULL),
(49, 'srtgfbhg', '2024-03-01', '2024-03-28', 'rdsghrtyhruh', 'fhghjafsdfae', '2024-03-11', 1, 3, NULL),
(50, 'srtgfbhg', '2024-03-01', '2024-03-28', 'rdsghrtyhruh', 'fhghjafsdfae', '2024-03-11', 1, 3, NULL),
(51, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(52, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(53, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(54, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(55, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(56, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(57, 'www', '2024-03-02', '2024-03-21', 'www', 'www', '2024-03-11', 1, 3, NULL),
(58, 'zzz', '2024-03-06', '2024-03-29', 'zzz', 'zzz', '2024-03-11', 1, 10, NULL),
(59, 'zzz', '2024-03-06', '2024-03-29', 'zzz', 'zzz', '2024-03-11', 1, 10, NULL),
(60, 'fdsgf', '2024-03-06', '2024-03-29', 'fdgdfg', 'gfd', '2024-03-15', 1, 13, NULL),
(61, 'asd', '1212-12-12', '1212-12-12', 'sin condiciones', ' 12', '2024-03-19', 1, 1, NULL),
(62, 'asd', '1212-12-12', '1212-12-12', 'sin condiciones', ' 12', '2024-03-19', 1, 1, NULL),
(63, 'Cabaña Hobbit', '2024-03-20', '2024-07-20', 'sin condiciones', 'Cabaña Hobbit con 800 años de historia ', '2024-03-20', 1, NULL, NULL),
(64, 'Villa Lucero', '2024-03-20', '2024-03-31', 'sin condiciones', ' Vivienda rural', '2024-03-20', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_inmueble`
--

CREATE TABLE `oferta_inmueble` (
  `id_oferta` int NOT NULL,
  `d_inmueble` int NOT NULL,
  `precio_inm` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `oferta_inmueble`
--

INSERT INTO `oferta_inmueble` (`id_oferta`, `d_inmueble`, `precio_inm`) VALUES
(1, 4, '500'),
(2, 5, '200'),
(3, 6, '700'),
(7, 1, '100'),
(8, 2, '100'),
(9, 3, '600'),
(10, 8, '800'),
(11, 9, '1000'),
(14, 10, '150'),
(15, 11, '600'),
(28, 12, '12'),
(29, 13, '<h1>azzxcvz</h1>'),
(30, 14, '55'),
(31, 15, '55'),
(32, 16, '5'),
(33, 17, '5'),
(34, 18, '5'),
(35, 19, '5'),
(36, 20, '5'),
(37, 21, '5'),
(38, 22, '5'),
(39, 23, '5'),
(40, 24, '5'),
(41, 25, '5'),
(42, 26, '5'),
(43, 27, '5'),
(44, 28, '5'),
(45, 29, '5'),
(46, 30, '5'),
(47, 31, '5'),
(48, 32, '5'),
(49, 33, '4'),
(50, 34, '4'),
(51, 35, '8'),
(52, 36, '8'),
(53, 37, '8'),
(54, 38, '8'),
(55, 39, '8'),
(56, 40, '8'),
(57, 41, '8'),
(58, 42, '6'),
(59, 43, '6'),
(60, 44, '65'),
(61, 47, '12'),
(62, 48, '12'),
(63, 49, '19999'),
(64, 50, '1000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar_pass`
--

CREATE TABLE `recuperar_pass` (
  `id_recuperar_password` int NOT NULL,
  `email_recuperar` varchar(45) DEFAULT NULL,
  `fecha_hora_recuperar` datetime DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `nombre_rol` varchar(45) NOT NULL,
  `descripcion_rol` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'administrador', 'Gestiona todo'),
(2, 'usuario', 'Es un usuario'),
(3, 'reportero', 'sube noticias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `descripcion_servicio` varchar(255) DEFAULT NULL,
  `id_tipo_servicio` int NOT NULL,
  `id_municipio` int NOT NULL,
  `longitud_servicio` varchar(255) DEFAULT NULL,
  `latitud_servicio` varchar(255) DEFAULT NULL,
  `telefono_servicio` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion_servicio` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `descripcion_servicio`, `id_tipo_servicio`, `id_municipio`, `longitud_servicio`, `latitud_servicio`, `telefono_servicio`, `direccion_servicio`) VALUES
(1, 'Servicio1', 'Descripción1', 1, 1, '-0.1389', '41.0639', 'Telefono1', 'Direccion1'),
(2, 'Servicio2', 'Descripción2', 2, 2, '-0.1292', '41.0412', 'Telefono2', 'Direccion2'),
(3, 'Servicio3', 'Descripción3', 3, 30, '-0.3178', '40.9171', 'Telefono3', 'Direccion3'),
(4, 'Servicio4', 'Descripción4', 4, 31, '-0.3691', '41.0125', 'Telefono4', 'Direccion4'),
(5, 'Servicio5', 'Descripción5', 1, 32, '-0.2847', '40.9993', 'Telefono5', 'Direccion5'),
(6, 'Servicio6', 'Descripción6', 2, 33, '-0.1833', '41.0500', 'Telefono6', 'Direccion6'),
(7, 'Servicio7', 'Descripción7', 3, 34, '-0.2953', '41.0172', 'Telefono7', 'Direccion7'),
(8, 'Servicio8', 'Descripción8', 4, 35, '-0.1975', '41.0083', 'Telefono8', 'Direccion8'),
(9, 'Servicio9', 'Descripción9', 1, 36, '-0.2735', '41.0784', 'Telefono9', 'Direccion9'),
(10, 'Servicio10', 'Descripción10', 2, 37, '-0.3663', '41.0173', 'Telefono10', 'Direccion10'),
(11, 'Servicio11', 'Descripción11', 3, 38, '-0.2746', '41.0032', 'Telefono11', 'Direccion11'),
(12, 'Servicio12', 'Descripción12', 4, 39, '-0.3566', '41.0183', 'Telefono12', 'Direccion12'),
(13, 'Servicio13', 'Descripción13', 1, 40, '-0.3667', '41.0000', 'Telefono13', 'Direccion13'),
(14, 'Servicio14', 'Descripción14', 2, 41, '-0.2833', '40.9333', 'Telefono14', 'Direccion14'),
(15, 'Servicio15', 'Descripción15', 3, 42, '-0.3167', '41.0667', 'Telefono15', 'Direccion15'),
(16, 'Servicio16', 'Descripción16', 4, 43, '-0.2833', '40.9333', 'Telefono16', 'Direccion16'),
(17, 'Servicio17', 'Descripción17', 1, 44, '-0.4000', '41.0333', 'Telefono17', 'Direccion17'),
(18, 'Servicio18', 'Descripción18', 2, 45, '-0.1292', '41.0412', 'Telefono18', 'Direccion18'),
(19, 'Servicio19', 'Descripción19', 3, 46, '-0.2833', '41.0833', 'Telefono19', 'Direccion19'),
(20, 'Servicio20', 'Descripción20', 4, 47, '-0.3566', '41.0183', 'Telefono20', 'Direccion20'),
(21, 'Servicio21', 'Descripción21', 1, 48, '-0.4000', '41.0333', 'Telefono21', 'Direccion21'),
(22, 'Servicio22', 'Descripción22', 2, 49, '-0.2500', '41.1333', 'Telefono22', 'Direccion22'),
(23, 'Servicio23', 'Descripción23', 3, 50, '-0.1292', '41.0412', 'Telefono23', 'Direccion23'),
(24, 'Servicio24', 'Descripción24', 4, 1, '-0.1389', '41.0639', 'Telefono24', 'Direccion24'),
(25, 'Servicio25', 'Descripción25', 1, 2, '-0.1292', '41.0412', 'Telefono25', 'Direccion25'),
(26, 'Servicio26', 'Descripción26', 2, 30, '-0.3178', '40.9171', 'Telefono26', 'Direccion26'),
(27, 'Servicio27', 'Descripción27', 3, 31, '-0.3691', '41.0125', 'Telefono27', 'Direccion27'),
(28, 'Servicio28', 'Descripción28', 4, 32, '-0.2847', '40.9993', 'Telefono28', 'Direccion28'),
(29, 'Servicio29', 'Descripción29', 1, 33, '-0.1833', '41.0500', 'Telefono29', 'Direccion29'),
(30, 'Servicio30', 'Descripción30', 2, 34, '-0.2953', '41.0172', 'Telefono30', 'Direccion30'),
(31, 'Servicio31', 'Descripción31', 3, 35, '-0.1975', '41.0083', 'Telefono31', 'Direccion31'),
(32, 'Servicio32', 'Descripción32', 4, 36, '-0.2735', '41.0784', 'Telefono32', 'Direccion32'),
(33, 'Servicio33', 'Descripción33', 1, 37, '-0.3663', '41.0173', 'Telefono33', 'Direccion33'),
(34, 'Servicio34', 'Descripción34', 2, 38, '-0.2746', '41.0032', 'Telefono34', 'Direccion34'),
(35, 'Servicio35', 'Descripción35', 3, 39, '-0.3566', '41.0183', 'Telefono35', 'Direccion35'),
(36, 'Servicio36', 'Descripción36', 4, 40, '-0.3667', '41.0000', 'Telefono36', 'Direccion36'),
(37, 'Servicio37', 'Descripción37', 1, 41, '-0.2833', '40.9333', 'Telefono37', 'Direccion37'),
(38, 'Servicio38', 'Descripción38', 2, 42, '-0.3167', '41.0667', 'Telefono38', 'Direccion38'),
(39, 'Servicio39', 'Descripción39', 3, 43, '-0.2833', '40.9333', 'Telefono39', 'Direccion39'),
(40, 'Servicio40', 'Descripción40', 4, 44, '-0.4000', '41.0333', 'Telefono40', 'Direccion40'),
(41, 'Servicio41', 'Descripción41', 1, 45, '-0.1292', '41.0412', 'Telefono41', 'Direccion41'),
(42, 'Servicio42', 'Descripción42', 2, 46, '-0.2833', '41.0833', 'Telefono42', 'Direccion42'),
(43, 'Servicio43', 'Descripción43', 3, 47, '-0.3566', '41.0183', 'Telefono43', 'Direccion43'),
(44, 'Servicio44', 'Descripción44', 4, 48, '-0.4000', '41.0333', 'Telefono44', 'Direccion44'),
(45, 'Servicio45', 'Descripción45', 1, 49, '-0.2500', '41.1333', 'Telefono45', 'Direccion45'),
(46, 'Servicio46', 'Descripción46', 2, 50, '-0.1292', '41.0412', 'Telefono46', 'Direccion46'),
(47, 'Servicio47', 'Descripción47', 3, 1, '-0.1389', '41.0639', 'Telefono47', 'Direccion47'),
(48, 'Servicio48', 'Descripción48', 4, 2, '-0.1292', '41.0412', 'Telefono48', 'Direccion48'),
(49, 'Servicio49', 'Descripción49', 1, 30, '-0.3178', '40.9171', 'Telefono49', 'Direccion49'),
(50, 'Servicio50', 'Descripción50', 2, 31, '-0.3691', '41.0125', 'Telefono50', 'Direccion50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id_tipo_servicio` int NOT NULL,
  `nombre_tipo_servicio` varchar(45) NOT NULL,
  `descripcion_tipo_servicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id_tipo_servicio`, `nombre_tipo_servicio`, `descripcion_tipo_servicio`) VALUES
(1, 'Informatica', 'cosas informaticas'),
(2, 'ocio', 'discotecas'),
(3, 'hosteleria', 'bares y restaurantes'),
(4, 'servicios publicos', 'policia hospital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nif` varchar(15) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellidos_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `contrasena_usuario` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fecha_nacimiento_usuario` date NOT NULL,
  `telefono_usuario` varchar(15) NOT NULL,
  `notificar_avisos` tinyint NOT NULL,
  `notificar_mensajes` tinyint NOT NULL,
  `notificar_notificaciones` tinyint NOT NULL,
  `activo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nif`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`, `fecha_nacimiento_usuario`, `telefono_usuario`, `notificar_avisos`, `notificar_mensajes`, `notificar_notificaciones`, `activo_usuario`) VALUES
(1, '12345679A', 'edu', 'lizanaaaa', 'eduardo.lizana2014@gmail.com', '$2y$10$ZimxCx4t2gi.6BXX243IzOrSu7uoRYs1P3noQ.Ji0dR7qccKHkoT6', '1990-01-01', '123456789', 0, 0, 0, 1),
(2, '987654321B', 'hajar', 'hajar', 'hajar@hajar', '$2y$10$ZimxCx4t2gi.6BXX243IzOrSu7uoRYs1P3noQ.Ji0dR7qccKHkoT6', '1985-05-15', '987654321', 0, 0, 0, 1),
(3, '555555555C', 'samu', 'samu', 'samu@samu', '$2y$10$0T6ccvhJmuk0uNgNlO.deeICo/aVPD0Zlk/ND0QFcWs7gXmLvcFHS', '1988-07-20', '555555555', 0, 0, 0, 1),
(4, '4444444', 'admin', 'admin', 'admin@admin', '$2y$10$W3Yp61hcvwZAPBYGGsdPQ.rgoWIJiEs7gDn3.APy58sjaXkZMGM0u', '2000-02-02', '44444444', 0, 0, 0, 1),
(100, '98798765v', 'a', 'a', 'elizanaalcon@gmail.com', '$2y$10$s37G9Vw8k3NC8zopLgnXRuK5EUhmLcIWT2Q2oRz9WkpIoZl8/w5mO', '1212-12-12', '1212', 1, 1, 1, 1),
(101, '67577710F', 'antonio', 'llerda', 'a@a.es', '$2y$10$Mmzri2ahb4JhI4HM9xHBPu5amu1wURyS3aroQko1myMXxbDNIg9mG', '1991-03-16', '978856321', 1, 1, 1, 1),
(102, '12345698F', 'pe', 'a', 'a@gmail.com', '$2y$10$.q.xS2q97PhH97X8.HO47Obva6oUmFWHy0Z2Won0EUHDy0e6JRufS', '1212-12-12', '12', 1, 1, 1, 1),
(104, '12121212R', 'asdf', 'asdf', 'aaaaaaaa@gmail.com', '$2y$10$tE3dHxSoIkUNbLIP6fCLPuH.UHY3K6Ysybxf.HF9haLrjHXUG64jS', '1212-12-12', '<h1>asdf</h1>', 1, 1, 1, 1),
(106, '12312312A', 'peter', 'peter', '123@123.ES', '$2y$10$h6X8Vjh9M9Pr.JaHNSoiPOhietmOoRaMD.QpfyrKO9Oj9aowKXjwG', '0003-12-23', '123123123', 1, 1, 1, 1),
(107, '12345678A', 'hag', 'gh', 'ggg@sd', '123', '2023-01-01', '123', 1, 1, 1, 0),
(108, '12345678L', 'emp', 'rmp', 'emp@emp', 'h', '2023-01-01', '123', 1, 1, 1, 1),
(109, '65655823G', 'pedro', 'pedro', 'elizaalcon@gmail.com', '$2y$10$ZimxCx4t2gi.6BXX243IzOrSu7uoRYs1P3noQ.Ji0dR7qccKHkoT6', '1212-12-12', '123412', 1, 1, 1, 1),
(110, '98989898T', 'asd', 'asdf', 'asdf@gmail.com', '$2y$10$wz43Hvd1v3UPbJ5rDVKFF.d8Hy28OwUBeUMnaZebglMVWhv2lVruS', '1212-12-12', 'asfd', 1, 1, 1, 1),
(111, '05712433S', 'Jose', 'Rodenas', 'jrodenas@cpifpbajoaragon.com', '$2y$10$mfYOY/5YuddIjfi5ZpFEquZrBOFxU5TKY3iOyDSMfmsFQkrDBouMG', '2222-01-01', '666555777', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_entidad`
--

CREATE TABLE `usuario_entidad` (
  `id_usuario` int NOT NULL,
  `id_entidad` int NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario_entidad`
--

INSERT INTO `usuario_entidad` (`id_usuario`, `id_entidad`, `rol`) VALUES
(1, 1, 'Administrador'),
(1, 4, 'Trabajador'),
(1, 8, 'Administrador'),
(2, 1, 'Trabajador'),
(2, 2, 'Administrador'),
(2, 3, 'Trabajador'),
(2, 4, 'Administrador'),
(2, 9, 'Administrador'),
(3, 2, 'Trabajador'),
(3, 3, 'Administrador'),
(3, 10, 'Administrador'),
(3, 11, 'Administrador'),
(3, 12, 'Administrador'),
(3, 13, 'Administrador'),
(107, 3, 'admin'),
(108, 14, ''),
(109, 1, ''),
(109, 15, 'Administrador'),
(111, 16, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_rol`
--

CREATE TABLE `usuario_has_rol` (
  `id_usuario` int NOT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario_has_rol`
--

INSERT INTO `usuario_has_rol` (`id_usuario`, `id_rol`) VALUES
(4, 1),
(1, 2),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_oferta`
--

CREATE TABLE `usuario_oferta` (
  `id_usuario` int NOT NULL,
  `id_oferta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario_oferta`
--

INSERT INTO `usuario_oferta` (`id_usuario`, `id_oferta`) VALUES
(1, 2),
(1, 3),
(1, 5),
(1, 8),
(1, 9),
(1, 11),
(1, 15),
(1, 46),
(1, 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_inmueble`
--

CREATE TABLE `valorar_inmueble` (
  `id_valoracion_inmueble` int NOT NULL,
  `id_inmueble` int NOT NULL,
  `fecha_valoracion_inm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `puntuacion_inm` int NOT NULL,
  `comentario_inm` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `valorar_inmueble`
--

INSERT INTO `valorar_inmueble` (`id_valoracion_inmueble`, `id_inmueble`, `fecha_valoracion_inm`, `puntuacion_inm`, `comentario_inm`, `id_usuario`) VALUES
(2, 2, '2024-03-08 00:00:00', 3, NULL, 2),
(3, 6, '2024-03-21 00:00:00', 3, 'si', 100),
(4, 14, '2024-03-15 08:36:17', 2, 'a\r\n', 1),
(5, 14, '2024-03-15 08:37:40', 2, 'a\r\n', 1),
(6, 14, '2024-03-15 08:37:59', 2, 'a\r\n', 1),
(7, 14, '2024-03-15 08:38:14', 2, 'a\r\n', 1),
(8, 14, '2024-03-15 08:38:50', 2, 'a\r\n', 1),
(9, 14, '2024-03-15 08:39:06', 2, 'sds', 1),
(10, 14, '2024-03-15 08:40:21', 2, 'sds', 1),
(11, 5, '2024-03-15 08:40:44', 3, 'hg', 1),
(12, 5, '2024-03-15 08:44:09', 3, 'asdf', 1),
(13, 5, '2024-03-15 08:44:13', 3, 'asdf', 1),
(14, 5, '2024-03-15 08:44:42', 3, 'asdf', 1),
(15, 5, '2024-03-15 08:44:57', 3, 'asdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_negocio`
--

CREATE TABLE `valorar_negocio` (
  `id_valoracion_negocio` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_negocio` int NOT NULL,
  `puntuacion` int NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_valoracion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `valorar_negocio`
--

INSERT INTO `valorar_negocio` (`id_valoracion_negocio`, `id_usuario`, `id_negocio`, `puntuacion`, `descripcion`, `fecha_valoracion`) VALUES
(1, 1, 13, 3, 'no esta mal', '2024-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE `vivienda` (
  `id_vivienda` int NOT NULL,
  `habitaciones_vivienda` int DEFAULT NULL,
  `tipo_vivienda` varchar(200) DEFAULT NULL,
  `id_inmueble` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `vivienda`
--

INSERT INTO `vivienda` (`id_vivienda`, `habitaciones_vivienda`, `tipo_vivienda`, `id_inmueble`) VALUES
(1, 1, 'Casa', 4),
(3, 4, 'Piso', 6),
(4, 1, 'Piso', 7),
(5, 2, 'Casa', 8),
(6, 1, 'Piso', 9),
(7, 2, 'Casa', 10),
(8, 2, 'Piso', 11),
(9, 4, 'Piso', 1),
(11, 2, 'Casa', 15),
(12, 6, 'Piso', 30),
(13, 6, 'Piso', 31),
(14, 6, 'Piso', 32),
(15, 2, 'Casa', 33),
(16, 2, 'Casa', 34),
(17, 33, 'Casa', 35),
(18, 33, 'Casa', 36),
(19, 33, 'Casa', 37),
(20, 33, 'Casa', 38),
(21, 33, 'Casa', 39),
(22, 33, 'Casa', 40),
(23, 33, 'Casa', 41),
(24, 8, 'Casa', 42),
(25, 8, 'Casa', 43),
(26, 12, 'Casa', 47),
(27, 12, 'Casa', 48),
(28, 3399, 'Casa', 49),
(29, 444444444, 'Casa', 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `fk_aviso_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `chatear`
--
ALTER TABLE `chatear`
  ADD PRIMARY KEY (`fecha_chat`,`id_usuario1`,`id_usuario`) USING BTREE,
  ADD KEY `fk_usuario_has_usuario_usuario2_idx` (`id_usuario1`),
  ADD KEY `fk_usuario_has_usuario_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_documento_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id_entidad`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif_entidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_imagen_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `fk_inmueble_municipio1_idx` (`id_municipio`),
  ADD KEY `fk_inmueble_estado1_idx` (`id_estado`),
  ADD KEY `inmueble_entidad` (`id_entidad`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`,`id_inmueble`),
  ADD KEY `fk_local_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `fk_negocio_local1_idx` (`local_id_inmueble`),
  ADD KEY `negocio_entidad` (`id_entidad`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticia_municipio1_idx` (`id_municipio`),
  ADD KEY `fk_noticia_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `fk_notificacion_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `fk_oferta_entidad1_idx` (`id_entidad`),
  ADD KEY `fk_id_negocio` (`id_negocio`);

--
-- Indices de la tabla `oferta_inmueble`
--
ALTER TABLE `oferta_inmueble`
  ADD PRIMARY KEY (`id_oferta`) USING BTREE,
  ADD KEY `fk_oferta_has_inmueble_inmueble1_idx` (`d_inmueble`),
  ADD KEY `fk_oferta_has_inmueble_oferta_idx` (`id_oferta`);

--
-- Indices de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  ADD PRIMARY KEY (`id_recuperar_password`),
  ADD KEY `fk_recuperar_pass_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `fk_servicio_tipo_servicio1_idx` (`id_tipo_servicio`),
  ADD KEY `fk_servicio_municipio1_idx` (`id_municipio`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id_tipo_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nif_UNIQUE` (`nif`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo_usuario`);

--
-- Indices de la tabla `usuario_entidad`
--
ALTER TABLE `usuario_entidad`
  ADD PRIMARY KEY (`id_usuario`,`id_entidad`),
  ADD KEY `fk_usuario_has_entidad_entidad1_idx` (`id_entidad`),
  ADD KEY `fk_usuario_has_entidad_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`),
  ADD KEY `fk_usuario_has_rol_rol1_idx` (`id_rol`),
  ADD KEY `fk_usuario_has_rol_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario_oferta`
--
ALTER TABLE `usuario_oferta`
  ADD PRIMARY KEY (`id_usuario`,`id_oferta`),
  ADD KEY `fk_usuario_has_oferta_oferta1_idx` (`id_oferta`),
  ADD KEY `fk_usuario_has_oferta_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  ADD PRIMARY KEY (`id_valoracion_inmueble`),
  ADD KEY `fk_usuario_has_inmueble_inmueble1_idx` (`id_inmueble`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  ADD PRIMARY KEY (`id_valoracion_negocio`),
  ADD KEY `fk_usuario_has_negocio_negocio1_idx` (`id_negocio`),
  ADD KEY `fk_usuario_has_negocio_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`id_vivienda`,`id_inmueble`),
  ADD KEY `fk_vivienda_inmueble1_idx` (`id_inmueble`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviso`
--
ALTER TABLE `aviso`
  MODIFY `id_aviso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_oferta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  MODIFY `id_recuperar_password` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id_tipo_servicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  MODIFY `id_valoracion_inmueble` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  MODIFY `id_valoracion_negocio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `id_vivienda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `fk_aviso_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `chatear`
--
ALTER TABLE `chatear`
  ADD CONSTRAINT `fk_usuario_has_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_usuario_has_usuario_usuario2` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_documento_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`);

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `fk_inmueble_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_inmueble_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `inmueble_entidad` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_local_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `fk_negocio_local1` FOREIGN KEY (`local_id_inmueble`) REFERENCES `local` (`id_local`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `negocio_entidad` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_noticia_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificacion_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_id_negocio` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id_negocio`),
  ADD CONSTRAINT `fk_oferta_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`);

--
-- Filtros para la tabla `oferta_inmueble`
--
ALTER TABLE `oferta_inmueble`
  ADD CONSTRAINT `fk_oferta_has_inmueble_inmueble1` FOREIGN KEY (`d_inmueble`) REFERENCES `inmueble` (`id_inmueble`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_oferta_has_inmueble_oferta` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id_oferta`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  ADD CONSTRAINT `fk_recuperar_pass_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_servicio_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `fk_servicio_tipo_servicio1` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicio` (`id_tipo_servicio`);

--
-- Filtros para la tabla `usuario_entidad`
--
ALTER TABLE `usuario_entidad`
  ADD CONSTRAINT `fk_usuario_has_entidad_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidad` (`id_entidad`),
  ADD CONSTRAINT `fk_usuario_has_entidad_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD CONSTRAINT `fk_usuario_has_rol_rol1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_usuario_has_rol_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_oferta`
--
ALTER TABLE `usuario_oferta`
  ADD CONSTRAINT `fk_usuario_has_oferta_oferta1` FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id_oferta`),
  ADD CONSTRAINT `fk_usuario_has_oferta_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_usuario_has_inmueble_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`);

--
-- Filtros para la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  ADD CONSTRAINT `fk_usuario_has_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id_negocio`),
  ADD CONSTRAINT `fk_usuario_has_negocio_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `fk_vivienda_inmueble1` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
