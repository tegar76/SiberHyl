<?php

class SiswaModel extends CI_Model
{
	protected $table = "siberhyl_siswa";

	public function getAll()
	{
		$query	= $this->db->get($this->table);
		$result	= $query->result_array();
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

	public function getWhere(array $params = null)
	{
		if ($params == null) {
			return false;
		}
		$query	= $this->db->select('*')
			->from('siberhyl_siswa as siswa')
			->join('siberhyl_kelas as kelas', 'siswa.kelas_id=kelas.kelas_id')
			->where($params)
			->get();
		$row = $query->num_rows();
		if ($row > 1) {
			return $query->result_array();
		} elseif ($row == 1) {
			return $query->row_array();
		}
	}
}
