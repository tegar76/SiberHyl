<?php

class InfoAkademik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GuruModel', 'guru', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
	}

	public function index()
	{
		$data['guru'] = $this->userGuru;
		$data['title'] = 'Info Akademik';
		$data['content'] = 'wali_kelas/contents/info_akademik/v_info_akademik';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function fileInfoAkademik()
	{
		$data['guru'] = $this->userGuru;

		$data = [
			'title' => 'File Info Akademik',
		];

		$this->load->view('wali_kelas/contents/info_akademik/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}
}
