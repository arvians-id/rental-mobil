-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 02:52 PM
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
(7, 'admin', '$2y$10$XUBPyxfwbjFeIqQB8IgNM.FsuTImuzSQAWdo8t6Xee.22oYJ/CDla', 1, '2021-04-24 07:12:57', '2021-04-24 07:12:57'),
(8, 'user', '$2y$10$DBtMtyjInYG968aKx07vhepqc9AeQf0NWMuWmMdFEs0g0Dp56MTXa', 2, '2021-04-24 07:13:09', '2021-04-24 07:15:03');

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
(3, 7, 'Toyota camry', 'B 1457 FOH', 'Hitam', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem saepe placeat explicabo tempore odio labore in hic, asperiores itaque voluptate ducimus iusto voluptatibus sed illum minus recusandae iste! Exercitationem animi quod maiores quaerat beatae dolores voluptate eius amet nostrum vel. Sed debitis eligendi a. Sint quos similique, cumque, quo corrupti totam atque necessitatibus, expedita blanditiis debitis quasi numquam quaerat. Excepturi repellat totam expedita a, ut eaque, unde possimus consequatur voluptate, ullam temporibus. Nobis, in aspernatur ea possimus consectetur tempora doloribus quibusdam perspiciatis odio a facere voluptatem est dolor adipisci asperiores sequi dolores qui? Doloremque quam dolores sed. Explicabo, dolore laboriosam.', '20289233232.jpg', '2021-04-24 01:40:31', '2021-04-24 01:40:31'),
(4, 7, 'Toyota Avanza', 'B 0798 D', 'Putih', '2014', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nemo exercitationem quidem? Est molestias obcaecati corrupti laborum, enim iure, sunt hic odit delectus quam asperiores ipsam? Provident beatae deleniti, nobis sunt corrupti voluptatum quasi mollitia laboriosam quod vel libero molestiae pariatur dolorem earum corporis porro eum saepe rem asperiores dolor.', '4_Alasan_Memilih_Mobil_Hatchback1.jpg', '2021-04-24 01:40:41', '2021-04-24 01:40:41'),
(6, 7, 'Gatau', '10KJ200S', 'Merah', '2010', NULL, 'asd', '2028923323.jpg', '2021-04-24 01:12:57', '2021-04-24 01:12:57'),
(7, 7, 'Gatau', 'B 0798 D', 'Merah', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', 'Gambar-Mobil-Termurah-di-Indonesia.jpg', '2021-04-24 01:29:19', '2021-04-24 01:29:19'),
(8, 7, 'Gatau', '10KJ200S', 'Merah', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', 'image1-1-4d8e56bbe6720cd355ddb38f31757a17_600x400.jpg', '2021-04-24 01:29:30', '2021-04-24 01:29:30'),
(9, 7, 'Toyota Avanza', '10KJ200', 'Merah', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '5-Mobil-200-Jutaan-Terbaik-2020-untuk-Keluarga-1200x900.jpg', '2021-04-24 01:29:41', '2021-04-24 01:29:41'),
(10, 7, 'Gatau', '10KJ200', 'Merah', '2010', '2021-04-24 07:50:11', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '5fd8f95438550.jpeg', '2021-04-24 01:29:50', '2021-04-24 01:29:50'),
(11, 7, 'Toyota camry', '10KJ200', 'Merah', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '3b60dc19-9034-4822-9614-7527af1015a8.jpeg', '2021-04-24 01:29:59', '2021-04-24 01:29:59'),
(12, 7, 'Toyota camry', '10KJ200S', 'Putih', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '3825522358.jpg', '2021-04-24 01:30:10', '2021-04-24 01:30:10'),
(13, 7, 'Toyota camry', '10KJ200S', 'Merah', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', 'Mobil_Hybrid_Toyota_Bisa_Melibas_Banjir.png', '2021-04-24 01:30:22', '2021-04-24 01:30:22'),
(14, 7, 'asd', 'B 0798 D', 'Biru', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '1433960482p.jpg', '2021-04-24 01:30:36', '2021-04-24 01:30:36'),
(15, 7, 'Gatau', '10KJ200', 'Biru', '2014', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', 'toyota-rush1.jpg', '2021-04-24 01:30:44', '2021-04-24 01:30:44'),
(16, 7, 'Gatau', '10KJ200S', 'Biru', '2010', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '4_Alasan_Memilih_Mobil_Hatchback.jpg', '2021-04-24 01:30:54', '2021-04-24 01:30:54'),
(17, 7, 'Toyota Avanza', 'B 0798 D', 'Merah', '2014', NULL, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, quos? Nihil nulla error sit voluptatem provident? Qui in rem nobis facere sapiente, sit nulla praesentium recusandae dolores fuga officiis molestiae dolorem omnis itaque harum assumenda velit labore nesciunt. Sit blanditiis iusto dolorum? Unde in dolore modi itaque omnis animi amet!', '20289233231.jpg', '2021-04-24 01:31:02', '2021-04-24 01:31:02'),
(18, 7, 'Gatau', '10KJ200S', 'Biru', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'Spesifikasi-Honda-Brio-Satya.jpg', '2021-04-24 01:37:29', '2021-04-24 01:37:29'),
(19, 7, 'Toyota camry', '10KJ200', 'Biru', '2010', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', '1537875147799-8bb19cdf623eb1137af15ddb61295912.jpeg', '2021-04-24 01:37:38', '2021-04-24 01:37:38'),
(20, 7, 'asd', '10KJ200', 'Merah', '2010', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', '1436007720p.jpg', '2021-04-24 01:37:46', '2021-04-24 01:37:46'),
(21, 7, 'Toyota camry', '10KJ200S', 'Merah', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'McLaren-MP4-12C-mobil-termahal-di-indonesia.jpg', '2021-04-24 01:37:59', '2021-04-24 01:37:59'),
(22, 7, 'Toyota Avanza', '10KJ200', 'Merah', '2010', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'Rental-mobil-mewah-land-cruiser.jpg', '2021-04-24 01:38:09', '2021-04-24 01:38:09'),
(23, 7, 'Gatau s', '10KJ200', 'Merah', '2010', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'Rental-mobil-mewah-land-cruiser1.jpg', '2021-04-24 01:38:20', '2021-04-24 01:38:20'),
(24, 7, 'Toyota Avanza', '10KJ200', 'Merah', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'xMobil,P20Keluarga,P20yang,P20paling,P20irit,P202,P20Mitsubishi,P20Expander_jpeg_pagespeed_ic_ZGOyTEHz30.jpg', '2021-04-24 01:38:28', '2021-04-24 01:38:28'),
(25, 7, 'Gatau', '10KJ200', 'Biru', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', '0000455638.jpg', '2021-04-24 01:38:37', '2021-04-24 01:38:37'),
(26, 7, 'Toyota Avanza', '10KJ200', 'Merah', '2010', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'shutterstock_259746068-854x540.jpg', '2021-04-24 01:38:46', '2021-04-24 01:38:46'),
(27, 7, 'Toyota camry', '10KJ200S', 'Putih', '2010', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'Gambar-Mobil-Termurah-di-Indonesia1.jpg', '2021-04-24 01:38:54', '2021-04-24 01:38:54'),
(28, 7, 'Toyota camry', '10KJ200', 'Putih', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', 'image1-1-4d8e56bbe6720cd355ddb38f31757a17_600x4001.jpg', '2021-04-24 01:39:05', '2021-04-24 01:39:05'),
(29, 7, 'Toyota Avanza', '10KJ200S', 'Biru', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', '5-Mobil-200-Jutaan-Terbaik-2020-untuk-Keluarga-1200x9001.jpg', '2021-04-24 01:39:19', '2021-04-24 01:39:19'),
(30, 7, 'Gatau', '10KJ200S', 'Biru', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', '5fd8f954385501.jpeg', '2021-04-24 01:39:27', '2021-04-24 01:39:27'),
(31, 7, 'Gatau', '10KJ200S', 'Biru', '2014', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus vel, dolores voluptatibus perferendis facilis a! Saepe assumenda est culpa amet voluptatem excepturi ullam facilis doloribus mollitia consectetur a, minus dolorem neque, eaque vero eius suscipit illum officiis vitae. Blanditiis, ipsam!', '3b60dc19-9034-4822-9614-7527af1015a81.jpeg', '2021-04-24 01:39:35', '2021-04-24 01:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `user_id` int(2) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('1','2') DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `user_id`, `nama_lengkap`, `email`, `alamat`, `jenis_kelamin`, `no_telepon`, `nik`) VALUES
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'User Ganteng', 'user@gmail.com', 'Gatau Lupa', '1', '082294323334', '2223345634567854');

-- --------------------------------------------------------

--
-- Table structure for table `status_rental`
--

CREATE TABLE `status_rental` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_rental`
--

INSERT INTO `status_rental` (`id_status`, `keterangan`) VALUES
(0, 'diproses'),
(1, 'dalam peminjaman'),
(2, 'ditolak'),
(3, 'selesai');

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
  `tanggal_selesai` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_time` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_tr`, `user_id`, `mobil_id`, `kadaluarsa`, `jam_pinjam`, `status_rental`, `tanggal_submit`, `tanggal_selesai`, `created_at`, `created_time`) VALUES
(9, 8, 10, NULL, 1, 1, '2021-04-24 07:15:37', NULL, '2021-04-24 07:50:11', 1619268611);

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
-- Indexes for table `status_rental`
--
ALTER TABLE `status_rental`
  ADD PRIMARY KEY (`id_status`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_rental`
--
ALTER TABLE `status_rental`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
