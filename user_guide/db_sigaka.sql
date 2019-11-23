-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Nov 2019 pada 11.30
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigaka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_absen`
--

CREATE TABLE `sigaka_absen` (
  `absen_id` int(11) NOT NULL,
  `absen_karyawan_nik` varchar(20) NOT NULL,
  `absen_hari` varchar(10) NOT NULL,
  `absen_status` enum('lembur','normal','','') NOT NULL,
  `absen_jam_lembur` int(10) DEFAULT NULL,
  `absen_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_absen`
--

INSERT INTO `sigaka_absen` (`absen_id`, `absen_karyawan_nik`, `absen_hari`, `absen_status`, `absen_jam_lembur`, `absen_date_created`) VALUES
(14, '112288', 'Senin', 'lembur', 2, '2019-10-14 14:02:31'),
(16, '11551100', 'Senin', 'lembur', 3, '2019-10-14 17:47:18'),
(17, '112288', 'Selasa', 'normal', NULL, '2019-10-15 20:08:45'),
(18, '11551100', 'Selasa', 'normal', NULL, '2019-10-15 20:08:55'),
(19, '112288', 'Rabu', 'normal', NULL, '2019-10-16 09:22:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_gaji`
--

CREATE TABLE `sigaka_gaji` (
  `gaji_id` int(11) NOT NULL,
  `gaji_karyawan_nik` varchar(20) NOT NULL,
  `gaji_tipe` enum('manpower','project','contract') NOT NULL,
  `gaji_lembur` int(20) DEFAULT '0',
  `gaji_uang_makan` int(15) DEFAULT NULL,
  `gaji_total` int(20) DEFAULT NULL,
  `gaji_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_gaji`
--

INSERT INTO `sigaka_gaji` (`gaji_id`, `gaji_karyawan_nik`, `gaji_tipe`, `gaji_lembur`, `gaji_uang_makan`, `gaji_total`, `gaji_date_created`) VALUES
(4, '112288', 'manpower', 28000, 45000, 294000, '2019-10-14 14:02:31'),
(6, '11551100', 'manpower', 45000, 30000, 210000, '2019-10-14 17:47:18'),
(9, '443210987', 'project', 0, NULL, NULL, '2019-10-23 18:09:27'),
(12, '115511987', 'contract', 0, NULL, NULL, '2019-10-24 11:19:38'),
(15, '654312345', 'contract', 0, NULL, NULL, '2019-10-24 11:22:42'),
(25, '1212345', 'project', 0, NULL, NULL, '2019-10-25 13:00:23'),
(30, '1155119854', 'contract', 0, NULL, NULL, '2019-11-01 16:57:56'),
(31, '115511987', 'contract', 0, NULL, NULL, '2019-11-08 08:01:34'),
(32, '11551100', 'manpower', 0, NULL, NULL, '2019-11-08 08:13:59'),
(33, '443210987', 'project', 0, NULL, NULL, '2019-11-08 17:25:31'),
(34, '1212345', 'project', 0, NULL, NULL, '2019-11-09 16:07:04'),
(35, '654312345', 'contract', 0, NULL, NULL, '2019-11-14 09:47:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_gaji_detail`
--

CREATE TABLE `sigaka_gaji_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_tanggal` date NOT NULL,
  `detail_gaji_id` int(11) NOT NULL,
  `detail_basic` float DEFAULT NULL,
  `detail_uang_hadir` int(11) DEFAULT NULL,
  `detail_uang_makan` float DEFAULT NULL,
  `detail_jam_keluar` float NOT NULL,
  `detail_non_stop` float NOT NULL,
  `detail_jam_lembur` float DEFAULT NULL,
  `detail_jam_basic` float DEFAULT NULL,
  `detail_lembur` float DEFAULT NULL,
  `detail_lembur_1_5` float DEFAULT NULL,
  `detail_lembur_2` float DEFAULT NULL,
  `detail_total_lembur` float DEFAULT NULL,
  `detail_tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_gaji_detail`
--

INSERT INTO `sigaka_gaji_detail` (`detail_id`, `detail_tanggal`, `detail_gaji_id`, `detail_basic`, `detail_uang_hadir`, `detail_uang_makan`, `detail_jam_keluar`, `detail_non_stop`, `detail_jam_lembur`, `detail_jam_basic`, `detail_lembur`, `detail_lembur_1_5`, `detail_lembur_2`, `detail_total_lembur`, `detail_tgl_dibuat`) VALUES
(22, '2019-10-25', 12, 1, NULL, 1, 17, 0, NULL, 8, NULL, NULL, NULL, NULL, '2019-10-25 13:33:15'),
(23, '2019-10-25', 6, 1, NULL, 1, 19, 0, 2, 8, 2, 1, 0.5, 2.5, '2019-10-25 13:43:07'),
(24, '2019-10-25', 15, 1, NULL, 1, 19, 0, 2, 8, 2, 1, 0.5, 2.5, '2019-10-25 16:41:38'),
(25, '2019-10-24', 15, 1, NULL, 1, 18, 0, 2, 8, 2, 1, 1, 3.5, '2019-10-25 16:43:27'),
(26, '2019-10-28', 25, 1, NULL, 1, 16, 0, NULL, 7, NULL, NULL, NULL, NULL, '2019-10-28 10:10:51'),
(27, '2019-10-28', 9, 1, NULL, 1, 19, 0, 3, 8, 3, 1, 1.5, 4.5, '2019-10-28 10:48:35'),
(28, '2019-10-28', 4, 1, NULL, 1, 19, 0, 3, 8, 3, 1, 1.5, 4.5, '2019-10-28 10:51:37'),
(29, '2019-10-28', 6, 1, NULL, 1, 19, 0, 3, 8, 3, 1, 1.5, 4.5, '2019-10-28 10:52:10'),
(34, '2019-10-26', 4, 1, NULL, 1, 14, 1, 1, 9, 2.5, 1, NULL, 4, '2019-10-29 11:47:32'),
(35, '2019-10-29', 12, 1, NULL, 1, 17, 1, 1, 8, 2.5, 1, 0, 3, '2019-10-29 11:51:33'),
(36, '2019-10-18', 12, 1, NULL, 1, 17, 1, NULL, 8, NULL, NULL, NULL, 1.5, '2019-10-29 11:52:20'),
(37, '2019-10-29', 6, 1, NULL, 1, 19, 1, 3, 8, 4.5, 1, 1.5, 7, '2019-10-29 15:07:29'),
(38, '2019-10-29', 4, 1, NULL, 1, 16, 0, NULL, 7, NULL, NULL, NULL, NULL, '2019-10-29 16:43:10'),
(39, '2019-10-26', 15, 1, NULL, 1, 20, 1, 7, 4, 8.5, 1, 5.5, 15, '2019-10-29 16:45:09'),
(40, '2019-10-29', 9, 1, NULL, 1, 19, 1, 3, 8, 4.5, 1, 1.5, 7, '2019-10-31 08:51:22'),
(41, '2019-10-30', 9, 1, NULL, 1, 20, 1, 4, 8, 5.5, 1, 2.5, 9, '2019-10-31 08:51:56'),
(42, '2019-10-30', 12, 1, NULL, 1, 16, 0, NULL, 7, NULL, NULL, NULL, NULL, '2019-10-31 14:42:12'),
(43, '2019-11-08', 30, 1, 1, 1, 18, 1, 1, 8, 1, 1, 0, 3, '2019-11-08 08:02:45'),
(44, '2019-11-08', 31, 1, 1, 1, 20, 1, 3, 8, 4.5, 1, 3, 7, '2019-11-08 08:05:22'),
(45, '2019-11-08', 32, 1, NULL, 1, 20, 0, 3, 8, 3, 1, 1.5, 4.5, '2019-11-08 08:14:43'),
(46, '2019-10-31', 9, 1, NULL, 1, 21, 1, 5, 8, 6.5, 1, 3.5, 11, '2019-11-08 17:18:12'),
(47, '2019-11-08', 33, 1, NULL, 1, 19, 0, 2, 8, 2, 1, 0.5, 2.5, '2019-11-08 17:28:23'),
(48, '2019-11-09', 33, 1, NULL, 1, 16, 0, 3, 11, 3, 1, 2, 5.5, '2019-11-09 16:05:10'),
(49, '2019-11-09', 34, 1, NULL, 1, 16, 0, 3, 11, 3, 1, 2, 5.5, '2019-11-09 16:07:37'),
(50, '2019-10-26', 6, 1, NULL, 1, 18, 1, 5, 4, 6.5, 1, 4, 12, '2019-11-09 16:13:55'),
(51, '2019-10-27', 4, NULL, NULL, 1, 16, 0, 7, NULL, 7, NULL, 7, 14, '2019-11-09 16:16:03'),
(52, '2019-10-17', 15, 1, NULL, 1, 18, 0, 2, 8, 2, 1, 1, 3.5, '2019-11-14 14:38:54'),
(53, '2019-10-10', 15, 1, NULL, 1, 18, 0, 2, 8, 2, 1, 1, 3.5, '2019-11-14 14:39:43'),
(54, '2019-10-03', 15, 1, NULL, 1, 18, 0, 2, 8, 2, 1, 2, 5.5, '2019-11-14 14:43:48'),
(55, '2019-11-15', 30, 1, 1, 1, 18, 0, 1, 8, 1, 1, 0, 1.5, '2019-11-15 20:31:20'),
(56, '2019-11-15', 35, 1, 1, 1, 18, 0, 1, 8, 1, 1, 0, 1.5, '2019-11-15 20:50:48'),
(57, '2019-11-14', 35, 1, 1, 1, 21, 1, 5, 8, 6.5, 1, 3.5, 11, '2019-11-15 21:01:23'),
(58, '2019-11-13', 35, 1, 1, 1, 16, 0, NULL, 7, NULL, NULL, NULL, NULL, '2019-11-15 21:02:07'),
(59, '2019-11-16', 31, 1, 1, 1, 16, 1, 3, 11, 4.5, 1, 2, 7, '2019-11-16 06:02:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_jabatan`
--

CREATE TABLE `sigaka_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(255) NOT NULL,
  `jabatan_basic` int(11) NOT NULL,
  `jabatan_uang_makan` int(11) NOT NULL,
  `jabatan_lembur` int(11) NOT NULL,
  `jabatan_tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_jabatan`
--

INSERT INTO `sigaka_jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_basic`, `jabatan_uang_makan`, `jabatan_lembur`, `jabatan_tanggal_dibuat`) VALUES
(1, 'Welder GTAW', 105000, 15000, 15000, '2019-10-08 14:24:54'),
(2, 'Welder SMAW', 84000, 15000, 12000, '2019-10-08 16:29:53'),
(3, 'Fitter 1', 98000, 15000, 14000, '2019-10-08 16:32:48'),
(4, 'Fitter 2', 77000, 12000, 11000, '2019-10-08 16:33:42'),
(5, 'Fitter 3', 70000, 12000, 10000, '2019-10-08 16:34:32'),
(6, 'Helper', 59500, 12000, 8500, '2019-10-08 16:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_karyawan`
--

CREATE TABLE `sigaka_karyawan` (
  `karyawan_nik` varchar(10) NOT NULL,
  `karyawan_nama` varchar(255) NOT NULL,
  `karyawan_jabatan` int(11) NOT NULL,
  `karyawan_nama_rekening` enum('mandiri','sinarmas') NOT NULL,
  `karyawan_no_rekening` varchar(30) NOT NULL,
  `karyawan_bpjs` enum('ada','tidak') NOT NULL DEFAULT 'tidak',
  `karyawan_tanggal_masuk` date NOT NULL,
  `karyawan_alamat` text NOT NULL,
  `karyawan_tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_karyawan`
--

INSERT INTO `sigaka_karyawan` (`karyawan_nik`, `karyawan_nama`, `karyawan_jabatan`, `karyawan_nama_rekening`, `karyawan_no_rekening`, `karyawan_bpjs`, `karyawan_tanggal_masuk`, `karyawan_alamat`, `karyawan_tanggal_dibuat`) VALUES
('112288', 'Jihad', 3, 'mandiri', '1080016925225', 'ada', '2019-06-26', 'jalan tegala sari', '2019-10-09 20:05:11'),
('11551100', 'Hadi', 1, 'mandiri', '1080017830101', 'tidak', '2019-04-01', 'jalan mawar sakti', '2019-10-08 16:16:35'),
('1155119854', 'jainudin naciro', 1, 'sinarmas', '0047862035', 'ada', '2019-09-01', 'jalan gagak', '2019-11-01 16:35:51'),
('115511987', 'fulan', 4, 'sinarmas', '0047223292', 'ada', '2019-10-01', 'jalan yang lurus', '2019-10-23 18:02:30'),
('1212345', 'sidiq', 6, 'sinarmas', '1080013032983', 'tidak', '2019-10-02', 'jln belimbing', '2019-10-22 13:48:02'),
('443210987', 'Ryan', 5, 'mandiri', '1080017924300', 'ada', '2019-10-03', 'jalan mustamindo', '2019-10-23 18:05:20'),
('654312345', 'mirwansyah', 2, 'sinarmas', '0025120687', 'tidak', '2019-10-08', 'jalan telaga sari', '2019-10-24 10:40:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_pengguna`
--

CREATE TABLE `sigaka_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(225) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_pengguna`
--

INSERT INTO `sigaka_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_tanggal_dibuat`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2019-10-07 11:52:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_potongan`
--

CREATE TABLE `sigaka_potongan` (
  `potongan_id` int(11) NOT NULL,
  `potongan_gaji_id` int(11) NOT NULL,
  `potongan_jamsostek_kesehatan` int(11) DEFAULT '0',
  `potongan_jamsostek_kerja` int(11) DEFAULT '0',
  `potongan_dana_pensiun` int(11) DEFAULT '0',
  `potongan_pinjaman` int(11) DEFAULT '0',
  `potongan_rapel` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_potongan`
--

INSERT INTO `sigaka_potongan` (`potongan_id`, `potongan_gaji_id`, `potongan_jamsostek_kesehatan`, `potongan_jamsostek_kerja`, `potongan_dana_pensiun`, `potongan_pinjaman`, `potongan_rapel`) VALUES
(1, 4, 0, 60000, 78000, 0, 0),
(3, 12, 52000, 90, 52000, 0, 0),
(4, 9, 30000, 52000, 0, 400000, 0),
(5, 32, 52000, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sigaka_absen`
--
ALTER TABLE `sigaka_absen`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `sigaka_gaji`
--
ALTER TABLE `sigaka_gaji`
  ADD PRIMARY KEY (`gaji_id`);

--
-- Indexes for table `sigaka_gaji_detail`
--
ALTER TABLE `sigaka_gaji_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `sigaka_jabatan`
--
ALTER TABLE `sigaka_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `sigaka_karyawan`
--
ALTER TABLE `sigaka_karyawan`
  ADD PRIMARY KEY (`karyawan_nik`);

--
-- Indexes for table `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `sigaka_potongan`
--
ALTER TABLE `sigaka_potongan`
  ADD PRIMARY KEY (`potongan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sigaka_absen`
--
ALTER TABLE `sigaka_absen`
  MODIFY `absen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sigaka_gaji`
--
ALTER TABLE `sigaka_gaji`
  MODIFY `gaji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sigaka_gaji_detail`
--
ALTER TABLE `sigaka_gaji_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `sigaka_jabatan`
--
ALTER TABLE `sigaka_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sigaka_potongan`
--
ALTER TABLE `sigaka_potongan`
  MODIFY `potongan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
