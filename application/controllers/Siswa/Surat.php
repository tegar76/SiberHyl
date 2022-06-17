<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
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
			'title' => 'Surat',
			'content' => 'siswa/contents/surat/v_surat'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function fileSuratImg()
	{
		$data = [
			'title' => 'File Surat',
		];

		$this->load->view('siswa/contents/surat/v_file_surat_img', $data, FALSE);
	}
}
