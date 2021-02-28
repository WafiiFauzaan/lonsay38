-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 06:32 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lonsay38`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(10) NOT NULL,
  `satuan_bahan_baku_id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `satuan_bahan_baku_id`, `nama`, `harga`) VALUES
(1, 2, 'Tepung', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `waktu_transaksi` timestamp NULL DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `user_id`, `waktu_transaksi`, `last_update`, `nama`) VALUES
(5, 3, '2021-02-26 17:00:00', '2021-02-24 03:15:52', 'Joni'),
(7, 3, '2021-02-24 03:09:07', '2021-02-24 03:15:52', 'Wafii');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) NOT NULL,
  `tipe_produk_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `harga_produksi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `tipe_produk_id`, `user_id`, `nama`, `harga_produk`, `harga_produksi`) VALUES
(3, 3, 4, 'Roti 38', 5000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk_bahan_baku`
--

CREATE TABLE `produk_bahan_baku` (
  `id` int(10) NOT NULL,
  `produk_id` int(10) NOT NULL,
  `bahan_baku_id` int(10) NOT NULL,
  `berat_bahan_baku` double DEFAULT NULL,
  `harga_bahan_baku` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_penjualan`
--

CREATE TABLE `produk_penjualan` (
  `id` int(10) NOT NULL,
  `produk_id` int(10) NOT NULL,
  `penjualan_id` int(10) NOT NULL,
  `jumlah_produk` double DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `harga_produksi` double DEFAULT NULL,
  `laba` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_penjualan_bahan_baku`
--

CREATE TABLE `produk_penjualan_bahan_baku` (
  `bahan_baku_id` int(10) NOT NULL,
  `produk_penjualan_id` int(10) NOT NULL,
  `berat_bahan_baku` double DEFAULT NULL,
  `harga_bahan_baku` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan_bahan_baku`
--

CREATE TABLE `satuan_bahan_baku` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_bahan_baku`
--

INSERT INTO `satuan_bahan_baku` (`id`, `nama`) VALUES
(1, 'Gram'),
(2, 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_produk`
--

CREATE TABLE `tipe_produk` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_produk`
--

INSERT INTO `tipe_produk` (`id`, `nama`) VALUES
(3, 'Ceminal'),
(2, 'Makanan'),
(1, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_handphone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `username`, `password`, `nama`, `alamat`, `no_handphone`) VALUES
(1, 'pemilik', 'pemilik', '58399557dae3c60e23c78606771dfa3d', 'Wafii', 'Kosambi', '087778356201'),
(3, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Haekal', 'Cibubur', NULL),
(4, 'inventori', 'inventori', '4e943c28c3b011e0540ff9a19334953b', 'Hana', 'Cililin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_bahan_baku` (`nama`),
  ADD KEY `FKbahan_baku888293` (`satuan_bahan_baku_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKpenjualan114403` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKproduk126876` (`tipe_produk_id`),
  ADD KEY `FKproduk345729` (`user_id`);

--
-- Indexes for table `produk_bahan_baku`
--
ALTER TABLE `produk_bahan_baku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKproduk_bah523683` (`produk_id`),
  ADD KEY `FKproduk_bah454805` (`bahan_baku_id`);

--
-- Indexes for table `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKproduk_pen815720` (`produk_id`),
  ADD KEY `FKproduk_pen651989` (`penjualan_id`);

--
-- Indexes for table `produk_penjualan_bahan_baku`
--
ALTER TABLE `produk_penjualan_bahan_baku`
  ADD PRIMARY KEY (`bahan_baku_id`,`produk_penjualan_id`),
  ADD KEY `FKproduk_pen966576` (`produk_penjualan_id`),
  ADD KEY `FKproduk_pen648446` (`bahan_baku_id`);

--
-- Indexes for table `satuan_bahan_baku`
--
ALTER TABLE `satuan_bahan_baku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk_bahan_baku`
--
ALTER TABLE `produk_bahan_baku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan_bahan_baku`
--
ALTER TABLE `satuan_bahan_baku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `FKbahan_baku888293` FOREIGN KEY (`satuan_bahan_baku_id`) REFERENCES `satuan_bahan_baku` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FKpenjualan114403` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FKproduk126876` FOREIGN KEY (`tipe_produk_id`) REFERENCES `tipe_produk` (`id`),
  ADD CONSTRAINT `FKproduk345729` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `produk_bahan_baku`
--
ALTER TABLE `produk_bahan_baku`
  ADD CONSTRAINT `FKproduk_bah454805` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`),
  ADD CONSTRAINT `FKproduk_bah523683` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  ADD CONSTRAINT `FKproduk_pen651989` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  ADD CONSTRAINT `FKproduk_pen815720` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk_penjualan_bahan_baku`
--
ALTER TABLE `produk_penjualan_bahan_baku`
  ADD CONSTRAINT `FKproduk_pen648446` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`),
  ADD CONSTRAINT `FKproduk_pen966576` FOREIGN KEY (`produk_penjualan_id`) REFERENCES `produk_penjualan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
