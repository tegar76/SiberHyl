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
}
