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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */;
INSERT INTO `adress` VALUES (3,'90 avenue gabriel','Paris',75016,'France'),(4,'90 avenue gabriel','Paris',75018,'France');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
-- Table structure for table `format`
--

DROP TABLE IF EXISTS `format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `format` (
  `fid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
  KEY `oid` (`oid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lnk_orders_product`
--

LOCK TABLES `lnk_orders_product` WRITE;
/*!40000 ALTER TABLE `lnk_orders_product` DISABLE KEYS */;
INSERT INTO `lnk_orders_product` VALUES (1,31,2),(1,32,1),(2,32,2),(2,33,1),(3,32,2),(3,33,1),(4,32,2),(4,33,1),(5,32,2),(5,33,1),(6,32,2),(6,33,1),(7,32,2),(7,33,1),(8,32,2),(8,33,1),(9,32,2),(9,33,1),(10,32,2),(10,33,1),(11,32,2),(11,33,1),(12,32,2),(12,33,1),(13,32,2),(13,33,1),(14,32,2),(14,33,1),(15,32,2),(15,33,1),(16,32,2),(16,33,1),(17,32,2),(17,33,1),(22,30,86),(23,32,2),(23,33,2),(24,33,8),(24,32,4),(25,32,2),(25,33,2),(26,32,0),(27,32,0),(27,31,1),(27,33,0),(28,32,4),(28,31,2),(28,33,2),(29,37,8),(30,37,4),(31,31,2),(32,31,2),(33,31,1),(34,31,1),(35,31,1),(36,31,1),(37,31,2),(38,31,1),(39,36,2),(39,37,2),(39,41,3),(40,192,6),(40,191,2),(41,33,3),(41,37,4),(42,37,3),(42,33,3),(43,31,1),(43,32,1),(44,33,1),(45,32,4),(46,39,2),(47,32,21),(48,39,15),(49,30,1),(50,30,2),(50,31,1),(51,31,4),(51,30,4),(52,32,20),(52,30,5),(52,31,6),(52,38,1),(52,43,1),(52,42,1),(52,33,13),(53,30,1),(53,31,1),(53,32,2),(53,33,2),(53,39,1),(59,31,2),(59,240,1),(63,32,1),(63,36,1),(64,32,4),(101,32,6),(101,31,4),(102,32,1),(103,33,1),(104,32,1),(113,37,0),(113,33,0),(114,32,1),(115,32,1),(116,31,2),(116,32,1),(116,33,2),(116,39,1);
/*!40000 ALTER TABLE `lnk_orders_product` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (44,'baltimore_final2.jpg',31),(45,'baltimore_detalle_final.jpg',32),(46,'baltimore_final2.jpg',33),(53,'baltimore_detalle_final.jpg',36),(54,'Baltimore-Perla.jpg',36),(55,'Baltimore-Marengo.jpg',36),(56,'Baltimore-Gris.jpg',36),(57,'baltimore_detalle_final.jpg',37),(58,'baltimore_final2.jpg',37),(59,'Baltimore-Taupe.jpg',37),(60,'Baltimore-Perla.jpg',37),(61,'Baltimore-Marengo.jpg',37),(62,'Baltimore-Gris.jpg',37),(65,'Ambiance Uptown.jpg',240),(68,'Ambiance Noon.jpg',240),(75,'Ambiance Uptown 2.jpg',242),(76,'Ambiance Turin.jpg',242),(77,'Ambiance Noon.jpg',242);
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
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'2020-08-05 17:49:35',173,NULL),(2,2,'2020-08-05 17:50:42',257,NULL),(3,2,'2020-08-05 18:00:00',257,NULL),(4,2,'2020-08-05 18:00:39',257,NULL),(5,2,'2020-08-05 18:19:43',257,NULL),(6,2,'2020-08-05 18:19:52',257,NULL),(7,2,'2020-08-05 18:19:56',257,NULL),(8,2,'2020-08-05 18:22:43',257,NULL),(9,2,'2020-08-05 18:23:08',257,NULL),(10,2,'2020-08-05 18:24:18',257,NULL),(11,2,'2020-08-05 18:24:39',257,NULL),(12,2,'2020-08-05 18:30:36',257,NULL),(13,2,'2020-08-05 18:34:15',257,NULL),(14,2,'2020-08-05 18:37:50',257,NULL),(15,2,'2020-08-05 18:38:42',257,NULL),(16,2,'2020-08-05 18:39:01',257,NULL),(17,2,'2020-08-05 18:41:13',257,NULL),(18,2,'2020-08-05 18:42:36',0,NULL),(19,2,'2020-08-05 18:44:46',0,NULL),(20,2,'2020-08-05 18:45:08',0,NULL),(21,2,'2020-08-05 18:46:12',0,NULL),(22,2,'2020-08-06 21:43:25',59,NULL),(23,2,'2020-08-06 21:44:05',257,NULL),(24,2,'2020-08-06 21:44:30',257,NULL),(25,2,'2020-08-06 22:51:02',169,NULL),(26,2,'2020-08-07 20:58:15',0,NULL),(27,2,'2020-08-07 20:58:51',50,NULL),(28,2,'2020-08-07 21:21:09',560,NULL),(29,2,'2020-08-12 22:38:06',669,NULL),(30,2,'2020-08-13 13:56:42',335,NULL),(31,2,'2020-08-13 17:39:12',100,'traitée'),(32,2,'2020-08-13 17:48:51',100,'traitée'),(33,2,'2020-08-13 17:50:37',50,'traitée'),(34,2,'2020-08-13 17:51:27',50,'traitée'),(35,2,'2020-08-13 17:52:56',50,'traitée'),(36,2,'2020-08-13 17:53:56',50,'traitée'),(37,2,'2020-08-13 17:54:23',100,'Traitée'),(38,2,'2020-08-13 17:55:18',50,'Traitée'),(39,2,'2020-08-13 21:26:40',438,'Traitée'),(40,2,'2020-08-13 23:02:43',1200,'Traitée'),(41,1,'2020-08-14 16:57:35',568,'Traitée'),(42,1,'2020-08-14 16:59:17',506,'Traitée'),(43,2,'2020-08-14 19:30:22',112,'Traitée'),(44,6,'2020-08-14 20:24:38',107,'Traitée'),(45,5,'2020-08-14 20:58:26',246,'Traitée'),(46,2,'2020-08-16 18:10:41',147,'Traitée'),(47,2,'2020-08-16 18:12:25',646,'Traitée'),(48,2,'2020-08-16 18:14:23',1575,'Traitée'),(49,1,'2020-08-16 20:01:43',30,'Traitée'),(50,1,'2020-08-16 20:21:37',109,'Traitée'),(51,5,'2020-08-17 16:38:14',318,'Traitée'),(52,5,'2020-08-17 16:52:05',3386,'Traitée'),(53,5,'2020-08-17 17:28:23',522,'Traitée'),(54,5,'2020-08-17 17:34:57',0,'Traitée'),(55,5,'2020-08-17 17:34:58',0,'Traitée'),(56,5,'2020-08-17 17:35:03',0,'Traitée'),(57,5,'2020-08-17 17:35:59',0,'Traitée'),(58,5,'2020-08-17 17:36:05',0,'Traitée'),(59,8,'2020-08-17 17:36:13',180,'Traitée'),(60,5,'2020-08-17 17:36:33',0,'Traitée'),(61,5,'2020-08-17 17:36:48',0,'Traitée'),(62,5,'2020-08-17 17:36:54',0,'Traitée'),(63,8,'2020-08-17 17:49:00',62,'En cours'),(64,5,'2020-08-17 18:01:27',246,'Traitée'),(65,5,'2020-08-17 18:02:03',0,'Traitée'),(66,5,'2020-08-17 18:02:10',0,'Traitée'),(67,5,'2020-08-17 18:02:15',0,'En cours'),(68,5,'2020-08-17 18:02:22',0,'En cours'),(69,5,'2020-08-17 18:02:48',0,'En cours'),(70,5,'2020-08-17 18:15:05',0,'En cours'),(71,5,'2020-08-17 18:15:09',0,'En cours'),(72,5,'2020-08-17 18:15:14',0,'En cours'),(73,5,'2020-08-17 18:15:27',0,'En cours'),(74,5,'2020-08-17 18:15:34',0,'En cours'),(75,5,'2020-08-17 18:16:08',0,'En cours'),(76,5,'2020-08-17 18:16:14',0,'En cours'),(77,5,'2020-08-17 18:16:18',0,'En cours'),(78,5,'2020-08-17 18:16:22',0,'En cours'),(79,5,'2020-08-17 18:18:52',0,'En cours'),(80,5,'2020-08-17 18:18:56',0,'En cours'),(81,5,'2020-08-17 18:19:02',0,'En cours'),(82,5,'2020-08-17 18:19:23',0,'En cours'),(83,5,'2020-08-17 18:19:30',0,'En cours'),(84,5,'2020-08-17 18:19:47',0,'En cours'),(85,5,'2020-08-17 18:19:50',0,'En cours'),(86,5,'2020-08-17 18:20:01',0,'En cours'),(87,5,'2020-08-17 18:20:06',0,'En cours'),(88,5,'2020-08-17 18:20:09',0,'En cours'),(89,5,'2020-08-17 18:20:28',0,'En cours'),(90,5,'2020-08-17 18:21:11',0,'En cours'),(91,5,'2020-08-17 18:21:23',0,'En cours'),(92,5,'2020-08-17 18:22:07',0,'En cours'),(93,5,'2020-08-17 18:22:12',0,'En cours'),(94,5,'2020-08-17 18:22:18',0,'En cours'),(95,5,'2020-08-17 18:22:47',0,'En cours'),(96,5,'2020-08-17 18:23:02',0,'En cours'),(97,5,'2020-08-17 18:23:08',0,'En cours'),(98,5,'2020-08-17 18:23:33',0,'En cours'),(99,5,'2020-08-17 18:23:47',0,'En cours'),(100,5,'2020-08-17 18:23:54',0,'En cours'),(101,2,'2020-08-19 19:55:00',569,'Traitée'),(102,2,'2020-08-19 19:57:03',62,'Traitée'),(103,2,'2020-08-19 19:57:19',107,'Traitée'),(104,2,'2020-08-19 19:57:41',62,'Traitée'),(105,2,'2020-08-19 19:58:28',0,'Traitée'),(106,2,'2020-08-19 19:59:09',0,'Traitée'),(107,2,'2020-08-19 19:59:19',0,'Traitée'),(108,2,'2020-08-19 19:59:49',0,'Traitée'),(109,2,'2020-08-19 19:59:52',0,'Traitée'),(110,2,'2020-08-19 20:00:17',0,'Traitée'),(111,2,'2020-08-19 20:00:27',0,'Traitée'),(112,2,'2020-08-19 20:00:49',0,'Traitée'),(113,2,'2020-08-19 20:06:11',0,'Traitée'),(114,2,'2020-08-21 18:35:17',62,'Traitée'),(115,14,'2020-08-21 22:00:59',62,'En cours'),(116,14,'2020-08-25 13:44:02',481,'En cours');
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
  `sid` int(10) NOT NULL,
  `cid` int(10) DEFAULT 1,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` tinyint(1) DEFAULT 1,
  `deleted` tinyint(1) DEFAULT 0,
  `thickness` int(3) DEFAULT NULL,
  `conditioning` float NOT NULL,
  `matter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `putType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frostRes` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `sid` (`sid`),
  KEY `cid` (`cid`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `serie` (`sid`) ON DELETE CASCADE,
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (30,'baltimore ','30x30',59,50,1,20,'Baltimore-Perla.jpg',1,0,0,0,'','','','','','',''),(31,'baltimore Maure','50x50',50,0,1,24,'Baltimore-Marengo.jpg',1,0,0,0,'','','','','','',''),(32,'bobom1','60x30',123,50,4,21,'Baltimore-Marengo.jpg',1,0,0,0,'','','','','','',''),(33,'bobom2','30x30',134,20,4,22,'Baltimore-Taupe.jpg',1,0,0,0,'','','','','','',''),(36,'test','2',100,100,1,21,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(37,'test3','4',123,50,1,21,'Baltimore-Perla.jpg',1,0,0,0,'','','','','','',''),(38,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(39,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(40,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(41,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(42,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(43,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(44,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(45,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(46,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(47,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(48,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(49,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(50,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(51,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(52,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(53,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(54,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(55,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(56,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(57,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(58,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(59,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(60,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(61,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(62,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(63,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(64,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(65,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(66,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(67,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(68,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(69,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(70,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(71,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(72,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(73,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(74,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(75,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(76,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(77,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(78,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(79,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(80,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(81,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(82,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(83,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(84,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(85,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(86,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(87,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(88,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(89,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(90,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(91,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(92,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(93,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(94,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(95,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(96,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(97,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(98,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(99,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(100,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(101,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(102,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(103,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(104,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(105,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(106,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(107,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(108,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(109,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(110,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(111,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(112,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(113,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(114,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(115,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(116,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(117,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(118,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(119,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(120,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(121,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(122,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(123,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(124,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(125,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(126,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(127,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(128,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(129,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(130,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(131,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(132,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(133,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(134,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(135,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(136,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(137,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(138,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(139,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(140,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(141,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(142,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(143,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(144,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(145,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(146,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(147,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(148,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(149,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(150,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(151,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(152,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(153,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(154,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(155,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(156,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(157,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(158,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(159,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(160,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(161,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(162,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(163,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(164,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(165,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(166,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(167,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(168,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(169,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(170,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(171,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(172,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(173,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(174,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(175,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(176,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(177,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(178,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(179,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(180,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(181,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(182,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(183,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(184,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(185,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(186,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(188,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(189,'test','30x30',150,30,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(190,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(191,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(192,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(193,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(194,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(195,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(196,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(197,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(198,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(199,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(200,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(201,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(202,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(203,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(204,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(205,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(206,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(207,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(208,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(209,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(210,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(211,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(212,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(213,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(214,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(215,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(216,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(217,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(218,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(219,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(220,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(221,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(222,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(223,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(224,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(225,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(226,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(227,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(228,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(229,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(230,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(231,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(232,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(233,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(234,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(235,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(236,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(237,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(238,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(239,'test','30x30',150,0,1,20,'Baltimore-Gris.jpg',1,0,0,0,'','','','','','',''),(240,'yyy','30x30',100,20,1,20,'Ambiance Kadence.jpg',1,0,0,0,'pate','orange','','','','',''),(242,'superArticle','60x30',70,10,1,21,'MERAKI_BASE_ROSA_LINE_ROSA.jpg',1,0,3,1,'pate','Bleu','Carré','Collé','tous','C','Oui');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'laraki@gmail.com','laraki','b4518cfa2a3501eb3086f489823f898fcdac275b',3,NULL,0,NULL),(2,'fissel@gmail.com','laraki','b4518cfa2a3501eb3086f489823f898fcdac275b',3,NULL,0,NULL),(3,'admin@gmail.com','admin','f865b53623b121fd34ee5426c792e5c33af8c227',2,NULL,0,NULL),(4,'rzae@rzae.com','azerzaer','1696581c6fbda0a52fa9df29461726e1ee9bd384',NULL,'razereza',0,NULL),(5,'test@gmail.com','test','c5909e935558ef5664e5cbb6849f108e190ef527',NULL,'test',0,NULL),(6,'sofiane@jetaieu.zbi','soso','36a27136f3015f5ed0e1fe268ad7a93a985196cf',NULL,'kamui',0,NULL),(7,'laraka@gmail.com','lol','c5909e935558ef5664e5cbb6849f108e190ef527',NULL,'popo',0,NULL),(8,'laraki.fissel@gmail.com','LARAKI','fb894a0112242e285578a9b59e2ff34c7025f4c4',NULL,'abderrazak',0,NULL),(10,'fissel1@gmail.com','reazraez','c5909e935558ef5664e5cbb6849f108e190ef527',NULL,'raezraze',0,NULL),(13,'mohamed@gmail.com','mohamed','c5909e935558ef5664e5cbb6849f108e190ef527',3,'laraki',NULL,3),(14,'momo@gmail.com','mohamed','049eeb5ecc96e1e47e33c4b6822f2d3e828fe76c',3,'laraki',621323123,4);
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

-- Dump completed on 2020-08-25 14:06:24
