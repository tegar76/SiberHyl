-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 10:33 AM
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
-- Database: `siberhyl_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(10) NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `guru_kode` char(5) NOT NULL,
  `guru_nama` varchar(125) NOT NULL,
  `guru_tempatlahir` varchar(45) DEFAULT NULL,
  `guru_tanggallahir` date DEFAULT NULL,
  `guru_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `guru_alamat` varchar(225) DEFAULT NULL,
  `guru_telp` varchar(15) DEFAULT NULL,
  `guru_email` varchar(45) DEFAULT NULL,
  `guru_username` varchar(12) NOT NULL,
  `guru_pass` varchar(225) NOT NULL DEFAULT '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei',
  `guru_foto` varchar(45) DEFAULT 'default_profile.png',
  `status_online` enum('online','offline') DEFAULT 'offline',
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `role_id` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nip`, `guru_kode`, `guru_nama`, `guru_tempatlahir`, `guru_tanggallahir`, `guru_kelamin`, `guru_alamat`, `guru_telp`, `guru_email`, `guru_username`, `guru_pass`, `guru_foto`, `status_online`, `last_login`, `create_time`, `update_time`, `role_id`) VALUES
(1, '7316092308969714', 'YN', 'Yani Novitasari S.IP', 'Palu', '1974-09-01', 'Perempuan', 'Jln. Bakhita No. 536, Bandar Lampung 50205, NTB', '027 2272 130', 'ika.megantara@oktaviani.sch.id', 'warta78', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'online', '2022-05-13 15:35:55', '2022-05-13 10:35:55', '2022-05-13 10:35:55', 2),
(2, '7311825007118729', 'AS', 'Adinata Sihombing', 'Padangpanjang', '1975-02-12', 'Laki-laki', 'Ds. Bakit  No. 623, Surakarta 13066, Gorontalo', '0881 2300 8514', 'qadriansyah@gunarto.web.id', 'puspita.arsi', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-05-13 15:35:55', '2022-05-13 10:35:55', '2022-05-13 10:35:55', 2),
(3, '1606784209005969', 'TL', 'Tami Laksmiwati S.Farm', 'Palangka Raya', '1970-11-09', 'Perempuan', 'Kpg. Sutarto No. 544, Administrasi Jakarta Pusat 11257, Jambi', '(+62) 388 7229 ', 'buyainah@gmail.co.id', 'mahesa87', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-05-13 15:35:55', '2022-05-13 10:35:55', '2022-05-13 10:35:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `kode_jadwal` char(5) DEFAULT NULL,
  `hari` varchar(10) NOT NULL,
  `jumlah_jam` smallint(4) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `ruang_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `kode_jadwal`, `hari`, `jumlah_jam`, `jam_masuk`, `jam_keluar`, `create_time`, `update_time`, `mapel_id`, `kelas_id`, `guru_nip`, `ruang_id`) VALUES
(10, NULL, 'Senin', 0, '07:30:00', '11:00:00', '2022-05-15 05:08:58', '2022-05-15 05:08:58', 1, 1, '7316092308969714', 1),
(11, NULL, 'Senin', 0, '07:30:00', '11:00:00', '2022-05-15 05:12:09', '2022-05-15 05:12:09', 1, 2, '7316092308969714', 1),
(12, NULL, 'Kamis', 1, '11:00:00', '12:00:00', '2022-05-19 05:13:50', '2022-05-19 05:13:50', 2, 2, '1606784209005969', 4),
(13, NULL, 'Kamis', 2, '12:15:00', '14:35:00', '2022-05-19 05:13:50', '2022-05-19 05:13:50', 3, 2, '7316092308969714', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `jurnal_id` int(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_ke` char(6) NOT NULL,
  `pert_ke` char(4) NOT NULL,
  `jenis_kbm` enum('online','offline','') NOT NULL DEFAULT '',
  `kd_materi` varchar(125) NOT NULL,
  `pembahasan` text NOT NULL,
  `catatan_kbm` text DEFAULT NULL,
  `absen_mulai` time NOT NULL,
  `absen_selesai` time NOT NULL,
  `jadwal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(8) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(8) NOT NULL,
  `nama_jurusan` varchar(125) NOT NULL,
  `bidang_keahlian` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `kode_jurusan`, `nama_jurusan`, `bidang_keahlian`) VALUES
(1, 'TKRO', 'Teknik Kendaraan Ringan Otomotif', 'Otomotif'),
(2, 'TBSM', 'Teknik Bisnis Sepeda Motor', 'Otomotif'),
(3, 'TKJ', 'Teknik Komputer dan Jaringan', 'Teknologi'),
(4, 'MM', 'Multimedia', 'Teknologi'),
(5, 'TAV', 'Teknik Audio Video', 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `kode_kelas` varchar(8) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `guru_kode` char(5) NOT NULL,
  `jurusan_id` int(8) NOT NULL,
  `ruang_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kode_kelas`, `nama_kelas`, `guru_kode`, `jurusan_id`, `ruang_id`) VALUES
(1, 'X-MM-1', '10 MM 1', 'YN', 4, 1),
(2, 'X-TKRO-1', '10 TKRO 1', 'AS', 1, 3),
(3, 'XI-MM-1', '11 MM 1', 'TL', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kode_mapel` varchar(8) NOT NULL,
  `nama_mapel` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'BI', 'Bahasa Indonesia'),
(2, 'PKN', 'Pendidikan Kewarganegaraan'),
(3, 'IPA', 'Ilmu Pengetahuan Alam'),
(4, 'IPS', 'Ilmu Pengetahuan Sosial'),
(5, 'PAI', 'Pendidikan Agama Islam'),
(6, 'MTK', 'Matematika'),
(7, 'ENG', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `materi_kbm`
--

CREATE TABLE `materi_kbm` (
  `materi_id` int(20) UNSIGNED NOT NULL,
  `judul` varchar(125) NOT NULL,
  `jenis` enum('file','link','') NOT NULL DEFAULT '',
  `materi` varchar(100) NOT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `ukuran_file` float DEFAULT NULL,
  `jadwal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_kbm`
--

INSERT INTO `materi_kbm` (`materi_id`, `judul`, `jenis`, `materi`, `tipe_file`, `ukuran_file`, `jadwal_id`) VALUES
(6, 'Materi 1', 'file', '8e0ad19194f88b8cf2f897806d588167.pdf', '.pdf', 74.95, 10),
(7, 'Materi 1', 'file', 'f641e532b1c2409f385fe4a9edbe7774.pdf', '.pdf', 74.95, 11),
(8, 'Materi 2', 'file', 'cdce88b0359f519c4e2f87dfed377b91.pdf', '.pdf', 74.95, 11);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` smallint(4) UNSIGNED NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'staff'),
(4, 'wali-kelas'),
(5, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruang_id` int(8) UNSIGNED NOT NULL,
  `kode_ruang` varchar(8) NOT NULL,
  `nama_ruang` varchar(45) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruang_id`, `kode_ruang`, `nama_ruang`, `keterangan`) VALUES
(1, 'MM1', 'Multimedia 1', NULL),
(2, 'L.KOM1', 'Lab Komputer 1', NULL),
(3, 'B02', 'Bengkel Otomotif', NULL),
(4, 'MM2', 'Multimedia 2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) UNSIGNED NOT NULL,
  `siswa_nis` varchar(10) NOT NULL,
  `siswa_nisn` varchar(15) NOT NULL,
  `siswa_nama` varchar(125) NOT NULL,
  `siswa_tempatlahir` varchar(45) DEFAULT NULL,
  `siswa_tanggallahir` date DEFAULT NULL,
  `siswa_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `siswa_alamat` varchar(225) DEFAULT NULL,
  `siswa_telp` varchar(15) DEFAULT NULL,
  `siswa_email` varchar(45) DEFAULT NULL,
  `siswa_pass` varchar(225) NOT NULL DEFAULT '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42',
  `siswa_foto` varchar(45) DEFAULT 'default_foto.png',
  `asal_kelas` varchar(12) DEFAULT NULL,
  `status_online` enum('online','offline') DEFAULT 'offline',
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `role_id` smallint(4) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_nisn`, `siswa_nama`, `siswa_tempatlahir`, `siswa_tanggallahir`, `siswa_kelamin`, `siswa_alamat`, `siswa_telp`, `siswa_email`, `siswa_pass`, `siswa_foto`, `asal_kelas`, `status_online`, `last_login`, `create_time`, `update_time`, `role_id`, `kelas_id`) VALUES
(1, '21469', '33763248', 'Salwa Haryanti', 'Sungai Penuh', '2004-12-09', 'Laki-laki', 'Ki. Madrasah No. 6, Medan 77232, BaBel', '(+62) 353 2628 ', 'wijaya.rachel@hastuti.in', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'online', '2022-05-17 13:22:49', '2022-05-17 13:22:49', '2022-05-17 13:22:49', 4, 2),
(2, '39008', '40923547', 'Teguh Jatmiko Sirega', 'Sibolga', '2003-01-02', 'Perempuan', 'Psr. R.M. Said No. 834, Mataram 20077, NTT', '0882141412', 'julia04@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'bff8d0104802f06b2bb65da98440c4d4.jpg', NULL, 'offline', '2022-05-19 07:24:44', '2022-05-17 13:22:49', '2022-05-17 13:22:49', 4, 2),
(3, '53630', '83781568', 'Amalia Nurdiyanti', 'Pangkal Pinang', '2004-12-05', 'Perempuan', 'Gg. Qrisdoren No. 900, Palangka Raya 52796, Jambi', '0387 6303 8181', 'bajragin.utami@lailasari.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-05-17 13:22:49', '2022-05-17 13:22:49', '2022-05-17 13:22:49', 4, 3),
(4, '21962', '61074920', 'Jumadi Satya Hidayanto', 'Bukittinggi', '2003-08-13', 'Perempuan', 'Kpg. Aceh No. 630, Tanjung Pinang 13672, PapBar', '(+62) 892 144 4', 'ypadmasari@zulaika.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-05-17 13:22:49', '2022-05-17 13:22:49', '2022-05-17 13:22:49', 4, 2),
(5, '59901', '28774213', 'Jane Syahrini Yuliarti', 'Sabang', '2004-01-04', 'Perempuan', 'Ki. Lembong No. 940, Tanjung Pinang 24415, Bali', '0852 2229 4429', 'mahendra.jane@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-05-17 13:22:49', '2022-05-17 13:22:49', '2022-05-17 13:22:49', 4, 1),
(6, '49594', '52475544', 'Ella Elisa Puspita', 'Bontang', '2004-09-29', 'Laki-laki', 'Ds. Rumah Sakit No. 134, Tangerang Selatan 72536, Aceh', '027 7719 4879', 'kasiyah60@gmail.co.id', '$2y$10$OyuPFOrwfYNqa/H1wiLcVuum9tRQw5BKfzx8Up7J7dKDj1gqaENlm', 'default_foto.png', NULL, 'online', '2022-05-19 08:19:02', '2022-05-17 13:22:49', '2022-05-17 13:22:49', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`,`guru_nip`),
  ADD UNIQUE KEY `guru_nip_UNIQUE` (`guru_nip`),
  ADD UNIQUE KEY `guru_kode_UNIQUE` (`guru_kode`),
  ADD UNIQUE KEY `guru_username_UNIQUE` (`guru_username`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `kelas_idFK_idx` (`kelas_id`),
  ADD KEY `mapel_idFK_idx` (`mapel_id`),
  ADD KEY `guru_nipFK_idx` (`guru_nip`),
  ADD KEY `ruang_idFK_idx` (`ruang_id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`jurnal_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`),
  ADD UNIQUE KEY `kode_ruangan_UNIQUE` (`kode_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD UNIQUE KEY `kode_kelas_UNIQUE` (`kode_kelas`),
  ADD UNIQUE KEY `guru_kode_UNIQUE` (`guru_kode`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`),
  ADD UNIQUE KEY `kode_ruangan_UNIQUE` (`kode_mapel`);

--
-- Indexes for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `jadwal_idFK_idx` (`jadwal_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruang_id`),
  ADD UNIQUE KEY `kode_ruang_UNIQUE` (`kode_ruang`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`,`siswa_nis`),
  ADD UNIQUE KEY `siswa_nis_UNIQUE` (`siswa_nis`),
  ADD UNIQUE KEY `siswa_nisn_UNIQUE` (`siswa_nisn`),
  ADD KEY `role_idFK_idx` (`role_id`),
  ADD KEY `kelas_idFK_idx` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `jurnal_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  MODIFY `materi_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruang_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `guru_nipFK` FOREIGN KEY (`guru_nip`) REFERENCES `guru` (`guru_nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_idFK` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_idFK` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruang_idFK` FOREIGN KEY (`ruang_id`) REFERENCES `ruangan` (`ruang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  ADD CONSTRAINT `jadwal_idFK` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
