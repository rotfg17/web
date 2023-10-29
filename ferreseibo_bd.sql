-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 21:32:51
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
-- Base de datos: `ferreseibo_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` tinyint(4) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `nombre`, `correo_electronico`, `token_password`, `password_request`, `activo`, `fecha_alta`) VALUES
(2, 'admin', '$2y$10$dt/yJYHExBrvnDeCjLe61urcPqEooRtKTWAOcrqpbHPqKD7mYp/9m', 'Administrador', 'robinsonchalasj@gmail.com', NULL, 0, 1, '2023-10-19 11:50:16'),
(3, 'admin', '$2y$10$CuKKQnL1.Nj8kHKA/0OykOna5qIhKzNdaXgqE8D6W1Fl0f5XbEu5C', 'Administrador', 'robinsonchalasj@gmail.com', NULL, 0, 1, '2023-10-19 11:50:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `caracteristica` varchar(30) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `caracteristica`, `activo`) VALUES
(1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `activo`) VALUES
(1, 'Accesorios de baño', 1),
(2, 'Accesorios de pintura', 1),
(3, 'Agregados', 1),
(4, 'Cerrajeria', 1),
(5, 'Contruccion ligera', 1),
(6, 'Ebanisteria', 1),
(7, 'Electricidad', 1),
(8, 'Herramientas', 1),
(9, 'Herreria', 1),
(10, 'Jardineria', 1),
(11, 'Madera', 1),
(12, 'Pintura', 1),
(13, 'Pinturas king', 1),
(14, 'Plomeria', 1),
(15, 'Productos generales', 1),
(16, 'Quimicos', 1),
(17, 'Refrigeracion', 1),
(23, 'Robinson', 0),
(24, 'Chalas', 0),
(25, 'hola', 0),
(26, 'aaa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `activo` tinyint(4) DEFAULT 1,
  `fecha_alta` datetime NOT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `correo`, `telefono`, `cedula`, `activo`, `fecha_alta`, `fecha_modifica`, `fecha_baja`) VALUES
(1, 'Robinson', 'Chalas', 'rotfg17@gmail.com', '12345678', '12345678', 1, '2023-10-11 13:36:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Robinson', 'Jimenez', 'robinson.chalas@farmaciacarol.com', '8097875349', '40215773934', 0, '2023-10-11 13:45:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Robinson', 'Chalas', 'robinsonchalasj@gmail.com', '8097875349', '40215773934', 1, '2023-10-23 11:05:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `medio_pago` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `correo`, `id_cliente`, `total`, `medio_pago`) VALUES
(1, '8LR59277RJ7417501', '2023-10-17', 'COMPLETED', 'rotfg17@gmail.com', '1', 16.86, 'Paypal'),
(2, '5FX01891TJ867654W', '2023-10-23', 'COMPLETED', 'rotfg17@gmail.com', '1', 5.18, 'Paypal'),
(3, '3WA57671R21056433', '2023-10-23', 'COMPLETED', 'rotfg17@gmail.com', '1', 31.08, 'Paypal'),
(4, '7W5767556C6949153', '2023-10-23', 'COMPLETED', 'rotfg17@gmail.com', '1', 16.86, 'Paypal'),
(5, '88C13993WB344353Y', '2023-10-23', 'COMPLETED', 'rotfg17@gmail.com', '1', 5.18, 'Paypal'),
(6, '61T79533UB913261M', '2023-10-23', 'COMPLETED', 'rotfg17@gmail.com', '1', 12.99, 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_nombre', 'Ferre Seibo'),
(2, 'correo_email', 'robinsonchalasj@gmail.com'),
(3, 'correo_smtp', 'smtp.gmail.com'),
(4, 'correo_password', '0gTOPvXj9b747H6TJIHAlw==:vH+ZfATILmeXdhGeCfvmRDeQFEaTokHS5y3a63IaKvs='),
(5, 'correo_puerto', '465');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 7, 'Barniz caoba GL', 960.00, 1),
(2, 2, 6, 'Tropical Barniz Caoba 1/4', 295.00, 1),
(3, 3, 6, 'Tropical Barniz Caoba 1/4', 295.00, 6),
(4, 4, 7, 'Barniz caoba GL', 960.00, 1),
(5, 5, 6, 'Tropical Barniz Caoba 1/4', 295.00, 1),
(6, 6, 8, 'Barniz marino brillo 1/4', 370.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_pro_caracter`
--

CREATE TABLE `det_pro_caracter` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_caracteristica` int(11) NOT NULL,
  `valor` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos`
--

CREATE TABLE `lista_deseos` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `num_referencia` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `descripcion`, `precio`, `descuento`, `stock`, `num_referencia`, `id_categoria`, `activo`) VALUES
(5, 'Tropical Barniz Caoba 1/16', 'Tropical', '<p>Tropical Barniz Caoba 1/16</p>', 115.69, 0, 20, '10100', 12, 1),
(6, 'Tropical Barniz Caoba 1/4', '', 'Tropical Barniz Caoba 1/4', 295.00, 0, 0, '', 12, 1),
(7, 'Barniz caoba GL', '', 'Barniz caoba GL', 960.00, 0, 0, '', 12, 1),
(8, 'Barniz marino brillo 1/4', 'Tropical', 'Barniz marino brillo 1/4', 370.00, 0, 0, '11301', 12, 1),
(9, 'Barniz natural 1/6', 'Tropical', 'Barniz natural 1/6', 104.00, 0, 0, '000516', 12, 1),
(10, 'BARNIZ NATURAL C/B EN 1/4', 'Tropical', 'BARNIZ NATURAL C/B EN 1/4', 290.00, 0, 0, '11011', 12, 1),
(11, 'Barniz Natural Marino con Brillo GL', 'Tropical', 'Barniz Natural Marino con Brillo GL', 1235.00, 0, 0, '11302', 12, 1),
(12, 'fyghjnk', '107', 'hhhh', 0.00, 56, 0, '6', 0, 0),
(13, 'Black Top Cub Negro Impermeable', 'Plus', 'Black Top Cub Negro Impermeable', 5175.00, 0, 0, '0301703-40', 12, 1),
(14, 'Tropical Black Top Negro Gl', 'Tropical', 'Tropical Black Top Negro Gl', 1034.99, 0, 0, '0301702-40', 12, 1),
(15, 'Dry-Coat Lanco Gl Dc-480-4', 'Lanco', 'Dry-Coat Lanco Gl Dc-480-4', 3495.98, 0, 0, 'DC-480-4B+PIN', 12, 1),
(16, 'Epox Gris Perla Claro Gl', 'Tropical', 'Epox Gris Perla Claro Gl', 3320.00, 0, 0, '55992', 12, 1),
(17, 'Epoxica Azul Claro Tropical Gl', 'Tropical', 'Epoxica Azul Claro Tropical Gl', 3385.00, 0, 0, '51392', 12, 1),
(18, 'Epoxica Gl Blanco Tropical', 'Tropical', 'Epoxica Gl Blanco Tropical', 3385.00, 0, 0, '51392', 12, 1),
(19, 'Epoxica Rojo Ladrillo Tropical Gl', 'Tropical', 'Epoxica Rojo Ladrillo Tropical Gl', 3385.00, 0, 0, '51392', 12, 1),
(20, 'Esmalte Ind Amarillo Caterpilar', 'Tropical', 'Esmalte Ind Amarillo Caterpilar', 1995.78, 0, 0, '0201702-51452', 12, 1),
(21, 'Esmalte Ind Ferro Gris Acero 78 Gl', 'Tropical', 'Esmalte Ind Ferro Gris Acero 78 Gl', 2300.00, 0, 0, '0200302-34062', 12, 1),
(22, 'Esmalte Ind Ferro Negro Forja 81 Gl', 'Tropical', 'Esmalte Ind Ferro Negro Forja 81 Gl', 2827.32, 0, 0, '0200302-34052', 12, 1),
(23, 'Esmalte Ind Ferro Verde Gl', 'Tropical', 'Esmalte Ind Ferro Verde Gl', 2827.32, 0, 0, '0200302-34072', 12, 1),
(24, 'Espatula Plast. Atlas 13cm 152/2', 'Atlas', 'Espatula Plast. Atlas 13cm 152/2', 35.61, 0, 0, '152/2', 12, 1),
(25, 'Fendy Spray P/Chassis Botny', 'Botny', 'Fendy Spray P/Chassis Botny', 358.95, 0, 0, 'BS-1001 ', 12, 1),
(26, 'Ferre Body Filler 2006 1/4', 'Rider', 'Ferre Body Filler 2006 1/4', 380.00, 0, 0, '20061 ', 12, 1),
(27, 'Ferre Body Filler 2006 GL', 'Rider', 'Ferre Body Filler 2006 GL', 1100.00, 0, 0, '20062', 12, 1),
(29, 'Tropical Plus Flex Rex 1/4', 'Tropical', 'Tropical Plus Flex Rex 1/4', 359.99, 0, 0, '99401', 12, 1),
(30, 'Tropical Plus Flex Rex GL', 'Tropical', 'Tropical Plus Flex Rex GL', 1095.00, 0, 0, '99402', 12, 1),
(31, 'Flex Rex 1/4 No Amarillenta', 'Tropical', 'Flex Rex 1/4 No Amarillenta', 327.56, 0, 0, '99201', 12, 1),
(32, 'Imper Pool Azul Caribe Gl', 'Revetex', 'Imper Pool Azul Caribe Gl', 4235.00, 0, 0, '0780A', 12, 1),
(33, 'Impermeabilizante Cont Techo Gl Tropical', 'Tropical', 'Impermeabilizante Cont Techo Gl Tropical', 1000.00, 0, 0, '004662', 12, 1),
(34, 'Impermeab Elast-Master Gl Elastromer', 'Cano', 'Impermeab Elast-Master Gl Elastromer', 834.74, 0, 0, 'ICOIMEL4/1', 12, 1),
(35, 'Impermeab Elasto Master Elastromer', 'Cano', 'Impermeab Elasto Master Elastromer', 3335.06, 0, 0, 'ICOIMEL4/1 ', 12, 1),
(36, 'Impermeab Elasto-Sil Ultra Plus Gl', 'Cano', 'Impermeab Elasto-Sil Ultra Plus Gl', 1309.46, 0, 0, 'ICOIMEL4/1 ', 12, 1),
(37, 'Impermeab Flash Acril Gl', 'Flash', 'Impermeab Flash Acril Gl', 505.31, 0, 0, '004668', 12, 1),
(38, 'Impermeab Flash Acrilico Cub', 'Flash', 'Impermeab Flash Acrilico Cub', 2803.50, 0, 0, '004669', 12, 1),
(39, 'Impermeab Tropitech Techo Gl', 'Tropical', 'Impermeab Tropitech Techo Gl', 83132.00, 0, 0, '1400.00', 12, 1),
(40, 'Impermeab P/Techo Tropitech Cub 5/1', 'Tropical', 'Impermeab P/Techo Tropitech Cub 5/1', 7000.00, 0, 0, '83133', 12, 1),
(41, 'Impermeab Tropical Cub 5/1', 'Tropical', 'Impermeab Tropical Cub 5/1', 5095.00, 0, 0, '004673', 12, 1),
(42, 'Impermeabilizante Cub Cano Novablock', 'Cano', 'Impermeabilizante Cub Cano Novablock', 2403.26, 0, 0, '016069', 12, 1),
(43, 'Impermeabilizante Goma Liquida Aluminio', 'Tropical', 'Impermeabilizante Goma Liquida Aluminio', 1900.00, 0, 0, '0301702-03382', 12, 1),
(44, 'Impermeabilizante Goma Liquida Aluminio Cub', 'Tropical', 'Impermeabilizante Goma Liquida Aluminio Cub', 9500.00, 0, 0, '160022', 12, 1),
(45, 'Impermeabilizante Nurethane Cano Cub', 'Cano', 'Impermeabilizante Nurethane Cano Cub', 9799.99, 0, 0, '0100301-16', 12, 1),
(46, 'King Esmalte Superior 1/4 Azul Rey 16', 'King', 'King Esmalte Superior 1/4 Azul Rey 16', 435.00, 0, 0, '0100301-80', 12, 1),
(47, 'King Esmalte Superior 1/4 Blanco Reyna', 'King', 'King Esmalte Superior 1/4 Blanco Reyna', 435.00, 0, 0, '0100301-40', 12, 1),
(48, 'King Esmalte Superior 1/4 Caoba 40', 'King', 'King Esmalte Superior 1/4 Caoba 40', 435.00, 0, 0, '0100301-73', 12, 1),
(49, 'King Esmalte Superior 1/4 Negro 73', 'King', 'King Esmalte Superior 1/4 Negro 73', 435.00, 0, 0, '10011', 12, 1),
(50, 'King Laca Sintetica 1/4', 'King', 'King Laca Sintetica 1/4', 165.79, 0, 0, '10012', 12, 1),
(51, 'King Laca Sintetica King Gl', 'King', 'King Laca Sintetica King Gl', 763.71, 0, 0, '10012', 12, 1),
(52, 'Mini Rolo Atlas 6\" 321/15 Blanco/Rayas A', 'Atlas', 'Mini Rolo Atlas 6\" 321/15 Blanco/Rayas A', 170.30, 0, 0, '016109', 12, 1),
(53, 'Mota Antigota Blanca/Amarillo', 'Antigota', 'Mota Antigota Blanca/Amarillo', 149.00, 0, 0, '014036', 12, 1),
(54, 'Mota Antigota Cano Premium', 'Cano', 'Mota Antigota Cano Premium', 84.37, 0, 0, 'AC0013', 12, 1),
(55, 'Oxido Nueva Formula 1/4 Rojo 53', 'Tropical', 'Oxido Nueva Formula 1/4 Rojo 53', 245.00, 0, 0, '33531', 12, 1),
(56, 'Oxido 1/16 Rojo', 'Tropical', 'Oxido 1/16 Rojo', 97.50, 0, 0, '006880', 12, 1),
(57, 'Oxido 1/16 Amarillo', 'Tropical', 'Oxido 1/16 Amarillo', 73.50, 0, 0, '006858', 12, 1),
(58, 'Oxido Aaa 1/4 Azul 15', 'Tropical', 'Oxido Aaa 1/4 Azul 15', 238.33, 0, 0, '006877', 12, 1),
(59, 'Oxido 1/16 Negro', 'Tropical', 'Oxido 1/16 Negro', 97.50, 0, 0, '34151', 12, 1),
(60, 'Oxido Aaa 1/4 Verde 73', 'Tropical', 'Oxido Aaa 1/4 Verde 73', 238.33, 0, 0, '33731', 12, 1),
(61, 'OXIDO AAA 1/4 BLANCO 00', 'Tropical', 'OXIDO AAA 1/4 BLANCO 00', 238.33, 0, 0, '34801', 12, 1),
(62, 'OXIDO AAA 1/4 GRIS ACERO 61', 'Tropical', 'OXIDO AAA 1/4 GRIS ACERO 61', 238.33, 0, 0, '006874', 12, 1),
(63, 'Oxido Aaa 1/4 Gris Perla', 'Tropical', 'Oxido Aaa 1/4 Gris Perla', 238.33, 0, 0, '34611', 12, 1),
(64, 'Oxido Aaa 1/4 Gris Plata 65', 'Tropical', 'Oxido Aaa 1/4 Gris Plata 65', 238.33, 0, 0, '34171', 12, 1),
(65, 'Oxido Aaa 1/4 Negro 75', 'Tropical', 'Oxido Aaa 1/4 Negro 75', 238.33, 0, 0, '33751', 12, 1),
(66, 'Oxido Aaa 1/4 Rojo 53', 'Tropical', 'Oxido Aaa 1/4 Rojo 53', 238.33, 0, 0, '34521', 12, 1),
(67, 'Oxido Aaa Gl Azul 15', 'Tropical', 'Oxido Aaa Gl Azul 15', 819.24, 0, 0, '34152', 12, 1),
(68, 'Oxido Aaa Gl Blanco 00', 'Tropical', 'Oxido Aaa Gl Blanco 00', 819.24, 0, 0, '015533', 12, 1),
(69, 'Oxido Aaa Gl Gris Acero 61', 'Tropical', 'Oxido Aaa Gl Gris Acero 61', 819.24, 0, 0, '34612', 12, 1),
(70, 'Oxido Aaa Gl Gris Plata 65', 'Tropical', 'Oxido Aaa Gl Gris Plata 65', 819.24, 0, 0, '34172', 12, 1),
(71, 'Oxido Aaa Gl Negro 75', 'Tropical', 'Oxido Aaa Gl Negro 75', 819.24, 0, 0, '33752', 12, 1),
(72, 'Oxido Aaa Gl Rojo 53', 'Tropical', 'Oxido Aaa Gl Rojo 53', 819.24, 0, 0, '34522', 12, 1),
(73, 'Oxido Aaa Gl Verde 73', 'Tropical', 'Oxido Aaa Gl Verde 73', 819.24, 0, 0, '33732', 12, 1),
(74, 'Oxido Domastur 1/4 Azul', 'Tropical', 'Oxido Domastur 1/4 Azul', 185.00, 0, 0, '006862', 12, 1),
(75, 'Oxido Domastur 1/4 Blanco 01', 'Domastur', 'Oxido Domastur 1/4 Blanco 01', 185.00, 0, 0, '740401', 12, 1),
(76, 'Oxido Domastur 1/4 Gris 48', 'Domastur', 'Oxido Domastur 1/4 Gris 48', 175.00, 0, 0, '740448', 12, 1),
(77, 'Oxido Domastur 1/4 Negro 97', 'Domastur', 'Oxido Domastur 1/4 Negro 97', 185.00, 0, 0, '740497', 12, 1),
(78, 'Oxido Domastur 1/4 Rojo', 'Domastur', 'Oxido Domastur 1/4 Rojo', 185.00, 0, 0, '740428', 12, 1),
(106, 'trcyuvbinom', 'guhbjklm', '<p>cygvuhbijnokml,</p>', 67.00, 0, 1, 'fghjkl', 12, 0),
(107, 'fyghjnk', 'fyghjk', '<p>yubinopkml</p>', 56.00, 0, 6, 'fghjk', 12, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `activacion`, `token`, `token_password`, `password_request`, `id_cliente`) VALUES
(1, 'admin', '$2y$10$V91HU1EoDSnHBhyYx3wiZ.4RMqLk7UMXnavXkKX1c/PuAvEJVtS/O', 1, '', '048ab5b1fa3deb3c0778fe809e764f84', 1, 1),
(10, 'Manuel', '$2y$10$gK4ddyHhHjvMTbDljnF2s.KhBbZFlsNzPlF6k/QlnnTdzK0AO7U5G', 1, '', NULL, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `det_pro_caracter`
--
ALTER TABLE `det_pro_caracter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_det_prod` (`id_producto`),
  ADD KEY `fr_det_caracter` (`id_caracteristica`);

--
-- Indices de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- Indices de la tabla `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod_list` (`user_id`),
  ADD KEY `fk_user_list` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `det_pro_caracter`
--
ALTER TABLE `det_pro_caracter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_pro_caracter`
--
ALTER TABLE `det_pro_caracter`
  ADD CONSTRAINT `fk_det_prod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fr_det_caracter` FOREIGN KEY (`id_caracteristica`) REFERENCES `caracteristicas` (`id`);

--
-- Filtros para la tabla `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `fk_prod_list` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_user_list` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
