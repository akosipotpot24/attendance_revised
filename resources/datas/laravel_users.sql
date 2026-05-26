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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'port','Hermogenes S. Tongco IV','tongcohermogenes@gmail.com','$2y$12$D6A0uN5L2ePPoQRDiQv3kuy7r3p.EQEC2aI5P2HDl9hz7aA2Jnh3G','2','1','16a0fbf5ad8798.jpg',NULL,NULL,'2026-02-20 17:24:55','2026-05-24 17:00:45'),(2,'Enrico','Enrico Rafael Catolico','enricocatolico@gmail.com','$2y$12$R9SoUjJiNLS1wpR7GWNQRuULjZ4WZcpTzle351pD8xWP6ZJX.6Cyy','1','1',NULL,NULL,NULL,'2026-03-25 22:26:55','2026-05-25 19:38:31'),(3,'sample','sample','sample@gmail.com','$2y$12$2qdvS3BFVrkIReYulyF2OeRjyjQlXpTuOtQ.C7sjKLnIF/aDPpXRO','1','1',NULL,NULL,NULL,'2026-04-17 17:03:46','2026-05-25 19:38:32'),(4,'hellblazer','John Constantine','j.constantine@olopsc.edu.ph','$2y$12$qyiRPVxRG7.Ons10NcsJJevBrJY5R7MP5xd9f3BONu5APO9xhqcBi','1','1',NULL,NULL,NULL,'2026-04-19 16:55:42','2026-04-19 18:44:36'),(5,'HSLRC','HIGHSCHOOL SCANNER','hslrc@gmail.com','$2y$12$PfrTKo1osv99XIa.OyjZNep7oKvj.qu78X.ovG7z.xsuvjH09devy','4','1',NULL,NULL,NULL,'2026-04-21 17:48:30','2026-04-21 21:59:00'),(6,'GSLRC','gradeschool library','gslrc@gmail.com','$2y$12$TbFcU8WRtsa4VGFiXIi2p.0aznV6foacMDF7blaAvv58PJU7Du.pa','4','1',NULL,NULL,NULL,'2026-04-21 18:00:43','2026-04-21 18:09:24'),(7,'cholo','Picholo Lapuz','picholo@olopsc.com','$2y$12$9SY0vGX/p6cVP3ZoMSp48O195XtUVF470J9ZoiLZQ6oEYhUP1Pekm','1','1',NULL,NULL,NULL,'2026-05-06 22:46:16','2026-05-06 22:47:33'),(8,'admin','Admin account','admin.olopsc@gmail.com','$2y$12$2ob/VdnzqlVOXmbsXsYcV.Dys7xpAUaCHTAvgPmZJ9qNIRHYCXg3y','2','1',NULL,NULL,NULL,'2026-05-24 18:18:36','2026-05-24 18:18:53');
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

-- Dump completed on 2026-05-26 16:08:48
