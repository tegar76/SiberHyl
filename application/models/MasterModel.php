<?php

class MasterModel extends CI_Model
{

	public function get_row_data($table = null, $where = null)
	{
		if ($table == null) {
			return false;
		}
		$query	= $this->db->get_where($table, $where);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function get_datatable($table = null)
	{
		if ($table == null) {
			return false;
		}
		$query	= $this->db->order_by('create_time', 'DESC')->get($table);
		return $query->result();
	}

	public function get_pesan()
	{
		$query	= $this->db->order_by('create_time', 'DESC')->get('pesan_aduan', 3);
		return $query->result();
	}

	public function get_tablewhere($table = null, $where = [])
	{
		$query	= $this->db->get_where($table, $where);
		if ($query->num_rows() > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
	}

	public function get_masterdata($table = null)
	{
		if ($table == 'kelas') {
			$query	= $this->db->select('kelas_id, kode_kelas, nama_kelas')
				->from($table)->order_by('nama_kelas', 'ASC')->get();
			$result = $query->result();
			return $result;
		} elseif ($table == 'mapel') {
			$query = $this->db->select('mapel_id, nama_mapel')
				->from($table)->order_by('nama_mapel', 'ASC')->get();
			$result = $query->result();
			return $result;
		} elseif ($table == 'guru') {
			$query = $this->db->select('guru_nip, guru_kode, guru_nama', 'role_id')
				->from($table)->where('role_id !=', 1)->order_by('guru_kode', 'ASC')->get();
			$result = $query->result();
			return $result;
		} elseif ($table == 'ruangan') {
			$query = $this->db->select('ruang_id, kode_ruang')
				->from('ruangan')->order_by('kode_ruang', 'ASC')->get();
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	public function get_select2($type, $search)
	{
		if ($type == 'class') {
			$this->db->select('kelas_id, kode_kelas, nama_kelas');
			$this->db->from('kelas');
			$this->db->like('nama_kelas', $search);
			$this->db->order_by('nama_kelas', 'ASC');
			$query	= $this->db->get();
			if ($query->num_rows() == null) {
				return 0;
			}
			return $query->result();
		} elseif ($type == 'lesson') {
			$this->db->select('mapel_id, nama_mapel');
			$this->db->from('mapel');
			$this->db->like('nama_mapel', $search);
			$this->db->order_by('nama_mapel', 'ASC');
			$query	= $this->db->get();
			if ($query->num_rows() == null) {
				return 0;
			}
			return $query->result();
		} elseif ($type == 'teacher') {
			$this->db->select('guru_id, guru_nip, guru_kode, guru_nama, role_id');
			$this->db->from('guru');
			$this->db->like('guru_nip', $search);
			$this->db->like('guru_kode', $search);
			$this->db->like('guru_nama', $search);
			$this->db->where('role_id !=', 1);
			$this->db->order_by('guru_kode', 'ASC');
			$query	= $this->db->get();
			if ($query->num_rows() == null) {
				return 0;
			}
			return $query->result();
		} elseif ($type == 'room') {
			$this->db->select('ruang_id, kode_ruang');
			$this->db->from('ruangan');
			$this->db->like('kode_ruang', $search);
			$this->db->order_by('kode_ruang', 'ASC');
			$query	= $this->db->get();
			if ($query->num_rows() == null) {
				return 0;
			}
			return $query->result();
		} else if ($type == 'jurusan') {
			$this->db->select('jurusan_id, kode_jurusan, nama_jurusan');
			$this->db->from('jurusan');
			$this->db->like('nama_jurusan', $search);
			$this->db->order_by('nama_jurusan', 'ASC');
			$query	= $this->db->get();
			if ($query->num_rows() == null) {
				return 0;
			}
			return $query->result();
		} else {
			return false;
		}
	}

	public function getSiswaKelas($kelas)
	{
		$this->db->where('kelas_id', $kelas);
		$this->db->order_by('siswa_nama', 'ASC');
		return $this->db->get('siswa')->result();
	}

	/* Function Modul Materi Bahan Ajar */
	public function materiPembelajaranAdmin()
	{
		$this->db->select("
			detail.detailmateri_id as id,
			detail.index_kelas as kelas,
			detail.create_time as create,
			detail.update_time as update,
			detail.status,
			mapel.nama_mapel as mapel, 
			jurusan.kode_jurusan as jurusan,
		");
		$this->db->from('detailmateri as detail');
		$this->db->join('mapel', 'mapel.mapel_id=detail.mapel_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->where('status', 1);
		$this->db->order_by('detail.create_time', 'DESC');
		return $this->db->get()->result();
	}

	public function detailMateri($id)
	{
		$this->db->select("
			detail.detailmateri_id as id,
			detail.index_kelas as kelas,
			detail.create_time as create,
			detail.update_time as update,
			detail.status,
			mapel.nama_mapel as mapel, 
			jurusan.nama_jurusan as jurusan,
			jurusan.kode_jurusan as kode,
			jurusan.jurusan_id as j_id,
			guru.guru_nama as nama,
		");
		$this->db->from('detailmateri as detail');
		$this->db->join('mapel', 'mapel.mapel_id=detail.mapel_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->join('guru', 'guru.guru_id=detail.guru_id', 'left');
		$this->db->where('detailmateri_id', $id);
		return $this->db->get()->row();
	}


	public function modulMateri($jenis, $id)
	{
		$this->db->where('jenis', $jenis);
		$this->db->where('detailmateri_id', $id);
		return $this->db->get('materipembelajaran')->result();
	}

	public function getMateri($materi_id)
	{
		$this->db->select("
			materi.materi_id, materi.judul, materi.jenis,
			materi.file_materi as file,
			materi.file_type as type,
			materi.file_size as size,
			materi.create_time as create,
			materi.update_time as update,
			detail.index_kelas as kelas,
			detail.detailmateri_id as detail_id,
			jurusan.kode_jurusan as jurusan
		");
		$this->db->from('materipembelajaran as materi');
		$this->db->join('detailmateri as detail', 'detail.detailmateri_id=materi.detailmateri_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->where('materi_id', $materi_id);
		return $this->db->get()->row();
	}

	public function materiGuru()
	{
		$this->db->select("
			detail.detailmateri_id as id,
			detail.index_kelas as index_kelas,
			detail.create_time as create,
			detail.update_time as update,
			detail.status,
			kelas.nama_kelas as kelas,
			mapel.nama_mapel as mapel,
			guru.guru_nama as guru, 
			guru.guru_kode as kode_g,
			jurusan.nama_jurusan as jurusan,
			jurusan.kode_jurusan as kode_j
		");
		$this->db->from('detailmateri as detail');
		$this->db->join('mapel', 'mapel.mapel_id=detail.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=detail.kelas_id', 'left');
		$this->db->join('guru', 'guru.guru_id=detail.guru_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->where('status', 2);
		$this->db->order_by('detail.create_time', 'DESC');
		return $this->db->get()->result();
	}

	public function getDetailMateriGuru($id)
	{
		$this->db->select("
			detail.detailmateri_id as id,
			detail.create_time as create,
			detail.update_time as update,
			mapel.nama_mapel as mapel, 
			jurusan.nama_jurusan as jurusan,
			guru.guru_kode as kode_g,
			guru.guru_nama as guru,
			kelas.nama_kelas as kelas
		");
		$this->db->from('detailmateri as detail');
		$this->db->join('mapel', 'mapel.mapel_id=detail.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=detail.kelas_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->join('guru', 'guru.guru_id=detail.guru_id', 'left');
		$this->db->where('detailmateri_id', $id);
		return $this->db->get()->row();
	}
	/* End Of Function Modul Materi Bahan Ajar */

	/* Function Info Akademik */
	public function getInfoAkademik($limit = null)
	{
		$this->db->select("
			info.info_id as id,
			info.judul_info as judul,
			info.slug_judul as slug,
			info.file_info as file,
			info.file_type as type,
			info.file_size as size,
			info.create_time as create,
			info.update_time as update,
			penerima.index_kelas as index,
			penerima.kode_jurusan as jurusan,
			penerima.kelas_id as kelas_id
		");
		$this->db->from('infoakademik as info');
		$this->db->join('penerimainfo as penerima', 'penerima.info_id=info.info_id', 'left');
		$this->db->order_by('info.create_time', 'DESC');
		$this->db->group_by('penerima.info_id');
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}

	public function getPenerimaKelasInfo($id)
	{
		$this->db->select("
			kelas.nama_kelas as kelas,
			penerima.index_kelas as index,
			penerima.kode_jurusan as jurusan,
		");
		$this->db->from('kelas');
		$this->db->join('penerimainfo as penerima', 'penerima.kelas_id=kelas.kelas_id', 'left');
		$this->db->where('info_id', $id);
		$this->db->order_by('nama_kelas', 'ASC');
		return $this->db->get()->result();
	}

	public function detailInfoAkademik($id)
	{
		$this->db->select("
			info.info_id as id,
			info.judul_info as judul,
			info.slug_judul as slug,
			info.file_info as file,
			info.file_type as type,
			info.file_size as size,
			info.create_time as create,
			info.update_time as update,
			penerima.index_kelas as index,
			penerima.kode_jurusan as jurusan,
			penerima.kelas_id as kelas_id
		");
		$this->db->from('infoakademik as info');
		$this->db->join('penerimainfo as penerima', 'penerima.info_id=info.info_id', 'left');
		$this->db->where('penerima.info_id', $id);
		$this->db->group_by('penerima.info_id');
		return $this->db->get()->row();
	}

	/* End Of Function Info Akademik */

	/* Function Tahun Akademik */
	public function getTahunAkademik()
	{
		$query	= $this->db->order_by('create_time', 'DESC')->get('tahunakademik');
		$result = $query->result();
		return $result;
	}

	public function activateTahunAkademik(int $id, int $active)
	{
		$this->db->set('status', $active);
		$this->db->where('tahun_id', $id);
		$this->db->update('tahunakademik');
		return true;
	}

	public function getActiveTahunAkademik()
	{
		$query = $this->db->get_where('tahunakademik', ['status' => 1])->row_array();
		$result = $query;
		return $result;
	}
	/* End Of Function Tahun Akademik */

	/* Function Jurnal Materi */
	public function getJurnalAbsensi($id)
	{
		$this->db->select("
			jadwal.jadwal_id,
			jadwal.hari,
			jadwal.jam_masuk as masuk,
			jadwal.jam_keluar as selesai,
			mapel.nama_mapel as mapel,
			ruangan.kode_ruang as ruang,
			jurnal.tanggal,
			jurnal.pertemuan,
			jurnal.jurnal_id
		");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id');
		$this->db->where('jurnal.jadwal_id', $id);
		return $this->db->get()->result();
	}

	public function getInfoJadwal($id)
	{
		$this->db->select("
			guru.guru_kode, 
			guru.guru_nama, 
			kelas.kode_kelas,
			kelas.nama_kelas,
			mapel.nama_mapel,
			jadwal.jadwal_id
		");
		$this->db->from('jadwal');
		$this->db->join('guru', 'guru.guru_nip=jadwal.guru_nip');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->where('jadwal_id', $id);
		return $this->db->get()->row();
	}

	public function getJurnalWhere(array $params)
	{
		$this->db->select("
			jadwal.jadwal_id, jadwal.hari, jadwal.jam_masuk, jadwal.jam_keluar, 
			jurnal.jurnal_id, jurnal.tanggal, jurnal.pertemuan, jurnal.kd_materi, 
			jurnal.absen_mulai, jurnal.absen_selesai, jurnal.jumlah_siswa, 
			jurnal.hadir, jurnal.alpha, jurnal.izin, jurnal.sakit, jurnal.pembahasan,
			jurnal.catatan_kbm, jurnal.status, 
			guru.guru_kode, guru.guru_nip, guru.guru_nama,
			mapel.nama_mapel, 
			kelas.kelas_id, kelas.kode_kelas, kelas.nama_kelas, 
			ruangan.kode_ruang,
		");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id', 'left');
		$this->db->join('guru', 'guru.guru_nip=jadwal.guru_nip', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left');
		$this->db->where($params);
		return $this->db->get();
	}


	public function getTugasHarian($id)
	{
		$this->db->select("
			jadwal.jadwal_id,
			jadwal.hari,
			mapel.nama_mapel,
			tugas.tugas_id,
			tugas.judul_tugas,
			tugas.pertemuan,
			tugas.create_time,
			tugas.update_time
		");
		$this->db->from('tugasharian as tugas');
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('tugas.jadwal_id', $id);
		return $this->db->get()->result();
	}

	public function detailTugasHarian($id)
	{
		$this->db->select("
			jadwal.jadwal_id, jadwal.hari, jadwal.kelas_id,
			kelas.nama_kelas, mapel.nama_mapel,
			tugas.tugas_id, tugas.judul_tugas, tugas.deskripsi, 
			tugas.pertemuan, tugas.file_tugas, tugas.deadline
		");
		$this->db->from('tugasharian as tugas');
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('tugas_id', $id);
		return $this->db->get()->row();
	}

	public function countTugasSiswa($id_tugas, $type)
	{
		if ($type == 'SM') {
			$this->db->where_in('status', [1, 3]);
		} elseif ($type == 'SN') {
			$this->db->where_in('status', [2, 4]);
		}
		$this->db->where('tugas_id', $id_tugas);
		$query = $this->db->get('tugas_siswa');
		return $query->num_rows();
	}

	// Function Evaluasi
	public function getEvaluasi($id)
	{
		$this->db->select("
			jadwal.jadwal_id,
			mapel.nama_mapel,
			evaluasi.evaluasi_id, evaluasi.judul, 
			evaluasi.evaluasi_ke, evaluasi.tanggal,
			evaluasi.create_time, evaluasi.update_time
		");
		$this->db->from('evaluasi');
		$this->db->join('jadwal', 'jadwal.jadwal_id=evaluasi.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('evaluasi.jadwal_id', $id);
		return $this->db->get()->result();
	}

	public function evaluasiDetail($id)
	{
		$this->db->select("
			jadwal.jadwal_id, jadwal.hari, jadwal.kelas_id,
			kelas.kode_kelas, kelas.nama_kelas,
			mapel.nama_mapel,
			evaluasi.evaluasi_id, 
			evaluasi.judul, evaluasi.tanggal,
			evaluasi.jenis_soal, evaluasi.evaluasi_ke,
			evaluasi.file_evaluasi, evaluasi.waktu_mulai,
			evaluasi.waktu_mulai, evaluasi.waktu_selesai, evaluasi.waktu_deadline
		");
		$this->db->from('evaluasi');
		$this->db->join('jadwal', 'jadwal.jadwal_id=evaluasi.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('evaluasi_id', $id);
		return $this->db->get()->row();
	}

	public function countEvaluasiSiswa($id, $type)
	{
		if ($type == 'SM') {
			$this->db->where_in('status', [1, 3]);
		} elseif ($type == 'SN') {
			$this->db->where_in('status', [2, 4]);
		}
		$this->db->where('evaluasi_id', $id);
		$query = $this->db->get('evaluasi_siswa');
		return $query->num_rows();
	}

	// Function Diskusi
	public function getDiskusi($id)
	{
		$this->db->where('jadwal_id', $id);
		$this->db->order_by('create_time', 'DESC');
		return $this->db->get('forumdiskusi')->result();
	}

	public function getReplyForum($id)
	{
		$this->db->where('forum_id', $id);
		$this->db->order_by('create_time', 'DESC');
		$query = $this->db->get('detaildiskusi');
		return $query->result();
	}

	public function detailForum($id)
	{
		$this->db->where('forum_id', $id);
		return $this->db->get('forumdiskusi')->row();
	}

	public function getUserSiswa($id)
	{
		$this->db->select('siswa.siswa_id, siswa.siswa_nama, siswa.siswa_nis, siswa.siswa_foto');
		$this->db->from('siswa');
		$this->db->where('siswa.siswa_nis', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getUserGuru($id)
	{
		$this->db->select('guru.guru_id, guru.guru_kode, guru_nip, guru.guru_nama, guru.profile');
		$this->db->from('guru');
		$this->db->where('guru_nip', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getReplyDiskusi($where = null, $order, $desc)
	{
		$this->db->select("
			diskusi.diskusi_id,
			diskusi.parent_id,
			diskusi.message, 
			diskusi.user_id,
			diskusi.create_time,
			forum.forum_id,
			forum.pembuat,
			forum.judul,
			forum.deskripsi,
			forum.jadwal_id
		");
		$this->db->from('detaildiskusi as diskusi');
		$this->db->join('forumdiskusi as forum', 'forum.forum_id=diskusi.forum_id');
		$this->db->where('parent_id', $where);
		$this->db->order_by('diskusi.' . $order, $desc);
		return $this->db->get();
	}

	// Jurnal Materi
	public function jurnalPembelajaran($id)
	{
		$this->db->select("
			jadwal.jadwal_id,
			jadwal.hari,
			mapel.nama_mapel,
			kelas.nama_kelas,
			guru.guru_kode,
			jurnal.tanggal, 
			jurnal.kd_materi,
			jurnal.pertemuan,
			jurnal.pembahasan, 
			jurnal.jurnal_id
		");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('guru', 'guru.guru_nip=jadwal.guru_nip');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('jurnal.jadwal_id', $id);
		return $this->db->get()->result();
	}

	public function jadwalBerlangsung($hari)
	{
		$this->db->select("
			jadwal.hari,
			jadwal.jam_masuk,
			jadwal.jam_keluar,
			guru.guru_kode as guru,
			mapel.nama_mapel as mapel,
			kelas.nama_kelas as kelas,
			kelas.kode_kelas as kd_kelas,
			ruangan.kode_ruang as ruang
		");
		$this->db->from('jadwal');
		$this->db->join('guru', 'guru.guru_nip=jadwal.guru_nip');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id');
		$this->db->where('hari', $hari);
		return $this->db->get()->result();
	}

	public function getWaliKelas()
	{
		$select = "kelas.kode_kelas, kelas.nama_kelas, kelas.create_time, kelas.update_time, guru.guru_nama, jurusan.kode_jurusan";
		$query	= $this->db->select($select)
			->from('kelas')
			->join('guru', 'guru.guru_nip=kelas.guru_nip', 'left')
			->join('jurusan', 'jurusan.kode_jurusan=kelas.kode_jurusan', 'left')
			->order_by('create_time', 'DESC')
			->get();
		$result = $query->result();
		return $result;
	}

	public function getDetailKelas($kodeKelas)
	{
		$select = "kelas.kode_kelas, kelas.nama_kelas, kelas.create_time, kelas.update_time, guru.guru_nama, guru.guru_kode, jurusan.kode_jurusan";
		$query	= $this->db->select($select)
			->from('kelas')
			->join('guru', 'guru.guru_nip=kelas.guru_nip', 'left')
			->join('jurusan', 'jurusan.kode_jurusan=kelas.kode_jurusan', 'left')
			->where('kode_kelas', $kodeKelas)
			->get();
		$result = $query->row();
		return $result;
	}

	public function getMateriKBM($materiID, $jenis)
	{
		$query	= $this->db->get_where('materi_kbm', [
			'materi_info_id' => $materiID,
			'jenis' => $jenis
		]);
		$result = $query->result();
		return $result;
	}

	public function getFileMateri($materiID)
	{
		$query	= $this->db->select("*")
			->from('materi_kbm')
			->join('materi_info', 'materi_info.materi_info_id=materi_kbm.materi_info_id', 'left')
			->join('jurusan', 'jurusan.jurusan_id=materi_info.jurusan_id', 'left')
			->where('materi_id', $materiID)
			->get();
		return $query->row();
	}

	public function check_kelas($kode_kelas, $guru_kode)
	{
		$this->db->where('kode_kelas', $kode_kelas)
			->like('guru_kode', $guru_kode)
			->limit(1);
		$query = $this->db->get('kelas');
		$result = $query->num_rows();
		if ($result == 1) {
			return false;
		} else {
			return true;
		}
	}

	public function check_walikelas($waliKelas)
	{
		$query	= $this->db->get_where('kelas', ['guru_nip' => $waliKelas], 1);
		$result = $query->num_rows();
		if ($result == 1) {
			return false;
		} else {
			return true;
		}
	}

	public function check_kodekelas($kode)
	{
		$query	= $this->db->select('kode_kelas')
			->from('kelas')->where('kode_kelas', $kode)->limit(1)->get();
		$result = $query->num_rows();
		if ($result == 1) {
			return false;
		} else {
			return true;
		}
	}

	public function update_kelas()
	{
		$waliKelas = $this->input->post('wali_kelas_edit', true);
		$kelas = $this->db->get_where('kelas', ['kode_kelas' => $this->input->post('kode_kelas', true)])->row();
		if ($waliKelas == $kelas->kode_kelas) {
			$this->db->set('update_time',  date('Y-m-d H:i:s'));
		} else {
			$this->db->set('guru_kode', $waliKelas);
			$this->db->set('update_time',  date('Y-m-d H:i:s'));
			$this->db->update('kelas');
			$this->db->where('kode_kelas', $this->input->post('kode_kelas', true));
		}
		return true;
	}
}
