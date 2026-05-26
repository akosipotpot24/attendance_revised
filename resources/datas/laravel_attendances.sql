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
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_number` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `library_location` varchar(255) NOT NULL,
  `attendance_date` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` VALUES (1,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-03-27 02:00:49','makabayan','present','2026-03-26 18:00:49','2026-03-26 18:00:49'),(2,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-03-27 02:01:19','makabayan','present','2026-03-26 18:01:19','2026-03-26 18:01:19'),(3,'89989-2026','NIÑO LUCKY LARGA','cllrc','2026-03-27 02:01:29','makabansa','present','2026-03-26 18:01:29','2026-03-26 18:01:29'),(4,'89989-2026','NIÑO LUCKY LARGA','cllrc','2026-04-18 03:21:09','makabansa','in','2026-04-17 19:21:09','2026-04-17 19:21:09'),(5,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-04-22 01:34:24','makabayan','in','2026-04-21 17:34:24','2026-04-21 17:34:24'),(6,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-07 06:36:45','7 - Ark of the Covenant','in','2026-05-06 22:36:45','2026-05-06 22:36:45'),(7,'89989-2026','NIÑO LUCKY LARGA','cllrc','2026-05-07 06:37:41','makabansa','in','2026-05-06 22:37:41','2026-05-06 22:37:41'),(8,'89989-2026','NIÑO LUCKY LARGA','cllrc','2026-05-07 06:37:45','makabansa','out','2026-05-06 22:37:45','2026-05-06 22:37:45'),(9,'908924572890345','Kiane Nicolas  Francisco','gslrc','2026-05-07 07:55:30','7 - Ark of the Covenant','in','2026-05-06 23:55:30','2026-05-06 23:55:30'),(10,'908924572890345','Kiane Nicolas  Francisco','gslrc','2026-05-07 07:55:36','7 - Ark of the Covenant','out','2026-05-06 23:55:36','2026-05-06 23:55:36'),(11,'696969','Enrico Ulep Catolico','cllrc','2026-05-07 07:56:12','makakalikasan','in','2026-05-06 23:56:12','2026-05-06 23:56:12'),(12,'89989-2026','NIÑO LUCKY LARGA','cllrc','2026-05-07 07:56:23','makabansa','in','2026-05-06 23:56:23','2026-05-06 23:56:23'),(13,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-22 03:22:12','college-of-engineering','in','2026-05-21 19:22:12','2026-05-21 19:22:12'),(14,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-22 03:22:18','college-of-engineering','out','2026-05-21 19:22:18','2026-05-21 19:22:18'),(15,'908924572890345','Kiane Nicolas  Francisco','gslrc','2026-05-22 03:22:49','admissions','in','2026-05-21 19:22:49','2026-05-21 19:22:49'),(16,'908924572890345','Kiane Nicolas  Francisco','gslrc','2026-05-22 03:22:53','admissions','out','2026-05-21 19:22:53','2026-05-21 19:22:53'),(17,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-22 09:00:49','college-of-engineering','in','2026-05-22 01:00:49','2026-05-22 01:00:49'),(18,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-22 09:00:53','college-of-engineering','out','2026-05-22 01:00:53','2026-05-22 01:00:53'),(19,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-22 09:01:07','college-of-engineering','in','2026-05-22 01:01:07','2026-05-22 01:01:07'),(20,'19-01123-A','hermogenes Santiago Tongco','hslrc','2026-05-22 09:01:12','college-of-engineering','out','2026-05-22 01:01:12','2026-05-22 01:01:12');
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
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
