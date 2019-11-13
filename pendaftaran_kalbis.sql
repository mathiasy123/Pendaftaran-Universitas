-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2019 at 04:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_kalbis`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `nomor_pendaftaran` varchar(6) NOT NULL,
  `role_id` int(11) NOT NULL,
  `sudah_bayar` int(1) NOT NULL,
  `validasi` int(1) NOT NULL,
  `daftar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id`, `nis`, `email`, `password`, `tanggal_daftar`, `nomor_pendaftaran`, `role_id`, `sudah_bayar`, `validasi`, `daftar`) VALUES
(2, '2017103126', 'doraxmach95@gmail.com', '$2y$10$fmg.retFemFveXV/ZfhUO.f94GbAKpVLbollnTA5m3NTgOd0vTA9i', '2019-06-06', '450544', 3, 1, 1, 1),
(6, '2017103152', 'ifkalbis@gmail.com', '$2y$10$VgkmrPOUFTas.bamg8j9CO2QQEHPI4bv4uoeasGhszN1R4vQvfm1S', '2019-06-30', '704953', 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `jenis_identitas` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(15) NOT NULL,
  `dikunci` int(1) NOT NULL,
  `data_akun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri`
--

INSERT INTO `data_diri` (`id`, `nama_lengkap`, `nis`, `jenis_identitas`, `alamat`, `telepon`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `dikunci`, `data_akun_id`) VALUES
(5, 'Mathias Yeremia Aryadi', '2017103126', 'KTP', 'Jalan Pelangi Biru 3', '08999000697', 'Laki-laki', 'Jakarta', '2019-06-06', 'Kristen', 1, 2),
(6, 'Marshell Tamidjaya', '2017103152', 'KTP', 'Jatinegara Nomor 09', '0899976504', 'Laki-laki', 'Jakarta', '2019-08-10', 'Kristen', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_dokumen`
--

CREATE TABLE `data_dokumen` (
  `id` int(11) NOT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `kartu_identitas` varchar(255) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `rapor` varchar(255) NOT NULL,
  `skhun` varchar(255) NOT NULL,
  `dikunci` int(1) NOT NULL,
  `data_akun_id` int(11) NOT NULL,
  `data_diri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dokumen`
--

INSERT INTO `data_dokumen` (`id`, `pas_foto`, `kartu_identitas`, `ijazah`, `rapor`, `skhun`, `dikunci`, `data_akun_id`, `data_diri_id`) VALUES
(16, '15803156_1377071732304865_2285124099862691840_n_jpg.jpg', '9gag_3___Bd1aBuyH3pW___.jpg', '13108850_575026932668654_1720609929_n_jpg.jpg', '17494325_236073970194477_7898554602348347392_n_jpg.jpg', '18646202_684277771755962_1148687865148866560_n_jpg.jpg', 1, 2, 5),
(23, '17495122_400585243673838_2547968139803492352_n_jpg.jpg', '17882898_1317153888360924_6021571430624264192_n_jpg.jpg', '14540471_1236203773109707_8367741975134208000_n_jpg.jpg', '18514113_299716497123146_9003604379999141888_n_jpg.jpg', '18580521_1241880325938073_5697151780295540736_n_jpg.jpg', 1, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_manager`
--

CREATE TABLE `data_manager` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_manager`
--

INSERT INTO `data_manager` (`id`, `kode`, `password`, `role_id`, `tanggal`) VALUES
(1, 'AD101', '$2y$10$WNsfd4KCPNX6FcjbxTF4G.YKL8W/qOOlrdJsAceHhV76///klyJlG', 1, '2019-04-28'),
(2, 'KU101', '$2y$10$4ZkZXY66O9t.NXFpyJdgR.6DH45q6K6bQA1pwGk8nh4H52jtpDKdG', 2, '2019-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `data_ortu`
--

CREATE TABLE `data_ortu` (
  `id` int(11) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(150) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `email_ortu` varchar(50) NOT NULL,
  `telp_ortu` varchar(20) NOT NULL,
  `penghasilan` varchar(255) NOT NULL,
  `agama_ortu` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dikunci` int(1) NOT NULL,
  `data_akun_id` int(11) NOT NULL,
  `data_diri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ortu`
--

INSERT INTO `data_ortu` (`id`, `nama_ortu`, `alamat_ortu`, `pekerjaan`, `email_ortu`, `telp_ortu`, `penghasilan`, `agama_ortu`, `status`, `dikunci`, `data_akun_id`, `data_diri_id`) VALUES
(5, 'Aryadi', 'Jalan Pelangi Biru 3', 'Pengusaha', 'aryadi@gmail.com', '081537485', '10000000', 'Kristen', 'Ayah', 1, 2, 5),
(6, 'Dono', 'Jatinegara Nomor 09', 'Pedagang', 'dono@gmail.com', '0812459234', '8000000', 'Kristen', 'Ayah', 1, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_pendidikan`
--

CREATE TABLE `data_pendidikan` (
  `id` int(11) NOT NULL,
  `jenis_sekolah` varchar(3) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `jurusan_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` varchar(150) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `dikunci` int(1) NOT NULL,
  `data_akun_id` int(11) NOT NULL,
  `data_diri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pendidikan`
--

INSERT INTO `data_pendidikan` (`id`, `jenis_sekolah`, `nama_sekolah`, `jurusan_sekolah`, `alamat_sekolah`, `provinsi`, `kecamatan`, `tahun_lulus`, `dikunci`, `data_akun_id`, `data_diri_id`) VALUES
(4, 'SMA', 'Tunas Bangsa', 'IPA', 'Sunter Agun D3', 'Jakarta', 'Jakarta Utara', '2017', 1, 2, 5),
(5, 'SMK', 'SMAN 06 ', 'Multimedia', 'Jatinegara Nomor 10', 'Jakarta', 'Jakarta Timur', '2017', 1, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_prodi`
--

CREATE TABLE `data_prodi` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `dikunci` int(1) NOT NULL,
  `data_akun_id` int(11) NOT NULL,
  `data_diri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_prodi`
--

INSERT INTO `data_prodi` (`id`, `jurusan`, `kelas`, `jenjang`, `dikunci`, `data_akun_id`, `data_diri_id`) VALUES
(8, 'Informatika', 'Pagi', 'S1', 1, 2, 5),
(9, 'Informatika', 'Pagi', 'S1', 1, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `harga_sks` int(11) NOT NULL,
  `harga_bp3` int(11) NOT NULL,
  `harga_dp3` int(11) NOT NULL,
  `harga_peralatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `harga_sks`, `harga_bp3`, `harga_dp3`, `harga_peralatan`) VALUES
(1, 'Akutansi', 6000000, 6000000, 20000000, 4000000),
(2, 'Manajemen', 6000000, 6000000, 20000000, 4000000),
(3, 'Industri Kreatif', 6000000, 6000000, 20000000, 4000000),
(4, 'Aktuaria (Matematika Bisnis)', 6000000, 6000000, 20000000, 4000000),
(5, 'Sistem Informasi', 6200000, 6200000, 20000000, 4500000),
(6, 'Informatika', 6200000, 6200000, 20000000, 4500000),
(7, 'Komputasi dan Teknologi Game', 6200000, 6200000, 20000000, 4500000),
(8, 'Komunikasi', 6200000, 6200000, 20000000, 4500000),
(9, 'Periklanan dan Digital Komunikasi', 6200000, 6200000, 20000000, 4500000),
(10, 'Arsitektur', 6200000, 6200000, 20000000, 4500000),
(11, 'Broadcasting', 6800000, 6800000, 20000000, 4500000),
(12, 'Desain Komunikasi Visual', 7200000, 7200000, 20000000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Keuangan'),
(3, 'Pendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Keuangan'),
(3, 'Pendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `is_active`) VALUES
(1, 1, 'Beranda', 'admin', 1),
(2, 1, 'Data Akun', 'admin/akun', 1),
(3, 1, 'Data Pendaftaran', 'admin/pendaftaran', 1),
(4, 1, 'Data Dokumen', 'admin/dokumen', 1),
(5, 1, 'Rekapan', 'admin/rekap', 1),
(6, 3, 'Beranda', 'pendaftar', 1),
(7, 3, 'Persyaratan', 'pendaftar/persyaratan', 1),
(8, 3, 'Prosedur Pendaftaran', 'pendaftar/prosedur', 1),
(9, 3, 'Pendaftaran', 'pendaftar/pendaftaran', 1),
(10, 3, 'Informasi', 'pendaftar/informasi', 1),
(11, 2, 'Beranda', 'keuangan', 1),
(12, 2, 'Pembayaran', 'keuangan/pembayaran', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dokumen`
--
ALTER TABLE `data_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_manager`
--
ALTER TABLE `data_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_prodi`
--
ALTER TABLE `data_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_diri`
--
ALTER TABLE `data_diri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_dokumen`
--
ALTER TABLE `data_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_manager`
--
ALTER TABLE `data_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_ortu`
--
ALTER TABLE `data_ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_prodi`
--
ALTER TABLE `data_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
