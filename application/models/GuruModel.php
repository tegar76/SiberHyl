<?php

class GuruModel extends CI_Model
{
	protected $table = "guru";

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
			return $query->result();
		} elseif ($row == 1) {
			return $query->row();
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

	public function insert_guru(array $data)
	{
		$this->db->insert($this->table, $data);
		return true;
	}
}
