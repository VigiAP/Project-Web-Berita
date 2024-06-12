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
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `publication_date` datetime DEFAULT NULL,
  `approved` enum('0','1','2') DEFAULT '0',
  PRIMARY KEY (`id_article`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `article` */

insert  into `article`(`id_article`,`id_user`,`title`,`image`,`content`,`publication_date`,`approved`) values 
(36,32,'5 Pemain Timnas Indonesia U-23 Dapat Pemutihan Karir','1714209591_73935ead5e913da3f37c.jpg','SEBANYAK 5 pemain Timnas Indonesia U-23 mendapatkan pemutihan kartu jelang semifinal Piala Asia U-23 2024 kontra Timnas Uzbekistan U-23/Timnas Arab Saudi U-23 pada Senin, 29 April 2024 pukul 21.00 WIB. Apakah lima pemain ini termasuk Rafael Struick?\r\n                                                                                                                        ','2024-04-27 00:00:00','1'),
(37,32,'HMI Subang Kembali Unjuk Rasa, Inilah 5 Poin Tuntutannya','1716315319_0bbde97d2a990b3b3d87.jpg','<p><b>SUBANG, Pojok Berita</b> - Himpunan Mahasiswa Islam (HMI) Kabupaten Subang, Jawa Barat kembali menggelar aksi unjuk rasa, Selasa (21/5/2024). Unjuk rasa dilakukan di beberapa titik mulai dari Gedung DPRD Subang hingga kantor Bupati Subang.&nbsp;</p><p>Sempat terjadi kericuhan dalam aksi unjuk rasa itu. Aksi saling dorong terjadi ketika massa hendak masuk ke gedung DPRD Subang yang dijaga ketat Polisi, Satpol PP dan Satpam.&nbsp;</p><p>Ketua HMI Subang, Muhammad Ali Annaba, menilai bahwa banyak kebijakan Pemkab Subang khususnya Pj Bupati Subang yang merugikan masyarakat. Seperti rencana proyek pembangunan Pesona Subang Mall oleh PT. Subang Sejahtera dan PT. Pesona Subang Sejahtera.</p><p>\"Sebagai penanggung jawab terkesan adanya kongkalikong yang dilakukan oleh Pemerintah Daerah dengan dalih penyertaan modal/investasi tapi faktanya dalam langkah awalnya saja sudah banyak&nbsp; menyalahi aturan dan banyak mekanisme yang dilewati, hal ini di aminkan ketika adanya kisruh dan saling tuduh antara PT Subang Sejahtera dengan Dinas Koperasi, UMKM, Perdagangan dan Perindustrian,\" ujarnya.&nbsp;<br></p>','2024-05-15 00:00:00','1'),
(38,32,'Soal Kebebasan Berpendapat di Dunia Digital, Kemenkominfo Minta Masyarakat Bersikap Bijak','1716315091_2a28a94686eb3c3000f6.jpg','<div>Kementerian Komunikasi dan Informatika (Kemenkominfo) mengimbau masyarakat selalu bersikap bijak dalam dunia digital. </div><div>Hal tersebut terkuat dalam forum sosialisasi bertema “Kebebasan Berpendapat dan Berekspresi di Dunia Digital” yang diadakan di Gedung Serba Guna Kesenian Balikpapan, Kota Balikpapan, Kalimantan Timur, Selasa (2/4/2024). </div><div>Dalam forum tersebut, Ketua Tim Informasi dan Komunikasi Hukum dan Hak Asasi Manusia (HAM) Astrid Ramadiah mengatakan, pemerintah menjamin kebebasan berpendapat. </div><div>Dengan demikian, masyarakat bisa menyampaikan aspirasi dan pendapat secara bijak dan penuh tanggung jawab di ruang digital.  </div><div>Pada 2008, Pemerintah Indonesia mengeluarkan Undang-undang Informasi dan Transaksi Elektronik (UU ITE) yang kemudian baru saja mengalami revisi.  “UU ITE ini diharapkan dapat menjaga ruang digital menjadi lebih bersih, sehat, beretika, serta bisa dimanfaatkan secara produktif untuk kemajuan bangsa dan negara,” ungkapnya melalui siaran pers yang diterima Kompas.com, Rabu (3/4/2024).</div><div><br></div>                        ','2024-05-20 00:00:00','1'),
(47,32,'Lorem ipsum dolor sit amet','1717273913_79b5c3963dd0779e5044.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac.&nbsp;\r\n                        ','2024-06-01 00:00:00','0'),
(48,32,'Menilik Teknologi Canggih Command Center Tahap I IKN','1717429778_e8c920818c764fe11094.png','<p>NUSANTARA, KOMPAS.com - Ibu Kota Nusantara (IKN) yang dirancang sebagai kota cerdas atau smart city mulai diinisiasi dengan pengembangan Command Center Tahap I yang baru saja dikunjungi Presiden Jokowi, pada Jumat (1/3/2024).</p><p>Fasilitas ini merupakan layanan monitoring dan kontrol kota cerdas Nusantara berbasis teknologi big data dan computer vision yang memanfaatkan teknologi pengawasan dan pemantauan berbasis sensor, CCTV, dan drone serta optimalisasi layanan digital.</p><p>Terdapat sejumlah fungsi di Comman Center Tahap I IKN ini. Di antaranya fungsi pengawasan lokasi dan pembangunan berbagai proyek APBN dan Non-APBN, pengambilan keputusan berdasarkan hasil analisis data operasional wilayah, evaluasi dan pemantauan data-data terkait kemajuan pembangunan.</p><p>Terdapat sejumlah fungsi di Comman Center Tahap I IKN ini. Di antaranya fungsi pengawasan lokasi dan pembangunan berbagai proyek APBN dan Non-APBN, pengambilan keputusan berdasarkan hasil analisis data operasional wilayah, evaluasi dan pemantauan data-data terkait kemajuan pembangunan.<br></p><p>\r\n                        </p>','2024-06-03 00:00:00','1'),
(49,32,'test',NULL,'test','2024-06-11 00:00:00','0');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id_category` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categories` */

insert  into `categories`(`id_category`,`name`) values 
(1,'Edukasi'),
(4,'Politik'),
(5,'Olahraga'),
(8,'Bencana Alam'),
(11,'Teknologi'),
(12,'Kesehatan'),
(13,'Travel');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comments` */

insert  into `comments`(`id_comment`,`id_user`,`id_article`,`comment_date`,`comment`) values 
(30,45,37,'2024-06-11 13:24:46','fdf'),
(31,51,37,'2024-06-11 13:25:38','kfdjkfdjkfjdkfd'),
(33,51,36,'2024-06-11 13:27:30','fdfdfdfd'),
(35,51,48,'2024-05-01 15:51:12','test'),
(36,45,38,'2024-06-11 18:50:00','gerengseng');

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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_categories` */

insert  into `detail_categories`(`id_detail_category`,`id_article`,`id_category`,`description`) values 
(25,NULL,1,NULL),
(26,NULL,5,NULL),
(27,NULL,4,NULL),
(58,36,5,NULL),
(60,38,4,NULL),
(61,37,4,NULL),
(94,47,5,NULL),
(95,47,4,NULL),
(96,48,11,NULL),
(97,48,4,NULL),
(98,49,13,NULL);

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `like_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_like` (`id_like`),
  KEY `id_article` (`id_article`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `likes` */

insert  into `likes`(`id_like`,`id_article`,`id_user`,`like_date`) values 
(32,37,51,'2024-06-10 11:31:53'),
(33,37,45,'2024-06-11 06:23:50'),
(34,36,51,'2024-06-11 06:27:02'),
(35,36,45,'2024-06-11 08:06:18'),
(36,47,45,'2024-04-01 16:59:27'),
(37,47,51,'2024-06-04 16:59:43'),
(39,38,45,'2024-06-11 11:49:18'),
(40,38,51,'2024-06-11 11:52:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id_user`,`username`,`password`,`name`,`phone_no`,`image`,`role`,`status`,`otp`,`created_at`,`updated_at`) values 
(11,'admin','$2y$10$qnEMvcYVOZBSZjURgKQv/.VwydR6urBIT0O5z2dBcx43BYk5lfj96','rerer','089668017778','1717952355_84c06ce3a9d439a04023.jpg','admin','1','97570','2024-03-05 13:54:19','2024-06-09 23:59:15'),
(32,'author','$2y$10$tv0ohz1AU0IQ.apD0opn3e5vr/s2BvxJeYSt58cPeukuborZUMCGq','Vigi','089668017776','1717953338_41e1e71acad68b259fe7.jpeg','author','1',NULL,'2024-03-17 23:40:13','2024-06-10 00:15:38'),
(34,'editor','$2y$10$lf2zxkewN.p4i4DzwY4/fOWT.z5dqK14MQtdmnqeCBdecMrB/DVZC','Haris','0897979979797','','editor','1',NULL,'2024-03-18 16:18:33','2024-06-09 02:20:59'),
(45,'visitor','$2y$10$NHujCp83sSdNTpKhQ59t6OQ4mTtACA1ciVzbbM03EJXmkJHCXayHi','Rhma','089668017778','','visitor','1',NULL,'2024-05-24 10:42:00','2024-06-09 02:20:45'),
(51,'visitor2','$2y$10$NHujCp83sSdNTpKhQ59t6OQ4mTtACA1ciVzbbM03EJXmkJHCXayHi','Dzikri','089668017778','','visitor','1',NULL,'2024-05-24 11:04:10','2024-06-09 02:21:05');

/*Table structure for table `views` */

DROP TABLE IF EXISTS `views`;

CREATE TABLE `views` (
  `id_view` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `view_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_view`),
  KEY `id_user` (`id_user`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `views_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  CONSTRAINT `views_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4;

/*Data for the table `views` */

insert  into `views`(`id_view`,`id_user`,`id_article`,`view_date`) values 
(97,45,37,'2024-04-01 15:11:56'),
(98,51,38,'2024-05-01 15:12:32'),
(99,34,48,'2024-06-01 15:12:54'),
(100,51,37,'2024-06-11 15:13:20'),
(101,45,38,'2024-04-01 15:18:21'),
(102,45,48,'2024-05-01 15:22:15'),
(106,45,38,'2024-06-11 11:48:17'),
(108,51,38,'2024-06-11 11:52:22');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
