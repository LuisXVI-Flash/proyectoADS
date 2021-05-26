-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2021 a las 09:36:32
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `workana_dibruesma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Jefe de Zona'),
(3, 'Vendedor'),
(4, 'Cobrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `referenciavivienda` varchar(200) DEFAULT NULL,
  `celular` varchar(9) NOT NULL,
  `tipo_cliente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `dni`, `nombre`, `apellido`, `email`, `direccion`, `referenciavivienda`, `celular`, `tipo_cliente`) VALUES
(1, 88541, 'Jeco', 'Castro', 'jeco@test.com', 'laguna de peru', 'Enfrente de un abarrote', '485552212', 'credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleinforme`
--

CREATE TABLE `detalleinforme` (
  `iddetalleinforme` int(11) NOT NULL,
  `idorden` int(11) NOT NULL,
  `idinforme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `iddetalleorden` int(11) NOT NULL,
  `idorden` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`iddetalleorden`, `idorden`, `idproducto`, `cantidad`, `precio`) VALUES
(1, 1, 1, 2, 50),
(2, 1, 3, 1, 8),
(3, 2, 2, 2, 16),
(4, 3, 3, 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `idinforme` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `idtrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `letrasdepago`
--

CREATE TABLE `letrasdepago` (
  `idletrapago` int(11) NOT NULL,
  `fechapago` date NOT NULL,
  `montopagado` double NOT NULL,
  `montorestante` double NOT NULL,
  `idorden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logincliente`
--

CREATE TABLE `logincliente` (
  `idlogincliente` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `idorden` int(11) NOT NULL,
  `vendedor` int(3) NOT NULL,
  `cobrador` int(3) NOT NULL,
  `fechaventa` date NOT NULL,
  `diavisita` varchar(8) DEFAULT NULL,
  `pagosemanal` int(11) DEFAULT NULL,
  `cantidadcuotas` int(11) DEFAULT NULL,
  `montototal` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipoorden` varchar(20) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`idorden`, `vendedor`, `cobrador`, `fechaventa`, `diavisita`, `pagosemanal`, `cantidadcuotas`, `montototal`, `estado`, `tipoorden`, `idcliente`) VALUES
(1, 5, 12, '2021-02-02', 'Martes', 12, 2, 25, '1', 'credito', 1),
(2, 5, 4, '2021-02-02', 'Lunes', 16, 2, 33, '1', 'credito', 1),
(3, 1, 4, '2021-02-02', 'Lunes', 12, 2, 25, '1', 'credito', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(4) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `precio`, `stock`, `descripcion`, `imagen`) VALUES
(1, 'Jabón Liquido', 25, 2, 'Simple texto', ''),
(2, 'Pino quita grasa', 8, 5, 'Simple texto', ''),
(3, 'Ambientador', 8, 8, 'Simple texto', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_cobranza`
--

CREATE TABLE `registro_cobranza` (
  `idregistrocobranza` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL,
  `fechacobranza` date NOT NULL,
  `montocobrado` double NOT NULL,
  `gastos` double NOT NULL,
  `subtotal` double NOT NULL,
  `comision` double NOT NULL,
  `totalentregado` double NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenventa`
--

CREATE TABLE `resumenventa` (
  `idresumenventa` int(11) NOT NULL,
  `fecharesumen` date NOT NULL,
  `zonaventa` varchar(50) NOT NULL,
  `cantprodllevados` int(11) NOT NULL,
  `cantprodretornados` int(11) NOT NULL,
  `cantprodperdidos` int(11) DEFAULT NULL,
  `totalventas` int(11) NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetaantigua`
--

CREATE TABLE `tarjetaantigua` (
  `idtarjetaantigua` int(11) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `fechainiciobalance` date NOT NULL,
  `canttarjetas` int(11) NOT NULL,
  `montodinero` double NOT NULL,
  `idtrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetanueva`
--

CREATE TABLE `tarjetanueva` (
  `idtarjetanueva` int(11) NOT NULL,
  `fechaventa` int(11) NOT NULL,
  `fechainiciobalance` date NOT NULL,
  `canttarjetas` int(11) NOT NULL,
  `montodinero` double NOT NULL,
  `idtrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idtrabajador` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dni` int(8) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `idcargo` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pasword` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idtrabajador`, `nombre`, `apellido`, `dni`, `celular`, `idcargo`, `usuario`, `pasword`, `estado`) VALUES
(3, 'Luis Angel', 'Izquierdo Rojas', 12345678, '123465789', 1, 'LuisXVI', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'Pablito', 'Federico Sagasti', 45678921, '456789132', 4, 'aeamanito', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'Pilar', 'Navarro', 45678123, '456218935', 3, 'efe', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'Isabella', 'Caballero', 74185263, '852963741', 2, 'nell', '0449f15734c8ca27ce7b52f24a82c775', 1),
(7, 'Juan', 'Gome', 55584582, '998349324', 2, 'Juanito', '202cb962ac59075b964b07152d234b70', 1),
(8, 'Juan', 'Gome', 55584582, '998349324', 2, 'Juanito', '202cb962ac59075b964b07152d234b70', 1),
(9, 'Juan', 'Gome', 55584582, '998349324', 2, 'Juanito', '202cb962ac59075b964b07152d234b70', 1),
(10, 'Pedro', 'Santo', 2147483647, '488454444', 2, 'peterpan', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(11, 'Luisa', 'Castillo', 21312343, '123448545', 2, 'luisilla', '202cb962ac59075b964b07152d234b70', 1),
(12, 'Ana', 'Lopez', 454556545, '123324778', 4, 'Anita', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(13, 'Bimbo', 'negrito', 1231321, '445654511', 2, 'Bimbo', '202cb962ac59075b964b07152d234b70', 1),
(14, 'Luis', 'Altano', 468151652, '234435454', 2, 'Luisillo', '202cb962ac59075b964b07152d234b70', 1),
(15, 'dani', 'rios', 2147483647, '125855214', 2, 'dany', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(16, 'Julanito', 'Mendez', 2147483647, '125855214', 2, 'julanito', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(17, 'Angela', 'gomez', 123123123, '57', 3, 'angella', '202cb962ac59075b964b07152d234b70', 1),
(18, 'Juana', 'torres', 4554654, '123123432', 2, 'juanita', '202cb962ac59075b964b07152d234b70', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `detalleinforme`
--
ALTER TABLE `detalleinforme`
  ADD PRIMARY KEY (`iddetalleinforme`),
  ADD KEY `idorden` (`idorden`),
  ADD KEY `idinforme` (`idinforme`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`iddetalleorden`),
  ADD KEY `idorden` (`idorden`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`idinforme`),
  ADD KEY `idtrabajador` (`idtrabajador`);

--
-- Indices de la tabla `letrasdepago`
--
ALTER TABLE `letrasdepago`
  ADD PRIMARY KEY (`idletrapago`),
  ADD KEY `idorden` (`idorden`);

--
-- Indices de la tabla `logincliente`
--
ALTER TABLE `logincliente`
  ADD PRIMARY KEY (`idlogincliente`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idorden`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `registro_cobranza`
--
ALTER TABLE `registro_cobranza`
  ADD PRIMARY KEY (`idregistrocobranza`),
  ADD KEY `idtrabajador` (`idtrabajador`);

--
-- Indices de la tabla `resumenventa`
--
ALTER TABLE `resumenventa`
  ADD PRIMARY KEY (`idresumenventa`);

--
-- Indices de la tabla `tarjetaantigua`
--
ALTER TABLE `tarjetaantigua`
  ADD PRIMARY KEY (`idtarjetaantigua`),
  ADD KEY `idtrabajador` (`idtrabajador`);

--
-- Indices de la tabla `tarjetanueva`
--
ALTER TABLE `tarjetanueva`
  ADD PRIMARY KEY (`idtarjetanueva`),
  ADD KEY `idtrabajador` (`idtrabajador`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idtrabajador`),
  ADD KEY `idcargo` (`idcargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleinforme`
--
ALTER TABLE `detalleinforme`
  MODIFY `iddetalleinforme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `iddetalleorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `idinforme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `letrasdepago`
--
ALTER TABLE `letrasdepago`
  MODIFY `idletrapago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logincliente`
--
ALTER TABLE `logincliente`
  MODIFY `idlogincliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `idorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro_cobranza`
--
ALTER TABLE `registro_cobranza`
  MODIFY `idregistrocobranza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resumenventa`
--
ALTER TABLE `resumenventa`
  MODIFY `idresumenventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarjetaantigua`
--
ALTER TABLE `tarjetaantigua`
  MODIFY `idtarjetaantigua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarjetanueva`
--
ALTER TABLE `tarjetanueva`
  MODIFY `idtarjetanueva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idtrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleinforme`
--
ALTER TABLE `detalleinforme`
  ADD CONSTRAINT `detalleinforme_ibfk_1` FOREIGN KEY (`idinforme`) REFERENCES `informe` (`idinforme`),
  ADD CONSTRAINT `detalleinforme_ibfk_2` FOREIGN KEY (`idorden`) REFERENCES `orden` (`idorden`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `orden` (`idorden`),
  ADD CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `letrasdepago`
--
ALTER TABLE `letrasdepago`
  ADD CONSTRAINT `letrasdepago_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `orden` (`idorden`);

--
-- Filtros para la tabla `logincliente`
--
ALTER TABLE `logincliente`
  ADD CONSTRAINT `logincliente_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Filtros para la tabla `registro_cobranza`
--
ALTER TABLE `registro_cobranza`
  ADD CONSTRAINT `registro_cobranza_ibfk_1` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `tarjetaantigua`
--
ALTER TABLE `tarjetaantigua`
  ADD CONSTRAINT `tarjetaantigua_ibfk_1` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `tarjetanueva`
--
ALTER TABLE `tarjetanueva`
  ADD CONSTRAINT `tarjetanueva_ibfk_1` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`idcargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
