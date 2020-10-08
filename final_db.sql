-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: webshop
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (2,'Active',2);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_product`
--

DROP TABLE IF EXISTS `cart_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_product` (
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_product`
--

LOCK TABLES `cart_product` WRITE;
/*!40000 ALTER TABLE `cart_product` DISABLE KEYS */;
INSERT INTO `cart_product` VALUES (2,2,4),(2,3,3),(2,4,5);
/*!40000 ALTER TABLE `cart_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'tv','tv',0),(3,'laptop','laptop',0),(4,'smartphone','smartphone',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `delivery_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (2,2,2,'Cash','Local Post (5.99 USD)','placed'),(3,2,2,'Cash','Local Post (5.99 USD)','placed'),(4,2,2,'Cash','Local Post (5.99 USD)','placed'),(5,2,2,'Cash','Local Post (5.99 USD)','placed'),(6,2,2,'Cash','Local Post (5.99 USD)','placed'),(7,2,2,'Cash','Local Post (5.99 USD)','placed'),(8,2,2,'Cash','Local Post (5.99 USD)','placed'),(9,2,2,'Cash','Local Post (5.99 USD)','placed'),(10,2,2,'Cash','DHL Express (15.99 USD)','placed'),(11,2,2,'Cash','DHL Express (15.99 USD)','placed'),(12,2,2,'Cash','DHL Express (15.99 USD)','placed'),(13,2,2,'Cash','DHL Express (15.99 USD)','placed'),(14,2,2,'Cash','DHL Express (15.99 USD)','placed'),(15,2,2,'Cash','DHL Express (15.99 USD)','placed'),(16,2,2,'Cash','DHL Express (15.99 USD)','placed'),(17,2,2,'Cash','DHL Express (15.99 USD)','placed'),(18,2,2,'Cash','DHL Express (15.99 USD)','placed'),(19,2,2,'Cash','DHL Express (15.99 USD)','placed'),(20,2,2,'Cash','DHL Express (15.99 USD)','placed'),(21,2,2,'Cash','DHL Express (15.99 USD)','placed'),(22,2,2,'Cash','DHL Express (15.99 USD)','placed'),(23,2,2,'Cash','DHL Express (15.99 USD)','placed'),(24,2,2,'Cash','DHL Express (15.99 USD)','placed'),(25,2,2,'Cash','DHL Express (15.99 USD)','placed'),(26,2,2,'Cash','DHL Express (15.99 USD)','placed'),(27,2,2,'Cash','Local Post (5.99 USD)','placed'),(28,2,2,'Cash','Local Post (5.99 USD)','placed'),(29,2,2,'Cash','Local Post (5.99 USD)','placed'),(30,2,2,'Cash','Local Post (5.99 USD)','placed'),(31,2,2,'Cash','Local Post (5.99 USD)','placed'),(32,2,2,'Cash','Local Post (5.99 USD)','placed'),(33,2,2,'Cash','Local Post (5.99 USD)','placed'),(34,2,2,'Cash','Local Post (5.99 USD)','placed'),(35,2,2,'Cash','Local Post (5.99 USD)','placed'),(36,2,2,'Cash','Local Post (5.99 USD)','placed'),(37,2,2,'Cash','Local Post (5.99 USD)','placed'),(38,2,2,'Cash','Local Post (5.99 USD)','placed'),(39,2,2,'Cash','Local Post (5.99 USD)','placed'),(40,2,2,'Cash','Pick up from location (Free)','placed'),(41,2,2,'Cash','Pick up from location (Free)','placed'),(42,2,2,'Cash','Pick up from location (Free)','placed'),(43,2,2,'Cash','Pick up from location (Free)','placed'),(44,2,2,'Cash','Pick up from location (Free)','placed'),(45,2,2,'Cash','Pick up from location (Free)','placed'),(46,2,2,'Cash','Pick up from location (Free)','placed'),(47,2,2,'Cash','Pick up from location (Free)','placed'),(48,2,2,'Cash','Pick up from location (Free)','placed'),(49,2,2,'Cash','Pick up from location (Free)','placed'),(50,2,2,'Cash','Pick up from location (Free)','placed'),(51,2,2,'Cash','Pick up from location (Free)','placed'),(52,2,2,'Cash','Pick up from location (Free)','placed'),(53,2,2,'Cash','Pick up from location (Free)','placed'),(54,2,2,'Cash','DHL Express (15.99 USD)','placed');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (2,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',5,2299,'1.jpg',0),(3,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(4,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',6,699,'3.jpg',0),(5,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',0,699,'3.jpg',0),(6,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',6,699,'3.jpg',0),(7,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',4,699,'3.jpg',0),(8,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',6,699,'3.jpg',0),(9,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',6,699,'3.jpg',0),(10,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',6,699,'3.jpg',0),(11,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',6,699,'3.jpg',0),(12,'LG 50UN81006LB 50','Smart 4K Ultra HD HDR LED TV with Google Assistant & Amazon Alexa','Smart TV','LG',1,699,'3.jpg',0),(13,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(14,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(15,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(16,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(17,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',1,1599,'2.jpeg',0),(18,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(19,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(20,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(21,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',3,1599,'2.jpeg',0),(22,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',5,2299,'1.jpg',0),(23,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',0,2299,'1.jpg',0),(24,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',5,2299,'1.jpg',0),(25,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',0,2299,'1.jpg',0),(26,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',5,2299,'1.jpg',0),(27,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',1,2299,'1.jpg',0),(28,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',5,2299,'1.jpg',0),(29,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',5,2299,'1.jpg',0),(30,'Galaxy Note20 Ultra','Samsung Galaxy Note20 Ultra is the best smart phone','Smartphone','Samsung',1,2299,'1.jpg',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `deleted` tinyint NOT NULL DEFAULT '0',
  `isadmin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adamalt@gmail.com','4802896f5255cfc05771b1c5fe283df8','Adam','aleea Popescu Petrescu nr 12','+40756898989',0,0),(2,'florineless@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-08 22:50:23
