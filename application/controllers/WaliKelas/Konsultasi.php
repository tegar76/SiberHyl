<?php

class Konsultasi extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function tambahKonsultasi()
	{
		$data['title'] = 'Tambah Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_tambah_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function detailKonsultasi()
	{
		$data['title'] = 'Forum Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_detail_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
