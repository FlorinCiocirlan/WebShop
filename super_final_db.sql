-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: webshop
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (3,'MacBook Air Retina 13','16GB RAM, 128GB SSD, Gold - INT KB','Laptop','Apple',1,1699,'2.jpeg',0),(4,'LG 50UN81006LB 50','Smart, 4K Ultra HD, HDR LED, TV with Google Assistant & Amazon Alexa','TV','LG',0,899,'3.jpg',0),(14,'LG OLED 55E8PLA','Smart, 4k OLED, Premium Ultra HD and Dolby Vision labeled','TV','LG',4,1199,'4.jpg',0),(15,'Panasonic TX-50GX700B','Smart, 4k HDR, LED, Wireless-USB-HDMI, 50 Inches, 16 Kilograms','TV','Panasonic',7,399,'5.jpg',0),(16,'LG 43UN70054LA','Smart, 4k OLED, Premium Ultra HD and Dolby Vision labeled, 50 Inches','TV','LG',3,599,'6.jpg',1),(17,'MacBook Pro (15-Inch)','16GB RAM, 512GB SSD, Space Grey','Laptop','Apple',8,1999,'8.jpg',0),(18,'MacBook Air (13-Inch)','1.6GHz Dual-Core Intel Core i5, 8GB RAM, 128GB, Space Grey','Laptop','Apple',4,1299,'9.jpg',0),(19,'Yoga Laptop','2 in1 360° Convertible Notebook Windows 10 Touchscreen Ultrabook Tablet PC, Intel N4100 up to 2.4 GHz, 4G RAM, 64G SSD, 2.4 GHz, FHD 1920 x 1080','Laptop','IProda',10,259,'10.jpg',0),(20,'Dell Inspiron 5491','14-Inch FHD IPS Touchscreen 2-in-1 Laptop (Silver) Intel Core i7-10510U, 16GB RAM, 512GB SSD, FINGERPRINT READER, Windows 10 Home','Laptop','Dell',25,899,'11.jpg',0),(33,'Philips 43PUS7304/12','43-Inch 4K UHD Android Smart TV with Ambilight and HDR 10+, Works With Alexa - Bright Silver (2019/2020 Model)','TV','Philips',3,499,'23.jpg',0),(21,'Dell Inspiron G5','15.6 inch FHD 144Hz 300 nits IPS Anti-Glare LED Backlit Narrow Border Gaming laptop, Intel Core i5-10300H, 8 GB RAM, 512 GB SSD, NVIDIA GeForce GTX 1660Ti 6GB GDDR6, Win 10 Home','Laptop','Dell',23,999,'12.jpg',0),(23,'ASUS Chromebook C423NA','14 Inch Laptop, Intel Celeron N3350, 4 GB RAM, 64GB eMMC, Chrome OS','Laptop','Asus',34,239,'13.jpeg',0),(24,'ASUS TUF FX505','15.6 Inch IPS Full HD Gaming Laptop - Intel i5-9300H, Nvidia GeForce GTX 1650 4 GB, 8 GB RAM, 512 GB NMVe PCI-e SSD, Windows 10), Stealth Black','Laptop','Asus',12,699,'14.jpeg',0),(25,'Acer Nitro 5 AN515-55','15.6 inch Gaming Laptop (Intel Core i5-10300H, 8GB RAM, 512GB SSD, NVIDIA GTX 1660Ti, Full HD 144Hz Display, Windows 10, Black)','Laptop','Acer',7,799,'15.jpg',0),(26,'HUAWEI MateBook X Pro 2020','13.9-Inch Full View Touchscreen Ultrabook, 10th Gen Intel i5 10210U , 16GB RAM, 512GB SSD, NVIDIA® GeForce® MX250, HUAWEI Share, Windows 10 Home, Space Grey','Laptop','Huawei',2,1299,'16.jpg',0),(27,'Apple iPhone XS','Apple A12 Bionic, 2.5 GHz,iOS 12, Nano SIM, Waterproof, 64 GB, RAM 4 GB','Smartphone','Apple',45,999,'17.jpg',0),(28,'Galaxy Note10+ 5G','Single-SIM 512 GB 6.3-Inch Android Smartphone - Aura Black','Smartphone','Samsung',23,799,'18.jpg',0),(29,'Galaxy Note20 Ultra','Single-SIM 512 GB 6.9-Inch Android Smartphone - Bronze ','Smartphone','Samsung',23,1399,'19.jpg',0),(30,'Galaxy S20+','Single-SIM 128 GB 6.5-Inch Android Smartphone - Grey ','Smartphone','Samsung',14,899,'20.jpg',0),(31,'Nokia 3310','Classic Rare Phone, The Legend','Smartphone','Nokia',1,2000,'21.jpeg',0),(32,'Samsung 2020 Q60T','QLED 4K Quantum HDR Smart TV with Tizen OS','TV','Samsung',2,959,'22.jpg',0);
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adamalt@gmail.com','4802896f5255cfc05771b1c5fe283df8','Adam','aleea Popescu Petrescu nr 12','+40756898989        ',0,1),(2,'pogar.adi@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',' Adrian','o adresa','0774078644',0,0),(3,'pogar@yahoo.com','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL,NULL,0,0);
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

-- Dump completed on 2020-10-21 16:11:31
