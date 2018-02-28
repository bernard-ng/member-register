-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: scs
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `second_nom` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `full_nom` (`nom`),
  FULLTEXT KEY `full_second_nom` (`second_nom`),
  FULLTEXT KEY `full_nom_second_nom` (`nom`,`second_nom`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (4,'Joseph','Sabin','Participant','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-24 01:25:08'),(3,'bernard ','ng','sponsor','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-24 01:24:35'),(5,'Nouveau','Membre','Assitant','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-24 01:25:47'),(8,'joelle','mamume','membre','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-25 16:46:46'),(9,'tegra','kapende','sponsor','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-25 16:47:13'),(10,'martin','kabwe','sponsor','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-25 16:47:36'),(11,'sylvie','nabintu','sponsor','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-25 17:20:16'),(12,'Daniella','mutoke','membre','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-25 17:52:47'),(13,'patricia','bapu','Participant','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error sint cupiditate repellendus, repudiandae laudantium est commodi dolore voluptas impedit nobis, ipsum aspernatur earum mollitia deleniti ex alias adipisci quo eius.','2018-02-25 18:36:03');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-28 11:10:48
