CREATE TABLE `siberhyl_app`.`siswa` (
  `siswa_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `siswa_nis` VARCHAR(10) NOT NULL,
  `siswa_nisn` VARCHAR(15) NOT NULL,
  `siswa_nama` VARCHAR(125) NOT NULL,
  `siswa_tempatlahir` VARCHAR(45) NULL DEFAULT NULL,
  `siswa_tanggallahir` DATE NULL DEFAULT NULL,
  `siswa_kelamin` ENUM('Laki-laki', 'Perempuan') NULL DEFAULT NULL,
  `siswa_alamat` VARCHAR(225) NULL DEFAULT NULL,
  `siswa_telp` VARCHAR(15) NULL DEFAULT NULL,
  `siswa_email` VARCHAR(45) NULL DEFAULT NULL,
  `siswa_pass` VARCHAR(225) NOT NULL DEFAULT '$2y$10$enNs9IK56sMhwIKJsq7KeOJqI2P3JXpulH5sNbIEEJcFll1769L42',
  `siswa_foto` VARCHAR(45) NULL DEFAULT 'default_foto.png',
  `asal_kelas` VARCHAR(12) NULL DEFAULT NULL,
  `status_online` ENUM('online', 'offline') NULL DEFAULT 'offline',
  `last_login` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` SMALLINT(4) UNSIGNED NOT NULL,
  `kelas_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`siswa_id`, `siswa_nis`),
  UNIQUE INDEX `siswa_nis_UNIQUE` (`siswa_nis`),
  UNIQUE INDEX `siswa_nisn_UNIQUE` (`siswa_nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `siberhyl_app`.`guru` (
  `guru_id` INT(10) NOT NULL AUTO_INCREMENT,
  `guru_nip` VARCHAR(20) NOT NULL,
  `guru_kode` CHAR(5) NOT NULL,
  `guru_nama` VARCHAR(125) NOT NULL,
  `guru_tempatlahir` VARCHAR(45) NULL DEFAULT NULL,
  `guru_tanggallahir` DATE NULL DEFAULT NULL,
  `guru_kelamin` ENUM('Laki-laki', 'Perempuan') NULL DEFAULT NULL,
  `guru_alamat` VARCHAR(225) NULL DEFAULT NULL,
  `guru_telp` VARCHAR(15) NULL DEFAULT NULL,
  `guru_email` VARCHAR(45) NULL DEFAULT NULL,
  `guru_username` VARCHAR(12) NOT NULL,
  `guru_pass` VARCHAR(225) NOT NULL DEFAULT '$2y$10$ijmVDAoZCROuxfHrfubhnOs99M8.tLv7rg/QwgWuuxR6wN4.Vkwei',
  `guru_foto` VARCHAR(45) NULL DEFAULT 'default_profile.png',
  `status_online` ENUM('online', 'offline') NULL DEFAULT 'offline',
  `last_login` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` SMALLINT(4) UNSIGNED NOT NULL,
  PRIMARY KEY (`guru_id`, `guru_nip`),
  UNIQUE INDEX `guru_nip_UNIQUE` (`guru_nip`),
  UNIQUE INDEX `guru_kode_UNIQUE` (`guru_kode`) ,
  UNIQUE INDEX `guru_username_UNIQUE` (`guru_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `siberhyl_app`.`role` (
  `role_id` SMALLINT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `siberhyl_app`.`kelas` (
  `kelas_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_kelas` VARCHAR(8) NOT NULL,
  `nama_kelas` VARCHAR(25) NOT NULL,
  `guru_nip` VARCHAR(20) NOT NULL,
  `jurusan_id` INT(8) NOT NULL,
  `ruang_id` INT(8) NOT NULL,
  PRIMARY KEY (`kelas_id`),
  UNIQUE INDEX `kode_kelas_UNIQUE` (`kode_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `siberhyl_app`.`ruangan` (
	`ruang_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`kode_ruang` VARCHAR(8) NOT NULL,
	`nama_ruang` VARCHAR(45) NOT NULL,
	`keterangan` TEXT NULL,
	PRIMARY KEY (`ruang_id`),
	UNIQUE INDEX `kode_ruang_UNIQUE` (`kode_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `siberhyl_app`.`jurusan` (
	`jurusan_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`kode_jurusan` VARCHAR(8) NOT NULL,
	`nama_jurusan` VARCHAR(125) NOT NULL,
	`bidang_keahlian` VARCHAR(125) NULL,
	PRIMARY KEY (`jurusan_id`),
	UNIQUE INDEX `kode_ruangan_UNIQUE` (`kode_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `siberhyl_app`.`mapel` (
	`mapel_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`kode_mapel` VARCHAR(8) NOT NULL,
	`nama_mapel` VARCHAR(125) NOT NULL,
	PRIMARY KEY (`mapel_id`),
	UNIQUE INDEX `kode_ruangan_UNIQUE` (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jadwal` (
  `jadwal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_jadwal` char(5) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jumlah_jam` smallint(4) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `mapel_id` int(10) unsigned NOT NULL,
  `kelas_id` int(10) unsigned NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `ruangan_id` int(8) unsigned NOT NULL,
  PRIMARY KEY (`jadwal_id`),
  UNIQUE KEY `kode_jadwal_UNIQUE` (`kode_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jurnal` (
  `jurnal_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam_ke` char(6) NOT NULL,
  `pert_ke` char(4) NOT NULL,
  `jenis_kbm` enum('online','offline','') NOT NULL DEFAULT '',
  `kd_materi` varchar(125) NOT NULL,
  `pembahasan` text NOT NULL,
  `catatan_kbm` text DEFAULT NULL,
  `absen_mulai` time NOT NULL,
  `absen_selesai` time NOT NULL,
  `jadwal_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`jurnal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `materi_kbm` (
  `materi_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(125) NOT NULL,
  `jenis` enum('file','link','') NOT NULL DEFAULT '',
  `materi` varchar(100) NOT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `ukuran_file` float DEFAULT NULL,
  `jadwal_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`materi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `siberhyl_app`.`jadwal` 
ADD INDEX `kelas_idFK_idx` (`kelas_id`),
ADD INDEX `mapel_idFK_idx` (`mapel_id`),
ADD INDEX `guru_nipFK_idx` (`guru_nip` ),
ADD INDEX `ruang_idFK_idx` (`ruang_id`);
;
ALTER TABLE `siberhyl_app`.`jadwal` 
ADD CONSTRAINT `kelas_idFK`
  FOREIGN KEY (`kelas_id`)
  REFERENCES `siberhyl_app`.`kelas` (`kelas_id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
ADD CONSTRAINT `mapel_idFK`
  FOREIGN KEY (`mapel_id`)
  REFERENCES `siberhyl_app`.`mapel` (`mapel_id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
ADD CONSTRAINT `guru_nipFK`
  FOREIGN KEY (`guru_nip`)
  REFERENCES `siberhyl_app`.`guru` (`guru_nip`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
ADD CONSTRAINT `ruang_idFK`
  FOREIGN KEY (`ruang_id`)
  REFERENCES `siberhyl_app`.`ruangan` (`ruang_id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
