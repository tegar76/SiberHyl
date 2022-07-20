-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 06:50 AM
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
  `tanggal_absen` timestamp NOT NULL DEFAULT current_timestamp(),
  `metode_kbm` enum('online','offline') NOT NULL DEFAULT 'online',
  `status` enum('H','I','S','A') NOT NULL DEFAULT 'A',
  `bukti_absen` varchar(120) DEFAULT NULL,
  `siswa_nis` varchar(10) NOT NULL,
  `jurnal_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diskusi_siswa`
--

CREATE TABLE `diskusi_siswa` (
  `diskusi_siswa_id` int(10) UNSIGNED NOT NULL,
  `parent_diskusi_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `forum_diskusi_id` int(10) UNSIGNED NOT NULL
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
  `time_upload` datetime NOT NULL,
  `metode` enum('online','langsung','') NOT NULL DEFAULT '',
  `file_evaluasi_siswa` varchar(225) NOT NULL,
  `file_type` char(6) NOT NULL,
  `file_size` float NOT NULL,
  `nilai_tugas` float NOT NULL,
  `komentar` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `siswa_nis` varchar(10) NOT NULL,
  `evaluasi_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_diskusi`
--

CREATE TABLE `forum_diskusi` (
  `forum_diskusi_id` int(10) UNSIGNED NOT NULL,
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
(100, '1273484208969323', 'JT', 'Cengkir Rajasa', 'Payakumbuh', '1988-02-03', 'Perempuan', 'Ds. M.T. Haryono No. 325, Bitung 55544, BaBel', '(+62) 275 5653 ', 'waluyo.mayasari@yahoo.com', 'JT1273', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-14 08:26:00', '2022-07-13 14:20:30', '2022-07-13 14:20:30', 2),
(101, '1309471007151389', 'XS', 'Restu Karen Yolanda S.T.', 'Lhokseumawe', '1986-12-26', 'Perempuan', 'Gg. Pacuan Kuda No. 81, Bengkulu 85076, Papua', '(+62) 784 6402 ', 'siregar.kanda@yahoo.com', 'XS1309', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:20:30', '2022-07-13 14:20:30', '2022-07-13 14:20:30', 2),
(102, '9128774704954227', 'PE', 'Edward Sitompul', 'Solok', '1975-10-12', 'Laki-laki', 'Ds. S. Parman No. 615, Banjarbaru 60318, JaTim', '0201 4104 527', 'ina.damanik@yahoo.com', 'PE9128', '$2y$10$YQD/QQr7do9/YHvahWZc0OVUXgqSQclk0x4mO8N5TayTKQqypbnQS', '77a729fd7520e571b98584ff101d54a2.png', 'online', '2022-07-20 04:26:24', '2022-07-13 14:20:30', '2022-07-13 14:20:30', 2),
(103, '5103775101987486', 'KM', 'Utama Virman Maryadi S.Farm', 'Pontianak', '1978-02-08', 'Perempuan', 'Ds. Jayawijaya No. 248, Kotamobagu 13785, PapBar', '(+62) 918 0266 ', 'sudiati.paramita@gmail.co.id', 'KM5103', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:20:30', '2022-07-13 14:20:30', '2022-07-13 14:20:30', 2),
(104, '6310482811064902', 'OK', 'Aurora Dalima Anggraini', 'Tebing Tinggi', '1992-01-25', 'Perempuan', 'Jr. Jend. Sudirman No. 34, Metro 89800, MalUt', '(+62) 445 8439 ', 'safitri.paris@yahoo.com', 'OK6310', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-15 04:41:36', '2022-07-13 14:20:30', '2022-07-13 14:20:30', 2),
(105, '3172543010048426', 'OHS', 'Asirwada Mahdi Iswahyudi S.E.I', 'Pagar Alam', '1991-01-02', 'Laki-laki', 'Dk. Yohanes No. 779, Makassar 56583, Bengkulu', '0952 9617 690', 'warta.prasasta@sihombing.web.id', 'okta.wibison', '$2y$10$aS3rpm0mvlxvTll8fOOgCe6Z0nSAQ6KwNvaiiC8quTX7m8uo.QE9S', 'default_profile.png', 'offline', '2022-07-13 14:25:38', '2022-07-13 14:25:38', '2022-07-13 14:25:38', 1),
(106, '7602326112118652', 'IL', 'Reza Salman Waluyo', 'Cimahi', '1979-02-25', 'Perempuan', 'Dk. Cokroaminoto No. 467, Administrasi Jakarta Utara 73602, KalTim', '0376 4586 384', 'halimah.kezia@gmail.co.id', 'IL7602', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:25:57', '2022-07-13 14:25:57', '2022-07-13 14:25:57', 2),
(107, '3471302905029114', 'FT', 'Cemani Saputra S.Sos', 'Palangka Raya', '1982-07-19', 'Laki-laki', 'Jr. Wahid No. 125, Gunungsitoli 57197, DIY', '(+62) 25 8760 4', 'niyaga.widiastuti@yahoo.co.id', 'FT3471', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:25:57', '2022-07-13 14:25:57', '2022-07-13 14:25:57', 2),
(108, '1507131211985224', 'LU', 'Maryadi Prakasa', 'Tanjungbalai', '1974-05-05', 'Perempuan', 'Psr. Karel S. Tubun No. 954, Kediri 77528, Bengkulu', '022 1138 827', 'daliono.hutasoit@gmail.co.id', 'LU1507', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:25:57', '2022-07-13 14:25:57', '2022-07-13 14:25:57', 2),
(109, '1110916002049841', 'ZB', 'Mahmud Halim', 'Pangkal Pinang', '1982-07-13', 'Perempuan', 'Psr. Bakin No. 635, Jambi 70964, Gorontalo', '0292 0030 730', 'winarno.azalea@yahoo.co.id', 'ZB1110', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:25:57', '2022-07-13 14:25:57', '2022-07-13 14:25:57', 2),
(110, '3502606011038898', 'VX', 'Maimunah Lestari', 'Ternate', '1989-09-27', 'Perempuan', 'Jr. Teuku Umar No. 566, Pariaman 19664, Papua', '(+62) 23 8302 6', 'usada.dian@yahoo.co.id', 'VX3502', '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei', 'default_profile.png', 'offline', '2022-07-13 14:25:57', '2022-07-13 14:25:57', '2022-07-13 14:25:57', 2);

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

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `kode_jadwal`, `hari`, `jumlah_jam`, `jam_masuk`, `jam_keluar`, `create_time`, `update_time`, `mapel_id`, `kelas_id`, `guru_kode`, `ruang_id`) VALUES
(1000, 'SMK-2022-0001', 'Senin', 2, '07:00:00', '08:30:00', '2022-07-13 14:59:23', '2022-07-13 14:59:23', 52, 21, 'FT', 16),
(1001, 'SMK-2022-0002', 'Senin', 3, '08:30:00', '11:00:00', '2022-07-13 14:59:23', '2022-07-13 14:59:23', 53, 21, 'IL', 16),
(1002, 'SMK-2022-0003', 'Senin', 3, '11:15:00', '13:30:00', '2022-07-13 14:59:23', '2022-07-13 14:59:23', 61, 21, 'ZB', 16),
(1003, 'SMK-2022-0004', 'Selasa', 3, '07:00:00', '09:15:00', '2022-07-13 15:03:45', '2022-07-13 15:03:45', 61, 22, 'ZB', 17),
(1004, 'SMK-2022-0005', 'Selasa', 2, '09:30:00', '11:00:00', '2022-07-13 15:03:45', '2022-07-13 15:03:45', 58, 22, 'KM', 17),
(1005, 'SMK-2022-0006', 'Selasa', 2, '11:15:00', '13:00:00', '2022-07-13 15:03:45', '2022-07-13 15:03:45', 52, 22, 'FT', 17),
(1006, 'SMK-2022-0007', 'Senin', 8, '07:00:00', '14:30:00', '2022-07-13 15:07:56', '2022-07-13 15:07:56', 63, 26, 'LU', 19),
(1007, 'SMK-2022-0008', 'Selasa', 8, '07:00:00', '14:30:00', '2022-07-13 15:08:35', '2022-07-13 15:08:35', 63, 27, 'LU', 19),
(1008, 'SMK-2022-0009', 'Rabu', 4, '07:00:00', '10:15:00', '2022-07-13 15:11:21', '2022-07-13 15:11:21', 62, 23, 'OK', 18),
(1009, 'SMK-2022-0010', 'Rabu', 2, '23:00:00', '23:45:00', '2022-07-13 15:11:21', '2022-07-13 15:11:21', 59, 23, 'PE', 18),
(1010, 'SMK-2022-0011', 'Kamis', 2, '07:00:00', '08:30:00', '2022-07-13 15:13:59', '2022-07-13 15:13:59', 54, 24, 'FT', 16),
(1011, 'SMK-2022-0012', 'Kamis', 3, '08:30:00', '11:15:00', '2022-07-13 15:13:59', '2022-07-13 15:13:59', 60, 24, 'VX', 17),
(1012, 'SMK-2022-0013', 'Jum\'at', 2, '07:00:00', '08:30:00', '2022-07-13 15:16:20', '2022-07-13 15:16:20', 57, 28, 'XS', 20),
(1013, 'SMK-2022-0014', 'Jum\'at', 2, '08:30:00', '12:00:00', '2022-07-13 15:16:20', '2022-07-13 15:16:20', 50, 28, 'OK', 19),
(1014, 'SMK-2022-0015', 'Sabtu', 2, '07:00:00', '08:30:00', '2022-07-13 15:19:03', '2022-07-13 15:19:03', 51, 29, 'JT', 20),
(1015, 'SMK-2022-0016', 'Sabtu', 2, '08:30:00', '10:00:00', '2022-07-13 15:19:03', '2022-07-13 15:19:03', 56, 29, 'IL', 20),
(1016, 'SMK-2022-0017', 'Senin', 4, '07:00:00', '10:15:00', '2022-07-13 15:22:11', '2022-07-13 15:22:11', 60, 25, 'VX', 18),
(1017, 'SMK-2022-0018', 'Senin', 2, '07:00:00', '08:30:00', '2022-07-13 15:22:11', '2022-07-13 15:22:11', 51, 30, 'JT', 19);

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

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kode_kelas`, `index_kelas`, `nama_kelas`, `guru_kode`, `kode_jurusan`, `create_time`, `update_time`) VALUES
(21, 'x-mm-1', 'X', 'X MM 1', 'FT', 'MM', '2022-07-13 14:39:40', '2022-07-13 14:39:40'),
(22, 'x-mm-2', 'X', 'X MM 2', 'IL', 'MM', '2022-07-13 14:39:57', '2022-07-13 14:39:57'),
(23, 'xi-mm-1', 'XI', 'XI MM 1', 'JT', 'MM', '2022-07-13 14:40:13', '2022-07-13 14:40:13'),
(24, 'xi-mm-2', 'XI', 'XI MM 2', 'KM', 'MM', '2022-07-13 14:40:28', '2022-07-13 14:40:28'),
(25, 'xii-mm-1', 'XII', 'XII MM 1', 'LU', 'MM', '2022-07-13 14:40:46', '2022-07-13 14:40:46'),
(26, 'x-tkro-1', 'X', 'X TKRO 1', 'OK', 'TKRO', '2022-07-13 14:41:58', '2022-07-13 14:41:58'),
(27, 'x-tkro-2', 'X', 'X TKRO 2', 'PE', 'TKRO', '2022-07-13 14:42:16', '2022-07-13 14:42:16'),
(28, 'xi-tkro-1', 'XI', 'XI TKRO 1', 'VX', 'TKRO', '2022-07-13 14:42:34', '2022-07-13 14:42:34'),
(29, 'xi-tkro-2', 'XI', 'XI TKRO 2', 'XS', 'TKRO', '2022-07-13 14:42:52', '2022-07-13 14:42:52'),
(30, 'xii-tkro-1', 'XII', 'XII TKRO 1', 'ZB', 'TKRO', '2022-07-13 14:43:05', '2022-07-13 14:43:05');

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

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `kode_mapel`, `slug_mapel`, `nama_mapel`, `create_time`, `update_time`) VALUES
(50, 'MU', 'pendidikan-agama-dan-budi-pekerti', 'Pendidikan Agama dan Budi Pekerti', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(51, 'DN', 'pendidikan-pancasila-dan-kewarganegaraan', 'Pendidikan Pancasila dan Kewarganegaraan', '2022-07-13 13:55:29', '2022-07-13 14:31:30'),
(52, 'BA', 'bahasa-indonesia', 'Bahasa Indonesia', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(53, 'EB', 'matematika', 'Matematika', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(54, 'EO', 'sejarah-indonesia', 'Sejarah Indonesia', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(55, 'LY', 'bahasa-inggris', 'Bahasa Inggris', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(56, 'ZM', 'seni-budaya', 'Seni Budaya', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(57, 'SH', 'pendidikan-jasmani-olahraga-dan-kesehatan', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(58, 'AZ', 'kimia', 'Kimia', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(59, 'QJ', 'fisika', 'Fisika', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(60, 'SO', 'simulasi-dan-komunikasi-digital', 'Simulasi dan Komunikasi Digital', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(61, 'ML', 'dasar-desain-grafis', 'Dasar Desain Grafis', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(62, 'TS', 'teknik-animasi-2d-dan-3d', 'Teknik Animasi 2D dan 3D ', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(63, 'RT', 'pemeliharaan-sasis-dan-pemindah-tenaga-kendaraan-ringan', 'Pemeliharaan Sasis dan Pemindah Tenaga Kendaraan Ringan', '2022-07-13 13:55:29', '2022-07-13 13:55:29'),
(64, 'FY', 'teknologi-dasar-otomotif', 'Teknologi Dasar Otomotif', '2022-07-13 13:55:29', '2022-07-13 13:55:29');

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

--
-- Dumping data for table `materi_info`
--

INSERT INTO `materi_info` (`materi_info_id`, `index_kelas`, `mapel_id`, `jurusan_id`, `create_time`, `update_time`) VALUES
(79, 'XI', 15, 4, '2022-06-22 06:54:28', '2022-06-22 06:54:28');

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

--
-- Dumping data for table `materi_kbm`
--

INSERT INTO `materi_kbm` (`materi_id`, `judul`, `jenis`, `materi`, `tipe_file`, `ukuran_file`, `materi_info_id`) VALUES
(100, 'Judul Materi Bahasa Indonesia', 'file', '4df819edc373ef89c54856fef122abeb.pdf', '.pdf', 2043.46, 79),
(101, 'Surah Taha relaxing quran - Ismail Annuri | Tenangkan Hati Dengan Mengingat Allah', 'link', 'https://www.youtube.com/embed/jQG1q03OaaQ', NULL, NULL, 79);

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

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruang_id`, `kode_ruang`, `nama_ruang`, `keterangan`, `create_time`, `update_time`) VALUES
(16, 'MM-1', 'MM-1', '', '2022-07-13 14:47:09', '2022-07-13 14:47:09'),
(17, 'MM-2', 'MM-2', '', '2022-07-13 14:47:24', '2022-07-13 14:47:24'),
(18, 'MM-3', 'MM-3', '', '2022-07-13 14:47:33', '2022-07-13 14:47:33'),
(19, 'TKRO-1', 'TKRO-1', '', '2022-07-13 14:47:46', '2022-07-13 14:47:46'),
(20, 'TKRO-2', 'TKRO-2', '', '2022-07-13 14:47:59', '2022-07-13 14:47:59');

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

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_nisn`, `siswa_nama`, `siswa_tempatlahir`, `siswa_tanggallahir`, `siswa_kelamin`, `siswa_alamat`, `siswa_telp`, `siswa_email`, `siswa_pass`, `siswa_foto`, `asal_kelas`, `status_online`, `last_login`, `create_time`, `update_time`, `role_id`, `kelas_id`, `status`) VALUES
(100, '79340', '78628394', 'Latika Karen Winarsih M.Pd', 'Kediri', '2001-12-09', 'Perempuan', 'Ds. Camar No. 412, Pariaman 31594, BaBel', '(+62) 628 2891 ', 'permadi.rangga@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:07', '2022-07-13 14:51:07', '2022-07-13 14:51:07', 4, 21, 'Aktif'),
(101, '60381', '12339469', 'Karimah Suartini', 'Pekalongan', '1975-01-17', 'Laki-laki', 'Jr. Kyai Mojo No. 836, Banjar 12909, Papua', '023 3862 103', 'anita.thamrin@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:07', '2022-07-13 14:51:07', '2022-07-13 14:51:07', 4, 21, 'Aktif'),
(102, '34463', '86918482', 'Sakura Rahmawati', 'Administrasi Jakarta Utara', '1991-01-24', 'Perempuan', 'Ds. Bass No. 685, Pekalongan 49804, DKI', '0664 0746 016', 'rastuti@palastri.my.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:07', '2022-07-13 14:51:07', '2022-07-13 14:51:07', 4, 21, 'Aktif'),
(103, '56721', '21106802', 'Lamar Maulana', 'Palu', '1973-01-16', 'Laki-laki', 'Ki. Abdul Rahmat No. 169, Pariaman 78146, Jambi', '(+62) 807 3439 ', 'martaka72@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:07', '2022-07-13 14:51:07', '2022-07-13 14:51:07', 4, 21, 'Aktif'),
(104, '66063', '97412500', 'Zaenab Usamah', 'Administrasi Jakarta Utara', '2014-12-15', 'Laki-laki', 'Jln. Cikapayang No. 459, Bandar Lampung 31093, Bengkulu', '(+62) 281 8197 ', 'safina.anggraini@yahoo.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:07', '2022-07-13 14:51:07', '2022-07-13 14:51:07', 4, 21, 'Aktif'),
(105, '76249', '55608848', 'Puji Diana Halimah S.I.Kom', 'Gorontalo', '1980-11-01', 'Laki-laki', 'Ds. Antapani Lama No. 327, Pekalongan 13053, SulUt', '0575 8197 1879', 'wijayanti.kenari@haryanto.asia', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:20', '2022-07-13 14:51:20', '2022-07-13 14:51:20', 4, 22, 'Aktif'),
(106, '87228', '25709653', 'Nalar Tirta Prakasa', 'Banda Aceh', '2016-10-10', 'Laki-laki', 'Dk. B.Agam Dlm No. 604, Palembang 14596, Lampung', '0979 5550 0798', 'lanang.waluyo@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:20', '2022-07-13 14:51:20', '2022-07-13 14:51:20', 4, 22, 'Aktif'),
(107, '30121', '30666199', 'Nugraha Ramadan', 'Parepare', '2015-07-19', 'Laki-laki', 'Jr. Gajah No. 279, Pematangsiantar 97323, Bengkulu', '(+62) 747 7236 ', 'cmansur@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:20', '2022-07-13 14:51:20', '2022-07-13 14:51:20', 4, 22, 'Aktif'),
(108, '40876', '35024660', 'Farhunnisa Anggraini', 'Tegal', '1996-07-26', 'Laki-laki', 'Ki. Baladewa No. 396, Gorontalo 68701, Banten', '0562 0156 3351', 'vfirmansyah@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:20', '2022-07-13 14:51:20', '2022-07-13 14:51:20', 4, 22, 'Aktif'),
(109, '88342', '14067309', 'Lega Siregar', 'Pasuruan', '1979-03-27', 'Laki-laki', 'Ki. Setiabudhi No. 643, Cirebon 74448, SulBar', '0402 9733 147', 'ira92@wahyuni.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:20', '2022-07-13 14:51:20', '2022-07-13 14:51:20', 4, 22, 'Aktif'),
(110, '91585', '35194659', 'Hairyanto Wahyu Wahyudin', 'Pangkal Pinang', '1975-05-07', 'Laki-laki', 'Kpg. Urip Sumoharjo No. 794, Cimahi 24739, Riau', '(+62) 319 0890 ', 'banawi.simanjuntak@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-16 10:33:14', '2022-07-13 14:51:32', '2022-07-13 14:51:32', 4, 23, 'Aktif'),
(111, '59342', '56139652', 'Catur Irawan', 'Tarakan', '1978-11-19', 'Perempuan', 'Kpg. Dipatiukur No. 760, Mojokerto 94900, Maluku', '0882 3063 741', 'rpratama@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-20 04:30:56', '2022-07-13 14:51:32', '2022-07-13 14:51:32', 4, 23, 'Aktif'),
(112, '17094', '90852942', 'Viktor Saiful Wibowo M.Ak', 'Tangerang Selatan', '2015-07-24', 'Perempuan', 'Dk. Mahakam No. 988, Balikpapan 33577, SulTra', '(+62) 843 0461 ', 'gina.nasyiah@megantara.org', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:32', '2022-07-13 14:51:32', '2022-07-13 14:51:32', 4, 23, 'Aktif'),
(113, '97195', '30188964', 'Ratih Hastuti', 'Jambi', '2009-05-31', 'Perempuan', 'Kpg. Wahidin No. 210, Administrasi Jakarta Selatan 96222, SulUt', '0937 9820 046', 'siregar.kiandra@safitri.web.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:32', '2022-07-13 14:51:32', '2022-07-13 14:51:32', 4, 23, 'Aktif'),
(114, '91555', '84053013', 'Mahdi Firmansyah', 'Palopo', '1984-05-08', 'Laki-laki', 'Dk. Ciwastra No. 918, Palu 77784, KalTeng', '0607 6748 8565', 'ganda49@situmorang.mil.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:32', '2022-07-13 14:51:32', '2022-07-13 14:51:32', 4, 23, 'Aktif'),
(115, '44415', '63788516', 'Farhunnisa Zulaika', 'Kediri', '1990-04-09', 'Perempuan', 'Psr. Kebonjati No. 793, Bukittinggi 84272, Papua', '(+62) 20 9481 3', 'natsir.mahmud@andriani.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:37', '2022-07-13 14:51:37', '2022-07-13 14:51:37', 4, 24, 'Aktif'),
(116, '62635', '35547550', 'Malik Wijaya M.Farm', 'Manado', '2018-03-22', 'Perempuan', 'Ki. Cikapayang No. 198, Jayapura 47486, KalUt', '(+62) 774 4299 ', 'mutia97@zulaika.tv', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:37', '2022-07-13 14:51:37', '2022-07-13 14:51:37', 4, 24, 'Aktif'),
(117, '69028', '82869153', 'Maida Maya Usada S.E.I', 'Mataram', '2021-10-05', 'Perempuan', 'Jr. Sutarjo No. 550, Pematangsiantar 95494, KalSel', '0715 0967 4088', 'wulandari.gaman@siregar.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:37', '2022-07-13 14:51:37', '2022-07-13 14:51:37', 4, 24, 'Aktif'),
(118, '18327', '76135604', 'Fitria Nasyiah', 'Sungai Penuh', '2011-10-24', 'Laki-laki', 'Psr. Kartini No. 668, Pariaman 11108, Bali', '0784 4758 995', 'maria.usada@nainggolan.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:37', '2022-07-13 14:51:37', '2022-07-13 14:51:37', 4, 24, 'Aktif'),
(119, '20687', '32232951', 'Eja Galih Budiman', 'Gunungsitoli', '1975-08-20', 'Perempuan', 'Psr. Bakaru No. 577, Bandar Lampung 92416, KalUt', '0677 3233 317', 'pranowo.genta@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:37', '2022-07-13 14:51:37', '2022-07-13 14:51:37', 4, 24, 'Aktif'),
(120, '23077', '50845136', 'Maida Aryani M.Farm', 'Sungai Penuh', '1986-09-04', 'Laki-laki', 'Dk. Dipatiukur No. 531, Salatiga 23083, KepR', '(+62) 858 2976 ', 'chelsea.gunawan@yahoo.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:44', '2022-07-13 14:51:44', '2022-07-13 14:51:44', 4, 25, 'Aktif'),
(121, '56133', '74624876', 'Elvina Purwanti', 'Administrasi Jakarta Barat', '1973-08-26', 'Laki-laki', 'Jr. Surapati No. 202, Tual 32982, PapBar', '(+62) 300 8486 ', 'queen75@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:44', '2022-07-13 14:51:44', '2022-07-13 14:51:44', 4, 25, 'Aktif'),
(122, '27134', '93945603', 'Edi Maulana', 'Pariaman', '1994-07-02', 'Perempuan', 'Psr. Ki Hajar Dewantara No. 216, Yogyakarta 70609, Bali', '0865 3404 525', 'nainggolan.oni@yahoo.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:44', '2022-07-13 14:51:44', '2022-07-13 14:51:44', 4, 25, 'Aktif'),
(123, '62121', '71753904', 'Kani Gasti Farida', 'Bima', '2012-10-18', 'Laki-laki', 'Psr. Moch. Ramdan No. 196, Ambon 30033, KalTim', '0493 4202 857', 'byuliarti@suryono.ac.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:44', '2022-07-13 14:51:44', '2022-07-13 14:51:44', 4, 25, 'Aktif'),
(124, '72526', '99043740', 'Kamidin Marbun', 'Jambi', '2019-09-17', 'Laki-laki', 'Psr. Baranang Siang Indah No. 567, Banjarbaru 28353, NTT', '0748 0503 544', 'gaduh72@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:44', '2022-07-13 14:51:44', '2022-07-13 14:51:44', 4, 25, 'Aktif'),
(125, '79126', '61366868', 'Sabri Thamrin S.IP', 'Bukittinggi', '1976-01-25', 'Perempuan', 'Ds. Bakaru No. 782, Denpasar 99599, Papua', '(+62) 464 9723 ', 'dabukke.kartika@wulandari.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:50', '2022-07-13 14:51:50', '2022-07-13 14:51:50', 4, 26, 'Aktif'),
(126, '11625', '85354400', 'Naradi Cengkal Putra', 'Palangka Raya', '1987-03-09', 'Perempuan', 'Kpg. Imam Bonjol No. 346, Madiun 39241, NTB', '(+62) 405 1837 ', 'iswahyudi.alika@wacana.asia', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:50', '2022-07-13 14:51:50', '2022-07-13 14:51:50', 4, 26, 'Aktif'),
(127, '42860', '80223810', 'Queen Mandasari', 'Serang', '2010-07-15', 'Perempuan', 'Kpg. Bambon No. 175, Payakumbuh 20720, Bengkulu', '(+62) 444 0601 ', 'rpudjiastuti@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:50', '2022-07-13 14:51:50', '2022-07-13 14:51:50', 4, 26, 'Aktif'),
(128, '99787', '86364971', 'Ozy Irawan', 'Gunungsitoli', '1984-09-08', 'Laki-laki', 'Ds. Tentara Pelajar No. 900, Gorontalo 36936, NTT', '0766 9893 249', 'nuraini.kenari@zulaika.biz.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:50', '2022-07-13 14:51:50', '2022-07-13 14:51:50', 4, 26, 'Aktif'),
(129, '55357', '61702881', 'Luwes Langgeng Tamba', 'Bitung', '1985-08-07', 'Perempuan', 'Jln. Kyai Gede No. 813, Cimahi 34133, KepR', '0741 3058 8495', 'raisa.siregar@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:50', '2022-07-13 14:51:50', '2022-07-13 14:51:50', 4, 26, 'Aktif'),
(130, '44793', '69667816', 'Galih Prayoga S.Psi', 'Metro', '2009-09-06', 'Laki-laki', 'Dk. Salam No. 200, Kendari 25844, JaBar', '0478 5544 331', 'ehariyah@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:54', '2022-07-13 14:51:54', '2022-07-13 14:51:54', 4, 27, 'Aktif'),
(131, '79670', '64808246', 'Violet Zulaika S.IP', 'Palu', '1974-06-29', 'Perempuan', 'Jln. B.Agam Dlm No. 777, Malang 78263, Maluku', '0810 492 847', 'iriana40@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:54', '2022-07-13 14:51:54', '2022-07-13 14:51:54', 4, 27, 'Aktif'),
(132, '58364', '70522571', 'Ian Firmansyah', 'Tebing Tinggi', '2011-09-12', 'Perempuan', 'Jr. Bayan No. 623, Cirebon 16975, Lampung', '(+62) 858 5931 ', 'qrahmawati@siregar.asia', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:54', '2022-07-13 14:51:54', '2022-07-13 14:51:54', 4, 27, 'Aktif'),
(133, '14826', '22129240', 'Hamima Nuraini', 'Sawahlunto', '1994-05-01', 'Perempuan', 'Gg. Gotong Royong No. 248, Kupang 68853, JaTeng', '0432 1947 4326', 'catur47@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:54', '2022-07-13 14:51:54', '2022-07-13 14:51:54', 4, 27, 'Aktif'),
(134, '48383', '27108896', 'Edi Dabukke', 'Batam', '2017-01-20', 'Laki-laki', 'Jln. Bhayangkara No. 66, Pontianak 43597, DKI', '(+62) 226 8954 ', 'waluyo.janet@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:51:54', '2022-07-13 14:51:54', '2022-07-13 14:51:54', 4, 27, 'Aktif'),
(135, '94909', '33520005', 'Safina Ayu Laksmiwati', 'Pangkal Pinang', '1996-10-28', 'Perempuan', 'Ds. Yogyakarta No. 863, Cimahi 63312, SulUt', '0612 6255 525', 'purwa.kusmawati@yahoo.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-15 04:28:27', '2022-07-13 14:52:00', '2022-07-13 14:52:00', 4, 28, 'Aktif'),
(136, '43793', '62492315', 'Taswir Sitorus', 'Magelang', '2008-07-22', 'Laki-laki', 'Jln. Jend. A. Yani No. 991, Bitung 95367, Lampung', '(+62) 538 6157 ', 'cmangunsong@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-15 04:41:51', '2022-07-13 14:52:00', '2022-07-13 14:52:00', 4, 28, 'Aktif'),
(137, '88889', '87498840', 'Mursinin Mangunsong S.Ked', 'Padang', '1991-07-16', 'Perempuan', 'Dk. Basmol Raya No. 199, Lhokseumawe 13884, Aceh', '(+62) 692 6429 ', 'putri97@hutapea.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:00', '2022-07-13 14:52:00', '2022-07-13 14:52:00', 4, 28, 'Aktif'),
(138, '42275', '19771777', 'Kacung Santoso S.E.', 'Bima', '2007-09-07', 'Laki-laki', 'Dk. Bah Jaya No. 688, Tanjungbalai 57287, SulTra', '(+62) 324 4729 ', 'tgunarto@sitorus.info', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:00', '2022-07-13 14:52:00', '2022-07-13 14:52:00', 4, 28, 'Aktif'),
(139, '53922', '39952273', 'Jarwa Yahya Wacana S.Psi', 'Pematangsiantar', '1999-05-24', 'Perempuan', 'Psr. Rajiman No. 893, Padangsidempuan 34190, SumBar', '(+62) 917 3890 ', 'hamima97@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:00', '2022-07-13 14:52:00', '2022-07-13 14:52:00', 4, 28, 'Aktif'),
(140, '91409', '87217427', 'Karta Sinaga', 'Bukittinggi', '1991-04-12', 'Perempuan', 'Jr. Ahmad Dahlan No. 684, Bontang 74721, MalUt', '0388 1514 9469', 'tsiregar@wijayanti.in', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:08', '2022-07-13 14:52:08', '2022-07-13 14:52:08', 4, 29, 'Aktif'),
(141, '47068', '51975962', 'Ajiono Ajiman Saputra', 'Manado', '1998-08-20', 'Perempuan', 'Gg. Baja Raya No. 39, Gunungsitoli 33401, SumSel', '0372 4939 8674', 'gunawan.kenari@gmail.com', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:08', '2022-07-13 14:52:08', '2022-07-13 14:52:08', 4, 29, 'Aktif'),
(142, '77862', '65666213', 'Daliman Setiawan', 'Pekalongan', '1988-07-11', 'Laki-laki', 'Dk. Bakti No. 128, Probolinggo 12257, SumUt', '(+62) 341 2850 ', 'oktaviani.anita@gmail.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:08', '2022-07-13 14:52:08', '2022-07-13 14:52:08', 4, 29, 'Aktif'),
(143, '32050', '50689387', 'Najwa Farida', 'Bau-Bau', '1974-05-08', 'Perempuan', 'Jr. Basmol Raya No. 214, Serang 37559, JaBar', '(+62) 403 6464 ', 'pertiwi.edison@prasetyo.tv', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:08', '2022-07-13 14:52:08', '2022-07-13 14:52:08', 4, 29, 'Aktif'),
(144, '99717', '15273312', 'Ajiono Utama', 'Pangkal Pinang', '2021-06-29', 'Laki-laki', 'Ki. Taman No. 756, Balikpapan 36115, SumUt', '0668 9130 4268', 'kuswoyo.ilyas@hartati.biz', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:08', '2022-07-13 14:52:08', '2022-07-13 14:52:08', 4, 29, 'Aktif'),
(145, '95415', '54751191', 'Danuja Gunawan S.E.', 'Tarakan', '1970-06-18', 'Perempuan', 'Ds. Honggowongso No. 365, Padangsidempuan 16135, KalTeng', '0458 3003 1674', 'namaga.hilda@safitri.biz', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:16', '2022-07-13 14:52:16', '2022-07-13 14:52:16', 4, 30, 'Aktif'),
(146, '11440', '81796857', 'Sabrina Violet Nurdiyanti S.H.', 'Kupang', '1987-07-21', 'Perempuan', 'Psr. Urip Sumoharjo No. 293, Administrasi Jakarta Timur 93667, NTB', '0672 4269 9478', 'ghaliyati19@wasita.in', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:16', '2022-07-13 14:52:16', '2022-07-13 14:52:16', 4, 30, 'Aktif'),
(147, '79801', '28984712', 'Ina Wulandari S.Farm', 'Cirebon', '2016-08-08', 'Perempuan', 'Dk. Veteran No. 151, Tegal 15847, SumBar', '(+62) 281 7227 ', 'nsamosir@oktaviani.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:16', '2022-07-13 14:52:16', '2022-07-13 14:52:16', 4, 30, 'Aktif'),
(148, '71637', '48862801', 'Akarsana Wibisono S.E.I', 'Metro', '1970-03-30', 'Perempuan', 'Jr. Ters. Kiaracondong No. 114, Denpasar 41398, SulUt', '0553 9182 9427', 'emong94@yahoo.co.id', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:16', '2022-07-13 14:52:16', '2022-07-13 14:52:16', 4, 30, 'Aktif'),
(149, '71210', '42739316', 'Praba Wibisono', 'Samarinda', '2002-08-05', 'Perempuan', 'Dk. Baja Raya No. 605, Serang 32205, NTT', '(+62) 707 6757 ', 'makuta43@pratama.asia', '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42', 'default_foto.png', NULL, 'offline', '2022-07-13 14:52:16', '2022-07-13 14:52:16', '2022-07-13 14:52:16', 4, 30, 'Aktif');

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
(6, '2023/2024', 1, 0, '2022-06-16 08:29:25', '2022-06-16 08:29:25'),
(7, '2024/2025', 3, 1, '2022-06-17 09:48:10', '2022-06-17 09:48:10');

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
-- Dumping data for table `token_login`
--

INSERT INTO `token_login` (`token_id`, `access_token`, `login_time`) VALUES
(68, '$1$NqrV4Ryu$9QRp.Nmzv96By0stcsRd.1', '2022-07-13 15:27:14'),
(72, '$1$QhFqI6nD$gB0ewFo26BJy6xBU7dgJ41', '2022-07-14 08:26:14'),
(85, '$1$AyPlp63j$H/6UaL1RmJkg7KSzXIr4//', '2022-07-19 02:51:06'),
(86, '$1$sO5CjQuX$YKT.dOhjEY4KpcCO55lNI1', '2022-07-19 04:27:43'),
(88, '$1$0yDpC.X8$z4fG1c7kilfLbHjLOFOYp.', '2022-07-19 13:24:04'),
(91, '$1$snicKzgO$7N3qeP2R5ahgCjJ0kl7yv0', '2022-07-20 04:26:45'),
(92, '$1$K1gltioi$Mzt./pXrqcEcjp.06f.22.', '2022-07-20 04:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tugas_id` int(10) UNSIGNED NOT NULL,
  `tanggal_tugas` date NOT NULL,
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
-- Table structure for table `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `tugas_siswa_id` int(10) UNSIGNED NOT NULL,
  `time_upload` datetime NOT NULL,
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
-- Indexes for table `diskusi_siswa`
--
ALTER TABLE `diskusi_siswa`
  ADD PRIMARY KEY (`diskusi_siswa_id`);

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
-- Indexes for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD PRIMARY KEY (`forum_diskusi_id`),
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
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tugas_id`),
  ADD KEY `jadwal_idFK` (`jadwal_id`),
  ADD KEY `jadwal_idFK_idx` (`jadwal_id`);

--
-- Indexes for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
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
  MODIFY `absensi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `diskusi_siswa`
--
ALTER TABLE `diskusi_siswa`
  MODIFY `diskusi_siswa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `evaluasi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `evaluasi_siswa`
--
ALTER TABLE `evaluasi_siswa`
  MODIFY `evaluasi_siswa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  MODIFY `forum_diskusi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `infoakd_kelas`
--
ALTER TABLE `infoakd_kelas`
  MODIFY `infoakdkelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `info_akademik`
--
ALTER TABLE `info_akademik`
  MODIFY `infoakd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `jurnal_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `materi_info`
--
ALTER TABLE `materi_info`
  MODIFY `materi_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `materi_kbm`
--
ALTER TABLE `materi_kbm`
  MODIFY `materi_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
  MODIFY `ruang_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `thnakd_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `token_login`
--
ALTER TABLE `token_login`
  MODIFY `token_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `tugas_siswa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;

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
-- Constraints for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD CONSTRAINT `jadwal_id_FK` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `jadwal_idFK_idx` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD CONSTRAINT `siswa_nisFK_idx` FOREIGN KEY (`siswa_nis`) REFERENCES `siswa` (`siswa_nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_idFK_idx` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`tugas_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
