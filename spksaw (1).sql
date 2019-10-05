-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 12:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spksaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kdabsen` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kdabsen`, `nik`, `tgl_absen`, `keterangan`) VALUES
(3, 1122334455, '2019-08-13', 'hadir'),
(4, 1122334456, '2019-08-13', 'sakit'),
(5, 1122334457, '2019-08-13', 'hadir'),
(6, 1122334455, '2019-08-12', 'hadir'),
(7, 1122334456, '2019-08-12', 'hadir'),
(8, 1122334457, '2019-08-12', 'hadir'),
(9, 1122334455, '2019-08-11', 'sakit'),
(10, 1122334456, '2019-08-11', 'sakit'),
(11, 1122334457, '2019-08-11', 'hadir'),
(12, 1122334455, '2019-07-16', 'sakit'),
(13, 1122334456, '2019-07-16', 'sakit'),
(14, 1122334457, '2019-07-16', 'sakit'),
(15, 1122334455, '2019-07-15', 'hadir'),
(16, 1122334456, '2019-07-15', 'hadir'),
(17, 1122334457, '2019-07-15', 'hadir'),
(18, 1122334455, '2019-07-07', 'sakit'),
(19, 1122334456, '2019-07-07', 'hadir'),
(20, 1122334457, '2019-07-07', 'hadir'),
(21, 1122334455, '2019-08-17', 'izin'),
(22, 1122334456, '2019-08-17', 'sakit'),
(23, 1122334457, '2019-08-17', 'sakit'),
(24, 1122334466, '2019-08-17', 'hadir'),
(25, 1122334455, '2019-08-18', 'sakit'),
(26, 1122334456, '2019-08-18', 'sakit'),
(27, 1122334457, '2019-08-18', 'izin'),
(28, 1122334466, '2019-08-18', 'hadir'),
(29, 195353, '2019-01-01', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `kdhasil` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `hasil` float NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`kdhasil`, `nik`, `hasil`, `tahun`) VALUES
(9, '1122334455', 1.00549, '2019'),
(10, '1122334456', 0.946542, '2019'),
(11, '1122334466', 1.2369, '2019'),
(12, '195353', 1.56566, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nmkaryawan` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenisk` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nmkaryawan`, `password`, `jenisk`, `tgl_lahir`, `alamat`, `jabatan`, `tgl_masuk`, `tgl_keluar`) VALUES
('1010101010', 'Yuniar giffari Bachri', '21c70385c4350b2ba165637ba7dc28e3', 'laki-laki', '2001-01-01', 'qeqweqw', 'manager', '2019-08-11', '2019-08-30'),
('1122334455', 'Yuli', '194eb9a88d5927ae6df4ffdb4176d354', 'laki-laki', '1994-06-17', 'Kyaimaja', 'karyawan', '2019-08-11', '2019-08-13'),
('1122334456', 'Yuniar', '752466b0129e04d44d010d8d5274ef34', 'laki-laki', '2019-08-12', 'sadasd', 'karyawan', '2019-08-13', '2019-08-13'),
('1122334457', 'asda', '1e56f9b2a556797397ecd6d56a26ccbd', 'laki-laki', '2019-08-13', 'Kyaimaja', 'manager', '2019-08-13', '2019-08-13'),
('1122334459', 'rewrw', 'a052d24a53327aff830b98a943946527', 'laki-laki', '2019-08-24', 'erwer', 'manager', '2019-08-24', '2019-08-25'),
('1122334466', 'rudi', '5dd578ca5ba12888b0790593fd4a1221', 'laki-laki', '1997-06-19', 'sadasd', 'karyawan', '2019-08-20', '2019-08-28'),
('195353', 'budi', 'b3b476bd1e5dd14d5b150fe31828e4c2', 'laki-laki', '1995-08-03', 'ciledug', 'karyawan', '2000-08-01', '2019-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kdkriteria` varchar(3) NOT NULL,
  `nmkriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kdkriteria`, `nmkriteria`, `bobot`, `tipe`) VALUES
('C1', 'Absensi', 0.25, 'benefit'),
('C2', 'Disiplin', 0.2, 'benefit'),
('C3', 'Kreatifitas dan Inovasi', 0.2, 'benefit'),
('C4', 'Prestasi Kerja', 0.15, 'benefit'),
('C5', 'Masa Kerja', 0.1, 'benefit'),
('C6', 'Keterampilan Komputer', 0.1, 'benefit'),
('C8', 'hhh', 0.7, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `kdnormalisasi` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `kdkriteria` varchar(3) NOT NULL,
  `nilai_normalisasi` float NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`kdnormalisasi`, `nik`, `kdkriteria`, `nilai_normalisasi`, `tahun`) VALUES
(43, '1122334455', 'C1', 0.375, '2019'),
(44, '1122334455', 'C2', 0.375, '2019'),
(45, '1122334455', 'C3', 0.578571, '2019'),
(46, '1122334455', 'C4', 0.457143, '2019'),
(47, '1122334455', 'C5', 0.575, '2019'),
(48, '1122334455', 'C6', 1, '2019'),
(49, '1122334456', 'C1', 0.375, '2019'),
(50, '1122334456', 'C2', 0.25, '2019'),
(51, '1122334456', 'C3', 0.285714, '2019'),
(52, '1122334456', 'C4', 0.428571, '2019'),
(53, '1122334456', 'C5', 0.25, '2019'),
(54, '1122334456', 'C6', 0.2, '2019'),
(55, '1122334466', 'C1', 1, '2019'),
(56, '1122334466', 'C2', 0.25, '2019'),
(57, '1122334466', 'C3', 0.428571, '2019'),
(58, '1122334466', 'C4', 0.285714, '2019'),
(59, '1122334466', 'C5', 0.75, '2019'),
(60, '1122334466', 'C6', 0.333333, '2019'),
(61, '195353', 'C1', 1, '2019'),
(62, '195353', 'C2', 1, '2019'),
(63, '195353', 'C3', 1, '2019'),
(64, '195353', 'C4', 1, '2019'),
(65, '195353', 'C5', 1, '2019'),
(66, '195353', 'C6', 1, '2019'),
(67, '1122334455', 'C7', 1, '2019'),
(68, '1122334456', 'C7', 4.54545, '2019'),
(69, '1122334466', 'C7', 1.36364, '2019'),
(70, '195353', 'C7', 1.5, '2019'),
(71, '1122334455', 'C8', 0.707071, '2019'),
(72, '1122334456', 'C8', 0.909091, '2019'),
(73, '1122334466', 'C8', 1, '2019'),
(74, '195353', 'C8', 0.808081, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `kdnilai` int(11) NOT NULL,
  `kdkriteria` varchar(3) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`kdnilai`, `kdkriteria`, `nik`, `tahun`, `nilai`) VALUES
(49, 'C1', '1122334455', '2019', 37.5),
(50, 'C2', '1122334455', '2019', 30),
(51, 'C3', '1122334455', '2019', 40.5),
(52, 'C4', '1122334455', '2019', 32),
(53, 'C5', '1122334455', '2019', 23),
(54, 'C6', '1122334455', '2019', 60),
(55, 'C1', '1122334456', '2019', 37.5),
(56, 'C2', '1122334456', '2019', 20),
(57, 'C3', '1122334456', '2019', 20),
(58, 'C4', '1122334456', '2019', 30),
(59, 'C5', '1122334456', '2019', 10),
(60, 'C6', '1122334456', '2019', 12),
(61, 'C1', '1122334466', '2019', 100),
(62, 'C2', '1122334466', '2019', 20),
(63, 'C3', '1122334466', '2019', 30),
(64, 'C4', '1122334466', '2019', 20),
(65, 'C5', '1122334466', '2019', 30),
(66, 'C6', '1122334466', '2019', 20),
(67, 'C1', '195353', '2019', 100),
(68, 'C2', '195353', '2019', 80),
(69, 'C3', '195353', '2019', 70),
(70, 'C4', '195353', '2019', 70),
(71, 'C5', '195353', '2019', 40),
(72, 'C6', '195353', '2019', 60),
(73, 'C7', '195353', '2019', 33),
(74, 'C7', '1122334455', '2019', 22),
(75, 'C7', '1122334456', '2019', 100),
(76, 'C7', '1122334466', '2019', 30),
(77, 'C8', '195353', '2019', 80),
(78, 'C8', '1122334455', '2019', 70),
(79, 'C8', '1122334456', '2019', 90),
(80, 'C8', '1122334466', '2019', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kdabsen`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kdhasil`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kdkriteria`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`kdnormalisasi`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kdnilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kdabsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kdhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `kdnormalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kdnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
