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
			$query = $this->db->select('guru_id, guru_kode, guru_nama')
				->from($table)->where('guru_kode !=', 'ADM')->order_by('guru_kode', 'ASC')->get();
			$result = $query->result();
			return $result;
		} elseif ($table == 'ruangan') {
			$query = $this->db->select('ruang_id, nama_ruang')
				->from('ruangan')->order_by('nama_ruang', 'ASC')->get();
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
			$this->db->select('guru_id, guru_kode, guru_nama');
			$this->db->from('guru');
			$this->db->like('guru_kode', $search);
			$this->db->like('guru_nama', $search);
			$this->db->where('guru_kode !=', 'ADM');
			$this->db->order_by('guru_kode', 'ASC');
			$query	= $this->db->get();
			if ($query->num_rows() == null) {
				return 0;
			}
			return $query->result();
		} elseif ($type == 'room') {
			$this->db->select('ruang_id, kode_ruang');
			$this->db->from('ruangan');
			$this->db->like('nama_ruang', $search);
			$this->db->order_by('nama_ruang', 'ASC');
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

	public function get_materi()
	{
		$this->db->select("*");
		$this->db->from('materi_info');
		$this->db->join('mapel', 'mapel.mapel_id=materi_info.mapel_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=materi_info.jurusan_id', 'left');
		$this->db->order_by('materi_info.create_time', 'DESC');
		return $this->db->get();
	}

	public function getDetailMateri($idMateri)
	{
		$query	= $this->db->select('*')
			->from('materi_info')
			->join('mapel', 'mapel.mapel_id=materi_info.mapel_id', 'left')
			->join('jurusan', 'jurusan.jurusan_id=materi_info.jurusan_id', 'left')
			->where('materi_info_id', $idMateri)
			->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function getWaliKelas()
	{
		$select = "kelas.kode_kelas, kelas.nama_kelas, kelas.create_time, kelas.update_time, guru.guru_nama, jurusan.kode_jurusan";
		$query	= $this->db->select($select)
			->from('kelas')
			->join('guru', 'guru.guru_kode=kelas.guru_kode', 'left')
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
			->join('guru', 'guru.guru_kode=kelas.guru_kode', 'left')
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
		$query	= $this->db->get_where('kelas', ['guru_kode' => $waliKelas], 1);
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
