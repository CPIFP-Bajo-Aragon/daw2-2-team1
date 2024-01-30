-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2023 a las 14:08:03
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_lenguaje_pais`
--

CREATE TABLE `cod_lenguaje_pais` (
  `idx` int(10) UNSIGNED NOT NULL,
  `cod_LP` varchar(5) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cod_lenguaje_pais`
--

INSERT INTO `cod_lenguaje_pais` (`descripcion`) VALUES
('árabe'),
('árabe [Emiratos Árabes Unidos]'),
('árabe [Bahráin]'),
('árabe [Argelia]'),
('árabe [Egipto]'),
('árabe [Iraq]'),
('árabe [Jordania]'),
('árabe [Kuwait]'),
('árabe [Líbano]'),
('árabe [Libia]'),
('árabe [Marruecos]'),
('árabe [Omán]'),
('árabe [Qatar]'),
('árabe [Arabia Saudita]'),
('árabe [Sudán]'),
('árabe [Siria]'),
('árabe [Túnez]'),
('árabe [Yemen]'),
('bielorruso'),
('bielorruso [Bielorrusia]'),
('búlgaro'),
('búlgaro [Bulgaria]'),
('catalán'),
('catalán [España]'),
('checo'),
('checo [Chequia]'),
('danés'),
('danés [Dinamarca]'),
('alemán'),
('alemán [Austria]'),
('alemán [Suiza]'),
('alemán [Alemania]'),
('alemán [Luxemburgo]'),
('griego'),
('griego [Chipre]'),
('griego [Grecia]'),
('inglés'),
('inglés [Australia]'),
('inglés [Canadá]'),
('inglés [Reino Unido]'),
('inglés [Irlanda]'),
('inglés [India]'),
('inglés [Malta]'),
('inglés [Nueva Zelanda]'),
('inglés [Filipinas]'),
('inglés [Singapur]'),
('inglés [Estados Unidos]'),
('inglés [Sudáfrica]'),
('español'),
('español [Argentina]'),
('español [Bolivia]'),
('español [Chile]'),
('español [Colombia]'),
('español [Costa Rica]'),
('español [República Dominicana]'),
('español [Ecuador]'),
('español [España]'),
('español [Guatemala]'),
('español [Honduras]'),
('español [México]'),
('español [Nicaragua]'),
('español [Panamá]'),
('español [Perú]'),
('español [Puerto Rico]'),
('español [Paraguay]'),
('español [El Salvador]'),
('español [Estados Unidos]'),
('español [Uruguay]'),
('español [Venezuela]'),
('estonio'),
('estonio [Estonia]'),
('finés'),
('finés [Finlandia]'),
('francés'),
('francés [Bélgica]'),
('francés [Canadá]'),
('francés [Suiza]'),
('francés [Francia]'),
('francés [Luxemburgo]'),
('irlandés'),
('irlandés [Irlanda]'),
('hindú [India]'),
('croata'),
('croata [Croacia]'),
('húngaro'),
('húngaro [Hungría]'),
('indonesio'),
('indonesio [Indonesia]'),
('islandés'),
('islandés [Islandia]'),
('italiano'),
('italiano [Suiza]'),
('italiano [Italia]'),
('hebreo'),
('hebreo [Israel]'),
('japonés'),
('japonés [Japón]'),
('coreano'),
('coreano [Corea del Sur]'),
('lituano'),
('lituano [Lituania]'),
('letón'),
('letón [Letonia]'),
('macedonio'),
('macedonio [Macedonia]'),
('malayo'),
('malayo [Malasia]'),
('maltés'),
('maltés [Malta]'),
('neerlandés'),
('neerlandés [Bélgica]'),
('neerlandés [Holanda]'),
('noruego'),
('noruego [Noruega]'),
('polaco'),
('polaco [Polonia]'),
('portugués'),
('portugués [Brasil]'),
('portugués [Portugal]'),
('rumano'),
('rumano [Rumania]'),
('ruso'),
('ruso [Rusia]'),
('eslovaco'),
('eslovaco [Eslovaquia]'),
('eslovenio'),
('eslovenio [Eslovenia]'),
('albanés'),
('albanés [Albania]'),
('serbio'),
('serbio [Bosnia y Hercegovina]'),
('serbio [Serbia y Montenegro]'),
('serbio [Montenegro]'),
('serbio [Serbia]'),
('sueco'),
('sueco [Suecia]'),
('tailandés'),
('tailandés [Tailandia]'),
('turco'),
('turco [Turquía]'),
('ucranio'),
('ucranio [Ucrania]'),
('vietnamita'),
('vietnamita [Vietnam]'),
('chino'),
('chino [China]'),
('chino [Hong Kong]'),
('chino [Singapur]'),
('chino [Taiwán]');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cod_lenguaje_pais`
--
ALTER TABLE `cod_lenguaje_pais`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `idx` (`idx`),
  ADD UNIQUE KEY `cod_LP` (`cod_LP`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cod_lenguaje_pais`
--
ALTER TABLE `cod_lenguaje_pais`
  MODIFY `idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
