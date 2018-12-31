-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `karakteristike`
--

DROP TABLE IF EXISTS `karakteristike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karakteristike` (
  `kke_id` int(11) NOT NULL AUTO_INCREMENT,
  `kke_naziv` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kke_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karakteristike`
--

LOCK TABLES `karakteristike` WRITE;
/*!40000 ALTER TABLE `karakteristike` DISABLE KEYS */;
INSERT INTO `karakteristike` VALUES (1,'Klima'),(2,'Boja'),(3,'Pogon'),(4,'Emisiona Klasa Motora');
/*!40000 ALTER TABLE `karakteristike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karakteristike_vrednosti`
--

DROP TABLE IF EXISTS `karakteristike_vrednosti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karakteristike_vrednosti` (
  `kkv_id` int(11) NOT NULL AUTO_INCREMENT,
  `kkv_vrednost` varchar(45) DEFAULT NULL,
  `kke_id` int(11) NOT NULL,
  PRIMARY KEY (`kkv_id`),
  KEY `fk_oprema_vrednosti_karakteristike1_idx` (`kke_id`),
  CONSTRAINT `fk_oprema_vrednosti_karakteristike1` FOREIGN KEY (`kke_id`) REFERENCES `karakteristike` (`kke_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karakteristike_vrednosti`
--

LOCK TABLES `karakteristike_vrednosti` WRITE;
/*!40000 ALTER TABLE `karakteristike_vrednosti` DISABLE KEYS */;
INSERT INTO `karakteristike_vrednosti` VALUES (1,'Dvozonska',1),(2,'Cetvorozonska',1),(3,'Manuelna',1),(4,'Bela',2),(5,'Crna',2),(6,'Plava',2),(7,'Crvena',2),(8,'Zadnji',3),(9,'Prednji',3),(10,'4motion',3),(11,'Euro 1',4),(12,'Euro 2',4),(13,'Euro 3',4),(14,'Euro 4',4),(15,'Euro 5',4),(16,'Euro 6',4);
/*!40000 ALTER TABLE `karakteristike_vrednosti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karoserija`
--

DROP TABLE IF EXISTS `karoserija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karoserija` (
  `kar_id` int(11) NOT NULL AUTO_INCREMENT,
  `kar_vrsta` varchar(45) NOT NULL,
  PRIMARY KEY (`kar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karoserija`
--

LOCK TABLES `karoserija` WRITE;
/*!40000 ALTER TABLE `karoserija` DISABLE KEYS */;
INSERT INTO `karoserija` VALUES (1,'Limuzina'),(2,'Karavan'),(3,'Kupe'),(4,'Kabriolet'),(5,'Dzip');
/*!40000 ALTER TABLE `karoserija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kkv_mod`
--

DROP TABLE IF EXISTS `kkv_mod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kkv_mod` (
  `mod_id` int(11) NOT NULL,
  `kkv_id` int(11) NOT NULL,
  KEY `fk_table1_modeli2_idx` (`mod_id`),
  KEY `fk_table1_karakteristike_vrednosti1_idx` (`kkv_id`),
  CONSTRAINT `fk_table1_karakteristike_vrednosti1` FOREIGN KEY (`kkv_id`) REFERENCES `karakteristike_vrednosti` (`kkv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_modeli2` FOREIGN KEY (`mod_id`) REFERENCES `modeli` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kkv_mod`
--

LOCK TABLES `kkv_mod` WRITE;
/*!40000 ALTER TABLE `kkv_mod` DISABLE KEYS */;
INSERT INTO `kkv_mod` VALUES (1,2),(1,5),(1,10),(1,16),(2,2),(2,5),(2,9),(2,16),(2,2),(2,5),(2,9),(2,13),(2,2),(2,5),(2,9),(2,13);
/*!40000 ALTER TABLE `kkv_mod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modeli`
--

DROP TABLE IF EXISTS `modeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modeli` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_naziv` varchar(45) NOT NULL,
  `mod_marka` varchar(20) NOT NULL,
  `mod_cena` double NOT NULL,
  `mod_opis` text,
  `kar_id` int(11) DEFAULT NULL,
  `mod_godiste` varchar(4) NOT NULL,
  `mod_gorivo` varchar(45) NOT NULL,
  `mod_broj_vrata` smallint(6) NOT NULL,
  `mod_garancija` varchar(4) DEFAULT NULL,
  `mod_menjac` char(1) DEFAULT NULL,
  `mod_motor` varchar(5) NOT NULL,
  `mod_slika` longtext,
  PRIMARY KEY (`mod_id`),
  KEY `fk_modeli_karoserija1_idx` (`kar_id`),
  CONSTRAINT `fk_modeli_karoserija1` FOREIGN KEY (`kar_id`) REFERENCES `karoserija` (`kar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modeli`
--

LOCK TABLES `modeli` WRITE;
/*!40000 ALTER TABLE `modeli` DISABLE KEYS */;
INSERT INTO `modeli` VALUES (1,'Passat','Volkswagen',23500,'Kao nov',1,'2018','Dizel',5,'2025','A','2.0','newslike/th.jpg'),(2,'Polo','Volkswagen',12345,'Kao Casa',3,'2018','Dizel',3,'2025','M','2.0','newslike/3D-model-2018-volkswagen-polo-gti_0.jpg');
/*!40000 ALTER TABLE `modeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `narudzbine`
--

DROP TABLE IF EXISTS `narudzbine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `narudzbine` (
  `nar_id` int(11) NOT NULL AUTO_INCREMENT,
  `nar_dostava_adresa` varchar(45) NOT NULL,
  PRIMARY KEY (`nar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `narudzbine`
--

LOCK TABLES `narudzbine` WRITE;
/*!40000 ALTER TABLE `narudzbine` DISABLE KEYS */;
INSERT INTO `narudzbine` VALUES (1,'Miliceva 6'),(2,'miliceva 16');
/*!40000 ALTER TABLE `narudzbine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opr_mod`
--

DROP TABLE IF EXISTS `opr_mod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opr_mod` (
  `opr_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  KEY `fk_opr_mod_oprema1_idx` (`opr_id`),
  KEY `fk_opr_mod_modeli1_idx` (`mod_id`),
  CONSTRAINT `fk_opr_mod_modeli1` FOREIGN KEY (`mod_id`) REFERENCES `modeli` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_opr_mod_oprema1` FOREIGN KEY (`opr_id`) REFERENCES `oprema` (`opr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opr_mod`
--

LOCK TABLES `opr_mod` WRITE;
/*!40000 ALTER TABLE `opr_mod` DISABLE KEYS */;
INSERT INTO `opr_mod` VALUES (119,1),(119,1),(120,2),(120,2),(120,2),(120,2),(121,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2),(122,2);
/*!40000 ALTER TABLE `opr_mod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oprema`
--

DROP TABLE IF EXISTS `oprema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oprema` (
  `opr_id` int(11) NOT NULL AUTO_INCREMENT,
  `opr_airbag` char(1) DEFAULT NULL,
  `opr_servo_volan` char(1) DEFAULT NULL,
  `opr_putni_racunar` char(1) DEFAULT NULL,
  `opr_siber` char(1) DEFAULT NULL,
  `opr_alarm` char(1) DEFAULT NULL,
  `opr_centralno_zakljucavanje` char(1) DEFAULT NULL,
  PRIMARY KEY (`opr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oprema`
--

LOCK TABLES `oprema` WRITE;
/*!40000 ALTER TABLE `oprema` DISABLE KEYS */;
INSERT INTO `oprema` VALUES (119,'1','1','1','1','1','1'),(120,'1','1','1','1','1','1'),(121,'0','0','1','1','0','0'),(122,'0','0','1','1','0','0');
/*!40000 ALTER TABLE `oprema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stavke`
--

DROP TABLE IF EXISTS `stavke`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stavke` (
  `stv_id` int(11) NOT NULL AUTO_INCREMENT,
  `stv_kolicina` double DEFAULT NULL,
  `stv_jedinicna_cena` double DEFAULT NULL,
  `mod_id` int(11) NOT NULL,
  `nar_id` int(11) NOT NULL,
  PRIMARY KEY (`stv_id`),
  KEY `fk_stavke_za-posiljku_modeli1_idx` (`mod_id`),
  KEY `fk_stavke_za-posiljku_narudzbine1_idx` (`nar_id`),
  CONSTRAINT `fk_stavke_za-posiljku_modeli1` FOREIGN KEY (`mod_id`) REFERENCES `modeli` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stavke_za-posiljku_narudzbine1` FOREIGN KEY (`nar_id`) REFERENCES `narudzbine` (`nar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stavke`
--

LOCK TABLES `stavke` WRITE;
/*!40000 ALTER TABLE `stavke` DISABLE KEYS */;
INSERT INTO `stavke` VALUES (5,3,23500,1,1),(9,3,23500,1,1);
/*!40000 ALTER TABLE `stavke` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(45) NOT NULL,
  `usr_lastname` varchar(45) NOT NULL,
  `nar_id` int(11) DEFAULT NULL,
  `usr_username` varchar(45) NOT NULL,
  `usr_password` varchar(45) NOT NULL,
  `usr_email` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`usr_id`),
  KEY `fk_kupci_narudzbine1_idx` (`nar_id`),
  CONSTRAINT `fk_kupci_narudzbine1` FOREIGN KEY (`nar_id`) REFERENCES `narudzbine` (`nar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Novica','Grbovic',1,'Noco','e10adc3949ba59abbe56e057f20f883e','grbovic@'),(2,'Ime','Prezime',2,'Ime','e10adc3949ba59abbe56e057f20f883e','Prezime');
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

-- Dump completed on 2018-12-27 13:58:19
