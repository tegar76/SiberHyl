<?php

class GuruModel extends CI_Model
{
	protected $table = "siberhyl_guru";

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
		$query	= $this->db->get_where($this->table, $params);
		$row = $query->num_rows();
		if ($row > 1) {
			return $query->result_array();
		} elseif ($row == 1) {
			return $query->row_array();
		}
	}

	public function updateWhere(array $update = null, string $where = null)
	{
		if ($update == null && $where == null) {
			return false;
		}

		$this->db->set($update)
			->where('guru_nip', $where)
			->update($this->table);
	}
}
