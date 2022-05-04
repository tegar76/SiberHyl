-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 04:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siberhyl`
--

-- --------------------------------------------------------

--
-- Table structure for table `siberhyl_guru`
--

CREATE TABLE `siberhyl_guru` (
  `guru_id` int(10) UNSIGNED NOT NULL,
  `guru_nip` varchar(30) NOT NULL,
  `guru_kode` char(8) NOT NULL,
  `guru_nama` varchar(125) NOT NULL,
  `guru_tempatlahir` varchar(125) DEFAULT NULL,
  `guru_tanggallahir` date DEFAULT NULL,
  `guru_kelamin` enum('tidak-diketahui','laki-laki','perempuan') DEFAULT 'tidak-diketahui',
  `guru_telp` varchar(15) DEFAULT NULL,
  `guru_alamat` varchar(225) DEFAULT NULL,
  `guru_foto` varchar(45) DEFAULT NULL,
  `guru_pass` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `guru_status` enum('offline','online') DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siberhyl_guru`
--

INSERT INTO `siberhyl_guru` (`guru_id`, `guru_nip`, `guru_kode`, `guru_nama`, `guru_tempatlahir`, `guru_tanggallahir`, `guru_kelamin`, `guru_telp`, `guru_alamat`, `guru_foto`, `guru_pass`, `created_at`, `updated_at`, `guru_status`, `role_id`) VALUES
(1, '3517782101015945', 'guru-nqg', 'Dartono Pandu Waluyo S.Pd', 'Batu', '2012-11-09', 'laki-laki', '0700 6330 934', 'Kpg. Umalas No. 987, Sibolga 28098, PapBar', NULL, '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', '2022-04-30 19:17:13', '2022-04-30 19:17:13', NULL, 2),
(2, '7207430807217208', 'guru-hzj', 'Paris Palastri', 'Banjarbaru', '1997-04-25', 'perempuan', '022 5210 935', 'Jln. Rajawali No. 188, Administrasi Jakarta Timur 92833, MalUt', NULL, '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', '2022-04-30 19:17:13', '2022-04-30 19:17:13', NULL, 2),
(3, '1277852212093490', 'guru-vok', 'Victoria Hartati', 'Medan', '2007-09-26', 'laki-laki', '0394 4960 504', 'Ki. Yosodipuro No. 719, Sibolga 17271, PapBar', NULL, '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', '2022-04-30 19:17:13', '2022-04-30 19:17:13', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `siberhyl_jurusan`
--

CREATE TABLE `siberhyl_jurusan` (
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `kode_jurusan` char(8) NOT NULL,
  `nama_jurusan` varchar(125) NOT NULL,
  `bidang_keahlian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siberhyl_jurusan`
--

INSERT INTO `siberhyl_jurusan` (`jurusan_id`, `kode_jurusan`, `nama_jurusan`, `bidang_keahlian`) VALUES
(1, 'TKRO', 'Teknik Kendaraan Ringan Otomotif', 'Teknologi dan Rekayasa'),
(2, 'TBSM', 'Teknik dan Bisnis Sepeda Motor', 'Teknologi dan Rekayasa'),
(3, 'TKJ', 'Teknik Komputer dan Jaringan', 'Teknologi Informasi dan Komunikasi'),
(4, 'TAV', 'Teknik Audio Video', 'Teknologi Elektronika'),
(5, 'MM', 'Multimedia', 'Teknologi Informasi dan Komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `siberhyl_kelas`
--

CREATE TABLE `siberhyl_kelas` (
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `kode_kelas` varchar(25) NOT NULL,
  `nama_kelas` varchar(45) NOT NULL,
  `tahun_kelas` varchar(45) NOT NULL,
  `ruangan_id` int(10) NOT NULL,
  `guru_nip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siberhyl_kelas`
--

INSERT INTO `siberhyl_kelas` (`kelas_id`, `kode_kelas`, `nama_kelas`, `tahun_kelas`, `ruangan_id`, `guru_nip`) VALUES
(1, 'XI-TKRO-1', 'XI TKRO 1', '2021', 2, '3'),
(2, 'XI-MM-1', 'XI MM 1', '2021', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `siberhyl_role`
--

CREATE TABLE `siberhyl_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siberhyl_role`
--

INSERT INTO `siberhyl_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'wali-kelas'),
(4, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `siberhyl_ruangan`
--

CREATE TABLE `siberhyl_ruangan` (
  `ruangan_id` int(10) UNSIGNED NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(125) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siberhyl_ruangan`
--

INSERT INTO `siberhyl_ruangan` (`ruangan_id`, `kode_ruangan`, `nama_ruangan`, `keterangan`) VALUES
(1, 'MM-1', 'MM 1', NULL),
(2, 'TKRO-1', 'TKRO 1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siberhyl_siswa`
--

CREATE TABLE `siberhyl_siswa` (
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `siswa_nis` varchar(8) NOT NULL,
  `siswa_nisn` varchar(12) NOT NULL,
  `siswa_nama` varchar(125) NOT NULL,
  `siswa_tempatlahir` varchar(45) DEFAULT NULL,
  `siswa_tanggallahir` date DEFAULT NULL,
  `siswa_kelamin` enum('tidak-diketahui','laki-laki','perempuan') DEFAULT 'tidak-diketahui',
  `siswa_telp` varchar(15) DEFAULT NULL,
  `siswa_alamat` varchar(125) DEFAULT NULL,
  `siswa_foto` varchar(45) DEFAULT 'default.png',
  `siswa_pass` varchar(255) NOT NULL DEFAULT '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42',
  `siswa_status` enum('offline','online') DEFAULT 'offline',
  `asal_kelas` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siberhyl_siswa`
--

INSERT INTO `siberhyl_siswa` (`siswa_id`, `siswa_nis`, `siswa_nisn`, `siswa_nama`, `siswa_tempatlahir`, `siswa_tanggallahir`, `siswa_kelamin`, `siswa_telp`, `siswa_alamat`, `siswa_foto`, `siswa_pass`, `siswa_status`, `asal_kelas`, `created_at`, `updated_at`, `kelas_id`, `jurusan_id`, `role_id`) VALUES
(1, '24035', '69303016', 'Garda Rama Anggriawan M.TI.', 'Banjarmasin', '2016-12-30', 'laki-laki', '(+62) 912 7270 ', 'Ds. Basmol Raya No. 584, Prabumulih 42782, NTB', 'default.png', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'offline', NULL, '2022-04-30 19:10:38', '2022-04-30 19:10:38', 2, 1, 4),
(2, '81961', '89784024', 'Ellis Hasanah M.TI.', 'Cirebon', '1980-08-14', 'laki-laki', '0890 0132 3015', 'Jr. Baya Kali Bungur No. 682, Bitung 11931, KepR', 'default.png', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'offline', NULL, '2022-04-30 19:10:38', '2022-04-30 19:10:38', 2, 1, 4),
(3, '60642', '30856938', 'Garda Waskita M.M.', 'Padangsidempuan', '2008-08-03', 'perempuan', '(+62) 737 4535 ', 'Jr. Bagonwoto  No. 733, Magelang 22260, SulBar', 'default.png', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'offline', NULL, '2022-04-30 19:10:38', '2022-04-30 19:10:38', 2, 5, 4),
(4, '67347', '98322008', 'Fathonah Nova Melani', 'Gorontalo', '1982-08-02', 'laki-laki', '028 8574 492', 'Ds. Camar No. 628, Banjarbaru 10744, Lampung', 'default.png', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'offline', NULL, '2022-04-30 19:10:38', '2022-04-30 19:10:38', 2, 5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siberhyl_guru`
--
ALTER TABLE `siberhyl_guru`
  ADD PRIMARY KEY (`guru_id`,`guru_nip`),
  ADD KEY `FKRole_id_idxx` (`role_id`);

--
-- Indexes for table `siberhyl_jurusan`
--
ALTER TABLE `siberhyl_jurusan`
  ADD PRIMARY KEY (`jurusan_id`),
  ADD UNIQUE KEY `kode_jurusan_UNIQUE` (`kode_jurusan`);

--
-- Indexes for table `siberhyl_kelas`
--
ALTER TABLE `siberhyl_kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD UNIQUE KEY `kode_kelas_UNIQUE` (`kode_kelas`),
  ADD KEY `FK_ruangan_id` (`ruangan_id`),
  ADD KEY `FK_guru_nip` (`guru_nip`);

--
-- Indexes for table `siberhyl_role`
--
ALTER TABLE `siberhyl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `siberhyl_ruangan`
--
ALTER TABLE `siberhyl_ruangan`
  ADD PRIMARY KEY (`ruangan_id`),
  ADD UNIQUE KEY `kode_ruangan_UNIQUE` (`kode_ruangan`),
  ADD UNIQUE KEY `siberhyl_ruangancol_UNIQUE` (`nama_ruangan`);

--
-- Indexes for table `siberhyl_siswa`
--
ALTER TABLE `siberhyl_siswa`
  ADD PRIMARY KEY (`siswa_id`,`siswa_nis`),
  ADD KEY `FKkelas_id_idx` (`kelas_id`),
  ADD KEY `FKjurusan_id_idx` (`jurusan_id`),
  ADD KEY `FKrole_id_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siberhyl_guru`
--
ALTER TABLE `siberhyl_guru`
  MODIFY `guru_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siberhyl_jurusan`
--
ALTER TABLE `siberhyl_jurusan`
  MODIFY `jurusan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siberhyl_kelas`
--
ALTER TABLE `siberhyl_kelas`
  MODIFY `kelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siberhyl_ruangan`
--
ALTER TABLE `siberhyl_ruangan`
  MODIFY `ruangan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siberhyl_siswa`
--
ALTER TABLE `siberhyl_siswa`
  MODIFY `siswa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siberhyl_siswa`
--
ALTER TABLE `siberhyl_siswa`
  ADD CONSTRAINT `FKjurusan_id` FOREIGN KEY (`jurusan_id`) REFERENCES `siberhyl_jurusan` (`jurusan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKkelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `siberhyl_kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKrole_id` FOREIGN KEY (`role_id`) REFERENCES `siberhyl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
