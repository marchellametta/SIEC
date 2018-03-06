CREATE DATABASE  IF NOT EXISTS `skm_sima_but` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `skm_sima_but`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: skm_sima_but
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.22-MariaDB

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
-- Table structure for table `akdadm_mt_mhs`
--

DROP TABLE IF EXISTS `akdadm_mt_mhs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akdadm_mt_mhs` (
  `V_NPM` char(10) NOT NULL,
  `V_NAMA` varchar(100) DEFAULT NULL,
  `V_KODE_PRODI` char(1) DEFAULT NULL,
  `V_NAMA_PRODI` char(3) DEFAULT NULL,
  `V_EMAIL` varchar(100) DEFAULT NULL,
  `V_TELP_HP` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`V_NPM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akdadm_mt_mhs`
--

LOCK TABLES `akdadm_mt_mhs` WRITE;
/*!40000 ALTER TABLE `akdadm_mt_mhs` DISABLE KEYS */;
INSERT INTO `akdadm_mt_mhs` VALUES ('2014730012','MELINDA NUR ABIANTI','1','IF','7314012@student.unpar.ac.id','085956006685');
/*!40000 ALTER TABLE `akdadm_mt_mhs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glb_mt_unit`
--

DROP TABLE IF EXISTS `glb_mt_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glb_mt_unit` (
  `V_KODE_UNIT` char(4) CHARACTER SET utf8 NOT NULL,
  `V_NAMA_UNIT` varchar(100) DEFAULT NULL,
  `V_NAMA_UNIT_SINGKAT` varchar(100) DEFAULT NULL,
  `V_NAMA_UNIT_INGGRIS` varchar(100) DEFAULT NULL,
  `V_ALMT_UNIT` varchar(100) DEFAULT NULL,
  `V_TELP_UNIT` varchar(20) DEFAULT NULL,
  `D_STR_UNIT` varchar(1000) DEFAULT NULL,
  `D_DESK_UNIT` varchar(100) DEFAULT NULL,
  `T_INSERT` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `T_UPDATE` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `V_INUPBY` varchar(500) DEFAULT NULL,
  `V_NO_PEG` varchar(500) DEFAULT NULL,
  `V_KODE_JAB_STRUK` varchar(500) DEFAULT NULL,
  `V_JNS_TTD` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`V_KODE_UNIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glb_mt_unit`
--

LOCK TABLES `glb_mt_unit` WRITE;
/*!40000 ALTER TABLE `glb_mt_unit` DISABLE KEYS */;
INSERT INTO `glb_mt_unit` VALUES ('0500','Biro Teknologi dan Informasi','BTI',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:09.754528',NULL,NULL,NULL,NULL,'1'),('0501','BTI Bag. Helpdesk EDUKASI ','BTI Bag. Helpdesk EDUKASI ',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:09.827130',NULL,NULL,NULL,NULL,NULL),('0503','BTI Bag. Hardware','BTI Bag. Hardware',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:09.859237',NULL,NULL,NULL,NULL,NULL),('0504','BTI Bag. Perangkat Lunak','BTI Bag. Perangkat Lunak',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:09.913989',NULL,NULL,NULL,NULL,NULL),('0505','BTI Bag. Jaringan','BTI Bag. Jaringan',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:09.961252',NULL,NULL,NULL,NULL,NULL),('0506','BTI Bag. Pengembangan','BTI Bag. Pengembangan',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:10.003061',NULL,NULL,NULL,NULL,NULL),('0507','BTI Bag. Pusat Data dan Infrastruktur','BTI Bag. Pusat Data dan Infrastruktur',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:10.050461',NULL,NULL,NULL,NULL,NULL),('0508','BTI Bag. Pengolahan Informasi Strategis','BTI Bag. Pengolahan Informasi Strategis',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:10.083895',NULL,NULL,NULL,NULL,NULL),('0509','BTI Bag. Layanan Teknologi Informasi','BTI Bag. Layanan Teknologi Informasi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:10.128080',NULL,NULL,NULL,NULL,NULL),('0599','BTI Umum','BTI Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 09:00:10.170485',NULL,NULL,NULL,NULL,NULL),('0600','Biro Umum dan Teknik','BUT',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.662623',NULL,NULL,NULL,NULL,'1'),('0601','BUT  Bag. Prasarana','BUT Bag. Prasarana',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.753745',NULL,NULL,NULL,NULL,NULL),('0602','BUT Bag. Sarana Umum','BUT Bag. Sarana Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.808399',NULL,NULL,NULL,NULL,NULL),('0603','BUT Bag. Administrasi','BUT Bag. Administrasi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.864669',NULL,NULL,NULL,NULL,NULL),('0604','BUT Bag. Kebersihan, Keamanan dan Ketertiban','BUT Bag. Kebersihan, Keamanan dan Ketertiban',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.919224',NULL,NULL,NULL,NULL,NULL),('0605','BUT Bag. Sarana Teknologi Informasi','BUT Bag. Sarana Teknologi Informasi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.953608',NULL,NULL,NULL,NULL,NULL),('0699','BUT Umum','BUT Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:45:36.981778',NULL,NULL,NULL,NULL,NULL),('0900','Pusat Inovasi Pembelajaran','PIP',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.922780',NULL,NULL,NULL,NULL,'1'),('0901','PIP Bag. Pengembangan Mutu Pembelajaran','PIP Bag. Pengembangan Mutu Pembelajaran',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.956368',NULL,NULL,NULL,NULL,NULL),('0902','PIP Bag. Pengembangan Sumber Pembelajaran','PIP Bag. Pengembangan Sumber Pembelajaran',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.990700',NULL,NULL,NULL,NULL,NULL),('0999','Pusat Inovasi dan Pembelajaran Umum','PIP Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.025022',NULL,NULL,NULL,NULL,NULL),('1100','Biro Kemahasiswaan dan Alumni','BKA',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.068354',NULL,NULL,NULL,NULL,'1'),('1101','BKA Bag. Pembinaan dan Pendampingan Mahasiswa','BKA Bag. Pembinaan dan Pendampingan Mahasiswa',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.135187',NULL,NULL,NULL,NULL,NULL),('1102','BKA Bag. Kesejahteraan Mahasiswa','BKA Bag. Kesejahteraan Mahasiswa',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.201172',NULL,NULL,NULL,NULL,NULL),('1103','BKA Bag. Pendataan dan Kerjasama Alumni','BKA Bag. Pendataan dan Kerjasama Alumni',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.301109',NULL,NULL,NULL,NULL,NULL),('1199','Biro Kemahasiswaan  dan Akademik Umum','BKA Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.335704',NULL,NULL,NULL,NULL,'1'),('1200','Kantor Senat Universitas','KSU',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.367586',NULL,NULL,NULL,NULL,NULL),('1299','Kantor Senat Universitas Umum','KSU Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:35.401096',NULL,NULL,NULL,NULL,NULL),('2664','Laboratorium Proses Produksi','Lab Proses Produksi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:40:47.062228',NULL,NULL,NULL,NULL,NULL),('2665','Laboratorium Otomasi Sistem Produksi','Lab Otomasi Sistem Produksi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:31.812987',NULL,NULL,NULL,NULL,NULL),('2666','Laboratorium Sistem produksi','Lab Sistem produksi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:31.934302',NULL,NULL,NULL,NULL,NULL),('2667','Lab Analisis Perancangan Kerja dan Ergonomi','Lab Analisis PKE',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.012579',NULL,NULL,NULL,NULL,NULL),('2668','Laboratorium Teknologi Informasi','Lab Teknologi Informasi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.090086',NULL,NULL,NULL,NULL,NULL),('2669','Laboratorium Aplikasi Teknik','Lab Aplikasi Teknik',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.176761',NULL,NULL,NULL,NULL,NULL),('2681','Laboratorium Elektronika','Lab Elektronika',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.256343',NULL,NULL,NULL,NULL,NULL),('2682','Laboratorium Instrumentasi dan Pengukuran','Lab Instrumentasi dan Pengukuran',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.290023',NULL,NULL,NULL,NULL,NULL),('2683','Laboratorium Kendali dan Robotika','Lab Kendali dan Robotika',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.363794',NULL,NULL,NULL,NULL,NULL),('2684','Laboratorium Komputasi Mekatronika','Lab Komputasi Mekatronika',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.389895',NULL,NULL,NULL,NULL,NULL),('2685','Laboratorium Sistem Energi','Lab Sistem Energi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.456086',NULL,NULL,NULL,NULL,NULL),('2686','Laboratorium Proyek Mekatronika','Lab Proyek Mekatronika',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.490568',NULL,NULL,NULL,NULL,NULL),('2691','Lab FTI','Lab FTI',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.522827',NULL,NULL,NULL,NULL,NULL),('2692','Lab FTI - jur.TK','Lab TK',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.556480',NULL,NULL,NULL,NULL,NULL),('2693','Lab FTI - jur.TI','Lab TI',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.623738',NULL,NULL,NULL,NULL,NULL),('2694','Lab. FTI-Jur. Elektonika Konsentrasi Mekatronika','Lab. FTI - jur.EKM',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.668777',NULL,NULL,NULL,NULL,NULL),('2699','FTI Umum','FTI Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.745969',NULL,NULL,NULL,NULL,NULL),('2700','Fakultas Teknologi Informasi dan Sains','F. TIS',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.808826',NULL,'Information Technology dan Science',NULL,NULL,'2'),('2701','Matematika','Matematika','Mathematics',NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.912703',NULL,'Mathematics',NULL,NULL,NULL),('2702','Fisika','Fisika','Physics',NULL,NULL,NULL,NULL,'2017-04-16 08:43:32.953267',NULL,'Phyisics',NULL,NULL,NULL),('2703','Teknik Informatika','Teknik Informatika','Informatics',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.023760',NULL,'Informatics',NULL,NULL,NULL),('2711','Laboratorium Matematika Terapan','Lab. Matematika Terapan',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.067946',NULL,NULL,NULL,NULL,NULL),('2721','Laboratorium Fisika Dasar','Lab. Fisika Dasar',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.146033',NULL,NULL,NULL,NULL,NULL),('2722','Laboratorium Elektronika dan Fisika Lanjut','Lab. Elektronika dan Fisika Lanjut',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.178256',NULL,NULL,NULL,NULL,NULL),('2731','Laboratorium Komputasi','Lab. Komputasi',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.213007',NULL,NULL,NULL,NULL,NULL),('2732','Laboratorium Teknologi Informasi dan Komunikasi ','Lab. TIK',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.245120',NULL,NULL,NULL,NULL,NULL),('2799','FTIS Umum','FTIS Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.280006',NULL,NULL,NULL,NULL,NULL),('4100','Pascasarjana','Pascasarjana',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.312335',NULL,NULL,NULL,NULL,'2'),('4101','Magister Manajemen','Mag Manajemen','Master`s program in management',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.345892',NULL,NULL,NULL,NULL,NULL),('4102','Magister Ilmu Hukum','Mag Ilmu Hukum','Master`s program in Law',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.379061',NULL,NULL,NULL,NULL,NULL),('4103','Magister Teknik Sipil','Mag Tek Sipil','Master`s program in Civil Engineering',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.479172',NULL,NULL,NULL,NULL,NULL),('4104','Magister Arsitektur','Mag Arsitektur','Master`s program in Architecture',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.513440',NULL,NULL,NULL,NULL,NULL),('4105','Magister Ilmu Sosial','Mag Ilmu Sosial','Master`s program in Social Sciences',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.545594',NULL,NULL,NULL,NULL,NULL),('4106','Magister Ilmu Teologi','Mag Ilmu Teologi','Master`s program in Theology',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.578816',NULL,NULL,NULL,NULL,NULL),('4107','Magister Teknik Kimia','Mag Tek. Kimia','Master`s programs in Chemical Engineering',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.645712',NULL,NULL,NULL,NULL,NULL),('4108','Magister Teknik Industri','Mag Tek Industri','Master`s programs in Industrial Engineering',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.724865',NULL,NULL,NULL,NULL,NULL),('4109','Magister Hubungan Internasional','Mag HI',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.797958',NULL,NULL,NULL,NULL,NULL),('4171','Doktor Ilmu Ekonomi','Dr Ilmu Ekonomi','Doctorate programs in Management',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.869076',NULL,NULL,NULL,NULL,NULL),('4172','Doktor Ilmu Hukum','Dr Ilmu Hukum','Doctorate programs in Law',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.903098',NULL,NULL,NULL,NULL,NULL),('4173','Doktor Ilmu Teknik Sipil','Dr Ilmu Tek Sipil','Doctorate programs in Civil Engineering',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.935124',NULL,NULL,NULL,NULL,NULL),('4174','Doktor Ilmu Arsitektur','Dr Ilmu Arsitektur','Doctorate programs in Architecture',NULL,NULL,NULL,NULL,'2017-04-16 08:43:33.981151',NULL,NULL,NULL,NULL,NULL),('4199','Pascasarjana Umum','Pascasarjana Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.034186',NULL,NULL,NULL,NULL,NULL),('5100','Lembaga Penelitian dan Pengabdian kepada Masyarakat','LPPM',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.067206',NULL,NULL,NULL,NULL,'1'),('5101','LPPM ','LPPM',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.100271',NULL,NULL,NULL,NULL,NULL),('5102','Pusat Studi (Multidisiplin)-COE SME','COE SME',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.132509',NULL,NULL,NULL,NULL,NULL),('5103','Pusat Studi (Monodisiplin) - COE UID','COE UID',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.169256',NULL,NULL,NULL,NULL,NULL),('5104','Pusat Studi yang akan dibentuk kemudian','Pusat Studi yang akan dibentuk kemudian',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.201999',NULL,NULL,NULL,NULL,NULL),('5190','Unpar Press','Unpar Press',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.235110',NULL,NULL,NULL,NULL,NULL),('5199','LPPM Umum','LPPM Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.267751',NULL,NULL,NULL,NULL,NULL),('5200','Lembaga Pengembangan Humaniora','LPH',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.293053',NULL,NULL,NULL,NULL,'1'),('5201','LPH Bag. Bimbingan Konseling','LPH Bag. Bimbingan Konseling',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.323387',NULL,NULL,NULL,NULL,NULL),('5202','LPH Bag. Pengembangan Potensi Insani','LPH Bag. Pengembangan Potensi Insani',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.356035',NULL,NULL,NULL,NULL,NULL),('5299','LPH Umum','LPH Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.390373',NULL,NULL,NULL,NULL,NULL),('5300','Pusat Pengembangan Karir','PPK',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.478348',NULL,NULL,NULL,NULL,'1'),('5301','PPK Bag. Pengembangan Keahlian Bahasa Asing','PPK Bag. Pengembangan Keahlian Bahasa Asing',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.523691',NULL,NULL,NULL,NULL,NULL),('5302','PPK Bag. Bimbingan Karir','PPK Bag. Bimbingan Karir',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.568172',NULL,NULL,NULL,NULL,NULL),('5399','PPK Umum','PPK Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.601751',NULL,NULL,NULL,NULL,NULL),('6100','Perpustakaan','Perpus',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.664263',NULL,NULL,NULL,NULL,'1'),('6101','Layanan Teknis','Layanan Teknis',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.689744',NULL,NULL,NULL,NULL,NULL),('6102','Layanan Pembaca','Layanan Pembaca',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.722327',NULL,NULL,NULL,NULL,NULL),('6103','Layanan Digital','Layanan Digital',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.756900',NULL,NULL,NULL,NULL,NULL),('6199','Perpustakaan Umum','Perpustakaan Umum',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.789243',NULL,NULL,NULL,NULL,NULL),('8100','Yayasan','Yayasan',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.824224',NULL,NULL,NULL,NULL,'1'),('8199','Yayasan','Yayasan',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.856222',NULL,NULL,NULL,NULL,NULL),('9100','Rektorat','Rektorat',NULL,NULL,NULL,NULL,NULL,'2017-04-16 08:43:34.889482',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `glb_mt_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_acuan_aset_dt`
--

DROP TABLE IF EXISTS `sima_acuan_aset_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_acuan_aset_dt` (
  `ID_ASET` int(11) NOT NULL,
  `ID_ACUAN` int(11) NOT NULL,
  KEY `ID_ASET` (`ID_ASET`),
  KEY `ID_ACUAN` (`ID_ACUAN`),
  CONSTRAINT `ACUAN_ASET_FK` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ACUAN_ASET_FK2` FOREIGN KEY (`ID_ACUAN`) REFERENCES `sima_tabel_acuan_mt` (`ID_ACUAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_acuan_aset_dt`
--

LOCK TABLES `sima_acuan_aset_dt` WRITE;
/*!40000 ALTER TABLE `sima_acuan_aset_dt` DISABLE KEYS */;
INSERT INTO `sima_acuan_aset_dt` VALUES (3,7),(4,2),(5,3),(6,7),(9,3),(10,7),(3,7),(4,6),(5,7),(6,7),(9,7),(10,7),(10,4),(11,7),(12,7),(13,7),(14,7),(16,7),(17,1),(17,7),(18,7),(19,1),(19,7),(21,1),(21,7),(22,2),(22,7),(23,7),(49,6),(54,7),(54,1),(55,6),(55,1),(77,7),(78,7),(76,7),(76,1),(82,7),(81,7),(81,1),(83,7),(85,7),(84,7),(84,3),(87,7),(89,7),(117,7),(116,7),(116,1);
/*!40000 ALTER TABLE `sima_acuan_aset_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_aset_mt`
--

DROP TABLE IF EXISTS `sima_aset_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_aset_mt` (
  `ID_ASET` int(11) NOT NULL AUTO_INCREMENT,
  `ASET_KATEGORI_ID` int(11) NOT NULL,
  `DT_TANGGAL_PEROLEHAN` date DEFAULT NULL,
  `N_HARGA_PEROLEHAN` int(11) DEFAULT NULL,
  `N_UMUR_EKONOMIS` int(11) NOT NULL,
  `UNIT_PEMILIK_ID` char(4) NOT NULL,
  `ASET_LOKASI_ID` int(11) NOT NULL,
  `N_STOK` int(11) NOT NULL,
  PRIMARY KEY (`ID_ASET`),
  KEY `ASET_KATEGORI_ID` (`ASET_KATEGORI_ID`),
  KEY `ASET_LOKASI_ID` (`ASET_LOKASI_ID`),
  CONSTRAINT `ASET_MT_IBFK_1` FOREIGN KEY (`ASET_KATEGORI_ID`) REFERENCES `sima_kategori_mt` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_aset_mt`
--

LOCK TABLES `sima_aset_mt` WRITE;
/*!40000 ALTER TABLE `sima_aset_mt` DISABLE KEYS */;
INSERT INTO `sima_aset_mt` VALUES (3,1,'1995-01-01',2147483647,15,'0602',1,0),(4,1,'2017-04-24',0,0,'0602',1,0),(5,1,'2017-04-25',0,0,'0602',1,0),(6,1,'0000-00-00',0,0,'0602',1,0),(9,1,'0000-00-00',0,0,'9100',1,0),(10,1,'0000-00-00',0,0,'0500',1,0),(11,3,'2017-03-05',550000,4,'0601',1,0),(12,3,'2017-03-05',300000,4,'0601',1,0),(13,5,'2017-03-15',550000,4,'0601',1,0),(14,6,'2017-03-17',6450000,4,'0601',1,0),(16,3,'0001-02-01',1,3,'0501',1,0),(17,1,'2017-04-26',24,30,'0500',1,0),(18,3,'0000-00-00',51,5,'0503',1,0),(19,1,'2017-04-26',29,5,'0600',1,0),(21,1,'2017-03-23',120000,12,'0605',1,0),(22,1,'2017-05-03',2147483647,30,'0600',1,0),(23,5,'0000-00-00',300000,5,'0601',1,0),(27,1,'1970-01-01',0,0,'',0,1),(28,1,'2017-05-08',100,4,'0602',1,1),(29,1,'2017-05-09',100,4,'0500',1,1),(30,1,'1970-01-01',3000,0,'',1,1),(31,1,'1970-01-01',0,0,'',0,1),(48,1,'2017-05-08',400000,4,'0600',1,1),(49,3,'2017-05-08',400000,5,'0503',3,3),(51,1,'2017-05-11',50000,6,'0600',1,1),(54,1,'2017-05-08',50000,5,'0600',2,1),(55,1,'2017-05-09',0,3,'0500',1,1),(76,1,'2017-05-09',500000,4,'0600',1,1),(77,3,'2017-05-09',500000,3,'1100',1,4),(78,3,'2017-05-09',500000,3,'1100',1,4),(81,1,'2017-05-09',5,4,'0600',1,1),(82,3,'2017-05-09',4000,4,'1299',1,4),(83,3,'2017-05-09',1000000000,5,'0600',1,5),(84,1,'2017-05-09',1000000,5,'0600',1,1),(85,5,'2017-05-09',500000,5,'0600',1,1),(87,2,'2017-05-09',500000,15,'0600',2,1),(89,2,'2017-05-09',1000000,5,'0500',2,1),(116,1,'2017-05-19',10000,4,'0600',1,1),(117,3,'1970-01-01',0,0,'1100',1,1);
/*!40000 ALTER TABLE `sima_aset_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_barang_mt`
--

DROP TABLE IF EXISTS `sima_barang_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_barang_mt` (
  `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ASET` int(11) NOT NULL,
  `V_KODE_BARANG` varchar(15) NOT NULL,
  `V_NAMA_BARANG` varchar(100) NOT NULL,
  `V_NAMA_GAMBAR` varchar(150) DEFAULT NULL,
  `V_MERK_SUPPLIER` varchar(100) NOT NULL,
  `V_SUPPLIER` varchar(100) NOT NULL,
  `V_KETERANGAN` varchar(500) DEFAULT NULL,
  `N_STATUS_ASET` INT(1) NOT NULL,
  `N_STATUS_PAKAI` INT(1) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  PRIMARY KEY (`ID_BARANG`),
  UNIQUE KEY `ID_ASET` (`ID_ASET`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`),
  CONSTRAINT `BARANG_IBFK_1` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  CONSTRAINT `sima_barang_mt_ibfk_1` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_barang_mt`
--

LOCK TABLES `sima_barang_mt` WRITE;
/*!40000 ALTER TABLE `sima_barang_mt` DISABLE KEYS */;
INSERT INTO `sima_barang_mt` VALUES (1,11,'042017030000001','Meja kuliah 1/2 biro','/SIBUT/images/barang/mejakuliahsetengahbiro.jpg','Chitose','PT. Chitose Indonesia','Ada lubang untuk kabel listriknya','','',1),(2,12,'042017030000002','Kursi kuliah busa biru','/SIBUT/images/barang/kursikuliahbusabiu.jpg','Chitose','PT. Chitose Indonesia','','','',1),(3,13,'062017030000003','Speaker (sepasang) X9983','/SIBUT/images/barang/SpeakerX9983.jpg','JBL','PT. SonSon','','','',2),(4,14,'072017030000005','PC i5 RAM 4GB (Teknik)','/SIBUT/images/barang/PCi5RAM4GB(Teknik).jpg','Acer','PT. Sidola','','','',1),(5,16,'031970010000001','Melinda Nur Abianti','/SIBUT/images/barang/031970010000001.png','Chitose','hehee','sdfdkljfa','\0','',1),(6,18,'032017040000001','Barang3','/SIBUT/images/barang/032017040000001.jpg','Chitose','chitose','baru','','\0',1),(7,23,'052017050000001','Speaker Aktif','/SIBUT/images/barang/052017050000001.jpg','JBL','asd','asd','','',1),(8,49,'032017050000000','bgd','images/barang/032017050000000.jpg','Chitose','chi','hehe','','\0',1),(10,77,'032017050000001','hehehe',NULL,'chiro','unpa','barang1barang1','','',1),(11,78,'032017050000002','hehehe',NULL,'chiro','unpa','barang1barang1','','',1),(13,82,'032017050000003','TESTING BARANG COY',NULL,'hehehe','huh','ha','','',1),(14,83,'032017050000004','BarangABCDEF','images/barang/032017050000004.png','Chitose','chitose','zjdzdjsdjlzdz','','',1),(15,85,'052017050000005','9102- AC 1',NULL,'chitose','chitose','ini AC','','',1),(16,117,'031970010000001','barang hari jumat',NULL,'dlkmas','dlkms','kmld','','',1);
/*!40000 ALTER TABLE `sima_barang_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_detil_peminjaman_dt`
--

DROP TABLE IF EXISTS `sima_detil_peminjaman_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_detil_peminjaman_dt` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_ASET` int(11) NOT NULL,
  PRIMARY KEY (`ID_PEMINJAMAN`,`ID_ASET`),
  KEY `fk_DETIL_PEMINJAMAN_DT_ASET_MT1_idx` (`ID_ASET`),
  CONSTRAINT `FK_DETIL_PEMINJAMAN_DT_2` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  CONSTRAINT `sima_detil_peminjaman_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_detil_peminjaman_dt`
--

LOCK TABLES `sima_detil_peminjaman_dt` WRITE;
/*!40000 ALTER TABLE `sima_detil_peminjaman_dt` DISABLE KEYS */;
INSERT INTO `sima_detil_peminjaman_dt` VALUES (42,4);
/*!40000 ALTER TABLE `sima_detil_peminjaman_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_detil_peminjaman_kategori_spesifik_dt`
--

DROP TABLE IF EXISTS `sima_detil_peminjaman_kategori_spesifik_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_detil_peminjaman_kategori_spesifik_dt` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  `N_KUANTITAS_DIMINTA` int(11) NOT NULL,
  `N_KUANTITAS_TERSEDIA` int(11) NOT NULL,
  KEY `ID_PEMINJAMAN` (`ID_PEMINJAMAN`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`),
  CONSTRAINT `sima_detil_peminjaman_kategori_spesifik_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`),
  CONSTRAINT `sima_detil_peminjaman_kategori_spesifik_dt_ibfk_2` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_detil_peminjaman_kategori_spesifik_dt`
--

LOCK TABLES `sima_detil_peminjaman_kategori_spesifik_dt` WRITE;
/*!40000 ALTER TABLE `sima_detil_peminjaman_kategori_spesifik_dt` DISABLE KEYS */;
INSERT INTO `sima_detil_peminjaman_kategori_spesifik_dt` VALUES (41,1,10,2),(42,1,20,7),(42,2,2,7);
/*!40000 ALTER TABLE `sima_detil_peminjaman_kategori_spesifik_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_detil_peminjaman_perlengkapan_dt`
--

DROP TABLE IF EXISTS `sima_detil_peminjaman_perlengkapan_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_detil_peminjaman_perlengkapan_dt` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_PERLENGKAPAN` int(11) NOT NULL,
  `N_KUANTITAS_DIMINTA` int(11) NOT NULL,
  `N_KUANTITAS_TERSEDIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PEMINJAMAN`,`ID_PERLENGKAPAN`),
  KEY `PERLENGKAPAN_MT_ID` (`ID_PERLENGKAPAN`),
  CONSTRAINT `sima_detil_peminjaman_perlengkapan_dt_ibfk_1` FOREIGN KEY (`ID_PERLENGKAPAN`) REFERENCES `sima_perlengkapan_mt` (`ID_PERLENGKAPAN`),
  CONSTRAINT `sima_detil_peminjaman_perlengkapan_dt_ibfk_2` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_detil_peminjaman_perlengkapan_dt`
--

LOCK TABLES `sima_detil_peminjaman_perlengkapan_dt` WRITE;
/*!40000 ALTER TABLE `sima_detil_peminjaman_perlengkapan_dt` DISABLE KEYS */;
INSERT INTO `sima_detil_peminjaman_perlengkapan_dt` VALUES (39,1,10,NULL),(41,1,10,5);
/*!40000 ALTER TABLE `sima_detil_peminjaman_perlengkapan_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_fasilitas_glr_dt`
--

DROP TABLE IF EXISTS `sima_fasilitas_glr_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_fasilitas_glr_dt` (
  `ID_GLR` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  KEY `ID_GLR` (`ID_GLR`),
  KEY `ID_BARANG` (`ID_BARANG`),
  CONSTRAINT `FASILITAS_GLR_DT_IBFK_1` FOREIGN KEY (`ID_GLR`) REFERENCES `sima_glr_mt` (`ID_GLR`),
  CONSTRAINT `FASILITAS_GLR_DT_IBFK_2` FOREIGN KEY (`ID_BARANG`) REFERENCES `sima_barang_mt` (`ID_BARANG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_fasilitas_glr_dt`
--

LOCK TABLES `sima_fasilitas_glr_dt` WRITE;
/*!40000 ALTER TABLE `sima_fasilitas_glr_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `sima_fasilitas_glr_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_glr_mt`
--

DROP TABLE IF EXISTS `sima_glr_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_glr_mt` (
  `ID_GLR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ASET` int(11) NOT NULL,
  `PARENT_ID` int(11) DEFAULT NULL,
  `V_KODE_GLR` varchar(8) NOT NULL,
  `V_NAMA_GLR` varchar(200) NOT NULL,
  `V_NAMA_GAMBAR` varchar(250) DEFAULT NULL,
  `N_DAYA_TAMPUNG` int(11) DEFAULT NULL,
  `N_DIM_TINGGI` int(11) NOT NULL,
  `N_DIM_PANJANG` int(11) NOT NULL,
  `N_DIM_LEBAR` int(11) NOT NULL,
  `V_WARNA_DINDING` varchar(100) NOT NULL,
  `N_JUMLAH_LANTAI` int(11) NOT NULL,
  `N_STATUS_PINJAM` INT(1) NOT NULL,
  PRIMARY KEY (`ID_GLR`),
  UNIQUE KEY `ID_ASET` (`ID_ASET`),
  KEY `PARENT_ID` (`PARENT_ID`),
  CONSTRAINT `GLR_MT_IBFK_2` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  CONSTRAINT `sima_glr_mt_ibfk_1` FOREIGN KEY (`PARENT_ID`) REFERENCES `sima_glr_mt` (`ID_GLR`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_glr_mt`
--

LOCK TABLES `sima_glr_mt` WRITE;
/*!40000 ALTER TABLE `sima_glr_mt` DISABLE KEYS */;
INSERT INTO `sima_glr_mt` VALUES (1,3,NULL,'01000000','Gedung 0 (Rektorat)','/SIBUT/images/GLR/gedung0.jpg',0,14,50,20,'Abu-abu',4,'\0'),(2,4,1,'01010000','Lantai Cantik','images/GLR/01010000.jpg',100,3,50,20,'rgba(0,0,0,1)',4,''),(3,5,1,'01020000','Lantai 2 Gedung 0 (Rektorat)','images/GLR/01020000.jpg',0,3,30,20,'rgba(0,0,0,1)',1,''),(4,6,1,'01030000','Lantai 3 Gedung 0 (Rektorat)','/SIBUT/images/GLR/gedung0lantai3.jpg',0,3,30,20,'Abu-abu',1,'\0'),(5,9,4,'01030100','Ruang Rapat BTI','images/GLR/01030100.jpg',20,3,25,5,'rgba(0,0,0,1)',1,''),(6,10,5,'01030101','Ruang Rapat BTI Gedung 0 (Rektorat)','images/GLR/01030101.jpg',15,3,8,4,'rgba(0,0,0,1)',1,''),(7,17,NULL,'02000000','Gedung 123','images/GLR/02000000.jpg',12,12,12,12,'#b78888',4,''),(8,19,NULL,'03000000','gedung2','images/GLR/03000000.jpg',12,12,12,12,'#ad3434',5,'\0'),(9,21,NULL,'04000000','Gedung Rektorat','images/GLR/04000000.jpg',12,2,12,12,'#f2cd84',4,'\0'),(10,22,9,'04020000','Lantai 1 Gedung Rektorat','images/GLR/04020000.jpg',500,2,30,20,'#f9fac9',1,'\0'),(13,48,NULL,'020000','gedung 567','images/GLR/0200002.jpg',0,6,3,4,'#f20101',7,'\0'),(14,51,NULL,'020000','abcdef','images/GLR/0200003.jpg',0,6,4,5,'#ed3a3a',6,'\0'),(17,54,NULL,'020000','gedung ckckckck','images/GLR/0200005.jpg',0,7,4,5,'#f21e1e',8,'\0'),(18,55,NULL,'030000','DSS','images/GLR/030000.jpg',0,3,3,3,'#ed2b2b',3,'\0'),(25,76,NULL,'030000','gedunghmm','images/GLR/0300006.jpg',0,5,5,5,'#f61818',5,'\0'),(27,81,NULL,'030000','GEDUNG INI COBACOBA YA','images/GLR/0300008.jpg',0,6,6,6,'#e21f1f',6,'\0'),(28,84,2,'01010000','Ruang 9102','images/GLR/01010000.png',100,1,1,1,'#ecabab',1,'\0'),(29,116,NULL,'030000','Barang234','images/GLR/0300001.png',0,1,1,1,'#f43232',1,'\0');
/*!40000 ALTER TABLE `sima_glr_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_kategori_mt`
--

DROP TABLE IF EXISTS `sima_kategori_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_kategori_mt` (
  `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_KATEGORI` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_kategori_mt`
--

LOCK TABLES `sima_kategori_mt` WRITE;
/*!40000 ALTER TABLE `sima_kategori_mt` DISABLE KEYS */;
INSERT INTO `sima_kategori_mt` VALUES (1,'Lahan/Bangunan/Gedung'),(2,'Kendaraan'),(3,'Perabot/Peralatan'),(4,'Mesin'),(5,'Elektronik'),(6,'Peralatan Komputer'),(7,'Software'),(8,'Alat Teknis Pendidikan'),(9,'Aset Tak Berwujud'),(99,'Lain-lain'),(100,'ATK'),(101,''),(102,'');
/*!40000 ALTER TABLE `sima_kategori_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_kategori_spesifik_mt`
--

DROP TABLE IF EXISTS `sima_kategori_spesifik_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_kategori_spesifik_mt` (
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_KATEGORI_SPESIFIK` varchar(500) NOT NULL,
  `N_STOK` int(11) NOT NULL,
  `N_STATUS` INT(1) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_kategori_spesifik_mt`
--

LOCK TABLES `sima_kategori_spesifik_mt` WRITE;
/*!40000 ALTER TABLE `sima_kategori_spesifik_mt` DISABLE KEYS */;
INSERT INTO `sima_kategori_spesifik_mt` VALUES (1,'Kursi Murah',100,''),(2,'Barang Murah',10,'\0'),(3,'',0,'\0');
/*!40000 ALTER TABLE `sima_kategori_spesifik_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_kendaraan_mt`
--

DROP TABLE IF EXISTS `sima_kendaraan_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_kendaraan_mt` (
  `ID_KENDARAAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ASET` int(11) NOT NULL,
  `V_NO_MESIN` varchar(150) NOT NULL,
  `V_NO_RANGKA` varchar(11) NOT NULL,
  `V_TIPE_KENDARAAN` varchar(9) NOT NULL,
  `N_TAHUN_MODEL` int(15) NOT NULL,
  `N_KAPASITAS_PENUMPANG` int(11) NOT NULL,
  `N_KAPASITAS_MESIN` int(11) NOT NULL,
  `V_NOMOR_BPKB` varchar(500) NOT NULL,
  `V_BAHAN_BAKAR` varchar(500) NOT NULL,
  `V_NO_POLISI` varchar(10) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  PRIMARY KEY (`ID_KENDARAAN`),
  UNIQUE KEY `ID_ASET` (`ID_ASET`),
  UNIQUE KEY `V_NO_POLISI` (`V_NO_POLISI`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`),
  CONSTRAINT `KENDARAAN_IBFK_1` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  CONSTRAINT `sima_kendaraan_mt_ibfk_1` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_kendaraan_mt`
--

LOCK TABLES `sima_kendaraan_mt` WRITE;
/*!40000 ALTER TABLE `sima_kendaraan_mt` DISABLE KEYS */;
INSERT INTO `sima_kendaraan_mt` VALUES (2,87,'D9482098420948203JDA','D9482098420','Avanza',3,5,7,'D948209842094820','Pertamax','D1945RI',1),(4,89,'9832D8JODISH','89EU2IODJDS','Avanza',2019,4,400,'BIWO82382HDJ','Pertamax','D1955RI',1);
/*!40000 ALTER TABLE `sima_kendaraan_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_lokasi_mt`
--

DROP TABLE IF EXISTS `sima_lokasi_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_lokasi_mt` (
  `ID_LOKASI` int(11) NOT NULL AUTO_INCREMENT,
  `V_ALAMAT_LOKASI` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_LOKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_lokasi_mt`
--

LOCK TABLES `sima_lokasi_mt` WRITE;
/*!40000 ALTER TABLE `sima_lokasi_mt` DISABLE KEYS */;
INSERT INTO `sima_lokasi_mt` VALUES (1,'Jl. Ciumbuleuit No. 94 Bandung'),(2,'Jl. Merdeka No. 30 Bandung'),(3,'Jl. Nias No. 2 Bandung'),(4,'Jl. Aceh No. 51 Bandung'),(5,'Jl. Sarijadi Blok 1 Nomor 1'),(6,'Jl. Ujung Berung No. 10 Bandung'),(7,''),(8,'');
/*!40000 ALTER TABLE `sima_lokasi_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_pegawai_luar_bertugas_dt`
--

DROP TABLE IF EXISTS `sima_pegawai_luar_bertugas_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_pegawai_luar_bertugas_dt` (
  `ID_PEGAWAI_LUAR_BERTUGAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `V_NAMA` varchar(45) NOT NULL,
  `V_EMAIL` varchar(45) DEFAULT NULL,
  `V_NO_TELP` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_PEGAWAI_LUAR_BERTUGAS`),
  KEY `fk_PEGAWAI_LUAR_BERTUGAS_DT_PEMINJAMAN_MT1_idx` (`ID_PEMINJAMAN`),
  CONSTRAINT `sima_pegawai_luar_bertugas_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_pegawai_luar_bertugas_dt`
--

LOCK TABLES `sima_pegawai_luar_bertugas_dt` WRITE;
/*!40000 ALTER TABLE `sima_pegawai_luar_bertugas_dt` DISABLE KEYS */;
INSERT INTO `sima_pegawai_luar_bertugas_dt` VALUES (1,15,'acel','acel@mail.com','0878227140178'),(2,20,'Denny darko','den@gmail.com','9347282'),(3,34,'Melinda Nur Abianti','melindanurabianti@gmail.com','085956006685');
/*!40000 ALTER TABLE `sima_pegawai_luar_bertugas_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_pegawai_unpar_bertugas_dt`
--

DROP TABLE IF EXISTS `sima_pegawai_unpar_bertugas_dt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_pegawai_unpar_bertugas_dt` (
  `V_NO_PEG` char(10) NOT NULL,
  `ID_PEMINJAMAN` int(11) NOT NULL,
  PRIMARY KEY (`V_NO_PEG`,`ID_PEMINJAMAN`),
  KEY `fk_PEGAWAI_UNPAR_BERTUGAS_DT_PEMINJAMAN_MT_idx` (`ID_PEMINJAMAN`),
  CONSTRAINT `FK_PEGAWAI_UNPAR_BERTUGAS_DT` FOREIGN KEY (`V_NO_PEG`) REFERENCES `simpeg_mt_induk_peg` (`V_NO_PEG`) ON UPDATE CASCADE,
  CONSTRAINT `sima_pegawai_unpar_bertugas_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_pegawai_unpar_bertugas_dt`
--

LOCK TABLES `sima_pegawai_unpar_bertugas_dt` WRITE;
/*!40000 ALTER TABLE `sima_pegawai_unpar_bertugas_dt` DISABLE KEYS */;
INSERT INTO `sima_pegawai_unpar_bertugas_dt` VALUES ('2017170042',15),('2017170042',20),('2017170042',34);
/*!40000 ALTER TABLE `sima_pegawai_unpar_bertugas_dt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_peminjaman_tr`
--

DROP TABLE IF EXISTS `sima_peminjaman_tr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_peminjaman_tr` (
  `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT,
  `V_KODE_PEMOHON_UNIT` char(10) DEFAULT NULL,
  `V_KODE_UNIT_PEMOHON` char(4) NOT NULL,
  `V_NAMA_ACARA` varchar(45) NOT NULL,
  `V_TEMPAT_KEGIATAN` varchar(45) DEFAULT NULL,
  `N_JENIS_ACARA` INT(1) NOT NULL,
  `V_PATH_SURAT_ACARA` varchar(45) NOT NULL,
  `V_NOMOR_SURAT` varchar(100) NOT NULL,
  `N_STATUS_PEMINJAMAN` int(11) NOT NULL,
  `V_KODE_PENANGGUNG_JAWAB_UNIT` char(10) DEFAULT NULL,
  `DT_WAKTU_MULAI_ACARA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DT_WAKTU_SELESAI_ACARA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DT_WAKTU_MULAI_PINJAM` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `V_KODE_PEMOHON_MAHASISWA` char(10) DEFAULT NULL,
  `V_KODE_PENANGGUNG_JAWAB_MAHASISWA` char(10) DEFAULT NULL,
  `DT_WAKTU_SELESAI_PINJAM` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DT_WAKTU_PESAN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DT_WAKTU_KEMBALI_SEBENARNYA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `N_NOMOR_REVISI` int(11) DEFAULT NULL,
  `DT_REVISI_TIMESTAMP` datetime DEFAULT NULL,
  `DT_WAKTU_EXPIRE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PEMINJAMAN`),
  KEY `fk_PEMINJAMAN_MT_GLB_MT_UNIT1_idx` (`V_KODE_UNIT_PEMOHON`),
  KEY `fk_PEMINJAMAN_MT_AKDADM_MHS_MT.idx` (`V_KODE_PEMOHON_UNIT`),
  KEY `fk_PEMINJAMAN_MT_SIMPEG_MT_INDUK_PEG` (`V_KODE_PEMOHON_UNIT`),
  KEY `fk_PEMINJAMAN_MT__idx` (`V_KODE_PENANGGUNG_JAWAB_UNIT`),
  KEY `V_KODE_PEMOHON_MAHASISWA` (`V_KODE_PEMOHON_MAHASISWA`),
  KEY `V_KODE_PENANGGUNG_JAWAB_MAHASISWA` (`V_KODE_PENANGGUNG_JAWAB_MAHASISWA`),
  CONSTRAINT `fk_PEMINJAMAN_MT_1` FOREIGN KEY (`V_KODE_PEMOHON_MAHASISWA`) REFERENCES `akdadm_mt_mhs` (`V_NPM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEMINJAMAN_MT_2` FOREIGN KEY (`V_KODE_PEMOHON_UNIT`) REFERENCES `simpeg_mt_induk_peg` (`V_NO_PEG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEMINJAMAN_MT_4` FOREIGN KEY (`V_KODE_PENANGGUNG_JAWAB_MAHASISWA`) REFERENCES `akdadm_mt_mhs` (`V_NPM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEMINJAMAN_MT_5` FOREIGN KEY (`V_KODE_PENANGGUNG_JAWAB_UNIT`) REFERENCES `simpeg_mt_induk_peg` (`V_NO_PEG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_peminjaman_tr`
--

LOCK TABLES `sima_peminjaman_tr` WRITE;
/*!40000 ALTER TABLE `sima_peminjaman_tr` DISABLE KEYS */;
INSERT INTO `sima_peminjaman_tr` VALUES (1,NULL,'1','i-Nite','Bumi Sangkuriang','','images/Surat/i-Nite4.jpg','',1,NULL,'2017-05-25 11:45:07','2017-05-25 11:45:07','2017-05-25 00:00:05','2014730012','2014730012','2017-05-25 00:00:05','2017-05-25 00:00:05','2017-05-25 11:45:07',NULL,NULL,NULL),(15,NULL,'1','Funday','SC Ekonomi','','images/Surat/Funday12.jpg','',0,NULL,'2017-05-25 12:02:22','2017-05-25 12:02:22','2017-05-25 00:00:05','2014730012','2014730012','2017-05-25 00:00:05','2017-05-25 00:00:05','2017-05-25 12:02:22',NULL,NULL,NULL),(16,NULL,'1','Tutor','103','','Surat/Tutor.pdf','',1,NULL,'2017-05-28 15:09:15','2017-05-28 15:09:15','2017-05-28 00:00:05','2014730012','2014730012','2017-05-28 00:00:05','2017-05-28 00:00:05','2017-05-28 15:09:15',NULL,NULL,NULL),(17,NULL,'1','Tutoring','UNPAR','','Surat/Tutoring.pdf','',1,NULL,'2017-05-29 19:11:33','2017-05-29 19:11:33','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 19:11:33',NULL,NULL,NULL),(18,NULL,'1','Seminar','UNPAR','','Surat/Seminar.pdf','',1,NULL,'2017-05-29 19:14:06','2017-05-29 19:14:06','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 19:14:06',NULL,NULL,NULL),(19,NULL,'1','Coba','UNPAR','','Surat/Coba.pdf','',2,NULL,'2017-05-29 19:21:41','2017-05-29 19:21:41','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 19:21:41',NULL,NULL,NULL),(20,NULL,'1','A','UNPAR','','Surat/A.pdf','',4,NULL,'2017-05-29 19:23:01','2017-05-29 19:23:01','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 19:23:01',NULL,NULL,NULL),(21,NULL,'1','abc','abc','','Surat/abc.pdf','',4,NULL,'2017-05-29 20:59:40','2017-05-29 20:59:40','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 20:59:40',NULL,NULL,NULL),(26,NULL,'1','abcd','abc','','Surat/abcd5.pdf','',4,NULL,'2017-05-29 21:05:02','2017-05-29 21:05:02','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 21:05:02',NULL,NULL,NULL),(27,NULL,'1','a','abc','','Surat/a1.pdf','',4,NULL,'2017-05-29 21:58:35','2017-05-29 21:58:35','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 21:58:35',NULL,NULL,NULL),(28,NULL,'1','b','a','','Surat/b.pdf','',4,NULL,'2017-05-29 22:04:21','2017-05-29 22:04:21','2017-05-29 00:00:05','2014730012','2014730012','2017-05-29 00:00:05','2017-05-29 00:00:05','2017-05-29 22:04:21',NULL,NULL,NULL),(29,NULL,'1','abcd','abcd','','Surat/abc.pdf','',2,NULL,'2017-06-08 20:05:10','2017-06-08 20:05:10','2017-06-08 00:00:06','2014730012','2014730012','2017-06-08 00:00:06','2017-06-08 00:00:06','2017-06-08 20:05:10',NULL,NULL,NULL),(30,NULL,'0500','Rapat Tahunan','UNPAR','','Surat/Rapat_Tahunan.pdf','',1,NULL,'2017-06-09 08:43:46','2017-06-09 08:43:46','2017-06-09 09:00:06',NULL,NULL,'2017-06-09 12:00:06','2017-06-09 09:00:06','2017-06-09 08:43:46',NULL,NULL,NULL),(31,NULL,'0500','abc','','','Surat/abc.pdf','',1,NULL,'2017-06-09 08:47:29','2017-06-09 08:47:29','2017-06-09 00:00:06',NULL,NULL,'2017-06-09 00:00:06','2017-06-09 00:00:06','2017-06-09 08:47:29',NULL,NULL,NULL),(33,'2017170042','0500','zzzzzzzzzz','','\0','Surat/zzzzzzzzzz.pdf','',1,'2017170042','2017-06-09 08:54:24','2017-06-09 08:54:24','2017-06-09 00:00:06',NULL,NULL,'2017-06-09 00:00:06','2017-06-09 00:00:06','2017-06-09 08:54:24',NULL,NULL,NULL),(34,'2017170042','0500','Kegiatan Lomba Pacuan Kuda 2 ','Bandung ','\0','Surat/Kegiatan_Lomba_Pacuan_Kuda.pdf','',4,'2017170042','2017-06-09 10:38:37','2017-06-09 10:38:37','2017-06-10 10:00:06',NULL,NULL,'2017-06-10 14:00:06','2017-06-10 10:00:06','2017-06-09 10:38:37',NULL,NULL,NULL),(35,'2017170042','0500','abcdef','asdadas','\0','Surat/abcdef1.pdf','',2,'2017170042','2017-06-10 10:39:53','2017-06-10 10:39:53','2017-06-10 00:00:06',NULL,NULL,'2017-06-10 00:00:06','2017-06-10 00:00:06','2017-06-10 10:39:53',NULL,NULL,NULL),(36,NULL,'1','masasiherror','unpar','','Surat/masasiherror.pdf','',3,NULL,'2017-06-10 10:41:41','2017-06-10 10:41:41','2017-06-10 00:00:06','2014730012','2014730012','2017-06-10 00:00:06','2017-06-10 00:00:06','2017-06-10 10:41:41',NULL,NULL,NULL),(37,NULL,'1','udahbener','unpar','','Surat/udahbener.pdf','',3,NULL,'2017-06-10 10:55:25','2017-06-10 10:55:25','2017-06-10 00:00:06','2014730012','2014730012','2017-06-10 00:00:06','2017-06-10 00:00:06','2017-06-10 10:55:25',NULL,NULL,NULL),(38,NULL,'1','cobalagi','bandung','','Surat/cobalagi.pdf','',3,NULL,'2017-06-10 11:02:12','2017-06-10 11:02:12','2017-06-10 00:00:06','2014730012','2014730012','2017-06-10 00:00:06','2017-06-10 00:00:06','2017-06-10 11:02:12',NULL,NULL,NULL),(39,NULL,'1','abdebaper','','','Surat/abdebaper1.pdf','',1,NULL,'2017-06-11 13:53:32','2017-06-11 13:53:32','2017-06-11 00:00:06','2014730012','2014730012','2017-06-11 00:00:06','2017-06-11 00:00:06','2017-06-11 13:53:32',NULL,NULL,NULL),(41,NULL,'0500','abdebaper','','','Surat/abdebaper3.pdf','1',1,NULL,'2017-06-11 13:55:47','2017-06-11 13:55:47','2017-06-11 00:00:06',NULL,NULL,'2017-06-11 00:00:06','2017-06-11 00:00:06','2017-06-11 13:55:47',NULL,NULL,NULL),(42,'2017170042','0500','tesunit','','\0','Surat/tesunit.pdf','',1,'2017170042','2017-06-11 14:01:25','2017-06-11 14:01:25','2017-06-11 00:00:06',NULL,NULL,'2017-06-11 00:00:06','2017-06-11 00:00:06','2017-06-11 14:01:25',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sima_peminjaman_tr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_perlengkapan_mt`
--

DROP TABLE IF EXISTS `sima_perlengkapan_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_perlengkapan_mt` (
  `ID_PERLENGKAPAN` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_PERLENGKAPAN` varchar(200) NOT NULL,
  `N_STOK` int(11) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERLENGKAPAN`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`),
  CONSTRAINT `sima_perlengkapan_mt_ibfk_1` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_perlengkapan_mt`
--

LOCK TABLES `sima_perlengkapan_mt` WRITE;
/*!40000 ALTER TABLE `sima_perlengkapan_mt` DISABLE KEYS */;
INSERT INTO `sima_perlengkapan_mt` VALUES (1,'Kursi Baru',241,1),(2,'Meja Murah Meriah',380,1),(3,'Chitose Kursi hahaha',100,1);
/*!40000 ALTER TABLE `sima_perlengkapan_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_tabel_acuan_mt`
--

DROP TABLE IF EXISTS `sima_tabel_acuan_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_tabel_acuan_mt` (
  `ID_ACUAN` int(11) NOT NULL AUTO_INCREMENT,
  `V_JENIS_ACUAN` varchar(50) NOT NULL,
  `V_NILAI_ACUAN` varchar(5) NOT NULL,
  `V_LABEL_ACUAN` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ACUAN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_tabel_acuan_mt`
--

LOCK TABLES `sima_tabel_acuan_mt` WRITE;
/*!40000 ALTER TABLE `sima_tabel_acuan_mt` DISABLE KEYS */;
INSERT INTO `sima_tabel_acuan_mt` VALUES (1,'jenis_glr','1','Gedung'),(2,'jenis_glr','2','Lantai'),(3,'jenis_glr','3','Ruang'),(4,'jenis_glr','4','Sub Ruang'),(5,'kondisi_aset','R','Rusak'),(6,'kondisi_aset','NT','Tidak Terawat'),(7,'kondisi_aset','T','Terawat');
/*!40000 ALTER TABLE `sima_tabel_acuan_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sima_template_surat_mt`
--

DROP TABLE IF EXISTS `sima_template_surat_mt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sima_template_surat_mt` (
  `ID_TEMPLATE` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_TEMPLATE` varchar(45) NOT NULL,
  `V_ISI_TEMPLATE` text,
  `N_JENIS_ACARA` INT(1) NOT NULL,
  PRIMARY KEY (`ID_TEMPLATE`),
  UNIQUE KEY `V_NAMA_TEMPLATE_UNIQUE` (`V_NAMA_TEMPLATE`),
  UNIQUE KEY `N_JENIS_ACARA_UNIQUE` (`N_JENIS_ACARA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sima_template_surat_mt`
--

LOCK TABLES `sima_template_surat_mt` WRITE;
/*!40000 ALTER TABLE `sima_template_surat_mt` DISABLE KEYS */;
/*!40000 ALTER TABLE `sima_template_surat_mt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `simpeg_mt_induk_peg`
--

DROP TABLE IF EXISTS `simpeg_mt_induk_peg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `simpeg_mt_induk_peg` (
  `V_NO_PEG` char(10) NOT NULL,
  `V_NAMA_PEG` varchar(200) DEFAULT NULL,
  `V_KODE_UNIT` char(4) DEFAULT NULL,
  `V_NAMA_UNIT` varchar(100) DEFAULT NULL,
  `V_EMAIL` varchar(100) DEFAULT NULL,
  `V_TELP_HP` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`V_NO_PEG`),
  KEY `fk_SIMPEG_MT_INDUK_PEG_GLB_MT_UNIT_idx` (`V_KODE_UNIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simpeg_mt_induk_peg`
--

LOCK TABLES `simpeg_mt_induk_peg` WRITE;
/*!40000 ALTER TABLE `simpeg_mt_induk_peg` DISABLE KEYS */;
INSERT INTO `simpeg_mt_induk_peg` VALUES ('2017170042','Testing','0500','Biro Teknologi dan Informasi','hehehe@gmail.com','085956006685');
/*!40000 ALTER TABLE `simpeg_mt_induk_peg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_sima_acuan_jenis_glr`
--

DROP TABLE IF EXISTS `vw_sima_acuan_jenis_glr`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_acuan_jenis_glr`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_acuan_jenis_glr` AS SELECT 
 1 AS `ID_ACUAN`,
 1 AS `V_JENIS_ACUAN`,
 1 AS `V_NILAI_ACUAN`,
 1 AS `V_LABEL_ACUAN_JENIS_GLR`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sima_acuan_kondisi`
--

DROP TABLE IF EXISTS `vw_sima_acuan_kondisi`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_acuan_kondisi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_acuan_kondisi` AS SELECT 
 1 AS `ID_ACUAN`,
 1 AS `V_JENIS_ACUAN`,
 1 AS `V_NILAI_ACUAN`,
 1 AS `V_LABEL_ACUAN_KONDISI_ASET`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sima_barang`
--

DROP TABLE IF EXISTS `vw_sima_barang`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_barang`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_barang` AS SELECT 
 1 AS `ID_BARANG`,
 1 AS `ID_ASET`,
 1 AS `V_KODE_BARANG`,
 1 AS `V_NAMA_BARANG`,
 1 AS `ID_KATEGORI`,
 1 AS `V_NAMA_KATEGORI`,
 1 AS `DT_TANGGAL_PEROLEHAN`,
 1 AS `ASET_LOKASI_ID`,
 1 AS `N_STOK`,
 1 AS `V_ALAMAT_LOKASI`,
 1 AS `N_HARGA_PEROLEHAN`,
 1 AS `N_UMUR_EKONOMIS`,
 1 AS `V_MERK_SUPPLIER`,
 1 AS `V_SUPPLIER`,
 1 AS `V_KODE_GLR`,
 1 AS `V_KETERANGAN`,
 1 AS `ID_ACUAN`,
 1 AS `V_LABEL_ACUAN_KONDISI_ASET`,
 1 AS `N_STATUS_ASET`,
 1 AS `N_STATUS_PAKAI`,
 1 AS `V_NAMA_GAMBAR`,
 1 AS `V_NAMA_UNIT`,
 1 AS `V_KODE_UNIT`,
 1 AS `ID_KATEGORI_SPESIFIK`,
 1 AS `V_NAMA_KATEGORI_SPESIFIK`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sima_glr`
--

DROP TABLE IF EXISTS `vw_sima_glr`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_glr`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_glr` AS SELECT 
 1 AS `ID_GLR`,
 1 AS `V_KODE_GLR`,
 1 AS `V_KODE_PARENT_GLR`,
 1 AS `V_NAMA_PARENT_GLR`,
 1 AS `V_NAMA_GLR`,
 1 AS `V_ALAMAT_LOKASI`,
 1 AS `ID_LOKASI`,
 1 AS `N_DIM_PANJANG`,
 1 AS `N_DIM_TINGGI`,
 1 AS `N_DIM_LEBAR`,
 1 AS `V_WARNA_DINDING`,
 1 AS `N_JUMLAH_LANTAI`,
 1 AS `DT_TANGGAL_PEROLEHAN`,
 1 AS `ASET_KATEGORI_ID`,
 1 AS `ID_ASET`,
 1 AS `N_HARGA_PEROLEHAN`,
 1 AS `N_UMUR_EKONOMIS`,
 1 AS `N_DAYA_TAMPUNG`,
 1 AS `V_LABEL_ACUAN_KONDISI_ASET`,
 1 AS `ID_KONDISI`,
 1 AS `V_LABEL_ACUAN_JENIS_GLR`,
 1 AS `ID_JENIS`,
 1 AS `N_STATUS_PINJAM`,
 1 AS `V_NAMA_GAMBAR`,
 1 AS `V_NAMA_UNIT`,
 1 AS `V_KODE_UNIT`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sima_kendaraan`
--

DROP TABLE IF EXISTS `vw_sima_kendaraan`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_kendaraan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_kendaraan` AS SELECT 
 1 AS `ID_KENDARAAN`,
 1 AS `ID_ASET`,
 1 AS `V_NO_MESIN`,
 1 AS `V_NO_RANGKA`,
 1 AS `V_NO_POLISI`,
 1 AS `DT_TANGGAL_PEROLEHAN`,
 1 AS `N_HARGA_PEROLEHAN`,
 1 AS `ASET_LOKASI_ID`,
 1 AS `V_ALAMAT_LOKASI`,
 1 AS `N_UMUR_EKONOMIS`,
 1 AS `ASET_KATEGORI_ID`,
 1 AS `V_TIPE_KENDARAAN`,
 1 AS `N_TAHUN_MODEL`,
 1 AS `N_KAPASITAS_PENUMPANG`,
 1 AS `N_KAPASITAS_MESIN`,
 1 AS `V_NOMOR_BPKB`,
 1 AS `V_BAHAN_BAKAR`,
 1 AS `ID_ACUAN`,
 1 AS `V_LABEL_ACUAN_KONDISI_ASET`,
 1 AS `V_NAMA_UNIT`,
 1 AS `V_KODE_UNIT`,
 1 AS `ID_KATEGORI_SPESIFIK`,
 1 AS `V_NAMA_KATEGORI_SPESIFIK`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sima_peminjaman`
--

DROP TABLE IF EXISTS `vw_sima_peminjaman`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_peminjaman`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_peminjaman` AS SELECT 
 1 AS `ID_PEMINJAMAN`,
 1 AS `V_KODE_PEMOHON_UNIT`,
 1 AS `V_NAMA_PEMOHON_UNIT`,
 1 AS `V_KODE_UNIT_PEMOHON`,
 1 AS `V_NAMA_ACARA`,
 1 AS `V_TEMPAT_KEGIATAN`,
 1 AS `N_JENIS_ACARA`,
 1 AS `V_PATH_SURAT_ACARA`,
 1 AS `V_NOMOR_SURAT`,
 1 AS `N_STATUS_PEMINJAMAN`,
 1 AS `V_KODE_PENANGGUNG_JAWAB_UNIT`,
 1 AS `V_NAMA_PENANGGUNG_JAWAB_UNIT`,
 1 AS `DT_WAKTU_MULAI_ACARA`,
 1 AS `DT_WAKTU_SELESAI_ACARA`,
 1 AS `DT_WAKTU_MULAI_PINJAM`,
 1 AS `V_KODE_PEMOHON_MAHASISWA`,
 1 AS `V_NAMA_PEMOHON_MAHASISWA`,
 1 AS `V_KODE_PENANGGUNG_JAWAB_MAHASISWA`,
 1 AS `V_NAMA_PENANGGUNG_JAWAB_MAHASISWA`,
 1 AS `DT_WAKTU_SELESAI_PINJAM`,
 1 AS `DT_WAKTU_PESAN`,
 1 AS `DT_WAKTU_KEMBALI_SEBENARNYA`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sima_pemohon`
--

DROP TABLE IF EXISTS `vw_sima_pemohon`;
/*!50001 DROP VIEW IF EXISTS `vw_sima_pemohon`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sima_pemohon` AS SELECT 
 1 AS `V_NO_PEMOHON`,
 1 AS `V_NAMA_PEMOHON`,
 1 AS `V_KODE_PRODI_UNIT_PEMOHON`,
 1 AS `V_NAMA_UNIT_PRODI_PEMOHON`,
 1 AS `V_EMAIL_PEMOHON`,
 1 AS `V_TELP_HP_PEMOHON`,
 1 AS `N_STATUS_PEMOHON`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'skm_sima_but'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_get_stok_kategori_spesifik` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_stok_kategori_spesifik`(
	in tgl_awal datetime,
    in tgl_akhir datetime
)
BEGIN
select 
	sima_kategori_spesifik_mt.ID_KATEGORI_SPESIFIK,
    sima_kategori_spesifik_mt.N_STOK - stok_dipinjam.jumlah_dipinjam as jumlah_tersisa
from sima_kategori_spesifik_mt
join (
	select
		sima_detil_peminjaman_kategori_spesifik_dt.ID_KATEGORI_SPESIFIK,
		sum(sima_detil_peminjaman_kategori_spesifik_dt.N_KUANTITAS_TERSEDIA) as jumlah_dipinjam
	from sima_peminjaman_tr 
	join sima_detil_peminjaman_kategori_spesifik_dt
	on sima_detil_peminjaman_kategori_spesifik_dt.ID_PEMINJAMAN = sima_peminjaman_tr.ID_PEMINJAMAN
    where sima_peminjaman_tr.N_STATUS_PEMINJAMAN >= 3
		and sima_peminjaman_tr.N_STATUS_PEMINJAMAN < 6
		and (
			tgl_awal >= sima_peminjaman_tr.DT_WAKTU_MULAI_PINJAM
            or tgl_akhir <= sima_peminjaman_tr.DT_WAKTU_AKHIR_PINJAM
            or (
				tgl_awal <= sima_peminjaman_tr.DT_WAKTU_MULAI_PINJAM
                and tgl_akhir >= sima_peminjaman_tr.DT_WAKTU_AKHIR_PINJAM
            )
        )
	group by sima_detil_peminjaman_kategori_spesifik_dt.ID_KATEGORI_SPESIFIK
) as stok_dipinjam
on stok_dipinjam.ID_KATEGORI_SPESIFIK = sima_kategori_spesifik_mt.ID_KATEGORI_SPESIFIK;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vw_sima_acuan_jenis_glr`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_acuan_jenis_glr`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_acuan_jenis_glr` AS select `sima_tabel_acuan_mt`.`ID_ACUAN` AS `ID_ACUAN`,`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` AS `V_JENIS_ACUAN`,`sima_tabel_acuan_mt`.`V_NILAI_ACUAN` AS `V_NILAI_ACUAN`,`sima_tabel_acuan_mt`.`V_LABEL_ACUAN` AS `V_LABEL_ACUAN_JENIS_GLR` from `sima_tabel_acuan_mt` where (`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` = 'jenis_glr') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sima_acuan_kondisi`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_acuan_kondisi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_acuan_kondisi` AS select `sima_tabel_acuan_mt`.`ID_ACUAN` AS `ID_ACUAN`,`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` AS `V_JENIS_ACUAN`,`sima_tabel_acuan_mt`.`V_NILAI_ACUAN` AS `V_NILAI_ACUAN`,`sima_tabel_acuan_mt`.`V_LABEL_ACUAN` AS `V_LABEL_ACUAN_KONDISI_ASET` from `sima_tabel_acuan_mt` where (`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` = 'kondisi_aset') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sima_barang`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_barang`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_barang` AS select `sima_barang_mt`.`ID_BARANG` AS `ID_BARANG`,`sima_barang_mt`.`ID_ASET` AS `ID_ASET`,`sima_barang_mt`.`V_KODE_BARANG` AS `V_KODE_BARANG`,`sima_barang_mt`.`V_NAMA_BARANG` AS `V_NAMA_BARANG`,`sima_kategori_mt`.`ID_KATEGORI` AS `ID_KATEGORI`,`sima_kategori_mt`.`V_NAMA_KATEGORI` AS `V_NAMA_KATEGORI`,`sima_aset_mt`.`DT_TANGGAL_PEROLEHAN` AS `DT_TANGGAL_PEROLEHAN`,`sima_aset_mt`.`ASET_LOKASI_ID` AS `ASET_LOKASI_ID`,`sima_aset_mt`.`N_STOK` AS `N_STOK`,`sima_lokasi_mt`.`V_ALAMAT_LOKASI` AS `V_ALAMAT_LOKASI`,`sima_aset_mt`.`N_HARGA_PEROLEHAN` AS `N_HARGA_PEROLEHAN`,`sima_aset_mt`.`N_UMUR_EKONOMIS` AS `N_UMUR_EKONOMIS`,`sima_barang_mt`.`V_MERK_SUPPLIER` AS `V_MERK_SUPPLIER`,`sima_barang_mt`.`V_SUPPLIER` AS `V_SUPPLIER`,`sima_glr_mt`.`V_KODE_GLR` AS `V_KODE_GLR`,`sima_barang_mt`.`V_KETERANGAN` AS `V_KETERANGAN`,`vw_sima_acuan_kondisi`.`ID_ACUAN` AS `ID_ACUAN`,`vw_sima_acuan_kondisi`.`V_LABEL_ACUAN_KONDISI_ASET` AS `V_LABEL_ACUAN_KONDISI_ASET`,`sima_barang_mt`.`N_STATUS_ASET` AS `N_STATUS_ASET`,`sima_barang_mt`.`N_STATUS_PAKAI` AS `N_STATUS_PAKAI`,`sima_barang_mt`.`V_NAMA_GAMBAR` AS `V_NAMA_GAMBAR`,`glb_mt_unit`.`V_NAMA_UNIT` AS `V_NAMA_UNIT`,`glb_mt_unit`.`V_KODE_UNIT` AS `V_KODE_UNIT`,`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` AS `ID_KATEGORI_SPESIFIK`,`sima_kategori_spesifik_mt`.`V_NAMA_KATEGORI_SPESIFIK` AS `V_NAMA_KATEGORI_SPESIFIK` from (((((((((`sima_aset_mt` join `sima_barang_mt` on((`sima_aset_mt`.`ID_ASET` = `sima_barang_mt`.`ID_ASET`))) join `sima_lokasi_mt` on((`sima_aset_mt`.`ASET_LOKASI_ID` = `sima_lokasi_mt`.`ID_LOKASI`))) join `sima_acuan_aset_dt` on((`sima_acuan_aset_dt`.`ID_ASET` = `sima_aset_mt`.`ID_ASET`))) join `vw_sima_acuan_kondisi` on((`vw_sima_acuan_kondisi`.`ID_ACUAN` = `sima_acuan_aset_dt`.`ID_ACUAN`))) join `sima_kategori_mt` on((`sima_aset_mt`.`ASET_KATEGORI_ID` = `sima_kategori_mt`.`ID_KATEGORI`))) join `glb_mt_unit` on((`glb_mt_unit`.`V_KODE_UNIT` = convert(`sima_aset_mt`.`UNIT_PEMILIK_ID` using utf8)))) left join `sima_fasilitas_glr_dt` on((`sima_fasilitas_glr_dt`.`ID_BARANG` = `sima_barang_mt`.`ID_BARANG`))) left join `sima_glr_mt` on((`sima_glr_mt`.`ID_GLR` = `sima_fasilitas_glr_dt`.`ID_GLR`))) join `sima_kategori_spesifik_mt` on((`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` = `sima_barang_mt`.`ID_KATEGORI_SPESIFIK`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sima_glr`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_glr`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_glr` AS select distinct `sima_glr_mt`.`ID_GLR` AS `ID_GLR`,`sima_glr_mt`.`V_KODE_GLR` AS `V_KODE_GLR`,`parent_mt`.`V_KODE_GLR` AS `V_KODE_PARENT_GLR`,`parent_mt`.`V_NAMA_GLR` AS `V_NAMA_PARENT_GLR`,`sima_glr_mt`.`V_NAMA_GLR` AS `V_NAMA_GLR`,`sima_lokasi_mt`.`V_ALAMAT_LOKASI` AS `V_ALAMAT_LOKASI`,`sima_lokasi_mt`.`ID_LOKASI` AS `ID_LOKASI`,`sima_glr_mt`.`N_DIM_PANJANG` AS `N_DIM_PANJANG`,`sima_glr_mt`.`N_DIM_TINGGI` AS `N_DIM_TINGGI`,`sima_glr_mt`.`N_DIM_LEBAR` AS `N_DIM_LEBAR`,`sima_glr_mt`.`V_WARNA_DINDING` AS `V_WARNA_DINDING`,`sima_glr_mt`.`N_JUMLAH_LANTAI` AS `N_JUMLAH_LANTAI`,`sima_aset_mt`.`DT_TANGGAL_PEROLEHAN` AS `DT_TANGGAL_PEROLEHAN`,`sima_aset_mt`.`ASET_KATEGORI_ID` AS `ASET_KATEGORI_ID`,`sima_aset_mt`.`ID_ASET` AS `ID_ASET`,`sima_aset_mt`.`N_HARGA_PEROLEHAN` AS `N_HARGA_PEROLEHAN`,`sima_aset_mt`.`N_UMUR_EKONOMIS` AS `N_UMUR_EKONOMIS`,`sima_glr_mt`.`N_DAYA_TAMPUNG` AS `N_DAYA_TAMPUNG`,`vw_sima_acuan_kondisi`.`V_LABEL_ACUAN_KONDISI_ASET` AS `V_LABEL_ACUAN_KONDISI_ASET`,`vw_sima_acuan_kondisi`.`ID_ACUAN` AS `ID_KONDISI`,`vw_sima_acuan_jenis_glr`.`V_LABEL_ACUAN_JENIS_GLR` AS `V_LABEL_ACUAN_JENIS_GLR`,`vw_sima_acuan_jenis_glr`.`ID_ACUAN` AS `ID_JENIS`,`sima_glr_mt`.`N_STATUS_PINJAM` AS `N_STATUS_PINJAM`,`sima_glr_mt`.`V_NAMA_GAMBAR` AS `V_NAMA_GAMBAR`,`glb_mt_unit`.`V_NAMA_UNIT` AS `V_NAMA_UNIT`,`glb_mt_unit`.`V_KODE_UNIT` AS `V_KODE_UNIT` from ((((((((`sima_aset_mt` join `sima_glr_mt` on((`sima_aset_mt`.`ID_ASET` = `sima_glr_mt`.`ID_ASET`))) join `sima_lokasi_mt` on((`sima_aset_mt`.`ASET_LOKASI_ID` = `sima_lokasi_mt`.`ID_LOKASI`))) join `glb_mt_unit` on((`glb_mt_unit`.`V_KODE_UNIT` = convert(`sima_aset_mt`.`UNIT_PEMILIK_ID` using utf8)))) join `sima_acuan_aset_dt` `a` on((`sima_aset_mt`.`ID_ASET` = `a`.`ID_ASET`))) join `vw_sima_acuan_jenis_glr` on((`vw_sima_acuan_jenis_glr`.`ID_ACUAN` = `a`.`ID_ACUAN`))) join `sima_acuan_aset_dt` `b` on((`sima_aset_mt`.`ID_ASET` = `b`.`ID_ASET`))) join `vw_sima_acuan_kondisi` on((`vw_sima_acuan_kondisi`.`ID_ACUAN` = `b`.`ID_ACUAN`))) left join `sima_glr_mt` `parent_mt` on((`sima_glr_mt`.`PARENT_ID` = `parent_mt`.`ID_GLR`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sima_kendaraan`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_kendaraan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_kendaraan` AS select `sima_kendaraan_mt`.`ID_KENDARAAN` AS `ID_KENDARAAN`,`sima_kendaraan_mt`.`ID_ASET` AS `ID_ASET`,`sima_kendaraan_mt`.`V_NO_MESIN` AS `V_NO_MESIN`,`sima_kendaraan_mt`.`V_NO_RANGKA` AS `V_NO_RANGKA`,`sima_kendaraan_mt`.`V_NO_POLISI` AS `V_NO_POLISI`,`sima_aset_mt`.`DT_TANGGAL_PEROLEHAN` AS `DT_TANGGAL_PEROLEHAN`,`sima_aset_mt`.`N_HARGA_PEROLEHAN` AS `N_HARGA_PEROLEHAN`,`sima_aset_mt`.`ASET_LOKASI_ID` AS `ASET_LOKASI_ID`,`sima_lokasi_mt`.`V_ALAMAT_LOKASI` AS `V_ALAMAT_LOKASI`,`sima_aset_mt`.`N_UMUR_EKONOMIS` AS `N_UMUR_EKONOMIS`,`sima_aset_mt`.`ASET_KATEGORI_ID` AS `ASET_KATEGORI_ID`,`sima_kendaraan_mt`.`V_TIPE_KENDARAAN` AS `V_TIPE_KENDARAAN`,`sima_kendaraan_mt`.`N_TAHUN_MODEL` AS `N_TAHUN_MODEL`,`sima_kendaraan_mt`.`N_KAPASITAS_PENUMPANG` AS `N_KAPASITAS_PENUMPANG`,`sima_kendaraan_mt`.`N_KAPASITAS_MESIN` AS `N_KAPASITAS_MESIN`,`sima_kendaraan_mt`.`V_NOMOR_BPKB` AS `V_NOMOR_BPKB`,`sima_kendaraan_mt`.`V_BAHAN_BAKAR` AS `V_BAHAN_BAKAR`,`vw_sima_acuan_kondisi`.`ID_ACUAN` AS `ID_ACUAN`,`vw_sima_acuan_kondisi`.`V_LABEL_ACUAN_KONDISI_ASET` AS `V_LABEL_ACUAN_KONDISI_ASET`,`glb_mt_unit`.`V_NAMA_UNIT` AS `V_NAMA_UNIT`,`glb_mt_unit`.`V_KODE_UNIT` AS `V_KODE_UNIT`,`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` AS `ID_KATEGORI_SPESIFIK`,`sima_kategori_spesifik_mt`.`V_NAMA_KATEGORI_SPESIFIK` AS `V_NAMA_KATEGORI_SPESIFIK` from ((((((`sima_aset_mt` join `sima_kendaraan_mt` on((`sima_aset_mt`.`ID_ASET` = `sima_kendaraan_mt`.`ID_ASET`))) join `sima_lokasi_mt` on((`sima_aset_mt`.`ASET_LOKASI_ID` = `sima_lokasi_mt`.`ID_LOKASI`))) join `sima_acuan_aset_dt` on((`sima_acuan_aset_dt`.`ID_ASET` = `sima_aset_mt`.`ID_ASET`))) join `vw_sima_acuan_kondisi` on((`vw_sima_acuan_kondisi`.`ID_ACUAN` = `sima_acuan_aset_dt`.`ID_ACUAN`))) join `glb_mt_unit` on((`glb_mt_unit`.`V_KODE_UNIT` = convert(`sima_aset_mt`.`UNIT_PEMILIK_ID` using utf8)))) join `sima_kategori_spesifik_mt` on((`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` = `sima_kendaraan_mt`.`ID_KATEGORI_SPESIFIK`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sima_peminjaman`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_peminjaman`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_peminjaman` AS select `sima_peminjaman_tr`.`ID_PEMINJAMAN` AS `ID_PEMINJAMAN`,`sima_peminjaman_tr`.`V_KODE_PEMOHON_UNIT` AS `V_KODE_PEMOHON_UNIT`,`a`.`V_NAMA_PEG` AS `V_NAMA_PEMOHON_UNIT`,`sima_peminjaman_tr`.`V_KODE_UNIT_PEMOHON` AS `V_KODE_UNIT_PEMOHON`,`sima_peminjaman_tr`.`V_NAMA_ACARA` AS `V_NAMA_ACARA`,`sima_peminjaman_tr`.`V_TEMPAT_KEGIATAN` AS `V_TEMPAT_KEGIATAN`,`sima_peminjaman_tr`.`N_JENIS_ACARA` AS `N_JENIS_ACARA`,`sima_peminjaman_tr`.`V_PATH_SURAT_ACARA` AS `V_PATH_SURAT_ACARA`,`sima_peminjaman_tr`.`V_NOMOR_SURAT` AS `V_NOMOR_SURAT`,`sima_peminjaman_tr`.`N_STATUS_PEMINJAMAN` AS `N_STATUS_PEMINJAMAN`,`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_UNIT` AS `V_KODE_PENANGGUNG_JAWAB_UNIT`,`b`.`V_NAMA_PEG` AS `V_NAMA_PENANGGUNG_JAWAB_UNIT`,`sima_peminjaman_tr`.`DT_WAKTU_MULAI_ACARA` AS `DT_WAKTU_MULAI_ACARA`,`sima_peminjaman_tr`.`DT_WAKTU_SELESAI_ACARA` AS `DT_WAKTU_SELESAI_ACARA`,`sima_peminjaman_tr`.`DT_WAKTU_MULAI_PINJAM` AS `DT_WAKTU_MULAI_PINJAM`,`sima_peminjaman_tr`.`V_KODE_PEMOHON_MAHASISWA` AS `V_KODE_PEMOHON_MAHASISWA`,`c`.`V_NAMA` AS `V_NAMA_PEMOHON_MAHASISWA`,`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_MAHASISWA` AS `V_KODE_PENANGGUNG_JAWAB_MAHASISWA`,`d`.`V_NAMA` AS `V_NAMA_PENANGGUNG_JAWAB_MAHASISWA`,`sima_peminjaman_tr`.`DT_WAKTU_SELESAI_PINJAM` AS `DT_WAKTU_SELESAI_PINJAM`,`sima_peminjaman_tr`.`DT_WAKTU_PESAN` AS `DT_WAKTU_PESAN`,`sima_peminjaman_tr`.`DT_WAKTU_KEMBALI_SEBENARNYA` AS `DT_WAKTU_KEMBALI_SEBENARNYA` from ((((`sima_peminjaman_tr` left join `akdadm_mt_mhs` `c` on((`sima_peminjaman_tr`.`V_KODE_PEMOHON_MAHASISWA` = `c`.`V_NPM`))) left join `simpeg_mt_induk_peg` `a` on((`sima_peminjaman_tr`.`V_KODE_PEMOHON_UNIT` = `a`.`V_NO_PEG`))) left join `akdadm_mt_mhs` `d` on((`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_MAHASISWA` = `d`.`V_NPM`))) left join `simpeg_mt_induk_peg` `b` on((`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_UNIT` = `b`.`V_NO_PEG`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sima_pemohon`
--

/*!50001 DROP VIEW IF EXISTS `vw_sima_pemohon`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sima_pemohon` AS select `akdadm_mt_mhs`.`V_NPM` AS `V_NO_PEMOHON`,`akdadm_mt_mhs`.`V_NAMA` AS `V_NAMA_PEMOHON`,`akdadm_mt_mhs`.`V_KODE_PRODI` AS `V_KODE_PRODI_UNIT_PEMOHON`,`akdadm_mt_mhs`.`V_NAMA_PRODI` AS `V_NAMA_UNIT_PRODI_PEMOHON`,`akdadm_mt_mhs`.`V_EMAIL` AS `V_EMAIL_PEMOHON`,`akdadm_mt_mhs`.`V_TELP_HP` AS `V_TELP_HP_PEMOHON`,1 AS `N_STATUS_PEMOHON` from `akdadm_mt_mhs` union select `simpeg_mt_induk_peg`.`V_NO_PEG` AS `V_NO_PEMOHON`,`simpeg_mt_induk_peg`.`V_NAMA_PEG` AS `V_NAMA_PEMOHON`,`simpeg_mt_induk_peg`.`V_KODE_UNIT` AS `V_KODE_PRODI_UNIT_PEMOHON`,`simpeg_mt_induk_peg`.`V_NAMA_UNIT` AS `V_NAMA_UNIT_PRODI_PEMOHON`,`simpeg_mt_induk_peg`.`V_EMAIL` AS `V_EMAIL_PEMOHON`,`simpeg_mt_induk_peg`.`V_TELP_HP` AS `V_TELP_HP_PEMOHON`,2 AS `N_STATUS_PEMOHON` from `simpeg_mt_induk_peg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-03 19:12:14
