-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2021 pada 02.53
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-system`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id_bahan` varchar(20) NOT NULL,
  `id_stok` varchar(20) NOT NULL,
  `nama_bahan` varchar(40) NOT NULL,
  `jumlah_bahan` double NOT NULL,
  `unit_bahan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bahan`
--

INSERT INTO `tb_bahan` (`id_bahan`, `id_stok`, `nama_bahan`, `jumlah_bahan`, `unit_bahan`) VALUES
('B1', 'S1', 'Beef Short Plate ', 5000, 100),
('B10', 'S10', 'Orange Juice ', 3000, 30),
('B2', 'S2', 'Chicken Slice ', 2300, 46),
('B3', 'S3', 'Squid ', 1200, 28),
('B4', 'S4', 'Tenderloin', 1000, 20),
('B5', 'S5', 'Rice ', 4000, 32),
('B6', 'S6', 'Kimchi ', 2000, 24),
('B7', 'S7', 'Saos', 1000, 10),
('B8', 'S8', 'Ocha', 1000, 12),
('B9', 'S9', 'Mineral Water', 2000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` varchar(10) NOT NULL,
  `id_reservasi` varchar(50) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `id_reservasi`, `nama_customer`, `noTelp`, `email`) VALUES
('C1', 'R1', 'rere', '12313123123123', 'rere@gmail.com'),
('C2', 'R2', '09999_CrisYPT', '2134212312', '180709999@students.uajy.ac.id'),
('C3', 'R3', 'qeqe', '12313123123123', 'qeqe@gmail.com'),
('C4', 'R4', 'tete', '12313123123123', 'TETE@GMAIL.COM'),
('C5', 'R5', 'FEFE', '3244232', 'fefe@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_detail` varchar(20) NOT NULL,
  `kuantitas` varchar(20) NOT NULL,
  `total_harga` float NOT NULL,
  `status_transaksi` varchar(20) NOT NULL,
  `id_kartu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `kuantitas`, `total_harga`, `status_transaksi`, `id_kartu`) VALUES
('d1', '5', 450000, 'Lunas', 1),
('d2', '5', 3423400, 'Lunas', 2),
('d3', '4', 230000, 'Belum Lunas', 3),
('d4', '1', 123000, 'Belum Lunas', 4),
('d5', '6', 450000, 'Lunas', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` varchar(20) NOT NULL,
  `bahan_masuk` varchar(50) NOT NULL,
  `tgl_bahan_masuk` datetime NOT NULL,
  `bahan_keluar` varchar(20) NOT NULL,
  `tgl_bahan_keluar` datetime NOT NULL,
  `status_bahan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `bahan_masuk`, `tgl_bahan_masuk`, `bahan_keluar`, `tgl_bahan_keluar`, `status_bahan`) VALUES
('H1', 'Beef Short Plate', '2021-02-18 00:32:21', 'Beef Short Plate', '2021-03-19 00:32:21', 'HABIS'),
('H10', 'Orange Juice ', '2021-03-28 00:38:35', 'Orange Juice ', '2021-03-31 00:38:35', 'B.HABIS'),
('H2', 'Chicken Slice ', '2021-03-18 00:34:21', 'Chicken Slice ', '2021-03-19 00:34:21', 'HABIS'),
('H3', 'Squid ', '2021-03-18 00:34:21', 'Squid ', '2021-03-19 00:34:21', 'B.HABIS'),
('H4', 'Tenderloin ', '2021-03-18 00:35:52', 'Tenderloin ', '2021-03-19 00:35:52', 'HABIS'),
('H5', 'Rice ', '2021-03-19 00:35:52', 'Rice ', '2021-03-27 00:35:52', 'B.HABIS'),
('H6', 'Kimchi ', '2021-03-17 00:37:03', 'Kimchi ', '2021-03-19 00:37:03', 'B.HABIS'),
('H7', 'Saos', '2021-03-09 00:37:03', 'Saos', '2021-03-30 00:37:03', 'HABIS'),
('H8', 'Ocha', '2021-03-18 00:37:49', 'Ocha', '2021-03-31 00:37:49', 'B.HABIS'),
('H9', 'Mineral Water', '2021-03-25 00:37:49', 'Mineral Water', '2021-03-26 00:37:49', 'HABIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kartu`
--

CREATE TABLE `tb_kartu` (
  `id_kartu` int(5) NOT NULL,
  `no_kartu` varchar(20) NOT NULL,
  `nama_kartu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kartu`
--

INSERT INTO `tb_kartu` (`id_kartu`, `no_kartu`, `nama_kartu`) VALUES
(1, '23123121312312312', 'BCA'),
(2, '432432423423', 'BRI'),
(3, '33232132112312', 'BCA'),
(4, '54324241232', 'BNI'),
(5, '7656575756756', 'Permata'),
(6, '653575241', 'BTN'),
(7, '90907879', 'BCA'),
(8, '00567564', 'BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `id_role` varchar(20) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `jenis_kelamin` enum('PRIA','WANITA') NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tgl_gabung` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `id_role`, `nama_karyawan`, `jenis_kelamin`, `no_telp`, `email`, `tgl_gabung`) VALUES
(1, 'ROLE-1', 'Anak Agung Serang', 'PRIA', '23131231312312', 'aas@gmail.com', '2020-11-03 23:44:52'),
(2, 'ROLE-2', 'rete', 'WANITA', '2132131321231', 'yeye@gmail.com', '2020-11-11 23:44:52'),
(3, 'ROLE-2', 'WEWE', 'PRIA', '23131231312312', 'qeqe@gmail.com', '2020-06-17 23:46:50'),
(4, 'ROLE-2', 'QEQE', 'WANITA', '2132131321231', 'ae1ae@gmail.com', '2020-05-22 23:46:50'),
(5, 'ROLE-4', 'RETU', 'WANITA', '23131231312312', 'RETU@GMAIL.COM', '2020-02-12 23:47:41'),
(6, 'ROLE-3', 'GUGU', 'PRIA', '34243122', 'gugu@gmail.com', '2021-01-20 23:48:34'),
(7, 'ROLE-3', 'yuyuy', 'WANITA', '546534542', 'yuyuy@gmail.com', '2021-01-22 23:48:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_meja`
--

CREATE TABLE `tb_meja` (
  `nomor_meja` varchar(50) NOT NULL,
  `id_reservasi` varchar(50) NOT NULL,
  `status_meja` enum('TERSEDIA','TIDAK TERSEDIA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_meja`
--

INSERT INTO `tb_meja` (`nomor_meja`, `id_reservasi`, `status_meja`) VALUES
('1', 'R1', 'TERSEDIA'),
('2', '', 'TIDAK TERSEDIA'),
('3', 'R2', 'TERSEDIA'),
('4', '', 'TIDAK TERSEDIA'),
('5', 'R3', 'TERSEDIA'),
('6', '', 'TIDAK TERSEDIA'),
('7', '', 'TERSEDIA'),
('8', '', 'TERSEDIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(5) NOT NULL,
  `id_bahan` varchar(20) NOT NULL,
  `nama_menu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `id_bahan`, `nama_menu`) VALUES
(1, 'B1', 'Beef Short Plate '),
(2, 'B2', 'Chicken Slice '),
(3, 'B3', 'Squid'),
(4, 'B4', 'Tenderloin '),
(5, 'B5', 'Rice'),
(6, 'B6', 'Kimchi '),
(7, 'B7', 'Saos '),
(8, 'B8', 'Ocha'),
(9, 'B9', 'Mineral Water'),
(10, 'B10', 'Orange Juice ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` varchar(20) NOT NULL,
  `id_menu` int(5) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `waktu_pesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pesanan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_menu`, `jumlah_pesanan`, `waktu_pesanan`, `status_pesanan`) VALUES
('P1', 1, 1, '2021-03-22 18:42:30', 'SIAP'),
('P2', 1, 1, '2021-03-22 18:42:30', 'MASAK'),
('P3', 5, 4, '2021-03-23 18:43:57', 'SIAP'),
('P4', 2, 1, '2021-03-23 18:43:57', 'MASAK'),
('P5', 9, 6, '2021-03-23 18:44:34', 'SIAP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` varchar(50) NOT NULL,
  `nomor_meja` varchar(50) NOT NULL,
  `tgl_reservasi` datetime(6) NOT NULL,
  `check_in` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `id_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `nomor_meja`, `tgl_reservasi`, `check_in`, `id_transaksi`) VALUES
('R1', '1', '2021-03-22 22:58:20.000000', '2021-03-22 16:29:14.044838', 'AKB-240321-1'),
('R2', '3', '2021-03-23 22:58:20.000000', '2021-03-22 16:29:34.340164', 'AKB-230321-2'),
('R3', '5', '2021-03-25 23:00:19.000000', '2021-03-22 16:29:50.366104', 'AKB-250321-3'),
('R4', '7', '2021-03-26 23:17:54.000000', '2021-03-22 16:30:05.935045', 'AKB-260321-4'),
('R5', '8', '2021-03-26 23:17:54.000000', '2021-03-22 16:30:22.606117', 'AKB-260321-5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` varchar(20) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
('ROLE-1', 'Operation Manager'),
('ROLE-2', 'Waiter'),
('ROLE-3', 'Chef'),
('ROLE-4', 'Owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` varchar(20) NOT NULL,
  `id_history` varchar(20) NOT NULL,
  `nama_stok` varchar(40) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `jenis_stok` varchar(20) NOT NULL,
  `unit_stok` varchar(30) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `harga_stok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_history`, `nama_stok`, `jumlah_stok`, `jenis_stok`, `unit_stok`, `tanggal_masuk`, `tanggal_keluar`, `harga_stok`) VALUES
('S1', 'H1', 'Beef Short Plate ', 5000, 'Makanan Utama', 'plate', '2021-03-23 00:41:36', '2021-03-31 00:41:36', 2000000),
('S10', 'H10', 'Orange Juice', 4000, 'Minuman', 'Glass', '2021-03-23 00:41:36', '2021-03-24 00:45:12', 300000),
('S2', 'H2', 'Chicken Slice ', 2300, 'Makanan Utama', 'plate', '2021-03-23 00:45:12', '2021-03-24 00:45:12', 120000),
('S3', 'H3', 'Squid', 450, 'Makanan Utama', 'plate', '2021-03-23 00:45:12', '2021-03-25 00:45:12', 6000000),
('S4', 'H4', 'Tenderloin', 4560, 'Makanan Utama', 'plate', '2021-03-24 00:46:56', '2021-03-26 00:46:56', 1234567),
('S5', 'H5', 'Rice ', 123456, 'Makanan Utama', 'Bowl', '2021-03-26 00:46:56', '2021-03-24 00:46:56', 1234545),
('S6', 'H6', 'Kimchi ', 1234, 'Slide Dish', 'plate', '2021-03-24 01:21:06', '2021-03-25 01:21:06', 780000),
('S7', 'H7', 'Saos ', 123, 'Slide Dish', 'Mini Bowl', '2021-03-11 01:21:06', '2021-03-31 01:21:06', 500000),
('S8', 'H8', 'Ocha', 200, 'Minuman', 'Glass', '2021-03-11 01:22:57', '2021-03-25 01:22:57', 1000000),
('S9', 'H9', 'Mineral Water', 100, 'Minuman', 'Bottle', '2021-03-24 01:22:57', '2021-03-31 01:22:57', 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `metode_bayar` varchar(20) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status_transaksi` varchar(20) NOT NULL,
  `total_transaksi` float NOT NULL,
  `id_detail` varchar(20) NOT NULL,
  `id_karyawan` int(5) NOT NULL,
  `id_pesanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `metode_bayar`, `tanggal_transaksi`, `status_transaksi`, `total_transaksi`, `id_detail`, `id_karyawan`, `id_pesanan`) VALUES
('AKB-230321-2', 'Cash', '2021-03-23 01:45:17', 'Lunas', 400000, 'd1', 2, 'P1'),
('AKB-240321-1', 'Kartu Kredit', '2021-03-31 22:32:55', 'Lunas', 500000, 'd1', 3, 'P3'),
('AKB-250321-3', 'Cash', '2021-03-19 08:56:56', 'Belum Lunas', 300000, 'd2', 4, 'P2'),
('AKB-260321-4', 'Cash', '2021-03-25 08:57:48', 'Lunas', 1230000, 'd4', 4, 'P4'),
('AKB-260321-5', 'Kartu Kredit', '2021-03-26 08:57:48', 'Belum Lunas', 980000, 'd5', 3, 'P5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indeks untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_kartu` (`id_kartu`);

--
-- Indeks untuk tabel `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `tb_kartu`
--
ALTER TABLE `tb_kartu`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`nomor_meja`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `nomor_meja` (`nomor_meja`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_history` (`id_history`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_detail` (`id_detail`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kartu`
--
ALTER TABLE `tb_kartu`
  MODIFY `id_kartu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD CONSTRAINT `tb_bahan_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `tb_stok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `tb_customer_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `tb_reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `tb_bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_1` FOREIGN KEY (`nomor_meja`) REFERENCES `tb_meja` (`nomor_meja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD CONSTRAINT `tb_stok_ibfk_1` FOREIGN KEY (`id_history`) REFERENCES `tb_history` (`id_history`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_reservasi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_5` FOREIGN KEY (`id_detail`) REFERENCES `tb_detail` (`id_detail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_transaksi_ibfk_6` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
