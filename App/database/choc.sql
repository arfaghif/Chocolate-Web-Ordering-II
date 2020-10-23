-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: choc
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `chocolate`
--

DROP TABLE IF EXISTS `chocolate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chocolate` (
  `idchocolate` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `amount_sold` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `amount_remaining` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idchocolate`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chocolate`
--

LOCK TABLES `chocolate` WRITE;
/*!40000 ALTER TABLE `chocolate` DISABLE KEYS */;
INSERT INTO `chocolate` VALUES (1,'Choco 1',5,30000,6,'Sangat enak'),(2,'Choco 2',5,30000,6,'Sangat enak'),(3,'Choco 3',5,30000,6,'Sangat enak'),(4,'Choco 4',5,30000,6,'Sangat enak'),(5,'Choco 5',5,30000,6,'Sangat enak'),(6,'Choco 6',5,30000,6,'Sangat enak'),(7,'Brownies 1',5,30000,6,'Sangat enak'),(8,'Brownies 2',5,30000,6,'Sangat enak'),(9,'Brownies 3',5,30000,6,'Sangat enak'),(10,'Brownies 4',5,30000,6,'Sangat enak'),(11,'Brownies 5',5,30000,6,'Sangat enak'),(12,'Brownies 6',5,30000,6,'Sangat enak');
/*!40000 ALTER TABLE `chocolate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `idchocolate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `address` varchar(45) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`idtransaksi`),
  KEY `username` (`username`),
  KEY `idchocolate` (`idchocolate`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idchocolate`) REFERENCES `chocolate` (`idchocolate`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,'matsu',2,5,'2020-10-22 16:36:37','Bandung',100000),(2,'matsu',4,5,'2020-10-22 16:36:37','Bandung',100000),(3,'matsu',6,5,'2020-10-22 16:36:37','Bandung',100000),(4,'matsu',8,5,'2020-10-22 16:36:37','Bandung',100000),(5,'matsu',10,5,'2020-10-22 16:36:37','Bandung',100000),(6,'matsu',12,5,'2020-10-22 16:36:38','Bandung',100000);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('arfa17','arfa','arfa17@gmail.com','arfa17',0),('asin','asin','asin@gmail.com','asin',1),('matsu','matsu','matsu@gmail.com','matsu',1);
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

-- Dump completed on 2020-10-22 16:43:00
