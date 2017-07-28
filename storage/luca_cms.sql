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
-- Table structure for table `account_chats`
--

DROP TABLE IF EXISTS `account_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_chats` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `startus` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_chats`
--

LOCK TABLES `account_chats` WRITE;
/*!40000 ALTER TABLE `account_chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_friends`
--

DROP TABLE IF EXISTS `account_friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id1` int(11) NOT NULL,
  `account_id2` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acount_id1` (`account_id1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_friends`
--

LOCK TABLES `account_friends` WRITE;
/*!40000 ALTER TABLE `account_friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_groups`
--

DROP TABLE IF EXISTS `account_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_groups` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_groups`
--

LOCK TABLES `account_groups` WRITE;
/*!40000 ALTER TABLE `account_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_groups_relations`
--

DROP TABLE IF EXISTS `account_groups_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_groups_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_groups_relations`
--

LOCK TABLES `account_groups_relations` WRITE;
/*!40000 ALTER TABLE `account_groups_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_groups_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_messages`
--

DROP TABLE IF EXISTS `account_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_messages` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1是好友请求',
  `status` int(11) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL DEFAULT '',
  `creator_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_messages`
--

LOCK TABLES `account_messages` WRITE;
/*!40000 ALTER TABLE `account_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_profiles`
--

DROP TABLE IF EXISTS `account_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `age` int(11) NOT NULL DEFAULT '0',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL DEFAULT '',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_profiles`
--

LOCK TABLES `account_profiles` WRITE;
/*!40000 ALTER TABLE `account_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_status`
--

DROP TABLE IF EXISTS `account_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_status` (
  `account_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_status`
--

LOCK TABLES `account_status` WRITE;
/*!40000 ALTER TABLE `account_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts_actions`
--

DROP TABLE IF EXISTS `accounts_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accounts_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `context` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_accounts_ud` (`accounts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts_actions`
--

LOCK TABLES `accounts_actions` WRITE;
/*!40000 ALTER TABLE `accounts_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accouts`
--

DROP TABLE IF EXISTS `accouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `salt` varchar(6) NOT NULL DEFAULT '',
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accouts`
--

LOCK TABLES `accouts` WRITE;
/*!40000 ALTER TABLE `accouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accouts` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (24,1,15,1,'千岛湖旅游','images/bSDi82pYsbRFRs37UkWUGjahSRJ67fTUzMSiNuxp.jpeg',1,'2017-07-26 11:00:53','2017-07-27 11:58:40',NULL),(28,1,15,1,'莫干山','images/pQPKjvJMmEH84hrw6rpDazy86va1qZEHa9xAIcYW.jpeg',0,'2017-07-27 09:56:58','2017-07-27 09:58:41',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_cats`
--

LOCK TABLES `article_cats` WRITE;
/*!40000 ALTER TABLE `article_cats` DISABLE KEYS */;
INSERT INTO `article_cats` VALUES (1,1,7,'分组',11,'images/MmRlduRup8JhzUEW0z8rIZBnuIyZnspbK2cBwILK.png',NULL,'2017-07-21 15:04:15','2017-07-24 08:35:04','2017-07-24 08:35:04'),(2,1,7,'分组',23,'',NULL,'2017-07-21 15:04:15','2017-07-24 08:34:39','2017-07-24 08:34:39'),(3,1,7,'测试',1,'images/ttL0eWwDlfavVVLnDCE3OmlbPQjCbxuY5xDbDZeB.png',NULL,'2017-07-24 08:55:36','2017-07-24 11:21:55','2017-07-24 11:21:55'),(4,1,7,'测试1234',2,'',NULL,'2017-07-24 08:56:53','2017-07-24 11:21:58','2017-07-24 11:21:58'),(5,1,7,'1234',3,'',NULL,'2017-07-24 09:00:45','2017-07-27 03:07:50','2017-07-27 03:07:50'),(6,1,8,'1233',3,'',NULL,'2017-07-24 11:15:03','2017-07-27 06:19:20','2017-07-27 06:19:20'),(7,1,14,'123',123,'',NULL,'2017-07-24 11:59:36','2017-07-24 11:59:36',NULL),(8,1,7,'1234',0,'',NULL,'2017-07-27 06:15:36','2017-07-27 06:15:46','2017-07-27 06:15:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (13,1,0,0,'夏斌：警惕房地产市场出现黑天鹅',0,0,0,'images/ErSjTDoxrkbBVTob4ZIDPtSPioYS5i9H11FDgvQe.jpeg','','<p>nice job！！！</p><p>yeal</p>',NULL,'2017-07-20 11:18:12','2017-07-27 03:07:35','2017-07-27 03:07:35',0),(21,1,7,1,'hi',0,0,0,'','','<p>joy</p>',NULL,'2017-07-24 03:37:05','2017-07-24 03:42:35','2017-07-24 03:42:35',0),(22,1,0,0,'123',0,0,0,'images/k5se0C1HEkIrO2gqZxGF4RSpPT3r9mQFB2l382tR.png','','<p>456</p>',NULL,'2017-07-24 06:58:27','2017-07-27 03:07:38','2017-07-27 03:07:38',0),(23,1,8,6,'123',0,0,0,'','','<p>2134</p>',NULL,'2017-07-24 07:06:11','2017-07-27 06:14:40','2017-07-27 06:14:40',0),(24,1,14,7,'通过 Lumen 安装器方式',0,0,0,'','','<p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 20px; padding-top: 0px; line-height: 1.5; color: rgb(82, 82, 82); font-family: &quot;Source Sans Pro&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">首先，利用 Composer 下载 Lumen 安装器。</p><pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, monospace; font-size: 13px; text-shadow: white 0px 1px; direction: ltr; word-break: normal; line-height: 1.5; tab-size: 4; hyphens: none; padding: 1em; margin-top: 10px; margin-bottom: 20px; background-color: rgb(240, 242, 241); border-radius: 3px;\">composer&nbsp;global&nbsp;require&nbsp;&quot;laravel/lumen-installer=~1.0&quot;</pre><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 20px; padding-top: 0px; line-height: 1.5; color: rgb(82, 82, 82); font-family: &quot;Source Sans Pro&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">确保将&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, monospace; font-size: 13px; background: rgb(240, 242, 241); color: rgb(244, 100, 95); padding: 1px 5px; border-radius: 3px; text-shadow: white 0px 1px; direction: ltr; white-space: pre; word-spacing: normal; word-break: normal; line-height: 1.5; tab-size: 4; hyphens: none;\"><span class=\"token operator\" style=\"box-sizing: border-box; color: rgb(85, 85, 85);\">~</span><span class=\"token operator\" style=\"box-sizing: border-box; color: rgb(85, 85, 85);\">/</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: rgb(153, 153, 153);\">.</span>composer<span class=\"token operator\" style=\"box-sizing: border-box; color: rgb(85, 85, 85);\">/</span>vendor<span class=\"token operator\" style=\"box-sizing: border-box; color: rgb(85, 85, 85);\">/</span>bin</code>&nbsp;目录添加到 PATH 环境变量中，以便&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, monospace; font-size: 13px; background: rgb(240, 242, 241); color: rgb(244, 100, 95); padding: 1px 5px; border-radius: 3px; text-shadow: white 0px 1px; direction: ltr; white-space: pre; word-spacing: normal; word-break: normal; line-height: 1.5; tab-size: 4; hyphens: none;\">lumen</code>&nbsp;可执行程序能够被操作系统正确加载。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 20px; padding-top: 0px; line-height: 1.5; color: rgb(82, 82, 82); font-family: &quot;Source Sans Pro&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">安装之后，通过&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, monospace; font-size: 13px; background: rgb(240, 242, 241); color: rgb(244, 100, 95); padding: 1px 5px; border-radius: 3px; text-shadow: white 0px 1px; direction: ltr; white-space: pre; word-spacing: normal; word-break: normal; line-height: 1.5; tab-size: 4; hyphens: none;\">lumen <span class=\"token keyword\" style=\"box-sizing: border-box; color: rgb(0, 119, 170);\">new</span></code>&nbsp;命令就能在你指定的目录中创建一个干净的 Lumen 应用程序骨架了。例如，&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, monospace; font-size: 13px; background: rgb(240, 242, 241); color: rgb(244, 100, 95); padding: 1px 5px; border-radius: 3px; text-shadow: white 0px 1px; direction: ltr; white-space: pre; word-spacing: normal; word-break: normal; line-height: 1.5; tab-size: 4; hyphens: none;\">lumen <span class=\"token keyword\" style=\"box-sizing: border-box; color: rgb(0, 119, 170);\">new</span> <span class=\"token class-name\" style=\"box-sizing: border-box;\">service</span></code>&nbsp;将创建一个命名为&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: Consolas, Monaco, &quot;Andale Mono&quot;, monospace; font-size: 13px; background: rgb(240, 242, 241); color: rgb(244, 100, 95); padding: 1px 5px; border-radius: 3px; text-shadow: white 0px 1px; direction: ltr; white-space: pre; word-spacing: normal; word-break: normal; line-height: 1.5; tab-size: 4; hyphens: none;\">service</code>&nbsp;的目录，此目录中包含了全新安装的 Lumen 应用程序骨架以及相关的依赖包。这种安装方式比通过 Composer 安装更快速：</p><p><br/></p>',NULL,'2017-07-24 08:57:16','2017-07-27 09:59:32',NULL,0),(25,1,7,4,'123',0,0,0,'','','<p>456</p>',NULL,'2017-07-24 09:00:10','2017-07-27 06:19:11','2017-07-27 06:19:11',0),(26,1,0,0,'123',0,0,0,'images/bZFMOR6ze2SYn71FGb56CM7vdb9kLfTr0k8gnFUF.jpeg','','<p>123<br/></p>',NULL,'2017-07-24 10:02:35','2017-07-27 06:15:06','2017-07-27 06:15:06',0),(27,1,15,0,'emod',0,0,0,'','','',NULL,'2017-07-26 10:59:09','2017-07-27 06:15:03','2017-07-27 06:15:03',0),(28,1,15,0,'123',0,0,0,'','','',NULL,'2017-07-26 11:00:12','2017-07-27 03:07:41','2017-07-27 03:07:41',0),(29,1,14,7,'Boost Sales',0,0,0,'','','<p>Watch your sales skyrocket with robust merchandising and promotions. With Magento you can easily integrate product bundling, ‘gift with purchase’, how-to videos, virtual try-on tools, customer reviews, and social media channels into your product pages.</p>',NULL,'2017-07-27 11:57:32','2017-07-28 02:52:10',NULL,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,1,'images/k5se0C1HEkIrO2gqZxGF4RSpPT3r9mQFB2l382tR.png','9f1bd54be706cfe7f5bbfab68719a245','2017-07-24 11:13:26','2017-07-24 11:13:26',NULL),(2,1,'images/bZFMOR6ze2SYn71FGb56CM7vdb9kLfTr0k8gnFUF.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-24 11:19:41','2017-07-24 11:19:41',NULL),(3,1,'images/ErSjTDoxrkbBVTob4ZIDPtSPioYS5i9H11FDgvQe.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-24 11:20:14','2017-07-24 11:20:14',NULL),(4,1,'images/X9wUnvI68xax7X3YMz6j1ry2y2MaVNKyCPwFvBNR.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:50:36','2017-07-25 06:50:36',NULL),(5,1,'images/6Ia2Ue6DDh4pRI3KN3LtvGDiOkk8KXY1ee1jhHlr.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:51:08','2017-07-25 06:51:08',NULL),(6,1,'images/ydwvYfVeBSzuDEvw5JZLwvr80YN3Ulu09LuRJY3M.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:51:39','2017-07-25 06:51:39',NULL),(7,1,'images/8iwFb1V9W2GAM0eObFm4jFOdu2S5nRRWKlJiTSyk.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 06:59:44','2017-07-25 06:59:44',NULL),(8,1,'images/076z92dggS661PN1TEyt7KwaWPjZBUzVvaLa7ZBc.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:19','2017-07-25 07:05:19',NULL),(9,1,'images/whvZ2KGPoLGLvo19gF5WNKbzPzzloOGXJz1t6Rs7.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:19','2017-07-25 07:05:19',NULL),(10,1,'images/IjNReIa57AiJPOnxtovvHE6ytcxz5h3JyVEDpwzS.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:20','2017-07-25 07:05:20',NULL),(11,1,'images/gnYbxZuiY68EfENaP8mImTxf3RPBCAHmOkUSXrei.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:20','2017-07-25 07:05:20',NULL),(12,1,'images/dszWBw5VjcBghEC8ykapvxros9OjuzWjWITgAsKk.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:05:20','2017-07-25 07:05:20',NULL),(13,1,'images/V6ykUGInok7zENVDDxNrxwFESwfiqrfg5Al38qRt.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:10:39','2017-07-25 07:10:39',NULL),(14,1,'images/JA0ffhY8XQQW0xQyKNh6Vn3tl7aIBSE5DJa1fqC7.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-25 07:10:49','2017-07-25 07:10:49',NULL),(15,1,'images/qrtVDTyEGsJ3JOrcaQfEppuaFDtT5yjvJEwQ9bJy.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 02:11:06','2017-07-26 02:11:06',NULL),(16,1,'images/53ld4iTOzHuAMTsVYIvVGa9RXEHZHalFIu81Fwfb.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:09:25','2017-07-26 08:09:25',NULL),(17,1,'images/UKWrTL7MTcnbgg0eGX8bI4iu25CWQkiHWFAfrlv1.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:09:46','2017-07-26 08:09:46',NULL),(18,1,'images/UOcubY0OWsovh3dpXdkIgNoUdVyNy7tAUuIe9V8m.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:09:52','2017-07-26 08:09:52',NULL),(19,1,'images/ZvmJCooZ71N3TndpSAJ3K2wFHRCRjlA1j2z9gO1I.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:09:57','2017-07-26 08:09:57',NULL),(20,1,'images/CJe3atCS0lsTTfXJvUcszqiX6SikH4kax6KtdvR7.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:10:03','2017-07-26 08:10:03',NULL),(21,1,'images/0gE15Xl3HhfrHEyyHulsfqEKCwKZzDBYuGcdN1ST.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-26 08:10:08','2017-07-26 08:10:08',NULL),(22,1,'images/5dXDgFfEWJjNAnQPxerpYUFi1ap9YizB01iARO7E.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:10:13','2017-07-26 08:10:13',NULL),(23,1,'images/BpkUGHQKjx1j4SNY3RxTLJvrANSoo2tZqhbc73ue.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:10:24','2017-07-26 08:10:24',NULL),(24,1,'images/CAxruF5R0zaPiFlT10Xv5ApbnmQO3YJjFgcKk9pq.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 08:10:29','2017-07-26 08:10:29',NULL),(25,1,'images/R4GcFNvLF1mNX8e2aj7U5ZEZ8AaR38PUngxduyGP.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-26 08:15:17','2017-07-26 08:15:17',NULL),(26,1,'images/he2AQ61Bj96OktMoYNMkfzoABmDUiDSzYuVLttDi.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-26 08:58:38','2017-07-26 08:58:38',NULL),(27,1,'images/rtymGYuREZwUoLPXehJ5dj4lr4Xn9afuWoWoEj0P.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:04:00','2017-07-26 11:04:00',NULL),(28,1,'images/CbWDWNx61LwtGvyiPCjGw0S4oN1uNc3oQr1mbj6G.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:04:35','2017-07-26 11:04:35',NULL),(29,1,'images/e3ytUKWXHtUuNuUB6J61Pqp8OiS5ZHUKqsx71TLb.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:04:49','2017-07-26 11:04:49',NULL),(30,1,'images/DIcVCxY7n5IgSg7XRWPM4DmS9cgS6p7STnId38Vq.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:09:28','2017-07-26 11:09:28',NULL),(31,1,'images/lRBJ3dDAomwOlhYcCdKePv0PVIRVg8bCAI0lObwT.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:11:52','2017-07-26 11:11:52',NULL),(32,1,'images/PdYQuS28TBV6ckUPtlR9toktkzKmtKUWq46S6pMN.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:12:21','2017-07-26 11:12:21',NULL),(33,1,'images/OsDRDCL7DtkQtwvQ1QHfZup9pm7GdFYJF3Oq3Tou.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:16:44','2017-07-26 11:16:44',NULL),(34,1,'images/ATIiSqVOkZCiGiKNsRf5V6YHleMWCgdOVHGlSlul.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:23:30','2017-07-26 11:23:30',NULL),(35,1,'images/aeldKgSNYc7oIfR9k8WHbSqMI4zefGTqilhF7oFR.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:23:43','2017-07-26 11:23:43',NULL),(36,1,'images/sclPaGdR3KkvlQkyukCjo21y7uIpVHYE7BjQBaT5.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:23:52','2017-07-26 11:23:52',NULL),(37,1,'images/lL6Xt7LhNiCUIjTKXhyHXIo9a7pasDmfURBrFWWz.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-26 11:31:00','2017-07-26 11:31:00',NULL),(38,1,'images/mVdaryLGPaP53bNVbr3HUgeIMvm0F8W5INwTQ3yn.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:31:15','2017-07-26 11:31:15',NULL),(39,1,'images/QTMFvVgJ0w7Jj5wlXSlKxJDCRcDDZRAEtgljVqnb.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:31:25','2017-07-26 11:31:25',NULL),(40,1,'images/YuOSRjO3MCRY1pxmxN7UmGhWsbjdkMIAuYK9AKQT.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:39:53','2017-07-26 11:39:53',NULL),(41,1,'images/WtLEj6fyYBT4WBvNgZdnArBEq3d2mQ2opDhEkL12.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:41:42','2017-07-26 11:41:42',NULL),(42,1,'images/yAD0IWSSIdxqqE331pNVakCqIvPqOvtD8gPDCE3S.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 11:44:51','2017-07-26 11:44:51',NULL),(43,1,'images/JZEGW8qym4H9xL4bGrHNrEoCIDl0j4CLv3mbxGKK.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-26 12:03:26','2017-07-26 12:03:26',NULL),(44,1,'images/z8vWsNOmZZo44EVQufhIhsKORajQOGnAtHM4r4Bj.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 03:09:10','2017-07-27 03:09:10',NULL),(45,1,'images/tR63jpUNwKUrWouUA3N8I257d4H4e8bMGYOJS6O4.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 03:27:09','2017-07-27 03:27:09',NULL),(46,1,'images/mt9mRxzDXtrWf2lRQWY0xV6s9hmgdKztHH5mbJc1.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-27 03:28:22','2017-07-27 03:28:22',NULL),(47,1,'images/FmCfaBUTPi5KIIVwSABW7CIWDsL8MmFj9vX8CjzB.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 03:28:35','2017-07-27 03:28:35',NULL),(48,1,'images/iTMGydUyGs0Py8SNgIoNzr8IZpqilkNpI681Xw3m.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 05:45:40','2017-07-27 05:45:40',NULL),(49,1,'images/NAvIXlbf5QvznJuDfWe95Nfh29RuhHC8TFrytnZV.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 06:29:33','2017-07-27 06:29:33',NULL),(50,1,'images/WnAAZkTwjkRhVOlGHygyYba59oGwatrR76eJVeIa.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-27 06:29:51','2017-07-27 06:29:51',NULL),(51,1,'images/KjmwTvsfC4kBSt6y7lzyM1B5oM2933vlS169MUTV.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 06:54:53','2017-07-27 06:54:53',NULL),(52,1,'images/2WZidYvYxJdEmRi1t8YuVjXXq3cc9XIvg8h3HSLe.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 09:56:58','2017-07-27 09:56:58',NULL),(53,1,'images/pQPKjvJMmEH84hrw6rpDazy86va1qZEHa9xAIcYW.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 09:57:17','2017-07-27 09:57:17',NULL),(54,1,'images/W4pnTHVrkD9UWU2JtmCU7eyQnKn8lz0ko08sFFEy.jpeg','0acf6f80ecd71d0f7de38a8932d87699','2017-07-27 09:57:42','2017-07-27 09:57:42',NULL),(55,1,'images/QXDUFQw4DTVrj5YVNl0NdhQW7dp4zeuVWbc2LTRG.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 11:57:54','2017-07-27 11:57:54',NULL),(56,1,'images/wUbGOSxTc6MqfDy3xN1j6bv1FIxGPAOxMoakHFeF.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 11:58:12','2017-07-27 11:58:12',NULL),(57,1,'images/bSDi82pYsbRFRs37UkWUGjahSRJ67fTUzMSiNuxp.jpeg','358a4c11e2f8af131075b11acf7b7904','2017-07-27 11:58:37','2017-07-27 11:58:37',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (7,1,0,'智库概况',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(8,1,0,'历任领导',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(9,1,0,'智库动态',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(10,1,0,'智库专家',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(11,1,0,'民生大讲堂',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(12,1,0,'民生研究',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(13,1,0,'智库交流',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(14,1,0,'民生语录',1,'2017-07-21 13:54:49','2017-07-21 13:54:49',NULL),(15,1,0,'首页图片',2,'2017-07-26 17:11:31','2017-07-26 17:11:31',NULL);
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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `a_id` int(11) NOT NULL DEFAULT '0',
  `g_id` int(11) NOT NULL DEFAULT '0',
  `cmp_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(512) NOT NULL DEFAULT '',
  `file` varchar(255) NOT NULL DEFAULT '',
  `index` int(11) NOT NULL,
  `is_show` tinyint(3) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (3,1,0,15,1,'','adws','images/DIcVCxY7n5IgSg7XRWPM4DmS9cgS6p7STnId38Vq.jpeg',0,1,'2017-07-26 11:09:28','2017-07-26 11:09:28',NULL),(4,1,0,15,1,'','123','images/lRBJ3dDAomwOlhYcCdKePv0PVIRVg8bCAI0lObwT.jpeg',0,1,'2017-07-26 11:11:52','2017-07-26 11:11:52',NULL),(5,1,0,15,1,'','','images/PdYQuS28TBV6ckUPtlR9toktkzKmtKUWq46S6pMN.jpeg',0,1,'2017-07-26 11:12:21','2017-07-26 11:12:21',NULL),(6,1,0,15,1,'','1234','',0,1,'2017-07-26 11:14:04','2017-07-26 11:14:04',NULL),(7,1,0,15,1,'','1234','',0,1,'2017-07-26 11:14:54','2017-07-26 11:14:54',NULL),(8,1,23,15,1,'','123','images/OsDRDCL7DtkQtwvQ1QHfZup9pm7GdFYJF3Oq3Tou.jpeg',0,1,'2017-07-26 11:16:44','2017-07-26 11:16:44',NULL),(9,1,1,0,1,'wdad','123','images/ATIiSqVOkZCiGiKNsRf5V6YHleMWCgdOVHGlSlul.jpeg',0,1,'2017-07-26 11:23:30','2017-07-26 11:23:30',NULL),(10,1,1,0,1,'123','123','images/aeldKgSNYc7oIfR9k8WHbSqMI4zefGTqilhF7oFR.jpeg',0,1,'2017-07-26 11:23:43','2017-07-26 11:23:43',NULL),(11,1,7,0,1,'123','','images/sclPaGdR3KkvlQkyukCjo21y7uIpVHYE7BjQBaT5.jpeg',0,1,'2017-07-26 11:23:53','2017-07-26 11:23:53',NULL),(12,1,1,0,1,'123','123','images/lL6Xt7LhNiCUIjTKXhyHXIo9a7pasDmfURBrFWWz.jpeg',0,1,'2017-07-26 11:31:00','2017-07-26 11:31:00',NULL),(13,1,20,15,1,'123','123','images/mVdaryLGPaP53bNVbr3HUgeIMvm0F8W5INwTQ3yn.jpeg',0,1,'2017-07-26 11:31:15','2017-07-26 11:31:15',NULL),(14,1,1,0,1,'312','','images/QTMFvVgJ0w7Jj5wlXSlKxJDCRcDDZRAEtgljVqnb.jpeg',0,1,'2017-07-26 11:31:25','2017-07-26 11:31:25',NULL),(15,1,20,15,1,'123','13','images/YuOSRjO3MCRY1pxmxN7UmGhWsbjdkMIAuYK9AKQT.jpeg',0,1,'2017-07-26 11:39:53','2017-07-26 11:39:53',NULL),(16,1,2,0,1,'123','','images/WtLEj6fyYBT4WBvNgZdnArBEq3d2mQ2opDhEkL12.jpeg',0,1,'2017-07-26 11:41:42','2017-07-26 11:41:42',NULL),(18,1,20,15,1,'123','123','images/JZEGW8qym4H9xL4bGrHNrEoCIDl0j4CLv3mbxGKK.jpeg',0,1,'2017-07-26 12:03:26','2017-07-26 12:03:26',NULL),(19,1,1,0,1,'123','123','images/z8vWsNOmZZo44EVQufhIhsKORajQOGnAtHM4r4Bj.jpeg',0,1,'2017-07-27 03:09:10','2017-07-27 03:09:10',NULL),(20,1,24,15,1,'nice time','','images/WnAAZkTwjkRhVOlGHygyYba59oGwatrR76eJVeIa.jpeg',0,1,'2017-07-27 06:29:51','2017-07-27 06:29:51',NULL),(22,1,28,15,1,'123','nice','images/pQPKjvJMmEH84hrw6rpDazy86va1qZEHa9xAIcYW.jpeg',0,1,'2017-07-27 09:57:17','2017-07-27 09:57:17',NULL),(23,1,28,15,1,'good','','images/W4pnTHVrkD9UWU2JtmCU7eyQnKn8lz0ko08sFFEy.jpeg',0,1,'2017-07-27 09:57:42','2017-07-27 09:57:42',NULL),(24,1,28,15,1,'1233','','images/QXDUFQw4DTVrj5YVNl0NdhQW7dp4zeuVWbc2LTRG.jpeg',0,1,'2017-07-27 11:57:54','2017-07-27 11:57:54',NULL),(25,1,28,15,1,'12','','images/wUbGOSxTc6MqfDy3xN1j6bv1FIxGPAOxMoakHFeF.jpeg',0,1,'2017-07-27 11:58:12','2017-07-27 11:58:12',NULL),(26,1,24,15,1,'12','123','images/bSDi82pYsbRFRs37UkWUGjahSRJ67fTUzMSiNuxp.jpeg',0,1,'2017-07-27 11:58:38','2017-07-27 11:58:38',NULL);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'cmsa','651775257@qq.com','$2y$10$ds6KZ/J.UFjpm4yFa.UNS.dWg5J8mJ/Frgu1IyL1SsEt1qqmFuJqe','2pOcRiAKaUDO7TikE7mDXyMTMYhDAqTQhDInVP31hEQB2E7jwRsXBXA7jW6o','2017-07-19 01:30:55','2017-07-19 01:30:55');
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

-- Dump completed on 2017-07-28 15:24:14
