<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Masuk Akun',
		];

		$this->load->view('auth/v_auth', $data, FALSE);
	}

	public function process()
	{
		$this->load->model('SiswaModel', 'siswa', TRUE);
		$siswa = $this->siswa->getWhere(['siswa.kelas_id' => 2]);
		var_dump($siswa);
	}
}
