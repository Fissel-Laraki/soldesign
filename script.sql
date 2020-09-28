-- MariaDB dump 10.17  Distrib 10.5.5-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: soldesign
-- ------------------------------------------------------
-- Server version	10.5.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accessory`
--

DROP TABLE IF EXISTS `accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessory` (
  `acid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`acid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessory`
--

LOCK TABLES `accessory` WRITE;
/*!40000 ALTER TABLE `accessory` DISABLE KEYS */;
INSERT INTO `accessory` VALUES (1,'peigne'),(2,'croisillons');
/*!40000 ALTER TABLE `accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adress` (
  `adid` int(7) NOT NULL AUTO_INCREMENT,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(6) DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */;
INSERT INTO `adress` VALUES (3,'90 avenue gabriel','Paris',75016,'France'),(4,'90 avenue gabriele','Paris',75018,'France'),(5,'la rue de jean pierre','bordeaux',0,'France'),(6,'jean rue pierre','paris',75010,'France'),(7,'num de ma rue 2','Paris',75000,'France'),(8,'num de ma rue','Paris',75000,'France'),(9,'avenue balbala','Gennevilliers ',92239,'France');
/*!40000 ALTER TABLE `adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (19,'Toutes',''),(20,'Sol exterieur','sol_exterieur.jpg'),(21,'Sol intérieur','sol_interieur.jpg'),(22,'Mural exterieur','mural_exterieur.jpg'),(23,'Mural intérieur','mural_interieur.jpg'),(24,'Dalle','dalle.jpg');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characteristic`
--

DROP TABLE IF EXISTS `characteristic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characteristic` (
  `chid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`chid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characteristic`
--

LOCK TABLES `characteristic` WRITE;
/*!40000 ALTER TABLE `characteristic` DISABLE KEYS */;
INSERT INTO `characteristic` VALUES (1,'dimensions','cm²'),(2,'épaisseur','mm'),(3,'conditionnement','m²/colis'),(4,'matière',NULL),(5,'destination',NULL),(6,'type de pose',NULL),(7,'compatibilité sol chauffant',NULL),(8,'type de revêtement associé',NULL),(9,'origine',NULL),(10,'rendement',NULL),(12,'finition','');
/*!40000 ALTER TABLE `characteristic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumable`
--

DROP TABLE IF EXISTS `consumable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumable` (
  `coid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumable`
--

LOCK TABLES `consumable` WRITE;
/*!40000 ALTER TABLE `consumable` DISABLE KEYS */;
INSERT INTO `consumable` VALUES (1,'colles'),(2,'joints'),(3,'epoxy'),(4,'tantos');
/*!40000 ALTER TABLE `consumable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `format`
--

DROP TABLE IF EXISTS `format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `format` (
  `fid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `format`
--

LOCK TABLES `format` WRITE;
/*!40000 ALTER TABLE `format` DISABLE KEYS */;
INSERT INTO `format` VALUES (1,'Tous'),(2,'30x30'),(3,'60x30'),(4,'40x30'),(5,'40x10');
/*!40000 ALTER TABLE `format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lnk_orders_product`
--

DROP TABLE IF EXISTS `lnk_orders_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lnk_orders_product` (
  `oid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  KEY `oid` (`oid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lnk_orders_product`
--

LOCK TABLES `lnk_orders_product` WRITE;
/*!40000 ALTER TABLE `lnk_orders_product` DISABLE KEYS */;
INSERT INTO `lnk_orders_product` VALUES (1,31,2,NULL),(1,32,1,NULL),(2,32,2,NULL),(2,33,1,NULL),(3,32,2,NULL),(3,33,1,NULL),(4,32,2,NULL),(4,33,1,NULL),(5,32,2,NULL),(5,33,1,NULL),(6,32,2,NULL),(6,33,1,NULL),(7,32,2,NULL),(7,33,1,NULL),(8,32,2,NULL),(8,33,1,NULL),(9,32,2,NULL),(9,33,1,NULL),(10,32,2,NULL),(10,33,1,NULL),(11,32,2,NULL),(11,33,1,NULL),(12,32,2,NULL),(12,33,1,NULL),(13,32,2,NULL),(13,33,1,NULL),(14,32,2,NULL),(14,33,1,NULL),(15,32,2,NULL),(15,33,1,NULL),(16,32,2,NULL),(16,33,1,NULL),(17,32,2,NULL),(17,33,1,NULL),(22,30,86,NULL),(23,32,2,NULL),(23,33,2,NULL),(24,33,8,NULL),(24,32,4,NULL),(25,32,2,NULL),(25,33,2,NULL),(26,32,0,NULL),(27,32,0,NULL),(27,31,1,NULL),(27,33,0,NULL),(28,32,4,NULL),(28,31,2,NULL),(28,33,2,NULL),(29,37,8,NULL),(30,37,4,NULL),(31,31,2,NULL),(32,31,2,NULL),(33,31,1,NULL),(34,31,1,NULL),(35,31,1,NULL),(36,31,1,NULL),(37,31,2,NULL),(38,31,1,NULL),(39,36,2,NULL),(39,37,2,NULL),(39,41,3,NULL),(40,192,6,NULL),(40,191,2,NULL),(41,33,3,NULL),(41,37,4,NULL),(42,37,3,NULL),(42,33,3,NULL),(43,31,1,NULL),(43,32,1,NULL),(44,33,1,NULL),(45,32,4,NULL),(46,39,2,NULL),(47,32,21,NULL),(48,39,15,NULL),(49,30,1,NULL),(50,30,2,NULL),(50,31,1,NULL),(51,31,4,NULL),(51,30,4,NULL),(52,32,20,NULL),(52,30,5,NULL),(52,31,6,NULL),(52,38,1,NULL),(52,43,1,NULL),(52,42,1,NULL),(52,33,13,NULL),(53,30,1,NULL),(53,31,1,NULL),(53,32,2,NULL),(53,33,2,NULL),(53,39,1,NULL),(59,31,2,NULL),(59,240,1,NULL),(63,32,1,NULL),(63,36,1,NULL),(64,32,4,NULL),(101,32,6,NULL),(101,31,4,NULL),(102,32,1,NULL),(103,33,1,NULL),(104,32,1,NULL),(113,37,0,NULL),(113,33,0,NULL),(114,32,1,NULL),(115,32,1,NULL),(116,31,2,NULL),(116,32,1,NULL),(116,33,2,NULL),(116,39,1,NULL),(117,242,2,NULL),(118,31,1,NULL),(118,242,1,NULL),(119,32,2,NULL),(119,31,6,NULL),(120,31,10,50),(121,247,1,143),(121,251,23,80),(122,248,2,90),(122,33,3,107),(122,244,2,90),(122,32,1,62),(123,33,1,107),(123,32,1,62),(123,30,1,30),(123,38,10,105),(125,257,2,50),(126,5,2,19),(126,4,1,30),(126,8,2,122),(127,1,15,80);
/*!40000 ALTER TABLE `lnk_orders_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lnk_product_characteristic`
--

DROP TABLE IF EXISTS `lnk_product_characteristic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lnk_product_characteristic` (
  `pid` int(11) NOT NULL,
  `chid` int(11) NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pid`,`chid`),
  KEY `chid` (`chid`),
  CONSTRAINT `lnk_product_characteristic_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE,
  CONSTRAINT `lnk_product_characteristic_ibfk_2` FOREIGN KEY (`chid`) REFERENCES `characteristic` (`chid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lnk_product_characteristic`
--

LOCK TABLES `lnk_product_characteristic` WRITE;
/*!40000 ALTER TABLE `lnk_product_characteristic` DISABLE KEYS */;
INSERT INTO `lnk_product_characteristic` VALUES (3,2,'3'),(3,4,'bois'),(3,9,'France'),(3,12,'naturel mat'),(4,6,'plat'),(4,9,'Espagne'),(4,10,'excellent'),(5,1,''),(5,10,'colle bien'),(6,9,'France'),(6,12,'mur'),(7,5,'sol'),(7,7,'fqdsfdsq'),(7,9,'fqsfq'),(8,5,'sol'),(8,7,'fqdsfdsq'),(8,9,'fqsfq'),(247,5,'lolo'),(247,10,'rouge'),(248,4,'cookie'),(248,8,'coco'),(248,10,'toto'),(250,2,'fifol'),(250,3,'plopi'),(250,5,'pipo'),(250,7,'chiche'),(250,9,'suede'),(250,10,'bonne'),(251,1,'20x320'),(251,2,'3'),(251,3,'5.2'),(252,1,'40x50'),(252,5,'Exterieur'),(252,9,'Maroc');
/*!40000 ALTER TABLE `lnk_product_characteristic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aid` int(10) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `aid` (`aid`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `product` (`pid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (44,'baltimore_final2.jpg',31),(45,'baltimore_detalle_final.jpg',32),(46,'baltimore_final2.jpg',33),(53,'baltimore_detalle_final.jpg',36),(54,'Baltimore-Perla.jpg',36),(55,'Baltimore-Marengo.jpg',36),(56,'Baltimore-Gris.jpg',36),(57,'baltimore_detalle_final.jpg',37),(58,'baltimore_final2.jpg',37),(59,'Baltimore-Taupe.jpg',37),(60,'Baltimore-Perla.jpg',37),(61,'Baltimore-Marengo.jpg',37),(62,'Baltimore-Gris.jpg',37),(77,'Ambiance Noon.jpg',242),(87,'MERAKI_BASE_ROSA_LINE_ROSA.jpg',240),(89,'Ambiance Noon.jpg',240),(90,'Ambiance Nashville.jpg',240),(98,'AMBIENTE-Zurbaran.jpg',240),(99,'AMBIENTE_Zurbaran-Vainilla.jpg',240),(106,'Ambiance Nashville.jpg',233),(107,'Ambiance Metallique.jpg',233),(108,'Ambiance Maya.jpg',233),(116,'',243),(118,'',245),(119,'',246),(120,'',247),(121,'Ambiance Turin.jpg',248),(122,'Ambiance Noon.jpg',248),(124,'',249),(125,'',250),(126,'MERAKI_BASE_ROSA_LINE_ROSA.jpg',250),(127,'AMBIENTE-Zurbaran.jpg',250),(128,'AMBIENTE_Zurbaran-Vainilla.jpg',250),(129,'AMBIENTE_TOSCANA_BACKSTAGE-_BEIGE.jpg',250),(130,'Ambiente_Toscana_Backstage.jpg',250),(132,'Ambiance Uptown.jpg',251),(133,'Ambiance Uptown 2.jpg',251),(134,'Ambiance Turin.jpg',251),(135,'Ambiance Nashville.jpg',251),(136,'',252),(140,'',253),(141,'',254),(142,'',255),(143,'',256),(144,'',257),(146,'Ambiance Baltimore.jpg',3),(147,'Baltimore-Perla.jpg',3),(148,'Baltimore taille.png',3),(149,'Baltimore-Taupe.jpg',3),(150,'BLTM GR.jpg',3),(151,'BLTM MRG.jpg',3),(152,'AMB_Bondi_triangle_Negro_Mate.jpg',4),(153,'Amb_Bondi_Triangle_ocean.jpg',4),(154,'Amb_Bondi_Triangle_Pink.jpg',4),(155,'AMB_Bondi_Triangle_Rosa.jpg',4),(156,'AMB_Chicago_Black.jpg',5),(157,'AMB_Chicago_Gun.jpg',5),(164,'Ambiance Baltimore.jpg',7),(165,'baltimore_detalle_final.jpg',7),(166,'baltimore_final2.jpg',7),(167,'Ambiance Baltimore.jpg',8),(168,'baltimore_detalle_final.jpg',8),(169,'baltimore_final2.jpg',8);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `total` int(15) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'2020-08-05 17:49:35',173,NULL),(2,2,'2020-08-05 17:50:42',257,NULL),(3,2,'2020-08-05 18:00:00',257,NULL),(4,2,'2020-08-05 18:00:39',257,NULL),(5,2,'2020-08-05 18:19:43',257,NULL),(6,2,'2020-08-05 18:19:52',257,NULL),(7,2,'2020-08-05 18:19:56',257,NULL),(8,2,'2020-08-05 18:22:43',257,NULL),(9,2,'2020-08-05 18:23:08',257,NULL),(10,2,'2020-08-05 18:24:18',257,NULL),(11,2,'2020-08-05 18:24:39',257,NULL),(12,2,'2020-08-05 18:30:36',257,NULL),(13,2,'2020-08-05 18:34:15',257,NULL),(14,2,'2020-08-05 18:37:50',257,NULL),(15,2,'2020-08-05 18:38:42',257,NULL),(16,2,'2020-08-05 18:39:01',257,NULL),(17,2,'2020-08-05 18:41:13',257,NULL),(18,2,'2020-08-05 18:42:36',0,NULL),(19,2,'2020-08-05 18:44:46',0,NULL),(20,2,'2020-08-05 18:45:08',0,NULL),(21,2,'2020-08-05 18:46:12',0,NULL),(22,2,'2020-08-06 21:43:25',59,NULL),(23,2,'2020-08-06 21:44:05',257,NULL),(24,2,'2020-08-06 21:44:30',257,NULL),(25,2,'2020-08-06 22:51:02',169,NULL),(26,2,'2020-08-07 20:58:15',0,NULL),(27,2,'2020-08-07 20:58:51',50,NULL),(28,2,'2020-08-07 21:21:09',560,NULL),(29,2,'2020-08-12 22:38:06',669,NULL),(30,2,'2020-08-13 13:56:42',335,NULL),(31,2,'2020-08-13 17:39:12',100,'traitée'),(32,2,'2020-08-13 17:48:51',100,'traitée'),(33,2,'2020-08-13 17:50:37',50,'traitée'),(34,2,'2020-08-13 17:51:27',50,'traitée'),(35,2,'2020-08-13 17:52:56',50,'traitée'),(36,2,'2020-08-13 17:53:56',50,'traitée'),(37,2,'2020-08-13 17:54:23',100,'Traitée'),(38,2,'2020-08-13 17:55:18',50,'Traitée'),(39,2,'2020-08-13 21:26:40',438,'Traitée'),(40,2,'2020-08-13 23:02:43',1200,'Traitée'),(41,1,'2020-08-14 16:57:35',568,'Traitée'),(42,1,'2020-08-14 16:59:17',506,'Traitée'),(43,2,'2020-08-14 19:30:22',112,'Traitée'),(44,6,'2020-08-14 20:24:38',107,'Traitée'),(45,5,'2020-08-14 20:58:26',246,'Traitée'),(46,2,'2020-08-16 18:10:41',147,'Traitée'),(47,2,'2020-08-16 18:12:25',646,'Traitée'),(48,2,'2020-08-16 18:14:23',1575,'Traitée'),(49,1,'2020-08-16 20:01:43',30,'Traitée'),(50,1,'2020-08-16 20:21:37',109,'Traitée'),(51,5,'2020-08-17 16:38:14',318,'Traitée'),(52,5,'2020-08-17 16:52:05',3386,'Traitée'),(53,5,'2020-08-17 17:28:23',522,'Traitée'),(54,5,'2020-08-17 17:34:57',0,'Traitée'),(55,5,'2020-08-17 17:34:58',0,'Traitée'),(56,5,'2020-08-17 17:35:03',0,'Traitée'),(57,5,'2020-08-17 17:35:59',0,'Traitée'),(58,5,'2020-08-17 17:36:05',0,'Traitée'),(59,8,'2020-08-17 17:36:13',180,'Traitée'),(60,5,'2020-08-17 17:36:33',0,'Traitée'),(61,5,'2020-08-17 17:36:48',0,'Traitée'),(62,5,'2020-08-17 17:36:54',0,'Traitée'),(63,8,'2020-08-17 17:49:00',62,'En cours'),(64,5,'2020-08-17 18:01:27',246,'Traitée'),(65,5,'2020-08-17 18:02:03',0,'Traitée'),(66,5,'2020-08-17 18:02:10',0,'Traitée'),(67,5,'2020-08-17 18:02:15',0,'En cours'),(68,5,'2020-08-17 18:02:22',0,'En cours'),(69,5,'2020-08-17 18:02:48',0,'En cours'),(70,5,'2020-08-17 18:15:05',0,'En cours'),(71,5,'2020-08-17 18:15:09',0,'En cours'),(72,5,'2020-08-17 18:15:14',0,'En cours'),(73,5,'2020-08-17 18:15:27',0,'En cours'),(74,5,'2020-08-17 18:15:34',0,'En cours'),(75,5,'2020-08-17 18:16:08',0,'En cours'),(76,5,'2020-08-17 18:16:14',0,'En cours'),(77,5,'2020-08-17 18:16:18',0,'En cours'),(78,5,'2020-08-17 18:16:22',0,'En cours'),(79,5,'2020-08-17 18:18:52',0,'En cours'),(80,5,'2020-08-17 18:18:56',0,'En cours'),(81,5,'2020-08-17 18:19:02',0,'En cours'),(82,5,'2020-08-17 18:19:23',0,'En cours'),(83,5,'2020-08-17 18:19:30',0,'En cours'),(84,5,'2020-08-17 18:19:47',0,'En cours'),(85,5,'2020-08-17 18:19:50',0,'En cours'),(86,5,'2020-08-17 18:20:01',0,'En cours'),(87,5,'2020-08-17 18:20:06',0,'En cours'),(88,5,'2020-08-17 18:20:09',0,'En cours'),(89,5,'2020-08-17 18:20:28',0,'En cours'),(90,5,'2020-08-17 18:21:11',0,'En cours'),(91,5,'2020-08-17 18:21:23',0,'En cours'),(92,5,'2020-08-17 18:22:07',0,'En cours'),(93,5,'2020-08-17 18:22:12',0,'En cours'),(94,5,'2020-08-17 18:22:18',0,'En cours'),(95,5,'2020-08-17 18:22:47',0,'En cours'),(96,5,'2020-08-17 18:23:02',0,'En cours'),(97,5,'2020-08-17 18:23:08',0,'En cours'),(98,5,'2020-08-17 18:23:33',0,'En cours'),(99,5,'2020-08-17 18:23:47',0,'En cours'),(100,5,'2020-08-17 18:23:54',0,'En cours'),(101,2,'2020-08-19 19:55:00',569,'Traitée'),(102,2,'2020-08-19 19:57:03',62,'Traitée'),(103,2,'2020-08-19 19:57:19',107,'Traitée'),(104,2,'2020-08-19 19:57:41',62,'Traitée'),(105,2,'2020-08-19 19:58:28',0,'Traitée'),(106,2,'2020-08-19 19:59:09',0,'Traitée'),(107,2,'2020-08-19 19:59:19',0,'Traitée'),(108,2,'2020-08-19 19:59:49',0,'Traitée'),(109,2,'2020-08-19 19:59:52',0,'Traitée'),(110,2,'2020-08-19 20:00:17',0,'Traitée'),(111,2,'2020-08-19 20:00:27',0,'Traitée'),(112,2,'2020-08-19 20:00:49',0,'Traitée'),(113,2,'2020-08-19 20:06:11',0,'Traitée'),(114,2,'2020-08-21 18:35:17',62,'Traitée'),(115,14,'2020-08-21 22:00:59',62,'En cours'),(116,14,'2020-08-25 13:44:02',481,'En cours'),(117,14,'2020-08-25 19:17:56',126,'En cours'),(118,14,'2020-08-25 20:18:36',113,'En cours'),(119,2,'2020-08-28 16:56:10',423,'En cours'),(120,2,'2020-08-28 16:56:31',500,'En cours'),(121,2,'2020-09-03 17:59:03',1983,'En cours'),(122,2,'2020-09-05 19:17:50',743,'En cours'),(123,15,'2020-09-06 13:32:06',1248,'En cours'),(124,15,'2020-09-06 13:32:24',0,'En cours'),(125,2,'2020-09-06 20:18:12',100,'En cours'),(126,2,'2020-09-06 22:22:56',312,'Traitée'),(127,2,'2020-09-17 12:16:52',1200,'Traitée');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(5) NOT NULL,
  `promotion` int(4) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `acid` int(11) DEFAULT NULL,
  `coid` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT 1,
  `deleted` tinyint(1) DEFAULT 0,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `sid` (`sid`),
  KEY `cid` (`cid`),
  KEY `tid` (`tid`),
  KEY `acid` (`acid`),
  KEY `coid` (`coid`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `serie` (`sid`) ON DELETE CASCADE,
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE,
  CONSTRAINT `product_ibfk_3` FOREIGN KEY (`tid`) REFERENCES `type` (`tid`) ON DELETE CASCADE,
  CONSTRAINT `product_ibfk_4` FOREIGN KEY (`acid`) REFERENCES `accessory` (`acid`) ON DELETE CASCADE,
  CONSTRAINT `product_ibfk_5` FOREIGN KEY (`coid`) REFERENCES `consumable` (`coid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'baltimore perla','30x30',100,20,145,1,22,NULL,NULL,'Baltimore-Perla.jpg',1,0,3),(2,'baltimore perla','30x30',100,20,160,1,22,NULL,NULL,'Baltimore-Perla.jpg',1,1,3),(3,'baltimore perla','30x30',100,20,160,1,22,NULL,NULL,'Baltimore-Perla.jpg',1,1,3),(4,'peigne 1','30x30',30,0,8,NULL,NULL,1,NULL,'amb_statuario_2.jpg',1,0,1),(5,'colle 1','30x30',20,5,196,NULL,NULL,NULL,1,'Amb_Bondi_Triangle_Blue.jpg',1,0,2),(6,'test','30x30',100,0,120,1,22,NULL,NULL,'BLTM MRG.jpg',1,0,3),(7,'raezrez','30x30',122,0,3213,1,20,NULL,NULL,'BLTM GR.jpg',1,0,3),(8,'raezrez','30x30',122,0,3209,1,20,NULL,NULL,'BLTM GR.jpg',1,0,3);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serie`
--

DROP TABLE IF EXISTS `serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serie` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serie`
--

LOCK TABLES `serie` WRITE;
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` VALUES (1,'baltimore'),(4,'bobom'),(5,'Toutes');
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `tid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'accessory'),(2,'consumable'),(3,'tile');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(3) DEFAULT 3,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(16) DEFAULT NULL,
  `adid` int(7) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `adid` (`adid`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`adid`) REFERENCES `adress` (`adid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'laraki@gmail.com','laraki','b4518cfa2a3501eb3086f489823f898fcdac275b',3,NULL,0,NULL),(2,'fissel@gmail.com','laraki','b4518cfa2a3501eb3086f489823f898fcdac275b',3,NULL,0,NULL),(3,'admin@gmail.com','admin','f865b53623b121fd34ee5426c792e5c33af8c227',2,NULL,0,NULL),(4,'rzae@rzae.com','azerzaer','1696581c6fbda0a52fa9df29461726e1ee9bd384',NULL,'razereza',0,NULL),(5,'test@gmail.com','test','c5909e935558ef5664e5cbb6849f108e190ef527',NULL,'test',0,NULL),(6,'sofiane@jetaieu.zbi','soso','36a27136f3015f5ed0e1fe268ad7a93a985196cf',NULL,'kamui',0,NULL),(7,'laraka@gmail.com','lol','c5909e935558ef5664e5cbb6849f108e190ef527',NULL,'popo',0,NULL),(8,'laraki.fissel@gmail.com','LARAKI','fb894a0112242e285578a9b59e2ff34c7025f4c4',NULL,'abderrazak',0,NULL),(10,'fissel1@gmail.com','reazraez','c5909e935558ef5664e5cbb6849f108e190ef527',NULL,'raezraze',0,NULL),(13,'mohamed@gmail.com','mohamed','c5909e935558ef5664e5cbb6849f108e190ef527',3,'laraki',NULL,3),(14,'momo@gmail.com','mohamed','049eeb5ecc96e1e47e33c4b6822f2d3e828fe76c',3,'laraki',621323123,4),(15,'kamil.ayoub@gmail.com','kamil','cbfdac6008f9cab4083784cbd1874f76618d2a97',3,'ayoub',614132415,7),(16,'kamil.ayoub1@gmail.com','kamil','cbfdac6008f9cab4083784cbd1874f76618d2a97',3,'ayoub',614132412,8),(17,'koko@gmail.com','koko','c5909e935558ef5664e5cbb6849f108e190ef527',3,'lolo',921321321,9);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-28 22:51:07
