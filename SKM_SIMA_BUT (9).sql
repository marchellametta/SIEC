-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 04:13 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SKM_SIMA_BUT`
--
CREATE DATABASE IF NOT EXISTS `SKM_SIMA_BUT` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `SKM_SIMA_BUT`;

-- --------------------------------------------------------

--
-- Table structure for table `AKDADM_MT_MHS`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `AKDADM_MT_MHS`;
CREATE TABLE IF NOT EXISTS `AKDADM_MT_MHS` (
  `V_NPM` char(10) NOT NULL,
  `V_NAMA` varchar(100) DEFAULT NULL,
  `V_KODE_PRODI` char(1) DEFAULT NULL,
  `V_NAMA_PRODI` char(3) DEFAULT NULL,
  `V_EMAIL` varchar(100) DEFAULT NULL,
  `V_TELP_HP` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`V_NPM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS FOR TABLE `AKDADM_MT_MHS`:
--

--
-- Dumping data for table `AKDADM_MT_MHS`
--

INSERT INTO `AKDADM_MT_MHS` (`V_NPM`, `V_NAMA`, `V_KODE_PRODI`, `V_NAMA_PRODI`, `V_EMAIL`, `V_TELP_HP`) VALUES
('2014730012', 'MELINDA NUR ABIANTI', '1', 'IF', '7314012@student.unpar.ac.id', '085956006685');

-- --------------------------------------------------------

--
-- Table structure for table `GLB_MT_UNIT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `GLB_MT_UNIT`;
CREATE TABLE IF NOT EXISTS `GLB_MT_UNIT` (
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

--
-- RELATIONS FOR TABLE `GLB_MT_UNIT`:
--

--
-- Dumping data for table `GLB_MT_UNIT`
--

INSERT INTO `GLB_MT_UNIT` (`V_KODE_UNIT`, `V_NAMA_UNIT`, `V_NAMA_UNIT_SINGKAT`, `V_NAMA_UNIT_INGGRIS`, `V_ALMT_UNIT`, `V_TELP_UNIT`, `D_STR_UNIT`, `D_DESK_UNIT`, `T_INSERT`, `T_UPDATE`, `V_INUPBY`, `V_NO_PEG`, `V_KODE_JAB_STRUK`, `V_JNS_TTD`) VALUES
('0500', 'Biro Teknologi dan Informasi', 'BTI', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:09.754528', NULL, NULL, NULL, NULL, '1'),
('0501', 'BTI Bag. Helpdesk EDUKASI ', 'BTI Bag. Helpdesk EDUKASI ', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:09.827130', NULL, NULL, NULL, NULL, NULL),
('0503', 'BTI Bag. Hardware', 'BTI Bag. Hardware', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:09.859237', NULL, NULL, NULL, NULL, NULL),
('0504', 'BTI Bag. Perangkat Lunak', 'BTI Bag. Perangkat Lunak', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:09.913989', NULL, NULL, NULL, NULL, NULL),
('0505', 'BTI Bag. Jaringan', 'BTI Bag. Jaringan', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:09.961252', NULL, NULL, NULL, NULL, NULL),
('0506', 'BTI Bag. Pengembangan', 'BTI Bag. Pengembangan', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:10.003061', NULL, NULL, NULL, NULL, NULL),
('0507', 'BTI Bag. Pusat Data dan Infrastruktur', 'BTI Bag. Pusat Data dan Infrastruktur', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:10.050461', NULL, NULL, NULL, NULL, NULL),
('0508', 'BTI Bag. Pengolahan Informasi Strategis', 'BTI Bag. Pengolahan Informasi Strategis', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:10.083895', NULL, NULL, NULL, NULL, NULL),
('0509', 'BTI Bag. Layanan Teknologi Informasi', 'BTI Bag. Layanan Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:10.128080', NULL, NULL, NULL, NULL, NULL),
('0599', 'BTI Umum', 'BTI Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 09:00:10.170485', NULL, NULL, NULL, NULL, NULL),
('0600', 'Biro Umum dan Teknik', 'BUT', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.662623', NULL, NULL, NULL, NULL, '1'),
('0601', 'BUT  Bag. Prasarana', 'BUT Bag. Prasarana', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.753745', NULL, NULL, NULL, NULL, NULL),
('0602', 'BUT Bag. Sarana Umum', 'BUT Bag. Sarana Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.808399', NULL, NULL, NULL, NULL, NULL),
('0603', 'BUT Bag. Administrasi', 'BUT Bag. Administrasi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.864669', NULL, NULL, NULL, NULL, NULL),
('0604', 'BUT Bag. Kebersihan, Keamanan dan Ketertiban', 'BUT Bag. Kebersihan, Keamanan dan Ketertiban', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.919224', NULL, NULL, NULL, NULL, NULL),
('0605', 'BUT Bag. Sarana Teknologi Informasi', 'BUT Bag. Sarana Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.953608', NULL, NULL, NULL, NULL, NULL),
('0699', 'BUT Umum', 'BUT Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:45:36.981778', NULL, NULL, NULL, NULL, NULL),
('0900', 'Pusat Inovasi Pembelajaran', 'PIP', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.922780', NULL, NULL, NULL, NULL, '1'),
('0901', 'PIP Bag. Pengembangan Mutu Pembelajaran', 'PIP Bag. Pengembangan Mutu Pembelajaran', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.956368', NULL, NULL, NULL, NULL, NULL),
('0902', 'PIP Bag. Pengembangan Sumber Pembelajaran', 'PIP Bag. Pengembangan Sumber Pembelajaran', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.990700', NULL, NULL, NULL, NULL, NULL),
('0999', 'Pusat Inovasi dan Pembelajaran Umum', 'PIP Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.025022', NULL, NULL, NULL, NULL, NULL),
('1100', 'Biro Kemahasiswaan dan Alumni', 'BKA', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.068354', NULL, NULL, NULL, NULL, '1'),
('1101', 'BKA Bag. Pembinaan dan Pendampingan Mahasiswa', 'BKA Bag. Pembinaan dan Pendampingan Mahasiswa', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.135187', NULL, NULL, NULL, NULL, NULL),
('1102', 'BKA Bag. Kesejahteraan Mahasiswa', 'BKA Bag. Kesejahteraan Mahasiswa', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.201172', NULL, NULL, NULL, NULL, NULL),
('1103', 'BKA Bag. Pendataan dan Kerjasama Alumni', 'BKA Bag. Pendataan dan Kerjasama Alumni', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.301109', NULL, NULL, NULL, NULL, NULL),
('1199', 'Biro Kemahasiswaan  dan Akademik Umum', 'BKA Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.335704', NULL, NULL, NULL, NULL, '1'),
('1200', 'Kantor Senat Universitas', 'KSU', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.367586', NULL, NULL, NULL, NULL, NULL),
('1299', 'Kantor Senat Universitas Umum', 'KSU Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:35.401096', NULL, NULL, NULL, NULL, NULL),
('2664', 'Laboratorium Proses Produksi', 'Lab Proses Produksi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:40:47.062228', NULL, NULL, NULL, NULL, NULL),
('2665', 'Laboratorium Otomasi Sistem Produksi', 'Lab Otomasi Sistem Produksi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:31.812987', NULL, NULL, NULL, NULL, NULL),
('2666', 'Laboratorium Sistem produksi', 'Lab Sistem produksi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:31.934302', NULL, NULL, NULL, NULL, NULL),
('2667', 'Lab Analisis Perancangan Kerja dan Ergonomi', 'Lab Analisis PKE', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.012579', NULL, NULL, NULL, NULL, NULL),
('2668', 'Laboratorium Teknologi Informasi', 'Lab Teknologi Informasi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.090086', NULL, NULL, NULL, NULL, NULL),
('2669', 'Laboratorium Aplikasi Teknik', 'Lab Aplikasi Teknik', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.176761', NULL, NULL, NULL, NULL, NULL),
('2681', 'Laboratorium Elektronika', 'Lab Elektronika', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.256343', NULL, NULL, NULL, NULL, NULL),
('2682', 'Laboratorium Instrumentasi dan Pengukuran', 'Lab Instrumentasi dan Pengukuran', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.290023', NULL, NULL, NULL, NULL, NULL),
('2683', 'Laboratorium Kendali dan Robotika', 'Lab Kendali dan Robotika', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.363794', NULL, NULL, NULL, NULL, NULL),
('2684', 'Laboratorium Komputasi Mekatronika', 'Lab Komputasi Mekatronika', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.389895', NULL, NULL, NULL, NULL, NULL),
('2685', 'Laboratorium Sistem Energi', 'Lab Sistem Energi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.456086', NULL, NULL, NULL, NULL, NULL),
('2686', 'Laboratorium Proyek Mekatronika', 'Lab Proyek Mekatronika', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.490568', NULL, NULL, NULL, NULL, NULL),
('2691', 'Lab FTI', 'Lab FTI', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.522827', NULL, NULL, NULL, NULL, NULL),
('2692', 'Lab FTI - jur.TK', 'Lab TK', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.556480', NULL, NULL, NULL, NULL, NULL),
('2693', 'Lab FTI - jur.TI', 'Lab TI', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.623738', NULL, NULL, NULL, NULL, NULL),
('2694', 'Lab. FTI-Jur. Elektonika Konsentrasi Mekatronika', 'Lab. FTI - jur.EKM', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.668777', NULL, NULL, NULL, NULL, NULL),
('2699', 'FTI Umum', 'FTI Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.745969', NULL, NULL, NULL, NULL, NULL),
('2700', 'Fakultas Teknologi Informasi dan Sains', 'F. TIS', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.808826', NULL, 'Information Technology dan Science', NULL, NULL, '2'),
('2701', 'Matematika', 'Matematika', 'Mathematics', NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.912703', NULL, 'Mathematics', NULL, NULL, NULL),
('2702', 'Fisika', 'Fisika', 'Physics', NULL, NULL, NULL, NULL, '2017-04-16 08:43:32.953267', NULL, 'Phyisics', NULL, NULL, NULL),
('2703', 'Teknik Informatika', 'Teknik Informatika', 'Informatics', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.023760', NULL, 'Informatics', NULL, NULL, NULL),
('2711', 'Laboratorium Matematika Terapan', 'Lab. Matematika Terapan', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.067946', NULL, NULL, NULL, NULL, NULL),
('2721', 'Laboratorium Fisika Dasar', 'Lab. Fisika Dasar', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.146033', NULL, NULL, NULL, NULL, NULL),
('2722', 'Laboratorium Elektronika dan Fisika Lanjut', 'Lab. Elektronika dan Fisika Lanjut', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.178256', NULL, NULL, NULL, NULL, NULL),
('2731', 'Laboratorium Komputasi', 'Lab. Komputasi', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.213007', NULL, NULL, NULL, NULL, NULL),
('2732', 'Laboratorium Teknologi Informasi dan Komunikasi ', 'Lab. TIK', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.245120', NULL, NULL, NULL, NULL, NULL),
('2799', 'FTIS Umum', 'FTIS Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.280006', NULL, NULL, NULL, NULL, NULL),
('4100', 'Pascasarjana', 'Pascasarjana', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.312335', NULL, NULL, NULL, NULL, '2'),
('4101', 'Magister Manajemen', 'Mag Manajemen', 'Master`s program in management', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.345892', NULL, NULL, NULL, NULL, NULL),
('4102', 'Magister Ilmu Hukum', 'Mag Ilmu Hukum', 'Master`s program in Law', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.379061', NULL, NULL, NULL, NULL, NULL),
('4103', 'Magister Teknik Sipil', 'Mag Tek Sipil', 'Master`s program in Civil Engineering', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.479172', NULL, NULL, NULL, NULL, NULL),
('4104', 'Magister Arsitektur', 'Mag Arsitektur', 'Master`s program in Architecture', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.513440', NULL, NULL, NULL, NULL, NULL),
('4105', 'Magister Ilmu Sosial', 'Mag Ilmu Sosial', 'Master`s program in Social Sciences', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.545594', NULL, NULL, NULL, NULL, NULL),
('4106', 'Magister Ilmu Teologi', 'Mag Ilmu Teologi', 'Master`s program in Theology', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.578816', NULL, NULL, NULL, NULL, NULL),
('4107', 'Magister Teknik Kimia', 'Mag Tek. Kimia', 'Master`s programs in Chemical Engineering', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.645712', NULL, NULL, NULL, NULL, NULL),
('4108', 'Magister Teknik Industri', 'Mag Tek Industri', 'Master`s programs in Industrial Engineering', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.724865', NULL, NULL, NULL, NULL, NULL),
('4109', 'Magister Hubungan Internasional', 'Mag HI', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.797958', NULL, NULL, NULL, NULL, NULL),
('4171', 'Doktor Ilmu Ekonomi', 'Dr Ilmu Ekonomi', 'Doctorate programs in Management', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.869076', NULL, NULL, NULL, NULL, NULL),
('4172', 'Doktor Ilmu Hukum', 'Dr Ilmu Hukum', 'Doctorate programs in Law', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.903098', NULL, NULL, NULL, NULL, NULL),
('4173', 'Doktor Ilmu Teknik Sipil', 'Dr Ilmu Tek Sipil', 'Doctorate programs in Civil Engineering', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.935124', NULL, NULL, NULL, NULL, NULL),
('4174', 'Doktor Ilmu Arsitektur', 'Dr Ilmu Arsitektur', 'Doctorate programs in Architecture', NULL, NULL, NULL, NULL, '2017-04-16 08:43:33.981151', NULL, NULL, NULL, NULL, NULL),
('4199', 'Pascasarjana Umum', 'Pascasarjana Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.034186', NULL, NULL, NULL, NULL, NULL),
('5100', 'Lembaga Penelitian dan Pengabdian kepada Masyarakat', 'LPPM', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.067206', NULL, NULL, NULL, NULL, '1'),
('5101', 'LPPM ', 'LPPM', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.100271', NULL, NULL, NULL, NULL, NULL),
('5102', 'Pusat Studi (Multidisiplin)-COE SME', 'COE SME', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.132509', NULL, NULL, NULL, NULL, NULL),
('5103', 'Pusat Studi (Monodisiplin) - COE UID', 'COE UID', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.169256', NULL, NULL, NULL, NULL, NULL),
('5104', 'Pusat Studi yang akan dibentuk kemudian', 'Pusat Studi yang akan dibentuk kemudian', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.201999', NULL, NULL, NULL, NULL, NULL),
('5190', 'Unpar Press', 'Unpar Press', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.235110', NULL, NULL, NULL, NULL, NULL),
('5199', 'LPPM Umum', 'LPPM Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.267751', NULL, NULL, NULL, NULL, NULL),
('5200', 'Lembaga Pengembangan Humaniora', 'LPH', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.293053', NULL, NULL, NULL, NULL, '1'),
('5201', 'LPH Bag. Bimbingan Konseling', 'LPH Bag. Bimbingan Konseling', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.323387', NULL, NULL, NULL, NULL, NULL),
('5202', 'LPH Bag. Pengembangan Potensi Insani', 'LPH Bag. Pengembangan Potensi Insani', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.356035', NULL, NULL, NULL, NULL, NULL),
('5299', 'LPH Umum', 'LPH Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.390373', NULL, NULL, NULL, NULL, NULL),
('5300', 'Pusat Pengembangan Karir', 'PPK', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.478348', NULL, NULL, NULL, NULL, '1'),
('5301', 'PPK Bag. Pengembangan Keahlian Bahasa Asing', 'PPK Bag. Pengembangan Keahlian Bahasa Asing', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.523691', NULL, NULL, NULL, NULL, NULL),
('5302', 'PPK Bag. Bimbingan Karir', 'PPK Bag. Bimbingan Karir', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.568172', NULL, NULL, NULL, NULL, NULL),
('5399', 'PPK Umum', 'PPK Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.601751', NULL, NULL, NULL, NULL, NULL),
('6100', 'Perpustakaan', 'Perpus', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.664263', NULL, NULL, NULL, NULL, '1'),
('6101', 'Layanan Teknis', 'Layanan Teknis', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.689744', NULL, NULL, NULL, NULL, NULL),
('6102', 'Layanan Pembaca', 'Layanan Pembaca', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.722327', NULL, NULL, NULL, NULL, NULL),
('6103', 'Layanan Digital', 'Layanan Digital', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.756900', NULL, NULL, NULL, NULL, NULL),
('6199', 'Perpustakaan Umum', 'Perpustakaan Umum', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.789243', NULL, NULL, NULL, NULL, NULL),
('8100', 'Yayasan', 'Yayasan', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.824224', NULL, NULL, NULL, NULL, '1'),
('8199', 'Yayasan', 'Yayasan', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.856222', NULL, NULL, NULL, NULL, NULL),
('9100', 'Rektorat', 'Rektorat', NULL, NULL, NULL, NULL, NULL, '2017-04-16 08:43:34.889482', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_ACUAN_ASET_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_ACUAN_ASET_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_ACUAN_ASET_DT` (
  `ID_ASET` int(11) NOT NULL,
  `ID_ACUAN` int(11) NOT NULL,
  KEY `ID_ASET` (`ID_ASET`),
  KEY `ID_ACUAN` (`ID_ACUAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_ACUAN_ASET_DT`:
--   `ID_ASET`
--       `sima_aset_mt` -> `ID_ASET`
--   `ID_ACUAN`
--       `sima_tabel_acuan_mt` -> `ID_ACUAN`
--

--
-- Dumping data for table `SIMA_ACUAN_ASET_DT`
--

INSERT INTO `SIMA_ACUAN_ASET_DT` (`ID_ASET`, `ID_ACUAN`) VALUES
(3, 7),
(4, 2),
(5, 3),
(6, 7),
(9, 3),
(10, 7),
(3, 7),
(4, 6),
(5, 7),
(6, 7),
(9, 7),
(10, 7),
(10, 4),
(11, 7),
(12, 7),
(13, 7),
(14, 7),
(16, 7),
(17, 1),
(17, 7),
(18, 7),
(19, 1),
(19, 7),
(21, 1),
(21, 7),
(22, 2),
(22, 7),
(23, 7),
(49, 6),
(54, 7),
(54, 1),
(55, 6),
(55, 1),
(77, 7),
(78, 7),
(76, 7),
(76, 1),
(82, 7),
(81, 7),
(81, 1),
(83, 7),
(85, 7),
(84, 7),
(84, 3),
(87, 7),
(89, 7),
(117, 7),
(116, 7),
(116, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_ASET_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_ASET_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_ASET_MT` (
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
  KEY `ASET_LOKASI_ID` (`ASET_LOKASI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_ASET_MT`:
--   `ASET_KATEGORI_ID`
--       `sima_kategori_mt` -> `ID_KATEGORI`
--

--
-- Dumping data for table `SIMA_ASET_MT`
--

INSERT INTO `SIMA_ASET_MT` (`ID_ASET`, `ASET_KATEGORI_ID`, `DT_TANGGAL_PEROLEHAN`, `N_HARGA_PEROLEHAN`, `N_UMUR_EKONOMIS`, `UNIT_PEMILIK_ID`, `ASET_LOKASI_ID`, `N_STOK`) VALUES
(3, 1, '1995-01-01', 2147483647, 15, '0602', 1, 0),
(4, 1, '2017-04-24', 0, 0, '0602', 1, 0),
(5, 1, '2017-04-25', 0, 0, '0602', 1, 0),
(6, 1, '0000-00-00', 0, 0, '0602', 1, 0),
(9, 1, '0000-00-00', 0, 0, '9100', 1, 0),
(10, 1, '0000-00-00', 0, 0, '0500', 1, 0),
(11, 3, '2017-03-05', 550000, 4, '0601', 1, 0),
(12, 3, '2017-03-05', 300000, 4, '0601', 1, 0),
(13, 5, '2017-03-15', 550000, 4, '0601', 1, 0),
(14, 6, '2017-03-17', 6450000, 4, '0601', 1, 0),
(16, 3, '0001-02-01', 1, 3, '0501', 1, 0),
(17, 1, '2017-04-26', 24, 30, '0500', 1, 0),
(18, 3, '0000-00-00', 51, 5, '0503', 1, 0),
(19, 1, '2017-04-26', 29, 5, '0600', 1, 0),
(21, 1, '2017-03-23', 120000, 12, '0605', 1, 0),
(22, 1, '2017-05-03', 2147483647, 30, '0600', 1, 0),
(23, 5, '0000-00-00', 300000, 5, '0601', 1, 0),
(27, 1, '1970-01-01', 0, 0, '', 0, 1),
(28, 1, '2017-05-08', 100, 4, '0602', 1, 1),
(29, 1, '2017-05-09', 100, 4, '0500', 1, 1),
(30, 1, '1970-01-01', 3000, 0, '', 1, 1),
(31, 1, '1970-01-01', 0, 0, '', 0, 1),
(48, 1, '2017-05-08', 400000, 4, '0600', 1, 1),
(49, 3, '2017-05-08', 400000, 5, '0503', 3, 3),
(51, 1, '2017-05-11', 50000, 6, '0600', 1, 1),
(54, 1, '2017-05-08', 50000, 5, '0600', 2, 1),
(55, 1, '2017-05-09', 0, 3, '0500', 1, 1),
(76, 1, '2017-05-09', 500000, 4, '0600', 1, 1),
(77, 3, '2017-05-09', 500000, 3, '1100', 1, 4),
(78, 3, '2017-05-09', 500000, 3, '1100', 1, 4),
(81, 1, '2017-05-09', 5, 4, '0600', 1, 1),
(82, 3, '2017-05-09', 4000, 4, '1299', 1, 4),
(83, 3, '2017-05-09', 1000000000, 5, '0600', 1, 5),
(84, 1, '2017-05-09', 1000000, 5, '0600', 1, 1),
(85, 5, '2017-05-09', 500000, 5, '0600', 1, 1),
(87, 2, '2017-05-09', 500000, 15, '0600', 2, 1),
(89, 2, '2017-05-09', 1000000, 5, '0500', 2, 1),
(116, 1, '2017-05-19', 10000, 4, '0600', 1, 1),
(117, 3, '1970-01-01', 0, 0, '1100', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_BARANG_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_BARANG_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_BARANG_MT` (
  `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ASET` int(11) NOT NULL,
  `V_KODE_BARANG` varchar(15) NOT NULL,
  `V_NAMA_BARANG` varchar(100) NOT NULL,
  `V_NAMA_GAMBAR` varchar(150) DEFAULT NULL,
  `V_MERK_SUPPLIER` varchar(100) NOT NULL,
  `V_SUPPLIER` varchar(100) NOT NULL,
  `V_KETERANGAN` varchar(500) DEFAULT NULL,
  `B_STATUS_ASET` bit(1) NOT NULL,
  `B_STATUS_PAKAI` bit(1) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  PRIMARY KEY (`ID_BARANG`),
  UNIQUE KEY `ID_ASET` (`ID_ASET`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_BARANG_MT`:
--   `ID_ASET`
--       `sima_aset_mt` -> `ID_ASET`
--   `ID_KATEGORI_SPESIFIK`
--       `sima_kategori_spesifik_mt` -> `ID_KATEGORI_SPESIFIK`
--

--
-- Dumping data for table `SIMA_BARANG_MT`
--

INSERT INTO `SIMA_BARANG_MT` (`ID_BARANG`, `ID_ASET`, `V_KODE_BARANG`, `V_NAMA_BARANG`, `V_NAMA_GAMBAR`, `V_MERK_SUPPLIER`, `V_SUPPLIER`, `V_KETERANGAN`, `B_STATUS_ASET`, `B_STATUS_PAKAI`, `ID_KATEGORI_SPESIFIK`) VALUES
(1, 11, '042017030000001', 'Meja kuliah 1/2 biro', '/SIBUT/images/barang/mejakuliahsetengahbiro.jpg', 'Chitose', 'PT. Chitose Indonesia', 'Ada lubang untuk kabel listriknya', b'1', b'1', 1),
(2, 12, '042017030000002', 'Kursi kuliah busa biru', '/SIBUT/images/barang/kursikuliahbusabiu.jpg', 'Chitose', 'PT. Chitose Indonesia', '', b'1', b'1', 1),
(3, 13, '062017030000003', 'Speaker (sepasang) X9983', '/SIBUT/images/barang/SpeakerX9983.jpg', 'JBL', 'PT. SonSon', '', b'1', b'1', 2),
(4, 14, '072017030000005', 'PC i5 RAM 4GB (Teknik)', '/SIBUT/images/barang/PCi5RAM4GB(Teknik).jpg', 'Acer', 'PT. Sidola', '', b'1', b'1', 1),
(5, 16, '031970010000001', 'Melinda Nur Abianti', '/SIBUT/images/barang/031970010000001.png', 'Chitose', 'hehee', 'sdfdkljfa', b'0', b'1', 1),
(6, 18, '032017040000001', 'Barang3', '/SIBUT/images/barang/032017040000001.jpg', 'Chitose', 'chitose', 'baru', b'1', b'0', 1),
(7, 23, '052017050000001', 'Speaker Aktif', '/SIBUT/images/barang/052017050000001.jpg', 'JBL', 'asd', 'asd', b'1', b'1', 1),
(8, 49, '032017050000000', 'bgd', 'images/barang/032017050000000.jpg', 'Chitose', 'chi', 'hehe', b'1', b'0', 1),
(10, 77, '032017050000001', 'hehehe', NULL, 'chiro', 'unpa', 'barang1barang1', b'1', b'1', 1),
(11, 78, '032017050000002', 'hehehe', NULL, 'chiro', 'unpa', 'barang1barang1', b'1', b'1', 1),
(13, 82, '032017050000003', 'TESTING BARANG COY', NULL, 'hehehe', 'huh', 'ha', b'1', b'1', 1),
(14, 83, '032017050000004', 'BarangABCDEF', 'images/barang/032017050000004.png', 'Chitose', 'chitose', 'zjdzdjsdjlzdz', b'1', b'1', 1),
(15, 85, '052017050000005', '9102- AC 1', NULL, 'chitose', 'chitose', 'ini AC', b'1', b'1', 1),
(16, 117, '031970010000001', 'barang hari jumat', NULL, 'dlkmas', 'dlkms', 'kmld', b'1', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_DETIL_PEMINJAMAN_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_DETIL_PEMINJAMAN_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_DETIL_PEMINJAMAN_DT` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_ASET` int(11) NOT NULL,
  PRIMARY KEY (`ID_PEMINJAMAN`,`ID_ASET`),
  KEY `fk_DETIL_PEMINJAMAN_DT_ASET_MT1_idx` (`ID_ASET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS FOR TABLE `SIMA_DETIL_PEMINJAMAN_DT`:
--   `ID_ASET`
--       `sima_aset_mt` -> `ID_ASET`
--   `ID_PEMINJAMAN`
--       `sima_peminjaman_tr` -> `ID_PEMINJAMAN`
--

--
-- Dumping data for table `SIMA_DETIL_PEMINJAMAN_DT`
--

INSERT INTO `SIMA_DETIL_PEMINJAMAN_DT` (`ID_PEMINJAMAN`, `ID_ASET`) VALUES
(42, 4);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  `N_KUANTITAS_DIMINTA` int(11) NOT NULL,
  `N_KUANTITAS_TERSEDIA` int(11) NOT NULL,
  KEY `ID_PEMINJAMAN` (`ID_PEMINJAMAN`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT`:
--   `ID_PEMINJAMAN`
--       `sima_peminjaman_tr` -> `ID_PEMINJAMAN`
--   `ID_KATEGORI_SPESIFIK`
--       `sima_kategori_spesifik_mt` -> `ID_KATEGORI_SPESIFIK`
--

--
-- Dumping data for table `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT`
--

INSERT INTO `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT` (`ID_PEMINJAMAN`, `ID_KATEGORI_SPESIFIK`, `N_KUANTITAS_DIMINTA`, `N_KUANTITAS_TERSEDIA`) VALUES
(41, 1, 10, 0),
(42, 1, 20, 0),
(42, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_PERLENGKAPAN` int(11) NOT NULL,
  `N_KUANTITAS_DIMINTA` int(11) NOT NULL,
  `N_KUANTITAS_TERSEDIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PEMINJAMAN`,`ID_PERLENGKAPAN`),
  KEY `PERLENGKAPAN_MT_ID` (`ID_PERLENGKAPAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT`:
--   `ID_PERLENGKAPAN`
--       `sima_perlengkapan_mt` -> `ID_PERLENGKAPAN`
--   `ID_PEMINJAMAN`
--       `sima_peminjaman_tr` -> `ID_PEMINJAMAN`
--

--
-- Dumping data for table `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT`
--

INSERT INTO `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT` (`ID_PEMINJAMAN`, `ID_PERLENGKAPAN`, `N_KUANTITAS_DIMINTA`, `N_KUANTITAS_TERSEDIA`) VALUES
(39, 1, 10, NULL),
(41, 1, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_FASILITAS_GLR_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_FASILITAS_GLR_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_FASILITAS_GLR_DT` (
  `ID_GLR` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  KEY `ID_GLR` (`ID_GLR`),
  KEY `ID_BARANG` (`ID_BARANG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_FASILITAS_GLR_DT`:
--   `ID_GLR`
--       `sima_glr_mt` -> `ID_GLR`
--   `ID_BARANG`
--       `sima_barang_mt` -> `ID_BARANG`
--

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_GLR_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_GLR_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_GLR_MT` (
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
  `B_STATUS_PINJAM` bit(1) NOT NULL,
  PRIMARY KEY (`ID_GLR`),
  UNIQUE KEY `ID_ASET` (`ID_ASET`),
  KEY `PARENT_ID` (`PARENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_GLR_MT`:
--   `ID_ASET`
--       `sima_aset_mt` -> `ID_ASET`
--   `PARENT_ID`
--       `sima_glr_mt` -> `ID_GLR`
--

--
-- Dumping data for table `SIMA_GLR_MT`
--

INSERT INTO `SIMA_GLR_MT` (`ID_GLR`, `ID_ASET`, `PARENT_ID`, `V_KODE_GLR`, `V_NAMA_GLR`, `V_NAMA_GAMBAR`, `N_DAYA_TAMPUNG`, `N_DIM_TINGGI`, `N_DIM_PANJANG`, `N_DIM_LEBAR`, `V_WARNA_DINDING`, `N_JUMLAH_LANTAI`, `B_STATUS_PINJAM`) VALUES
(1, 3, NULL, '01000000', 'Gedung 0 (Rektorat)', '/SIBUT/images/GLR/gedung0.jpg', 0, 14, 50, 20, 'Abu-abu', 4, b'0'),
(2, 4, 1, '01010000', 'Lantai Cantik', 'images/GLR/01010000.jpg', 100, 3, 50, 20, 'rgba(0,0,0,1)', 4, b'1'),
(3, 5, 1, '01020000', 'Lantai 2 Gedung 0 (Rektorat)', 'images/GLR/01020000.jpg', 0, 3, 30, 20, 'rgba(0,0,0,1)', 1, b'1'),
(4, 6, 1, '01030000', 'Lantai 3 Gedung 0 (Rektorat)', '/SIBUT/images/GLR/gedung0lantai3.jpg', 0, 3, 30, 20, 'Abu-abu', 1, b'0'),
(5, 9, 4, '01030100', 'Ruang Rapat BTI', 'images/GLR/01030100.jpg', 20, 3, 25, 5, 'rgba(0,0,0,1)', 1, b'1'),
(6, 10, 5, '01030101', 'Ruang Rapat BTI Gedung 0 (Rektorat)', 'images/GLR/01030101.jpg', 15, 3, 8, 4, 'rgba(0,0,0,1)', 1, b'1'),
(7, 17, NULL, '02000000', 'Gedung 123', 'images/GLR/02000000.jpg', 12, 12, 12, 12, '#b78888', 4, b'1'),
(8, 19, NULL, '03000000', 'gedung2', 'images/GLR/03000000.jpg', 12, 12, 12, 12, '#ad3434', 5, b'0'),
(9, 21, NULL, '04000000', 'Gedung Rektorat', 'images/GLR/04000000.jpg', 12, 2, 12, 12, '#f2cd84', 4, b'0'),
(10, 22, 9, '04020000', 'Lantai 1 Gedung Rektorat', 'images/GLR/04020000.jpg', 500, 2, 30, 20, '#f9fac9', 1, b'0'),
(13, 48, NULL, '020000', 'gedung 567', 'images/GLR/0200002.jpg', 0, 6, 3, 4, '#f20101', 7, b'0'),
(14, 51, NULL, '020000', 'abcdef', 'images/GLR/0200003.jpg', 0, 6, 4, 5, '#ed3a3a', 6, b'0'),
(17, 54, NULL, '020000', 'gedung ckckckck', 'images/GLR/0200005.jpg', 0, 7, 4, 5, '#f21e1e', 8, b'0'),
(18, 55, NULL, '030000', 'DSS', 'images/GLR/030000.jpg', 0, 3, 3, 3, '#ed2b2b', 3, b'0'),
(25, 76, NULL, '030000', 'gedunghmm', 'images/GLR/0300006.jpg', 0, 5, 5, 5, '#f61818', 5, b'0'),
(27, 81, NULL, '030000', 'GEDUNG INI COBACOBA YA', 'images/GLR/0300008.jpg', 0, 6, 6, 6, '#e21f1f', 6, b'0'),
(28, 84, 2, '01010000', 'Ruang 9102', 'images/GLR/01010000.png', 100, 1, 1, 1, '#ecabab', 1, b'0'),
(29, 116, NULL, '030000', 'Barang234', 'images/GLR/0300001.png', 0, 1, 1, 1, '#f43232', 1, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_KATEGORI_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_KATEGORI_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_KATEGORI_MT` (
  `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_KATEGORI` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_KATEGORI_MT`:
--

--
-- Dumping data for table `SIMA_KATEGORI_MT`
--

INSERT INTO `SIMA_KATEGORI_MT` (`ID_KATEGORI`, `V_NAMA_KATEGORI`) VALUES
(1, 'Lahan/Bangunan/Gedung'),
(2, 'Kendaraan'),
(3, 'Perabot/Peralatan'),
(4, 'Mesin'),
(5, 'Elektronik'),
(6, 'Peralatan Komputer'),
(7, 'Software'),
(8, 'Alat Teknis Pendidikan'),
(9, 'Aset Tak Berwujud'),
(99, 'Lain-lain'),
(100, 'ATK'),
(101, ''),
(102, '');

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_KATEGORI_SPESIFIK_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_KATEGORI_SPESIFIK_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_KATEGORI_SPESIFIK_MT` (
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_KATEGORI_SPESIFIK` varchar(500) NOT NULL,
  `N_STOK` int(11) NOT NULL,
  `B_STATUS` bit(1) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_KATEGORI_SPESIFIK_MT`:
--

--
-- Dumping data for table `SIMA_KATEGORI_SPESIFIK_MT`
--

INSERT INTO `SIMA_KATEGORI_SPESIFIK_MT` (`ID_KATEGORI_SPESIFIK`, `V_NAMA_KATEGORI_SPESIFIK`, `N_STOK`, `B_STATUS`) VALUES
(1, 'Kursi Murah', 100, b'1'),
(2, 'Barang Murah', 10, b'0'),
(3, '', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_KENDARAAN_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_KENDARAAN_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_KENDARAAN_MT` (
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
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_KENDARAAN_MT`:
--   `ID_ASET`
--       `sima_aset_mt` -> `ID_ASET`
--   `ID_KATEGORI_SPESIFIK`
--       `sima_kategori_spesifik_mt` -> `ID_KATEGORI_SPESIFIK`
--

--
-- Dumping data for table `SIMA_KENDARAAN_MT`
--

INSERT INTO `SIMA_KENDARAAN_MT` (`ID_KENDARAAN`, `ID_ASET`, `V_NO_MESIN`, `V_NO_RANGKA`, `V_TIPE_KENDARAAN`, `N_TAHUN_MODEL`, `N_KAPASITAS_PENUMPANG`, `N_KAPASITAS_MESIN`, `V_NOMOR_BPKB`, `V_BAHAN_BAKAR`, `V_NO_POLISI`, `ID_KATEGORI_SPESIFIK`) VALUES
(2, 87, 'D9482098420948203JDA', 'D9482098420', 'Avanza', 3, 5, 7, 'D948209842094820', 'Pertamax', 'D1945RI', 1),
(4, 89, '9832D8JODISH', '89EU2IODJDS', 'Avanza', 2019, 4, 400, 'BIWO82382HDJ', 'Pertamax', 'D1955RI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_LOKASI_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_LOKASI_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_LOKASI_MT` (
  `ID_LOKASI` int(11) NOT NULL AUTO_INCREMENT,
  `V_ALAMAT_LOKASI` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_LOKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_LOKASI_MT`:
--

--
-- Dumping data for table `SIMA_LOKASI_MT`
--

INSERT INTO `SIMA_LOKASI_MT` (`ID_LOKASI`, `V_ALAMAT_LOKASI`) VALUES
(1, 'Jl. Ciumbuleuit No. 94 Bandung'),
(2, 'Jl. Merdeka No. 30 Bandung'),
(3, 'Jl. Nias No. 2 Bandung'),
(4, 'Jl. Aceh No. 51 Bandung'),
(5, 'Jl. Sarijadi Blok 1 Nomor 1'),
(6, 'Jl. Ujung Berung No. 10 Bandung'),
(7, ''),
(8, '');

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_PEGAWAI_LUAR_BERTUGAS_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_PEGAWAI_LUAR_BERTUGAS_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_PEGAWAI_LUAR_BERTUGAS_DT` (
  `ID_PEGAWAI_LUAR_BERTUGAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `V_NAMA` varchar(45) NOT NULL,
  `V_EMAIL` varchar(45) DEFAULT NULL,
  `V_NO_TELP` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_PEGAWAI_LUAR_BERTUGAS`),
  KEY `fk_PEGAWAI_LUAR_BERTUGAS_DT_PEMINJAMAN_MT1_idx` (`ID_PEMINJAMAN`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS FOR TABLE `SIMA_PEGAWAI_LUAR_BERTUGAS_DT`:
--   `ID_PEMINJAMAN`
--       `sima_peminjaman_tr` -> `ID_PEMINJAMAN`
--

--
-- Dumping data for table `SIMA_PEGAWAI_LUAR_BERTUGAS_DT`
--

INSERT INTO `SIMA_PEGAWAI_LUAR_BERTUGAS_DT` (`ID_PEGAWAI_LUAR_BERTUGAS`, `ID_PEMINJAMAN`, `V_NAMA`, `V_EMAIL`, `V_NO_TELP`) VALUES
(1, 15, 'acel', 'acel@mail.com', '0878227140178'),
(2, 20, 'Denny darko', 'den@gmail.com', '9347282'),
(3, 34, 'Melinda Nur Abianti', 'melindanurabianti@gmail.com', '085956006685');

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT`;
CREATE TABLE IF NOT EXISTS `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT` (
  `V_NO_PEG` char(10) NOT NULL,
  `ID_PEMINJAMAN` int(11) NOT NULL,
  PRIMARY KEY (`V_NO_PEG`,`ID_PEMINJAMAN`),
  KEY `fk_PEGAWAI_UNPAR_BERTUGAS_DT_PEMINJAMAN_MT_idx` (`ID_PEMINJAMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS FOR TABLE `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT`:
--   `V_NO_PEG`
--       `SIMPEG_MT_INDUK_PEG` -> `V_NO_PEG`
--   `ID_PEMINJAMAN`
--       `sima_peminjaman_tr` -> `ID_PEMINJAMAN`
--

--
-- Dumping data for table `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT`
--

INSERT INTO `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT` (`V_NO_PEG`, `ID_PEMINJAMAN`) VALUES
('2017170042', 15),
('2017170042', 20),
('2017170042', 34);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_PEMINJAMAN_TR`
--
-- Creation: Jun 20, 2017 at 02:08 PM
--

DROP TABLE IF EXISTS `SIMA_PEMINJAMAN_TR`;
CREATE TABLE IF NOT EXISTS `SIMA_PEMINJAMAN_TR` (
  `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT,
  `V_KODE_PEMOHON_UNIT` char(10) DEFAULT NULL,
  `V_KODE_UNIT_PEMOHON` char(4) NOT NULL,
  `V_NAMA_ACARA` varchar(45) NOT NULL,
  `V_TEMPAT_KEGIATAN` varchar(45) DEFAULT NULL,
  `B_JENIS_ACARA` bit(1) NOT NULL,
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
  `ID_TEMPLATE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PEMINJAMAN`),
  UNIQUE KEY `ID_TEMPLATE` (`ID_TEMPLATE`),
  KEY `fk_PEMINJAMAN_MT_GLB_MT_UNIT1_idx` (`V_KODE_UNIT_PEMOHON`),
  KEY `fk_PEMINJAMAN_MT_AKDADM_MHS_MT.idx` (`V_KODE_PEMOHON_UNIT`),
  KEY `fk_PEMINJAMAN_MT_SIMPEG_MT_INDUK_PEG` (`V_KODE_PEMOHON_UNIT`),
  KEY `fk_PEMINJAMAN_MT__idx` (`V_KODE_PENANGGUNG_JAWAB_UNIT`),
  KEY `V_KODE_PEMOHON_MAHASISWA` (`V_KODE_PEMOHON_MAHASISWA`),
  KEY `V_KODE_PENANGGUNG_JAWAB_MAHASISWA` (`V_KODE_PENANGGUNG_JAWAB_MAHASISWA`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS FOR TABLE `SIMA_PEMINJAMAN_TR`:
--   `V_KODE_PEMOHON_MAHASISWA`
--       `AKDADM_MT_MHS` -> `V_NPM`
--   `V_KODE_PEMOHON_UNIT`
--       `SIMPEG_MT_INDUK_PEG` -> `V_NO_PEG`
--   `V_KODE_PENANGGUNG_JAWAB_MAHASISWA`
--       `AKDADM_MT_MHS` -> `V_NPM`
--   `V_KODE_PENANGGUNG_JAWAB_UNIT`
--       `SIMPEG_MT_INDUK_PEG` -> `V_NO_PEG`
--   `ID_TEMPLATE`
--       `sima_template_surat_mt` -> `ID_TEMPLATE`
--

--
-- Dumping data for table `SIMA_PEMINJAMAN_TR`
--

INSERT INTO `SIMA_PEMINJAMAN_TR` (`ID_PEMINJAMAN`, `V_KODE_PEMOHON_UNIT`, `V_KODE_UNIT_PEMOHON`, `V_NAMA_ACARA`, `V_TEMPAT_KEGIATAN`, `B_JENIS_ACARA`, `V_PATH_SURAT_ACARA`, `V_NOMOR_SURAT`, `N_STATUS_PEMINJAMAN`, `V_KODE_PENANGGUNG_JAWAB_UNIT`, `DT_WAKTU_MULAI_ACARA`, `DT_WAKTU_SELESAI_ACARA`, `DT_WAKTU_MULAI_PINJAM`, `V_KODE_PEMOHON_MAHASISWA`, `V_KODE_PENANGGUNG_JAWAB_MAHASISWA`, `DT_WAKTU_SELESAI_PINJAM`, `DT_WAKTU_PESAN`, `DT_WAKTU_KEMBALI_SEBENARNYA`, `ID_TEMPLATE`) VALUES
(1, NULL, '1', 'i-Nite', 'Bumi Sangkuriang', b'1', 'images/Surat/i-Nite4.jpg', '', 1, NULL, '2017-05-25 11:45:07', '2017-05-25 11:45:07', '2017-05-25 00:00:05', '2014730012', '2014730012', '2017-05-25 00:00:05', '2017-05-25 00:00:05', '2017-05-25 11:45:07', NULL),
(15, NULL, '1', 'Funday', 'SC Ekonomi', b'1', 'images/Surat/Funday12.jpg', '', 0, NULL, '2017-05-25 12:02:22', '2017-05-25 12:02:22', '2017-05-25 00:00:05', '2014730012', '2014730012', '2017-05-25 00:00:05', '2017-05-25 00:00:05', '2017-05-25 12:02:22', NULL),
(16, NULL, '1', 'Tutor', '103', b'1', 'Surat/Tutor.pdf', '', 1, NULL, '2017-05-28 15:09:15', '2017-05-28 15:09:15', '2017-05-28 00:00:05', '2014730012', '2014730012', '2017-05-28 00:00:05', '2017-05-28 00:00:05', '2017-05-28 15:09:15', NULL),
(17, NULL, '1', 'Tutoring', 'UNPAR', b'1', 'Surat/Tutoring.pdf', '', 1, NULL, '2017-05-29 19:11:33', '2017-05-29 19:11:33', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 19:11:33', NULL),
(18, NULL, '1', 'Seminar', 'UNPAR', b'1', 'Surat/Seminar.pdf', '', 1, NULL, '2017-05-29 19:14:06', '2017-05-29 19:14:06', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 19:14:06', NULL),
(19, NULL, '1', 'Coba', 'UNPAR', b'1', 'Surat/Coba.pdf', '', 2, NULL, '2017-05-29 19:21:41', '2017-05-29 19:21:41', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 19:21:41', NULL),
(20, NULL, '1', 'A', 'UNPAR', b'1', 'Surat/A.pdf', '', 4, NULL, '2017-05-29 19:23:01', '2017-05-29 19:23:01', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 19:23:01', NULL),
(21, NULL, '1', 'abc', 'abc', b'1', 'Surat/abc.pdf', '', 4, NULL, '2017-05-29 20:59:40', '2017-05-29 20:59:40', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 20:59:40', NULL),
(26, NULL, '1', 'abcd', 'abc', b'1', 'Surat/abcd5.pdf', '', 4, NULL, '2017-05-29 21:05:02', '2017-05-29 21:05:02', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 21:05:02', NULL),
(27, NULL, '1', 'a', 'abc', b'1', 'Surat/a1.pdf', '', 4, NULL, '2017-05-29 21:58:35', '2017-05-29 21:58:35', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 21:58:35', NULL),
(28, NULL, '1', 'b', 'a', b'1', 'Surat/b.pdf', '', 4, NULL, '2017-05-29 22:04:21', '2017-05-29 22:04:21', '2017-05-29 00:00:05', '2014730012', '2014730012', '2017-05-29 00:00:05', '2017-05-29 00:00:05', '2017-05-29 22:04:21', NULL),
(29, NULL, '1', 'abcd', 'abcd', b'1', 'Surat/abc.pdf', '', 2, NULL, '2017-06-08 20:05:10', '2017-06-08 20:05:10', '2017-06-08 00:00:06', '2014730012', '2014730012', '2017-06-08 00:00:06', '2017-06-08 00:00:06', '2017-06-08 20:05:10', NULL),
(30, NULL, '0500', 'Rapat Tahunan', 'UNPAR', b'1', 'Surat/Rapat_Tahunan.pdf', '', 1, NULL, '2017-06-09 08:43:46', '2017-06-09 08:43:46', '2017-06-09 09:00:06', NULL, NULL, '2017-06-09 12:00:06', '2017-06-09 09:00:06', '2017-06-09 08:43:46', NULL),
(31, NULL, '0500', 'abc', '', b'1', 'Surat/abc.pdf', '', 1, NULL, '2017-06-09 08:47:29', '2017-06-09 08:47:29', '2017-06-09 00:00:06', NULL, NULL, '2017-06-09 00:00:06', '2017-06-09 00:00:06', '2017-06-09 08:47:29', NULL),
(33, '2017170042', '0500', 'zzzzzzzzzz', '', b'0', 'Surat/zzzzzzzzzz.pdf', '', 1, '2017170042', '2017-06-09 08:54:24', '2017-06-09 08:54:24', '2017-06-09 00:00:06', NULL, NULL, '2017-06-09 00:00:06', '2017-06-09 00:00:06', '2017-06-09 08:54:24', NULL),
(34, '2017170042', '0500', 'Kegiatan Lomba Pacuan Kuda 2 ', 'Bandung ', b'0', 'Surat/Kegiatan_Lomba_Pacuan_Kuda.pdf', '', 4, '2017170042', '2017-06-09 10:38:37', '2017-06-09 10:38:37', '2017-06-10 10:00:06', NULL, NULL, '2017-06-10 14:00:06', '2017-06-10 10:00:06', '2017-06-09 10:38:37', NULL),
(35, '2017170042', '0500', 'abcdef', 'asdadas', b'0', 'Surat/abcdef1.pdf', '', 2, '2017170042', '2017-06-10 10:39:53', '2017-06-10 10:39:53', '2017-06-10 00:00:06', NULL, NULL, '2017-06-10 00:00:06', '2017-06-10 00:00:06', '2017-06-10 10:39:53', NULL),
(36, NULL, '1', 'masasiherror', 'unpar', b'1', 'Surat/masasiherror.pdf', '', 3, NULL, '2017-06-10 10:41:41', '2017-06-10 10:41:41', '2017-06-10 00:00:06', '2014730012', '2014730012', '2017-06-10 00:00:06', '2017-06-10 00:00:06', '2017-06-10 10:41:41', NULL),
(37, NULL, '1', 'udahbener', 'unpar', b'1', 'Surat/udahbener.pdf', '', 3, NULL, '2017-06-10 10:55:25', '2017-06-10 10:55:25', '2017-06-10 00:00:06', '2014730012', '2014730012', '2017-06-10 00:00:06', '2017-06-10 00:00:06', '2017-06-10 10:55:25', NULL),
(38, NULL, '1', 'cobalagi', 'bandung', b'1', 'Surat/cobalagi.pdf', '', 3, NULL, '2017-06-10 11:02:12', '2017-06-10 11:02:12', '2017-06-10 00:00:06', '2014730012', '2014730012', '2017-06-10 00:00:06', '2017-06-10 00:00:06', '2017-06-10 11:02:12', NULL),
(39, NULL, '1', 'abdebaper', '', b'1', 'Surat/abdebaper1.pdf', '', 1, NULL, '2017-06-11 13:53:32', '2017-06-11 13:53:32', '2017-06-11 00:00:06', '2014730012', '2014730012', '2017-06-11 00:00:06', '2017-06-11 00:00:06', '2017-06-11 13:53:32', NULL),
(41, NULL, '0500', 'abdebaper', '', b'1', 'Surat/abdebaper3.pdf', '1', 1, NULL, '2017-06-11 13:55:47', '2017-06-11 13:55:47', '2017-06-11 00:00:06', NULL, NULL, '2017-06-11 00:00:06', '2017-06-11 00:00:06', '2017-06-11 13:55:47', NULL),
(42, '2017170042', '0500', 'tesunit', '', b'0', 'Surat/tesunit.pdf', '', 1, '2017170042', '2017-06-11 14:01:25', '2017-06-11 14:01:25', '2017-06-11 00:00:06', NULL, NULL, '2017-06-11 00:00:06', '2017-06-11 00:00:06', '2017-06-11 14:01:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_PERLENGKAPAN_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_PERLENGKAPAN_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_PERLENGKAPAN_MT` (
  `ID_PERLENGKAPAN` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_PERLENGKAPAN` varchar(200) NOT NULL,
  `N_STOK` int(11) NOT NULL,
  `ID_KATEGORI_SPESIFIK` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERLENGKAPAN`),
  KEY `ID_KATEGORI_SPESIFIK` (`ID_KATEGORI_SPESIFIK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_PERLENGKAPAN_MT`:
--   `ID_KATEGORI_SPESIFIK`
--       `sima_kategori_spesifik_mt` -> `ID_KATEGORI_SPESIFIK`
--

--
-- Dumping data for table `SIMA_PERLENGKAPAN_MT`
--

INSERT INTO `SIMA_PERLENGKAPAN_MT` (`ID_PERLENGKAPAN`, `V_NAMA_PERLENGKAPAN`, `N_STOK`, `ID_KATEGORI_SPESIFIK`) VALUES
(1, 'Kursi Baru', 241, 1),
(2, 'Meja Murah Meriah', 380, 1),
(3, 'Chitose Kursi hahaha', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SIMA_TABEL_ACUAN_MT`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMA_TABEL_ACUAN_MT`;
CREATE TABLE IF NOT EXISTS `SIMA_TABEL_ACUAN_MT` (
  `ID_ACUAN` int(11) NOT NULL AUTO_INCREMENT,
  `V_JENIS_ACUAN` varchar(50) NOT NULL,
  `V_NILAI_ACUAN` varchar(5) NOT NULL,
  `V_LABEL_ACUAN` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ACUAN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `SIMA_TABEL_ACUAN_MT`:
--

--
-- Dumping data for table `SIMA_TABEL_ACUAN_MT`
--

INSERT INTO `SIMA_TABEL_ACUAN_MT` (`ID_ACUAN`, `V_JENIS_ACUAN`, `V_NILAI_ACUAN`, `V_LABEL_ACUAN`) VALUES
(1, 'jenis_glr', '1', 'Gedung'),
(2, 'jenis_glr', '2', 'Lantai'),
(3, 'jenis_glr', '3', 'Ruang'),
(4, 'jenis_glr', '4', 'Sub Ruang'),
(5, 'kondisi_aset', 'R', 'Rusak'),
(6, 'kondisi_aset', 'NT', 'Tidak Terawat'),
(7, 'kondisi_aset', 'T', 'Terawat');

-- --------------------------------------------------------

--
-- Table structure for table `sima_template_surat_mt`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `sima_template_surat_mt`;
CREATE TABLE IF NOT EXISTS `sima_template_surat_mt` (
  `ID_TEMPLATE` int(11) NOT NULL AUTO_INCREMENT,
  `V_NAMA_TEMPLATE` varchar(45) NOT NULL,
  `V_ISI_TEMPLATE` text,
  PRIMARY KEY (`ID_TEMPLATE`),
  UNIQUE KEY `V_NAMA_TEMPLATE_UNIQUE` (`V_NAMA_TEMPLATE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `sima_template_surat_mt`:
--

-- --------------------------------------------------------

--
-- Table structure for table `SIMPEG_MT_INDUK_PEG`
--
-- Creation: Jun 20, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `SIMPEG_MT_INDUK_PEG`;
CREATE TABLE IF NOT EXISTS `SIMPEG_MT_INDUK_PEG` (
  `V_NO_PEG` char(10) NOT NULL,
  `V_NAMA_PEG` varchar(200) DEFAULT NULL,
  `V_KODE_UNIT` char(4) DEFAULT NULL,
  `V_NAMA_UNIT` varchar(100) DEFAULT NULL,
  `V_EMAIL` varchar(100) DEFAULT NULL,
  `V_TELP_HP` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`V_NO_PEG`),
  KEY `fk_SIMPEG_MT_INDUK_PEG_GLB_MT_UNIT_idx` (`V_KODE_UNIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONS FOR TABLE `SIMPEG_MT_INDUK_PEG`:
--

--
-- Dumping data for table `SIMPEG_MT_INDUK_PEG`
--

INSERT INTO `SIMPEG_MT_INDUK_PEG` (`V_NO_PEG`, `V_NAMA_PEG`, `V_KODE_UNIT`, `V_NAMA_UNIT`, `V_EMAIL`, `V_TELP_HP`) VALUES
('2017170042', 'Testing', '0500', 'Biro Teknologi dan Informasi', 'hehehe@gmail.com', '085956006685');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_acuan_jenis_glr`
--
DROP VIEW IF EXISTS `vw_sima_acuan_jenis_glr`;
CREATE TABLE IF NOT EXISTS `vw_sima_acuan_jenis_glr` (
`ID_ACUAN` int(11)
,`V_JENIS_ACUAN` varchar(50)
,`V_NILAI_ACUAN` varchar(5)
,`V_LABEL_ACUAN_JENIS_GLR` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_acuan_kondisi`
--
DROP VIEW IF EXISTS `vw_sima_acuan_kondisi`;
CREATE TABLE IF NOT EXISTS `vw_sima_acuan_kondisi` (
`ID_ACUAN` int(11)
,`V_JENIS_ACUAN` varchar(50)
,`V_NILAI_ACUAN` varchar(5)
,`V_LABEL_ACUAN_KONDISI_ASET` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_barang`
--
DROP VIEW IF EXISTS `vw_sima_barang`;
CREATE TABLE IF NOT EXISTS `vw_sima_barang` (
`ID_BARANG` int(11)
,`ID_ASET` int(11)
,`V_KODE_BARANG` varchar(15)
,`V_NAMA_BARANG` varchar(100)
,`ID_KATEGORI` int(11)
,`V_NAMA_KATEGORI` varchar(200)
,`DT_TANGGAL_PEROLEHAN` date
,`ASET_LOKASI_ID` int(11)
,`N_STOK` int(11)
,`V_ALAMAT_LOKASI` varchar(200)
,`N_HARGA_PEROLEHAN` int(11)
,`N_UMUR_EKONOMIS` int(11)
,`V_MERK_SUPPLIER` varchar(100)
,`V_SUPPLIER` varchar(100)
,`V_KODE_GLR` varchar(8)
,`V_KETERANGAN` varchar(500)
,`ID_ACUAN` int(11)
,`V_LABEL_ACUAN_KONDISI_ASET` varchar(50)
,`B_STATUS_ASET` bit(1)
,`B_STATUS_PAKAI` bit(1)
,`V_NAMA_GAMBAR` varchar(150)
,`V_NAMA_UNIT` varchar(100)
,`V_KODE_UNIT` char(4)
,`ID_KATEGORI_SPESIFIK` int(11)
,`V_NAMA_KATEGORI_SPESIFIK` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_glr`
--
DROP VIEW IF EXISTS `vw_sima_glr`;
CREATE TABLE IF NOT EXISTS `vw_sima_glr` (
`ID_GLR` int(11)
,`V_KODE_GLR` varchar(8)
,`V_KODE_PARENT_GLR` varchar(8)
,`V_NAMA_PARENT_GLR` varchar(200)
,`V_NAMA_GLR` varchar(200)
,`V_ALAMAT_LOKASI` varchar(200)
,`ID_LOKASI` int(11)
,`N_DIM_PANJANG` int(11)
,`N_DIM_TINGGI` int(11)
,`N_DIM_LEBAR` int(11)
,`V_WARNA_DINDING` varchar(100)
,`N_JUMLAH_LANTAI` int(11)
,`DT_TANGGAL_PEROLEHAN` date
,`ASET_KATEGORI_ID` int(11)
,`ID_ASET` int(11)
,`N_HARGA_PEROLEHAN` int(11)
,`N_UMUR_EKONOMIS` int(11)
,`N_DAYA_TAMPUNG` int(11)
,`V_LABEL_ACUAN_KONDISI_ASET` varchar(50)
,`ID_KONDISI` int(11)
,`V_LABEL_ACUAN_JENIS_GLR` varchar(50)
,`ID_JENIS` int(11)
,`B_STATUS_PINJAM` bit(1)
,`V_NAMA_GAMBAR` varchar(250)
,`V_NAMA_UNIT` varchar(100)
,`V_KODE_UNIT` char(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_kendaraan`
--
DROP VIEW IF EXISTS `vw_sima_kendaraan`;
CREATE TABLE IF NOT EXISTS `vw_sima_kendaraan` (
`ID_KENDARAAN` int(11)
,`ID_ASET` int(11)
,`V_NO_MESIN` varchar(150)
,`V_NO_RANGKA` varchar(11)
,`V_NO_POLISI` varchar(10)
,`DT_TANGGAL_PEROLEHAN` date
,`N_HARGA_PEROLEHAN` int(11)
,`ASET_LOKASI_ID` int(11)
,`V_ALAMAT_LOKASI` varchar(200)
,`N_UMUR_EKONOMIS` int(11)
,`ASET_KATEGORI_ID` int(11)
,`V_TIPE_KENDARAAN` varchar(9)
,`N_TAHUN_MODEL` int(15)
,`N_KAPASITAS_PENUMPANG` int(11)
,`N_KAPASITAS_MESIN` int(11)
,`V_NOMOR_BPKB` varchar(500)
,`V_BAHAN_BAKAR` varchar(500)
,`ID_ACUAN` int(11)
,`V_LABEL_ACUAN_KONDISI_ASET` varchar(50)
,`V_NAMA_UNIT` varchar(100)
,`V_KODE_UNIT` char(4)
,`ID_KATEGORI_SPESIFIK` int(11)
,`V_NAMA_KATEGORI_SPESIFIK` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_peminjaman`
--
DROP VIEW IF EXISTS `vw_sima_peminjaman`;
CREATE TABLE IF NOT EXISTS `vw_sima_peminjaman` (
`ID_PEMINJAMAN` int(11)
,`V_KODE_PEMOHON_UNIT` char(10)
,`V_NAMA_PEMOHON_UNIT` varchar(200)
,`V_KODE_UNIT_PEMOHON` char(4)
,`ID_TEMPLATE` int(11)
,`V_NAMA_ACARA` varchar(45)
,`V_TEMPAT_KEGIATAN` varchar(45)
,`B_JENIS_ACARA` bit(1)
,`V_PATH_SURAT_ACARA` varchar(45)
,`V_NOMOR_SURAT` varchar(100)
,`N_STATUS_PEMINJAMAN` int(11)
,`V_KODE_PENANGGUNG_JAWAB_UNIT` char(10)
,`V_NAMA_PENANGGUNG_JAWAB_UNIT` varchar(200)
,`DT_WAKTU_MULAI_ACARA` datetime
,`DT_WAKTU_SELESAI_ACARA` datetime
,`DT_WAKTU_MULAI_PINJAM` datetime
,`V_KODE_PEMOHON_MAHASISWA` char(10)
,`V_NAMA_PEMOHON_MAHASISWA` varchar(100)
,`V_KODE_PENANGGUNG_JAWAB_MAHASISWA` char(10)
,`V_NAMA_PENANGGUNG_JAWAB_MAHASISWA` varchar(100)
,`DT_WAKTU_SELESAI_PINJAM` datetime
,`DT_WAKTU_PESAN` datetime
,`DT_WAKTU_KEMBALI_SEBENARNYA` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sima_pemohon`
--
DROP VIEW IF EXISTS `vw_sima_pemohon`;
CREATE TABLE IF NOT EXISTS `vw_sima_pemohon` (
`V_NO_PEMOHON` char(10)
,`V_NAMA_PEMOHON` varchar(200)
,`V_KODE_PRODI_UNIT_PEMOHON` char(4)
,`V_NAMA_UNIT_PRODI_PEMOHON` varchar(100)
,`V_EMAIL_PEMOHON` varchar(100)
,`V_TELP_HP_PEMOHON` varchar(30)
,`B_STATUS_PEMOHON` bigint(20)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_acuan_jenis_glr`
--
DROP TABLE IF EXISTS `vw_sima_acuan_jenis_glr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_acuan_jenis_glr`  AS  select `skm_sima_but`.`sima_tabel_acuan_mt`.`ID_ACUAN` AS `ID_ACUAN`,`skm_sima_but`.`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` AS `V_JENIS_ACUAN`,`skm_sima_but`.`sima_tabel_acuan_mt`.`V_NILAI_ACUAN` AS `V_NILAI_ACUAN`,`skm_sima_but`.`sima_tabel_acuan_mt`.`V_LABEL_ACUAN` AS `V_LABEL_ACUAN_JENIS_GLR` from `skm_sima_but`.`sima_tabel_acuan_mt` where (`skm_sima_but`.`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` = 'jenis_glr') ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_acuan_kondisi`
--
DROP TABLE IF EXISTS `vw_sima_acuan_kondisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_acuan_kondisi`  AS  select `skm_sima_but`.`sima_tabel_acuan_mt`.`ID_ACUAN` AS `ID_ACUAN`,`skm_sima_but`.`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` AS `V_JENIS_ACUAN`,`skm_sima_but`.`sima_tabel_acuan_mt`.`V_NILAI_ACUAN` AS `V_NILAI_ACUAN`,`skm_sima_but`.`sima_tabel_acuan_mt`.`V_LABEL_ACUAN` AS `V_LABEL_ACUAN_KONDISI_ASET` from `skm_sima_but`.`sima_tabel_acuan_mt` where (`skm_sima_but`.`sima_tabel_acuan_mt`.`V_JENIS_ACUAN` = 'kondisi_aset') ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_barang`
--
DROP TABLE IF EXISTS `vw_sima_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_barang`  AS  select `skm_sima_but`.`sima_barang_mt`.`ID_BARANG` AS `ID_BARANG`,`skm_sima_but`.`sima_barang_mt`.`ID_ASET` AS `ID_ASET`,`skm_sima_but`.`sima_barang_mt`.`V_KODE_BARANG` AS `V_KODE_BARANG`,`skm_sima_but`.`sima_barang_mt`.`V_NAMA_BARANG` AS `V_NAMA_BARANG`,`skm_sima_but`.`sima_kategori_mt`.`ID_KATEGORI` AS `ID_KATEGORI`,`skm_sima_but`.`sima_kategori_mt`.`V_NAMA_KATEGORI` AS `V_NAMA_KATEGORI`,`skm_sima_but`.`sima_aset_mt`.`DT_TANGGAL_PEROLEHAN` AS `DT_TANGGAL_PEROLEHAN`,`skm_sima_but`.`sima_aset_mt`.`ASET_LOKASI_ID` AS `ASET_LOKASI_ID`,`skm_sima_but`.`sima_aset_mt`.`N_STOK` AS `N_STOK`,`skm_sima_but`.`sima_lokasi_mt`.`V_ALAMAT_LOKASI` AS `V_ALAMAT_LOKASI`,`skm_sima_but`.`sima_aset_mt`.`N_HARGA_PEROLEHAN` AS `N_HARGA_PEROLEHAN`,`skm_sima_but`.`sima_aset_mt`.`N_UMUR_EKONOMIS` AS `N_UMUR_EKONOMIS`,`skm_sima_but`.`sima_barang_mt`.`V_MERK_SUPPLIER` AS `V_MERK_SUPPLIER`,`skm_sima_but`.`sima_barang_mt`.`V_SUPPLIER` AS `V_SUPPLIER`,`skm_sima_but`.`sima_glr_mt`.`V_KODE_GLR` AS `V_KODE_GLR`,`skm_sima_but`.`sima_barang_mt`.`V_KETERANGAN` AS `V_KETERANGAN`,`vw_sima_acuan_kondisi`.`ID_ACUAN` AS `ID_ACUAN`,`vw_sima_acuan_kondisi`.`V_LABEL_ACUAN_KONDISI_ASET` AS `V_LABEL_ACUAN_KONDISI_ASET`,`skm_sima_but`.`sima_barang_mt`.`B_STATUS_ASET` AS `B_STATUS_ASET`,`skm_sima_but`.`sima_barang_mt`.`B_STATUS_PAKAI` AS `B_STATUS_PAKAI`,`skm_sima_but`.`sima_barang_mt`.`V_NAMA_GAMBAR` AS `V_NAMA_GAMBAR`,`skm_sima_but`.`glb_mt_unit`.`V_NAMA_UNIT` AS `V_NAMA_UNIT`,`skm_sima_but`.`glb_mt_unit`.`V_KODE_UNIT` AS `V_KODE_UNIT`,`skm_sima_but`.`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` AS `ID_KATEGORI_SPESIFIK`,`skm_sima_but`.`sima_kategori_spesifik_mt`.`V_NAMA_KATEGORI_SPESIFIK` AS `V_NAMA_KATEGORI_SPESIFIK` from (((((((((`skm_sima_but`.`sima_aset_mt` join `skm_sima_but`.`sima_barang_mt` on((`skm_sima_but`.`sima_aset_mt`.`ID_ASET` = `skm_sima_but`.`sima_barang_mt`.`ID_ASET`))) join `skm_sima_but`.`sima_lokasi_mt` on((`skm_sima_but`.`sima_aset_mt`.`ASET_LOKASI_ID` = `skm_sima_but`.`sima_lokasi_mt`.`ID_LOKASI`))) join `skm_sima_but`.`sima_acuan_aset_dt` on((`skm_sima_but`.`sima_acuan_aset_dt`.`ID_ASET` = `skm_sima_but`.`sima_aset_mt`.`ID_ASET`))) join `skm_sima_but`.`vw_sima_acuan_kondisi` on((`vw_sima_acuan_kondisi`.`ID_ACUAN` = `skm_sima_but`.`sima_acuan_aset_dt`.`ID_ACUAN`))) join `skm_sima_but`.`sima_kategori_mt` on((`skm_sima_but`.`sima_aset_mt`.`ASET_KATEGORI_ID` = `skm_sima_but`.`sima_kategori_mt`.`ID_KATEGORI`))) join `skm_sima_but`.`glb_mt_unit` on((`skm_sima_but`.`glb_mt_unit`.`V_KODE_UNIT` = convert(`skm_sima_but`.`sima_aset_mt`.`UNIT_PEMILIK_ID` using utf8)))) left join `skm_sima_but`.`sima_fasilitas_glr_dt` on((`skm_sima_but`.`sima_fasilitas_glr_dt`.`ID_BARANG` = `skm_sima_but`.`sima_barang_mt`.`ID_BARANG`))) left join `skm_sima_but`.`sima_glr_mt` on((`skm_sima_but`.`sima_glr_mt`.`ID_GLR` = `skm_sima_but`.`sima_fasilitas_glr_dt`.`ID_GLR`))) join `skm_sima_but`.`sima_kategori_spesifik_mt` on((`skm_sima_but`.`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` = `skm_sima_but`.`sima_barang_mt`.`ID_KATEGORI_SPESIFIK`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_glr`
--
DROP TABLE IF EXISTS `vw_sima_glr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_glr`  AS  select distinct `skm_sima_but`.`sima_glr_mt`.`ID_GLR` AS `ID_GLR`,`skm_sima_but`.`sima_glr_mt`.`V_KODE_GLR` AS `V_KODE_GLR`,`parent_mt`.`V_KODE_GLR` AS `V_KODE_PARENT_GLR`,`parent_mt`.`V_NAMA_GLR` AS `V_NAMA_PARENT_GLR`,`skm_sima_but`.`sima_glr_mt`.`V_NAMA_GLR` AS `V_NAMA_GLR`,`skm_sima_but`.`sima_lokasi_mt`.`V_ALAMAT_LOKASI` AS `V_ALAMAT_LOKASI`,`skm_sima_but`.`sima_lokasi_mt`.`ID_LOKASI` AS `ID_LOKASI`,`skm_sima_but`.`sima_glr_mt`.`N_DIM_PANJANG` AS `N_DIM_PANJANG`,`skm_sima_but`.`sima_glr_mt`.`N_DIM_TINGGI` AS `N_DIM_TINGGI`,`skm_sima_but`.`sima_glr_mt`.`N_DIM_LEBAR` AS `N_DIM_LEBAR`,`skm_sima_but`.`sima_glr_mt`.`V_WARNA_DINDING` AS `V_WARNA_DINDING`,`skm_sima_but`.`sima_glr_mt`.`N_JUMLAH_LANTAI` AS `N_JUMLAH_LANTAI`,`skm_sima_but`.`sima_aset_mt`.`DT_TANGGAL_PEROLEHAN` AS `DT_TANGGAL_PEROLEHAN`,`skm_sima_but`.`sima_aset_mt`.`ASET_KATEGORI_ID` AS `ASET_KATEGORI_ID`,`skm_sima_but`.`sima_aset_mt`.`ID_ASET` AS `ID_ASET`,`skm_sima_but`.`sima_aset_mt`.`N_HARGA_PEROLEHAN` AS `N_HARGA_PEROLEHAN`,`skm_sima_but`.`sima_aset_mt`.`N_UMUR_EKONOMIS` AS `N_UMUR_EKONOMIS`,`skm_sima_but`.`sima_glr_mt`.`N_DAYA_TAMPUNG` AS `N_DAYA_TAMPUNG`,`vw_sima_acuan_kondisi`.`V_LABEL_ACUAN_KONDISI_ASET` AS `V_LABEL_ACUAN_KONDISI_ASET`,`vw_sima_acuan_kondisi`.`ID_ACUAN` AS `ID_KONDISI`,`vw_sima_acuan_jenis_glr`.`V_LABEL_ACUAN_JENIS_GLR` AS `V_LABEL_ACUAN_JENIS_GLR`,`vw_sima_acuan_jenis_glr`.`ID_ACUAN` AS `ID_JENIS`,`skm_sima_but`.`sima_glr_mt`.`B_STATUS_PINJAM` AS `B_STATUS_PINJAM`,`skm_sima_but`.`sima_glr_mt`.`V_NAMA_GAMBAR` AS `V_NAMA_GAMBAR`,`skm_sima_but`.`glb_mt_unit`.`V_NAMA_UNIT` AS `V_NAMA_UNIT`,`skm_sima_but`.`glb_mt_unit`.`V_KODE_UNIT` AS `V_KODE_UNIT` from ((((((((`skm_sima_but`.`sima_aset_mt` join `skm_sima_but`.`sima_glr_mt` on((`skm_sima_but`.`sima_aset_mt`.`ID_ASET` = `skm_sima_but`.`sima_glr_mt`.`ID_ASET`))) join `skm_sima_but`.`sima_lokasi_mt` on((`skm_sima_but`.`sima_aset_mt`.`ASET_LOKASI_ID` = `skm_sima_but`.`sima_lokasi_mt`.`ID_LOKASI`))) join `skm_sima_but`.`glb_mt_unit` on((`skm_sima_but`.`glb_mt_unit`.`V_KODE_UNIT` = convert(`skm_sima_but`.`sima_aset_mt`.`UNIT_PEMILIK_ID` using utf8)))) join `skm_sima_but`.`sima_acuan_aset_dt` `a` on((`skm_sima_but`.`sima_aset_mt`.`ID_ASET` = `a`.`ID_ASET`))) join `skm_sima_but`.`vw_sima_acuan_jenis_glr` on((`vw_sima_acuan_jenis_glr`.`ID_ACUAN` = `a`.`ID_ACUAN`))) join `skm_sima_but`.`sima_acuan_aset_dt` `b` on((`skm_sima_but`.`sima_aset_mt`.`ID_ASET` = `b`.`ID_ASET`))) join `skm_sima_but`.`vw_sima_acuan_kondisi` on((`vw_sima_acuan_kondisi`.`ID_ACUAN` = `b`.`ID_ACUAN`))) left join `skm_sima_but`.`sima_glr_mt` `parent_mt` on((`skm_sima_but`.`sima_glr_mt`.`PARENT_ID` = `parent_mt`.`ID_GLR`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_kendaraan`
--
DROP TABLE IF EXISTS `vw_sima_kendaraan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_kendaraan`  AS  select `skm_sima_but`.`sima_kendaraan_mt`.`ID_KENDARAAN` AS `ID_KENDARAAN`,`skm_sima_but`.`sima_kendaraan_mt`.`ID_ASET` AS `ID_ASET`,`skm_sima_but`.`sima_kendaraan_mt`.`V_NO_MESIN` AS `V_NO_MESIN`,`skm_sima_but`.`sima_kendaraan_mt`.`V_NO_RANGKA` AS `V_NO_RANGKA`,`skm_sima_but`.`sima_kendaraan_mt`.`V_NO_POLISI` AS `V_NO_POLISI`,`skm_sima_but`.`sima_aset_mt`.`DT_TANGGAL_PEROLEHAN` AS `DT_TANGGAL_PEROLEHAN`,`skm_sima_but`.`sima_aset_mt`.`N_HARGA_PEROLEHAN` AS `N_HARGA_PEROLEHAN`,`skm_sima_but`.`sima_aset_mt`.`ASET_LOKASI_ID` AS `ASET_LOKASI_ID`,`skm_sima_but`.`sima_lokasi_mt`.`V_ALAMAT_LOKASI` AS `V_ALAMAT_LOKASI`,`skm_sima_but`.`sima_aset_mt`.`N_UMUR_EKONOMIS` AS `N_UMUR_EKONOMIS`,`skm_sima_but`.`sima_aset_mt`.`ASET_KATEGORI_ID` AS `ASET_KATEGORI_ID`,`skm_sima_but`.`sima_kendaraan_mt`.`V_TIPE_KENDARAAN` AS `V_TIPE_KENDARAAN`,`skm_sima_but`.`sima_kendaraan_mt`.`N_TAHUN_MODEL` AS `N_TAHUN_MODEL`,`skm_sima_but`.`sima_kendaraan_mt`.`N_KAPASITAS_PENUMPANG` AS `N_KAPASITAS_PENUMPANG`,`skm_sima_but`.`sima_kendaraan_mt`.`N_KAPASITAS_MESIN` AS `N_KAPASITAS_MESIN`,`skm_sima_but`.`sima_kendaraan_mt`.`V_NOMOR_BPKB` AS `V_NOMOR_BPKB`,`skm_sima_but`.`sima_kendaraan_mt`.`V_BAHAN_BAKAR` AS `V_BAHAN_BAKAR`,`vw_sima_acuan_kondisi`.`ID_ACUAN` AS `ID_ACUAN`,`vw_sima_acuan_kondisi`.`V_LABEL_ACUAN_KONDISI_ASET` AS `V_LABEL_ACUAN_KONDISI_ASET`,`skm_sima_but`.`glb_mt_unit`.`V_NAMA_UNIT` AS `V_NAMA_UNIT`,`skm_sima_but`.`glb_mt_unit`.`V_KODE_UNIT` AS `V_KODE_UNIT`,`skm_sima_but`.`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` AS `ID_KATEGORI_SPESIFIK`,`skm_sima_but`.`sima_kategori_spesifik_mt`.`V_NAMA_KATEGORI_SPESIFIK` AS `V_NAMA_KATEGORI_SPESIFIK` from ((((((`skm_sima_but`.`sima_aset_mt` join `skm_sima_but`.`sima_kendaraan_mt` on((`skm_sima_but`.`sima_aset_mt`.`ID_ASET` = `skm_sima_but`.`sima_kendaraan_mt`.`ID_ASET`))) join `skm_sima_but`.`sima_lokasi_mt` on((`skm_sima_but`.`sima_aset_mt`.`ASET_LOKASI_ID` = `skm_sima_but`.`sima_lokasi_mt`.`ID_LOKASI`))) join `skm_sima_but`.`sima_acuan_aset_dt` on((`skm_sima_but`.`sima_acuan_aset_dt`.`ID_ASET` = `skm_sima_but`.`sima_aset_mt`.`ID_ASET`))) join `skm_sima_but`.`vw_sima_acuan_kondisi` on((`vw_sima_acuan_kondisi`.`ID_ACUAN` = `skm_sima_but`.`sima_acuan_aset_dt`.`ID_ACUAN`))) join `skm_sima_but`.`glb_mt_unit` on((`skm_sima_but`.`glb_mt_unit`.`V_KODE_UNIT` = convert(`skm_sima_but`.`sima_aset_mt`.`UNIT_PEMILIK_ID` using utf8)))) join `skm_sima_but`.`sima_kategori_spesifik_mt` on((`skm_sima_but`.`sima_kategori_spesifik_mt`.`ID_KATEGORI_SPESIFIK` = `skm_sima_but`.`sima_kendaraan_mt`.`ID_KATEGORI_SPESIFIK`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_peminjaman`
--
DROP TABLE IF EXISTS `vw_sima_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_peminjaman`  AS  select `skm_sima_but`.`sima_peminjaman_tr`.`ID_PEMINJAMAN` AS `ID_PEMINJAMAN`,`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PEMOHON_UNIT` AS `V_KODE_PEMOHON_UNIT`,`a`.`V_NAMA_PEG` AS `V_NAMA_PEMOHON_UNIT`,`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_UNIT_PEMOHON` AS `V_KODE_UNIT_PEMOHON`,`skm_sima_but`.`sima_peminjaman_tr`.`ID_TEMPLATE` AS `ID_TEMPLATE`,`skm_sima_but`.`sima_peminjaman_tr`.`V_NAMA_ACARA` AS `V_NAMA_ACARA`,`skm_sima_but`.`sima_peminjaman_tr`.`V_TEMPAT_KEGIATAN` AS `V_TEMPAT_KEGIATAN`,`skm_sima_but`.`sima_peminjaman_tr`.`B_JENIS_ACARA` AS `B_JENIS_ACARA`,`skm_sima_but`.`sima_peminjaman_tr`.`V_PATH_SURAT_ACARA` AS `V_PATH_SURAT_ACARA`,`skm_sima_but`.`sima_peminjaman_tr`.`V_NOMOR_SURAT` AS `V_NOMOR_SURAT`,`skm_sima_but`.`sima_peminjaman_tr`.`N_STATUS_PEMINJAMAN` AS `N_STATUS_PEMINJAMAN`,`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_UNIT` AS `V_KODE_PENANGGUNG_JAWAB_UNIT`,`b`.`V_NAMA_PEG` AS `V_NAMA_PENANGGUNG_JAWAB_UNIT`,`skm_sima_but`.`sima_peminjaman_tr`.`DT_WAKTU_MULAI_ACARA` AS `DT_WAKTU_MULAI_ACARA`,`skm_sima_but`.`sima_peminjaman_tr`.`DT_WAKTU_SELESAI_ACARA` AS `DT_WAKTU_SELESAI_ACARA`,`skm_sima_but`.`sima_peminjaman_tr`.`DT_WAKTU_MULAI_PINJAM` AS `DT_WAKTU_MULAI_PINJAM`,`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PEMOHON_MAHASISWA` AS `V_KODE_PEMOHON_MAHASISWA`,`c`.`V_NAMA` AS `V_NAMA_PEMOHON_MAHASISWA`,`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_MAHASISWA` AS `V_KODE_PENANGGUNG_JAWAB_MAHASISWA`,`d`.`V_NAMA` AS `V_NAMA_PENANGGUNG_JAWAB_MAHASISWA`,`skm_sima_but`.`sima_peminjaman_tr`.`DT_WAKTU_SELESAI_PINJAM` AS `DT_WAKTU_SELESAI_PINJAM`,`skm_sima_but`.`sima_peminjaman_tr`.`DT_WAKTU_PESAN` AS `DT_WAKTU_PESAN`,`skm_sima_but`.`sima_peminjaman_tr`.`DT_WAKTU_KEMBALI_SEBENARNYA` AS `DT_WAKTU_KEMBALI_SEBENARNYA` from ((((`skm_sima_but`.`sima_peminjaman_tr` left join `skm_sima_but`.`akdadm_mt_mhs` `c` on((`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PEMOHON_MAHASISWA` = `c`.`V_NPM`))) left join `skm_sima_but`.`simpeg_mt_induk_peg` `a` on((`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PEMOHON_UNIT` = `a`.`V_NO_PEG`))) left join `skm_sima_but`.`akdadm_mt_mhs` `d` on((`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_MAHASISWA` = `d`.`V_NPM`))) left join `skm_sima_but`.`simpeg_mt_induk_peg` `b` on((`skm_sima_but`.`sima_peminjaman_tr`.`V_KODE_PENANGGUNG_JAWAB_UNIT` = `b`.`V_NO_PEG`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sima_pemohon`
--
DROP TABLE IF EXISTS `vw_sima_pemohon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skm_sima_but`.`vw_sima_pemohon`  AS  select `skm_sima_but`.`akdadm_mt_mhs`.`V_NPM` AS `V_NO_PEMOHON`,`skm_sima_but`.`akdadm_mt_mhs`.`V_NAMA` AS `V_NAMA_PEMOHON`,`skm_sima_but`.`akdadm_mt_mhs`.`V_KODE_PRODI` AS `V_KODE_PRODI_UNIT_PEMOHON`,`skm_sima_but`.`akdadm_mt_mhs`.`V_NAMA_PRODI` AS `V_NAMA_UNIT_PRODI_PEMOHON`,`skm_sima_but`.`akdadm_mt_mhs`.`V_EMAIL` AS `V_EMAIL_PEMOHON`,`skm_sima_but`.`akdadm_mt_mhs`.`V_TELP_HP` AS `V_TELP_HP_PEMOHON`,1 AS `B_STATUS_PEMOHON` from `skm_sima_but`.`akdadm_mt_mhs` union select `skm_sima_but`.`simpeg_mt_induk_peg`.`V_NO_PEG` AS `V_NO_PEMOHON`,`skm_sima_but`.`simpeg_mt_induk_peg`.`V_NAMA_PEG` AS `V_NAMA_PEMOHON`,`skm_sima_but`.`simpeg_mt_induk_peg`.`V_KODE_UNIT` AS `V_KODE_PRODI_UNIT_PEMOHON`,`skm_sima_but`.`simpeg_mt_induk_peg`.`V_NAMA_UNIT` AS `V_NAMA_UNIT_PRODI_PEMOHON`,`skm_sima_but`.`simpeg_mt_induk_peg`.`V_EMAIL` AS `V_EMAIL_PEMOHON`,`skm_sima_but`.`simpeg_mt_induk_peg`.`V_TELP_HP` AS `V_TELP_HP_PEMOHON`,2 AS `B_STATUS_PEMOHON` from `skm_sima_but`.`simpeg_mt_induk_peg` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SIMA_ACUAN_ASET_DT`
--
ALTER TABLE `SIMA_ACUAN_ASET_DT`
  ADD CONSTRAINT `ACUAN_ASET_FK` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ACUAN_ASET_FK2` FOREIGN KEY (`ID_ACUAN`) REFERENCES `sima_tabel_acuan_mt` (`ID_ACUAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SIMA_ASET_MT`
--
ALTER TABLE `SIMA_ASET_MT`
  ADD CONSTRAINT `ASET_MT_IBFK_1` FOREIGN KEY (`ASET_KATEGORI_ID`) REFERENCES `sima_kategori_mt` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SIMA_BARANG_MT`
--
ALTER TABLE `SIMA_BARANG_MT`
  ADD CONSTRAINT `BARANG_IBFK_1` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  ADD CONSTRAINT `sima_barang_mt_ibfk_1` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`);

--
-- Constraints for table `SIMA_DETIL_PEMINJAMAN_DT`
--
ALTER TABLE `SIMA_DETIL_PEMINJAMAN_DT`
  ADD CONSTRAINT `FK_DETIL_PEMINJAMAN_DT_2` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  ADD CONSTRAINT `sima_detil_peminjaman_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`);

--
-- Constraints for table `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT`
--
ALTER TABLE `SIMA_DETIL_PEMINJAMAN_KATEGORI_SPESIFIK_DT`
  ADD CONSTRAINT `sima_detil_peminjaman_kategori_spesifik_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`),
  ADD CONSTRAINT `sima_detil_peminjaman_kategori_spesifik_dt_ibfk_2` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`);

--
-- Constraints for table `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT`
--
ALTER TABLE `SIMA_DETIL_PEMINJAMAN_PERLENGKAPAN_DT`
  ADD CONSTRAINT `sima_detil_peminjaman_perlengkapan_dt_ibfk_1` FOREIGN KEY (`ID_PERLENGKAPAN`) REFERENCES `sima_perlengkapan_mt` (`ID_PERLENGKAPAN`),
  ADD CONSTRAINT `sima_detil_peminjaman_perlengkapan_dt_ibfk_2` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`);

--
-- Constraints for table `SIMA_FASILITAS_GLR_DT`
--
ALTER TABLE `SIMA_FASILITAS_GLR_DT`
  ADD CONSTRAINT `FASILITAS_GLR_DT_IBFK_1` FOREIGN KEY (`ID_GLR`) REFERENCES `sima_glr_mt` (`ID_GLR`),
  ADD CONSTRAINT `FASILITAS_GLR_DT_IBFK_2` FOREIGN KEY (`ID_BARANG`) REFERENCES `sima_barang_mt` (`ID_BARANG`);

--
-- Constraints for table `SIMA_GLR_MT`
--
ALTER TABLE `SIMA_GLR_MT`
  ADD CONSTRAINT `GLR_MT_IBFK_2` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  ADD CONSTRAINT `sima_glr_mt_ibfk_1` FOREIGN KEY (`PARENT_ID`) REFERENCES `sima_glr_mt` (`ID_GLR`);

--
-- Constraints for table `SIMA_KENDARAAN_MT`
--
ALTER TABLE `SIMA_KENDARAAN_MT`
  ADD CONSTRAINT `KENDARAAN_IBFK_1` FOREIGN KEY (`ID_ASET`) REFERENCES `sima_aset_mt` (`ID_ASET`),
  ADD CONSTRAINT `sima_kendaraan_mt_ibfk_1` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`);

--
-- Constraints for table `SIMA_PEGAWAI_LUAR_BERTUGAS_DT`
--
ALTER TABLE `SIMA_PEGAWAI_LUAR_BERTUGAS_DT`
  ADD CONSTRAINT `sima_pegawai_luar_bertugas_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`);

--
-- Constraints for table `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT`
--
ALTER TABLE `SIMA_PEGAWAI_UNPAR_BERTUGAS_DT`
  ADD CONSTRAINT `FK_PEGAWAI_UNPAR_BERTUGAS_DT` FOREIGN KEY (`V_NO_PEG`) REFERENCES `SIMPEG_MT_INDUK_PEG` (`V_NO_PEG`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sima_pegawai_unpar_bertugas_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`);

--
-- Constraints for table `SIMA_PEMINJAMAN_TR`
--
ALTER TABLE `SIMA_PEMINJAMAN_TR`
  ADD CONSTRAINT `fk_PEMINJAMAN_MT_1` FOREIGN KEY (`V_KODE_PEMOHON_MAHASISWA`) REFERENCES `AKDADM_MT_MHS` (`V_NPM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEMINJAMAN_MT_2` FOREIGN KEY (`V_KODE_PEMOHON_UNIT`) REFERENCES `SIMPEG_MT_INDUK_PEG` (`V_NO_PEG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEMINJAMAN_MT_4` FOREIGN KEY (`V_KODE_PENANGGUNG_JAWAB_MAHASISWA`) REFERENCES `AKDADM_MT_MHS` (`V_NPM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEMINJAMAN_MT_5` FOREIGN KEY (`V_KODE_PENANGGUNG_JAWAB_UNIT`) REFERENCES `SIMPEG_MT_INDUK_PEG` (`V_NO_PEG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sima_peminjaman_tr_ibfk_1` FOREIGN KEY (`ID_TEMPLATE`) REFERENCES `sima_template_surat_mt` (`ID_TEMPLATE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SIMA_PERLENGKAPAN_MT`
--
ALTER TABLE `SIMA_PERLENGKAPAN_MT`
  ADD CONSTRAINT `sima_perlengkapan_mt_ibfk_1` FOREIGN KEY (`ID_KATEGORI_SPESIFIK`) REFERENCES `sima_kategori_spesifik_mt` (`ID_KATEGORI_SPESIFIK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
