-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `details` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
INSERT INTO `activity_logs` VALUES (1,1,'Updated student record','Student: 0002208721','2026-03-27 23:22:29','2026-03-27 23:22:29'),(2,1,'Updated student record','Student: 0002208721','2026-03-27 23:22:58','2026-03-27 23:22:58'),(3,1,'Updated student record','Student: 696969','2026-03-27 23:33:00','2026-03-27 23:33:00'),(4,1,'port Updated student record Enrico Ulep Catolico','Student: 696969','2026-03-27 23:34:51','2026-03-27 23:34:51'),(5,1,'port Updated student record hermogenes Santiago Tongco  asdasdasdasd','Student: 19-01123-A | Changes: ','2026-03-28 20:54:42','2026-03-28 20:54:42'),(6,1,'port Updated student record hermogenes Santiago Tongco','Student: 19-01123-A | Changes: lastname: Tongco  asdasdasdasd → Tongco, ','2026-03-28 20:57:43','2026-03-28 20:57:43'),(7,1,'port Updated student record hermogenes sdsd Santiagosdsd Tongco sdsd','Student: 19-01123-A | Changes: firstname: hermogenes → hermogenes sdsd, middlename: Santiago → Santiagosdsd, lastname: Tongco → Tongco sdsd, ','2026-03-28 20:58:02','2026-03-28 20:58:02'),(8,1,'port Updated student record hermogenes Santiago Tongco','Student: 19-01123-A | Changes: firstname: hermogenes sdsd → hermogenes, middlename: Santiagosdsd → Santiago, lastname: Tongco sdsd → Tongco, ','2026-03-28 20:58:23','2026-03-28 20:58:23'),(9,1,'port Updated student record Justin Pogi Garcia','Student: 0002208721 | Changes: section: makakalikasan → 1, ','2026-04-27 21:39:21','2026-04-27 21:39:21'),(10,1,'port Updated student record Justin Pogi Garcia','Student: 0002208721 | Changes: section: 1 → 8 - Captain of Salvation, ','2026-04-27 21:40:26','2026-04-27 21:40:26'),(11,1,'port Updated student record hermogenes Santiago Tongco','Student: 19-01123-A | Changes: section: makabayan → 9 - sample, ','2026-04-27 21:40:57','2026-04-27 21:40:57'),(12,1,'port Updated student record hermogenes Santiago Tongco','Student: 19-01123-A | Changes: section: 9 - sample → 7 - Ark of the Covenant, avatar: 19-01123-A69afcbcc1c3b9.jpg → 19-01123-A69f19a7366361.jpg, ','2026-04-28 21:43:17','2026-04-28 21:43:17'),(13,1,'port Updated student record Kiane Nicolas  Francisco','Student: 908924572890345 | Changes: section: 8 - Captain of Salvation → 7 - Ark of the Covenant, ','2026-05-05 21:34:46','2026-05-05 21:34:46'),(14,1,'port Updated student record Kiane Nicolas  Francisco','Student: 908924572890345 | Changes: avatar: 90892457289034569fad2f63bb7e.jpg → 90892457289034569fad30855e0c.jpg, ','2026-05-05 21:35:04','2026-05-05 21:35:04'),(15,1,'port Updated student record Kiane Nicolas  Francisco','Student: 908924572890345 | Changes: avatar: 90892457289034569fad30855e0c.jpg → 90892457289034569fad30d25d26.jpg, ','2026-05-05 21:35:09','2026-05-05 21:35:09'),(16,1,'port Updated student record Kiane Nicolas  Francisco','Student: 908924572890345 | Changes: avatar: 90892457289034569fad30d25d26.jpg → 90892457289034569fad32248485.jpg, ','2026-05-05 21:35:30','2026-05-05 21:35:30'),(17,1,'port Updated student record Kiane Nicolas  Francisco','Student: 908924572890345 | Changes: avatar: 90892457289034569fad32248485.jpg → 90892457289034569fad36517369.jpg, ','2026-05-05 21:36:37','2026-05-05 21:36:37'),(18,1,'port Updated student record hermogenes Santiago Tongco','Student: 19-01123-A | Changes: avatar: 19-01123-A69f19a7366361.jpg → 19-01123-A69fc3ed41516a.jpg, ','2026-05-06 23:27:17','2026-05-06 23:27:17'),(19,1,'port Updated student record NIÑO LUCKY LARGA','Student: 89989-2026 | Changes: section: makabansa → guidance, ','2026-05-18 16:05:42','2026-05-18 16:05:42'),(20,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: id_number: 19-01123-A → 19-01123-A222, ','2026-05-18 19:11:50','2026-05-18 19:11:50'),(21,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: id_number: 19-01123-A → 19-01123-A2222, ','2026-05-18 19:11:54','2026-05-18 19:11:54'),(22,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → faculty, section: 7 - Ark of the Covenant → jhs-dept, ','2026-05-18 19:41:41','2026-05-18 19:41:41'),(23,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: section: jhs-dept → 10 - Assumption of Mary, ','2026-05-18 19:41:58','2026-05-18 19:41:58'),(24,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → non-teaching, section: 10 - Assumption of Mary → driver, ','2026-05-18 19:42:35','2026-05-18 19:42:35'),(25,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → faculty, section: driver → college-of-nursing, ','2026-05-18 19:44:29','2026-05-18 19:44:29'),(26,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → faculty, section: college-of-nursing → shs-dept, ','2026-05-18 20:37:34','2026-05-18 20:37:34'),(27,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → faculty, section: shs-dept → college-of-engineering, ','2026-05-18 22:41:07','2026-05-18 22:41:07'),(28,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → faculty, ','2026-05-18 22:45:21','2026-05-18 22:45:21'),(29,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: section: college-of-engineering → 10 - Assumption of Mary, ','2026-05-18 22:45:30','2026-05-18 22:45:30'),(30,1,'port Updated student record hermogenes Santiago Tongco','Student:  | Changes: school_role: student → faculty, section: 10 - Assumption of Mary → college-of-engineering, ','2026-05-18 22:47:48','2026-05-18 22:47:48'),(31,1,'port Updated student record Kiane Nicolas  Francisco','Student:  | Changes: school_role: faculty → non-teaching, section: 7 - Ark of the Covenant → admissions, ','2026-05-18 22:48:47','2026-05-18 22:48:47'),(32,1,'port Updated student record   ','Student:  | Changes: ','2026-05-19 00:36:19','2026-05-19 00:36:19'),(33,1,'port Updated student record   ','Student:  | Changes: avatar: 16a0c210244cfd.jpg → 16a0c214c4c58b.jpg, ','2026-05-19 00:37:32','2026-05-19 00:37:32'),(34,1,'port Updated student record   ','Student:  | Changes: avatar: 16a0c214c4c58b.jpg → 16a0c21ebcc56d.jpg, ','2026-05-19 00:40:11','2026-05-19 00:40:11'),(35,1,'port Updated student record   ','Student:  | Changes: ','2026-05-19 00:40:40','2026-05-19 00:40:40'),(36,1,'port Updated student record   ','Student:  | Changes: avatar: 16a0c21ebcc56d.jpg → 16a0c2211508a8.jpg, ','2026-05-19 00:40:49','2026-05-19 00:40:49'),(37,1,'port Updated student record   ','Student:  | Changes: avatar: 16a0c2211508a8.jpg → 16a0c2220d8372.jpg, ','2026-05-19 00:41:04','2026-05-19 00:41:04'),(38,1,'port Updated student record   ','Student:  | Changes: avatar: 16a0c2220d8372.jpg → 16a0c22c5c814d.jpg, ','2026-05-19 00:43:49','2026-05-19 00:43:49'),(39,1,'port Updated student record   ','Student:  | Changes: avatar: 16a0c22c5c814d.jpg → 16a0d02ee55c77.jpg, ','2026-05-19 16:40:15','2026-05-19 16:40:15'),(40,1,'port Updated student record   ','Student:  | Changes: fullname: port → Hermogenes S. Tongco IV, ','2026-05-19 22:32:53','2026-05-19 22:32:53'),(41,1,'Hermogenes S. Tongco IV Updated student record   ','Student:  | Changes: avatar: 16a0d02ee55c77.jpg → 16a0fbf5ad8798.jpg, ','2026-05-21 18:28:44','2026-05-21 18:28:44'),(42,1,'port Updated their record Hermogenes S. Tongco IVVV','User:  | Changes: ','2026-05-24 16:47:55','2026-05-24 16:47:55'),(43,1,'port Updated their record Hermogenes S. Tongco IVVV','User: 1 | Changes: fullname: Hermogenes S. Tongco IVVV → Hermogenes S. Tongco IV, ','2026-05-24 17:00:45','2026-05-24 17:00:45');
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-26 16:08:48
