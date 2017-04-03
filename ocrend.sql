-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2017 a las 18:21:01
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ocrend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `link` varchar(1024) NOT NULL,
  `ruta` varchar(1024) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `sub` int(11) DEFAULT NULL,
  `grupo` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `vista` set('site','admin') NOT NULL DEFAULT 'site',
  `estado` tinyint(4) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `titulo`, `link`, `ruta`, `icono`, `sub`, `grupo`, `posicion`, `vista`, `estado`, `descripcion`) VALUES
(1, 'Inicio', './', 'index', 'home', 0, 5, 1, 'admin', 1, 'Pagina inicio'),
(2, 'Usuarios', 'users/', 'users', 'user', 0, 6, 3, 'admin', 1, 'Componente usuarios'),
(3, 'Menus', 'menus/', 'menus', 'bars', 0, 6, 4, 'admin', 1, 'Crear usuario nuevo'),
(4, 'Configuración', 'configura/', 'configura', 'cog', 0, 6, 5, 'admin', 1, 'Configuracion'),
(5, 'Inicio', './', 'index', '0', 0, 1, 1, 'site', 1, 'Inicio del sitio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `vista` set('sitio','admin') NOT NULL,
  `modulo` varchar(50) DEFAULT NULL,
  `ruta` text NOT NULL,
  `publicado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nacido` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `grupo` int(11) NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `activado` tinyint(4) NOT NULL,
  `fechareg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zoneregion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bloquear` tinyint(4) NOT NULL,
  `ultentrada` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keypass` int(11) NOT NULL,
  `keypass_tmp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `pass`, `nombre`, `apellido`, `nacido`, `sexo`, `grupo`, `avatar`, `ip`, `activado`, `fechareg`, `zoneregion`, `bloquear`, `ultentrada`, `keypass`, `keypass_tmp`, `session`) VALUES
(1, 'admin', 'aspectox.creativa@gmail.com', '$2a$10$87b2b603324793cc37f8dOPFTnHRY0lviq5filK5cN4aMCQDJcC9G', 'Edgardo', 'Putelli', '27/09/1964', 'm', 6, 'LAL_8443-chica.jpg', '::1', 1, '0000-00-00 00:00:00', 'Argentina/Buenos_Aires', 0, '2016-08-15 16:24:21', 0, '', 0),
(2, 'joelp', 'joelputelli@hotmail.com', '$2a$10$bc230fe54a402006696f7u9mAoCwTNzXkfqkvq4/AXKLm3gvFXk4K', 'Joel', 'Putelli', '15/12/1999', 'm', 1, 'joel.jpg', '::1', 1, '2016-08-24 16:43:20', 'Argentina/Buenos_Aires', 0, '2016-08-24 16:43:20', 0, '', 0),
(3, 'flomeza', 'flormeza@lavecindaddelchavo.com', '$2a$10$8f9941f098596d3be2190uwcLeYfILJtecBW8/HVeVOm19.jzOzrK', 'Florinda', 'Meza', '08/03/1949', 'f', 1, 'florinda.jpg', '::1', 0, '2016-08-25 17:23:09', 'Mexico_City', 0, '2016-08-25 17:23:09', 0, '', 0),
(4, 'vilmapica', 'vilmapicapiedra@hannabarbera.com', '$2a$10$32a4b2aabab5b48d7021budxvEJgU4padEGlOYFxU6xySLhP1A0xm', 'Vilma', 'Picapiedra', '30/09/1960', 'f', 1, 'vilma-picapiedra.jpg', '::1', 0, '2016-08-25 17:25:36', 'New_York', 0, '2016-08-25 17:25:36', 0, '', 0),
(5, 'ultraso', 'ultrasonico@hannabarbera.com', '$2a$10$1f23a168d0c2f1d941042u5oSCoUUj8OYOPtp/SztVZ9zLVWQDM/u', 'Ultra', 'Sónico', '12/09/1962', 'f', 1, 'Los-Supersonicos-12-1b.jpg', '::1', 0, '2016-08-25 17:27:19', 'New_York', 0, '2016-08-25 17:27:19', 0, '', 0),
(6, 'pepica', 'pedro@picapiedra.com', '$2a$10$8757f155c004ba9e03995u9h.NzJ05hxP27Zzklb/F52pzZFWCm/u', 'Pedro', 'Picapiedra', '25/05/1960', 'm', 3, 'pedro-picapiedra.jpg', '::1', 0, '2016-08-24 16:00:08', 'Argentina/Buenos_Aires', 0, '2016-08-24 16:00:08', 0, '', 0),
(7, 'pamar', 'pablomarmol@hannabarbera.com', '$2a$10$a61dab915c4f14f310e9eu4Imd6oaxjieLWYNTNEqInGJn79TTrga', 'Pablo', 'Marmol', '30/09/1960', 'm', 1, 'marmol.jpeg', '::1', 0, '2016-08-28 17:04:49', 'New_York', 0, '2016-08-28 17:04:49', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `countid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `countryCode` varchar(100) NOT NULL,
  `countryName` varchar(100) NOT NULL,
  `navegador` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `useragent` text NOT NULL,
  `time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`countid`, `id`, `ip`, `countryCode`, `countryName`, `navegador`, `version`, `plataforma`, `useragent`, `time`) VALUES
(1, 1, '::1', 'No reconocido', 'No reconocido', 'Mozilla Firefox', '52', 'Windows 10', 'mozilla/5.0 (windows nt 10.0; wow64; rv:52.0) gecko/20100101 firefox/52.0', '31/03/2017 10:00:39 pm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`countid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `countid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
