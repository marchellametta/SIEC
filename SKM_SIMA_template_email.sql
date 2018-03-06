/*
SQLyog Trial v12.4.3 (64 bit)
MySQL - 10.1.24-MariaDB : Database - SKM_SIMA
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`SKM_SIMA` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `SKM_SIMA`;

/*Table structure for table `SIMA_TEMPLATE_EMAIL_MT` */

DROP TABLE IF EXISTS `SIMA_TEMPLATE_EMAIL_MT`;

CREATE TABLE `SIMA_TEMPLATE_EMAIL_MT` (
  `ID_TEMPLATE` int(11) NOT NULL,
  `V_NAMA_TEMPLATE` varchar(45) NOT NULL,
  `V_ISI_TEMPLATE` text,
  `N_JENIS_EMAIL` int(11) NOT NULL,
  PRIMARY KEY (`ID_TEMPLATE`),
  UNIQUE KEY `V_NAMA_TEMPLATE_UNIQUE` (`V_NAMA_TEMPLATE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `SIMA_TEMPLATE_EMAIL_MT` */

insert  into `SIMA_TEMPLATE_EMAIL_MT`(`ID_TEMPLATE`,`V_NAMA_TEMPLATE`,`V_ISI_TEMPLATE`,`N_JENIS_EMAIL`) values 
(1,'TEMPLATE EMAIL MENUNGGU KONFIRMASI','<p>[@nama_acara]</p>\r\n',2),
(2,'TEMPLATE EMAIL TERVERIFIKASI',NULL,4),
(3,'TEMPLATE EMAIL DIBATALKAN',NULL,5),
(4,'TEMPLATE EMAIL PERUBAHAN BARANG-PETUGAS',NULL,6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
