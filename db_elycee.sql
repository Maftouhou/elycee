-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db_elycee
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `choices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `choices_question_id_foreign` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choices`
--

LOCK TABLES `choices` WRITE;
/*!40000 ALTER TABLE `choices` DISABLE KEYS */;
INSERT INTO `choices` VALUES (24,24,'O:8:\"stdClass\":9:{s:7:\"_method\";s:5:\"PATCH\";s:6:\"_token\";s:40:\"i16xJxsQz5YAcTG1e00Ti2lO2VFf9DhtLNcWju3k\";s:7:\"user_id\";s:1:\"1\";s:10:\"choice_num\";s:1:\"2\";s:11:\"question_id\";s:2:\"24\";s:9:\"content_1\";s:15:\"Reponse Vrais c\";s:11:\"corection_1\";s:1:\"1\";s:9:\"content_2\";s:14:\"Reponse faux f\";s:11:\"corection_2\";s:1:\"0\";}',0,'2016-08-07 11:25:46','2016-08-07 11:26:07'),(25,25,'O:8:\"stdClass\":8:{s:6:\"_token\";s:40:\"i16xJxsQz5YAcTG1e00Ti2lO2VFf9DhtLNcWju3k\";s:7:\"user_id\";s:1:\"1\";s:10:\"choice_num\";s:1:\"2\";s:11:\"question_id\";s:2:\"25\";s:9:\"content_1\";s:14:\"Response Vrais\";s:11:\"corection_1\";s:1:\"1\";s:9:\"content_2\";s:12:\"Reponse faux\";s:11:\"corection_2\";s:1:\"0\";}',0,'2016-08-07 12:31:31','2016-08-07 12:31:31'),(26,26,'O:8:\"stdClass\":8:{s:6:\"_token\";s:40:\"i16xJxsQz5YAcTG1e00Ti2lO2VFf9DhtLNcWju3k\";s:7:\"user_id\";s:1:\"1\";s:10:\"choice_num\";s:1:\"2\";s:11:\"question_id\";s:2:\"26\";s:9:\"content_1\";s:14:\"Reponse Vrais \";s:11:\"corection_1\";s:1:\"1\";s:9:\"content_2\";s:12:\"Reponse faux\";s:11:\"corection_2\";s:1:\"0\";}',0,'2016-08-07 13:20:35','2016-08-07 13:20:35'),(27,27,'O:8:\"stdClass\":11:{s:7:\"_method\";s:5:\"PATCH\";s:6:\"_token\";s:40:\"AHz18WBAOTWVs1yNuxHAkK62pXW6914HdRv74ons\";s:7:\"user_id\";s:1:\"1\";s:10:\"choice_num\";s:1:\"3\";s:11:\"question_id\";s:2:\"27\";s:9:\"content_1\";s:33:\"dgdfghgjgfjjjjjjjjjjjjjjjjjjjjjjj\";s:11:\"corection_1\";s:1:\"0\";s:9:\"content_2\";s:7:\"dfgdsfg\";s:11:\"corection_2\";s:1:\"0\";s:9:\"content_3\";s:7:\"dsfgdfg\";s:11:\"corection_3\";s:1:\"1\";}',0,'2016-10-17 18:41:09','2016-10-17 18:42:02');
/*!40000 ALTER TABLE `choices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,12,'at','Nulla eum molestiae commodi distinctio nihil nesciunt quia. Aut eveniet ut quo. Quas sequi nesciunt delectus odio.',0,'2016-08-04 10:44:02','2016-08-04 10:44:02'),(2,2,'et','Consequatur earum assumenda earum id est quasi. Quae eum modi nobis animi enim.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(3,26,'occaecati','Officia aut eum voluptatem. Alias odio placeat aliquam doloribus et.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(4,24,'maxime','Culpa ratione laboriosam similique. Mollitia soluta voluptatum aut repudiandae aut. Rerum reiciendis quisquam cum sit non magni.',0,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(5,15,'inventore','Velit aut ab quae esse minima quasi molestias. Aliquam itaque et aut.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(6,3,'ducimus','Reprehenderit ratione et blanditiis autem. Nisi rerum modi quod quidem dolorem sunt tempora iusto. Qui est in facilis nemo et.',0,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(7,18,'modi','Earum eaque quo aliquam et. Omnis corporis dolorum quae assumenda vel at. Molestiae fuga id expedita aut.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(8,1,'sit','Expedita sed autem dolor commodi. Quibusdam culpa vel quas est nihil sint itaque. Est enim odit quo animi rerum sapiente delectus.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(9,27,'adipisci','Non voluptas sit enim ratione voluptatem et. Velit consectetur et voluptate nam veniam eaque. Ab culpa qui aliquam.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(10,4,'sit','Harum reprehenderit corrupti sit eos aliquid at sunt necessitatibus. Eligendi maxime sunt eos deleniti nulla culpa. Excepturi qui ducimus qui eum a debitis officia.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(11,4,'nam','Aliquam itaque id officiis excepturi cumque amet culpa nesciunt. Et odio totam et minus animi.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(12,3,'aut','Aut et rerum quidem. Qui quam incidunt pariatur sed sunt veniam. Voluptate iste neque commodi ipsam voluptatem sit.',0,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(13,29,'voluptatem','Reiciendis eius temporibus omnis officiis sed. Sit tempora debitis sapiente molestias consectetur quaerat.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(14,19,'modi','Expedita ut voluptatem provident. Accusamus est aliquid doloribus cum qui aspernatur.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(15,17,'ad','Et suscipit et eveniet omnis ut qui culpa. Et voluptatem atque et tempore. Ipsam enim odio optio ut vel accusantium deleniti dignissimos.',0,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(16,4,'illum','Vel quia accusamus et magnam aut eius. Dolores recusandae qui voluptas debitis tenetur blanditiis laudantium.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(17,15,'unde','Distinctio ut porro aliquid et. Rerum consectetur qui impedit ducimus optio id.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(18,17,'inventore','Omnis maiores expedita fuga deleniti laborum officia. Dolores sit ut corporis esse sapiente.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(19,13,'nemo','Et aliquam est magni unde corrupti nobis. Neque est repellat ratione voluptatibus sint. Suscipit facilis est est itaque eaque reiciendis quis temporibus.',0,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(20,28,'omnis','Cum ullam veritatis non consequatur. Reiciendis aut nam necessitatibus ad vel nulla quia. Nisi est accusantium dolores enim vero facere soluta animi.',1,'2016-08-04 10:44:03','2016-08-04 10:44:03'),(21,6,'Test commentaire','Mon conmmentaire',1,'2016-08-07 14:22:43','2016-08-07 14:22:43'),(22,33,'yudsfoiu','sdfhuoisudf',1,'2016-08-25 10:32:33','2016-08-25 10:32:33'),(23,33,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaa',1,'2016-08-25 10:32:45','2016-08-25 10:32:45'),(24,34,'rqezr','qzer',1,'2016-11-06 16:39:25','2016-11-06 16:39:25'),(25,34,'eeeeeeeeeeeeee','eeeeeeeeeeeeeeee',1,'2016-11-06 16:39:36','2016-11-06 16:39:36');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_07_17_202607_create_posts_table',1),('2016_07_17_202608_create_comments_table',1),('2016_07_17_202609_create_questions_table',1),('2016_07_17_202610_create_choices_table',1),('2016_07_17_202612_create_responses_table',1),('2016_07_17_202615_create_scores_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `url_thumbnail` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Dr.','Ipsam ut cumque qui eos rerum adipisci. Fuga dolores sit deleniti sint. Laborum laborum voluptate libero mollitia.','Optio repudiandae et consequuntur perspiciatis. Voluptas veritatis commodi architecto qui reiciendis voluptatum sit ipsa. Et facere nobis consequuntur molestias. Et modi pariatur non illo.','ssePzAIwOS_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(2,1,'Dr.','Sed quia harum est aliquam nostrum. Aut quidem rem quam ea molestiae aliquam.','Odio delectus adipisci architecto vel atque. Aut temporibus incidunt nemo. Modi iusto exercitationem et est minus et consequatur. Explicabo nesciunt voluptas nostrum ipsa eos dolores sunt. Sed qui sapiente dolor numquam reprehenderit. Et ea commodi aut hic pariatur. Autem accusamus culpa praesentium qui nemo.','GAstiUsb8x_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(3,1,'Dr.','Ea maxime laboriosam eum doloribus nulla harum. Sed quas ut in at at ad aut.','Quos architecto odio corrupti aut. Aut harum quia aut commodi quaerat corrupti dolore. Assumenda porro placeat porro explicabo. Excepturi autem id ut corrupti voluptatum dolores totam.','KVA7RQ3ios_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(4,1,'Dr.','Eum distinctio optio alias debitis ipsam eum et. At et earum alias dignissimos.','Earum in dolorum consectetur deleniti accusamus quia. Dolorum sed molestias quia reiciendis exercitationem soluta. Molestiae et sapiente dolor minus vel amet. Aliquid qui recusandae neque nostrum placeat ut necessitatibus.','KIoB6VzveL_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(5,1,'Mr.','Ipsum facere maiores dolor eaque laudantium reprehenderit. Sunt tempore eligendi id aut.','Delectus et provident eveniet. Nulla atque dolore natus aliquid amet voluptas. Error quidem quia necessitatibus molestias aut. Dolores ut unde consequatur sint. Maxime est facilis debitis aut sed.','9MeOTmTXpn_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(6,1,'Miss','Fuga excepturi magnam tempora laudantium labore unde dolore. Quis et distinctio commodi voluptatem eum et id voluptatem. Ut sunt et impedit et consectetur.','Vel accusantium quasi autem eveniet et molestiae culpa. Atque eum voluptatem reprehenderit minus est repellat. Vitae aperiam doloremque non ipsam maxime et. Enim vero ea et dolorum sed qui fuga. Numquam et dolore ad maiores officiis nemo et. Quod harum totam ut odit modi. Ex in aliquid voluptatibus eligendi.','ytDWhtTJKd_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(7,1,'Ms.','Dolor aliquam sunt illum. A nostrum accusantium qui consequatur hic.','Odio dolores aut ut at sed voluptatibus vero. Accusamus accusamus minus nihil temporibus. Id magni et suscipit necessitatibus. Necessitatibus alias provident molestiae. Qui reprehenderit quis vel molestias est.','oiTrlmBwCU_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(8,1,'Dr.','Rem vitae minus sequi ut quia ea dolor. Magnam voluptatem porro aut officia ut consequatur error.','Corrupti aut quae iusto laboriosam. Iste voluptatum dolorem rerum soluta sint. Rerum non placeat voluptatibus et id velit autem officiis. At fugiat voluptatum omnis recusandae consequatur.','DehdElK9S5_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(9,1,'Mr.','Nobis culpa omnis odio provident. Vitae incidunt voluptatem iure impedit.','Sed ut et totam doloremque. Debitis laudantium ducimus molestiae. Aliquam sit et quaerat vel. Cum voluptatum placeat aliquam repellat. Impedit assumenda libero voluptas et vitae.','g66mNOKDGc_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(10,1,'Dr.','Id et rerum quia aut. Dolore sit vel voluptates. Enim tenetur magnam magnam dolorem.','Ut reprehenderit porro accusantium. Iusto nisi quidem odio in ipsum esse. Alias aspernatur laborum quasi porro ex. Est eligendi eum eum. Dolor deserunt aut fugit quo ut rerum enim.','C0VWxXAinq_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(11,1,'Prof.','Facilis sint dolore doloribus aliquam quam velit. Temporibus natus sint aut rem tenetur rerum. Similique incidunt deleniti dignissimos perspiciatis quod.','Accusamus sed mollitia omnis aut suscipit modi nihil. Sunt in rem et non harum. Et repudiandae delectus itaque qui. Ut sunt tempora voluptatem blanditiis praesentium. Id esse blanditiis animi voluptas error. Officia vel iure dolor at nobis consequatur. Eveniet rerum id voluptas quia veritatis.','gSRDIBorfl_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(12,1,'Prof.','Qui minima et dolor. At eius laborum sit quia illo. Quidem facilis enim expedita dolores.','Recusandae deleniti sapiente repudiandae fugiat est tempora molestias. Mollitia officia deleniti quidem et quia voluptatum. Laudantium facilis alias voluptas id perferendis. Similique eius temporibus id corrupti repudiandae ipsam laborum. Aut tenetur quo ut maxime quasi modi pariatur. Corporis eligendi facere et neque dolores atque. Molestiae voluptatem omnis consequatur mollitia quos inventore.','mPZNDQ4sn8_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(13,1,'Prof.','Ipsa sint voluptatum qui fugit aperiam fuga error aliquid. Sit magnam dolore ea est.','Consectetur provident non maiores unde esse laborum aut. Mollitia ex corporis unde voluptatem. Temporibus a ad qui aut non. Omnis quidem iste expedita quam velit impedit. Alias cum esse repellat aspernatur error enim. Rem nulla sint sit repudiandae.','9jgQ1f6xL4_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(14,1,'Mr.','Vel alias est excepturi culpa nihil omnis. Excepturi qui alias aut modi accusamus magni. Dolor hic sit aspernatur repellendus rerum.','Unde iusto ullam hic optio. Explicabo adipisci quam id consectetur similique beatae. Ut cum est ut ut qui explicabo odio. Velit similique voluptatem deleniti soluta qui eius. Sit minima veniam molestias deleniti quia autem perspiciatis. Labore eum magnam quia ullam facere. Cumque beatae aut quo inventore.','A1cAvbXOkr_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(15,1,'Dr.','Nam sint voluptates maiores quis facilis. Esse et sed aut.','Consequatur doloribus atque explicabo voluptatem corporis dolore quia. Non eius a cupiditate laboriosam consequatur ab. Expedita eligendi praesentium sunt doloremque. Voluptas at laboriosam aut amet itaque. Minus occaecati maxime qui sed. Possimus ea natus impedit quos soluta. Eos minima tenetur aut officiis quo.','grhlegBwuj_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(16,1,'Miss','Explicabo cupiditate voluptatem nemo et ducimus cum ducimus. Fugit in et optio et.','Quos a aspernatur eaque similique non placeat. Debitis odit sint eos beatae. Quaerat qui aut provident ut esse facere. Quia ut itaque exercitationem similique ut quo ipsa vel. Rerum et est dicta alias.','9ZdMh5M0eh_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(17,1,'Dr.','Possimus non enim neque sapiente ea ut sit odit. Sed unde aut quas ut maiores qui.','Dolorem excepturi adipisci voluptatem amet autem placeat et. Sequi eos dolorem enim. Debitis tempora est totam. Iste eligendi rerum at nesciunt quia sit tempore. Fugiat nisi delectus dolor deserunt. Soluta tempore harum quos.','RD8WzPaihK_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(18,1,'Prof.','Quibusdam fuga numquam ducimus nesciunt ut repellendus. Tempora nihil quis quo aut.','Dicta odio temporibus quae reprehenderit. Necessitatibus odit veniam deserunt et. Quis dolorum architecto deleniti quos ut natus. Fugiat occaecati possimus voluptas ut dicta deleniti. Sunt aperiam nesciunt eum quidem alias magni velit.','VZQXwaaxNz_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(19,1,'Prof.','Quia reiciendis eveniet totam voluptatibus est enim. Officia beatae et saepe rerum. Odit nesciunt in dolorem ipsa veniam qui et.','A quia et ducimus qui. A eveniet quisquam quisquam. Eveniet qui totam quis officiis repudiandae vel. Omnis quo ea cupiditate eligendi nemo dicta eos. Debitis esse consequatur omnis culpa voluptatum esse.','m2PbRY0zCJ_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(20,1,'Dr.','Velit illo aliquam reprehenderit recusandae eaque. Autem officiis nihil voluptatem ut iste facilis.','Et voluptates occaecati est hic est. Velit voluptates cum rem. Explicabo incidunt aliquam assumenda et et itaque dolores. Facere est omnis similique blanditiis animi.','u6GLkE6NYj_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(21,1,'Dr.','Quisquam minus dignissimos id dolorem vel. Neque voluptatem qui suscipit tenetur sed dignissimos itaque tempore. Quia corrupti animi debitis in.','Sunt consequuntur ipsa voluptas magnam cumque doloremque sed accusamus. Et porro et inventore cum nulla aperiam. Ab accusantium minus unde quae minima. Impedit cumque illum ut ipsa repudiandae neque. Magni et recusandae non quam eius.','eZV8ddl5tz_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(22,1,'Mr.','Possimus voluptatum enim est iste eligendi repellendus. Est corporis soluta optio adipisci.','Necessitatibus vel qui adipisci harum id qui. Dolor voluptatem eos dolore. Ut et odit totam aut quis pariatur ab. Et sint occaecati quo ducimus odit aut rerum. Et vitae aut totam. Nam ad vitae natus et sit eveniet.','rLjTBNhJI5_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(23,1,'Prof.','Alias ullam quia est aspernatur. Natus et voluptas est sint ut.','Quas architecto qui occaecati impedit ratione reprehenderit. Consequuntur est et quaerat iure laudantium aliquam aliquid. At praesentium aspernatur et omnis sed sed. Commodi alias et impedit tempore necessitatibus consequatur ex voluptas. Sunt laudantium accusamus vero harum.','0iLtTY2isz_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(24,1,'Prof.','Nemo tempore sunt eos dolores accusamus. Ducimus quae impedit explicabo deserunt omnis. Vitae minus culpa laboriosam dicta.','Dolorem nulla tempore asperiores eaque ab dolores iste. Quis tempore nisi consequatur eos non voluptatibus. Quia officiis asperiores inventore fugit. Aut ut fuga necessitatibus architecto. Et maxime et aut sit quos dolor cupiditate et. Et tempore voluptatibus quibusdam vitae corrupti.','1uSZYS1kz0_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(25,1,'Prof.','Quia sint possimus id et ex fugit. Vel repellat delectus sequi sit ea.','Maxime voluptatem culpa eveniet laboriosam et nisi nihil architecto. Ipsum distinctio molestiae ad aut. Non omnis ullam quam rerum sed nostrum. Est magnam animi voluptatibus. Illo eaque a natus ab dignissimos inventore. Eum enim asperiores itaque laudantium. Quod et ut repellendus est.','xtQDfvzLJ1_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(26,1,'Miss','Eum vel voluptatibus temporibus voluptas. In ab labore incidunt sunt et praesentium.','Aut alias non qui et est nam. Eaque inventore numquam nihil suscipit fugiat. Qui aliquid minima fugit corrupti sint ipsa minus. Sapiente voluptatibus quidem harum occaecati officia voluptatum.','4P659LOcfL_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(27,1,'Prof.','Adipisci voluptas sint cum eligendi. Et eos dolorum impedit qui inventore.','Et cupiditate numquam odit sed. Inventore dolores omnis aut eum. Non qui blanditiis sit. Possimus animi praesentium voluptates enim dolores nesciunt cumque.','oPdzi3tJX9_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(28,1,'Mr.','Voluptatem harum exercitationem et. Praesentium enim porro autem asperiores molestiae adipisci corporis animi.','Deserunt cum cum labore placeat. Fugit et autem quia a voluptas impedit. Asperiores tempora consequatur porro sed ducimus sed at. Eum laboriosam quis et consequatur suscipit eius. Incidunt veritatis molestiae nobis et laudantium odio corrupti. Numquam laboriosam repellat reiciendis qui necessitatibus qui.','QUbJlAw09D_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(29,1,'Dr.','Assumenda temporibus ut eum. Deleniti dolor itaque deleniti.','Ullam molestiae quis quibusdam. Dolor aut illo autem dolores suscipit. Officia vero aut magnam nam. Quae reiciendis totam nemo dignissimos. Ullam non veniam quia inventore repudiandae ea harum.','LzvzXmWE3j_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',1),(30,1,'Dr.','Doloribus reprehenderit voluptas ut tenetur aperiam nulla veritatis. Assumenda maxime officiis ratione aut recusandae.','Aut doloribus repudiandae rerum sed nihil. Officiis quasi modi est. Qui consectetur numquam corporis voluptatem soluta perferendis. Harum quia aperiam dolor eos. Nihil animi aspernatur tenetur ducimus sit saepe quasi.','DCJTBgQXxw_370x235.jpg','2016-08-04 10:43:22','2016-08-04 10:43:22',0),(31,1,'sdfsdf','sdf','sdf','1470430603_1.jpg','2016-08-05 18:56:44','2016-08-06 09:55:38',1),(33,1,'dfgdsqfsdf','hfdsqf','hfdsqf','1470572826_1.jpg','2016-08-07 10:27:06','2016-08-07 10:27:06',1),(34,1,'treyetry','sdfqefrf','sdfqefrf','1470578256_1.jpg','2016-08-07 11:57:36','2016-08-07 11:57:36',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `class` enum('premiere','terminal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'terminal',
  `status` enum('publish','unpublish') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (24,1,'treyetryffqefre','uytrez\r\nesdf','premiere','publish','2016-08-07 11:25:33','2016-08-07 11:25:59'),(25,1,'treyetry','Test','premiere','publish','2016-08-07 12:29:46','2016-08-07 12:29:46'),(26,1,'dfgdsqfsdf','Tklmkjl','terminal','publish','2016-08-07 13:20:20','2016-08-07 13:20:20'),(27,1,'Des Développeur','lkhflkqjsdf','premiere','publish','2016-10-17 18:37:43','2016-10-17 18:41:34');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `choice_id` int(10) unsigned DEFAULT NULL,
  `choice_question_id` int(10) unsigned DEFAULT NULL,
  `reponse` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `responses_user_id_foreign` (`user_id`),
  KEY `responses_choice_id_foreign` (`choice_id`),
  KEY `responses_choice_question_id_foreign` (`choice_question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
INSERT INTO `responses` VALUES (1,2,1,1,0,'2016-08-04 16:33:57','2016-08-04 16:33:57'),(2,3,2,2,1,'2016-08-04 16:36:12','2016-08-04 16:36:12'),(3,3,2,2,1,'2016-08-04 16:43:29','2016-08-04 16:43:29'),(4,2,3,3,0,'2016-08-04 20:46:50','2016-08-04 20:46:50'),(5,3,4,4,1,'2016-08-05 08:27:21','2016-08-05 08:27:21'),(6,2,6,6,1,'2016-08-05 08:52:40','2016-08-05 08:52:40'),(7,3,2,2,1,'2016-08-05 10:34:13','2016-08-05 10:34:13'),(8,3,4,4,0,'2016-08-05 10:35:15','2016-08-05 10:35:15'),(9,2,7,7,1,'2016-08-05 10:54:45','2016-08-05 10:54:45'),(10,2,3,3,1,'2016-08-05 11:01:49','2016-08-05 11:01:49'),(11,2,1,1,1,'2016-08-05 11:03:52','2016-08-05 11:03:52'),(12,2,6,6,0,'2016-08-05 11:49:58','2016-08-05 11:49:58'),(13,2,5,5,0,'2016-08-05 11:50:09','2016-08-05 11:50:09'),(14,2,8,8,0,'2016-08-05 11:55:59','2016-08-05 11:55:59'),(15,2,9,9,0,'2016-08-05 12:23:24','2016-08-05 12:23:24'),(16,3,10,10,0,'2016-08-05 15:12:45','2016-08-05 15:12:45'),(17,3,12,12,1,'2016-08-05 15:30:03','2016-08-05 15:30:03'),(18,3,11,11,0,'2016-08-05 15:30:13','2016-08-05 15:30:13'),(19,2,14,14,1,'2016-08-05 15:34:25','2016-08-05 15:34:25'),(20,2,13,13,0,'2016-08-05 15:34:40','2016-08-05 15:34:40'),(21,2,15,15,0,'2016-08-05 15:43:58','2016-08-05 15:43:58'),(22,3,16,16,1,'2016-08-05 15:56:09','2016-08-05 15:56:09'),(23,4,3,3,1,'2016-08-05 16:06:09','2016-08-05 16:06:09'),(24,4,6,6,0,'2016-08-05 16:06:18','2016-08-05 16:06:18'),(25,4,7,7,1,'2016-08-05 16:06:27','2016-08-05 16:06:27'),(26,4,8,8,0,'2016-08-05 16:06:34','2016-08-05 16:06:34'),(27,4,1,1,0,'2016-08-05 16:29:41','2016-08-05 16:29:41'),(28,4,19,19,0,'2016-08-05 18:48:36','2016-08-05 18:48:36'),(29,4,17,17,1,'2016-08-05 18:48:48','2016-08-05 18:48:48'),(30,5,19,19,1,'2016-08-05 18:49:25','2016-08-05 18:49:25'),(31,5,17,17,0,'2016-08-05 18:49:32','2016-08-05 18:49:32'),(32,2,17,17,1,'2016-08-05 19:26:11','2016-08-05 19:26:11'),(33,2,19,19,1,'2016-08-05 19:26:20','2016-08-05 19:26:20'),(34,2,21,21,0,'2016-08-05 19:26:31','2016-08-05 19:26:31'),(35,4,25,25,0,'2016-08-07 12:57:02','2016-08-07 12:57:02'),(36,2,24,24,0,'2016-08-07 13:19:08','2016-08-07 13:19:08'),(37,2,25,25,1,'2016-08-07 13:19:21','2016-08-07 13:19:21'),(38,3,26,26,1,'2016-08-07 13:21:51','2016-08-07 13:21:51'),(39,5,24,24,1,'2016-08-07 13:24:13','2016-08-07 13:24:13');
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `question_id` int(10) unsigned DEFAULT NULL,
  `status_question` enum('done','undone') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'undone',
  `note` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (37,4,24,'done',NULL,'2016-08-07 12:56:19','2016-08-07 12:56:19'),(38,4,25,'done',0,'2016-08-07 12:56:59','2016-08-07 12:57:02'),(39,2,24,'done',0,'2016-08-07 13:15:21','2016-08-07 13:19:08'),(40,2,25,'done',2,'2016-08-07 13:19:11','2016-08-07 13:19:21'),(41,3,26,'done',2,'2016-08-07 13:20:58','2016-08-07 13:21:51'),(42,5,24,'done',2,'2016-08-07 13:23:37','2016-08-07 13:24:13'),(43,14,26,'done',NULL,'2016-10-23 17:18:00','2016-10-23 17:18:00');
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('teacher','premiere','terminal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'teacher',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Alexandre','$2y$10$2SgQXviaSoxVuEz8n8HSEODPS7U/wz3iH9a9U6xie9LNedO5Na67.','teacher','B10DaWMOVkOyVz5dJJG6JMbzySCYnpd1aN0XOjwG7OitjRNRxGwbuv1WvDMR','2016-08-04 10:40:04','2016-10-23 17:17:37'),(2,'Abel','$2y$10$JY.wcPgFhkyXv8BTHlW9geMZaoI8ASiGQfA.MtrdLkktgNking7YS','premiere','WbSYaoPIYOVScqx3j1rtyQWMMcEmOdntapw5nQIstXRHOTeparj5eXHidLUN','2016-08-04 10:41:35','2016-08-07 13:19:49'),(3,'Alfred','$2y$10$hxkorUY2L2/MrKPTGunJ6uJDowkWk1Cs5rKn2IUu5osU.PPygs6d2','terminal','79e18ydhp7CidFdEKTuR09GHiIXO8PdpkfYVkqkx9BImBCCnQ4pJGiyNIag1','2016-08-04 10:42:40','2016-08-07 13:23:17'),(4,'Al','$2y$10$3obkm8vle5vjwHs1Zp5Z/.2efZkNNbGZ7L4zkhNwrbOiuFXJ1ZqE2','premiere','Wx1fHSpEl8TtJoiLUZUIR4m867TxDN0pEZFygCaiUSVqBPgVII9WnWQgqv3K','2016-08-05 16:00:27','2016-08-07 13:15:06'),(5,'Alan','$2y$10$miaoKmyDaH0b2pHID0UDAeb06f71/EqrN9a34uVlZhqEZEGKVJ1TW','premiere','ivPXOMe2dftzMjJU8YWzjcpyanLWGnaPDmCcFI9ugD4TimxjNBevy9KDQd6z','2016-08-05 16:00:38','2016-08-07 13:24:31'),(6,'Arthur','$2y$10$uBafODdE62TMdDOHwyxNd.YHAHjGJXORYlrgXjlP51TSM6kE3y5.S','premiere','hSPNPJecFY','2016-08-05 16:00:50','2016-08-05 16:00:50'),(7,'Carl','$2y$10$3jJuZxqGqVuue2k8vAdW1eS2WJF9.3cKIafYV4bw5r4xHNa9HGIqy','premiere','X5p6nFnt2I','2016-08-05 16:00:59','2016-08-05 16:00:59'),(8,'Blaise','$2y$10$XYsGwESnRJVOxr/CuO2Gi.r7BSFqAyj6wnDHy5wTokgEA9bGRY.l2','premiere','BnAbsSgJXl2TMIPlEa7QEIlDWIZPWVAoIQ3jFLTORZVS1SINfTkkEYsImsXa','2016-08-05 16:01:09','2016-08-05 16:05:08'),(9,'Isaac','$2y$10$/V4DluvLNHHmHErigPFGFOLrDlzFhgqsFaHWya2OU6tvUj42RgsKm','premiere','A3BALNSpUj','2016-08-05 16:01:16','2016-08-05 16:01:16'),(10,'Steve','$2y$10$nh8rm2ufZCnpXEUuHDgh7e1Tk2YvVMF3/JrwqOI16izVyIOg.TeA.','premiere','mvjteJpmfw','2016-08-05 16:01:25','2016-08-05 16:01:25'),(11,'Brendan','$2y$10$rTpG2ZgqBsccy/KgMwhyAuZNf9ET2.R4c5N8hP2LV0BSYt4s77K72','terminal','QhIE9alSxi','2016-08-05 16:01:41','2016-08-05 16:01:41'),(12,'David','$2y$10$saXUCq/1CWM/cvaNlHcPdexAghPKAyHSyvS9ZRQAy.j0y2P5bY.5O','terminal','APIc6lItDG','2016-08-05 16:01:51','2016-08-05 16:01:51'),(13,'George','$2y$10$0Wz/t0RZ.KaPAgIrxJvjluPTRfbPS8DpSw0BhgeGeUiKEzjtXi3XC','terminal','jPElk1sc9a','2016-08-05 16:01:59','2016-08-05 16:01:59'),(14,'Jim','$2y$10$qHFe9YluBHQWNoD7DM5LFedAk3o7lICLMWXt/DJPhnLOJh6CDuhWa','terminal','HBo8bC4TAZ','2016-08-05 16:02:06','2016-08-05 16:02:06'),(15,'Leslie','$2y$10$D2p2D2A5Z6HnBF2BJA0uEOkjHz5z8NeXY1dKQ9kOIk.Telq7F9ySe','terminal','V2qvHVS7Wb','2016-08-05 16:02:15','2016-08-05 16:02:15'),(16,'Maria','$2y$10$Qqt/Gyy12brQWxmyTSKijeA0zVDsq4rG/hRqb9NuqWrQ8ZB6Aybja','terminal','wKUW3ubVBb','2016-08-05 16:02:22','2016-08-05 16:02:22'),(17,'Rasmus','$2y$10$qOFwU5G7JOAIlkKlKPlQZuZGCFUmpmUKML5V8FsCAe2XJDsJRNcdm','terminal','UaRHf14qxc','2016-08-05 16:02:33','2016-08-05 16:02:33'),(18,'Tim','$2y$10$1HJBQ5Z/UDHrojoOmDx4LebGO1kuYmOZqgjkU0.23la3M0KR2ZEu2','terminal','cjJNTikNrGT1v7WHlRLrEh43T4VCBJNI22FzDJxd5iDkNsZfrdYOM7B7iaqd','2016-08-05 16:02:41','2016-08-05 16:04:00');
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

-- Dump completed on 2016-11-30  0:07:13
