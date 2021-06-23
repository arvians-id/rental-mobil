-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 07:21 AM
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
(1, 'admin', '$2y$10$4vzaXhyhN64X0MTVoDT0uO.YuFU1HQbyVooMxTP4uRgFKGK4JnMxe', 1, '2021-05-02 02:35:01', '2021-05-02 02:35:01'),
(2, 'user', '$2y$10$AJhkEGzFeOAbLSSGD9ZU../9Ryi6eRIRljQgtOPDG2Ng0F30co992', 2, '2021-05-02 02:35:10', '2021-05-26 02:26:30');

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
(1, 1, 'Toyota Avanza', 750000, 'B 7070 UH', 'Hitam', '2010', '2021-05-25 08:09:46', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'Spesifikasi-Honda-Brio-Satya.jpg', '2021-05-02 02:39:31', '2021-05-02 02:39:31'),
(2, 1, 'Toyota camry', 1500000, 'B 1152 SN', 'Merah', '2018', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '1537875147799-8bb19cdf623eb1137af15ddb61295912.jpeg', '2021-05-02 02:40:00', '2021-05-02 02:40:00'),
(4, 1, 'Toyota camry', 1500000, 'B 1152 SN', 'Merah', '2018', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'McLaren-MP4-12C-mobil-termahal-di-indonesia.jpg', '2021-05-02 02:40:46', '2021-05-02 02:40:46'),
(7, 1, 'Toyota camry', 500000, 'B 1152 SN', 'Putih', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '4_Alasan_Memilih_Mobil_Hatchback1.jpg', '2021-05-02 02:44:27', '2021-05-02 02:44:27'),
(8, 1, 'Toyota Avanza', 1500000, 'B 7070 UH', 'Hitam', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'shutterstock_259746068-854x540.jpg', '2021-05-02 02:41:31', '2021-05-02 02:41:31'),
(9, 1, 'Toyota Avanza', 750000, 'B 7070 UH', 'Merah', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'Gambar-Mobil-Termurah-di-Indonesia.jpg', '2021-05-02 02:41:53', '2021-05-02 02:41:53'),
(10, 1, 'Toyota camry', 750000, 'B 7070 UH', 'Putih', '2015', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'image1-1-4d8e56bbe6720cd355ddb38f31757a17_600x400.jpg', '2021-05-02 02:42:04', '2021-05-02 02:42:04'),
(11, 1, 'Toyota Avanza', 750000, 'B 1152 SN', 'Merah', '2015', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '5-Mobil-200-Jutaan-Terbaik-2020-untuk-Keluarga-1200x900.jpg', '2021-05-02 02:42:13', '2021-05-02 02:42:13'),
(12, 1, 'Toyota Avanza', 750000, 'B 7070 UH', 'Hitam', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '5fd8f95438550.jpeg', '2021-05-02 02:42:26', '2021-05-02 02:42:26'),
(13, 1, 'Toyota Avanza', 500000, 'B 7070 UH', 'Hitam', '2018', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '3b60dc19-9034-4822-9614-7527af1015a8.jpeg', '2021-05-02 02:42:35', '2021-05-02 02:42:35'),
(14, 1, 'Toyota Avanza', 1500000, 'B 1152 SN', 'Merah', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '3825522358.jpg', '2021-05-02 02:42:45', '2021-05-02 02:42:45'),
(15, 1, 'Toyota Avanza', 750000, 'B 1152 SN', 'Merah', '2015', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'Mobil_Hybrid_Toyota_Bisa_Melibas_Banjir.png', '2021-05-02 02:42:56', '2021-05-02 02:42:56'),
(16, 1, 'Toyota camry', 1500000, 'B 7070 UH', 'Putih', '2015', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '1433960482p.jpg', '2021-05-02 02:43:05', '2021-05-02 02:43:05'),
(17, 1, 'Toyota camry', 750000, 'B 1152 SN', 'Hitam', '2010', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', 'toyota-rush1.jpg', '2021-05-02 02:43:14', '2021-05-02 02:43:14'),
(18, 1, 'Toyota camry', 750000, 'B 1152 SN', 'Hitam', '2018', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '4_Alasan_Memilih_Mobil_Hatchback.jpg', '2021-05-02 02:43:26', '2021-05-02 02:43:26'),
(19, 1, 'Toyota Avanza', 1500000, 'B 7070 UH', 'Hitam', '2015', NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim eligendi facilis molestiae ad repellat rem repellendus sequi pariatur! Nisi sunt, maxime officiis repudiandae aliquid provident fuga soluta consectetur. Itaque eveniet, est cum facilis veritatis, repellat, in odio tenetur perspiciatis reprehenderit quo magnam maiores explicabo reiciendis. Quas animi error vel voluptates.', '2028923323.jpg', '2021-05-02 02:43:36', '2021-05-02 02:43:36'),
(20, 1, 'Gatau', 2000000, 'B 0798 D', 'Biru', '2014', NULL, 'as', 'default1.png', '2021-06-07 11:36:41', '2021-06-07 11:36:41');

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
(2, 2, 'widdy arfiansyah', 'widdyarfiansyah00@gmail.com', 'Jl Bhayangkara', '1', '082299921720', '1234567891123453', 'b0f0344f00ce48cfee17c0d7ae2b66f2.png', '414f23c75459431e38827560073db6e8.png');

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
(6, 2, 1, NULL, 1, 1, '2021-05-25 08:09:01', NULL, '2021-05-25 08:09:46', 1621948186);

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
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`tipe_id`) REFERENCES `tipe` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

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
