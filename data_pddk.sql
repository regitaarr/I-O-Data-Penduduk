-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 02:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pddk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `no_kk`, `nik`, `hubungan`) VALUES
(17, '3404061234567890', '3404061234567893', 'Kepala Keluarga'),
(18, '3404061234567890', '3404061234567892', 'Istri'),
(21, '3404069999999999', '3404061234545454', 'Kepala Keluarga'),
(23, '3404069999999999', '3404067676767676', 'Istri'),
(24, '3404069999999995', '3404062323232324', 'Kepala Keluarga'),
(25, '3404069999999995', '3404062323232323', 'Istri'),
(31, '3404067676765867', '3404061234567925', 'Kepala Keluarga'),
(32, '3404067676765867', '3404061234567939', 'Istri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_datang` varchar(25) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `pelapor`) VALUES
(5, '3404061111111111', 'Steve', 'LK', '2023-12-03', '3404061234567891'),
(7, '3404061111111112', 'Jessica', 'PR', '2023-02-21', '3404061234567901'),
(8, '3404061111111113', 'Yessi', 'PR', '2024-08-07', '3404061234567935'),
(9, '3404061111111113', 'Galih', 'LK', '2024-08-17', '3404061234567952'),
(10, '3404061111111114', 'Kim Jong-un', 'LK', '2024-12-03', '3404061234545454');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `no_kk` varchar(16) NOT NULL,
  `kepala` varchar(50) NOT NULL,
  `kalurahan` varchar(20) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`no_kk`, `kepala`, `kalurahan`, `rt`, `rw`, `kec`, `kab`, `prov`) VALUES
('3404061234567890', '3404061234567893 _ Dedi Prasetyo', 'Sinduadi', '04', '04', 'Mlati', 'Sleman', 'Yogyakarta'),
('3404067676765867', '3404061234567925 _ Johan Fatur', 'Sinduadi', '03', '03', 'Mlati', 'Sleman', 'Yogyakarta'),
('3404069999999995', '3404062323232324 _ Na Jaemin', 'Sinduadi', '03', '03', 'Mlati', 'Sleman', 'Yogyakarta'),
('3404069999999999', '3404061234545454 _ Jeon Wonwoo', 'Sinduadi', '03', '03', 'Mlati', 'Sleman', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `no_kk` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lahir`
--

INSERT INTO `tb_lahir` (`nik`, `nama`, `tgl_lh`, `jekel`, `no_kk`) VALUES
('3404062323232323', 'Claudia Ella', '2024-12-17', 'PR', '3404069999999995'),
('3404062323232324', 'Kim Alex', '2023-08-06', 'PR', '3404069999999995'),
('3404069898976875', 'Aoki', '2024-12-12', 'LK', '3404061234567890');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `nik`, `tgl_mendu`, `sebab`) VALUES
(6, '3404061234567922', '2024-08-07', 'Penyakit Menular'),
(7, '3404061234567904', '2024-09-09', 'Kecelakaan'),
(8, '3404061234567934', '2023-04-01', 'Penyakit atau Gangguan Medis'),
(9, '3404061234567948', '2024-12-10', 'Kecelakaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR','','') NOT NULL,
  `pedukuhan` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pdd`
--

INSERT INTO `tb_pdd` (`nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `pedukuhan`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `status`) VALUES
('3404061234545454', 'Jeon Wonwoo', 'Seoul', '1996-07-17', 'LK', 'Gedongan', '04', '04', 'Islam', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567890', 'Ahmad Syah', 'Sleman', '1990-05-12', 'LK', 'Jetis', '01', '01', 'Islam', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567891', 'Budi Santoso', 'Sleman', '1985-08-25', 'LK', 'Gedongan', '02', '02', 'Kristen', 'Belum Menikah', 'Buruh', 'Ada'),
('3404061234567892', 'Citra Dewi', 'Sleman', '1995-03-19', 'PR', 'Ngaglik', '03', '03', 'Katolik', 'Sudah Menikah', 'Guru', 'Ada'),
('3404061234567893', 'Dedi Prasetyo', 'Sleman', '1988-01-30', 'LK', 'Ngaglik', '03', '03', 'Islam', 'Sudah Menikah', 'Wiraswasta', 'Ada'),
('3404061234567894', 'Eva Kurnia', 'Sleman', '1992-11-05', 'PR', 'Rogoyudan', '05', '05', 'Budha', 'Cerai Mati', 'Mahasiswa', 'Pindah'),
('3404061234567895', 'Fauzan Ali', 'Sleman', '1993-12-15', 'LK', 'Patran', '06', '06', 'Islam', 'Sudah Menikah', 'Pensiunan', 'Ada'),
('3404061234567896', 'Galih Putra', 'Sleman', '1987-07-01', 'LK', 'Kutuasem', '07', '07', 'Konghucu', 'Belum Menikah', 'Perangkat Desa', 'Ada'),
('3404061234567897', 'Hana Sari', 'Sleman', '1994-09-20', 'PR', 'Jombor Lor', '08', '08', 'Hindu', 'Sudah Menikah', 'TKI', 'Ada'),
('3404061234567898', 'Ibrahim Salim', 'Sleman', '1991-10-14', 'LK', 'Jombor Kidul', '09', '09', 'Islam', 'Cerai Hidup', 'Wirausaha', 'Ada'),
('3404061234567899', 'Jessi Kurniati', 'Sleman', '1989-05-21', 'PR', 'Kutu Tegal', '10', '10', 'Kristen', 'Sudah Menikah', 'Lainnya', 'Ada'),
('3404061234567900', 'Kurniawan Fadhil', 'Sleman', '1996-06-10', 'LK', 'Kutu Dukuh', '11', '11', 'Islam', 'Belum Menikah', 'Pelajar', 'Ada'),
('3404061234567901', 'Lia Anggraini', 'Sleman', '1984-04-18', 'PR', 'Mesan Blunyah', '12', '12', 'Katolik', 'Cerai Mati', 'Buruh', 'Ada'),
('3404061234567902', 'Maya Sari', 'Sleman', '1992-02-22', 'PR', 'Karangjati', '13', '13', 'Budha', 'Sudah Menikah', 'Guru', 'Ada'),
('3404061234567903', 'Nina Puspita', 'Sleman', '1986-12-30', 'PR', 'Gemawang', '14', '14', 'Konghucu', 'Belum Menikah', 'Perangkat Desa', 'Ada'),
('3404061234567904', 'Oka Putra', 'Sleman', '1990-07-13', 'LK', 'Pogung Lor', '15', '15', 'Hindu', 'Cerai Hidup', 'Wiraswasta', 'Meninggal'),
('3404061234567905', 'Putu Sari', 'Sleman', '1983-01-09', 'PR', 'Pogung Kidul', '16', '16', 'Kristen', 'Sudah Menikah', 'Lainnya', 'Ada'),
('3404061234567906', 'Qori Santoso', 'Sleman', '1993-08-17', 'LK', 'Sendowo', '17', '17', 'Islam', 'Belum Menikah', 'Buruh', 'Ada'),
('3404061234567907', 'Rina Dewi', 'Sleman', '1995-11-28', 'PR', 'Purwosari', '18', '18', 'Katolik', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567908', 'Satria Wijaya', 'Sleman', '1982-03-15', 'LK', 'Jetis', '19', '19', 'Budha', 'Cerai Mati', 'Buruh', 'Ada'),
('3404061234567909', 'Tina Sulistyawati', 'Sleman', '1990-04-07', 'PR', 'Gedongan', '20', '20', 'Konghucu', 'Belum Menikah', 'Guru', 'Ada'),
('3404061234567910', 'Umar Maulana', 'Sleman', '1988-06-25', 'LK', 'Ngaglik', '21', '21', 'Hindu', 'Sudah Menikah', 'Wirausaha', 'Ada'),
('3404061234567911', 'Vira Intan', 'Sleman', '1994-09-12', 'PR', 'Kragilan', '22', '22', 'Kristen', 'Cerai Hidup', 'Lainnya', 'Ada'),
('3404061234567912', 'Wahyu Triono', 'Sleman', '1989-12-09', 'LK', 'Rogoyudan', '23', '23', 'Islam', 'Sudah Menikah', 'Pelajar', 'Ada'),
('3404061234567913', 'Xena Juwita', 'Sleman', '1991-05-18', 'PR', 'Patran', '24', '24', 'Katolik', 'Belum Menikah', 'Pensiunan', 'Ada'),
('3404061234567914', 'Yusuf Ali', 'Sleman', '1986-11-03', 'LK', 'Kutuasem', '25', '25', 'Budha', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567915', 'Zara Nurul', 'Sleman', '1992-07-27', 'PR', 'Jombor Lor', '26', '26', 'Konghucu', 'Cerai Mati', 'Buruh', 'Ada'),
('3404061234567916', 'Ali Fahri', 'Sleman', '1994-02-18', 'LK', 'Jombor Kidul', '27', '27', 'Hindu', 'Sudah Menikah', 'Wiraswasta', 'Ada'),
('3404061234567917', 'Bella Sari', 'Sleman', '1983-08-25', 'PR', 'Kutu Tegal', '28', '28', 'Islam', 'Belum Menikah', 'Mahasiswa', 'Ada'),
('3404061234567918', 'Charlie Rasyid', 'Sleman', '1993-01-16', 'LK', 'Kutu Dukuh', '29', '29', 'Kristen', 'Sudah Menikah', 'Lainnya', 'Ada'),
('3404061234567919', 'Diana Tanjung', 'Sleman', '1995-12-11', 'PR', 'Mesan Blunyah', '30', '30', 'Katolik', 'Cerai Hidup', 'Wirausaha', 'Ada'),
('3404061234567920', 'Elena Pramudita', 'Sleman', '1987-06-23', 'PR', 'Karangjati', '31', '31', 'Budha', 'Sudah Menikah', 'Pensiunan', 'Ada'),
('3404061234567921', 'Farhan Zaki', 'Sleman', '1991-07-09', 'LK', 'Gemawang', '32', '32', 'Konghucu', 'Cerai Mati', 'Pelajar', 'Ada'),
('3404061234567922', 'Gita Kusuma', 'Sleman', '1994-04-03', 'PR', 'Pogung Lor', '33', '33', 'Islam', 'Sudah Menikah', 'Perangkat Desa', 'Meninggal'),
('3404061234567923', 'Hendra Maulana', 'Sleman', '1992-05-17', 'LK', 'Pogung Kidul', '34', '34', 'Kristen', 'Belum Menikah', 'Wirausaha', 'Ada'),
('3404061234567924', 'Intan Puspitasari', 'Sleman', '1990-03-22', 'PR', 'Sendowo', '35', '35', 'Katolik', 'Sudah Menikah', 'Buruh', 'Ada'),
('3404061234567925', 'Johan Fatur', 'Sleman', '1986-10-11', 'LK', 'Purwosari', '36', '36', 'Budha', 'Cerai Hidup', 'Guru', 'Ada'),
('3404061234567926', 'Karla Rahayu', 'Sleman', '1993-02-06', 'PR', 'Jetis', '37', '37', 'Konghucu', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567927', 'Lukman Ali', 'Sleman', '1989-05-24', 'LK', 'Gedongan', '38', '38', 'Islam', 'Cerai Mati', 'Mahasiswa', 'Ada'),
('3404061234567928', 'Mila Wijayanti', 'Sleman', '1995-08-01', 'PR', 'Ngaglik', '39', '39', 'Kristen', 'Belum Menikah', 'Lainnya', 'Ada'),
('3404061234567929', 'Nabila Intan', 'Sleman', '1992-12-14', 'PR', 'Kragilan', '40', '40', 'Katolik', 'Sudah Menikah', 'Buruh', 'Ada'),
('3404061234567930', 'Oki Setiana Dewi', 'Sleman', '1994-01-23', 'PR', 'Jetis', '41', '41', 'Islam', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567931', 'Putra Wicaksono', 'Sleman', '1993-04-16', 'LK', 'Gadongan', '42', '42', 'Kristen', 'Belum Menikah', 'Mahasiswa', 'Ada'),
('3404061234567932', 'Riska Dewi', 'Sleman', '1988-06-17', 'PR', 'Ngaglik', '43', '43', 'Katolik', 'Cerai Hidup', 'Buruh', 'Ada'),
('3404061234567933', 'Sandi Pratama', 'Sleman', '1990-12-09', 'LK', 'Kragilan', '44', '44', 'Islam', 'Sudah Menikah', 'Perangkat Desa', 'Ada'),
('3404061234567934', 'Tina Puspita', 'Sleman', '1991-10-02', 'PR', 'Rogoyudan', '45', '45', 'Budha', 'Cerai Mati', 'Wiraswasta', 'Meninggal'),
('3404061234567935', 'Udi Santoso', 'Sleman', '1995-07-21', 'LK', 'Patran', '46', '46', 'Konghucu', 'Sudah Menikah', 'Pensiunan', 'Ada'),
('3404061234567936', 'Vivi Amelia', 'Sleman', '1994-05-28', 'PR', 'Kutuasem', '47', '47', 'Islam', 'Belum Menikah', 'Guru', 'Ada'),
('3404061234567937', 'Wahyu Nugroho', 'Sleman', '1986-11-17', 'LK', 'Jombor Lor', '48', '48', 'Kristen', 'Sudah Menikah', 'Lainnya', 'Ada'),
('3404061234567938', 'Xenia Sari', 'Sleman', '1993-09-10', 'PR', 'Jombor Kidul', '49', '49', 'Katolik', 'Cerai Hidup', 'Buruh', 'Ada'),
('3404061234567939', 'Yuni Nabila', 'Sleman', '1992-08-19', 'PR', 'Kutu Tegal', '50', '50', 'Hindu', 'Sudah Menikah', 'Wirausaha', 'Ada'),
('3404061234567940', 'Zainul Arifin', 'Sleman', '1991-03-03', 'LK', 'Kutu Dukuh', '51', '51', 'Islam', 'Belum Menikah', 'Pelajar', 'Ada'),
('3404061234567941', 'Alda Sari', 'Sleman', '1990-09-15', 'PR', 'Mesan Blunyah', '52', '52', 'Budha', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567942', 'Bima Prasetyo', 'Sleman', '1989-12-25', 'LK', 'Karangjati', '53', '53', 'Kristen', 'Cerai Hidup', 'Wiraswasta', 'Ada'),
('3404061234567943', 'Citra Ananda', 'Sleman', '1992-10-08', 'PR', 'Gemawang', '54', '54', 'Katolik', 'Sudah Menikah', 'Buruh', 'Ada'),
('3404061234567944', 'Darren Pranata', 'Sleman', '1985-01-17', 'LK', 'Pogung Lor', '55', '55', 'Hindu', 'Belum Menikah', 'Mahasiswa', 'Ada'),
('3404061234567945', 'Elisabeth Putri', 'Sleman', '1994-12-22', 'PR', 'Pogung Kidul', '56', '56', 'Islam', 'Sudah Menikah', 'Guru', 'Ada'),
('3404061234567946', 'Farid Arief', 'Sleman', '1990-05-04', 'LK', 'Sendowo', '57', '57', 'Kristen', 'Cerai Hidup', 'Lainnya', 'Pindah'),
('3404061234567947', 'Gita Kusuma', 'Sleman', '1987-09-16', 'PR', 'Purwosari', '58', '58', 'Katolik', 'Sudah Menikah', 'Pensiunan', 'Ada'),
('3404061234567948', 'Hadi Santoso', 'Sleman', '1993-03-09', 'LK', 'Jetis', '59', '59', 'Budha', 'Belum Menikah', 'Wirausaha', 'Meninggal'),
('3404061234567949', 'Ika Purnama', 'Sleman', '1991-06-20', 'PR', 'Gadongan', '60', '60', 'Konghucu', 'Cerai Hidup', 'PNS', 'Ada'),
('3404061234567950', 'Joko Sutrisno', 'Sleman', '1989-02-14', 'LK', 'Ngaglik', '61', '61', 'Islam', 'Sudah Menikah', 'Buruh', 'Ada'),
('3404061234567951', 'Kirana Arista', 'Sleman', '1994-07-30', 'PR', 'Kragilan', '62', '62', 'Kristen', 'Belum Menikah', 'Perangkat Desa', 'Ada'),
('3404061234567952', 'Lila Azhari', 'Sleman', '1990-12-01', 'PR', 'Rogoyudan', '63', '63', 'Katolik', 'Sudah Menikah', 'Lainnya', 'Ada'),
('3404061234567953', 'Mochamad Rizki', 'Sleman', '1987-11-11', 'LK', 'Patran', '64', '64', 'Hindu', 'Cerai Hidup', 'Perangkat Desa', 'Ada'),
('3404061234567954', 'Nina Salimah', 'Sleman', '1995-02-28', 'PR', 'Kutuasem', '65', '65', 'Budha', 'Belum Menikah', 'Lainnya', 'Ada'),
('3404061234567955', 'Oscar Suryadi', 'Sleman', '1992-08-01', 'LK', 'Jombor Lor', '66', '66', 'Konghucu', 'Sudah Menikah', 'Pensiunan', 'Pindah'),
('3404061234567956', 'Putri Amalia', 'Sleman', '1989-07-19', 'PR', 'Jombor Kidul', '67', '67', 'Islam', 'Cerai Hidup', 'Buruh', 'Ada'),
('3404061234567957', 'Rudi Permana', 'Sleman', '1990-10-30', 'LK', 'Kutu Tegal', '68', '68', 'Kristen', 'Belum Menikah', 'Wirausaha', 'Ada'),
('3404061234567958', 'Siska Larasati', 'Sleman', '1994-11-14', 'PR', 'Kutu Dukuh', '69', '69', 'Katolik', 'Sudah Menikah', 'PNS', 'Ada'),
('3404061234567959', 'Teguh Santosa', 'Sleman', '1991-05-22', 'LK', 'Mesan Blunyah', '70', '70', 'Budha', 'Cerai Hidup', 'Lainnya', 'Pindah'),
('3404062323232323', 'Nina Kharisma', 'Kebumen', '2003-03-06', 'PR', 'Gedongan', '03', '03', 'Islam', 'Sudah Menikah', 'PNS', 'Ada'),
('3404062323232324', 'Na Jaemin', 'Seoul', '2000-08-13', 'LK', 'Gedongan', '03', '03', 'Katolik', 'Sudah Menikah', 'PNS', 'Ada'),
('3404067676767676', 'Kang Seul-gi', 'Seoul', '1994-02-10', 'PR', 'Gedongan', '04', '04', 'Islam', 'Sudah Menikah', 'PNS', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Nina', 'admin', 'admin', 'Administrator'),
(2, 'Regita', 'kaur', 'kaur', 'Kaur Pemerintah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `nik`, `tgl_pindah`, `alasan`) VALUES
(6, '3404061234567959', '2022-12-13', 'Pekerjaan'),
(7, '3404061234567955', '2024-01-01', 'Pekerjaan'),
(8, '3404061234567894', '2024-01-01', 'Ikut Suami'),
(9, '3404061234567946', '2025-01-01', 'Ikut orang tua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_kk` (`no_kk`);

--
-- Indexes for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `tb_lahir_ibfk_1` (`no_kk`);

--
-- Indexes for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pdd` (`nik`),
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`no_kk`) REFERENCES `tb_kk` (`no_kk`);

--
-- Constraints for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`nik`);

--
-- Constraints for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `tb_kk` (`no_kk`) ON DELETE CASCADE;

--
-- Constraints for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pdd` (`nik`);

--
-- Constraints for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pdd` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
