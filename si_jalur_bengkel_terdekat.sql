-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 08, 2022 at 03:58 AM
-- Server version: 5.7.37
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_jalur_bengkel_terdekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bengkel`
--

CREATE TABLE `tb_bengkel` (
  `id_bengkel` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `node` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `gambar` text,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bengkel`
--

INSERT INTO `tb_bengkel` (`id_bengkel`, `id_users`, `node`, `nama`, `alamat`, `gambar`, `latitude`, `longitude`) VALUES
(1, 4170037, 'Veri', 'Sumber Jaya', 'Jl. Veteran Selatan', '1.jpg', -5.1590399742126465, 119.4229965209961),
(2, 14037278, 'Joni', 'Yoko Motor', 'Jl. Veteran Utara No.310, Maradekaya Sel., Kec. Makassar, Kota Makassar, Sulawesi Selatan 90141', '2.jpg', -5.144710063934326, 119.42500305175781),
(3, 451899811, 'Vikram', 'Makassar Motor', 'Jl. Rappocini Raya No.110, Bua Kana, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90222', '3.jpg', -5.156628131866455, 119.43107604980469),
(4, 77400812, 'Wili', 'Wiliam Motor', 'Jl. Sungai Saddang Baru No.55 C, Balla Parang, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90232', '4.jpg', -5.148512840270996, 119.43167114257812);

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `awal` int(11) DEFAULT NULL,
  `akhir` int(11) DEFAULT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_evaluasi`, `awal`, `akhir`, `jarak`) VALUES
(1, 1, 2, 5.32),
(2, 1, 3, 3.97),
(3, 2, 4, 2.52),
(4, 3, 2, 1.57),
(5, 4, 1, 7.85);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jen_kel` enum('L','P') DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `id_users`, `nik`, `no_hp`, `tmp_lahir`, `tgl_lahir`, `jen_kel`, `alamat`) VALUES
(1, 85286016, '1132323222222222', '122222222222', 'test', '2022-05-31', 'L', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `id_bengkel` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `merk` varchar(25) DEFAULT NULL,
  `tahun_buat` varchar(15) DEFAULT NULL,
  `tgl_pajak` date DEFAULT NULL,
  `tgl_stnk` date DEFAULT NULL,
  `keluhan` text,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelayanan`
--

INSERT INTO `tb_pelayanan` (`id_pelayanan`, `id_bengkel`, `id_users`, `no_polisi`, `merk`, `tahun_buat`, `tgl_pajak`, `tgl_stnk`, `keluhan`, `latitude`, `longitude`) VALUES
(1, 4, 85286016, 'asdasd', 'Honda', '2020', '2022-06-13', '2022-06-13', 'asdasdd', -5.15441, 119.469);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `token` text,
  `tokenExpire` text,
  `level` enum('admin','users','bengkel') DEFAULT NULL,
  `status_akun` enum('0','1') DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama`, `email`, `username`, `password`, `picture`, `token`, `tokenExpire`, `level`, `status_akun`, `created`, `modified`) VALUES
(1, 'Alan Saputra Lengkoan', 'alanlengkoan@gmail.com', 'admin', '$2y$10$RN0jYpADuNi9aCw9cB4/betQ2V2Kr/3UnPBHKAb/0dNuTZRx73Fw.', NULL, 'SMVyGX4vuat9fBAgRxJ3Kh6lYQqbCD1E', '1578184269', 'admin', '1', '2020-01-02 13:23:40', '2021-09-19 16:22:38'),
(4170037, 'Veri', NULL, 'Veri', '$2y$10$PaG59Mz4RSl9tnoYFFAowO/PLJ/1VapuD47iC7v6Kho8RwHJRrL9.', NULL, NULL, NULL, 'bengkel', NULL, '2022-03-17 21:45:49', NULL),
(14037278, 'Yoko Motor', NULL, 'Yoko Motor', '$2y$10$mGQx9JZiy8LFNPF2Uxj0x.XMdZ0sJan9ue9kmmYiXMEP4sC3F0qqW', NULL, NULL, NULL, 'bengkel', NULL, '2022-03-17 21:49:53', NULL),
(77400812, 'Wiliam Motor', NULL, 'Wiliam Motor', '$2y$10$3JzYB4PxCmJmQdFK16AxsuroeARTiJPZ11wkEApQZlbnCYJr.3ufa', NULL, NULL, NULL, 'bengkel', '1', '2022-03-17 22:07:10', NULL),
(85286016, 'alan', NULL, 'alan', '$2y$10$lfJrSe1reHjhZrdipQ2glepOMxdl1iB69M8IZUq7EIRz5h.JX2vrq', NULL, NULL, NULL, 'users', '1', '2022-05-31 10:13:50', NULL),
(451899811, 'Fajar Motor', NULL, 'Fajar Motor', '$2y$10$A1qEnFHPeY71UWgS7PEzMO0rUwK7OjCHBpImRHHmjPLTRE9p5BsnG', NULL, NULL, NULL, 'bengkel', NULL, '2022-03-17 23:03:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  ADD PRIMARY KEY (`id_bengkel`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `awal` (`awal`,`akhir`),
  ADD KEY `akhir_to_bengkel` (`akhir`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `member_to_users` (`id_users`);

--
-- Indexes for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD KEY `pelayanan_to_users` (`id_users`),
  ADD KEY `pelayanan_to_bengkel` (`id_bengkel`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  MODIFY `id_bengkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451899812;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  ADD CONSTRAINT `u_to_b` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id_users`);

--
-- Constraints for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD CONSTRAINT `akhir_to_bengkel` FOREIGN KEY (`akhir`) REFERENCES `tb_bengkel` (`id_bengkel`) ON DELETE CASCADE,
  ADD CONSTRAINT `awal_to_bengkel` FOREIGN KEY (`awal`) REFERENCES `tb_bengkel` (`id_bengkel`) ON DELETE CASCADE;

--
-- Constraints for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `member_to_users` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id_users`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD CONSTRAINT `pelayanan_to_bengkel` FOREIGN KEY (`id_bengkel`) REFERENCES `tb_bengkel` (`id_bengkel`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelayanan_to_users` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
