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
	public function get_row_data($table = null)
	{
		if ($table == null) {
			return false;
		}
		$query	= $this->db->get($table);
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
		$query	= $this->db->get($table);
		return $query->result();
	}

	public function get_tablewhere($table = null, $where = [])
	{
		$query	= $this->db->get_where($table, $where);
		if ($query->num_rows() > 1) {
			return $query->result();
		}
	}

	public function get_masterdata($table = null)
	{
		if ($table == 'kelas') {
			$query	= $this->db->select('kelas_id, nama_kelas')
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
				->from($table)->order_by('guru_kode', 'ASC')->get();
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
}
