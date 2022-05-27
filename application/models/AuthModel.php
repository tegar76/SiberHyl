<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

	public function getAdminByUsername($username)
	{
		$this->db->where('guru_username', $username);
		$this->db->where('role_id', 1);
		return $this->db->get('guru')->row_object();
	}
	public function getTeacherByUsername($username)
	{
		$this->db->where('guru_username', $username);
		return $this->db->get('guru')->row_object();
	}
	public function checkToken($access_token)
	{
		$this->db->where('access_token', $access_token);
		return $this->db->get('token_login')->row_object();
	}
	public function registToken($data)
	{
		return $this->db->insert('token_login', $data);
	}
	public function deleteToken($access_token)
	{
		$this->db->where('access_token', $access_token);
		return $this->db->delete('token_login');
	}
	public function getStudentByNis($nis)
	{
		$this->db->where('siswa_nis', $nis);
		return $this->db->get('siswa')->row_object();
	}
}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */
