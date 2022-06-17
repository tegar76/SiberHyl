<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
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
			'title' => 'Info',
			'content' => 'siswa/contents/info/v_info'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

    public function infoPdf()
	{
		$data = [
			'title' => 'Info Pdf',
		];

		$this->load->view('siswa/contents/info/info_pdf/v_info_pdf', $data, FALSE);
	}
}
