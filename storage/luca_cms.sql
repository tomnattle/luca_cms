CREATE DATABASE  IF NOT EXISTS `luca_cms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `luca_cms`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 192.168.1.141    Database: luca_cms
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu1

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
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `g_id` int(11) NOT NULL DEFAULT '0',
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `index` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,1,0,1,'我是一个相册哦哦哦','',0,'2017-07-25 06:58:43','2017-07-25 06:58:43',NULL),(2,1,0,1,'啦啦啦','',1,'2017-07-25 06:59:03','2017-07-25 06:59:03',NULL),(3,1,0,1,'hi mod','images/8iwFb1V9W2GAM0eObFm4jFOdu2S5nRRWKlJiTSyk.jpeg',0,'2017-07-25 06:59:44','2017-07-25 06:59:44',NULL),(4,1,0,1,'aokawa','images/V6ykUGInok7zENVDDxNrxwFESwfiqrfg5Al38qRt.jpeg',0,'2017-07-25 07:10:39','2017-07-25 07:10:39',NULL),(5,1,0,1,'lopaca','images/JA0ffhY8XQQW0xQyKNh6Vn3tl7aIBSE5DJa1fqC7.jpeg',0,'2017-07-25 07:10:49','2017-07-25 07:10:49',NULL);
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_cats`
--

DROP TABLE IF EXISTS `article_cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_cats` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `g_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `index` int(11) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `extra` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_cats`
--

LOCK TABLES `article_cats` WRITE;
/*!40000 ALTER TABLE `article_cats` DISABLE KEYS */;
INSERT INTO `article_cats` VALUES (1,1,7,'分组',11,'images/MmRlduRup8JhzUEW0z8rIZBnuIyZnspbK2cBwILK.png',NULL,'2017-07-21 15:04:15','2017-07-24 08:35:04','2017-07-24 08:35:04'),(2,1,7,'分组',23,'',NULL,'2017-07-21 15:04:15','2017-07-24 08:34:39','2017-07-24 08:34:39'),(3,1,7,'测试',1,'images/ttL0eWwDlfavVVLnDCE3OmlbPQjCbxuY5xDbDZeB.png',NULL,'2017-07-24 08:55:36','2017-07-24 11:21:55','2017-07-24 11:21:55'),(4,1,7,'测试1234',2,'',NULL,'2017-07-24 08:56:53','2017-07-24 11:21:58','2017-07-24 11:21:58'),(5,1,7,'1234',3,'',NULL,'2017-07-24 09:00:45','2017-07-24 09:00:45',NULL),(6,1,8,'1233',3,'',NULL,'2017-07-24 11:15:03','2017-07-24 11:15:03',NULL),(7,1,14,'123',123,'',NULL,'2017-07-24 11:59:36','2017-07-24 11:59:36',NULL);
/*!40000 ALTER TABLE `article_cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `g_id` int(11) NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(1024) NOT NULL DEFAULT '',
  `click` int(11) NOT NULL DEFAULT '0',
  `flag` int(11) NOT NULL DEFAULT '0',
  `index` int(11) NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL DEFAULT '',
  `tags` varchar(256) NOT NULL DEFAULT '',
  `context` text,
  `extra` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (13,1,0,0,'夏斌：警惕房地产市场出现黑天鹅',0,0,0,'images/ErSjTDoxrkbBVTob4ZIDPtSPioYS5i9H11FDgvQe.jpeg','','<p>nice job！！！</p><p>yeal</p>',NULL,'2017-07-20 11:18:12','2017-07-24 11:20:14',NULL,0),(21,1,7,1,'hi',0,0,0,'','','<p>joy</p>',NULL,'2017-07-24 03:37:05','2017-07-24 03:42:35','2017-07-24 03:42:35',0),(22,1,0,0,'123',0,0,0,'images/k5se0C1HEkIrO2gqZxGF4RSpPT3r9mQFB2l382tR.png','','<p>456</p>',NULL,'2017-07-24 06:58:27','2017-07-24 11:13:26',NULL,0),(23,1,7,1,'123',0,0,0,'','','<p>2134</p>',NULL,'2017-07-24 07:06:11','2017-07-24 07:06:11',NULL,0),(24,1,7,4,'123',0,0,0,'','','',NULL,'2017-07-24 08:57:16','2017-07-24 08:57:16',NULL,0),(25,1,7,4,'123',0,0,0,'','','<p>456</p>',NULL,'2017-07-24 09:00:10','2017-07-24 09:00:10',NULL,0),(26,1,0,0,'123',0,0,0,'images/bZFMOR6ze2SYn71FGb56CM7vdb9kLfTr0k8gnFUF.jpeg','','<p>123<br/></p>',NULL,'2017-07-24 10:02:35','2017-07-24 11:19:41',NULL,0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(45) NOT NULL DEFAULT '',
  `tel` varchar(45) NOT NULL DEFAULT '',
  `addr` varchar(500) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,1,'cmsa','5','6','4','2017-07-20 15:30:38','2017-07-24 11:59:13',NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `key` varchar(255) NOT NULL DEFAULT '',
  `value` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,1,'images/k5se0C1HEkIrO2gqZxGF4RSpPT3r9mQFB2l382tR.png','9f1bd54be706cfe7f5bbfab68719a245','2017-07-24 11:13:26','2017-07-24 11:13:26',NULL),(2,1,'images/bZFMOR6ze2SYn71FGb56CM7vdb9kLfTr0k8gnFUF.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-24 11:19:41','2017-07-24 11:19:41',NULL),(3,1,'images/ErSjTDoxrkbBVTob4ZIDPtSPioYS5i9H11FDgvQe.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-24 11:20:14','2017-07-24 11:20:14',NULL),(4,1,'images/X9wUnvI68xax7X3YMz6j1ry2y2MaVNKyCPwFvBNR.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:50:36','2017-07-25 06:50:36',NULL),(5,1,'images/6Ia2Ue6DDh4pRI3KN3LtvGDiOkk8KXY1ee1jhHlr.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:51:08','2017-07-25 06:51:08',NULL),(6,1,'images/ydwvYfVeBSzuDEvw5JZLwvr80YN3Ulu09LuRJY3M.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:51:39','2017-07-25 06:51:39',NULL),(7,1,'images/8iwFb1V9W2GAM0eObFm4jFOdu2S5nRRWKlJiTSyk.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:59:44','2017-07-25 06:59:44',NULL),(8,1,'images/076z92dggS661PN1TEyt7KwaWPjZBUzVvaLa7ZBc.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:19','2017-07-25 07:05:19',NULL),(9,1,'images/whvZ2KGPoLGLvo19gF5WNKbzPzzloOGXJz1t6Rs7.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:19','2017-07-25 07:05:19',NULL),(10,1,'images/IjNReIa57AiJPOnxtovvHE6ytcxz5h3JyVEDpwzS.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:20','2017-07-25 07:05:20',NULL),(11,1,'images/gnYbxZuiY68EfENaP8mImTxf3RPBCAHmOkUSXrei.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:20','2017-07-25 07:05:20',NULL),(12,1,'images/dszWBw5VjcBghEC8ykapvxros9OjuzWjWITgAsKk.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:20','2017-07-25 07:05:20',NULL),(13,1,'images/V6ykUGInok7zENVDDxNrxwFESwfiqrfg5Al38qRt.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:10:39','2017-07-25 07:10:39',NULL),(14,1,'images/JA0ffhY8XQQW0xQyKNh6Vn3tl7aIBSE5DJa1fqC7.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:10:49','2017-07-25 07:10:49',NULL);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `index` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `model_type` int(11) NOT NULL DEFAULT '1' COMMENT '1 article 2album',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (7,1,0,'智库概况',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(8,1,0,'历任领导',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(9,1,0,'智库动态',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(10,1,0,'智库专家',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(11,1,0,'民生大讲堂',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(12,1,0,'民生研究',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(13,1,0,'智库交流',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(14,1,0,'民生语录',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `power_users`
--

DROP TABLE IF EXISTS `power_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `power_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `salt` char(6) NOT NULL DEFAULT '',
  `cookie` varchar(64) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_UNIQUE` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `power_users`
--

LOCK TABLES `power_users` WRITE;
/*!40000 ALTER TABLE `power_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `power_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cmsa','651775257@qq.com','$2y$10$ds6KZ/J.UFjpm4yFa.UNS.dWg5J8mJ/Frgu1IyL1SsEt1qqmFuJqe','JherdAumCCD2P1HaXeKDQVDax7W27A5ldcOF4GvL3BJGggXNiP72BxVlIBqz','2017-07-19 01:30:55','2017-07-19 01:30:55');
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

-- Dump completed on 2017-07-25 20:15:50
