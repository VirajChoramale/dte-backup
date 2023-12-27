-- MySQL dump 10.13  Distrib 5.7.40, for Linux (x86_64)
--
-- Host: localhost    Database: shortmsbte_dbatu
-- ------------------------------------------------------
-- Server version	5.7.40-log

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
-- Table structure for table `EquivelaceData`
--

DROP TABLE IF EXISTS `EquivelaceData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EquivelaceData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `candidate_name` varchar(55) NOT NULL,
  `candidate_address` varchar(155) NOT NULL,
  `pin_code` int(4) NOT NULL,
  `mobile_number` bigint(11) NOT NULL,
  `telephone_number` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `learning_mode` varchar(50) NOT NULL,
  `institute_name` int(4) unsigned zerofill NOT NULL,
  `institute_type` varchar(50) NOT NULL,
  `institute_status` varchar(50) NOT NULL,
  `passing_year` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `admin_status` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EquivelaceData`
--

LOCK TABLES `EquivelaceData` WRITE;
/*!40000 ALTER TABLE `EquivelaceData` DISABLE KEYS */;
/*!40000 ALTER TABLE `EquivelaceData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apllications`
--

DROP TABLE IF EXISTS `apllications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apllications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `online_verification` tinyint(1) NOT NULL,
  `remark` varchar(555) NOT NULL,
  `offline_verification` tinyint(1) NOT NULL,
  `remark1` varchar(555) NOT NULL,
  `admin_final_status` char(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sub_type` char(2) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`,`type`,`sub_type`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apllications`
--

LOCK TABLES `apllications` WRITE;
/*!40000 ALTER TABLE `apllications` DISABLE KEYS */;
INSERT INTO `apllications` VALUES (1,7676637510,276766375101,1,'Online Verified',1,'Offline Verified','1',2,'NC','2022-11-15 00:04:53','2022-11-15 00:05:31'),(2,8888775455,288887754551,1,'Direct Approve',1,'Direct Approve','1',2,'NC','2022-11-15 00:08:46','2022-11-15 00:08:46'),(3,7676637510,276766375101,1,'Online Verified',1,'Offline verification','1',2,'DC','2022-11-15 00:49:45','2022-11-15 00:52:32'),(4,8888775455,288887754551,1,'Direct Approve',1,'Direct Approve','1',2,'DC','2022-11-15 00:55:54','2022-11-15 00:55:54'),(5,7676637510,276766375102,1,'Direct Approve',1,'Direct Approve','1',2,'DC','2022-11-15 03:09:17','2022-11-15 03:09:17'),(6,9665166428,296651664281,1,'Verified',1,'fgvsdg','1',2,'NC','2022-11-19 00:34:55','2022-11-19 00:35:45'),(7,7676637510,276766375103,1,'Yes Verified',1,'Verified','1',2,'NC','2022-11-28 06:32:26','2022-11-28 06:35:00');
/*!40000 ALTER TABLE `apllications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apllications_EQ`
--

DROP TABLE IF EXISTS `apllications_EQ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apllications_EQ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `online_verification` tinyint(1) NOT NULL,
  `remark` varchar(555) NOT NULL,
  `admin_final_status` char(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sub_type` char(2) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`,`type`,`sub_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apllications_EQ`
--

LOCK TABLES `apllications_EQ` WRITE;
/*!40000 ALTER TABLE `apllications_EQ` DISABLE KEYS */;
/*!40000 ALTER TABLE `apllications_EQ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discrepancy_completion`
--

DROP TABLE IF EXISTS `discrepancy_completion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discrepancy_completion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` bigint(20) NOT NULL,
  `doc_id` tinyint(2) NOT NULL,
  `type` char(2) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `veri_type` varchar(2) NOT NULL,
  `version` int(2) NOT NULL,
  `version_confirm` varchar(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`,`doc_id`,`type`,`veri_type`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discrepancy_completion`
--

LOCK TABLES `discrepancy_completion` WRITE;
/*!40000 ALTER TABLE `discrepancy_completion` DISABLE KEYS */;
INSERT INTO `discrepancy_completion` VALUES (1,276766375101,1,'NC','xxvxzvxv','ON',0,'','2022-11-15 11:03:21'),(2,276766375101,4,'NC','xzvxvv','ON',0,'','2022-11-15 11:03:22'),(3,276766375101,17,'DC','gfgfgf','ON',0,'','2022-11-15 11:48:20'),(4,276766375101,17,'DC','cxzcxzc','OF',1,'1','2022-11-15 11:51:43'),(5,296651664281,8,'NC','Document is Blur','ON',0,'','2022-11-19 11:33:48');
/*!40000 ALTER TABLE `discrepancy_completion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discrepancy_completion_EQ`
--

DROP TABLE IF EXISTS `discrepancy_completion_EQ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discrepancy_completion_EQ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` bigint(20) NOT NULL,
  `doc_id` tinyint(2) NOT NULL,
  `type` char(2) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `veri_type` varchar(2) NOT NULL,
  `version` int(2) NOT NULL,
  `version_confirm` varchar(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discrepancy_completion_EQ`
--

LOCK TABLES `discrepancy_completion_EQ` WRITE;
/*!40000 ALTER TABLE `discrepancy_completion_EQ` DISABLE KEYS */;
/*!40000 ALTER TABLE `discrepancy_completion_EQ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discrepancy_completion_log`
--

DROP TABLE IF EXISTS `discrepancy_completion_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discrepancy_completion_log` (
  `id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `doc_id` tinyint(2) NOT NULL,
  `type` char(2) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `veri_type` varchar(2) NOT NULL,
  `version` int(2) NOT NULL,
  `version_confirm` varchar(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discrepancy_completion_log`
--

LOCK TABLES `discrepancy_completion_log` WRITE;
/*!40000 ALTER TABLE `discrepancy_completion_log` DISABLE KEYS */;
INSERT INTO `discrepancy_completion_log` VALUES (1,276766375101,1,'NC','xxvxzvxv','ON',1,'1','2022-11-15 11:03:21'),(2,276766375101,4,'NC','xzvxvv','ON',1,'1','2022-11-15 11:03:22'),(3,276766375101,17,'DC','gfgfgf','ON',1,'1','2022-11-15 11:48:20'),(5,296651664281,8,'NC','Document is Blur','ON',1,'1','2022-11-19 11:33:48');
/*!40000 ALTER TABLE `discrepancy_completion_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discrepancy_master`
--

DROP TABLE IF EXISTS `discrepancy_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discrepancy_master` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `particular` varchar(255) NOT NULL,
  `type` char(2) NOT NULL,
  `user` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discrepancy_master`
--

LOCK TABLES `discrepancy_master` WRITE;
/*!40000 ALTER TABLE `discrepancy_master` DISABLE KEYS */;
INSERT INTO `discrepancy_master` VALUES (1,'Affidavit on 100/- Rs stamp Paper with notary as attached format','NC',0,0),(4,'Attested copy of Photo Identity Proof (PAN card, Driving License, ID\nissued by Government, Aadhar card, Voters Id.).','NC',1,0),(5,'Marksheet photo copy Attested by Gazetted officer of HSC/SSC/VIII/IV\nstandard as Name Correction Proof. (Send within 10 days)','NC',1,0),(6,'Two passport size photos out of which one photo should be attested by\ngazzeted officer.','NC',0,0),(7,'Self-Attested copy of photo Id proof such as PAN card, Driving License,\nID issued by Government, Aadhar card, Voters Id.','NC',0,0),(8,'Original MSCIT Certificate.','NC',1,0),(9,'Major Name Correction cannot be done.','NC',0,0),(10,'Submitted Certificate is invalid.','NC',0,0),(11,'Submitted Provisional certificate is invalid.','NC',0,0),(12,'Submitted information/Data received is Invalid/Data not available.','NC',0,0),(13,'Marks as per record for Seat No .for Exam Event for\nOnline exam is Marks and Internal Marks which is less than\npassing criteria.','NC',0,0),(15,'Hence returning you original MSCIT certificate. Acknowledge the\nsame.','NC',0,0),(16,'Submit Original Provisional Certificate for verification','NC',0,0),(17,'Self-Declaration as per Annexure A (As per Maharashtra Govt. GR\nGAD/no. 1614/345/no.71/18 A dated 09-03/2015). Stick Photo on\ndeclaration form','DC',1,0),(18,'Self-declaration for self-attested as per Annexure B (As per\nMaharashtra Govt. GR GAD/no. 1614/345/no.71/18 A dated 09-\n03/2015). Stick Photo on declaration form','DC',1,0),(19,'Self-Attested copy of Original Certificate/Provisional/Appearing\nCertificate/Hall Ticket.','DC',1,0),(35,'All semester marksheet','EQ',0,0),(36,'Provisional/Board Certificate','EQ',0,0),(22,'Two passport size photos out of which one photo should be attested\nby gazzeted officer.','DC',0,0),(23,'Self-Attested copy of photo Id proof such as PAN card, Driving\nLicense, ID issued by Government, Aadhar card, Voters Id.','DC',1,0),(24,'Major Name Correction cannot be done.','DC',0,0),(25,'Submitted Certificate is invalid.','DC',0,0),(26,'Submitted Provisional certificate is invalid.','DC',0,0),(27,'Submitted information/Data received is Invalid/Data not available.','DC',0,0),(28,'Marks as per record for Seat No for Exam Event\nJanuary ? 2012 for Online exam is Marks and Internal Marks\nwhich is less than passing criteria (Minimum Marks required for\nPassing in exam)','DC',0,0),(30,'Hence returning you original MSCIT certificate. Acknowledge the\nsame.','DC',0,0),(31,'Submit Original Provisional Certificate for verification','DC',0,0),(32,'','',0,0),(33,'Annexure B','NC',1,0),(34,'Copy of Statement of Marks of (HSC/SSC/VIII/IV, attested by Gazetted Officer)','DC',1,0);
/*!40000 ALTER TABLE `discrepancy_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district_talukas`
--

DROP TABLE IF EXISTS `district_talukas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `district_talukas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tal_name` varchar(100) NOT NULL,
  `dist_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dist_name` (`dist_name`),
  FULLTEXT KEY `dist_name_2` (`dist_name`)
) ENGINE=MyISAM AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district_talukas`
--

LOCK TABLES `district_talukas` WRITE;
/*!40000 ALTER TABLE `district_talukas` DISABLE KEYS */;
INSERT INTO `district_talukas` VALUES (1,'Akkalkuwa','Nandurbar'),(2,'Akrani','Nandurbar'),(3,'Talode','Nandurbar'),(4,'Shahade','Nandurbar'),(5,'Nandurbar','Nandurbar'),(6,'Nawapur','Nandurbar'),(7,'Shirpur','Dhule'),(8,'Sindkhede','Dhule'),(9,'Sakri','Dhule'),(10,'Dhule','Dhule'),(11,'Chopda','Jalgaon'),(12,'Yawal','Jalgaon'),(13,'Raver','Jalgaon'),(14,'Muktainagar (Edlabad)','Jalgaon'),(15,'Bodvad','Jalgaon'),(16,'Bhusawal','Jalgaon'),(17,'Jalgaon','Jalgaon'),(18,'Erandol','Jalgaon'),(19,'Dharangaon','Jalgaon'),(20,'Amalner','Jalgaon'),(21,'Parola','Jalgaon'),(22,'Bhadgaon','Jalgaon'),(23,'Chalisgaon','Jalgaon'),(24,'Pachora','Jalgaon'),(25,'Jamner','Jalgaon'),(26,'Jalgaon (Jamod)','Buldhana'),(27,'Sangrampur','Buldhana'),(28,'Shegaon','Buldhana'),(29,'Nandura','Buldhana'),(30,'Malkapur','Buldhana'),(31,'Motala','Buldhana'),(32,'Khamgaon','Buldhana'),(33,'Mehkar','Buldhana'),(34,'Chikhli','Buldhana'),(35,'Buldana','Buldhana'),(36,'Deolgaon Raja','Buldhana'),(37,'Sindkhed Raja','Buldhana'),(38,'Lonar','Buldhana'),(39,'Telhara','Akola'),(40,'Akot','Akola'),(41,'Balapur','Akola'),(42,'Akola','Akola'),(43,'Murtijapur','Akola'),(44,'Patur','Akola'),(45,'Barshitakli','Akola'),(46,'Malegaon','Washim'),(47,'Mangrulpir','Washim'),(48,'Karanja','Washim'),(49,'Manora','Washim'),(50,'Washim','Washim'),(51,'Risod','Washim'),(52,'Dharni','Amravati'),(53,'Chikhaldara','Amravati'),(54,'Anjangaon Surji','Amravati'),(55,'Achalpur','Amravati'),(56,'Chandurbazar','Amravati'),(57,'Morshi','Amravati'),(58,'Warud','Amravati'),(59,'Tiwasa','Amravati'),(60,'Amravati','Amravati'),(61,'Bhatkuli','Amravati'),(62,'Daryapur','Amravati'),(63,'Nandgaon-Khandeshwar','Amravati'),(64,'Chandur Railway','Amravati'),(65,'Dhamangaon Railway','Amravati'),(66,'Ashti','Wardha'),(67,'Karanja','Wardha'),(68,'Arvi','Wardha'),(69,'Seloo','Wardha'),(70,'Wardha','Wardha'),(71,'Deoli','Wardha'),(72,'Hinganghat','Wardha'),(73,'Samudrapur','Wardha'),(74,'Narkhed','Nagpur'),(75,'Katol','Nagpur'),(76,'Kalameshwar','Nagpur'),(77,'Savner','Nagpur'),(78,'Parseoni','Nagpur'),(79,'Ramtek','Nagpur'),(80,'Mauda','Nagpur'),(81,'Kamptee','Nagpur'),(82,'Nagpur (Rural)','Nagpur'),(83,'Nagpur (Urban)','Nagpur'),(84,'Hingna','Nagpur'),(85,'Umred','Nagpur'),(86,'Kuhi','Nagpur'),(87,'Bhiwapur','Nagpur'),(88,'Tumsar','Bhandara'),(89,'Mohadi','Bhandara'),(90,'Bhandara','Bhandara'),(91,'Sakoli','Bhandara'),(92,'Lakhani','Bhandara'),(93,'Pauni','Bhandara'),(94,'Lakhandur','Bhandara'),(95,'Tirora','Gondiya'),(96,'Goregaon','Gondiya'),(97,'Gondiya','Gondiya'),(98,'Amgaon','Gondiya'),(99,'Salekasa','Gondiya'),(100,'Sadak-Arjuni','Gondiya'),(101,'Arjuni Morgaon','Gondiya'),(102,'Deori','Gondiya'),(103,'Desaiganj (Vadasa)','Gadchiroli'),(104,'Armori','Gadchiroli'),(105,'Kurkheda','Gadchiroli'),(106,'Korchi','Gadchiroli'),(107,'Dhanora','Gadchiroli'),(108,'Gadchiroli','Gadchiroli'),(109,'Chamorshi','Gadchiroli'),(110,'Mulchera','Gadchiroli'),(111,'Etapalli','Gadchiroli'),(112,'Bhamragad','Gadchiroli'),(113,'Aheri','Gadchiroli'),(114,'Sironcha','Gadchiroli'),(115,'Warora','Chandrapur'),(116,'Chimur','Chandrapur'),(117,'Nagbhir','Chandrapur'),(118,'Bramhapuri','Chandrapur'),(119,'Savali','Chandrapur'),(120,'Sindewahi','Chandrapur'),(121,'Bhadravati','Chandrapur'),(122,'Chandrapur','Chandrapur'),(123,'Mul','Chandrapur'),(124,'Pombhurna','Chandrapur'),(125,'Ballarpur','Chandrapur'),(126,'Korpana','Chandrapur'),(127,'Jiwati','Chandrapur'),(128,'Rajura','Chandrapur'),(129,'Gondpipari','Chandrapur'),(130,'Ner','Yavatmal'),(131,'Babulgaon','Yavatmal'),(132,'Kalamb','Yavatmal'),(133,'Yavatmal','Yavatmal'),(134,'Darwha','Yavatmal'),(135,'Digras','Yavatmal'),(136,'Pusad','Yavatmal'),(137,'Umarkhed','Yavatmal'),(138,'Mahagaon','Yavatmal'),(139,'Arni','Yavatmal'),(140,'Ghatanji','Yavatmal'),(141,'Kelapur','Yavatmal'),(142,'Ralegaon','Yavatmal'),(143,'Maregaon','Yavatmal'),(144,'Zari-Jamani','Yavatmal'),(145,'Wani','Yavatmal'),(146,'Mahoor','Nanded'),(147,'Kinwat','Nanded'),(148,'Himayatnagar','Nanded'),(149,'Hadgaon','Nanded'),(150,'Ardhapur','Nanded'),(151,'Nanded','Nanded'),(152,'Mudkhed','Nanded'),(153,'Bhokar','Nanded'),(154,'Umri','Nanded'),(155,'Dharmabad','Nanded'),(156,'Biloli','Nanded'),(157,'Naigaon (Khairgaon)','Nanded'),(158,'Loha','Nanded'),(159,'Kandhar','Nanded'),(160,'Mukhed','Nanded'),(161,'Deglur','Nanded'),(162,'Sengaon','Hingoli'),(163,'Hingoli','Hingoli'),(164,'Aundha (Nagnath)','Hingoli'),(165,'Kalamnuri','Hingoli'),(166,'Basmath','Hingoli'),(167,'Sailu','Parbhani'),(168,'Jintur','Parbhani'),(169,'Parbhani','Parbhani'),(170,'Manwath','Parbhani'),(171,'Pathri','Parbhani'),(172,'Sonpeth','Parbhani'),(173,'Gangakhed','Parbhani'),(174,'Palam','Parbhani'),(175,'Purna','Parbhani'),(176,'Bhokardan','Jalna'),(177,'Jafferabad','Jalna'),(178,'Jalna','Jalna'),(179,'Badnapur','Jalna'),(180,'Ambad','Jalna'),(181,'Ghansawangi','Jalna'),(182,'Partur','Jalna'),(183,'Mantha','Jalna'),(184,'Kannad','Aurangabad'),(185,'Soegaon','Aurangabad'),(186,'Sillod','Aurangabad'),(187,'Phulambri','Aurangabad'),(188,'Aurangabad','Aurangabad'),(189,'Khuldabad','Aurangabad'),(190,'Vaijapur','Aurangabad'),(191,'Gangapur','Aurangabad'),(192,'Paithan','Aurangabad'),(193,'Surgana','Nashik'),(194,'Kalwan','Nashik'),(195,'Deola','Nashik'),(196,'Baglan','Nashik'),(197,'Malegaon','Nashik'),(198,'Nandgaon','Nashik'),(199,'Chandvad','Nashik'),(200,'Dindori','Nashik'),(201,'Peint','Nashik'),(202,'Trimbakeshwar','Nashik'),(203,'Nashik','Nashik'),(204,'Igatpuri','Nashik'),(205,'Sinnar','Nashik'),(206,'Niphad','Nashik'),(207,'Yeola','Nashik'),(208,'Talasari','Palghar'),(209,'Dahanu','Palghar'),(210,'Vikramgad','Palghar'),(211,'Jawhar','Palghar'),(212,'Mokhada','Palghar'),(213,'Vada','Palghar'),(214,'Palghar','Palghar'),(215,'Vasai','Palghar'),(216,'Thane','Thane'),(217,'Bhiwandi','Thane'),(218,'Shahapur','Thane'),(219,'Kalyan','Thane'),(220,'Ulhasnagar','Thane'),(221,'Ambarnath','Thane'),(222,'Murbad','Thane'),(223,'Uran','Raigad'),(224,'Panvel','Raigad'),(225,'Karjat','Raigad'),(226,'Khalapur','Raigad'),(227,'Pen','Raigad'),(228,'Alibag','Raigad'),(229,'Murud','Raigad'),(230,'Roha','Raigad'),(231,'Sudhagad','Raigad'),(232,'Mangaon','Raigad'),(233,'Tala','Raigad'),(234,'Shrivardhan','Raigad'),(235,'Mhasla','Raigad'),(236,'Mahad','Raigad'),(237,'Poladpur','Raigad'),(238,'Junnar','Pune'),(239,'Ambegaon','Pune'),(240,'Shirur','Pune'),(241,'Khed','Pune'),(242,'Mawal','Pune'),(243,'Mulshi','Pune'),(244,'Haveli','Pune'),(245,'Pune City','Pune'),(246,'Daund','Pune'),(247,'Purandhar','Pune'),(248,'Velhe','Pune'),(249,'Bhor','Pune'),(250,'Baramati','Pune'),(251,'Indapur','Pune'),(252,'Akole','Ahmadnagar'),(253,'Sangamner','Ahmadnagar'),(254,'Kopargaon','Ahmadnagar'),(255,'Rahta','Ahmadnagar'),(256,'Shrirampur','Ahmadnagar'),(257,'Nevasa','Ahmadnagar'),(258,'Shevgaon','Ahmadnagar'),(259,'Pathardi','Ahmadnagar'),(260,'Nagar','Ahmadnagar'),(261,'Rahuri','Ahmadnagar'),(262,'Parner','Ahmadnagar'),(263,'Shrigonda','Ahmadnagar'),(264,'Karjat','Ahmadnagar'),(265,'Jamkhed','Ahmadnagar'),(266,'Ashti','Beed'),(267,'Patoda','Beed'),(268,'Shirur (Kasar)','Beed'),(269,'Georai','Beed'),(270,'Manjlegaon','Beed'),(271,'Wadwani','Beed'),(272,'Beed','Beed'),(273,'Kaij','Beed'),(274,'Dharur','Beed'),(275,'Parli','Beed'),(276,'Ambejogai','Beed'),(277,'Latur','Latur'),(278,'Renapur','Latur'),(279,'Ahmadpur','Latur'),(280,'Jalkot','Latur'),(281,'Chakur','Latur'),(282,'Shirur-Anantpal','Latur'),(283,'Ausa','Latur'),(284,'Nilanga','Latur'),(285,'Deoni','Latur'),(286,'Udgir','Latur'),(287,'Paranda','Osmanabad'),(288,'Bhum','Osmanabad'),(289,'Washi','Osmanabad'),(290,'Kalamb','Osmanabad'),(291,'Osmanabad','Osmanabad'),(292,'Tuljapur','Osmanabad'),(293,'Lohara','Osmanabad'),(294,'Umarga','Osmanabad'),(295,'Karmala','Solapur'),(296,'Madha','Solapur'),(297,'Barshi','Solapur'),(298,'Solapur North','Solapur'),(299,'Mohol','Solapur'),(300,'Pandharpur','Solapur'),(301,'Malshiras','Solapur'),(302,'Sangole','Solapur'),(303,'Mangalvedhe','Solapur'),(304,'Solapur South','Solapur'),(305,'Akkalkot','Solapur'),(306,'Mahabaleshwar','Satara'),(307,'Wai','Satara'),(308,'Khandala','Satara'),(309,'Phaltan','Satara'),(310,'Man','Satara'),(311,'Khatav','Satara'),(312,'Koregaon','Satara'),(313,'Satara','Satara'),(314,'Jaoli','Satara'),(315,'Patan','Satara'),(316,'Karad','Satara'),(317,'Mandangad','Ratnagiri'),(318,'Dapoli','Ratnagiri'),(319,'Khed','Ratnagiri'),(320,'Chiplun','Ratnagiri'),(321,'Guhagar','Ratnagiri'),(322,'Ratnagiri','Ratnagiri'),(323,'Sangameshwar','Ratnagiri'),(324,'Lanja','Ratnagiri'),(325,'Rajapur','Ratnagiri'),(326,'Devgad','Sindhudurg'),(327,'Vaibhavvadi','Sindhudurg'),(328,'Kankavli','Sindhudurg'),(329,'Malwan','Sindhudurg'),(330,'Vengurla','Sindhudurg'),(331,'Kudal','Sindhudurg'),(332,'Sawantwadi','Sindhudurg'),(333,'Dodamarg','Sindhudurg'),(334,'Shahuwadi','Kolhapur'),(335,'Panhala','Kolhapur'),(336,'Hatkanangle','Kolhapur'),(337,'Shirol','Kolhapur'),(338,'Karvir','Kolhapur'),(339,'Bavda','Kolhapur'),(340,'Radhanagari','Kolhapur'),(341,'Kagal','Kolhapur'),(342,'Bhudargad','Kolhapur'),(343,'Ajra','Kolhapur'),(344,'Gadhinglaj','Kolhapur'),(345,'Chandgad','Kolhapur'),(346,'Shirala','Sangli'),(347,'Walwa','Sangli'),(348,'Palus','Sangli'),(349,'Kadegaon','Sangli'),(350,'Khanapur','Sangli'),(351,'Atpadi','Sangli'),(352,'Tasgaon','Sangli'),(353,'Miraj','Sangli'),(354,'Kavathemahankal','Sangli'),(355,'Jat','Sangli'),(360,'Mumbai','Mumbai-City'),(361,'Kurla','Mumbai-Suburban'),(362,'Boriwali','Mumbai-Suburban'),(363,'Andheri','Mumbai-Suburban'),(365,'Pulgaon','Wardha');
/*!40000 ALTER TABLE `district_talukas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duplicate_certificate_documents`
--

DROP TABLE IF EXISTS `duplicate_certificate_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duplicate_certificate_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `annexture_a` varchar(155) NOT NULL,
  `annexture_b` varchar(155) NOT NULL,
  `identity_proof` varchar(155) NOT NULL,
  `mscit_certificate` varchar(155) NOT NULL,
  `marks_statement` varchar(155) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `offline_status` char(1) NOT NULL,
  `direct_approve` char(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duplicate_certificate_documents`
--

LOCK TABLES `duplicate_certificate_documents` WRITE;
/*!40000 ALTER TABLE `duplicate_certificate_documents` DISABLE KEYS */;
INSERT INTO `duplicate_certificate_documents` VALUES (1,7676637510,276766375101,'7676637510_1668492041_sample_(3).pdf','7676637510_1668492041_sample_(3)1.pdf','7676637510_1668492041_sample_(3)3.pdf','7676637510_1668492041_sample_(3)2.pdf','7676637510_1668493145_sample_(3).pdf',2,'A','A','','2022-11-15 11:30:41','2022-11-15 06:19:45'),(2,8888775455,288887754551,'Direct Approve','Direct Approve','Direct Approve','Direct Approve','Direct Approve',2,'A','A','1','2022-11-15 11:55:54','2022-11-15 06:25:54'),(3,7676637510,276766375102,'7676637510_1668498286_sample_(3).pdf','7676637510_1668498286_sample_(3)1.pdf','7676637510_1668498286_sample_(2).pdf','','',2,'A','A','1','2022-11-15 13:14:46','2022-11-15 08:39:17'),(4,7676637510,276766375104,'7676637510_1669809476_sample_(4).pdf','7676637510_1669809476_sample_(4)1.pdf','7676637510_1669809476_sample_(4)3.pdf','7676637510_1669809476_sample_(4)2.pdf','',2,NULL,'','','2022-11-30 17:27:56','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `duplicate_certificate_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equivelance_document`
--

DROP TABLE IF EXISTS `equivelance_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equivelance_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `all_markslist` varchar(155) NOT NULL,
  `board_certificate` varchar(155) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `offline_status` char(1) NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `student_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equivelance_document`
--

LOCK TABLES `equivelance_document` WRITE;
/*!40000 ALTER TABLE `equivelance_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `equivelance_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `name_correction`
--

DROP TABLE IF EXISTS `name_correction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `name_correction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `candidate_name` varchar(55) NOT NULL,
  `seat_enroll` varchar(55) NOT NULL,
  `mkcl_id` varchar(55) NOT NULL,
  `examination_date` date NOT NULL,
  `candidate_address` varchar(155) NOT NULL,
  `city_village` varchar(55) NOT NULL,
  `district` varchar(20) NOT NULL,
  `taluka` varchar(25) NOT NULL,
  `pin_code` int(4) NOT NULL,
  `mobile_number` bigint(11) NOT NULL,
  `telephone_number` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `acl_number` varchar(55) NOT NULL,
  `acl_name` varchar(55) NOT NULL,
  `acl_address` varchar(155) NOT NULL,
  `acl_city_village` varchar(55) NOT NULL,
  `acl_district` varchar(20) NOT NULL,
  `acl_taluka` varchar(25) NOT NULL,
  `acl_pin_code` int(4) NOT NULL,
  `acl_email` varchar(55) NOT NULL,
  `acl_mobile_number` bigint(11) NOT NULL,
  `acl_telephone_number` varchar(15) NOT NULL,
  `incorrect_name` varchar(55) NOT NULL,
  `corrected_name` varchar(55) NOT NULL,
  `ifsc_code` varchar(15) NOT NULL,
  `bank_name_addr` varchar(555) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `account_no` varchar(30) NOT NULL,
  `student_status` varchar(1) NOT NULL,
  `admin_status` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `offline_status` char(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `direct_approve` char(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `student_status` (`student_status`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `name_correction`
--

LOCK TABLES `name_correction` WRITE;
/*!40000 ALTER TABLE `name_correction` DISABLE KEYS */;
INSERT INTO `name_correction` VALUES (1,7676637510,276766375101,'azar desai','12345678','12345','2022-11-15','test address','test village','Ahmadnagar','Nagar',416002,7676637510,'0231545555','azrodesai@gmail.com','123456','test ALC Name','Test ALC Address','test city name','Buldhana','Motala',400052,'test@gmail.com',7676637510,'0231-25455556','Test Test Test','Test Test Test','','','','','','','A','A',2,'','2022-11-15 10:58:04','2022-11-15 05:34:53'),(2,8888775455,288887754551,'azar desai','123456782','1234533','2022-11-15','cfdfdf','sdfdfs','Hingoli','Aundha (Nagnath)',416002,7676637510,'0231545555','azrodesai@gmail.com','123456','test ALC Name','Test ALC Address','fdsfdf','Bhandara','Sakoli',400052,'test@gmail.com',7676637510,'0231-25455556','Test Test Test','Test Test Test','','','','','','','A','A',2,'1','2022-11-15 11:08:13','2022-11-15 05:38:46'),(3,7676637510,276766375102,'Azar Desai','12345678','','0000-00-00','287 c ward somwar peth kolhapur','Karveer','Kolhapur','Karvir',416002,7676637506,'','azrodesai@gmail.com','','','','','','',0,'',0,'','Azar Desai','Azroddin desai','','','','','','','','',2,'','2022-11-15 12:58:18','0000-00-00 00:00:00'),(4,9420231506,294202315061,'Azar A Desai','123456782','123453311','0000-00-00','287 c ward somwar peth kolhapur','Karveer','Kolhapur','',416002,767663,'','azar@bynaric.in','','','','','','',0,'',0,'','Azar Desai','Azroddin desai','','','','','','','','',2,'','2022-11-15 14:25:08','0000-00-00 00:00:00'),(5,9665166428,296651664281,'ABC','8169','3211115','2022-12-31','ABC','Panvel','Raigad','Panvel',410206,999999,'','akash@gmail.com','','','','','','',0,'',0,'','ABC','AABC','','','','','','','A','A',2,'','2022-11-19 11:27:15','2022-11-19 06:04:55'),(6,7676637510,276766375103,'Akash Walke','778899','321133211311','2022-11-03','Xyz','xyz','Raigad','Panvel',410206,9820549750,'8652303565','abc@gmail.com','123','xyz','','','','',0,'',0,'','AAKASH WALKE','AKASH WALKE','','','','','','','A','A',2,'','2022-11-28 17:25:50','2022-11-28 12:02:26'),(7,7676637510,276766375104,'azar desai','22345678','12345','2022-11-30','287 c ward somwar peth kolhapur','test village','Kolhapur','Shahuwadi',416002,7676637510,'','azrodesai@gmail.com','','','','','','',0,'',0,'','Test Test Test','Test Test Test','HDFC0000835','HDFC Bank,GROUND FLOOR, UNIT NO 001A, HALLMARK BUSINESS PLAZA , NEW COLLECTOR OFFICE, BANDRA EAST MUMBAI MAHARASHTRA 400051','BANDRA EAST - KALANAGAR','12345','','','','',2,'','2022-11-30 15:35:41','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `name_correction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `name_correction_documents`
--

DROP TABLE IF EXISTS `name_correction_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `name_correction_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `annexture_b` varchar(155) NOT NULL,
  `identity_proof` varchar(155) NOT NULL,
  `mscit_certificate` varchar(155) NOT NULL,
  `marks_statement` varchar(155) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `offline_status` char(1) NOT NULL,
  `direct_approve` char(1) NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `student_status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `name_correction_documents`
--

LOCK TABLES `name_correction_documents` WRITE;
/*!40000 ALTER TABLE `name_correction_documents` DISABLE KEYS */;
INSERT INTO `name_correction_documents` VALUES (1,7676637510,276766375101,'7676637510_1668490246_sample_(3).pdf','7676637510_1668490443_sample_(3).pdf','7676637510_1668490246_sample_(3)1.pdf','7676637510_1668490246_sample_(3)3.pdf',2,'A','A','','2022-11-15 05:34:53','2022-11-15 11:00:46'),(2,7676637510,276766375101,'7676637510_1668490282_sample_(3).pdf','7676637510_1668490282_sample_(3)2.pdf','7676637510_1668490282_sample_(3)1.pdf','7676637510_1668490282_sample_(3)3.pdf',2,'A','A','','2022-11-15 05:34:53','2022-11-15 11:01:22'),(3,8888775455,288887754551,'Direct Approve','Direct Approve','Direct Approve','Direct Approve',2,'A','A','1','2022-11-15 05:38:46','2022-11-15 11:08:46'),(4,7676637510,276766375102,'','7676637510_1668497515_sample_(3)1.pdf','7676637510_1668497515_sample_(3).pdf','7676637510_1668497515_sample_(3)2.pdf',2,NULL,'','','0000-00-00 00:00:00','2022-11-15 13:01:55'),(5,7676637510,276766375102,'','7676637510_1668497553_sample_(3)1.pdf','7676637510_1668497553_sample_(3).pdf','7676637510_1668497553_sample_(3)2.pdf',2,NULL,'','','0000-00-00 00:00:00','2022-11-15 13:02:33'),(6,9665166428,296651664281,'','9665166428_1668837531_MMR_KYN.pdf','9665166428_1668837531_aurangbad_status.pdf','9665166428_1668837531_MMR_KYN1.pdf',2,'A','A','','2022-11-19 06:04:55','2022-11-19 11:28:51'),(7,7676637510,276766375103,'','7676637510_1669636613_sample1.pdf','7676637510_1669636613_sample.pdf','7676637510_1669636613_sample2.pdf',2,'A','A','','2022-11-28 12:02:26','2022-11-28 17:26:53'),(8,7676637510,276766375104,'','7676637510_1669802928_sample_(3)1.pdf','7676637510_1669802928_sample_(3).pdf','7676637510_1669802928_sample_(3)2.pdf',2,NULL,'','','0000-00-00 00:00:00','2022-11-30 15:38:48'),(9,8600402442,286004024421,'','8600402442_1671047643_aurangabad_industry_4_0_(1)1.pdf','8600402442_1671047643_aurangabad_industry_4_0_(1).pdf','8600402442_1671047643_aurangabad_industry_4_0_(1)2.pdf',2,NULL,'','','0000-00-00 00:00:00','2022-12-15 01:24:03');
/*!40000 ALTER TABLE `name_correction_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paystatus`
--

DROP TABLE IF EXISTS `paystatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paystatus` (
  `id` bigint(6) NOT NULL AUTO_INCREMENT,
  `app_id` bigint(20) NOT NULL,
  `easebuzz` varchar(50) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `amt` varchar(50) NOT NULL,
  `f_code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` bigint(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sub_type` char(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `response_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `txnid_2` (`trans_id`),
  KEY `mmm_txn` (`easebuzz`),
  KEY `sid` (`app_id`),
  KEY `inst_id` (`app_id`),
  KEY `txnid` (`trans_id`),
  KEY `amt` (`amt`),
  KEY `region_code` (`username`),
  KEY `uid` (`app_id`,`easebuzz`,`trans_id`,`amt`,`f_code`,`status`,`type`),
  FULLTEXT KEY `f_code` (`f_code`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paystatus`
--

LOCK TABLES `paystatus` WRITE;
/*!40000 ALTER TABLE `paystatus` DISABLE KEYS */;
INSERT INTO `paystatus` VALUES (1,276766375101,'','STC1668490246','1.00','','','azrodesai@gmail.com','7676637510',276766375101,'2','','2022-11-15 05:31:13',NULL),(2,276766375101,'TRRRE4TP9M','STC1668490282','1.0','Ok','success','azrodesai@gmail.com','7676637510',276766375101,'2','NC','2022-11-15 05:31:26','15-11-2022 11:01:52 am'),(3,288887754551,'T1ZO0L3NM2','STC1668491461','1.0','Ok','success','azrodesai@gmail.com','7676637510',288887754551,'2','NC','2022-11-15 05:54:27','15-11-2022 11:24:38 am'),(4,276766375101,'TCB20VLZ4A','STC1668492804','1.0','Ok','success','azrodesai@gmail.com','7676637510',276766375101,'2','DC','2022-11-15 06:13:33','15-11-2022 11:43:42 am'),(5,288887754551,'','STC1668493817','1.00','','','azar@bynaric.in','7676637510',288887754551,'2','','2022-11-15 06:30:19',NULL),(6,288887754551,'TM2T6R3BFT','STC1668493881','1.0','Ok','success','azar@bynaric.in','7676637510',288887754551,'2','DC','2022-11-15 06:31:27','15-11-2022 12:01:41 pm'),(7,276766375102,'','STC1668497515','1.00','','','azrodesai@gmail.com','7676637506',276766375102,'2','','2022-11-15 07:32:26',NULL),(8,276766375102,'T5SBEIJFOH','STC1668498515','1.0','Ok','success','azrodesai@gmail.com','7676637506',276766375102,'2','NC','2022-11-15 07:49:18','15-11-2022 13:19:29 pm'),(9,276766375102,'TOU2PW1TDF','STC1668498519','1.0','Ok','success','azar@bynaric.in','7676637510',276766375102,'2','DC','2022-11-15 07:51:46','15-11-2022 13:21:58 pm'),(10,296651664281,'T8QTVGUWJO','STC1668837531','1.0','Ok','success','akash@gmail.com','999999',296651664281,'2','NC','2022-11-19 05:58:58','19-11-2022 11:29:42 am'),(11,276766375103,'TVT9YL04PO','STC1669636613','1.0','Ok','success','abc@gmail.com','9820549750',276766375103,'2','NC','2022-11-28 11:56:55','28-11-2022 17:28:08 pm'),(12,276766375104,'','STC1669802928','1.00','','','azrodesai@gmail.com','7676637510',276766375104,'2','','2022-11-30 10:09:45',NULL),(13,276766375104,'','STC1669803392','600.00','','','azrodesai@gmail.com','7676637510',276766375104,'2','','2022-11-30 10:16:34',NULL),(17,276766375104,'T78TE2GCNE','STC1670477375','600.0','Ok','success','azrodesai@gmail.com','7676637510',276766375104,'2','NC','2022-12-08 05:29:39','08-12-2022 10:59:49 am'),(16,276766375104,'','STC1670477181','600.00','','','azrodesai@gmail.com','7676637510',276766375104,'2','','2022-12-08 05:26:25',NULL);
/*!40000 ALTER TABLE `paystatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_doc_bank`
--

DROP TABLE IF EXISTS `ps_doc_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_doc_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `paper_doc` varchar(255) NOT NULL,
  `paper_doc1` varchar(255) NOT NULL,
  `ifsc_code` varchar(15) NOT NULL,
  `bank_name_addr` varchar(555) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `account_no` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL,
  `role` varchar(5) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(10) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_doc_bank`
--

LOCK TABLES `ps_doc_bank` WRITE;
/*!40000 ALTER TABLE `ps_doc_bank` DISABLE KEYS */;
INSERT INTO `ps_doc_bank` VALUES (1,'82310PS1','82310PS1_1671700040_paper_setter_1.docx','','SBIN0000276','State Bank of India,DIST  RAIGAD, MAHARASHTRA 402104','MANGAON','1234567','','PS','2022-12-22 14:37:20','','0000-00-00 00:00:00'),(2,'8888775455','','','SBIN0012842','State Bank of India,,WARANANAGAR,TAL PANHALA DISTT KOLHAPUR,DISTKOLHAPUR416113','WARANANAGAR','123456789','','CH','2022-12-22 14:40:10','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ps_doc_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(500) NOT NULL,
  `enroll` varchar(12) NOT NULL,
  `uid` int(7) unsigned zerofill DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `ip_addr` varchar(20) DEFAULT NULL,
  `starttime` varchar(20) DEFAULT NULL,
  `endtime` varchar(20) DEFAULT NULL,
  `start_on` varchar(30) NOT NULL,
  `end_on` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enroll` (`enroll`),
  KEY `end_on` (`end_on`),
  KEY `session_id` (`session_id`,`enroll`,`uid`,`role`),
  FULLTEXT KEY `enroll_2` (`enroll`),
  FULLTEXT KEY `end_on_2` (`end_on`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (1,'ma1kbva3imu91ubqhasr380g26mn6tj7','7676637510',4294967295,'2','115.111.250.70','15-11-2022 05:26:48 ',NULL,'15-11-2022 05:26:48 am',''),(2,'rr0fpj3d0gr1avvgtsev8olvjgcksgtd','9999999999',4294967295,'1','115.111.250.70','15-11-2022 05:29:10 ','15-11-2022 05:29:19 ','15-11-2022 05:29:10 am','15-11-2022 05:29:19 am'),(3,'53qf742of3rn7hd3trroh98dbvb24tj0','9999999999',4294967295,'2','115.111.250.70','15-11-2022 05:29:42 ',NULL,'15-11-2022 05:29:42 am',''),(4,'j60rt25chlum9oirtekv7p5uapjshrob','7676637510',4294967295,'2','115.111.250.70','15-11-2022 05:32:17 ','15-11-2022 05:36:52 ','15-11-2022 05:32:17 am','15-11-2022 05:36:52 am'),(5,'6pf1fs8j7u0g96rvqr6bkfh12ebsb50p','8888775455',4294967295,'2','115.111.250.70','15-11-2022 05:37:16 ',NULL,'15-11-2022 05:37:16 am',''),(6,'fbo2val22j0issi8p2j92u00q55vi06a','8888775455',4294967295,'2','115.111.250.70','15-11-2022 05:55:05 ','15-11-2022 05:56:28 ','15-11-2022 05:55:05 am','15-11-2022 05:56:28 am'),(7,'7q9mm63365q1oqh57i8jpdb932fn75ki','7676637510',4294967295,'2','115.111.250.70','15-11-2022 05:56:46 ',NULL,'15-11-2022 05:56:46 am',''),(8,'h8e0mriq8s9hq4gc9r6j5rdd6vatljkb','7676637510',4294967295,'2','115.111.250.70','15-11-2022 06:13:58 ','15-11-2022 06:14:03 ','15-11-2022 06:13:58 am','15-11-2022 06:14:03 am'),(9,'m8ejkqibjmd4j7rmd1m879e6fub2sols','7676637510',4294967295,'2','115.111.250.70','15-11-2022 06:14:13 ','15-11-2022 06:24:14 ','15-11-2022 06:14:13 am','15-11-2022 06:24:14 am'),(10,'7hgptucodvo74rr9alpasflappfsu9mg','8888775455',4294967295,'2','115.111.250.70','15-11-2022 06:24:32 ',NULL,'15-11-2022 06:24:32 am',''),(11,'bstdqsihrvr5l9469trugk45qjcjmf9f','8888775455',4294967295,'2','115.111.250.70','15-11-2022 06:32:24 ','15-11-2022 06:50:26 ','15-11-2022 06:32:24 am','15-11-2022 06:50:26 am'),(12,'8eq1pjs787hhklvatc5kb36bvikubv12','7676637510',4294967295,'2','115.111.250.70','15-11-2022 06:38:52 ','15-11-2022 06:39:04 ','15-11-2022 06:38:52 am','15-11-2022 06:39:04 am'),(13,'g7cio9r34k2ol0sojj00u9qvqt41rvgb','9420231506',4294967295,'2','115.111.250.70','15-11-2022 06:39:15 ','15-11-2022 06:40:47 ','15-11-2022 06:39:15 am','15-11-2022 06:40:47 am'),(14,'2hgcte6bhc0v6ltuomm3lf0i246q43pj','9420231506',4294967295,'2','115.111.250.70','15-11-2022 06:40:58 ','15-11-2022 06:41:22 ','15-11-2022 06:40:58 am','15-11-2022 06:41:22 am'),(15,'ve26cs8512ase1t0h9lqo7he4ig26alf','7676637510',4294967295,'2','115.111.250.70','15-11-2022 06:52:15 ','15-11-2022 07:32:49 ','15-11-2022 06:52:15 am','15-11-2022 07:32:49 am'),(16,'5maq3ccpm13iqk4r34se4jl07gdkom3i','7676637510',4294967295,'2','115.111.250.70','15-11-2022 07:33:05 ','15-11-2022 07:48:30 ','15-11-2022 07:33:05 am','15-11-2022 07:48:30 am'),(17,'725lm8vjkjn3uhnpedmmg693952rna72','7676637510',4294967295,'2','115.111.250.70','15-11-2022 07:47:46 ',NULL,'15-11-2022 07:47:46 am',''),(18,'3cenqff912scgrqavl9u1bb7q3ljnua5','9999999999',4294967295,'2','115.111.250.70','15-11-2022 07:49:00 ','15-11-2022 08:57:25 ','15-11-2022 07:49:00 am','15-11-2022 08:57:25 am'),(19,'9r4abv3bdsn0p4v8j40bdnd14u2n4duu','7676637510',4294967295,'2','115.111.250.70','15-11-2022 07:58:21 ','15-11-2022 08:52:15 ','15-11-2022 07:58:21 am','15-11-2022 08:52:15 am'),(20,'4n0hq55lckdu3it4jddd653ciq3ute5a','7676637510',4294967295,'2','115.111.250.70','15-11-2022 07:58:36 ','15-11-2022 08:55:51 ','15-11-2022 07:58:36 am','15-11-2022 08:55:51 am'),(21,'tt39l38om6vrrg84efqmaqjtb78e7b9h','9420231506',4294967295,'2','115.111.250.70','15-11-2022 08:52:32 ','15-11-2022 09:04:00 ','15-11-2022 08:52:32 am','15-11-2022 09:04:00 am'),(22,'s3frcn1g7k4u27fjoo5s73n926556c18','9420231506',4294967295,'2','115.111.250.70','15-11-2022 08:56:07 ','15-11-2022 08:57:33 ','15-11-2022 08:56:07 am','15-11-2022 08:57:33 am'),(23,'275fatp1tokgfj83dmh0ek2jtm7v6rk7','7676637510',4294967295,'1','115.111.250.70','17-11-2022 10:01:26 ',NULL,'17-11-2022 10:01:26 am',''),(24,'qif2cvt8go4khqajou7br4fm99ir3iri','7676637510',4294967295,'2','183.87.23.192','19-11-2022 05:45:38 ','19-11-2022 05:45:50 ','19-11-2022 05:45:38 am','19-11-2022 05:45:50 am'),(25,'7lsi7453qqciq60huitn5grsuo2j7iri','9665166428',4294967295,'2','183.87.23.192','19-11-2022 05:48:52 ','19-11-2022 05:49:08 ','19-11-2022 05:48:52 am','19-11-2022 05:49:08 am'),(26,'bdok5sueda9uj3o1sp32oi706l9d1jpa','9665166428',4294967295,'1','183.87.23.192','19-11-2022 05:49:17 ','19-11-2022 05:49:30 ','19-11-2022 05:49:17 am','19-11-2022 05:49:30 am'),(27,'fn6sopphdsi58krk2a0gop2mpk3fn1fc','9665166428',4294967295,'2','183.87.23.192','19-11-2022 05:49:39 ',NULL,'19-11-2022 05:49:39 am',''),(28,'q7po9k3k9lqrted1ncqqrht4eb305ma1','9665166428',4294967295,'2','183.87.23.192','19-11-2022 06:01:18 ',NULL,'19-11-2022 06:01:18 am',''),(29,'tvso5cvib7b17n6sa0hjg6n7c72k0u1c','9999999999',4294967295,'2','183.87.23.192','19-11-2022 06:02:38 ',NULL,'19-11-2022 06:02:38 am',''),(30,'jldj8hd5lj1lprkpt9ad749t4660pvuo','7676637510',4294967295,'2','115.111.250.70','28-11-2022 05:49:21 ','28-11-2022 05:49:49 ','28-11-2022 05:49:21 am','28-11-2022 05:49:49 am'),(31,'o78l079sun9a3qeqp3lmv67espp3j4j9','9999999999',4294967295,'2','115.111.250.70','28-11-2022 05:50:10 ','28-11-2022 05:51:12 ','28-11-2022 05:50:10 am','28-11-2022 05:51:12 am'),(32,'p0kl6gsr928jl8e8kt45u8uv098v2fih','7676637510',4294967295,'2','115.111.250.70','28-11-2022 05:51:26 ','28-11-2022 06:18:08 ','28-11-2022 05:51:26 am','28-11-2022 06:18:08 am'),(33,'drrpbh6qlck92flaoihlvq6hrsipj28h','7676637510',4294967295,'2','115.111.250.70','28-11-2022 06:18:19 ','28-11-2022 06:22:36 ','28-11-2022 06:18:19 am','28-11-2022 06:22:36 am'),(34,'us6e42esnnhbsu25bg80uqkc34q26noa','9999999999',4294967295,'2','115.111.250.70','28-11-2022 06:24:03 ','28-11-2022 07:22:01 ','28-11-2022 06:24:03 am','28-11-2022 07:22:01 am'),(35,'67ddas0odu01j423kih460rque5vjjr6','7676637510',4294967295,'2','115.111.250.70','28-11-2022 07:00:52 ','28-11-2022 07:02:13 ','28-11-2022 07:00:52 am','28-11-2022 07:02:13 am'),(36,'o9r8t0415imou281m5gg01ckei44msv6','7676637510',4294967295,'1','115.111.250.70','28-11-2022 07:34:28 ','28-11-2022 07:35:17 ','28-11-2022 07:34:28 am','28-11-2022 07:35:17 am'),(37,'2cmil66h1refgsqpn46cltonjjo0ivgk','9999999999',4294967295,'2','115.111.250.70','28-11-2022 09:20:34 ','28-11-2022 09:21:07 ','28-11-2022 09:20:34 am','28-11-2022 09:21:07 am'),(38,'3or5ltki6agbu0i5ohcq136jclu0ba5c','7676637510',4294967295,'2','115.111.250.70','28-11-2022 09:22:41 ','28-11-2022 09:50:46 ','28-11-2022 09:22:41 am','28-11-2022 09:50:46 am'),(39,'nlqf6tkhqkcepq0hgu6os72jahcbqflc','7676637510',4294967295,'2','115.111.250.70','28-11-2022 09:50:59 ','28-11-2022 10:06:27 ','28-11-2022 09:50:59 am','28-11-2022 10:06:27 am'),(40,'ece8kjmelmcptn22vedolvg8dracdvd8','9999999999',4294967295,'2','115.111.250.70','28-11-2022 11:51:57 ','28-11-2022 12:42:17 ','28-11-2022 11:51:57 am','28-11-2022 12:42:17 pm'),(41,'e9cdifcs8l2vauupk2i09lb48d3nn32u','7676637510',4294967295,'2','115.111.250.70','28-11-2022 11:53:33 ',NULL,'28-11-2022 11:53:33 am',''),(42,'55dlnecegpg2sqa5semi3fp6r5bug4j0','7676637510',4294967295,'2','115.111.250.70','28-11-2022 11:59:18 ','28-11-2022 12:23:37 ','28-11-2022 11:59:18 am','28-11-2022 12:23:37 pm'),(43,'ijj5htev1b87igdrtfipmqlko249b9ii','7676637510',4294967295,'2','115.111.250.70','30-11-2022 09:34:13 ',NULL,'30-11-2022 09:34:13 am',''),(44,'32ppf0ue7rg1u6eitl6al3kpv68k5p38','7676637510',4294967295,'2','115.111.250.70','30-11-2022 10:17:40 ','30-11-2022 10:55:36 ','30-11-2022 10:17:40 am','30-11-2022 10:55:36 am'),(45,'gv2shkk9s91lr6p3h1igb9mbi68aeeu4','7676637510',4294967295,'2','115.111.250.70','30-11-2022 11:20:33 ',NULL,'30-11-2022 11:20:33 am',''),(46,'jeu4q0hu032bqqucv209ct8ka8fm6tdi','7676637510',4294967295,'2','115.111.250.70','30-11-2022 11:58:22 ','30-11-2022 12:45:13 ','30-11-2022 11:58:22 am','30-11-2022 12:45:13 pm'),(47,'u4fk367sf3l4dbaau0scsdj2ctsh1m5m','9999999999',4294967295,'2','115.111.250.70','30-11-2022 12:05:50 ','30-11-2022 12:13:04 ','30-11-2022 12:05:50 pm','30-11-2022 12:13:04 pm'),(48,'6gcvi14rkfq38vfpt63hsgb4qjsqahv4','9999999999',4294967295,'1','115.111.250.70','30-11-2022 12:15:34 ','30-11-2022 12:15:41 ','30-11-2022 12:15:34 pm','30-11-2022 12:15:41 pm'),(49,'8rdba3l7v4acgr60hg445vj5mot4of9q','9999999999',4294967295,'2','115.111.250.70','30-11-2022 12:15:52 ','30-11-2022 12:46:53 ','30-11-2022 12:15:52 pm','30-11-2022 12:46:53 pm'),(50,'2qfi1g6gffo46qa6im23bdk472bnirki','7676637510',4294967295,'2','110.224.121.154','01-12-2022 05:39:45 ','01-12-2022 06:11:10 ','01-12-2022 05:39:45 am','01-12-2022 06:11:10 am'),(51,'hrbti9bis4cmdris55b8q8k450hu0c3j','7676637510',4294967295,'2','110.224.121.154','01-12-2022 06:11:18 ','01-12-2022 06:57:33 ','01-12-2022 06:11:18 am','01-12-2022 06:57:33 am'),(52,'tahskkr9k5dk9rp6nfjm8a9cr8darpvv','7676637510',4294967295,'2','110.224.121.154','01-12-2022 06:57:42 ','01-12-2022 07:13:00 ','01-12-2022 06:57:42 am','01-12-2022 07:13:00 am'),(53,'7rqdqo8eicjtm4befhd9fgsc7106rofv','7676637510',4294967295,'2','110.224.121.154','01-12-2022 07:13:05 ','01-12-2022 07:13:40 ','01-12-2022 07:13:05 am','01-12-2022 07:13:40 am'),(54,'3c4ukrsniqcf9f1fneap4hn7vpsgrqoa','7676637510',4294967295,'2','110.224.121.154','01-12-2022 07:13:45 ','01-12-2022 07:24:09 ','01-12-2022 07:13:45 am','01-12-2022 07:24:09 am'),(55,'0eg6o8o1pmrgt3cekq112ssrv69qiqus','7676637510',4294967295,'2','110.224.121.154','01-12-2022 07:24:15 ','01-12-2022 07:24:55 ','01-12-2022 07:24:15 am','01-12-2022 07:24:55 am'),(56,'2msdme458s22t9e8a0slte8a93rit63k','7676637510',4294967295,'2','110.224.121.154','01-12-2022 07:27:48 ',NULL,'01-12-2022 07:27:48 am',''),(57,'9d20d17ocdhuklhaiec3b4lhv26oaudf','7676637510',4294967295,'2','110.224.121.154','01-12-2022 07:31:18 ',NULL,'01-12-2022 07:31:18 am',''),(58,'j9ocfbskqsf4s676roa01v67fueh2le8','7676637510',4294967295,'2','115.111.250.70','08-12-2022 05:19:40 ',NULL,'08-12-2022 05:19:40 am',''),(59,'ooe3609l5qs2csn006vk834riihhs44a','7676637510',4294967295,'2','115.111.250.70','08-12-2022 05:30:06 ','08-12-2022 07:03:40 ','08-12-2022 05:30:06 am','08-12-2022 07:03:40 am'),(60,'7k454436t26ngfhqo8q26a5dmvslt81b','7676637510',4294967295,'1','106.210.151.65','12-12-2022 13:35:43 ',NULL,'12-12-2022 13:35:43 pm',''),(61,'qt2gg3itp43rdm0fpkoklp662u0le9e0','9999999999',4294967295,'1','115.111.250.70','13-12-2022 07:54:14 ','13-12-2022 07:54:29 ','13-12-2022 07:54:14 am','13-12-2022 07:54:29 am'),(62,'9stea7p2uqcd03o142r93f12krsqjmq8','9999999999',4294967295,'1','115.111.250.70','13-12-2022 08:01:12 ','13-12-2022 08:01:15 ','13-12-2022 08:01:12 am','13-12-2022 08:01:15 am'),(63,'t4t46ll5oaj5qo5l0e5rapfmb7f8r4rd','7676637510',4294967295,'1','110.224.124.120','13-12-2022 09:25:23 ','13-12-2022 10:26:32 ','13-12-2022 09:25:23 am','13-12-2022 10:26:32 am'),(64,'ovo1c8d34crtjqljvlm4m4aefg3lhaek','7676637510',4294967295,'1','110.224.124.120','13-12-2022 10:30:16 ','13-12-2022 10:35:15 ','13-12-2022 10:30:16 am','13-12-2022 10:35:15 am'),(65,'5ct73o59r7umeg43c8bmuvs699to3uc4','7676637510',4294967295,'1','110.224.124.120','13-12-2022 10:35:43 ',NULL,'13-12-2022 10:35:43 am',''),(66,'uqtjv7dumqua6i5mo3hf55dl7qe2lu0c','7676637510',4294967295,'1','110.224.124.120','13-12-2022 11:27:50 ',NULL,'13-12-2022 11:27:50 am',''),(67,'29ac8ic75go9u8gc0qkaquf4un0975kc','8600402442',4294967295,'2','110.224.124.120','13-12-2022 11:37:03 ','13-12-2022 11:41:47 ','13-12-2022 11:37:03 am','13-12-2022 11:41:47 am'),(68,'or1lmf1v3h1b4nq0tu4i5dvlmkohs5ic','7676637510',4294967295,'1','110.224.124.120','13-12-2022 11:41:57 ','13-12-2022 11:42:05 ','13-12-2022 11:41:57 am','13-12-2022 11:42:05 am'),(69,'jj9ns91bg0f55u823fnvolq6bu2q9q2f','7676637510',4294967295,'2','110.224.124.120','13-12-2022 11:42:10 ','14-12-2022 19:00:29 ','13-12-2022 11:42:10 am','14-12-2022 19:00:29 pm'),(70,'qnbsdcvrb4tj9dtq9s62tfi7f1va1vvg','7676637510',4294967295,'1','49.36.123.64','14-12-2022 19:11:17 ','14-12-2022 19:11:33 ','14-12-2022 19:11:17 pm','14-12-2022 19:11:33 pm'),(71,'mch35iumm7hsuqemek8nr4j82h1a2spu','7676637510',4294967295,'2','49.36.123.64','14-12-2022 19:11:39 ','14-12-2022 19:13:58 ','14-12-2022 19:11:39 pm','14-12-2022 19:13:58 pm'),(72,'08763rtjb8quvh6093srs7ftq265jlg7','8600402442',4294967295,'2','49.36.123.64','14-12-2022 19:27:37 ','14-12-2022 19:28:13 ','14-12-2022 19:27:37 pm','14-12-2022 19:28:13 pm'),(73,'e3niva79odcprehtq5kn9u9ak32fpo4p','8600402442',4294967295,'2','49.36.123.64','14-12-2022 19:53:24 ','15-12-2022 04:10:35 ','14-12-2022 19:53:24 pm','15-12-2022 04:10:35 am'),(74,'bt5n1uqcu0n9sau9fhlmikq5gokvurkp','8600402442',4294967295,'1','49.36.123.64','15-12-2022 05:10:50 ','15-12-2022 05:11:01 ','15-12-2022 05:10:50 am','15-12-2022 05:11:01 am'),(75,'q2301fndog7667bgism1tnd0uk8tkquc','8600402442',4294967295,'2','49.36.123.64','15-12-2022 05:11:23 ','15-12-2022 05:11:59 ','15-12-2022 05:11:23 am','15-12-2022 05:11:59 am'),(76,'vtj7q5f6dk7bediq9gq3gub66rjj2o25','8600402442',4294967295,'2','49.36.123.64','15-12-2022 05:13:06 ','15-12-2022 05:19:30 ','15-12-2022 05:13:06 am','15-12-2022 05:19:30 am'),(77,'25n4pl49domr9ifn08e06chb5p0jtehs','8600402442',4294967295,'2','49.36.123.64','15-12-2022 05:22:33 ','15-12-2022 05:23:39 ','15-12-2022 05:22:33 am','15-12-2022 05:23:39 am'),(78,'q0rcdgm2dck371iuhbag7lf804edrmcj','8600402442',4294967295,'2','49.36.123.64','15-12-2022 05:32:06 ','15-12-2022 05:38:23 ','15-12-2022 05:32:06 am','15-12-2022 05:38:23 am'),(79,'hc754ne89okktr43ctcedd9kmnhoskjd','8600402442',4294967295,'2','49.36.123.64','15-12-2022 18:05:21 ',NULL,'15-12-2022 18:05:21 pm',''),(80,'hc754ne89okktr43ctcedd9kmnhoskjd','8600402442',4294967295,'2','49.36.123.64','15-12-2022 18:06:25 ','15-12-2022 18:07:51 ','15-12-2022 18:06:25 pm','15-12-2022 18:07:51 pm'),(81,'8vud5htd21o2r2u8rtf6sjofocsdo9p9','7676637510',4294967295,'2','49.36.123.64','15-12-2022 18:07:59 ',NULL,'15-12-2022 18:07:59 pm',''),(82,'8vud5htd21o2r2u8rtf6sjofocsdo9p9','7676637510',4294967295,'1','49.36.123.64','15-12-2022 18:08:37 ','15-12-2022 18:10:44 ','15-12-2022 18:08:37 pm','15-12-2022 18:10:44 pm'),(83,'ga0ke18qivpt7nbla9a9go6fk7s4v46s','8600402442',4294967295,'2','49.36.123.64','15-12-2022 18:10:52 ',NULL,'15-12-2022 18:10:52 pm',''),(84,'s9qiqi55ctn1lkmr11718l6m0i70sq8t','8600402442',4294967295,'2','115.111.250.70','16-12-2022 05:39:23 ',NULL,'16-12-2022 05:39:23 am',''),(85,'00mtv55m5bkamtnerd3dvs810pik1a4j','8600402442',4294967295,'1','182.70.98.239','16-12-2022 05:44:03 ',NULL,'16-12-2022 05:44:03 am',''),(86,'00mtv55m5bkamtnerd3dvs810pik1a4j','8600402442',4294967295,'2','182.70.98.239','16-12-2022 05:45:03 ','16-12-2022 05:45:51 ','16-12-2022 05:45:03 am','16-12-2022 05:45:51 am'),(87,'0j6eoseg8epqjhmnb7nrrelsjqkc3vvf','8888775455',4294967295,'1','115.111.250.70','17-12-2022 04:42:08 ','17-12-2022 04:49:19 ','17-12-2022 04:42:08 am','17-12-2022 04:49:19 am'),(88,'g249e3ik0hsclr2614ikghqmibjsm4n9','82310PS',0082310,NULL,'115.111.250.70','17-12-2022 04:52:20 ','17-12-2022 06:48:49 ','17-12-2022 04:52:20 am','17-12-2022 06:48:49 am');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `course_name` varchar(55) NOT NULL,
  `paper_code` int(5) NOT NULL,
  `semester` tinyint(2) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(55) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `orig_pass` varchar(55) NOT NULL,
  `role` varchar(5) NOT NULL,
  `parent` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'Dr. Mangesh S Ghodke ',9834750375,'mangeshsghodke@gmail.com ','Pharmacy','B.Pharmacy',82310,3,'BP301T','Pharmaceutical Organic Chem - II','Shreeyash Institute of Pharmaceutical Education and Research ','82310PS1','e8d58abe18aedd969a8add4159bd890b','82310PS1','PS',32),(10,'',0,'','','',0,0,'','','','admin@bynaric.in','827ccb0eea8a706c4c34a16891f84e7b','12345','ADMIN',0),(12,'Dr. Subhash T Kumbhar',9730292280,'subhkumbh1979@gmail.com','Pharmacy','B.Pharmacy',82310,3,'BP302T','Physical Pharmaceutics - I','IIPER, Talegaon ','82310PS2','1e316d071869a00f6a31e069c753fc10','82310PS2','PS',32),(13,'Ms. S S Kadam',9322469654,'seemakadam4776@gmail.com','Pharmacy','B.Pharmacy',82310,3,'BP303T','Pharmaceutical Micro.','Satara College of Pharmacy Satara','82310PS3','7cb489615957864e5d4d94b1235aa7ea','82310PS3','PS',32),(14,'Mr. Sheshgiri Nandkumar Gada',8446796085,'gadasheshgiri@gmail.com','Pharmacy','B.Pharmacy',82310,3,'BP304T','Pharmaceutical Engg.','VDF School of Pharmacy, Latur','82310PS4','6e49498fe0e7e11a659afc857e4dd8ed','82310PS4','PS',32),(15,'Dr. Wakale Vijaykumar Sidramappa ',9730485210,'vijaykumarw@gmail.com ','Pharmacy','B.Pharmacy',82310,5,'BP501T ','Medicinal Chemistry II','Samarth Institute of Pharmacy ','82310PS5','4d853c2df98d5233bc23aa78069aacaf','82310PS5','PS',32),(16,'Dr. Rahulkumar Damodhar Rahane ',8275452507,'rahuldrahane@rediffmail.com','Pharmacy','B.Pharmacy',82310,5,'BP502T ','Industrial PharmacyI','Matoshri Miratai Aher College of Pharmacy','82310PS6','5aa9df91bffcaf38ae0549f775dc2e49','82310PS6','PS',32),(17,'Dr. Tamboli Naziya Ashpak',9422644876,'naziya.aara@gmail.com','Pharmacy','B.Pharmacy',82310,5,'BP503T ','Pharmacology II','Sahyadri College of Pharmacy METHWADE SANGOLA','82310PS7','b2351759839dbc9298ff79f62f78618e','82310PS7','PS',33),(18,'Dr. Bindurani L G P Ram ',8007805987,'bindu.ram@dvcop.com','Pharmacy','B.Pharmacy',82310,5,'BP504T ','Pharmacognosy & Phytochem II','Dyanvilas college of Pharmacy  Dudulgaon Pune','82310PS8','d3743c37a44ba83b55a5fa7485c83d42','82310PS8','PS',33),(19,'Dr. KIRAN DAYARAM PATIL ',9766676113,'kiran.patil@svkm.ac.in','Pharmacy','B.Pharmacy',82310,5,'BP505T ','Pharmaceutical Jurisprudence','SVKM\'S Institute of Pharmacy Dhule ','82310PS9','d8d3ff7834bce2a5d6877a6ad2e54acb','82310PS9','PS',33),(20,'Dr. Avinash Mahadeo Bhagwat',9405250790,'avinashbhagwat25@gmail.com','Pharmacy','B.Pharmacy',82310,7,'BP701T','Instrumental Method of Analysis','YSPMs Yashoda Technical Campus, Faculty of Pharmacy, Wadhe','82310PS10','93e1c7309d58268477689a50ec71dff0','82310PS10','PS',33),(21,'Dr. Anjali Prashant Bedse ',9922766323,'apbedse@kkwagh.edu.in ','Pharmacy','B.Pharmacy',82310,7,'BP702T','Industrial Pharmacy -II','K K Wagh College of Pharmacy Nasik ','82310PS11','9fa0b157185bb82ca3ba27cf79b8a92a','82310PS11','PS',33),(22,'Mr. Atish B. Velhal',9881646969,'abv_bpharm@yes.edu.in ','Pharmacy','B.Pharmacy',82310,7,'BP703T','Pharmacy Practice','YSPM\'s, YTC, Faculty of Pharmacy, satara','82310PS12','1b86f067455178fe966c00f046626999','82310PS12','PS',33),(23,'Dr.Sachin Namdeo Kothawade',7588007076,'sachin.kothawade23@gmail.com','Pharmacy','B.Pharmacy',82310,7,'BP704T','Novel Drug Delivery System','RSM\'s N. N. Sattha College of Pharmacy, Ahmednagar','82310PS13','c06208435035cfa80d6d0397e9f80c47','82310PS13','PS',33),(33,'Azar Desai 1',7676637510,'azrodesai@vishumangal.com','','',0,0,'','','test inst name','azrodesai@vishumangal.com','6965780da0c8563157e00d78ac5a652d','azrodesai@vishumangal.com','CH',0),(32,'Azar Desai',7676637510,'azar@bynaric.in','','',0,0,'','','Test inst name','8888775455','f9e00ffb4de7628315b5688ff8d27b5a','8888775455','CH',0),(31,'Prathmesh',7676637510,'prathmesh@bynaric.in','BE','Test',82310,2,'test ','Test Subject','test inst name','82310PS31','78f1a0a5194c9f9e13b2a1ffecf28c43','82310PS31','PS',32),(34,'Deepak Patil',7676637510,'deepak@bynaric.in','','',0,0,'','','Test Institute Name','7676637510','34e9bf1d6122458b5b8e6dbe2ef03304','7676637510','CH',0),(35,'Akash Patil',8888775455,'akash.patil@bynaric.in','test','test',82310,2,'test','test','Test Institute Name','82310PS35','4dbbf523bf966009075c132034d5a663','82310PS35','PS',34),(36,'Prathmesh Godbole',7517065560,'prathmesh@bynaric.in','','',0,0,'','','TKIET, Warananagar','7517065560','3b94f5da54502c72cad3b6c837c56615','7517065560','CH',0),(37,'Prathmesh Godbole',7517065560,'prathmesh@bynaric.in','CSE','Computer Science Engineering',2205,2,'OS','Operating System','Tatyasaheb Kore Institute Of Engineering & Technology','2205PS37','ca45a25033ff6343962152f75c119264','2205PS37','PS',34);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-22 15:14:08
