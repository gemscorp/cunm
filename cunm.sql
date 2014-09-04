-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cunm
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Urban'),(2,'Rural'),(3,'Industrial');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_group`
--

LOCK TABLES `asset_group` WRITE;
/*!40000 ALTER TABLE `asset_group` DISABLE KEYS */;
INSERT INTO `asset_group` VALUES (1,'&lt; 100,000'),(2,'100,101 - 500,000'),(3,'500,001 - 1,000,000'),(4,'< 1,000,001');
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balancesheet`
--

LOCK TABLES `balancesheet` WRITE;
/*!40000 ALTER TABLE `balancesheet` DISABLE KEYS */;
INSERT INTO `balancesheet` VALUES (6,1,5,4,'Non-Earning Liquid Assets'),(7,2,5,4,'Liquid Investments (Short-Term Investment)'),(8,3,5,4,'Liquidity Reserves'),(9,1,5,5,'Loans Receivable - Current'),(10,1,5,6,'Loan Receivable - Restructured'),(11,2,5,6,'Loan Receivable - Past Due for 1-12 Months'),(12,3,5,6,'Total Loan Delinquent (1-12 Months)\n'),(13,1,5,7,'Loan Receivable - Past Due for >12 Months'),(14,2,5,7,'Loan Receivable - Loans in Litigation'),(15,3,5,7,'Total Loan Delinquent (>12 Months)'),(16,4,5,7,'Total Loan Delinquency'),(17,5,5,7,'Total Loan Portfolio'),(18,2,5,8,'Allowance for Probable Losses on Loans - >12 Months'),(19,1,5,8,'Allowance for Probable Losses on Loans - 1 to 12 Months'),(20,3,5,8,'Total Provision for Doubtful Loans'),(21,4,5,8,'Net Loans Outstanding'),(22,1,5,9,'Financial Investments'),(23,2,5,9,'Non-Financial Investments'),(24,3,5,9,'Total Investments'),(25,4,5,9,'Non-Earning Assets'),(27,5,5,9,'Problem Assets'),(28,6,5,9,'Total Assets'),(29,1,6,10,'Non-Interest Bearing Liabilities & Short-Term Payables'),(30,2,6,10,'Non-Interest Bearing Liabilities - Non-Short-Term Payables'),(31,3,6,10,'Total Non-Interest Bearing Liabilities'),(32,1,6,11,'Loans Payable - Short Term'),(33,2,6,11,'Loans Payable - Long Term'),(34,3,6,11,'Total External Credit '),(35,4,6,11,'Total Liabilities'),(36,1,7,12,'Member Share Capital'),(37,2,7,12,'Total Institutional Capital'),(38,3,7,12,'Transitory Capital'),(39,4,7,12,'Total Equities'),(40,5,7,12,'Total Liabilities & Equities');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balancesheet_group`
--

LOCK TABLES `balancesheet_group` WRITE;
/*!40000 ALTER TABLE `balancesheet_group` DISABLE KEYS */;
INSERT INTO `balancesheet_group` VALUES (5,NULL,'Assets'),(6,NULL,'Liabilities'),(7,NULL,'Equities');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balancesheet_sub_group`
--

LOCK TABLES `balancesheet_sub_group` WRITE;
/*!40000 ALTER TABLE `balancesheet_sub_group` DISABLE KEYS */;
INSERT INTO `balancesheet_sub_group` VALUES (4,5,NULL,'Liquidity'),(5,5,NULL,'Loan Outstanding'),(6,5,NULL,'Loan Delinquent (1-12 Months)'),(7,5,NULL,'Loan Delinquent (>12 Months)'),(8,5,NULL,'Allowance for Probable Losses on Loans'),(9,5,NULL,'Investments'),(10,6,NULL,'Savings Deposits'),(11,6,NULL,'External Credit'),(12,7,NULL,'Equities');
/*!40000 ALTER TABLE `balancesheet_sub_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `federation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter`
--

LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
INSERT INTO `chapter` VALUES (1,'Bangkok',1);
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (0,'Global (No Country Specific)'),(1,'Thailand'),(2,'Sri Lanka'),(4,'Bangladesh'),(5,'India'),(6,'Indonesia'),(7,'Philippines'),(8,'India');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `federation`
--

LOCK TABLES `federation` WRITE;
/*!40000 ALTER TABLE `federation` DISABLE KEYS */;
INSERT INTO `federation` VALUES (0,'No Federation',0),(1,'FSCT',1),(2,'CULT',1),(3,'CCULB',4),(4,'CUCO',6),(5,'PFCCO',7),(6,'NATCCO',7),(8,'MAFCOCS',8);
/*!40000 ALTER TABLE `federation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is`
--

DROP TABLE IF EXISTS `is`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sub_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is`
--

LOCK TABLES `is` WRITE;
/*!40000 ALTER TABLE `is` DISABLE KEYS */;
INSERT INTO `is` VALUES (6,1,5,4,'Loan Income'),(7,2,5,4,'Less: Insurance Premiums Paid on Loans'),(8,3,5,4,'Net Loan Income'),(9,1,5,5,'Total Liquid Investment Income'),(10,2,5,5,'Total Financial Investment Income'),(11,3,5,5,'Income from Non-Financial Investments'),(12,4,5,5,'Total Income'),(13,1,6,6,'Interest Cost on Savings Deposits'),(14,2,6,6,'Interest Cost on External Credit '),(15,3,6,6,'Total Financial Costs Excluding Interest Cost on Shares'),(16,4,6,6,'Gross Income Margin'),(17,1,7,7,'Personnel'),(18,2,7,7,'Governance'),(19,3,7,7,'Marketing'),(20,4,7,7,'Depreciation'),(21,5,7,7,'Administration'),(22,6,7,7,'Total Operating Expenses before Probable Loss on Delinquent Loans'),(23,7,7,7,'Provision for Probable Losses on Loans'),(24,8,7,7,'Total Operating Expenses'),(25,9,7,7,'Net Income Before other Income/Expense'),(26,10,7,7,'Other Income/Expense'),(27,11,7,7,'Net Income'),(28,1,8,8,'General Reserve Fund'),(29,2,8,8,'Interest Cost on Shares'),(30,3,8,8,'Patronage Refund'),(31,4,8,8,'Other Statutory Accounts'),(32,5,8,8,'Undivided Net Income'),(33,6,8,8,'Total'),(34,1,9,9,'Total Charge Off Delinquent Loans'),(35,2,9,9,'Quarterly Loan Charge Offs'),(36,3,9,9,'Accumulated Loan Recoveries'),(37,4,9,9,'Accumulated Loan Charge Offs');
/*!40000 ALTER TABLE `is` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_group`
--

DROP TABLE IF EXISTS `is_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_group`
--

LOCK TABLES `is_group` WRITE;
/*!40000 ALTER TABLE `is_group` DISABLE KEYS */;
INSERT INTO `is_group` VALUES (5,NULL,'Income'),(6,NULL,'Financial Costs'),(7,NULL,'Operating Expenses'),(8,NULL,'Allocation of Net Income'),(9,NULL,'Other');
/*!40000 ALTER TABLE `is_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_sub_group`
--

DROP TABLE IF EXISTS `is_sub_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_sub_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_sub_group`
--

LOCK TABLES `is_sub_group` WRITE;
/*!40000 ALTER TABLE `is_sub_group` DISABLE KEYS */;
INSERT INTO `is_sub_group` VALUES (4,5,NULL,'Loan'),(5,5,NULL,'Investment'),(6,6,NULL,'Financial Costs'),(7,7,NULL,'Operating Expenses'),(8,8,NULL,'Allocation of Net Income'),(9,9,NULL,'Other');
/*!40000 ALTER TABLE `is_sub_group` ENABLE KEYS */;
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
  `chapter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `primary_union`
--

LOCK TABLES `primary_union` WRITE;
/*!40000 ALTER TABLE `primary_union` DISABLE KEYS */;
INSERT INTO `primary_union` VALUES (0,'No Primary CU',0,0),(1,'Farmers Credit Union in Bangkapi',1,1),(2,'St. Peter Credit Union, Nakornpathom',1,0),(3,'KU SACCO, Bangkok',1,0),(4,'Soon Klang Theva CU, Bangkok',2,0),(5,'Poo Kang Poon Sub CU, Chiang Rai',2,0);
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
  `gender_id` int(11) NOT NULL,
  `group1` int(11) DEFAULT NULL,
  `group2` int(11) DEFAULT NULL,
  `group3` int(11) DEFAULT NULL,
  `group4` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_age`
--

LOCK TABLES `pu_age` WRITE;
/*!40000 ALTER TABLE `pu_age` DISABLE KEYS */;
INSERT INTO `pu_age` VALUES (24,4,2,2,0,100,100,100,50),(25,4,2,3,0,350,100,50,50),(26,1,4,1,0,0,0,0,0),(27,1,4,2,0,0,0,0,0),(28,1,1,1,0,0,0,0,0),(29,1,1,2,0,0,0,0,0),(38,1,5,1,1,2,2,2,2),(39,1,5,1,2,100,1,2,3),(40,1,5,2,1,2,2,2,2),(41,1,5,2,2,2,2,2,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_balancesheet`
--

LOCK TABLES `pu_balancesheet` WRITE;
/*!40000 ALTER TABLE `pu_balancesheet` DISABLE KEYS */;
INSERT INTO `pu_balancesheet` VALUES (66,1,4,6,50.00),(67,1,4,8,0.00),(68,1,4,26,0.00),(69,1,4,7,0.00),(70,1,4,9,0.00),(71,1,4,11,0.00),(72,1,4,10,0.00),(73,1,4,12,0.00),(74,1,4,14,0.00),(75,1,4,16,0.00),(76,1,4,13,0.00),(77,1,4,15,0.00),(78,1,4,17,0.00),(79,1,4,19,0.00),(80,1,4,21,0.00),(81,1,4,18,0.00),(82,1,4,20,0.00),(83,1,4,22,0.00),(84,1,4,27,0.00),(85,1,4,24,0.00),(86,1,4,23,0.00),(87,1,4,28,0.00),(88,1,4,25,0.00),(89,1,4,30,0.00),(90,1,4,29,0.00),(91,1,4,31,0.00),(92,1,4,35,0.00),(93,1,4,32,0.00),(94,1,4,34,0.00),(95,1,4,33,0.00),(96,1,4,38,0.00),(97,1,4,40,0.00),(98,1,4,37,0.00),(99,1,4,39,0.00),(100,1,4,36,0.00),(101,1,1,6,200.00),(102,1,1,8,0.00),(103,1,1,26,0.00),(104,1,1,7,0.00),(105,1,1,9,0.00),(106,1,1,11,0.00),(107,1,1,10,0.00),(108,1,1,12,0.00),(109,1,1,14,0.00),(110,1,1,16,0.00),(111,1,1,13,0.00),(112,1,1,15,0.00),(113,1,1,17,0.00),(114,1,1,19,0.00),(115,1,1,21,0.00),(116,1,1,18,0.00),(117,1,1,20,0.00),(118,1,1,22,0.00),(119,1,1,27,0.00),(120,1,1,24,0.00),(121,1,1,23,0.00),(122,1,1,28,0.00),(123,1,1,25,0.00),(124,1,1,30,0.00),(125,1,1,29,0.00),(126,1,1,31,0.00),(127,1,1,35,0.00),(128,1,1,32,0.00),(129,1,1,34,0.00),(130,1,1,33,0.00),(131,1,1,38,0.00),(132,1,1,40,0.00),(133,1,1,37,0.00),(134,1,1,39,0.00),(135,1,1,36,0.00),(204,1,5,6,0.00),(205,1,5,7,0.00),(206,1,5,8,0.00),(207,1,5,9,0.00),(208,1,5,10,0.00),(209,1,5,11,0.00),(210,1,5,12,0.00),(211,1,5,13,0.00),(212,1,5,14,0.00),(213,1,5,15,0.00),(214,1,5,16,0.00),(215,1,5,17,0.00),(216,1,5,19,0.00),(217,1,5,18,0.00),(218,1,5,20,0.00),(219,1,5,21,0.00),(220,1,5,22,0.00),(221,1,5,23,0.00),(222,1,5,24,0.00),(223,1,5,25,0.00),(224,1,5,27,0.00),(225,1,5,28,0.00),(226,1,5,29,0.00),(227,1,5,30,0.00),(228,1,5,31,0.00),(229,1,5,32,0.00),(230,1,5,33,0.00),(231,1,5,34,0.00),(232,1,5,35,0.00),(233,1,5,36,0.00),(234,1,5,37,0.00),(235,1,5,38,0.00),(236,1,5,39,0.00),(237,1,5,40,0.00);
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
  `date` date DEFAULT NULL,
  `total_members` int(11) DEFAULT NULL,
  `saved` int(11) DEFAULT '0',
  `locked` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_datasheet`
--

LOCK TABLES `pu_datasheet` WRITE;
/*!40000 ALTER TABLE `pu_datasheet` DISABLE KEYS */;
INSERT INTO `pu_datasheet` VALUES (1,1,'2014-06-15 01:22:17',4,'2014-06-01',500,1,0),(2,4,'2014-06-17 04:56:01',2,'0000-00-00',900,0,0),(3,1,'2014-08-13 12:13:11',NULL,'2014-08-13',NULL,0,0),(4,1,'2014-08-13 12:15:05',0,'2014-08-10',0,1,0),(5,1,'2014-08-29 14:52:41',0,'2014-08-31',809,1,0);
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
  `gender_id` int(11) NOT NULL,
  `male` int(11) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_gender`
--

LOCK TABLES `pu_gender` WRITE;
/*!40000 ALTER TABLE `pu_gender` DISABLE KEYS */;
INSERT INTO `pu_gender` VALUES (24,4,2,2,0,100,250,350),(25,4,2,3,0,250,300,550),(26,1,4,1,0,0,0,0),(27,1,4,2,0,0,0,0),(28,1,1,1,0,200,200,200),(29,1,1,2,0,300,200,300),(38,1,5,1,1,NULL,NULL,300),(39,1,5,1,2,NULL,NULL,500),(40,1,5,2,1,NULL,NULL,5),(41,1,5,2,2,NULL,NULL,4);
/*!40000 ALTER TABLE `pu_gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pu_is`
--

DROP TABLE IF EXISTS `pu_is`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pu_is` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primary_union_id` int(11) DEFAULT NULL,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `is_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_is`
--

LOCK TABLES `pu_is` WRITE;
/*!40000 ALTER TABLE `pu_is` DISABLE KEYS */;
INSERT INTO `pu_is` VALUES (16,1,3,3,0.00),(17,1,3,4,0.00),(18,1,3,1,0.00),(19,1,3,2,0.00),(20,1,3,5,0.00),(56,1,4,6,100.00),(57,1,4,8,0.00),(58,1,4,7,0.00),(59,1,4,11,0.00),(60,1,4,10,0.00),(61,1,4,12,0.00),(62,1,4,9,0.00),(63,1,4,14,0.00),(64,1,4,16,0.00),(65,1,4,13,0.00),(66,1,4,15,0.00),(67,1,4,22,0.00),(68,1,4,19,0.00),(69,1,4,27,0.00),(70,1,4,24,0.00),(71,1,4,21,0.00),(72,1,4,18,0.00),(73,1,4,26,0.00),(74,1,4,23,0.00),(75,1,4,20,0.00),(76,1,4,17,0.00),(77,1,4,25,0.00),(78,1,4,30,0.00),(79,1,4,32,0.00),(80,1,4,29,0.00),(81,1,4,31,0.00),(82,1,4,28,0.00),(83,1,4,33,0.00),(84,1,4,35,0.00),(85,1,4,37,0.00),(86,1,4,34,0.00),(87,1,4,36,0.00),(88,1,1,6,500.00),(89,1,1,8,0.00),(90,1,1,7,0.00),(91,1,1,11,0.00),(92,1,1,10,0.00),(93,1,1,12,0.00),(94,1,1,9,0.00),(95,1,1,14,0.00),(96,1,1,16,0.00),(97,1,1,13,0.00),(98,1,1,15,0.00),(99,1,1,22,0.00),(100,1,1,19,0.00),(101,1,1,27,0.00),(102,1,1,24,0.00),(103,1,1,21,0.00),(104,1,1,18,0.00),(105,1,1,26,0.00),(106,1,1,23,0.00),(107,1,1,20,0.00),(108,1,1,17,0.00),(109,1,1,25,0.00),(110,1,1,30,0.00),(111,1,1,32,0.00),(112,1,1,29,0.00),(113,1,1,31,0.00),(114,1,1,28,0.00),(115,1,1,33,0.00),(116,1,1,35,0.00),(117,1,1,37,0.00),(118,1,1,34,0.00),(119,1,1,36,0.00),(184,1,5,6,0.00),(185,1,5,7,0.00),(186,1,5,8,0.00),(187,1,5,9,0.00),(188,1,5,10,0.00),(189,1,5,11,0.00),(190,1,5,12,0.00),(191,1,5,13,0.00),(192,1,5,14,0.00),(193,1,5,15,0.00),(194,1,5,16,0.00),(195,1,5,17,0.00),(196,1,5,18,0.00),(197,1,5,19,0.00),(198,1,5,20,0.00),(199,1,5,21,0.00),(200,1,5,22,0.00),(201,1,5,23,0.00),(202,1,5,24,0.00),(203,1,5,25,0.00),(204,1,5,26,0.00),(205,1,5,27,0.00),(206,1,5,28,0.00),(207,1,5,29,0.00),(208,1,5,30,0.00),(209,1,5,31,0.00),(210,1,5,32,0.00),(211,1,5,33,0.00),(212,1,5,34,0.00),(213,1,5,35,0.00),(214,1,5,36,0.00),(215,1,5,37,0.00);
/*!40000 ALTER TABLE `pu_is` ENABLE KEYS */;
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
  `gender_id` int(11) NOT NULL,
  `male` int(11) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  `savings` int(11) DEFAULT NULL,
  `outstanding` int(11) DEFAULT NULL,
  `total_granted` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_less_member_service`
--

LOCK TABLES `pu_less_member_service` WRITE;
/*!40000 ALTER TABLE `pu_less_member_service` DISABLE KEYS */;
INSERT INTO `pu_less_member_service` VALUES (24,4,2,2,0,0,0,0,0,0,0),(25,4,2,3,0,0,0,0,0,0,0),(26,1,4,1,0,0,0,0,0,0,0),(27,1,4,2,0,0,0,0,0,0,0),(28,1,1,1,0,200,0,0,0,0,500),(29,1,1,2,0,0,0,0,0,0,0),(38,1,5,1,1,NULL,NULL,0,0,0,0),(39,1,5,1,2,NULL,NULL,0,0,0,0),(40,1,5,2,1,NULL,NULL,0,0,0,0),(41,1,5,2,2,NULL,NULL,0,0,0,0);
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
  `gender_id` int(11) NOT NULL,
  `farmer` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL,
  `microb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_market`
--

LOCK TABLES `pu_market` WRITE;
/*!40000 ALTER TABLE `pu_market` DISABLE KEYS */;
INSERT INTO `pu_market` VALUES (24,4,2,2,0,50,200,100),(25,4,2,3,0,250,100,200),(26,1,4,1,0,0,0,0),(27,1,4,2,0,0,0,0),(28,1,1,1,0,200,0,0),(29,1,1,2,0,500,0,0),(38,1,5,1,1,200,1,2),(39,1,5,1,2,200,200,200),(40,1,5,2,1,3,1,1),(41,1,5,2,2,2,1,1);
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
  `gtotal` int(11) DEFAULT NULL,
  `manager_male` int(11) DEFAULT NULL,
  `manager_female` int(11) DEFAULT NULL,
  `manager_total` int(11) DEFAULT NULL,
  `ops_male` int(11) DEFAULT NULL,
  `ops_female` int(11) DEFAULT NULL,
  `ops_total` int(11) DEFAULT NULL,
  `gm_male` int(11) DEFAULT NULL,
  `gm_female` int(11) DEFAULT NULL,
  `gm_total` int(11) DEFAULT NULL,
  `lm_male` int(11) DEFAULT NULL,
  `lm_female` int(11) DEFAULT NULL,
  `lm_total` int(11) DEFAULT NULL,
  `hr_male` int(11) DEFAULT NULL,
  `hr_female` int(11) DEFAULT NULL,
  `hr_total` int(11) DEFAULT NULL,
  `fa_male` int(11) DEFAULT NULL,
  `fa_female` int(11) DEFAULT NULL,
  `fa_total` int(11) DEFAULT NULL,
  `audit_male` int(11) DEFAULT NULL,
  `audit_female` int(11) DEFAULT NULL,
  `audit_total` int(11) DEFAULT NULL,
  `other_male` int(11) DEFAULT NULL,
  `other_female` int(11) DEFAULT NULL,
  `other_total` int(11) DEFAULT NULL,
  `bod_male` int(11) DEFAULT NULL,
  `bod_female` int(11) DEFAULT NULL,
  `bod_total` int(11) DEFAULT NULL,
  `bodmale` int(11) DEFAULT NULL,
  `bodfemale` int(11) DEFAULT NULL,
  `bodtotal` int(11) DEFAULT NULL,
  `edumale` int(11) DEFAULT NULL,
  `edufemale` int(11) DEFAULT NULL,
  `edutotal` int(11) DEFAULT NULL,
  `creditmale` int(11) DEFAULT NULL,
  `creditfemale` int(11) DEFAULT NULL,
  `credittotal` int(11) DEFAULT NULL,
  `auditmale` int(11) DEFAULT NULL,
  `auditfemale` int(11) DEFAULT NULL,
  `audittotal` int(11) DEFAULT NULL,
  `othermale` int(11) DEFAULT NULL,
  `otherfemale` int(11) DEFAULT NULL,
  `othertotal` int(11) DEFAULT NULL,
  `other_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_operations`
--

LOCK TABLES `pu_operations` WRITE;
/*!40000 ALTER TABLE `pu_operations` DISABLE KEYS */;
INSERT INTO `pu_operations` VALUES (14,1,10,20,30,100,50,150,0,0,0,300,200,500,200,100,300,100,150,250,150,150,300,0,0,0,0,0,0,0,0,0,150,150,300,200,200,400,0,0,0,0,0,0,0,0,0,'test');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_operations_area`
--

LOCK TABLES `pu_operations_area` WRITE;
/*!40000 ALTER TABLE `pu_operations_area` DISABLE KEYS */;
INSERT INTO `pu_operations_area` VALUES (15,4,2),(16,4,3),(21,1,1),(22,1,2);
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
  `saved` int(11) DEFAULT '0',
  `locked` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_profile`
--

LOCK TABLES `pu_profile` WRITE;
/*!40000 ALTER TABLE `pu_profile` DISABLE KEYS */;
INSERT INTO `pu_profile` VALUES (1,1,'2014-06-15',NULL,NULL,'1600 Prince St Apt 306','Alexandria','James','Founder','8035538112','4554645656','af8924b8632b41e3923c2a590b29e1b7@mail.marketp',0,0),(2,4,'2012-01-13',NULL,NULL,'411 U Tower Srinakarin Rd., Suanluang','Bangkok','Mr. Vivit Chareonsin','Program Assistant','+662-704-4254','+662-704-4255','vivit@aaccu.coop',1,0);
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
  `male_ratio` decimal(10,2) DEFAULT NULL,
  `female` int(11) DEFAULT NULL,
  `female_ratio` decimal(10,2) DEFAULT NULL,
  `youth` int(11) DEFAULT NULL,
  `youth_ratio` decimal(10,2) DEFAULT NULL,
  `none_member` int(11) DEFAULT NULL,
  `none_member_ratio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pu_service_distribution`
--

LOCK TABLES `pu_service_distribution` WRITE;
/*!40000 ALTER TABLE `pu_service_distribution` DISABLE KEYS */;
INSERT INTO `pu_service_distribution` VALUES (49,1,5,1,300,0,0.00,0,0.00,0,0.00,0,0.00),(50,1,5,2,0,0,0.00,0,0.00,0,0.00,0,0.00),(51,1,5,3,0,0,0.00,0,0.00,0,0.00,0,0.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Shares'),(2,'Savings'),(3,'Loans');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unlock_request`
--

DROP TABLE IF EXISTS `unlock_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unlock_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pu_datasheet_id` int(11) DEFAULT NULL,
  `pu_profile_id` int(11) DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `comment` text,
  `federation_id` int(11) DEFAULT NULL,
  `unlock_date` datetime DEFAULT NULL,
  `primary_union_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unlock_request`
--

LOCK TABLES `unlock_request` WRITE;
/*!40000 ALTER TABLE `unlock_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `unlock_request` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@aaccu.coop','*4ACFE3202A5FF5CF467898FC58AAB1D615029441',0,1,'2014-08-13 12:06:30',0,0,0),(2,'fsct@aaccu.coop','*D41381335C614615CCB6F68D12CE00E9309AF666',1,1,'2014-09-02 09:58:48',1,0,1),(3,'farmers@aaccu.coop','*21C69224FD52649343758BC0F110775F5066D101',2,1,'2014-09-03 16:14:25',1,1,1),(4,'cult@aaccu.coop','*75A29E56315D1C906E7D08683551B78866A31391',1,1,'2014-06-09 00:17:14',2,0,1),(5,'pfcco@aaccu.coop','*971B99292A8F57A70D8F42D06A8BB56791F51C93',1,1,NULL,5,0,7),(6,'cculb@aaccu.coop','*B4169279D86413B7B858969AF590FC34DA16D61C',1,1,NULL,3,0,4),(7,'natcco@aaccu.coop','*59848E5ED131AA9D5565F4C979B57C1EDD3F54F0',1,1,NULL,6,0,7),(8,'stpeter@aaccu.coop','*79153D173D5E8C96C72B444051342A5C66C94E76',2,1,'2014-06-25 05:05:27',1,2,1),(9,'kusacco@aaccu.coop','*5032F503127C24A8E18052869EB7E0152BFAAD49',2,1,NULL,1,3,1),(10,'sktcu@aaccu.coop','*D3A0C3F7CB10434B0928742402B079D464BBD4AD',2,1,'2014-06-25 05:12:25',2,4,1),(11,'pkpscu@aaccu.coop','*19B7B73B0CEC25E7D565318DC909425FD9287F17',2,1,NULL,2,5,1);
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

-- Dump completed on 2014-09-03 17:34:49
