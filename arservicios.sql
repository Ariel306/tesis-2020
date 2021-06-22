-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 20:04:36
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arservicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Hospitales'),
(2, 'Salitas'),
(3, 'Farmacias'),
(4, 'Cerrajeros'),
(5, 'Carpinteros'),
(6, 'Albañiles'),
(7, 'Escuelas Publicas'),
(8, 'Escuelas Privadas'),
(9, 'Institutos'),
(10, 'Rapipagos'),
(11, 'Pago Facil'),
(12, 'Camara de Comercio'),
(13, 'Reparacion de Computadoras'),
(14, 'Venta de insumos'),
(15, 'Software'),
(16, 'Senderismo'),
(17, 'Cabaña o Hoteles'),
(18, 'Diques'),
(19, 'Alquileres'),
(20, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `estrella` int(11) DEFAULT NULL,
  `nombre_user` varchar(60) DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre`) VALUES
(1, 'Buenos Aires'),
(2, 'Catamarca'),
(3, 'Chaco'),
(4, 'Chubut'),
(5, 'Córdoba'),
(6, 'Corrientes'),
(7, 'Entre Ríos'),
(8, 'Formosa'),
(9, 'Jujuy'),
(10, 'La Pampa'),
(11, 'La Rioja'),
(12, 'Mendoza'),
(13, 'Misiones'),
(14, 'Neuquén'),
(15, 'Río Negro'),
(16, 'Salta'),
(17, 'San Juan'),
(18, 'San Luis'),
(19, 'Santa Cruz'),
(20, 'Santa Fe'),
(21, 'Santiago del Estero'),
(22, 'Tierra del Fuego'),
(23, 'Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `maps` varchar(800) NOT NULL,
  `imagens` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre`, `id_categoria`, `direccion`, `maps`, `imagens`) VALUES
(2, 'primer hospital', 1, 'M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/primer hospital/profile.jpg'),
(29, 'primera salita', 2, 'M5570 San Martin, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/primera salita/profile.jpg'),
(30, 'de la mancha', 14, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/de la mancha/profile.jpg'),
(32, 'pago facil pablo', 10, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/pago facil pablo/profile.jpg'),
(33, 'informatica el hacker', 13, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/informatica el hacker/profile.jpg'),
(34, 'informatica general', 15, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/informatica general/profile.jpg'),
(38, 'arservicio', 15, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/arservicio/profile.jpg'),
(39, 'probando1', 15, 'M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/probando1/profile.jpg'),
(40, 'probando2', 15, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/probando2/profile.jpg'),
(41, 'Probando31', 15, 'Belgrano 15, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d835.7669009501409!2d-68.47109975774094!3d-33.08100601198602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1b229d837882387%3A0x9ce6d8991f4b9db6!2sDe%20La%20Mancha!5e0!3m2!1ses-419!2sar!4v1613613171884!5m2!1ses-419!2sar\" width=\"4', 'FotosServicios/Probando31/profile.jpg'),
(42, 'probando 4', 15, 'tropero sosa, mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/probando 4/profile.jpg'),
(43, 'probando 5', 15, 'j678 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d835.7161643407441!2d-68.4636872!3d-33.0863451!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e43111f29bd0f%3A0xd006fa81cca7688!2sPago%20F%C3%A1cil!5e0!3m2!1ses-419!2sar!4v1615231345099!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/probando 5/profile.jpg'),
(45, 'carpinteria el mago', 5, 'Tropero Sosa, M5570 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22488.48220343567!2d-68.46878975537103!3d-33.08455038673123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbfa4c7c251630587!2sAmoblamiento%20Geraldine!5e0!3m2!1ses-419!2sar!4v1616099602864!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/carpinteria el mago/profile.jpg'),
(46, 'albanil ariel', 6, 'j678 San Martín, Mendoza', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22488.48220343567!2d-68.46878975537103!3d-33.08455038673123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbfa4c7c251630587!2sAmoblamiento%20Geraldine!5e0!3m2!1ses-419!2sar!4v1616106569223!5m2!1ses-419!2sar\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'FotosServicios/albanil ariel/profile.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `contrasena` varchar(80) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `telefono` int(25) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `id_sexo` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha` int(10) UNSIGNED NOT NULL,
  `intentos` int(10) NOT NULL,
  `fechahora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `contrasena`, `email`, `telefono`, `id_provincia`, `direccion`, `id_sexo`, `id_rol`, `imagen`, `fecha`, `intentos`, `fechahora`) VALUES
(4, 'flor', '1234567', 'flor1234@hotmail.com', 2147483647, 18, 'calle margarita 345', 2, 1, 'fotos/flor/profile.jpg', 1611866337, 0, '0'),
(7, 'maria', '1234567', 'maria@gmail.com', 2147483647, 13, 'calle mirando 123', 2, 2, 'fotos/maria/profile.jpg', 1612533745, 0, ''),
(8, 'Daniela Santoni', '1234567', 'danis_21@hotmail.com', 2147483647, 14, 'los ralos', 2, 2, 'fotos/Daniela Santoni/profile.jpg', 1612534074, 0, ''),
(9, 'mario', '1234567', 'mfdlcv123@gmail.com', 14725836, 12, 'calle margarita 345', 1, 2, 'fotos/mario/profile.jpg', 1612534150, 0, '0'),
(10, 'celeste leiva', '56565656', 'cele_leiva@hotmail.com', 25896473, 12, 'godoy cruz 569', 2, 2, 'fotos/celeste leiva/profile.jpg', 1612534247, 0, ''),
(11, 'lilo stich', '369369369', 'lilis_12@gmail.com', 2147483647, 11, '45 lilas', 2, 2, 'fotos/lilo stich/profile.jpg', 1612534715, 0, ''),
(12, 'laura perez', '456456456', 'Lperez@hotmail.com', 2147483647, 12, 'av. san martin 236', 2, 2, 'fotos/laura perez/profile.jpg', 1612534908, 0, ''),
(13, 'johana santoni', '123456789', 'joha@hotmail.com', 2147483647, 13, 'la blanca 578', 2, 2, 'fotos/johana santoni/profile.jpg', 1612535988, 0, ''),
(14, 'julia bermudez', '963963963963', 'julia@gmail.com', 2147483647, 12, 'guaymallén 456', 2, 2, 'fotos/julia bermudez/profile.jpg', 1612536068, 0, ''),
(15, 'lilia arias', '7894561', 'liliaa@hotmail.com', 2147483647, 19, 'esteban comandante s/n', 2, 2, 'fotos/lilia arias/profile.jpg', 1612536145, 0, ''),
(17, 'andrea avila', '123456987', 'andre26@hotmail.com', 2147483647, 21, 'zxc', 2, 2, 'fotos/andrea avila/profile.jpg', 1612536343, 0, ''),
(18, 'felisa ponce', '1234567', 'felisa@hotmail.com', 263498563, 14, 'rosa blanca 78', 2, 2, 'fotos/felisa ponce/profile.jpg', 1612536411, 0, ''),
(20, 'lilia santoni', 'lamejordelmundo', 'lilia@gmail.com', 2147483647, 22, 'hielo58', 2, 2, 'fotos/lilia santoni/profile.jpg', 1612536847, 0, ''),
(21, 'silvina justel ', '1234567', 'justel@gmail.com', 261597684, 10, 'pampita 43', 2, 2, 'fotos/silvina justel /profile.jpg', 1612536897, 0, ''),
(22, 'laura ivandic', '1234567', 'lau@gmail.com', 2147483647, 13, 'zxc', 2, 2, 'fotos/laura ivandic/profile.jpg', 1612536940, 0, ''),
(23, 'liliana puebla ', '1234567', 'lilip@gmail.com', 2147483647, 13, 'calle espejo 203', 2, 2, 'fotos/liliana puebla /profile.jpg', 1612537033, 0, ''),
(24, 'rosario castillo', '1234567', 'rosa@gmail.com', 2147483647, 9, 'skldjhfkls', 2, 2, 'fotos/rosario castillo/profile.jpg', 1612537145, 0, ''),
(25, 'greta lopez', '1234567', 'gretita@hotmail.com', 2147483647, 7, 'la casa', 2, 2, 'fotos/greta lopez/profile.jpg', 1612537215, 0, ''),
(26, 'perla castillo', '1234567', 'perlitaamor@hotmail.com', 2147483647, 8, 'hermosa 56', 2, 2, 'fotos/perla castillo/profile.jpg', 1612537283, 0, ''),
(27, 'georgina castillo ', 'hermosa', 'unicadivina@hotmail.com', 2147483647, 4, 'cositalinda@hotmail.com', 2, 2, 'fotos/georgina castillo /profile.jpg', 1612537348, 0, ''),
(28, 'viviana reta', '147852369', 'vivilavidaloca@hotmail.com', 2147483647, 5, 'calamuchita', 2, 2, 'fotos/viviana reta/profile.jpg', 1612537616, 0, ''),
(29, 'natalia santoni', '123456789', 'nati@hotmail.com', 12356987, 12, 'calle las flores 458', 2, 2, 'fotos/natalia santoni/profile.jpg', 1612537855, 0, ''),
(30, 'ragnar alcano', '963852741', 'ragnar@gmail.com', 89632147, 14, 'calle las flores 458', 1, 2, 'fotos/ragnar alcano/profile.jpg', 1612537944, 0, ''),
(32, 'ayelen calderon ', '1234567', 'aye@hotmail.com', 2147483647, 22, 'jajejijoju', 2, 2, 'fotos/ayelen calderon /profile.jpg', 1612538354, 0, ''),
(33, 'gabriela triangulo', '1234567', 'gabi@gmail.com', 2147483647, 10, 'calle las flores 458', 2, 2, 'fotos/gabriela triangulo/profile.jpg', 1612538565, 0, ''),
(34, 'juan cruz gigot', '1234567', 'juancho@gmail.com', 2147483647, 2, 'asdasd', 1, 2, 'fotos/juan cruz gigot/profile.jpg', 1612538712, 0, ''),
(35, 'marina estebanez', '1234567', 'mari@gmail.com', 2147483647, 9, 'xzcvxc', 2, 2, 'fotos/marina estebanez/profile.jpg', 1612538802, 0, ''),
(36, 'german  pablova ', '0123456', 'german@hotmail.com', 2147483647, 13, 'lilo613', 1, 2, 'fotos/german  pablova /profile.jpg', 1612538931, 0, ''),
(37, 'antonio perez', '0123456', 'antoniop@hotmail.com', 2147483647, 6, 'patricias mendocinas', 1, 2, 'fotos/antonio perez/profile.jpg', 1612539051, 0, ''),
(38, 'ariel lopez', '1234567', 'probando@gmail.com', 2147483647, 14, 'calle margarita 345', 1, 2, 'fotos/ariel lopez/profile.jpg', 1613887455, 0, '0'),
(39, 'fernandito', '1234567', 'fernando14@hotmail.com', 2147483647, 18, 'calle las flores 458', 2, 2, 'fotos/fernandito/profile.jpg', 1616098039, 0, '0'),
(40, 'franco', '1234567', 'Franco@hotmail.com', 2147483647, 12, 'M5570 San Martin, Mendoza', 1, 2, 'fotos/franco/profile.jpg', 1616106348, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_servicio`
--

CREATE TABLE `usuario_servicio` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_servicio`
--

INSERT INTO `usuario_servicio` (`id_usuario`, `id_servicio`) VALUES
(38, 33),
(38, 34),
(4, 38),
(4, 39),
(4, 40),
(38, 41),
(38, 42),
(38, 43),
(39, 45),
(38, 46);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

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
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_sexo` (`id_sexo`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `usuario_servicio`
--
ALTER TABLE `usuario_servicio`
  ADD KEY `usuario_servicio_ibfk_1` (`id_usuario`),
  ADD KEY `usuario_servicio_ibfk_2` (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `usuario_servicio`
--
ALTER TABLE `usuario_servicio`
  ADD CONSTRAINT `usuario_servicio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
