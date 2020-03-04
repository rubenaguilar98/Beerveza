-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-03-2020 a las 08:08:01
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id12781550_beervezasql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerveza`
--

CREATE TABLE `cerveza` (
  `CodTipo` int(11) NOT NULL,
  `NomTipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Graduacion` decimal(3,1) NOT NULL,
  `Composicion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `CodMarca` int(11) NOT NULL,
  `imgTipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`CodTipo`, `NomTipo`, `Graduacion`, `Composicion`, `Capacidad`, `CodMarca`, `imgTipo`) VALUES
(1, 'Yeti', 5.6, 'Pale Ale', 330, 1, 'https://static3.soloartesanas.es/2609/yeti.jpg'),
(45, 'La perra astronauta', 8.0, 'Doble Neipa', 330, 1, 'https://bonvivant.beer/wp-content/uploads/2019/09/beer-3359012_76b50_hd-1.jpeg'),
(47, 'La Chouffe', 6.0, 'Doble Ipa', 330, 23, 'https://birrapedia.prevista.net/modulos/market/23/d3/la-chouffe-blonde-33-cl-15713756974888-g.jpg'),
(48, 'Punk IPA', 7.0, 'Ipa', 330, 22, 'https://media-verticommnetwork1.netdna-ssl.com/wines/brewdog-punk-ipa-1005126.jpg'),
(49, 'Victoria', 4.0, 'Malta', 330, 26, 'https://images-na.ssl-images-amazon.com/images/I/81FK%2B835gCL._SL1500_.jpg'),
(50, 'San Miguel', 5.0, 'Malta', 330, 27, 'https://images.ssstatic.com/cerveza-san-miguel-botella-5-4-r-0-33-l-39135133z0-14012267.jpg'),
(51, 'Coronita', 7.0, 'Tequila', 330, 28, 'https://media-verticommnetwork1.netdna-ssl.com/wines/coronita-435319.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `CodMarca` int(11) NOT NULL,
  `NomMarca` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `imgMarca` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`CodMarca`, `NomMarca`, `pais`, `imgMarca`) VALUES
(1, 'Bonvivant', 'España', 'https://soloartesanas.es/img/m/171.jpg'),
(22, 'BrewDog', 'Escocia', 'https://i.pinimg.com/originals/dc/6e/27/dc6e27a5728d309a48404c914695e6f2.jpg'),
(23, 'Chouffe', 'Bélgica', 'https://unitedbevnc.com/wp-content/uploads/la-chouffe-600x600.jpg'),
(24, 'Heineken', 'España', 'https://storage.googleapis.com/www-paredro-com/uploads/2019/08/8fe2fdd3-logo-de-heineken.jpg'),
(25, 'Estrella', 'Galicia', 'https://i.ebayimg.com/images/g/ggEAAOSwNqRb5KRd/s-l300.gif'),
(26, 'Victoria', 'España', 'https://www.cervezavictoria.es/sites/default/files/2019-01/el-aleman-de-victoria-desktop.jpg'),
(27, 'San Miguel', 'España', 'https://www.teciman.com/wp-content/uploads/2018/01/logo-san-miguel-especial.gif'),
(28, 'Coronita', 'Mexico', 'https://i.pinimg.com/originals/ed/86/4e/ed864e6b4a4cb796b902a7bc0bfd94e0.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `es_admin` tinyint(1) DEFAULT NULL,
  `api_key` varchar(33) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `email`, `nombre`, `apellidos`, `pass`, `fec_nacimiento`, `foto`, `es_admin`, `api_key`) VALUES
(29, 'usaurio@usuario.es', 'usuario', 'usuario', '81dc9bdb52d04dc20036dbd8313ed055', '2020-03-14', NULL, NULL, NULL),
(31, 'administrador@admin.es', 'Ruben', 'Aguilar', '35bc8cec895861697a0243c1304c7789', '2020-03-13', NULL, 1, NULL),
(32, 'carmenrgueez@gmail.com', 'carmen', 'gns', '81dc9bdb52d04dc20036dbd8313ed055', '2020-03-03', NULL, NULL, NULL),
(34, 'estebanviolin110700@gmail.com', 'Esteban', 'Gutierrez', 'aea177c1626baac69978ce7a8f2604ee', '2000-07-11', NULL, NULL, NULL),
(36, 'cerveza1@gmail.com', 'Cerveza', 'a', '81dc9bdb52d04dc20036dbd8313ed055', '2020-03-13', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD PRIMARY KEY (`CodTipo`),
  ADD KEY `CodMarca` (`CodMarca`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`CodMarca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  MODIFY `CodTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `CodMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD CONSTRAINT `cerveza_ibfk_1` FOREIGN KEY (`CodMarca`) REFERENCES `marca` (`CodMarca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
