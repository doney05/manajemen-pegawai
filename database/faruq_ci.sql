-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 09:15 AM
-- Server version: 10.4.8-MariaDB-log
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faruq_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gajiperjam` int(20) DEFAULT NULL,
  `gajiperhari` int(20) NOT NULL,
  `uangmakan` int(20) DEFAULT NULL,
  `uanglembur` int(20) DEFAULT NULL,
  `kasbon` int(20) DEFAULT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_user`, `hari`, `waktu`, `tanggal`, `gajiperjam`, `gajiperhari`, `uangmakan`, `uanglembur`, `kasbon`, `keterangan`) VALUES
(1, 1, 'Saturday', '12:46:52', '2022-09-24', 7500, 37500, 32000, 0, 0, 'Masuk'),
(2, 1, 'Saturday', '12:46:54', '2022-09-24', 7500, 37500, 32000, 0, 0, 'Pulang'),
(3, 1, 'Sunday', '07:38:23', '2022-09-25', 7500, 0, 32000, 0, 0, 'Masuk'),
(4, 1, 'Sunday', '07:38:25', '2022-09-25', 7500, 0, 32000, 0, 0, 'Pulang'),
(5, 3, 'Sunday', '07:39:30', '2022-09-25', 7500, 0, 32000, 0, 0, 'Masuk'),
(6, 3, 'Sunday', '07:39:33', '2022-09-25', 7500, 0, 32000, 0, 0, 'Pulang'),
(7, 1, 'Sunday', '14:13:02', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(8, 1, 'Sunday', '14:13:46', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(9, 1, 'Sunday', '14:15:55', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(10, 1, 'Sunday', '14:16:04', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(11, 1, 'Sunday', '14:25:23', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(12, 1, 'Sunday', '14:28:26', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(13, 1, 'Sunday', '14:28:38', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Masuk'),
(14, 1, 'Sunday', '14:38:33', '2022-09-25', 7500, 52500, 32000, 0, 0, 'Pulang'),
(15, 4, 'Sunday', '17:06:19', '2022-09-25', 7500, 75000, 32000, 0, 0, 'Masuk'),
(16, 4, 'Sunday', '17:06:30', '2022-09-25', 7500, 75000, 32000, 1000, 8000, 'Pulang'),
(17, 1, 'Tuesday', '17:02:52', '2022-09-27', 7500, 75000, 32000, 0, 0, 'Masuk'),
(18, 1, 'Tuesday', '17:02:58', '2022-09-27', 7500, 75000, 32000, 12000, 0, 'Pulang'),
(19, 3, 'Tuesday', '17:04:20', '2022-09-27', 7500, 75000, 32000, 0, 0, 'Masuk'),
(20, 3, 'Tuesday', '17:04:25', '2022-09-27', 7500, 75000, 32000, 0, 0, 'Pulang'),
(21, 1, 'Sunday', '13:47:14', '2022-10-02', 7500, 45000, 32000, 0, 0, 'Masuk'),
(22, 1, 'Sunday', '13:47:18', '2022-10-02', 7500, 45000, 32000, 0, 0, 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `image`) VALUES
(1, 'animasi-bergerak-kupu-kupu-00151.gif');

-- --------------------------------------------------------

--
-- Table structure for table `landing`
--

CREATE TABLE `landing` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lanjut`
--

CREATE TABLE `lanjut` (
  `id` int(20) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_workorder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lanjut`
--

INSERT INTO `lanjut` (`id`, `id_material`, `id_workorder`) VALUES
(1, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `image` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `jekel` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `noHP` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `image`, `name`, `alamat`, `jekel`, `ttl`, `email`, `password`, `divisi`, `role_id`, `noHP`, `date_created`) VALUES
(1, 'images_(1).jpg', 'danang', 'Jl. Ahmad Yani, Desa Sana Sini, Kecamatan Semarang, Kabupaten Semarang', 'Laki-Laki', 'Semarang, 23 Oktober 2000', 'danang@gmail.com', '$2y$10$NwBdhT.Y0iBYLI0qg.0gH.XQf5VyXDGzjt4q1ixltlInATw1pp4My', 'IT Konsultan', 2, '0878766346732', 1663864928),
(2, 'download1.jpg', 'Faruq', 'Jl. Jogorekso, Desa Kirig, Kecamatan Mejobo, Kabupaten Kudus', 'Laki-Laki', 'Kudus, 22 Mei 2000', 'faruq@gmail.com', '$2y$10$zGm7codd6ijX87gYx8RgJ.Pti.mRoyLBZkWcFKqxDZQvCfkTNTraa', 'Administrator', 1, '089876346483', 1663865279),
(3, 'images_(3).jpg', 'Dony Setiawan', 'UYUYGUIHIUHIJIHIUHUIH', 'TYGUYG', 'TYUYGUYG', 'setiawandony692@gmail.com', '$2y$10$ySv1hqC9Gek.T53UpL2I/e2RjaEky.JavbbdFae7/hmn9.gXqLfdy', 'yugubuhuh', 2, '089767867657', 1663868571),
(4, 'dokter.jpg', 'yudi', 'kudus', 'laki laki', 'kudus 30 06 1976', 'yudi@gmail.com', '$2y$10$EY3QnFKjjeIuLyMH0XIwIe8RBc5gHNLK7oh0zBg.NrMKbLwPfjEZu', 'project', 2, '09897345892793', 1664100299);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `workorder`
--

CREATE TABLE `workorder` (
  `id_workorder` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `anggaran` int(30) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `kebutuhan` varchar(255) NOT NULL,
  `order_dari` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `mata_uang` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `tgl_po` date NOT NULL,
  `no_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workorder`
--

INSERT INTO `workorder` (`id_workorder`, `nama`, `jenis`, `lokasi`, `anggaran`, `durasi`, `kebutuhan`, `order_dari`, `alamat`, `no_invoice`, `mata_uang`, `no_po`, `tgl_po`, `no_surat`) VALUES
(1, 'Nurasag, S.M', 'SDFNK', 'KSDFMN', 123, 'JSDFNJK', 'JKSNFK', 'KDJNFK', 'SDJKFN', 'AKJN', 'IDR', 'SJKDN', '2022-09-19', 'SHDFB'),
(2, 'Nurasag, S.M', 'mandor', 'Kudus', 12000, '21 hari', 'membutuhkan mandor', 'PT. Angkasa Pura', 'Jl. KHR. Asnawi Kudus, 59381', '1234456', 'IDR', '12345688', '2022-09-19', '1234546568'),
(3, 'Nurasag, S.M', 'mandor', 'Kudus', 12000, '21 hari', 'membutuhkan mandor', 'PT. Angkasa Pura', 'Jl. KHR. Asnawi Kudus, 59381', '1234456', 'IDR', '12345688', '2022-09-19', '1234546568'),
(4, 'dbubcsc', 'qchqiuc', 'qcui', 23400000, '23 hari', 'cbwbecjsnanxiubdwciwbicnscwsncuwecwecbyexuduwegrbcquiqhwxKZNKANdbcyegryebtrqwxguwqdq', 'pt hongkeng', 'anrgwntna', '2102ncbuwe', 'IDR', '242xdwqcf', '3132-04-11', '2523c3'),
(5, 'dbubcsc', 'qchqiuc', 'qcui', 23400000, '23 hari', 'cbwbecjsnanxiubdwciwbicnscwsncuwecwecbyexuduwegrbcquiqhwxKZNKANdbcyegryebtrqwxguwqdqucuqb ', 'pt hongkeng', 'anrgwntna', '2102ncbuwe', 'IDR', '242xdwqcf', '3132-04-11', '2523c3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing`
--
ALTER TABLE `landing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lanjut`
--
ALTER TABLE `lanjut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_material` (`id_material`,`id_workorder`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder`
--
ALTER TABLE `workorder`
  ADD PRIMARY KEY (`id_workorder`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing`
--
ALTER TABLE `landing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lanjut`
--
ALTER TABLE `lanjut`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workorder`
--
ALTER TABLE `workorder`
  MODIFY `id_workorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
