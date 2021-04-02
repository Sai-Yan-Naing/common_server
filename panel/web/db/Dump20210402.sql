-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: japan_system_development
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `current_pass`
--

DROP TABLE IF EXISTS `current_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `current_pass` (
  `web_id` int NOT NULL DEFAULT '0',
  `password` varchar(1024) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`web_id`),
  UNIQUE KEY `web_id` (`web_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_pass`
--

LOCK TABLES `current_pass` WRITE;
/*!40000 ALTER TABLE `current_pass` DISABLE KEYS */;
/*!40000 ALTER TABLE `current_pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'D000123','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','saiyannaing259768648@gmail.com','123456',0,NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_account`
--

DROP TABLE IF EXISTS `db_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT '',
  `db_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `db_user` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `db_count` int NOT NULL DEFAULT '0',
  `pass` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_account`
--

LOCK TABLES `db_account` WRITE;
/*!40000 ALTER TABLE `db_account` DISABLE KEYS */;
INSERT INTO `db_account` VALUES (1,'mgmg.test','ckm_test1','ckm_test1',1,'welcome123'),(2,'mgmg.test','ckm_test2','ckm_test2',1,'welcome'),(3,'mgmg.test','ckm_test3','ckm_test3',1,'saiyannaing');
/*!40000 ALTER TABLE `db_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_account_for_mssql`
--

DROP TABLE IF EXISTS `db_account_for_mssql`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_account_for_mssql` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT NULL,
  `host_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  `host_ip` varchar(15) NOT NULL,
  `db_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  `db_user` varchar(255) NOT NULL,
  `db_count` int NOT NULL DEFAULT '0',
  `pass` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_account_for_mssql`
--

LOCK TABLES `db_account_for_mssql` WRITE;
/*!40000 ALTER TABLE `db_account_for_mssql` DISABLE KEYS */;
INSERT INTO `db_account_for_mssql` VALUES (1,'mgmg.test','mssql6.winserver.ne.jp','203.137.92.4','ckm_test10','ckm_test10',1,'welcome'),(2,'mgmg.test','mssql6.winserver.ne.jp','203.137.92.4','ckm_test11','ckm_test11',1,'welcome'),(3,'mgmg.test','mssql6.winserver.ne.jp','203.137.92.4','ckm_test13','ckm_test13',1,'welcome'),(4,'mgmg.test','mssql6.winserver.ne.jp','203.137.92.4','ckm_test14','ckm_test14',1,'welcome'),(5,'mgmg.test','mssql6.winserver.ne.jp','203.137.92.4','ckm_test15','ckm_test15',1,'welcome');
/*!40000 ALTER TABLE `db_account_for_mssql` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_ftp`
--

DROP TABLE IF EXISTS `db_ftp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_ftp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `web_dir` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_ftp`
--

LOCK TABLES `db_ftp` WRITE;
/*!40000 ALTER TABLE `db_ftp` DISABLE KEYS */;
INSERT INTO `db_ftp` VALUES (1,'mgmg.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','D000123','mgmg.test','mgmg.test'),(2,'mgmg1.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','D000123','mgmg1.test','mgmg1.test'),(3,'welcome.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','D000123','welcome.test','welcome.test'),(6,'ethical-sai.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','D000123','ethical-sai.test','ethical-sai.test');
/*!40000 ALTER TABLE `db_ftp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `error_pages`
--

DROP TABLE IF EXISTS `error_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `error_pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `statuscode` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='error pages';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `error_pages`
--

LOCK TABLES `error_pages` WRITE;
/*!40000 ALTER TABLE `error_pages` DISABLE KEYS */;
INSERT INTO `error_pages` VALUES (1,'setmawhtay.com','404',''),(2,'setmawhtay.com','407','');
/*!40000 ALTER TABLE `error_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_account`
--

DROP TABLE IF EXISTS `web_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `web_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `password` varchar(1024) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `user` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `mysql_cnt` int NOT NULL DEFAULT '0',
  `mssql_cnt` int NOT NULL DEFAULT '0',
  `plan` int NOT NULL DEFAULT '0',
  `pass_change_require` int NOT NULL DEFAULT '0',
  `wordpress_require` int NOT NULL DEFAULT '0',
  `eccube_require` int NOT NULL DEFAULT '0',
  `stopped` int NOT NULL DEFAULT '0',
  `appstopped` int DEFAULT NULL,
  `ec_dir` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT '',
  `word_dir` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `word_db` varchar(255) NOT NULL DEFAULT '',
  `web_dir` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `error_pages` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_account`
--

LOCK TABLES `web_account` WRITE;
/*!40000 ALTER TABLE `web_account` DISABLE KEYS */;
INSERT INTO `web_account` VALUES (1,'setmawhtay.com','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','setmawhtay.com',0,0,0,0,0,0,1,1,'','','','setmawhtay.com','D000123',1,'51a2bfa91a6065e5e878dd695ddcdc8b','[{\"url\": \"errors/404.html\", \"statuscode\": \"404\"}]'),(2,'mgmg.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','mgmg.test',0,0,0,0,0,0,1,1,'','','','mgmg.test','D000123',NULL,'15a4cf8c80f5c9f42339486c1bb258aa','[{\"url\": \"errors/408.html\", \"stopped\": 1, \"statuscode\": \"404\"}, {\"url\": \"errors/405.html\", \"stopped\": 1, \"statuscode\": \"405\"}, {\"url\": \"errors/406.html\", \"stopped\": 0, \"statuscode\": \"406\"}, {\"url\": \"errors/407.html\", \"stopped\": 0, \"statuscode\": \"407\"}, {\"url\": \"errors/408.html\", \"stopped\": 1, \"statuscode\": \"408\"}, {\"url\": \"errors/409.html\", \"stopped\": 1, \"statuscode\": \"409\"}, {\"url\": \"errors/410.html\", \"stopped\": 1, \"statuscode\": \"410\"}, {\"url\": \"errors/411.html\", \"stopped\": 1, \"statuscode\": \"411\"}]'),(3,'mgmg1.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','mgmg1.test',0,0,0,0,0,0,1,1,'','','','mgmg1.test','D000123',NULL,'64815247a5a9e8612c3c89feafe8deac','[{\"url\": \"errors/404.html\", \"statuscode\": \"404\"}]'),(4,'welcome.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','welcome.test',0,0,0,0,0,0,1,1,'','','','welcome.test','D000123',NULL,'43b4f9849738e1ecadef5e8a1514308d',NULL),(5,'hello1.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','hello1.test',0,0,0,0,0,0,1,1,'','','','hello1.test','D000123',NULL,'4e7b2382f3f179f42bc4743449bd761e',NULL),(8,'ethical-sai.test','4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4','ethical-sai.test',0,0,0,0,0,0,1,1,'','','','ethical-sai.test','D000123',NULL,'c6587cd80c212d4203b9725449928780',NULL);
/*!40000 ALTER TABLE `web_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-02 15:35:34
