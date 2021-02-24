-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2021 pada 20.48
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(10) NOT NULL,
  `id_satuan` int(10) NOT NULL,
  `nama_bahan_baku` int(10) DEFAULT NULL,
  `harga_bahan_baku` int(10) DEFAULT NULL,
  `Column` int(10) DEFAULT NULL,
  `userid_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `waktu_transaksi` timestamp NULL DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `id_tipe_produk` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `harga_produksi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_bahan_baku`
--

CREATE TABLE `produk_bahan_baku` (
  `id_produk` int(10) NOT NULL,
  `id_bahan_baku` int(10) NOT NULL,
  `berat_bahan_baku` double DEFAULT NULL,
  `harga_bahan_baku` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_penjualan`
--

CREATE TABLE `produk_penjualan` (
  `id_produk_penjualan` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_penjualan` int(10) NOT NULL,
  `jumlah_produk` double DEFAULT NULL,
  `harga_produk` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `harga_produksi` double DEFAULT NULL,
  `laba` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_penjualan_bahan_baku`
--

CREATE TABLE `produk_penjualan_bahan_baku` (
  `id_produk_penjualan` int(10) NOT NULL,
  `id_bahan_baku` int(10) NOT NULL,
  `berat_bahan_baku` int(10) DEFAULT NULL,
  `harga_bahan_baku` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_bahan_baku`
--

CREATE TABLE `satuan_bahan_baku` (
  `id_satuan` int(10) NOT NULL,
  `nama_satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_produk`
--

CREATE TABLE `tipe_produk` (
  `id_tipe_produk` int(10) NOT NULL,
  `nama_tipe_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_handphone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `type`, `username`, `password`, `nama`, `alamat`, `no_handphone`) VALUES
(1, 'pemilik', 'wafii', '47b3b4e326df3e1096fe6bdc5ca5ad78', 'Wafii', 'Kosambi Baru', '0'),
(3, 'admin', 'haekal', 'b73008f47195d9746adc54461fb7ac0d', 'Haekal', 'Bekasi', '878337226'),
(4, 'inventori', 'fikri', '5d4864249b21de08642aa6ff4178b346', 'Fikri', 'Jakarta', '788899283');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`),
  ADD UNIQUE KEY `nama_bahan_baku` (`nama_bahan_baku`),
  ADD KEY `FKbahan_baku666706` (`id_satuan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `FKpenjualan985612` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FKproduk903803` (`id_tipe_produk`),
  ADD KEY `FKproduk474519` (`id_user`);

--
-- Indeks untuk tabel `produk_bahan_baku`
--
ALTER TABLE `produk_bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`),
  ADD KEY `FKproduk_bah802344` (`id_produk`),
  ADD KEY `FKproduk_bah959777` (`id_bahan_baku`);

--
-- Indeks untuk tabel `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  ADD PRIMARY KEY (`id_produk_penjualan`),
  ADD KEY `FKproduk_pen829841` (`id_produk`),
  ADD KEY `FKproduk_pen923535` (`id_penjualan`);

--
-- Indeks untuk tabel `produk_penjualan_bahan_baku`
--
ALTER TABLE `produk_penjualan_bahan_baku`
  ADD KEY `FKproduk_pen763937` (`id_produk_penjualan`),
  ADD KEY `FKproduk_pen153419` (`id_bahan_baku`);

--
-- Indeks untuk tabel `satuan_bahan_baku`
--
ALTER TABLE `satuan_bahan_baku`
  ADD PRIMARY KEY (`id_satuan`),
  ADD UNIQUE KEY `nama_satuan` (`nama_satuan`);

--
-- Indeks untuk tabel `tipe_produk`
--
ALTER TABLE `tipe_produk`
  ADD PRIMARY KEY (`id_tipe_produk`),
  ADD UNIQUE KEY `nama_tipe_produk` (`nama_tipe_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  MODIFY `id_produk_penjualan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuan_bahan_baku`
--
ALTER TABLE `satuan_bahan_baku`
  MODIFY `id_satuan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id_tipe_produk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `FKbahan_baku666706` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_bahan_baku` (`id_satuan`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FKpenjualan985612` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FKproduk474519` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKproduk903803` FOREIGN KEY (`id_tipe_produk`) REFERENCES `tipe_produk` (`id_tipe_produk`);

--
-- Ketidakleluasaan untuk tabel `produk_bahan_baku`
--
ALTER TABLE `produk_bahan_baku`
  ADD CONSTRAINT `FKproduk_bah802344` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FKproduk_bah959777` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`);

--
-- Ketidakleluasaan untuk tabel `produk_penjualan`
--
ALTER TABLE `produk_penjualan`
  ADD CONSTRAINT `FKproduk_pen829841` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `FKproduk_pen923535` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);

--
-- Ketidakleluasaan untuk tabel `produk_penjualan_bahan_baku`
--
ALTER TABLE `produk_penjualan_bahan_baku`
  ADD CONSTRAINT `FKproduk_pen153419` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `FKproduk_pen763937` FOREIGN KEY (`id_produk_penjualan`) REFERENCES `produk_penjualan` (`id_produk_penjualan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
