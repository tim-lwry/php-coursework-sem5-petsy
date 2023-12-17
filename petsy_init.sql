CREATE DATABASE  IF NOT EXISTS `petsy` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `petsy`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: petsy
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `info` text,
  `taken` tinyint(1) NOT NULL DEFAULT '0',
  `animal_race_fk` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `animal_race_fk` (`animal_race_fk`),
  CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`animal_race_fk`) REFERENCES `animal_race` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'Лапа','Ж','...',0,2),(2,'Рыжик','М','...',1,1),(3,'Валера','М','...',0,4),(4,'Чмоня','Ж','...',0,2),(5,'Муся','Ж','...',0,3),(7,'Тестюся','Ж','...',1,1),(14,'Зяпа','Ж','...',0,3);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animal_race`
--

DROP TABLE IF EXISTS `animal_race`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal_race` (
  `id` int NOT NULL AUTO_INCREMENT,
  `race` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `race` (`race`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal_race`
--

LOCK TABLES `animal_race` WRITE;
/*!40000 ALTER TABLE `animal_race` DISABLE KEYS */;
INSERT INTO `animal_race` VALUES (9,'PROC TYPE'),(1,'Кошка'),(3,'Кролик'),(5,'Попугай'),(2,'Собака'),(4,'Черепаха');
/*!40000 ALTER TABLE `animal_race` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `patronymic` varchar(45) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Иван','Иванов','Иванович','M','...','1234567890'),(2,'Валерия','Роботова','Игнатьевна','Ж','...','0192837465'),(3,'Анна','Гробова','Дмитриевна','Ж','...','0987654321'),(4,'ИВАН','ННН',NULL,'М','...','1234567891');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `info` text NOT NULL,
  `client_id_fk` int NOT NULL,
  `employee_id_fk` int NOT NULL,
  `donation_type_id_fk` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id_fk` (`client_id_fk`),
  KEY `employee_id_fk` (`employee_id_fk`),
  KEY `donation_type_id_fk` (`donation_type_id_fk`),
  CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`client_id_fk`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`employee_id_fk`) REFERENCES `employee` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `donation_ibfk_3` FOREIGN KEY (`donation_type_id_fk`) REFERENCES `donation_type` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donation`
--

LOCK TABLES `donation` WRITE;
/*!40000 ALTER TABLE `donation` DISABLE KEYS */;
INSERT INTO `donation` VALUES (1,'2023-11-15','...',1,1,1),(2,'2023-11-15','...',2,1,2),(3,'2023-11-15','...',3,1,3),(4,'2023-12-04','...',3,1,2),(5,'2023-12-06','...',3,1,2);
/*!40000 ALTER TABLE `donation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donation_type`
--

DROP TABLE IF EXISTS `donation_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donation_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donation_type`
--

LOCK TABLES `donation_type` WRITE;
/*!40000 ALTER TABLE `donation_type` DISABLE KEYS */;
INSERT INTO `donation_type` VALUES (1,'Денежное'),(3,'Другое'),(2,'Материальное');
/*!40000 ALTER TABLE `donation_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `patronymic` varchar(45) DEFAULT NULL,
  `employee_type_fk` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_type_fk` (`employee_type_fk`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`employee_type_fk`) REFERENCES `employee_type` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Иван','Иванов','Иванович',1),(2,'Важный','Важнов','Важнович',4);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_type`
--

DROP TABLE IF EXISTS `employee_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_type`
--

LOCK TABLES `employee_type` WRITE;
/*!40000 ALTER TABLE `employee_type` DISABLE KEYS */;
INSERT INTO `employee_type` VALUES (1,'Волонтёр'),(2,'Кадровик'),(4,'Менеджер'),(5,'Работник'),(3,'Работодатель');
/*!40000 ALTER TABLE `employee_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '2000-01-01',
  `client_id_fk` int NOT NULL,
  `employee_id_fk` int NOT NULL,
  `animal_id_fk` int NOT NULL,
  `request_state_fk` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `employee_id_fk` (`employee_id_fk`),
  KEY `animal_id_fk` (`animal_id_fk`),
  KEY `request_state_fk` (`request_state_fk`),
  KEY `client_id_fk` (`client_id_fk`),
  CONSTRAINT `request_ibfk_2` FOREIGN KEY (`employee_id_fk`) REFERENCES `employee` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `request_ibfk_3` FOREIGN KEY (`animal_id_fk`) REFERENCES `animal` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `request_ibfk_4` FOREIGN KEY (`request_state_fk`) REFERENCES `request_state` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `request_ibfk_5` FOREIGN KEY (`client_id_fk`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (8,'2023-11-15',1,1,1,1),(9,'2023-11-15',2,1,3,1),(10,'2023-11-15',3,2,2,3),(11,'2023-11-22',3,2,2,4),(12,'2023-11-30',3,2,7,3),(14,'2023-11-30',1,2,2,1),(16,'2023-11-30',2,2,2,4),(17,'2023-12-06',1,1,1,4);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_state`
--

DROP TABLE IF EXISTS `request_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `state` (`state`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_state`
--

LOCK TABLES `request_state` WRITE;
/*!40000 ALTER TABLE `request_state` DISABLE KEYS */;
INSERT INTO `request_state` VALUES (2,'В обработке'),(3,'Обработан'),(4,'Отказан'),(1,'Создан');
/*!40000 ALTER TABLE `request_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `request_view`
--

DROP TABLE IF EXISTS `request_view`;
/*!50001 DROP VIEW IF EXISTS `request_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `request_view` AS SELECT 
 1 AS `date`,
 1 AS `client_name`,
 1 AS `employee_name`,
 1 AS `animal_name`,
 1 AS `state`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `request_view`
--

/*!50001 DROP VIEW IF EXISTS `request_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp866 */;
/*!50001 SET character_set_results     = cp866 */;
/*!50001 SET collation_connection      = cp866_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `request_view` AS select `r`.`date` AS `date`,concat_ws(' ',`c`.`name`,`c`.`surname`,ifnull(`c`.`patronymic`,'')) AS `client_name`,concat_ws(' ',`e`.`name`,`e`.`surname`,ifnull(`e`.`patronymic`,'')) AS `employee_name`,`a`.`name` AS `animal_name`,`s`.`state` AS `state` from ((((`request` `r` join `client` `c` on((`r`.`client_id_fk` = `c`.`id`))) join `employee` `e` on((`r`.`employee_id_fk` = `e`.`id`))) join `animal` `a` on((`r`.`animal_id_fk` = `a`.`id`))) join `request_state` `s` on((`r`.`request_state_fk` = `s`.`id`))) */;
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

-- Dump completed on 2023-12-18  0:37:20
