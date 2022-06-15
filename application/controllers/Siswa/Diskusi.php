<?php

class Diskusi extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Diskusi',
			'content' => 'siswa/contents/diskusi/v_diskusi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function tambahDiskusi()
	{
		$data = [
			'title' => 'Tambah Diskusi',
			'content' => 'siswa/contents/diskusi/v_tambah_diskusi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}


	public function detailDiskusi()
	{
		$data = [
			'title' => 'Detail Diskusi',
			'content' => 'siswa/contents/diskusi/v_detail_diskusi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	
}

?>