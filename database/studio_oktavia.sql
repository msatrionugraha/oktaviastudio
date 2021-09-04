-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 01:01 PM
-- Server version: 10.4.11-MariaDB-log
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studio_oktavia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akomodasi_oktavia`
--

CREATE TABLE `akomodasi_oktavia` (
  `id_akomo` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_akomo` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `debit` varchar(20) DEFAULT NULL,
  `kredit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akomodasi_oktavia`
--

INSERT INTO `akomodasi_oktavia` (`id_akomo`, `keterangan`, `tgl_akomo`, `jenis`, `debit`, `kredit`) VALUES
('AKM202107110001', 'PEMBELIAN LAMPU FOTO+TRIPOD', '2021-07-11', 'pengeluaran', '', '3000000'),
('AKM202108150002', 'Photograpy Keluarga', '2021-08-15', 'pengeluaran', '', '1000000'),
('AKM202108170003', 'Baso Kurdi', '2021-08-17', 'pemasukan', '100.000', ''),
('AKM202108170004', 'PEMBELIAN LAMPU FOTO+TRIPOD', '2021-08-17', 'pemasukan', '100.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_oktavia`
--

CREATE TABLE `jurnal_oktavia` (
  `no_id` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `uang_masuk` varchar(20) DEFAULT NULL,
  `uang_keluar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal_oktavia`
--

INSERT INTO `jurnal_oktavia` (`no_id`, `keterangan`, `tgl`, `jenis`, `uang_masuk`, `uang_keluar`) VALUES
('JRN202107110001', 'Pemasukan dari No Id :AKM202107110001', '2021-07-11', 'pengeluaran', '', '3000000'),
('JRN202107110002', 'Pemasukan dari No Id :PYM202107110001', '2021-07-11', 'pemasukan', '7000000', ''),
('JRN202107130003', 'Pemasukan dari No Id :PYM202107130002', '2021-07-13', 'pemasukan', '500000', '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_oktavia`
--

CREATE TABLE `karyawan_oktavia` (
  `id_karyawan` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `gaji` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan_oktavia`
--

INSERT INTO `karyawan_oktavia` (`id_karyawan`, `nama`, `alamat`, `no_telp`, `jabatan`, `gaji`) VALUES
('KRY0001', 'Robi Agustiana Agustin', 'BSM', '0887789667', 'Creator Design', '1300000'),
('PNT0005', 'amin', 'perum', '8897988', 'petugas', '300000'),
('PTG0007', 'amin', 'perum', '8897988', 'petugas', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `paket_oktavia`
--

CREATE TABLE `paket_oktavia` (
  `id_paket` varchar(20) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` varchar(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_petugas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_oktavia`
--

INSERT INTO `paket_oktavia` (`id_paket`, `nama_paket`, `harga`, `keterangan`, `tgl_masuk`, `id_petugas`) VALUES
('PNT0001', 'Desain Feeds Instagram', '1000000', 'Desain', '2021-01-17', 'PET0001'),
('PNT0002', 'Photography', '600000', 'Photograpy ', '2021-02-08', 'PET0002'),
('PNT0003', 'Motion Video Online', '200000', 'Maotion Fot', '2021-08-15', 'PET0002'),
('PNT0005', 'Social Media Management', '4000000', '30 Feeds', '0000-00-00', 'PET0001'),
('PNT0011', 'Social Media Management', '4000000', '30 Feeds', '0000-00-00', 'PET0001'),
('PNT0012', 'Social Media Management', '4000000', '30 Feeds', '2020-08-17', 'PET0001');

-- --------------------------------------------------------

--
-- Table structure for table `payment_oktavia`
--

CREATE TABLE `payment_oktavia` (
  `id_payment` varchar(15) NOT NULL,
  `id_beli` varchar(15) NOT NULL,
  `tgl_payment` date NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `kembali` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_oktavia`
--

INSERT INTO `payment_oktavia` (`id_payment`, `id_beli`, `tgl_payment`, `bayar`, `total_bayar`, `kembali`) VALUES
('PYM202107110001', 'TRS202107110001', '2021-07-11', '7000000', '7000000', '0'),
('PYM202107130002', 'TRS202107130002', '2021-07-13', '500000', '500000', '0'),
('PYM202108160003', 'TRS202108160003', '2021-08-16', '1200000', '2000000', '800000'),
('PYM202108160004', 'TRS202107130002', '2021-08-16', '100000', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_det_oktavia`
--

CREATE TABLE `pembelian_det_oktavia` (
  `no` int(11) NOT NULL,
  `id_beli` varchar(20) NOT NULL,
  `id_paket` varchar(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `total` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_det_oktavia`
--

INSERT INTO `pembelian_det_oktavia` (`no`, `id_beli`, `id_paket`, `tgl_beli`, `nama_paket`, `harga`, `jumlah`, `total`) VALUES
(1, 'TRS202107110001', 'PNT0001', '2021-07-11', 'Desain Feeds Instagram', '1000000', '7', '7000000'),
(2, 'TRS202107130002', 'PNT0002', '2021-07-13', 'Photography', '600000', '1', '600000'),
(3, 'TRS202108160003', 'PNT0002', '2021-08-16', 'Photography', '600000', '2', '1200000');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_head_oktavia`
--

CREATE TABLE `pembelian_head_oktavia` (
  `id_beli` varchar(20) NOT NULL,
  `nm_beli` varchar(35) NOT NULL,
  `alamat_beli` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_lunas` date NOT NULL,
  `sub_bayar` varchar(15) DEFAULT NULL,
  `kurang` varchar(15) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_head_oktavia`
--

INSERT INTO `pembelian_head_oktavia` (`id_beli`, `nm_beli`, `alamat_beli`, `no_telp`, `tgl_beli`, `tgl_lunas`, `sub_bayar`, `kurang`, `keterangan`) VALUES
('TRS202107110001', 'Satrio', 'Ciawi', '0887789667', '2021-07-11', '2021-07-11', '7000000', '0', 'Belum Selesai'),
('TRS202107130002', 'Satrio', 'c', '0887789678', '2021-07-13', '2021-08-16', '600000', '0', 'Selesai'),
('TRS202108160003', 'Trisna', 'Kawali', '0899876759', '2021-08-16', '2021-08-16', '1200000', '0', 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_oktavia`
--

CREATE TABLE `petugas_oktavia` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_ptgs` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas_oktavia`
--

INSERT INTO `petugas_oktavia` (`id_petugas`, `nama_ptgs`, `username`, `password`, `level`) VALUES
('PET0001', 'RIfqi', 'rifqi123', '21232f297a57a5a743894a0e4a801fc3', '2'),
('PET0002', 'admin', 'adminku', '21232f297a57a5a743894a0e4a801fc3', '1'),
('PET0003', 'Silma Ismul Usna', 'silma123', '21232f297a57a5a743894a0e4a801fc3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `saldo_oktavia`
--

CREATE TABLE `saldo_oktavia` (
  `no` int(11) NOT NULL,
  `saldoku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo_oktavia`
--

INSERT INTO `saldo_oktavia` (`no`, `saldoku`) VALUES
(1, '12303000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akomodasi_oktavia`
--
ALTER TABLE `akomodasi_oktavia`
  ADD PRIMARY KEY (`id_akomo`);

--
-- Indexes for table `jurnal_oktavia`
--
ALTER TABLE `jurnal_oktavia`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `karyawan_oktavia`
--
ALTER TABLE `karyawan_oktavia`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `paket_oktavia`
--
ALTER TABLE `paket_oktavia`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `payment_oktavia`
--
ALTER TABLE `payment_oktavia`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `pembelian_det_oktavia`
--
ALTER TABLE `pembelian_det_oktavia`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pembelian_head_oktavia`
--
ALTER TABLE `pembelian_head_oktavia`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `petugas_oktavia`
--
ALTER TABLE `petugas_oktavia`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `saldo_oktavia`
--
ALTER TABLE `saldo_oktavia`
  ADD PRIMARY KEY (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
