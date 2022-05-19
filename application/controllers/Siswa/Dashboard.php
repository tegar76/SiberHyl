<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->siswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
	}


	public function index()
	{
		$data = [
			'title' => 'Jadwal',
			'content' => 'siswa/contents/jadwal/v_jadwal'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}
}
