-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 07:42 AM
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
(1, 'admin', '$2y$10$2wrZ.yK5t4oeXhrMfUyVf.mBnASZpVjzDTto5TKJBV4p18iToOwwW', 1, '2021-06-29 10:30:46', '2021-06-29 10:30:46'),
(2, 'user', '$2y$10$bGTSPN778VcZxOGOIbTWGO2/f68pzU3bHlnumBeWxgMb2MS4UcZ/u', 2, '2021-06-29 10:31:13', '2021-06-29 12:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `merek` varchar(150) NOT NULL,
  `harga` int(100) NOT NULL,
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

INSERT INTO `mobil` (`id_mobil`, `tipe_id`, `merek`, `harga`, `no_plat`, `warna`, `tahun`, `dipinjam`, `deskripsi`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Toyota Avanza', 750000, 'B 7070 UH', 'Hitam', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'Spesifikasi-Honda-Brio-Satya.jpg', '2021-05-02 02:39:31', '2021-05-02 02:39:31'),
(2, 1, 'Toyota camry', 1500000, 'B 1152 SN', 'Merah', '2018', '2021-06-29 12:06:07', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '1537875147799-8bb19cdf623eb1137af15ddb61295912.jpeg', '2021-05-02 02:40:00', '2021-05-02 02:40:00'),
(3, 1, 'Toyota camry', 1500000, 'B 1152 SN', 'Merah', '2018', '2021-06-23 10:27:34', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'McLaren-MP4-12C-mobil-termahal-di-indonesia.jpg', '2021-05-02 02:40:46', '2021-05-02 02:40:46'),
(4, 1, 'Toyota camry', 500000, 'B 1152 SN', 'Putih', '2010', '2021-06-23 10:28:17', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '4_Alasan_Memilih_Mobil_Hatchback1.jpg', '2021-05-02 02:44:27', '2021-05-02 02:44:27'),
(5, 1, 'Toyota Avanza', 1500000, 'B 7070 UH', 'Hitam', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'shutterstock_259746068-854x540.jpg', '2021-05-02 02:41:31', '2021-05-02 02:41:31');

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
  `nik` varchar(50) DEFAULT NULL,
  `u_peminjam` varchar(256) DEFAULT NULL,
  `u_penjamin` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `user_id`, `nama_lengkap`, `email`, `alamat`, `jenis_kelamin`, `no_telepon`, `nik`, `u_peminjam`, `u_penjamin`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Widdy', 'widdy@gmail.com', 'as', '1', '082299921720', '2222222222222222', '707b2b2db612dad66976a0d8dd073765.jpg', '6096a96f4874a25651119b5a56255b7b.jpg');

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
(1, 'SDN', 'Sedan');

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
(1, 2, 2, 1624950367, NULL, 0, '2021-06-29 12:06:07', NULL, NULL, NULL);

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
  ADD KEY `mobil_ibfk_1` (`tipe_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_rental`
--
ALTER TABLE `status_rental`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`tipe_id`) REFERENCES `tipe` (`id_tipe`) ON UPDATE CASCADE;

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
