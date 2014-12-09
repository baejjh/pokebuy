CREATE DATABASE  IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecommerce`;
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
  `state_id` int(11) NOT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`state_id`),
  KEY `fk_addresses_states1_idx` (`state_id`),
  CONSTRAINT `fk_addresses_states1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'123 rainbow drive',NULL,'Oahu',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(2,'123 rainbow drive',NULL,'Honolulu',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(3,'123 rainbow drive',NULL,'Big Island',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(4,'123 rainbow drive',NULL,'Maui',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(5,'123 rainbow drive',NULL,'Kauai',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(6,'123 rainbow drive',NULL,'Molokai',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(7,'123 rainbow drive',NULL,'Niihau',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(8,'123 rainbow drive',NULL,'Lanai',11,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(9,'321 Rainy Daze Rd.',NULL,'Seattle',46,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(10,'321 Rainy Daze Rd.',NULL,'Tri-Citeis',46,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(11,'321 Rainy Daze Rd.',NULL,'Spokane',46,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(12,'321 Rainy Daze Rd.',NULL,'Olympia',46,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14'),(13,'321 Rainy Daze Rd.',NULL,'Vancouver',46,NULL,'2014-12-09 10:22:14','2014-12-09 10:22:14');
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
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
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
  `location` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/001.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(2,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/002.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(3,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/003.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(4,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/004.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(5,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/005.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(6,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/006.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(7,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/007.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(8,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/008.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(9,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/009.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(10,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/010.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(11,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/011.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(12,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/012.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(13,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/013.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(14,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/014.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(15,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/015.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(16,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/016.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(17,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/017.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(18,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/018.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(19,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/019.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(20,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/020.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(21,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/021.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(22,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/022.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(23,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/023.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(24,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/024.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(25,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/025.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(26,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/026.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(27,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/027.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(28,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/028.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(29,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/029.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(30,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/030.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(31,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/031.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(32,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/032.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(33,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/033.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(34,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/034.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(35,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/035.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(36,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/036.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(37,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/037.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(38,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/038.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(39,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/039.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(40,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/040.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(41,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/041.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(42,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/042.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(43,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/043.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(44,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/044.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(45,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/045.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(46,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/046.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(47,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/047.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(48,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/048.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(49,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/049.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(50,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/050.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(51,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/051.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(52,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/052.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(53,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/053.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32'),(54,'http://assets22.pokemon.com/assets/cms2/img/pokedex/full/054.png',NULL,'2014-12-09 06:50:32','2014-12-09 06:50:32');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_has_products`
--

DROP TABLE IF EXISTS `images_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_has_products` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`image_id`,`product_id`),
  KEY `fk_images_has_products_products1_idx` (`product_id`),
  KEY `fk_images_has_products_images1_idx` (`image_id`),
  CONSTRAINT `fk_images_has_products_images1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `billing_customer_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `shipping_price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `shipping_customer_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customers_idx` (`billing_customer_id`),
  KEY `fk_orders_statuses1_idx` (`status_id`),
  KEY `fk_orders_addresses1_idx` (`billing_address_id`),
  KEY `fk_orders_customers1_idx` (`shipping_customer_id`),
  KEY `fk_orders_addresses2_idx` (`shipping_address_id`),
  CONSTRAINT `fk_orders_statuses1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_addresses1` FOREIGN KEY (`billing_address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_addresses2` FOREIGN KEY (`shipping_address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_customers` FOREIGN KEY (`billing_customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_customers1` FOREIGN KEY (`shipping_customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for table `orders_has_products`
--

DROP TABLE IF EXISTS `orders_has_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_has_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity_ordered` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `fk_orders_has_products_products1_idx` (`product_id`),
  KEY `fk_orders_has_products_orders1_idx` (`order_id`),
  CONSTRAINT `fk_orders_has_products_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_has_products`
--

LOCK TABLES `orders_has_products` WRITE;
/*!40000 ALTER TABLE `orders_has_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_has_products` ENABLE KEYS */;
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
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
INSERT INTO `product_categories` VALUES (1,7,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(1,8,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(2,7,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(2,8,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(3,7,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(3,8,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(4,1,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(5,1,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(6,1,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(6,9,'2014-12-09 06:14:29','2014-12-09 06:14:29'),(7,2,'2014-12-09 06:20:19','2014-12-09 06:20:19'),(8,2,'2014-12-09 06:20:19','2014-12-09 06:20:19'),(9,2,'2014-12-09 06:20:19','2014-12-09 06:20:19'),(10,6,'2014-12-09 06:21:07','2014-12-09 06:21:07'),(11,6,'2014-12-09 06:21:07','2014-12-09 06:21:07'),(12,6,'2014-12-09 06:21:07','2014-12-09 06:21:07'),(12,9,'2014-12-09 06:21:07','2014-12-09 06:21:07'),(13,6,'2014-12-09 06:22:19','2014-12-09 06:22:19'),(13,7,'2014-12-09 06:22:19','2014-12-09 06:22:19'),(14,6,'2014-12-09 06:22:19','2014-12-09 06:22:19'),(14,7,'2014-12-09 06:22:20','2014-12-09 06:22:20'),(15,6,'2014-12-09 06:22:20','2014-12-09 06:22:20'),(15,7,'2014-12-09 06:22:20','2014-12-09 06:22:20'),(16,3,'2014-12-09 06:22:20','2014-12-09 06:22:20'),(16,9,'2014-12-09 06:22:20','2014-12-09 06:22:20'),(17,3,'2014-12-09 06:22:48','2014-12-09 06:22:48'),(17,9,'2014-12-09 06:22:48','2014-12-09 06:22:48'),(18,3,'2014-12-09 06:22:48','2014-12-09 06:22:48'),(18,9,'2014-12-09 06:22:48','2014-12-09 06:22:48'),(19,3,'2014-12-09 06:22:48','2014-12-09 06:22:48'),(20,3,'2014-12-09 06:22:48','2014-12-09 06:22:48'),(21,3,'2014-12-09 06:24:31','2014-12-09 06:24:31'),(21,9,'2014-12-09 06:24:31','2014-12-09 06:24:31'),(22,3,'2014-12-09 06:24:31','2014-12-09 06:24:31'),(22,9,'2014-12-09 06:24:31','2014-12-09 06:24:31'),(23,7,'2014-12-09 06:24:31','2014-12-09 06:24:31'),(24,7,'2014-12-09 06:24:31','2014-12-09 06:24:31'),(25,11,'2014-12-09 06:25:48','2014-12-09 06:25:48'),(26,11,'2014-12-09 06:25:48','2014-12-09 06:25:48'),(27,5,'2014-12-09 06:25:48','2014-12-09 06:25:48'),(28,5,'2014-12-09 06:25:48','2014-12-09 06:25:48'),(29,7,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(30,7,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(31,5,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(31,7,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(32,7,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(33,7,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(34,5,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(34,7,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(35,10,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(36,10,'2014-12-09 06:27:50','2014-12-09 06:27:50'),(37,1,'2014-12-09 06:30:14','2014-12-09 06:30:14'),(38,1,'2014-12-09 06:30:14','2014-12-09 06:30:14'),(39,3,'2014-12-09 06:30:14','2014-12-09 06:30:14'),(39,10,'2014-12-09 06:30:14','2014-12-09 06:30:14'),(40,3,'2014-12-09 06:30:14','2014-12-09 06:30:14'),(40,10,'2014-12-09 06:30:14','2014-12-09 06:30:14'),(41,7,'2014-12-09 06:31:24','2014-12-09 06:31:24'),(41,9,'2014-12-09 06:31:24','2014-12-09 06:31:24'),(42,7,'2014-12-09 06:31:24','2014-12-09 06:31:24'),(42,9,'2014-12-09 06:31:25','2014-12-09 06:31:25'),(43,7,'2014-12-09 06:31:25','2014-12-09 06:31:25'),(43,8,'2014-12-09 06:31:25','2014-12-09 06:31:25'),(44,7,'2014-12-09 06:31:25','2014-12-09 06:31:25'),(44,8,'2014-12-09 06:31:25','2014-12-09 06:31:25'),(45,7,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(45,8,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(46,6,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(46,8,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(47,6,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(47,8,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(48,6,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(48,7,'2014-12-09 06:32:39','2014-12-09 06:32:39'),(49,6,'2014-12-09 06:33:31','2014-12-09 06:33:31'),(49,7,'2014-12-09 06:33:31','2014-12-09 06:33:31'),(50,5,'2014-12-09 06:33:31','2014-12-09 06:33:31'),(51,5,'2014-12-09 06:33:31','2014-12-09 06:33:31'),(52,3,'2014-12-09 06:33:31','2014-12-09 06:33:31'),(53,3,'2014-12-09 06:33:31','2014-12-09 06:33:31');
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
  `description` text,
  `price` decimal(7,2) DEFAULT NULL,
  `inventory_count` int(11) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL,
  `main_image_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_images1_idx` (`main_image_id`),
  CONSTRAINT `fk_products_images1` FOREIGN KEY (`main_image_id`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bulbasaur',NULL,9.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(2,'Ivysaur',NULL,22.67,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(3,'Venusaur',NULL,77.89,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(4,'Charmander',NULL,88.00,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(5,'Charmeleon',NULL,99.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(6,'Charizard',NULL,123.23,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(7,'Squirtle',NULL,987.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(8,'Wartortle',NULL,234.45,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(9,'Blastoise',NULL,678.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(10,'Caterpie',NULL,0.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(11,'Metapod',NULL,11.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(12,'Butterfree',NULL,12.89,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(13,'Weedle',NULL,0.98,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(14,'Kakuna',NULL,9.90,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(15,'Beedrill',NULL,12.90,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(16,'Pidgey',NULL,23.23,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(17,'Pidgeotto',NULL,34.09,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(18,'Pidgeot',NULL,45.56,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(19,'Rattata',NULL,23.09,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(20,'Raticate',NULL,34.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(21,'Spearow',NULL,56.56,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(22,'Fearow',NULL,0.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(23,'Ekans',NULL,34.44,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(24,'Arbok',NULL,67.77,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(25,'Pikachu',NULL,12.22,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(26,'Raichu',NULL,23.33,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(27,'Sandshrew',NULL,33.44,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(28,'Sandslash',NULL,44.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(29,'Nidoran',NULL,22.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(30,'Nidorina',NULL,99.00,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(31,'Nidoqueen',NULL,1.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(32,'Nidoran',NULL,88.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(33,'Nidorino',NULL,33.56,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(34,'Nidoking',NULL,56.90,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(35,'Clefairy',NULL,123.23,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(36,'Clefable',NULL,234.34,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(37,'Vulpix',NULL,45.55,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(38,'Ninetales',NULL,66.90,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(39,'Jigglypuff',NULL,33.78,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(40,'Wigglypuff',NULL,44.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(41,'Zubat',NULL,999.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(42,'Golbat',NULL,22.22,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(43,'Oddish',NULL,77.88,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(44,'Gloom',NULL,99.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(45,'Vileplume',NULL,14.45,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(46,'Paras',NULL,556.65,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(47,'Parasect',NULL,89.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(48,'Venonat',NULL,34.34,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(49,'Venomoth',NULL,54.45,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(50,'Diglett',NULL,76.89,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(51,'Dugtrio',NULL,65.65,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(52,'Meowth',NULL,54.54,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52'),(53,'Persian',NULL,999.99,10,0,0,'2014-12-08 14:06:52','2014-12-08 14:06:52');
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
  `abbreviation` varchar(2) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'AL','Alabama','2014-12-08 15:42:01','2014-12-08 15:42:01'),(2,'AK','Alaska','2014-12-08 15:42:01','2014-12-08 15:42:01'),(3,'AZ','Arizona','2014-12-08 15:42:01','2014-12-08 15:42:01'),(4,'AR','Arkansas','2014-12-08 15:42:01','2014-12-08 15:42:01'),(5,'CA','California','2014-12-08 15:42:01','2014-12-08 15:42:01'),(6,'CO','Colorado','2014-12-08 15:42:01','2014-12-08 15:42:01'),(7,'CT','Connecticut','2014-12-08 15:42:01','2014-12-08 15:42:01'),(8,'DE','Delaware','2014-12-08 15:42:01','2014-12-08 15:42:01'),(9,'FL','Florida','2014-12-08 15:42:01','2014-12-08 15:42:01'),(10,'GA','Georgia','2014-12-08 15:42:01','2014-12-08 15:42:01'),(11,'HI','Hawaii','2014-12-08 15:42:01','2014-12-08 15:42:01'),(12,'ID','Idaho','2014-12-08 15:42:01','2014-12-08 15:42:01'),(13,'IL','Illinois','2014-12-08 15:42:01','2014-12-08 15:42:01'),(14,'IN','Indiana','2014-12-08 15:42:01','2014-12-08 15:42:01'),(15,'IA','Iowa','2014-12-08 15:42:01','2014-12-08 15:42:01'),(16,'KS','Kansas','2014-12-08 15:42:01','2014-12-08 15:42:01'),(17,'KY','Kentucky','2014-12-08 15:42:01','2014-12-08 15:42:01'),(18,'LA','Louisiana','2014-12-08 15:42:01','2014-12-08 15:42:01'),(19,'ME','Maine','2014-12-08 15:42:01','2014-12-08 15:42:01'),(20,'MD','Maryland','2014-12-08 15:42:01','2014-12-08 15:42:01'),(21,'MA','Massachusetts','2014-12-08 15:42:01','2014-12-08 15:42:01'),(22,'MI','Michigan','2014-12-08 15:42:01','2014-12-08 15:42:01'),(23,'MN','Minnesota','2014-12-08 15:42:01','2014-12-08 15:42:01'),(24,'MS','Mississippi','2014-12-08 15:42:01','2014-12-08 15:42:01'),(25,'MO','Missouri','2014-12-08 15:42:01','2014-12-08 15:42:01'),(26,'MT','Montana','2014-12-08 15:42:01','2014-12-08 15:42:01'),(27,'NE','Nebraska','2014-12-08 15:42:01','2014-12-08 15:42:01'),(28,'NH','New Hampshire','2014-12-08 15:42:01','2014-12-08 15:42:01'),(29,'NJ','New Jersey','2014-12-08 15:42:01','2014-12-08 15:42:01'),(30,'NM','New Mexico','2014-12-08 15:42:01','2014-12-08 15:42:01'),(31,'NY','New York','2014-12-08 15:42:01','2014-12-08 15:42:01'),(32,'NC','North Carolina','2014-12-08 15:42:01','2014-12-08 15:42:01'),(33,'ND','North Dakota','2014-12-08 15:42:01','2014-12-08 15:42:01'),(34,'OH','Ohio','2014-12-08 15:42:01','2014-12-08 15:42:01'),(35,'OK','Oklahoma','2014-12-08 15:42:01','2014-12-08 15:42:01'),(36,'OR','Oregon','2014-12-08 15:42:01','2014-12-08 15:42:01'),(37,'PA','Pennsylvania','2014-12-08 15:42:01','2014-12-08 15:42:01'),(38,'RI','Rhode Island','2014-12-08 15:42:01','2014-12-08 15:42:01'),(39,'SC','South Carolina','2014-12-08 15:42:01','2014-12-08 15:42:01'),(40,'SD','South Dakota','2014-12-08 15:42:01','2014-12-08 15:42:01'),(41,'TN','Tennessee','2014-12-08 15:42:01','2014-12-08 15:42:01'),(42,'TX','Texas','2014-12-08 15:42:01','2014-12-08 15:42:01'),(43,'UT','Utah','2014-12-08 15:42:01','2014-12-08 15:42:01'),(44,'VT','Vermont','2014-12-08 15:42:01','2014-12-08 15:42:01'),(45,'VA','Virginia','2014-12-08 15:42:01','2014-12-08 15:42:01'),(46,'WA','Washington','2014-12-08 15:42:01','2014-12-08 15:42:01'),(47,'WV','West Virginia','2014-12-08 15:42:01','2014-12-08 15:42:01'),(48,'WI','Wisconsin','2014-12-08 15:42:01','2014-12-08 15:42:01'),(49,'WY','Wyoming','2014-12-08 15:42:01','2014-12-08 15:42:01');
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Pending','2014-12-09 06:15:57','2014-12-09 06:15:57'),(2,'Ordered','2014-12-09 06:16:08','2014-12-09 06:16:08'),(3,'Shipped','2014-12-09 06:16:16','2014-12-09 06:16:16'),(4,'Returned','2014-12-09 06:16:21','2014-12-09 06:16:21');
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

-- Dump completed on 2014-12-09 10:29:47