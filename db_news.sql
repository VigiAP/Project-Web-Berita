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

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `image` varchar(50) NOT NULL,
  `role` enum('admin','author','pengunjung','visitor','editor') NOT NULL DEFAULT 'visitor',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `otp` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`username`,`password`,`name`,`phone_no`,`image`,`role`,`status`,`otp`,`created_at`,`updated_at`) values 
(11,'admin','$2y$10$TC6h.E/FaCXq5zflI9/Mnefbvu61diYV5jND3sBFiF4m7KsW7UqF.','Yon','08966801778','','admin','1',NULL,'2024-03-05 13:54:19','2024-03-05 13:57:41'),
(32,'author','$2y$10$4TXhpVxCToBFA.OX7WwYOunofxxiEC2p0tDJ4InyimOS5T8As0O3e','author','089668017776','','author','1',NULL,'2024-03-17 23:40:13','2024-03-17 23:40:13'),
(33,'visitor','$2y$10$3jmoe5ErGvqabUrIUG1RJeSqquY5bWroIk4CjHmKT3KyRn8.lTwzS','','089667961116','','visitor','1',NULL,'2024-03-17 23:40:59','2024-03-17 23:40:59');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
