-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 10:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 'arfiiyd', '$2y$10$3fI7k9K07oMUMUzcQI95h.WG2xm2vcLosoRLTkOIPtmHjkAvaJnt.', 1, '2021-04-20 06:26:06', '2021-04-20 06:26:06'),
(5, 'arfivory', '$2y$10$bosfVbXG5yUjJcQvPdNffO7OxefSz2Z50HCdYXcuSgAAHo02/dFc2', 2, '2021-04-21 06:28:58', '2021-04-21 06:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `merek` varchar(150) NOT NULL,
  `no_plat` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `dipinjam` datetime DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `tipe_id`, `merek`, `no_plat`, `warna`, `tahun`, `dipinjam`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(3, 7, 'Toyota camry', 'B 1457 FOH', 'Hitam', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem saepe placeat explicabo tempore odio labore in hic, asperiores itaque voluptate ducimus iusto voluptatibus sed illum minus recusandae iste! Exercitationem animi quod maiores quaerat beatae dolores voluptate eius amet nostrum vel. Sed debitis eligendi a. Sint quos similique, cumque, quo corrupti totam atque necessitatibus, expedita blanditiis debitis quasi numquam quaerat. Excepturi repellat totam expedita a, ut eaque, unde possimus consequatur voluptate, ullam temporibus. Nobis, in aspernatur ea possimus consectetur tempora doloribus quibusdam perspiciatis odio a facere voluptatem est dolor adipisci asperiores sequi dolores qui? Doloremque quam dolores sed. Explicabo, dolore laboriosam.', 'WhatsApp_Image_2021-01-31_at_23_53_43.jpeg', '2021-04-21 07:34:42', '2021-04-21 07:34:42'),
(4, 7, 'Toyota Avanza', 'B 0798 D', 'Putih', '2014', '2021-04-21 03:35:24', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nemo exercitationem quidem? Est molestias obcaecati corrupti laborum, enim iure, sunt hic odit delectus quam asperiores ipsam? Provident beatae deleniti, nobis sunt corrupti voluptatum quasi mollitia laboriosam quod vel libero molestiae pariatur dolorem earum corporis porro eum saepe rem asperiores dolor.', 'WhatsApp_Image_2021-01-31_at_23_53_503.jpeg', '2021-04-21 07:39:34', '2021-04-21 07:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `user_id` int(2) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `user_id`, `nama_lengkap`, `email`, `alamat`, `jenis_kelamin`, `no_telepon`, `nik`) VALUES
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'Widdy Arfiansyah', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(10) NOT NULL,
  `nama_tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`) VALUES
(7, 'SDN', 'Sedan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_tr` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `kadaluarsa` int(15) DEFAULT NULL,
  `jam_pinjam` int(11) DEFAULT NULL,
  `status_rental` int(11) NOT NULL,
  `tanggal_submit` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_time` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_tr`, `user_id`, `mobil_id`, `kadaluarsa`, `jam_pinjam`, `status_rental`, `tanggal_submit`, `created_at`, `created_time`) VALUES
(1, 5, 4, NULL, 2, 1, '2021-04-21 11:31:44', '2021-04-21 03:35:24', 1618994124);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `profil_ibfk_1` (`user_id`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_tr`),
  ADD KEY `mobil_id` (`mobil_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`tipe_id`) REFERENCES `tipe` (`id_tipe`);

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `auth` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `auth` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
