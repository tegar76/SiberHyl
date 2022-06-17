<?php

class SiswaModel extends CI_Model
{
	protected $table = "siswa";
	const SESSION_KEY = "nis";

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
			->from('siswa as siswa')
			->join('kelas as kelas', 'siswa.kelas_id=kelas.kelas_id')
			->where($params)
			->order_by('siswa_nama', 'ASC')
			->get();
		$row = $query->num_rows();
		if ($row > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
	}

	public function updateWhere($update = null, string $where = null)
	{
		if ($update == null && $where == null) {
			return false;
		}

		$this->db->set($update)
			->where('siswa_nis', $where)
			->update($this->table);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->table, ['siswa_nis' => $user_id]);
		return $query->row();
	}
}
