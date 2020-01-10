-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: fmarket
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1-log

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
-- Table structure for table `api_list`
--

DROP TABLE IF EXISTS `api_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_list` (
  `zip` varchar(10) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_list`
--

LOCK TABLES `api_list` WRITE;
/*!40000 ALTER TABLE `api_list` DISABLE KEYS */;
INSERT INTO `api_list` VALUES ('07604','Baked goods'),('07604','Cheese and/or dairy products'),('07604','Crafts and/or woodworking items'),('07604','Cut flowers'),('07604','Fresh fruit and vegetables'),('07604','Fresh and/or dried herbs'),('07604','Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.'),('07604','Plants in containers'),('07604','Soap and/or body care products'),('07604','Honey'),('07604','Nuts'),('07604','Eggs'),('07604','Meat'),('07604','Poultry'),('07604','Prepared foods (for immediate consumption)'),('07604','Maple syrup and/or maple products'),('07604','Fish and/or seafood'),('07604','Trees, shrubs'),('07604','Wine, beer, hard cider'),('07002','Baked goods'),('07002','Fresh fruit and vegetables'),('07002','Meat'),('07002','Poultry'),('07002','Crafts and/or woodworking items'),('07002','Cut flowers'),('07002','Fresh and/or dried herbs'),('07002','Honey'),('07002','Prepared foods (for immediate consumption)'),('07002','Soap and/or body care products'),('07002','Cheese and/or dairy products'),('07002','Eggs'),('07002','Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.'),('07002','Nuts'),('07002','Fish and/or seafood'),('07002','Plants in containers'),('07002','Trees, shrubs'),('07002','Maple syrup and/or maple products'),('07003','Baked goods'),('07003','Cheese and/or dairy products'),('07003','Cut flowers'),('07003','Eggs'),('07003','Fresh fruit and vegetables'),('07003','Fresh and/or dried herbs'),('07003','Honey'),('07003','Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.'),('07003','Meat'),('07003','Nuts'),('07003','Poultry'),('07003','Prepared foods (for immediate consumption)'),('07003','Soap and/or body care products'),('07003','Crafts and/or woodworking items'),('07003','Plants in containers'),('07003','Fish and/or seafood'),('07003','Maple syrup and/or maple products');
/*!40000 ALTER TABLE `api_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `develop`
--

DROP TABLE IF EXISTS `develop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `develop` (
  `level` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `develop`
--

LOCK TABLES `develop` WRITE;
/*!40000 ALTER TABLE `develop` DISABLE KEYS */;
/*!40000 ALTER TABLE `develop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Baked goods'),(2,'Crafts and/or woodworking items'),(3,'Eggs'),(4,'Fresh and/or dried herbs'),(5,'Honey'),(6,'Maple syrup and/or maple products'),(7,'Nuts'),(8,'Poultry'),(9,'Soap and/or body care products'),(10,'Wine, beer, hard cider '),(11,'Dry beans'),(12,'Grains and or flour '),(13,'Mushrooms'),(14,'Tofu and or non-animal protein '),(15,'Cheese and/or dairy products'),(16,'Cut flowers'),(17,'Fish and/or seafood'),(18,'Fresh vegetables'),(19,'Canned or preserved fruits, vegetables, jams, jellies, preserves, salsas, pickles, dried fruit, etc.'),(20,'Meat'),(21,'Plants in containers'),(22,'Prepared foods (for immediate consumption)'),(23,'Trees, shrubs'),(24,'Coffee and or tea'),(25,'Fresh fruits'),(26,'Juices and or non-alcoholic ciders'),(27,'Pet Food'),(28,'Wild harvested forest products: mushrooms, medicinal herbs, edible fruits and nuts, etc.');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_board`
--

DROP TABLE IF EXISTS `message_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_board` (
  `mess_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mess_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_board`
--

LOCK TABLES `message_board` WRITE;
/*!40000 ALTER TABLE `message_board` DISABLE KEYS */;
INSERT INTO `message_board` VALUES (7,'Bob1','Testing!','9:08:41 PM','12/17/2019'),(8,'Bob1','Testing!','9:15:11 PM','12/17/2019'),(9,'Bob1','Testing!','9:15:41 PM','12/17/2019'),(10,'Bob1','Testing!','9:20:56 PM','12/17/2019'),(11,'Bob1','Testing!','9:22:11 PM','12/17/2019'),(12,'Bob1','Testing!','9:22:29 PM','12/17/2019'),(13,'Bob1','Testing!','9:23:28 PM','12/17/2019'),(14,'Bob1','Testing!','9:24:02 PM','12/17/2019'),(15,'Bob1','Testing!','9:30:13 PM','12/17/2019'),(16,'Bob1','Working?','9:31:35 PM','12/17/2019'),(17,'Bob1','Working?','9:32:05 PM','12/17/2019'),(18,'Bob1','Working?','9:35:06 PM','12/17/2019'),(19,'Bob1','Working?','9:39:27 PM','12/17/2019'),(20,'Bob1','Working?','9:41:54 PM','12/17/2019'),(21,'Bob1','Working?','9:44:09 PM','12/17/2019'),(22,'Bob1','Working?','11:39:56 PM','12/18/2019'),(23,'','test','12:12:54 AM','12/19/2019'),(24,'','test','12:13:46 AM','12/19/2019'),(25,'','test','12:15:38 AM','12/19/2019'),(26,'Bob1','test','12:16:29 AM','12/19/2019'),(27,'Bob1','test','12:17:05 AM','12/19/2019'),(28,'Bob1','test','12:17:28 AM','12/19/2019'),(29,'Bob1','','12:18:02 AM','12/19/2019'),(30,'Bob1','','12:18:37 AM','12/19/2019'),(31,'Bob1','','12:18:39 AM','12/19/2019'),(32,'Bob1','WORK','12:20:56 AM','12/19/2019'),(33,'Bob1','WORK','12:21:24 AM','12/19/2019'),(34,'Bob1','TEST','12:22:29 AM','12/19/2019'),(35,'Bob1','123','12:22:32 AM','12/19/2019'),(36,'Bob1','123','12:27:06 AM','12/19/2019'),(37,'Bob1','Hello\r\n','4:24:35 AM','12/19/2019'),(38,'Bob1','We will fail in a few hours','4:25:20 AM','12/19/2019'),(39,'Bob1','Cya next semester','4:25:42 AM','12/19/2019'),(40,'Bob1','ez clap','4:25:48 AM','12/19/2019'),(41,'dropout','Agreed\r\n','4:26:31 AM','12/19/2019'),(42,'dropout','FeelsBadMan\r\n','4:26:59 AM','12/19/2019'),(43,'dropout','fuck you bob','4:27:24 AM','12/19/2019');
/*!40000 ALTER TABLE `message_board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stat`
--

DROP TABLE IF EXISTS `stat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stat` (
  `level` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `stat` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stat`
--

LOCK TABLES `stat` WRITE;
/*!40000 ALTER TABLE `stat` DISABLE KEYS */;
/*!40000 ALTER TABLE `stat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `umarket`
--

DROP TABLE IF EXISTS `umarket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `umarket` (
  `username` varchar(20) NOT NULL,
  `phash` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `umarket`
--

LOCK TABLES `umarket` WRITE;
/*!40000 ALTER TABLE `umarket` DISABLE KEYS */;
INSERT INTO `umarket` VALUES ('Bill1','$2y$10$IJWT1iGDMcg.e22n8oqY/.7d.qP6dSZ5iDkc3tAvwJHmummQnFxzG','Bill1@email.com','01234'),('Bob1','$2y$10$k6KGeip4vpPbVOkDyHR9cO0C29rEROa1ZZJuf.FA816Op1a7HBUoi','bob1@email.com','07003'),('drop','$2y$10$dIHuCg0PKZ3D0RlnRRuexuUTnTUNIIE022FIQrKr3vofOHd4ZlQEG','drop@email.com','00000'),('drop out','$2y$10$2F5s/qzbql5VTi5cI5kF4.byR7HISfBDf972O5RLnWIfNavY7szLS','dropout2@email.com','00000'),('drop table','$2y$10$dfCsWWlN9S1tSUfB7HLHJek2JBw2ZHjPJLt5OWtzZvKTk8UPVoy3y','droptable@email.com','07003'),('dropout','$2y$10$L5j6VX4iQV5iIa0WXFVLW.bD86kKdu80NYgAnbRjmxFOJcuZnFJnK','dropout@email.com','07002'),('failed','$2y$10$gpIQC.0cBHIVn6JzbAi9vuAAWFwAZMJ9H7W0zFgSi0JfDkxLK0why','shouldvedroppedout@gmail.com','41345'),('test','$2y$10$MSwHwLm3YNUuyoNPt5pajunuKEabiVBcxaws2UzPta0PGUsBKfSHe','test@gmail.com','4141');
/*!40000 ALTER TABLE `umarket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_list`
--

DROP TABLE IF EXISTS `user_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_list` (
  `username` varchar(30) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  KEY `username` (`username`),
  KEY `id` (`id`),
  CONSTRAINT `user_list_ibfk_1` FOREIGN KEY (`username`) REFERENCES `umarket` (`username`),
  CONSTRAINT `user_list_ibfk_2` FOREIGN KEY (`id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_list`
--

LOCK TABLES `user_list` WRITE;
/*!40000 ALTER TABLE `user_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlist`
--

DROP TABLE IF EXISTS `userlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlist`
--

LOCK TABLES `userlist` WRITE;
/*!40000 ALTER TABLE `userlist` DISABLE KEYS */;
INSERT INTO `userlist` VALUES (9,'Bob1','07002','Baked goods'),(10,'Bob1','07002','Meat'),(11,'Bob1','07002','Poultry'),(12,'dropout','07002','Baked goods'),(13,'dropout','07002','Fresh fruit and vegetables'),(14,'dropout','07002','Meat'),(15,'Bob1','07002','Cut flowers'),(16,'Bob1','07002','Cheese and/or dairy products'),(17,'Bob1','07002','Eggs'),(18,'Bob1','07002','Nuts'),(19,'Bob1','07003','Baked goods'),(20,'Bob1','07003','Cut flowers');
/*!40000 ALTER TABLE `userlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-19  6:16:49
