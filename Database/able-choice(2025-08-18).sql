-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: able-choice
-- ------------------------------------------------------
-- Server version 	10.4.32-MariaDB
-- Date: Mon, 18 Aug 2025 21:09:32 +0200

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
INSERT INTO `address` VALUES (1,1,'surjani karachi','karachi','sindh','12345','paistan','2023-10-10 12:20:11',NULL,NULL),(2,2,'gulshan','karachi','sindh','09876','pakistan','2023-10-10 12:20:11',NULL,NULL),(3,3,'123karachi','karachi','sindh','889789','pakistan','2025-08-13 00:36:11',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_detail`
--

LOCK TABLES `card_detail` WRITE;
/*!40000 ALTER TABLE `card_detail` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `card_detail` VALUES (32,NULL,1,1,'8000','8000','::1','2024-06-09 21:25:33','2024-06-10 19:49:32','2024-06-10 19:49:32'),(33,NULL,2,2,'800','1600.00','::1','2024-06-09 21:25:46','2024-06-10 19:49:32','2024-06-10 19:49:32'),(34,NULL,2,1,'800','800','::1','2024-06-09 21:58:51','2024-06-10 19:49:32','2024-06-10 19:49:32'),(35,NULL,1,1,'400','400','::1','2024-06-09 22:01:12','2024-06-10 19:49:32','2024-06-10 19:49:32'),(36,NULL,1,2,'400','800.00','::1','2024-06-10 19:42:57','2024-06-10 19:49:32','2024-06-10 19:49:32'),(37,NULL,2,1,'800','800','::1','2024-06-10 19:43:06','2024-06-10 19:49:32','2024-06-10 19:49:32'),(38,NULL,2,3,'800','2400','::1','2024-06-10 19:45:58','2024-06-10 19:49:32','2024-06-10 19:49:32'),(39,NULL,1,2,'400','800.00','::1','2024-06-10 19:47:51','2024-06-10 19:49:32','2024-06-10 19:49:32'),(40,NULL,2,2,'800','1600.00','::1','2024-06-11 00:37:06','2025-06-10 14:28:51','2025-06-10 11:28:51'),(41,NULL,2,1,'800','800','0d15bfb68597ec7a2746c2be6d1e1769','2025-06-10 14:28:57','2025-07-27 11:49:40','2025-07-27 08:49:40'),(42,NULL,2,1,'800','800','92327ee2f0c7b24fc70ee21ab08fb598','2025-07-27 13:13:22','2025-07-27 13:16:51','2025-07-27 13:16:51'),(43,3,2,1,'800','800','0ca63164b3a4d3f0bab17114afc8d4d8','2025-08-13 00:45:14','2025-08-13 00:45:41','2025-08-13 00:45:41'),(44,1,2,1,'800','800','c74341b509da59686d6eb9ab938ac8b7','2025-08-18 22:45:32',NULL,NULL);
/*!40000 ALTER TABLE `card_detail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `card_detail` with 13 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orders` VALUES (3,0,'','','','','','','','','','','banktransfer',1600.00,200.00,1800.00,'::1','2024-06-09 16:55:23'),(4,0,'','','','','','','','','','','banktransfer',800.00,200.00,1000.00,'::1','2024-06-09 16:59:56'),(5,1,'bilal','bilal@gmail.com','','karachi','sindh','12345','pak','03132004040','','afasfa','cashondeleivery',400.00,200.00,600.00,'::1','2024-06-09 17:01:44'),(6,0,'bilal','bilal@gmail.com','4k karachi','karachi','sindh','2424','pak','03130200300','','asfafsdf','banktransfer',800.00,200.00,1000.00,'::1','2024-06-10 14:44:52'),(7,0,'bilal','bilal@gmail.com','123karachi','karachi','sindh','2424','pak','03130200300','','kfayiofajlfoli','banktransfer',3200.00,200.00,3400.00,'::1','2024-06-10 14:49:32'),(8,NULL,'bilal','bilal@gmail.com','123karachi','karachi','sindh','232','pak','1243124','23423423','sdaasf','cashondelivery',800.00,200.00,1000.00,'92327ee2f0c7b24fc70ee21ab08fb598','2025-07-27 08:16:51'),(9,3,'Bilal raza','raza@gmail.com','','karachi','sindh','889789','pak','03131313130','','','cashondelivery',800.00,200.00,1000.00,'0ca63164b3a4d3f0bab17114afc8d4d8','2025-08-12 19:45:41');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orders` with 7 row(s)
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
  `is_cancelled` int(11) DEFAULT NULL,
  `is_completed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `order_items` VALUES (4,3,2,2,800.00,1600.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(5,4,2,1,800.00,800.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(6,5,1,1,400.00,400.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(7,6,2,1,800.00,800.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(8,7,2,3,800.00,2400.00,'2024-06-10 21:40:40','2024-06-10 23:51:23',0,1,0),(9,7,1,2,400.00,800.00,'2024-06-10 21:40:40','2024-06-10 23:36:47',1,0,0),(10,8,2,1,800.00,800.00,'2025-07-27 13:16:51','2025-07-27 13:18:24',0,1,0),(11,9,2,1,800.00,800.00,'2025-08-13 00:45:41',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `order_items` with 8 row(s)
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
  `qty` int(11) DEFAULT NULL,
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
INSERT INTO `product` VALUES (1,4,'ashtry_green.webp','ashtry_green1.webp',NULL,'Astry','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\nbbbbbbbbbbbbbbbbbbbbbbbbb\r\nbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb',20,400,'2024-06-09 21:39:34','2025-08-13 00:39:00',NULL),(2,1,'massagerPink.webp','guashaPink.webp','massagerPink2.jpg','Massager Roller','massager roler massageer roller',10,800,'2024-06-09 21:39:34','2025-08-18 23:49:13',NULL);
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
INSERT INTO `product_category` VALUES (1,'massager','2023-10-08 03:30:04',NULL,NULL),(2,'game','2023-10-08 03:30:59',NULL,NULL),(3,'bunch','2023-10-17 20:23:27',NULL,NULL),(4,'Ashtray','2025-08-13 00:38:51',NULL,NULL);
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
INSERT INTO `user` VALUES (1,'bilal','bilal@gmail.com','abubakar','03132004040','123','admin','2023-10-10 12:18:09','2024-06-11 21:08:05',NULL),(2,'hasan','abu@gmail.co','ali','0310220200','321',NULL,'2023-10-10 12:18:09','2024-03-31 18:02:49',NULL),(3,'Bilal raza','raza@gmail.com','abub','03131313130','123456789','user','2025-08-13 00:36:11',NULL,NULL);
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

-- Dump completed on: Mon, 18 Aug 2025 21:09:32 +0200
