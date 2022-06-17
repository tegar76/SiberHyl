<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
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
			'title' => 'Konsultasi',
			'content' => 'siswa/contents/konsultasi/v_konsultasi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function detailKonsultasi()
	{
		$data = [
			'title' => 'Detail Konsultasi',
			'content' => 'siswa/contents/konsultasi/v_detail_konsultasi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function tambahKonsultasi()
	{
		$data = [
			'title' => 'Tambah Konsultasi',
			'content' => 'siswa/contents/konsultasi/v_tambah_konsultasi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

}
