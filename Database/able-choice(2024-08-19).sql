-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: able-choice
-- ------------------------------------------------------
-- Server version 	10.4.28-MariaDB
-- Date: Mon, 19 Aug 2024 17:52:55 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `postal_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `address` VALUES (1,1,'surjani karachi','karachi','sindh','12345','paistan','2023-10-10 12:20:11',NULL,NULL),(2,2,'gulshan','karachi','sindh','09876','pakistan','2023-10-10 12:20:11',NULL,NULL),(3,3,'karachi add','karachi city','sindh','090909','pakistan','2024-07-13 16:43:23',NULL,NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `address` with 3 row(s)
--

--
-- Table structure for table `card_detail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `per_amount` varchar(200) DEFAULT NULL,
  `total_amount` varchar(200) DEFAULT NULL,
  `ip_address` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_detail`
--

LOCK TABLES `card_detail` WRITE;
/*!40000 ALTER TABLE `card_detail` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `card_detail` VALUES (32,NULL,1,1,'8000','8000','::1','2024-06-09 21:25:33','2024-06-10 19:49:32','2024-06-10 19:49:32'),(33,NULL,2,2,'800','1600.00','::1','2024-06-09 21:25:46','2024-06-10 19:49:32','2024-06-10 19:49:32'),(34,NULL,2,1,'800','800','::1','2024-06-09 21:58:51','2024-06-10 19:49:32','2024-06-10 19:49:32'),(35,NULL,1,1,'400','400','::1','2024-06-09 22:01:12','2024-06-10 19:49:32','2024-06-10 19:49:32'),(36,NULL,1,2,'400','800.00','::1','2024-06-10 19:42:57','2024-06-10 19:49:32','2024-06-10 19:49:32'),(37,NULL,2,1,'800','800','::1','2024-06-10 19:43:06','2024-06-10 19:49:32','2024-06-10 19:49:32'),(38,NULL,2,3,'800','2400','::1','2024-06-10 19:45:58','2024-06-10 19:49:32','2024-06-10 19:49:32'),(39,NULL,1,2,'400','800.00','::1','2024-06-10 19:47:51','2024-06-10 19:49:32','2024-06-10 19:49:32'),(40,NULL,2,2,'800','1600.00','::1','2024-06-11 00:37:06','2024-06-28 19:37:22','2024-06-04 19:37:16'),(41,NULL,2,2,'800','1600.00','d7faded64195fd1301cb08ce07e06d09','2024-06-15 16:00:07','2024-06-15 16:02:47','2024-06-15 16:02:47'),(42,NULL,1,3,'400','1200.00','d7faded64195fd1301cb08ce07e06d09','2024-06-15 16:00:29','2024-06-15 16:02:47','2024-06-15 16:02:47'),(43,NULL,1,3,'400','1200.00','838210ee4031079eae29ebf7717fc262','2024-06-15 19:35:27','2024-06-15 19:39:47','2024-06-15 19:39:47'),(44,NULL,2,2,'800','1600.00','838210ee4031079eae29ebf7717fc262','2024-06-15 19:35:43','2024-06-15 19:39:47','2024-06-15 19:39:47'),(45,NULL,2,2,'800','1600','3fb3fcb66260a325fedf796413b9da6d','2024-06-16 16:26:33','2024-06-16 16:35:33','2024-06-16 16:35:33'),(46,NULL,1,1,'400','400','3fb3fcb66260a325fedf796413b9da6d','2024-06-16 16:28:33','2024-06-16 16:35:33','2024-06-16 16:35:33'),(47,NULL,2,1,'800','800','3fb3fcb66260a325fedf796413b9da6d','2024-06-16 16:35:04','2024-06-16 16:35:33','2024-06-16 16:35:33'),(48,NULL,1,2,'400','800','865a28009545bf6209b98f0b337a4084','2024-06-19 15:13:55','2024-06-19 15:29:11','2024-06-19 15:29:11'),(49,NULL,1,1,'400','400','865a28009545bf6209b98f0b337a4084','2024-06-19 15:25:48','2024-06-19 15:29:11','2024-06-19 15:29:11'),(50,1,2,2,'800','1600.00','865a28009545bf6209b98f0b337a4084','2024-06-19 15:29:01','2024-06-28 19:47:01','2024-06-28 19:47:01'),(51,NULL,1,1,'400','400','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:29:53','2024-06-19 15:50:32','2024-06-19 15:50:32'),(52,NULL,1,1,'400','400','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:32:03','2024-06-19 15:50:32','2024-06-19 15:50:32'),(53,NULL,2,1,'800','800','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:41:15','2024-06-19 15:50:32','2024-06-19 15:50:32'),(54,NULL,1,1,'400','400','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:42:53','2024-06-19 15:50:32','2024-06-19 15:50:32'),(55,NULL,1,1,'400','400','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:44:38','2024-06-19 15:50:32','2024-06-19 15:50:32'),(56,NULL,2,1,'800','800','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:48:13','2024-06-19 15:50:32','2024-06-19 15:50:32'),(57,NULL,2,1,'800','800','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:50:05','2024-06-19 15:50:32','2024-06-19 15:50:32'),(58,NULL,1,1,'400','400','cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 15:51:32','2024-06-19 15:51:46','2024-06-19 15:51:46'),(59,NULL,1,1,'400','400','b20e84fdbdc0d289017e2817e1880e6e','2024-06-21 18:49:07','2024-06-21 19:17:08','2024-06-21 19:17:08'),(60,NULL,2,1,'800','800','b20e84fdbdc0d289017e2817e1880e6e','2024-06-21 18:54:05','2024-06-21 19:17:08','2024-06-21 19:17:08'),(61,NULL,1,2,'400','800.00','b20e84fdbdc0d289017e2817e1880e6e','2024-06-21 19:16:27','2024-06-21 19:17:08','2024-06-21 19:17:08'),(62,NULL,2,3,'800','2400.00','b20e84fdbdc0d289017e2817e1880e6e','2024-06-21 19:16:35','2024-06-21 19:17:08','2024-06-21 19:17:08'),(63,NULL,2,1,'800','800','32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 19:08:20','2024-06-28 19:47:01','2024-06-28 19:47:01'),(64,1,1,3,'400','1200.00','32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 19:40:09','2024-06-28 19:47:01','2024-06-28 19:47:01'),(65,1,2,1,'800','800','32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 19:46:56','2024-06-28 19:47:01','2024-06-28 19:47:01'),(66,NULL,1,2,'400','800.00','fe91a2f34686594ad93c0392603f6c87','2024-07-04 00:07:05','2024-07-04 00:08:47','2024-07-04 00:08:47'),(67,NULL,2,1,'800','800','fe91a2f34686594ad93c0392603f6c87','2024-07-04 00:07:11','2024-07-04 00:08:47','2024-07-04 00:08:47'),(68,NULL,1,1,'400','400','fe91a2f34686594ad93c0392603f6c87','2024-07-04 00:09:32','2024-08-19 20:06:01','2024-08-19 17:06:01'),(69,1,2,1,'800','800','fe91a2f34686594ad93c0392603f6c87','2024-07-04 00:11:33','2024-08-19 20:06:01','2024-08-19 17:06:01'),(70,NULL,1,1,'400','400','343a13c86033c78ad535b219c902730d','2024-07-08 22:18:05','2024-08-19 20:06:01','2024-08-19 17:06:01'),(71,NULL,1,2,'400','800.00','d186457be9f86079a78c8e247c353414','2024-07-08 22:18:50','2024-08-19 20:06:01','2024-08-19 17:06:01'),(72,NULL,1,1,'400','400','4c5629e72a1e7b014fe826431c77b4aa','2024-07-08 22:21:01','2024-08-19 20:06:01','2024-08-19 17:06:01'),(73,NULL,2,2,'800','1600.00','b0edcb9f76abf1c01b5f6b8e2e4fa536','2024-07-13 00:47:12','2024-07-13 00:53:34','2024-07-13 00:53:34'),(74,NULL,1,2,'400','800.00','b0edcb9f76abf1c01b5f6b8e2e4fa536','2024-07-13 00:47:58','2024-07-13 00:53:34','2024-07-13 00:53:34');
/*!40000 ALTER TABLE `card_detail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `card_detail` with 43 row(s)
--

--
-- Table structure for table `contact`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `contact` VALUES (1,'test','test@gmail.com','testtest','test email ha ','2024-07-08 21:36:11'),(2,'aaa','aaa@gmail.com','aaa','aaatestaaa','2024-07-08 21:37:15'),(3,'Samra Gulzaraaaa','samra@gmail.com','hii','samratestcontact','2024-07-08 21:40:19'),(4,'bilal','bilal@gmail.com','bilalsubject','bilal message','2024-07-08 21:42:59'),(5,'cc','cc@gmail.com','cc subject','ccccccc','2024-07-08 21:44:37'),(6,'test','admin@gmail.com','testtest','likgjmnh','2024-07-08 21:54:20'),(7,'ali1','admin@cybernsoft.com','hii','kkkkkl','2024-07-08 21:57:31'),(8,'semester1','admin@cybernsoft.com','bilalsubject','llllllllll','2024-07-08 21:59:09'),(9,'Samra Gulzaraaaa','admin@gmail.com','testtest','aasssaa','2024-07-08 22:00:50'),(10,'Samra Gulzaraaaa','bilal@gmail.com','bilalsubject','bilal','2024-07-08 22:02:06'),(11,'ali1','daniyalcybernsoft@gmail.com','aaa','kjgdjyfy','2024-07-08 22:04:17'),(12,'semester1','admin@cybernsoft.com','sgasg','klhkgukgugguhujkk','2024-07-08 22:04:39'),(13,'bilal','bial@gmail.com','aaa','aaaaa','2024-07-08 22:05:57'),(14,'aaa','admin@cybernsoft.com','aaa','kldhflalif','2024-07-08 22:07:10'),(15,'aaa','huzaifa2582003@gmail.com','aaa','asdfasdfa','2024-07-08 22:14:10'),(16,'aaa','huzaifa2582003@gmail.com','aaa','asdfasdfa','2024-07-08 22:14:56');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `contact` with 16 row(s)
--

--
-- Table structure for table `order`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `order` with 0 row(s)
--

--
-- Table structure for table `orders`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `ip_address` varchar(500) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orders` VALUES (3,0,'','','','','','','','','','','banktransfer',1600.00,200.00,1800.00,'::1','2024-06-09 16:55:23'),(4,0,'','','','','','','','','','','banktransfer',800.00,200.00,1000.00,'::1','2024-06-09 16:59:56'),(5,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','afasfa','cashondelivery',400.00,200.00,600.00,'::1','2024-06-09 17:01:44'),(6,0,'bilal','bilal@gmail.com','4k karachi','karachi','sindh','2424','pak','03130200300','','asfafsdf','banktransfer',800.00,200.00,1000.00,'::1','2024-06-10 14:44:52'),(7,0,'bilal','bilal@gmail.com','123karachi','karachi','sindh','2424','pak','03130200300','','kfayiofajlfoli','banktransfer',3200.00,200.00,3400.00,'::1','2024-06-10 14:49:32'),(8,0,'bilal','admin@cybernsoft.com','123karachi','karachi','sindh','2424','pak','03130200300','','gkdyhkh','cashondelivery',2800.00,200.00,3000.00,'d7faded64195fd1301cb08ce07e06d09','2024-06-15 11:02:47'),(9,NULL,'bilal','bilal@gmail.com','123karachi','karachi','sindh','2424','pak','03130200300','','klkucu','cashondelivery',2800.00,200.00,3000.00,'838210ee4031079eae29ebf7717fc262','2024-06-15 14:39:47'),(10,NULL,'bilal','admin@gmail.com','123karachi','karachi','sindh','2424','pak','03130200300','','lkahsdl','cashondelivery',1600.00,200.00,1800.00,'3fb3fcb66260a325fedf796413b9da6d','2024-06-16 11:27:04'),(11,NULL,'bb','bilal@gmail.com','123karachi','karachi','sfas','2424','pak','97896860','','khlgkj','cashondelivery',400.00,200.00,600.00,'3fb3fcb66260a325fedf796413b9da6d','2024-06-16 11:28:58'),(12,NULL,'bilal','admin@gmail.com','123karachi','karachi','sindh','2424','pak','97896860','','yit7i8gu','cashondelivery',800.00,200.00,1000.00,'3fb3fcb66260a325fedf796413b9da6d','2024-06-16 11:35:33'),(13,NULL,'bilal','bilal@gmail.com','','karachi','sindh','802839','pak','08091283098','','','cashondelivery',0.00,200.00,200.00,'865a28009545bf6209b98f0b337a4084','2024-06-19 10:14:23'),(14,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','','cashondelivery',400.00,200.00,600.00,'865a28009545bf6209b98f0b337a4084','2024-06-19 10:26:27'),(16,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','','cashondelivery',800.00,200.00,1000.00,'865a28009545bf6209b98f0b337a4084','2024-06-19 10:29:11'),(20,NULL,'bilal','bilal@gmail.com','','aklfkl','sindh','lhfoila','pak','3097520975','','','cashondelivery',0.00,200.00,200.00,'cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 10:32:35'),(22,NULL,'bilal','bilal@gmail.com','','sssss','dsss','ssssss','pak','23443','','','cashondelivery',0.00,200.00,200.00,'cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 10:41:40'),(23,NULL,'bilal','bilal@gmail.com','','karachi','sindh','2424','pak','97896860','','','cashondelivery',400.00,200.00,600.00,'cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 10:43:15'),(24,NULL,'bilal','bilal@gmail.com','123karachi','khou','sindh','hsoi','pak','o34899-90','','','cashondelivery',0.00,200.00,200.00,'cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 10:45:18'),(25,NULL,'bilal','bilal@gmail.com','','p9qrfoaj','rpoju09p','902rwiodkla','pak','8609709','','','cashondelivery',0.00,200.00,200.00,'cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 10:48:45'),(26,NULL,'bilal','admin@gmail.com','','wd2342','as','34523','pak','3242342','','','cashondelivery',0.00,200.00,200.00,'cf855c4e7f4da9a69aba3f31306a5c05','2024-06-19 10:50:32'),(27,NULL,'bilal','bilal@gmail.com','123karachi','karachi','sindh','iio','pak','09789798709','','','cashondelivery',800.00,200.00,1000.00,'b20e84fdbdc0d289017e2817e1880e6e','2024-06-21 13:54:35'),(28,NULL,'bilal','bilal@gmail.com','123karachi','karachi','sindh','2424','pak','3097520975','','sssssssssssssssssssssssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','cashondelivery',3200.00,200.00,3400.00,'b20e84fdbdc0d289017e2817e1880e6e','2024-06-21 14:17:08'),(29,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','','cashondelivery',800.00,200.00,1000.00,'32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 14:08:54'),(31,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','','cashondelivery',0.00,200.00,200.00,'32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 14:35:20'),(32,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','','cashondelivery',1200.00,200.00,1400.00,'32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 14:45:51'),(33,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','','cashondelivery',800.00,200.00,1000.00,'32e4d8cb327d9ef2867f766c0e2bf379','2024-06-28 14:47:01'),(34,NULL,'bilal','bilal@gmail.com','123karachi','karachi','sindh','2424','pak','97896860','','it is in pakistan dummy data','cashondelivery',1600.00,200.00,1800.00,'fe91a2f34686594ad93c0392603f6c87','2024-07-03 19:08:30'),(35,NULL,'bilal','bilal@gmail.com','123karachi','karachi','sindh','2424','pak','97896860','','it is in pakistan dummy data','cashondelivery',0.00,200.00,200.00,'fe91a2f34686594ad93c0392603f6c87','2024-07-03 19:08:47'),(36,NULL,'bilal','bilal@gmail.com','ada','karachi','sindh','2424','pak','97896860','252221','bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb','cashondelivery',2400.00,200.00,2600.00,'b0edcb9f76abf1c01b5f6b8e2e4fa536','2024-07-12 19:53:34');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orders` with 28 row(s)
--

--
-- Table structure for table `order_items`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `per_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `is_active` int(11) DEFAULT 1,
  `is_cancelled` int(11) NOT NULL DEFAULT 0,
  `is_completed` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `order_items` VALUES (4,3,2,2,800.00,1600.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(5,4,2,1,800.00,800.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(6,5,1,1,400.00,400.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(7,6,2,1,800.00,800.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(8,7,2,3,800.00,2400.00,'2024-06-10 21:40:40','2024-06-10 23:51:23',0,1,0),(9,7,1,2,400.00,800.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(10,8,2,2,800.00,1600.00,'2024-06-15 16:02:47',NULL,1,0,0),(11,8,1,3,400.00,1200.00,'2024-06-15 16:02:47',NULL,1,0,0),(12,9,1,3,400.00,1200.00,'2024-06-15 19:39:47','2024-06-15 19:39:58',0,1,0),(13,9,2,2,800.00,1600.00,'2024-06-15 19:39:47',NULL,1,0,0),(14,10,2,2,800.00,1600.00,'2024-06-16 16:27:04',NULL,1,0,0),(15,11,1,1,400.00,400.00,'2024-06-16 16:28:58',NULL,1,0,0),(16,12,2,1,800.00,800.00,'2024-06-16 16:35:33',NULL,1,0,0),(19,16,2,1,800.00,800.00,'2024-06-19 15:29:11',NULL,1,0,0),(20,23,1,1,400.00,400.00,'2024-06-19 15:43:15',NULL,1,0,0),(21,27,2,1,800.00,800.00,'2024-06-21 18:54:35',NULL,1,0,0),(22,28,1,2,400.00,800.00,'2024-06-21 19:17:08',NULL,1,0,0),(23,28,2,3,800.00,2400.00,'2024-06-21 19:17:08',NULL,1,0,0),(24,29,2,1,800.00,800.00,'2024-06-28 19:08:54',NULL,1,0,0),(25,32,1,3,400.00,1200.00,'2024-06-28 19:45:51',NULL,1,0,0),(26,33,2,1,800.00,800.00,'2024-06-28 19:47:01',NULL,1,0,0),(27,34,1,2,400.00,800.00,'2024-07-04 00:08:30',NULL,1,0,0),(28,34,2,1,800.00,800.00,'2024-07-04 00:08:30',NULL,1,0,0),(29,36,2,2,800.00,1600.00,'2024-07-13 00:53:34',NULL,1,0,0),(30,36,1,2,400.00,800.00,'2024-07-13 00:53:34','2024-07-13 00:54:48',0,1,0);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `order_items` with 25 row(s)
--

--
-- Table structure for table `product`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) DEFAULT NULL,
  `image1` longtext DEFAULT NULL,
  `image2` longtext DEFAULT NULL,
  `image3` longtext DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `product` VALUES (1,1,'ashtry_green.jpg','ashtry_green1.jpg',NULL,'Astry','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\nbbbbbbbbbbbbbbbbbbbbbbbbb\r\nbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb',20,400,'2024-06-09 21:39:34','2024-06-09 21:39:55',NULL),(2,2,'massagerPink.jpg','guashaPink.jpg','massagerPink2.jpg','Massager Roller','massager roler massageer roller',10,800,'2024-06-09 21:39:34','2024-06-09 21:39:59',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `product` with 2 row(s)
--

--
-- Table structure for table `product_category`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `product_category` VALUES (1,'massager','2023-10-08 03:30:04',NULL,NULL),(2,'game','2023-10-08 03:30:59','2024-07-15 19:01:13',NULL),(3,'bunch','2023-10-17 20:23:27',NULL,NULL),(4,'LAST','2024-07-15 18:49:07','2024-07-15 19:06:33','2024-07-15 16:06:33');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `product_category` with 4 row(s)
--

--
-- Table structure for table `reviews`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `reviews` with 0 row(s)
--

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `parent_name` varchar(500) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (1,'bilal','bilal@gmail.com','abubakar','03132004040','123..','admin','2023-10-10 12:18:09','2024-08-19 20:36:52',NULL),(2,'hasan','abu@gmail.co','ali','0310220200','321',NULL,'2023-10-10 12:18:09','2024-03-31 18:02:49',NULL),(3,'usman','usman@gmail.com','usaman p','0909090909','123',NULL,'2024-07-13 16:43:23','2024-07-13 21:24:16',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `user` with 3 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Mon, 19 Aug 2024 17:52:55 +0200
