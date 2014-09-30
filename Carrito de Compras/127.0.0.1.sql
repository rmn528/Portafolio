-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2013 a las 03:04:08
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carrito`
--
CREATE DATABASE `carrito` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `carrito`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmn`
--

CREATE TABLE IF NOT EXISTS `rmn` (
  `Imagen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Pais` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bodega` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `rmn`
--

INSERT INTO `rmn` (`Imagen`, `Nombre`, `Precio`, `Pais`, `Bodega`, `id`) VALUES
('./dir_usuarios/RMN/archivos/1.jpg', 'Whisky Balblair Single Malt Vintage 02 700 ml', 1100, 'ESCOCIA', 'Inverhouse', 1),
('./dir_usuarios/RMN/archivos/2.jpg', 'Guntrum Spatlese Yellow Fantasy 750 ml', 269, 'ALEMANIA', 'Louis Guntrum', 2),
('./dir_usuarios/RMN/archivos/3.jpg', 'Haras de Pirque Character 750 ml', 329, 'CHILE', 'Viña Haras de Pirque', 3),
('./dir_usuarios/RMN/archivos/4.jpg', 'Petalos 750ml', 389, 'ESPAÑA', 'Descendientes de J. Palacios', 4),
('./dir_usuarios/RMN/archivos/5.jpg', 'Banfi Chianti Classico DOCG 750 ml', 369, 'ITALIA', 'Castello Banfi', 5),
('./dir_usuarios/RMN/archivos/6.jpg', 'Villa Maria Private Bin Sauvignon Blanc 750 ml', 299, 'NUEVA ZELANDA', 'Villa Maria', 6),
('./dir_usuarios/RMN/archivos/7.jpg', 'Fusione Di Montefiori Cabernet-Merlot  750ml ', 189, 'MEXICO', 'Villa Montefiori', 7),
('./dir_usuarios/RMN/archivos/8.jpg', 'Peter Lehmann Clancy’s Shiraz Cabernet Merlot 750 ml', 355, 'AUSTRALIA', 'Peter Lehmann', 8),
('./dir_usuarios/RMN/archivos/9.jpg', 'Château D''Argadens Rouge 05 750 ml', 280, 'FRANCIA', 'Bordeaux', 9),
('./dir_usuarios/RMN/archivos/10.jpg', 'Croft White 750 ml', 249, 'PORTUGAL', 'Croft', 10),
('./dir_usuarios/RMN/archivos/11.jpg', 'Croft Fine Ruby 750 ml', 249, 'PORTUGAL', 'Croft', 11),
('./dir_usuarios/RMN/archivos/12.jpg', 'Croft Fine Tawny 750 ml', 249, 'PORTUGAL', 'Croft', 12),
('./dir_usuarios/RMN/archivos/13.jpg', 'Croft Distinction Reserve 750 ml', 325, 'PORTUGAL', 'Croft', 13),
('./dir_usuarios/RMN/archivos/14.jpg', 'Croft Pink 750 ml', 299, 'PORTUGAL', 'Croft', 14),
('./dir_usuarios/RMN/archivos/15.jpg', 'Croft 10 Years Old Tawny 750 ml', 549, 'PORTUGAL', 'Croft', 15),
('./dir_usuarios/RMN/archivos/16.jpg', 'Taylor Blanco 750 ml', 329, 'PORTUGAL', 'Taylor''s', 16),
('./dir_usuarios/RMN/archivos/17.jpg', 'Taylor Seleccionado Tawny 750 ml', 329, 'PORTUGAL', 'Taylor''s', 17),
('./dir_usuarios/RMN/archivos/18.jpg', 'Taylor Late Bottled Vintage 01 750 ml', 363, 'PORTUGAL', 'Taylor''s', 18),
('./dir_usuarios/RMN/archivos/19.jpg', 'Taylor Late Bottled Vintage 03 750 ml', 423, 'PORTUGAL', 'Taylor''s', 19),
('./dir_usuarios/RMN/archivos/20.jpg', 'Château Mouton Rothschild 08 750 ml', 31000, 'FRANCIA', 'Burdeos', 20),
('./dir_usuarios/RMN/archivos/21.jpg', 'Château Cheval Blanc 04 750 ml', 30999, 'FRANCIA', 'Burdeos', 21),
('./dir_usuarios/RMN/archivos/22.jpg', 'Gaja Sori San Lorenzo 05 750 ml', 9978, 'ITALIA', 'Gaja', 22),
('./dir_usuarios/RMN/archivos/23.jpg', 'Romanee Conti Romanee Saint Vivant 04 750 ml', 9725, 'FRANCIA', 'RomanÉe Conti', 23),
('./dir_usuarios/RMN/archivos/24.jpg', 'Vega Sicilia Reserva Especial 750 ml', 7581, 'ESPAÑA', 'Vega Sicilia', 24),
('./dir_usuarios/RMN/archivos/25.jpg', 'Gaja Sori San Lorenzo 99 750 ml', 6487, 'ITALIA', 'Gaja', 25),
('./dir_usuarios/RMN/archivos/26.jpg', 'Georges de Vogue Bonnes-Mares 08 750 ml', 6235, 'FRANCIA', 'George Comte De Vogue', 26),
('./dir_usuarios/RMN/archivos/27.jpg', 'Viñedo Chadwick Cabernet Sauvignon 750 ml', 5200, 'CHILE', 'Errázuriz', 27),
('./dir_usuarios/RMN/archivos/28.jpg', 'Rosso Di Montefiori 750 ml ', 575, 'MEXICO', 'Villa Montefiori', 28),
('./dir_usuarios/RMN/archivos/29.jpg', 'Monteviña Cabernet Sauvignon - Merlot 750 ml', 96, 'MEXICO', 'MonteviÑa', 29),
('./dir_usuarios/RMN/archivos/30.jpg', 'Guntrum Royal Blue Riesling 750 ml', 229, 'ALEMANIA', 'Louis Guntrum', 30),
('./dir_usuarios/RMN/archivos/31.jpg', 'Simonnet-Febvre Saint Bris 750 ml', 239, 'FRANCIA', 'Simonnet-Febvre', 31),
('./dir_usuarios/RMN/archivos/32.jpg', 'Madero Casa Grande Chardonnay 750 ml', 317, 'MEXICO', 'Madero', 32),
('./dir_usuarios/RMN/archivos/33.jpg', 'Latour Montrachet Grand Cru 06 750 ml', 12141, 'FRANCIA', 'Maison Louis Latour', 33),
('./dir_usuarios/RMN/archivos/34.jpg', 'Tokaji Eszencia Oremus 375 ml', 6985, 'HUNGRIA', 'Oremus Tokaji', 34),
('./dir_usuarios/RMN/archivos/35.jpg', 'Domaine Dujac Morey Saint Denis 1er Cru Les Monts Luisants Blanc 07 750 ml', 1383, 'FRANCIA', 'Domaine De Dujac', 35),
('./dir_usuarios/RMN/archivos/36.jpg', 'Gaja Rossj Bass 09 750 ml', 1179, 'ITALIA', 'Gaja', 36),
('./dir_usuarios/RMN/archivos/37.jpg', 'Ladoucette Baron de L 750ML', 1055, 'FRANCIA', 'Maison de Ladoucette', 37),
('./dir_usuarios/RMN/archivos/38.jpg', 'San Lorenzo Chardonnay-Chenin Blanc Riesling 750 ml', 90, 'MEXICO', 'San Lorenzo', 38),
('./dir_usuarios/RMN/archivos/39.jpg', 'Tilia Torrontes 750 ml', 145, 'ARGENTINA', 'Tilia', 39),
('./dir_usuarios/RMN/archivos/40.jpg', 'Beringer Be. Flirty Pink Moscato 750 ml', 238, 'ESTADOS UNIDOS', 'Beringer', 40),
('./dir_usuarios/RMN/archivos/41.jpg', 'Muga Rosado 750 ml', 189, 'ESPAÑA', 'Muga', 41),
('./dir_usuarios/RMN/archivos/42.jpg', 'Pellehaut Ete Gascon Rosé 750 ml', 238, 'FRANCIA', 'Maison Sichel', 42),
('./dir_usuarios/RMN/archivos/43.jpg', 'Rivero González Rosado 750 ml', 210, 'MEXICO', 'Rivero González', 43),
('./dir_usuarios/RMN/archivos/44.jpg', 'Villa Montefiori Sangiovese 750ml ', 133, 'MEXICO', 'Villa Montefiori', 44),
('./dir_usuarios/RMN/archivos/45.jpg', 'Laurent Perrier Grand Siecle 750 ml', 2900, 'FRANCIA', 'Laurent Perrier', 45),
('./dir_usuarios/RMN/archivos/46.jpg', 'Perrier Jouet Grand Brut Rose 750 ml', 944, 'FRANCIA', 'Perrier Jouët', 46),
('./dir_usuarios/RMN/archivos/47.jpg', 'Moet Chandon Brut Imperial Rose 750 ml', 779, 'FRANCIA', 'Moet  Chandon', 47),
('./dir_usuarios/RMN/archivos/48.jpg', 'Moet Chandon Brut Nectar Imperial 750 ml', 703, 'FRANCIA', 'Moet  Chandon', 48),
('./dir_usuarios/RMN/archivos/49.jpg', 'Jerez William  Humbert Jalifa 30 Years Old 750 ml', 1115, 'ESPAÑA', 'William humbert', 49),
('./dir_usuarios/RMN/archivos/50.jpg', 'Lustau Pedro Ximénez 750 ml', 489, 'ESPAÑA', 'Emilio Lustau', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saul`
--

CREATE TABLE IF NOT EXISTS `saul` (
  `Imagen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Pais` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bodega` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contrasena`, `correo`) VALUES
(1, 'RAMON', 'RMN', 'PDb/zO40dIc8c', 'gerardo528-1@hotmail.com'),
(2, 'SAUL', 'SAUL', 'PDb/zO40dIc8c', 'saul@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
