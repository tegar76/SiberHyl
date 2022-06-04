<?php

class Info extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		checkAdminLogin();
	}

	public function infoAkademik()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'admin/contents/info/v_info_akademik'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function infoAkademikPdf()
	{
		$data = [
			'title' => 'Info Akademik',
		];

		$this->load->view('admin/contents/info/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}

    public function tambahInfoAkademik()
	{
		$data = [
			'title' => 'Tambah Info Akademik',
			'content' => 'admin/contents/info/v_tambah_info_akademik'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editInfoAkademik()
	{
		$data = [
			'title' => 'Edit Info Akademik',
			'content' => 'admin/contents/info/v_edit_info_akademik'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	

	public function tahunPembelajaran()
	{
		$data = [
			'title' => 'Tahun Pembelajaran',
			'content' => 'admin/contents/info/v_tahun_pembelajaran'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambahTahunPembelajaran()
	{
		$data = [
			'title' => 'Tambah Tahun Pembelajaran',
			'content' => 'admin/contents/info/v_tambah_tahun_pembelajaran'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
	
}
