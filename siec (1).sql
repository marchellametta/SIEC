-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 03:23 PM
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
select * from peserta where peserta.id_peserta in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_peserta_topik` (IN `id_topik` INT)  NO SQL
select peserta.*, a.status_hadir, a.status_bayar from peserta join (
    select peserta_topik.id_peserta,peserta_topik.status_hadir,peserta_topik.status_bayar from peserta_topik WHERE peserta_topik.id_topik=id_topik 
) as a on a.id_peserta = peserta.id_peserta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ec_peserta` (IN `id_peserta` INT, IN `tahun` INT)  NO SQL
select data_ec.id_ec, data_ec.tema_ec, data_ec.deskripsi, data_ec.gambar, data_ec.jenis_ec, data_ec.status_evaluasi from data_ec where data_ec.id_ec in (
        select topik_ec.id_ec from topik_ec where topik_ec.id_topik in(
            select id_topik from peserta_topik where peserta_topik.id_peserta=id_peserta
        )
    ) AND data_ec.tahun_pelaksanaan=tahun$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jadwal_ec` (IN `id_ec` INT)  NO SQL
select data_topik.id_topik, data_topik.id_ec, data_topik.nama_topik, data_topik.nama, jadwal.id_jadwal, jadwal.tanggal, jadwal.lokasi, jadwal.jam_mulai, jadwal.jam_selesai  from data_topik join jadwal on jadwal.id_topik=data_topik.id_topik where data_topik.id_ec=id_ec$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jumlah_peserta_ec` (IN `id_ec` INT)  NO SQL
select count(peserta.id_peserta) as jumlah_peserta from peserta where peserta.id_peserta in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_jumlah_peserta_topik` (IN `id_topik` INT)  NO SQL
select count(peserta.id_peserta) as jumlah_peserta from peserta where peserta.id_peserta in (
    select peserta_topik.id_peserta from peserta_topik WHERE peserta_topik.id_topik=id_topik
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_peserta_lulus` (IN `batas_lulus` INT, IN `id` INT)  NO SQL
SELECT * FROM peserta WHERE id_peserta in (select a.id_peserta from (SELECT peserta_topik.id_peserta,SUM(peserta_topik.status_hadir) as kehadiran from peserta_topik GROUP BY id_peserta) as a
    where (a.kehadiran / (select b.jumlah_topik from (select id_ec,count(id_topik) as jumlah_topik from topik_ec GROUP BY id_ec) as b where b.id_ec=id))>=(batas_lulus/100))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_topik_peserta` (IN `id_peserta` INT, IN `id_ec` INT)  NO SQL
select * from data_topik where data_topik.id_topik in (SELECT a.id_topik FROM (SELECT topik_ec.id_topik, topik_ec.id_ec from topik_ec WHERE topik_ec.id_topik in (select id_topik from peserta_topik where peserta_topik.id_peserta=id_peserta)) as a join (SELECT ec.id_ec FROM ec WHERE ec.id_ec=id_ec) as b on a.id_ec = b.id_ec)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_topik_peserta_main` (IN `id_peserta` INT, IN `id_ec` INT)  NO SQL
SELECT * from data_topik WHERE data_topik.id_topik in (select id_topik from peserta_topik where peserta_topik.id_peserta=id_peserta) AND data_topik.id_ec=id_ec$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_peserta_ec` (IN `id_ec` INT, IN `nama` VARCHAR(100))  NO SQL
select * from peserta where peserta.id_peserta in (
    select peserta_topik.id_peserta from peserta_topik WHERE id_topik in (
       select topik_ec.id_topik from topik_ec where topik_ec.id_ec=id_ec
    )
) AND peserta.nama LIKE CONCAT('%', nama, '%')$$

DELIMITER ;

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
,`deskripsi` varchar(500)
,`kapasitas_peserta` int(11)
,`biaya_per_topik` int(11)
,`batas_lulus` int(11)
,`jenis_ec` varchar(100)
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
,`nama` varchar(200)
,`profesi` varchar(100)
,`lembaga` varchar(250)
,`jabatan` varchar(100)
,`tanggal` date
,`lokasi` varchar(100)
,`jam_mulai` datetime
,`jam_selesai` datetime
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
  `batas_lulus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec`
--

INSERT INTO `ec` (`id_ec`, `id_jenis_ec`, `semester_pelaksanaan`, `tahun_pelaksanaan`, `tema_ec`, `status_evaluasi`, `status_peserta`, `biaya`, `deskripsi`, `gambar`, `biaya_per_topik`, `kapasitas_peserta`, `batas_lulus`) VALUES
(1, 1, 1, 2018, 'Philosophy of Mind', 1, 2, 350000, 'alskjlsadjflajsdfljasldjflasjdlfjlasjf', 'mind.jpg', 40000, NULL, 20),
(2, 2, 1, 2018, 'Nasib Agama Lokal', 2, 2, 400000, 'lsadfjalskdjflaksj', 'dummy.jpg', 50000, 10, NULL),
(5, 2, 2, 2017, 'Udah Lewat', 1, 1, 300000, 'tes history', 'dummy3.jpg', NULL, NULL, NULL),
(6, 1, 2, 2018, 'Akan Dibuka', 1, 2, 400000, 'tes akan dibuka', 'dummy2.png', 50000, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jam_mulai` datetime NOT NULL,
  `jam_selesai` datetime NOT NULL,
  `log_panitia` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `lokasi`, `jam_mulai`, `jam_selesai`, `log_panitia`, `id_topik`) VALUES
(6, '2018-03-10', 'Ruang Auditorium', '2018-03-10 19:00:00', '2018-03-10 21:00:00', 1, 1),
(7, '2018-03-17', 'Ruang 10317', '2018-03-17 19:00:00', '2018-03-17 21:00:00', 1, 2),
(8, '2018-03-10', 'Ruang 9122', '2018-03-10 19:00:00', '2018-03-10 21:00:00', 1, 3),
(9, '2018-03-10', 'Ruang Auditorium', '2018-03-10 19:00:00', '2018-03-10 21:00:00', 1, 4),
(10, '2018-03-10', 'Ruang Auditorium', '2018-03-10 19:00:00', '2018-03-10 21:00:00', 1, 5);

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
(2, 'Extension Course Budaya dan Religi');

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

--
-- Dumping data for table `narasumber_topik`
--

INSERT INTO `narasumber_topik` (`id_narasumber`, `id_topik`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 1),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
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
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama`, `alamat`, `pekerjaan`, `lembaga`, `pendidikan_terakhir`, `kota`, `no_hp`, `email`, `password`, `agama`) VALUES
(7, 'Marchella Metta', 'Taman Kopo Indah 2', 'Mahasiswa', 'UNPAR', 2, 'Bandung', '087822714078', 'morningracoon@gmail.com', '$2y$10$b0qq18SNS/Pjz.ZxRy8YVuNVAGhrbgt4DRstFZ/8OdYXJM3AJ3eBy', 2),
(8, 'Kelvin Tandika', 'Taman Holis Indah', 'Mahasiswa', 'UNPAR', 1, 'Bandung', '087822714078', 'kelvin@mail.com', '$2y$10$CgXW5YHHbM/00WfbskrhHeVHuUfcYH7.32ea/4hjECaDg7gP1oz4S', 0),
(9, 'abc', 'def', 'Pegawai', 'UNPAR', 3, 'Bandung', '087822714078', 'abc@mail.com', '$2y$10$/gToF/ukTzXfy4fPJ8Gup.zSi.u.QUyWg/VDw7BvBWsKknDsgFRhC', 0),
(10, 'Roxy', 'Taman Kopo', 'Mahasiswa', 'UNPAR', 1, 'Bandung', '087822714078', 'roxy@mail.com', '$2y$10$V7om3UT8NRIrjWgBHZBsGuJTr.mP4/stRwQQcnTfQ/R096AnGvoqG', 0);

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
(1, 8, 0, 1),
(2, 8, 0, 1),
(1, 9, 0, 0),
(2, 9, 0, 0),
(3, 9, 0, 0),
(1, 10, 0, 0),
(2, 10, 0, 0),
(3, 10, 0, 0),
(1, 7, 1, 0);

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
(2, '', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topik_ec`
--

CREATE TABLE `topik_ec` (
  `id_topik` int(11) NOT NULL,
  `nama_topik` varchar(500) NOT NULL,
  `log_panitia` int(11) NOT NULL,
  `id_ec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik_ec`
--

INSERT INTO `topik_ec` (`id_topik`, `nama_topik`, `log_panitia`, `id_ec`) VALUES
(1, 'Topik 1', 1, 1),
(2, 'Topik 2', 1, 1),
(3, 'Topik 1', 1, 2),
(4, 'Topik 3', 1, 1),
(5, 'Topik 2', 1, 2);

-- --------------------------------------------------------

--
-- Structure for view `data_ec`
--
DROP TABLE IF EXISTS `data_ec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_ec`  AS  select `ec`.`id_ec` AS `id_ec`,`ec`.`semester_pelaksanaan` AS `semester_pelaksanaan`,`ec`.`tahun_pelaksanaan` AS `tahun_pelaksanaan`,`ec`.`tema_ec` AS `tema_ec`,`ec`.`status_evaluasi` AS `status_evaluasi`,`ec`.`status_peserta` AS `status_peserta`,`ec`.`biaya` AS `biaya`,`ec`.`gambar` AS `gambar`,`ec`.`deskripsi` AS `deskripsi`,`ec`.`kapasitas_peserta` AS `kapasitas_peserta`,`ec`.`biaya_per_topik` AS `biaya_per_topik`,`ec`.`batas_lulus` AS `batas_lulus`,`jenisec`.`jenis_ec` AS `jenis_ec` from (`ec` join `jenisec` on((`ec`.`id_jenis_ec` = `jenisec`.`id_jenis_ec`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_topik`
--
DROP TABLE IF EXISTS `data_topik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_topik`  AS  select `topik_ec`.`id_topik` AS `id_topik`,`topik_ec`.`id_ec` AS `id_ec`,`topik_ec`.`nama_topik` AS `nama_topik`,`narasumber`.`nama` AS `nama`,`narasumber`.`profesi` AS `profesi`,`narasumber`.`lembaga` AS `lembaga`,`narasumber`.`jabatan` AS `jabatan`,`jadwal`.`tanggal` AS `tanggal`,`jadwal`.`lokasi` AS `lokasi`,`jadwal`.`jam_mulai` AS `jam_mulai`,`jadwal`.`jam_selesai` AS `jam_selesai` from (((`narasumber` join `narasumber_topik` on((`narasumber`.`id_narasumber` = `narasumber_topik`.`id_narasumber`))) join `topik_ec` on((`topik_ec`.`id_topik` = `narasumber_topik`.`id_topik`))) join `jadwal` on((`jadwal`.`id_topik` = `topik_ec`.`id_topik`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id_ec`),
  ADD KEY `id_jenis_ec` (`id_jenis_ec`);

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
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `peserta_topik`
--
ALTER TABLE `peserta_topik`
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_topik` (`id_topik`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec`
--
ALTER TABLE `ec`
  MODIFY `id_ec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenisec`
--
ALTER TABLE `jenisec`
  MODIFY `id_jenis_ec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `narasumber`
--
ALTER TABLE `narasumber`
  MODIFY `id_narasumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topik_ec`
--
ALTER TABLE `topik_ec`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ec`
--
ALTER TABLE `ec`
  ADD CONSTRAINT `jenis_ec_constraint` FOREIGN KEY (`id_jenis_ec`) REFERENCES `jenisec` (`id_jenis_ec`);

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
-- Constraints for table `peserta_topik`
--
ALTER TABLE `peserta_topik`
  ADD CONSTRAINT `peserta_topik_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`),
  ADD CONSTRAINT `peserta_topik_ibfk_2` FOREIGN KEY (`id_topik`) REFERENCES `topik_ec` (`id_topik`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
