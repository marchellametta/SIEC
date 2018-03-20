-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 01:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siec`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_peserta_ec` (IN `id_ec` INT)  NO SQL
select * from user where user.id_user in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_peserta_topik` (IN `id_topik` INT)  NO SQL
select user.*, a.status_hadir, a.status_bayar from user join (
    select peserta_topik.id_peserta,peserta_topik.status_hadir,peserta_topik.status_bayar from peserta_topik WHERE peserta_topik.id_topik=id_topik 
) as a on a.id_peserta = user.id_user$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ec_peserta` (IN `id_peserta` INT, IN `tahun` INT, IN `semester` INT)  NO SQL
select data_ec.id_ec, data_ec.tema_ec, data_ec.deskripsi, data_ec.gambar,data_ec.modul_pdf, data_ec.jenis_ec, data_ec.status_evaluasi from data_ec where data_ec.id_ec in (
        SELECT data_topik_peserta.id_ec from data_topik_peserta where data_topik_peserta.id_peserta=id_peserta
    ) AND data_ec.tahun_pelaksanaan=tahun AND data_ec.semester_pelaksanaan=semester$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_hasil_evaluasi_tema` (IN `id_ec` INT)  NO SQL
BEGIN
create temporary table tmp select 'soal1', SUM(if(soal1 = 5, 1, 0)) AS 'nilai_5', SUM(if(soal1 = 4, 1, 0)) AS 'nilai_4',SUM(if(soal1 = 3, 1, 0)) AS 'nilai_3',SUM(if(soal1 = 2, 1, 0)) AS 'nilai_2',SUM(if(soal1 = 1, 1, 0)) AS 'nilai_1' from evaluasi_tema where evaluasi_tema.id_ec=id_ec;
insert into tmp select 'soal2', SUM(if(soal2 = 5, 1, 0)) AS '5', SUM(if(soal2 = 4, 1, 0)) AS '4',SUM(if(soal2 = 3, 1, 0)) AS '3',SUM(if(soal2 = 2, 1, 0)) AS '2',SUM(if(soal2 = 1, 1, 0)) AS '1' from evaluasi_tema where evaluasi_tema.id_ec=id_ec;
insert into tmp select 'soal3', SUM(if(soal3 = 5, 1, 0)) AS '5', SUM(if(soal3 = 4, 1, 0)) AS '4',SUM(if(soal3 = 3, 1, 0)) AS '3',SUM(if(soal3 = 2, 1, 0)) AS '2',SUM(if(soal3 = 1, 1, 0)) AS '1' from evaluasi_tema where evaluasi_tema.id_ec=id_ec;
insert into tmp select 'soal4', SUM(if(soal4 = 5, 1, 0)) AS '5', SUM(if(soal4 = 4, 1, 0)) AS '4',SUM(if(soal4 = 3, 1, 0)) AS '3',SUM(if(soal4 = 2, 1, 0)) AS '2',SUM(if(soal4 = 1, 1, 0)) AS '1' from evaluasi_tema where evaluasi_tema.id_ec=id_ec;
insert into tmp select 'soal5', SUM(if(soal5 = 5, 1, 0)) AS '5', SUM(if(soal5 = 4, 1, 0)) AS '4',SUM(if(soal5 = 3, 1, 0)) AS '3',SUM(if(soal5 = 2, 1, 0)) AS '2',SUM(if(soal5 = 1, 1, 0)) AS '1' from evaluasi_tema where evaluasi_tema.id_ec=id_ec;
select * FROM tmp;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jadwal_ec` (IN `id_ec` INT)  NO SQL
select data_topik.id_topik, data_topik.id_ec, data_topik.nama_topik, data_topik.nama, jadwal.id_jadwal, jadwal.tanggal, jadwal.lokasi, jadwal.jam_mulai, jadwal.jam_selesai  from data_topik join jadwal on jadwal.id_topik=data_topik.id_topik where data_topik.id_ec=id_ec$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jumlah_peserta_ec` (IN `id_ec` INT)  NO SQL
select count(user.id_user) as jumlah_peserta from user where user.id_user in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jumlah_peserta_topik` (IN `id_topik` INT)  NO SQL
select count(user.id_user) as jumlah_peserta from user where user.id_user in (
    select peserta_topik.id_peserta from peserta_topik WHERE peserta_topik.id_topik=id_topik
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jumlah_peserta_topik_hadir` (IN `id_topik` INT)  NO SQL
select count(user.id_user) as jumlah_peserta from user where user.id_user in (
    select peserta_topik.id_peserta from peserta_topik WHERE peserta_topik.id_topik=id_topik and peserta_topik.status_hadir=1
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_persentase_kehadiran_peserta` (IN `id_ec` INT)  NO SQL
select a.id_peserta,user.nama, a.kehadiran/(select b.jumlah_topik from (select id_ec,count(id_topik) as jumlah_topik from topik_ec  where topik_ec.id_ec = id_ec GROUP BY id_ec) as b)*100 as persentase from (SELECT peserta_topik.id_peserta,SUM(peserta_topik.status_hadir) as kehadiran from peserta_topik GROUP BY id_peserta) as a join user on user.id_user=a.id_peserta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_peserta_lulus` (IN `batas_lulus` INT, IN `id` INT)  NO SQL
SELECT * FROM user WHERE id_user in (select a.id_peserta from (SELECT peserta_topik.id_peserta,SUM(peserta_topik.status_hadir) as kehadiran from peserta_topik GROUP BY id_peserta) as a
    where (a.kehadiran / (select b.jumlah_topik from (select id_ec,count(id_topik) as jumlah_topik from topik_ec GROUP BY id_ec) as b where b.id_ec=id))>=(batas_lulus/100))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_statistik_pekerjaan` (IN `id_ec` INT)  NO SQL
select user.pekerjaan, count(user.pekerjaan) as jumlah from user where user.id_user in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
)GROUP BY user.pekerjaan$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_tagihan_peserta_ec` (IN `id_ec` INT, IN `id_peserta` INT)  NO SQL
SELECT peserta_topik.id_peserta, IF(COUNT(peserta_topik.id_topik)=c.jumlah_topik,b.biaya,b.biaya_per_topik*COUNT(peserta_topik.id_topik)) as tagihan, IF (SUM(peserta_topik.status_bayar)<COUNT(peserta_topik.id_topik),'true','false') as bayar  from (
    SELECT topik_ec.id_topik,topik_ec.id_ec from topik_ec where topik_ec.id_ec=id_ec
)as a JOIN peserta_topik on peserta_topik.id_topik = a.id_topik JOIN (
    select ec.id_ec, ec.biaya, ec.biaya_per_topik from ec WHERE ec.id_ec=id_ec
) as b on a.id_ec =  b. id_ec JOIN (
    SELECT count(topik_ec.id_topik) as jumlah_topik, topik_ec.id_ec from topik_ec WHERE topik_ec.id_ec=id_ec
) as c on a.id_ec = c.id_ec where peserta_topik.id_peserta = id_peserta GROUP BY id_peserta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_topik_panitia` (IN `id_user` INT, IN `id_ec` INT)  NO SQL
select *from topik_ec where topik_ec.id_ec in (select panitia_ec.id_ec FROM panitia_ec where panitia_ec.id_ec=id_ec)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_topik_peserta` (IN `id_peserta` INT, IN `id_ec` INT)  NO SQL
select * from data_topik where data_topik.id_topik in (SELECT data_topik_peserta.id_topik from data_topik_peserta where data_topik_peserta.id_peserta=id_peserta and data_topik_peserta.id_ec=id_ec)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_topik_peserta_main` (IN `id_peserta` INT, IN `id_ec` INT)  NO SQL
SELECT * from data_topik WHERE data_topik.id_topik in (select id_topik from peserta_topik where peserta_topik.id_peserta=id_peserta) AND data_topik.id_ec=id_ec$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_peserta_ec` (IN `id_ec` INT, IN `nama` VARCHAR(100))  NO SQL
select * from user where user.id_user in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
) AND user.nama LIKE CONCAT('%', nama, '%')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `banner`) VALUES
(1, 'images/banner/63295.jpg'),
(2, 'images/banner/background.png'),
(3, 'images/banner/banner1.jpg'),
(4, 'images/banner/banner2.jpg'),
(5, 'images/banner/banner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi` varchar(5000) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`) VALUES
(2, 'a', 'b', 'images/berita/dummy2.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_ec`
-- (See below for the actual view)
--
CREATE TABLE `data_ec` (
`id_ec` int(11)
,`semester_pelaksanaan` int(1)
,`tahun_pelaksanaan` int(4)
,`tema_ec` varchar(500)
,`status_evaluasi` int(1)
,`status_peserta` int(1)
,`biaya` int(11)
,`gambar` varchar(100)
,`modul_pdf` varchar(250)
,`deskripsi` varchar(500)
,`kapasitas_peserta` int(11)
,`biaya_per_topik` int(11)
,`batas_lulus` int(11)
,`jenis_ec` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_ec_panitia`
-- (See below for the actual view)
--
CREATE TABLE `data_ec_panitia` (
`id_panitia` int(11)
,`id_ec` int(11)
,`id_jenis_ec` int(11)
,`semester_pelaksanaan` int(1)
,`tahun_pelaksanaan` int(4)
,`tema_ec` varchar(500)
,`status_evaluasi` int(1)
,`status_peserta` int(1)
,`biaya` int(11)
,`deskripsi` varchar(500)
,`gambar` varchar(100)
,`biaya_per_topik` int(11)
,`kapasitas_peserta` int(11)
,`batas_lulus` int(11)
,`modul_pdf` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_role_perms`
-- (See below for the actual view)
--
CREATE TABLE `data_role_perms` (
`role_id` int(11)
,`role_name` varchar(20)
,`perm_id` int(11)
,`perm_key` varchar(100)
,`perm_name` varchar(100)
,`value` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_topik`
-- (See below for the actual view)
--
CREATE TABLE `data_topik` (
`id_topik` int(11)
,`id_ec` int(11)
,`nama_topik` varchar(500)
,`nama` varchar(500)
,`tanggal` date
,`lokasi` varchar(100)
,`jam_mulai` varchar(10)
,`jam_selesai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_topik_peserta`
-- (See below for the actual view)
--
CREATE TABLE `data_topik_peserta` (
`id_peserta` int(11)
,`id_topik` int(11)
,`nama_topik` varchar(500)
,`log_panitia` int(11)
,`id_ec` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_user_roles`
-- (See below for the actual view)
--
CREATE TABLE `data_user_roles` (
`user_id` int(11)
,`role_id` int(11)
,`role_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `id_ec` int(11) NOT NULL,
  `id_jenis_ec` int(11) NOT NULL,
  `semester_pelaksanaan` int(1) NOT NULL,
  `tahun_pelaksanaan` int(4) NOT NULL,
  `tema_ec` varchar(500) NOT NULL,
  `status_evaluasi` int(1) NOT NULL,
  `status_peserta` int(1) NOT NULL,
  `biaya` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `biaya_per_topik` int(11) DEFAULT NULL,
  `kapasitas_peserta` int(11) DEFAULT NULL,
  `batas_lulus` int(11) DEFAULT NULL,
  `modul_pdf` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec`
--

INSERT INTO `ec` (`id_ec`, `id_jenis_ec`, `semester_pelaksanaan`, `tahun_pelaksanaan`, `tema_ec`, `status_evaluasi`, `status_peserta`, `biaya`, `deskripsi`, `gambar`, `biaya_per_topik`, `kapasitas_peserta`, `batas_lulus`, `modul_pdf`) VALUES
(1, 1, 1, 2018, 'Philosophy of Mind', 1, 2, 350000, 'alskjlsadjflajsdfljasldjflasjdlfjlasjf', 'images/mind.jpg', 40000, NULL, 20, 'Modul/Skripsi_2.pdf'),
(2, 2, 1, 2018, 'Nasib Agama Lokal', 2, 2, 400000, 'lsadfjalskdjflaksj', 'images/dummy.jpg', 50000, 10, NULL, NULL),
(5, 2, 2, 2017, 'Udah Lewat', 1, 1, 300000, 'tes history', 'images/dummy3.jpg', NULL, NULL, NULL, NULL),
(6, 1, 2, 2018, 'Akan Dibuka', 1, 2, 400000, 'tes akan dibuka', 'images/dummy2.png', 50000, 100, NULL, NULL),
(8, 3, 2, 2018, 'Liturgi', 2, 2, 375000, 'Coba aja', '', 2, 2, NULL, ''),
(9, 1, 2, 2018, 'Cobain upload', 2, 2, 375000, 'asdasd', 'images/Cobain_upload.jpg', 50000, 125, NULL, 'Modul/Cobain_upload.pdf'),
(19, 1, 2, 2018, 'Skripsi 2', 1, 1, 425000, 'Kelas ini untuk coba tambah dan edit', 'images/Skripsi_2.png', NULL, 100, NULL, 'Modul/Skripsi_2.pdf'),
(20, 1, 1, 2018, 'test pdf', 1, 1, 20000, 'tes upload', 'images/test_pdf.png', 0, 0, NULL, 'Modul/test_pdf.pdf'),
(21, 1, 1, 0, '', 1, 1, 0, '', '', 0, 0, NULL, 'Modul/Gmail_-_Your_trip_with_GO-JEK_on_Friday,_16_March_2018-1_(1).pdf'),
(22, 1, 1, 0, 'abcd', 1, 1, 0, '', 'images/abcd.jpg', 0, 0, NULL, 'Modul/abcd.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_ecf`
--

CREATE TABLE `evaluasi_ecf` (
  `id_ec` int(11) NOT NULL,
  `soal1` varchar(1000) NOT NULL,
  `soal2` varchar(1000) NOT NULL,
  `soal3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_ecf`
--

INSERT INTO `evaluasi_ecf` (`id_ec`, `soal1`, `soal2`, `soal3`) VALUES
(1, 'askdfjalsdjflkj', 'klasjdfklasjdfklajklsjdfl', 'aslkdjflajsflkdjfkljaljdljafkljsldjfklasjdlkfaj');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_tema`
--

CREATE TABLE `evaluasi_tema` (
  `id_ec` int(11) NOT NULL,
  `soal1` int(11) NOT NULL,
  `soal2` int(11) NOT NULL,
  `soal3` int(11) NOT NULL,
  `soal4` int(11) NOT NULL,
  `soal5` int(11) NOT NULL,
  `saran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_tema`
--

INSERT INTO `evaluasi_tema` (`id_ec`, `soal1`, `soal2`, `soal3`, `soal4`, `soal5`, `saran`) VALUES
(2, 5, 5, 5, 5, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_topik`
--

CREATE TABLE `evaluasi_topik` (
  `id_topik` int(11) NOT NULL,
  `soal1` int(1) NOT NULL,
  `soal2` int(1) NOT NULL,
  `soal3` int(1) NOT NULL,
  `soal4` int(1) NOT NULL,
  `soal5` int(1) NOT NULL,
  `saran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_topik`
--

INSERT INTO `evaluasi_topik` (`id_topik`, `soal1`, `soal2`, `soal3`, `soal4`, `soal5`, `saran`) VALUES
(3, 5, 5, 5, 5, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_selesai` varchar(10) NOT NULL,
  `log_panitia` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `lokasi`, `jam_mulai`, `jam_selesai`, `log_panitia`, `id_topik`) VALUES
(6, '2018-03-10', 'Ruang Auditorium', '2018-03-10', '2018-03-10', 1, 1),
(7, '2018-03-17', 'Ruang 10317', '2018-03-17', '2018-03-17', 1, 2),
(8, '2018-03-10', 'Ruang 9122', '2018-03-10', '2018-03-10', 1, 3),
(9, '2018-03-10', 'Ruang Auditorium', '2018-03-10', '2018-03-10', 1, 4),
(10, '2018-03-10', 'Ruang Auditorium', '2018-03-10', '2018-03-10', 1, 5),
(15, '2018-03-20', 'Rumah', '3:36 PM', '3:36 PM', 0, 13),
(17, '2018-03-20', 'Rumah', '3:58 PM', '3:58 PM', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_topik`
--

CREATE TABLE `jadwal_topik` (
  `id_jadwal` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenisec`
--

CREATE TABLE `jenisec` (
  `id_jenis_ec` int(11) NOT NULL,
  `jenis_ec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisec`
--

INSERT INTO `jenisec` (`id_jenis_ec`, `jenis_ec`) VALUES
(1, 'Extension Course Filsafat'),
(2, 'Extension Course Budaya dan Religi'),
(3, 'Extension Course Liturgi');

-- --------------------------------------------------------

--
-- Table structure for table `narasumber`
--

CREATE TABLE `narasumber` (
  `id_narasumber` int(11) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `lembaga` varchar(250) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narasumber`
--

INSERT INTO `narasumber` (`id_narasumber`, `profesi`, `lembaga`, `jabatan`, `nama`) VALUES
(1, 'Dosen', 'UNPAR', 'Dosen', 'Siapa');

-- --------------------------------------------------------

--
-- Table structure for table `narasumber_topik`
--

CREATE TABLE `narasumber_topik` (
  `id_narasumber` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panitia_ec`
--

CREATE TABLE `panitia_ec` (
  `id_panitia` int(11) NOT NULL,
  `id_ec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia_ec`
--

INSERT INTO `panitia_ec` (`id_panitia`, `id_ec`) VALUES
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perm_data`
--

CREATE TABLE `perm_data` (
  `id` int(11) NOT NULL,
  `perm_key` varchar(100) NOT NULL,
  `perm_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perm_data`
--

INSERT INTO `perm_data` (`id`, `perm_key`, `perm_name`) VALUES
(1, 'kelas_aktif', 'kelas'),
(2, 'kelas_riwayat', 'riwayat kelas'),
(3, 'kelas_mendatang', 'kelas mendatang'),
(4, 'kelas-saya', 'kelas saya'),
(5, 'kelas-saya_detail', 'detail kelas saya'),
(6, 'profil', 'profil'),
(7, 'profil_editProfil', 'edit profil'),
(8, 'profil_editPassword', 'edit password'),
(9, 'kelas_absensi', 'absensi'),
(10, 'kelas_absensi_daftar-topik', 'list absensi'),
(11, 'kelas_pembayaran', 'pembayaran'),
(12, 'kelas_cetak-sertifikat', 'sertifikat'),
(13, 'peserta_search', 'search peserta'),
(14, 'tambahkelas', 'tambah kelas'),
(15, 'kelas-saya_isi-evaluasi', 'isi evaluasi tema umum'),
(16, 'kelas-saya_isi-evaluasi_topik', 'isi evaluasi topik mingguan'),
(17, 'kelas_laporan', 'Laporan'),
(18, 'kelas_laporan_unduh', 'Unduh Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_topik`
--

CREATE TABLE `peserta_topik` (
  `id_topik` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `status_hadir` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_topik`
--

INSERT INTO `peserta_topik` (`id_topik`, `id_peserta`, `status_hadir`, `status_bayar`) VALUES
(1, 8, 0, 0),
(2, 8, 0, 0),
(1, 9, 0, 0),
(2, 9, 0, 0),
(3, 9, 0, 1),
(1, 10, 0, 0),
(2, 10, 0, 0),
(3, 10, 0, 0),
(1, 7, 1, 0),
(5, 9, 0, 1),
(3, 11, 0, 0),
(5, 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_data`
--

CREATE TABLE `role_data` (
  `id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_data`
--

INSERT INTO `role_data` (`id`, `role_name`) VALUES
(1, 'panitia'),
(2, 'peserta');

-- --------------------------------------------------------

--
-- Table structure for table `role_perms`
--

CREATE TABLE `role_perms` (
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_perms`
--

INSERT INTO `role_perms` (`role_id`, `perm_id`, `value`, `id`) VALUES
(1, 1, 1, 0),
(1, 2, 1, 0),
(1, 3, 1, 0),
(1, 9, 1, 0),
(1, 10, 1, 0),
(1, 11, 1, 0),
(1, 12, 1, 0),
(1, 13, 1, 0),
(1, 14, 1, 0),
(2, 4, 1, 0),
(2, 5, 1, 0),
(2, 6, 1, 0),
(2, 7, 1, 0),
(2, 8, 1, 0),
(2, 15, 1, 0),
(2, 16, 1, 0),
(1, 17, 1, 0),
(1, 18, 1, 0),
(1, 6, 1, 0),
(1, 7, 1, 0),
(1, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `nama_top` int(11) NOT NULL,
  `nama_left` int(11) NOT NULL,
  `peran_left` int(11) NOT NULL,
  `peran_top` int(11) NOT NULL,
  `id_ec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `gambar`, `nama_top`, `nama_left`, `peran_left`, `peran_top`, `id_ec`) VALUES
(11, 'images/sertifikat/Philosophy_of_Mind-P_20180226_174750.jpg', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topik_ec`
--

CREATE TABLE `topik_ec` (
  `id_topik` int(11) NOT NULL,
  `nama_topik` varchar(500) NOT NULL,
  `log_panitia` int(11) NOT NULL,
  `id_ec` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik_ec`
--

INSERT INTO `topik_ec` (`id_topik`, `nama_topik`, `log_panitia`, `id_ec`, `nama`) VALUES
(1, 'Topik 1', 1, 1, ''),
(2, 'Topik 2', 1, 1, ''),
(3, 'Topik 1', 1, 2, ''),
(4, 'Topik 3', 1, 1, ''),
(5, 'Topik 2', 1, 2, ''),
(7, 'a', 0, 8, ''),
(8, 'b', 0, 9, ''),
(13, 'Cobain tambah', 0, 19, ''),
(16, 'Cobain lagi', 0, 19, 'Acel');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `lembaga` varchar(200) NOT NULL,
  `pendidikan_terakhir` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `agama` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `pekerjaan`, `lembaga`, `pendidikan_terakhir`, `kota`, `no_hp`, `email`, `password`, `agama`) VALUES
(7, 'Marchella Metta', 'Taman Kopo Indah 2', 'Mahasiswa', 'UNPAR', 2, 'Bandung', '087822714078', 'morningracoon@gmail.com', '$2y$10$b0qq18SNS/Pjz.ZxRy8YVuNVAGhrbgt4DRstFZ/8OdYXJM3AJ3eBy', 2),
(8, 'Kelvin Tandika', 'Taman Holis Indah', 'Mahasiswa', 'UNPAR', 1, 'Bandung', '087822714078', 'kelvin@mail.com', '$2y$10$CgXW5YHHbM/00WfbskrhHeVHuUfcYH7.32ea/4hjECaDg7gP1oz4S', 0),
(9, 'abc', 'def', 'Pegawai', 'UNPAR', 3, 'Bandung', '087822714078', 'abc@mail.com', '$2y$10$/gToF/ukTzXfy4fPJ8Gup.zSi.u.QUyWg/VDw7BvBWsKknDsgFRhC', 0),
(10, 'Roxy', 'Taman Kopo', 'Mahasiswa', 'UNPAR', 1, 'Bandung', '087822714078', 'roxy@mail.com', '$2y$10$V7om3UT8NRIrjWgBHZBsGuJTr.mP4/stRwQQcnTfQ/R096AnGvoqG', 0),
(11, 'Mitchellina', 'Kopo', 'Karyawan', 'Deloitte', 3, 'Bandung', '087821810243', 'iim@mail.com', '$2y$10$Rd5881KwdZjWMIte4uzn4OZPoAufa30/G7E.lT6XeRuJ4eN.PbF8a', 1),
(15, 'panitia', 'FF', 'Karyawan', 'FF', 3, 'Bandung', '087822714078', 'panitia@mail.com', '$2y$10$7QUUy/jJJEMx2A/IHgdC.udSyUudTh7m3OaXlhmf3ATQ0SoH4lK7K', 1),
(16, 'panitia', 'FF', 'Karyawan', 'UNPAR', 3, 'Bandung', '087822714078', 'panitiaa@mail.com', '$2y$10$r20TJKtZ5MqcoEcEKw2XVOxIDlCOovYd5J20GXk6cJiKTUaB6TvX2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(8, 2),
(9, 2),
(10, 2),
(7, 1),
(7, 2),
(11, 2),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Structure for view `data_ec`
--
DROP TABLE IF EXISTS `data_ec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_ec`  AS  select `ec`.`id_ec` AS `id_ec`,`ec`.`semester_pelaksanaan` AS `semester_pelaksanaan`,`ec`.`tahun_pelaksanaan` AS `tahun_pelaksanaan`,`ec`.`tema_ec` AS `tema_ec`,`ec`.`status_evaluasi` AS `status_evaluasi`,`ec`.`status_peserta` AS `status_peserta`,`ec`.`biaya` AS `biaya`,`ec`.`gambar` AS `gambar`,`ec`.`modul_pdf` AS `modul_pdf`,`ec`.`deskripsi` AS `deskripsi`,`ec`.`kapasitas_peserta` AS `kapasitas_peserta`,`ec`.`biaya_per_topik` AS `biaya_per_topik`,`ec`.`batas_lulus` AS `batas_lulus`,`jenisec`.`jenis_ec` AS `jenis_ec` from (`ec` join `jenisec` on((`ec`.`id_jenis_ec` = `jenisec`.`id_jenis_ec`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_ec_panitia`
--
DROP TABLE IF EXISTS `data_ec_panitia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_ec_panitia`  AS  select `panitia_ec`.`id_panitia` AS `id_panitia`,`ec`.`id_ec` AS `id_ec`,`ec`.`id_jenis_ec` AS `id_jenis_ec`,`ec`.`semester_pelaksanaan` AS `semester_pelaksanaan`,`ec`.`tahun_pelaksanaan` AS `tahun_pelaksanaan`,`ec`.`tema_ec` AS `tema_ec`,`ec`.`status_evaluasi` AS `status_evaluasi`,`ec`.`status_peserta` AS `status_peserta`,`ec`.`biaya` AS `biaya`,`ec`.`deskripsi` AS `deskripsi`,`ec`.`gambar` AS `gambar`,`ec`.`biaya_per_topik` AS `biaya_per_topik`,`ec`.`kapasitas_peserta` AS `kapasitas_peserta`,`ec`.`batas_lulus` AS `batas_lulus`,`ec`.`modul_pdf` AS `modul_pdf` from (`panitia_ec` join `ec` on((`panitia_ec`.`id_ec` = `ec`.`id_ec`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_role_perms`
--
DROP TABLE IF EXISTS `data_role_perms`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_role_perms`  AS  select `role_data`.`id` AS `role_id`,`role_data`.`role_name` AS `role_name`,`perm_data`.`id` AS `perm_id`,`perm_data`.`perm_key` AS `perm_key`,`perm_data`.`perm_name` AS `perm_name`,`role_perms`.`value` AS `value` from ((`role_data` join `role_perms` on((`role_data`.`id` = `role_perms`.`role_id`))) join `perm_data` on((`role_perms`.`perm_id` = `perm_data`.`id`))) order by `role_data`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `data_topik`
--
DROP TABLE IF EXISTS `data_topik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_topik`  AS  select `topik_ec`.`id_topik` AS `id_topik`,`topik_ec`.`id_ec` AS `id_ec`,`topik_ec`.`nama_topik` AS `nama_topik`,`topik_ec`.`nama` AS `nama`,`jadwal`.`tanggal` AS `tanggal`,`jadwal`.`lokasi` AS `lokasi`,`jadwal`.`jam_mulai` AS `jam_mulai`,`jadwal`.`jam_selesai` AS `jam_selesai` from (`jadwal` join `topik_ec` on((`jadwal`.`id_topik` = `topik_ec`.`id_topik`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_topik_peserta`
--
DROP TABLE IF EXISTS `data_topik_peserta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_topik_peserta`  AS  select `peserta_topik`.`id_peserta` AS `id_peserta`,`topik_ec`.`id_topik` AS `id_topik`,`topik_ec`.`nama_topik` AS `nama_topik`,`topik_ec`.`log_panitia` AS `log_panitia`,`topik_ec`.`id_ec` AS `id_ec` from (`peserta_topik` join `topik_ec` on((`peserta_topik`.`id_topik` = `topik_ec`.`id_topik`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_user_roles`
--
DROP TABLE IF EXISTS `data_user_roles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_user_roles`  AS  select `user_roles`.`user_id` AS `user_id`,`role_data`.`id` AS `role_id`,`role_data`.`role_name` AS `role_name` from (`user_roles` join `role_data` on((`user_roles`.`role_id` = `role_data`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id_ec`),
  ADD KEY `id_jenis_ec` (`id_jenis_ec`);

--
-- Indexes for table `evaluasi_ecf`
--
ALTER TABLE `evaluasi_ecf`
  ADD KEY `id_ec` (`id_ec`);

--
-- Indexes for table `evaluasi_tema`
--
ALTER TABLE `evaluasi_tema`
  ADD KEY `id_ec` (`id_ec`);

--
-- Indexes for table `evaluasi_topik`
--
ALTER TABLE `evaluasi_topik`
  ADD KEY `id_topik` (`id_topik`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `log_panitia` (`log_panitia`),
  ADD KEY `id_topik` (`id_topik`);

--
-- Indexes for table `jadwal_topik`
--
ALTER TABLE `jadwal_topik`
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_topik` (`id_topik`);

--
-- Indexes for table `jenisec`
--
ALTER TABLE `jenisec`
  ADD PRIMARY KEY (`id_jenis_ec`);

--
-- Indexes for table `narasumber`
--
ALTER TABLE `narasumber`
  ADD PRIMARY KEY (`id_narasumber`);

--
-- Indexes for table `narasumber_topik`
--
ALTER TABLE `narasumber_topik`
  ADD KEY `id_topik` (`id_topik`),
  ADD KEY `id_narasumber` (`id_narasumber`);

--
-- Indexes for table `panitia_ec`
--
ALTER TABLE `panitia_ec`
  ADD KEY `id_ec` (`id_ec`),
  ADD KEY `id_panitia` (`id_panitia`);

--
-- Indexes for table `perm_data`
--
ALTER TABLE `perm_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perm_key` (`perm_key`);

--
-- Indexes for table `peserta_topik`
--
ALTER TABLE `peserta_topik`
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_topik` (`id_topik`);

--
-- Indexes for table `role_data`
--
ALTER TABLE `role_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_perms`
--
ALTER TABLE `role_perms`
  ADD KEY `perm_id` (`perm_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_ec` (`id_ec`);

--
-- Indexes for table `topik_ec`
--
ALTER TABLE `topik_ec`
  ADD PRIMARY KEY (`id_topik`),
  ADD KEY `id_ec` (`id_ec`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ec`
--
ALTER TABLE `ec`
  MODIFY `id_ec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenisec`
--
ALTER TABLE `jenisec`
  MODIFY `id_jenis_ec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `narasumber`
--
ALTER TABLE `narasumber`
  MODIFY `id_narasumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perm_data`
--
ALTER TABLE `perm_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role_data`
--
ALTER TABLE `role_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `topik_ec`
--
ALTER TABLE `topik_ec`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ec`
--
ALTER TABLE `ec`
  ADD CONSTRAINT `jenis_ec_constraint` FOREIGN KEY (`id_jenis_ec`) REFERENCES `jenisec` (`id_jenis_ec`);

--
-- Constraints for table `evaluasi_ecf`
--
ALTER TABLE `evaluasi_ecf`
  ADD CONSTRAINT `evaluasi_ecf_ibfk_1` FOREIGN KEY (`id_ec`) REFERENCES `ec` (`id_ec`);

--
-- Constraints for table `evaluasi_tema`
--
ALTER TABLE `evaluasi_tema`
  ADD CONSTRAINT `evaluasi_tema_ibfk_1` FOREIGN KEY (`id_ec`) REFERENCES `ec` (`id_ec`);

--
-- Constraints for table `evaluasi_topik`
--
ALTER TABLE `evaluasi_topik`
  ADD CONSTRAINT `evaluasi_topik_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `topik_ec` (`id_topik`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `topik_ec` (`id_topik`);

--
-- Constraints for table `jadwal_topik`
--
ALTER TABLE `jadwal_topik`
  ADD CONSTRAINT `jadwal_constraint` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `jadwal_topik_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `topik_ec` (`id_topik`);

--
-- Constraints for table `narasumber_topik`
--
ALTER TABLE `narasumber_topik`
  ADD CONSTRAINT `narasumber_constraint` FOREIGN KEY (`id_narasumber`) REFERENCES `narasumber` (`id_narasumber`),
  ADD CONSTRAINT `topik_constraint` FOREIGN KEY (`id_topik`) REFERENCES `topik_ec` (`id_topik`);

--
-- Constraints for table `panitia_ec`
--
ALTER TABLE `panitia_ec`
  ADD CONSTRAINT `panitia_ec_ibfk_1` FOREIGN KEY (`id_ec`) REFERENCES `ec` (`id_ec`),
  ADD CONSTRAINT `panitia_ec_ibfk_2` FOREIGN KEY (`id_panitia`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `peserta_topik`
--
ALTER TABLE `peserta_topik`
  ADD CONSTRAINT `peserta_topik_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peserta_topik_ibfk_2` FOREIGN KEY (`id_topik`) REFERENCES `topik_ec` (`id_topik`);

--
-- Constraints for table `role_perms`
--
ALTER TABLE `role_perms`
  ADD CONSTRAINT `role_perms_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `perm_data` (`id`),
  ADD CONSTRAINT `role_perms_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role_data` (`id`);

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`id_ec`) REFERENCES `ec` (`id_ec`);

--
-- Constraints for table `topik_ec`
--
ALTER TABLE `topik_ec`
  ADD CONSTRAINT `id_ec_constraint` FOREIGN KEY (`id_ec`) REFERENCES `ec` (`id_ec`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_data` (`id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
