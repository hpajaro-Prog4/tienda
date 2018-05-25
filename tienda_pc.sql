-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2018 a las 13:56:55
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detfacturas`
--

CREATE TABLE `detfacturas` (
  `idDetFactura` int(11) NOT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `Precio` decimal(7,2) NOT NULL,
  `iva` decimal(4,2) DEFAULT NULL,
  `idEstadoDetFactura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL,
  `numFactura` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idEstadoFactura` int(11) DEFAULT NULL,
  `IdCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `idParametro` int(11) NOT NULL,
  `atributo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estadoParametro` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`idParametro`, `atributo`, `descripcion`, `estadoParametro`) VALUES
(1, 'idTipoProducto', 'Tipo de Producto', 'A'),
(2, 'IdCategoriaProducto', 'Categoria de Producto', 'A'),
(3, 'idEstadoProducto', 'Estado Peoducto', 'A'),
(4, 'idTipoIdentificacion', 'Tipo Identificacion', 'A'),
(5, 'idTipoPersona', 'Tipo de Persona', 'A'),
(6, 'IdEstadoPersona', 'Tipo Persona', 'A'),
(7, 'idEstadoFactura', 'Estado de la Factura', 'A'),
(8, 'IdEstadoUsuario', 'Estado de Usuario', 'A'),
(9, 'idRol', 'ROl del Usuario', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idpersona` int(11) NOT NULL,
  `identificacion` varchar(50) NOT NULL,
  `idTipoIdentificacion` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `idTipoPersona` int(11) DEFAULT NULL,
  `idEstadoPersona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `identificacion`, `idTipoIdentificacion`, `nombres`, `apellidos`, `correo`, `direccion`, `telefono`, `idTipoPersona`, `idEstadoPersona`) VALUES
(1, '72135240', 31, 'Hernan Enrique', 'Pajaro Torres', 'hpajaro@gmail.com', 'Cra 64 # 64 97 ', '300 3563643', 33, 29),
(2, '75128456', 31, 'Pedro ', 'Paramo', 'pparamo@gmail.com', 'Carra 54 # 89-20', '35678956', 34, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `idTipoProducto` int(11) DEFAULT NULL,
  `idCategoriaProducto` int(11) DEFAULT NULL,
  `idEstadoProducto` int(11) DEFAULT NULL,
  `Precio` decimal(15,2) DEFAULT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `Nombre`, `idTipoProducto`, `idCategoriaProducto`, `idEstadoProducto`, `Precio`, `Imagen`, `Descripcion`, `Stock`) VALUES
(1, 'Board P85', 8, 20, 21, '450000.00', 'board.jpg', 'AMD Dual Core', 20),
(2, 'Diadema Genius ', 8, 23, 21, '43200.00', 'diademas.jpg', 'USB  Colores Fosforescentes', 24),
(3, 'Monitor 19 Pulg ViewSonic', 8, 14, 21, '370000.00', 'monitor.jpg', 'LCD parlantes internos', 13),
(4, 'RAM 16BG', 8, 17, 21, '190000.00', 'ram.jpg', 'DDR3', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `idEstadoUsuario` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `idPersona`, `usuario`, `password`, `idEstadoUsuario`, `idRol`) VALUES
(1, 1, 'hpajaro', '81dc9bdb52d04dc20036dbd8313ed055', 24, 26),
(2, NULL, NULL, NULL, 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorparametros`
--

CREATE TABLE `valorparametros` (
  `idValorParametro` int(11) NOT NULL,
  `idParametro` int(11) DEFAULT NULL,
  `valor` varchar(200) DEFAULT NULL,
  `orden` varchar(5) DEFAULT NULL,
  `estadoValorParametro` char(1) DEFAULT NULL,
  `idPadre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valorparametros`
--

INSERT INTO `valorparametros` (`idValorParametro`, `idParametro`, `valor`, `orden`, `estadoValorParametro`, `idPadre`) VALUES
(5, 1, 'Hardware Computo', '01', 'A', 0),
(6, 1, 'Software de Sistemas', '02', 'A', 0),
(7, 1, 'Hardware Redes', '03', 'A', 0),
(8, 1, 'Hardware Perifericos', '04', 'A', 0),
(9, 1, 'Software Ofimatica', '05', 'A', 0),
(10, 1, 'Software verticales', '07', 'A', 0),
(11, 2, 'Portatiles', '01', 'A', 5),
(12, 2, 'Servidores', '03', 'A', 5),
(13, 2, 'PC de Escritorio', '03', 'A', 5),
(14, 2, 'Monitores', '01', 'A', 8),
(15, 2, 'Discos Duros', '02', 'A', 8),
(16, 2, 'Procesadores', '03', 'A', 8),
(17, 2, 'Memorias RAM', '05', 'A', 8),
(18, 2, 'Fuentes de Poder', '06', 'A', 8),
(19, 2, 'Mouses', '07', 'A', 8),
(20, 2, 'Mother Boards', '06', 'A', 8),
(21, 3, 'Activo', '01', 'A', NULL),
(22, 3, 'Inactivo', '03', 'A', NULL),
(23, 2, 'Multimedia ', '09', 'A', 8),
(24, 8, 'Activo', '01', 'A', NULL),
(25, 8, 'Inactivo', '02', 'A', NULL),
(26, 9, 'Administrador', '01', 'A', NULL),
(27, 9, 'Operador', '02', 'A', NULL),
(28, 9, 'Cliente', '03', 'A', NULL),
(29, 6, 'Activa', '01', 'A', NULL),
(30, 6, 'Inactiva', '02', 'A', NULL),
(31, 4, 'Cedula', '01', 'A', NULL),
(32, 4, 'Tarjeta Identidad', '02', 'A', NULL),
(33, 5, 'Empleado', '01', 'A', NULL),
(34, 5, 'Cliente', '02', 'A', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detfacturas`
--
ALTER TABLE `detfacturas`
  ADD PRIMARY KEY (`idDetFactura`),
  ADD KEY `ix_factura` (`idFactura`) USING BTREE,
  ADD KEY `ix_producto` (`idProducto`) USING BTREE;

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `ix_persona` (`IdCliente`) USING BTREE;

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`idParametro`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `ix_persona1` (`idPersona`) USING BTREE;

--
-- Indices de la tabla `valorparametros`
--
ALTER TABLE `valorparametros`
  ADD PRIMARY KEY (`idValorParametro`),
  ADD KEY `ix_parametro` (`idParametro`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detfacturas`
--
ALTER TABLE `detfacturas`
  MODIFY `idDetFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `idParametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `valorparametros`
--
ALTER TABLE `valorparametros`
  MODIFY `idValorParametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detfacturas`
--
ALTER TABLE `detfacturas`
  ADD CONSTRAINT `detfacturas_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `facturas` (`idFactura`),
  ADD CONSTRAINT `detfacturas_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `personas` (`idpersona`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idpersona`);

--
-- Filtros para la tabla `valorparametros`
--
ALTER TABLE `valorparametros`
  ADD CONSTRAINT `valorparametros_ibfk_1` FOREIGN KEY (`idParametro`) REFERENCES `parametros` (`idParametro`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
