<?php

class Konsultasi extends CI_Controller
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
		$data['title'] = 'Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function tambahKonsultasi()
	{
		$data['guru'] = $this->userGuru;
		$data['title'] = 'Tambah Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_tambah_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function detailKonsultasi()
	{
		$data['guru'] = $this->userGuru;
		$data['title'] = 'Forum Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_detail_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
