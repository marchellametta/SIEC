-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 07:25 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SKM_SIMA_BUT`
--

-- --------------------------------------------------------

--
-- Table structure for table `sima_pegawai_luar_bertugas_dt`
--
-- Creation: Jul 05, 2017 at 05:23 PM
--

CREATE TABLE `sima_pegawai_luar_bertugas_dt` (
  `ID_PEGAWAI_LUAR_BERTUGAS` int(11) NOT NULL,
  `ID_PEMINJAMAN` int(11) DEFAULT NULL,
  `V_NAMA` varchar(45) NOT NULL,
  `V_EMAIL` varchar(45) DEFAULT NULL,
  `V_NO_TELP` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `sima_pegawai_luar_bertugas_dt`:
--   `ID_PEMINJAMAN`
--       `sima_peminjaman_tr` -> `ID_PEMINJAMAN`
--

--
-- Dumping data for table `sima_pegawai_luar_bertugas_dt`
--

INSERT INTO `sima_pegawai_luar_bertugas_dt` (`ID_PEGAWAI_LUAR_BERTUGAS`, `ID_PEMINJAMAN`, `V_NAMA`, `V_EMAIL`, `V_NO_TELP`) VALUES
(1, 15, 'acel', 'acel@mail.com', '0878227140178'),
(2, NULL, 'Denny darko', 'den@gmail.com', '9347282'),
(3, 34, 'Melinda Nur Abianti', 'melindanurabianti@gmail.com', '085956006685'),
(4, NULL, 'Mengantuk', 'mengantuk@gmail.com', '92130813');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sima_pegawai_luar_bertugas_dt`
--
ALTER TABLE `sima_pegawai_luar_bertugas_dt`
  ADD PRIMARY KEY (`ID_PEGAWAI_LUAR_BERTUGAS`),
  ADD KEY `fk_PEGAWAI_LUAR_BERTUGAS_DT_PEMINJAMAN_MT1_idx` (`ID_PEMINJAMAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sima_pegawai_luar_bertugas_dt`
--
ALTER TABLE `sima_pegawai_luar_bertugas_dt`
  MODIFY `ID_PEGAWAI_LUAR_BERTUGAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sima_pegawai_luar_bertugas_dt`
--
ALTER TABLE `sima_pegawai_luar_bertugas_dt`
  ADD CONSTRAINT `sima_pegawai_luar_bertugas_dt_ibfk_1` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `sima_peminjaman_tr` (`ID_PEMINJAMAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
