-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semester4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `alamat`, `email`, `no_telp`, `role_id`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'zidan', 'cileungsi', 'zidan@gmail.com', '09', 1),
(3, 'zidan', '202cb962ac59075b964b07152d234b70', 'zidan anana', 'cileungsi', 'zidanananda105@gmail.com', '081326481439', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `toping` varchar(20) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `kode_produk`, `ukuran`, `toping`, `deskripsi`) VALUES
(1, 'pz-XL-sosp', 'XL', 'sosp', 'testing deskripsi'),
(2, 'pz-XS-sosp', 'XS', 'sosp', 'deskripsi'),
(3, 'pz-gyvaNA5o8Ximfir', 'M', 'sosp', 'deskripsi lagi'),
(4, 'pz-DS39PZRqj7imfir', 'S', 'dag', 'Daging sapi pilihan'),
(5, 'pz-3nJ4dYv7L2imfir', 'M', 'toping-OGYE6ey8PXfik', 'Sayur KOl ala anak medan'),
(6, 'pz-7QyenumF8Efikar', 'XS', 'kej', 'di hiasi toping keju'),
(7, 'pz-cUYORQeFNVfikar', 'M', 'dag', 'Di hiasi dengan topingan bakso iris'),
(8, 'pz-5OuGxjrFXifikar', 'L', 'dag', 'Pizza Mewah yang dihiasi dengan lapisan keju'),
(9, 'pz-VmRti7bKyNfikar', 'XL', 'ters', 'bvjvj'),
(10, 'pz-jUGromh0CMfikar', 'M', 'toping-9CcUvQxrLbfik', 'ghhjghjhj'),
(11, 'pz-Q3i9rXxWahfikar', 'M', 'toping-8Pk6zjf4c1fik', NULL),
(12, 'pz-He9jafg0vbfikar', 'M', 'toping-8Pk6zjf4c1fik', 'Wau'),
(13, 'pz-jG7306fC8Yfikar', 'XL', 'toping-URpDd6JN8rfik', 'Service Mesin AC '),
(14, 'pz-Zbn58divIBfikar', 'I-PK', 'toping-URpDd6JN8rfik', 'Service Mesin AC'),
(15, 'pz-i4VHJTP7uMfikar', 'I-PK', 'toping-URpDd6JN8rfik', 'Membersihkan AC '),
(16, 'pz-GZfoFAwXEPfikar', 'All-varian', 'toping-URpDd6JN8rfik', 'Bongkar Pasang AC bekas & Baru'),
(17, 'pz-0wjGAQXrxzfikar', 'All-varian', 'toping-URpDd6JN8rfik', 'Isi Freaon AC');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `kode_pesanan` varchar(50) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL DEFAULT '',
  `jumlah` int(11) NOT NULL,
  `alamat` tinytext NOT NULL,
  `notelp` tinytext NOT NULL,
  `total` float NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `buktitrf` text NOT NULL,
  `status` enum('selesai','batal','menunggu pembayaran','bukti bayar sudah diupload','pembayaran diverifikasi','proses','pesanan sedang di antar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `kode_pesanan`, `id_user`, `kode_produk`, `jumlah`, `alamat`, `notelp`, `total`, `tgl_pesan`, `buktitrf`, `status`) VALUES
(9, 'p-5FDkrQx2O-p', 5, 'pz-0wjGAQXrxzfikar', 1, 'jakarta', '303030310001', 100000, '2022-06-13 12:50:55', '', 'menunggu pembayaran'),
(10, 'p-5jPMLFQAkiZ', 5, 'pz-0wjGAQXrxzfikar', 0, 'jakarta', '303030310001', 0, '2022-06-13 14:24:46', '', 'menunggu pembayaran'),
(11, 'p-6XH2rA-QYjP', 6, 'pz-0wjGAQXrxzfikar', 1, 'btg', '123456789', 100000, '2022-06-13 14:26:21', '', 'menunggu pembayaran'),
(12, 'p-6UFKPfGaZDi', 6, 'pz-GZfoFAwXEPfikar', 1, 'btg', '08134567809', 500000, '2022-06-13 14:29:25', 'img1655105453.jpg', 'bukti bayar sudah diupload');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL DEFAULT '',
  `nama_produk` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `image` text NOT NULL,
  `stok` int(5) NOT NULL,
  `terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga`, `image`, `stok`, `terjual`) VALUES
(22, 'pz-Zbn58divIBfikar', 'Service AC', 200000, 'Service_AC_pz-Zbn58divIBimfir.png', 1, 0),
(23, 'pz-i4VHJTP7uMfikar', 'CUCI & CLEAN AC', 150000, 'CUCI_CLEAN_AC_pz-i4VHJTP7uMimfir.png', 1, 0),
(24, 'pz-GZfoFAwXEPfikar', 'Bongkar & Pasang ', 500000, 'Bongkar_Pasang_AC_pz-GZfoFAwXEPimfir.png', 1, 0),
(25, 'pz-0wjGAQXrxzfikar', 'Isi & tambah Freon', 100000, 'Isi_tambah_Freon_pz-0wjGAQXrxzimfir.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `toping`
--

CREATE TABLE `toping` (
  `id_toping` int(11) NOT NULL,
  `kode_toping` varchar(100) NOT NULL,
  `nama_toping` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_toping` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toping`
--

INSERT INTO `toping` (`id_toping`, `kode_toping`, `nama_toping`, `deskripsi`, `harga_toping`) VALUES
(12, 'toping-keA3x45Ld6fikar', 'Toshiba', 'merk', NULL),
(13, 'toping-URpDd6JN8rfikar', 'ALL MERK', 'merk', NULL),
(14, 'toping-phvN2jsUXqfikar', 'SAMSUNG', 'merk', NULL),
(15, 'toping-3aUNI48mlSfikar', 'LG', 'merk', NULL),
(16, 'toping-Bo3tPw2Jrdfikar', 'Daikin', 'merk', NULL),
(17, 'toping-FJZcPuiMlzfikar', 'AQUA', 'merk', NULL),
(18, 'toping-W18HqibPfvfikar', 'Phanasonic', 'merk', NULL),
(19, 'toping-5VEQYWDopmfikar', 'SHARP', 'merk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `email`, `username`, `image`, `password`, `role_id`, `is_active`, `no_telp`) VALUES
(1, 'admin', 'alamat', 'admin@admin.com', '', 'a.jpg', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '0812812812812'),
(5, 'ryu', 'jakarta', 'ryu123@service.com', 'ryu', 'png', '202cb962ac59075b964b07152d234b70', 2, 2, '303030310001'),
(6, 'icha', 'btg', 'icha@gmail.com', 'icha', 'img1655105343.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 2, 0, '08134567809');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD UNIQUE KEY `kode_pesanan` (`kode_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `toping`
--
ALTER TABLE `toping`
  ADD PRIMARY KEY (`id_toping`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `toping`
--
ALTER TABLE `toping`
  MODIFY `id_toping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
