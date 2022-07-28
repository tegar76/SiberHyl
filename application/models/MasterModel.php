<?php

class MasterModel extends CI_Model
{
	/*
		Fungsi untuk mengambil jumlah data yang ditampilkan pada halaman
		dashboard admin, data-data tersebut diantaranya sebagai berikut:
		1. Total Guru keseluruhan
		2. Total Wali Kelas
		3. Total Siswa
		4. Total Kelas
		Fungsi ini mengembalikan nilai berupa Integer
	*/
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
