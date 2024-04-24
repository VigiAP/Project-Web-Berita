/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.25-MariaDB : Database - db_news
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_news` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_news`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `publication_date` datetime DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `approved` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `article` */

insert  into `article`(`id_article`,`id_user`,`title`,`image`,`content`,`publication_date`,`view`,`approved`) values 
(34,32,'Messi Pindah ke Barca LAgi','1713622192_fa6f245c5072cd7b69f8.jpg','lorem ipsum','2024-04-20 00:00:00',NULL,NULL),
(35,32,'test','1713622715_96d73db69358d0684b66.jpg','test','2024-04-20 00:00:00',NULL,NULL);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id_category` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categories` */

insert  into `categories`(`id_category`,`name`) values 
(1,'edukasii'),
(4,'politik'),
(5,'olahraga'),
(6,'yon');

/*Table structure for table `detail_categories` */

DROP TABLE IF EXISTS `detail_categories`;

CREATE TABLE `detail_categories` (
  `id_detail_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_detail_category`),
  KEY `id_categoriy` (`id_category`),
  KEY `id_articles` (`id_article`),
  CONSTRAINT `detail_categories_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  CONSTRAINT `detail_categories_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_categories` */

insert  into `detail_categories`(`id_detail_category`,`id_article`,`id_category`,`description`) values 
(25,NULL,1,NULL),
(26,NULL,5,NULL),
(27,NULL,4,NULL),
(38,34,5,NULL),
(39,34,4,NULL),
(40,35,5,NULL);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `image` varchar(50) NOT NULL,
  `role` enum('admin','author','visitor','editor') NOT NULL DEFAULT 'visitor',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `otp` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id_user`,`username`,`password`,`name`,`phone_no`,`image`,`role`,`status`,`otp`,`created_at`,`updated_at`) values 
(11,'admin','$2y$10$qnEMvcYVOZBSZjURgKQv/.VwydR6urBIT0O5z2dBcx43BYk5lfj96','Yon Arifin','089668017778','','admin','1','97570','2024-03-05 13:54:19','2024-04-16 18:34:33'),
(32,'author','$2y$10$tv0ohz1AU0IQ.apD0opn3e5vr/s2BvxJeYSt58cPeukuborZUMCGq','Yon','089668017776','','author','1',NULL,'2024-03-17 23:40:13','2024-04-05 00:32:14'),
(34,'editor','$2y$10$lf2zxkewN.p4i4DzwY4/fOWT.z5dqK14MQtdmnqeCBdecMrB/DVZC','editor','0897979979797','','editor','1',NULL,'2024-03-18 16:18:33','2024-03-18 16:18:33'),
(40,'author4','$2y$10$jm2BgGNrkj0YfWyMcE5YOOJnSoT/9DNbDxVSBT4kyuGs4gHdYkRne','yon a','089668017778','','author','1',NULL,'2024-03-24 15:03:45','2024-04-16 18:55:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
