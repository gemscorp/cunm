-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cunm
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.14.04.1

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Rural'),(2,'Industrial');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_group`
--

DROP TABLE IF EXISTS `asset_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_group`
--

LOCK TABLES `asset_group` WRITE;
/*!40000 ALTER TABLE `asset_group` DISABLE KEYS */;
INSERT INTO `asset_group` VALUES (1,'&lt; 100,000'),(2,'100,101 - 500,000');
/*!40000 ALTER TABLE `asset_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balancesheet`
--

DROP TABLE IF EXISTS `balancesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balancesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sub_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balancesheet`
--

LOCK TABLES `balancesheet` WRITE;
/*!40000 ALTER TABLE `balancesheet` DISABLE KEYS */;
INSERT INTO `balancesheet` VALUES (1,NULL,1,1,'Test'),(2,NULL,2,2,'Bad Loans'),(3,NULL,1,1,'Line Item 2'),(4,NULL,1,1,'Line Item 3'),(5,NULL,2,3,'Have Less Member loans');
/*!40000 ALTER TABLE `balancesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balancesheet_group`
--

DROP TABLE IF EXISTS `balancesheet_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balancesheet_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balancesheet_group`
--

LOCK TABLES `balancesheet_group` WRITE;
/*!40000 ALTER TABLE `balancesheet_group` DISABLE KEYS */;
INSERT INTO `balancesheet_group` VALUES (1,NULL,'INCOME'),(2,NULL,'Loans'),(3,NULL,'Othert'),(4,NULL,'alpha');
/*!40000 ALTER TABLE `balancesheet_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balancesheet_sub_group`
--

DROP TABLE IF EXISTS `balancesheet_sub_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balancesheet_sub_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balancesheet_sub_group`
--

LOCK TABLES `balancesheet_sub_group` WRITE;
/*!40000 ALTER TABLE `balancesheet_sub_group` DISABLE KEYS */;
INSERT INTO `balancesheet_sub_group` VALUES (1,1,NULL,'Major'),(2,2,NULL,'Longterm'),(3,2,NULL,'Shorterm');
/*!40000 ALTER TABLE `balancesheet_sub_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Thailand'),(2,'Sri Lanka'),(3,'Global (No Country Specific)');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `federation`
--

DROP TABLE IF EXISTS `federation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `federation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `federation`
--

LOCK TABLES `federation` WRITE;
/*!40000 ALTER TABLE `federation` DISABLE KEYS */;
INSERT INTO `federation` VALUES (1,'FSCT',1);
/*!40000 ALTER TABLE `federation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `primary_union`
--

DROP TABLE IF EXISTS `primary_union`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `primary_union` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `federation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `primary_union`
--

LOCK TABLES `primary_union` WRITE;
/*!40000 ALTER TABLE `primary_union` DISABLE KEYS */;
INSERT INTO `primary_union` VALUES (1,'Farmers Credit Union in Bangkapi',1);
/*!40000 ALTER TABLE `primary_union` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_age`
--

DROP TABLE IF EXISTS `pu_age`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_age` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `group1` int(11) DEFAULT NULL,
  `group2` int(11) DEFAULT NULL,
  `group3` int(11) DEFAULT NULL,
  `group4` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_age`
--

LOCK TABLES `pu_age` WRITE;
/*!40000 ALTER TABLE `pu_age` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_age` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_balancesheet`
--

DROP TABLE IF EXISTS `pu_balancesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_balancesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `balancesheet_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_balancesheet`
--

LOCK TABLES `pu_balancesheet` WRITE;
/*!40000 ALTER TABLE `pu_balancesheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_balancesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_datasheet`
--

DROP TABLE IF EXISTS `pu_datasheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_datasheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `asset_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_datasheet`
--

LOCK TABLES `pu_datasheet` WRITE;
/*!40000 ALTER TABLE `pu_datasheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_datasheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_gender`
--

DROP TABLE IF EXISTS `pu_gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `male` int(11) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_gender`
--

LOCK TABLES `pu_gender` WRITE;
/*!40000 ALTER TABLE `pu_gender` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_less_member_service`
--

DROP TABLE IF EXISTS `pu_less_member_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_less_member_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `male` int(11) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  `savings` int(11) DEFAULT NULL,
  `outstanding` int(11) DEFAULT NULL,
  `total_granted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_less_member_service`
--

LOCK TABLES `pu_less_member_service` WRITE;
/*!40000 ALTER TABLE `pu_less_member_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_less_member_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_market`
--

DROP TABLE IF EXISTS `pu_market`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_market` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `farmer` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL,
  `microb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_market`
--

LOCK TABLES `pu_market` WRITE;
/*!40000 ALTER TABLE `pu_market` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_market` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_operations`
--

DROP TABLE IF EXISTS `pu_operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `males` int(11) DEFAULT NULL,
  `females` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_operations`
--

LOCK TABLES `pu_operations` WRITE;
/*!40000 ALTER TABLE `pu_operations` DISABLE KEYS */;
INSERT INTO `pu_operations` VALUES (3,1,10,10);
/*!40000 ALTER TABLE `pu_operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_operations_area`
--

DROP TABLE IF EXISTS `pu_operations_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_operations_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_operations_area`
--

LOCK TABLES `pu_operations_area` WRITE;
/*!40000 ALTER TABLE `pu_operations_area` DISABLE KEYS */;
INSERT INTO `pu_operations_area` VALUES (2,1,1);
/*!40000 ALTER TABLE `pu_operations_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_profile`
--

DROP TABLE IF EXISTS `pu_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `establishment` date DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_profile`
--

LOCK TABLES `pu_profile` WRITE;
/*!40000 ALTER TABLE `pu_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_service_distribution`
--

DROP TABLE IF EXISTS `pu_service_distribution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_service_distribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `male` int(11) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  `youth` int(11) DEFAULT NULL,
  `none_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_service_distribution`
--

LOCK TABLES `pu_service_distribution` WRITE;
/*!40000 ALTER TABLE `pu_service_distribution` DISABLE KEYS */;
/*!40000 ALTER TABLE `pu_service_distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `federation_id` int(11) NOT NULL,
  `primary_union_id` int(11) NOT NULL DEFAULT '0',
  `country_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@aaccu.coop','*4AFE947663BFA0844F4C0F8B53B7ABF95379FB44',0,1,'2014-06-01 22:00:53',0,0,0),(2,'fsct@aaccu.coop','*D41381335C614615CCB6F68D12CE00E9309AF666',1,1,'2014-06-01 19:42:45',1,0,1),(3,'farmers@aaccu.coop','*21C69224FD52649343758BC0F110775F5066D101',2,1,'2014-06-01 21:58:27',1,1,1);
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

-- Dump completed on 2014-06-01 22:01:53
