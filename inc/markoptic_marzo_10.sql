CREATE DATABASE  IF NOT EXISTS `markoptic` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `markoptic`;
-- MySQL dump 10.13  Distrib 5.6.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: markoptic
-- ------------------------------------------------------
-- Server version	5.6.23

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
-- Table structure for table `Apadrinamientos`
--

DROP TABLE IF EXISTS `Apadrinamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Apadrinamientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_padrino` int(11) NOT NULL,
  `id_ben` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Apadrinamientos_1_idx` (`id_padrino`),
  KEY `fk_Apadrinamientos_2_idx` (`id_ben`),
  CONSTRAINT `fk_Apadrinamientos_1` FOREIGN KEY (`id_padrino`) REFERENCES `Padrinos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Apadrinamientos_2` FOREIGN KEY (`id_ben`) REFERENCES `beneficiario_solicitud` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Donativos`
--

DROP TABLE IF EXISTS `Donativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Donativos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci,
  `metodo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `referencia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `doc_comprobacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comprobante` tinyint(1) NOT NULL DEFAULT '0',
  `id_apadrinamiento` int(11) DEFAULT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `dt_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `dt_modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_Donativos_1_idx` (`id_apadrinamiento`),
  CONSTRAINT `fk_Donativos_1` FOREIGN KEY (`id_apadrinamiento`) REFERENCES `Apadrinamientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Padrinos`
--

DROP TABLE IF EXISTS `Padrinos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Padrinos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fec_nac` date NOT NULL,
  `Direccion` text COLLATE utf8_spanish_ci,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dt_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `dt_modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `beneficiario_solicitud`
--

DROP TABLE IF EXISTS `beneficiario_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficiario_solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=377 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trigger_beneficiario after insert
    ON markoptic.beneficiario_solicitud FOR EACH ROW
    BEGIN
    #se guardan los id's de la nueva solicitud
    set @new_id = NEW.id;
    set @new_sol = NEW.id_solicitud;
    
    #se crea la pagina nueva en el sistema cms
	INSERT INTO cms.cmscouch_pages(template_id,page_title)
    VALUES(7, (SELECT CONCAT_WS(' ',b.nombre, b.apellido) as nombre
				FROM markoptic.beneficiario_solicitud b
				WHERE b.id = @new_id));
                
    #se obtiene el id de la neva pagina            
	set @id = LAST_INSERT_ID();
    
    #se rellena el campo de edad
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
        VALUES(@id,7,(SELECT b.edad FROM markoptic.beneficiario_solicitud b
						WHERE b.id = @new_id),
					 (SELECT b.edad FROM markoptic.beneficiario_solicitud b
						WHERE b.id = @new_id));
    
    #se rellena el campo de ciudad
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,20,(SELECT l.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.localidades l on b.ciudad = l.id
                    WHERE b.id = @new_id),
				  (SELECT l.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.localidades l on b.ciudad = l.id
                    WHERE b.id = @new_id));  
                    
    #se rellena el campo de estado                
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,21,(SELECT r.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.regiones r on b.estado = r.id
                    WHERE b.id = @new_id),
				  (SELECT r.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.regiones r on b.estado = r.id
                    WHERE b.id = @new_id));
    
    #se rellena el campo de pais
	INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,22,(SELECT p.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.paises p on b.pais = p.id
                    WHERE b.id = @new_id),
				  (SELECT p.nombre
					FROM markoptic.beneficiario_solicitud b
					join markoptic.paises p on b.pais = p.id
                    WHERE b.id = @new_id)); 
    
    #se rellena el campo de dispositivo
	INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,19,(SELECT s.peticion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				   (SELECT s.peticion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
	
    #se rellena el campo de descripcion del dispositivo
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
		VALUES(@id,23,(SELECT s.descripcion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				   (SELECT s.descripcion
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
    
    #se rellena el campo de descripcion de la necesidad
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,9,(SELECT s.porque
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				 (SELECT s.porque
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
	
    #se rellena el campo de fotografia
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,10,(SELECT CONCAT(':',s.folio,'.jpg')
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				  (SELECT CONCAT(':',s.folio,'.jpg')
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));
    
    #se rellena el campo de la miniatura de la fotografia
    INSERT INTO cms.cmscouch_data_text(page_id,field_id,value,search_value)
    VALUES(@id,11,(SELECT CONCAT(':',s.folio,'-170x170.jpg')
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id),
				  (SELECT CONCAT(':',s.folio,'-170x170.jpg')
					FROM markoptic.beneficiario_solicitud b
                    join markoptic.solicitud s on b.id_solicitud = s.id
                    WHERE b.id = @new_id));

                    
	#se guarda el id de la pagina que le toco al solicitante
	UPDATE markoptic.solicitud s SET s.id_page = @id WHERE s.id = @new_sol;


END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `historias`
--

DROP TABLE IF EXISTS `historias`;
/*!50001 DROP VIEW IF EXISTS `historias`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `historias` AS SELECT 
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `sexo`,
 1 AS `edad`,
 1 AS `fecha_nac`,
 1 AS `direccion`,
 1 AS `colonia`,
 1 AS `cp`,
 1 AS `telefono`,
 1 AS `email`,
 1 AS `peticion`,
 1 AS `descripcion`,
 1 AS `porque`,
 1 AS `ciudad`,
 1 AS `estado`,
 1 AS `pais`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `localidades`
--

DROP TABLE IF EXISTS `localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localidades` (
  `id` int(10) unsigned NOT NULL,
  `id_region` smallint(6) unsigned NOT NULL DEFAULT '0',
  `id_pais` smallint(6) unsigned NOT NULL DEFAULT '0',
  `nombre` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`id_region`,`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `id` smallint(6) unsigned NOT NULL,
  `nombre` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pruebas`
--

DROP TABLE IF EXISTS `pruebas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pruebas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porque` text COLLATE utf8_spanish_ci,
  `dispositivo` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `regiones`
--

DROP TABLE IF EXISTS `regiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regiones` (
  `id` smallint(6) unsigned NOT NULL,
  `id_pais` smallint(6) unsigned NOT NULL DEFAULT '0',
  `nombre` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `peticion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `porque` text COLLATE utf8_spanish_ci NOT NULL,
  `medio_difusion` text COLLATE utf8_spanish_ci NOT NULL,
  `adjunto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=385 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tutor_beneficiario`
--

DROP TABLE IF EXISTS `tutor_beneficiario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor_beneficiario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parentesco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_beneficiario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `historias`
--

/*!50001 DROP VIEW IF EXISTS `historias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `historias` AS select `b`.`nombre` AS `nombre`,`b`.`apellido` AS `apellido`,`b`.`sexo` AS `sexo`,`b`.`edad` AS `edad`,`b`.`fecha_nac` AS `fecha_nac`,`b`.`direccion` AS `direccion`,`b`.`colonia` AS `colonia`,`b`.`cp` AS `cp`,`b`.`telefono` AS `telefono`,`b`.`email` AS `email`,`s`.`peticion` AS `peticion`,`s`.`descripcion` AS `descripcion`,`s`.`porque` AS `porque`,`l`.`nombre` AS `ciudad`,`r`.`nombre` AS `estado`,`p`.`nombre` AS `pais` from ((((`beneficiario_solicitud` `b` join `solicitud` `s` on((`b`.`id_solicitud` = `s`.`id`))) join `localidades` `l` on((`b`.`ciudad` = `l`.`id`))) join `regiones` `r` on((`b`.`estado` = `r`.`id`))) join `paises` `p` on((`b`.`pais` = `p`.`id`))) */;
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

-- Dump completed on 2016-03-10 17:04:27
