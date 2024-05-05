-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mvp_php
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tl` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` VALUES (1,'1234561001','Dinda','Bandung','2020-12-11','Perempuan','dindawahyu@upi.edu','088970803025'),(2,'6754327002','Wahyu','Cimahi','2020-12-14','Laki-laki','wah@upi.edu','089678898545'),(4,'7890654001','Ayang','Bandung','2020-11-29','Perempuan','ay@gmail.com','081321778980'),(5,'9876576008','Zulfan','bandung','2021-01-04','Laki-laki','jull@gmai.com','088970803025'),(6,'1234567009','Prilla','Seoul','2001-05-05','Perempuan','prillarosaria@upi.edu','081234876235'),(7,'7135712004','Son','Canada','1994-02-21','Perempuan','chrstjsmn@gmail.com','081573038425'),(8,'8478347011','Jeno','Incheon','2000-12-23','Laki-laki','jeno@gmail.com','08138746239'),(9,'8795642002','Mark','Canada','1999-08-20','Laki-laki','mark@upi.edu','08237218473');
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-05 21:38:35
