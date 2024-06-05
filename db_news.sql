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
  `view` int(11) DEFAULT 0,
  `approved` enum('0','1','2') DEFAULT '0',
  PRIMARY KEY (`id_article`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `article` */

insert  into `article`(`id_article`,`id_user`,`title`,`image`,`content`,`publication_date`,`view`,`approved`) values 
(36,32,'5 Pemain Timnas Indonesia U-23 Dapat Pemutihan Karir','1714209591_73935ead5e913da3f37c.jpg','SEBANYAK 5 pemain Timnas Indonesia U-23 mendapatkan pemutihan kartu jelang semifinal Piala Asia U-23 2024 kontra Timnas Uzbekistan U-23/Timnas Arab Saudi U-23 pada Senin, 29 April 2024 pukul 21.00 WIB. Apakah lima pemain ini termasuk Rafael Struick?\r\n                                                                                                                        ','2024-04-27 00:00:00',0,'1'),
(37,32,'HMI Subang Kembali Unjuk Rasa, Inilah 5 Poin Tuntutannya','1716315319_0bbde97d2a990b3b3d87.jpg','<p><b>SUBANG, Pojok Berita</b> - Himpunan Mahasiswa Islam (HMI) Kabupaten Subang, Jawa Barat kembali menggelar aksi unjuk rasa, Selasa (21/5/2024). Unjuk rasa dilakukan di beberapa titik mulai dari Gedung DPRD Subang hingga kantor Bupati Subang.&nbsp;</p><p>Sempat terjadi kericuhan dalam aksi unjuk rasa itu. Aksi saling dorong terjadi ketika massa hendak masuk ke gedung DPRD Subang yang dijaga ketat Polisi, Satpol PP dan Satpam.&nbsp;</p><p>Ketua HMI Subang, Muhammad Ali Annaba, menilai bahwa banyak kebijakan Pemkab Subang khususnya Pj Bupati Subang yang merugikan masyarakat. Seperti rencana proyek pembangunan Pesona Subang Mall oleh PT. Subang Sejahtera dan PT. Pesona Subang Sejahtera.</p><p>\"Sebagai penanggung jawab terkesan adanya kongkalikong yang dilakukan oleh Pemerintah Daerah dengan dalih penyertaan modal/investasi tapi faktanya dalam langkah awalnya saja sudah banyak&nbsp; menyalahi aturan dan banyak mekanisme yang dilewati, hal ini di aminkan ketika adanya kisruh dan saling tuduh antara PT Subang Sejahtera dengan Dinas Koperasi, UMKM, Perdagangan dan Perindustrian,\" ujarnya.&nbsp;<br></p>','2024-05-15 00:00:00',0,'1'),
(38,32,'Soal Kebebasan Berpendapat di Dunia Digital, Kemenkominfo Minta Masyarakat Bersikap Bijak','1716315091_2a28a94686eb3c3000f6.jpg','<div>Kementerian Komunikasi dan Informatika (Kemenkominfo) mengimbau masyarakat selalu bersikap bijak dalam dunia digital. </div><div>Hal tersebut terkuat dalam forum sosialisasi bertema “Kebebasan Berpendapat dan Berekspresi di Dunia Digital” yang diadakan di Gedung Serba Guna Kesenian Balikpapan, Kota Balikpapan, Kalimantan Timur, Selasa (2/4/2024). </div><div>Dalam forum tersebut, Ketua Tim Informasi dan Komunikasi Hukum dan Hak Asasi Manusia (HAM) Astrid Ramadiah mengatakan, pemerintah menjamin kebebasan berpendapat. </div><div>Dengan demikian, masyarakat bisa menyampaikan aspirasi dan pendapat secara bijak dan penuh tanggung jawab di ruang digital.  </div><div>Pada 2008, Pemerintah Indonesia mengeluarkan Undang-undang Informasi dan Transaksi Elektronik (UU ITE) yang kemudian baru saja mengalami revisi.  “UU ITE ini diharapkan dapat menjaga ruang digital menjadi lebih bersih, sehat, beretika, serta bisa dimanfaatkan secara produktif untuk kemajuan bangsa dan negara,” ungkapnya melalui siaran pers yang diterima Kompas.com, Rabu (3/4/2024).</div><div><br></div>                        ','2024-05-20 00:00:00',0,'0'),
(47,32,'Lorem ipsum dolor sit amet','1717273913_79b5c3963dd0779e5044.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac.&nbsp;\r\n                        ','2024-06-01 00:00:00',0,'0'),
(48,32,'Menilik Teknologi Canggih Command Center Tahap I IKN','1717429778_e8c920818c764fe11094.png','<p>NUSANTARA, KOMPAS.com - Ibu Kota Nusantara (IKN) yang dirancang sebagai kota cerdas atau smart city mulai diinisiasi dengan pengembangan Command Center Tahap I yang baru saja dikunjungi Presiden Jokowi, pada Jumat (1/3/2024).</p><p>Fasilitas ini merupakan layanan monitoring dan kontrol kota cerdas Nusantara berbasis teknologi big data dan computer vision yang memanfaatkan teknologi pengawasan dan pemantauan berbasis sensor, CCTV, dan drone serta optimalisasi layanan digital.</p><p>Terdapat sejumlah fungsi di Comman Center Tahap I IKN ini. Di antaranya fungsi pengawasan lokasi dan pembangunan berbagai proyek APBN dan Non-APBN, pengambilan keputusan berdasarkan hasil analisis data operasional wilayah, evaluasi dan pemantauan data-data terkait kemajuan pembangunan.</p><p>Terdapat sejumlah fungsi di Comman Center Tahap I IKN ini. Di antaranya fungsi pengawasan lokasi dan pembangunan berbagai proyek APBN dan Non-APBN, pengambilan keputusan berdasarkan hasil analisis data operasional wilayah, evaluasi dan pemantauan data-data terkait kemajuan pembangunan.<br></p><p>\r\n                        </p>','2024-06-03 00:00:00',0,'1');

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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

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
(97,48,4,NULL);

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
(11,'admin','$2y$10$qnEMvcYVOZBSZjURgKQv/.VwydR6urBIT0O5z2dBcx43BYk5lfj96','Yon Arifin','089668017778','','admin','1','97570','2024-03-05 13:54:19','2024-04-16 18:34:33'),
(32,'author','$2y$10$tv0ohz1AU0IQ.apD0opn3e5vr/s2BvxJeYSt58cPeukuborZUMCGq','Yon Arifin','089668017776','','author','1',NULL,'2024-03-17 23:40:13','2024-04-26 21:35:47'),
(34,'editor','$2y$10$lf2zxkewN.p4i4DzwY4/fOWT.z5dqK14MQtdmnqeCBdecMrB/DVZC','editor','0897979979797','','editor','1',NULL,'2024-03-18 16:18:33','2024-03-18 16:18:33'),
(45,'visitor','$2y$10$NHujCp83sSdNTpKhQ59t6OQ4mTtACA1ciVzbbM03EJXmkJHCXayHi','','089668017778','','visitor','1',NULL,'2024-05-24 10:42:00','2024-05-24 10:42:00'),
(51,'author2','$2y$10$l/0ITxIQbEdWEGfj1T4VNeamzPdEaRbWe8pPPC.2w1xj1GUsj2HzK','Rmha','089668017778','','author','1',NULL,'2024-05-24 11:04:10','2024-05-24 11:04:10'),
(52,'aa','$2y$10$9um46YO6j1mTXPY/CF9WLuLplbH8X/nyRTWNi49Lt8n9FYjmd9tk2','aa','08977777','','author','1',NULL,'2024-05-24 11:07:20','2024-05-24 11:07:20'),
(53,'wwww','$2y$10$SQUVKdz7yuMi5Gyw0sursO5R0WplCWSy90oG2Lw3Y7ChLsZBpf70K','aa','aa','','admin','1',NULL,'2024-05-24 11:08:33','2024-05-24 11:08:33'),
(54,'wwww22','$2y$10$iN0TXlzsju6BP5agpyZZU.xfU8G3bDoZPxy1Q8qWTsLFm9vlto0wC','aa','aa','','admin','1',NULL,'2024-05-24 11:09:42','2024-05-24 11:09:42'),
(55,'wwww23','$2y$10$4L9ukrq2M7iaR2ed1PjJFeQOKxdENfuAUw4FxIGpVXMZFaraPAR4e','aa','aa','','admin','1',NULL,'2024-05-24 11:31:14','2024-05-24 11:31:14'),
(56,'author22','$2y$10$xHkQfI2aMyi/zq.hWbbVDuzJL9UcUFqxHbX0CJsiOOLSm.6jUQVI6','yon','089668017778','','admin','1',NULL,'2024-05-24 11:44:01','2024-05-24 11:44:01'),
(57,'author33','$2y$10$LVq1QOcXP8C45LrHKnP23.jHzYh0ZgJwhdAEG7X4MNRcsRnTJbZLG','y','08975973129','','author','1',NULL,'2024-05-24 11:55:21','2024-05-24 11:55:21'),
(58,'author34','$2y$10$.LtB6poBHBRlNL/s.zwE.enSfckYynv4tY28NSU7d.dd8qUosqDoK','y','08975973129','','admin','1',NULL,'2024-05-24 11:56:42','2024-05-24 11:56:42'),
(59,'dfd','$2y$10$vCImXSIBhid/1bLaYidxzOdShXbn1YAArNnn1M76qu2FiLaM84LzS','fd','0896680177778','','author','1',NULL,'2024-05-24 11:58:21','2024-05-24 11:58:21'),
(60,'dfdf','$2y$10$FOauBUn5NfU0Pm6Mr78WCuiA.EGfcENUd7rtPAeHIDMa41Q/4FLei','fd','0896680177778','','admin','1',NULL,'2024-05-24 12:02:37','2024-05-24 12:02:37'),
(61,'dfdfd','$2y$10$lk4PZ9AWQl.PGry1PizVR.uZo2xVUuP8NK1swoKOqtAEHPSFJEmlK','fd','0896680177778','','admin','1',NULL,'2024-05-24 12:03:06','2024-05-24 12:03:06'),
(62,'author12344','$2y$10$wgguCRcRadae4YvakbyQq.MSLAeGWoZoCWwiVpUsH679n1GcIExkS','aa','08975973129','','author','1',NULL,'2024-05-24 12:09:15','2024-05-24 12:09:15'),
(63,'yon123','$2y$10$VoOLfpoK25zXUmCXQWuYlOE1xmVtfVygBweJFMRwKTw.ROr41yE0q','ofod','089668017778','','author','1',NULL,'2024-05-24 12:10:14','2024-05-24 12:10:14'),
(64,'author3333','$2y$10$lnPSAX/0uNu3QaVYMGmDDuExzZ31mpQZD.Sk9gQiV.hzHviE1q7l2','yp','089668017778','','author','1',NULL,'2024-05-24 12:23:50','2024-05-24 12:23:50'),
(65,'author3333r','$2y$10$6E.kWDxWqNtPAfkfcMZYX.e3cYYHjnuNivn/wSJKwedTbxZuGvtNe','yp','089668017778','','admin','1',NULL,'2024-05-24 12:25:17','2024-05-24 12:25:17'),
(66,'author3333re','$2y$10$YI6oMaGXLOCXY9RfManriemN42D9LTakbelHTC754d6QhcWF4S2Oe','yp','089668017778','','admin','1',NULL,'2024-05-24 12:49:13','2024-05-24 12:49:13'),
(67,'aaaa','$2y$10$Vl7hksQfDC7AZw8bbCnRROfjE6rfZ4j7i4OnJsFfYgUVpObh6PDVC','aa','aa','','editor','1',NULL,'2024-05-24 12:50:15','2024-05-24 12:50:15'),
(68,'aaaa22','$2y$10$k2KP6ralkqK09273QAN0Pe6AyCg3/aO0TylM0CSYUTbz6J2ifWDAS','aa','aa','','admin','1',NULL,'2024-05-24 12:56:36','2024-05-24 12:56:36'),
(69,'aaaa22re','$2y$10$BcuycBRrma4lDiV1WAALje2yfbGcVhLD5/b/xW7d0Gr8U/pAjC3cO','aa','aa','','admin','1',NULL,'2024-05-24 12:57:23','2024-05-24 12:57:23'),
(70,'aaaa22re33','$2y$10$dzAB0OInEpZrmsemPM1eDe6BJj7zHnt5O5qHFPnVX0ti0E.nzxBXS','aa','aa','','admin','1',NULL,'2024-05-24 12:58:48','2024-05-24 12:58:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
