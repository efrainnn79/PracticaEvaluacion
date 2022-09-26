CREATE DATABASE  IF NOT EXISTS `bdagua` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bdagua`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: bdagua
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` tinyint(4) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `tipoCliente_idtipoCliente` int(11) NOT NULL,
  `idPersona` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_Cliente_tipoCliente1_idx` (`tipoCliente_idtipoCliente`),
  KEY `fk_cliente_persona1_idx` (`idPersona`),
  CONSTRAINT `fk_Cliente_tipoCliente1` FOREIGN KEY (`tipoCliente_idtipoCliente`) REFERENCES `tipocliente` (`idtipoCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,1,'avenida circunlacion esquina uzeda',2,1),(2,1,'avenida panamericana',1,2),(3,1,'avenida petrolera',1,3);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_venta` (
  `idDetalle_venta` tinyint(4) NOT NULL,
  `idVentas` int(11) NOT NULL,
  `idProducto` tinyint(4) NOT NULL,
  PRIMARY KEY (`idDetalle_venta`),
  KEY `fk_Ventas_has_Producto_Producto1_idx` (`idProducto`),
  KEY `fk_Ventas_has_Producto_Ventas1_idx` (`idVentas`),
  CONSTRAINT `fk_Ventas_has_Producto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ventas_has_Producto_Ventas1` FOREIGN KEY (`idVentas`) REFERENCES `ventas` (`idVentas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idEmpleado` tinyint(4) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Imagen` varchar(45) DEFAULT NULL,
  `idPersona` tinyint(4) NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `fk_empleado_persona1_idx` (`idPersona`),
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (0,1,'perfil.png',1),(1,1,'perfil.png',2),(2,1,'perfil.png',3);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idPersona` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `apellidoPaterno` varchar(45) DEFAULT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `Sexo` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `FechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `FechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'paola','aquino','soliz','F','avenida circunvalacion','aquino83@gmail.com','7458745','2022-09-01 02:18:57','2022-09-01 02:18:57'),(2,'gabriel','arizaga','tonelada','F','avenida hernando silis','arizaga82@gmail.com','75878965','2022-09-01 02:18:57','2022-09-01 02:18:57'),(3,'willy','borda','villanueva','F','Calle ismael montes esquina brasil','willys82@gmail.com','74589632','2022-09-01 03:36:10','2022-09-01 03:36:10');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idProducto` tinyint(4) NOT NULL,
  `Producto` varchar(45) DEFAULT NULL,
  `Stock` varchar(45) DEFAULT NULL,
  `PrecioVenta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idRol` tinyint(4) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','administracion normal'),(2,'superadmin','administracion total'),(3,'distribuidor','Acceso a la aplicacion');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocliente`
--

DROP TABLE IF EXISTS `tipocliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocliente` (
  `idtipoCliente` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipoCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocliente`
--

LOCK TABLES `tipocliente` WRITE;
/*!40000 ALTER TABLE `tipocliente` DISABLE KEYS */;
INSERT INTO `tipocliente` VALUES (1,'Publico General',NULL),(2,'Empresa',NULL);
/*!40000 ALTER TABLE `tipocliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(45) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidopat` varchar(45) DEFAULT NULL,
  `apellidomat` varchar(45) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT 1,
  `Telefono` varchar(45) DEFAULT NULL,
  `Cedula` varchar(45) DEFAULT NULL,
  `Sexo` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `idRol` tinyint(4) NOT NULL,
  `fechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_Permiso1_idx` (`idRol`),
  CONSTRAINT `fk_Usuario_Permiso1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,NULL,'milenka','equise','paniagua',0,'74589632','85698521','F','junior82@gmail.com','mep85698521','8c5fc4935845aafc33d662080a9801b5',3,'2022-08-31 23:38:13','2022-08-31 23:38:13'),(2,NULL,'bruno','janko','condori',1,'74558745','87589658','F','jhonny82@gmail.com','bjc87589658','c995dca2e3332357571f1c724ea72853',3,'2022-08-31 23:39:27','2022-08-31 23:39:27'),(3,NULL,'juan','navia','caicedo',1,'74589658','8745896','M','navia23@gmail.com','jnc8745896','64127c9ce131a834789b7b1bd94dd7a5',1,'2022-08-31 23:41:37','2022-08-31 23:41:37'),(5,NULL,'alison','lazarte','nieto',1,'45768532','7485698','F','alison23@gmail.com','aln7485698','121065f14d097b1aa89c584b55f832eb',1,'2022-09-01 01:50:10','2022-09-01 01:50:10'),(6,NULL,'paola','lazarte','nieto',0,'78514585','8758965','F','katerin83@gmail.com','pln8758965','281e9ecc08fe5ed594242c6a074e3433',3,'2022-09-01 03:00:53','2022-09-01 03:00:53');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `precioVenta` varchar(45) DEFAULT NULL,
  `Cantidad` varchar(45) DEFAULT NULL,
  `Fecha` timestamp NULL DEFAULT current_timestamp(),
  `idUsuario` int(11) NOT NULL,
  `idCliente` tinyint(4) NOT NULL,
  PRIMARY KEY (`idVentas`),
  KEY `fk_ventas_usuario1_idx` (`idUsuario`),
  KEY `fk_ventas_cliente1_idx` (`idCliente`),
  CONSTRAINT `fk_ventas_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'10','4','2022-09-15 19:59:52',2,1),(2,'12','2','2022-09-15 19:59:52',1,3),(3,'8','10','2022-09-15 19:59:52',3,2);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vwcliente`
--

DROP TABLE IF EXISTS `vwcliente`;
/*!50001 DROP VIEW IF EXISTS `vwcliente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vwcliente` (
  `idPersona` tinyint NOT NULL,
  `Nombre` tinyint NOT NULL,
  `apellidoPaterno` tinyint NOT NULL,
  `apellidoMaterno` tinyint NOT NULL,
  `Ubicacion` tinyint NOT NULL,
  `tipoCliente` tinyint NOT NULL,
  `Estado` tinyint NOT NULL,
  `Sexo` tinyint NOT NULL,
  `Direccion` tinyint NOT NULL,
  `Correo` tinyint NOT NULL,
  `Telefono` tinyint NOT NULL,
  `FechaRegistro` tinyint NOT NULL,
  `FechaActualizacion` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vwempleado`
--

DROP TABLE IF EXISTS `vwempleado`;
/*!50001 DROP VIEW IF EXISTS `vwempleado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vwempleado` (
  `idPersona` tinyint NOT NULL,
  `Imagen` tinyint NOT NULL,
  `Nombre` tinyint NOT NULL,
  `apellidoPaterno` tinyint NOT NULL,
  `apellidoMaterno` tinyint NOT NULL,
  `Estado` tinyint NOT NULL,
  `Sexo` tinyint NOT NULL,
  `Direccion` tinyint NOT NULL,
  `Correo` tinyint NOT NULL,
  `Telefono` tinyint NOT NULL,
  `FechaRegistro` tinyint NOT NULL,
  `FechaActualizacion` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vwventas`
--

DROP TABLE IF EXISTS `vwventas`;
/*!50001 DROP VIEW IF EXISTS `vwventas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vwventas` (
  `imagen` tinyint NOT NULL,
  `nombres` tinyint NOT NULL,
  `apellidopat` tinyint NOT NULL,
  `apellidomat` tinyint NOT NULL,
  `precioVenta` tinyint NOT NULL,
  `cantidad` tinyint NOT NULL,
  `Fecha` tinyint NOT NULL,
  `nombreCliente` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vwcliente`
--

/*!50001 DROP TABLE IF EXISTS `vwcliente`*/;
/*!50001 DROP VIEW IF EXISTS `vwcliente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwcliente` AS select `p`.`idPersona` AS `idPersona`,`p`.`Nombre` AS `Nombre`,`p`.`apellidoPaterno` AS `apellidoPaterno`,`p`.`apellidoMaterno` AS `apellidoMaterno`,`c`.`Ubicacion` AS `Ubicacion`,`c`.`tipoCliente_idtipoCliente` AS `tipoCliente`,`c`.`Estado` AS `Estado`,`p`.`Sexo` AS `Sexo`,`p`.`Direccion` AS `Direccion`,`p`.`Correo` AS `Correo`,`p`.`Telefono` AS `Telefono`,`p`.`FechaRegistro` AS `FechaRegistro`,`p`.`FechaActualizacion` AS `FechaActualizacion` from (`persona` `p` join `cliente` `c` on(`c`.`idPersona` = `p`.`idPersona`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwempleado`
--

/*!50001 DROP TABLE IF EXISTS `vwempleado`*/;
/*!50001 DROP VIEW IF EXISTS `vwempleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwempleado` AS select `p`.`idPersona` AS `idPersona`,`e`.`Imagen` AS `Imagen`,`p`.`Nombre` AS `Nombre`,`p`.`apellidoPaterno` AS `apellidoPaterno`,`p`.`apellidoMaterno` AS `apellidoMaterno`,`e`.`Estado` AS `Estado`,`p`.`Sexo` AS `Sexo`,`p`.`Direccion` AS `Direccion`,`p`.`Correo` AS `Correo`,`p`.`Telefono` AS `Telefono`,`p`.`FechaRegistro` AS `FechaRegistro`,`p`.`FechaActualizacion` AS `FechaActualizacion` from (`persona` `p` join `empleado` `e` on(`e`.`idPersona` = `p`.`idPersona`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwventas`
--

/*!50001 DROP TABLE IF EXISTS `vwventas`*/;
/*!50001 DROP VIEW IF EXISTS `vwventas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwventas` AS select `u`.`imagen` AS `imagen`,`u`.`nombres` AS `nombres`,`u`.`apellidopat` AS `apellidopat`,`u`.`apellidomat` AS `apellidomat`,`v`.`precioVenta` AS `precioVenta`,`v`.`Cantidad` AS `cantidad`,`v`.`Fecha` AS `Fecha`,`p`.`Nombre` AS `nombreCliente` from (((`usuario` `u` join `ventas` `v` on(`v`.`idUsuario` = `u`.`idUsuario`)) join `cliente` `c` on(`c`.`idCliente` = `v`.`idCliente`)) join `persona` `p` on(`p`.`idPersona` = `c`.`idPersona`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-15 17:40:13
