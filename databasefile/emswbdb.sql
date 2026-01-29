CREATE DATABASE  IF NOT EXISTS `emswb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `emswb`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: emswb
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'laurel','laurel456','emails.laurel@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `emp_id` int NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  KEY `emp_id_idx` (`emp_id`),
  CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,'15:20:21',NULL,'2024-06-26','Late'),(1,'15:20:21','18:20:21','2024-06-26','Late'),(2,'15:20:21','18:20:21','2024-06-26','Late'),(13,'15:20:21','18:20:21','2024-06-26','Late'),(1,'15:20:21','18:20:21','2024-06-27','Late'),(1,'15:20:21','18:20:21','2024-06-27','Late'),(1,'15:20:21','18:20:21','2024-06-27','Late'),(1,'15:20:21','18:20:21','2024-06-28','Late'),(1,'15:20:21','18:20:21','2024-06-29','Late'),(1,'15:20:21','18:20:21','2024-06-30','Late'),(1,'15:20:21','18:20:21','2024-07-01','Late'),(1,'15:20:21','18:20:21','2024-07-02','Late'),(1,'15:20:21','18:20:21','2024-07-03','Late'),(2,'15:20:21','18:20:21','2024-06-28','Late'),(3,'15:20:21','18:20:21','2024-06-29','Late'),(2,'15:20:21','18:20:21','2024-06-30','Late'),(13,'15:20:21','18:20:21','2024-07-01','Late'),(2,'15:20:21','18:20:21','2024-07-02','Late'),(2,'15:20:21','18:20:21','2024-07-03','Late'),(1,'09:14:21','18:20:21','2024-07-04','Present'),(1,'17:55:06','17:55:25','2024-07-05','Late'),(11,'18:06:56','18:07:06','2024-07-05','Late'),(1,'17:28:06','17:28:28','2024-07-08','Late'),(17,'10:29:05','10:29:10','2024-07-09','Present');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `joining_date` date NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email_id` varchar(45) NOT NULL,
  `contact_no` int NOT NULL,
  `aadhaar_no` bigint NOT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `address` varchar(45) NOT NULL,
  `zip_code` int NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `refer_person` varchar(45) DEFAULT NULL,
  `refer_relation` varchar(45) DEFAULT NULL,
  `refer_contact` int DEFAULT NULL,
  `profile_pic` blob,
  `designation` varchar(45) DEFAULT NULL,
  `shift` varchar(45) DEFAULT NULL,
  `shift_start` time DEFAULT NULL,
  `shift_end` time DEFAULT NULL,
  `flag` tinyint DEFAULT '1',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'abc','2001-01-01','2024-06-06',100000,'Male','abc@gmail.com',1234567891,123456789123,'','Kolhapur',444444,'Kolhapur','Maharashtra','1 year','xyz','pqr','Friend',1234567891,NULL,'Intern','Morning','09:00:00','05:30:00',1),(2,'pqr','2001-01-01','2024-06-06',10000,'Male','pqr@gmail.com',1234567891,123456789123,NULL,'Kolhapur',444444,'Kolhapur','Maharashtra ','1 year','xyz','abc','Friend',1234567891,NULL,'Intern','Morning','09:00:00','05:30:00',1),(3,'test','2001-01-01','2024-01-01',123456,'Male','test@gmail.com',1234567891,1234567891,'','test',124562,'test','test','1 year','test','test','test',124561,NULL,'test','Morning','17:22:00','20:26:00',1),(7,'test','2001-01-01','2024-06-06',12345,'Male','test@test.com',1234567891,123456789123,'','test',123456,'test','test','test','test','test','test',123457891,NULL,'test','Morning','11:50:00','00:00:00',1),(11,'test','2001-01-01','2024-06-06',25000,'Male','test@test.com',1234567891,123456789123,'','test',123456,'test','test','test','test','test','test',1234567891,NULL,'test','Morning','10:00:00','16:00:00',1),(13,'test','2001-01-01','2024-06-06',25000,'Male','test@test.com',1234567891,123456791,'','test',123456,'test','test','test','test','test','test',1234567891,NULL,'test','Morning','14:36:00','20:00:00',1),(16,'abcd','2024-07-08','2024-07-08',2121,'Male','test@test.com',2131,123456789123,'','test',123456,'test','test','test','test','test','test',1234567891,NULL,'test','Morning','17:34:00','00:00:00',1),(17,'test','2024-07-09','2024-07-09',2500,'Male','test@test.com',12345678,123456789,'','test',123,'te','tes','1s','rse','se','esr',1,NULL,'se','Morning','10:15:00','15:00:00',1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-09 10:43:31
