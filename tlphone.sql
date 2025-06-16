-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2025 a las 00:27:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tlphone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `activo`) VALUES
(1, 'Celulares', 1),
(2, 'Relojes', 1),
(3, 'Auriculares', 1),
(4, 'Parlantes', 1),
(5, 'Cargadores', 1),
(6, 'Fundas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `respondido` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `mensaje`, `fecha`, `respondido`) VALUES
(1, 'Joaquin', 'joa@gmail.com', 'Prueba 1', '2025-06-08 14:07:55', 'NO'),
(2, 'Joaquin', 'joa@gmail.com', 'Prueba 2', '2025-06-08 14:08:07', 'NO'),
(3, 'Prueba', 'Prueba@gmail.com', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam blanditiis placeat temporibus eum. Modi explicabo perspiciatis quos incidunt laboriosam tempora facilis voluptatibus sunt. Dolores delectus quasi laboriosam perspiciatis alias iusto?', '2025-06-08 14:09:14', 'SI'),
(5, 'Joaquin', 'joa@gmail.com', 'probando uno dos tres', '2025-06-08 15:04:34', 'SI'),
(6, 'Joaquin', 'joa@gmail.com', 'probando uno dos tres', '2025-06-08 15:04:48', 'NO'),
(7, 'Joaquin', 'joa@gmail.com', 'Probando nuevamente!', '2025-06-08 15:11:01', 'NO'),
(9, 'Joaquin', 'joa@gmail.com', 'Probando una vez mas!', '2025-06-08 15:15:46', 'NO'),
(10, 'Joaquin', 'joa@gmail.com', 'Probando por última vez!', '2025-06-08 15:19:26', 'NO'),
(11, 'Joaquin Perez', 'joa@gmail.com', 'consulta de prueba', '2025-06-11 15:41:47', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(2) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`) VALUES
(1, 'Apple iPhone 16 Pro 256GB eSim', 'celular1.png', 1, 1000000.00, 1230000.00, 13, 1, 'NO'),
(2, 'Samsung Galaxy A56 5G 256GB Ram 8GB Dual Sim', 'celular2.png', 1, 500000.00, 675000.00, 19, 1, 'NO'),
(3, 'Samsung Galaxy A36 5G 256GB Ram 8GB Dual Sim', 'celular3.png', 1, 350000.00, 522000.00, 14, 1, 'NO'),
(4, 'Xiaomi Redmi 13 Pro 128GB 5G Dual Sim', 'celular4.png', 1, 420000.00, 512000.00, 14, 1, 'NO'),
(5, 'Apple iPhone 16 128GB nanoSim', 'celular5.png', 1, 800000.00, 920000.00, 22, 1, 'NO'),
(6, 'Google Pixel Pro XL 256GB DualSim', 'celular6.png', 1, 925000.00, 1100000.00, 8, 1, 'NO'),
(10, 'Apple Watch SE', 'reloj1.png', 2, 180000.00, 220000.00, 14, 1, 'NO'),
(11, 'Apple Watch Ultra', 'reloj2.png', 2, 220000.00, 270000.00, 11, 1, 'NO'),
(12, 'Samsung Galaxy Watch 5', 'reloj3.png', 2, 150000.00, 200000.00, 14, 1, 'NO'),
(13, 'Huawei Watch GT5', 'reloj4.png', 2, 130000.00, 185000.00, 10, 1, 'NO'),
(14, 'Samsung Galaxy Fit 3', 'reloj5.png', 2, 30000.00, 50000.00, 27, 4, 'NO'),
(15, 'Xiaomi Mi Band 8', 'reloj6.png', 2, 20000.00, 36500.00, 32, 5, 'NO'),
(16, 'Apple AirPods Pro - Segunda Generación', 'auricular1.png', 3, 170000.00, 210000.00, 11, 2, 'NO'),
(17, 'JBL Tune Flex', 'auricular2.png', 3, 100000.00, 130000.00, 16, 4, 'NO'),
(18, 'Xiaomi Mi True', 'auricular3.png', 3, 35000.00, 50000.00, 23, 4, 'NO'),
(19, 'JBL Tune 520BT', 'auricular4.png', 3, 50000.00, 85000.00, 14, 2, 'NO'),
(20, 'Apple AirPods Max con Smart Case', 'auricular5.png', 3, 200000.00, 270000.00, 10, 2, 'NO'),
(21, 'Sony WH-1000XM5', 'auricular6.png', 3, 190000.00, 212000.00, 15, 3, 'NO'),
(22, 'Marshall Emberton II', 'parlante1.png', 4, 70000.00, 100000.00, 12, 2, 'NO'),
(23, 'Marshall Willen II', 'parlante2.png', 4, 90000.00, 130000.00, 13, 2, 'NO'),
(24, 'Marshall Kilburn II', 'parlante3.png', 4, 120000.00, 160000.00, 12, 1, 'NO'),
(25, 'JBL Go 3 - Altavoz portátil a prueba de agua', 'parlante4.png', 4, 40000.00, 75000.00, 32, 5, 'NO'),
(26, 'JBL Flip 6 - Altavoz portátil a prueba de agua', 'parlante6.png', 4, 60000.00, 100000.00, 27, 3, 'NO'),
(27, 'JBL Charge 5 - Altavoz portátil a prueba de agua', 'parlante5.png', 4, 90000.00, 130000.00, 25, 3, 'NO'),
(28, 'Apple Adaptador 20W', 'cargador1.png', 5, 8000.00, 12000.00, 46, 8, 'NO'),
(29, 'Xiaomi Power Bank 22.5W 10000 mAh', 'cargador2.png', 5, 30000.00, 45000.00, 13, 2, 'NO'),
(30, 'Apple Magsafe Cargador Inalámbrico 15W', 'cargador3.png', 5, 9000.00, 13000.00, 30, 5, 'NO'),
(31, 'Samsung Cargador Carga Rápida 25W', 'cargador4.png', 5, 7000.00, 12000.00, 36, 5, 'NO'),
(32, 'Xiaomi Cargador Inalámbrico de Auto 20W', 'cargador5.png', 5, 6000.00, 10000.00, 4, 1, 'NO'),
(33, 'Samsung Cargador Inalámbrico 15W', 'cargador6.png', 5, 10000.00, 14000.00, 3, 1, 'NO'),
(34, 'Funda de Silicona para Samsung Galaxy A55', 'funda1.png', 6, 1000.00, 5000.00, 1, 1, 'NO'),
(35, 'Funda Rígida para Samsung A36', 'funda2.png', 6, 2000.00, 5500.00, 7, 2, 'NO'),
(36, 'Funda de Silicona para Motorola G24 Power', 'funda3.png', 6, 2000.00, 4200.00, 12, 2, 'NO'),
(37, 'Apple Funda de Cuero iPhone 13 - Marron', 'funda4.png', 6, 4000.00, 9000.00, 24, 2, 'NO'),
(38, 'Apple Funda Magsafe iPhone 16 Pro ', 'funda5.png', 6, 2000.00, 5000.00, 29, 5, 'NO'),
(39, 'Funda de Cuero para iPhone 6s Plus - Negra', 'funda6.png', 6, 4000.00, 9000.00, 5, 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `perfil_id` int(2) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'Tomás', 'Giménez', 'tomii@gmail.com', 'Tomii.gim', '$2y$10$vbCPCzIb62X3hDiJtJQzMO.PPue2oPUiexZV6XHffdgodwJp/z7nu', 1, 'NO'),
(2, 'Lautaro Nicolás', 'Gimenez', 'lautarogimenezx@gmail.com', 'lautarogimenezx', '$2y$10$omduUY6YFFskod5z27IZ5eB0QfttGqJhWt.7fZcl1Uc.pHS5Nymly', 1, 'NO'),
(4, 'usuario', 'usuario', 'usuario@gmail.com', 'usuario', '$2y$10$y3uXpbSbZL0XdIjCiSpM5e4G9LSxhuunhtBMQsm57kGEJAaEmAG62', 2, 'NO'),
(5, 'Lucia Fernanda', 'Gauna', 'lucia@gmail.com', 'lugauna', '$2y$10$LOu/SwhTAN2ugvTZRMUgB.CnxIf3z04IOemZNEatrsru3lMp9DwWy', 2, 'NO'),
(6, 'Juan Cruz', 'Galarza', 'juan@gmail.com', 'juangala', '$2y$10$fy5Bfn3rGWFeFz/xDiGLC.dHMx6VGtZwsbTMdQHMxnKI1vsqHZIVe', 2, 'NO'),
(11, 'Joaquin', 'Ferreto', 'joa@gmail.com', 'joaferreto', '$2y$10$Z4AdQD1IfXfVzJX.cYeyQObJRwBFN.UJoesp1NmF1./1ZtJeZGpsm', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) NOT NULL,
  `total_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `total_venta`) VALUES
(19, '2025-06-11 13:23:32', 11, 1677000.00),
(20, '2025-06-11 15:27:31', 11, 5000.00),
(21, '2025-06-11 15:40:52', 11, 550000.00),
(22, '2025-06-15 20:12:48', 5, 234000.00),
(23, '2025-06-15 20:14:46', 5, 1235000.00),
(24, '2025-06-16 18:14:43', 6, 1214000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(34, 19, 10, 1, 220000.00),
(35, 19, 16, 1, 210000.00),
(36, 19, 28, 1, 12000.00),
(37, 19, 38, 1, 5000.00),
(38, 19, 1, 1, 1230000.00),
(39, 20, 34, 1, 5000.00),
(40, 21, 16, 2, 210000.00),
(41, 21, 23, 1, 130000.00),
(42, 22, 28, 2, 12000.00),
(43, 22, 16, 1, 210000.00),
(44, 23, 1, 1, 1230000.00),
(45, 23, 38, 1, 5000.00),
(46, 24, 5, 1, 920000.00),
(47, 24, 28, 2, 12000.00),
(48, 24, 20, 1, 270000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfiles`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`),
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
