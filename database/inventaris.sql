-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2014 at 11:09 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_lab` int(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `identitas` varchar(30) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `tgl_pembelian` varchar(15) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_lab`, `nama_barang`, `jenis_barang`, `identitas`, `kondisi`, `posisi`, `tgl_pembelian`) VALUES
(3, 37, 'Monitor', 'Hardware', 'BR-3', 'Rusak', 'Digudang', '21-07-2014'),
(4, 37, 'CPU', 'Hardware', 'BR-4', 'Baik', 'Dipakai', '10-10-2014'),
(5, 37, 'Mouse', 'Hardware', 'BR-5', 'Rusak', 'Dipakai', '10-10-2014'),
(6, 37, 'AC', 'Alat Laboratory', 'BR-6', 'Baik', 'Digudang', '10-10-2014'),
(8, 37, 'Meja', 'Alat Laboratory', 'BR-8', 'Baik', 'Dipakai', '10-10-2014'),
(9, 45, 'Infocus', 'Alat Tambahan', 'BR-9', 'Rusak', 'Dipakai', '15-10-2014'),
(10, 37, 'Keyboard', 'Hardware', 'BR-10', 'Rusak', 'Dipakai', '21-10-2014');

-- --------------------------------------------------------

--
-- Table structure for table `dekorasi`
--

CREATE TABLE IF NOT EXISTS `dekorasi` (
  `id_dekorasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_lab` int(5) NOT NULL,
  `nama_dekorasi` varchar(50) NOT NULL,
  `identitas` varchar(30) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_dekorasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dekorasi`
--

INSERT INTO `dekorasi` (`id_dekorasi`, `id_lab`, `nama_dekorasi`, `identitas`, `posisi`, `kondisi`) VALUES
(7, 37, 'Lukisan', 'DK-7', 'Dipakai', 'Rusak'),
(5, 37, 'Hiasan', 'DK-5', 'Dipakai', 'Rusak'),
(6, 37, 'Gorden', 'DK-6', 'Digudang', 'Rusak'),
(9, 37, 'Gorden', 'DK-9', 'Dipakai', 'Rusak'),
(10, 37, 'Tirai', 'DK-10', 'Dipakai', 'Rusak'),
(12, 37, 'Karpet', 'DK-12', 'Dipakai', 'Rusak'),
(13, 37, 'Pot Bunga', 'DK-13', 'Dipakai', 'Rusak'),
(14, 37, 'Karpet', 'DK-14', 'Dipakai', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_fakultas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `aktif`) VALUES
(16, 'Fakultas Teknik Elektro (FTE)', 'Y'),
(17, 'Fakultas Rekayasa Industri (FRI)', 'Y'),
(18, 'Fakultas Informatika (FIF)', 'Y'),
(19, 'Fakultas Ekonomi dan Bisnis (FEB)', 'Y'),
(20, 'Fakultas Komunikasi dan Bisnis (FKB)', 'Y'),
(21, 'Fakultas Industri Kreatif (FIK)', 'Y'),
(22, 'Fakultas Ilmu Terapan (FIT)', 'Y'),
(23, 'Direktorat Pascasarjana', 'Y'),
(24, 'Program Perkuliahan Dasar dan Umum (PPDU)', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `id_lab` int(5) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(5) NOT NULL,
  `nama_lab` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_lab`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `id_fakultas`, `nama_lab`, `deskripsi`, `alamat`, `aktif`) VALUES
(37, 17, 'Prodase', 'Programming dan Database', 'C 103', 'Y'),
(40, 16, 'Lab Jaringan Komunikasi Data ', 'Lab Untuk Jurusan Elektro ', 'D 56', 'Y'),
(41, 17, 'Lab. Perancangan Tata Letak Fasilitas (PTLF)', 'Untuk tata letak fasilitas', 'C 100', 'Y'),
(42, 18, 'Lab. Rekayasa Perangkat Lunak', 'Lab Untuk Jurusan Informatika', 'C 100', 'Y'),
(43, 18, 'Lab. Basis Data', 'Lab Untuk Jurusan Informatika', 'C 100', 'Y'),
(44, 18, 'Lab. Data Mining Center', 'Lab Untuk Jurusan Informatika', 'C 100', 'Y'),
(45, 18, 'Lab. Computing', 'Lab Untuk Jurusan Informatika', 'C 100', 'Y'),
(46, 18, 'Lab. Pemrograman', 'Lab Untuk Jurusan Informatika', 'C 100', 'Y'),
(47, 23, 'Studio Penelitian Pascasarjana', 'Pascasarjana', 'C 100', 'Y'),
(48, 19, 'Lab. Simulasi Bisnis', 'Ekonomi dan Bisnis', 'C 100', 'Y'),
(49, 17, 'Sisjar', 'Sistem Operasi dan Jaringan Komputer', 'C 105', 'Y'),
(50, 17, 'Sispromasi', 'Sistem Operasi dan Otomasi', 'C 106', 'Y'),
(51, 17, 'APK & E', 'Analisis Perancangan Kerja dan Ergonomi ', 'C 107', 'Y'),
(52, 17, 'ERP', 'Pengembangan Enterprise Resource Planning ', 'C 108', 'Y'),
(53, 16, 'Lab.Elektronika', 'Jurusan Electro', 'D100', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(5) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `hak_akses` text NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`, `hak_akses`, `aktif`) VALUES
(10, 'Admin', 'Berkuasa Penuh Terhadap Aplikasi', 'Y'),
(12, 'Pembina', 'Mengubah Seluruh Data', 'Y'),
(13, 'Petugas', 'Mengubah Seluruh Data', 'Y'),
(14, 'Assisten Laboratory', 'Input,Edit dan Hapus Data', 'Y'),
(15, 'Assisten Praktikum', 'Melaporkan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `id_status` int(5) NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `alamat`, `email`, `no_telp`, `level`, `id_status`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Majalengka', 'agislksmana@gmail.com', '085860303101', 'admin', 10, 'N', 'd0a5acd96d8d45d01a9feecf707af140'),
('Pembina', '377a610343a9812be993e0e755b2e00f', 'Pembina Laboratory', 'Bandung', 'pembina@gmail.com', '085722387151', 'user', 12, 'N', '2d897fe3e772b667c686664b0bb71682');
