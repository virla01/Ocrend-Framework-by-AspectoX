-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2017 a las 19:33:58
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
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `fecha_creado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_inicio` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_final` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_modifica` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `publica` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners_cliente`
--

CREATE TABLE `banners_cliente` (
  `id` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tele` varchar(100) NOT NULL,
  `fecha_inicio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners_cliente`
--

INSERT INTO `banners_cliente` (`id`, `empresa`, `contacto`, `mail`, `tele`, `fecha_inicio`) VALUES
(1, 'Coca-cola', 'Juan Perez', 'jperez@cocacola.com', '114-558-3674', '2017-04-20 14:55:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners_posicion`
--

CREATE TABLE `banners_posicion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `paginas` text NOT NULL,
  `publica` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners_posicion`
--

INSERT INTO `banners_posicion` (`id`, `nombre`, `paginas`, `publica`) VALUES
(1, 'Top_inicio', 'home', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_browser`
--

CREATE TABLE `is_browser` (
  `browser` varchar(30) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_browser`
--

INSERT INTO `is_browser` (`browser`, `count`) VALUES
('Internet Explorer', 0),
('Chrome', 3),
('Firefox', 5),
('Safari', 70),
('Opera', 1),
('Edge', 15),
('Other', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_color`
--

CREATE TABLE `is_color` (
  `color` varchar(30) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_color`
--

INSERT INTO `is_color` (`color`, `count`) VALUES
('256 color', 0),
('16 bit', 0),
('24 bit', 83),
('32 bit', 0),
('Unknow', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_count`
--

CREATE TABLE `is_count` (
  `count` int(10) NOT NULL DEFAULT '0',
  `days` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_count`
--

INSERT INTO `is_count` (`count`, `days`) VALUES
(113, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_daycount`
--

CREATE TABLE `is_daycount` (
  `date` date NOT NULL,
  `daycount` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_daycount`
--

INSERT INTO `is_daycount` (`date`, `daycount`) VALUES
('2017-04-08', 1),
('2017-04-10', 1),
('2017-04-11', 2),
('2017-04-12', 1),
('2017-04-15', 63),
('2017-04-16', 6),
('2017-04-17', 3),
('2017-04-19', 33),
('2017-04-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_engine`
--

CREATE TABLE `is_engine` (
  `name` varchar(50) NOT NULL DEFAULT '',
  `mthcount` int(10) NOT NULL DEFAULT '0',
  `daycount` int(10) NOT NULL DEFAULT '0',
  `start_time` int(10) NOT NULL,
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_hostname`
--

CREATE TABLE `is_hostname` (
  `hostname` varchar(100) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_hostname`
--

INSERT INTO `is_hostname` (`hostname`, `count`) VALUES
('DESKTOP-3U8R16Q', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_hour`
--

CREATE TABLE `is_hour` (
  `hour` char(2) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_hour`
--

INSERT INTO `is_hour` (`hour`, `count`) VALUES
('00', 0),
('01', 0),
('02', 0),
('03', 0),
('04', 0),
('05', 0),
('06', 0),
('07', 0),
('08', 0),
('09', 0),
('10', 0),
('11', 0),
('12', 0),
('13', 2),
('14', 6),
('15', 3),
('16', 18),
('17', 35),
('18', 19),
('19', 5),
('20', 0),
('21', 0),
('22', 0),
('23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_ip`
--

CREATE TABLE `is_ip` (
  `ip` varchar(100) NOT NULL DEFAULT '',
  `time` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_keyword`
--

CREATE TABLE `is_keyword` (
  `keyword` varchar(50) NOT NULL DEFAULT '',
  `mthcount` int(10) NOT NULL DEFAULT '0',
  `daycount` int(10) NOT NULL DEFAULT '0',
  `start_time` int(10) NOT NULL,
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_last_visitor`
--

CREATE TABLE `is_last_visitor` (
  `info` varchar(255) NOT NULL DEFAULT '',
  `hostname` varchar(200) NOT NULL DEFAULT '',
  `country_code` varchar(5) NOT NULL DEFAULT '',
  `country_name` varchar(50) NOT NULL DEFAULT '',
  `referer` varchar(200) NOT NULL DEFAULT '',
  `time` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_last_visitor`
--

INSERT INTO `is_last_visitor` (`info`, `hostname`, `country_code`, `country_name`, `referer`, `time`) VALUES
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '.DESKTOP-3U8R16Q', '', '', 'www.google.com.ar/nada/sarasa', '1492283859'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '.DESKTOP-3U8R16Q', '', '', 'www.google.com.ar/nada/sarasa', '1492283970'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '', '', 'www.google.com.ar/nada/sarasa', '1492284101'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '', '', 'www.google.com.ar/nada/sarasa', '1492284170'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com.ar/nada/sarasa', '1492287058'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com.ar/nada/sarasa', '1492287073'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com.ar/nada/sarasa', '1492287297'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com.ar/nada/sarasa', '1492287338'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com.ar/nada/sarasa', '1492287339'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492287355'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492287362'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492287810'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492287835'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'clarin.com/sarasa/ip', '1492287902'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'clarin.com/sarasa/ip', '1492287903'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492287950'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492287952'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288023'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288025'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288046'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288047'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288065'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288066'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288090'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.clarin.com/sarasa/ip', '1492288092'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492294936'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com/sarasa', '1492295012'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com/sarasa', '1492295013'),
('Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'sarasa.com/nada/de/nada', '1492295092'),
('Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'sarasa.com/nada/de/nada', '1492295094'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/administrador/trafico/trafico/xsemana', '1492367081'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492375110'),
('Mozilla/5.0 (Windows NT 10.0; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492375181'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com/sarasa', '1492375208'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'www.google.com/sarasa', '1492375209'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492375215'),
('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.88 Safari/537.36 Vivaldi/1.7.735.46', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492451632'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/administrador/', '1492451729'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492451993'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/administrador/trafico/', '1492625247'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/administrador/', '1492625474'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/administrador/cliente/', '1492635544'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://aspectox-ocrend.esy.es/nosotros/', '1492635573'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492635574'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://aspectox-ocrend.esy.es/nosotros/', '1492635709'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492635710'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492635721'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492635722'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492635754'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/', '1492636017'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/nosotros/', '1492636028'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/', '1492636164'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/', '1492636195'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/nosotros/', '1492636288'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/nosotros/', '1492636289'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492636610'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/', '1492636616'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/nosotros/', '1492636645'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492636746'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492636747'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', '', '1492636915'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/', '1492636935'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/nosotros/', '1492636938'),
('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 'DESKTOP-3U8R16Q', '0', 'No reconocido', 'http://localhost/Ocrend-Framework-by-AspectoX/administrador/trafico/', '1492716028');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_mth`
--

CREATE TABLE `is_mth` (
  `mth` char(2) NOT NULL DEFAULT '',
  `year` int(5) NOT NULL DEFAULT '0',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_mth`
--

INSERT INTO `is_mth` (`mth`, `year`, `count`) VALUES
('04', 2017, 113);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_mth_days`
--

CREATE TABLE `is_mth_days` (
  `day` char(2) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_mth_days`
--

INSERT INTO `is_mth_days` (`day`, `count`) VALUES
('01', 0),
('02', 0),
('03', 0),
('04', 0),
('05', 0),
('06', 0),
('07', 0),
('08', 1),
('09', 0),
('10', 1),
('11', 2),
('12', 1),
('13', 0),
('14', 0),
('15', 65),
('16', 6),
('17', 3),
('18', 0),
('19', 33),
('20', 1),
('21', 0),
('22', 0),
('23', 0),
('24', 0),
('25', 0),
('26', 0),
('27', 0),
('28', 0),
('29', 0),
('30', 0),
('31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_os`
--

CREATE TABLE `is_os` (
  `os` varchar(30) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_os`
--

INSERT INTO `is_os` (`os`, `count`) VALUES
('Windows 10', 88),
('Windows 8', 0),
('Windows 7', 0),
('Windows Vista', 0),
('Windows XP', 0),
('Windows 2000', 0),
('Windows NT 4.0', 0),
('Windows 9x', 0),
('Windows 9x', 0),
('Windows Me', 0),
('Linux', 0),
('Macintosh', 0),
('Other', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_page`
--

CREATE TABLE `is_page` (
  `page` varchar(100) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_page`
--

INSERT INTO `is_page` (`page`, `count`) VALUES
('/Ocrend-Framework-by-AspectoX/', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_referer`
--

CREATE TABLE `is_referer` (
  `url` varchar(255) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_ref_site`
--

CREATE TABLE `is_ref_site` (
  `domain` varchar(255) NOT NULL DEFAULT '',
  `mthcount` int(10) NOT NULL DEFAULT '0',
  `daycount` int(10) NOT NULL DEFAULT '0',
  `start_time` int(10) NOT NULL,
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_screen`
--

CREATE TABLE `is_screen` (
  `width` varchar(20) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_screen`
--

INSERT INTO `is_screen` (`width`, `count`) VALUES
('640 x 480', 0),
('800 x 600', 0),
('1024 x 768', 0),
('1152 x 864', 0),
('1280 x 1024', 0),
('1280 x 720', 0),
('1768 x 992', 0),
('1920 x 1080', 87),
('Unknow', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_session`
--

CREATE TABLE `is_session` (
  `hash` varchar(100) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_spider`
--

CREATE TABLE `is_spider` (
  `name` varchar(50) NOT NULL DEFAULT '',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_today_hour`
--

CREATE TABLE `is_today_hour` (
  `hour` char(2) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_today_hour`
--

INSERT INTO `is_today_hour` (`hour`, `count`) VALUES
('00', 0),
('01', 0),
('02', 0),
('03', 0),
('04', 0),
('05', 0),
('06', 0),
('07', 0),
('08', 0),
('09', 0),
('10', 0),
('11', 0),
('12', 0),
('13', 0),
('14', 0),
('15', 0),
('16', 1),
('17', 0),
('18', 0),
('19', 0),
('20', 0),
('21', 0),
('22', 0),
('23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_week`
--

CREATE TABLE `is_week` (
  `week` char(2) NOT NULL DEFAULT '',
  `year` int(5) NOT NULL DEFAULT '0',
  `date` varchar(20) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_week`
--

INSERT INTO `is_week` (`week`, `year`, `date`, `count`) VALUES
('15', 2017, '1492283304', 67),
('16', 2017, '1492451631', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_week_days`
--

CREATE TABLE `is_week_days` (
  `day` int(2) NOT NULL DEFAULT '0',
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `is_week_days`
--

INSERT INTO `is_week_days` (`day`, `count`) VALUES
(0, 6),
(1, 4),
(2, 2),
(3, 34),
(4, 1),
(5, 0),
(6, 66);

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
(1, 'Inicio', './', 'home', 'home', 0, 5, 1, 'admin', 1, 'Pagina inicio'),
(2, 'Usuarios', 'users/', 'users', 'user', 0, 6, 2, 'admin', 1, 'Componente usuarios'),
(3, 'Menus', 'menus/', 'menus', 'bars', 0, 6, 3, 'admin', 1, 'Crear usuario nuevo'),
(4, 'Configuración', 'configura/', 'configura', 'cog', 0, 6, 6, 'admin', 1, 'Configuracion'),
(5, 'Inicio', './', 'index', '0', 0, 1, 1, 'site', 1, 'Inicio del sitio'),
(21, 'Modulos', 'modulos/', 'modulos', 'cube', 0, 5, 4, 'admin', 1, 'Modulos del sistema'),
(22, 'Tráfico', 'trafico/', 'trafico', 'line-chart', 0, 5, 5, 'admin', 1, 'Tráfico de la web'),
(23, 'Nosotros', 'nosotros/', 'nosotros', '0', 0, 1, 2, 'site', 1, 'Pagina nosotros'),
(24, 'Anuncios', '#', '#', 'credit-card', 0, 1, 3, 'admin', 1, 'Sistema de banners'),
(25, 'Banners', 'banners/', 'banners', 'list', 24, 5, 1, 'admin', 1, 'Listado de banners'),
(26, 'Clientes', 'cliente/', 'cliente', 'users', 24, 5, 2, 'admin', 1, 'Clientes para banners'),
(27, 'Posiciones', 'posicion/', 'posicion', 'map-marker', 24, 5, 3, 'admin', 1, 'Posición de los banners en la página');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `vista` set('sitio','admin') NOT NULL,
  `modulo` varchar(50) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `ruta` text NOT NULL,
  `publicado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `nombre`, `vista`, `modulo`, `type`, `ruta`, `publicado`) VALUES
(1, 'Vistas', 'admin', 'vistas', 'system', 'html/widgets/visitas/visitasCont', 1);

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
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners_cliente`
--
ALTER TABLE `banners_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners_posicion`
--
ALTER TABLE `banners_posicion`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `banners_cliente`
--
ALTER TABLE `banners_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `banners_posicion`
--
ALTER TABLE `banners_posicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `countid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
