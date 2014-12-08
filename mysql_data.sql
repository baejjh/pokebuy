-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `states_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`states_id`),
  KEY `fk_addresses_states1_idx` (`states_id`),
  CONSTRAINT `fk_addresses_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fire','2014-12-08 13:54:39','2014-12-08 13:54:39'),(2,'Water','2014-12-08 13:54:39','2014-12-08 13:54:39'),(3,'Normal','2014-12-08 13:54:39','2014-12-08 13:54:39'),(4,'Fighting','2014-12-08 13:54:39','2014-12-08 13:54:39'),(5,'Ground','2014-12-08 13:54:39','2014-12-08 13:54:39'),(6,'Bug','2014-12-08 13:54:39','2014-12-08 13:54:39'),(7,'Poison','2014-12-08 13:54:39','2014-12-08 13:54:39'),(8,'Grass','2014-12-08 13:54:39','2014-12-08 13:54:39'),(9,'Flying','2014-12-08 13:54:39','2014-12-08 13:54:39'),(10,'Fairy','2014-12-08 13:54:39','2014-12-08 13:54:39'),(11,'Electric','2014-12-08 13:54:39','2014-12-08 13:54:39');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_has_products`
--

DROP TABLE IF EXISTS `images_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_has_products` (
  `images_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`images_id`,`products_id`),
  KEY `fk_images_has_products_products1_idx` (`products_id`),
  KEY `fk_images_has_products_images1_idx` (`images_id`),
  CONSTRAINT `fk_images_has_products_images1` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_has_products`
--

LOCK TABLES `images_has_products` WRITE;
/*!40000 ALTER TABLE `images_has_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `images_has_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `subtotal` decimal(2,0) DEFAULT NULL,
  `total` decimal(2,0) DEFAULT NULL,
  `statuses_id` int(11) NOT NULL,
  `shipping_price` decimal(2,0) DEFAULT NULL,
  `orderscol` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `addresses_id` int(11) NOT NULL,
  `addresses_states_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customers_idx` (`customer_id`),
  KEY `fk_orders_statuses1_idx` (`statuses_id`),
  KEY `fk_orders_addresses1_idx` (`addresses_id`,`addresses_states_id`),
  CONSTRAINT `fk_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_statuses1` FOREIGN KEY (`statuses_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_addresses1` FOREIGN KEY (`addresses_id`, `addresses_states_id`) REFERENCES `addresses` (`id`, `states_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `fk_categories_has_products_products1_idx` (`product_id`),
  KEY `fk_categories_has_products_categories1_idx` (`category_id`),
  CONSTRAINT `fk_categories_has_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,7),(1,8),(2,7),(2,8),(3,7),(3,8);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `inventory_count` int(11) DEFAULT '10',
  `quantity_sold` int(11) DEFAULT '0',
  `main_image` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bulbasaur',NULL,9.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(2,'Ivysaur',NULL,22.67,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(3,'Venusaur',NULL,77.89,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(4,'Charmander',NULL,88.00,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(5,'Charmeleon',NULL,99.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(6,'Charizard',NULL,123.23,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(7,'Squirtle',NULL,987.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(8,'Wartortle',NULL,234.45,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(9,'Blastoise',NULL,678.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(10,'Caterpie',NULL,0.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(11,'Metapod',NULL,11.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(12,'Butterfree',NULL,12.89,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(13,'Weedle',NULL,0.98,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(14,'Kakuna',NULL,9.90,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(15,'Beedrill',NULL,12.90,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(16,'Pidgey',NULL,23.23,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(17,'Pidgeotto',NULL,34.09,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(18,'Pidgeot',NULL,45.56,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(19,'Rattata',NULL,23.09,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(20,'Raticate',NULL,34.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(21,'Spearow',NULL,56.56,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(22,'Fearow',NULL,0.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(23,'Ekans',NULL,34.44,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(24,'Arbok',NULL,67.77,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(25,'Pikachu',NULL,12.22,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(26,'Raichu',NULL,23.33,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(27,'Sandshrew',NULL,33.44,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(28,'Sandslash',NULL,44.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(29,'Nidoran',NULL,22.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(30,'Nidorina',NULL,99.00,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(31,'Nidoqueen',NULL,1.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(32,'Nidoran',NULL,88.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(33,'Nidorino',NULL,33.56,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(34,'Nidoking',NULL,56.90,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(35,'Clefairy',NULL,123.23,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(36,'Clefable',NULL,234.34,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(37,'Vulpix',NULL,45.55,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(38,'Ninetales',NULL,66.90,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(39,'Jigglypuff',NULL,33.78,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(40,'Wigglypuff',NULL,44.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(41,'Zubat',NULL,999.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(42,'Golbat',NULL,22.22,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(43,'Oddish',NULL,77.88,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(44,'Gloom',NULL,99.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(45,'Vileplume',NULL,14.45,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(46,'Paras',NULL,556.65,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(47,'Parasect',NULL,89.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(48,'Venonat',NULL,34.34,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(49,'Venomoth',NULL,54.45,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(50,'Diglett',NULL,76.89,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(51,'Dugtrio',NULL,65.65,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(52,'Meowth',NULL,54.54,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(53,'Persian',NULL,999.99,10,0,NULL,'2014-12-08 14:06:52','2014-12-08 14:06:52');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbreviation` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ecommerce'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-08 15:00:41
