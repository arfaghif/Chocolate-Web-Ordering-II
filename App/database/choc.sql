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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chocolate`
--

LOCK TABLES `chocolate` WRITE;
/*!40000 ALTER TABLE `chocolate` DISABLE KEYS */;
INSERT INTO `chocolate` VALUES (1,'waffle 1',9,2000,4,'Bikin nagih'),(2,'waffle 2',9,4000,8,'Bikin nagih'),(3,'waffle 3',4,1000,5,'Sangat enak'),(4,'waffle 4',7,500,3,'Bikin nagih'),(5,'waffle 5',3,2500,5,'Renyah'),(6,'waffle 6',8,3000,6,'Renyah'),(7,'choco 1',3,1500,3,'asli bandung'),(8,'choco 2',1,3000,6,'Gak bakal nyesel'),(9,'choco 3',8,3500,7,'Sangat enak'),(10,'choco 4',8,4000,7,'Gak bakal nyesel'),(11,'choco 5',9,3500,7,'Harus dingin'),(12,'choco 6',4,3500,8,'asli bandung'),(13,'brownies 1',2,3000,2,'asli bandung'),(14,'brownies 2',8,2500,10,'Gak bakal nyesel'),(15,'brownies 3',8,3500,4,'Sangat enak'),(16,'brownies 4',8,2000,7,'asli bandung'),(17,'brownies 5',9,2500,6,'Sangat enak'),(18,'brownies 6',7,2500,8,'asli bandung');
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
  `username` varchar(45) BINARY NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,'nisa',10,5,'2020-10-02 15:07:22','jakarta',75000),(2,'nisa',2,4,'2020-10-22 16:13:43','bandung',55000),(4,'nisa',6,3,'2020-10-12 15:19:59','jakarta',45000),(5,'nisa',12,4,'2020-10-02 02:55:13','jakarta',20000),(6,'masruri',18,2,'2020-10-17 09:16:34','jakarta',15000),(8,'nisa',14,5,'2020-10-14 08:38:02','malang',75000),(9,'masruri',17,4,'2020-10-02 13:11:15','jakarta',45000),(10,'nisa',15,5,'2020-10-18 14:17:22','jakarta',20000),(11,'arf',1,2,'2020-10-19 08:40:36','malang',40000),(13,'arf',3,5,'2020-10-22 17:26:40','bandung',55000),(15,'masruri',6,5,'2020-10-20 20:48:10','malang',20000),(16,'nisa',10,3,'2020-10-18 09:08:01','bandung',60000),(17,'arf',10,4,'2020-10-06 01:48:45','malang',55000),(18,'arf',14,4,'2020-10-02 01:12:28','malang',65000),(19,'arf',14,4,'2020-10-02 01:12:28','malang',65000);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(45) BINARY NOT NULL,
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
INSERT INTO `user` VALUES ('arf','arf@gmail.com','$2y$10$Y0TiOOJwpcROY5dqpi26Tu2waaDWvzSA3guQ3q63wtZqerR0cAEXW',1),('arfa','arfa@gmail.com','$2y$10$vGz4khEFv2cB/07H20DH8uZ4WWp3Thifm0.QyHvIvcDtRDmJjYqx.',0),('asin','asin@gmail.com','$2y$10$2u4icLHS7LRN1GUnoPZj5u7on9eAUhlraNBgCyYwaabGBAXXJtB.O',0),('fatkhan','fatkhan@gmail.com','$2y$10$hi8muz5dIy3hb53hsgoviuutA0IN7sQKanB2peRm1OWUEOhhUouzG',0),('masruri','masruri@gmail.com','$2y$10$W1ivWdB7HZZQkyPbobG2ReblGPVhmwsKBMGmZmt9cw94zj4TVmMZS',1),('nisa','nisa@gmail.com','$2y$10$YrQfQD9Vnx92b5LBkxU8he.fhdGof6VkrBkDwoQMP1/iebPO5grym',1);
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

-- Dump completed on 2020-10-24 23:06:31
