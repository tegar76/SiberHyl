-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 11:06 AM
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
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nip`, `guru_kode`, `guru_nama`, `guru_tempatlahir`, `guru_tanggallahir`, `guru_kelamin`, `guru_alamat`, `guru_telp`, `guru_email`, `guru_username`, `guru_pass`, `guru_foto`, `status_online`, `last_login`, `create_time`, `update_time`, `role_id`) VALUES
(4, '1122334455667788', 'ADM', 'Administator', 'Banyumas', '1975-08-07', 'Laki-laki', NULL, NULL, 'kesatrianpwt@gmail.com', 'kesatrian1.p', '$2y$2y$10$ju5iH7cBQKm9I9qO0VxMf.JGVaYJmMDHzvNO3/hzGQhwhd9Zf95iC', 'default_profile.png', 'online', '2022-05-25 15:34:44', '2022-05-25 15:34:44', '2022-05-25 15:34:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infoakd_kelas`
--

CREATE TABLE `infoakd_kelas` (
  `infoakdkelas_id` int(10) UNSIGNED NOT NULL,
  `index_kelas` char(4) DEFAULT NULL,
  `kode_jurusan` varchar(8) DEFAULT NULL,
  `kelas_id` int(10) UNSIGNED DEFAULT NULL,
  `infoakd_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `info_akademik`
--

CREATE TABLE `info_akademik` (
  `infoakd_id` int(10) UNSIGNED NOT NULL,
  `judul_info` varchar(225) NOT NULL,
  `slug_judul` varchar(225) NOT NULL,
  `deskripsi_info` text DEFAULT NULL,
  `file_info` varchar(225) DEFAULT NULL,
  `tipe_file` varchar(18) DEFAULT NULL,
  `ukuran_file` float DEFAULT NULL,
  `thnakd_id` int(11) UNSIGNED NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `kode_jadwal` varchar(30) DEFAULT NULL,
  `hari` varchar(10) NOT NULL,
  `jumlah_jam` smallint(4) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `guru_kode` char(5) NOT NULL,
  `ruang_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jumlah_siswa` int(6) UNSIGNED DEFAULT NULL,
  `jumlah_hadir` int(6) UNSIGNED DEFAULT NULL,
  `jumlah_alpha` int(6) UNSIGNED DEFAULT NULL,
  `jumlah_izin` int(6) UNSIGNED DEFAULT NULL,
  `jumlah_sakit` int(6) UNSIGNED DEFAULT NULL,
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
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
  `kode_kelas` varchar(18) NOT NULL,
  `index_kelas` char(4) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `guru_kode` char(5) NOT NULL,
  `kode_jurusan` varchar(8) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kode_mapel` varchar(8) DEFAULT NULL,
  `slug_mapel` varchar(225) NOT NULL,
  `nama_mapel` varchar(125) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi_info`
--

CREATE TABLE `materi_info` (
  `materi_info_id` int(10) UNSIGNED NOT NULL,
  `index_kelas` char(4) NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(8) NOT NULL DEFAULT 0,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `materi_info_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan_aduan`
--

CREATE TABLE `pesan_aduan` (
  `pesan_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `keterangan` text DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `thnakd_id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `semester` smallint(4) UNSIGNED NOT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`thnakd_id`, `tahun`, `semester`, `status`, `create_time`, `update_time`) VALUES
(6, '2023/2024', 1, 0, '2022-06-16 08:29:25', '2022-06-16 08:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `token_login`
--

CREATE TABLE `token_login` (
  `token_id` int(100) UNSIGNED NOT NULL,
  `access_token` text NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `infoakd_kelas`
--
ALTER TABLE `infoakd_kelas`
  ADD PRIMARY KEY (`infoakdkelas_id`),
  ADD KEY `infoakd_idFK_idx` (`infoakd_id`);

--
-- Indexes for table `info_akademik`
--
ALTER TABLE `info_akademik`
  ADD PRIMARY KEY (`infoakd_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD UNIQUE KEY `kode_jadwal_UNIQUE` (`kode_jadwal`),
  ADD KEY `kelas_idFK_idx` (`kelas_id`),
  ADD KEY `mapel_idFK_idx` (`mapel_id`),
  ADD KEY `ruang_idFK_idx` (`ruang_id`),
  ADD KEY `guru_kodeFK_idx` (`guru_kode`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`jurnal_id`),
  ADD KEY `jadwal_idFK_idx` (`jadwal_id`);

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
  ADD UNIQUE KEY `kode_kelas_UNIQUE` (`kode_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`),
  ADD UNIQUE KEY `slug_mapel_UNIQUE` (`slug_mapel`);

--
-- Indexes for table `materi_info`
--
ALTER TABLE `materi_info`
  ADD PRIMARY KEY (`materi_info_id`),
  ADD KEY `mapel_idFK` (`mapel_id`);

--
-- Indexes for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `materiInfoIdFK_idx` (`materi_info_id`);

--
-- Indexes for table `pesan_aduan`
--
ALTER TABLE `pesan_aduan`
  ADD PRIMARY KEY (`pesan_id`);

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
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`thnakd_id`);

--
-- Indexes for table `token_login`
--
ALTER TABLE `token_login`
  ADD PRIMARY KEY (`token_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `infoakd_kelas`
--
ALTER TABLE `infoakd_kelas`
  MODIFY `infoakdkelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `info_akademik`
--
ALTER TABLE `info_akademik`
  MODIFY `infoakd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `kelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `materi_info`
--
ALTER TABLE `materi_info`
  MODIFY `materi_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  MODIFY `materi_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pesan_aduan`
--
ALTER TABLE `pesan_aduan`
  MODIFY `pesan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruang_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `thnakd_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `token_login`
--
ALTER TABLE `token_login`
  MODIFY `token_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `infoakd_kelas`
--
ALTER TABLE `infoakd_kelas`
  ADD CONSTRAINT `infoakd_idFK` FOREIGN KEY (`infoakd_id`) REFERENCES `info_akademik` (`infoakd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `guru_kodeFK` FOREIGN KEY (`guru_kode`) REFERENCES `guru` (`guru_kode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_idFK` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_idFK` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ruang_idFK` FOREIGN KEY (`ruang_id`) REFERENCES `ruangan` (`ruang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jadwal_idFK` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  ADD CONSTRAINT `materiInfoIdFK` FOREIGN KEY (`materi_info_id`) REFERENCES `materi_info` (`materi_info_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
