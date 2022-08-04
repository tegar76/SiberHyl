-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 08:49 AM
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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` int(10) UNSIGNED NOT NULL,
  `tanggal_absen` timestamp NULL DEFAULT NULL,
  `metode_absen` enum('online','offline','') NOT NULL DEFAULT '',
  `status` enum('H','I','S','A') NOT NULL DEFAULT 'A',
  `bukti_absen` varchar(120) DEFAULT NULL,
  `siswa_nis` varchar(10) NOT NULL,
  `jurnal_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detaildiskusi`
--

CREATE TABLE `detaildiskusi` (
  `diskusi_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(25) NOT NULL,
  `forum_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailmateri`
--

CREATE TABLE `detailmateri` (
  `detailmateri_id` int(10) UNSIGNED NOT NULL,
  `index_kelas` char(4) NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(8) DEFAULT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `evaluasi_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(125) NOT NULL,
  `jenis_soal` enum('pilgan','essay') NOT NULL,
  `evaluasi_ke` smallint(6) NOT NULL,
  `file_evaluasi` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `waktu_deadline` time NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `jadwal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_siswa`
--

CREATE TABLE `evaluasi_siswa` (
  `evaluasi_siswa_id` int(10) UNSIGNED NOT NULL,
  `time_upload` datetime DEFAULT NULL,
  `metode` enum('online','langsung','') NOT NULL DEFAULT '',
  `file_evaluasi_siswa` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `nilai` float NOT NULL,
  `komentar` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `siswa_nis` varchar(10) NOT NULL,
  `evaluasi_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forumdiskusi`
--

CREATE TABLE `forumdiskusi` (
  `forum_id` int(10) UNSIGNED NOT NULL,
  `pembuat` varchar(125) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `jadwal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(10) NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `guru_kode` char(5) NOT NULL,
  `guru_nama` varchar(125) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(225) NOT NULL DEFAULT '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei',
  `profile` varchar(45) NOT NULL DEFAULT 'default_profile.png',
  `status_online` enum('online','offline') NOT NULL DEFAULT 'offline',
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nip`, `guru_kode`, `guru_nama`, `username`, `password`, `profile`, `status_online`, `create_time`, `update_time`, `role_id`) VALUES
(113, '12345678', 'ADM', 'Administator', 'admin@paralogy.id', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-08-04 06:47:18', '2022-08-04 06:47:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infoakademik`
--

CREATE TABLE `infoakademik` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `judul_info` varchar(225) NOT NULL,
  `slug_judul` varchar(225) NOT NULL,
  `file_info` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `tahun_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jumlah_jam` smallint(4) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `ruang_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `jurnal_id` int(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pertemuan` char(4) NOT NULL,
  `kd_materi` varchar(125) NOT NULL,
  `pembahasan` text NOT NULL,
  `catatan_kbm` text DEFAULT NULL,
  `absen_mulai` time NOT NULL,
  `absen_selesai` time NOT NULL,
  `jumlah_siswa` int(6) UNSIGNED DEFAULT NULL,
  `hadir` int(6) UNSIGNED DEFAULT NULL,
  `alpha` int(6) UNSIGNED DEFAULT NULL,
  `izin` int(6) UNSIGNED DEFAULT NULL,
  `sakit` int(6) UNSIGNED DEFAULT NULL,
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
  `nama_jurusan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'TKRO', 'Teknik Kendaraan Ringan Otomotif'),
(2, 'TBSM', 'Teknik Bisnis Sepeda Motor'),
(3, 'TKJ', 'Teknik Komputer dan Jaringan'),
(4, 'MM', 'Multimedia'),
(5, 'TAV', 'Teknik Audio Video');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `kode_kelas` varchar(18) NOT NULL,
  `index_kelas` char(4) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
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
  `slug_mapel` varchar(225) NOT NULL,
  `nama_mapel` varchar(125) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materipembelajaran`
--

CREATE TABLE `materipembelajaran` (
  `materi_id` int(20) UNSIGNED NOT NULL,
  `judul` varchar(225) NOT NULL DEFAULT 'title',
  `jenis` enum('file','link','') NOT NULL DEFAULT '',
  `file_materi` varchar(120) NOT NULL DEFAULT 'default.pdf',
  `file_type` char(6) DEFAULT '.pdf',
  `file_size` float DEFAULT 0,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `detailmateri_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penerimainfo`
--

CREATE TABLE `penerimainfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `index_kelas` char(4) DEFAULT NULL,
  `kode_jurusan` varchar(8) DEFAULT NULL,
  `kelas_id` int(10) UNSIGNED DEFAULT NULL,
  `info_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penerimasurat`
--

CREATE TABLE `penerimasurat` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `surat_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuansurat`
--

CREATE TABLE `pengajuansurat` (
  `surat_id` int(10) UNSIGNED NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('izin','sakit','') NOT NULL DEFAULT '',
  `file_surat` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `siswa_nis` varchar(10) NOT NULL
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
(3, 'kepala-sekolah'),
(4, 'wali-kelas'),
(5, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruang_id` int(8) UNSIGNED NOT NULL,
  `kode_ruang` varchar(8) NOT NULL,
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
-- Table structure for table `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `tahun_id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `semester` smallint(4) UNSIGNED NOT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `token_login`
--

CREATE TABLE `token_login` (
  `token_id` int(100) UNSIGNED NOT NULL,
  `access_token` text NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugasharian`
--

CREATE TABLE `tugasharian` (
  `tugas_id` int(10) UNSIGNED NOT NULL,
  `pertemuan` smallint(6) NOT NULL,
  `judul_tugas` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_tugas` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `deadline` datetime NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `jadwal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugassiswa`
--

CREATE TABLE `tugassiswa` (
  `tugas_siswa_id` int(10) UNSIGNED NOT NULL,
  `time_upload` datetime DEFAULT NULL,
  `metode` enum('online','langsung','') NOT NULL DEFAULT '',
  `file_tugas_siswa` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `nilai_tugas` float NOT NULL,
  `komentar` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `siswa_nis` varchar(10) NOT NULL,
  `tugas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`),
  ADD KEY `siswa_nisFK_idx` (`siswa_nis`),
  ADD KEY `jurnal_idFK_idx` (`jurnal_id`);

--
-- Indexes for table `detaildiskusi`
--
ALTER TABLE `detaildiskusi`
  ADD PRIMARY KEY (`diskusi_id`);

--
-- Indexes for table `detailmateri`
--
ALTER TABLE `detailmateri`
  ADD PRIMARY KEY (`detailmateri_id`),
  ADD KEY `mapel_idFK` (`mapel_id`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`evaluasi_id`),
  ADD KEY `jadwal_idFKx` (`jadwal_id`);

--
-- Indexes for table `evaluasi_siswa`
--
ALTER TABLE `evaluasi_siswa`
  ADD PRIMARY KEY (`evaluasi_siswa_id`),
  ADD KEY `evaluasi_idFKx_idx` (`evaluasi_id`),
  ADD KEY `siswa_nisFKx_idx` (`siswa_nis`);

--
-- Indexes for table `forumdiskusi`
--
ALTER TABLE `forumdiskusi`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `jadwal_idFKx_idx` (`jadwal_id`),
  ADD KEY `jadwal_idFKx` (`jadwal_id`),
  ADD KEY `jadwal_idFK` (`jadwal_id`),
  ADD KEY `jadwal_idFK_idx` (`jadwal_id`),
  ADD KEY `jadwal_id_FK` (`jadwal_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`,`guru_nip`),
  ADD UNIQUE KEY `guru_nip_UNIQUE` (`guru_nip`),
  ADD UNIQUE KEY `guru_kode_UNIQUE` (`guru_kode`),
  ADD KEY `role_idFK_idx` (`role_id`);

--
-- Indexes for table `infoakademik`
--
ALTER TABLE `infoakademik`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `kelas_idFK_idx` (`kelas_id`),
  ADD KEY `mapel_idFK_idx` (`mapel_id`),
  ADD KEY `ruang_idFK_idx` (`ruang_id`),
  ADD KEY `guru_nipFK_idx` (`guru_nip`);

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
-- Indexes for table `materipembelajaran`
--
ALTER TABLE `materipembelajaran`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `detailmateri_idFK_idx` (`detailmateri_id`);

--
-- Indexes for table `penerimainfo`
--
ALTER TABLE `penerimainfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_idFK_idx` (`info_id`);

--
-- Indexes for table `penerimasurat`
--
ALTER TABLE `penerimasurat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuansurat`
--
ALTER TABLE `pengajuansurat`
  ADD PRIMARY KEY (`surat_id`);

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
-- Indexes for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`tahun_id`);

--
-- Indexes for table `token_login`
--
ALTER TABLE `token_login`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `tugasharian`
--
ALTER TABLE `tugasharian`
  ADD PRIMARY KEY (`tugas_id`),
  ADD KEY `jadwal_idFK` (`jadwal_id`),
  ADD KEY `jadwal_idFK_idx` (`jadwal_id`);

--
-- Indexes for table `tugassiswa`
--
ALTER TABLE `tugassiswa`
  ADD PRIMARY KEY (`tugas_siswa_id`),
  ADD KEY `tugas_idFK_idx` (`tugas_id`),
  ADD KEY `siswa_nisFK_idx` (`siswa_nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `detaildiskusi`
--
ALTER TABLE `detaildiskusi`
  MODIFY `diskusi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `detailmateri`
--
ALTER TABLE `detailmateri`
  MODIFY `detailmateri_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `evaluasi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `evaluasi_siswa`
--
ALTER TABLE `evaluasi_siswa`
  MODIFY `evaluasi_siswa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `forumdiskusi`
--
ALTER TABLE `forumdiskusi`
  MODIFY `forum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `infoakademik`
--
ALTER TABLE `infoakademik`
  MODIFY `info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `jurnal_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `materipembelajaran`
--
ALTER TABLE `materipembelajaran`
  MODIFY `materi_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `penerimainfo`
--
ALTER TABLE `penerimainfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penerimasurat`
--
ALTER TABLE `penerimasurat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengajuansurat`
--
ALTER TABLE `pengajuansurat`
  MODIFY `surat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `ruang_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `tahun_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `token_login`
--
ALTER TABLE `token_login`
  MODIFY `token_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tugasharian`
--
ALTER TABLE `tugasharian`
  MODIFY `tugas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tugassiswa`
--
ALTER TABLE `tugassiswa`
  MODIFY `tugas_siswa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `jurnal_idFK` FOREIGN KEY (`jurnal_id`) REFERENCES `jurnal` (`jurnal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_nisFK` FOREIGN KEY (`siswa_nis`) REFERENCES `siswa` (`siswa_nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD CONSTRAINT `jadwal_idFKx` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `evaluasi_siswa`
--
ALTER TABLE `evaluasi_siswa`
  ADD CONSTRAINT `evaluasi_idFKx` FOREIGN KEY (`evaluasi_id`) REFERENCES `evaluasi` (`evaluasi_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_nisFKx` FOREIGN KEY (`siswa_nis`) REFERENCES `siswa` (`siswa_nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forumdiskusi`
--
ALTER TABLE `forumdiskusi`
  ADD CONSTRAINT `jadwal_id_FK` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `role_idFK` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `guru_nipFK` FOREIGN KEY (`guru_nip`) REFERENCES `guru` (`guru_nip`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_idFK` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_idFK` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ruang_idFK` FOREIGN KEY (`ruang_id`) REFERENCES `ruangan` (`ruang_id`) ON UPDATE CASCADE;

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jadwal_idFK` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `materipembelajaran`
--
ALTER TABLE `materipembelajaran`
  ADD CONSTRAINT `detailmateri_idFK` FOREIGN KEY (`detailmateri_id`) REFERENCES `detailmateri` (`detailmateri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerimainfo`
--
ALTER TABLE `penerimainfo`
  ADD CONSTRAINT `info_idFK` FOREIGN KEY (`info_id`) REFERENCES `infoakademik` (`info_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugasharian`
--
ALTER TABLE `tugasharian`
  ADD CONSTRAINT `jadwal_idFK_idx` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tugassiswa`
--
ALTER TABLE `tugassiswa`
  ADD CONSTRAINT `siswa_nisFK_idx` FOREIGN KEY (`siswa_nis`) REFERENCES `siswa` (`siswa_nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_idFK_idx` FOREIGN KEY (`tugas_id`) REFERENCES `tugasharian` (`tugas_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
