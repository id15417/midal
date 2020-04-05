-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 01:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpermintaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `belanja_modal`
--

CREATE TABLE `belanja_modal` (
  `id_bmodal` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_sub_bidang` int(11) NOT NULL,
  `id_kat_perbaikan` int(11) NOT NULL,
  `bmodal` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `status_post` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `belanja_modal`
--

INSERT INTO `belanja_modal` (`id_bmodal`, `id_pegawai`, `id_sub_bidang`, `id_kat_perbaikan`, `bmodal`, `tgl`, `ket`, `status_post`) VALUES
(27, 46, 16, 3, 'sdvsdvsdv', '2020-04-01', 'cnftgntntndrdr edited 22', 1),
(30, 44, 19, 4, 'jtyjtyjt', '2020-04-01', 'gdfgdfgdfgdf edited 22', 2),
(34, 44, 12, 18, 'Perbaikan Alat Laboratorium Teranokoko', '2020-04-03', 'dsdgfdgfdgfg edited 22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nm_bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nm_bidang`) VALUES
(83, 'Bidang Pengujian'),
(84, 'Bidang Pemeriksaan'),
(85, 'Bidang Penindakan'),
(86, 'Bidang Infokom'),
(87, 'Bagian Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `form_perbaikan`
--

CREATE TABLE `form_perbaikan` (
  `id_permintaan` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_sub_bidang` int(11) NOT NULL,
  `permintaan` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(500) NOT NULL,
  `status_post` int(11) NOT NULL DEFAULT 0,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_perbaikan`
--

INSERT INTO `form_perbaikan` (`id_permintaan`, `id_bidang`, `id_pegawai`, `id_sub_bidang`, `permintaan`, `tgl`, `ket`, `status_post`, `id_author`) VALUES
(121, 83, 42, 17, 'ghjgyj', '2020-04-02', 'jghjghjghjgh pending', 0, 0),
(122, 85, 27, 12, 'kjghiku', '2020-04-02', 'jhvfjhvfjh edited 22', 2, 0),
(138, 87, 27, 46, 'Alat Pengolah Data', '2020-04-03', 'vsdvsdvsd edited sukses', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kat_perbaikan`
--

CREATE TABLE `kat_perbaikan` (
  `id_kat_perbaikan` int(11) NOT NULL,
  `kat_perbaikan` varchar(50) NOT NULL,
  `mak` varchar(100) NOT NULL,
  `rincian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_perbaikan`
--

INSERT INTO `kat_perbaikan` (`id_kat_perbaikan`, `kat_perbaikan`, `mak`, `rincian`) VALUES
(1, 'PEMELIHARAAN GEDUNG KANTOR', '3165.994.002.B.523111', ''),
(2, 'PERAWATAN PERALATAN FUNGSIONAL', '3165.994.002.A.523121', ''),
(3, 'PEMELIHARAAN DAN PERBAIKAN PERALATAN KANTOR', '3165.994.002.C.523121', ''),
(4, 'PERAWATAN KENDARAAN RODA 4/6', '3165.994.002.F.523121', ''),
(5, 'PERALATAN DAN PERLENGKAPAN KANTOR', '3165.994.002.O.523121', ''),
(10, 'BELANJA KEPERLUAN PERKANTORAN', '3165.994.002.L.521111', ''),
(11, 'ADMINISTRASI PERKANTORAN - BELANJA BAHAN', '3165.994.002.L.521211', ''),
(12, 'BELANJA BARANG PERSEDIAAN BARANG KONSUMSI', '3165.994.002.L.521811', ''),
(14, 'PENGUJIAN MIKROBIOLOGI', '3165.012.051.C.524123', ''),
(17, 'PENGUJIAN PANGAN & BB', '3165.012.051.F.524123', ''),
(18, 'PENGUJIAN TERANOKOKO', '3165.012.052.D.524124', '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_bidang`, `nm_pegawai`, `jabatan`, `nip`) VALUES
(27, 87, 'Moh Akbar M Doating', 'Pegawai tidak tetap', '-'),
(42, 83, 'Audry Agata Lenak, S.Si', 'Staf Bidang Pengujian', '123'),
(43, 87, 'Agung Kurniawan, ST', 'Kepala Bagian Tata Usaha', '99900000'),
(44, 83, 'Mirna Merdiana', 'Staf Pengujian', '00990099'),
(46, 83, 'Sukmayanti, S.Si', 'Staf Pengujian', '0110100101');

-- --------------------------------------------------------

--
-- Table structure for table `sub_bidang`
--

CREATE TABLE `sub_bidang` (
  `id_sub_bidang` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sub_bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_bidang`
--

INSERT INTO `sub_bidang` (`id_sub_bidang`, `id_bidang`, `sub_bidang`) VALUES
(6, 47, 'Staf Teranokoko'),
(7, 47, 'Laboratorium Teranokoko'),
(10, 0, 'Laboratorium Pangan & BB'),
(11, 0, 'Staf Pangan & BB'),
(12, 0, 'Laboratorium Teranokoko'),
(13, 0, 'Staf Teranokoko'),
(14, 0, 'Laboratorium Mikrobiologi'),
(15, 0, 'Staf Mikrobiologi'),
(16, 0, 'Koordinator MUTU'),
(17, 0, 'Kasie Pengujian Kimia '),
(18, 0, 'Kasie Pengujian Mikrobiologi'),
(19, 47, 'Kepala Bidang Pengujian'),
(20, 0, 'Admin Sampel'),
(22, 45, 'Bendahara'),
(23, 45, 'Kasub Program & Evaluasi'),
(24, 0, 'Kasub Umum'),
(25, 0, 'Staf Program & Evaluasi'),
(26, 0, 'Staf Umum/Perlengkapan'),
(27, 45, 'Sekretaris'),
(28, 45, 'Kepala Bagian Tata Usaha'),
(29, 44, 'Staf Infokom'),
(30, 44, 'Kepala Bidang Infokom'),
(31, 0, 'Staf Pemeriksaan/Inspeksi'),
(32, 42, 'Kepala Bidang Pemeriksaan '),
(33, 42, 'Kasie Inspeksi'),
(34, 0, 'Kasie Sertifikasi'),
(35, 0, 'Ruang Kepala Balai'),
(36, 0, 'Staf Penindakan'),
(42, 0, 'Kepala Bidang Penindakan'),
(46, 0, 'Ruang Server');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(11) NOT NULL,
  `judul_file` varchar(100) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_upload`, `judul_file`, `nama_file`, `bidang`, `tgl`) VALUES
(1, 'qwqerty', 'wwweewewew', 'Bidang Infokom', '2020-03-16'),
(2, 'ascasc', 'ascasc', 'Bidang Infokom', '2020-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_lengkap`, `username`, `password`, `level`) VALUES
(120, 'Audry Agata Lenak, S.Si', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user'),
(121, 'Moh Akbar M Doating', 'sultan', '1ecf0d3b91a10748bf035efdc0fad552aefe2ade', 'admin'),
(122, 'Agung Kurniawan, ST', 'agung', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_kat_perbaikan` int(11) NOT NULL,
  `pengelola` varchar(100) NOT NULL,
  `nm_pengelola` varchar(100) NOT NULL,
  `tgl_verifikasi` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `status_keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`id_verifikasi`, `id_permintaan`, `id_kat_perbaikan`, `pengelola`, `nm_pengelola`, `tgl_verifikasi`, `tgl_selesai`, `biaya`, `status_keterangan`) VALUES
(1, 121, 18, 'PK3', 'Pratama engineer', '2020-04-02', '2020-04-03', 120000, 'Sukses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belanja_modal`
--
ALTER TABLE `belanja_modal`
  ADD PRIMARY KEY (`id_bmodal`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_sub_bidang` (`id_sub_bidang`),
  ADD KEY `id_kat_perbaikan` (`id_kat_perbaikan`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `form_perbaikan`
--
ALTER TABLE `form_perbaikan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_sub_bidang` (`id_sub_bidang`);

--
-- Indexes for table `kat_perbaikan`
--
ALTER TABLE `kat_perbaikan`
  ADD PRIMARY KEY (`id_kat_perbaikan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `sub_bidang`
--
ALTER TABLE `sub_bidang`
  ADD PRIMARY KEY (`id_sub_bidang`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`),
  ADD KEY `id_permintaan` (`id_permintaan`),
  ADD KEY `id_kat_perbaikan` (`id_kat_perbaikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belanja_modal`
--
ALTER TABLE `belanja_modal`
  MODIFY `id_bmodal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `form_perbaikan`
--
ALTER TABLE `form_perbaikan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `kat_perbaikan`
--
ALTER TABLE `kat_perbaikan`
  MODIFY `id_kat_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sub_bidang`
--
ALTER TABLE `sub_bidang`
  MODIFY `id_sub_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
