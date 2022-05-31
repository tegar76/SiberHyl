<?php

class JurnalMateri extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
	}

	public function index()
	{
		$data = [
			'title' => 'Jurnal Materi',
			'content' => 'admin/contents/jurnal_materi/v_jurnal_materi'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function detailJurnalMateri()
	{
		$data = [
			'title' => 'Jurnal Materi',
			'content' => 'admin/contents/jurnal_materi/v_detail_jurnal_materi'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	
	
}

?>
