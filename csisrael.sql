-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: CS israel
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `published` date NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'hello test','first db message !! :) ','2005-04-05','pic.jpg','img.jpg'),(6,'בדיקת הפאנל בדפדפן אחר','מנסה לראות אם הכל עובד קשורה גם בדפדפן אופרה ','2023-06-30','pic.jpg','pfp-icon.jpg'),(8,'ניסוי 1','היי לכולם נעים להכיר  עגךלכעחןג גכןעגחכמע גכעחמיגםןכחע גכןעחגןכעןםגיכען עחןגןםכען','2023-09-17','','default.png'),(9,'Try from phone',' Hi this blog was writined from my phone','2023-09-26','','default.png');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `course_name` varchar(255) NOT NULL,
  `course_price` decimal(4,2) NOT NULL DEFAULT '79.90',
  `course_topic` varchar(255) NOT NULL,
  `course_discount` decimal(1,0) DEFAULT '1',
  `course_image` varchar(255) NOT NULL,
  `course_description` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course_subjects` text NOT NULL,
  PRIMARY KEY (`course_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES ('python for begginers',79.90,'python',1,'python.png','פייתון היא שפת תכנות ברמה גבוהה ומפֻרְשָׂת, הידועה בפשטותה, קריאות וגמישותה. נוצרה על ידי גווידו ואן רוסום ושוחררה לראשונה בשנת 1991\r\n\r\nפייתון תומכת במספר פרדיגמות תכנות, כולל תכנות פרוצדורלי, מונחה עצמים ופונקציונלי.\r\nיש לה ספרייה סטנדרטית גדולה המספקת מגוון רחב של מודולים ופונקציות עבור משימות שונות, מה שהופך את זה לנוח למפתחים לבנות אפליקציות ולפתור בעיות שונות.','a:8:{i:0;s:10:\"הקדמה\";i:1;s:12:\"משתנים\";i:2;s:14:\"מחרוזות\";i:3;s:10:\"תנאים\";i:4;s:12:\"לולאות\";i:5;s:16:\"פונקציות\";i:6;s:39:\"פונקציות למבדה וג\'וין\";i:7;s:12:\"ספריות\";}');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(256) DEFAULT NULL,
  `user_courses` text,
  `last_info_change` date NOT NULL DEFAULT '2020-01-01',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'Admin','AdminCSisrael@gmail.com','15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225','a:0:{}','2023-06-26'),(29,'yishai','yishaigame999@gmail.com','6d0cd3e04c1e98e36a91b7f3efeb15000716c9119c086d0d12ede17e1fbd24cb','a:0:{}','2023-11-20'),(31,'user1','yishaigame@gmail.com','1a5376ad727d65213a79f3108541cf95012969a0d3064f108b5dd6e7f8c19b89','a:0:{}','2020-01-01');
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

-- Dump completed on 2023-11-27 19:31:58
