-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Okt 2019 pada 12.28
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
  `gaji_uang_makan` int(15) NOT NULL,
  `gaji_total` int(20) NOT NULL,
  `gaji_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_gaji`
--

INSERT INTO `sigaka_gaji` (`gaji_id`, `gaji_karyawan_nik`, `gaji_tipe`, `gaji_lembur`, `gaji_uang_makan`, `gaji_total`, `gaji_date_created`) VALUES
(4, '112288', 'manpower', 28000, 45000, 294000, '2019-10-14 14:02:31'),
(6, '11551100', 'manpower', 45000, 30000, 210000, '2019-10-14 17:47:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sigaka_gaji_detail`
--

CREATE TABLE `sigaka_gaji_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_tanggal` date NOT NULL,
  `detail_gaji_id` int(11) NOT NULL,
  `detail_basic` float NOT NULL,
  `detail_uang_makan` float NOT NULL,
  `detail_jam_keluar` float NOT NULL,
  `detail_non_stop` float NOT NULL,
  `detail_jam_lembur` float NOT NULL,
  `detail_jam_basic` float NOT NULL,
  `detail_lembur` float NOT NULL,
  `detail_lembur_1_5` float NOT NULL,
  `detail_lembur_2` float NOT NULL,
  `detail_total_lembur` float NOT NULL,
  `detail_tgl_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `karyawan_no_rekening` varchar(30) NOT NULL,
  `karyawan_bpjs` enum('ada','tidak') NOT NULL DEFAULT 'tidak',
  `karyawan_tanggal_masuk` date NOT NULL,
  `karyawan_alamat` text NOT NULL,
  `karyawan_tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sigaka_karyawan`
--

INSERT INTO `sigaka_karyawan` (`karyawan_nik`, `karyawan_nama`, `karyawan_jabatan`, `karyawan_no_rekening`, `karyawan_bpjs`, `karyawan_tanggal_masuk`, `karyawan_alamat`, `karyawan_tanggal_dibuat`) VALUES
('112288', 'Jihad', 3, '389983648166312', 'ada', '2019-06-26', 'jalan tegala sari', '2019-10-09 20:05:11'),
('11551100', 'Hadi', 1, '1080016925225', 'tidak', '2019-04-01', 'jalan mawar sakti', '2019-10-08 16:16:35');

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
  MODIFY `gaji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sigaka_gaji_detail`
--
ALTER TABLE `sigaka_gaji_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
