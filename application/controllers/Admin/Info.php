<?php

class Info extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
	}

	public function infoAkademik()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'admin/contents/info/v_info_akademik'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahInfoAkademik()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'admin/contents/info/v_tambah_info_akademik'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editInfoAkademik()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'admin/contents/info/v_edit_info_akademik'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	
	
}

?>
